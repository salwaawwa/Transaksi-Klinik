<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\PesananDetail;
use Auth;

class HistoryController extends Controller
{
    public function index(){
        $pesanans = Pesanan::all();
        return view('daftarTransaksi.history', compact('pesanans'));
    }

    public function detail($id){
        $pesanan = Pesanan::where('id',$id)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        else{
            $pesanan_details = PesananDetail::where('pesanan_id',null)->get();
        }

        return view('daftarTransaksi.detail',compact('pesanan','pesanan_details'));
    }
}
