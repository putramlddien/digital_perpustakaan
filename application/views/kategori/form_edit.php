<title>Edit Data Kategori Menu</title>
<h3>Edit Data Kategori</h3>
<?php
echo form_open('kategori/edit');
?>
<br>
<div class="module">
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
<input type="hidden" value="<?php echo $record['id_kategori']?>" name="id">
    <tr><td width="130">Nama Kategori</td>
        <td><div class="col-sm-4"><input type="text" name="kategori" class="form-control"
                   value="<?php echo $record['nama_kategori']?>"></div>
       </td></tr>
    <tr><td colspan="2">
    <?php echo anchor('kategori/tampil_kategori_admin','Kembali',array('class'=>'btn btn-danger btn-sm'))?>    
    <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button> 
        </td></tr>
</table>
</form>