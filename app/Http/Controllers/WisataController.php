<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Wisata;
use App\Models\Jeniswisata;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'list Data';
        confirmDelete();
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

        $file = $request->file('poster');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            // Store File
            $file->store('public/files');
        }

        $wisata = new Wisata;
        $wisata->namawisata = $request->namawisata;
        $wisata->lokasi = $request->lokasi;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->htm = $request->htm;
        $wisata->jeniswisata_id = $request->jeniswisata;

        if ($file != null) {
            $wisata->original_filename = $originalFilename;
            $wisata->encrypted_filename = $encryptedFilename;
        }

        $wisata->save();
        Alert::success('Added Successfully', 'Data Added Successfully.');
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

        if ($request->hasFile('poster')) {
            // Delete existing file if any
            if ($wisata->encrypted_filename) {
                Storage::delete('public/files/' . $wisata->encrypted_filename);
            }
    
            $file = $request->file('poster');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
    
            // Store new file
            $file->storeAs('public/files', $encryptedFilename);
    
            $wisata->original_filename = $originalFilename;
            $wisata->encrypted_filename = $encryptedFilename;
        }
        $wisata->save();
        Alert::success('Changed Successfully', 'Data Changed Successfully.');
        return redirect()->route('wisatas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function downloadFile($wisataId)
    {
        $wisata = wisata::find($wisataId);
        $encryptedFilename = 'public/files/'.$wisata->encrypted_filename;
        $downloadFilename =
        Str::lower($wisata->namawisata.'_gambar.pdf');
        if(Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        } 
    }
    public function deleteFile($filename)
    {
        Storage::delete('public/files/' . $filename);
    }

    public function destroy(string $id)
    {
        $wisata = Wisata::find($id);
        if ($wisata) {
            // Delete associated file
            if ($wisata->encrypted_filename) {
                $this->deleteFile($wisata->encrypted_filename);
            }
    
            $wisata->delete();
            
            Alert::success('Deleted Successfully', 'Data Deleted Successfully.');
            return redirect()->route('wisatas.index')->with('success', 'Data karyawan berhasil dihapus.');
        }
        Alert::success('Deleted Successfully', 'Data Deleted Successfully.');
        return redirect()->route('wisatas.index');
    }
}
