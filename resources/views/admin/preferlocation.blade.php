@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Master Data Prefered Location</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Master data Prefered Location</li>
                </ol>
            </div>
        </div>
    </div>
</div>

 @if ($message = Session::get('Success'))
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
                                <strong class="card-title mb-3">Location</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-location" type="button" class="btn btn-primary">Add Prefered Location</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="lokasi-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Location</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($preferlocation as $item2)
                                                <tr>
                                                    <td>{{$noloc++}}</td>
                                                    <td>{{$item2->location_name}}</td>
                                                    <td>
                                                    @if ($item2->location_active==='Y')
                                                    Active
                                                    @elseif ($item2->location_active==='N')
                                                    Nonactive
                                                    @else
                                                    -
                                                    @endif
                                                    </td>
                                                    <td style="width:10%;" align="center">
                                                        <a href="#edit-location" data-idlocation="{{$item2->location_id}}" data-toggle="modal" data-target="#modal-edit-location" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-location" data-idhapuslokasi="{{$item2->location_id}}" data-toggle="modal" data-target="#modal-hapus-location" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
                                                        
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


    <div class="modal fade" id="modal-add-location">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Prefered Location</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('preferlocation.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Location Name <br>
                        <input type="text" name="location_name"  class="form-control" placeholder="Location Name"> <br>
                        Location Status
                        <select name="location_active"  class="form-control">
                            <option value="">Pilih</option>
                            <option  value="Y">Yes</option>
                            <option value="N">No</option>
        
                            
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

        <div class="modal fade" id="modal-edit-location">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Prefered Location</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-location" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="location_id" id="locationid">
                            Location Name <br>
                            <input type="text" name="location_name" id="locationname" class="form-control" placeholder="Location Name"> <br>
                            <label for="select" class=" form-control-label">Location Status</label>
                                    <select value="" name="location_active" id="locationstatus" class="form-control">
                                        <option  value="Y">Yes</option>
                                        <option value="N">No</option>
                                    </select>
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

            <div class="modal fade" id="modal-hapus-location">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletelocation" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <input type="hidden" name="location_id" id="location_id">
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
                $('#lokasi-table').DataTable();
              });


              $(document).on('click','a[href="#edit-location"]',function(e){
                    var locationid = $(this).data('idlocation');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/preferlocation/'+locationid+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#locationid').val(data.location_id);
                            $('#locationname').val(data.location_name);
                            $('#locationstatus').prop('selected', true);
                            var url2 = '{{ route("preferlocation.update", ":locationid") }}';
                            url2 = url2.replace(':locationid', locationid);
                            $("#form-edit-location").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-location"]',function(){
                var lokasiidhapus = $(this).data('idhapuslokasi');
                var urllokasiidhapus = '{{ route("preferlocation.destroy", ":lokasiidhapus") }}';
                urllokasiidhapus = urllokasiidhapus.replace(':lokasiidhapus', lokasiidhapus);
                $("#formdeletelocation").attr('action', urllokasiidhapus);
              });

              function submitDelete(){
                    $('#formdeletelocation').submit();
              }
          </script>
    @endpush
@endsection
