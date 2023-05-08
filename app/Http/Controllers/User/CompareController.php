<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compare;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompareController extends Controller
{
     public function AddToCompare(Request $request, $urun_id){

        if (Auth::check()) {
      $exists = Compare::where('user_id',Auth::id())->where('urun_id',$urun_id)->first();

            if (!$exists) {
               Compare::insert([
                'user_id' => Auth::id(),
                'urun_id' => $urun_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'Karşılaştırmak içim Başarıyla Eklendi' ]);
            } else{
                return response()->json(['error' => 'Bu Ürün Zaten Karşılaştırmak için Bulunmaktadır' ]);

            } 

        }else{
            return response()->json(['error' => 'İlk Önce Hesabınıza Giriş Yapın' ]);
        }

    } 


    public function AllCompare(){
        return view('frontend.compare.view_compare');
    }



    public function GetCompareProduct(){

        $compare = Compare::with('urun')->where('user_id',Auth::id())->latest()->get(); 

        return response()->json($compare);

    }


    public function CompareRemove($id){

        Compare::where('user_id',Auth::id())->where('id',$id)->delete();
     return response()->json(['success' => 'Successfully Product Remove' ]);
    }






}
