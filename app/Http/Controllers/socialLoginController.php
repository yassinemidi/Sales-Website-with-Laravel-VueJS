<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class socialLoginController extends Controller
{
    public function facebookRedirect(){
    
        return Socialite::driver('facebook')->redirect();

    }

    public function loginWithFacebook(){

        try{

        $user=Socialite::driver('facebook')->user();
        $isUser=User::where('facebook_id',$user->id)->first();
        $avatar=$user->getAvatar();
        if($isUser){
            Auth::login($isUser);
            return redirect('/');
        }else{
            $createUser=User::create([
                'name'=>$user->name,
                'email'=>$user->email,
                'facebook_id'=>$user->id,
                'avatar'=>$avatar,
                'password'=>Hash::make('facebook')
            ]);
            Auth::login($createUser);
            return redirect('/');
        }
    }catch(\Exception $exeption){
        dd($exeption->getMessage());
    }

    }
}
