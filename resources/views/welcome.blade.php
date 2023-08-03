<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Rekomendasi Wisata</title>
    @vite('resources/sass/app.scss')
</head>
<body>
    <div class="container">
        <div class="row pb-5">
            <nav class="navbar sticky-top rounded navbar-expand-lg navbar-dark bg-dark mt-3 px-3">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">Web Rekomendasi Wisata</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
        <div class="row mt-5 d-flex align-items-center">
            <div class="col-md-6 ">
                <h1 class="fw-semibold mb-md-2 lh-base">Website Terbaik untuk Mencari Tempat Wisata Di Jawa Timur</h1>
                <p class="mb-md-4">Bingung mau cari tempat wisata bareng keluarga ataupun sendiri?</p>
                <a href="{{ route('details.index') }}" class="btn btn-md btn-primary py-2 px-4">Liat Disini Aja!</a>
            </div>
            <div class="col-md-6">
                <img src="{{ Vite::asset('resources/images/travel_plans.svg') }}" class="img-fluid float-end" alt="...">
            </div>
        </div>
    </div>

@vite('resources/js/app.js')
</body>
</html>
