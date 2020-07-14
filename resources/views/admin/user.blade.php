@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Master Data User</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master data User</li>
                </ol>
            </div>
        </div>
    </div>
</div>




<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">User</strong>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="user-table" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <td align="center"><strong>Action</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $p)
                                        <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>
                                            <a href="#">Edit</a>
                |
                                            <a href="#">Hapus</a>
                                        </td>
                                        @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         


        <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Insert User Baru</strong>
                                <div class="nav nav-pills pull-right">
                                    <form action="#">
                                        <input type="submit" class="btn btn-primary" value="Tambah User" />
                                    </form>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                        <div class="col-md-6 float-left">
                        @csrf
                        <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">
                        </div>
        
        
                        <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">
                        </div>



                        <div class="form-group">
                        <label for="alamat">Password</label>
                        <input type="password" class="form-control" id="alamat" placeholder="" name="alamat" value="{{old('alamat')}}">
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

@endsection
