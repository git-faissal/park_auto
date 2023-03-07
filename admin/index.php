
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vehicle Parking Management System </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=4koXwNnpJ0Q-i2QAP2Zr59eq5fL95IqmZgEKOb1eyLjS4Oqui8PwE4XDMKghRCDJrEAeAch_zu0PPuWEKu2zqF2uyFcNVoLc3aTFQEjbI2HXl_RkwBjxrl7wOTy_Itjq" charset="UTF-8"></script></head>
<style type="text/css">
  body {
  background-image: url('assets/dist/img/bg1.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body class="hold-transition login-page" >
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>ADMINISTRER</b></a>
    </div>
    <div class="card-body">
      <button type="button" class="btn btn-block btn-primary btn-lg" data-toggle="modal" data-target="#login"><i class="fa fa-lock"> LOGIN </i> </button>
      
      <div class="modal fade" id="login">
                        <div class="modal-dialog modal-sm">
                            <form method="POST" action="controllers/recup-login-admin.php">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">LOGIN</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="row">
                                <div class="col-12">
                                  <div class="input-group mb-3">
                                    <input type="text" name="nom_user" class="form-control" placeholder="Nom d'utiisateur ..">
                                    <div class="input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="input-group mb-3">
                                    <input type="text" name="pass" class="form-control" placeholder="Mot de passe..">
                                    <div class="input-group-append">
                                      <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
                              <input type="submit" class="btn btn-primary w-100" name="envoyer" value="Connecter" class="btn1">
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                        
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<!-- bs-custom-file-input -->
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
