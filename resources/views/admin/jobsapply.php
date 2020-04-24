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
    .nav-link {
        padding : 4px 14px !important;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jobs Apply</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Jobs Apply</li>
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
                            <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                            <select id="job-type" class="form-control">
                                <option id='job-type-default' selected disabled="">Type Time</option>
                                <option value="">All</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="internship">Internship</option>
                                <option value="parttime">Parttime</option>
                            </select>
                            <select id="position" class="form-control">
                                <option id='job-position-default' selected disabled="">Position</option>
                                <option value="">All</option>
                                @foreach($jobs as $job)
                                
                                <option value="{{$job->jobs_title}}">{{$job->jobs_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <span>Change status to :</span>
                            <select id="status" name="status" class="form-control form-control biarpas">
                                <option value="unprocess">Unprocess</option>
                                <option value="testonline">Test Online</option>
                                <option value="interview">Interview</option>
                                <option value="offered">Offered</option>
                                <option value="hired">Hired</option>
                                <option value="ready">Ready Stock</option>
                                <option value="keep">Keep</option>
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
                            
                            <a class="nav-item nav-link  active" data-toggle="tab" href="#unprocess" role="tab" aria-controls="nav-home" aria-selected="true"><strong>NEW</strong> 
                                <span class="badge badge-primary">{{$countU}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#testonline" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Test Online</strong> 
                                <span class="badge badge-primary">{{$countTO}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#interview" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Interview</strong> 
                                 <span class="badge badge-primary">{{$countI}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#offered" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Offered</strong> 
                                 <span class="badge badge-primary">{{$countO}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#ready" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Ready</strong> 
                                <span class="badge badge-primary">{{$countRD}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#keep" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Keep</strong> 
{{--                                 <span class="badge badge-primary">{{$countK}}</span> --}}
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#hired" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Hired</strong> 
{{--                                 <span class="badge badge-primary">{{$countH}}</span>--}}                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#reject" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Rejected</strong> 
{{--                                 <span class="badge badge-primary">{{$countR}}</span>
 --}}                            </a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong> 
                                {{--                                 <span class="badge badge-primary">{{$countall}}</span>
                                --}}                            
                            </a>

                          </div>
                        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                
                                <div id="unprocess" class="tab-pane fade show active">
                                    <table id="all_unprocess" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="offered" class="tab-pane fade">
                                    <table id="all_offered" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="keep" class="tab-pane fade">
                                    <table id="all_keep" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="ready" class="tab-pane fade">
                                    <table id="all_ready" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Current City</th>
                                                <th>Name</th>
                                                <th>Contact</th>
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
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Jadwal Interview</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="testonline" class="tab-pane fade">
                                    <table id="all_testonline" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Position</th>
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
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
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
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
                                                <th>Current City</th>
                                                <!-- <th>Type</th> -->
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div id="all" class="tab-pane fade ">
                                        <table id="all-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Position</th>
                                                    <th>Current City</th>
                                                    <!-- <th>Type</th> -->
                                                    <th>Name</th>
                                                    <th>Contact</th>
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

<div class="modal fade" id="modal-tambah-catatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Substeps dan Tambahkan Catatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body substeps-modal">
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" name="jobs_apply_note" class="form-control" id="catatan" placeholder="Masukan Catatan">
                <input type="hidden" name="jobs_apply_id" value="">
            </div>
            <div class="form-group">
                <label for="catatan">Label</label>
                <input type="text" name="jobs_apply_label" class="form-control" id="label" placeholder="Tulis Label Sesingkat Mungkin">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input rush" id="rush">
                <label class="custom-control-label" for="rush">Rush / Potensial</label>
                <input type="hidden" name="rush" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id='batalkan-simpan-catatan' class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>

</div>


<!-- /.row -->

<!-- /.container-fluid -->
@push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript">

$(document).on('click', '.tambah-catatan', function(e){
    $('.success-alert').remove();
    $('.progress-alert').remove();
    $('.substeps').remove();
    $('input[name="jobs_apply_id"]').val($(this).attr('id'));
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    var catatan = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('note.get')}}",
        type: 'POST',
        dataType: 'json',
        data :{
             jobs_apply_id:jobs_apply_id,
        },
        success:function(response)
            {
            if(response != false){
                response.forEach(function (d) {
                    var data = d.jobs_apply_note;
                    $('input[name="jobs_apply_note"]').val(data);
                });
            } 
        }
    }); 
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('label.get')}}",
        type: 'POST',
        dataType: 'json',
        data :{
             jobs_apply_id:jobs_apply_id,
        },
        success:function(response)
            {
            if(response != false){
                response.forEach(function (d) {
                    var data = d.jobs_apply_label;
                    $('input[name="jobs_apply_label"]').val(data);
                });
                
            } 
        }
    });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('rush.get')}}",
        type: 'POST',
        dataType: 'json',
        data :{
             jobs_apply_id:jobs_apply_id,
        },
        success:function(response)
        {
            if(response != false){
                response.forEach(function (d) {
                    var data = d.jobs_apply_rush;
                    if(data == 'YES'){
                        $('.rush').attr('checked', true);
                        $('input[name="rush"]').val(yes);
                    }
                    else {
                        $('.rush').attr('checked', false);
                        $('input[name="rush"]').val(no);
                    }
                });
            } 
        }
    });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('substeps.getsubsteps')}}",
        type: 'POST',
        async: false,
        dataType: 'json',
        data :{
             jobs_apply_id:jobs_apply_id,
        },
        success:function(response)
            {
            if(response != false){
                response.forEach(function (d) {
                    var append = "<div class='input-group mb-3 substeps'><div class='input-group-prepend '><div class='input-group-text '><input type='checkbox' class='substeps-checked'id='substeps-checkbox-" + d.substeps_id + "' ></div></div><input type='text' class='form-control' id='substeps-name-" + d.substeps_id + "'style='' value='" + d.substeps_name + "' readonly><input type='text' id='substeps-note-" + d.substeps_id + "'class='form-control substeps-note' value='' disabled placeholder='Masukkan Catatan Untuk Substeps Ini'><div class='input-group-append'><span style='text-align: center; ' class=' input-group-text ' ><i id='sub-steps-saved-" + d.substeps_id + "'class='fa fa-check' style='font-size:18px;'></i><i id='sub-steps-saving-" + d.substeps_id + "'class='fa fa-spinner fa-spin' style=' display:none;font-size:18px;'></i></span></div></div>";
                    $('.substeps-modal').prepend(append);
                });                
            } 
        }
    }); 
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('substeps.get')}}",
         type: 'POST',
        dataType: 'json',
        async: false,
        data :{
             jobs_apply_id:jobs_apply_id,
        },
        success:function(response)
            {
            if(response != false){
                response.forEach(function (d) {
                    if(d.jobs_apply_substeps_checked == 'not-checked'){
                        $('#substeps-checkbox-'+ d.substeps_id).attr('checked', false);
                        $('#substeps-checkbox-'+ d.substeps_id).attr('data-id', d.jobs_apply_substeps_id);
                        $('#substeps-note-'+ d.substeps_id).val(d.jobs_apply_substeps_comment);
                        $('#substeps-note-'+ d.substeps_id).attr('disabled', true);
                        $('#substeps-note-'+ d.substeps_id).attr('data-id', d.jobs_apply_substeps_id);
                        $('#substeps-name-'+ d.substeps_id).css('text-decoration', 'none');
                    } else {
                        $('#substeps-checkbox-'+ d.substeps_id).attr('checked', true);
                        $('#substeps-checkbox-'+ d.substeps_id).attr('data-id', d.jobs_apply_substeps_id);
                        $('#substeps-note-'+ d.substeps_id).val(d.jobs_apply_substeps_comment);
                        $('#substeps-note-'+ d.substeps_id).attr('disabled', false);
                        $('#substeps-note-'+ d.substeps_id).attr('data-id', d.jobs_apply_substeps_id);
                        $('#substeps-name-'+ d.substeps_id).css('text-decoration', 'line-through');
                    }
                });                
            } 
        }
    }); 
});

$(document).on('change', '.substeps-checked', function() {
    var id = $(this).attr('id').split('-');
    var jobs_apply_substeps_id;
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    if($('#substeps-checkbox-'+ id[2]).data('id') == null) {
        jobs_apply_substeps_id = 'baru';
    } else {
        jobs_apply_substeps_id = $('#substeps-checkbox-'+ id[2]).data('id');
    }
    if(this.checked) {
        
        var jobs_apply_substeps_id = $('#substeps-checkbox-'+ id[2]).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('substeps.checked')}}",
            type: 'POST',
            dataType: 'json',
            async: false,
            data :{
                jobs_apply_substeps_id:jobs_apply_substeps_id,
                jobs_apply_id:jobs_apply_id,
                substeps_id:id[2],
            },
            success:function(response)
                {
                if(response != false){
                    if(response['last_id'] != 'update'){
                        $('#substeps-checkbox-'+ id[2]).attr('checked', true);
                        $('#substeps-checkbox-'+ id[2]).attr('data-id', response['last_id']);
                        $('#substeps-note-'+ id[2]).attr('disabled', false);
                        $('#substeps-note-'+ id[2]).attr('data-id', response['last_id']);
                        $('#substeps-name-'+ id[2]).css('text-decoration', 'line-through');
                    } else {
                        $('#substeps-checkbox-'+ id[2]).attr('checked', true);
                        $('#substeps-note-'+ id[2]).attr('disabled', false);
                        $('#substeps-name-'+ id[2]).css('text-decoration', 'line-through');
                    }
                }
            }
        }); 
    } else {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('substeps.unchecked')}}",
            type: 'POST',
            dataType: 'json',
            async: false,
            data :{
                jobs_apply_substeps_id:jobs_apply_substeps_id,
            },
            success:function(response)
                {
                if(response != false){
                    if(response['last_id'] == 'update'){
                        $('#substeps-checkbox-'+ id[2]).attr('data-id', '');
                        $('#substeps-note-'+ id[2]).attr('data-id', '');
                        $('#substeps-note-'+ id[2]).attr('disabled', true);
                        $('#substeps-name-'+ id[2]).css('text-decoration', 'none');
                    }
                }
            }
        });
        
    }
});

$(document).on('change', '#rush', function() {
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    if(this.checked) {
        var rush = 'YES';
    } else {
        var rush = 'NO';
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('rush.edit')}}",
        beforeSend: function(){ 
            $('.progress-alert').remove();
            $('.success-alert').remove();
            $('.substeps-modal').prepend('<div class="alert alert-warning fade out show progress-alert" role="alert"><strong>Please Wait ! </strong> Perubahan Sedang Disimpan!<span class="close" data-dismiss="alert" aria-label="close" aria-hidden="true" style="font-size:18px;"class="fa fa-spinner fa-spin"></span></div>');
        },
        type    : 'POST',
        dataType: 'json',
        async   : false,
        data    : {
            jobs_apply_id : jobs_apply_id,
            jobs_apply_rush : rush,
        },
        success:function(response)
        {
            if(response != false ){
                $('.progress-alert').remove();
                $('.success-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
            }
        }
    });
});



$(document).on('blur', '.substeps-note', function(){
    var id = $(this).attr('id').split('-');
    var jobs_apply_substeps_id = $(this).data('id');
    var jobs_apply_substeps_comment = $(this).val();
    $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('substeps.note')}}",
            beforeSend: function(){ 
                $('#sub-steps-saving-'+id[2]).css('display', 'inline-block');
                $('#sub-steps-saved-'+id[2]).css('display', 'none');
                $('.progress-alert').remove();
                 $('.success-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-warning fade out show progress-alert" role="alert"><strong>Please Wait ! </strong> Perubahan Sedang Disimpan!<span class="close" data-dismiss="alert" aria-label="close" aria-hidden="true" style="font-size:18px;"class="fa fa-spinner fa-spin"></span></div>');
            },
            type: 'POST',
            dataType: 'json',
            async: false,
            data :{
                jobs_apply_substeps_id:jobs_apply_substeps_id,
                jobs_apply_substeps_comment:jobs_apply_substeps_comment
            },
            success:function(response)
            {
                if(response['note'] != 0 ){
                    $('#sub-steps-saving-'+id[2]).css('display', 'none');
                    $('#sub-steps-saved-'+id[2]).css('display', 'inline-block');
                    $('.progress-alert').remove();
                    $('.success-alert').remove();
                    $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                }
            }
        });
});

$(document).on('blur', 'input[name="jobs_apply_note"]', function(e){
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    var jobs_apply_note = $('input[name="jobs_apply_note"]').val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('note.add')}}",
        beforeSend: function(){ 
            $('.progress-alert').remove();
            $('.success-alert').remove();
            $('.substeps-modal').prepend('<div class="alert alert-warning fade out show progress-alert" role="alert"><strong>Please Wait ! </strong> Perubahan Sedang Disimpan!<span class="close" data-dismiss="alert" aria-label="close" aria-hidden="true" style="font-size:18px;"class="fa fa-spinner fa-spin"></span></div>');
        },
        type: 'POST',
        data :{
            jobs_apply_id:jobs_apply_id,
            jobs_apply_note:jobs_apply_note
        },
        success:function(response)
             {
            if(response == 'berhasil'){
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                reload();
            } else {
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Tidak Ada Perubahan ! </strong> Tidak terdapat perubahan pada data!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');

            }
        }
    });
});

$(document).on('blur', 'input[name="jobs_apply_label"]', function(e){
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    var jobs_apply_label = $('input[name="jobs_apply_label"]').val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('label.add')}}",
        beforeSend: function(){ 
            $('.progress-alert').remove();
            $('.success-alert').remove();
            $('.substeps-modal').prepend('<div class="alert alert-warning fade out show progress-alert" role="alert"><strong>Please Wait ! </strong> Perubahan Sedang Disimpan!<span class="close" data-dismiss="alert" aria-label="close" aria-hidden="true" style="font-size:18px;"class="fa fa-spinner fa-spin"></span></div>');
        },
        type: 'POST',
        data :{
            jobs_apply_id:jobs_apply_id,
            jobs_apply_label:jobs_apply_label
        },
        success:function(response)
             {
            if(response == 'berhasil'){
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                reload();
            } else {
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Tidak Ada Perubahan ! </strong> Tidak terdapat perubahan pada data!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');

            }
        }
    });
});



var all_unprocessFirstTime = true;
var all_interviewFirstTime = true;
var all_reportFirstTime = true;
var all_hiredFirstTime = true;
var all_keepFirstTime = true;
var all_readyFirstTime = true;
var all_rejectFirstTime = true;
var all_tableFirstTime = true;
var all_offeredFirstTime = true;
var all_tableFirstTime = true;
var all_testonlineFirstTime = true;

var all_unprocess;
var all_interview;
var all_report;
var all_hired;
var all_keep;
var all_ready;
var all_reject;
var all_table;
var all_offered;
var tab_active = "all_unprocess";



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  
    all_unprocessFirstTime = false;
    tab_active = "all_unprocess";
    all_unprocess = $('#all_unprocess').DataTable({
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
        {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
        // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
    });
    
});     

 $('#job-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var type = $('#job-type').val()
    if(type == 'all')
    reload();
    table.columns(3).search( this.value ).draw();
});


   
 $('#position').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#job-position').val()
    if(position == 'all')
    reload();
    table.columns(1).search( this.value ).draw();
});

function reload(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#job-position-default").attr('selected', true);
    $("#job-type-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}

$(document).on('click', '#move', function(){
    var id = [];
    var status = [];
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
                    var dataValue = $(this).val().split("|");
                id.push(dataValue[0]);
                status.push(dataValue[1]);
                });

                    if(id.length > 0)
                    {
                            $.ajax({
                            url:"{{ route('jobsapply.move')}}",
                            method: "get",
                            data :{id:id, data:data, status:status},
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

$(document).on('click', 'a[href="#unprocess"]', function(e){
    tab_active = "all_unprocess";
    if(all_unprocessFirstTime){
        all_unprocess = $('#all_unprocess').DataTable({
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
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_unprocessFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#testonline"]', function(e){
    tab_active = "all_testonline"; 
    if(all_testonlineFirstTime){
        all_testonline = $('#all_testonline').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('all.testonline')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"jobs_title",defaultColumn:"-",visible:true},
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_testonlineFirstTime = false;
    } else {
        reload();
    }
});

$(document).on('click', 'a[href="#interview"]', function(e){
    tab_active = "all_interview";
    if(all_interviewFirstTime){
        all_interview = $('#all_interview').DataTable({
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
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"interview_schedule",orderable:false,defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ],
            'columnDefs': [
                {
                    // 'targets': 6,
                    'targets': 5,
                    'createdCell':  function (td, cellData, rowData, row, col) {
                        if($(td).text() == "Belum Dijadwalkan") {
                            $(td).parent().addClass('table-danger');
                            $(td).css('font-weight','Bold');
                        } else {
                        var interview_schedule = moment($(td).text(), 'YYYY-MM-DD, h:m:s');
                            if(interview_schedule.diff(moment(), "days") <= 2){
                                $(td).parent().addClass('table-danger');

                                // if(interview_schedule.diff(moment(), "hours") == 0){
                                //     $(td).text(interview_schedule.diff(moment(), "minutes") + " Menit Lagi");
                                // } else if(interview_schedule.diff(moment(), "hours") == 1) {
                                //     $(td).text("Besok");
                                // } else if(interview_schedule.diff(moment(), "hours") == 2) {
                                //     $(td).text("Lusa");
                                // } else {
                                //     $(td).text(interview_schedule.diff(moment(), "hours") + " Jam Lagi");
                                // }
                            } else if(interview_schedule.diff(moment(), "days") > 2 && interview_schedule.diff(moment(), "days") <= 7){ 
                                $(td).parent().addClass('table-warning');
                            }
                            $(td).text(interview_schedule.locale('id').format('dddd') + ", " + interview_schedule.locale('id').format('Do MMMM YYYY, h:mm'));
                        }
                    }
                },
            ]
        });
        all_interviewFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#reject"]', function(e){
    tab_active = "all_reject";
    if(all_rejectFirstTime){
        all_reject = $('#all_reject').DataTable({
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
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_rejectFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#hired"]', function(e){
    tab_active = "all_hired";
    if(all_hiredFirstTime){
        all_hired = $('#all_hired').DataTable({
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
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_hiredFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#keep"]', function(e){
    tab_active = "all_keep";
    if(all_keepFirstTime){
        all_keep = $('#all_keep').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('all.keep')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"jobs_title",defaultColumn:"-",visible:true},
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_keepFirstTime = false;
    } else {
        reload();
    }
    
});


$(document).on('click', 'a[href="#ready"]', function(e){
    tab_active = "all_ready";
    if(all_keepFirstTime){
        all_keep = $('#all_ready').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('all.ready')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"jobs_title",defaultColumn:"-",visible:true},
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_keepFirstTime = false;
    } else {
        reload();
    }
    
});

$(document).on('click', 'a[href="#all"]', function(e){
    tab_active = "all-table";
    if(all_tableFirstTime){
        all_table = $('#all-table').DataTable({
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
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_tableFirstTime = false;
    } else {
        reload()
    }
});

$(document).on('click', 'a[href="#offered"]', function(e){
    tab_active = "all_offered";
    if(all_offeredFirstTime){
        all_offered = $('#all_offered').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('all.offered')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"jobs_title",defaultColumn:"-",visible:true},
            {data:"jobs_apply_current_address", defaultColumn:"-",visible:true},
            // {data:"jobs_apply_type_time",defaultColumn:"-",visible:true},
            {data:"jobs_apply_name",defaultColumn:"-",visible:true},
            {data:"jobs_apply_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_offeredFirstTime = false;
    } else {
        reload()
    }
    
});



</script>
@endpush

@endsection