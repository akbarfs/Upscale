@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Master Data Interview</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master data Interview</li>
                </ol>
            </div>
        </div>
    </div>
</div>


@if ($message = Session::get('successpos'))
    <div class="alert alert-success alert-block">
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
                    <div class="card-header" data-toggle="collapse" href="#collapse1">
                        <h3>
                            <strong class="card-title mb-3">Position Interview</strong>
                            <div class="nav nav-pills pull-right">
                                <button data-toggle="modal" data-target="#modal-add-position" type="button" class="btn btn-primary">Add Position</button>
                            </div>
                        </h3>
                    </div>
                    <div class="card-body collapse" id="collapse1">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="position-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Position Name</th>
                                            <th>Position Description</th>
                                            <th>Position Singkatan</th>
                                            <td align="center"><strong>Action</strong></td>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($ct as $pos)
                                        <tr>
                                            <td>{{$nopos++}}</td>
                                            <td>{{$pos->ct_name}}</td>
                                            <td>
                                                @if ($pos->ct_desc==NULL)
                                                    <div align="center">-</div>
                                                @else
                                                    {{$pos->ct_desc}}
                                                @endif
                                            </td>
                                            <td>{{$pos->ct_singkatan}}</td>
                                            <td align="center">
                                                <a href="#edit-position" data-idpos="{{$pos->ct_id}}" data-toggle="modal" data-target="#modal-edit-position" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                <a href="#hapus-position" data-idhapuspos="{{$pos->ct_id}}" data-toggle="modal" data-target="#modal-hapus-position" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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


                <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"data-toggle="collapse" href="#collapse2">
                            <h3>
                                <strong class="card-title mb-3">Personality</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-personality" type="button" class="btn btn-primary">Add Personality</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body" collapse" id="collapse2">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="personality-table" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Question Text</th>
                                                <th>Question Description</th>
                                                <th>Sort</th>
                                                <th>Active</th>
                                                <td align="center"><strong>Action</strong></td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($p as $item)
                                                <tr>
                                                    <td>{{$noper++}}</td>
                                                    <td>{{$item->question_text}}</td>
                                                    <td>{{$item->question_desc}}</td>
                                                    <td align="center">{{$item->tq_sort}}</td>
                                                    <td align="center">{{$item->tq_active}}</td>
                                                    <td width="15%" align="center">
                                                        @if ($item->tq_active!=="YES")
                                                            <a href="{{route('personality.ubahactive',$item->tq_id)}}" class="btn-info btn"><i class="fa fa-check-circle"></i></a>
                                                        @endif
                                                        <a href="#edit-personality" data-idperson="{{$item->tq_id}}" data-toggle="modal" data-target="#modal-edit-personality" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-personality" data-idhapusperson="{{$item->tq_id}}" data-toggle="modal" data-target="#modal-hapus-personality" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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

@if ($message = Session::get('successinterview'))
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


<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" href="#collapse3">
                            <h3>
                                <strong class="card-title mb-3">Technical Question</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-interview" type="button" class="btn btn-primary">Add Technical Question</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body"  collapse" id="collapse3">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="interview-table" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Question Text</th>
                                                {{-- <th>Question Description</th> --}}
                                                <th>Question Type</th>
                                                <th>Category</th>
                                                <th>Active</th>
                                                <td align="center"><strong>Action</strong></td>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($interview as $item)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->question_text}}</td>
                                                    {{-- <td>{{$item->question_desc}}</td> --}}
                                                    <td>{{$item->question_type}}</td>
                                                    <td>{{$item->ct_name}}</td>
                                                    <td>{{$item->tq_active}}</td>
                                                    <td width="20%" align="center">
                                                        @if ($item->tq_active!=="YES")
                                                                <a href="{{route('personality.ubahactive',$item->tq_id)}}" class="btn-warning btn"><i class="fa fa-check"></i></a>
                                                        @endif
                                                        <a href="#detail-interview" data-iddetail="{{$item->tq_id}}" data-toggle="modal" data-target="#modal-detail-interview" type="button" class="btn-success btn"><i class="fa fa-eye"></i></a>
                                                        <a href="#edit-interview" data-idinter="{{$item->tq_id}}" data-toggle="modal" data-target="#modal-edit-interview" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-interview" data-idhapusinter="{{$item->tq_id}}" data-toggle="modal" data-target="#modal-hapus-interview" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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

<div class="modal fade" id="modal-add-personality">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Question Personality</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('personality.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Question Text</strong> <br>
                    <input type="text" name="text_q"  class="form-control" placeholder="Question Text">
                    <strong>Question Description</strong> <br>
                    <textarea name="desc_q" cols="30" rows="10" class="form-control" placeholder="Question Description"></textarea>
                    <strong>Active</strong>
                    <select name="active" id="active" class="form-control">
                        <option value="">Pilih</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                    <strong>Sort</strong>
                    <input type="number" name="sort" id="sort" class="form-control" style="width:20%" min="1">
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

    <div class="modal fade" id="modal-edit-personality">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Question Personality</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="form-edit-person" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <strong>Question Text</strong> <br>
                        <input type="text" name="text_q" id="text_q"  class="form-control" placeholder="Question Text">
                        <strong>Question Description</strong> <br>
                        <textarea name="desc_q" id="desc_q" cols="30" rows="10" class="form-control" placeholder="Question Description"></textarea>
                        <strong>Active</strong>
                        <select name="active" id="active" class="form-control">
                            <option value="">Pilih</option>
                            <option value="YES">YES</option>
                            <option value="NO">NO</option>
                        </select>
                        <strong>Sort</strong>
                        <input type="number" name="sort" id="sort" class="form-control" style="width:20%" min="1">
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

        <div class="modal fade" id="modal-hapus-personality">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Confirmation</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="formdeletepersonality" method="post">
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


<div class="modal fade" id="modal-detail-interview">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <div class="modal-body" id="datanih">

                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
          </div>
        </div>
    </div>



<div class="modal fade" id="modal-add-interview">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Question Interview</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('interview.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Question Text</strong> <br>
                    <input type="text" name="text_q"  class="form-control" placeholder="Question Text">
                    <strong>Question Description</strong> <br>
                    <textarea name="desc_q" cols="30" rows="10" class="form-control" placeholder="Question Description"></textarea>
                    <strong>Type</strong>
                    <select name="tipe"  class="form-control">
                        <option value="">Pilih</option>
                        @foreach ($qt as $tipe)
                            <option value="{{$tipe->question_type}}">{{$tipe->question_type}}</option>
                        @endforeach
                    </select>
                    <strong>Category</strong>
                    <select name="category" class="form-control">
                        <option value="">Pilih</option>
                        @foreach ($ct as $cat)
                            <option value="{{$cat->ct_id}}">{{$cat->ct_name}}</option>
                        @endforeach
                    </select>
                    <strong>Active</strong>
                    <select name="active" class="form-control">
                        <option value="">Pilih</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                    <strong>Sort</strong>
                    <input type="number" name="sort" id="sort" class="form-control" style="width:20%" min="1">
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

    <div class="modal fade" id="modal-edit-interview">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Question Interview</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="updateinterview" method="post">
                        @method('PUT')
                        @csrf
                        <div class="modal-body">
                            <strong>Question Text</strong> <br>
                            <input type="text" name="text_q" id="text_q" class="form-control" placeholder="Question Text">
                            <strong>Question Description</strong> <br>
                            <textarea name="desc_q" id="desc_q" cols="30" rows="10" class="form-control" placeholder="Question Description"></textarea>
                            <strong>Type</strong>
                            <select name="tipe" id="tipe" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($qt as $tipe)
                                    <option value="{{$tipe->question_type}}">{{$tipe->question_type}}</option>
                                @endforeach
                            </select>
                            <strong>Category</strong>
                            <select name="category" id="category" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($ct as $cat)
                                    <option value="{{$cat->ct_id}}">{{$cat->ct_name}}</option>
                                @endforeach
                            </select>
                            <strong>Active</strong>
                            <select name="active" id="active" class="form-control">
                                <option value="">Pilih</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                            </select>
                            <strong>Sort</strong>
                            <input type="number" name="sort" id="sort" class="form-control" style="width:20%" min="1">
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

        <div class="modal fade" id="modal-hapus-interview">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Confirmation</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="deleteinterview" method="post">
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



<div class="modal fade" id="modal-add-position">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Position</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('position.storeposition')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Position Name</strong>
                    <input type="text" name="positionname" id="" class="form-control" placeholder="Position Name">
                    <strong>Position Description</strong>
                    <textarea name="posdesc" id="" class="form-control" placeholder="Position Description" cols="30" rows="10"></textarea>
                    <strong>Position Singkatan</strong>
                    <input type="text" name="singkatan" id="" class="form-control" placeholder="Position Singkatan">
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

    <div class="modal fade" id="modal-edit-position">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Position</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="formupdateposition" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Position Name</strong>
                    <input type="text" name="positionname" id="positionname" class="form-control" placeholder="Position Name">
                    <strong>Position Description</strong>
                    <textarea name="posdesc" id="posdesc" class="form-control" placeholder="Position Description" cols="30" rows="10"></textarea>
                    <strong>Position Singkatan</strong>
                    <input type="text" name="singkatan" id="singkatan" class="form-control" placeholder="Position Singkatan">
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

    <div class="modal fade" id="modal-hapus-position">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Delete Confirmation</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="deletepos" method="post">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <h5>Apakah anda yakin untuk menghapusnya ?</h5>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="submit" class="btn btn-success" onclick="submitDeletePos()">Hapus</button>
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
                $('#interview-table').DataTable();
              });

              $(document).ready(function() {
                $('#position-table').DataTable();
              });

              $(document).on('click','a[href="#edit-interview"]',function (e) {
                var idinter = $(this).data('idinter');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/interview/'+idinter+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#text_q').val(data.question_text);
                            $('#desc_q').val(data.question_desc);
                            $('#active option[value="'+data.tq_active+'"]').prop('selected', true);
                            $('#category option[value="'+data.tq_ct_id+'"]').prop('selected', true);
                            $('#tipe option[value="'+data.question_type+'"]').prop('selected', true);
                            $('input[name="sort"]').val(data.tq_sort);
                            var url = '{{ route("interview.update", ":idinter") }}';
                            url = url.replace(':idinter', idinter);
                            $("#updateinterview").attr('action', url);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-interview"]',function(){
                var idhapus = $(this).data('idhapusinter');
                var url = '{{ route("interview.destroy", ":idhapus") }}';
                url = url.replace(':idhapus', idhapus);
                $("#deleteinterview").attr('action', url);
              });

              function submitDelete(){
                    $('#deleteinterview').submit();
              }

            $(document).on('click','a[href="#detail-interview"]', function(e){
                var iddetail = $(this).data('iddetail');
                $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/masterdata/interview/'+iddetail,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                            var html = '';
                            if(data.question_desc==null){
                                html += '<strong>Question Text</strong> : '+data.question_text+'<br>';
                                html += '<strong>Question Desc</strong> : - <br>';
                                html += '<strong>Question Type</strong> : '+data.question_type+'<br>';
                                html += '<strong>Category</strong> : '+data.ct_name+'<br>';
                                html += '<strong>Sort </strong> : '+data.tq_sort+'<br>';
                                html += '<strong>Active</strong> : '+data.tq_active+'<br>';
                                $('#datanih').append(html);
                                $("#modal-detail-interview").on("hidden.bs.modal", function() {
                                    $("#datanih").html("");
                                });
                            }else{
                                html += '<strong>Question Text</strong> : '+data.question_text+'<br>';
                                html += '<strong>Question Desc</strong> : '+data.question_desc+'<br>';
                                html += '<strong>Question Type</strong> : '+data.question_type+'<br>';
                                html += '<strong>Category</strong> : '+data.ct_name+'<br>';
                                html += '<strong>Sort </strong> : '+data.tq_sort+'<br>';
                                html += '<strong>Active</strong> : '+data.tq_active+'<br>';

                                $('#datanih').append(html);

                                $("#modal-detail-interview").on("hidden.bs.modal", function() {
                                    $("#datanih").html("");
                                });
                            }

                    }
                })
            });

            $(document).on('click','a[href="#edit-position"]',function (e) {
                var idpos = $(this).data('idpos');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/position/edit/'+idpos,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#positionname').val(data.ct_name);
                            $('#posdesc').val(data.ct_desc);
                            $('#singkatan').val(data.ct_singkatan);
                            var url = '{{ route("position.updateposition", ":idpos") }}';
                            url = url.replace(':idpos', idpos);
                            $("#formupdateposition").attr('action', url);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-position"]',function(){
                var idhapuspos = $(this).data('idhapuspos');
                var url = '{{ route("position.destroy", ":idhapuspos") }}';
                url = url.replace(':idhapuspos', idhapuspos);
                $("#deletepos").attr('action', url);
              });

              function submitDeletePos(){
                    $('#deletepos').submit();
              }

          </script>
          <script>
              $(document).ready(function() {
                $('#personality-table').DataTable();
              });

              $(document).on('click','a[href="#edit-personality"]',function (e) {
                var personid = $(this).data('idperson');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/personality/'+personid+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#text_q').val(data.question_text);
                            $('#desc_q').val(data.question_desc);
                            $('#active option[value="'+data.tq_active+'"]').prop('selected', true);
                            $('input[name="sort"]').val(data.tq_sort);
                            var url = '{{ route("personality.update", ":personid") }}';
                            url = url.replace(':personid', personid);
                            $("#form-edit-person").attr('action', url);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-personality"]',function(){
                var idhapus = $(this).data('idhapusperson');
                var url = '{{ route("personality.destroy", ":idhapus") }}';
                url = url.replace(':idhapus', idhapus);
                $("#formdeletepersonality").attr('action', url);
              });

              function submitDelete(){
                    $('#formdeletepersonality').submit();
              }
          </script>    
          <script type="text/javascript">
               $('.panel-collapse').on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
              });

              $('.panel-collapse').on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
              });
          </script>
    @endpush
@endsection
