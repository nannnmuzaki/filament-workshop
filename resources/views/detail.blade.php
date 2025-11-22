@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">

        <div class="card shadow p-4">
            <div class="row">

                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $book->cover) }}"
                         class="img-fluid rounded w-100"
                         style="height: 350px; object-fit: cover;"
                         alt="{{ $book->title }}">
                </div>

                <div class="col-md-8">
                    <h2>{{ $book->title }}</h2>
                    <p class="text-muted">Penulis: {{ $book->author }}</p>

                    <hr>
                    <h5>Sinopsis</h5>
                    <p style="text-align: justify;">{{ $book->stok }}</p>

                    <hr>
                    <h5>Kategori</h5>
                    <span class="badge text-bg-primary">{{ $book->category->name }}</span>

                    <hr>
                    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali</a>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
