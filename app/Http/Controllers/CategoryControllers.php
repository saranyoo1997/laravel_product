<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact(['categories']));
       // return view('category.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {

        // dd($request);

        $validate = $request->validate([
            'name' => 'required|string|min:3',
            'slug' => 'required|string|min:3|unique:category,slug',

        ]);
        $category = new Category($validate);
        $category->save();
        // return redirect()->route('category.index');
       dd($request,$validate);
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }
   
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->update();
        session()->flash('swal',"Update Success!");
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        // dd($id);
        $category=Category::find($id)->delete();
        session()->flash('swal',"Delete Success!");
        return redirect()->route('category.index');
        
    }
}
