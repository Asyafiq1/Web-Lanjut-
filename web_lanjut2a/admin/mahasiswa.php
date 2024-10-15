

<?php
        $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        switch($aksi){
            case 'list';
    ?>
        <div class="row">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Mahasiswa</h1>
      </div>

            <div class="col-3 mb-3">
                <a href="index.php?p=mhs&aksi=input" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Tambah Mahasiswa</a>
            </div>

            <div class="table-responsive small">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi ID</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                </tr>

                <?php
                    include 'koneksi.php';
                    $ambil=mysqli_query($db,"SELECT * FROM mahasiswa");
                    $no = 1;
                    while ($data=mysqli_fetch_array($ambil)) {
                ?>

                <tr>
                    <td><?= $no?></td>
                    <td><?= $data['nim']?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['tgl_lahir']?></td>
                    <td><?= $data['alamat']?></td>
                    <td><?= $data['email']?></td>
                    <td><?= $data['no_hp']?></td>
                    
                    <td>
                        <a href="index.php?p=mhs&aksi=edit&nim=<?= $data['nim']?>" class="btn btn-success"><i class="bi bi-pencil"></i> Edit</a>
                        <a href="delete_mhs.php?nim=<?= $data['nim']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash"></i> Delete</a>
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
        <h1 class="h2">Input Mahasiswa</h1>
      </div>

    <form action="proses_mhs.php?proses=insert" method="POST" class="bg-white p-4 rounded shadow-sm">
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
    </div>

    <?php
    break;

    case 'edit';
        include 'koneksi.php';
        $ambil=mysqli_query($db,"SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
        $data_mhs=mysqli_fetch_array($ambil);
        $tgl=explode("-",$data_mhs['tgl_lahir']);
        $hobies=explode(",",$data_mhs['hobi']);
        
    ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Mahasiswa</h1>
      </div>

    <form action="proses_mhs.php?proses=edit" method="POST" class="bg-white p-4 rounded shadow-sm">
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
    break;

}
?>
