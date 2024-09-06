<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $books = Book::select('id', 'book_name')->get();
        $authors = Author::select('id', 'author_name')->get();

        return view('ratings.add', compact('books', 'authors'));
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:tb_books,id',
            'author_id' => 'required|exists:tb_authors,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::create([
            'id_book' => $request->input('book_id'),
            'id_author' => $request->input('author_id'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books')->with('success', 'Sukses menambahkan rating.');
    }
}
