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
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SaticiUrunController extends Controller
{
     public function SaticiAllUrun(){

        $id = Auth::user()->id;
        $urunler = Urun::where('satici_id',$id)->latest()->get();
        return view('satici.backend.urun.satici_urun_all',compact('urunler'));  


     }

     public function SaticiEkleUrun(){

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('satici.backend.urun.satici_urun_add',compact('brands','categories'));

    } 


 public function SaticiGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }



    public function SaticiStoreUrun(Request $request){


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
            'satici_id' => Auth::user()->id,
            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);

        /// Multiple Image Upload 

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
            'message' => 'Satıcı Ürünü Başarıyla Ekledi',
            'alert-type' => 'success'
        );

        return redirect()->route('satici.all.urun')->with($notification); 


    }




    public function SaticiEditUrun($id){

        $multiImgs = MultiImg::where('urun_id',$id)->get();

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $urunler = Urun::findOrFail($id);
        return view('satici.backend.urun.satici_urun_edit',compact('brands','categories', 'urunler','subcategory','multiImgs'));
    }



public function SaticiUpdateUrun(Request $request){

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

            'status' => 1,
            'created_at' => Carbon::now(), 

        ]);


         $notification = array(
            'message' => 'Satıcı Ürünü Resimsiz Olarak Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->route('satici.all.urun')->with($notification); 

    }



    public function SaticiUpdateUrunThabnail(Request $request){

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
            'message' => 'Satıcı Ürün Resmi Küçük Resmi Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 


    }


    //Satici Multi Image Update 
    public function SaticiUpdateUrunmultiImage(Request $request){

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
        } 

         $notification = array(
            'message' => 'Satıcı Ürün Çoklu Görsel Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

    } 


 public function SaticiMultiimgSil($id){
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_ad);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Satıcı Ürün Çoklu Görsel Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }



    public function SaticiUrunInactive($id){

        Urun::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Ürün Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

      public function SaticiUrunActive($id){

        Urun::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Ürün Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


     public function SaticiUrunSil($id){

        $urun = Urun::findOrFail($id);
        unlink($urun->urun_thambnail);
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























}