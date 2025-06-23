<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
     public function index()
    {
       return response()->json([
            'message'=> 'get user successfully',
            'data'=>Users::all()
       ],200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $newUser = Users::create( [
            'name'=> $request -> name,
            'email'=> $request -> email,
            'membershipDate'=> $request -> membershipDate
        ]);
        return response()->json([
            'message'=> 'created successfully',
            'data'=> $newUser
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user = Users::find($id);
        if(!$user){
            return response()-> json([
                'message' => 'Authore not found'
            ], 404);
        }
        return response() ->  json([
            'message' => 'Authore found',
            'data' => $user
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id, Request $request)
    {
        $newUser = Users::find($id);
        $newUser -> update([
            'name'=> $request-> name,
            'email'=> $request -> email,
            'membershipDate'=> $request ->membershipDate
        ]);

        if ($newUser === null){
            return response() ->json([
                'message' => 'authore not found',
            ],404);
        }

        return response()-> json([
            'message' => 'update successfully',
            'data' => $newUser
        ],200);
        
    }

     /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id, Request $request)
    {
        $user = Users::find($id);
        $user -> delete();
        if (!$user){
            return response()->json([
                'message' => 'authore not found'
                
            ],404);
        }else{
            return response()-> json([
                'message' => ' delet succeessfully',
            ], 200);
        }
        }

   
}
