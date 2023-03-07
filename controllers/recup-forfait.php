<?php

  //Demarrage de la session
  session_start();
  $id_forfait=$_GET['id_forfait'];
  //--fin start session---////
 /** FONCTION DE CHARGEMENT DE CLASSE AUTOMATIQUE */
 function chargerClasse($classe)
 {
     $chemin="../models/";
     include $chemin.$classe .'.php';
 }
 spl_autoload_register('chargerClasse');
 /** FIN FONCTION */

 /**Recuperation des details de l'abonnement choisie  */
 $dbb= new PDO('mysql:host=localhost;dbname=auto_park','root','');
 $request=$dbb->query("SELECT id_forfait, categorie, montant FROM forfait WHERE id_forfait='$id_forfait'");

 while($donnees=$request->fetch(PDO::FETCH_ASSOC))
 {
     $montant= $donnees['montant'];
     $categorie= $donnees['categorie'];
 }
 /**Verification du forfait choisie et du nombre de jour accorder au client */
 $date_debut=date("y-m-d");
 if($categorie=="Mensuel")
 $date_fin=date("y-m-d ", time()+30*3600*24);
 if($categorie=="Trimestriel")
 $date_fin=date("y-m-d ", time()+90*3600*24);
 if($categorie=="Semestriel")
 $date_fin=date("y-m-d ", time()+1800*3600*24);
 if($categorie=="Annuel")
 $date_fin=date("y-m-d ", time()+365*3600*24);
 /*********FIN INITIALISATION********* */
/**Initialisation du tableau avec les detail de l'abonnement a effectuer */

    $_SESSION['categorie']=$categorie;
    $_SESSION['montant'] =$montant;
    $_SESSION['date_debut'] = $date_debut;
    $_SESSION['date_fin'] = $date_fin;

            /**Verification du payement de l'abonnement avant insertion dans la base de donnee */
    $_SESSION['abonnement']=1;
    $_SESSION['cout']=$montant;
	
	  $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $manager= new forfaitmanager($db);
    $verification = $manager->verifierforfait();
    if($verification==1)
    {
        ?>
               <script>
               alert("Vous avez deja un forfait d'abonnement en cours !...");
                   window.location.replace("../views/pages-forfait.php");
               </script>
               <?php
    }else
    {
		  ?>
    <script>             
      window.location.replace("../payement/ligdicash-php-gateway/ligdicash_documentation_V1.2/EXEMPLE_EN_PHP-cURL/EXEMPLE_EN_PHP-cURL/payin_avec_redirection_php_cURL.php");

    </script>
<?php
    }
  
    /**---------fin------------- */
?>