<center>
  <form>
    <br>
  <div class="form-group row">
    <label class="control-label">TAHUN</label>
      <div class="controls">
          <select class="input-xxlarge" style="width: 300px" name="select_tahun" id="select_tahun" onchange="selectbulan()">
         <option value="">Tahun</option>
            <?php
              foreach ($tahun as $value){?>
                 <option <?php echo $value == $value->tahun ? 'selected="selected"' : '' ?>
                  value="<?php echo $value->tahun ?>"><?php echo $value->tahun ?></option>
                  <?php
                }
            ?>
        </select>
      </div>
  </div>
    <div class="form-group row">


            <select  required data-rule-required="false" name="select_bulan" id="select_bulan" style="width: 300px" type="text" onchange="selectbulan()" class="input-xxlarge select">
              <option selected disabled></option>
              <?php
                                 foreach ($bulan as $value){
              ?>
                                    <option <?php echo $value == $value->periode_id ? 'selected="selected"' : '' ?>
                                       value="<?php echo $value->id ?>"><?php echo $value->bulan ?></option>
                                <?php
                }
              ?>
          </select>


              <select  required data-rule-required="false" name="select_status" id="select_status" style="width: 300px" type="text" onchange="selectbulan()" class="input-xxlarge select_2">
                <option selected disabled></option>
                  <?php
                                     foreach ($status as $value) {

                  ?>
                                        <option <?php echo $value == $value->id ? 'selected="selected"' : '' ?>
                                           value="<?php echo $value->id ?>"><?php
                                          if ($value->id == 1) {
                                            echo 'Tepat Waktu';
                                          } if ($value->id == 2) {
                                            echo 'Telat 5 Menit';
                                          } if ($value->id == 3) {
                                            echo 'Telat 30 Menit';
                                          } if ($value->id == 4) {
                                            echo 'Telat 2 Jam';
                                          } if ($value->id == 5) {
                                            echo 'Telat Lebih Dari 2 Jam';
                                          } if ($value->id == 6) {
                                            echo 'Lupa Absen';
                                          } if ($value->id == 7) {
                                            echo 'Sakit Dengan Surat';
                                          } if ($value->id == 8) {
                                            echo 'Sakit Tanpa Surat';
                                          } if ($value->id == 9) {
                                            echo 'Izin Diganti';
                                          } if ($value->id == 10) {
                                            echo 'Izin Tidak Diganti';
                                          } if ($value->id == 11) {
                                            echo 'ALFA';
                                          } if ($value->id == 12) {
                                            echo 'Jalan Dinas';
                                          } if ($value->id == 13) {
                                            echo 'Pulang Jalan Dinas > 23.00';
                                          } if ($value->id == 14) {
                                            echo 'Cuti';
                                          }
                                          // tambahkan jika ada penambahan rules hehe

                                            ?>

                                         </option>
                                    <?php
                                  }

                  ?>
              </select>

            </div>

          </form>
        </center>

<div class="form-group row">

        <div class="box" >
          <a href="javascript:;" class="btn  btn-warning content-refresh pull-left" onclick="data_graph()" ><i class="
        glyphicon glyphicon-new-window"></i> Grafik</a>
              <a href="javascript:;" class="btn  btn-danger content-refresh pull-right" onclick="unduh_data()" ><i class="
        fa fa-file-pdf"></i> Unduh Per Status</a>
        <a href="javascript:;" class="btn  btn-info content-refresh pull-right" onclick="unduh_semua()" ><i class="
  fa fa-file-pdf"></i> Unduh Semua</a>
              </div>
            </div>


<div class="row-fluid">
      <div class="span12">
         <div class="box">
            <div class="box-content">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>

                                    </tr>
                                </thead>
                                <tbody id="data_pegawai">
                            </tbody>
             </table></div>
          <!-- <div class="actions">
            <a href="javascript:;" class="btn  btn-danger content-refresh" onclick="unduh_laporan_projek(1)" ><i class="fa fa-file-pdf-o"></i> Cetak Pdf</a>
            <a href="javascript:;" class="btn  btn-success content-refresh" onclick="unduh_laporan_projek(2)" ><i class="fa fa-file-excel-o"></i> Cetak Xls</a>
        </div> -->
          </div>
        </div>
    </div>
</div>

<script>

$(function() {
 $(".select").select2({
     placeholder: 'Pilih Bulan',
     allowClear: true
 });
});

$(function() {
 $(".select_2").select2({
     placeholder: 'Masukan Status',
     allowClear: true
 });
});

    function selectbulan(){
          let select_bulan = $('#select_bulan').val();
          let select_status = $('#select_status').val();
          let select_tahun = $('#select_tahun').val();
           $.ajax({
               url     : '<?php echo site_url('c_project/get_report_status')?>',
               dataType: 'html',
               type    : 'POST',
               data    : {select_bulan,select_status, select_tahun},
               success : function(data){
                 $('#data_pegawai').html(data);
               },
           });
       }

       function unduh_data(){
         let thn = $('#select_tahun').val();
         let bln = $('#select_bulan').val();
         let sts = $('#select_status').val();

         if (bln == null){
           bln = 0;
           url = "<?php echo site_url()?>c_project/unduh_report_status/"+thn+'/'+bln+'/'+sts;
              window.open(url,'_blank');
         }
        else if(bln != null){
          url = "<?php echo site_url()?>c_project/unduh_report_status/"+thn+'/'+bln+'/'+sts;
              window.open(url,'_blank');
          }
        }

       function unduh_semua(){
        let thn = $('#select_tahun').val();
        let bln = $('#select_bulan').val();

         if (bln == null){
           url = "<?php echo site_url()?>c_project/unduh_report_status_semua/"+thn;
              window.open(url,'_blank');
         }
        else if(bln != null){
           url = "<?php echo site_url()?>c_project/unduh_report_status_semua/"+thn+'/'+bln;
              window.open(url,'_blank');
          }
        }

        function data_graph(){
          let bln = $('#select_bulan').val();
          let thn = $('#select_tahun').val();

          if (bln == null){
            url = "<?php echo site_url()?>c_project/graph_status/"+thn;
               window.open(url,'_blank');
          }
         else if(bln != null){
           url = "<?php echo site_url()?>c_project/graph_status/"+thn+'/'+bln;
           window.open(url,'_blank');
           }
        }


</script>
