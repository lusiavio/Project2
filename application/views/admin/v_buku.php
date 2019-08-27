<!DOCTYPE html>
<html>
<head>
	<title>Import</title>
</head>
	<h3>Import Data<h3>
	</div>
		</nav>
		<div class="container">
    <div class="row">
    	<section>
        <div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
		<!-- Content -->
		<div>
		<br>
		<br>

		<h3>Form Import Data</h3>
			<br>
			<div class="container">
			<div class="alert alert-info">Pilih Data excel Format.xlxs</div>
			</div>
							<form class="form-horizontal" method="post" action="upload.php" enctype="multipart/form-data" a href="<?php echo base_url('index.php/c_project/upload') ?>">
									<input type="file" name="file" data-rule-required="true" /><hr>
									<input type="submit" name="upload" value="Save Upload file" class="btn btn-primary" />


</form>

</body>
</html>
