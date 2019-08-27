<?php echo validation_errors(); ?>
<title><?= $title; ?></title>

<?php echo form_open('c_project/simpan_users',
array('name'=>'bb', 'id'=>'bb','class'=>'form-horizontal form-validate form-wysiwyg','enctype'=>'multipart/form-data'));?>
  <div class="container-fluid">

    <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center"><?= $title; ?></h1>
    <?php foreach ($ListData as $key ) { ?>
      <input type="hidden" name="id_pengguna" id="id_pengguna" value="<?php echo $key->id_pengguna ?>">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $key->nama ?>" >
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $key->email ?>">
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $key->username ?>">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="">Tipe User</label>
            <br>
            <select data-rule-required="true" name="typeuser" id="typeuser" class="input-xxlarge">
              <option value="<?php echo $key->id_user ?>">Typeuser</option>
                 <?php
                   foreach ($tipeuser as $value){?>
                      <option <?php echo $key->id_user == $value->id ? 'selected="selected"' : '' ?>
                       value="<?php echo $value->id ?>"><?php echo $value->type ?></option>
                       <?php
                     }
                 ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
    </div>
</div>
<?php  } ?>
<?php echo form_close(); ?>
