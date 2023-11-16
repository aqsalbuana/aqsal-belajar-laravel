@extends('layouts.core.content')
@section('title', 'Edit Produk')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Form edit produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('update-produk', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_code">Kode Produk</label>
                            <input type="text" class="form-control-plaintext" name="product_code"
                                value="{{ $product->product_code }}" id="product_code" readonly>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    name="product_name" id="product_name" autofocus value="{{ $product->product_name }}">
                                @error('product_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="category_id">Kategori</label>
                                <select
                                    class="custom-select form-control-border border-width-2 @error('category_id')
                                    is-invalid
                                @enderror"
                                    name="category_id" id="category_id">
                                    <option disabled>-- Pilih Kategori --</option>
                                    <option value="1" {{ $product->category_id == "1" ? "selected" : "" }}>Poster A3</option>
                                    <option value="2" {{ $product->category_id == "2" ? "selected" : "" }}>Poster A4</option>
                                    <option value="3" {{ $product->category_id == "3" ? "selected" : "" }}>Poster A5</option>
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="stock">Stok</label>
                                <input type="text"
                                    class="form-control @error('stock')
                                    is-invalid
                                @enderror"
                                    name="stock" id="stock" value="{{ $product->stock }}">
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="price">Harga</label>
                                <div
                                    class="input-group @error('price')
                                    is-invalid
                                @enderror">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" name="price" id="price"
                                        value="{{ $product->price }}">
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="unit">Satuan</label>
                                <select
                                    class="custom-select form-control-border border-width-2 @error('unit')
                                    is-invalid
                                @enderror"
                                    name="unit" id="unit">
                                    <option disabled>- Pilih Satuan Unit</option>
                                    <option value="PCS" {{ $product->unit == "PCS" ? "selected" : "" }}>PCS</option>
                                    <option value="LBR" {{ $product->unit == "LBR" ? "selected" : "" }}>LBR</option>
                                </select>
                                @error('unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-4">
                                <label for="discount_amount">Diskon</label>
                                <div
                                    class="input-group @error('discount_amount')
                                    is-invalid
                                @enderror">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $product->discount_amount }}"
                                        name="discount_amount" id="discount_amount">
                                </div>
                                @error('discount_amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-2 text-center text-lg-left mb-lg-0 mb-2">
                                <img src="{{ asset('assets/img/' . $product->image) }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-lg-10">
                                <label for="image">Gambar <sup class="text-danger">(png,jpg,jpeg | 1MB)</sup></label>
                            <div
                                class="input-group @error('image')
                            is-invalid
                            @enderror">
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea
                                class="form-control @error('description')
                                    is-invalid
                                @enderror"
                                rows="3" name="description" id="description">{{ $product->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Perbarui</button>
                        <a href="{{ route('produk') }}" class="btn btn-sm btn-secondary"><i
                                class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
