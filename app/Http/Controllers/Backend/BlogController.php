<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Image;
use Carbon\Carbon;
class BlogController extends Controller
{
    
    public function AllBlogCategory(){
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.blog.category.blogcategory_all',compact('blogcategory'));

    } 

    public function EkleBlogCategory(){

        return view('backend.blog.category.blogcategory_add');

    }

    public function StoreBlogCategory(Request $request){

        BlogCategory::insert([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)),
            'created_at' => Carbon::now(), 
        ]);

       $notification = array(
            'message' => 'Blog Kategorisi Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.category')->with($notification); 

    }


    public function EditBlogCategory($id){

        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.blog.category.blogcategory_edit',compact('blogcategory'));

    } 

     public function UpdateBlogCategory(Request $request){

      $blog_id = $request->id;

        BlogCategory::findOrFail($blog_id)->update([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug' => strtolower(str_replace(' ', '-',$request->blog_category_name)), 
        ]);

       $notification = array(
            'message' => 'Blog Kategorisi Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.category')->with($notification); 

    } 


    public function SilBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Kategorisi Başarıyla Silindi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 
    }


    public function AllBlogPost(){

        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.blogpost_all',compact('blogpost'));

    } 


    public function AddBlogPost(){
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.blog.post.blogpost_add',compact('blogcategory'));



    }


    public function StoreBlogPost(Request $request){

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        \Intervention\Image\Facades\Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_baslik' => $request->post_baslik,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_baslik)),
            'post_kisa_tanim' => $request->post_kisa_tanim,
            'post_uzun_tanim' => $request->post_uzun_tanim,
            'post_image' => $save_url, 
            'created_at' => Carbon::now(),
        ]);

       $notification = array(
            'message' => 'Blog Gönderisi Başarıyla Eklendi',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.blog.post')->with($notification); 

    }


    public function EditBlogPost($id){
        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
       return view('backend.blog.post.blogpost_edit',compact('blogcategory','blogpost'));
   }


    public function UpdateBlogPost(Request $request){

       $post_id = $request->id;
       $old_img = $request->old_image;

       if ($request->file('post_image')) {

       $image = $request->file('post_image');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       \Intervention\Image\Facades\Image::make($image)->resize(1103,906)->save('upload/blog/'.$name_gen);
       $save_url = 'upload/blog/'.$name_gen;

       if (file_exists($old_img)) {
          unlink($old_img);
       }

       BlogPost::findOrFail($post_id)->update([
           'category_id' => $request->category_id,
           'post_baslik' => $request->post_baslik,
           'post_slug' => strtolower(str_replace(' ', '-',$request->post_baslik)),
           'post_kisa_tanim' => $request->post_kisa_tanim,
           'post_uzun_tanim' => $request->post_uzun_tanim,
           'post_image' => $save_url, 
           'updated_at' => Carbon::now(),
       ]);

      $notification = array(
           'message' => 'Blog Gönderisi Resimle Başarıyla Güncellendi',
           'alert-type' => 'success'
       );

       return redirect()->route('admin.blog.post')->with($notification); 

       } else {

           BlogPost::findOrFail($post_id)->update([
            'category_id' => $request->category_id,
            'post_baslik' => $request->post_baslik,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_baslik)),
            'post_kisa_tanim' => $request->post_kisa_tanim,
            'post_uzun_tanim' => $request->post_uzun_tanim,
            'updated_at' => Carbon::now(),
       ]);

      $notification = array(
           'message' => 'Blog Gönderisi Resimsiz Olarak Başarıyla Güncellendi',
           'alert-type' => 'success'
       );

       return redirect()->route('admin.blog.post')->with($notification); 

       } 

   }


    public function SilBlogPost($id){

       $blogpost = BlogPost::findOrFail($id);
       $img = $blogpost->post_image;
       unlink($img ); 

       BlogPost::findOrFail($id)->delete();

       $notification = array(
           'message' => 'Blog Gönderisi Başarıyla Silindi',
           'alert-type' => 'success'
       );

       return redirect()->back()->with($notification); 

   }


   public function AllBlog(){
    $blogcategory = BlogCategory::latest()->get();
    $blogpost = BlogPost::latest()->get();
    return view('frontend.blog.home_blog',compact('blogcategory','blogpost'));
}


public function BlogDetay($id,$slug){
    $blogcategory = BlogCategory::latest()->get();
    $blogdetay = BlogPost::findOrFail($id);
    $breadcat = BlogCategory::where('id',$id)->get();
    return view('frontend.blog.blog_detay',compact('blogcategory','blogdetay','breadcat'));

}


public function BlogPostCategory($id,$slug){

    $blogcategory = BlogCategory::latest()->get();
    $blogpost = BlogPost::where('category_id',$id)->get();
    $breadcat = BlogCategory::where('id',$id)->get();
    return view('frontend.blog.category_post',compact('blogcategory','blogpost','breadcat'));

}







}
