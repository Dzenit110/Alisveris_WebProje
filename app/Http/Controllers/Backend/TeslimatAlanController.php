<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NakliyeBolum;
use App\Models\NakliyeBolgeler;
use App\Models\SevkiyatDurum;
use Carbon\Carbon;
class TeslimatAlanController extends Controller
{
    public function AllBolum(){
        $bolum = NakliyeBolum::latest()->get();
        return view('backend.nakliye.bolum.bolum_all',compact('bolum'));
    }  

    public function AddBolum(){
        return view('backend.nakliye.bolum.bolum_add');
    }


    public function StoreBolum(Request $request){ 

        NakliyeBolum::insert([ 
            'bolum_name' => $request->bolum_name, 
        ]);

       $notification = array(
            'message' => 'Nakliye Bölümü Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.bolum')->with($notification); 

    }


    public function EditBolum($id){

        $bolum = NakliyeBolum::findOrFail($id);
        return view('backend.nakliye.bolum.bolum_edit',compact('bolum'));

    }


     public function UpdateBolum(Request $request){

        $bolum_id = $request->id;

         NakliyeBolum::findOrFail($bolum_id)->update([
            'bolum_name' => $request->bolum_name,
        ]);

       $notification = array(
            'message' => 'Nakliye Bölümü Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.bolum')->with($notification); 


    }

    public function DeleteBolum($id){

        NakliyeBolum::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Nakliye Bölümü Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }




    public function AllBolge(){
        $bolge = NakliyeBolgeler::latest()->get();
        return view('backend.nakliye.bolge.bolge_all',compact('bolge'));
    } 

    public function AddBolge(){
        $bolum = NakliyeBolum::orderBy('bolum_name','ASC')->get();
        return view('backend.nakliye.bolge.bolge_add',compact('bolum'));
    } 


public function StoreBolge(Request $request){ 

        NakliyeBolgeler::insert([ 
            'bolum_id' => $request->bolum_id, 
            'bolge_name' => $request->bolge_name,
        ]);

       $notification = array(
            'message' => 'Nakliye Bölge Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.bolge')->with($notification); 

}

public function EditBolge($id){
    $bolum = NakliyeBolum::orderBy('bolum_name','ASC')->get();
    $bolge = NakliyeBolgeler::findOrFail($id);
    return view('backend.nakliye.bolge.bolge_edit',compact('bolge','bolum'));

}// End Method 


public function UpdateBolge(Request $request){

    $bolge_id = $request->id;

     NakliyeBolgeler::findOrFail($bolge_id)->update([
         'bolum_id' => $request->bolum_id, 
        'bolge_name' => $request->bolge_name,
    ]);

   $notification = array(
        'message' => 'Nakliye Bölgeler Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.bolge')->with($notification); 


}// End Method 


 public function DeleteBolge($id){

    NakliyeBolgeler::findOrFail($id)->delete();

     $notification = array(
        'message' => 'Nakliye Bölgeler Başarıyla silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 


}



/// Sevkiyat Durum ////


public function AllDurum(){
    $durum = SevkiyatDurum::latest()->get();
    return view('backend.nakliye.durum.durum_all',compact('durum'));
} // End Method 


public function AddDurum(){
    $bolum = NakliyeBolum::orderBy('bolum_name','ASC')->get();
    $bolge = NakliyeBolgeler::orderBy('bolge_name','ASC')->get();
     return view('backend.nakliye.durum.durum_add',compact('bolum','bolge'));
}// End Method 


public function GetBolge($bolum_id){
    $bol = NakliyeBolgeler::where('bolum_id',$bolum_id)->orderBy('bolge_name','ASC')->get();
        return json_encode($bol);

}

public function StoreDurum(Request $request){ 

    SevkiyatDurum::insert([ 
        'bolum_id' => $request->bolum_id, 
        'bolge_id' => $request->bolge_id, 
        'durum' => $request->durum,
    ]);

   $notification = array(
        'message' => 'Sokak Başarıyla Eklendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.durum')->with($notification); 

}


public function EditDurum($id){
    $bolum = NakliyeBolum::orderBy('bolum_name','ASC')->get();
    $bolge = NakliyeBolgeler::orderBy('bolge_name','ASC')->get();
    $durum = SevkiyatDurum::findOrFail($id);
     return view('backend.nakliye.durum.durum_edit',compact('bolum','bolge','durum'));
} 


 public function UpdateDurum(Request $request){

    $durum = $request->id;

     SevkiyatDurum::findOrFail($durum)->update([
        'bolum_id' => $request->bolum_id, 
        'bolge_id' => $request->bolge_id, 
        'durum' => $request->durum,
    ]);

   $notification = array(
        'message' => 'Sokak Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.durum')->with($notification); 


}

public function DeleteDurum($id){

    SevkiyatDurum::findOrFail($id)->delete();

     $notification = array(
        'message' => 'Sokak Başarıyla Silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 


}











}
