<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penanganan Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h2>Form Registrasi Mahasiswa</h2>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td><input type="number" name="nim" required autofocus></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <select name="tgl_lahir">
                        <option value="">-tgl-</option>
                        <?php
                            for ($i=1; $i <=31; $i++)
                            {
                                echo "<option value=".$i.">".$i."</option>";
                            }
                        ?>
                    </select>
                    <select name="bln">
                        <option value="">-bln-</option>
                        <?php
                        $nama_bln=['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
                        foreach ($nama_bln as $bulan)
                        {
                        echo "<option value=".$bulan.">".$bulan."</option>";
                        }
                        ?>
                    </select>
                    <select name="thn">
                        <option value="">-thn-</option>
                        <?php
                        for ($i=date('Y'); $i >=1980; $i--)
                        {
                            echo "<option value=".$i.">".$i."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="jekel" value="L" checked>Laki-laki
                    <input type="radio" name="jekel" value="P">Perempuan
                </td>
            </tr>
            <tr>
                <td>Hobi</td>
                <td>:</td>
                <td>
                    <input type="checkbox" name="hobi[]" value="olahraga">olahraga
                    <input type="checkbox" name="hobi[]" value="membaca">membaca
                    <input type="checkbox" name="hobi[]" value="menulis">menulis
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" id="" cols="30" rows="5"></textarea></td>
            </tr>

            <tr>
                <div class="mb-3">
                    <td><label for="exampleFormControlInput1" class="form-label">Email</label></td>
                    <td>:</td>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Simpan" name="submit"></td>
            </tr>
        </table>

    </form>

    if (isset($_POST['submit'])) 
    {
        echo "<div class='mt-4 p-3 bg-light border rounded'>";
        echo "<h4>Data Registrasi</h4>";
        echo "Nim anda: " . $_POST['nim'] . "<br>";
        echo "Nama anda: " . $_POST['nama'] . "<br>";
        echo "Tanggal Lahir anda: " . $_POST['tgl_lahir'] .'-'. $_POST['bln'] .'-'. $_POST['thn'] . "<br>";
        echo "Jenis Kelamin anda: " . $_POST['jekel'] . "<br>";
        
        if (!empty($_POST['hobi'])) {
            $hobies = implode(", ", $_POST['hobi']);
            echo "Hobi anda: " . $hobies . "<br>";
        } else {
            echo "Hobi anda: Tidak ada<br>";
        }
        
        echo "Alamat anda: " . $_POST['alamat'] . "<br>";
        echo "Email anda: " . $_POST['email'] . "<br>";
        echo "No HP anda: " . $_POST['no_hp'] . "<br>";
        echo "</div>";
    }
    
</body>
</html>