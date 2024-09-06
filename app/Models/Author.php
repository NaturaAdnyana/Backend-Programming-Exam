<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'tb_authors';

    protected $fillable = ['author_name'];

    public function books()
    {
        return $this->hasMany(Book::class, 'id_author');
    }
}
