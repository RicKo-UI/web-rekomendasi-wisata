<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,
initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    @vite('resources/sass/app.scss')
</head>

<body>
<div class="container-sm mt-5">
        <form action="{{ route('wisatas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif

                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Tambah Data Wisata</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="namawisata" class="form-label">Nama Tempat Wisata</label>
                            <input class="form-control" type="text" name="namawisata" id="namawisata" value="" placeholder="Masukan Nama Tempat Wisata">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lokasi" class="form-label">Lokasi</label>
                            <input class="form-control" type="text" name="lokasi" id="lokasi" value="" placeholder="Masukan Lokasi">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input class="form-control" type="text" name="deskripsi" id="deskripsi" value="" placeholder="Masukan Deskripsi">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="htm" class="form-label">Htm</label>
                            <input class="form-control" type="text" name="htm" id="htm" value="" placeholder="Masukan htm">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="poster" class="form-label">poster</label>
                            <input type="file" class="form-control" name="poster" id="poster">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="jeniswisata" class="form-label">Jenis Wisata</label>
                            <select name="jeniswisata" id="jeniswisata" class="form-select">
                                @foreach ($jeniswisatas as $jeniswisata)
                                    <option value="{{ $jeniswisata->id }}"
                                        {{ old('jeniswisata') == $jeniswisata->id ? 'selected' : '' }}>
                                        {{ $jeniswisata->namajenis }}</option>
                                @endforeach
                            </select>
                            @error('jeniswisata')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('wisatas.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-primary btn-lg mt-3"><i class="bi-check-circle me-2"></i>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>