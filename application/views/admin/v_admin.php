<head>
	<title>Home</title>
</head>
<body>

<div class="container-full">

      <div class="row">

        <div class="col-lg-12 text-center v-center">
					<div class="container">

          <?php if($this->session->userdata('typeuser')=='1'): ?>
          <h1 class="alert alert-info">From Input Excell</h1>
          <p class="lead">Silahkan input data excell dengan button berikut :</p>
          <?php endif ?>

          <form class="col-lg-12">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">

							<?php if($this->session->userdata('typeuser')=='1'): ?>
              <div align="center">
											<a class="btn btn-success" href="<?php echo site_url("tambah_excel");?>"><i class="fas fa-file-upload"></i> Upload Data</a>
                      <?php endif ?>
                      
<div class="container-full">

      <div class="row">

        <div class="col-lg-12 text-center v-center">
          <div class="container">

            <?php if($this->session->userdata('typeuser')=='2'): ?>
          <h1 class="alert alert-info">From Input Excell</h1>
          <p class="lead">Silahkan input data excell dengan button berikut :</p>
          <?php endif ?>

          <form class="col-lg-12">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">

              <?php if($this->session->userdata('typeuser')=='2'): ?>
              <div align="center">
                      <a class="btn btn-success" href="<?php echo site_url("tambah_excel");?>"><i class="fas fa-file-upload"></i> Upload Data</a>
                      <?php endif ?>
							</div>
						</div>

            </div>
          </form>
        </div>

      </div> <!-- /row -->


  	<br><br><br><br><br>

</div> <!-- /container full -->

<div class="container">
  	<hr>


		</body>
