@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Verifikasi Pembayaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-users') }}" style="text-decoration: none;">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Verifikasi Pembayaran</div>
            </div>
        </div>
        <div class="section-body">
            <table id="data-admin" class="table table-striped table-bordered table-md"
                style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Registrasi</th>
                        <th>Nama</th>
                        <th>Bukti Pembayaran</th>
                        <th>Detail Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $student['id'] }}</td>
                        <td>{{ $student['name'] }}</td>
                        <td class="active">
                            <a href="{{ route('admin-detailpayment') }}" style="text-decoration: none;">Lihat</a>
                        </td>
                        <td class="active">
                            <a href="{{ route('admin-detailregister') }}" style="text-decoration: none;">Detail</a>
                        </td>
                        <td>
                            @if ($pay['status'] == 'Pending')
                                <form action="{{ route('admin-validate') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success m-1">Validasi</button>
                                </form>
                                <form action="{{ route('admin-denied') }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger ml-1">Tolak</button>
                                </form>
                            @elseif ($pay['status'] == 'Success')
                                <p class="text-success">Di Terima</p>
                            @else
                                <p class="text-danger">Di Tolak</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-admin').DataTable({
                "iDisplayLength": 25
            });
        });
    </script>
@endsection
