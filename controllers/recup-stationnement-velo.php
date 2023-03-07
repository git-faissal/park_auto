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

if(isset($_POST['envoyer'])){
    if(!empty($_POST['model_voiture'])&& !empty($_POST['password'])&& !empty($_POST['categorie'])) 
    {
$tabEngin=array(
     'modele' => $_POST['model_voiture'],
     'matricule' => $_POST['num_matricule'],
     'motpass' => $_POST['password'],
     'categorie' => $_POST['categorie']
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
        
    }
}
?>