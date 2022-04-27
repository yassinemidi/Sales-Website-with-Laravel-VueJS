<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $fillable=['name','slug','category_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function childcategories()
    {
        return $this->hasMany(Childcategory::class,'subcategory_id','id');
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class,'subcategory_id','id');
    }
}
