<?php

namespace App\Http\Controllers\web;

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
        return view('welcome', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $credentials = $request->all();
        $credentials['image'] = $request->file('image')->store('web/productImages', 'public');
        $credentials['admin_id'] = Auth::guard('admin')->id();
        $product = Product::create($credentials);

        return redirect('/')->with('success', 'Product Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect('/')->with('success', 'Product Not Found!');
        }
        return view('update_product', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //check if the product exists
        $product = Product::find($id);
        if (!$product) {
            return back()->with('success', 'Product Not Found!');
        }
        $credentials = $request->all();
        $credentials['image'] = $request->file('image')->store('productImages', 'public');
        $credentials['admin_id'] = Auth::guard('admin')->id();
        $product -> update($credentials);

        return redirect('/')->with('success', 'Product Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/')->with('success', 'Product Deleted Successfully!');
    }
}
