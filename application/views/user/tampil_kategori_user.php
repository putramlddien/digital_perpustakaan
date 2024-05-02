<title>Kategori Buku</title>
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
    <th style='text-align: center;'>Kategori Menu</th></tr>
</thead>
<tbody>
    <?php
    $no=1;
    foreach ($record->result() as $r)
    {
        echo "<tr>
            <td width='10' style='text-align: center;'>$no</td>
            <td style='text-align: center;'>$r->nama_kategori</td>
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
