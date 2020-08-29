@extends('layout')
@section('title','Daftar Transaksi')
@section('content')
    <div class="container">
        <h2>Daftar Transaksi</h2>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No.Transaksi</th>
                    <th>Tanggal</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                @foreach($pesanans as $pesanan)
                    <tr>
                        <td> {{ $no++ }} </td>
                        <td> {{ $pesanan->invoice_number}} </td>
                        <td> {{ $pesanan->tanggal }}</td> 
                        <td> Rp. {{ number_format($pesanan->total_harga)}} </td>
                        <td> 
                            @if($pesanan->status == 1)
                                Selesai
                            @else
                                Belum Selesai
                            @endif
                        </td>
                        <td>
                        <a href="#" class="btn btn-primary">
                        <i class="fa fa-info"></i> Detail Pesanan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection