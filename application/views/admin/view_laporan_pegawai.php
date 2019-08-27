<center>
<form>
  <br>
  <div class="form-group row">
    <label class="control-label">TAHUN</label>
      <div class="controls">
          <select class="input-xxlarge" style="width: 300px" name="select_tahun" id="select_tahun" onchange="selectnama()">
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
  <label for="textfield" class="control-label">PEGAWAI</label>
      <div class="controls">
      <div  class="dropdown">
      <select  required data-rule-required="false" name="select_nama" id="select_nama" style="width: 300px" type="text" onchange="selectnama()" class="input-xxlarge select">
        <option selected disabled></option>
          <?php
                             foreach ($nama as $value){
          ?>
                                <option <?php echo $value == $value->no_akun ? 'selected="selected"' : '' ?>
                                   value="<?php echo $value->no_akun ?>"><?php echo $value->nama ?></option>
                            <?php
            }
          ?>
      </select>
        </div>
      </div>
    </div>


  </div>
</form>
</center>

<div class="form-group row">

<div class="box" >
  <a href="javascript:;" class="btn  btn-warning content-refresh pull-left" onclick="data_graph()" ><i class="
glyphicon glyphicon-new-window"></i> Grafik</a>
      <a href="javascript:;" class="btn  btn-danger content-refresh pull-right" onclick="unduh_data()" ><i class="
fa fa-file-pdf"></i> Unduh PDF</a>
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
                                        <th>Total Jam Telat</th>
                                        <th>Total Poin</th>
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

$(function () {
 $(".select").select2({
     placeholder: 'Pilih Pegawai',
     allowClear: false
 });
});


    function selectnama(){
          let select_tahun = $('#select_tahun').val();
           let select_nama = $('#select_nama').val();
           $.ajax({
               url     : '<?php echo site_url('c_project/get_report_pegawai')?>',
               dataType: 'html',
               type    : 'POST',
               data    : {select_nama, select_tahun},
               success : function(data){
                 $('#data_pegawai').html(data);

               },

           });
       }

       function unduh_data(){
         if ($('#select_nama').val() != ''){
           peg = $('#select_nama').val();
         }
          if ($('#select_tahun').val() != ''){
            thn = $('#select_tahun').val();
          }
        else
          peg = 'select_nama';
          url = "<?php echo site_url()?>c_project/unduh_report_pegawai/"+thn+'/'+peg;
          window.open(url,'_blank');
       }

       function data_graph(){
         let peg = $('#select_nama').val();
         let thn = $('#select_tahun').val();

          url = "<?php echo site_url()?>c_project/graph_pegawai/"+thn+'/'+peg;
          window.open(url,'_blank');
       }

</script>
