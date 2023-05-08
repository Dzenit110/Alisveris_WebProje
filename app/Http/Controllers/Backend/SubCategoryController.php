<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
     public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));
    } 

    public function AddSubCategory(){

        $categories = Category::orderBy('category_name','ASC')->get();
      return view('backend.subcategory.subcategory_add',compact('categories'));

    }


    public function StoreSubCategory(Request $request){ 

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
        ]);

       $notification = array(
            'message' => 'Alt Kategori Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('all.subcategory')->with($notification); 

    }

    public function EditSubCategory($id){

        $categories = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
  
      }
  
  
  
      public function UpdateSubCategory(Request $request){
  
          $subcat_id = $request->id;
  
           SubCategory::findOrFail($subcat_id)->update([
              'category_id' => $request->category_id,
              'subcategory_name' => $request->subcategory_name,
              'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)), 
          ]);
  
         $notification = array(
              'message' => 'Alt Kategori Başarıyla Güncellendi',
              'alert-type' => 'success'
          );
  
          return redirect()->route('all.subcategory')->with($notification); 
  
  
      }
  
  
      public function SilSubCategory($id){
  
          SubCategory::findOrFail($id)->delete();
  
           $notification = array(
              'message' => 'Alt Kategori Başarıyla Silindi',
              'alert-type' => 'success'
          );
  
          return redirect()->back()->with($notification); 
  
  
      }

        // Alt kategori için urunEkle
      public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
            return json_encode($subcat);

    }






    




}
