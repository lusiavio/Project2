<!-- DATA TABLE -->
<head>
	<title><?php echo $sub_judul_form ?></title>

</head>
<body>
	<div class="container">

			<div class="box-title">
				<h3>
					<i class="icon-reorder"></i>
					<?php echo $sub_judul_form;?>
				</h3>

			<div class="box-content">
				 <form action="<?php echo site_url('jadwal'); ?>" method="post" name="form1" class="form-horizontal form-bordered">
				    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">

						<div class="control-group">
							  <div class="box-content">
							    <span class="label label-info pull-left">Cari:</span>
									<br>
									<input type="text" value="<?php echo $this->session->userdata('s_cari_global'); ?>" class="form" name="cari_global" placeholder="Masukan Jadwal">
									<div class="pull-right">
										<a class="btn btn-success" href="<?php echo site_url('c_project/input_jadwal'); ?>" >
											<i class="fa fa-user-plus" aria-hidden="true"></i> Add</a>
									</div>
							  </div>
							</div>

								</div>

							</div>

				<div class="control-group">
		 		<div class="table-reponsive m-b-40">
		 			<table class="table table-borderless table-data3">
		 				<thead>
		 					<tr>
		 						<th>NO</th>
		 						<th>NIK</th>
		 						<th>Nama Dosen</th>
		 						<th>Id Spesialis</th>
		 						<th>Id Matkul</th>
		 						<th>Nama Matkul</th>
		 						<th>SKS</th>
		 						<th>Id Jurusan</th>
		 						<th>Nama Jurusan</th>
		 						<th>Id Prodi</th>
		 						<th>Nama prodi</th>
		 						<th>Kelas</th>
		 						<th>Ruangan</th>
		 						<th>Waktu</th>
		 						<th>Tanggal</th>
		 						<th>Action</th>
		 					</tr>
		 					<tbody>
		 						<?php if (count($ListData) > 0) {
										$i=1;
										$y=0;
										foreach($ListData as $q){ ?>
		 							<tr class="tr-shodow">
		 								<td><?php echo $i;?></td>
		 								<td><?php echo $q['nik'] ?></td>
		 								<td><?php echo $q['nama_dosen'] ?></td>
		 								<td><?php echo $q['id_spesialis'] ?></td>			
		 								<td><?php echo $q['id_matkul'] ?></td>
		 								<td><?php echo $q['nama_matkul'] ?></td>
		 								<td><?php echo $q['sks'] ?></td>
		 								<td><?php echo $q['id_jurusan'] ?></td>
		 								<td><?php echo $q['nama_jurusan'] ?></td>
		 								<td><?php echo $q['id_prodi'] ?></td>
		 								<td><?php echo $q['nama_prodi'] ?></td>
		 								<td><?php echo $q['kelas'] ?></td>
		 								<td><?php echo $q['ruangan'] ?></td>
		 								<td><?php echo $q['waktu'] ?></td>
		 								<td><?php echo $q['tanggal'] ?></td>
		 								<td>
		 									<a class="btn btn-warning" href="<?php echo site_url('c_project/edit_jadwal/'.$q['nik']); ?>" >
		 										<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Ubah</a>
		 								</td>
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
		 				</thead>
		 			</table>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</body>