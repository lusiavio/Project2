<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data excel dengan php</title>
		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			/*.cc{
				background-color: lightgrey;
			}*/
			 #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		.wizard {
		margin: 20px auto;
		background: #fff;
	}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

	.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
	}

	.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
	}

	span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
	}
	span.round-tab i{
    color:#555555;
	}
	.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
	}
	.wizard li.active span.round-tab i{
    color: #5bc0de;
	}

	span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
	}

	.wizard .nav-tabs > li {
    width: 25%;
	}

	.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
	}

	.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
	}

	.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
	}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

	.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
	}

	.wizard h3 {
		margin-top: 0;
	}
	.step1 .row {
    margin-bottom:10px;
	}
	.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
	}
	.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
	}
	.dropselectsec {
		width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
	}
	.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
	}
	.mar_ned {
	margin-bottom:10px;
	}
	.wdth {
    width:25%;
	}
	.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
	}


	/* according menu */
	#accordion-container {
    font-size:13px
	}
	.accordion-header {
    font-size:13px;
	background:#ebebeb;
	margin:5px 0 0;
	padding:7px 20px;
	cursor:pointer;
	color:#fff;
	font-weight:400;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px
	}
	.unselect_img{
	width:18px;
	-webkit-user-select: none;  
	-moz-user-select: none;     
	-ms-user-select: none;      
	user-select: none; 
	}
	.active-header {
	-moz-border-radius:5px 5px 0 0;
	-webkit-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	background:#F53B27;
	}
	.active-header:after {
	content:"\f068";
	font-family:'FontAwesome';
	float:right;
	margin:5px;
	font-weight:400
	}
		.inactive-header {
	background:#333;
	}
	.inactive-header:after {
	content:"\f067";
	font-family:'FontAwesome';
	float:right;
	margin:4px 5px;
	font-weight:400
	}
	.accordion-content {
	display:none;
	padding:20px;
	background:#fff;
	border:1px solid #ccc;
	border-top:0;
	-moz-border-radius:0 0 5px 5px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px
	}
	.accordion-content a{
	text-decoration:none;
	color:#333;
	}
	.accordion-content td{
	border-bottom:1px solid #dcdcdc;
	}

	@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }

	   <!-- css untuk loading  -->
        #loading{
			background: whitesmoke;
			position: absolute;
			top: 140px;
			left: 82px;
			padding: 5px 10px;
			border: 1px solid #ccc;
		}
		</style>
</head>
<body>
<!-- BIT -->
	<div>
	<a href="index.php">
		<img src="http://localhost/excel/excel/assetss/img/header_frontend.png" />
	</a>
	</div>
	<!-- script -->
	<script src="assetss/js/jquery-1.10.2.min.js"></script>
	<script src="assetss/js/bootstrap.min.js"></script>
	</div>
	<!-- end  -->
	
	<!-- Membuat Menu Header / Navbar -->
	
	<nav class="navbar navbar-inverse">
	<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
	<a class="navbar-brand" href="#"  style="color: white;">Import Data excel</a>
			</div>
	<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
				<li class="disable"><a href="<?php echo base_url('index.php/c_project/home') ?>">Home</a></li>
				<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Master
	<span class="caret"></span></a>
				<ul class="dropdown-menu">
				<li><a href="<?php echo base_url('index.php/c_project/buku') ?>">Import excel & perhitungan</a></li>
				<li><a href="<?php echo base_url('index.php/c_project/point') ?>">Master Point</a></li>
				<li><a href="#">Master Libur</a></li>
				</ul>
			</li>
		</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span>admin</a></li>
			<li><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			</div>
	</div>
			</nav>

		<!-- end -->
	<div>
		<hr>
			<h3>Master Point<h3>
		</div>
		</nav>
		
		<!-- Content -->
	<?php foreach ($list_data as $master_point){ ?>

		<form action="<?php echo base_url('index.php/c_project/update2'); ?>" method="POST">
		<table align="center">
		<td>id</td>
			<tr>
				<td>
					<input type="text" name="id" size="50" value="<?php echo $master_point->id; ?>">
				</td>
			</tr>
		<td>Nama</td>
			<tr>
				<td>
					<input type="text" name="nama" size="50" value="<?php echo $master_point->nama; ?>">
				</td>
			</tr>
		<td>awal</td>
			<tr>
				<td>
					<input type="time" name="awal" size="50" value="<?php echo $master_point->awal; ?>">
				</td>
			</tr>
		<td>akhir</td>
			<tr>
				<td>
					<input type="time" name="akhir" size="50" value="<?php echo $master_point->akhir; ?>">
				</td>
			</tr>
		<td>Point</td>
			<tr>
				<td>
					<input type="text" name="point" size="50" value="<?php echo $master_point->point; ?>">
				</td>
			</tr>
			<tr>
				<td colspan="3" align="right">
					<input type="submit" name="submit" value="Edit master libur ">
				</td>
			</tr>
		</table>
		<br/>
	</form>
		<?php }?>	
		
		<div>
		<br>
		<br>
		
	
</form>

</body>
</html>