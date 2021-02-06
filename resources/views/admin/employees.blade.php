@extends('admin.layouts.app-admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">List Employees</h3>
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
                                    Data Employees
                                </h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/employees/create" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="Isi Nama Depan">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Isi Nama Belakang">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Company</label>
                                        <select name="company" class="form-control">
                                            <option value="">-- Pilih Company --</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Isi Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Isi Phone">
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
                        <table  class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->companie->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>
                                            <a href="#editModal{{ $item->id }}" class="btn btn-warning btn-sm"
                                                data-toggle="modal" data-target="#editModal{{ $item->id }}"><span
                                                    class="font-weight-bold ml-1">Edit</span></a>
                                            <a href="/admin/employees/delete/{{ $item->id }}"
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
                                                        Data Employees
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/admin/employees/update" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">First Name</label>
                                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                                            <input type="text" name="first_name" class="form-control"
                                                                value="{{ $item->first_name }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Last Name</label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                value="{{ $item->last_name }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Company</label>
                                                            <select name="company" class="form-control">
                                                                <option value="">-- Pilih Company --</option>
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->id }}" @if ($item->companie->id == $company->id) selected @endif>
                                                                        {{ $company->name }}
                                                                    </option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $item->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Phone</label>
                                                            <input type="number" name="phone" class="form-control"
                                                                value="{{ $item->phone }}">
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
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection
