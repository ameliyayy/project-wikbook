@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Dashboard</div>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Hi, {{ auth()->user()->name }}!</h3>
            <div class="section-lead">Selamat Datang!</div>
            <div class="alert alert-primary mt-3" role="alert">
                Silahkan mengecek data user beserta buku
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
