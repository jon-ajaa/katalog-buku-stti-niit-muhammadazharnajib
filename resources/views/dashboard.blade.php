@extends('layouts.app')

@section('content')
<h1>Dashboard Admin</h1>

<div class="row">
    <div class="col-md-4"><div class="card p-3 bg-light">📚 Total Buku: <strong>{{ $bookCount }}</strong></div></div>
    <div class="col-md-4"><div class="card p-3 bg-light">📂 Total Kategori: <strong>{{ $categoryCount }}</strong></div></div>
    <div class="col-md-4"><div class="card p-3 bg-light">👤 Total User: <strong>{{ $userCount }}</strong></div></div>
</div>
@endsection
