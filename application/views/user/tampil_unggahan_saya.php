<title>Daftar Buku</title>
<div class="module">
<div class="module-head">
<h3>Daftar Buku</h3>
</div>
<div class="module-body table">
<table cellpadding="0" cellspacing="0" border="0" id="table1" class="datatable-1 table table-bordered table-striped  display" width="100%">
<thead>
<tr>
    <th style='text-align: center;'>No</th >
    <th style='text-align: center;'>Judul Buku</th >
    <th style='text-align: center;'>Kategori Buku</th >
    <th style='text-align: center;'>Deskripsi</th >
    <th style='text-align: center;'>Jumlah</th >
    <th style='text-align: center;'>File Buku</th >
    <th style='text-align: center;'>Cover Buku</th >
    <th style='text-align: center;'>Di Unggah Oleh</th >
    <th colspan="2" style='text-align: center;'>Action</th>
</tr>
</thead>
<tbody>
<?php
$no = 1;
foreach ($record->result() as $r) {
    $deskripsi = (strlen($r->deskripsi) > 50) ? substr($r->deskripsi, 0, 75) . '...' : $r->deskripsi;

    echo "<tr>
            <td style='text-align: center;'>$no</td>
            <td style='text-align: center;'>$r->judul</td>
            <td style='text-align: center;'>$r->nama_kategori</td>
            <td style='text-align: center;'>$deskripsi</td>
            <td style='text-align: center;'>$r->jumlah</td>
            <td style='text-align: center;'><a href='" . site_url('assets/file/' . $r->file_buku) . "' target='_blank'>View PDF</a></td>
            <td style='text-align: center;'><img src='" . base_url('assets/images/' . $r->cover_buku) . "' alt='Cover Buku' width='150'></td>
            <td style='text-align: center;'>$r->nama_user</td>
            <td style='text-align: center;'><a href='edit_data_saya/$r->id_buku' class='btn btn-sm'>Edit</a></td>
            <td style='text-align: center;'><a href='delete/$r->id_buku/user' class='btn btn-sm'>Delete</a></td>
            </tr>";
        $no++;
    }
    ?>
</tbody>
</table>
</div>
</div>
</div>