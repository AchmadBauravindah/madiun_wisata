<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePenginapanRequest;
use App\Http\Requests\UpdatePenginapanRequest;
use App\Models\Lodger;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class PenginapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penginapans =  Penginapan::latest()->paginate(8);
        return view('penginapans.index', compact('penginapans'));
    }

    public function indexLodger()
    {
        $lodger_id = auth()->guard('lodger')->user()->id;
        $penginapans =
            DB::table('penginapans')
            ->where('lodger_id', '=', $lodger_id)
            ->get();
        return view('auth.lodger.penginapans.index', compact('penginapans'));
    }

    public function indexAdmin()
    {
        $penginapans = Penginapan::all();
        return view('auth.admin.verification-penginapans.index', compact('penginapans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Penginapan $penginapan)
    {
        return view('auth.lodger.penginapans.create', compact('penginapan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenginapanRequest $request)
    {
        $attr = $request->all();

        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Menyimpan File imgdepan
        $imgdepan = request()->file('imgdepan');
        $imgdepanUrl = $imgdepan->storeAs("images/penginapans/imgdepan", "{$slug}-imgdepan.{$imgdepan->extension()}");
        $attr['imgdepan'] = $imgdepanUrl;
        // Menyimpan File imgkamar
        $imgkamar = request()->file('imgkamar');
        $imgkamarUrl = $imgkamar->storeAs("images/penginapans/imgkamar", "{$slug}-imgkamar.{$imgkamar->extension()}");
        $attr['imgkamar'] = $imgkamarUrl;
        // Menyimpan File imgwc
        $imgwc = request()->file('imgwc');
        $imgwcUrl = $imgwc->storeAs("images/penginapans/imgwc", "{$slug}-imgwc.{$imgwc->extension()}");
        $attr['imgwc'] = $imgwcUrl;

        // lodger_id
        $attr['lodger_id'] = auth()->guard('lodger')->user()->id;

        Penginapan::create($attr);

        session()->flash('success', 'Penginapan telah ditambahkan');
        return redirect(route('lodger.penginapans'));
    }

    public function show(Penginapan $penginapan)
    {
        if (!$penginapan) {
            abort(404);
        }

        return view('auth.admin.penginapans.show', compact('penginapan'));
    }

    public function showAdmin(Penginapan $penginapan)
    {
        if (!$penginapan) {
            abort(404);
        }

        $lodger_id = $penginapan->lodger_id;
        $lodger = Lodger::find($lodger_id);

        return view('auth.admin.verification-penginapans.show', compact('penginapan', 'lodger'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penginapan $penginapan)
    {
        return view('auth.lodger.penginapans.edit', compact('penginapan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenginapanRequest $request, Penginapan $penginapan)
    {
        $attr = $request->all();
        $slug = Str::slug($request->nama);
        $attr['slug'] = $slug;

        // Jika tidak ada img maka ambil gambar sebelumnya
        $imgdepan = request()->file('imgdepan');
        if ($imgdepan) {
            Storage::delete($penginapan->imgdepan);
            $imgdepanUrl = $imgdepan->storeAs("images/penginapans/imgdepan", "{$slug}-imgdepan.{$imgdepan->extension()}");
        } else {
            $imgdepanUrl = $penginapan->imgdepan;
        }
        $imgkamar = request()->file('imgkamar');
        if ($imgkamar) {
            Storage::delete($penginapan->imgkamar);
            $imgkamarUrl = $imgkamar->storeAs("images/penginapans/imgkamar", "{$slug}-imgkamar.{$imgkamar->extension()}");
        } else {
            $imgkamarUrl = $penginapan->imgkamar;
        }
        $imgwc = request()->file('imgwc');
        if ($imgwc) {
            Storage::delete($penginapan->imgwc);
            $imgwcUrl = $imgwc->storeAs("images/penginapans/imgwc", "{$slug}-imgwc.{$imgwc->extension()}");
        } else {
            $imgwcUrl = $penginapan->imgwc;
        }

        $attr['imgdepan'] = $imgdepanUrl;
        $attr['imgkamar'] = $imgkamarUrl;
        $attr['imgwc'] = $imgwcUrl;


        $penginapan->update($attr);

        session()->flash('success', 'Penginapan berhasil diedit');
        return redirect(route('lodger.penginapans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penginapan  $penginapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penginapan $penginapan)
    {
        $penginapan->delete();
        Storage::delete($penginapan->imgdepan);
        Storage::delete($penginapan->imgkamar);
        Storage::delete($penginapan->imgwc);
        session()->flash('success', 'Penginapan berhasil dihapus');
        return redirect(route('lodger.penginapans'));
    }

    public function verification(Penginapan $penginapan)
    {
        $attr = request()->all();
        if (request()->agree == 2) {
            session()->flash('success', 'Penginapan telah diterima');
        } else {
            session()->flash('success', 'Penginapan telah ditolak');
        }
        $penginapan->update($attr);

        return redirect(route('admin.penginapans'));
    }
}
