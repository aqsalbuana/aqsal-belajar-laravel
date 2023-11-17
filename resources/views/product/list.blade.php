@extends('layouts.core.content')
@section('title', 'List Produk')
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
        </div>
    </div>
    <div class="row">
        @if (count($products) > 0)
            @foreach ($products as $data)
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1 mr-2">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="font-weight-bold">Kode Produk</td>
                                            <td></td>
                                            <td>{{ $data->product_code }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Nama produk</td>
                                            <td></td>
                                            <td>{{ $data->product_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Kategori</td>
                                            <td></td>
                                            <td>{{ $data->category_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Harga</td>
                                            <td></td>
                                            <td>Rp. {!! number_format($data->price, 0, '.', ',') !!} / {{ $data->unit }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Stok</td>
                                            <td></td>
                                            <td>{{ $data->stock }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('assets/img/' . $data->image) }}" width="150px" height="200px"
                                        class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-lg-12">
                <div class="callout callout-danger">
                    <h5>Oops!</h5>

                    <p>Produk masih tidak tersedia untuk sekarang. Silahkan kembali lagi nanti.</p>
                </div>
            </div>
        @endif
    </div>
    {{-- <div class="pagination justify-content-center mt-5">
        {{ $products->links() }}
    </div> --}}
@endsection
