@extends('layout1')
@section('title','Edit Data Tindakan')
@section('content')
    @section('back')
        <a href="{{ url('dataTindakan')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
    @endsection
    <div class="container">
        <h1>Edit Tindakan</h1>
        <hr>

        <div class="card" style="width: 67rem;">
            <div class="card-header">
                <form  action="{{ url('dataTindakan') }}/{{ $obat->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                                <label for="nama_obat">Nama Tindakan</label>
                                <input type="text" class="form-control" name="nama_obat" placeholder="Nama Tindakan/Obat" value="{{$obat->nama_obat}}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hbeli">Harga Beli</label>
                                        <input type="text" class="form-control" name="hbeli" placeholder="Harga Beli" value="{{$obat->hbeli}}" required>
                                    </div>		
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hjual">Harga Jual</label>
                                        <input type="text" class="form-control" name="hjual" placeholder="Harga Jual" value="{{$obat->hjual}}" required>
                                    </div>		
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stok_awal">Stok Awal</label>
                                        <input type="text" class="form-control" name="stok_awal" placeholder="Stok Awal" value="{{$obat->stok_awal}}" required>
                                    </div>		
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="terjual">Terjual</label>
                                        <input type="text" class="form-control" name="terjual" placeholder="Terjual" value="{{$obat->terjual}}" required>
                                    </div>		
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stok_akhir">Stok Akhir</label>
                                        <input type="text" class="form-control" name="stok_akhir" placeholder="Stok Akhir" value="{{$obat->stok_akhir}}" required>
                                    </div>		
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kas_masuk">Kas Masuk</label>
                                <input type="text" class="form-control" name="kas_masuk" placeholder="Kas Masuk" value="{{$obat->kas_masuk}}" required>
                            </div>
                            <div class="form-group">
                                <label for="profit">Profit</label>
                                <input type="text" class="form-control" name="profit" placeholder="Profit" value="{{$obat->profit}}" required>
                            </div>  
                    <button type="submit" class="btn btn-primary mb-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection