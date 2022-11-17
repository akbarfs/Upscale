@extends('admin.layout.apps')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Semua Notifikasi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right" style="position:relative;">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Semua Notifikasi</li>
                </ol>                
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="">
        <div class="row">

            <div class="col-md-12">
                <div id="alls" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            
                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong> 
                                <span class="badge badge-primary"></span>                          
                            </a>                            
                            <a class="nav-item nav-link" data-toggle="tab" href="#Unread" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Unread</strong> 
                                <span class="badge badge-primary">{{$countUR}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#Read" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Read</strong> 
                                 <span class="badge badge-primary">{{$countR}}</span>
                            </a>

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
                                                    <th>Client</th>
                                                    <th>Request</th>
                                                    <th>Name</th>
                                                    <th>Tanggal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>

                                <div id="unread" class="tab-pane fade">
                                    <table id="all-unread" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Client</th>
                                                <th>Request</th>
                                                <th>Name</th>
                                                <th>Tanggal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="read" class="tab-pane fade">
                                    <table id="all-read" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Client</th>
                                                <th>Request</th>
                                                <th>Name</th>
                                                <th>Tanggal</th>
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


@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script>

var all_unreadFirstTime = true;
var all_readFirstTime = true;
var all_tableFirstTime = true;

var all_unread;
var all_read;
var all_table;
var tab_active = "all_table";



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({
        close: function () { $(".ui-helper-hidden-accessible > *:not(:last)").remove(); },
    });  
    all_tableFirstTime = false;
    tab_active = "all_table";
    all_table = $('#all-table').DataTable({
        autoWidth:false,
        serverSide:true,
        filter:true,
        info:false,
        paging:true,
        processing:true,
        ajax:{
            url:"{{route('all.table-notif')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"company_name",defaultColumn:"-",visible:true},
        {data:"req",defaultColumn:"-",visible:true},
        {data:"talent_name",defaultColumn:"-",visible:true},
        {data:"tanggal",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
    });

});     

function reload(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}


$(document).on('click', 'a[href="#Unread"]', function(e){
    $('.label').hide();
    tab_active = "all_unread";
    if(all_unreadFirstTime){
        all_unread = $('#all-unread').DataTable({
            autoWidth:false,
            serverSide:true,
            filter:true,
            info:false,
            paging:true,
            processing:true,
            ajax:{
                url:"{{route('all.unread.notif')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"company_name",defaultColumn:"-",visible:true},
            {data:"req",defaultColumn:"-",visible:true},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"tanggal",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_unreadFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#all"]', function(e){
    $('.label').show();
    tab_active = "all_table";
    if(all_tableFirstTime){
        all_table = $('#all-table').DataTable({
            autoWidth:false,
            serverSide:true,
            filter:true,
            info:false,
            paging:true,
            processing:true,
            ajax:{
                url:"{{route('all.table-notif')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"company_name",defaultColumn:"-",visible:true},
            {data:"req",defaultColumn:"-",visible:true},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"tanggal",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_tableFirstTime = false;
    } else {
        reload();
    }
    
});


$(document).on('click', 'a[href="#Read"]', function(e){
    $('.label').hide();
    tab_active = "all_read";
    if(all_readFirstTime){
        all_read = $('#all_read').DataTable({
            autoWidth:false,
            serverSide:true,
            filter:true,
            info:false,
            paging:true,
            processing:true,
            ajax:{
                url:"{{route('all.read')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"company_name",defaultColumn:"-",visible:true},
            {data:"req",defaultColumn:"-",visible:true},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"tanggal",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_unreadFirstTime = false;
    } else {
        reload();
    }
    
});

</script>


@endpush

@endsection