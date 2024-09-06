<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index() 
    {
        $authors = Author::select('tb_authors.id', 'tb_authors.author_name')
            ->selectRaw('COUNT(tb_ratings.id) as total_voter')
            ->join('tb_books', 'tb_authors.id', '=', 'tb_books.id_author')
            ->leftJoin('tb_ratings', 'tb_books.id', '=', 'tb_ratings.id_book')
            ->where('tb_ratings.rating', '>=', 5)
            ->groupBy('tb_authors.id', 'tb_authors.author_name')
            ->orderByDesc('total_voter')
            ->limit(10)
            ->get();

        return view('authors.index', compact('authors'));
    }
}
