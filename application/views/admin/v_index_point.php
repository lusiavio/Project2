
<title><?php echo $sub_judul_form ?></title>
<body>
  <div class="container">
  <div class="panel-group">
    <div class="panel panel-danger">
        <div class="panel-heading"><?php echo $sub_judul_form;?></div>
        <div class="panel-body">

        <center>
          <form >

            <div class="box-content">
              <?php echo form_open('c_project/index_point',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>

              <div class="form-group row">
                        <label for="textfield" class="control-label">Periode</label>
                          <div class="controls">
                            <div  class="dropdown">
                            <select data-rule-required="true" style="width: 250px" name="periode" id="periode" class="input-xxlarge select2">
                              <option selected disabled> </option>
                      <?php

                                           foreach ($periode as $p){?>
                                              <option <?php echo $p == $p->id ? 'selected="selected"' : '' ?>
                                               value="<?php echo $p->id ?>"><?php echo $p->bulan?></option>
                                              <?php
                                              }
                                           ?>
                            </select>
                          </div>
                  </div>
              </div>

          </div>


          <div class="form-group row">
            <label for="textfield" class="control-label">LIST PEGAWAI</label>
                <div class="controls">
                <div  class="dropdown">
                <select  required data-rule-required="false" name="select_nama" style="width: 300px" id="select_nama" type="text" onchange="selectnama()" class="input-xxlarge select">
                  <option selected disabled></option>
                    <?php
                                       foreach ($point as $value){
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

        </form>
        </center>


              <br>
              <a href="javascript:;"  id="btn_semua" class="btn  btn-danger content-refresh pull-right" onclick="process_point_semua()" > <i class="glyphicon glyphicon-ok"></i>  Proses Poin</a>
              <!-- <a href="javascript:;"  class="btn  btn-success content-refresh pull-right" onclick="process_point()" ><i class="glyphicon glyphicon-user"></i> Satuan</a> -->

  </div>
</div>

<div class="panel panel-info">
     <div class="panel-heading">Form Pegawai</div>
     <div class="panel-body">
       <div class="row-fluid">
             <div class="span12">
                <div class="control-group">
                   <div class="box-content">
                               <div class="table-responsive">
                                   <table width="100%" class="table table-hover">
                                       <thead>
                                           <tr>
                                               <th>No</th>
                                               <th>NAMA</th>
                                               <th>Tanggal </th>
                                               <th>Masuk</th>
                                               <th>Keluar</th>
                                               <th>Poin</th>
                                               <th>Keterangan</th>
                                               <th>Total Point</th>
                                               <th>Aksi</th>

                                           </tr>
                                       </thead>
                                       <tbody id="data_pegawai">
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
</div>

</body>

<script>

$(function () {
	$(".select2").select2({
		  placeholder: 'Periode Sesuai Data Excell',
			allowClear: false
	});
});


$(function () {
	$(".select").select2({
		  placeholder: 'Pilih Nama Pegawai',
			allowClear: false
	});
});

    function selectnama(){
           let select_nama = $('#select_nama').val();
           $.ajax({
               url     : '<?php echo site_url('c_project/get_pegawai')?>',
               dataType: 'html',
               type    : 'POST',
               data    : {select_nama:select_nama},
               success : function(data){
                 $('#data_pegawai').html(data);
               },

           });
       }


       function process_point(){
         if ($('#select_nama').val() != ''){
           nama = $('#select_nama').val();
       }if ($('#periode').val() != ''){
         per = $('#periode').val();
       }
       else
       // nama = 'selec';
       per = 'periode';
       url = "<?php echo site_url()?>c_project/proses_point/"+nama+'/'+per;
         window.open(url,'_blank');
       }

       function process_point_semua(){
         let x = confirm("Proses semua point dan masukan ke database? Point yang sudah dimasukan ke database tidak bisa diubah lagi!!!");

         if ($('#periode').val() != '') {
           per = $('#periode').val();

         }if  (x == true){
           url = "<?php echo site_url()?>c_project/proses_point_semua/"+per;
           window.open(url,'_self');
         }else
           return false;
       }

       function sekali(status){
         document.getElementById('btn_semua').disabled = status;
       }


</script>
