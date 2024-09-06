@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Top 10 Most Famous Authors</h2>

    <!-- Table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voters</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $index => $author)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $author->author_name }}</td>
                    <td>{{ $author->total_voter }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No authors found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection