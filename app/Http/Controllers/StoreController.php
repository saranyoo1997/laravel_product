<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;


class StoreController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('store.index',compact('products'));

    }

    public function addcart(Request $request,Product $product)
    {
        $request->request->add([
            'user_id'=>auth()->id(),
            'product_id'=>$product->id,

        ]);
        $validates = $request->validate([
            'user_id' =>'required|exists:users,id',
            'product_id'=>'required|exists:products,id',
            'number'=>'required|numeric|min:0|max:1000',
        ]);

        // dd($validates);
        // dd($request->get('number'),$product->id,auth()->id());
        $cart = new Cart($validates);
        $cart->save();
        return redirect()->back();

    }
    public function cart()
    {
        return view('store.cart');


    }

    public function address()
    {

        // $verticalMenuJson = file_get_contents(base_path('resources\json'));
        // $verticalMenuData = json_decode($verticalMenuJson);

        
        return view('store.address');


       
        
    }
    // public function detail(){
    //     $verticalMenuJson = file_get_contents(base_path('resources\json'));
    //     $verticalMenuData = json_decode($verticalMenuJson);


    // }

}
