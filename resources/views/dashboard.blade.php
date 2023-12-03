@extends('layouts.core.content')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProducts }}</h3>

                    <p>Jumlah semua produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('produk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalCategories }}</h3>

                    <p>Jumlah kategori produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('produk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>Rp. {!! number_format($totalPrice, 0, ',', '.') !!}</h3>

                    <p>total harga semua produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign    "></i>
                </div>
                <a href="{{ route('produk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalStock }}</h3>

                    <p>Jumlah stok semua produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('produk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Chart Produk - <strong>Column</strong></h3>
                </div>
                <div class="card-body">
                    <div id="product"></div>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Chart Produk Berdasarkan Ketegori - <strong>Pie</strong></h3>
                </div>
                <div class="card-body">
                    <div id="categories"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
