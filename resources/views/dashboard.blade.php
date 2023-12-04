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
    <div class="row">
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProducts }}</h3>

                    <p>Produk</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('produk') }}" class="small-box-footer">Lihat Detail <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>

                    <p>Kustomer</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>0</h3>

                    <p>Penjual</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
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
