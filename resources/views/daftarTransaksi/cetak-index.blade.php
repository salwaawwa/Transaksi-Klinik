<html>
    <head>
        <title> Cetak Data Daftar Transaksi </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="form-group mt-4">
            <h5 align="center"><b>Laporan Daftar Transaksi </b></h5>
            <table class="table table-striped mt-4"  align="center" rules="all" border="1px" style="width:95%;">
                <tr align="center">
                    <th>No</th>
                    <th>No. Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Tindakan</th>
                    <th>Harga</th>
                    <th>Banyaknya</th>
                    <th>Jumlah</th>
                </tr>
                <?php $no = 1; ?>
                @foreach($pesanan_details as $cetak)
                <tr>
                    <td align="center">{{$no++}}</td>
                    <td>{{$cetak->invoice_number}}</td>
                    <td>{{$cetak->pesanan->tanggal}}</td>
                    <td>{{$cetak->obat->nama_obat}}</td>
                    <td>Rp. {{number_format($cetak->obat->hjual)}}</td>
                    <td align="center">{{$cetak->banyak}}</td>
                    <td>Rp. {{number_format($cetak->jumlah_harga)}}</td>
                </tr?>
                @endforeach
            </table>
        </div>

        <script type="text/javascript">
            window.print();
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>