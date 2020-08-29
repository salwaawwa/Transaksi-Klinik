@extends('layout')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <h2>Dashboard</h2>
        <hr>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-table fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <h3>Data Tindakan</h3>
                            </div>
                        </div>
                        
                        <a href="dataTindakan" class="btn btn-primary mt-3">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-shopping-cart fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <h3>Transaksi</h3>
                            </div>
                        </div>
                        
                        <a href="transaksi" class="btn btn-primary mt-3">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 22rem;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <i class="fa fa-history fa-3x"></i>
                            </div>
                            <div class="col-md-9">
                                <h3>Daftar Transaksi</h3>
                            </div>
                        </div>
                        
                        <a href="history" class="btn btn-primary mt-3">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
