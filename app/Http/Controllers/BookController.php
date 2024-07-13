<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('chakriya.book.index')->with('books', $books);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chakriya.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        // Create The book
        $book = new book;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->save();
        Session::flash('book_create','book is created.');
        return redirect('/book/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
