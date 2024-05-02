<title>Tambah Data Kategori</title>
<h3>Tambah Data Kategori</h3>
<?php
echo form_open('kategori/post');
?>
<br>
<div class="module">
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
    <tr><td>Nama Kategori</td>
    <td><input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori Buku"></td>
    </tr>
    <tr><td colspan="2">
    <?php echo anchor('kategori/tampil_kategori_admin','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
    <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        
        </td></tr>
</table>
</form>