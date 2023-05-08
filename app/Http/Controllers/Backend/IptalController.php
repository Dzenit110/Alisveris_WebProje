<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;
class IptalController extends Controller
{
    public function IptalIstek(){

        $siparisler = Siparis::where('iptal_siparis',2)->orderBy('id','DESC')->get();
        return view('backend.iptal_siparis.iptal_istek',compact('siparisler'));

    } 

    public function IptalTalebOnaylandı($siparis_id){

        Siparis::where('id',$siparis_id)->update(['iptal_siparis' => 3]);

        $notification = array(
            'message' => 'Siparişi Başarıyla İptal Edildi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } 

    public function IptalIstekTamamla(){

        $siparisler = Siparis::where('iptal_siparis',3)->orderBy('id','DESC')->get();
        return view('backend.iptal_siparis.tamam_iptal_istek',compact('siparisler'));

    }

}
