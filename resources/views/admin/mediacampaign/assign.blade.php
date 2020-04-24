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
                <h1>Media & Campaign</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Media & Campaign</a></li>
                    <li class="active">Assign Jobs & Media</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        
        <div class="row">
            <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3"> Select Recruitment Media</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="check-all-med" name="check-all-med" class="btn btn-primary btn-sm" type="button"><i class="fa fa-check-square-o"></i> Check All</button>
                                <button style="margin-left: 3px;" id="uncheck-all-med" name="uncheck-all-med" class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i> Uncheck All</button>
                            </div>
                            <table id="med-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>media</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div> 
            <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3"> Select Jobs</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="check-all-jobs" name="check-all-jobs" class="btn btn-primary btn-sm" type="button"><i class="fa fa-check-square-o"></i> Check All</button>
                                <button style="margin-left: 3px;" id="uncheck-all-jobs" name="uncheck-all-jobs" class="btn btn-danger btn-sm" type="button"><i class="fa fa-times"></i> Uncheck All</button>
                            </div>
                            <table id="jobs-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Position</th>
                                        <th>Category</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div>  
               
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
var media_checked;
var campaign_id = "{{$campaign->campaign_id}}";
var jobs_checked;
function loadCheckedJobs(){
        jobs_checked = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('campaign.jobschecked')}}",
            type: 'POST',
            dataType: 'json',
            data :{
                campaign_id:campaign_id,
            },
            success:function(response)
                {
                if(response != false){
                    response.forEach(function (d) {
                        if(d.campaign_jobs_checked == 'not-checked'){
                            $('#jobs-checkbox-'+ d.jobs_id).attr('checked', false);
                            $('#jobs-checkbox-'+ d.jobs_id).attr('data-id', d.campaign_jobs_id);
                            $('#jobs-category-'+ d.jobs_id).css('text-decoration', 'none');
                            $('#jobs-name-'+ d.jobs_id).css('text-decoration', 'none');

                            
                        } else {
                            $('#jobs-checkbox-'+ d.jobs_id).attr('checked', true);
                            $('#jobs-checkbox-'+ d.jobs_id).attr('data-id', d.campaign_jobs_id);
                            $('#jobs-name-'+ d.jobs_id).css('text-decoration', 'line-through');
                            $('#jobs-category-'+ d.jobs_id).css('text-decoration', 'line-through');
                            
                        }
                    });                
                } 
            }
        });
}
function loadCheckedMedia(){
    media_checked = $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('campaign.mediachecked')}}",
            type: 'POST',
            dataType: 'json',
            async : false,
            data :{
                campaign_id:campaign_id,
            },
            success:function(response)
                {
                if(response != false){
                    response.forEach(function (d) {
                        if(d.campaign_media_checked == 'not-checked'){
                            $('#media-checkbox-'+ d.media_id).attr('checked', false);
                            $('#media-checkbox-'+ d.media_id).attr('data-id', d.campaign_media_id);
                            $('#media-name-'+ d.media_id).css('text-decoration', 'none');

                        } else {
                            $('#media-checkbox-'+ d.media_id).attr('checked', true);
                            $('#media-checkbox-'+ d.media_id).attr('data-id', d.campaign_media_id);
                            $('#media-name-'+ d.media_id).css('text-decoration', 'line-through');

                        }
                    });                
                } 
            }
        });
        
}

$(document).ready(function(){
    jobs_table;
    med_table;

    function reloadJobs(){
        jobs_table.ajax.reload( function ( json ) {
            loadCheckedJobs();
        });
    }
    function reloadMedia(){
        med_table.ajax.reload( function ( json ) {
            loadCheckedMedia();
        });
   }    

    var jobs_table = $('#jobs-table').DataTable({
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            "initComplete": function(settings, json) {
                loadCheckedJobs();
            },
            ajax:{
                url:"{{route('campaign.getjobs')}}",
                type:"GET"
            },
            columns:[
            {data:"action",orderable:true,searchable:false},
            {data:"jobs_title",defaultColumn:"-",visible:true},
            {data:"jobs_category",defaultColumn:"-",visible:true},
            ]
    });

    var med_table = $('#med-table').DataTable({
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            "callback":function(json) {
                loadCheckedMedia();
            },
            "initComplete": function(settings, json) {
                loadCheckedMedia();
            },
            ajax:{
                url:"{{route('campaign.getmedia')}}",
                type:"GET"
            },
            columns:[
            {data:"action",orderable:true,searchable:false},
            {data:"media_name",defaultColumn:"-",visible:true},
            
            ]
    });

    


$(document).on('change', '.media-checked', function() {
        var id = $(this).attr('id').split('-');
        if($('#media-checkbox-'+ id[2]).data('id') == null) {
            campaign_media_id = 'baru';
        } else {
            campaign_media_id = $('#media-checkbox-'+ id[2]).data('id');
        }
        if(this.checked) {
            mediaChecked(campaign_media_id, id[2], campaign_id);
            
        } else {
            mediaUnchecked(campaign_media_id);            
        }
        reloadMedia();
    });

    $(document).on('change', '.jobs-checked', function() {
        var id = $(this).attr('id').split('-');
        if($('#jobs-checkbox-'+ id[2]).data('id') == null) {
            campaign_jobs_id = 'baru';
        } else {
            campaign_jobs_id = $('#jobs-checkbox-'+ id[2]).data('id');
        }
        if(this.checked) {
            jobsChecked(campaign_jobs_id, id[2], campaign_id);
        } else {
            jobsUnchecked(campaign_jobs_id);           
        }
        reloadJobs();
    });

    function mediaChecked(campaign_media_id, media_id, campaign_id){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"{{ route('campaign.checked')}}",
                type: 'POST',
                dataType: 'json',
                async: false,
                data :{
                    campaign_media_id:campaign_media_id,
                    media_id:media_id,
                    campaign_id:campaign_id
                },
                
            }); 
    }

    function jobsChecked(campaign_jobs_id, jobs_id, campaign_id){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"{{ route('campaign.jobs_checked')}}",
                type: 'POST',
                dataType: 'json',
                async: false,
                data :{
                    campaign_jobs_id:campaign_jobs_id,
                    jobs_id:jobs_id,
                    campaign_id:campaign_id
                },
                
            });
    }

    function jobsUnchecked(campaign_jobs_id){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"{{ route('campaign.jobs_unchecked')}}",
                type: 'POST',
                dataType: 'json',
                async: false,
                data :{
                    campaign_jobs_id:campaign_jobs_id,
                },
            
            });
    }

    function mediaUnchecked(campaign_media_id){
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url:"{{ route('campaign.unchecked')}}",
                type: 'POST',
                dataType: 'json',
                async: false,
                data :{
                    campaign_media_id:campaign_media_id,
                },
            });
    }

    $(document).on('click', '#check-all-jobs', function(e){
        $(".jobs-checked").each(function(){
            if(!this.checked) {
                var id = $(this).attr('id').split('-');
                if($('#jobs-checkbox-'+ id[2]).data('id') == null) {
                    campaign_jobs_id = 'baru';
                } else {
                    campaign_jobs_id = $('#jobs-checkbox-'+ id[2]).data('id');
                }
                jobsChecked(campaign_jobs_id, id[2], campaign_id);
            }
        });
        reloadJobs();
    });
    $(document).on('click', '#check-all-med', function(e){
        $(".media-checked").each(function(){
            if(!this.checked) {
                var id = $(this).attr('id').split('-');
                if($('#media-checkbox-'+ id[2]).data('id') == null) {
                    campaign_media_id = 'baru';
                } else {
                    campaign_media_id = $('#media-checkbox-'+ id[2]).data('id');
                }
                mediaChecked(campaign_media_id, id[2], campaign_id);
            }
        });
        reloadMedia();
    }); 
    $(document).on('click', '#uncheck-all-jobs', function(e){
        $(".jobs-checked").each(function(){
            if(this.checked) {
                var id = $(this).attr('id').split('-');
                if($('#jobs-checkbox-'+ id[2]).data('id') == null) {
                    campaign_jobs_id = 'baru';
                } else {
                    campaign_jobs_id = $('#jobs-checkbox-'+ id[2]).data('id');
                }
                jobsUnchecked(campaign_jobs_id);
            }
        });
        reloadJobs();
    });
    $(document).on('click', '#uncheck-all-med', function(e){
        $(".media-checked").each(function(){
            if(this.checked) {
                var id = $(this).attr('id').split('-');
                if($('#media-checkbox-'+ id[2]).data('id') == null) {
                    campaign_media_id = 'baru';
                } else {
                    campaign_media_id = $('#media-checkbox-'+ id[2]).data('id');
                }
                mediaUnchecked(campaign_media_id);
            }
        });
        reloadMedia();
    }); 
});
</script>

@endpush

@endsection