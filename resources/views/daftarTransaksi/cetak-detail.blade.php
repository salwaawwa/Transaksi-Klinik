<html>
    <head>
        <title> Cetak Nota </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
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
                    <tr align="center">
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
            <div class="row">
              <div class="col-md-6">
              
              </div>
              <div align="center" class="col-md-6 mt-3">
                <h6>Hormat Kami,</h6>
                <br>
                <br>
                <br>
                <p> {{ Auth::user()->name }}</p>
              </div>
            @endif
            </div>
          </div>
        </div>
</div>

        <script type="text/javascript">
            window.print();
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>