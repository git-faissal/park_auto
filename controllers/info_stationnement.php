<?php
/**connexion a la base de donnees avec recuperation des information des engin stationner   ...!!! */
  $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
  $request=$db->query("SELECT id_engin, categorie, nom_engin, matricule_engin, debut_stat, fin_stat, etat, id_client FROM engin WHERE id_client='$id_user' AND etat=1");
  /** fin de la requete */
  $request2=$db->query("SELECT id_engin, categorie, nom_engin, matricule_engin, debut_stat, fin_stat, etat, id_client FROM engin WHERE id_client='$id_user' AND etat=1");
  /** fin de la requete */
  $request3=$db->query("SELECT id_engin, categorie, nom_engin, matricule_engin, debut_stat, fin_stat, etat, id_client FROM engin WHERE id_client='$id_user' AND etat=1");
  /** fin de la requete */

  /** lecture de la table abonnement pour savoir si y'a un abonnement en cours */

 ?>