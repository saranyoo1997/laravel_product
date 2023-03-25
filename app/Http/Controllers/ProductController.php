<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::where('id>0')->get();
        $products = Product::all();
        // dd($products);
        return view('product.index',compact(['products']));
    }

   
    public function create()
    {
        return view('product.create');
    }

  
    public function store(Request $request)
    {
        dd($request->toArray());

        // $validate = $request->validate([
        //     'name' => 'required|string|min:3',
        //     'price' => 'required|string|min:10',
        //     'slug' => 'required|string|min:3|unique:product,slug',

        // ]);
        // $category = new Category($validate);
        // $category->save();
        // session()->flash('swal',"Create Success!");
        //  return redirect()->route('product.index');
    }

    
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
