<!DOCTYPE html>
<html lang="en">
<head>

    <!--header common files-->
    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/common_header.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/dist/css/dataTables.checkboxes.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>/public/dist/css/jquery.sweet-modal.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            color: white !important;
            border: none !important;
            background: #007BB6 !important;;

        }
        .btn-right-full
        {
            border-radius: 19px;
            border: solid 1px #3c835e;
            background: #51a474;
            box-shadow: 0px 4px 8px rgb(99 191 244 / 34%);
            box-shadow: inset 0px -1px #3c835e;
            padding: 3px 14px 3px 24px;
            color: #fff;
        }
        .sweet-modal-buttons a.greenB.button, .sweet-modal-buttons button.greenB
        {
            background-color: #007BB6;
            border: none;
        }
        .greenB:hover
        {
            background-color: #169de2 !important;
        }

        .btn-right-full:hover
        {
            color: #fff;
        }
        button:focus
        {
            outline: none;
            border: solid 1px #3c835e;
        }
        .mm1
        {
           min-width: 8rem;
        }
        span.dropdown-toggle::after {
            display: inline-block;
            margin-left: -0.745em;
            vertical-align: .255em;
            content: "";
            border-top: 0;
            border-right: -13.7em solid transparent;
            border-bottom: 0;
            border-left: .3em solid transparent;
        }

        .fa-chevron-down:hover
        {
            color: black !important;
        }

        /btn-text-blue {
            color: #0f9aee;
            padding: 0px 0px;
        }

        .tooltip-inner {
            background-color: white;
            color: black;
           border: 1px solid silver;
        }
        .pdd-left-15:hover
        {
            color: black;
        }

    </style>

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
        <form id="myform">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid" >
                <div class="row mb-2" style="border-bottom: 1px solid #888da8;">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="">Vehicle</a></li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="row mb-2" style="border-bottom: 1px solid #888da8; padding-bottom: 10px;">
                    <div class="col-6">
                        <h5 style="padding-top: 3px;" class="m-0">Vehicle</h5>
                    </div><!-- /.col -->
                    <div class="col-6">

                        <div class="float-right" style="margin-right: 20px;padding: 5px;padding-top: 2px;" data-toggle="tooltip" data-placement="top" title="Delete">
                            <a href="javascript:void(0);" id="delete">
                                <img src="<?= base_url(); ?>/public/dist/img/delete.svg" width="25">
                            </a>
                        </div>
                        <div class="float-right" style="margin-right: 10px;">
                            <button type="button" class="btn btn-right-full dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Add New
                            </button>
                            <div class="dropdown-menu mm1">
                                <a class="dropdown-item" href="<?= base_url(); ?>/Vehicle/Add_vehicle">Vehicle</a>
                            </div>
                        </div>



                    </div><!-- /.col -->
                </div><!-- /.row -->
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
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div style="overflow-x:auto;">
                        <table width="100%"  class="dataTable cell-border compact hover row-border  no-footer" id="myTable">
                            <thead>
                            <tr>
                                <th width="2%"></th>
                                <th width="4%">ID</th>
                                <th>Plate No.</th>
                                <th>Vehicle Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        </div>


                    </div>
                </div>
            </div>
        </form>
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

    <?php require_once dirname(__FILE__).DIRECTORY_SEPARATOR . './../includes/common_footer.php'; ?>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>/public/dist/js/dataTables.checkboxes.min.js"></script>
    <script src="<?= base_url();?>/public/dist/js/jquery.sweet-modal.min.js"></script>

    <script>
            // Handle form submission event
            $('#delete').on('click', function(e){
                var form = $('#myform');
                var rows_selected = table.column(0).checkboxes.selected();
                // Iterate over all selected checkboxes
                $.each(rows_selected, function(index, rowId)
                    {
                    // Create a hidden element
                    $(form).append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', 'id[]')
                            .val(rowId)
                    );
                });
                //delete table values
                if($('#myTable input[type="checkbox"]:checked').length)
                {
                    var new_selection=rows_selected.join("||");
                    var string=new_selection;
                    $.sweetModal.confirm('Confirm please?', function() {
                    $.ajax({
                        type: "POST",
                        url:"<?= base_url(); ?>/Vehicle/deleteSelected",
                        data:
                            {
                                string:string
                            },
                        success:function (res)
                        {
                                console.log(res);
                                table.ajax.reload(null,false);

                        }
                    });

                    });
                }else
                {
                    $.sweetModal({
                        content: 'Record Not Selected',
                        icon: $.sweetModal.ICON_WARNING
                    });
                }


                $('input[name="id\[\]"]',form).remove();
                e.preventDefault();
            });

    </script>
    <script type="text/javascript">
        table = $('#myTable').DataTable({
            "order" : [],
            "processing" : true,
            "serverSide" : true,
            "ajax" : {
                "url" : "<?php echo site_url('/Vehicle/show'); ?>",
                "type" : "POST"
            },
            'columnDefs': [
                {
                    'targets': [0],
                    'checkboxes': {
                        'selectRow': true
                    }
                }
            ],
            'select': {
                'style': 'multi'
            },
            'order': [[1, 'asc']]
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });


        function delone(string)
        {
             $.sweetModal.confirm('Confirm please?', function() {
            $.ajax({
                type: "POST",
                url:"<?= base_url(); ?>/Vehicle/deleteone",
                data:
                    {
                        string:string
                    },
                success:function (res)
                {
                    console.log(res);
                    table.ajax.reload(null,false);

                }
            });
            });
        }


    </script>




</body>
</html>
