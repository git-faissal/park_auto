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
    if(!empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['telephone']) && !empty($_POST['pass'])) 
    {
$tabClient=array(
     'nom' =>$_POST['nom'],
     'prenom' =>$_POST['prenom'],
     'telephone' => $_POST['telephone'],
     'password' => $_POST['pass']
);
  //** INSTANCIATION DE LA CLASSE + HYDRATATION DE LA ATTRIBUTS DE LE A CLASSE */
    $clientsave= new Client;
    $clientsave->hydrate($tabClient);

    /** ------------fin----------------- */

    /**Generation de code a quatre chiffre pour verification */
    $longueur = 9;
$key = "";
for ($i=0; $i < $longueur ; $i++) { 
  $key .= mt_rand(0,9);# code...
  }
$_SESSION['key'] = $key;

    /** creation de manager et insertion de client dans la table */

    $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $manager= new Clientmanager($db);
    $verification = $manager->verifiercompte($clientsave);
    if($verification==1)
    {
        ?>
               <script>
               alert("Ce compte existe deja..");
                   window.location.replace("../views/pages-register.php");
               </script>
               <?php
    }else
    {
      $manager->add($clientsave);

    }
    /**---------fin------------- */
        
    }
}
?>