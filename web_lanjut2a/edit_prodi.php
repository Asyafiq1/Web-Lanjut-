<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php
    include 'koneksi.php';
    $ambil=mysqli_query($db,"SELECT * FROM prodi WHERE id='$_GET[id]'");
    $data_prodi=mysqli_fetch_array($ambil);
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Data Program Studi</h2>
    <form action="" method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" class="form-control" id="id" name="id" value="<?=$data_prodi['id']?>" readonly>
        </div>

        <div class="mb-3">
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
if (isset($_POST['submit'])) 
{
    include 'koneksi.php';

    // Update query with corrected syntax
    $sql = mysqli_query($db, "UPDATE prodi 
        SET nama_prodi ='$_POST[nama_prodi]', 
            jenjang_studi ='$_POST[jenjang_studi]'
        WHERE id='$_POST[id]'");

    // Check if the query executed successfully
    if ($sql) {
        echo "<script>window.location='index.php?p=prodi'</script>";
    }
}
?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
