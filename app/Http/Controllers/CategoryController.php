<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::get();
        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $image=$request->file('image')->store('public/category');
        Category::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'image'=>$image,
        ]);
        return redirect()->route('category.index')->with('msg','Category created successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        $category=Category::find($id);
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image=$request->file('image')->store('public/category');
            $category->image=$image;
        }
        if($request->has('name'))
        {
            $category->name=$request->name;
            $category->slug=Str::slug($category->name);
        }
        
        
        
        $category->save();
        return redirect()->route('category.index')->with('msg','Category updated seccessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        Storage::delete($category->image);
        $category->delete();
        return redirect()->route('category.index')->with('msg','Category deleted successfully!');
    }
}
