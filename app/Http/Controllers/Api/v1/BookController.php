<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::all();
        return response()->json($book);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->publicationYear = $request->publicationYear;
        $book->genre = $request->genre;
        $book->availableCopies = $request->availableCopies;
        $book->author_id = $request->author_id;
        $book->save();
        return response()->json([
            'status'=> 'book create successfully',
            'book'=>$book
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book =  Book::find($id);
        return response()->json([
            'message'=> 'book not found',
            'book'=> $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request->title ?? $book->title;
        $book->isbn = $request->isbn ?? $book->isbn;
        $book->publicationYear = $request->publicationYear ?? $book->publicationYear;
        $book->genre = $request->genre?? $book->genre;
        $book->availableCopies  = $request->availableCopies ?? $book->availableCopies ;
        $book->author_id = $request->author_id ?? $book->author_id;
        $book->save();
        return response()->json([
            'status'=> 'Update successfully',
            'book'=> $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if(!$book){
            return response()->json([ 'message'=>'Book not found'], 404);
        }
        $book->delete();
        return response()->json([ 'message'=>'Delete book successfully'], 201);
    }
}
