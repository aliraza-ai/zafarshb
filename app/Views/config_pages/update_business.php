<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/common_header.php'; ?>

</head>
<body class="hold-transition text-sm sidebar-mini">
<div class="se-pre-con"></div>
<div class="wrapper">

    <!--Top NavBar-->
    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/topbar.php'; ?>
    <!--ASide Bar-->
    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/sidebar.php'; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Business</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Business</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Update Business</h3>
              </div>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-default-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url() ?>/Login/update_business" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="" for="exampleInputEmail1">Business Name</label>
                                <input type="text" name="businessName" required class="form-control form-control-sm" value="<?=  $results[0]->businessName; ?>" id="exampleInputEmail1" placeholder="Business Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Business Address</label>
                                <input type="text" name="businessAddress" class="form-control" value="<?= $results[0]->businessAddress;?>" id="exampleInputPassword1" placeholder="Business Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" name="city"  class="form-control" value="<?=  $results[0]->city;?>" id="exampleInputEmail1" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">County</label>
                                <input type="text" name="county" value="<?= $results[0]->province;?>" class="form-control" id="exampleInputPassword1" placeholder="County">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Postal Code</label>
                                <input type="text" name="postalCode"  value="<?= $results[0]->postalCode;?>" class="form-control" id="exampleInputPassword1" placeholder="Postal Code">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <input type="text" name="country"  value="<?= $results[0]->country;?>" class="form-control" id="exampleInputPassword1" placeholder="Country">
                            </div>
                        </div>

                        <!--Second col-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="" for="exampleInputEmail1">Phone Number</label>
                                <input type="text" name="phoneNumber"  class="form-control form-control-sm" value="<?=  $results[0]->phoneNumber; ?>" id="exampleInputEmail1" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mobile Number</label>
                                <input type="text" name="mobileNumber" class="form-control" value="<?= $results[0]->mobileNumber;?>" id="exampleInputPassword1" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email"  class="form-control" value="<?=  $results[0]->emailAddress;?>" id="exampleInputEmail1" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Website Address</label>
                                <input type="text" name="website" value="<?= $results[0]->websiteAddress;?>" class="form-control" id="exampleInputPassword1" placeholder="Website Address">
                            </div>
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-6">
                                        <label for="exampleInputPassword1">Logo</label>
                                        <br>
                                        <?php
                                            if($results[0]->logo)
                                            {


                                         ?>
                                                <a href="javascript:void(0);" id="upload"><img id="blah"  src="<?= base_url(); ?>/public/disk/img/<?= $results[0]->logo;?>" width="170"
                                                                                               height="170" alt="your image" /></a><br><br>
                                                <b style="color: slategray;">Upload size: 1MB</b>
                                        <?php    }else{ ?>
                                        <a href="javascript:void(0);" id="upload"><img id="blah"  src="<?= base_url(); ?>/public/dist/img/no-logo.gif" width="170"
                                                height="170" alt="your image" /></a><br><br>
                                        <b style="color: slategray;">Upload size: 1MB</b>
                                        <?php    } ?>
                                    </div>
                                    <div class="col-6">
                                        <br>
                                        <br>
                                        <input type='file'  id="upload-file" name="logo" value="<?= $results[0]->logo; ?> "   onchange="readURL(this);" />
                                        <br><br>
                                        <div id="error" style="margin-bottom: 10px;color: red;font-weight: bold;">

                                        </div>
                                        <span id="removelogo" onclick="remove();" style="cursor: pointer;color: slategray;"><i class="fa fa-times"></i> Remove Logo</span>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!--  third colm-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="" for="exampleInputEmail1">CNIC</label>
                                <input type="text" name="cnic"  class="form-control form-control-sm" value="<?=  $results[0]->cnic; ?>" id="exampleInputEmail1" placeholder="CNIC">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Sales Tax Number</label>
                                <input type="text" name="tax" class="form-control" value="<?= $results[0]->salesTaxNumber;?>" id="exampleInputPassword1" placeholder="Sales Tax Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NTN</label>
                                <input type="text" name="ntn"  class="form-control" value="<?=  $results[0]->ntn;?>" id="exampleInputEmail1" placeholder="NTN">
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer col-md-12">
                    <div class="">
                        <button type="button" onclick="window.location.href='<?php echo base_url(); ?>'" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary submit-btn float-right">Save</button>
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
    <!-- /.control-sidebar -->
    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/common_footer.php'; ?>
    <script>
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



    </script>

</body>
</html>
