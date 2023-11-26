<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data Produk',
            'data'    => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'product_name' => $request->product_name,
            'category_id'  => $request->category_id,
            'product_code' => $request->product_code,
            'is_active'    => $request->is_active,
            'description'  => $request->description,
            'price'        => $request->price,
            'unit'         => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock'        => $request->stock,
            'image'        => $request->image
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Tambah Data Produk',
            'data'    => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Produk',
            'data'    => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'product_name' => $request->product_name,
            'category_id'  => $request->category_id,
            'product_code' => $request->product_code,
            'is_active'    => $request->is_active,
            'description'  => $request->description,
            'price'        => $request->price,
            'unit'         => $request->unit,
            'discount_amount' => $request->discount_amount,
            'stock'        => $request->stock,
            'image'        => $request->image
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Update Data Produk',
            'data'    => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([
            'success' => true,
            'message' => 'Hapus Data Produk',
            'data'    => $product
        ], 200);
    }
}
