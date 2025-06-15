<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
      public $UserOpject = [
        [
            'id' =>'01',
            'name'=> 'Sokchea boy',
            'email'=>'sokchea@example.com',
            'membershipDate'=> '2025-Junly-Monday'
        ],
        [
            'id' =>'02',
            'name'=> 'Chandy',
            'email'=>'chandy@example.com',
            'membershipDate'=> '2025-Junly-Monday'
        ]
    ];
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
            return response()->json([
                'message'=> 'reques successfully',
                'data'=> $this->UserOpject
            ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $newUser = [
            'id' =>$request -> id,
            'name'=> $request -> name,
            'email'=> $request -> email,
            'membershipDate'=> $request -> membershipDate
        ];
        return response()->json([
            'message'=> 'created successfully',
            'data'=> $newUser
        ],200);
    }


    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $newUser = [
            'id' => $request -> id,
            'name' => $request -> name,
            'email'=> $request -> email,
            'membershipDate'=> $request -> membershipDate
        ];

        $this -> UserOpject [] = $newUser;
        return response()-> json([
            'message' => 'stored successfully',
            'data' => $newUser
        ],201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = null;
        foreach($this->UserOpject as $item){
            if ($item['id'] === $id){
                $user = $item;
                break;
            }
        }
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, Request $request)
    {
        $index = null;
        foreach($this->UserOpject as $key => $item){
            if($item['id'] === $id){
                $index = $key;
            }
        }
        if ($index === null){
            return response() ->json([
                'message' => 'authore not found',
            ],404);
        }

        $updateUser = $request -> only([
            'id',
            'name',
            'email',
            'membershipDate',
        ]);

        $this->UserOpject [] = $updateUser;
        return response()-> json([
            'message' => 'update successfully',
            'data' => $updateUser
        ],200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function delete(string $id)
    {
        $index = null;
        foreach ($this-> UserOpject as $key => $item){
            if($item['id'] === $id){
                $index = $key;
                break;
            }
        }
        if ($index === null){
            return response()->json([
                'message' => 'authore not found'
                
            ],404);
        }
        return response()-> json([
            'message' => ' delet succeessfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
