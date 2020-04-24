<!-- @extends('admin.layout.apps') -->

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

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <!-- <div class="form-group">
                        <div class="col">
                            <span>Filter :</span>
                            <select id="job-type" class="form-control">
                                <option selected="" disabled="">Type Time</option>
                                <option value="">All</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="internship">Internship</option>
                                <option value="parttime">Parttime</option>
                            </select>
                            <select id="position" class="form-control">
                                <option selected="" disabled="">Position</option>
                                <option value="">All</option>
                            </select>
                            <select id="location" class="form-control">
                                <option selected="" disabled="">Location</option>
                                <option value="">All</option>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col">
                            <button id="add_com" name="add_com" class="btn btn-primary" type="button" data-toggle="modal" data-target="#companyAdd"><i class="fa fa-plus"></i> Add Company</button>
                        </div>
                        <!-- <div class="col">
                            <a href="{{route('jobs.create')}}" class="btn btn-primary "><i class="fa fa-plus"> Add Request</i></a>
                        </div> -->
                    </div>
                    <!-- <div class="form-group">
                        <div class="col">
                            <span>Delete selected :</span>
                            <button style="margin-left: 3px;" id="delete" name="delete" class="btn btn-danger " type="button"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div> -->
                </div>

            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="all-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name Company</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>QTY</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
<div class="modal fade" id="companyAdd">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Company</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('company.add')}}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <!-- Modal body -->
            <div class="modal-body row">
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Name*</label>
                    <input type="text" id="com-name" name="com-name" class="form-control" placeholder="Input Company Name" required="">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Username</label>
                    <input type="text" id="com-username" name="com-username" class="form-control" placeholder="Input Company Username">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company password</label>
                    <input type="password" id="com-password" name="com-password" class="form-control" placeholder="Input Company Password">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company PIC</label>
                    <input type="text" id="com-pic" name="com-pic" class="form-control" placeholder="Input Company PIC">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Email</label>
                    <input type="mail" id="com-mail" name="com-mail" class="form-control" placeholder="Input Company Email">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label ">Company Phone</label>
                    <input type="number" id="com-phone" name="com-phone" class="form-control" placeholder="Input Company Phone">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Address</label>
                    <input type="text" id="com-address" name="com-address" class="form-control" placeholder="Input Company Address">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Company Description</label>
                    <textarea id="com-desc" name="com-desc" class="form-control" placeholder="Input Company Description"></textarea>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitCompanyq" type="submit" class="btn btn-success" data-dismis="modal">Add</button>
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
        <form action="{{route('company.addReq')}}" method="post" accept-charset="utf-8">
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
                    <label class="control-label ">Location*</label>
                    <input type="text" id="req-loc" name="location" class="form-control" placeholder="JKT / JOG / JKTJOG" required>
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
                    <select name="posisi" class="select-skill form-control" id="">
                        @foreach ($jobs as $jobs)
                            <option value="{{$jobs->jobs_id}}">{{$jobs->jobs_title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="" class="control-label">Skill</label> <br>
                    <select name="skill[]" class="select-skill form-control" id="" multiple="multiple">
                        @foreach ($skill as $skill)
                            <option value="{{$skill->skill_id}}">{{$skill->skill_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail Specification*</label>
                    <textarea id="req-detail" name="detail" class="form-control" placeholder="Input Company Description" required></textarea>
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


<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>
$(".select-skill").select2({
    width: '30%',
    placeholder:'Pilih'
});
</script>

<script type="text/javascript">
$(document).on('click', '.addReq', function() {
	var id   = $(this).data('id');
	var name = $(this).data('name')
    $('.modal-body #nameReq').html(name);
    $('.modal-body #idReq').val(id);
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

$(document).on('click', '#submitRequest', function(e){
	var isempty        = [];
	var request_id 	   = $('#idReq').val();
	var request_name   = $('#req-detail').val();
	var request_detail = $('#req-detail').val();
	var request_loc    = $('#req-loc').val();
	var request_date   = $('#req-date').val();
	var request_long   = $('#req-long').val();
	var request_qty    = $('#req-qty').val();
    if(request_detail == "" || request_loc == "") {
        $('#req-detail').addClass('is-invalid');
        $('#req-loc').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#company-name').removeClass('is-invalid');
        isempty.push("false");
    }

    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Request ?',
            type : 'warning',
            cancelButtonText: 'Kembali',
            showCancelButton: true,
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('company.addReq')}}",
                    type: 'POST',
                    data :{
                       	req_id		: request_id,
                       	req_detail	:  request_detail,
                       	req_date	: request_date,
                       	req_long	: request_long,
                       	req_qty		: request_qty,
                       	req_loc		: request_loc
                    },
                    success:function(response)
                    {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Request Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});
                        } else {
                            swal('Gagal', 'Penambahan Reuest Talent gagal!', "error");
                        }
                    }
                });
            }
        });
    }
});

$(document).ready(function(){
    all_table;
});

function reload(){
    all_table.ajax.reload();
}

var all_table = $('#all-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('company.all')}}",
            type:"GET"
        },
        columns:[
        {data:"company_name",defaultColumn:"-",visible:true},
        {data:"company_address",defaultColumn:"-",visible:true},
        {data:"company_email",defaultColumn:"-",visible:true},
        {data:"company_phone",defaultColumn:"-",visible:true},
        {data:"qty",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});


$(document).on('click', '#delete', function(){
    var id = [];
    swal({
          title: 'Delete',
          text: 'If you delete this jobs, applied data will deleted. Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel'
        }).then((result) =>
        {
            if (result.value)
            {

                $('.checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('jobsAll.delete')}}",
                            method: "get",
                            data :{id:id},
                            success:function(response)
                            {
                                if(response == 'deleted'){
                                swal('Success','Data deleted','success');
                                 }
                                 else{
                                    swal('Error', 'Data is being used', 'error');
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }

        });
});






</script>
@endpush

@endsection
