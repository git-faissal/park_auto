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
    if(!empty($_POST['telephone']) && !empty($_POST['password'])) 
    {
$tabClient=array(
     'telephone' => $_POST['telephone'],
     'password' => $_POST['password']
);
  //** INSTANCIATION DE LA CLASSE + HYDRATATION DE LA ATTRIBUTS DE LE A CLASSE */
    $clientsave= new Client;
    $clientsave->hydrate($tabClient);

    /** ------------fin----------------- */

    /** creation de manager et insertion de client dans la table */

    $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $manager= new Clientmanager($db);
    $manager->verifierclient($clientsave);
    /**---------fin------------- */
        
    }
}
?>