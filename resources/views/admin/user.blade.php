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
                                                <th>Level</th>
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
                                        <td>{{ $p->level }}</td>
                                        <td>
                                            <a href="#edit-User" class="btn btn-primary btn-sm tb" data-idUser="{{$p->id}}" data-toggle="modal" data-target="#ModalUpdate" type="button" class="btn-info btn">Edit</a>
                
                                            <a href="/admin/masterdata/user/delete/{{ $p->id }}" class="btn btn-danger btn-sm tb" onclick="return confirm('Are you sure to delete this?')">Hapus</a>
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


        </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Tambah User" />
      </div>
      </form>


    </div>
  </div>
</div>





<!-- Modal Insert Edit -->
<div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="ModalUpdate" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="margin:0; padding: 0" method="post" action="/admin/masterdata/user/update/{id}">
      <div class="modal-body">
        {{ csrf_field() }}
        

            <div class="form-group">
                <label for="namaEdit">Nama</label>
                <input type="text" class="form-control" id="namaEdit" name="namaEdit" value="{{old('namaEdit')}}">
            </div>


            @if($errors->has('namaEdit'))
            <div class="alert alert-danger">{{ $errors->first('namaEdit') }}</div>
            @endif
        
        
            <div class="form-group">
                <label for="emailEdit">Email</label>
                <input type="text" class="form-control" id="emailEdit" name="emailEdit" placeholder="" value="{{old('emailEdit')}}">
            </div>


            @if($errors->has('emailEdit'))
            <div class="alert alert-danger">{{ $errors->first('emailEdit') }}</div>
            @endif

            <div class="form-group">
                <label for="usernameEdit">Username</label>
                <input type="text" class="form-control" id="usernameEdit" name="usernameEdit" placeholder="" value="{{old('usernameEdit')}}">
            </div>


            @if($errors->has('usernameEdit'))
            <div class="alert alert-danger">{{ $errors->first('usernameEdit') }}</div>
            @endif


            <div class="form-group">
                <label for="passwordEdit">Password</label>
                <input type="password" class="form-control" id="passwordEdit" placeholder="" name="passwordEdit" value="{{old('passwordEdit')}}">
            </div>


            @if($errors->has('passwordEdit'))
            <div class="alert alert-danger">{{ $errors->first('passwordEdit') }}</div>
            @endif


            <div class="form-group">
                <label for="confirmpassEdit">Confirm Password</label>
                <input type="password" class="form-control" id="confirmpassEdit" placeholder="" name="confirmpassEdit" value="">
            </div>

            @if($errors->has('confirmpassEdit'))
            <div class="alert alert-danger">{{ $errors->first('confirmpassEdit') }}</div>
            @endif

            <div class="form-group">
            <label for="levelEdit">Level</label>
            <select id="levelEdit" class="custom-select" name="levelEdit">
                    <option selected  > </option>
                    <option value="1" {{old('levelEdit') == 1 ? 'selected' : ''}}>admin</option>
                    <option value="2" {{old('levelEdit') == 2 ? 'selected' : ''}}>user</option>
                    <option value="3" {{old('levelEdit') == 3 ? 'selected' : ''}}>talent</option>
                    <option value="4" {{old('levelEdit') == 4 ? 'selected' : ''}}>client</option>
                    <option value="5" {{old('levelEdit') == 5 ? 'selected' : ''}}>cowork</option>
            </select>
            </div>



      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Edit User" />
      </div>
      </form>


    </div>
  </div>
</div>

 @push('script')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on('click','a[href="#edit-User"]',function (e) {
                var id = $(this).data('idUser');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/user/edit/'+id,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#namaEdit').val(data.name);
                            $('#emailEdit').val(data.email);
                        }
                    });
              });
</script>

@endpush







