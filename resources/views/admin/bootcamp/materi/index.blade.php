@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp Materi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp Materi</li>
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
                                <strong class="card-title mb-3">Main Materi</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-mainmateri" type="button" class="btn btn-primary">Add Main Materi</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="mainmateri-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Main Materi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mainmateri as $item2)
                                                <tr>
                                                    <td>{{$nomain++}}</td>                                               
                                                    <td>{{$item2->materi_main}}</td>
                                                    <td style="width:10%;" align="center">
                                                        <a href="#edit-mainmateri" data-materiid="{{$item2->materi_id}}" data-toggle="modal" data-target="#modal-edit-mainmateri" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-mainmateri" data-hapusmateriid="{{$item2->materi_id}}" data-toggle="modal" data-target="#modal-hapus-mainmateri" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Sub Materi</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-submateri" type="button" class="btn btn-primary">Add Sub Materi</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="submateri-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Sub Materi</th>
                                                <th>Main Materi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($submateri as $item)
                                                <tr>
                                                    <td>{{$nosub++}}</td>
                                                    <td>{{$item->submateri}}</td>
                                                    <td>{{$item->materi_main}}</td>
                                                    <td align="center">
                                                        <a href="#edit-submateri" data-submateri_id="{{$item->submateri_id}}" data-toggle="modal" data-target="#modal-edit-submateri" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-submateri" data-hapussubid="{{$item->submateri_id}}" data-toggle="modal" data-target="#modal-hapus-submateri" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Soal</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-soal" type="button" class="btn btn-primary">Add Soal</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="soal-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Filename</th>
                                                <th>Main Materi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($soal as $it)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$it->file_name}}</td>
                                                    <td>{{$it->materi_main}}</td>
                                                    <td align="center">
                                                        <a href="#edit-soal" data-soal_id="{{$it->soal_id}}" data-toggle="modal" data-target="#modal-edit-soal" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-soal" data-hapid="{{$it->soal_id}}" data-toggle="modal" data-target="#modal-hapus-soal" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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
<!-- The Modal -->
<div class="modal fade" id="modal-add-mainmateri">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Main Materi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('materi.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Main Materi</strong> <br>
                    <input type="text" name="materi_main"  class="form-control" placeholder="">
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

    <div class="modal fade" id="modal-edit-mainmateri">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Main Materi</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('materi.update')}}" method="post">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <input type="hidden" name="materi_id" id="materi_id">
                    <strong>Main Materi</strong> <br>
                    <input type="text" name="materi_main" id="materimain" class="form-control" placeholder="Main Materi">
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


    <div class="modal fade" id="modal-hapus-mainmateri">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="formdeletemainmateri" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="materi_id" id="materi_id">
                        <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="submit" class="btn btn-danger" onclick="formSubmit()" value="Submit">Hapus</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-submateri">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Sub Materi</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('submateri.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Sub Materi <br>
                        <input type="text" name="submateri"  class="form-control" placeholder="Sub Materi"> <br>
                        Main Materi
                        <select name="t_materi"  class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($mainmateri as $cat)
                                    <option value="{{$cat->materi_id}}">{{$cat->materi_main}}</option>
                            @endforeach
                        </select> <br>
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

        <div class="modal fade" id="modal-edit-submateri">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Sub Materi</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-submateri" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="submateri_id" id="submateri_id">
                            Sub Materi <br>
                            <input type="text" name="submateri" id="sub_materi" class="form-control" placeholder="Sub Materi"> <br>
                            Main Materi
                            <select name="t_materi" id="mainmateri" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($mainmateri as $cat)
                                    <option value="{{$cat->materi_id}}">{{$cat->materi_main}}</option>
                                @endforeach
                            </select> <br>
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

            <div class="modal fade" id="modal-hapus-submateri">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletesubmateri" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <input type="hidden" name="submateri_id" id="submateri_id">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="submitDelete()" value="Submit">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        <div class="modal fade" id="modal-add-soal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Soal</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('soal.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        File Name <br>
                        <input type="text" name="file_name"  class="form-control" placeholder="File Name"> <br>
                        Main Materi
                        <select name="t_materi_soal"  class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($mainmateri as $cat)
                                    <option value="{{$cat->materi_id}}">{{$cat->materi_main}}</option>
                            @endforeach
                        </select> <br>
                        Upload File <br>
                        <input type="file" id="file_soal" name="file_soal" accept=".doc, .docx, .pdf">
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

        <div class="modal fade" id="modal-edit-soal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-soal" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="soal_id" id="soal_id">
                            File Name <br>
                            <input type="text" name="file_name" id="file_name" class="form-control" placeholder="File Name"> <br>
                            Main Materi
                            <select name="t_materi_soal" id="materisoal" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($mainmateri as $cat)
                                        <option value="{{$cat->materi_id}}">{{$cat->materi_main}}</option>
                                @endforeach
                            </select> <br>
                            Upload File <br>
                            <input type="file" id="file_soal" name="file_soal" accept=".doc, .docx, .pdf">
                            
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

            <div class="modal fade" id="modal-hapus-soal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletesoal" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <input type="hidden" name="soal_id" id="soal_id">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="deletesoal()" value="Submit">Hapus</button>
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
          <script>
                $(document).ready(function() {
                $('#soal-table').DataTable();
              });

              $(document).ready(function() {
                $('#submateri-table').DataTable();
              });

              $(document).ready(function() {
                $('#mainmateri-table').DataTable();
              });

              $(document).on('click','a[href="#edit-mainmateri"]',function (e) {
                var mid = $(this).data('materiid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/materi/editmainmateri/'+mid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#materi_id').val(data.materi_id);
                            $('#materimain').val(data.materi_main);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-mainmateri"]',function(){
                var hapusmateriid = $(this).data('hapusmateriid');
                var url = '{{ route("materi.delete", ":hapusmateriid") }}';
                url = url.replace(':hapusmateriid', hapusmateriid);
                $("#formdeletemainmateri").attr('action', url);
              });

              function formSubmit(){
                    $('#formdeletemainmateri').submit();
              }

              $(document).on('click','a[href="#edit-submateri"]',function(e){
                    var subid = $(this).data('submateri_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/materi/editsubmateri/'+subid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#submateri_id').val(data.submateri_id);
                            $('#sub_materi').val(data.submateri);
                            $('#mainmateri option[value="'+data.main_materi_id+'"]').prop('selected', true);
                            var url2 = '{{ route("submateri.update", ":submateri_id") }}';
                            url2 = url2.replace(':submateri_id', subid);
                            $("#form-edit-submateri").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-submateri"]',function(){
                var subiddelete = $(this).data('hapussubid');
                var urlsubiddelete = '{{ route("submateri.delete", ":subiddelete") }}';
                urlsubiddelete = urlsubiddelete.replace(':subiddelete', subiddelete);
                $("#formdeletesubmateri").attr('action', urlsubiddelete);
              });

              function submitDelete(){
                    $('#formdeletesubmateri').submit();
              }

              $(document).on('click','a[href="#edit-soal"]',function(e){
                    var sid = $(this).data('soal_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/materi/editsoal/'+sid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#soal_id').val(data.soal_id);
                            $('#file_name').val(data.file_name);
                            $('#materisoal option[value="'+data.id_materi+'"]').prop('selected', true);
                            var urledit = '{{ route("soal.update", ":soal_id") }}';
                            urledit = urledit.replace(':soal_id', sid);
                            $("#form-edit-soal").attr('action', urledit);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-soal"]',function(){
                var hapid = $(this).data('hapid');
                var urlsoal = '{{ route("soal.delete", ":hapid") }}';
                urlsoal = urlsoal.replace(':hapid', hapid);
                $("#formdeletesoal").attr('action', urlsoal);
              });

              function deletesoal(){
                    $('#formdeletesoal').submit();
              }
          </script>
    @endpush

@endsection