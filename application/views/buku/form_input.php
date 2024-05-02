<title>Tambah Data Daftar Buku</title>
<h3>Tambah Data Buku</h3>
<?php
echo form_open_multipart($url, array('enctype' => 'multipart/form-data'));
?>
<br>
<div class="module" >
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
    <tr><td>Judul Buku</td>
        <td><input type="text" class="form-control" name="judul" placeholder="Masukan Judul Buku"></td>
    </tr>
    <tr><td>Kategori</td><td>
            <select name="kategori" class="form-control">
                <?php
                foreach ($kategori as $k)
                {
                    echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr><td>Deskripsi</td>
        <td><input type="text" class="form-control" name="deskripsi" placeholder="Masukan Deskripsi"></td>
    </tr>
    <tr><td>Jumlah</td>
        <td><input type="text" class="form-control" name="jumlah" placeholder="Masukan Jumlah"></td>
    </tr>
    <tr><td>File Buku</td>
        <td><input type="file" class="form-control" name="file_buku" placeholder="Masukan File Buku"></td>
    </tr>
    <tr><td>Cover Buku</td>
        <td><input type="file" class="form-control" name="cover_buku" placeholder="Masukan Cover Buku"></td>
    </tr>
    <tr><td colspan="2"><?php echo anchor($url_back,'Kembali',array('class'=>'btn btn-danger btn-sm'))?>
            <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        </td></tr>
</table>
</form>