<?php
  //Demarrage de la session
  session_start();
  //--fin start session---////
 /** FONCTION DE CHARGEMENT DE CLASSE AUTOMATIQUE */
/** Recuperation de l'identifient de l'engin a destationner */
function chargerClasse($classe)
{
    $chemin="../models/";
    include $chemin.$classe .'.php';
}
spl_autoload_register('chargerClasse');
/** FIN FONCTION */
 $user = $_SESSION['id_client']; 

$id_engin=$_GET['id_engin'];
$_SESSION['id_engin']=$_GET['id_engin'];

  /** lecture de la table abonnement pour savoir si y'a un abonnement en cours */
  /** suivie d'une connexion a la base de donnee */
$dbb= new PDO('mysql:host=localhost;dbname=auto_park','root','');
 $dbb->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  $requested=$dbb->query("SELECT id_abn, categorie_abn, date_debut, date_fin, etat, id_client FROM abonnement WHERE id_client='$user' ");
//  echo $user;
  while($tabb=$requested->fetch(PDO::FETCH_ASSOC))
  {
	  $existe=$tabb['id_client'];
  }
    //  echo $user;
      if(empty($existe))
	  {
      //  echo $tabb['id_client'];
        ?>
        <script>
              // alert("Redirection sur la pages choix de forfait en cas de non abonnement");
                window.location.replace("../views/choix-forfait.php");
            </script>
        <?php
 
      }else{
          
//** Recuperation du numero de place occupe dans le parking suivis de l'activation de cette place pour ke elle puisse etre occupe a nouveau */


 $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
 $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 $manager= new Voituremanager($db);
 $trouve = $manager->desactiverplace($id_engin);

   /*   Envoie du numero de place occupe par l'engin dans l'api capteur pour reactiver la place qui etait occupe   */
 
$place = json_decode(file_get_contents("http://localhost/park_auto/API_TEST/API/place/".$trouve));


 if(!empty($place))
 {
    ?>
    <script>
            alert("Sortie du parking effectue avec succes..!!! ");

            window.location.replace("../views/pages-parking.php");
        </script>
    <?php   
 }else
 {
    ?>
    <script>
            alert("Sortie du parking effectue avec succes..!!! ");

            window.location.replace("../views/pages-parking.php");
        </script>
    <?php   
 }
        

      }
 
    ?>
    <script>
            alert("Erreur..!!! ");

           // window.location.replace("../views/pages-parking.php");
        </script>
    <?php 

 ?>