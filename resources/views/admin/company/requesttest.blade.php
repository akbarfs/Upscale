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
                    <div class="form-group">
                        <!-- <div class="col">
                            <button id="add_com" name="add_com" class="btn btn-primary" type="button" data-toggle="modal" data-target="#companyAdd"><i class="fa fa-plus"></i> Add Company</button>
                        </div> -->
                    </div>
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
                                            <th>Company Name</th>
                                            <th>Request Name</th>
                                            <th>QTY</th>
                                            <th>Location</th>
                                            <th>Long</th>
                                            <th>Start Date</th>
                                            <th>Status</th>
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
<div class="modal fade show in" id="modal-detail">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Detail Request</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('company.add')}}" method="post" accept-charset="utf-8">
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
                <div class="form-group col-sm-2">
                    <label class="control-label ">QTY</label>
                    <p id="r-qty"></p>
                </div>
                <div class="form-group col-sm-2">
                    <label class="control-label ">Long</label>
                    <p id="r-long"></p>
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label ">Detail</label>
                    <p id="r-detail"></p>
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
<div class="modal fade show in" id="requestEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Request Talent</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{route('company.editReq')}}" method="post" accept-charset="utf-8">
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
                    <select name="status" id="req-status" class="form-control" required>
                    	<option value="active">Active</option>
                        <option value="prepare">Prepare</option>
                    	<option value="done">Done</option>
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
                    <input type="number" id="req-qty" name="qty" class="form-control" placeholder="Input QTY">
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

<script type="text/javascript">
$(document).on('click', '.detail-req', function() { 
    var id   = $(this).data('id');
	var comp = $(this).data('comp');

    $('.modal-body #comp-name').html(comp);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url     :"{{ route('company.getReq')}}",
        type    : 'POST',
        dataType: 'json',
        data :{
            request_id:id
        },
        success:function(data)
        {
            $('.modal-body #r-name').html(data.request_name);
            $('.modal-body #r-status').html(data.request_status);
            $('.modal-body #r-date').html(data.request_date);
            $('.modal-body #r-loc').html(data.request_location);
            $('.modal-body #r-qty').html(data.request_qty);
            $('.modal-body #r-long').html(data.request_long);
            $('.modal-body #r-detail').html(data.request_detail);
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
        url     :"{{ route('company.getReq')}}",
        type    : 'POST',
        dataType: 'json',
        data :{
            request_id:id
        },
        success:function(data)
        {
            $('.modal-body #req-name').val(data.request_name);
            // $('.modal-body #req-status').val(data.request_status);
            // document.getElementById(eid).options[0].selected = 'selected';
            $('.modal-body #req-date').val(data.request_date);
            $('.modal-body #req-loc').val(data.request_location);
            $('.modal-body #req-qty').val(data.request_qty);
            $('.modal-body #req-long').val(data.request_long);
            $('.modal-body #req-detail').val(data.request_detail);
            // $('.modal-body #req-status').options[2].selected = 'selected';
            $('.modal-body #req-status').selectedIndex = 2;
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
            url:"{{route('company.allrequest')}}",
            type:"GET"
        },
        columns:[
        {data:"company_name",defaultColumn:"-",visible:true},
        {data:"request_name",defaultColumn:"-",visible:true},
        {data:"request_qty",defaultColumn:"-",visible:true},
        {data:"request_location",defaultColumn:"-",visible:true},
        {data:"request_long",defaultColumn:"-",visible:true},
        {data:"request_date",defaultColumn:"-",visible:true},
        {data:"request_status",defaultColumn:"-",visible:true},
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