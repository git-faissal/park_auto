<?php
 session_start();
include ("../controllers/expirationsession.php");
include ("../controllers/info_stationnement.php");

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
	  <p style="text-align:center;font-size: 24px;" >" Pour Sortir votre engin du Parking veuillez verifie votre Numero matricule et le Modele de l'engin ..!!!"</p>
 
      <div class="col-lg-12">
      <div class="container card info-card sales-card"> 
          <div class="row">
		  
		   <p style="text-align:center" class="card-title" >" Vos voitures Stationner ..!!!" :</p></br>
	   
	  <!--***************************************SORTIE STATIONNEMENT voiture**********************************************-->
		<?php while($donnees_stat=$request->fetch(PDO::FETCH_OBJ)) { 
		    if($donnees_stat->categorie=="voiture"){
		?>   
		   <div class="col-lg-4">
       <p style="text-align:center" >
	      Modele:  <?php echo $donnees_stat->nom_engin;?></br>
	      Matricule: <?php echo $donnees_stat->matricule_engin;?></br>
		  	      Date: <?php echo $donnees_stat->debut_stat;?></br>

		   <img src="../assets/img/parking_voiture.jpg" width="200px" height="200px" alt="">
       <div class="d-grid gap-2 mt-3">
         <a href="../controllers/sorti-parking.php?id_engin=<?php echo $donnees_stat->id_engin; ?>" ><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered"  class="btn btn-success" type="button">Sortir du Parking</button></a>
              </div>
      </p>
		   </div>
			<?php } } ?>
      </div>
	  </div>
	  </div>
	  
	  <!--***************************************SORTIE STATIONNEMENT MOTO**********************************************-->
  <div class="col-lg-12">
      <div class="container card info-card sales-card"> 
          <div class="row">
		  
			   <p style="text-align:center" class="card-title" >" Vos Moto Stationner ..!!!" :</p></br>

       <!-- STATIONNEMENT DE SORTI VOITURE -->
		   <?php while($donnees_moto=$request2->fetch(PDO::FETCH_OBJ)) { 
		    if($donnees_moto->categorie=="moto"){
		?> 
		   <div class="col-lg-4">
       <p style="text-align:center" >
	      Modele:  <?php echo $donnees_moto->nom_engin;?></br>
	      Matricule: <?php echo $donnees_moto->matricule_engin;?></br> 
		  	      Date: <?php echo $donnees_moto->debut_stat;?></br> 

		   <img src="../assets/img/moto2.png" width="200px" height="200px" alt="">
       <div class="d-grid gap-2 mt-3">
             <a href="../controllers/sorti-parking.php?id_engin=<?php echo $donnees_moto->id_engin; ?>" > <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered"  class="btn btn-success" type="button">Sortir du Parking</button>  </a>
              </div>
      </p>
		   </div>
		   <?php } } ?>
      </div>
	  </div>
	  </div>
		  <!--****************************************SORTIE STATIONNEMENT VELO*********************************************-->
  
	  
	  <div class="col-lg-12">
      <div class="container card info-card sales-card"> 
          <div class="row">
		   
		  
			   <p style="text-align:center" class="card-title" >" Vos Velo Stationner ..!!!" :</p></br>

       <!-- STATIONNEMENT DE SORTI VOITURE -->
		   <?php while($donnees_velo=$request3->fetch(PDO::FETCH_OBJ)) { 
		    if($donnees_velo->categorie=="velo"){
		?> 
		   <div class="col-lg-4">
       <p style="text-align:center" >
	      Modele:  <?php echo $donnees_velo->nom_engin;?></br>
	      Matricule: <?php echo $donnees_velo->matricule_engin;?></br>
		  Date: <?php echo $donnees_velo->debut_stat;?></br>

		   <img src="../assets/img/velo3.png" width="200px" height="200px" alt="">
       <div class="d-grid gap-2 mt-3">
       <a href="../controllers/sorti-parking.php?id_engin=<?php echo $donnees_velo->id_engin; ?>"> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#verticalycentered"  class="btn btn-success" type="button">Sortir du Parking</button> </a>
              </div>
      </p>
		   </div>
		   <?php } } ?>
      </div>
	  </div>
	  </div>
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