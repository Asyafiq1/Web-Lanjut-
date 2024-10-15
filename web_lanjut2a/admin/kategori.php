<?php 
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>

    <div class="row">
        <h2>Daftar Kategori</h2>
            <div class="col-2 mb-3">
                <a href="index.php?p=kategori&aksi=input" class="btn btn-primary">Tambah Kategori</a>
            </div>
            
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    
                    
                </tr>
                <?php
                    include 'koneksi.php';
                    $ambil=mysqli_query($db,"SELECT * FROM kategori");
                    
                    while($data=mysqli_fetch_array($ambil)){
                ?>
                <tr>
                    <td><?=$data['id']?></td>
                    <td><?=$data['nama_kategori']?></td>
                    <td><?=$data['keterangan']?></td>
                    <td>
                        <a href="index.php?p=kategori&aksi=edit&id=<?=$data['id']?>" class="btn btn-success">Edit</a>
                        <a href="proses_kategori.php?proses=delete&id=<?=$data['id']?>" class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                ?>

            </table>
        </div>    
   
<?php
    break;

    case 'input':    
?>
        <div class="row">
            <div class="col-6 mx-auto">
                <br>
                <h2>Data Kategori</h2>
                <form action="proses_kategori.php?proses=insert" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori">
                </div>

                <div class="mb-3">
                   <label class="form-label">Keterangan</label><br>
                   <textarea name="keterangan" rows="10"></textarea>
                </div>
               
                

            
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    <button type="reset" class="btn btn-warning" name="reset">Reset</button>
                </div>
                <hr>
                </form>
            </div>
        </div>

<?php
    break;

    case 'edit':
        include 'koneksi.php';
        $ambil=mysqli_query($db,"SELECT * FROM kategori WHERE id='$_GET[id]'");
        $data_kategori=mysqli_fetch_array($ambil);
?>

        <div class="row">
            <div class="col-6 mx-auto">
                <br>
                <h2>Data Kategori</h2>
                <form action="proses_kategori.php?proses=edit" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="hidden" class="form-control" name="id" value="<?=$data_kategori['id'] ?>">
                    <input type="text" class="form-control" name="nama_kategori" value="<?=$data_kategori['nama_kategori'] ?>">
                </div>
                
              
                <div class="mb-3">
                    <label class="form-label">Keterangan</label><br>
                    <textarea name="keterangan" value="<?=$data_kategori['keterangan'] ?>" rows="5"></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </div>
                <hr>
                </form>
            </div>
        </div>

<?php
        break;

}
?>