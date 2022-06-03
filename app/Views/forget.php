<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forget Password | Fast Account</title>

   <link rel="icon" href="<?php echo base_url();?>/public/fav.png" type="image/gif" sizes="32x32">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/public/dist/css/adminlte.min.css">
    <style>
        .alert1
        {
            background-color: white;
            color: red;
            margin-top: -10px;
            border: none;
            padding: 0;



        }
    </style>
</head>

<?php $validation = \Config\Services::validation(); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="#"><b>Admin</b></a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <center><img src="<?= base_url(); ?>/public/dist/img/ss.png" style="margin: 10px;margin-bottom: 15px;" width="70"></center>
      <p class="login-box-msg">Reset Your Password</p>
        <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif;?>
        <?php if(session()->getFlashdata('msg1')):?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?= session()->getFlashdata('msg1') ?>
            </div>
        <?php endif;?>

      <form action="<?= base_url(); ?>/Login/rest_password" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" required  class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          <!-- Error -->
          <?php if($validation->getError('email')) {?>
              <div class='alert alert1 alert-danger'>
                  <?= $error = $validation->getError('email'); ?>
              </div>
          <?php }?>



        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12" style="padding: 0px 25px;">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <center>
      <div class="reset-pw">
            <a href="<?= base_url(); ?>/Login/" class="btn btn-link"> Back To Login</a>

       </div>
          <br>
       </center>
     

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>
