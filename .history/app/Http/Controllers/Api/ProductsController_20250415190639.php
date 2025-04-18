<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::with(['category','brand'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product,Request $request)
    {
        $request->validate([
            'name'=>'required|string','description'=>'nullable|string',
            'price'=>'required|numeric',
            'category_id'=>'required|exists:categories,id',
            'brand_id'=>'required|exists:brands,id',
            'img_url'=>'nullable|string|url',
        ]);
        $product = Product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'category_id'=> $request->category_id,
            'brand_id'=> $request->brand_id,
            'img_url'=> $request->img_url,

        ]);
        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product
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
