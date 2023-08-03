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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container"> <a href="" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i>Dasboard Admin</a> <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <hr class="d-lg-none text-white-50">
                <ul class="navbar-nav flex-row flex-wrap py-2"> 
                    <li class="nav-item col-2 col-md-auto"><a href="" class="nav-link active">List Data Wisata</a></li>
                    <li class="nav-item col-2 col-md-auto dropdown ms-auto">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2"> <a href="{{ route('wisatas.create') }}" class="btn btn-primary">Tambah Data</a> </div>
            </div>
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
                <thead>
                    <tr>
                        <th>Nama Wisata</th>
                        <th>Lokasi</th>
                        <th>Deskripsi</th>
                        <th>Htm</th>
                        <th>Jenis Wisata</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($wisatas as $wisata) 
                    <tr>
                        <td>{{ $wisata->namawisata }}</td>
                        <td>{{ $wisata->lokasi }}</td>
                        <td>{{ $wisata->deskripsi }}</td>
                        <td>{{ $wisata->htm }}</td>
                        <td>{{ $wisata->jeniswisata->namajenis }}</td>
                        <td>{{-- ACTIONS SECTION --}}
                            <div class="d-flex">
                                <a href="{{ route('wisatas.show', ['wisata' => $wisata->id]) }}" class="btn btn-outline-info btn-sm me-2"><i class="bi-person-lines-fill"></i></a> 
                                <a href="{{ route('wisatas.edit', ['wisata' => $wisata->id]) }}" class="btn btn-outline-warning btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                <div>
                                    <form action="{{ route('wisatas.destroy', ['wisata' => $wisata->id]) }}" method="POST"> 
                                        @csrf 
                                        @method('delete') 
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2 btn-delete" data-name="{{ $wisata->namawisata.' '.$wisata->lokasi }}"> <i class="bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
    @include('sweetalert::alert')
    @vite('resources/js/app.js')
        <script type="module">
            $(document).ready(function() {
                $('#employeeTable').DataTable();
                $(".datatable").on("click", ".btn-delete", function (e) {
                    e.preventDefault();

                    var form = $(this).closest("form");
                    var name = $(this).data("name");

                    Swal.fire({
                        title: "Are you sure want to delete\n" + name + "?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "bg-primary",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
</body>

</html>