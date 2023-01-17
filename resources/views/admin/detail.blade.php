@extends('layouts.master')
@section('content')
    <div class="app-card alert alert-dismissible shadow-sm mb-4 text-black" style="margin-top: 50px; width:500px; margin-left:50px;">
        <p>Detail Pendaftaran siswa: {{ $detail->name }}</p>
        <div>
            <div class="app-card-body p-3 p-lg-4">
                <div class="row gx-5 gy-3">
                    <div class="col-12 col-lg-9">
                        <ul>
                            <li>NISN: {{ $detail->nisn }}</li>
                            <li>Nama Siswa: {{ $detail->name }}</li>
                            <li>Jenis Kelamin: {{ $detail->gender }}</li>
                            <li>Asal Sekolah:{{ $detail->origin_school }}</li>
                            <li>Email: {{ $detail->email }}</li>
                            <li>No HP:{{ $detail->telp }}</li>
                            <li>No HP Ayah:{{ $detail->telp_ayah }}</li>
                            <li>No HP Ibu:{{ $detail->telp_ibu }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('admin-payment') }}"> <button class="btn btn-primary" style="color:white">Kembali</button></a>
    </div>
@endsection
