<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
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
    public function create( StoreBookRequest $request){
            $newBook = Book::create($request -> validated());

            return response()->json([
                'message' => 'successfully created',
                'data'=> $newBook
        ],200);

    }

    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $book = Book:: with('author') -> find($id);

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
   public function edit(StoreBookRequest $request, $id)
{
    $book = Book::find($id);

    if (!$book) {
        return response()->json([
            'success' => false,
            'message' => 'Book not found',
        ], 404);
    }

    // Update the book with only validated input
    $book->update($request->validated());

    return response()->json([
        'message' => 'Book updated successfully',
        'data' => $book,    
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
       $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
        $book->delete();

        return response()->json([
            'message' => 'Delete successfully'
        ], 200);
    }
}