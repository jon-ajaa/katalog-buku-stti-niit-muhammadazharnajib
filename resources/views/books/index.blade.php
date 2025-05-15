@extends('layouts.app')

@section('content')
<h1>Daftar Buku</h1>

<form method="GET" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul atau penulis">
        </div>
        <div class="col-md-4">
            <select name="category" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Filter</button>
        </div>
        @if(auth()->check() && auth()->user()->role === 'admin')
            <div class="col-md-2 text-end">
                <a href="{{ route('books.create') }}" class="btn btn-success">Tambah Buku</a>
            </div>
        @endif
    </div>
</form>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Cover</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($books as $book)
        <tr>
            <td>
                @if($book->cover)
                    <img src="{{ asset($book->cover) }}" width="80">
                @endif
            </td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category->name }}</td>
            <td>
                <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">Detail</a>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus buku ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $books->withQueryString()->links() }}
@endsection
