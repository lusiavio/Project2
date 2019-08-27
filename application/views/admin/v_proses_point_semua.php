<title>
<?php echo $sub_judul_form ?>
</title>

<?php
$error = '<div class="alert alert-danger">
  <strong>ERROR!</strong> <br>Periode belum dipilih!
</div>';;

if ($periode == 0) {
  echo $error;
}else{

 ?>
<body>
  <input id="id_periode" name="id_periode" type="hidden" value="<?php echo $periode ?>">
  <div class="container-full">
    <div class="jumbotron">
      <center>
      <h1>Kalkulasi Point Pegawai</h1>
      <h1><?php
      $bulan = null;
      $tahun = null;
        foreach ($result as $detail) {
          $bulan = $detail->bulan;
          $tahun = $detail->tahun;
        }
        echo $bulan.' '.$tahun;
      ?></h1>
    </div>
    <center>
  </div>
  <div class="container">
    <div class="panel-group">
      <div class="panel panel-primary">
          <div class="panel-heading">Form Kalkulasi</div>
          <div class="panel-body">

<div class="form-group row">
            <a href="javascript:;"  class="btn  btn-success content-refresh pull-right" onclick="unduh_data(1)" ><i class="fa fa-file-excel"></i> Cetak Xls</a>
</div>
                          <div class="row-fluid">
                            <div class="span12">
                               <div class="box">
                                  <div class="box-content">
                                                  <div class="table-responsive">
                                                      <table class="table table-hover">
                                                          <thead>
                                                              <tr>
                                                                <th>No</th>
                                                                <th>NAMA</th>
                                                                <th>Total Point</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                            <?php
                                                            $i = 1;
                                                                foreach ($result as $key) { ?>
                                                          <tr>
                                                            <td class="col-md-1"><?php echo $i ?></td>
                                                            <td class="col-md-6"><?php echo $key->nama ?></td>
                                                            <td class="col-md-3"><?php echo $key->poin ?> </td>
                                                          </tr>
                                                          <?php
                                                          $i++;

                                                        }
                                                      }
                                             ?>
                                                      </tbody>
                                       </table>
                                     </div>
                                 </div>
                               </div>
                             </div>
                           </div>

                                 </div>
                                 </div>

                         </div>
</body>

<script type="text/javascript">

     function unduh_data(v){
       if ($('#id_periode').val() != ''){
           per = $('#id_periode').val();
     }
     else
       per = 'id_periode';
        url = "<?php echo site_url()?>c_project/unduh_data_point_semua/"+per+'/'+v;
        window.open(url,'_blank');
      }
</script>
