@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp Fasilitas</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp Fasilitas</li>
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
                                <strong class="card-title mb-3">Fasilitas</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-fasilitas" type="button" class="btn btn-primary">Add Fasilitas</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="fasilitas-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Nama Fasilitas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($fas as $item)
                                                <tr>
                                                    <td>{{$nofas++}}</td>
                                                    <td>{{$item->fasilitas_name}}</td>
                                                    <td align="center">
                                                        <a href="#edit-fasilitas" data-fasilitasid="{{$item->id}}" data-toggle="modal" data-target="#modal-edit-fasilitas" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-fasilitas" data-idhapusfasilitas="{{$item->id}}" data-toggle="modal" data-target="#modal-hapus-fasilitas" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
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

    <div class="modal fade" id="modal-add-fasilitas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Fasilitas</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('fasilitas.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        Nama Fasilitas <br>
                        <input type="text" name="fasilitas_name"  class="form-control" placeholder="Nama Fasilitas"> <br>
                        Icon Fasilitas <br>
                        <input type="file" id="upload-pic" name="fasilitas_icon" accept=".jpg, .png, .jpeg, .svg" /> <br>
                        <br>
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

        <div class="modal fade" id="modal-edit-fasilitas">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Fasilitas</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-fasilitas" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            Nama Fasilitas <br>
                            <input type="text" name="fasilitas_name"  id="fasilitas_name" class="form-control" placeholder="Nama Fasilitas"> <br>
                            Icon Fasilitas <br>
                            <input type="file" id="upload-pic" name="fasilitas_icon" accept=".jpg, .png, .jpeg" /> <br>
                             <br>
                            @if(!empty($fas->fasilitas_icon))
                                <img id="blah" src="{{asset('storage/fasilitas/'.$fas->fasilitas_name)}}" style="height: auto; width: auto; margin: auto;" class="img-responsive">
                            @endif
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

            <div class="modal fade" id="modal-hapus-fasilitas">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletefasilitas" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="modal-body">
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
                $('#fasilitas-table').DataTable();
              });

              

              $(document).on('click','a[href="#edit-fasilitas"]',function(e){
                    var fasid = $(this).data('fasilitasid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editfasilitas/'+fasid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#fasilitas_name').val(data.fasilitas_name);
                            var url2 = '{{ route("fasilitas.update", ":id") }}';
                            url2 = url2.replace(':id', fasid);
                            $("#form-edit-fasilitas").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-fasilitas"]',function(){
                var fashapus = $(this).data('idhapusfasilitas');
                var urlhapus = '{{ route("fasilitas.delete", ":fashapus") }}';
                urlhapus = urlhapus.replace(':fashapus', fashapus);
                $("#formdeletefasilitas").attr('action', urlhapus);
              });

              function submitDelete(){
                    $('#formdeletefasilitas').submit();
              }
          </script>
    @endpush
@endsection