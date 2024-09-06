@extends('layouts.app')
@section('content')
<div>
    <h1>Books List</h1>
    <form method="GET" action="{{ route('books') }}">
        <div>
            <div>
                <label for="list_show">List Shown:</label>
                <select name="list_show" id="list_show" onchange="this.form.submit()">
                    @for($i = 10; $i <= 100; $i += 10)
                        <option value="{{ $i }}" {{ $limit == $i ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
        </div>
        <div>
            <label for="search">Search: </label>
            <input type="text" name="search" id="search" value="{{ $search }}" placeholder="Enter book name or author" onchange="this.form.submit()">
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->book_name }}</td>
                <td>{{ $book->category_name }}</td>
                <td>{{ $book->author_name }}</td>
                <td>{{ number_format($book->average_rating, 2) }}</td>
                <td>{{ $book->total_voter }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No books found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection