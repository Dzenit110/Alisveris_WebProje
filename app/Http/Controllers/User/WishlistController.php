<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class WishlistController extends Controller
{
    
    public function AddToWishList(Request $request, $urun_id){

        if (Auth::check()) {
      $exists = Wishlist::where('user_id',Auth::id())->where('urun_id',$urun_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(),
                'urun_id' => $urun_id,
                'created_at' => Carbon::now(),

               ]);
               return response()->json(['success' => 'İstek Listenize Başarıyla Eklendi' ]);
            } else{
                return response()->json(['error' => 'Bu Ürün Zaten İstek Listenizde' ]);

            } 

        }else{
            return response()->json(['error' => 'İlk Önce Hesabınıza Giriş Yapın' ]);
        }

    } 


    public function AllWishlist(){

        return view('frontend.wishlist.view_wishlist');

    }


    public function GetWishlistProduct(){

        $wishlist = Wishlist::with('urun')->where('user_id',Auth::id())->latest()->get();

        $wishQty = wishlist::count(); 

        return response()->json(['wishlist'=> $wishlist, 'wishQty' => $wishQty]);

    }

    public function WishlistRemove($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
     return response()->json(['success' => 'Successfully Product Remove' ]);
    }

    



}
