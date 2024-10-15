<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Jurusan TI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">

</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php?p=home">App TI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active <?=($_GET['p']=='home') ? 'active' : '' ?>" aria-current="page" href="index.php?p=home">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=($_GET['p']=='home') ? 'active' : '' ?>" href="index.php?p=mhs">Mahasiswa</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=($_GET['p']=='home') ? 'active' : '' ?>" href="index.php?p=prodi">Prodi</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?=($_GET['p']=='home') ? 'active' : '' ?>" href="index.php?p=dosen">Dosen</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>

      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
      </li>
      </ul>
      
    </div>
  </div>
</nav>

<div class="container">
    <?php
        $page=isset($_GET['p']) ? $_GET['p'] : 'home';
        if ($page=='home') include 'home.php';
        if ($page=='mhs') include 'mahasiswa.php';
        if ($page=='prodi') include 'prodi.php';
        if ($page=='dosen') include 'dosen.php';
        
        
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  new DataTable('#example');
</script>
</body>
</html>