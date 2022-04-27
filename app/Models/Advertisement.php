<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cohensive\Embed\Facades\Embed;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image_0',
        'image_1',
        'image_2',
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'name',
        'slug',
        'description',
        'price',
        'price_status',
        'condition',
        'location',
        'country_id',
        'state_id',
        'city_id',
        'phone_number',
        'published',
        'link',
    ];
    

    public function childcategory()
    {
        return $this->hasOne(Childcategory::class,'id','childcategory_id');
    }
    public function subcategory()
    {
        return $this->hasOne(Subcategory::class,'id','subcategory_id');
    }
    public function category()
    {
        return $this->hasOne(category::class,'id','category_id');
    }



    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function state()
    {
        return $this->hasOne(State::class,'id','state_id');
    }
    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }


    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function displayVideo()
    {
        $link=Embed::make($this->link)->parseUrl();
        if(!$link){
            return;
        }
        $link->setAttribute(['width'=>'410']);
        
        return $link->getHtml();
    }
}
