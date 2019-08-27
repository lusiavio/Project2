<?php

								if (count($peg) > 0) {
										$i=1;
										foreach($peg as $row){	?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $row->nama?></td>
										<td><?php echo $row->tot_jam_telat?></td>
										<td><?php echo $row->poin ?></td>
										<td><?php echo $row->bulan ?></td>
										<td><?php echo $row->tahun ?></td>

									  </tr>
									<?php
									$i++;
									}
						}else{
							echo "<tbody><tr><td colspan='9' style='padding:10px; background:#F00; border:none; color:#FFF;'>Data Tidak Tersedia</td></tr></tbody>";
							}

		?>
