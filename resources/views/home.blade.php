@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@if(isset($keyword))
    <p class="text-muted">Hasil pencarian untuk: <strong>{{ $keyword }}</strong></p>
@endif

<div class="p-4 bg-light rounded shadow">
    <h1 class="mb-3">Selamat Datang di Perpustakaan Online</h1>
    <p>Silahkan cari buku yang ingin kamu baca!</p>
</div>

<div class="container mt-4">
    <div class="row">
        @foreach ($books as $book)
        <div class="col-md-3 mb-4">
            <div class="card shadow" style="width: 100%;">
                <img src="{{ asset('storage/' . $book->cover) }}"
                    class="img-fluid"
                    style="height: 300px; object-fit: cover;"
                    alt="{{ $book->title }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>

                    {{-- Author --}}
                    <p class="text-muted mb-1">
                        <small>By {{ $book->author }}</small>
                    </p>

                    <a href="{{ route('detail', $book->id) }}" class="btn btn-primary w-100">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection
