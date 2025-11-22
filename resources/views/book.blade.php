@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-10">

        <div class="card shadow p-4">
            <div class="row">

                {{-- Book Cover --}}
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $book->cover_path) }}"
                         class="img-fluid rounded w-100 shadow"
                         style="height: 450px; object-fit: cover;"
                         alt="{{ $book->title }}"
                         onerror="this.src='https://via.placeholder.com/300x450?text=No+Cover'">

                    {{-- Read Now Button --}}
                    @if($book->pdf_path)
                    <a href="{{ asset('storage/' . $book->pdf_path) }}"
                       class="btn btn-primary w-100 mt-3"
                       target="_blank">
                        <i class="bi bi-book-fill"></i> Read Now (PDF)
                    </a>
                    @else
                    <button class="btn btn-secondary w-100 mt-3" disabled>
                        PDF Not Available
                    </button>
                    @endif
                </div>

                {{-- Book Details --}}
                <div class="col-md-8">
                    <h2 class="mb-3">{{ $book->title }}</h2>

                    {{-- Author --}}
                    <div class="mb-3">
                        <h6 class="text-muted mb-2">Penulis:</h6>
                        <div class="d-flex align-items-center">
                            @if($book->author && $book->author->avatar_path)
                            <img src="{{ asset('storage/' . $book->author->avatar_path) }}"
                                 class="rounded-circle me-2"
                                 style="width: 40px; height: 40px; object-fit: cover;"
                                 alt="{{ $book->author->name }}">
                            @endif
                            <span class="fw-bold">{{ $book->author->name ?? 'Unknown Author' }}</span>
                        </div>
                    </div>

                    {{-- Year --}}
                    @if($book->year)
                    <p class="mb-2">
                        <strong>Tahun Terbit:</strong> {{ $book->year }}
                    </p>
                    @endif

                    {{-- Category --}}
                    <div class="mb-3">
                        <strong>Kategori:</strong>
                        @if($book->bookCategory)
                        <span class="badge bg-primary">{{ $book->bookCategory->name }}</span>
                        @else
                        <span class="badge bg-secondary">Uncategorized</span>
                        @endif
                    </div>

                    {{-- Stock --}}
                    @if($book->stock)
                    <p class="mb-3">
                        <strong>Stok:</strong>
                        <span class="badge {{ $book->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $book->stock }} tersedia
                        </span>
                    </p>
                    @endif

                    <hr>

                    {{-- Synopsis --}}
                    <h5 class="mb-3">Sinopsis</h5>
                    <p style="text-align: justify; line-height: 1.8;">
                        {!! $book->synopsis ?? 'Tidak ada sinopsis tersedia.' !!}
                    </p>

                    <hr>

                    {{-- Action Buttons --}}
                    <div class="d-flex gap-2">
                        <a href="{{ route('home') }}" class="btn btn-outline-primary">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>

                        <a href="#"
                            class="btn btn-primary"
                            >
                            <i class="bi bi-book-fill"></i> Pinjam di Perpustakaan
                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
