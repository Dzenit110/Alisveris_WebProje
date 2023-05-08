<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;
use App\Models\SiparisItem; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class SaticiSiparisController extends Controller
{
    
    public function SaticiSiparis(){

        $id = Auth::user()->id;
        $sipariseleman = SiparisItem::with('siparis')->where('satici_id',$id)->orderBy('id','DESC')->get();
        return view('satici.backend.siparis.satici_siparis',compact('sipariseleman'));
    }



    public function SaticiIadeSiparis(){

        $id = Auth::user()->id;
       $siparisitem = SiparisItem::with('siparis')->where('satici_id',$id)->orderBy('id','DESC')->get();
       return view('satici.backend.siparis.iade_siparis',compact('siparisitem'));

   }

   public function SaticiIptalSiparis(){

    $id = Auth::user()->id;
   $siparisitem = SiparisItem::with('siparis')->where('satici_id',$id)->orderBy('id','DESC')->get();
   return view('satici.backend.siparis.iptal_siparis',compact('siparisitem'));

}


   public function SaticiTamamIadeSiparis(){

    $id = Auth::user()->id;
   $siparisitem = SiparisItem::with('siparis')->where('satici_id',$id)->orderBy('id','DESC')->get();
   return view('satici.backend.siparis.tamam_iade_siparis',compact('siparisitem'));

}

public function SaticiTamamIptalSiparis(){

    $id = Auth::user()->id;
   $siparisitem = SiparisItem::with('siparis')->where('satici_id',$id)->orderBy('id','DESC')->get();
   return view('satici.backend.siparis.tamam_iptal_siparis',compact('siparisitem'));

}
    

public function SaticiSiparisDetay($siparis_id){

    $siparis = Siparis::with('bolum','bolge','user')->where('id',$siparis_id)->first();
    $siparisItem = siparisItem::with('urun')->where('siparis_id',$siparis_id)->orderBy('id','DESC')->get();

    return view('satici.backend.siparis.satici_siparis_detay',compact('siparis','siparisItem'));

}





}
