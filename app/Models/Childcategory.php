<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childcategory extends Model
{
    use HasFactory;
    
    protected $fillable=['name','slug','subcategory_id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }

    public function ads()
    {
        return $this->hasMany(Advertisement::class,'childcategory_id','id');
    }

    
}
