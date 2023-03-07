<?php
 session_start();
include ("../controllers/expirationsession.php");
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Acceuil - Auto-Park</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.png" rel="icon">
  <link href="../assets/img/apple.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include("../corps/header/header.php"); ?>
  <!-- End Header -->

  <!-- ======= Sidebar colonne de droite ======= -->

  <?php include("../corps/colonne/colonne.php");  ?>

  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau de bord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Acceuil</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">CHOISSISSEZ DE FAIRE UN ABONNEMENT</h5>

                  <div class="d-flex align-items-center">
                   			<a href="pages-forfait" >		  <img src="../assets/img/abonne.jpg" width="400px" height="400px" class="img-fluid" alt="">  </a>

                    <div class="ps-3">
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-6 col-md-6">
               <div class="card info-card sales-card">

                

                <div class="card-body">
                  <h5 class="card-title">POSSIBILITE DE PAYER DIRECTEMENT</h5>

                  <div class="d-flex align-items-center">
				  <?php
				      $_SESSION['abonnement']=1;
                     $_SESSION['cout']=100;
                    ?>

                  
					<a href="../payement/ligdicash-php-gateway/ligdicash_documentation_V1.2/EXEMPLE_EN_PHP-cURL/EXEMPLE_EN_PHP-cURL/payin_avec_redirection_php_cURL.php" >  <img src="../assets/img/payer.png" width="275px" height="250px" class="img-fluid" alt="">  </a>

                    <div class="ps-3">
                     

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
			
			 <!-- Revenue Card -->
          

            

          </div>
        </div><!-- End Left side columns -->
		
		<!-- Rechercher parking-->
		
		</br>

        <!-- Right side columns -->
        
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

   <?php include("../corps/footer/footer.php"); ?>

 <!-- End Footer -->

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>