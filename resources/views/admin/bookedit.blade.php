@extends('layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Book</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin-book') }}" style="text-decoration: none;">Book</a>
                </div>
                <div class="breadcrumb-item">Edit Book</div>
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Book
                <a href="{{ route('admin-book') }}" style="float: right; margin-right: 2%" id="button"
                    class="btn btn-primary mr-1 text-white">Kembali
                </a>
            </h3>
            <p class="section-lead">Silahkan mengubah data buku di form berikut</p>
            <form action="/admin/book/update/store/{{ $book['id'] }}" method="post" enctype="multipart/form-data" class="form">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Book</h4>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $book['title'] }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">Writer</label>
                                        <input type="text" name="writer" class="form-control"
                                            value="{{ $book['writer'] }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label">No. ISBN</label>
                                        <input type="text" name="ISBN" class="form-control"
                                            value="{{ $book['ISBN'] }}">
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Publisher</label>
                                        <input type="text" name="publisher" class="form-control"
                                            value="{{ $book['publisher'] }}">
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Category</label>
                                        <select class="form-select form-control" name="category"
                                            aria-label="Default select example">
                                            <option selected disabled>Select a category</option>
                                            {{-- <option value="Novel">Novel</option>
                                            <option value="Fiksi">Fiksi</option> --}}
                                            <option value="{{ $book['category'] }}">{{ $book['category'] }}</option>
                                            {{-- @foreach ($ctg as $ctgr)
                                                <option value="{{ $ctgr['category'] }}">{{ $ctgr['category'] }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                    <div class="mt-3 col-sm-4">
                                        <label class="form-label">Cover Book</label>
                                        <input type="file" name="cover" class="form-control" id="inputGroupFile04"
                                            value="{{ $book['cover'] }}">
                                    </div>
                                    <div class="mt-3">
                                        <label class="form-label">Synopsis</label>
                                        <textarea name="synopsis" class="form-control" id="" cols="30" rows="10">{{ $book['synopsis'] }}</textarea>
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
