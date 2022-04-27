<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'receiver_id',
        'ad_id',
        'body',
        'image0',
        'image1',
        'image2',
    ];

    protected $appends=['selfOwned'];

    public function getselfOwnedAttribute()
    {
        return $this->user_id == auth()->id();
    }

    public function receiver(){
        return $this->belongsTo(User::class,'receiver_id');
    }

    public function sender(){

        return $this->belongsTo(User::class,'user_id');
    }
    public function ads(){

        return $this->belongsTo(Advertisement::class,'ad_id');
    }
}
