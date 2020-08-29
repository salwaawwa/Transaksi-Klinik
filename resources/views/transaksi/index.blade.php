@extends('layout')
@section('title','Transaksi')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Transaksi</h2>
            </div>
            <div class="col-md-6">
                <?php
                $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->first();
                if(!empty($pesanan_utama))
                {
                    $notif = \App\PesananDetail::where('pesanan_id',$pesanan_utama->id)->
                    count();
                }
                ?>
                    <a class="nav-link" href="{{ url('check-out') }}">
                        <i class="fa fa-shopping-cart"></i> 
                        @if(!empty($notif))
                            <span class="badge badge-pill badge-danger">{{$notif}}</span>
                        @endif
                    </a>       
            </div>
        </div>
        
        <hr>

        <table  class="table table-striped" id="myTable">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama Tindakan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            @foreach($obats as $obat)
                <tr align="left">
                    <td align="center">{{$no++}}</td>
                    <td>{{$obat->nama_obat}}</td>
                    <td>Rp. {{number_format($obat->hjual)}}</td>
                    <td>{{$obat->stok_akhir}}</td>
                    <td align="center">
                        <a href="{{ url('transaksi') }}/{{ $obat->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection