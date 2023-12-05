@extends('layouts.auth.auth')
@section('title', 'Register')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">Register</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Buat akun baru</p>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('proses-register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control @error('username')
                          is-invalid
                        @enderror"
                            placeholder="Username" name="username" value="{{ old('username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control @error('name')
                          is-invalid
                        @enderror"
                            placeholder="Nama lengkap" name="name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control @error('phone_number')
                          is-invalid
                        @enderror"
                            placeholder="Nomer HP" name="phone_number" value="{{ old('phone_number') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="text"
                            class="form-control @error('email')
                          is-invalid
                        @enderror"
                            placeholder="Email" name="email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control @error('password')
                          is-invalid
                        @enderror"
                            placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password"
                            class="form-control @error('password_confirmation')
                          is-invalid
                        @enderror"
                            placeholder="Konfirmasi password" name="password_confirmation">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block"><i
                                    class="fas fa-check fa-sm fa-fw"></i> Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <div class="text-center mt-2"><a href="{{ route('login') }}" class="text-center">Sudah punya akun? login
                        disini.</a></div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
