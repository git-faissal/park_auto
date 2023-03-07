<?php
//** Demarrage de la session */

session_start();

//** Verification d'existence de session categorie en cas d'abscence faire l'action qui va suivre */
if(isset($_SESSION['categorie'])){
  if(!empty($_SESSION['categorie']))
{
     $id_user=$_SESSION['categorie'];
}else{?>
      <script>
           window.location.replace("../controllers/deconnexion.php");
        </script>
      <?php
}
}else{?>
<script>
   window.location.replace("../controllers/deconnexion.php");
</script>
<?php

}

//** desactivation des place libre dans l'api capteur */
$p=$_GET['place'];
$_SESSION['num_place']=$p;
$place = json_decode(file_get_contents("http://localhost:8080/park_auto/API_TEST/API/parking/".$p));

?>
<script>
       // alert("Stationnement effectue avec succes..!!! ");
        window.location.replace("../controllers/save-parking.php");
    </script><?php

?>