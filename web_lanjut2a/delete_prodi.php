<?php
include 'koneksi.php';
$hapus = mysqli_query($db, "DELETE FROM prodi WHERE id='$_GET[id]'");
if($hapus){
    header('location:index.php?p=prodi'); //redirect
}