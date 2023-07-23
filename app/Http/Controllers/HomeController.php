<?php

namespace App\Http\Controllers;
use App\Models\Wisata;
use App\Models\JenisWisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{

    function index()
    {
        $pageTitle = 'home';
        $wisatas = Wisata::all();

        return view('home', [
            'pageTitle' => $pageTitle,
            'wisatas' => $wisatas
        ]);
    }
}
