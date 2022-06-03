<style>
    .fa-circle
    {
        font-size: 0.7rem !important;
    }
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<!--    class="brand-link"-->
    <a href="<?php echo base_url(); ?>">
<!--        <img src="--><?php //echo base_url(); ?><!--/public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light"> <img src="<?php echo base_url();  ?>/public/dist/img/logo.png" class="img-fluid"></span>
    </a>
    +
    <!-- Sidebar -->
    <div class="sidebar" style="margin-top: -5px;margin-right: 2px;">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-is-opening menu-open">
                    <a href="<?= base_url();?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                             Captain & Vehicle
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Captain/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Captain</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Vehicle/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicle</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- For Entry -->
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            Entry
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Home/bank_accounts" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Outsource</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Home/expense_payments" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Personal</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!--  Reports   -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Reports
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Reports/nominal_reports" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nominal Records</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Reports" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bank Reports</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Employee/salary_report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Salary Reports</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url()?>/Sale/sale_report_File" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>File Sale Reports</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            System
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url()?>/Home/update_business" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Business Information</p>
                            </a>
                        </li>
                      

                    </ul>
                </li>

        
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>