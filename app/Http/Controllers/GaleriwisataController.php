<?php

namespace App\Http\Controllers;

use App\Models\Galeriwisata;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galeriwisata  $galeriwisata
     * @return \Illuminate\Http\Response
     */
    public function show(Galeriwisata $galeriwisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galeriwisata  $galeriwisata
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeriwisata $galeriwisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galeriwisata  $galeriwisata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeriwisata $galeriwisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galeriwisata  $galeriwisata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeriwisata $galeriwisata)
    {
        // Slug buat data di routenya
        $slug = request()->getWisataSlug;
        // Delete wisatas Storage
        Storage::delete($galeriwisata->galeri);

        // Delete wisatas Table
        $galeriwisata->delete();
        session()->flash('success', 'Galeri Wisata berhasil dihapus');
        return redirect(route('wisatas.edit', $slug));
    }
}
