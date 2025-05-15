@extends('layouts.app')

@section('content')
<h1>Tambah Buku</h1>

<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Judul</label>
        <input name="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label>Penulis</label>
        <input name="author" class="form-control" value="{{ old('author') }}">
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Kategori</label>
        <select name="category_id" class="form-select">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Cover</label>
        <input type="file" name="cover" class="form-control">
    </div>

    <button class="btn btn-primary">Simpan</button>
</form>
@endsection
