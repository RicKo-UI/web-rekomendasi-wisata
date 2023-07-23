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
        <div class="row mt-5">
            <div class="card-columns">
            @foreach ($wisatas as $wisata)
            <div class="card" style="width: 20rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $wisata->namawisata }}</h5>
                  <p class="card-text">{{ $wisata->deskripsi }} </p>
                  <p class="card-text">{{ $wisata->lokasi}} </p>
                  <p class="card-text">{{ $wisata->htm}} </p>
                  <p class="card-text">{{ $wisata->jeniswisata->namajenis }}</p>

                  <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@vite('resources/js/app.js')
</body>
</html>
