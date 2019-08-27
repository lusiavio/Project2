<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Import Data excel dengan php</title>

		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		
		<!-- Style untuk Loading -->
		<style>
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
	<div>
	<a href="http://localhost/internal/">
		<img src="http://localhost/internal/assets_users/img/header_frontend.png" />
	</a>
</div>

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
				<li class="disable"><a href="index.php">Home</a></li>
		</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
			</div>
	</div>
			</nav>

		<!-- end -->
		</nav>
		<div class="container">
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="disableb">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="import data excel">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disable">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="hasil data">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    

                    <li role="presentation" class="disable">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
					  <li role="presentation" class="active">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="perulangan">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
		<!-- Content -->
		
		<div>
				<br>
				<br>
				 <a href="step4.php" class="btn btn-primary pull-right">
				<span class="glyphicon glyphicon-remove"></span> next
				</a>
				<!-- kembali ke halaman -->
		<a href="upload.php" class="btn btn-danger pull-right">
				<span class="glyphicon glyphicon-remove"></span>Back
			</a>
			 
	</a>
		<!-- Content -->
		
		
			<!-- 
			-- Buat sebuah tombol untuk mengarahkan ke form data data
			-- Tambahkan class btn agar terlihat seperti tombol
			-- Tambahkan class btn-success untuk tombol warna hijau
			-- class pull-right agar posisi link berada di sebelah kanan
			-->
		
			
			
			<h3>Hasil Import Data Keseluruhan </h3>
			<div class="container">
		<div class="alert alert-success">akhir data keseluruhan </div>

	</div>
			</div>
		</div>
	</body>
	</html>
