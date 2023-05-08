<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\SaticiRegNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class SaticiController extends Controller
{

    public function SaticiDashboard(){

      return view('satici.index');
      
      }

public function SaticiLogin(){
        return view('satici.satici_login');
    } 



public function SaticiSil(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/satici/login');
    } 


    public function SaticiProfile(){

      $id = Auth::user()->id;
      $saticiData = User::find($id);
      return view('satici.satici_profile_view',compact('saticiData'));

  }


  public function SaticiProfileKaydetme(Request $request){

    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address; 
    $data->satici_join = $request->satici_join; 
    $data->satici_kisa_info = $request->satici_kisa_info; 


    if ($request->file('photo')) {
        $file = $request->file('photo');
        @unlink(public_path('upload/satici_images/'.$data->photo));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/satici_images'),$filename);
        $data['photo'] = $filename;
    }

    $data->save();

    $notification = array(
        'message' => 'Satıcı Profili Başarıyla Güncellendi',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

}



public function SaticiChangePassword(){
  return view('satici.satici_change_password');
} 



public function SaticiUpdatePassword(Request $request){
  // kontrol etmek 
  $request->validate([
      'old_password' => 'required',
      'new_password' => 'required|confirmed', 
  ]);

  // Eski şifrelerle kontrol etmek, aynı mı diye
  if (!Hash::check($request->old_password, auth::user()->password)) {
      return back()->with("error", "Eski Şifre Eşleşmiyor!!");
  }

 
  User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->new_password)

  ]);
  return back()->with("status", "Parola Başarıyla Değiştirildi");

} 
   // Satici oluşturmak için
   public function BecomeSatici(){
    return view('auth.become_satici');
} // End Mehtod 



public function SaticiRegister(Request $request) {

   $saticiuser = User::where('role','admin')->get();

    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed'],
    ]);

    $user = User::insert([ 
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'phone' => $request->phone,
        'satici_join' => $request->satici_join,
        'password' => Hash::make($request->password),
        'role' => 'satici',
        'status' => 'inactive',
    ]);

      $notification = array(
        'message' => 'Satıcı Başarıyla Kaydedildi',
        'alert-type' => 'success'
    );

    
    Notification::send($saticiuser, new SaticiRegNotification($request));



    return redirect()->route('satici.login')->with($notification);

}





}
