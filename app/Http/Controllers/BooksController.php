<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Request successful',
            'data' => Book::all(),
        ], 200);
    }
      /**
     * Store a newly created resource in storage (alias for store).
     */
    public function create( Request $request){
          $newBook = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publicationYear' => $request->publicationYear,
            'genre' => $request->genre,
            'availableCopies' => $request->availableCopies
        ]);

        return response()->json([
            'message' => 'successfully created',
            'data'=> $newBook
        ]);
    }

    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $book = Book::find($id);

        if (!$book){
            return response()->json([
                'message' => 'Book not found'
            ],404);
        }
        return response()->json([
            'message' => 'Book found',
            'data' => $book
        ], 200);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function edit( Request $request, $id)
    {
       $newBook = Book::find($id);
       
       $newBook->update([
             'id' => $request->id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publicationYear' => $request->publicationYear,
            'genre' => $request->genre,
            'availableCopies' => $request->availableCopies
       ]);

       return response()->json([
        'message' => 'Book update successfully',
        'data' => $newBook,
       ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
       $Book = Book::where($id);
       $Book->delete();
       

        return response()->json([
            'message' => 'Delete successfully'
        ], 200);
    }
}