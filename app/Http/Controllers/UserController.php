<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

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
    // public function create(StoreUserRequest $request)
    // {
    //     $newUser = Users::create($request -> all());

    //     return response()->json([
    //         'message'=> 'created successfully',
    //         'data'=> $newUser
    //     ],200);
    // }
    public function store( $request, $id) {
        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->eamil;
        $user->membershipDate = $request->membershipDate;
        $user->save();
        return response()->json([
            'status' =>'create user success',
            'user'=>$user
        ]);
         
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
            'data' => new UserResource ($user)
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit( StoreUserRequest $request, $id)
    {
        $newUser = Users::find($id);
        $newUser -> update($request ->validated());

        if (!$newUser){
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
