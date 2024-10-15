<?php
include 'koneksi.php';

if ($_GET['proses'] == 'insert') {
    $sql = mysqli_query($db, "INSERT INTO dosen (nik, nama_dosen, email, prodi_id, notelp, alamat) 
                                VALUES('$_POST[nik]', '$_POST[nama_dosen]', '$_POST[email]', '$_POST[prodi_id]', '$_POST[notelp]', '$_POST[alamat]')");

    if ($sql) {
        echo "<script>window.location='index.php?p=dosen'</script>";
    }
}

if ($_GET['proses'] == 'edit') {
    $sql = mysqli_query($db, "UPDATE dosen SET 
                    nik = '$_POST[nik]',
                    nama_dosen = '$_POST[nama_dosen]',
                    email = '$_POST[email]',
                    prodi_id = '$_POST[prodi_id]',
                    notelp = '$_POST[notelp]',
                    alamat = '$_POST[alamat]'
                    WHERE id='$_POST[id]'");

    if ($sql) {
        echo "<script>window.location='index.php?p=dosen'</script>";
    }
}

if ($_GET['proses'] == 'delete') {
    $hapus = mysqli_query($db, "DELETE FROM dosen WHERE id='$_GET[id]'");
    if ($hapus) {
        header('location:index.php?p=dosen');
    }
}
