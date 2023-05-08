<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Siparis;
use App\Models\SiparisItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class AllUserController extends Controller
{
    public function UserAccount()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.userdashboard.account_detay', compact('userData'));
    }


    public function UserDegistirmePassword()
    {
        return view('frontend.userdashboard.user_degistirme_password');
    }


    public function UserSiparisPage()
    {

        $id = Auth::user()->id;
        $siparisler = Siparis::where('user_id', $id)->orderBy('id', 'DESC')->get();


        return view('frontend.userdashboard.user_siparis_page', compact('siparisler'));
    }


    public function UserSiparisDetay($siparis_id)
    {

        $siparis = Siparis::with('bolum', 'bolge', 'user')->where('id', $siparis_id)->where('user_id', Auth::id())->first();
        $siparisItem = SiparisItem::with('urun')->where('siparis_id', $siparis_id)->orderBy('id', 'DESC')->get();

        return view('frontend.siparis.siparis_detay', compact('siparis', 'siparisItem'));
    }

    public function UserSiparisFatura($siparis_id)
    {

        $siparis = Siparis::with('bolum', 'bolge', 'user')->where('id', $siparis_id)->where('user_id', Auth::id())->first();
        $siparisItem = SiparisItem::with('urun')->where('siparis_id', $siparis_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('frontend.siparis.siparis_fatura', compact('siparis', 'siparisItem'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('fatura.pdf');
    }


    public function IadeSiparis(Request $request, $siparis_id)
    {

        Siparis::findOrFail($siparis_id)->update([
            'iade_tarih' => Carbon::now()->format('d F Y'),
            'iade_sebep' => $request->iade_sebep,
            'iade_siparis' => 1,
        ]);

        $notification = array(
            'message' => 'İade Talebi Başarıyla Gönderildi',
            'alert-type' => 'success'
        );

        return redirect()->route('user.siparis.page')->with($notification);
    }

    public function IptalSiparis(Request $request, $siparis_id)
    {

        Siparis::findOrFail($siparis_id)->update([
            'iptal_tarih' => Carbon::now()->format('d F Y'),
            'iptal_sebep' => $request->iptal_sebep,
            'iptal_siparis' => 2,
        ]);

        $notification = array(
            'message' => 'İptal Talebi Başarıyla Gönderildi',
            'alert-type' => 'success'
        );

        return redirect()->route('user.siparis.page')->with($notification);
    }

    public function IadeSiparisPage()
    {

        $siparisler = Siparis::where('user_id', Auth::id())->where('iade_sebep', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.siparis.iade_siparis_view', compact('siparisler'));
    }
    public function IptalSiparisPage()
    {

        $siparisler1 = Siparis::where('user_id', Auth::id())->where('iptal_sebep', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.siparis.iptal_siparis_view', compact('siparisler1'));
    }


    public function UserTakipSiparis()
    {
        return view('frontend.userdashboard.user_takip_siparis');
    }


    public function SiparisTakip(Request $request)
    {

        $fatura = $request->code;

        $takip = Siparis::where('fatura_no', $fatura)->first();

        if ($takip) {
            $takip->teslim_tarih = Carbon::now();
            $takip->save();

            return view('frontend.takip.takip_siparis', compact('takip'));
        } else {

            $notification = array(
                'message' => 'Fatura Kodu Geçersiz',
                'alert-type' => 'error'
            );



            return redirect()->back()->with($notification);
        }
    }
}
