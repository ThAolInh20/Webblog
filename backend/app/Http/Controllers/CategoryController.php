<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => Category::all(),
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
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $category = Category::create($request->all());
        return response()->json([
            'data' => $category,
            'success' => true
        ],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::find($id);
        if($category){
            return response()->json([
                'data' => $category,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Category not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if($category){
            $category->update($request->all());
            return response()->json([
                'data' => $category,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Category not found',
                'success' => false
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $category = Category::find($category);
        if($category){
            $category->delete();
            return response()->json([
                'data' => $category,
                'success' => true
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Category not found',
                'success' => false
            ],404);
        }
    }
}
