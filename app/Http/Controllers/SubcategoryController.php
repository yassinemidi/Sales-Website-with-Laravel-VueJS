<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryEditRequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\SubcategoryFormRequest;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=Subcategory::orderBy('category_id')->get();
        return view('backend.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryFormRequest $request)
    {
        
        Subcategory::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'slug'=>Str::slug($request->name),
            
        ]);
        return redirect()->route('subcategory.index')->with('msg','Subcategory created successfully!');
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
        $subcategory=Subcategory::find($id);
        return view('backend.subcategory.edit',compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryEditRequest $request, $id)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->slug=Str::slug($subcategory->name);
        $subcategory->save();
        return redirect()->route('subcategory.index')->with('msg','Subcategory updated seccessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory=Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index')->with('msg','Subcategory deleted successfully!');
    }
}
