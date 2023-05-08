<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use App\Models\Coupon;
use App\Models\NakliyeBolgeler;
use App\Models\SevkiyatDurum;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($bolum_id){

        $sevkiyat = NakliyeBolgeler::where('bolum_id',$bolum_id)->orderBy('bolge_name','ASC')->get();
        return $sevkiyat;

    } 

    public function StateGetAjax($bolge_id){
       
        $sevkiyat = SevkiyatDurum::where('bolge_id',$bolge_id)->orderBy('bolum_name','ASC')->get();
        return $sevkiyat;


    }




    public function CheckoutStore(Request $request){

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;   

        $data['bolum_id'] = $request->bolum_id;
        $data['bolge_id'] = $request->bolge_id;
      $data['durum_id'] = $request->durum_id;
        $data['shipping_address'] = $request->shipping_address;
        $data['notes'] = $request->notes; 
        $cartTotal = Cart::total();

        if ($request->payment_option == 'stripe') {
           return view('frontend.odeme.stripe',compact('data','cartTotal'));
        }elseif ($request->payment_option == 'card'){
            return 'Card Page';
        }else{
            return view('frontend.odeme.cash',compact('data','cartTotal'));
        }


    }









}