@extends('layouts.main')
@section('content')
    <div class="container d-flex justify-content-center register mt-3">
        <div class="card card-form my-5 px-3">
            <div class="card-body px-2" style="width: 400px;">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('assets/images/logo-wk.png') }}" style="width:5rem; height:5rem; margin-right:10px;"
                        alt="Logo">
                    <div class="ms-2 mt-2">
                        <h3 class="card-title fw-bold text-center">Registrasi</h3>
                        <p class="card-subtitle text-center fw-bold pb-3 text-muted">Wikrama Book</p>
                    </div>
                </div>
                <hr>
                <form action="{{ route('register-store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Lengkap">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email Aktif">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="address" class="form-label">Domisili</label>
                            <input type="text" name="address" class="form-control" placeholder="Masukkan Domisili">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="phone" class="form-label">Nomor Handphone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Contoh: 08-----------">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="/" class="me-2 btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
