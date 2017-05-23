<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Product::class);

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->authorize('create', Product::class);

        $path = $request->file('image')->store('public/image');


        $product = new Product();
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->picture= basename($path);

        $product->save();

        return redirect()->route('products.index')->with(['message' => 'Product added successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Product::class);

        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
        $path = $request->file('image')->store('public/image');

        $product = Product::findOrFail($id);


        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->picture= basename($path);
        $product->update();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Product::class);

        $product = Product::findOrFail($id);
        Storage::delete('public/image/'.$product->picture);

        $product->delete();
        return redirect()->route('products.index')->with(['message' => 'Product deleted successfully']);
    }
}
