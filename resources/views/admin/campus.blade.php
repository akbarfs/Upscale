@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Master Data Personality</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master data Personality</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('successpersonality'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('gagalperson'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Campus</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-campus" type="button" class="btn btn-primary">Add Campus</button>
                                    <button data-toggle="modal" data-target="#modal-import-campus" type="button" class="btn btn-info">Import Campus</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="campus-table" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tipe</th>
                                                <th>Provinsi</th>
                                                <th>Nama Campus</th>
                                                <td align="center"><strong>Action</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($campus as $campus)
                                             <tr>
                                                 <td>{{$no++}}</td>
                                                 <td>{{$campus->tipe}}</td>
                                                 <td>{{$campus->provinsi}}</td>
                                                 <td>{{$campus->nama}}</td>
                                                 <td><a href="#edit-campus" data-idcampus="{{$campus->campus_id}}" data-toggle="modal" data-target="#modal-edit-campus" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                            <a href="#hapus-campus" data-idhapuscampus="{{$campus->campus_id}}" data-toggle="modal" data-target="#modal-hapus-campus" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a></td>
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


<div class="modal fade" id="modal-add-campus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Campus</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('campus.store')}}" method="post">
                @csrf
                <div class="modal-body">
                        <strong>Tipe</strong> <br>
                        <select name="tipe" id="" class="form-control">
                            <option value="PTN">PTN</option>
                            <option value="PTS">PTS</option>
                        </select>
                        <strong>Provinsi</strong> <br>
                        <input type="text" name="provinsi"  class="form-control" placeholder="Nama Provinsi">
                        <strong>Nama Campus</strong> <br>
                        <input type="text" name="namacampus" id="" class="form-control" placeholder="Nama Campus">
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <div class="nav nav-pills pull-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
    </div>

     <div class="modal fade" id="modal-import-campus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Import Campus</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post" action="{{route('campus.import')}}" enctype="multipart/form-data">
              <div class="modal-body">

                        {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                    <input type="file" name="file" required="required">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Import</button>
            </div>
        </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-campus">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Campus</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="form-edit-campus" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                    <strong>Tipe</strong> <br>
                    <input type="text" name="tipe"  class="form-control" placeholder="Tipe">
                    <strong>Provinsi</strong> <br>
                    <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Nama Provinsi">
                    <strong>Nama Campus</strong> <br>
                    <textarea name="campus" cols="30" id="campus" rows="10" class="form-control" placeholder="Nama Campus"></textarea>
                </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-hapus-campus">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Confirmation</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="formdeletecampus" method="post">
                        @method('DELETE')
                        @csrf
                        <div class="modal-body">
                            <h5>Apakah anda yakin untuk menghapusnya ?</h5>
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <div class="nav nav-pills pull-right">
                                <button type="submit" class="btn btn-success" onclick="submitDelete()">Hapus</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>


    @push('script')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
          {{-- <script src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script> --}}
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/yadcf/0.9.2/jquery.dataTables.yadcf.min.js"></script>
          <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
          <script>
              $(document).ready(function() {
                $('#campus-table').DataTable();
              });

              $(document).on('click','a[href="#edit-campus"]',function (e) {
                var campusid = $(this).data('idcampus');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/campus/'+campusid+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                           $('#provinsi').val(data.provinsi);
                           $('#campus').val(data.nama);
                            var url = '{{ route("campus.update", ":campusid") }}';
                            url = url.replace(':campusid', campusid);
                            $("#form-edit-campus").attr('action', url);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-campus"]',function(){
                var idhapus = $(this).data('idhapuscampus');
                var url = '{{ route("campus.destroy", ":idhapus") }}';
                url = url.replace(':idhapus', idhapus);
                $("#formdeletecampus").attr('action', url);
              });

              function submitDelete(){
                    $('#formdeletecampus').submit();
              }
          </script>
    @endpush
@endsection
