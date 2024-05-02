<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/theme.css" rel="stylesheet">
        <link href="<?php echo base_url();?>assets/css/font-awesome.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand">Digital Perpustakaan</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                          <ul class="nav pull-right">
                            <ul class="nav nav-icons">
                            <li><a href="#"><i class="icon-user"></i> <?= $this->session->userdata('username'); ?></a></li>
                                <li><a href="<?= base_url();?>index.php/auth/logout"><i class="icon-signout"></i> Logout</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                    <div class="sidebar">
                            <ul class="widget widget-menu unstyled bg-info">
                                <li><a href="<?= base_url();?>dashboard_admin"><i class="menu-icon icon-dashboard"></i>Dashboard
                                </a></li>
                            </ul>
                            <ul class="widget widget-menu unstyled">
                            <li><a href="<?= base_url();?>buku/tampil_buku_admin"><i class="menu-icon icon-table"></i>Data Buku</a></li>
                            
                            <li><a href="<?= base_url();?>kategori/tampil_kategori_admin"><i class="menu-icon icon-table"></i>Kategori Buku</a></li>

                            <li><a href="<?= base_url();?>user/tampil_user_admin"><i class="icon-user"></i>Data user</a></li>

                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-tasks">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Laporan</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="<?= base_url();?>buku/pdf"><i class="icon-paste"></i> Laporan Transaksi PDF</a></li>
                                        <li><a href="<?= base_url();?>buku/excel"><i class="icon-paste"></i> Laporan Transaksi Excel</a></li>
                                    </ul>

                                </div>
                                </div>

                        <div class="span9">
                        <div class="content">
                            
                                <?php echo $contents;?>

                        </div>
                    </div>
                </div>
                

        <script src="<?php echo base_url()?>assets/js/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>assets/js/common.js" type="text/javascript"></script>
        
        <script>
        $(document).ready(function() {
            $('table1').dataTable();

        } );
    </script>
    </body>
    </html>
