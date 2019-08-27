<title><?php echo $judul_form; ?></title>
<body>
  <div class="container">
  <div class="panel-group">
    <div class="panel panel-danger">
        <div class="panel-heading">Form Filter</div>
        <div class="panel-body">
          <br>
          <center>
              <div class="row-fluid">
                <button type="button" class="btn btn" onclick="view_laporan_semua();">Semua Pegawai</button>
                <button type="button" class="btn btn-success" onclick="view_laporan_pegawai();">Per Pegawai</button>
                 <button type="button" class="btn btn-primary" onclick="view_laporan_status();">Status</button>
              </div>
          </center>
    </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Form Data</div>
        <div class="panel-body">
    <div id="form_laporan"></div>
  </div>
  </div>
  </div>
  </div>

</body>


<script>
  function view_laporan_semua(){
         $.ajax({
            url: '<?php echo site_url('c_project/view_report_semua')?>',
            dataType: 'html',
            type    : 'POST',
            success: function(data){
              $('#form_laporan').html(data);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              if (XMLHttpRequest.status === 200) {
                bootbox.alert(textStatus+' errornya '+errorThrown);
              }else{
                unloading(); bootbox.alert('Maaf, Terjadi kesalahan dalam sistem!!');
              }
            }
      });
  }

  function view_laporan_pegawai(){
         $.ajax({
            url: '<?php echo site_url('c_project/view_report_pegawai')?>',
            dataType: 'html',
            type    : 'POST',
            success: function(data){
              $('#form_laporan').html(data);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              if (XMLHttpRequest.status === 200) {
                bootbox.alert(textStatus+' errornya '+errorThrown);
              }else{
                unloading(); bootbox.alert('Maaf, Terjadi kesalahan dalam sistem!!');
              }
            }
      });
  }

  function view_laporan_status(){
         $.ajax({
            url: '<?php echo site_url('c_project/view_report_status')?>',
            dataType: 'html',
            type    : 'POST',
            success: function(data){
              $('#form_laporan').html(data);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
              if (XMLHttpRequest.status === 200) {
                bootbox.alert(textStatus+' errornya '+errorThrown);
              }else{
                unloading(); bootbox.alert('Maaf, Terjadi kesalahan dalam sistem!!');
              }
            }
      });
  }

</script>
