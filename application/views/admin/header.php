<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/horizontal-menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/iconfonts/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/css/vendor.bundle.addons.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/'); ?>11logo.png" />
    <script>
        var baseurl = "<?php echo base_url("index.php/"); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script>
    <script src="<?= base_url('assets/'); ?>select.js"></script>

    <script src="<?= base_url('assets/'); ?>tampil.js"></script>
    <script rel="stylesheet" src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.10/dist/sweetalert2.all.min.js"></script>
</head>

<body class="horizontal-menu">
    <div class="container-scroller">
        <nav class="navbar horizontal-layout-navbar fixed-top navbar-expand-lg">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/'); ?>12log.png" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url(''); ?>"><img src="<?= base_url('assets/'); ?>12log.png" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex flex-grow">
                <ul class="navbar-nav navbar-nav-left collapse navbar-collapse" id="horizontal-top-example">
                    <li class="nav-item dropdown">
                        <a class="nav-link  active" href="<?= base_url(); ?>">
                            <i class="fa fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  " href="<?= base_url('dashboard/password'); ?>">
                            <i class="fa fa-key"> </i> Edit Password
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="employees-dropdown" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-shopping-cart"></i> Transaksi
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="employees-dropdown">
                            <a class="dropdown-item" href="<?= base_url('dashboard/penjualan'); ?>">
                                <i class="fa fa-shopping-cart mr-2 text-primary"></i>
                                Penjualan
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('dashboard/pengeluaran'); ?>">
                                <i class="fa fa-credit-card mr-2 text-primary"></i>
                                Pengeluaran
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= base_url('dashboard/stock'); ?>">
                                <i class="fa fa-credit-card mr-2 text-primary"></i>
                                Stock
                            </a>

                        </div>
                    </li>
                    <?php if ($this->session->userdata('level') == 'Master Admin') {   ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="employees-dropdown" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-database"></i> Data Master
                            </a>
                            <div class="dropdown-menu navbar-dropdown" aria-labelledby="employees-dropdown">
                                <a class="dropdown-item" href="<?= base_url('setting/chanel'); ?>">
                                    <i class="fa fa-desktop mr-2 text-primary"></i>
                                    Data Chanel
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('setting/harga'); ?>">
                                    <i class="fa fa-database mr-2 text-primary"></i>
                                    Harga
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('setting/user'); ?>">
                                    <i class="fa fa-user mr-2 text-primary"></i>
                                    User
                                </a>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link  " href="<?= base_url('laporan'); ?>">
                            <i class="fa fa-book"> </i> Laporan
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?= base_url('reservasi'); ?>">
                            <i class="fa fa-calendar-check"></i> Reservasi
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile">
                        <a class="nav-link">
                            <div class="nav-profile-text">
                            <?= isset($user['nama_lengkap']) ? $user['nama_lengkap'] : ''; ?>
                            </div>
                            <div class="nav-profile-img">
                                <img src="<?= base_url('assets/'); ?>logo112.png" alt="image" class="img-xs rounded-circle ml-3">
                                <span class="availability-status online"></span>
                            </div>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                            <i class="fas fa-power-off font-weight-bold icon-sm"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="collapse" data-target="#horizontal-top-example">
                    <span class="fa fa-bars"></span>
                </button>
            </div>
        </nav>