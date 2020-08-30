<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\PesananDetail;
use Auth;
use App\User;

class HistoryController extends Controller
{
    public function index(){
        $pesanans = Pesanan::all();
        return view('daftarTransaksi.history', compact('pesanans'));
    }

    public function cetakIndex(){
        $pesanan_details = PesananDetail::all();
        return view('daftarTransaksi.cetak-index', compact('pesanan_details'));
    }

    public function detail($id){
        $user = user::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('id',$id)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        else{
            $pesanan_details = PesananDetail::where('pesanan_id',null)->get();
        }

        return view('daftarTransaksi.detail',compact('pesanan','pesanan_details','user'));
    }

    public function cetakDetail($id){
        $user = user::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('id',$id)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        else{
            $pesanan_details = PesananDetail::where('pesanan_id',null)->get();
        }

        return view('daftarTransaksi.cetak-detail',compact('pesanan','pesanan_details','user'));
    }

    //public function destroy($id){
        //$pesanan = Pesanan::where('id',$id)->first();

        //$pesanan->delete();

      //  return redirect('history');
//    }

}
