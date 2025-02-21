<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Users = User::all();
        return response()->json([
            'data' => $Users,
            'success' => true
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'datebirth' => 'required',
                'phone' => 'required',
            ]);
            $user = User::create($request->all());
            return response()->json([
                'data' => $user,
                'success' => true
            ],201);
        }
        catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating user: '.$e->getMessage(),
                'success' => false
            ],500);
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $user)
    {
        $user = User::find($user);
        if($user){
            return response()->json([
                'data' => $user,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'User not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user =User::find($id);
        $request->validate([
            'name' => 'required',
            'datebirth' => 'required',
            'phone' => 'required',
        ]);
        if($user){
            $user->update($request->except('email'));
            return response()->json([
                'data' => $user,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'User not found',
                'success' => false
            ],404);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json([
                'message' => 'User deleted',
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'User not found',
                'success' => false
            ],404);
        }
    }
}
