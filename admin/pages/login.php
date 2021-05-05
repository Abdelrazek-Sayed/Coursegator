<?php require_once("../../global.php"); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $url; ?>admin/assets/css/fontawesome.all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $url; ?>admin/assets/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <!-- <a href="<?= $url; ?>admin/pages/index.php"><b>Login</a> -->
    </div>


    <div class="card">
      <div class="card-body login-card-body">
        <?php include_once("$root/admin/includes/msg.php"); ?>
        <form action="<?= $url; ?>admin/controllers/handle-login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="login" class="btn btn-primary btn-block">logIn</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= $url; ?>admin/assets/js/jquery.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= $url; ?>admin/assets/js/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= $url; ?>admin/assets/js/adminlte.js"></script>

</body>

</html>