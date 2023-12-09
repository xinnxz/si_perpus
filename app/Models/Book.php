<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year',
        'publisher',
        'city',
        'cover',
        'quantity',
        'bookshelf_id',
        'category_id',
    ];

    // Relasi dengan Bookshelf
    public function bookshelf()
    {
        return $this->belongsTo(Bookshelf::class);
    }

    // Relasi dengan Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
