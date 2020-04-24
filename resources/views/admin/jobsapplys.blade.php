@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                            <span>Filter :</span>
                            <select id="job-type" class="form-control">
                                <option value="all">All</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="internship">Internship</option>
                                <option value="parttime">Parttime</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <span>Change status to :</span>
                            <select id="status" name="status" class="form-control form-control biarpas">
                                <option value="unprocess">Unprocess</option>
                                <option value="interview">Interview</option>
                                <option value="hired">Hired</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            <button name="move" id="move" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Move</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <span>Delete selected :</span>
                            <button style="margin-left: 3px;" id="delete" name="delete" class="btn btn-danger " type="button"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div id="alls" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="true"><strong>All</strong> 
{{--                                 <span class="badge badge-primary">{{$countall}}</span>
 --}}                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#unprocess" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Unprocess0</strong> 
{{--                                 <span class="badge badge-primary">{{$countU}}</span>
 --}}                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#interview" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Interview</strong> 
{{--                                 <span class="badge badge-primary">{{$countI}}</span>
 --}}                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#hired" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Hired</strong> 
{{--                                 <span class="badge badge-primary">{{$countH}}</span>
 --}}                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#reject" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Rejected</strong> 
{{--                                 <span class="badge badge-primary">{{$countR}}</span>
 --}}                            </a>

                          </div>
                        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                <div id="all" class="tab-pane fade show active">
                                    <table id="all-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="unprocess" class="tab-pane fade">
                                    <table id="all_unprocess" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="interview" class="tab-pane fade">
                                    <table id="all_interview" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="hired" class="tab-pane fade ">
                                    <table id="all_hired" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="reject" class="tab-pane fade ">
                                    <table id="all_reject" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                <div style="display: none;" id="fulltimes" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#allF" role="tab" aria-controls="nav-home" aria-selected="true"><strong>All</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#unprocessF" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Unprocess</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#interviewF" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Interview</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#hiredF" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Hired</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#rejectF" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Rejected</strong> 
                            </a>

                          </div>
                        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                <div id="allF" class="tab-pane fade show active">
                                    <table id="fulltime_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="unprocessF" class="tab-pane fade">
                                    <table id="fulltime_unprocess" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="interviewF" class="tab-pane fade">
                                    <table id="fulltime_interview" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="hiredF" class="tab-pane fade ">
                                    <table id="fulltime_hired" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="rejectF" class="tab-pane fade ">
                                    <table id="fulltime_reject" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div style="display: none;" id="parttimes" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#allP" role="tab" aria-selected="true"><strong>All</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#unprocessP" role="tab"  aria-selected="true"><strong>Unprocess</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#interviewP" role="tab"  aria-selected="false"><strong>Interview</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#hiredP" role="tab"  aria-selected="false"><strong>Hired</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#rejectP" role="tab" aria-selected="false"><strong>Rejected</strong> 
                            </a>

                          </div>
                        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                <div id="allP" class="tab-pane fade show active">
                                    <table id="parttime_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="unprocessP" class="tab-pane fade">
                                    <table id="parttime_unprocess" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="interviewP" class="tab-pane fade">
                                    <table id="parttime_interview" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="hiredP" class="tab-pane fade ">
                                    <table id="parttime_hired" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="rejectP" class="tab-pane fade ">
                                    <table id="parttime_reject" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div style="display: none;" id="internships" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#allI" role="tab" aria-selected="true"><strong>All</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#unprocessI" role="tab"  aria-selected="true"><strong>Unprocess</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#interviewI" role="tab"  aria-selected="false"><strong>Interview</strong> 
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#hiredI" role="tab"  aria-selected="false"><strong>Hired</strong> 
                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#rejectI" role="tab" aria-selected="false"><strong>Rejected</strong> 
                            </a>

                          </div>
                        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                <div id="allI" class="tab-pane fade show active">
                                    <table id="internship_table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="unprocessI" class="tab-pane fade">
                                    <table id="internship_unprocess" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="interviewI" class="tab-pane fade">
                                    <table id="internship_interview" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="hiredI" class="tab-pane fade ">
                                    <table id="internship_hired" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="rejectI" class="tab-pane fade ">
                                    <table id="internship_reject" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
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
        <!-- .animated -->
        
    </div>
    <!-- .content -->


</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')
<script type="text/javascript">

$(document).ready(function(){
    all_table;
    all_unprocess;
    all_interview;
    all_hired;
    all_reject;
    fulltime_table;
    fulltime_unprocess;
    fulltime_interview;
    fulltime_hired;
    fulltime_reject;
    parttime_table;
    parttime_unprocess;
    parttime_interview;
    parttime_hired;
    parttime_reject;
    internship_table;
    internship_unprocess;
    internship_interview;
    internship_hired;
    internship_reject;
});

$(document).on('change', '#job-type', function(){
    var select_status = $('#job-type').val();
        if(select_status == 'fulltime'){
            $('#alls').hide();
            $('#fulltimes').show();
            $('#parttimes').hide();
            $('#internships').hide();
        }
        else if(select_status == 'all'){
            $('#alls').show();
            $('#fulltimes').hide();
            $('#parttimes').hide();
            $('#internships').hide();
        }
        else if(select_status == 'parttime'){
            $('#parttimes').show();
            $('#fulltimes').hide();
            $('#alls').hide();
            $('#internships').hide();
        }
        else if(select_status == 'internship'){
            $('#internships').show();
            $('#fulltimes').hide();
            $('#alls').hide();
            $('#parttimes').hide();
        }

});

function reload(){
    all_table.ajax.reload();
    all_unprocess.ajax.reload();
    all_interview.ajax.reload();
    all_hired.ajax.reload();
    all_reject.ajax.reload();
    fulltime_table.ajax.reload();
    fulltime_unprocess.ajax.reload();
    fulltime_interview.ajax.reload();
    fulltime_hired.ajax.reload();
    fulltime_reject.ajax.reload();
    parttime_table.ajax.reload();
    parttime_unprocess.ajax.reload();
    parttime_interview.ajax.reload();
    parttime_hired.ajax.reload();
    parttime_reject.ajax.reload();
    internship_table.ajax.reload();
    internship_unprocess.ajax.reload();
    internship_interview.ajax.reload();
    internship_hired.ajax.reload();
    internship_reject.ajax.reload();
}

var all_table = $('#all-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('jobsapply.all')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var fulltime_table = $('#fulltime_table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('jobsapply.fulltime')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var parttime_table = $('#parttime_table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('jobsapply.parttime')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var internship_table = $('#internship_table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('jobsapply.internship')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});


var all_unprocess = $('#all_unprocess').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('all.unprocess')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var parttime_unprocess = $('#parttime_unprocess').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('parttime.unprocess')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var internship_unprocess = $('#internship_unprocess').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('internship.unprocess')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var fulltime_unprocess = $('#fulltime_unprocess').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.unprocess')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});


var all_interview = $('#all_interview').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('all.interview')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var internship_interview = $('#internship_interview').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('internship.interview')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var parttime_interview = $('#parttime_interview').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('parttime.interview')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var fulltime_interview = $('#fulltime_interview').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.interview')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});





var all_hired = $('#all_hired').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('all.hired')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var internship_hired = $('#internship_hired').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('internship.hired')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var parttime_hired = $('#parttime_hired').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('parttime.hired')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var fulltime_hired = $('#fulltime_hired').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.hired')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});


var all_reject = $('#all_reject').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('all.reject')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var internship_reject = $('#internship_reject').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('internship.reject')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var parttime_reject = $('#parttime_reject').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('parttime.reject')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

var fulltime_reject = $('#fulltime_reject').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.reject')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

$(document).on('click', '#move', function(){
    var id = [];
    var data = $('#status').val();
    swal({
          title: 'Move',
          text: 'Are you sure to move this data?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Move',
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
                            url:"{{ route('jobsapply.move')}}",
                            method: "get",
                            data :{id:id, data:data},
                            success:function(response)
                            {
                                if(response == 'success'){
                                swal('Success','Data have been moved','success');
                                
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

$(document).on('click', '#delete', function(){
    var id = [];
    swal({
          title: 'Delete',
          text: 'Are you sure to delete this data?',
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
                            url:"{{ route('jobsapply.delete')}}",
                            method: "get",
                            data :{id:id},
                            success:function(response)
                            {
                                if(response == 'deleted'){
                                swal('Success','Data deleted','success');
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