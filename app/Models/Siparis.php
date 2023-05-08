<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function bolum(){
        return $this->belongsTo(NakliyeBolum::class,'bolum_id','id');
    }

     public function bolge(){
        return $this->belongsTo(NakliyeBolgeler::class,'bolge_id','id');
    }

     
     public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }




}
