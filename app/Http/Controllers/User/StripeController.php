<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Charge;
use App\Models\Siparis;
use App\Models\SiparisItem; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderComplete;
use Illuminate\Support\Facades\Notification;
class StripeController extends Controller
{

    public function StripeOrder(Request $request){

      if(Session::has('coupon')){
        $toplam_miktar = Session::get('coupon')['toplam_miktar'];
    }else{
        $toplam_miktar = round(Cart::total());
    }





        \Stripe\Stripe::setApiKey('sk_test_51N2GDmElT4PkRHx8bLxBrsvWhQIG674UmGDKA0HzkB7sd6YZ6EvGUxDVxXyQvGTyei5VfCIwx2zhSfxgkhg5XUa700sRMx6gGL');


        $token = $_POST['stripeToken'];

        $charge = Charge::create([
          'amount' => $toplam_miktar*100,
          'currency' => 'usd',
          'description' => 'Kolay Alışveriş',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);


        $siparis_id = Siparis::insertGetId([
       
          'user_id' => Auth::id(),
          'bolum_id' => $request->bolum_id,
          'bolge_id' => $request->bolge_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->address,
            'post_code' => $request->post_code,
            'notes' => $request->notes,

            'odeme_type' => $charge->payment_method,
            'odeme_method' => 'Kredi Kart',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'miktar' => $toplam_miktar,
            'order_number' => $charge->metadata->order_id,

            'fatura_no' => 'EOS'.mt_rand(10000000,99999999),
            'siparis_tarih' =>  Carbon::now()->format('d F Y'),
            'siparis_ay' => Carbon::now()->format('F'),
            'siparis_yil' =>Carbon::now()->format('Y'), 
            'onay_tarih' => $request->bolum_id,

        
            'status' => 'Beklemede',
            'created_at' =>  Carbon::now(),  
       
        ]);

  // Start Send Email

  $fatura = Siparis::findOrFail($siparis_id);
  info('request', $request->all());
  $data = [
       
      'fatura_no' => $fatura->fatura_no,
      'miktar' => $toplam_miktar,
      'name' => $fatura->name,
      'email' => $fatura->email,

  ];
      
   Mail::to($request->email)->send(new \App\Mail\SiparisMail($data));

        $carts = Cart::content();
        foreach($carts as $cart){

            SiparisItem::insert([
                'siparis_id' => $siparis_id,
                'urun_id' => $cart->id,
                'satici_id' => $cart->options->satici,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'fiyat' => $cart->price,
                'created_at' =>Carbon::now(),

            ]);

        } 

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Siparişiniz Başarıyla Verildi',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification); 

        
    }


    public function CashOrder(Request $request){

        $user = User::where('role','admin')->get();


      if(Session::has('coupon')){
          $toplam_miktar = Session::get('coupon')['toplam_miktar'];
      }else{
          $toplam_miktar = round(Cart::total());
      }


      $siparis_id = Siparis::insertGetId([
        'user_id' => Auth::id(),
        'bolum_id' => $request->bolum_id,
        'bolge_id' => $request->bolge_id,
          'name' => $request->name,
          'email' => $request->email,
          'phone' => $request->phone,
          'adress' => $request->address,
          'post_code' => $request->post_code,
          'notes' => $request->notes,

          'odeme_type' => 'Kapıda ödeme',
          'odeme_method' => 'Kapıda ödeme',
          'currency' => 'Usd',
          'miktar' => $toplam_miktar,

          'fatura_no' => 'EOS'.mt_rand(10000000,99999999),
          'siparis_tarih' =>  Carbon::now()->format('d F Y'),
          'siparis_ay' => Carbon::now()->format('F'),
          'siparis_yil' =>Carbon::now()->format('Y'), 

      
          'status' => 'Beklemede',
          'created_at' =>  Carbon::now(),  

      ]);


// Start Send Email

$fatura = Siparis::findOrFail($siparis_id);
info('request', $request->all());
$data = [
     
    'fatura_no' => $fatura->fatura_no,
    'miktar' => $toplam_miktar,
    'name' => $fatura->name,
    'email' => $fatura->email,

];
    
 Mail::to($request->email)->send(new \App\Mail\SiparisMail($data));




      $carts = Cart::content();
      foreach($carts as $cart){

          SiparisItem::insert([
            'siparis_id' => $siparis_id,
            'urun_id' => $cart->id,
            'satici_id' => $cart->options->satici,
            'color' => $cart->options->color,
            'size' => $cart->options->size,
            'qty' => $cart->qty,
            'fiyat' => $cart->price,
            'created_at' =>Carbon::now(),
          ]);
      } 
      if (Session::has('coupon')) {
         Session::forget('coupon');
      }
      Cart::destroy();
      $notification = array(
          'message' => 'Siparişiniz Başarıyla Verildi',
          'alert-type' => 'success'
      );

      Notification::send($user, new OrderComplete($request->name));

      return redirect()->route('dashboard')->with($notification); 
  }














}
