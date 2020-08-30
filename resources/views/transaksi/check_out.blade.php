@extends('layout')
@section('title','Transaksi')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="p-5">
          @if(!empty($pesanan))
              <div class="row">
                <div class="col-md-6">
                    <h4>KLINIK SPESIALIS UROLOGI</h4>
                    <h6>dr. Ginanda Putra Siregar, SpU</h6>
                </div>
                <div class="col-md-6">
                <p style="padding-left:190px;">Medan, {{$pesanan->tanggal}}<br>
                   Kepada Yth : <br>
                   No. Nota : {{$pesanan->invoice_number}}
                </p>
                </div>
              </div>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Tindakan/Obat</th>
                        <th>Harga Satuan</th>
                        <th>Banyaknya</th>
                        <th>Jumlah</th>
                        <th> Aksi </th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($pesanan_details as $pesanan_detail)
                      <tr>
                          <td align="center"> {{ $no++ }} </td>
                          <td> {{ $pesanan_detail->obat->nama_obat}}</td>
                          <td align="left"> Rp. {{ number_format($pesanan_detail->obat->hjual)}} </td>
                          <td align="center"> {{ $pesanan_detail->banyak}} </td>
                          <td align="left"> Rp. {{ number_format($pesanan_detail->jumlah_harga)}} </td>
                          <td>
                              <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                  @csrf
                                  {{ method_field('DELETE')}}
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Akan Menghapus Pesanan? ');"><i class="fa fa-trash"></i></button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                      <tr>
                          <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                          <td align="left"> Rp. {{ number_format($pesanan->total_harga)}} </td>
                          <td>
                              <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda Yakin Akan CheckOut Pesanan? ');">
                                  <i class="fa fa-shopping-cart">CheckOut</i>
                              </a>
                          </td>
                      </tr>
                </tbody>
            </table>
          </div>
        </div>
        @endif
      </div>

    </div>

  </div>
</div>
@endsection