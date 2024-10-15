

<?php
        $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        switch($aksi){
            case 'list';
    ?>

        <div class="row">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Program Studi</h1>
        </div>
            <div class="col-3 mb-3">
                <a href="index.php?p=prodi&aksi=input" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Tambah Program Studi</a>
            </div>

            <div class="table-responsive small">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
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
                    <td><?= $data['nama_prodi']?></td>
                    <td><?= $data['jenjang_studi']?></td>
                    <td>
                        <a href="index.php?p=prodi&aksi=edit&id=<?= $data['id']?>" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                        <a href="delete_prodi.php?id=<?= $data['id']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>

                <?php
                    $no++;
                    }
                ?>

            </table>
                </div>
        <div>


    <?php    
    break;

    case 'input';
    ?> 

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Input Program Studi</h1>
        </div>
    <form action="proses_prodi.php?proses=insert" method="POST" class="bg-white p-4 rounded shadow-sm">
       

        <div class="mb-3">
            <label for="nama_prodi" class="form-label">Nama Program Studi</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang Studi</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default1" value="D3" required>
                    <label class="form-check-label" for="default1">D3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default2" value="D4">
                    <label class="form-check-label" for="default2">D4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default3" value="S1">
                    <label class="form-check-label" for="default2">S1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default4" value="S2">
                    <label class="form-check-label" for="default2">S2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default5" value="S3">
                    <label class="form-check-label" for="default2">S3</label>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <button type="submit" class="btn btn-primary " name="submit">Simpan</button>
            <button type="reset" class="btn btn-warning " name="reset">Reset</button>
        </div>
    </form>

    <?php
    break;

    case 'edit';
    include 'koneksi.php';
    $ambil=mysqli_query($db,"SELECT * FROM prodi WHERE id='$_GET[id]'");
    $data_prodi=mysqli_fetch_array($ambil);
    ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Program Studi</h1>
        </div>
    <form action="proses_prodi.php?proses=edit" method="POST" class="bg-white p-4 rounded shadow-sm">

        <div class="mb-3">

            <input type="hidden" class="form-control" id="nama_prodi" name="id" value="<?=$data_prodi['id']?>">

            <label for="nama_prodi" class="form-label">Nama Program Studi</label>
            <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?=$data_prodi['nama_prodi']?>"required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenjang Studi</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default1" value="D3" <?= ($data_prodi['jenjang_studi']=='D3') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">D3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default2" value="D4" <?= ($data_prodi['jenjang_studi']=='D4') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">D4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default3" value="S1" <?= ($data_prodi['jenjang_studi']=='S1') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">S1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default4" value="S2" <?= ($data_prodi['jenjang_studi']=='S2') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">S2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenjang_studi" id="default5" value="S3" <?= ($data_prodi['jenjang_studi']=='S3') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">S3</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary " name="submit">Update</button>
        </div>
    </form>

    <?php
    break;

}
?>

