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
    <div class="content-wrapper text-md">
        <!-- Content Header (Page header) -->
        <div class="content-header ">
            <div class="container-fluid" style="border-bottom: 1px solid #dee2e6;padding-top: 10px;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title border-bottom">
                            <h4 class="m-b-10 p-t-10 pull-left">Welcome &nbsp;<span class="gst_name"><?= session()->get("firstName") . " " . session()->get("lastName");?></span></h4>
                            <div class="pull-right">

                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <?= session()->getFlashdata('msg') ?>
                </div>
                <?php endif;?>
                <?php
                    $user=session()->get('userType');
                    if($user==1)
                    {
                ?>
                <div class="container-fluid">
                
                </div>


                <?php
                    }
                ?>
            </div>

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
