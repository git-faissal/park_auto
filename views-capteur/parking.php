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

//** Affichages des places libre dans le parking selon la categorie */
$categorie=$_SESSION['categorie'];
$place = json_decode(file_get_contents("http://localhost:8080/park_auto/API_TEST/API/places/".$categorie));

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets-capteur/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets-capteur/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets-capteur/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.7.1
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Bienvenu dans le Systeme de capteur de parking </h2>
          <p>Veillez suivre les indications specifier et choisir la place qui vous convient ...!!!</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
     
          <li data-filter=".filter-card">Places Libre pour la categorie <?php echo $_SESSION['categorie']; ?></li>
        
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
         <?php  foreach($place as $places) : ?>
            <?php if($places->etat==1){ ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><a href="desactiver_place.php?place=<?php echo $places->id_local; ?>"><img src="../assets-capteur/img/portfolio/portfolio-4.jpg" width="200px" height="200px" class="img-fluid" alt=""></a></div>
            <div class="portfolio-info">
            <h4><?php echo $places->id_local;  ?></h4>

              <h4><?php echo $places->direction;  ?></h4>
              <p>Veuillez suivre l'itineraire preciser en dessous ...!!!</p>
          </div>
          </div>
          <?php } else{?>
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-img"><img src="../assets-capteur/img/portfolio/occupe.jpg" width="200px" height="200px" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Desole cette place est occupe par un autre engin</h4>
              <p>Veuillez suivre l'itineraire preciser en dessous ...!!!</p>
          </div>
          </div>


         <?php }  ?>
          <?php  endforeach; ?>
         
        </div>

      </div>
    </section><!-- End Portfolio Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Capteur</span></strong>. Tous droits reserves
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">UJKZ</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets-capteur/vendor/aos/aos.js"></script>
  <script src="../assets-capteur/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets-capteur/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets-capteur/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets-capteur/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets-capteur/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets-capteur/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets-capteur/js/main.js"></script>

</body>

</html>
