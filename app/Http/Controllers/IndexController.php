<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $ads=Advertisement::all();
        $id_category=$ads->pluck('category_id')->unique()->values()->all();
        $category_has_ads=Category::whereIn('id',$id_category)->get();
        $category_carousel=[];
        

        foreach($category_has_ads as $category){
            if(count($category->ads) >= 8){
                
                
                $firstads=Advertisement::where('category_id',$category->id)
                ->orderByDesc('id')->take(4)->get();
                $secondads=Advertisement::where('category_id',$category->id)
                ->orderByDesc('id')->whereNotIn('id',$firstads->pluck('id')->unique()->values()->all())
                ->take(4)->get();
                $array=['first'=>$firstads,'second'=>$secondads];

                array_push($category_carousel,$array);


                
            }
        }
        //return $category_carousel[0];
        return view('index',compact('category_carousel'));
    }
}
