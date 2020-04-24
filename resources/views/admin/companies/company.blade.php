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
                <h1>Company</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Company</li>
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

@if ($message = Session::get('Failed'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                            <button  class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-add-company"><i class="fa fa-plus"></i> Add Company</button>
                        </div>
                    </div>
                </diV>
            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="all-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name Company</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>QTY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($company as $item2)
                                    <tr>
                                        <td>{{$nocomp++}}</td>
                                        <td>{{$item2->company_name}}</td>
                                        <td>{{$item2->company_address}}</td>
                                        <td>{{$item2->company_email}}</td>
                                        <td>{{$item2->company_phone}}</td>
                                        <td>{{$item2->company_status}}</td>
                                        <td>
                                        @php
                                        $qty = DB::table('request')->where([['request_company_id', '=', $item2->company_id], ['request_status', '!=', 'done']])->count();
                                        @endphp
                                        {{$qty}}
                                        </td>
                                        <td align="center">
                                            <a href="#detail-company" data-detailcompany="{{$item2->company_id}}" data-toggle="modal" data-target="#modal-detail-company" type="button" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>&nbsp;
                                            <a href="{{route('companies.request',$item2->company_id)}}" type="button" class="btn btn-success btn-xs "><i class="fa fa-list-alt"></i></a>&nbsp;
                                            <a href="{{route('companies.assign',$item2->company_id)}}" type="button" class="btn btn-success btn-xs "><i class="fa fa-user"></i></a>&nbsp;
                                            <a href="#edit-company" data-idcompany="{{$item2->company_id}}" data-toggle="modal" data-target="#modal-edit-company" type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>&nbsp;  
                                            <a href="#hapus-company" data-idhapuscompany="{{$item2->company_id}}" data-toggle="modal" data-target="#modal-hapus-company" type="button" class="btn-danger btn-xs"><i class="fa fa-trash"></i></a>  
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
</div>


<!-- The Modal -->
<div class="modal fade" id="modal-add-company">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('companies.store')}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body row">
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Name*</label>
                    <input type="text"  name="company_name" class="form-control" placeholder="Input Company Name" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Username</label>
                    <input type="text"  name="company_username" class="form-control" placeholder="Input Company Username" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company password</label>
                    <input type="password" id="company_password" name="company_password" class="form-control" placeholder="Input Company Password" required="">
                    
                    <!-- <i id="icon" class="fa fa-eye-slash"></i> -->
                    
                    <div>
                        <input type="checkbox" id="chk">
                        <label id="showhide" class="label">Show Password</label>
                    </div>
                   
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company PIC</label>
                    <input type="text"  name="company_pic" class="form-control" placeholder="Input Company PIC" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Email</label>
                    <input type="email"  name="company_mail" class="form-control" placeholder="Input Company Email" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Phone</label>
                    <input type="number"  name="company_phone" class="form-control" placeholder="Input Company Phone">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Status</label>
                    <select name="company_status" class="form-control">
                        <option value="active">Active</option>
                        <option value="non-active">Non-active</option>  
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Address</label>
                    <input type="text"  name="company_address" class="form-control" placeholder="Input Company Address">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Description</label>
                    <textarea name="company_desc" class="form-control" placeholder="Input Company Description"></textarea>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismis="modal">Add</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="modal-edit-company">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="" id="form-edit-company" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <!-- Modal body -->
            {{ method_field('PUT') }}
            <div class="modal-body row">
                <input type="hidden" id="comp-id" name="companyid">
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Name*</label>
                    <input type="text" id="comp-name" name="company_name" class="form-control" placeholder="Input Company Name" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Username</label>
                    <input type="text" id="comp-username" name="company_username" class="form-control" placeholder="Input Company Username " required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company New Password</label>
                    <input type="password" id="company_password2" name="company_password" class="form-control" placeholder="Input New Company Password">
                    <div>
                        <input type="checkbox" id="chk2">
                        <label id="showhide2" class="label">Show Password</label>
                    </div>
                   
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company PIC</label>
                    <input type="text" id="comp-pic" name="company_pic" class="form-control" placeholder="Input Company PIC">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Email</label>
                    <input type="email" id="comp-mail" name="company_mail" class="form-control" placeholder="Input Company Email">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Phone</label>
                    <input type="number" id="comp-phone" name="company_phone" class="form-control" placeholder="Input Company Phone">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Status</label>
                    <select id="comp-status" name="company_status" class="form-control">
                        <option value="active">Active</option>
                        <option value="non-active">Non-active</option>  
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Address</label>
                    <input type="text" id="comp-address" name="company_address" class="form-control" placeholder="Input Company Address">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Description</label>
                    <textarea id="comp-desc" name="company_desc" class="form-control" placeholder="Input Company Description"></textarea>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade show in" id="modal-detail-company">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="" id="form-detail-company" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <!-- Modal body -->
            {{ method_field('PUT') }}
            <div class="modal-body row">
            <div class="form-group col-sm-12">
                    <label class="control-label "><strong>Company Name :</strong></label>
                    <p id="company-name" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label "><strong>Company Username :</strong></label>
                    <p id="company-username" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label "><strong>Company PIC :</strong></label>
                    <p id="company-pic" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label "><strong>Company Email :</strong></label>
                    <p id="company-mail" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label "><strong>Company Phone :</strong></label>
                    <p id="company-phone" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label "><strong>Company Address :</strong></label>
                    <p id="company-address" class="form-control-static"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label "><strong>Company Description :</strong></label>
                    <p id="company-description" class="form-control-static"></p>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
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
        <form action="{{route('company.addReq')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body row">
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Name : <b id="nameReq"></b></label>
                    <input type="hidden" id="idReq" name="company_id" value="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Name / Alias</label>
                    <input type="text" id="req-name" name="name" class="form-control" placeholder="Ex : WD-LARAVEL-JKTJOG" required>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">Start Date</label>
                    <input type="date" id="req-date" name="start-date" class="form-control">
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
                    <select name="location" class="select-skill form-control" id="location">
                        @foreach ($location as $location)
                            <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">How Long</label>
                    <input type="number" id="req-long" name="long" class="form-control" placeholder="Month">
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label ">QTY</label>
                    <input type="text" id="req-qty" name="qty" class="form-control" placeholder="Input QTY">
                </div>
                <div class="form-group col-sm-12">
                    <label for="" class="control-label">Position</label> <br>
                    <select name="posisi" class="select-skill form-control" id="req-position">
                        @foreach ($jobs as $jobs)
                            <option value="{{$jobs->jobs_id}}">{{$jobs->jobs_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="" class="control-label">Skill</label> <br>
                    <select name="skill[]" class="select-skill form-control" id="req-skill" multiple="multiple">
                        @foreach ($skill as $skill)
                            <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail Specification*</label>
                    <textarea id="req-detail" name="detail" class="form-control" placeholder="Input Request Description" required></textarea>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Selection Recruitment Test Question/label>
                    <textarea id="req-question" name="question" class="form-control" placeholder="Input Selection Recruitment Test Question" required></textarea>
                </div>
                <div class="form-group col-sm-12">
                <label class="control-label ">Upload File Question</label><br>
                <input type="file" accept=".pdf, .doc, .docx, .jpg,.jpeg" name="cv" id="cv" class="inputfile">
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

                <div class="modal fade" id="modal-hapus-company">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletecompany" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-body">
                                    <input type="hidden" name="company_id" id="company_id">
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

<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
 @push('script')

<script>
$(document).ready(function() {
    $('#all-table').DataTable();
});


              $(document).on('click','a[href="#edit-company"]',function(e){
                    var companyid = $(this).data('idcompany');
                    $.ajax({
                        headers:{ 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                        url:'/admin/companies/'+companyid+'/edit',
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#comp-id').val(data.company_id);
                            $('#comp-name').val(data.company_name);
                            $('#comp-username').val(data.company_username);
                            $('#comp-pic').val(data.company_pic);
                            $('#comp-phone').val(data.company_phone);
                            $('#comp-status option[value="'+data.company_status+'"]').prop('selected', true);
                            $('#comp-mail').val(data.company_email);
                            $('#comp-address').val(data.company_address);
                            $('#comp-desc').val(data.company_description);
                            var url2 = '{{ route("companies.update", ":companyid") }}';
                            url2 = url2.replace(':companyid', companyid);
                            $("#form-edit-company").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#detail-company"]',function(e){
                    var id = $(this).data('detailcompany');
                    $.ajax({
                        headers:{ 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
                        url:"{{ route('companies.getdetail')}}",
                        type:'POST',
                        dataType:'json',
                        data :{
                                company_id:id
                            },
                        success:function(data){
                            
                            $('#company-name').html(data.company_name);
                            $('#company-username').html(data.company_username);
                            $('#company-pic').html(data.company_pic);
                            $('#company-phone').html(data.company_phone);
                            $('#company-mail').html(data.company_email);
                            $('#company-address').html(data.company_address);
                            $('#company-description').html(data.company_description);
                        }
                    });
                    
              });


              $(document).on('click','a[href="#hapus-company"]',function(){
                var companyidhapus = $(this).data('idhapuscompany');
                var urlcompanyidhapus = '{{ route("companies.destroy", ":companyidhapus") }}';
                urlcompanyidhapus = urlcompanyidhapus.replace(':companyidhapus', companyidhapus);
                $("#formdeletecompany").attr('action', urlcompanyidhapus);
              });

              function submitDelete(){
                    $('#formdeletecompany').submit();
              }
</script>
<script>
var masukanpass = document.getElementById('company_password'),
      chk  = document.getElementById('chk'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpass.setAttribute('type', 'text');
           label.textContent = 'Hide Password';
       } else {

           masukanpass.setAttribute('type', 'password');
           label.textContent = 'Show Password';
       }
 
     }

     var masukanpass2 = document.getElementById('company_password2'),
      chk2  = document.getElementById('chk2'),
      label2 = document.getElementById('showhide2');


     chk2.onclick = function () {

      if(chk2.checked) {

           masukanpass2.setAttribute('type', 'text');
           label2.textContent = 'Hide Password';
       } else {

           masukanpass2.setAttribute('type', 'password');
           label2.textContent = 'Show Password';
       }
 
     }

// var input = document.getElementById('com-password'),
//     icon = document.getElementById('icon');

//    icon.onclick = function () {

//      if(input.className == 'active') {
//         input.setAttribute('type', 'text');
//         icon.className = 'fa fa-eye';
//        input.className = '';

//      } else {
//         input.setAttribute('type', 'password');
//         icon.className = 'fa fa-eye-slash';
//        input.className = 'active';
//     }

//    }
</script>

<script>
$(".select-skill").select2({
    width: '30%',
    placeholder:'Pilih'
});
</script>



@endpush

@endsection
