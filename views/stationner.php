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

    <div class="col-lg-12">
      <div class="container card info-card sales-card"> 
          <div class="row">
		  
		   <p class="card-title" >|  Rechercher une place pour stationner :</p></br>
       <p class="card-title" style="text-align:center" > CHOISIR VOTRE CATEGORIE:</p>
	   
       <!-- STATIONNEMENT DE VOITURE -->
		   
		   <div class="col-lg-4">
       <p style="text-align:center" >
		   <img src="../assets/img/parking.png" width="200px" height="200px" alt="">
       <div class="d-grid gap-2 mt-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered"  class="btn btn-success" type="button">Stationner</button>
              </div>
      </p>
		   </div>

         <!-- Vertically centered Modal Pour voiture ***********************************************-->
        
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Renseigner l'information sur votre voiture a stationner</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					
 <!-- Debut Formulaire -->
              <form action="../controllers/recup-stationnement.php" method="post" enctype="application/x-www-form-urlencoded" class="row g-3">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Modele de la voiture()*</label>
                  <input type="text" name="model_voiture" class="form-control" id="inputName5" required>
                </div>
			    <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Categorie :</label>
				  <!-- <input type="text" name="voiture" class="form-control" value="voiture" placeholder=Voiture>-->
                  <input type="text" name="categorie" value="voiture" class="form-control" id="inputEmail5" >
                </div>

                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Numero Matricule(*)</label>
                  <input type="text" name="num_matricule" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password(*)</label>
                  <input type="password" name="password" class="form-control" id="inputPassword5" required>
                </div> 
              
                <div class="text-center">
				<input type="submit" class="btn btn-primary" name="envoyer" value="valider" class="btn1">
               <!--   <button type="submit" class="btn btn-primary">valider</button>-->
                  <button type="reset" class="btn btn-secondary">effacer</button>
                </div>
              </form>
	<!-- Fin du formulaire-->      
             	</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                     <!-- <button type="button" class="btn btn-primary">Valider</button>-->
                    </div>
                  </div>
                </div>
              </div>
<!-- ************************************Fin Modal Voiture*******************************-->


 <!-- *****************************************FIN STATIONNEMENT DE VOITURE************************************** -->
	   
	   
<!--*************************************Debut stationnement Moto*************************************************************-->
		   <div class="col-lg-4">
       <p style="text-align:center" >
		   <img src="../assets/img/moto.png" width="200px" height="200px" alt=""> 
       <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered200" class="btn btn-success" type="button">Stationner</button>
              </div>
      </p>
		   </div>
		   
		   
         <!-- Vertically centered Modal Pour moto ***********************************************-->
        
              <div class="modal fade" id="verticalycentered200" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Renseigner l'information votre moto a stationner</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					
 <!-- Debut Formulaire -->
              <form action="../controllers/recup-stationnement.php" method="post" enctype="application/x-www-form-urlencoded" class="row g-3">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Modele de la moto</label>
                  <input type="text" name="model_voiture" class="form-control" id="inputName5" required>
                </div>
				 <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Categorie :</label>
				  <!-- <input type="text" name="voiture" class="form-control" value="voiture" placeholder=Voiture>-->
                  <input type="text" name="categorie" value="moto" class="form-control" id="inputEmail5" >
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Numero Matricule</label>
                  <input type="text" name="num_matricule" class="form-control" id="inputEmail5" required>
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="inputPassword5" required>
                </div> 
              
                <div class="text-center">
				<input type="submit" class="btn btn-primary" name="envoyer" value="valider" class="btn1">
                  <button type="reset" class="btn btn-secondary">effacer</button>
                </div>
              </form>
	<!-- Fin du formulaire-->      
             	</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                     <!-- <button type="button" class="btn btn-primary">Valider</button>-->
                    </div>
                  </div>
                </div>
              </div>
<!-- ************************************Fin Modal moto*******************************-->


		   
		   
<!--************************************* Debut stationnement Velo *************************************************************-->

		   <div class="col-lg-4">
       <p style="text-align:center" >
      
       <img src="../assets/img/velo.png" width="200px" height="200px" alt="">
       <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered300" class="btn btn-success" type="button">Stationner</button>
              </div>
      </p>
		   </div>
		   
		   
         <!-- Vertically centered Modal Pour velo ***********************************************-->
        
              <div class="modal fade" id="verticalycentered300" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Renseigner l'information sur votre velo a stationner</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					
 <!-- Debut Formulaire -->
              <form action="../controllers/recup-stationnement.php" method="post" enctype="application/x-www-form-urlencoded" class="row g-3">
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Modele du velo(*)</label>
                  <input type="text" name="model_voiture" class="form-control" id="inputName5" required>
                </div>
				<div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Categorie :</label>
				  <!-- <input type="text" name="voiture" class="form-control" value="voiture" placeholder=Voiture>-->
                  <input type="text" name="categorie" value="velo" class="form-control" id="inputEmail5" >
                </div>
                <div class="col-md-6">
                  <label for="inputEmail5" class="form-label">Numero Matricule</label>
                  <input type="text" name="num_matricule" class="form-control" id="inputEmail5" >
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">Password(*)</label>
                  <input type="password" name="password" class="form-control" id="inputPassword5" required>
                </div> 
              
                <div class="text-center">
				<input type="submit" class="btn btn-primary" name="envoyer" value="valider" class="btn1">
                  <button type="reset" class="btn btn-secondary">effacer</button>
                </div>
              </form>
	<!-- Fin du formulaire-->      
             	</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ferme</button>
                     <!-- <button type="button" class="btn btn-primary">Valider</button>-->
                    </div>
                  </div>
                </div>
              </div>
<!-- ************************************Fin Modal Velo*******************************-->


		   
<!--*************************************Fin *************************************************************-->

		  
         
		  </div>
</div>
		</div>
     </section>

  </main><!-- End #main --><!-- End #main -->

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