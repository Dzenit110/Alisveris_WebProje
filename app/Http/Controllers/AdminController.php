<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Notifications\SaticiOnayNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;



class AdminController extends Controller
{
    

public function AdminDashboard(){

  return view('admin.index');

}

public function AdminLogin(){
  return view('admin.admin_login');
} 


public function AdminDestroy(Request $request){
  Auth::guard('web')->logout();

  $request->session()->invalidate();

  $request->session()->regenerateToken();

  return redirect('/admin/login');
} 

public function AdminProfile(){

  $id = Auth::user()->id;
  $adminData = User::find($id);
  return view('admin.admin_profile_view',compact('adminData'));

}

public function AdminProfileStore(Request $request){
  $id = Auth::user()->id;
  $data = User::find($id);
  $data->name = $request->name;
  $data->email = $request->email;
  $data->phone = $request->phone;
  $data->address = $request->address; 
  if ($request->file('photo')) {
      $file = $request->file('photo');
      @unlink(public_path('upload/admin_images/'.$data->photo));
      $filename = date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'),$filename);
      $data['photo'] = $filename;
  }

  $data->save();

 
  $notification = array(
      'message' => 'Admin Profili Başarıyla Güncellendi',
      'alert-type' => 'success'
  );

  return redirect()->back()->with($notification);

} 

public function AdminChangePassword(){
  return view('admin.admin_change_password');
} 


public function AdminUpdatePassword(Request $request){
  // Validation 
  $request->validate([
      'old_password' => 'required',
      'new_password' => 'required|confirmed', 
  ]);

  // Match The Old Password
  if (!Hash::check($request->old_password, auth::user()->password)) {
      return back()->with("error", "Eski Şifre Eşleşmiyor!!");
  }

  // Update The new password 
  User::whereId(auth()->user()->id)->update([
      'password' => Hash::make($request->new_password)

  ]);
  return back()->with("status", "Parola Başarıyla Değiştirildi");

}


public function InactiveSatici(){
  $inActiveSatici = User::where('status','inactive')->where('role','satici')->latest()->get();
  return view('backend.satici.inactive_satici',compact('inActiveSatici'));


}




public function ActiveSatici(){
  $ActiveSatici = User::where('status','active')->where('role','satici')->latest()->get();
  return view('backend.satici.active_satici',compact('ActiveSatici'));

}

public function InactiveSaticiDetay($id){

  $inactiveSaticiDetay = User::findOrFail($id);
  return view('backend.satici.inactive_satici_detay',compact('inactiveSaticiDetay'));

}

public function ActiveSaticiOnay(Request $request){

  $saticii_id = $request->id;
  $user = User::findOrFail($saticii_id)->update([
      'status' => 'active', 


      
  ]);

  $notification = array(
      'message' => 'Satıcı Başarıyla Active Olmuş',
      'alert-type' => 'success'
  );

  $vuser = User::where('role','satici')->get();
  Notification::send($vuser, new SaticiOnayNotification($request));



  return redirect()->route('active.satici')->with($notification);

}


public function ActiveSaticiDetay($id){

  $activeSaticiDetay = User::findOrFail($id);
  return view('backend.satici.active_satici_detay',compact('activeSaticiDetay'));

}


public function InActiveSaticiOnay(Request $request){

  $satici_a_id = $request->id;
  $user = User::findOrFail($satici_a_id)->update([
      'status' => 'inactive',
  ]);

  $notification = array(
      'message' => 'Satıcı Başarıyla InActive Olmuş',
      'alert-type' => 'success'
  );

  return redirect()->route('inactive.satici')->with($notification);

}




}