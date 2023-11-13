<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MobilStoreRequest;
use App\Http\Requests\Admin\MobilUpdateRequest;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mobils = Mobil::latest()->get();
        return view('admin.mobil.index', compact('mobils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MobilStoreRequest $request)
    {
        if($request->validated()){
            $gambar = $request->file('gambar')->store('assets/mobil','public');
            $slug = Str::slug($request->nama_mobil, '-');

            Mobil::create($request->except('gambar') + ['gambar' => $gambar, 'slug' => $slug]);
        }
        
        return redirect()->route('admin.mobil.index')->with([
            'message' => 'Data Berhasil Dibuat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mobil $mobil)
    {
        return view('admin.mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MobilUpdateRequest $request, Mobil $mobil)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama_mobil, '-');
            $mobil->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.mobil.index')->with([
            'message' => 'Data Berhasil Diedit',
            'alert-type' => 'info',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mobil $mobil)
    {
        if($mobil->gambar) {
            unlink('storage/'. $mobil->gambar);
        }
        $mobil->delete();

        return redirect()->back()->with([
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'danger'
        ]);

    }

    public function updateImage(Request $request, $mobilId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $mobil = Mobil::findOrFail($mobilId);
        if($request->gambar){
            unlink('storage/'. $mobil->gambar);
            $gambar = $request->file('gambar')->store('assets/mobil', 'public');

            $mobil->update(['gambar' => $gambar]);
        }
        return redirect()->back()->with([
            'message' => 'Gambar Berhasil Diedit',
            'alert-type' => 'info'
        ]);
    }
}
