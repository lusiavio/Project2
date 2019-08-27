<head>
	<title><?php echo $sub_judul_form ?></title>

</head>
<body>
	<div class="container">
	<div class="panel-group">
		<div class="panel panel-warning">
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

				<div class="control-group">
						<div class="table-responsive">
							<table width="100%" class="table table-hover">
	    						<thead>
									<tr>
										<th>No</th>
										<th>Aksi</th>
										<th>Username</th>
										<th>Role</th>
										<th>Tanggal</th>

									</tr>
								</thead>
								<tbody>
									<?php if (count($ListData) > 0) {
										$i=1;
										foreach($ListData as $row){
											if ($row['user_id'] = 1) {
												$row['user_id'] = 'Admin';
											}else{
												$row['user_id'] = 'Keuangan';
											}	?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row['aksi']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['user_id']; ?></td>
										<td><?php echo $row['create_at']; ?></td>

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
