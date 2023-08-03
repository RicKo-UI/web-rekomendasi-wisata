@vite('resources/sass/app.scss')
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-4 border">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Detail Wisata</h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="namawisata" class="form-label">Nama Wisata</label>
                    <h5>{{ $wisata->namawisata }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <h5>{{ $wisata->lokasi }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <h5>{{ $wisata->deskripsi }}</h5>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="htm" class="form-label">HTM</label>
                    <h5>{{ $wisata->htm }}</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-grid">
                    <a href="{{ route('wisatas.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                            class="bi-arrow-left-circle me-2"></i> Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
