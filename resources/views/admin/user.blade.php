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
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                            {{ session()->get('success') }}
                            </div>
                            @endif

                            @if($errors->any())
                             <div class="alert alert-danger">Insert Data Error</div>
                            @endif
                            <h3>
                                <strong class="card-title mb-3">User</strong>
                                <div class="nav nav-pills pull-right">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalInsert">
                                    Insert User Baru
                                    </button>
                                </div>
                            </h3>
                            <div class="col-md-12">
                                Show level :
                                <form action="/admin/masterdata/user" method="GET">
                                    {{ csrf_field() }}
                                    <select id="levelFilter"  name="levelFilter">
                                    <option selected ></option>
                                    <option value="all">all</option>
                                    <option value="admin">admin</option>
                                    <option value="user" >user</option>
                                    <option value="talent" >talent</option>
                                    <option value="client" >client</option>
                                    <option value="cowork" >cowork</option>
                                    </select>
                                    <input type="submit" value="Search"/>
                                </form>
                            </div>


                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="usertable" name="usertable" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <td align="center"><strong>Action</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $p)                                 
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->username }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->level }}</td>
                                        <td>
                                            <a href="/admin/masterdata/user/edit/{{$p->id}}" class="btn btn-primary btn-sm tb" data-idUser="{{$p->id}}" type="button" class="btn-info btn">Edit</a>
                
                                            <a href="/admin/masterdata/user/delete/{{$p->id}}" class="btn btn-danger btn-sm tb" onclick="return confirm('Are you sure to delete this?')">Hapus</a>
                                        </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</div>
@endsection



<!-- Modal Insert User -->
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Tambah User Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="margin:0; padding: 0" method="post" action="/admin/masterdata/user/useradd">
      <div class="modal-body">
        {{ csrf_field() }}

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
            <label for="level">Level</label>
            <select id="level" class="custom-select" name="level">
                    <option selected  > </option>
                    <option value="1" {{old('level') == 1 ? 'selected' : ''}}>admin</option>
                    <option value="2" {{old('level') == 2 ? 'selected' : ''}}>user</option>
                    <option value="3" {{old('level') == 3 ? 'selected' : ''}}>talent</option>
                    <option value="4" {{old('level') == 4 ? 'selected' : ''}}>client</option>
                    <option value="5" {{old('level') == 5 ? 'selected' : ''}}>cowork</option>
            </select>
            </div>


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

        <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Tambah User" />
        </div>
      </form>
    </div>
  </div>
</div>