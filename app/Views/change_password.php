<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "includes/common_header.php";?>
</head>
<body class="hold-transition text-sm sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

    <!--Top NavBar-->
    <?php include_once "includes/topbar.php";?>

    <!--ASide Bar-->
    <?php include_once "includes/sidebar.php";?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Change Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Change Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <?php if(session()->getFlashdata('msg')):?>
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?= session()->getFlashdata('msg') ?>
              </div>
          <?php endif;?>
          <?php if(session()->getFlashdata('error')):?>
              <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <?= session()->getFlashdata('error') ?>
              </div>
          <?php endif;?>
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <form id="form" method="post" action="<?= base_url(); ?>/Login/change_pwd">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="" for="exampleInputEmail1">Old Password</label><span style="color: red"> *</span>
                                <input type="password" class="form-control required" name="old_pwd" id="old_pwd" aria-required="true">
                                <span toggle="#old_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">New Password</label><span style="color: red"> *</span>
                                <input type="password" class="form-control required" name="new_pwd" id="new_pwd" aria-required="true">
                                <span toggle="#new_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label><span style="color: red"> *</span>
                                <input type="password" class="form-control required" name="confirm_pwd" id="confirm_pwd" aria-required="true">
                                <span toggle="#confirm_pwd" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>

                        </div>
                        <div class="col-md-4 offset-md-1">
                            <div id="d1">

                                <p class="text-semibold no-mrg-btm" style="font-weight: bold;">At least</p>
                                <div class="pdd-btm-5" id="d12">1 capital letter <i class="fa fa-times red-text"></i></div>
                                <!--  <div class="pdd-btm-5" id=d13>1 small letter <i class="fa fa-times red-text"></i></div>-->
                                <div class="pdd-btm-5" id="d15">1 numeric character <i class="fa fa-times red-text"></i></div>
                                <div class="pdd-btm-5" id="d14">1 special character <i class="fa fa-times red-text"></i></div>
                                <div class="pdd-btm-5" id="d16">Minimum 8 characters <i class="fa fa-times red-text"></i></div>
                            </div>
                        </div>
                    </div>

                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer col-md-4">
                    <div class="">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary float-right">Save and Close</button>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
         
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <!-- <aside class="control-sidebar control-sidebar-dark">
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside> -->
    <!-- /.control-sidebar -->

    <?php include_once "includes/common_footer.php";?>
    <script src="<?php echo base_url();?>/public/plugins/jquery-validation/jquery.validate.min.js"></script>
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
