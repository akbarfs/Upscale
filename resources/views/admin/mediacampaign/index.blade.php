@extends('admin.layout.apps')

@section('content')
<style>
    
    .notActive{
        color: #3276b1;
        background-color: #fff !important;
    }
    .bootstrap-datetimepicker-widget { display: block !important; }
    .datepicker,
    .table-condensed {

        
    }
    </style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>List of Campaign</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Manage Campaign & Media</a></li>
                    <li class="active">List of Campaign</li>
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
                                {{-- @foreach($jobs as $job)
                                <option>{{$job->jobs_title}}</option>
                                @endforeach --}}
                            </select>
                            <select id="location" class="form-control">
                                <option selected="" disabled="">Location</option>
                                <option value="">All</option>
                                {{-- @foreach($locations as $location)
                                <option>{{$location->location_name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col">
                            <span>Add Campaign :</span>

                            <a style='color:white;' d="add_cam" name="add_cam" data-toggle="modal" data-target="#campaignAdd" class="btn btn-primary "><i class="fa fa-plus"> Add</i></a>
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

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="cam-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="width: auto">Name</th>
                                            <th style="width: auto">Campaign Status</th>
                                            <th style="width: auto">Start Date</th>
                                            <th style="width: auto">End Date</th>
                                            <th style="width: auto">Action</th>
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
<div class="modal fade" id="campaignAssign">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Assign Media/Jobs</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                {{csrf_field()}}
                <h6 style='margin-bottom:5px;'>List of Available Media</h6>
                <ul class="list-group assign-modal">
                    
                </ul>
                <br>
                <h6 style='margin-bottom:5px;'>List of Available Jobs</h6>
                <ul class="list-group assign-jobs">
                    
                </ul>
                <input type="hidden" name="campaign_id">
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

<!-- The Modal -->
<div class="modal fade" id="campaignEdit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Campaign</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Campaign Name</label>
                <input type="text" id="edit-campaign-name" name="edit-campaign-name" class="form-control" placeholder="Input Campaign Name" required="">
                <input type="hidden" id="edit-campaign-id" name="edit-campaign-id">
            </div>
            <div class="form-group">
                <label class="control-label ">Campaign Status</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs edit-campaign-status" data-toggle="edit-campaign-status" data-title="active">Active</a>
                    <a class="btn btn-primary btn-xs edit-campaign-status" data-toggle="edit-campaign-status" data-title="not-active">Not Active</a>
                    <input type="hidden" id="edit-campaign-status" value='active'name="edit-campaign-status">
                </div>
                <br><br>
                <label class="control-label ">Campaign Start Date</label><br>
                <div class="input-group date" id="edit-campaign-start-date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#edit-campaign-start-date"/>
                    <div class="input-group-append" data-target="#edit-campaign-start-date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <br>
                <label class="control-label ">Campaign End Date</label><br>
                <div class="input-group date" id="edit-campaign-end-date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#edit-campaign-end-date"/>
                    <div class="input-group-append" data-target="#edit-campaign-end-date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="editCampaign" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal -->
<div class="modal fade" id="campaignAdd">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Campaign</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label ">Campaign Name</label>
                    <input type="text" id="campaign-name" name="campaign-name" class="form-control" placeholder="Input Campaign Name" required="">
                </div>
                <div class="form-group">
                    <label class="control-label ">Campaign Status</label><br>
                    <div class="btn-group" id="radioBtn" >
                        <a class="btn btn-primary btn-xs active" data-toggle="campaign-status" data-title="active">Active</a>
                        <a class="btn btn-primary btn-xs notActive" data-toggle="campaign-status" data-title="not-active">Not Active</a>
                        <input type="hidden" id="campaign-status" value='active'name="campaign-status">
                    </div>
                    <br><br>
                    <label class="control-label ">Campaign Start Date</label><br>
                    <div class="input-group date" id="campaign-start-date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#campaign-start-date"/>
                        <div class="input-group-append" data-target="#campaign-start-date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <br>
                    <label class="control-label ">Campaign End Date</label><br>
                    <div class="input-group date" id="campaign-end-date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#campaign-end-date"/>
                        <div class="input-group-append" data-target="#campaign-end-date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitCampaign" type="button" class="btn btn-success" data-dismis="modal">Add</button>
            </div>
          </div>
        </div>
      </div>

@push('script')
<script type="text/javascript">

function refreshDatatable(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
}

    $("#campaign-start-date").on("change.datetimepicker", function (e) {
        $('#campaign-end-date').datetimepicker('minDate', e.date);
    });
    $("#campaign-end-date").on("change.datetimepicker", function (e) {
        $('#campaign-start-date').datetimepicker('maxDate', e.date);
    });

    $("#edit-campaign-start-date").on("change.datetimepicker", function (e) {
        $('#edit-campaign-end-date').datetimepicker('minDate', e.date);
    });
    $("#edit-campaign-end-date").on("change.datetimepicker", function (e) {
        $('#edit-campaign-start-date').datetimepicker('maxDate', e.date);
    });

$(document).ready(function(){
    $('#campaign-start-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#edit-campaign-start-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#campaign-end-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#edit-campaign-end-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
});

$(document).on('click', '#submitCampaign', function(e){
    if($("#campaign-start-date").datetimepicker('date') == null||$("#campaign-end-date").datetimepicker('date') == null){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error"); return;
    }
    var isempty = [];
    var campaign_name = $('#campaign-name').val();
    var campaign_status = $('#campaign-status').val();
    var campaign_start = $("#campaign-start-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    var campaign_end = $("#campaign-end-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    if(campaign_name == "") {
        $('#campaign-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#campaign-name').removeClass('is-invalid');
        isempty.push("false");
    }


    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Campaign ?',
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
                    url:"{{ route('campaign.add')}}",
                    type: 'POST',
                    data :{
                        campaign_name:campaign_name,
                        campaign_status:campaign_status,
                        campaign_start:campaign_start,
                        campaign_end:campaign_end
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Campaign Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan Campaign gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});
$(document).on('click', '#editCampaign', function(e){
    if($("#edit-campaign-start-date").datetimepicker('date') == null||$("#edit-campaign-end-date").datetimepicker('date') == null){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error"); return;
    }
    var isempty = [];
    var campaign_name = $('#edit-campaign-name').val();
    var campaign_status = $('#edit-campaign-status').val();
    var campaign_id = $('#edit-campaign-id').val();
    var campaign_start = $("#edit-campaign-start-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    var campaign_end = $("#edit-campaign-end-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    if(campaign_name == "") {
        $('#edit-campaign-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit-campaign-name').removeClass('is-invalid');
        isempty.push("false");
    } 

    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Campaign ?',
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
                    url:"{{ route('campaign.edit')}}",
                    type: 'POST',
                    data :{
                        campaign_name:campaign_name,
                        campaign_id:campaign_id,    
                        campaign_status:campaign_status,
                        campaign_start:campaign_start,
                        campaign_end:campaign_end
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Campaign Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan Campaign gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});


var cam_table = $('#cam-table').DataTable({
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            ajax:{
                url:"{{route('campaign.all')}}",
                type:"GET"
            },
            columns:[
            {data:"campaign_name",defaultColumn:"-",visible:true},
            {data:"campaign_status",defaultColumn:"-",visible:true},
            {data:"campaign_start",defaultColumn:"-",visible:true},
            {data:"campaign_end",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
    });
$(document).ready(function(){
    cam_table;
});

function reload(){
        cam_table.ajax.reload();
    }

$(document).on('click', '.editCam', function(){
    var id = $(this).data('name');
    var status = $(this).data('status');
    var data = id.split("|");
    var start = moment($(this).data('campaign-start'), 'YYYY-MM-DD, h:m:s');
    var end = moment($(this).data('campaign-end'), 'YYYY-MM-DD, h:m:s');
    $("#edit-campaign-name").val(data[0]);
    $("#edit-campaign-id").val( $(this).data('id'));
    $('.edit-campaign-status').each(function(){
        $(this).removeClass('active');
        $(this).removeClass('notActive');
        if($(this).data('title') == status){
            $(this).addClass('active');
        } else {
            $(this).addClass('notActive');
        }
    });
    $('#edit-campaign-end-date').datetimepicker('date', end);
    $('#edit-campaign-start-date').datetimepicker('date', start);
});

$('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        // alert($('#'+tog).val());
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        

    });

    
    $(document).on('click', '.deleteCam', function(){
        var campaign_id = $(this).attr('id');
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

                    $.ajax({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('campaign.delete')}}",
                        method: "POST",
                        data :{campaign_id:campaign_id},
                        success:function(response)
                        {
                            if(response == 'berhasil'){
                            swal('Success','Data deleted','success');
                            reload();
                            } else {
                                swal('Error', 'Data is being used', 'error');
                            }
                            
                             
                        }
                    });
                       
                }
                
            });
    });

    

</script>

@endpush

@endsection