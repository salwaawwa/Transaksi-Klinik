<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use Auth;

class TindakanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $obats = Obat::all();
        return view('dataTindakan.datatindakan',compact('obats'));
    }

    public function create(){
        return view('dataTindakan.create');
    }

    public function store(Request $req){
        $obat = new Obat;
        $obat->nama_obat = $req->input('nama_obat');
        $obat->hbeli = $req->input('hbeli');
        $obat->hjual = $req->input('hjual');
        $obat->stok_awal = $req->input('stok_awal');
        $obat->terjual = $req->input('terjual');
        $obat->stok_akhir = $req->input('stok_akhir');
        $obat->kas_masuk = $req->input('kas_masuk');
        $obat->profit = $req->input('profit');
        $obat->save();

        return redirect()->route('dataTindakan.index');
    }

    public function show(){
        //
    }

    function edit($id){
        $obat = Obat::find($id);
        return view('dataTindakan.edit',compact('obat'));
    }

    function update($id,request $req){
        $obat = Obat::find($id);
        $obat->nama_obat = $req->input('nama_obat');
        $obat->hbeli = $req->input('hbeli');
        $obat->hjual = $req->input('hjual');
        $obat->stok_awal = $req->input('stok_awal');
        $obat->terjual = $req->input('terjual');
        $obat->stok_akhir = $req->input('stok_akhir');
        $obat->kas_masuk = $req->input('kas_masuk');
        $obat->profit = $req->input('profit');
        $obat->update();

        return redirect()->route('dataTindakan.index');
    }

    public function destroy($id){
        $obat = Obat::where('id',$id)->first();

        $obat->delete();

        return redirect()->route('dataTindakan.index');
    }
}
