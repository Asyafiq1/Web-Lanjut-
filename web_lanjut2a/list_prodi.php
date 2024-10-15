<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Prodi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Daftar Program Studi</h2>
            <div class="col-2 mb-3">
                <a href="index.php?p=tambah-prodi" class="btn btn-primary">Tambah Program Studi</a>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Program Studi</th>
                    <th>Jenjang Studi</th>
                    <th>Aksi</th>
                </tr>

                <?php
                    include 'koneksi.php';
                    $ambil=mysqli_query($db,"SELECT * FROM prodi");
                    $no = 1;
                    while ($data=mysqli_fetch_array($ambil)) {
                ?>

                <tr>
                    <td><?= $no?></td>
                    <td><?= $data['id']?></td>
                    <td><?= $data['nama_prodi']?></td>
                    <td><?= $data['jenjang_studi']?></td>
                    <td>
                        <a href="index.php?p=edit-prodi&id=<?= $data['id']?>" class="btn btn-success">Edit</a>
                        <a href="delete_prodi.php?id=<?= $data['id']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Delete</a>
                    </td>
                </tr>

                <?php
                    $no++;
                    }
                ?>

            </table>
        <div>
    </div>
</body>
</html>