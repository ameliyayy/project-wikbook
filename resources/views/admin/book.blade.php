@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Buku</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-dashboard') }}" style="text-decoration: none;">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Book</div>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Book
                <a style="float: right; margin-right: 2%" id="button" class="btn btn-primary mr-1 text-white">Tambah Data
                </a>
            </h3>
            <p class="section-lead">Silahkan klik untuk menambahkan data buku di form berikut</p>
            <form action="{{ route('book-store') }}" method="post" enctype="multipart/form-data" class="form"
                id="form">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Create Book</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">Writer</label>
                                        <input type="text" name="writer" class="form-control">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">No. ISBN</label>
                                        <input type="text" name="ISBN" class="form-control">
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Publisher</label>
                                        <input type="text" name="publisher" class="form-control">
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Category</label>
                                        <select class="form-select form-control" name="category"
                                            aria-label="Default select example">
                                            <option selected disabled>Select a category</option>
                                            <option value="Novel">Novel</option>
                                            <option value="Fiksi">Fiksi</option>
                                            {{-- @foreach ($ctg as $ctgr)
                                                <option value="{{ $ctgr['category'] }}">{{ $ctgr['category'] }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Cover Book</label>
                                        <input type="file" name="cover" class="form-control" id="inputGroupFile04">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Synopsis</label>
                                        <textarea name="synopsis" class="form-control" id="" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="row align-items-start mt-3">
                                        <div class="col-sm-8"></div>
                                        <div class="col-sm-4">
                                            <input type="submit" value="Upload Data Buku"
                                                class="btn btn-block btn-primary">
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
                        <th scope="col">Book ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Writer</th>
                        <th scope="col">Publisher</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Synopsis</th>
                        <th scope="col">Cover Book</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($book as $books)
                        {{-- @if ($users->roles == 'User') --}}
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $books['id'] }}</td>
                            <td>{{ $books['category'] }}</td>
                            <td>{{ $books['title'] }}</td>
                            <td>{{ $books['writer'] }}</td>
                            <td>{{ $books['publisher'] }}</td>
                            <td>{{ $books['ISBN'] }}</td>
                            <td>{{ $books['synopsis'] }}</td>
                            <td class="active">
                                <a href="/admin/book/cover/{{ $books['id'] }}" style="text-decoration: none;">Lihat</a>
                            </td>

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
                                <a href="/admin/book/update/{{ $books['id'] }}">
                                    <button type="submit" class="btn btn-warning m-1">Edit</button>
                                </a>

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
                                                    </div> --}}
                                {{-- <div class="form-group">
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
                                                    </div> --}}

                                {{-- </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning">Edit Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- Modal End -->

                                <form action="/admin/book/delete/{{ $books['id'] }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" href="/admin/book/delete/{{ $books['id'] }}" class="btn btn-danger ml-1">Delete</button>
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
            $(".form").hide();
            $("#button").click(function() {
                $('.form').toggle();
            });
        });
    </script>
@endsection
