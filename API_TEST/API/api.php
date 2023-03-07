<?php
  //Demarrage de la session
  session_start();
  //--fin start session---////
function getPlaces()
{
    $pdo= getConnexion();
    $req = "SELECT f.id_local, f.numero, f.direction, f.etat, f.id_categorie as 'categorie'
    from localisation f inner join categorie c WHERE f.id_categorie = c.id_categorie AND f.etat=1";
    $stat=$pdo->prepare($req);
    $stat->execute();
    $localisation= $stat->fetchAll(PDO::FETCH_ASSOC);
    $stat->closeCursor();
    sendJSON($localisation);
}

function getPlacesByCategorie($categorie)
{
    $pdo= getConnexion();
   /* $req = "SELECT f.id_local, f.numero, f.direction, f.etat, f.id_categorie, c.nom_cat  as 'categorie'
    from localisation f inner join categorie c on f.id_categorie = c.id_categorie 
    where c.nom_cat=:categorie AND f.etat=1 ";*/
    $req = "SELECT f.id_local, f.numero, f.direction, f.etat, f.id_categorie, c.nom_cat  as 'categorie'
    from localisation f inner join categorie c on f.id_categorie = c.id_categorie 
    where c.nom_cat=:categorie";
    $stat=$pdo->prepare($req);
    $stat->bindValue(":categorie",$categorie,PDO::PARAM_STR);
    $stat->execute();
    $localisation= $stat->fetchAll(PDO::FETCH_ASSOC);
    $stat->closeCursor();
    sendJSON($localisation);
}

function desactivePlace($id)
{
    $pdo= getConnexion();
    $req = "UPDATE localisation SET etat=1 WHERE id_local=:id";
    $stat=$pdo->prepare($req);
    $stat->bindValue(":id",$id,PDO::PARAM_STR);
    $stat->execute();
    $localisation= $stat->fetchAll(PDO::FETCH_ASSOC);
    $stat->closeCursor();
    sendJSON($localisation);
}

function activePlace($id)
{
    $pdo= getConnexion();
    $req = "UPDATE localisation SET etat=0 WHERE id_local=:id";
    $stat=$pdo->prepare($req);
    $stat->bindValue(":id",$id);
    $stat->execute();
    $localisation= $stat->fetchAll(PDO::FETCH_ASSOC);
    $stat->closeCursor();
    sendJSON($localisation);
}

function comptePlacevoiture($type)
{
    $pdo= getConnexion();
    $req = "SELECT f.id_local, f.numero, f.direction, f.etat, f.id_categorie, c.nom_cat  as 'categorie'
    from localisation f inner join categorie c on f.id_categorie = c.id_categorie 
    where c.nom_cat=:categorie AND f.etat=1";
    $stat=$pdo->prepare($req);
    $stat->bindValue(":categorie",$type,PDO::PARAM_STR);
    $stat->execute();
    $nombre= count($stat->fetchAll());
    $stat->closeCursor();
    print_r($nombre);
   // sendJSON($nombre);
}

 function ajoutidentifient($id)
{
    
    $pdo= getConnexion();
    $req = "UPDATE localisation SET etat=0, id_engin=0  WHERE id_local=:id";
    $req2="SELECT numero from localisation WHERE id_local=:id";
    $stat=$pdo->prepare($req);
    $stat2=$pdo->prepare($req2);
   // $stat->bindValue(":id2",$id,PDO::PARAM_STR);
    $stat->bindValue(":id",$id,PDO::PARAM_STR);
    $stat2->execute();
    $stat->execute();
   // $localisation= $stat->fetchAll(PDO::FETCH_ASSOC);
    $localisation2= $stat->fetchAll();
    $stat->closeCursor();
    print_r($localisation2);
   // sendJSON($localisation2);
}

function getConnexioN()
{
    return new PDO('mysql:host=localhost;dbname=park_capteur','root','');
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}

?>