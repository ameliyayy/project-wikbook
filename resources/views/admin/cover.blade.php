@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cover Buku {{ $book['title'] }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-book') }}" style="text-decoration: none;">Book</a>
                </div>
                <div class="breadcrumb-item">Cover Book</div>
            </div>
        </div>
        <div class="section-body">
            <div class="app-card alert alert-dismissible shadow-sm mb-4 text-black fw-bold"
                style="margin-top: 50px; width:500px; margin-left:50px">
                <p style="margin-left: 20px">Writer : {{ $book['writer'] }}</p>
                <div>
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9">
                                <ul>
                                    <li>Title : {{ $book['title'] }}</li>
                                    <li>Category : {{ $book['category'] }}</li>
                                    <li>ISBN : {{ $book['ISBN'] }}</li>
                                    <li>Publisher : {{ $book['publisher'] }}</li>
                                    <li>Synopsis : {{ $book['synopsis'] }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="app-card-body p-3 p-lg-4">
                        <div class="row gx-5 gy-3">
                            <img src="{{ asset('assets/cover/' . $book->cover) }}" width="500px" alt="">
                        </div>
                    </div>
                </div>
                <a href="{{ route('admin-book') }}"> <button class="btn btn-primary" style="color:white">Kembali</button></a>
            </div>
        </div>
    </section>
    {{-- <script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#data-admin').DataTable({
                "iDisplayLength": 25
            });
        });
    </script>
@endsection
