<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function SiteSetting(){

        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));

    } 


public function SiteSettingUpdate(Request $request){

        $setting_id = $request->id; 

        if ($request->file('logo')) {

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        \Intervention\Image\Facades\Image::make($image)->resize(130,66)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;


        SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright, 
            'logo' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Web Sitenin Ayarları Resimle Başarıyla Güncellendi',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } else {

            SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright, 
        ]);

       $notification = array(
            'message' => 'Web Sitenin Ayarları Resimsiz Güncellendi Başarıyla',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } 

    }


   //////////// Seo Setting /////////////

   public function SeoSetting(){

    $seo = Seo::find(1);
    return view('backend.seo.seo_update',compact('seo'));

} // End Method 


public function SeoSettingUpdate(Request $request){
    $seo_id = $request->id;

 Seo::findOrFail($seo_id)->update([
        'meta_baslik' => $request->meta_baslik,
        'meta_author' => $request->meta_author,
        'meta_anahtar_kelime' => $request->meta_anahtar_kelime,
        'meta_tanim' => $request->meta_tanim, 
    ]);

   $notification = array(
        'message' => 'Seo Ayarları Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);  

}









    
}
