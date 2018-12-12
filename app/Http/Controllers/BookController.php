<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use PHPUnit\Framework\Constraint\Count;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::latest()->get();
        return view('books.books', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
        //Validation
        $this->validate(request(),[
            'author' => 'required|min:3',
            'title' => 'required|min:3',
            'publisher' => 'required|min:3',
            'price' => 'required|integer',
            'picture' => 'required'
        ]);
        Book::create(request(['author','title','publisher','price','picture']));
        return redirect('/books');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $book = Book::find($id);
        return view('books.edit',compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //validate input
        $this->validate(request(),[
            'author' => 'required',
            'title' => 'required|min:3',
            'price' => 'required|integer',
            'publisher' => 'required',
            'picture' => 'required'
        ]);
        //update
        $book  = Book::find($id);
        $book->author             = request('author');
        $book->title      = request('title');
        $book->publisher           = request('publisher');
        $book->price           = request('price');
        $book->picture           = request('picture');
        $book->save();
        // redirect
        return redirect('books');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // delete
        $book = Book::find($id);
        $book->delete();
        // redirect
        return redirect('books');
    }

    public function search()
    {
        $searchData = request('searchData');

        $books = Book::where('title', 'like', '%' . $searchData . "%" )->get();

        return view('products', compact('books'));
    }
}

