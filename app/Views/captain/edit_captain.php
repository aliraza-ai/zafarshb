<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../includes/common_header.php'; ?>
    <style>
        lengend {
            font-family: sans-serif;
            font-size: 10px;
            color: #555555;
        }
        label
        {
            font-size: 13px !important;
            font-weight: bold !important;
            color: #555555 !important;
        }
    </style>
</head>
<body class="hold-transition text-sm sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

    <!--Top NavBar-->
    <?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../includes/topbar.php'; ?>
    <!--ASide Bar-->
    <?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../includes/sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Registration</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Captain Registration</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <form method="post" action="<?= base_url() ?>/Captain/update_Captain" enctype="multipart/form-data">
          <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><b>Captain Detail</b></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <?php if(session()->getFlashdata('msg')):?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?= session()->getFlashdata('msg') ?>
                                    </div>
                                <?php endif;?>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Joining Date <span style="color: red">*</span></label>
                                            <input type="date" name="joindate"  class="form-control form-control-sm" value="<?= $results[0]->joindate; ?>"  placeholder="Date" required>
                                        </div>
                                        <div class="form-group">

                                            <input type="hidden" name="sId"  class="form-control form-control-sm" value="<?= $results[0]->id; ?>"  placeholder="Date" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Captain Name <span style="color: red">*</span></label>
                                            <input type="text" name="name"  class="form-control form-control-sm" value="<?= $results[0]->name; ?>"  placeholder="Captain Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input type="text" name="number"  class="form-control" value="<?= $results[0]->number; ?>" placeholder="Mobile Number">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>

                <!-- /.card-body -->
                <div class="card-footer col-md-12">
                    <div class="">
                        <button type="button" onclick="window.location.href='<?php echo base_url(); ?>/Captain'" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary submit-btn float-right">Save</button>
                    </div>
                </div>

            </div>
            <!-- /.card -->
          </form>
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
    <!-- /.control-sidebar -->
    <?php require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . './../includes/common_footer.php'; ?>
<!-- InputMask -->
<script src="<?= base_url() ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/inputmask/jquery.inputmask.min.js"></script>
<script>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
        function remove()
        {
            $('#blah')
                .attr('src', "<?= base_url(); ?>/public/dist/img/no-logo.gif");
            $('#upload-file').val('');
        }
        function readURL(input)
        {
            if (input.files && input.files[0] && input.files[0].name.match(/\.(jpg|jpeg|png|gif)$/) ) {
                if(input.files[0].size>1048576) {
                    $('#error').html('File size is larger than 1MB!');
                    $('#blah')
                        .attr('src', "<?= base_url(); ?>/public/dist/img/no-logo.gif");
                    $('#upload-file').val('');
                }
                else {

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#blah')
                                .attr('src', e.target.result);
                        };

                        reader.readAsDataURL(input.files[0]);
                    }
                }
            } else {
                $('#blah')
                    .attr('src', "<?= base_url(); ?>/public/dist/img/no-logo.gif");
                $('#upload-file').val('');
                $('#error').html('This is not an image file!');


            }

        }
        $("#upload").click(function(){
            $("#upload-file").trigger('click');
        });
        $(document).ready(function(){
            $('#cnic').inputmask('99999-9999999-9');
            $('#cell').inputmask('9999-9999999');
        });


    </script>

</body>
</html>
