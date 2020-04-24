@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Master Data Skill</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master data Skill</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if ($message = Session::get('Successkategori'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Skill Category</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-skillcategory" type="button" class="btn btn-primary">Add Skill Category</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="kategori-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Skill Category</th>
                                                <th>Skill Description</th>
                                                <th>Skill Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($kategori as $item2)
                                                <tr>
                                                    <td>{{$nokat++}}</td>
                                                    <td>{{$item2->sc_name}}</td>
                                                    @if($item2->sc_desc==NULL)
                                                        <td align="center">-</td>
                                                    @else
                                                        <td align="center">{{$item2->sc_desc}}</td>
                                                    @endif
                                                    <td>{{$item2->sc_type}}</td>
                                                    <td style="width:10%;" align="center">
                                                        <a href="#edit-skillcategory" data-idkategori="{{$item2->sc_id}}" data-toggle="modal" data-target="#modal-edit-skillcategory" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        @if($item2->sc_deleted_at!=NULL)
                                                            <a href="{{route('skill.restorecategory',$item2->sc_id)}}"  class="btn-warning btn" title="Restore Data"><i class="fa fa-history"></i></a>
                                                        @else
                                                            <a href="#hapus-skillcategory" data-idhapuskategori="{{$item2->sc_id}}" data-toggle="modal" data-target="#modal-hapus-skillcategory" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
                                                        @endif
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
                        @if ($message = Session::get('Success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Master Data Skill</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-skill" type="button" class="btn btn-primary">Add Skill</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="skill-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Skill</th>
                                                <th>Skill Category</th>
                                                <th>Skill Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($skill as $item)
                                                <tr>
                                                    <td>{{$noskill++}}</td>
                                                    <td>{{$item->skill_name}}</td>
                                                    @if ($item->sc_deleted_at!=NULL)
                                                        <td align="center">-</td>
                                                    @else
                                                        <td align="center">{{$item->sc_name}}</td>
                                                    @endif
                                                    @if ($item->skill_desc==NULL)
                                                        <td align="center">-</td>
                                                    @else
                                                        <td>{{$item->skill_desc}}</td>
                                                    @endif
                                                    <td align="center">
                                                        <a href="#edit-skill" data-idskill="{{$item->skill_id}}" data-toggle="modal" data-target="#modal-edit-skill" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-skill" data-idhapusskill="{{$item->skill_id}}" data-toggle="modal" data-target="#modal-hapus-skill" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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
    <div class="modal fade" id="modal-add-skillcategory">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Skill Category</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('skill.storecategory')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Name of Category</strong> <br>
                    <input type="text" name="kategori_name"  class="form-control" placeholder="Name Of Category">
                    <strong>Type of Category</strong> <br>
                    <input type="text" name="kategori_type"  class="form-control" placeholder="Type Of Category">
                    <strong>Description of Category</strong> <br>
                    <textarea name="kategori_desc" cols="30" rows="10" class="form-control" placeholder="Description Of Category"></textarea>
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

    <div class="modal fade" id="modal-edit-skillcategory">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Skill Category</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('skill.updatecategory')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="sc_id" id="sc_id">
                    <strong>Name of Category</strong> <br>
                    <input type="text" name="kategori_name" id="catname" class="form-control" placeholder="Name Of Category">
                    <strong>Type of Category</strong> <br>
                    <input type="text" name="kategori_type" id="cattype" class="form-control" placeholder="Type Of Category">
                    <strong>Description of Category</strong> <br>
                    <textarea name="kategori_desc" id="catdesc" cols="30" rows="10" class="form-control" placeholder="Description Of Category"></textarea>
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


    <div class="modal fade" id="modal-hapus-skillcategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="formdeletekategori" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sc_id" id="sc_id">
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

    <div class="modal fade" id="modal-add-skill">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Skill</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('skill.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Skill Name <br>
                        <input type="text" name="skill_name"  class="form-control" placeholder="Skill Name"> <br>
                        Skill Category
                        <select name="skill_category"  class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($kategori as $cat)
                                <option value="{{$cat->sc_id}}">{{$cat->sc_name}}</option>
                            @endforeach
                        </select> <br>
                        Skill Description <br>
                        <textarea name="skill_desc"  cols="30" rows="10" class="form-control" placeholder="Description Of Skill"></textarea>
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

        <div class="modal fade" id="modal-edit-skill">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Skill</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-skill" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="skill_id" id="skillid">
                            Skill Name <br>
                            <input type="text" name="skill_name" id="skillname" class="form-control" placeholder="Skill Name"> <br>
                            Skill Category
                            <select name="skill_category" id="skillcategory" class="form-control">
                                <option value="">Pilih</option>
                                @foreach ($kategori as $cat)
                                    <option value="{{$cat->sc_id}}">{{$cat->sc_name}}</option>
                                @endforeach
                            </select> <br>
                            Skill Description <br>
                            <textarea name="skill_desc" id="skilldesc" cols="30" rows="10" class="form-control" placeholder="Description Of Skill"></textarea>
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

            <div class="modal fade" id="modal-hapus-skill">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeleteskill" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <input type="hidden" name="sc_id" id="sc_id">
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

    @push('script')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
          {{-- <script src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script> --}}
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/yadcf/0.9.2/jquery.dataTables.yadcf.min.js"></script>
          <script>
              $(document).ready(function() {
                $('#skill-table').DataTable();
              });

              $(document).ready(function() {
                $('#kategori-table').DataTable();
              });

              $(document).on('click','a[href="#edit-skillcategory"]',function (e) {
                var scid = $(this).data('idkategori');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/editkategori/'+scid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#sc_id').val(data.sc_id);
                            $('#catname').val(data.sc_name);
                            $('#catdesc').val(data.sc_desc);
                            $('#cattype').val(data.sc_type);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-skillcategory"]',function(){
                var scidhapus = $(this).data('idhapuskategori');
                var url = '{{ route("skill.deletecategory", ":scidhapus") }}';
                url = url.replace(':scidhapus', scidhapus);
                $("#formdeletekategori").attr('action', url);
              });

              function formSubmit(){
                    $('#formdeletekategori').submit();
              }

              $(document).on('click','a[href="#edit-skill"]',function(e){
                    var skillid = $(this).data('idskill');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/skill/'+skillid+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#skillid').val(data.skill_id);
                            $('#skillname').val(data.skill_name);
                            $('#skilldesc').val(data.skill_desc);
                            $('#skillcategory option[value="'+data.skill_sc_id+'"]').prop('selected', true);
                            var url2 = '{{ route("skill.update", ":skillid") }}';
                            url2 = url2.replace(':skillid', skillid);
                            $("#form-edit-skill").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-skill"]',function(){
                var skillidhapus = $(this).data('idhapusskill');
                var urlskillidhapus = '{{ route("skill.destroy", ":skillidhapus") }}';
                urlskillidhapus = urlskillidhapus.replace(':skillidhapus', skillidhapus);
                $("#formdeleteskill").attr('action', urlskillidhapus);
              });

              function submitDelete(){
                    $('#formdeleteskill').submit();
              }
          </script>
    @endpush
@endsection
