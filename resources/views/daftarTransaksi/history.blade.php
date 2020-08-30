@extends('layout')
@section('title','Daftar Transaksi')
@section('content')
    <div class="container">
        <h2>Daftar Transaksi</h2>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <a href="{{ route('cetak-index') }}" target="_blank" class="btn btn-info mb-3">Cetak Data <i class="fas fa-print" ></i></a>
            </div>
        </div>

        <table class="table table-striped" id="myTable">
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
                        <a href="{{ url('history') }}/{{ $pesanan->id}}" class="btn btn-primary">
                        <i class="fa fa-info"></i> Detail Pesanan</a>
                        </td>
                        <!--td>
                            <form action="{{ url('history') }}/{{ $pesanan->id}}" method="post">
                                  @csrf
                                  {{ method_field('DELETE')}}
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Pesanan? ');"><i class="fa fa-trash"></i></button>
                              </form>
                        </td-->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection