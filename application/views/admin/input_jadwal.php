<?php echo validation_errors(); ?>
    
<?php echo form_open('c_project/tambah_jadwal'); ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    <h1 class="text-center">Input Jadwal Baru</h1>
        <div class="form-group">
            <label for="">Nik</label>
            <input type="text" class="form-control" name="nik" placeholder="Nik">
        </div>
        <div class="form-group">
            <label for="">Nama Dosen</label>
            <input type="text" class="form-control" name="nama_dosen" placeholder="Nama">
        </div>
        <div class="form-group">
            <label for="">Id Spesialis</label>
            <input type="text" class="form-control" name="spesialis" placeholder="ID Spesialis">
        </div>
        <div class="form-group">
            <label for="">Id Matkul</label>
            <input type="text" class="form-control" name="id_matkul" placeholder="ID Matkul">
        </div>
        <div class="form-group">
            <label for="">Nama Matkul</label>
            <input type="text" class="form-control" name="nama_matkul" placeholder="Nama Matkul">
        </div>
        <div class="form-group">
            <label for="">SKS</label>
            <input type="text" class="form-control" name="sks" placeholder="SKS">
        </div>
        <div class="form-group">
            <label for="">Id Jurusan</label>
            <input type="text" class="form-control" name="id_jurusan" placeholder="Id Jurusan">
        </div>
        <div class="form-group">
            <label for="">Nama Jurusan</label>
            <input type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan">
        </div>
        <div class="form-group">
            <label for="">Id Prodi</label>
            <input type="text" class="form-control" name="id_prodi" placeholder="Id Prodi">
        </div>
        <div class="form-group">
            <label for="">Nama Prodi</label>
            <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Prodi">
        </div>
        <div class="form-group">
            <label for="">Kelas</label>
            <input type="text" class="form-control" name="kelas" placeholder="Kelas">
        </div>
        <div class="form-group">
            <label for="">Ruangan</label>
            <input type="text" class="form-control" name="ruangan" placeholder="Ruangan">
        </div>
        <div class="form-group">
            <label for="">Waktu</label>
            <input type="text" class="form-control" name="waktu" placeholder="Waktu">
        </div>
        <div class="form-group">
            <label for="">Tanggal   </label>
            <input type="text" class="form-control" name="tanggal" placeholder="Tanggal">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Tambah</button>
    </div>
</div>


<?php echo form_close(); ?>
