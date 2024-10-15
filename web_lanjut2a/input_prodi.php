<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Program Studi</h2>
    <form action="" method="POST" class="bg-white p-4 rounded shadow-sm">
       

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
    if (isset($_POST['submit'])) 
    {
        include 'koneksi.php';
        $sql=mysqli_query($db,"INSERT INTO prodi (id,nama_prodi,jenjang_studi) VALUES('$_POST[id]','$_POST[nama_prodi]','$_POST[jenjang_studi]')");

        if($sql){
            echo"<script>window.location='list_prodi.php?p=prodi'</script>";
            //header('location:list_mhs.php');
        }

    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
