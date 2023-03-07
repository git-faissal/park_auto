<?php
  //Demarrage de la session
  session_start();
  //--fin start session---////
 /** FONCTION DE CHARGEMENT DE CLASSE AUTOMATIQUE */
/** Recuperation de l'identifient de l'engin a destationner */
function chargerClasse($classe)
{
    $chemin="../models/";
    include $chemin.$classe .'.php';
}
spl_autoload_register('chargerClasse');
/** FIN FONCTION */
//** Recuperation de l'identifient de l'engin a stationner */

$id_engin=$_SESSION['id_engin'];
         
//** Recuperation du numero de place occupe dans le parking suivis de l'activation de cette place pour ke elle puisse etre occupe a nouveau */


 $db= new PDO('mysql:host=localhost;dbname=auto_park','root','');
 $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
 $manager= new Voituremanager($db);
 $trouve = $manager->desactiverplace($id_engin);

   /*   Envoie du numero de place occupe par l'engin dans l'api capteur pour reactiver la place qui etait occupe   */
 
$place = json_decode(file_get_contents("http://localhost/park_auto/API_TEST/API/place/".$trouve));

//** Une double verification si la place occupe dans le parking a ete libere */

 if(!empty($place))
 {
    ?>
    <script>
            alert("Sortie du parking effectue avec succes..!!! ");

            window.location.replace("../views/pages-parking.php");
        </script>
    <?php   
 }else
 {
    ?>
    <script>
            alert("Sortie du parking effectue avec succes..!!! ");

            window.location.replace("../views/pages-parking.php");
        </script>
    <?php   
 }

?>