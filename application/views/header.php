<?php 
	error_reporting(0); 

	$user1 = ( $this->session->userdata('level') == 'user1' ) ? 'style="display:none"' : '' ;
	$user2 = ( $this->session->userdata('level') == 'user2' ) ? 'style="display:none"' : '' ;


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simas | Stain Kediri </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- animated -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/animate.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/Ionicons/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- jquery-ui datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/jquery-ui/themes/base/jquery-ui.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/bower_components/select2/dist/css/select2.min.css">
  <!-- sweetalert -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/sweetalert.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/dist/css/skins/_all-skins.css">

  <!-- costom -->
  <style type="text/css">
    table tr th {
      background-color: skyblue;
      color: white;
    }

    .note {
      color: salmon;
    }
  </style>

  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
</head>
<!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url() ?>welcome" class="logo" title="SIMAS">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIMAS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li title="akun"><a href="<?= base_url() ?>lain/akun">Selamat Datang, <?= $this->session->userdata('nama'); ?></a></li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGASI</li>
        <!-- Optionally, you can add icons to the links -->
        <!-- surat masuk -->
        <li title="surat masuk" <?= $user2; ?> class="treeview">
          <a href="#"><i class="fa fa-envelope-o"></i> <span>Surat Masuk</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li title="lihat data" ><a href="<?=base_url().'masuk' ?>"><i class="fa fa-envelope-o"></i> Lihat Data</a></li>
            <li title="tambah data" ><a href="<?=base_url().'masuk/tambah' ?>"><i class="fa fa-plus"></i> Tambah Data</a></li>
          </ul>
        </li>


        <!-- surat keluar -->
        <li title="surat keluar" <?= $user2; ?> class="treeview">
          <a href="#"><i class="fa fa-envelope-open-o"></i> <span>Surat Keluar</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li title="lihat data" ><a href="<?=base_url().'keluar' ?>"><i class="fa fa-envelope-o"></i> Lihat Data</a></li>
            <li title="tambah data" ><a href="<?=base_url().'keluar/tambah' ?>"><i class="fa fa-plus"></i> Tambah Data </a></li>
          </ul>
        </li>


        <!-- disposisi -->
        <li title="disposisi" <?= $user1; ?> ><a href="<?=base_url().'disposisi' ?>"><i class="fa fa-exchange"></i> <span>Disposisi</span> 

        </a></li>


        <!-- laporan -->
        <li title="laporan" <?= $user2; ?> <?= $user1; ?> class="treeview" ><a href="#"><i class="fa fa-print"></i> <span>Laporan</span> 
       		<span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li title="harian" ><a href="<?=base_url() ?>laporan/harian"><i class="fa fa-print"></i> Harian </a></li>
            <li title="sesuaikan" ><a href="<?=base_url()?>laporan"><i class="fa fa-print"></i> Sesuaikan</a></li>
          </ul>
        </li>


        <!-- kontak -->
        <li title="kontak" <?= $user2; ?> class="treeview">
          <a href="#"><i class="fa fa-id-card"></i> <span>Kontak</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li title="kontak luar" ><a href="<?= base_url() ?>kontak_luar"><i class="fa fa-id-card"></i> Kontak Luar</a></li>
            <li title="kontak dalam" ><a href="<?= base_url() ?>kontak_dalam"><i class="fa fa-id-card-o"></i> Kontak Dalam</a></li>
          </ul>
        </li>


        <!-- lain lain -->
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Lain-lain</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul title="lain-lain" class="treeview-menu">
          	<li title="akun saya"><a href="<?= base_url() ?>lain/akun"><i class="fa fa-user"></i> Akun Saya</a></li>
          	<li title="pengguna" <?= $user1; ?> <?= $user2; ?> ><a href="<?= base_url() ?>lain/pengguna"><i class="fa fa-users"></i> Pengguna</a></li>
            <li title="riwayat" <?= $user1; ?> <?= $user2; ?> ><a href="<?= base_url() ?>lain/riwayat"><i class="fa fa-star-o"></i> Riwayat</a></li>
            <li title="panduan sistem" ><a href="<?= base_url() ?>lain/panduan"><i class="fa fa-book"></i> Panduan Sistem</a></li>
            <li title="tentang aplikasi" ><a href="<?= base_url() ?>lain/about"><i class="fa fa-users"></i> Tentang Aplikasi</a></li>
          </ul>
        </li>


        <!-- logout -->
        <li title="keluar" ><a class="delete" href="<?= base_url() ?>autentikasi/logout" ><i class="fa fa-power-off"></i> <span>Keluar</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">