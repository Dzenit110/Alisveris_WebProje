<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;

class IadeController extends Controller
{
    public function IadeIstek(){

        $siparisler = Siparis::where('iade_siparis',1)->orderBy('id','DESC')->get();
        return view('backend.iade_siparis.iade_istek',compact('siparisler'));

    } 

    public function IadeTalebOnaylandı($siparis_id){

        Siparis::where('id',$siparis_id)->update(['iade_siparis' => 2]);

        $notification = array(
            'message' => 'Siparişi Başarıyla İade Edildi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } 

    public function IadeIstekTamamla(){

        $siparisler = Siparis::where('iade_siparis',2)->orderBy('id','DESC')->get();
        return view('backend.iade_siparis.tamam_iade_istek',compact('siparisler'));

    }





}
