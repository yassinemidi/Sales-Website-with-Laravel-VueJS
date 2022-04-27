<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required',
            'username' => 'required',
            'avatar' => 'mimes:png,jpeg,jpg',
            'email' => 'required',
        ]);


        $user = User::find(auth()->user()->id);

        $avatar = $user->avatar;

        if ($request->hasFile('avatar')) {
            if (Storage::exists($avatar)) {
                Storage::delete($avatar);
            }
            $avatar = $request->file('avatar')->store('public/avatar');
        }

        if ($request['email'] != $user->email && $user instanceof MustVerifyEmail) {

            $this->updateVerifiedUser($user, $request,$avatar);
        } else {

            $user->forceFill([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'username' => $request->username,
                'email' => $request->email,
                'avatar' => $avatar,
                'address'=>$request->address,

            ])->save();
        }



        return redirect()->route('profile.index')->with('msgprofile', 'Profile was Updated.');
    }

    protected function updateVerifiedUser($user,  $request,$avatar)
    {
        $user->forceFill([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'avatar' => $avatar,
            'email_verified_at' => null,
            'address'=>$request->address,
        ])->save();

        $user->sendEmailVerificationNotification();
    }

    public function deleteAvatar()
    {
        $user=User::find(auth()->user()->id);
        Storage::delete($user->avatar);
        $user->avatar=null;
        $user->save();
        return redirect()->back()->with('msg','Photo profile has been deleted.');
    }
}
