

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
      <label for="textfield" class="control-label">BULAN</label>
          <div class="controls">
          <div  class="dropdown">
          <select  required data-rule-required="false" name="select_bulan" id="select_bulan" style="width: 300px" type="text" onchange="selectbulan()" class="input-xxlarge select">
            <option selected disabled></option>
              <?php
                                 foreach ($bulan as $value){
              ?>
                                    <option <?php echo $value == $value->periode_id ? 'selected="selected"' : '' ?>
                                       value="<?php echo $value->id ?>"><?php echo $value->bulan?></option>
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
  <div class="box-content" >
    <a href="javascript:;" class="btn  btn-warning content-refresh pull-left" onclick="data_graph()" ><i class="
	glyphicon glyphicon-new-window"></i> Grafik</a>
        <a href="javascript:;" class="btn  btn-danger content-refresh pull-right" onclick="unduh_data(2)" ><i class="
  fa fa-file-pdf"></i> Unduh PDF</a>
  <a href="javascript:;" class="btn  btn-success content-refresh pull-right" onclick="unduh_data(1)" ><i class="
fa fa-file-excel"></i> Unduh Xls</a>
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
                                <tbody id="data_semua">
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
     placeholder: 'Pilih Bulan',
     allowClear: true
 });
});



 function selectbulan(){
        let select_tahun = $('#select_tahun').val();
        let select_bulan = $('#select_bulan').val();
        $.ajax({
            url     : '<?php echo site_url('c_project/get_report_semua')?>',
            dataType: 'html',
            type    : 'POST',
            data    : {select_bulan,select_tahun},
            success : function(data){
              $('#data_semua').html(data);
            },

        });
    }

   function unduh_data(v){
     let bln = $('#select_bulan').val();
     let thn = $('#select_tahun').val();

      url = "<?php echo site_url()?>c_project/unduh_report_semua/"+thn+'/'+bln+'/'+v;
      window.open(url,'_blank');
   }

   function data_graph(){
     let bln = $('#select_bulan').val();
     let thn = $('#select_tahun').val();

      url = "<?php echo site_url()?>c_project/graph_semua_pegawai/"+thn+'/'+bln;
      window.open(url,'_blank');
   }

</script>
