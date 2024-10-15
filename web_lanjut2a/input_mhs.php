

<div class="container mt-5">
    <h2 class="text-center mb-4">Form Registrasi Mahasiswa</h2>
    <form action="" method="POST" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="nim" class="form-label">Nim</label>
            <input type="number" class="form-control" id="nim" name="nim" required autofocus>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <div class="d-flex">
                <select name="tgl" class="form-select me-2" required>
                    <option value="">-tgl-</option>
                    <?php
                        for ($i=1; $i <=31; $i++) {
                            echo "<option value=".$i.">".$i."</option>";
                        }
                    ?>
                </select>
                <select name="bln" class="form-select me-2" required>
                    <option value="">-bln-</option>
                    <?php
                    $nama_bln=[1=>'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
                    foreach ($nama_bln as $indexBulan => $bulan) {
                        echo "<option value=".$indexBulan.">".$bulan."</option>";
                    }
                    ?>
                </select>
                <select name="thn" class="form-select" required>
                    <option value="">-thn-</option>
                    <?php
                    for ($i=date('Y'); $i >=1980; $i--) {
                        echo "<option value=".$i.">".$i."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jekel" id="default1" value="L" required>
                    <label class="form-check-label" for="default1">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jekel" id="default2" value="P">
                    <label class="form-check-label" for="default2">Perempuan</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Hobi</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="olahraga" id="hobi1">
                    <label class="form-check-label" for="hobi1">Olahraga</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="membaca" id="hobi2">
                    <label class="form-check-label" for="hobi2">Membaca</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="hobi[]" value="menulis" id="hobi3">
                    <label class="form-check-label" for="hobi3">Menulis</label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="tel" class="form-control" id="no_hp" name="no_hp" placeholder="08xxxxxxx" required>
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
        $tgl = $_POST['thn'].'-'.$_POST['bln'].'-'.$_POST['tgl'];
        $hobies=implode(", ", $_POST['hobi']);
        $sql=mysqli_query($db,"INSERT INTO mahasiswa (nim,nama,tgl_lahir,jekel,hobi,alamat,email,no_hp) VALUES('$_POST[nim]','$_POST[nama]','$tgl','$_POST[jekel]','$hobies','$_POST[alamat]','$_POST[email]','$_POST[no_hp]')");

        if($sql){
            echo"<script>window.location='list_mhs.php?p=mhs'</script>";
            //header('location:list_mhs.php');
        }


    }
    ?>
</div>


