<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return ProductResource::collection($products);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $credentials = $request->all();
        $credentials['image'] = $request->file('image')->store('productImages', 'public');
        $credentials['admin_id'] = Auth::guard('admin')->id();
        $product = Product::create($credentials);
        return response()->json([
            'message' => 'Product Created Successfully!',
            'product' => new ProductResource($product),
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, int $id)
    {
        //check if the product exists
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found!',
            ],404);
        }
        // and if the admin can't modify it
        if (Auth::guard('admin')->id() != $product->admin_id){
            return response()->json([
                'message' => 'You are not authorized to modify this product!'
            ], 403);
        }

        $credentials = $request->all();
        $credentials['image'] = $request->file('image')->store('productImages', 'public');
        $credentials['admin_id'] = Auth::guard('admin')->id();
        $product -> update($credentials);
        return response()->json([
            'message' => 'Product Updated Successfully!',
            'product' => new ProductResource($product),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //check if the product exists
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'message' => 'Product Not Found!',
            ],404);
        }
        // and if the admin can't modify it
        if (Auth::guard('admin')->id() != $product->admin_id){
            return response()->json([
                'message' => 'You are not authorized to modify this product!'
            ], 403);
        }
        $product->delete();
        return response()->json([
            'message' => 'Product Deleted Successfully!',
        ], 200);
    }
}
