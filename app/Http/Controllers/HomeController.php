<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'bookCategory'])->get();
        return view('home', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with(['author', 'bookCategory'])->findOrFail($id);
        return view('book', compact('book'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $books = Book::with(['author', 'bookCategory'])
            ->where('title', 'LIKE', "%$keyword%")
            ->orWhereHas('author', function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            })
            ->orWhereHas('bookCategory', function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            })
            ->get();

        return view('home', compact('books', 'keyword'));
    }
}
