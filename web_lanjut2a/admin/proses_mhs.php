<?php
    if ($_GET['proses']=='insert') {
        if (isset($_POST['submit'])) 
        {
            include 'koneksi.php';
            $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
            $hobies=implode(", ", $_POST['hobi']);
            $sql=mysqli_query($db,"INSERT INTO mahasiswa (nim,nama,tgl_lahir,jekel,hobi,alamat,email,no_hp) VALUES('$_POST[nim]','$_POST[nama]','$tgl','$_POST[jekel]','$hobies','$_POST[alamat]','$_POST[email]','$_POST[no_hp]')");

            if($sql){
                echo"<script>window.location='index.php?p=mhs';</script>";
                //header('location:list_mhs.php');
            }


        }
    }

    if ($_GET['proses']=='edit') {
        if (isset($_POST['submit'])) {
    include 'koneksi.php';

    // Format date from the form
    $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];

    // Check if the hobi array is set, and convert it to a comma-separated string if it is
    $hobies = isset($_POST['hobi']) ? implode(",", $_POST['hobi']) : '';

    // Update query with corrected syntax
    $sql = mysqli_query($db, "UPDATE mahasiswa 
        SET nama ='$_POST[nama]', 
            tgl_lahir ='$tgl', 
            jekel ='$_POST[jekel]', 
            hobi ='$hobies', 
            alamat ='$_POST[alamat]', 
            email ='$_POST[email]', 
            no_hp ='$_POST[no_hp]' 
        WHERE nim='$_POST[nim]'");

    // Check if the query executed successfully
    if ($sql) {
        echo "<script>window.location='index.php?p=mhs'</script>";}
    
    }
}
    

    if ($_GET['proses']=='delete') {
        include 'koneksi.php';
        $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim='$_GET[nim]'");
        if($hapus){
            header('location:index.php?p=mhs'); //redirect
        }
    }

?>