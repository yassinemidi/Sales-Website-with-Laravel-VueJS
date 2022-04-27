<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function findBasedOnCategory(Request $request, Category $categorySlug)
    {
        //query filter price
        $advertisementBasedOnFilter = Advertisement::where('category_id', $categorySlug->id)
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->get();


        $advertisementWithoutFilter = $categorySlug->ads;




        //condition
        $advertisements = ($request->min_price || $request->max_price) ? $advertisementBasedOnFilter : $advertisementWithoutFilter;

        
        $category = $categorySlug;
        $subcategories= $categorySlug->subcategories;
        return view('product.category', compact('advertisements', 'subcategories', 'category'));

    }

    public function findBasedOnSubcategory(Request $request, $categorySlug, Subcategory $subcategorySlug)
    {
        
        $advertisementBasedOnFilter = Advertisement::where('subcategory_id', $subcategorySlug->id)
            ->when($request->min_price, function ($query, $min_price) {
                return $query->where('price', '>=', $min_price);
            })
            ->when($request->max_price, function ($query, $max_price) {
                return $query->where('price', '<=', $max_price);
            })->get();

    

        $advertisementWithoutFilter = $subcategorySlug->ads;

        //condition
        $advertisements = ($request->min_price || $request->max_price) ? $advertisementBasedOnFilter : $advertisementWithoutFilter;

        $ad_has_childcategory = $subcategorySlug->ads->unique('childcategory_id');
        $category = $subcategorySlug->category;
        $subcategory = $subcategorySlug;
        return view('product.subcategory', compact('advertisements', 'ad_has_childcategory', 'category', 'subcategory'));
    }

    public function findBasedOnChildcategory(Request $request, $categorySlug, Subcategory $subcategorySlug, Childcategory $childcategorySlug)
    {

        

        //query filter price
        $advertisementBasedOnFilter = Advertisement::where('childcategory_id', $childcategorySlug->id)
            ->whereBetween('price', [$request->min_price, $request->max_price])
            ->get();


        $advertisementWithoutFilter = $childcategorySlug->ads;




        //condition
        $advertisements = ($request->min_price || $request->max_price) ? $advertisementBasedOnFilter : $advertisementWithoutFilter;



        $ad_has_childcategory = $subcategorySlug->ads->unique('childcategory_id');
        $category = $subcategorySlug->category;
        $subcategory = $subcategorySlug;
        $childcategory = $childcategorySlug;
        return view('product.childcategory', compact('advertisements', 'ad_has_childcategory', 'category', 'subcategory', 'childcategory'));
    }


    public function findAd($id)
    {
        $ad=Advertisement::find($id);
        return view('product.view',compact('ad'));
    }


    //show user ads

    public function viewUserAds($id){
        $ads=Advertisement::orderBy('id','DESC')->where('user_id',$id)->paginate(12);
        $user=User::find($id);
        return view('seller.ads',compact('ads','user'));
    }
}
