<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'slug', 'deskripsi', 'lokasi', 'gmap',  'gambar',
    ];

    public function galeriwisatas()
    {
        return $this->hasMany(Galeriwisata::class);
    }

    public function takeImage()
    {
        // dd($this->gambar);
        return "/storage/" . $this->gambar;
    }
}
