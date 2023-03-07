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
  /** creation de manager et insertion de client dans la table */

  $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
  $manager= new Clientmanager($db);