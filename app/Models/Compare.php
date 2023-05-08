<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function urun(){
        return $this->belongsTo(Urun::class,'urun_id','id');
    }


}
