@extends('layout.main')
@section('title', 'Data Prodi')

@section('content')
<h1>Daftar Prodi</h1>
<div class="row">
    <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
            <img src="images/image1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Teknik Komputer</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
            <img src="images/image1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Manajemen Informatika</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card" style="width: 18rem;">
            <img src="images/image1.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Teknik Rekayasa Perangkat Lunak</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

@endsection
