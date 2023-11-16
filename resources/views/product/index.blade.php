@extends('layouts.core.main')
@section('title', 'Data Produk')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('tambah-produk') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i>
                        Tambah Data Produk</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table table-striped table-head-fixed" id="data-produk" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Kategori ID</th>
                                <th class="text-center">Kode Produk</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Diskon</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $data)
                                <tr>
                                    <td style="vertical-align: middle" class="text-center">{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('assets/img/' . $data->image) }}" width="100" height="150"></td>
                                    <td style="vertical-align: middle" class="text-center">{{ $data->category_id }}</td>
                                    <td style="vertical-align: middle" class="text-center">{{ $data->product_code }}</td>
                                    <td style="vertical-align: middle">{{ $data->product_name }}</td>
                                    <td class="text-wrap">{{ Str::limit($data->description, 50, '...') }}</td>
                                    <td style="vertical-align: middle">Rp. {!! number_format($data->price, 0, ',', '.') !!}</td>
                                    <td style="vertical-align: middle" class="text-center">{{ $data->unit }}</td>
                                    <td style="vertical-align: middle">Rp. {!! number_format($data->discount_amount, 0, ',', '.') !!}</td>
                                    <td style="vertical-align: middle" class="text-center">{{ $data->stock }}</td>
                                    <td style="vertical-align: middle">
                                        <div class="d-flex">
                                            <a href="{{ route('edit-produk', Crypt::encrypt($data->id)) }}" class="btn btn-sm btn-warning mr-1"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('hapus-produk', Crypt::encrypt($data->id)) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data produk ini?')"><i
                                                    class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
