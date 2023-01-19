@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-dashboard') }}" style="text-decoration: none;">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Category</div>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Category
                <a style="float: right; margin-right: 2%" id="button" class="btn btn-primary mr-1 text-white">Add Category
                </a>
            </h3>
            <p class="section-lead">Silahkan klik untuk menambahkan category di form berikut</p>
            <form action="{{ route('category-store') }}" method="post" enctype="multipart/form-data" class="form" id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="">
                                        <label class="form-label">Category Name</label>
                                        <input class="form-control" name="category" class="form-control">
                                    </div>
                                    <div class="row align-items-start mt-3">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Add Category" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="/admin/category/update/{{ $ctgr2['id'] }}" method="post" class="form" id="gatau">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="">
                                        <label class="form-label">Category Name</label>
                                        <input class="form-control" name="category" class="form-control" value="{{ $ctgr2['category'] }}">
                                    </div>
                                    <div class="row align-items-start mt-3">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Edit Category" class="btn btn-block btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <table id="data-admin" class="table" style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($ctgr as $item)
                    {{-- @if ($users->roles == 'User') --}}
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['category'] }}</td>
                        {{-- <td class="active">
                                <a href="" style="text-decoration: none;" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Lihat</a>
                            </td> --}}

                        <!-- Modal -->
                        {{-- @foreach ($book as $book2) --}}


                        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cover Buku
                                                {{ $books['title'] }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('assets/cover/' . $books->cover) }}" width="450px"
                                                alt="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button> --}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        {{-- </div>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- @endforeach --}}

                        <td>
                            <a id="apaaja" type="submit" class="btn btn-warning m-1">Edit</a>

                            <!-- Modal -->
                            {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data Buku
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="..." method="post">
                                                    @csrf
                                                    @method('PATCH') --}}
                            {{-- <input type="hidden" name="id" id="id" value="{{ $user['id'] }}"> --}}
                            {{-- <div class="form-group">
                                                        <label for="name">Category</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option selected disabled>Select Book Category</option>
                                                            @foreach ($book as $books)
                                                                <option value="{{ $books['category'] }}">
                                                                    {{ $books['category'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Title</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $books['title'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="address">Writer</label>
                                                        <input type="text" class="form-control" id="address"
                                                            name="address" value="{{ $books['writer'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Publisher</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            name="phone" value="{{ $books['publisher'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">ISBN</label>
                                                        <input type="number" class="form-control" id="email"
                                                        name="email" value="{{ $books['ISBN'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Synopsis</label>
                                                        <input type="text" class="form-control" id="phone"
                                                            name="phone" value="{{ $books['synopsis'] }}">
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">Edit Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            <!-- Modal End -->

                            <form action="/admin/category/delete/{{ $ctgr2['id'] }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="/admin/category/delete/{{ $ctgr2['id'] }}" class="btn btn-danger ml-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                    {{-- @endif --}}
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

        $(document).ready(function() {
            $("#form").hide();
            $("#button").click(function() {
                $('#form').toggle();
            });
        });

        $(document).ready(function() {
            $("#gatau").hide();
            $("#apaaja").click(function() {
                $('#gatau').toggle();
            });
        });
    </script>
@endsection
