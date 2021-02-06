@extends('admin.layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">List Companies</h3>
                @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <a id="modal-70385" href="#modal-container-70385" role="button" class="btn btn-success"
                    data-toggle="modal">Tambah Data</a>

                <div class="modal fade" id="modal-container-70385" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel">
                                    Data Companies
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/companies/create" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="name" class="form-control" placeholder="Isi Nama">
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Isi Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="Isi Website">
                                    </div>

                            </div>
                            <div class="modal-footer">

                                <input type="submit" class="btn btn-success" value="Save">
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>

                    </div>

                </div>


                {{-- tabel --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->website }}</td>
                                        <td>
                                            <a href="#editModal{{ $item->id }}" class="btn btn-warning btn-sm"
                                                data-toggle="modal" data-target="#editModal{{ $item->id }}"><span
                                                    class="font-weight-bold ml-1">Edit</span></a>
                                            <a href="/admin/companies/delete/{{ $item->id }}"
                                                class="btn btn-danger btn-sm delete"><span
                                                    class="font-weight-bold ml-1">Hapus</span></a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal{{ $item->id }}" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Data Companies
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/companies/update" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">Nama</label>
                                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $item->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                            value="{{ $item->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Website</label>
                                                            <input type="text" name="website" class="form-control"
                                                            value="{{ $item->website }}">
                                                        </div>

                                                </div>
                                                <div class="modal-footer">

                                                    <input type="submit" class="btn btn-success" value="Save">
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
