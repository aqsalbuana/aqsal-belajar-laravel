@extends('layouts.core.content')
@section('title', 'Tambah Produk')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-edit"></i> Form input produk</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('simpan-produk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_code">Kode Produk <sup class="text-danger">(otomatis)</sup></label>
                            <input type="text" class="form-control-plaintext" name="product_code"
                                value="{{ $productCode }}" id="product_code" readonly>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="product_name">Nama Produk</label>
                                <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                    name="product_name" id="product_name" autofocus value="{{ old('product_name') }}">
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
                                    @if (count($categories) < 0)
                                        <option selected disabled>-- Kategori Masih Kosong. --</option>
                                    @else
                                    <option selected disabled>-- Pilih Kategori --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    @endif
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
                                    name="stock" id="stock" value="{{ old('stock') }}">
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
                                        value="{{ old('price') }}">
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
                                    <option selected disabled>- Pilih Satuan Unit</option>
                                    <option value="PCS">PCS</option>
                                    <option value="LBR">LBR</option>
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
                                    <input type="text" class="form-control" value="{{ old('discount_amount') }}"
                                        name="discount_amount" id="discount_amount">
                                </div>
                                @error('discount_amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea
                                class="form-control @error('description')
                                    is-invalid
                                @enderror"
                                rows="3" name="description" id="description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('produk') }}" class="btn btn-sm btn-secondary"><i
                                class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
