<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title><?php echo $judul_form ?></title>
	</head>
	<body>
		<div class="control-group">
				<h3>
			<div class="container">
			<div class="alert alert-info">Inputkan file dengan format .xlsx | .xls</div>
			</div>
				</h3>
				</div>
		<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1 class="text-center">
			<?php echo form_open($action,array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
		</h1>

		<!-- <div class="form-group">
							<label for="textfield" class="control-label">Periode</label>
								<div class="controls">
									<div  class="dropdown">
									<select data-rule-required="true" style="width: 437px" name="periode" id="periode" class="input-xxlarge select2">
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
		</div> -->

		<div class="control-group">
			<label for="textfield" class="control-label"></label>
										<div class="controls">
											<input type="file" name="file" id="dokumen" class="input-xxlarge" data-rule-required="true">
										</div>
										<br>
		<div class="control-group">
			<button class="btn btn-danger btn-block" type="submit">Upload</button>
			<!-- <a href="javascript:;" type="submit" id="btn_semua" class="btn  btn-danger btn-block" onclick="process_periode()" ><i class="glyphicon glyphicon-ok"></i> Semua</a> -->
		</div>
		</form>

	</body>
</html>

<script type="text/javascript">
$(function () {
	$(".select2").select2({
			placeholder: 'Periode Sesuai Data Excell',
			allowClear: false
	});
});


function process_periode(){
	if ($('#periode').val() != '') {
		per = $('#periode').val();
	}
		url = "<?php echo site_url()?>c_project/proses_upload/"+per;
		window.open(url,'_self');
	}
</script>
