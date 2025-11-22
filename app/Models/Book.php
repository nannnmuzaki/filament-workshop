<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = [
        'book_category_id',
        'title',
        'author_id',
        'year',
        'synopsis',
        'pdf_path',
        'cover_path',
        'stock',
        // 'available_amount', Kalau mau tambah fitur peminjaman buku
        // 'borrowed_amount'
    ];

    public function bookCategory(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
