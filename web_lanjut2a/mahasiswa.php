<h2>Data Mahasiswa</h2>
<table id="example" class="table table-striped table bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nim</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Hp</th>
            <th>prodi</th>
        </tr>
    </thead>
    <tbody>
<?php
include 'admin/koneksi.php';
$mhs = mysqli_query($db, "SELECT mahasiswa.*, prodi.nama_prodi FROM mahasiswa JOIN prodi ON mahasiswa.prodi_id = prodi.id");
$no=1;
while ($data_mhs=mysqli_fetch_array($mhs)) {
    ?>
    <tr>
        
        <td><?= $no?></td>
        <td><?= $data_mhs['nim']?></td>
        <td><?= $data_mhs['nama']?></td>
        <td><?= $data_mhs['tgl_lahir']?></td>
        <td><?= $data_mhs['alamat']?></td>
        <td><?= $data_mhs['email']?></td>
        <td><?= $data_mhs['no_hp']?></td>
        <td><?= $data_mhs['nama_prodi']?></td>
        
  </tr>
  <?php
  $no++;
}

  ?>
</tbody>
</table>