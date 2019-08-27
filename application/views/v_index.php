<!DOCTYPE html>
<html>
	<head>
		<title>Login App</title>
		<meta charset="utf-8">
			<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Load File bootstrap.min.css yang ada difolder css -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<style type="text/css">
			/*.cc{
				background-color: lightgrey;
			}*/
			@import "bourbon";

	.wrapper {
	margin-top: 80px;
	margin-bottom: 80px;
	}

	.form-signin {
	max-width: 380px;
	padding: 15px 35px 45px;
	margin: 0 auto;
	background-color: #fff;
	border: 1px solid rgba(0,0,0,0.1);

  .form-signin-heading,
	.checkbox {
	  margin-bottom: 30px;
	}

	.checkbox {
	  font-weight: normal;
	}

	.form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
		@include box-sizing(border-box);

		&:focus {
		  z-index: 2;
		}
	}

	input[type="text"] {
	  margin-bottom: -1px;
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}

	input[type="password"] {
	  margin-bottom: 20px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	}

		</style>
	</head>
	<body>
		<!-- BIT -->
			<div>
			<body class="theme-grey">
			<div>
				<a href="<?php echo site_url('') ?>">
					<img src="<?php echo base_url()?>assets/img/oo.png"/>
				</a>
			</div>
				<div style="background-color:#2777c5; height:2px;">&nbsp;</div>
			</div>

						<?php if($this->session->flashdata('login_failed')): ?>
							<div class="alert alert-danger alert-dismissible fade in">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								<strong><?php echo $this->session->flashdata('login_failed').'</p>'; ?></strong>
							</div>
						<?php endif; ?>

  <div class="wrapper">
    <form class="form-signin" action="<?php echo base_url('index.php/c_project/cek_user') ?>" method="POST">
      <h2 class="form-signin-heading"><center>Login</center></h2>
      <input type="text" class="form-control" name="username" placeholder="username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>


	</body>
</html>
