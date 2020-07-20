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
                            <div class="alert alert-danger">Edit Data Error</div>
                            @endif
                            <h3>
                                <strong class="card-title mb-3">Details User</strong>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <form style="margin:0; padding: 0" method="post" action="/admin/masterdata/user/update">

                                        @foreach($users as $p)
                                        <div class="card">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama', $p->name)}}">
                                        </div>


                                        @if($errors->has('nama'))
                                        <div class="alert alert-danger">{{ $errors->first('nama') }}</div>
                                        @endif
        
        
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{old('email', $p->email)}}">
                                        </div>


                                        @if($errors->has('email'))
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                        @endif

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="" value="{{old('username', $p->username)}}">
                                        </div>


                                        @if($errors->has('username'))
                                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                                        @endif


                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="" name="password" value="">
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

                                    @endforeach
                                    </div>

                                    <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" value="Edit User" />
                                     <a href="/admin/masterdata/user" class="btn btn-danger")>Keluar</a>
                                    </div>
                                 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> 
</div>
@endsection
