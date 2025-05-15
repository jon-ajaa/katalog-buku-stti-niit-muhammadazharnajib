@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ $book->title }}</h4>
    </div>

    <div class="card-body">
        <div class="row">
            @if($book->cover)
            <div class="col-md-4 mb-3 text-center">
                <img src="{{ asset($book->cover) }}" alt="Cover" class="img-fluid rounded border">
            </div>
            @endif

            <div class="col-md-8">
                <p><strong>Penulis:</strong> {{ $book->author }}</p>
                <p><strong>Kategori:</strong> {{ $book->category->name }}</p>
                <p><strong>Deskripsi:</strong></p>
                <div class="border rounded p-3 bg-light">
                    {{ $book->description }}
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">← Kembali ke Daftar Buku</a>
    </div>
</div>
@endsection
