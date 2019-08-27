<title>
<?php echo $sub_judul_form ?>
</title>
<body>

            <?php
            // print_r($ListData);
            // die();
            $error = '<div class="alert alert-danger">
              <strong>ERROR!</strong> <br>Data pegawai  atau Data Periode belum dipilih!
            </div>';
            if($param == 0 or $periode == 0){
              echo $error;
              exit();
            }else{
              // $peg = $param;
            // print_r($periode);
              ?>
              <input id="id_peg" name="id_peg" type="hidden" value="<?php echo $param ?>">
                <input id="id_periode" name="id_periode" type="hidden" value="<?php echo $per ?>">


                      <div class="container">
                    	  <div class="jumbotron">
                    	    <h1>Proses Point Per/Pegawai</h1>
                    	    <p><?php
                          $n = null;
                          $p = null;
                          foreach ($periode as $per) {
                            $p = $per->bulan;
                          }
                            foreach ($result as $x ) {
                              $n = $x->nama;
                            }
                            echo $n;?>
                            <br> Bulan :
                            <?php
                            echo $p;
                          ?></p>
                    	  </div>
                    	</div>

                      <div class="box" >
                                <a href="javascript:;"  class="btn  btn-success content-refresh pull-right" onclick="unduh_data(1)" ><i class="glyphicon glyphicon-plus-sign"></i> Cetak Xls</a>
                                <a href="javascript:;" class="btn  btn-danger content-refresh pull-right" onclick="unduh_data(2)" ><i class="
      glyphicon glyphicon-minus-sign"></i> Cetak PDF</a>
                            </div>

              <?php
              $i=1;
              $total_hasil=0;

              foreach ($result as $key) {
                $hasil = 0;
                $ket = 0;
                $id = 0;

                foreach ($master_point as $m_p ) {
                  if ($key->masuk >= $m_p->akhir && $key->masuk <= $m_p->akhir) {

                    $hasil = $m_p->point;
                    $ket =$m_p->detail;
                    $id = $m_p->id;
                    $total_hasil +=$hasil;
                  }
                  if($id == 6) {
                    if ($key->keterangan == $m_p->awal && $key->keterangan <= $m_p->akhir){
                      $hasil = $m_p->point;
                      $total_hasil += $hasil - 10;
                      $ket = $m_p->detail;
                        }
                      }
                }
              }



            }
                // echo $total_hasil;

                ?>
                <div class="row-fluid">
                      <div class="span12">
                         <div class="box">
                            <div class="box-content">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                    <th>NAMA</th>
                                                    <th>Total Point</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                <td ><?php echo $key->nama ?></td>
                                                 <td ><?php echo $total_hasil ?> </td>
                                                </tr>
                                            </tbody>
                             </table>
                           </div>
                          </div>
                        </div>
                    </div>
                </div>

                <?php
                $i++;
             ?>
</body>

<script type="text/javascript">

     function unduh_data(v){
       if ($('#id_peg').val() != ''){
          detail = $('#id_peg').val();
        }if ($('#id_periode').val() != ''){
            per = $('#id_periode').val();
      }
      else
          detail = 'id_peg';
          per = 'id_periode';
        url = "<?php echo site_url()?>c_project/unduh_data_point/"+detail+'/'+per+'/'+v;
        window.open(url,'_blank');
      }
</script>
