<?php
    if ($_GET['proses']=='insert') {
        if (isset($_POST['submit'])) 
        {
        include 'koneksi.php';
        $sql=mysqli_query($db,"INSERT INTO prodi (nama_prodi,jenjang_studi) VALUES('$_POST[nama_prodi]','$_POST[jenjang_studi]')");

        if($sql){
            echo"<script>window.location='index.php?p=prodi'</script>";
            //header('location:list_mhs.php');
        }

        }
    }

    if ($_GET['proses']=='edit') {
        if (isset($_POST['submit'])) {
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
    }
    

    if ($_GET['proses']=='delete') {
        include 'koneksi.php';
        $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id]'");
        if($hapus){
            header('location:index.php?p=prodi'); //redirect
        }
    }

?>