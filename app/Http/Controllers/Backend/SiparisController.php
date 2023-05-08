<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;
use App\Models\SiparisItem; 
use App\Models\Urun; 
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class SiparisController extends Controller
{
    public function BeklemedeSiparis(){
        $siparisler = Siparis::where('status','Beklemede')->orderBy('id','DESC')->get();
        return view('backend.siparis.beklemede_siparis',compact('siparisler'));
    }


    public function AdminSiparisDetay($siparis_id){

        $siparis = Siparis::with('bolum','bolge','user')->where('id',$siparis_id)->first();
        $siparisItem = SiparisItem::with('urun')->where('siparis_id',$siparis_id)->orderBy('id','DESC')->get();

        return view('backend.siparis.admin_siparis_detay',compact('siparis','siparisItem'));

    }

    public function AdminOnaySiparis(){
        $siparisler = Siparis::where('status','Onay')->orderBy('id','DESC')->get();
        return view('backend.siparis.onay_siparis',compact('siparisler'));
    } 


 public function AdminIsleniyorSiparis(){
        $siparisler = Siparis::where('status','isleniyor')->orderBy('id','DESC')->get();
        return view('backend.siparis.isleniyor_siparis',compact('siparisler'));
    } 


    public function AdminTeslimSiparis(){
        $siparisler = Siparis::where('status','Teslim_edildi')->orderBy('id','DESC')->get();
        return view('backend.siparis.teslim_edildi_siparis',compact('siparisler'));
    }


    public function BeklemedeOnay($siparis_id){
        Siparis::findOrFail($siparis_id)->update(['status' => 'Onay']);

        $notification = array(
            'message' => 'Sipariş Başarıyla Onaylandı',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.onay.siparis')->with($notification); 


    }


    public function Onayisleniyor($siparis_id){
        Siparis::findOrFail($siparis_id)->update(['status' => 'isleniyor']);

        $notification = array(
            'message' => 'Sipariş Başarıyla Işleniyor',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.isleniyor.siparis')->with($notification); 


    }


      public function IsleniyorTeslim($siparis_id){
       
        $urun = SiparisItem::where('siparis_id',$siparis_id)->get();
        foreach($urun as $item){
            Urun::where('id',$item->urun_id)
                    ->update(['urun_qty' => DB::raw('urun_qty-'.$item->qty) ]);
        } 
       
       
        Siparis::findOrFail($siparis_id)->update(['status' => 'Teslim_edildi']);

        $notification = array(
            'message' => 'Sipariş Başarıyla Teslim Edildi',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.teslim_edildi.siparis')->with($notification); 


    }


    public function AdminFaturaDownload($siparis_id){

        $siparis = Siparis::with('bolum','bolge','user')->where('id',$siparis_id)->first();
        $siparisItem = SiparisItem::with('urun')->where('siparis_id',$siparis_id)->orderBy('id','DESC')->get();

        $pdf = Pdf::loadView('backend.siparis.admin_siparis_fatura', compact('siparis','siparisItem'))->setPaper('a4')->setOption([
                'tempDir' => public_path(),
                'chroot' => public_path(),
        ]);
        return $pdf->download('fatura_admin.pdf');

    }













}
