<title>Edit Daftar Menu</title>
<h3>Edit Daftar Buku</h3>
<?php
echo form_open_multipart($url, array('enctype' => 'multipart/form-data'));
?>
<br>
<div class="module">
<div class="module-head">
<h3>Forms</h3>
</div>
<div class="module-body">
<table class="table table-border">
<input type="hidden" name="id_buku" value="<?php echo $record['id_buku']?>">
    <tr><td width="120">Judul Buku</td>
        <td>
            <input type="text" class="form-control"  name="judul" value="<?php echo $record['judul']?>">
        </td>
    </tr>
    <tr>
        <td>Kategori Buku</td>
        <td>
            <select name="kategori" class="form-control" >
                <?php
                foreach ($kategori as $k)
                {
                    echo "<option value='$k->id_kategori'";
                    echo $record['id_kategori']==$k->id_kategori?'selected':'';
                    echo">$k->nama_kategori</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr><td>Deskripsi</td>
        <td>
            <input type="text" class="form-control"  name="deskripsi" value="<?php echo $record['deskripsi']?>">
        </td>
    </tr>
    <tr><td>Jumlah</td>
        <td>
            <input type="text" class="form-control"  name="jumlah" value="<?php echo $record['jumlah']?>">
        </td>
    </tr>
    <tr>
    <td>File Buku</td>
    <td>
        <?php if ($record['file_buku']): ?>
            <a href="<?= base_url('assets/file/' . $record['file_buku']) ?>" target="_blank">Lihat PDF</a>
            <br>
            <input type="file" class="form-control" name="file_buku">
        <?php else: ?>
            <input type="file" class="form-control" name="file_buku">
            File PDF belum terupload!
        <?php endif; ?>
    </td>
</tr>
<tr>
    <td>Cover Buku</td>
    <td>
        <?php if ($record['cover_buku']): ?>
            <img src="<?= base_url('assets/images/' . $record['cover_buku']) ?>" alt="Cover Buku" width="100">
            <br>
            <input type="file" class="form-control" name="cover_buku">
        <?php else: ?>
            <input type="file" class="form-control" name="cover_buku">
            File Cover belum terupload!
        <?php endif; ?>
    </td>
</tr>
    <tr><td colspan="2">
    <?php echo anchor('buku/tampil_buku_admin','Kembali',array('class'=>'btn btn-danger btn-sm'))?>    
    <button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
        </td></tr>
</table>
</form>