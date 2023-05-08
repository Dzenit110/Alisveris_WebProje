<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NakliyeBolgeler extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bolum(){
        return $this->belongsTo(NakliyeBolum::class,'bolum_id','id');

}





}