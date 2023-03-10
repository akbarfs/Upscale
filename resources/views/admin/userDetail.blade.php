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
                                    <div class="col-md-12">
                                    @foreach($users as $p)
                                    <form style="margin:0; padding: 0" method="post" action="/admin/masterdata/user/update">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$p->id}}"> <br/>
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{old('nama', $p->name)}}">
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
                                        <label for="level">Level</label>
                                        <select id="level" class="custom-select" name="level">
                                                <option selected  value="1"> </option>
                                                <option value="1" {{old('level') == 1 ? 'selected' : ''}} <?php if($p->level=="admin") echo 'selected="selected"'; ?>>admin</option>
                                                <option value="2" {{old('level') == 2 ? 'selected' : ''}} <?php if($p->level=="user") echo 'selected="selected"'; ?>>user</option>
                                                <option value="3" {{old('level') == 3 ? 'selected' : ''}} <?php if($p->level=="talent") echo 'selected="selected"'; ?>>talent</option>
                                                <option value="4" {{old('level') == 4 ? 'selected' : ''}} <?php if($p->level=="client") echo 'selected="selected"'; ?>>client</option>
                                                <option value="5" {{old('level') == 5 ? 'selected' : ''}} <?php if($p->level=="cowork") echo 'selected="selected"'; ?>>cowork</option>
                                        </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="password">Change New Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="" name="password" value="">
                                        </div>

                                        @if($errors->has('password'))
                                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                        @endif


                                        <div class="form-group">
                                            <label for="confirmpass">Confirm New Password</label>
                                            <input type="password" class="form-control" id="confirmpass" placeholder="" name="confirmpass" value="">
                                        </div>

                                        @if($errors->has('confirmpass'))
                                        <div class="alert alert-danger">{{ $errors->first('confirmpass') }}</div>
                                        @endif


                                    @endforeach

                                    <div style="padding-top:50px;padding-bottom: 30px;">
                                    <a href="/admin/masterdata/user" class="btn btn-danger">Back</a>
                                    <input type="submit" class="btn btn-primary" value="Submit Edit" style="float:right"/>
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
</div>
@endsection


