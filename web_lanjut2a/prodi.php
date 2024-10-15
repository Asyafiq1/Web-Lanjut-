<h2>Data Prodi</h2>
<table id="example" class="table table-striped table bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Prodi ID</th>
            <th>Nama Program Studi</th>
            <th>Jenjang Sdtudi</th>
          
        </tr>
    </thead>
    <tbody>
<?php
include 'admin/koneksi.php';
$prodi=mysqli_query($db,"SELECT * FROM prodi");
$no=1;
while ($data_prodi=mysqli_fetch_array($prodi)) {
    ?>
    <tr>
        
        <td><?= $no?></td>
        <td><?= $data_prodi['id']?></td>
        <td><?= $data_prodi['nama_prodi']?></td>
        <td><?= $data_prodi['jenjang_studi']?></td>
        
  </tr>
  <?php
  $no++;
}

  ?>
</tbody>
</table>