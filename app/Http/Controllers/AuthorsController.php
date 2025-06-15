<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorsController extends Controller
{
     public $AuthorsOpject = [
        [
            'id' =>'01',
            'name'=> 'Sokchea boy',
            'bio'=>'A passionate web developer from Cambodia.',
            'nationality'=> 'khmer in cambodia'
        ]
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            return response()->json([
                'message'=> 'reques successfully',
                'data'=> $this->AuthorsOpject
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $newAuthors = [
            'id' =>$request -> id,
            'name'=> $request -> name,
            'bio'=> $request -> bio,
            'nationality'=> $request -> nationality
        ];
        return response()->json([
            'message'=> 'created successfully',
            'data'=> $newAuthors
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newAuthore = [
            'id' => $request -> id,
            'name' => $request -> name,
            'bio' => $request -> bio,
            'nationality' => $request -> nationality
        ];

        $this -> AuthorsOpject [] = $newAuthore;
        return response()-> json([
            'message' => 'stored successfully',
            'data' => $newAuthore
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $authores = null;
        foreach($this->AuthorsOpject as $item){
            if ($item['id'] === $item){
                $authores = $item;
                break;
            }
        }
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
    public function edit(string $id)
    {
        
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
