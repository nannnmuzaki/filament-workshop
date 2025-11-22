@extends('layouts.app')

@section('title', 'Beranda')

@section('content')

@if(isset($keyword))
    <div class="alert alert-info">
        Hasil pencarian untuk: <strong>{{ $keyword }}</strong>
        @if($books->count() > 0)
            - Ditemukan {{ $books->count() }} buku
        @else
            - Tidak ada hasil
        @endif
    </div>
@endif

<div class="p-4 bg-light rounded shadow">
    <h1 class="mb-3">Selamat Datang di Perpustakaan Online</h1>
    <p>Silahkan cari buku yang ingin kamu baca!</p>
</div>

<div class="container mt-4">
    @if($books->count() > 0)
        <div class="row">
            @foreach ($books as $book)
            <div class="col-md-3 mb-4">
                <div class="card shadow h-100">
                    <img src="{{ asset('storage/' . $book->cover_path) }}"
                        class="card-img-top"
                        style="height: 300px; object-fit: cover;"
                        alt="{{ $book->title }}"
                        onerror="this.src='https://via.placeholder.com/300x400?text=No+Cover'">

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate" title="{{ $book->title }}">
                            {{ $book->title }}
                        </h5>

                        {{-- Author --}}
                        <p class="text-muted mb-1">
                            <small>
                                <i class="bi bi-person"></i>
                                By {{ $book->author->name ?? 'Unknown' }}
                            </small>
                        </p>

                        {{-- Category --}}
                        @if($book->bookCategory)
                        <p class="mb-2">
                            <span class="badge bg-info">{{ $book->bookCategory->name }}</span>
                        </p>
                        @endif

                        <div class="mt-auto">
                            <a href="{{ route('detail', $book->id) }}" class="btn btn-primary w-100">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center">
            <h5>Tidak ada buku ditemukan</h5>
            <p class="mb-0">Coba gunakan kata kunci lain atau kembali ke <a href="{{ route('home') }}">beranda</a></p>
        </div>
    @endif
</div>

@endsection
