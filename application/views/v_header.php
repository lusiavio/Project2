<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes" />
<!-- Apple devices fullscreen -->
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<link rel="stylesheet" href="https://bootswatch.com/3/readable/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<style media="screen and (max-width:700px)">
		body { padding-top: 125px; }
	</style>

	<style media="screen and (min-width:701px)">
		body { padding-top: 75px; }
	</style>

	<!--Load chart js-->
<!-- <script type="text/javascript" src="<?php echo base_url().'assets/chartjs/chart.min.js'?>"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


</head>
<body>
	<nav id="myNavbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
					<a href="<?php echo  base_url('home') ?>">
						<img src="<?php echo base_url()?>assets/img/oo.png"/>
					</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
					<?php if($this->session->userdata('typeuser')=='3'): ?>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Penjadwalan<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="c_project/lihat_jadwal_dosen">Lihat</a></li>
						</ul>
					</li>
					<?php endif ?>

				
					<?php if($this->session->userdata('typeuser')!= '3'): ?>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Master<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('index_pegawai') ?>" >Pegawai</a></li>
							<li><a href="<?php echo base_url('index_point') ?>">Perhitungan </a></li>
							<?php if($this->session->userdata('typeuser')=='1'): ?>
							<li><a href="<?php echo base_url('rules_point') ?>">Rules </a></li>
							<?php endif ?>
						</ul>
					</li>
					<?php endif ?>

					<?php if($this->session->userdata('typeuser')!='3'): ?>
					<li class="disable"><a href="<?php echo base_url('report') ?>">Laporan</a></li>
					<?php endif ?>

					<?php if($this->session->userdata('typeuser')!='3'): ?>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Ultilitas<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php if($this->session->userdata('typeuser')=='1'): ?>
							<li><a href="<?php echo base_url('index_users') ?>" >Users</a></li>
							<?php endif ?>
							<li><a href="<?php echo base_url('index_history') ?>" >History</a></li>
						</ul>
					</li>
				<?php endif ?>

				<?php if($this->session->userdata('typeuser')=='1'): ?>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Penjadwalan<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo base_url('c_project/jadwal') ?>" >Lihat</a></li>
							<li><a href="<?php echo site_url('c_project/input_jadwal'); ?>" >Buat</a></li>
						</ul>
					</li>
					<?php endif ?>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('username') ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url('c_project/logout') ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
							</li>
						</ul>
				</ul>
        </div>
    </div>
	</nav>

	<div class="container">
		<center>
		<?php if($this->session->flashdata('user_loggedin')): ?>
			<div class="alert alert-success alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('user_loggedin').'</p>'; ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('suksess_import')): ?>
			<div class="alert alert-success alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('suksess_import').'</p>'; ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('update_suksess')): ?>
			<div class="alert alert-success alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('update_suksess').'</p>'; ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_registered')): ?>
			<div class="alert alert-success alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('user_registered').'</p>'; ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('user_deleted')): ?>
			<div class="alert alert-danger alert-dismissible fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong><?php echo $this->session->flashdata('user_deleted').'</p>'; ?></strong>
			</div>
		<?php endif; ?>

		</center>
	</div>
