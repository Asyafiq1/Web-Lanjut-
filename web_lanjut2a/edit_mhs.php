

<?php
    include 'koneksi.php';
    $ambil=mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
    $data_mhs=mysqli_fetch_array($ambil);
    $tgl=explode("-",$data_mhs['tgl_lahir']);
    $hobies=explode(",",$data_mhs['hobi']);

?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Edit Data Mahasiswa</h2>
    <form action="" method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input type="number" class="form-control" id="nim" name="nim" value="<?=$data_mhs['nim']?>" readonly>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?=$data_mhs['nama']?>"required>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <div class="d-flex">
                <select name="tgl" class="form-select me-2" required>
                    <option value="">-tgl-</option>
                    <?php
                        for ($i=1; $i <=31; $i++) {
                            $selected=($tgl[2]==$i) ? 'selected' : '';
                            echo "<option value=".$i." $selected>".$i."</option>";
                        }
                    ?>
                </select>
                <select name="bln" class="form-select me-2" required>
                    <option value="">-bln-</option>
                    <?php
                    $nama_bln=[1=>'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
                    foreach ($nama_bln as $indexBulan => $bulan) {
                        $selected=($tgl[1]==$indexBulan) ? 'selected' : ''; //ternary
                        echo "<option value=".$indexBulan." $selected>".$bulan."</option>";
                    }
                    ?>
                </select>
                <select name="thn" class="form-select" required>
                    <option value="">-thn-</option>
                    <?php
                    for ($i=date('Y'); $i >=1980; $i--) {
                        $selected=($tgl[0]==$i) ? 'selected' : '';
                        echo "<option value=".$i." $selected>".$i."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jekel" id="default1" value="L" <?= ($data_mhs['jekel']=='L') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jekel" id="default2" value="P" <?= ($data_mhs['jekel']=='P') ? 'checked' : ''?>>
                    <label class="form-check-label" for="default2">Perempuan</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Hobi</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="olahraga" id="hobi1" <?php if(in_array('olahraga',$hobies)) echo 'checked' ?> >
                    <label class="form-check-label" for="hobi1">Olahraga</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="membaca" id="hobi2" <?php if(in_array('membaca',$hobies)) echo 'checked' ?> >
                    <label class="form-check-label" for="hobi2">Membaca</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="menulis" id="hobi3" <?php if(in_array('menulis',$hobies)) echo 'checked' ?> >
                    <label class="form-check-label" for="hobi3">Menulis</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?=$data_mhs['alamat']?></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?=$data_mhs['email']?>" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxxxxx" value="<?=$data_mhs['no_hp']?>" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary " name="submit">Update</button>
        </div>
    </form>

    <?php
if (isset($_POST['submit'])) 
{
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
        echo "<script>window.location='index.php?p=mhs'</script>";
    }
}
?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

