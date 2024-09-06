<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'tb_books';

    protected $fillable = ['book_name', 'id_category', 'id_author'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function author()
    {
        return $this->belongsTo(Author::class, 'id_author');
    }
}
