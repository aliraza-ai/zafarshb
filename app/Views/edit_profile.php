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
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                <h3 class="card-title">Edit Profile</h3>
              </div>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-default-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                <?php endif;?>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?= base_url() ?>/Login/update_profile">
                <div class="card-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="" for="exampleInputEmail1">First Name</label><span style="color: red"> *</span>
                            <input type="text" name="firstName" required class="form-control form-control-sm" value="<?=  $results[0]->firstName; ?>" id="exampleInputEmail1" placeholder="Enter First name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label><span style="color: red"> *</span>
                            <input type="text" name="lastName" required class="form-control" value="<?= $results[0]->lastName;?>" id="exampleInputPassword1" placeholder="Enter last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label><span style="color: red"> *</span>
                            <input type="email" name="email" required class="form-control" readonly value="<?=  $results[0]->email;?>" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone Number</label><span style="color: red"> *</span>
                            <input type="number" name="mobile" required value="<?= $results[0]->mobile;?>" class="form-control" id="exampleInputPassword1" placeholder="Enter Phone number">
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer col-md-4">
                    <div class="">
                        <button type="button" onclick="window.location.href='<?php echo base_url(); ?>'" class="btn btn-default">Cancel</button>
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

</body>
</html>
