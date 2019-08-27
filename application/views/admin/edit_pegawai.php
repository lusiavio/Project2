
<title>Edit Pegawai</title>
<div class="row-fluid">
	<div class="span12">
		<div class="box">
			<div class="box-title">
				<h3><i class=" icon-plus-sign"></i><?php echo $judul_form." ".$sub_judul_form;
				// print_r($select_tenaga_ahli);?> </h3>
			</div>

			<?php foreach ($select_tenaga_ahli as $key) {?>
				<div class="container-fluid">

			<div class="box-content">
				<?php echo form_open('c_project/perbaharui_point',array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>

				<input type="hidden" name="id_peg" value="<?php echo $key->id?>">

				<!-- <div class="control-group">
                	<label for="textfield" class="control-label">Keterangan</label>
                		<div class="controls">
                			<select data-rule-required="true" name="ket" id="ket" class="input-xxlarge">
                				<option value="">Pilih</option>
								<?php
                                     foreach ($master_point as $mp){?>
                                        <option <?php echo $key->keterangan == $mp->awal ? 'selected="selected"' : '' ?>
                                         value="<?php echo $mp->awal ?>"><?php echo $mp->detail ?></option>
                                        <?php
                                        }
                                     ?>
                			</select>
						</div>
				</div> -->

				<!-- <div class="control-group">
                	<label for="textfield" class="control-label">Nama Pegawai</label>
                		<div class="controls">
                			<input type="text" name="nama_pegawai" id="nama_pegawai" class="input-xxlarge" data-rule-required="true" value="<?php echo $key->nama ?> " disabled>
						</div>
				</div>

				<div class="control-group">
                	<label for="textfield" class="control-label">Jam Masuk</label>
                		<div class="controls">
                			<input type="text" name="jam_masuk" id="jam_masuk" class="input-xxlarge" data-rule-required="true" style="text-transform:uppercase" value="<?php echo $key->masuk ?> " disabled>
						</div>
				</div>

				<div class="control-group">
                	<label for="textfield" class="control-label">Jam Keluar</label>
                		<div class="controls">
                			<input type="text" name="jam_keluar" id="jam_keluar" class="input-xxlarge" data-rule-required="true" value="<?php echo $key->keluar ?> " disabled>
						</div>
				</div>

				<div class="control-group">
                	<label for="textfield" class="control-label">Tanggal</label>
                		<div class="controls">
                			<input type="text" name="tanggal" id="tanggal" class="input-xxlarge" data-rule-required="false" value="<?php echo $key->tanggal ?>" disabled>
						</div>
				</div> -->


				<?php }?>
			</div>
		</div>
	</div>
</div>
</div>

<div class="row-fluid">
      <div class="span12">
         <div class="control-group">
            <div class="box-content">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Pegawai</th>
                                        <th>Masuk</th>
                                        <th>Keluar</th>
																				<th>Tanggal</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
																	<tr>
														        <td><?php echo $key->id?></td>
														        <td><?php echo $key->nama?></td>
														        <td><?php echo $key->masuk?></td>
														        <td><?php echo $key->keluar?></td>
														        <td><?php echo $key->tanggal?></td>
																		<td>	<select data-rule-required="false" name="ket" id="ket">
								                				<option value="">Pilih</option>
																<?php
								                                     foreach ($master_point as $mp){?>
								                                        <option <?php echo $key->keterangan == $mp->awal ? 'selected="selected"' : '' ?>
								                                         value="<?php echo $mp->awal ?>"><?php echo $mp->detail ?></option>
								                                        <?php
								                                        }
								                                     ?>
								                			</select></td>

														      </tr>
                            </tbody>
             </table>
           </div>
          </div>
        </div>
    </div>
</div>

<div class="form-actions">
	<button class="btn btn-primary pull-right" type="submit" >Simpan</button>
	<a class="btn btn-danger pull-right" onclick="window.close();">Kembali</a>
</div>
</form>
