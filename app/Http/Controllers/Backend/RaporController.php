<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Siparis;
use App\Models\User;

class RaporController extends Controller
{
    
    public function RaporView(){
        return view('backend.rapor.rapor_view');
    }



    public function AramaTarih(Request $request){

        $tarih = new DateTime($request->date);
        $formatTarih = $tarih->format('d F Y');

        $siparisler = Siparis::where('siparis_tarih',$formatTarih)->latest()->get();
        return view('backend.rapor.rapor_by_tarih',compact('siparisler','formatTarih'));

    }


    public function AramaAy(Request $request){

        $ay = $request->month;
        $yil = $request->year_name;

        $siparisler = Siparis::where('siparis_ay',$ay)->where('siparis_yil',$yil)->latest()->get();
        return view('backend.rapor.rapor_by_ay',compact('siparisler','ay','yil'));

    }


 public function AramaYil(Request $request){ 

        $yil = $request->year;

        $siparisler = Siparis::where('siparis_yil',$yil)->latest()->get();
        return view('backend.rapor.rapor_by_yil',compact('siparisler','yil'));

    }

    public function SiparisByUser(){
        $users = User::where('role','user')->latest()->get();
        return view('backend.rapor.rapor_by_user',compact('users'));

    }

    public function AramaByUser(Request $request){
        $users = $request->user;
        $siparisler = Siparis::where('user_id',$users)->latest()->get();
        return view('backend.rapor.rapor_by_user_show',compact('siparisler','users'));

    }








    

}
