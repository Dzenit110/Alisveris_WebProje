<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Afis;
use Intervention\Image\Facades\Image;


class AfisController extends Controller
{
    public function AllAfis()
    {
        $afis = Afis::latest()->get();
        return view('backend.afis.afis_all', compact('afis'));
    } 



    public function AddAfis(){
        return view('backend.afis.afis_add');
}

 public function StoreAfis(Request $request){

    $image = $request->file('afis_image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
    $save_url = 'upload/banner/'.$name_gen;

    Afis::insert([
        'afis_title' => $request->afis_title,
        'afis_url' => $request->afis_url,
        'afis_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Afis Başarıyla Eklendi',
        'alert-type' => 'info'
    );

    return redirect()->route('all.afis')->with($notification); 

}



public function EditAfis($id){
    $afis = Afis::findOrFail($id);
    return view('backend.afis.afis_edit',compact('afis'));
}


public function UpdateAfis(Request $request){

    $afis_id = $request->id;
    $old_img = $request->old_image;

    if ($request->file('afis_image')) {

    $image = $request->file('afis_image');
     $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(768,450)->save('upload/banner/'.$name_gen);
    $save_url = 'upload/banner/'.$name_gen;

    if (file_exists($old_img)) {
       unlink($old_img);
    }

    Afis::findOrFail($afis_id)->update([
        'afis_title' => $request->afis_title,
        'afis_url' => $request->afis_url,
        'afis_image' => $save_url, 
    ]);

   $notification = array(
        'message' => 'Afiş Resimle Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.afis')->with($notification); 

    } else {

        Afis::findOrFail($afis_id)->update([
        'afis_title' => $request->afis_title,
        'afis_url' => $request->afis_url, 
    ]);

   $notification = array(
        'message' => 'Afiş Resimsiz Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->route('all.afis')->with($notification); 

    } 

}




public function SilAfis($id){

    $banner = Afis::findOrFail($id);
    $img = $banner->afis_image;
    unlink($img ); 

    Afis::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Afiş Başarıyla Silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification); 

}

















}
