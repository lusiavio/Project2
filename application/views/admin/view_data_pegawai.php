
<?php

								if (count($peg) > 0) {
									$total_hasil = 0;
										$i=1;
										foreach($peg as $row){
											$hasil = 0;
											$ket = 0;
											$id = 0;
										?>
										<?php	foreach ($master_point as $m_p) {
												if ($row->masuk >= $m_p->awal && $row->masuk <= $m_p->akhir) {
													$ket = $m_p->detail;
													$hasil = $m_p->point;
													$total_hasil += $hasil;
													$id = $m_p->id;
													}
													if ($id == 1) {
														$ket = 'Hadir Tepat Waktu';
													}
													if ($id > 1 && $id < 6) {
														$ket = 'Datang Terlambat';
													}
													if($id == 6) {
														if ($row->keterangan == $m_p->awal && $row->keterangan <= $m_p->akhir){
															$hasil = $m_p->point;
															$total_hasil += $hasil - 10;
															$ket = $m_p->detail;
																}
															}
													}
										 ?>

									<tr>
										<td><?php echo $i;?></td>
                    <td><?php echo $row->nama ?></td>
										<td><?php echo $row->tanggal ?></td>
										<td><?php echo $row->masuk ?></td>
										<td><?php echo $row->keluar ?></td>
										<td><?php echo $hasil ?></td>
										<td><?php echo $ket ?></td>
										<td class="active">
																	<?php echo $total_hasil ?>
											</td>
										<td>
											<?php if ($id == 6) {  ?>
												<a class="btn btn-mini btn-warning btn-block"  href="<?php echo site_url();?>c_project/edit_point/<?php echo $row->id; ?>" target="_blank"><i class="icon-pencil"></i>Ubah</a>
										<?php 	} ?>

									 </tr>
									  </tr>

									<?php
									$i++;
									}
						}else{
						echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Data Tidak Tersedia</td></tr></tbody>";
							}
		?>
