<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public $BookObject = [
        [
            "id" => "01",
            "title" => "Sample Book 1",
            "author" => "Chhea", 
            "isbn" => "1234567890123",
            "publicationYear" => 2020, 
            "genre" => "Fiction",
            "availableCopies" => 5
        ],
        [
            "id" => "02", 
            "title" => "Sample Book 2",
            "author" => "Sang  Meng",
            "isbn" => "9876543210987",
            "publicationYear" => 2021,
            "genre" => "Non-Fiction",
            "availableCopies" => 3
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Request successful',
            'data' => $this->BookObject
        ], 200);
    }
      /**
     * Store a newly created resource in storage (alias for store).
     */
    public function create( Request $request){
          $newBook = [
            'id' => $request->id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publicationYear' => $request->publicationYear,
            'genre' => $request->genre,
            'availableCopies' => $request->availableCopies
        ];

        return response()->json([
            'message' => 'successfully created',
            'data'=> $newBook
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {

        // Create new book
        $newBook = [
            'id' => $request->id,
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'publicationYear' => $request->publicationYear,
            'genre' => $request->genre,
            'availableCopies' => $request->availableCopies
        ];

        $this->BookObject[] = $newBook;

        return response()->json([
            'message' => 'Successfully created',
            'data' => $newBook
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = null;
        foreach ($this->BookObject as $item) {
            if ($item['id'] === $id) { 
                $book = $item;
                break;
            }
        }

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Book found',
            'data' => $book
        ], 200);
    }
   

    /**
     * Update the specified resource in storage.
     */
    public function edit( string $id, Request $request)
    {
        $index = null;
        foreach($this->BookObject as $key => $item){
            if ($item['id'] === $id){
                $index = $key;
            }
        }
         // Check if book exists
        if ($index === null) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
        $updatedBook = array_merge($this->BookObject[$index], $request->only([
            'title',
            'author',
            'isbn',
            'publicationYear',
            'genre',
            'availableCopies'
        ]));    
        $this->BookObject[$index] = $updatedBook;
        return response()->json([
            'message' => 'successfully update',
            'data' => $updatedBook

        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $index = null;
        foreach ($this-> BookObject as $key => $item){
            if ($item['id'] === $id){
                $index = $key;
                break;
            }
        }
        if ($index === null){
            return response()->json([
                 'message'=> 'Book not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Delete successfully'
        ], 200);
    }
}