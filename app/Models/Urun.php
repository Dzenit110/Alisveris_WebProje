<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function satici(){
        return $this->belongsTo(User::class,'satici_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }


  public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }



}
