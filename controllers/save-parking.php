<?php

  //Demarrage de la session
  session_start();
  //--fin start session---////
 /** FONCTION DE CHARGEMENT DE CLASSE AUTOMATIQUE */
 function chargerClasse($classe)
 {
     $chemin="../models/";
     include $chemin.$classe .'.php';
 }
 spl_autoload_register('chargerClasse');
 /** FIN FONCTION */
 
    /**Generation de code a quatre chiffre pour verification */
    $longueur = 9;
$key = "";
for ($i=0; $i < $longueur ; $i++) { 
  $key .= mt_rand(0,9);# code...
  }
$_SESSION['engin'] = $key;


    if(!empty($_SESSION['model_voiture'])&& !empty($_SESSION['num_matricule'])&& !empty($_SESSION['password'])&& !empty($_SESSION['categorie'])) 
    {
		//** Recuperation des donnees dans des variable session et verifiation de nombre place libre dans le parking a ravers le capteur comme API */
	
     /** Recuperation des information de engin a stationner et ranger dans une variable pour le recuperer plus tard */

		$tabEngin=array(
     'modele' => $_SESSION['model_voiture'],
     'matricule' => $_SESSION['num_matricule'],
     'motpass' => $_SESSION['password'],
     'categorie' => $_SESSION['categorie']
        );
  //** INSTANCIATION DE LA CLASSE + HYDRATATION DE LA ATTRIBUTS DE LA CLASSE */
    $enginsave= new Voiture;
    $enginsave->hydrate($tabEngin);

    /** ------------fin----------------- */

    /** creation de manager et insertion de stationnement dans la table */

    $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $manager= new Voituremanager($db);
    $verification = $manager->verifierclient($enginsave);
    if($verification==1)
    {
        $manager->ajouter_engin($enginsave);
      
    }else
    {
        ?>
       
            <script>
            alert("Mot de passe incorrecte veuillez recommence..!!!");
                window.location.replace("../views/stationner.php");
            </script>
           
        <?php

    }
    /**---------fin------------- */
	
        
    }else{
		 ?>
       
            <script>
           // alert("Mot de passe incorrecte veuillez recommence..!!!");
                window.location.replace("../views/stationner.php");
            </script>
           
        <?php
	}

?>