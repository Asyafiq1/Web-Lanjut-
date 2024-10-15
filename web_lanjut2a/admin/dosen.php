<?php
include 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

        <div class="row">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dosen</h1>
            </div>

            <div class="col-2 mb-3">
                <a href="index.php?p=dosen&aksi=input" class="btn btn-primary">Tambah Dosen</a>
            </div>
            <div class="table-responsive small">
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>Prodi ID</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    include 'koneksi.php';
                    // $ambil = mysqli_query($db, "SELECT * FROM prodi,dosen WHERE prodi.id=dosen.prodi_id ");
                    $ambil = mysqli_query($db, "SELECT * FROM prodi INNER JOIN dosen ON prodi.id=dosen.prodi_id ");
                    $no = 1;
                    while ($data = mysqli_fetch_array($ambil)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nik'] ?></td>
                            <td><?= $data['nama_dosen'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['prodi_id'] ?></td>
                            <td><?= $data['notelp'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                                <a href="index.php?p=dosen&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                                <a href="proses_dosen.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')"> <i class="bi bi-x-circle"></i> Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        <?php
        break;

    case 'input':
        ?>
            <div class="row">
                <div class="col-6 mx-auto">
                    <br>
                    <h2>Data Dosen</h2>
                    <form action="proses_dosen.php?proses=insert" method="post">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Prodi</label>
                            <div class="mb-sm-10">
                                <select name="prodi_id" class="form-select">
                                    <option value="">--pilihan prodi--</option>
                                    <?php
                                    $prodi=mysqli_query($db,"SELECT * FROM prodi");
                                    while ($data_prodi=mysqli_fetch_array ($prodi)) {
                                        $selected=($data_prodi['nama_prodi']==$data_dosen['prodi_id']) ? 'selected' : '';
                                        echo "<option value=".$data_prodi['id']." $selected>".$data_prodi['nama_prodi']."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                       
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="notelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            <button type="reset" class="btn btn-warning" name="reset">Reset</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>

        <?php
        break;

    case 'edit':
        include 'koneksi.php';
        $ambil = mysqli_query($db, "SELECT * FROM dosen WHERE id='$_GET[id]'");
        $data_dosen = mysqli_fetch_array($ambil);
        ?>

            <div class="row">

                <div class="col-6 mx-auto">
                    <br>
                    <h2>Edit Data Dosen</h2>
                    <form action="proses_dosen.php?proses=edit" method="post">
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="hidden" class="form-control" name="id" value="<?= $data_dosen['id'] ?>">
                            <input type="text" class="form-control" name="nik" value="<?= $data_dosen['nik'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <input type="text" class="form-control" name="nama_dosen" value="<?= $data_dosen['nama_dosen'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $data_dosen['email'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prodi ID</label>
                            <input type="text" class="form-control" name="prodi_id" value="<?= $data_dosen['prodi_id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No Telp</label>
                            <input type="text" class="form-control" name="notelp" value="<?= $data_dosen['notelp'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $data_dosen['alamat'] ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                        </div>
                        <hr>
                    </form>
                </div>
            </div>

    <?php
        break;
}
    ?>