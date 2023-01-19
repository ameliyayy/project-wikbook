@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-user') }}" style="text-decoration: none;">Users</a>
                </div>
                <div class="breadcrumb-item">Edit User</div>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Users
                <a href="{{ route('admin-user') }}" style="float: right; margin-right: 2%" id="button"
                    class="btn btn-primary mr-1 text-white">Kembali
                </a>
            </h3>
            <p class="section-lead">Silahkan klik untuk mengubah data user di form berikut</p>
            <form action="/admin/user/update/store/{{ $user['id'] }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    {{-- @foreach ($user as $users) --}}
                                    <div class="col-sm-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user['name'] }}">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select form-control" name="status"
                                            aria-label="Default select example">
                                            <option selected disabled>Select a status</option>
                                            {{-- @foreach ($user as $users) --}}
                                            <option value="{{ $user['status'] }}">{{ $user['status'] }}</option>
                                            {{-- @endforeach --}}
                                            {{-- <option value="Member">Member</option> --}}
                                            {{-- @foreach ($ctg as $ctgr)
                                            <option value="{{ $ctgr['category'] }}">{{ $ctgr['category'] }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mt-3 col-sm-6">
                                        <label class="form-label">No Handphone</label>
                                        <input type="number" name="phone" class="form-control"
                                            value="0{{ $user['phone'] }}">
                                    </div>
                                    <div class="mt-3 col-sm-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user['email'] }}">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" id="" cols="30" rows="10">{{ $user['address'] }}</textarea>
                                    </div>
                                    <div class="row align-items-start mt-3">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Edit User" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
