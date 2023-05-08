<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    
    public function StoreReview(Request $request){

        $urun = $request->urun_id;
        $satici = $request->hsatici_id;

        $request->validate([
            'yorum' => 'required',
        ]);

        Review::insert([

            'urun_id' => $urun,
            'user_id' => Auth::id(),
            'yorum' => $request->yorum,
            'rating' => $request->quality,
            'satici_id' => $satici,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Yorum Admin Tarafından Onaylanacak',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }



    public function BeklemedeReview(){

        $review = Review::where('status',0)->orderBy('id','DESC')->get();
        return view('backend.review.beklemede_review',compact('review'));

    }

    public function ReviewOnay($id){

        Review::where('id',$id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Yorum Başarıyla Onaylandı',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    }


    public function PaylasReview(){

        $review = Review::where('status',1)->orderBy('id','DESC')->get();
        return view('backend.review.paylas_review',compact('review'));

    }


    public function ReviewSil($id){

        Review::findOrFail($id)->delete();

         $notification = array(
            'message' => 'İnceleme Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }



    public function SaticiAllReview(){

        $id = Auth::user()->id;

        $review = Review::where('satici_id',$id)->where('status',1)->orderBy('id','DESC')->get();
        return view('satici.backend.review.onay_review',compact('review'));

    }










}
