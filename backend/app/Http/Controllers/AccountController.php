<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Account::all(),
            'success' => true
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nickname' => 'required',
            'roll'=> 'required|integer',
            'password' => 'required|min:8',
            'userid' => 'required|integer'
        ]);
        $account = Account::create($request->all());
        return response()->json([
            'data' => $account,
            'success' => true
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $account = Account::find($id);
        if($account){
            return response()->json([
                'data' => $account,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Account not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = Account::find($id);
        if($account){
            $account->update($request->all());
            return response()->json([
                'data' => $account,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Account not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = Account::find($id);
        if($account){
            $account->delete();
            return response()->json([
                'data' => $account,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Account not found',
                'success' => false
            ],404);
        }
    }
}
