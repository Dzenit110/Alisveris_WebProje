<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Carbon\Carbon;
use App\Models\NakliyeBolum;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if(Session::has('coupon')){
            Session::forget('coupon');
        }


        $urun = Urun::findOrFail($id);



        if ($urun->oldprice == NULL) {

            Cart::add([


                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $request->price,
                'weight' => 1,
                'options' => [
                    'image' => $urun->urun_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'satici' => $request->vendor,
                ]

            ]);
            return response()->json(['success' => 'Başarıyla Karta Eklendi']);
        } else {

            Cart::add([


                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $request->oldprice,
                'weight' => 1,
                'options' => [
                    'image' => $urun->urun_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'satici' => $request->vendor,
                ]

            ]);
            return response()->json(['success' => 'Başarıyla Karta Eklendi']);
        }
    }


    public function AddMiniCart()
    {
        $carts = Cart::content();
        info('request', $carts->all());

        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));
    }


    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Ürün Sepetten Kaldırdı']);
    }



    public function AddToCartDetails(Request $request, $id)
    {

        if(Session::has('coupon')){
            Session::forget('coupon');
        }


        $urun = Urun::findOrFail($id);



        if ($urun->oldprice == NULL) {

            Cart::add([


                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $request->price,
                'weight' => 1,
                'options' => [
                    'image' => $urun->urun_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'satici' => $request->vendor,

                ]

            ]);
            return response()->json(['success' => 'Başarılı Kartta Eklendi']);
        } else {

            Cart::add([


                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $request->oldprice,
                'weight' => 1,
                'options' => [
                    'image' => $urun->urun_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                    'satici' => $request->vendor,

                ]

            ]);
            return response()->json(['success' => 'Başarılı Kartta Eklendi']);
        }
    }


    public function MyCart(){

        return view('frontend.mycart.view_mycart');

    }


    public function GetCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,  
            'cartTotal' => $cartTotal

        ));

}


public function CartRemove($rowId){
    Cart::remove($rowId);
   
    if(Session::has('coupon')){
        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name',$coupon_name)->first();

       Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name, 
            'coupon_indirim' => $coupon->coupon_indirim, 
            'indirim_miktar' => round(Cart::total() * $coupon->coupon_indirim/100), 
            'toplam_miktar' => round(Cart::total() - Cart::total() * $coupon->coupon_indirim/100 )
        ]); 
    }
   
   
   
    return response()->json(['success' => 'Sepetten Başarıyla Kaldırdı']);

}

public function CartDecrement($rowId){

    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty -1);

    if(Session::has('coupon')){
        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name',$coupon_name)->first();

       Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name, 
            'coupon_indirim' => $coupon->coupon_indirim, 
            'indirim_miktar' => round(Cart::total() * $coupon->coupon_indirim/100), 
            'toplam_miktar' => round(Cart::total() - Cart::total() * $coupon->coupon_indirim/100 )
        ]); 
    }



    return response()->json('Decrement');

}

public function CartIncrement($rowId){

    $row = Cart::get($rowId);
    Cart::update($rowId, $row->qty +1);

    if(Session::has('coupon')){
        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name',$coupon_name)->first();

       Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name, 
            'coupon_indirim' => $coupon->coupon_indirim, 
            'indirim_miktar' => round(Cart::total() * $coupon->coupon_indirim/100), 
            'toplam_miktar' => round(Cart::total() - Cart::total() * $coupon->coupon_indirim/100 )
        ]); 
    }


    return response()->json('Increment');

}

    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_gecerli','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name, 
                'coupon_indirim' => $coupon->coupon_indirim, 
                'indirim_miktar' => round(Cart::total() * $coupon->coupon_indirim/100), 
                'toplam_miktar' => round(Cart::total() - Cart::total() * $coupon->coupon_indirim/100 )
            ]);
           return response()->json(array(
              'validity' => true,                
              'success' => 'Kupon Başarıyla Uygulandı'

           ));
        

        } else{
            return response()->json(['error' => 'Geçersiz Kupon']);
        }

    }



    public function CouponCalculation(){

        if (Session::has('coupon')) {

            return response()->json(array(
             'aratoplam' => Cart::total(),
             'coupon_name' => session()->get('coupon')['coupon_name'],
             'coupon_indirim' => session()->get('coupon')['coupon_indirim'],
             'indirim_miktar' => session()->get('coupon')['indirim_miktar'],
             'toplam_miktar' => session()->get('coupon')['toplam_miktar'], 
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        } 
    }



    public function CouponRemove(){

        Session::forget('coupon');
        return response()->json(['success' => 'Kupon Başarıyla Kaldırdı']);

    }


    public function KontrolCreate(){

        if (Auth::check()) {

            if (Cart::total() > 0) { 

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        $bolumler = NakliyeBolum::orderBy('bolum_name','ASC')->get();


        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal', 'bolumler'));


            }else{

            $notification = array(
            'message' => 'Lütfen en az bir ürün ekleyin',
            'alert-type' => 'error'
        );

        return redirect()->to('/')->with($notification); 
            }



        }else{

             $notification = array(
            'message' => 'Önce Giriş Yapmanız Gerekiyor',
            'alert-type' => 'error'
        );

        return redirect()->route('login')->with($notification); 
        }




    }









    

}
 