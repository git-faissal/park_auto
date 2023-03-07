<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - Auto-Park</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/icon.png" rel="icon">
  <link href="../assets/img/apple.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  
  <link href="../assets/tel/css/intlTelInput.css" rel="stylesheet" >


  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../assets/img/logo.png" width="150px" height="500px" alt="">
                  <span class="d-none d-lg-block">Auto-Park</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Creer un compte</h5>
                    <p class="text-center small">Remplissez les champs pour la creation de votre compte</p>
                  </div>

                  <form action="../controllers/saveclient.php" method="post" enctype="application/x-www-form-urlencoded"  class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="yourName" class="form-label">Nom</label>
                      <input type="text" name="nom" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Entrer votre nom !</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Prenom</label>
                      <input type="text" name="prenom" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Entrer votre prenom !</div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Telephone</label>
                      <div class="input-group has-validation">
                        <input type="tel" name="telephone" class="form-control" id="name" placeholder="Ex.: +226 76275726">

                        <div class="invalid-feedback">Votre numero de telephone.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Mot de passe</label>
                      <input type="password" name="pass" class="form-control"  required>
                      <div class="invalid-feedback">Votre mot de passe!</div>
                    </div>


                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">Je suis d'accord et j'accepte les <a href="#">termes et condittions</a></label>
                        <div class="invalid-feedback">Vous devez acceptez les terme avant de valider</div>
                      </div>
                    </div>
                    <div class="col-12">
					  <input type="submit" class="btn btn-primary w-100" name="envoyer" value=" Creer un compte " class="btn1">

                      <!--<button class="btn btn-primary w-100" type="submit">Creer un compte</button>-->
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous avez deja un compte ? <a href="pages-login.php">Se connecter</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="#">UJKZ</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <!-- SCRIPT POUR CODE TELEPHONE -->

  <script src="../assets/tel/js/jquery-2.1.4.min.js"></script>
<script src="../assets/tel/js/intlTelInput.js"></script> 
<script>
	  $("#name").intlTelInput({
      initialCountry: "auto",
      geoIpLookup: function(callback) {
          jQuery.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
              var countryCode = (resp && resp.country) ? resp.country : "";
              callback(countryCode);
          });
      },
      utilsScript: "../assets/tel/js/utils.js" // just for formatting/placeholders etc
	});
</script>

  <!-- FIN SCRIPT CODE TELEPHONE -->

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

</body>

</html>