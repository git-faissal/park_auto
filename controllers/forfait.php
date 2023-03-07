<?php

/**connexion a la base de donnees avec recuperation des forfait d'abonnement disponible   ...!!! */
  $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
  $request=$db->query("SELECT * FROM forfait");
  /** fin de la requete */
$user= $_SESSION['id_client'];
  /** lecture de la table abonnement pour savoir si y'a un abonnement en cours */
  $request_abn=$db->query("SELECT * FROM abonnement WHERE id_client=$user AND etat=1");

 ?>