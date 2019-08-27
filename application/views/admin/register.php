<?php echo validation_errors(); ?>
<title><?= $title; ?></title>

<?php echo form_open('register'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center"><?= $title; ?></h1>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <label for="">Tipe User</label>
            <br>
            <select data-rule-required="true" name="typeuser" id="typeuser" class="input-xxlarge">
              <option value="">Typeuser</option>
                 <?php
                   foreach ($tipeuser as $value){?>
                      <option <?php echo $value == $value->id ? 'selected="selected"' : '' ?>
                       value="<?php echo $value->id ?>"><?php echo $value->type ?></option>
                       <?php
                     }
                 ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
    </div>
</div>


<?php echo form_close(); ?>
