<title>Tambah Data Daftar Buku</title>
<h3>Tambah Data User</h3>
<?php
echo form_open_multipart('user/post', array('enctype' => 'multipart/form-data'));
?>
<br>
<div class="module" >
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
    <tr><td>Nama Lengkap</td>
        <td><input type="text" class="form-control" name="nama_user" placeholder="Masukan Nama Lengkap"></td>
    </tr>
    <tr><td>No Handphone</td>
        <td><input type="text" class="form-control" name="no_hp" placeholder="Masukan Nomor Handphone"></td>
    </tr>
    <tr><td>Alamat</td>
        <td><input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat Lengkap"></td>
    </tr>
    <tr><td>Username</td>
        <td><input type="text" class="form-control" name="username" placeholder="Masukan Username"></td>
    </tr>
    <tr><td>Password</td>
        <td><input type="password" class="form-control" name="password" placeholder="Masukan Password"></td>
    </tr>
    <td colspan="2"><?php echo anchor('user/tampil_user_admin','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
            <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        </td></tr>
</table>
</form>