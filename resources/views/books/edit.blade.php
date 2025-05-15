@extends('layouts.app')

@section('content')
<h1>Edit Buku</h1>

<form method="POST" action="{{ route('books.update', $book) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Judul</label>
        <input name="title" class="form-control" value="{{ old('title', $book->title) }}">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input name="author" class="form-control" value="{{ old('author', $book->author) }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description', $book->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Cover</label><br>
        @if($book->cover)
            <img src="{{ asset($book->cover) }}" width="100" class="mb-2">
        @endif
        <input type="file" name="cover" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
