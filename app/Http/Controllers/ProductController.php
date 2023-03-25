<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact(['products']));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact(['categories']));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:0|max:1000',
            'category_id' => 'required|exists:category,id',
            'slug' => 'required|string|min:3|unique:products,slug',
        ]);

        $product = new Product($validate);
        $product->save();
        session()->flash('swal', "Create Success!");
        return redirect()->route('product.index');
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
        $categories = Category::all();
        return view('product.edit', compact(['product', 'categories']));
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

        $validate = $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:0|max:1000',
            'category_id' => 'required|exists:category,id',
            'slug' => [
                'required',
                'string',
                'min:3',
                // PS: เช็ค `slug` ซ้ำในตาราง `products` ข้ามการเช็คถ้าเป็น slug ของ product ตัวเดียวกัน
                Rule::unique('product', 'slug')->ignore($product)
            ],
        ]);
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
