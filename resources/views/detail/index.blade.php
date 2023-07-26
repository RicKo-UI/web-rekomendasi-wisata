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
