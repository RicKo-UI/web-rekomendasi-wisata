<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Jeniswisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'list Data';
        $wisatas = Wisata::all();

        return view('wisata.index', [
            'pageTitle' => $pageTitle,
            'wisatas' => $wisatas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tambah Data';
        $jeniswisatas = Jeniswisata::all();
        return view('wisata.create', compact('pageTitle', 'jeniswisatas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'namawisata' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'htm' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $wisata = new Wisata;
        $wisata->namawisata = $request->namawisata;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->htm = $request->htm;
        $wisata->jeniswisata_id = $request->jeniswisata;
        $wisata->save();
        return redirect()->route('wisatas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Employee Wisata';
        // ELOQUENT
        $wisata = Wisata::find($id);
        return view('Wisata.show', compact('pageTitle', 'wisata'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Wisata';
        $jeniswisatas = Jeniswisata::all();
        $wisata = Wisata::find($id);
        return view('Wisata.edit', compact('pageTitle', 'jeniswisatas', 'wisata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
        ];

        $validator = Validator::make($request->all(), [
            'namawisata' => 'required',
            'lokasi' => 'required',
            'deskripsi' => 'required',
            'htm' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $wisata = Wisata::find($id);
        $wisata->namawisata = $request->namawisata;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->htm = $request->htm;
        $wisata->jeniswisata_id = $request->jeniswisata;
        $wisata->save();
        return redirect()->route('wisatas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wisata::find($id)->delete();
        return redirect()->route('wisatas.index');
    }
}
