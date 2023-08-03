<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar sticky-top rounded navbar-expand-lg navbar-dark bg-dark mt-3 px-3">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Web Rekomendasi Wisata</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('details.index') }}">List Wisata</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            @foreach ($wisatas as $wisata)
            <div class="col-md-6">
                <div class="card mb-3">
                    <img src="{{ Vite::asset('storage/app/public/files/' . $wisata->encrypted_filename) }}" class="card-img-top" alt="..." style="max-height: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wisata->namawisata }}</h5>
                        <p class="card-text">{{ $wisata->deskripsi }} </p>
                        <p class="card-text"><i class="bi bi-map"></i> {{ $wisata->lokasi}} </p>
                        <p class="card-text"><i class="bi bi-cash"></i> {{ $wisata->htm}} </p>
                        <p class="card-text"><i class="bi bi-book"></i> {{ $wisata->jeniswisata->namajenis }}</p>
                        <a href="{{ route('details.show', ['detail' => $wisata->id]) }}" class="btn btn-primary py-2 px-3">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@vite('resources/js/app.js')
</body>
</html>
