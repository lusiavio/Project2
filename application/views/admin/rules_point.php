<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Rules Point</title>
    <?php
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
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
                  <?php
                  echo $output;
                   ?>
                </div>
            </center>
      </div>
      </div>

  </body>
</html>
