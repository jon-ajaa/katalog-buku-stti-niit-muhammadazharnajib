@extends('layouts.app')

@section('content')
<h1>Daftar Kategori</h1>

<a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Tambah Kategori</a>

<table class="table table-bordered">
    <thead><tr><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
        @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $cat) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus kategori?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $categories->links() }}
@endsection
