<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiparisItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function siparis(){
        return $this->belongsTo(Siparis::class,'siparis_id','id');
    }


    public function urun(){
        return $this->belongsTo(Urun::class,'urun_id','id');
    }



}
