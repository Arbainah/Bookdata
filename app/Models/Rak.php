<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'book_id'];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
