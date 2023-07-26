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
        <div class="row py-5 mt-5 d-flex align-items-center">
            <div class="col-md-6">
                <img src="{{ Vite::asset('storage/app/public/files/' . $wisata->encrypted_filename) }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-6 ps-5">
                <h1 class="fw-semibold mb-md-2 lh-base">{{ $wisata->namawisata }}</h1>
                <p>{{$wisata->deskripsi}}</p>
                <p class="card-text"><i class="bi bi-map"></i> {{ $wisata->lokasi}} </p>
                <p class="card-text"><i class="bi bi-cash"></i> {{ $wisata->htm}} </p>
                <p class="card-text"><i class="bi bi-book"></i> {{ $wisata->jeniswisata->namajenis }}</p>
                <a href="{{ route('details.downloadFile',['wisataId' => $wisata->id]) }}" class="btn btn-primary btn-md py-2 px-4 mt-2"><i class="bi bi-download me-1"></i> Download Foto</a>
                <a href="{{ route('details.index') }}" class="btn btn-dark btn-md py-2 px-4 mt-2"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
            </div>
        </div>
    </div>
</body>