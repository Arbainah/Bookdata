<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'kategori',
        'halaman',
        'jumlah'
    ];

    public function raks()
    {
        return $this->hasOne(Rak::class);
    }
}
