<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    public function AllCoupon(){
        $coupon = Coupon::latest()->get();
        return view('backend.coupon.coupon_all',compact('coupon'));
    }

 public function AddCoupon(){
    return view('backend.coupon.coupon_add');



 }


 public function StoreCoupon(Request $request){ 

    Coupon::insert([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_indirim' => $request->coupon_indirim,
        'coupon_gecerli' => $request->coupon_gecerli,
        'created_at' => Carbon::now(),

    ]);

   $notification = array(
        'message' => 'Kupon Başarıyla Eklendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.coupon')->with($notification); 

}


public function EditCoupon($id){

    $coupon = Coupon::findOrFail($id);
    return view('backend.coupon.edit_coupon',compact('coupon'));

}// End Method 


public function UpdateCoupon(Request $request){

    $coupon_id = $request->id;

     Coupon::findOrFail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_indirim' => $request->coupon_indirim,
        'coupon_gecerli' => $request->coupon_gecerli,
        'created_at' => Carbon::now(),
    ]);

   $notification = array(
        'message' => 'Kupon Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.coupon')->with($notification); 


}// End Method 

 public function DeleteCoupon($id){

    Coupon::findOrFail($id)->delete();

     $notification = array(
        'message' => 'Kupon Başarıyla Silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 


}













}
