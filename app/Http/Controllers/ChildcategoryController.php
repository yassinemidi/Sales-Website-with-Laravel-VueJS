<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildcategoryEditRequest;
use App\Http\Requests\ChildcategoryFormRequest;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories=Childcategory::orderBy('subcategory_id')->get();
        return view('backend.childcategory.index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.childcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChildcategoryFormRequest $request)
    {
        Childcategory::create([
            'name'=>$request->name,
            'subcategory_id'=>$request->subcategory_id,
            'slug'=>Str::slug($request->name),
            
        ]);
        return redirect()->route('childcategory.index')->with('msg','Childcategory created successfully!');
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
        $childcategory=Childcategory::find($id);
        return view('backend.childcategory.edit',compact('childcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChildcategoryEditRequest $request, $id)
    {
        $childcategory=Childcategory::find($id);
        $childcategory->name=$request->name;
        $childcategory->subcategory_id=$request->subcategory_id;
        $childcategory->slug=Str::slug($childcategory->name);
        $childcategory->save();
        return redirect()->route('childcategory.index')->with('msg','Childcategory updated seccessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $childcategory=Childcategory::find($id);
        $childcategory->delete();
        return redirect()->route('childcategory.index')->with('msg','Childcategory deleted successfully!');
    }
}
