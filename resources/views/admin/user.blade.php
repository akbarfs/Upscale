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
                                            <a href="/admin/masterdata/user/edit/{{ $p->id }}" class="btn btn-danger btn-sm tb">Edit</a>
                |
                                            <a href="/admin/masterdata/user/delete/{{ $p->id }}" class="btn btn-success btn-sm tb">Hapus</a>
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


        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Insert User Baru</strong>
                                 <form style="margin:0; padding: 0" method="post" action="/admin/masterdata/user/useradd">
                                    {{ csrf_field() }}
                                <div class="nav nav-pills pull-right">
                                    
                                        <input type="submit" class="btn btn-primary" value="Tambah User" />
                                    
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


                        @if($errors->has('nama'))
                        <div class="alert alert-danger">{{ $errors->first('nama') }}</div>
                        @endif
        
        
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">
                        </div>


                        @if($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif

                         <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="" value="{{old('username')}}">
                        </div>


                        @if($errors->has('username'))
                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                        @endif


                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="" name="password" value="{{old('password')}}">
                        </div>


                        @if($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif


                         <div class="form-group">
                        <label for="confirmpass">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpass" placeholder="" name="confirmpass" value="">
                        </div>

                         @if($errors->has('confirmpass'))
                        <div class="alert alert-danger">{{ $errors->first('confirmpass') }}</div>
                        @endif



                        </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>


</div>

@endsection
