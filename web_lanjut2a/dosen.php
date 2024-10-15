<h2>Data Mahasiswa</h2>
<table id="example" class="table table-striped table bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Dosen</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>No Telp</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>

        <?php
        include 'admin/koneksi.php';
        $dosen = mysqli_query($db, "SELECT dosen.*, prodi.nama_prodi FROM dosen JOIN prodi ON dosen.prodi_id = prodi.id");
        $no = 1;
        while($data_dosen = mysqli_fetch_array($dosen)) {
        ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $data_dosen['nik'] ?></td>
            <td><?= $data_dosen['nama_dosen'] ?></td>
            <td><?= $data_dosen['email'] ?></td>
            <td><?= $data_dosen['nama_prodi'] ?></td> 
            <td><?= $data_dosen['notelp'] ?></td>
            <td><?= $data_dosen['alamat'] ?></td>
        </tr>
        <?php
            $no++;
        }
        ?>
</tbody>
</table>
