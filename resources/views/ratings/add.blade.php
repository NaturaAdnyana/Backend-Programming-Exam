@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h2>Add New Rating</h2>

    <form method="POST" action="{{ route('ratings.store') }}">
        @csrf
        <div>
            <label for="author_id">Book Author:</label>
            <select name="author_id" id="author_id">
                <option value="">-- Select Author --</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->author_name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div>
            <label for="book_id">Book Name:</label>
            <select name="book_id" id="book_id">
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->book_name }}</option>
                @endforeach
            </select>
            @error('book_id')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating">Rating (1-10):</label>
            <select name="rating" id="rating">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
            @error('rating')
                <small>{{ $message }}</small>
            @enderror
        </div>
        <button type="submit">Submit Rating</button>
    </form>
</div>
@endsection