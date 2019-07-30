<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>|Non ASN - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url();?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/datatable.css"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/big.css"/>
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/bootstrap-datepicker.css"/>
  <!-- Custom styles for this template-->
  <link href="<?= base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url();?>">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-atom"></i>
        </div>
        <div class="sidebar-brand-text mx-3">|Non ASN </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url();?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#rbac" aria-expanded="true" aria-controls="rbac">
          <i class="fas fa-fw fa-cog"></i>
          <span>User Management</span>
        </a>
        <div id="rbac" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User</h6>
            <!-- <a class="collapse-item" href="buttons.html">ASN</a> -->
            <a class="collapse-item" href="<?= base_url();?>index.php/dashboard/add_user">Add User</a>
            <!-- <a class="collapse-item" href="<?= base_url();?>index.php/daftar/absen">Akses</a> -->
          </div>
        </div>
      </li>
      <!-- Divider -->
      <!-- <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div> -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Presensi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Daftar Presensi</h6>
            <!-- <a class="collapse-item" href="buttons.html">ASN</a> -->
            <a class="collapse-item" href="<?= base_url();?>index.php/daftar">Lihat Daftar</a>
            <a class="collapse-item" href="<?= base_url();?>index.php/daftar/absen">Lihat Presensi</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kolapse-izin" aria-expanded="true" aria-controls="kolapse-izin">
          <i class="fas fa-fw fa-cog"></i>
          <span>Permohonan Pengajuan</span>
        </a>
        <div id="kolapse-izin" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Permohonan Pengajuan</h6>
            <!-- <a class="collapse-item" href="buttons.html">ASN</a> -->
            <a class="collapse-item" href="<?= base_url();?>index.php/izin">izin Cuti</a>
            <!-- <a class="collapse-item" href="<?= base_url();?>index.php/daftar/absen">Lihat Presensi</a> -->
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
		
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                <?php 
                  echo $_SESSION["user_nama"]," - ",$_SESSION['user_tl'];
                ?>
                </span>
                <img class="img-profile rounded-circle" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/220px-User_icon_2.svg.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url();?>index.php/dashboard/show_pegawai_id">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url() ?>index.php/dashboard/logout" >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
				        </a>
				        <!-- <a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn-xs btn-danger"><i class="fa fa-sign-out"></i> Logout</a> -->
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        
  
<!-- <!DOCTYPE html>
<html>
<head>
	<title> Dashboard - NON ASN</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/assets/css/datatable.css"/>
	
	<script type="text/javascript" src="<?= base_url();?>/assets/js/jquery.js"></script>
	<script type="text/javascript" src="<?= base_url();?>/assets/js/datatable.min.js"></script>
    <script type="text/javascript" src="<?= base_url();?>/assets/js/style.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">NON ASN</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<div class="navbar-form navbar-right">
		<a href="<?php echo base_url() ?>index.php/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
	</div>
</nav> -->