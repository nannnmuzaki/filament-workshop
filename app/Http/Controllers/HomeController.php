<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $books=Book::all();
        return view('home', compact('books'));
    }

    public function show($id)
    {
         $book = Book::findOrFail($id);
        return view('detail', compact('book'));
    }

    public function search(Request $request)
{
    $keyword = $request->keyword;

    $books = Book::where('title', 'LIKE', "%$keyword%")
                 ->orWhere('author', 'LIKE', "%$keyword%")
                 ->orWhere('book_category_id', 'LIKE', "%$keyword%")
                 ->get();

    return view('home', compact('books', 'keyword'));
}

}
