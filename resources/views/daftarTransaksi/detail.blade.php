@extends('layout1')
@section('title','Daftar Transaksi')
@section('content')
    @section('back')
        <a href="{{ url('history')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali </a>
    @endsection
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
                <p>Medan, {{$pesanan->tanggal}}<br>
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
                      </tr>
                  @endforeach
                      <tr>
                          <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                          <td align="left"> Rp. {{ number_format($pesanan->total_harga)}} </td>
                      </tr>
                </tbody>
            </table>
          </div>
        </div>
      </div>
          <a style="margin-left:840px;" href="#" class="btn btn-success mt-2" onclick="return confirm('Cetak Struk? ');">
              <i class="fa fa-print">Cetak</i>
          </a>
        @endif
    </div>
  </div>
</div>
@endsection