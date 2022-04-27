<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdsFormRequest;
use App\Http\Requests\AdsFormUpdateRequest;
use App\Models\Advertisement;
use App\Models\Childcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adss = Advertisement::latest()->where('user_id', auth()->user()->id)->get();
        return view('ads.index', compact('adss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsFormRequest $request)
    {

        $image_0 = $request->file('image_0')->store('public/img_products');
        $image_1 = $request->file('image_2')->store('public/img_products');
        $image_2 = $request->file('image_1')->store('public/img_products');



        Advertisement::create([
            'user_id' => Auth::user()->id,
            'image_0' => $image_0,
            'image_1' => $image_1,
            'image_2' => $image_2,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'price_status' => $request->price_status,
            'condition' => $request->condition,
            'location' => $request->location,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'phone_number' => $request->phone_number,
            'link' => $request->link,
        ]);

        return redirect()->route('advertisement.index')->with('msg', 'Ads created successfully!');
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

        $ads = Advertisement::find($id);
        $this->authorize('edit-ad', $ads);
        return view('ads.edit', compact('ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdsFormUpdateRequest $request, $id)
    {
        $ads = Advertisement::find($id);
        $image_0 = $ads->image_0;
        $image_1 = $ads->image_1;
        $image_2 = $ads->image_2;

        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('image_0')) {
            Storage::delete($image_0);
            $image_0 = $request->file('image_0')->store('public/img_products');
        }
        if ($request->hasFile('image_1')) {
            Storage::delete($image_1);
            $image_1 = $request->file('image_1')->store('public/img_products');
        }
        if ($request->hasFile('image_2')) {
            Storage::delete($image_2);
            $image_2 = $request->file('image_2')->store('public/img_products');
        }


        $data['image_1'] = $image_1;
        $data['image_2'] = $image_2;
        $data['image_0'] = $image_0;
        $data['slug']=Str::slug($request->name);
        if ($request->has('category_id')) {

            if (!$request->has('subcategory_id')) {
                $ads->subcategory_id = null;
                $ads->childcategory_id = null;
            } else {
                if (!$request->has('childcategory_id')) {
                    $ads->childcategory_id = null;
                }
            }
        }

        if ($request->has('country_id')) {

            if (!$request->has('state_id')) {
                $ads->state_id = null;
                $ads->city_id = null;
            } else {
                if (!$request->has('city_id')) {
                    $ads->city_id = null;
                }
            }
        }

        $ads->save();

        $ads->update($data);
        return redirect()->route('advertisement.index')->with('msg', 'Ads updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Advertisement::find($id);
        Storage::delete($ads->image_0);
        Storage::delete($ads->image_1);
        Storage::delete($ads->image_2);
        $ads->delete();

        return redirect()->route('advertisement.index')->with('msg', 'Ads deleted successfully!');
    }
}
