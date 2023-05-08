<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Urun;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function ShopPage(){

    $urunler = Urun::query();

    if(!empty($_GET['category'])){

       $slugs = explode(',',$_GET['category']);
       $catId = Category::select('id')->whereIn('category_slug',$slugs)->pluck('id')->toArray();
       $urunler = Urun::whereIn('category_id',$catId)->get();


    }
    elseif(!empty($_GET['brand'])){

        $slugs = explode(',',$_GET['brand']);
        $brandIds = Brand::select('id')->whereIn('brand_slug',$slugs)->pluck('id')->toArray();
        $urunler = Urun::whereIn('brand_id',$brandIds)->get();
 
 
     } 
    
    else {
        $urunler = Urun::where('status',1)->orderBy('id','DESC')->get();

    }


    $categories = Category::orderBy('category_name','ASC')->get();
    $brandlar = Brand::orderBy('brand_name','ASC')->get();
  
    $yeniUrun = Urun::orderBy('id','DESC')->limit(3)->get();

      return view('frontend.urun.shop_page',compact('urunler','categories','yeniUrun','brandlar'));

   }

  public function ShopFilter (Request $request){

    $data = $request->all();
    // Filter Category için

    $catUrl = "";
    if(!empty($data['category'])){

        foreach($data['category'] as $category){

           if(empty($catUrl)){
              $catUrl .= '&category='.$category;

           }
           
           else{
            $catUrl .= ','.$category;
           }

        }

        $brandUrl = "";
        if(!empty($data['brand'])){
    
            foreach($data['brand'] as $brand){
    
               if(empty($brandUrl)){
                  $brandUrl .= '&brand='.$brand;
    
               }
               
               else{
                $brandUrl .= ','.$brand;
               }
    
            }

        }

     return redirect()->route('shop.page',$catUrl.$brandUrl);

    }



  }

  }













