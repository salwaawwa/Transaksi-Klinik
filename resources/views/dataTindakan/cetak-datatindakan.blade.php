<html>
    <head>
        <title> Cetak Data Tindakan </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="form-group mt-4">
            <h5 align="center"><b>Laporan Data Tindakan </b></h5>
            <table class="table table-striped mt-4"  align="center" rules="all" border="1px" style="width:95%;">
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
                </tr>
                <?php $no = 1; ?>
                @foreach($cetakobats as $cetak)
                <tr>
                    <td align="center">{{$no++}}</td>
                    <td>{{$cetak->nama_obat}}</td>
                    <td>Rp. {{number_format($cetak->hbeli)}}</td>
                    <td>Rp. {{number_format($cetak->hjual)}}</td>
                    <td>{{$cetak->stok_awal}}</td>
                    <td align="center">{{$cetak->terjual}}</td>
                    <td>{{$cetak->stok_akhir}}</td>
                    <td>Rp. {{number_format($cetak->kas_masuk)}}</td>
                    <td>Rp. {{number_format($cetak->profit)}}</td>
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