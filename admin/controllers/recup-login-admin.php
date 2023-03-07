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
    if(!empty($_POST['nom_user']) && !empty($_POST['pass'])) 
    {
$tabadmin=array(
     'nom_user' => $_POST['nom_user'],
     'pass' => $_POST['pass']
);
  //** INSTANCIATION DE LA CLASSE + HYDRATATION DE LA ATTRIBUTS DE LE A CLASSE */
    $adminsave= new Admin;
    $adminsave->hydrate($tabadmin);

    /** ------------fin----------------- */

    /** creation de manager et insertion de client dans la table */

    $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $manager= new Adminmanager($db);
    $manager->verifieradmin($adminsave);
    /**---------fin------------- */
        
    }
}
?>