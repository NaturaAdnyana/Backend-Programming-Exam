<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('list_show', 10);
        $search = $request->input('search', '');

        $books = Book::select('book_name', 'tb_categories.category_name', 'tb_authors.author_name')
        ->join('tb_categories', 'tb_books.id_category', '=', 'tb_categories.id')
        ->join('tb_authors', 'tb_books.id_author', '=', 'tb_authors.id')
        ->selectRaw('AVG(tb_ratings.rating) as average_rating, COUNT(tb_ratings.id) as total_voter')
        ->leftJoin('tb_ratings', 'tb_books.id', '=', 'tb_ratings.id_book')
        ->when($search, function($query, $search) {
            return $query->where('tb_books.book_name', 'like', "%{$search}%")
                         ->orWhere('tb_authors.author_name', 'like', "%{$search}%");
        })
        ->groupBy('tb_books.id', 'book_name', 'tb_categories.category_name', 'tb_authors.author_name')
        ->orderByDesc('average_rating')
        ->limit($limit)
        ->get();

        return view('books.index', compact('books', 'limit', 'search'));
    }
}
