<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password | Fast Account</title>
    <style>
        .field-icon {
            float: right;
            margin-left: 0;
            margin-top: -25px;
            position: relative;
            z-index: 2;
            right: 6px;
            top: 2px;
        }
        .error
        {
            color: red !important;
        }
        label
                 {
            font-size: 13px;
                 }
    </style>

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
      <p class="login-box-msg">Change Your Password</p>
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

      <form id="form" action="<?= base_url(); ?>/Login/rest_password_change" method="post">
            <input type="hidden" name="usid" value="<?= $userId; ?>">
          <div class="form-group">
              <label for="exampleInputPassword1">New Password</label><span style="color: red"> *</span>
              <input type="password" class="form-control required" name="new_pwd" id="new_pwd" aria-required="true">
              <span toggle="#new_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>
          <!-- Error -->
          <?php if($validation->getError('new_pwd')) {?>
              <div class='alert alert1 alert-danger text-sm mt-2'>
                  <?= $error = $validation->getError('new_pwd'); ?>
              </div>
          <?php }?>
          <div class="form-group">
              <label for="exampleInputEmail1">Confirm Password</label><span style="color: red"> *</span>
              <input type="password" class="form-control required" name="confirm_pwd" id="confirm_pwd" aria-required="true">
              <span toggle="#confirm_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div>
          <!-- Error -->
          <?php if($validation->getError('confirm_pwd')) {?>
              <div class='alert alert1 alert-danger text-sm mt-2'>
                  <?= $error = $validation->getError('confirm_pwd'); ?>
              </div>
          <?php }?>
          <div id="d1">

              <p class="text-semibold no-mrg-btm" style="font-weight: bold;">At least</p>
              <div class="pdd-btm-5" id="d12">1 capital letter <i class="fa fa-times red-text"></i></div>
              <!--  <div class="pdd-btm-5" id=d13>1 small letter <i class="fa fa-times red-text"></i></div>-->
              <div class="pdd-btm-5" id="d15">1 numeric character <i class="fa fa-times red-text"></i></div>
              <div class="pdd-btm-5" id="d14">1 special character <i class="fa fa-times red-text"></i></div>
              <div class="pdd-btm-5" id="d16">Minimum 8 characters <i class="fa fa-times red-text"></i></div>
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
<script>
    // makes sure the whole site is loaded
    jQuery(window).load(function() {
// will first fade out the loading animation
        jQuery("#status").fadeOut();
// will fade out the whole DIV that covers the website.
        jQuery("#preloader").delay(1000).fadeOut("slow");
    })
</script>
<script src="<?= base_url()?>/public/plugins/jquery-validation/jquery.validate.min.js"></script>
<script>

    $(document).ready(function(){

        $("#form").validate({
            errorPlacement: function (error, element)
            {
                element.before(error);
            },
            rules: {                            confirm_pwd: {
                    required : true,
                    equalTo: "#new_pwd"
                },
                new_pwd :{
                    required : true
                }

            },
            messages: {
                confirm_pwd: {
                    required: "This field is required.",
                    equalTo: "Enter same password again"
                },
                new_pwd: {
                    required: "This field is required."
                }
            }
        });
    });

    jQuery.validator.addMethod("CL", function(value, element) {
        return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d.*)(?=.*\W.*)[a-zA-Z0-9\S]{8,}$/.test(value);
    }, "");
    $('#new_pwd').keyup(function() {

        $( "#defError" ).remove();
    });
    //==============
    $(document).ready(function() {
        $('#new_pwd').focus(function(){
            var str=$('#new_pwd').val();
            common_method(str);
            $("#d1").show();
        });
        $('#old_pwd').focus(function(){
            var str=$('#old_pwd').val();
            common_method(str);
            $("#d1").show();
        });
        $('#confirm_pwd').focus(function(){
            var str=$('#confirm_pwd').val();
            common_method(str);
            $("#d1").show();
        });


        $('#old_pwd').keyup(function(){
            var str=$('#old_pwd').val();
            common_method(str);
        });
///////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
        $('#new_pwd').keyup(function(){
            var str=$('#new_pwd').val();
            common_method(str);
        });
///////////////////
///////////

////////////////////////////////
        $('#confirm_pwd').keyup(function(){
            var str=$('#confirm_pwd').val();
            common_method(str);
        });
///////////////////
    });
    ////////////////////////////////
    function common_method(str)
    {
        var upper_text= new RegExp('[A-Z]');
        var lower_text= new RegExp('[a-z]');
        var number_check=new RegExp('[0-9]');
        var special_char= new RegExp('[!/\'^�$%&*()}{@#~?><>,|=_+�-\]');

        var flag='T';

        if(str.match(upper_text)){
            $('#d12').html('1 capital letter <i class="fa fa-check green-color"></i>');
            $('#d12').css("color", "green");
        }else{$('#d12').css("color", "red");
            $('#d12').html('1 capital letter <i class="fa fa-times red-text"></i>');
            flag='F';}

        /*if(str.match(lower_text)){
        $('#d13').html('1 small letter <i class="fa fa-check green-color"></i>');
        $('#d13').css("color", "green");
        }else{$('#d13').css("color", "red");
        $('#d13').html('1 small letter <i class="fa fa-times red-text"></i>');
        flag='F';}
        */
        if(str.match(special_char)){
            $('#d14').html('1 special character <i class="fa fa-check green-color"></i>');
            $('#d14').css("color", "green");
        }else{
            $('#d14').css("color", "red");
            $('#d14').html('1 special character <i class="fa fa-times red-text"></i>');
            flag='F';}

        if(str.match(number_check)){
            $('#d15').html('1 numeric character <i class="fa fa-check green-color"></i>');
            $('#d15').css("color", "green");
        }else{
            $('#d15').css("color", "red");
            $('#d15').html('1 numeric character <i class="fa fa-times red-text"></i>');
            flag='F';}


        if(str.length>7){
            $('#d16').html('Minimum 8 characters <i class="fa fa-check green-color"></i>');

            $('#d16').css("color", "green");
        }else{
            $('#d16').css("color", "red");
            $('#d16').html('Minimum 8 characters <i class="fa fa-times red-text"></i>');

            flag='F';}


        if(flag=='T'){
            $("#d1").show();
        }else{
            $("#d1").show();
        }
        //alert(flag);
    }
    function getSubmit()
    {
        if(!$("#form").validate().form())
        {
            return false;
        }
        else{
            $("#form").submit();
        }
    }

    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

</script>
</body>
</html>
