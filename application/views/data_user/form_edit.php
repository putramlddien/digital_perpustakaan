<title>Edit Data User</title>
<h3>Edit Data User</h3>
<?php
echo form_open('User/edit');
?>
<br>
<h3>Forms</h3>
<div class="module">
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
<input type="hidden" value="<?php echo $record['id_user']?>" name="id">
    <tr><td width="120">Nama Lengkap</td>
        <td><input type="text" name="nama_user" class="form-control" placeholder="nama lengkap" value="<?php echo $record['nama_user']?>">
       </td></tr>
       <tr><td width="120">No Handphone</td>
        <td><input type="text" name="no_hp" class="form-control" placeholder="nama lengkap" value="<?php echo $record['no_hp']?>">
       </td></tr>
       <tr><td width="120">Alamat</td>
        <td><input type="text" name="alamat" class="form-control" placeholder="nama lengkap" value="<?php echo $record['alamat']?>">
       </td></tr>
    <tr><td>Username</td>
        <td><input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $record['username']?>">
       </td></tr>
     <tr><td>Password</td>
        <td><input type="password" name="password" class="form-control" placeholder="password">
       </td></tr>
    <tr><tr><td colspan="2">
    <?php echo anchor('user/tampil_user_admin','Kembali',array('class'=>'btn btn-danger btn-sm'))?>    
    <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        </td></tr>
</table>
</form>