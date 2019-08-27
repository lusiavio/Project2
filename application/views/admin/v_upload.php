<head>
	<title><?php echo $sub_judul_form ?></title>

</head>
<body>
	<div class="container">
	<div class="panel-group">
		<div class="panel panel-default">
				<div class="panel-heading">
					<strong><h3>
						<?php echo $sub_judul_form;?>
					</h3></strong>

				</div>
				<div class="panel-body">
					<center>
							<div class="row-fluid">

							</div>
					</center>

			<div class="box-content">
				 <form action="<?php echo site_url('index_pegawai'); ?>" method="post" name="form1" class="form-horizontal form-bordered">
				    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">

						<div class="control-group">
							  <div class="box-content">
							    <span class="label label-info pull-left">Cari Pegawai :</span>
									<br>
									<input type="text" value="<?php echo $this->session->userdata('s_cari_global'); ?>" class="form" name="cari_global" placeholder="Masukan Nama">
							  </div>
							</div>

								</div>



				<div class="control-group">
						<div class="table-responsive">
							<table width="100%" class="table table-hover">
	    						<thead>
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Tanggal</th>
										<th>Jam Masuk</th>
										<th>Jam Keluar</th>
										<th>Telat</th>
										<th>Pulang awal</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($ListData) > 0) {
										$i=1;
										foreach($ListData as $row){	?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['nama']; ?></td>
										<td><?php echo $row['tanggal']; ?></td>
										<td><?php echo $row['masuk']; ?></td>
										<td><?php echo $row['keluar']; ?></td>
										<td><?php echo $row['telat']; ?></td>
										<td><?php echo $row['plg_awal']; ?></td>
								 </tr>


									  </tr>
								<?php
							$paging=(!empty($pagermessage) ? $pagermessage : '');
							$i++;
							}
					echo "<tr><td colspan='9'><div style='background:000;'>$paging &nbsp;".$this->pagination->create_links()."</div></td></tr>";
				}else{
					echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Data Tidak Tersedia</td></tr></tbody>";
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

</form>
</body>
