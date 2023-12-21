@extends('layouts.core.content')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="callout callout-info">
                <h2>Selamat Datang!</h2>

                <dl class="row">
                    <dt class="col-sm-4">Nama</dt>
                    <dd class="col-sm-8">{{ Auth::user()->name }}</dd>
                    <dt class="col-sm-4">Username</dt>
                    <dd class="col-sm-8">{{ Auth::user()->username }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ Auth::user()->email }}</dd>
                    <dt class="col-sm-4">Nomer telepon</dt>
                    <dd class="col-sm-8">{{ Auth::user()->phone_number }}</dd>
                    <dt class="col-sm-4">Terakhir Login</dt>
                    <dd class="col-sm-8">{{ Auth::user()->last_login_at == null ? '-' : Auth::user()->last_login_at }}</dd>
                </dl>
            </div>
        </div>
    </div>
    @if (Auth::user()->group_id === 1)
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
                    <a href="{{ route('produk') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{ route('produk') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{ route('produk') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
                    <a href="{{ route('produk') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
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
    @endif
@endsection
