<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


class AdressController extends Controller
{
    
    public function getCountry()
    {
        $countries = Country::all();
        return response()->json($countries);
       
    }

    public function getState(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->get();
        return response()->json($states);
       
    }

    public function getCity(Request $request)
    {
        $cities = City::where('state_id',$request->state_id)->get();
        return response()->json($cities);
       
    }
}
