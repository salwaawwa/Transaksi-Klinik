@extends('layout1')
@section('title','Transaksi')
@section('content')
    @section('back')
        <a href="{{ url('transaksi')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
    @endsection
    <div class="container">

        <div class="card" style="width: 67rem;">
            <div class="card-header">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="p-5">
                        <H2 align="center" class="mb-4"> {{ $obat->nama_obat }}</H2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td> Harga </td>
                                        <td>   :   </td>
                                        <td> Rp. {{number_format($obat->hjual)}}</td>
                                    </tr>
                                    <tr>
                                        <td> Stok Awal </td>
                                        <td>   :   </td>
                                        <td>{{ $obat->stok_awal }}</td>
                                    </tr>
                                    <tr>
                                        <td> Terjual </td>
                                        <td>   :   </td>
                                        <td>{{ $obat->terjual }}</td>
                                    </tr>
                                    <tr>
                                        <td> Stok Akhir </td>
                                        <td>   :   </td>
                                        <td>{{ $obat->stok_akhir }}</td>
                                    </tr>
                                    <tr>
                                        <td> Jumlah Pesanan</td>
                                        <td>  :  </td>
                                        <td> 
                                            <form action="{{ url('transaksi') }}/{{ $obat->id }}" method="post">
                                            @csrf
                                                <input type="text" name="jumlah_pesanan" class="form-control" 
                                                required="" placeholder="Jumlah Pesanan" autocomplete="off" autofocus>
                                                <!-- Button Masukkan Keranjang -->
                                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart">
                                                </i> Masukkan Keranjang </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>   
        </div>
   </div>
@endsection