<?php
// print_r($bulan);
// die();

								if (count($bulan) > 0) {
										$i=1;
										$x = 0;
										foreach($bulan as $row){
											?>

									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row->nama?></td>
										<td><?php echo $row->performa?></td>
										<td>
											<?php if($select_bulan == NULL){
												echo 'Tahunan';
											} else{
												echo $row->bulan;
											} ?>
										</td>
										<td><?php echo $row->tahun ?></td>

									  </tr>
									<?php
									$i++;
									}
						}else{
							echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Data Tidak Tersedia</td></tr></tbody>";
							}

		?>
