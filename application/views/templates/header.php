<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inventory Pupuk</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/flat/blue.css">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/morris/morris.css">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="shortcut icon" href="<?=base_url()?>assets/dist/img/iconBuku2.png">
</head>
<body class="hold-transition sidebar-mini" style="overflow: hidden;">
<div class="wrapper">

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>

		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
						class="fa fa-th-large"></i></a>
			</li>
			<li class="nav-item">
				<a href="<?=base_url('logout')?>" class="btn btn-primary" onclick="return confirm('Logout? ')"><i class="fa fa-sign-out"></i></a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?=base_url()?>" class="brand-link">
			<img src="<?=base_url()?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
				 style="opacity: .8">
			<span class="brand-text font-weight-light">Inventory</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block"><?= $this->session->userdata('pengguna_username');?></a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
					<li class="nav-item">
						<a href="<?=base_url()?>" class="nav-link <?php if ($this->uri->segment('1') == null) echo 'active'?>">
							<i class="nav-icon fa fa-home"></i>
							<p class="text">Beranda</p>
						</a>
					</li>
					<?php if ($this->session->userdata('pengguna_level') == 'admin'): ?>
					<li class="nav-item">
						<a href="<?=base_url('pengguna')?>" class="nav-link <?php if ($this->uri->segment(1) == 'pengguna') echo 'active'?>">
							<i class="nav-icon fa fa-user"></i>
							<p class="text">Pengguna</p>
						</a>
					</li>
						<li class="nav-item">
						<a href="<?=base_url('supplier')?>" class="nav-link <?php if ($this->uri->segment(1) == 'supplier') echo 'active'?>">
							<i class="nav-icon fa fa-users"></i>
							<p class="text">Supplier</p>
						</a>
					</li>
					<?php endif ?>
					<li class="nav-item">
						<a href="<?=base_url('pupuk')?>" class="nav-link <?php if ($this->uri->segment(1) == 'pupuk') echo 'active'?>">
							<i class="nav-icon fa fa-tree"></i>
							<p class="text">Pupuk</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('kategori')?>" class="nav-link <?php if ($this->uri->segment('1') == 'kategori') echo 'active'?>">
							<i class="nav-icon fa fa-dashboard" ></i>
							<p>Kategori</p>
						</a>
					</li>
					<?php if ($this->session->userdata('pengguna_level') != 'admin'): ?>
					<li class="nav-item">
						<a href="<?=base_url('masuk')?>" class="nav-link <?php if ($this->uri->segment('1') == 'masuk') echo 'active'?>">
							<i class="nav-icon fa fa-download" ></i>
							<p>Barang Masuk</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?=base_url('keluar')?>" class="nav-link <?php if ($this->uri->segment('1') == 'keluar') echo 'active'?>">
							<i class="nav-icon fa fa-upload" ></i>
							<p>Faktur</p>
						</a>
					</li>
					<?php endif ?>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
			<?php if ($this->session->flashdata('alert') == 'stok_kurang') { ?>
				<div class="alert alert-danger animated fadeInDown" role="alert">
					<button type="button" class="close" data-dismiss="alert"></button>
					Stok tidak cukup
				</div>
			<?php } ?>
			
