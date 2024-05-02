<title>Kategori Buku</title>
<?php
echo anchor('kategori/post','Tambah Data',array('class'=>'btn btn-primary btn-sm'))
?>
<br>
<br>
<div class="module">
<div class="module-head">
<h3>Kategori Buku</h3>
</div>
<div class="module-body table">
<table cellpadding="0" cellspacing="0" border="0" id="table1" 
class="datatable-1 table table-bordered table-striped  display" width="100%">
<thead>
<tr>
    <th style='text-align: center;'>No</th>
    <th style='text-align: center;'>Kategori Menu</th>
    <th colspan="2" style='text-align: center;'>Action</th></tr>
</thead>
<tbody>
    <?php
    $no=1;
    foreach ($record->result() as $r)
    {
        echo "<tr>
            <td width='10' style='text-align: center;'>$no</td>
            <td style='text-align: center;'>$r->nama_kategori</td>
            <td width='10' style='text-align: center;'><a href='edit/$r->id_kategori' class='btn btn btn-sm'>Edit</a></td>
            <td width='10' style='text-align: center;'><a href='delete/$r->id_kategori' class='btn btn btn-sm'>Delete</a></td>
            </tr>";
        $no++;
    }
    ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
