<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\Urun;
use App\Models\User; 
use App\Http\Middleware\Cors;

class IndexController extends Controller
{
    
   public function Index(){
      $skip_category_1 = Category::skip(1)->first();
      $skip_product_1 = Urun::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->limit(5)->get();

      $skip_category_2 = Category::skip(2)->first();
      $skip_product_2 = Urun::where('status',1)->where('category_id',$skip_category_2->id)->orderBy('id','DESC')->limit(5)->get();

      $skip_category_7 = Category::skip(7)->first();
      $skip_product_7 = Urun::where('status',1)->where('category_id',$skip_category_7->id)->orderBy('id','DESC')->limit(5)->get();

      $sicak_firsat = Urun::where('sicak_firsat',1)->where('indirimli_fiyat','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

      $ozel_teklif = Urun::where('ozel_teklif',1)->orderBy('id','DESC')->limit(3)->get();

      $new = Urun::where('status',1)->orderBy('id','DESC')->limit(3)->get();

      $ozel_firsat = Urun::where('ozel_firsat',1)->orderBy('id','DESC')->limit(3)->get();


      return view('frontend.index',compact('skip_category_1','skip_product_1','skip_category_2','skip_product_2','skip_category_7','skip_product_7', 'sicak_firsat','ozel_teklif', 'new','ozel_firsat'));
  }
   
   
   
   
   
   
   
   
   public function UrunDetay($id,$slug){

        $urun = Urun::findOrFail($id);
       

        $color = $urun->urun_color;
        $urun_color = explode(',', $color);

        $size = $urun->urun_size;
        $urun_size = explode(',', $size);

        $multiImage = MultiImg::where('urun_id',$id)->get();

        $cat_id = $urun->category_id;
        $benzerUrun = Urun::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(4)->get();

        return view('frontend.urun.urun_detay',compact('urun','urun_color','urun_size', 'multiImage', 'benzerUrun'));

     }  


     public function SaticiDetay($id){

      $satici = User::findOrFail($id);
      $satici_urun = Urun::where('satici_id',$id)->get();
      return view('frontend.satici.satici_detay',compact('satici','satici_urun'));

   }

   public function SaticiAll(){

      $saticiler = User::where('status','active')->where('role','satici')->orderBy('id','DESC')->get();
      return view('frontend.satici.satici_all',compact('saticiler'));

   }

   public function CatUrun(Request $request,$id,$slug){
      $urunler = Urun::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();
      $categories = Category::orderBy('category_name','ASC')->get();
      $cat = Category::where('id',$id)->first();
      $yeniUrun = Urun::orderBy('id','DESC')->limit(3)->get();

      return view('frontend.urun.category_view',compact('urunler','categories','cat','yeniUrun'));

     }

     public function SubUrun(Request $request,$id,$slug){
      $urunler = Urun::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();
      $categories = Category::orderBy('category_name','ASC')->get();

      $subcat = SubCategory::where('id',$id)->first();

      $yeniUrun = Urun::orderBy('id','DESC')->limit(3)->get();

      return view('frontend.urun.subcategory_view',compact('urunler','categories','subcat','yeniUrun'));

     }




     public function ProductViewAjax($id){

      $urun = Urun::with('category','brand')->findOrFail($id);
      $color = $urun->urun_color;
      $urun_color = explode(',', $color);

      $size = $urun->urun_size;
      $urun_size = explode(',', $size);

      return response()->json(array(

       'urun' => $urun,
       'color' => $urun_color,
       'size' => $urun_size,

      ));

   }

   public function UrunArama(Request $request){

      $request->validate(['search' => "required"]);

      $item = $request->search;
      $categoriler = Category::orderBy('category_name','ASC')->get();
      $urunler = Urun::where('urun_name','LIKE',"%$item%")->get();
      $yeniUrun = Urun::orderBy('id','DESC')->limit(3)->get();
      return view('frontend.urun.search',compact('urunler','item','categoriler','yeniUrun'));

  }

  public function SearchProduct(Request $request){

   $request->validate(['search' => "required"]);

   $item = $request->search;
   $urunler = Urun::where('urun_name','LIKE',"%$item%")->select('urun_name','urun_slug','urun_thambnail','satis_fiyat','id')->limit(6)->get();

   return view('frontend.urun.search_urun',compact('urunler'));

}




}