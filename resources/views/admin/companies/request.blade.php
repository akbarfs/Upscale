@extends('admin.layout.apps')

@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance:unset !important;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Company Request</h3>
                @foreach($a as $company) 
                <strong class="text-muted" style="text-transform: capitalize;">{{$company->company_name}}</strong>
               @endforeach
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('companies.index')}}">Company</a></li>
                    <li class="active">Request</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                        @foreach($a as $company)
                            <button  id="{{$company->company_id}}" name="{{$company->company_name}}"  class="btn btn-primary addReq" type="button" data-toggle="modal" data-target="#requestAdd" ><i class="fa fa-plus"></i> Add Request</button>
                            <!-- <a href="#" data-toggle="modal" data-target="#requestAdd" data-id="{{$company->company_id}}" data-name="{{$company->company_name}}"  type="button" class="btn btn-primary addReq" ><i class="fa fa-plus">Add Request</i></a> -->
                        @endforeach
                        </div>
                    </div>
                </div>
                    
            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="req-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Request Name</th>
                                            <th>Position</th>
                                            <th>QTY</th>
                                            <th>Location</th>
                                            <th>Long</th>
                                            <th>Start Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($all as $request) 
                                        <tr>
                                            <td>{{$noreq++}}</td>
                                            <td>{{$request->request_name}}</td>
                                            <td>{{$request->request_posisi}}</td>
                                            <td>{{$request->request_qty}}</td>
                                            <td>{{$request->location_name}}</td>
                                            <td>{{$request->request_long}}</td>
                                            <td>{{$request->request_date}}</td>
                                            <td>{{$request->request_status}}</td>
                                            <td><center>
                                            <a href="#" data-id="{{$request->request_id}}"  type="button" class="btn btn-primary btn-xs detail-req"><i class="fa fa-eye"></i></a>
                                            <a href="#" data-id="{{$request->request_id}}"  type="button" class="btn btn-warning btn-xs edit-req"><i class="fa fa-edit"></i></a>
                                            <a href="#hapus-request" data-idhapusrequest="{{$request->request_id}}" data-toggle="modal" data-target="#modal-hapus-request" type="button" class="btn-danger btn-xs"><i class="fa fa-trash"></i></a></center>
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
<div class="modal fade" id="requestAdd">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Request Talent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        @foreach($a as $company)
        <form action="{{route('companies.addReq', $company->company_id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        @endforeach
            {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body row">
                <div class="form-group col-sm-12">
                    @foreach($a as $company)
                    <label class="control-label ">Company Name : <b id="nameReq">{{$company->company_name}}</b></label>
                    <input type="hidden"  name="company_id" value="{{$company->company_id}}">
                    @endforeach
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Name / Alias</label>
                    <input type="text"  name="name" class="form-control" placeholder="Ex : WD-LARAVEL-JKTJOG" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">Start Date</label>
                    <input type="date"  name="start-date" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">Status</label>
                    <select name="status" class="form-control" required>
                    	<option value="active">Active</option>
                    	<option value="prepare">Prepare</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                <label for="" class="control-label">Location</label> <br>
                    <select name="location" class="select-skill form-control" required>
                        @foreach ($location as $loc)
                            <option value="{{$loc->location_id}}">{{$loc->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">How Long</label>
                    <input type="number"  name="long" class="form-control" placeholder="Month" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">QTY</label>
                    <input type="text"  name="qty" class="form-control" placeholder="Input QTY" required>
                </div>
                <div class="form-group col-sm-12">
                    <label for="" class="control-label">Position</label> <br>
                    <select name="posisi" class="select-skill form-control"  required>
                        @foreach ($jobs as $jobs)
                            <option value="{{$jobs->jobs_id}}">{{$jobs->jobs_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="control-label">Skill</label> <br>
                    <select name="skill[]" class="select-skill form-control"  multiple="multiple" required>
                        @foreach ($skill as $skill)
                            <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Skill Priority</label>
                    <input type="text"  name="priority" class="form-control" placeholder="Input Request Skill Priority">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail Specification*</label>
                    <textarea  name="detail" class="form-control" placeholder="Input Request Description" ></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Selection Recruitment Test Question</label>
                    <textarea  name="question" class="form-control" placeholder="Input Selection Recruitment Test Question" ></textarea>
                </div>
                <div class="form-group col-sm-12">
                <label class="control-label ">Upload File Question</label><br>
                <input type="file" accept=".pdf, .doc, .docx, .jpg,.jpeg" name="cv"  class="inputfile">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitRequest" type="submit" class="btn btn-success" data-dismis="modal">Add</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade show in" id="modal-detail">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Request</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action=""  method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <!-- Modal body -->

            <div class="modal-body row">
                <div class="form-group col-sm-4">
                    <label class="control-label ">Company Name</label>
                    <p id="comp-name"></p>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Request Name</label>
                    <p id="r-name"></p>
                </div>
                <div class="form-group col-sm-2">
                    <label class="control-label ">Status</label>
                    <p id="r-status"></p>
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label ">Start Date</label>
                    <p id="r-date"></p>
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label ">Location</label>
                    <p id="r-loc"></p>
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label ">Position</label>
                    <p id="r-pos"></p>
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label ">Skill</label>
                    <p id="r-skill"></p>
                </div>
                <div class="form-group col-sm-2">
                    <label class="control-label ">QTY</label>
                    <p id="r-qty"></p>
                </div>
                <div class="form-group col-sm-2">
                    <label class="control-label ">Long</label>
                    <p id="r-long"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Skill Priority</label>
                    <p id="r-priority"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail</label>
                    <p id="r-detail"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Question</label>
                    <p id="r-question"></p>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button id="submitCompanyq" type="submit" class="btn btn-success" data-dismis="modal">Add</button> -->
            </div>
        </form>
      </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade show in" id="requestEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Request Talent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('companies.editReq')}}"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body row">
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Name : <b id="comp-name"></b></label>
                    <input type="hidden" id="idReq" name="company_id" value="">
                    <input type="hidden" id="req_id" name="request_id" value="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Name / Alias</label>
                    <input type="text" id="req-name" name="name" class="form-control" placeholder="Ex : WD-LARAVEL-JKTJOG" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">Start Date</label>
                    <input type="date" id="req-date" name="start-date" class="form-control" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">Status</label>
                    <select name="status" id="req-status" class="form-control" required>
                    	<option value="active">Active</option>
                        <option value="prepare">Prepare</option>
                    	<option value="done">Done</option>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="control-label">Location</label> <br>
                    <select name="location" class=" form-control" id="req-loc" required>
                        @foreach ($location as $location)
                            <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">How Long</label>
                    <input type="number" id="req-long" name="long" class="form-control" placeholder="Month" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">QTY</label>
                    <input type="number" id="req-qty" name="qty" class="form-control" placeholder="Input QTY" required>
                </div>
                <div class="form-group col-sm-12">
                    <label for="" class="control-label">Position</label> <br>
                    <select name="posisi" class=" form-control" id="req-position" >
                        @foreach ($jobs2 as $jobs)
                            <option value="{{$jobs->jobs_id}}">{{$jobs->jobs_title}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="" class="control-label">Skill</label> <br>
                    <select name="skill[]" class="select-skill form-control" id="req-skill" multiple="multiple" required>
                        @foreach ($skill2 as $skill)

                            <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Skill Priority</label>
                    <input type="text" id="req-priority" name="priority" class="form-control" placeholder="Input Request Skill Priority">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail Specification*</label>
                    <textarea id="req-detail" name="detail" class="form-control" placeholder="Input Company Description"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Question</label>
                    <textarea id="req-question" name="question" class="form-control" placeholder="Input Request Question"></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Upload File Question</label><br>
                    <input id="req-file" type="file" accept=".pdf, .doc, .docx, .jpg,.jpeg" name="cv" id="cv" class="inputfile">
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitRequest" type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
      </div>
    </div>
</div>


                <div class="modal fade" id="modal-hapus-request">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <form action="" id="formdeleterequest" method="post" >
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    
                                    <input type="hidden" name="request_id" id="request_id">
                                    
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>

$(".select-skill").select2({
    width: '100%',
    placeholder:'Pilih'
});





$("#cv").change(function(){
        var cv = $(this).val();
    });



</script>

<script type="text/javascript">

$(document).on('click', '.detail-req', function() { 
    var id   = $(this).data('id');
	var comp = $(this).data('comp');

    $('.modal-body #comp-name').html(comp);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url     :"{{ route('companies.getReq')}}",
        type    : 'POST',
        dataType: 'json',
        data :{
            request_id:id
        },
        success:function(data)
        {   
            var array="";
            var i;
            for(i in data){
                array += data[i].skill_name+'<br>';
            }

            $('.modal-body #comp-name').html(data[0].company_name);
            $('.modal-body #r-name').html(data[0].request_name);
            $('.modal-body #r-status').html(data[0].request_status);
            $('.modal-body #r-date').html(data[0].request_date);
            $('.modal-body #r-loc').html(data[0].location_name);
            $('.modal-body #r-pos').html(data[0].jobs_title);
            $('.modal-body #r-priority').html(data[0].request_skill_prio);
            $('.modal-body #r-skill').html(array);
            $('.modal-body #r-qty').html(data[0].request_qty);
            $('.modal-body #r-long').html(data[0].request_long);
            $('.modal-body #r-detail').html(data[0].request_detail);
            $('.modal-body #r-question').html(data[0].request_question);
        }
    });
    $('#modal-detail').modal('show');
});

$(document).on('click', '.edit-req', function() {
    var id   = $(this).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url     :"{{ route('companies.getReq')}}",
        type    : 'POST',
        dataType: 'json',
        data :{
            request_id:id
        },
        success:function(data)
        {
            
            var array="";
            var i;
            for(i in data){
                $('.modal-body #req-skill option[value="'+data[i].cp_skill_id+'"]').prop('selected', true);
            }

            $('.modal-body #comp-name').html(data[0].company_name);
            $('.modal-body #idReq').val(data[0].company_id);
            $('.modal-body #req_id').val(data[0].request_id);
            $('.modal-body #req-name').val(data[0].request_name);
            // $('.modal-body #req-status').val(data.request_status);
            // document.getElementById(eid).options[0].selected = 'selected';
            $('.modal-body #req-date').val(data[0].request_date);
            // $('.modal-body #req-loc').val(data[0].location_name);
            $('.modal-body #req-loc option[value="'+data[0].request_location+'"]').prop('selected', true);
            $('.modal-body #req-qty').val(data[0].request_qty);
            $('.modal-body #req-position option[value="'+data[0].cp_jobs_id+'"]').prop('selected', true);
            $('.modal-body #req-skill option[value="'+data[0].cp_skill_id+'"]').prop('selected', true);
            $('.modal-body #req-priority').val(data[0].request_skill_prio);
            $('.modal-body #req-long').val(data[0].request_long);
            $('.modal-body #req-detail').val(data[0].request_detail);
            // $('.modal-body #req-status').options[2].selected = 'selected';
            $('.modal-body #req-status option[value="'+data[0].request_status+'"]').prop('selected', true);;
            $('.modal-body #req-question').val(data[0].request_question);
            $('.modal-body #req-file').val(data[0].request_file);
        
        }
    });
    $('#requestEdit').modal('show');
});




// $(document).on('click', '#submitCompany', function(e){
//     var isempty          = [];
//     var company_name    = $('#com-name').val();
//     var company_mail    = $('#com-mail').val();
//     var company_phone   = $('#com-phone').val();
//     var company_address = $('#com-address').val();
//     var company_desc    = $('#com-desc').val();
//     if(company_name == "") {
//         $('#company-name').addClass('is-invalid');
//         isempty.push("true");
//     }else{
//         $('#company-name').removeClass('is-invalid');
//         isempty.push("false");
//     }

//     if(isempty.includes('true')){
//         swal('Gagal', 'Mohon Isi Semua Kolom', "error");
//     } else {
//         swal({
//             title : 'Perhatian!',
//             text : 'Apakah Anda Yakin Ingin Menyimpan Data Company ?',
//             type : 'warning', 
//             cancelButtonText: 'Kembali', 
//             showCancelButton: true, 
//             confirmButtonText: "Simpan"
//         }).then((result) => {
//             if (result.value){ 
//                 $.ajax({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//                     },
//                     url:"{{ route('company.add')}}",
//                     type: 'POST',
//                     data :{
//                         company_name:company_name,
//                         company_mail:company_mail,
//                         company_phone:company_phone,
//                         company_address:company_address,
//                         company_desc:company_desc
//                     },
//                     success:function(response)
//                     {
//                         if(response == 'berhasil'){
//                             swal({title : 'Berhasil',text : 'Company Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});
//                         } else {
//                             swal('Gagal', 'Penambahan Company gagal!', "error");
//                         }
//                     }
//                 });
//             }        
//         });
//     }
// });

$(document).ready(function() {
                $('#req-table').DataTable();
              });



$(document).on('click','a[href="#hapus-request"]',function(){
                var requestidhapus = $(this).data('idhapusrequest');
                var urlrequestidhapus = '{{ route("companies.delReq", ":requestidhapus") }}';
                urlrequestidhapus = urlrequestidhapus.replace(':requestidhapus', requestidhapus);
                $("#formdeleterequest").attr('action', urlrequestidhapus);
              });

              function submitDelete(){
                    $('#formdeleterequest').submit();
              }


</script>
@endpush

@endsection