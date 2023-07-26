<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title> 
    @vite('resources/sass/app.scss')
</head>

<body>
    <div class="container-sm mt-5">
        <form action="{{ route('wisatas.update', ['wisata' => $wisata->id]) }}" method="POST" enctype="multipart/form-data"> 
            @csrf 
            @method('put') 
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center"> <i class="bi-person-circle fs-1"></i>
                        <h4>Edit Data</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3"> 
                            <label for="namawisata" class="form-label">First Name</label> 
                            <input class="form-control @error('namawisata') is-invalid @enderror" type="text" name="namawisata" id="namawisata" value="{{ $errors->any() ? old('namawisata') : $wisata->namawisata }}" placeholder="Masukan Nama Tempat Wisata"> 
                            @error('namawisata') 
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror 
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="lokasi" class="form-label">Lokasi</label> 
                            <input class="form-control @error('lokasi') is-invalid @enderror" type="text" name="lokasi" id="lokasi" value="{{ $errors->any() ? old('lokasi') : $wisata->lokasi }}" placeholder="Masukan Lokasi">
                            @error('lokasi') 
                                <div class="text-danger"><small>{{ $message }}</small></div> 
                            @enderror 
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="deskripsi" class="form-label">Deskripsi</label> 
                            <input class="form-control @error('deskripsi') is-invalid @enderror" type="text" name="deskripsi" id="deskripsi" value="{{ $errors->any() ? old('deskripsi') : $wisata->deskripsi }}" placeholder="Masukan Deskripsi"> 
                            @error('deskripsi') 
                                <div class="text-danger"><small>{{ $message }}</small></div> 
                            @enderror 
                        </div>
                        <div class="col-md-6 mb-3"> 
                            <label for="htm" class="form-label">Htm</label>
                            <input class="form-control @error('htm') is-invalid @enderror" type="text" name="htm" id="htm" value="{{ $errors->any() ? old('htm') : $wisata->htm }}" placeholder="Masukan Htm"> 
                            @error('htm') 
                                <div class="text-danger"><small>{{ $message }}</small></div> 
                            @enderror 
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="poster" class="form-label">Poster</label>
                            <h5>{{ $wisata->original_filename }}</h5>
                            <input type="file" class="form-control" name="poster" id="poster" value="{{ $errors->any() ? old('poster') : $wisata->original_filename }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="jeniswisata" class="form-label">Jenis Wisata</label>
                            <select name="jeniswisata" id="jeniswisata" class="form-select">
                                @php
                                $selected = "";
                                if ($errors->any())
                                $selected = old('jeniswisata');
                                else
                                $selected = $wisata->jeniswisata_id;
                                @endphp
                                @foreach ($jeniswisatas as $jeniswisata)
                                    <option value="{{ $jeniswisata->id }}" {{ $selected == $jeniswisata->id ? 'selected' : '' }}>{{ $jeniswisata->namajenis }}</option>
                                @endforeach
                            </select>
                            @error('jeniswisata')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid"> <a href="{{ route('wisatas.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a> </div>
                        <div class="col-md-6 d-grid"> <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button> </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
</body>