@extends('layouts.main')
@section('content')
    <div class="container d-flex justify-content-center register" style="margin-top: 5rem;">
        <div class="card card-form my-5 px-3">
            <div class="card-body px-2" style="width: 400px;">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/images/logo-wk.png') }}" style="width:5rem; height:5rem; margin-right:10px;"
                        alt="Logo">
                    <div class="ms-2 mt-2">
                        <h3 class="card-title fw-bold text-center">Login</h3>
                        <p class="card-subtitle text-center fw-bold pb-3 text-muted">Wikrama Book</p>
                    </div>
                </div>
                <hr>
                <form action="{{ route('login-store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="form-group">
                            <i class="bi bi-person-fill me-1"></i>
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Masukkan Email Terdaftar">
                            @error('email')
                                <p class="text-danger fw-bold mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <i class="bi bi-eye-slash-fill me-1"></i>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukkan Password Terdaftar">
                            @error('password')
                                <p class="text-danger fw-bold mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="form-group">
                            <p class="form-label">Belum memiliki akun? <a href="{{ route('register') }}"
                                    class="text-decoration-none">Register disini</a></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="/" class="me-2 btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    @if (session('error'))
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Masukan Email dan Password dengan benar!',
                            })
                        </script>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
