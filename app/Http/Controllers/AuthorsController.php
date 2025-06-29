<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return response()->json([
                'message'=> 'reques successfully',
                'data'=> Author::all()
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create(StoreAuthorRequest $request)
    {
        $newAuthors = Author::create($request -> validated());
        return response()->json([
            'message'=> 'created successfully',
            'data'=> $newAuthors
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authores = Author:: with('books') -> find($id);
      
        if(!$authores){
            return response()-> json([
                'message' => 'Authore not found'
            ], 404);
        }
        return response() ->  json([
            'message' => 'Authore found',
            'data' => $authores
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( StoreAuthorRequest $request, $id )
    {
        $updateAuthores = Author::find($id);
      
        if (!$updateAuthores){
            return response() ->json([
                'success' => false,
                'message' => 'authore not found',
            ],404);
        }

     $updateAuthores -> update( $request-> validated());
        return response()-> json([
            'message' => 'update successfully',
            'data' => $updateAuthores
        ],200);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
         $Author = Author::where($id);
         $Author -> delete();

        return response()-> json([
            'message' => ' delet succeessfully',
        ], 200);
    }

}
