<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Urun;
use App\Models\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UrunController extends Controller
{
    public function AllUrun(){
        $urunler = Urun::latest()->get();
        return view('backend.urun.urun_all',compact('urunler'));
    }



public function EkleUrun(){

    $activeSatici = User::where('status','active')->where('role','satici')->latest()->get();
    $brands = Brand::latest()->get();
    $categories = Category::latest()->get();
    return view('backend.urun.urun_ekle',compact('brands','categories','activeSatici'));
}

public function StoreUrun(Request $request){


        $image = $request->file('urun_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $urun_id = Urun::insertGetId([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'urun_name' => $request->urun_name,
            'urun_slug' => strtolower(str_replace(' ','-',$request->urun_name)),

            'urun_code' => $request->urun_code,
            'urun_qty' => $request->urun_qty,
            'urun_tags' => $request->urun_tags,
            'urun_size' => $request->urun_size,
            'urun_color' => $request->urun_color,

            'satis_fiyat' => $request->satis_fiyat,
            'indirimli_fiyat' => $request->indirimli_fiyat,
            'kisa_tanim' => $request->kisa_tanim,
            'uzun_tanim' => $request->uzun_tanim, 

            'sicak_firsat' => $request->sicak_firsat,
            'ozellik' => $request->ozellik,
            'ozel_teklif' => $request->ozel_teklif,
            'ozel_firsat' => $request->ozel_firsat, 

            'urun_thambnail' => $save_url,
            'satici_id' => $request->satici_id,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

        /// Multiple Image Upload From her //////

        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;



        MultiImg::insert([

            'urun_id' => $urun_id,
            'photo_ad' => $uploadPath,
            'created_at' => Carbon::now(), 

        ]); 
        } 


        $notification = array(
            'message' => 'Ürün Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.urun')->with($notification); 


    } 



    public function EditUrun($id){
        $multiImgs = MultiImg::where('urun_id',$id)->get();
        $activeSatici = User::where('status','active')->where('role','satici')->latest()->get();
         $brands = Brand::latest()->get();
         $categories = Category::latest()->get();
         $subcategory = SubCategory::latest()->get();
         $urunler = Urun::findOrFail($id);
         return view('backend.urun.urun_edit',compact('brands','categories','activeSatici','urunler','subcategory','multiImgs'));     }



     public function UpdateUrun(Request $request){

        $urun_id = $request->id;

        Urun::findOrFail($urun_id)->update([


                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'urun_name' => $request->urun_name,
                'urun_slug' => strtolower(str_replace(' ','-',$request->urun_name)),
    
                'urun_code' => $request->urun_code,
                'urun_qty' => $request->urun_qty,
                'urun_tags' => $request->urun_tags,
                'urun_size' => $request->urun_size,
                'urun_color' => $request->urun_color,
    
                'satis_fiyat' => $request->satis_fiyat,
                'indirimli_fiyat' => $request->indirimli_fiyat,
                'kisa_tanim' => $request->kisa_tanim,
                'uzun_tanim' => $request->uzun_tanim, 
    
                'sicak_firsat' => $request->sicak_firsat,
                'ozellik' => $request->ozellik,
                'ozel_teklif' => $request->ozel_teklif,
                'ozel_firsat' => $request->ozel_firsat, 
    
                'satici_id' => $request->satici_id,
                'status' => 1,
                'created_at' => Carbon::now(), 
   ]);


    $notification = array(
       'message' => 'Ürün Başarıyla Resimsiz Güncellendi',
       'alert-type' => 'success'
   );

   return redirect()->route('all.urun')->with($notification); 

}


public function UpdateUrunThambnail(Request $request){
    $pro_id = $request->id;
    $oldImage = $request->old_img;
    $image = $request->file('urun_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$name_gen);
    $save_url = 'upload/products/thambnail/'.$name_gen;
     if (file_exists($oldImage)) {
       unlink($oldImage);
    }
    Urun::findOrFail($pro_id)->update([
        'urun_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
    ]);
   $notification = array(
        'message' => 'Ürün Resmi Küçük Resmi Başarıyla Güncellendi',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification); 
}



// Multi Image Update 
public function UpdateUrunMultiimage(Request $request){
    $imgs = $request->multi_img;
    foreach($imgs as $id => $img ){
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_ad);
$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$make_name);
    $uploadPath = 'upload/products/multi-image/'.$make_name;
    MultiImg::where('id',$id)->update([
        'photo_ad' => $uploadPath,
        'updated_at' => Carbon::now(),
    ]); 
    } // end foreach
     $notification = array(
        'message' => 'Ürün Çoklu Resmi Başarıyla Güncellendi',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification); 

}



public function MulitImageSil($id){
    $oldImg = MultiImg::findOrFail($id);
    unlink($oldImg->photo_ad);

    MultiImg::findOrFail($id)->delete();

    $notification = array(
        'message' => 'Ürün Çoklu Resmi Başarıyla Silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}



public function UrunInactive($id){

    Urun::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'Ürün Inactive',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

} 


  public function UrunActive($id){

    Urun::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'Ürün Active',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}

public function UrunSil($id){

    $product = Urun::findOrFail($id);
    unlink($product->urun_thambnail);
    Urun::findOrFail($id)->delete();

    $imges = MultiImg::where('urun_id',$id)->get();
    foreach($imges as $img){
        unlink($img->photo_ad);
        MultiImg::where('urun_id',$id)->delete();
    }

    $notification = array(
        'message' => 'Ürün Başarıyla Silindi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}



public function UrunStock(){

    $urunler = Urun::latest()->get();
    return view('backend.urun.urun_stock',compact('urunler'));

}






}