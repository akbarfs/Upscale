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
                <h3>Company Assign</h3>
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
                    <li class="active">Assign</li>
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
                        </div>
                    </div>
                </div>
                    
            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="assign-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Talent name</th>
                                            <th>Position</th>
                                            <th>Prefered  Location</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all as $item2)
                                        <tr>
                                            <td>{{$noassign++}}</td>
                                            <td>{{$item2->talent_name}}</td>
                                            <td>{{$item2->jobs_title}}</td>
                                            <td>{{$item2->location_name}}</td>
                                            <td>
                                            @php
                                            if($item2->assign_status=='review_rt') { $status_text = '2. Review RT'; $status_color='info'; }
                                            elseif($item2->assign_status=='interviewing') { $status_text = '3. Interviewing'; $status_color='success'; }
                                            elseif($item2->assign_status=='report_interview') { $status_text = '4. Report Interview'; $status_color='success'; }
                                            elseif($item2->assign_status=='offering') { $status_text = '5.a. Offering'; $status_color='dark'; }
                                            elseif($item2->assign_status=='hired') { $status_text = '5.b. Hired'; $status_color='primary'; }
                                            elseif($item2->assign_status=='reject') { $status_text = '5.c. Rejected'; $status_color='danger'; }
                                            elseif($item2->assign_status=='cancel') { $status_text = '5.d. Cancelled'; $status_color='secondary'; }
                                            else { $status_text = '1. Send RT'; $status_color='light'; }

                                            if(strlen(strip_tags($item2->assign_desc))>40){ $status_desc = substr(strip_tags($item2->assign_desc), 0,40).'...'; }
                                            else{ $status_desc = strip_tags($item2->assign_desc); }
                                            @endphp
                                            <a href="#change-status" data-id="{{$item2->assign_request_id}}" data-toggle="modal" data-target="#modal-status" type="button" class="btn btn-{{$status_color}} btn-xs change-status" data-placement="top">{{$status_text}}</a>&nbsp;&nbsp;{{substr($item2->assign_status_date, 0,10)}}<br><span title="{{strip_tags($item2->assign_desc)}}">{{$status_desc}}</span>
                                            </td>
                                            <td>
                                            <center>
                                            <a href="" type="button" data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa fa-pencil-square-o"></i></a></center>
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

<div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Status Assign Talent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('talent.changestatusassign')}}" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
            <div class="modal-body substeps-modal">
                <input type="hidden" name="assign_id" id="assign_id" value="">
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="send_rt"></div></div>
                    <input type="text" class="form-control" value="1. Send Report Talent" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="review_rt"></div></div>
                    <input type="text" class="form-control" value="2. Review Report Talent" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="interviewing"></div></div>
                    <input type="text" class="form-control" value="3. Interviewing" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="report_interview"></div></div>
                    <input type="text" class="form-control" value="4. Report Interview" readonly="">
                </div>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="offering"></div></div>
                    <input type="text" class="form-control" value="5.a. Offering" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="hired"></div></div>
                    <input type="text" class="form-control" value="5.b. Hired" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="reject"></div></div>
                    <input type="text" class="form-control" value="5.c. Reject" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="cancel"></div></div>
                    <input type="text" class="form-control" value="5.d. Cancelled" readonly="">
                </div>
                <hr>
                <div class="input-group">
                    <div class="input-group-prepend "><div class="input-group-text ">Note</div></div>
                    <input type="text" class="form-control" name="note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='submit-status1' class="btn btn-success" data-dismiss="">Submit</button>
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

$(document).ready(function() {
    $('#assign-table').DataTable();
});


// $(document).ready(function(){
//     all_table;
// });
// function reload(){
//     all_table.ajax.reload();
// }

// var all_table = $('#assign-table').DataTable({
//         autoWidth:false,
//         filter:true,
//         info:false,
//         paging:true,
//         processing:false,
//         ajax:{
//             url:"{{route('companies.dataassign')}}",
//             type:"GET"
//         },
//         columns:[
//         {data:"talent_name",defaultColumn:"-",visible:true},
//         {data:"jobs_title",defaultColumn:"-",visible:true},
//         {data:"location_name",defaultColumn:"-",visible:true},
//         {data:"assign_status",defaultColumn:"-",visible:true},
//         // {data:"action",orderable:false,searchable:false},
//         ]
// });

$(document).on('click', '.change-status', function() {
    var id   = $(this).data('id');
    $('.modal-body #assign_id').val(id);
});

</script>
@endpush

@endsection