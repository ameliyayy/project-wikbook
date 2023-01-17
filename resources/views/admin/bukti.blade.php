@extends('layouts.master')
@section('content')
    <div class="app-card alert alert-dismissible shadow-sm mb-4 text-black fw-bold" style="margin-top: 50px; width:500px; margin-left:50px">
        <p style="margin-left: 20px">Bukti Pembayaran {{ $detail['name'] }}</p>
        <div>
            <div class="app-card-body p-3 p-lg-4">
                <div class="row gx-5 gy-3">
                    @foreach ($pay as $pays)
                        <img src="{{ asset('assets/bukti/' . $pays->bukti) }}" width="500px" alt="">
                    @endforeach
                </div>
            </div>
        </div>
        <a href="{{ route('admin-payment') }}"> <button class="btn btn-primary" style="color:white">Kembali</button></a>
    </div>
@endsection
