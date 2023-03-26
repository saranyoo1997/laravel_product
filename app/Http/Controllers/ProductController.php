<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\TempImage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        //   dd($request->toArray());

        $validate = $request->validate([
            'name' => 'required|string|min:3',
            'price' => 'required|numeric|min:0|max:1000',
            'category_id' => 'required|exists:category,id',
            'slug' => 'required|string|min:3|unique:products,slug',
        ]);

        $input = $request->all();
        // if($request->hasFile('image')){

        //     $destinasion_path = 'public/image/products';
        //     $image = $request->file('image');
        //     $image_name = uniqid().'.'.$image->getClientOriginalExtension();
        //     // $image_name = $image->getClientOriginalName();
        //     $path = $request->file('image')->storeAs($destinasion_path,$image_name);
        //     $input['image']=$image_name;

        // }
        $product = new Product($input);
        $product->save();
        $origin = $request->ip();
        $temp = TempImage::where('origin', $origin)->get();

        foreach ($temp as $tmp) {
            if ($product->image !== $tmp->name) {
                // unlink("{$tmp->path}/{$tmp->name}");
                if (Storage::exists("{$tmp->path}/{$tmp->name}")) {
                    Storage::delete("{$tmp->path}/{$tmp->name}");
                } 
            }

            $tmp->delete();
        }
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
                Rule::unique('products', 'slug')->ignore($product)
            ],
        ]);
        $product->update($validate);
        session()->flash('swal', "Update Success!");
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if (Storage::exists("public/image/products/{$product->image}")) {
            Storage::delete("public/image/products/{$product->image}");
        } 

        $product->delete();
        session()->flash('swal', "Delete Success!");
        return redirect()->route('product.index');
    }
}
