<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subject;
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
        $subjects = Subject::all();
        $categories = Category::all();

        return view('chakriya.book.create', compact('subjects', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_name' => 'required|string|max:255',
            'book_number' => 'required|numeric|min:1',
            'book_isbn' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'subject_id' => 'required|exists:subject,id',
            'category_id' => 'required|exists:category,id',
            'book_quantity' => 'nullable|integer|min:0',
            'book_price' => 'required|numeric|min:0',
            
         ]);
         // Handle file upload
        //  if ($request->hasFile('photo')) {
        //  $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        // }

         Book::create($validatedData);

         Session::flash('book_create', 'Book is created.');
         return redirect()->route('book.list');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Book::find($id);
        return view('chakriya.book.show')->with('books', $books);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        $subjects = Subject::all();
        $categories = Category::all();

        return view('chakriya.book.edit', compact('book', 'subjects', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validator = Validator::make($request->all(), [
            'book_name' => 'required|string|max:255',
            'book_number' => 'required|numeric|min:1',
            'book_isbn' => 'required|string|max:255',
            'book_author' => 'required|string|max:255',
            'subject_id' => 'required|exists:subject,id',
            'category_id' => 'required|exists:category,id',
            'book_quantity' => 'nullable|integer|min:0',
            'book_price' => 'required|numeric|min:0',
            
		]);

		if ($validator->fails()) {
            return redirect()->route('book.edit', ['bookId' => $id])
                ->withInput()
                ->withErrors($validator);
		}

		// Create The Book
		$book = Book::find($id);
		$book-> book_name = $request->input('book_name');
        $book -> book_isbn = $request->input('book_isbn');
        $book -> book_author = $request->input('book_author');
        $book-> subject_id = $request->input('subject_id');
        $book-> category_id = $request->input('category_id');
        $book-> book_price = $request->input('book_price');
        $book->book_number = $request->inputnput('book_number');
        $book->book_author = $request->input('book_author');
        $book-> book_quantity = $request->input('book_quantity');       
        //$book->photo = $request->input('photo');       
		$book->save();

		Session::flash('book_update','Book is updated.');
       return redirect()->route('book.edit', ['bookID' => $id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        Session::flash('book_delete', 'book is deleted.');
        return redirect('book');
    }

}