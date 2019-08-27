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
				 <form action="<?php echo site_url('index_users'); ?>" method="post" name="form1" class="form-horizontal form-bordered">
				    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">

						<div class="control-group">
							  <div class="box-content">
							    <span class="label label-info pull-left">Cari:</span>
									<br>
									<input type="text" value="<?php echo $this->session->userdata('s_cari_global'); ?>" class="form" name="cari_global" placeholder="Masukan Username">
									<div class="pull-right">
										<a class="btn btn-success" href="<?php echo site_url('register'); ?>" >
											<i class="fa fa-user-plus" aria-hidden="true"></i> Add</a>
									</div>
							  </div>
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
										<th>Username</th>
										<th>Email</th>
										<th>Type</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php if (count($ListData) > 0) {
										$i=1;
										$y=0;
										foreach($ListData as $row){	?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['nama']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td>
											<?php foreach ($tipeuser as $key ) {
												if($row['id_user'] == $key->id){
													echo $key->type;
												}
											}?>
										</td>
										<td>
											<a class="btn btn-warning" href="<?php echo site_url('c_project/edit_users/'.$row['id_pengguna']); ?>" >
												<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> Ubah</a>
												<a class="btn btn-danger" onclick="return confirm('Anda Yakin ingin Menghapus user ini?'); " href="<?php echo site_url('c_project/hapus_user/'.$row['id_pengguna']);?>" >
													<i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
									</td>
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

</form>
</div>
</body>
