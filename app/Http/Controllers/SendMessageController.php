<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SendMessageController extends Controller
{
    public function store(Request $request)
    {
        $image0=$image1=$image2=null;
        
        if ($request->hasFile('image0')) {
                $image0 = $request->file('image0')->store('public/img_message');

        }
        if ($request->hasFile('image1')) {
                $image1 = $request->file('image1')->store('public/img_message');

        }
        if ($request->hasFile('image2')) {
                $image2 = $request->file('image2')->store('public/img_message');

        }

        Message::create([
            'user_id' => $request->userId,
            'receiver_id' => $request->receiverId,
            'ad_id' => $request->adId,
            'body' => $request->body,
            'image0' =>$image0,
            'image1' =>$image1,
            'image2' =>$image2,
        ]);
    }

    public function ChatWhithUser()
    {
        $conversations=Message::orderBy('id','DESC')->where('user_id',auth()->id())
        ->orWhere('receiver_id',auth()->id())
        ->get();

        $users=$conversations->map(function($conversation){
            if($conversation->user_id == auth()->id()){
                return $conversation->receiver;
            }

            return $conversation->sender;
        })->unique();

        return $users;
    }

    public function ShowMessages(Request $request,$id)
    {
        $messages=Message::orderBy('id')->with('sender','ads','receiver')
        ->where('receiver_id',auth()->id())
        ->where('user_id',$id)
        ->orwhere('user_id',auth()->id())
        ->where('receiver_id',$id)->get();

        return $messages;
    }

    public function destroyConversation(Request $request,$id)
    {
        $messages=Message::where('receiver_id',auth()->id())
        ->where('user_id',$id)
        ->orwhere('user_id',auth()->id())
        ->where('receiver_id',$id)->get();

        foreach($messages as $msg){
            if($msg->image0){
                Storage::delete($msg->image0);
            }
            if($msg->image1){
                Storage::delete($msg->image1);
            }
            if($msg->image2){
                Storage::delete($msg->image2);
            }

            $msg->delete();
        }

       
        return back();
    }

    public function startConversation(Request $request)
    {
        $image0=$image1=$image2=null;
        
        if ($request->hasFile('image0')) {
                $image0 = $request->file('image0')->store('public/img_message');

        }
        if ($request->hasFile('image1')) {
                $image1 = $request->file('image1')->store('public/img_message');

        }
        if ($request->hasFile('image2')) {
                $image2 = $request->file('image2')->store('public/img_message');

        }

        $message=Message::create([
            'user_id'=>auth()->id(),
            'receiver_id'=>$request->receiverId,
            'body'=>$request->body,
            'image0' =>$image0,
            'image1' =>$image1,
            'image2' =>$image2,
        ]);

        return $message->load('sender');
    }
}
