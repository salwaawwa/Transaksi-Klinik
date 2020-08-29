<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\Nota;
use App\Pesanan;
use App\PesananDetail;
use App\user;
use Auth;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $obats = Obat::all();
        return view('transaksi.index',compact('obats'));
    }

    public function indexdet($id){
        $obat = Obat::where('id',$id)->first();
        return view('transaksi.indexdet',compact('obat'));
    }

    public function pesanan(Request $request,$id){
        $latest = Pesanan::latest()->first();

        if (! $latest || !$latest->invoice_number) {
           $invoice_number = 'N0001';
        }
        else{
            $string = preg_replace("/[^0-9\.]/", '', $latest->invoice_number);
            $invoice_number = 'N' . sprintf('%04d', $string+1);
        }

        // Deskripsi ID
        $obat = Obat::where('id',$id)->first();
        $tanggal = Carbon::now();

        // Validasi Apakah Melebihi Stok
        if((int)$request->jumlah_pesanan > (int)$obat->stok_akhir)
        {
            return redirect("transaksi/${id}");
        }

        // Cek Validasi
        $cek_pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // Simpan Ke DB Pesanan
        if(empty($cek_pesanan)){
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->total_harga = 0;
            $pesanan->invoice_number = $invoice_number;
            $pesanan->save();
        }

        // Simpan Ke DB Pesanan Detail
        $pesanan_baru = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        // Cek Pesanan Detail
        $cek_pesanan_detail = PesananDetail::where('obat_id',$obat->id)->where('pesanan_id',
                              $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail)){
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->obat_id = $obat->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->banyak = $request->jumlah_pesanan;
            $pesanan_detail->invoice_number = $cek_pesanan ? $cek_pesanan->invoice_number : $pesanan->invoice_number ;
            $pesanan_detail->jumlah_harga = $obat->hjual*$request->jumlah_pesanan;

            $pesanan_detail->save();
        }
        else{
            $pesanan_detail = PesananDetail::where('obat_id',$obat->id)->where('pesanan_id',$pesanan_baru->id)->first();

            $pesanan_detail->banyak = $pesanan_detail->banyak+$request->jumlah_pesanan;

            // Harga Sekarang
            $harga_pesan_detail_baru = $obat->hjual*$request->jumlah_pesanan;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+ $harga_pesan_detail_baru;
            $pesanan_detail->update();
        }

         //jumlah Total
         $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
         $pesanan->total_harga = $pesanan->total_harga+$obat->hjual*$request->jumlah_pesanan;
         $pesanan->update();
         
         return redirect('transaksi');
    }

    public function check_out(){
        $pesanan = Pesanan::where('user_id',  Auth::user()->id)->where('status',0)->first();
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        else{
            $pesanan_details = PesananDetail::where('pesanan_id',null)->get();
        }

        return view('transaksi.check_out',compact('pesanan','pesanan_details'));
    }

    public function delete($id){
        $pesanan_detail = PesananDetail::where('id',$id)->first();

        $pesanan = Pesanan::where('id' ,$pesanan_detail->pesanan_id)->first();
        $pesanan->total_harga = $pesanan->total_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();

        return redirect('check-out');
    }

    public function konfirmasi(){
        $user = user::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;

        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id',$pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail)
        {
            $obat = Obat::where('id',$pesanan_detail->obat_id)->first();
            $obat->stok_akhir = $obat->stok_awal - $pesanan_detail->banyak;
            $obat->terjual = $obat->stok_awal - $obat->stok_akhir;
            $obat->kas_masuk = $obat->hjual * $obat->terjual;
            $obat->profit = $obat->kas_masuk - ($obat->hbeli * $obat->terjual);
            $obat->update();
        }

        return redirect('history/'.$pesanan_id);
    }



}
