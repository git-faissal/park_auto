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

 /**Recuperation des details de l'abonnement choisie  */

 /*********FIN INITIALISATION********* */
/**Initialisation du tableau avec les detail de l'abonnement a effectuer */
$etat=1;
 $tabForfait=array(
    'categorie' =>$_SESSION['categorie'],
    'montant' =>$_SESSION['montant'],
    'date_debut' => $_SESSION['date_debut'],
    'date_fin' => $_SESSION['date_fin'],
    'etat' => $etat
);
  //** INSTANCIATION DE LA CLASSE + HYDRATATION DE LA ATTRIBUTS DE LE A CLASSE */
    $forfaitsave= new Forfait;
    $forfaitsave->hydrate($tabForfait);

    /** ------------fin----------------- */

    /** creation de manager et insertion de client dans la table */

    $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
    $manager= new forfaitmanager($db);
      $manager->ajouter_abn($forfaitsave);
    
    /**---------fin------------- */
?>