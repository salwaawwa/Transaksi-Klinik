@extends('layout')
@section('title','Data Tindakan')
@section('content')
    <div class="container">
        <h2>Data Tindakan</h2>
        <hr>

        <div class="row">
            <div class="col-md-6">
                <a href="dataTindakan/create" class="btn btn-primary mb-3">Tambah Tindakkan <i class="fas fa-plus-square" ></i></a>
                <a href="{{ route('cetak-tindakan') }}" target="_blank" class="btn btn-info mb-3">Cetak Data <i class="fas fa-print" ></i></a>
            </div>
        </div>

        <table  class="table table-striped" id="myTable">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Nama Tindakan</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok Awal</th>
                    <th>Terjual</th>
                    <th>Stok Akhir</th>
                    <th>Kas masuk</th>
                    <th>Profit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            @foreach($obats as $obat)
                <tr align="left">
                    <td>{{$no++}}</td>
                    <td>{{$obat->nama_obat}}</td>
                    <td>Rp. {{number_format($obat->hbeli)}}</td>
                    <td>Rp. {{number_format($obat->hjual)}}</td>
                    <td>{{$obat->stok_awal}}</td>
                    <td>{{$obat->terjual}}</td>
                    <td>{{$obat->stok_akhir}}</td>
                    <td>Rp. {{number_format($obat->kas_masuk)}}</td>
                    <td>Rp. {{number_format($obat->profit)}}</td>
                    <td>
                        <form action="{{ url('dataTindakan') }}/{{ $obat->id}}" method="post">
                            <a href="{{ url('dataTindakan') }}/{{ $obat->id}}/{{'edit'}}" class="btn btn-success btn-sm" ><i class="fa fa-edit sm"></i></a>
                            @csrf
                            {{ method_field('DELETE')}}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Data? ');"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection