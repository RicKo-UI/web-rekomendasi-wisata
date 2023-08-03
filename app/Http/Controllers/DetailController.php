<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'list Wisata';
        $wisatas = Wisata::all();

        return view('detail.index', [
            'pageTitle' => $pageTitle,
            'wisatas' => $wisatas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Detail';
        // ELOQUENT
        $wisata = Wisata::find($id);

        return view('detail.show', compact('pageTitle', 'wisata'));
    }

    public function downloadFile($wisataId)
    {
        $wisata = wisata::find($wisataId);
        $encryptedFilename = 'public/files/'.$wisata->encrypted_filename;
        $downloadFilename =
        Str::lower($wisata->namawisata.'_gambar.png');
        if(Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        } 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
