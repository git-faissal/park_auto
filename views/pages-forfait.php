<?php
 session_start();
include ("../controllers/expirationsession.php");
include ("../controllers/forfait.php");
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
      <h1>Abonnement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Abonnement</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<?php while($donnees_abn=$request_abn->fetch(PDO::FETCH_OBJ)) { ?>
	  <section class="section profile">
	  <p style="text-align:center;font-size: 24px;" >" Vous avez un forfait en cours ci-dessous les details de l'abonnement effectuer"</p>
	  <p>NB: Vous ne pouvez pas vous reabonnez tant que vous avez un abonnement en cours ..!!!</p>
	<table class="table table-hover">
  <thead >
    <tr style="background-color:#25294e;color:white">
      <th scope="col">N°</th>
      <th scope="col">FORFAIT</th>
      <th scope="col">MONTANT</th>
      <th scope="col">DATE DEBUT</th>
	  <th scope="col">DATE FIN</th>
    </tr>
  </thead>
  <tbody>
    <tr style="color: white;" class="bg-info">
      <th scope="row">#</th>
      <td><?php echo $donnees_abn->categorie_abn;?></td>
	  <td><?php echo $donnees_abn->montant;?></td>
      <td><?php echo $donnees_abn->date_debut;?></td>
      <td><?php echo $donnees_abn->date_fin;?></td>
    </tr>   
  </tbody>
</table>
     </section>
	 <?php } ?>
<!--********************************Affichage des different forfait d'abonnement **************************************-->
    <section class="section profile">
	<p style="text-align:center;font-size: 24px;" >----------------------------------------Abonnement----------------------------------------</p>

<p style="text-align:center;font-size: 24px;" >" Consulte les differents forfait d'abonnement disponible ..!!!"</p>

	<table class="table table-hover">
  <thead >
    <tr style="background-color:#25294e;color:white">
      <th scope="col">N°</th>
      <th scope="col">FORFAIT</th>
      <th scope="col">PRIX</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
<?php  while($donnees=$request->fetch(PDO::FETCH_OBJ)) { ?>

  <tbody>
    <tr style="color: white;" class="bg-info">
      <th scope="row">#</th>
      <td><?php echo $donnees->categorie;?></td>
      <td><?php echo $donnees->montant; ?>-F CFA</td>
      <td>
      <button type="button" style="background-color:#4154f1;" onclick="window.location.replace('../controllers/recup-forfait.php?id_forfait=<?php echo $donnees->id_forfait;?>')"><strong>EFFECTUER</strong></button>
      </td>
    </tr>   
  </tbody>
<?php } ?>
</table>
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