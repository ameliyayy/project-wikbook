@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-user') }}" style="text-decoration: none;">Users</a>
                </div>
                {{-- <div class="breadcrumb-item">Users</div> --}}
            </div>
        </div>
        <div class="section-body">
            <table id="data-admin" class="table" style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">No Handphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($user2 as $users)
                        @if ($users->roles == 'User')
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $users['name'] }}</td>
                                <td>{{ $users['address'] }}</td>
                                <td>0{{ $users['phone'] }}</td>
                                <td>{{ $users['email'] }}</td>
                                <td>
                                    <button type="submit" class="btn btn-warning m-1" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Edit</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data User
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('user-update') }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        {{-- <input type="hidden" name="id" id="id" value="{{ $user['id'] }}"> --}}
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ $users['name'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" value="{{ $users['address'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">No Handphone</label>
                                                            <input type="number" class="form-control" id="phone"
                                                                name="phone" value="0{{ $users['phone'] }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" id="email"
                                                                name="email" value="{{ $users['email'] }}">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-warning">Edit Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal End -->

                                    <form action="{{ route('user-delete') }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
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
