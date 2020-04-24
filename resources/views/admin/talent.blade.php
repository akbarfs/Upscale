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
    .pagination .page-item.active .page-link { background-color: #000; }

div.dataTables_wrapper div.dataTables_paginate ul.pagination .page-item.active .page-link:focus {
background-color: #000;
}

.pagination .page-item.active .page-link:hover {
background-color: #000;
}
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Talent</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Talent</li>
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

<div class="content mt-3">
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div id="alls" class="card">
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong>
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#quarantine" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Quarantine</strong>
                                <span class="badge badge-primary">{{$countQ}}</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#assign" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Assign</strong>
                                <span class="badge badge-primary">{{$countA}}</span>
                            </a>


                          </div>
                        </nav>
                    </div>
                    <div class="card-body">
                            <div class="tab-content">
                                <div id="all" class="tab-pane fade show active row">
                                    <div class="action-table">
                                        <div class="col-md-12 form-inline">
                                            <div class="form-group">
                                                <div class="col">
                                                    <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                    <select id="register-type" class="form-control-sm">
                                                        <option id='register-default' selected disabled="">Register?</option>
                                                        <option value="">All</option>
                                                        <option value="YES">YES</option>
                                                        <option value="NO">NO</option>
                                                        <option value="OLD">OLD</option>
                                                    </select>
                                                    <select id="skill-type" class="form-control-sm">
                                                        <option id='skill-default' selected disabled="">Set Skills</option>
                                                        <option value="">All</option>
                                                        <option value="!=No set skills">YES</option>
                                                        <option value="No set skills">NO</option>
                                                    </select>
                                                    <select id="ready-type" class="form-control-sm">
                                                        <option id='readi-default' selected disabled="">Ready</option>
                                                        <option value="">All (belum berfungsi)</option>
                                                        <option value="!=No set skills">This month</option>
                                                        <option value="No set skills">Reminder</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col">
                                                    <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Mo :</span> -->
                                                    <button name="move" id="move" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Move to Quarantine</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <hr> -->

                                    <table id="all-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Current City</th>
                                                <th>Skills</th>
                                                <th>Info</th>
                                                <th>Contact</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="quarantine" class="tab-pane fade ">
                                <div class="action-table">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <div class="col">
                                                    <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                    <select id="quarantine-type" class="form-control-sm">
                                                        <option id='quarantine-default' selected disabled="">Quarantine Status</option>
                                                        <option value="">All</option>
                                                        <option value="unprocess">unprocess</option>
                                                        <option value="chat">chat</option>
                                                        <option value="invalid">invalid</option>
                                                        <option value="response">response</option>
                                                        <!-- <option value="schedule">schedule</option>
                                                        <option value="interviewed">interviewed</option> -->
                                                        <option value="done">DONE</option>   
                                                    </select>
                                                    <!-- <select id="status-type-quarantine" class="form-control-sm">
                                                        <option id='status-default' selected disabled="">Assign Status</option>
                                                        <option value="">All</option>
                                                        <option value="active">ACTIVE</option>
                                                        <option value="Send RT">Send RT</option>
                                                        <option value="Review RT">Review RT</option>
                                                        <option value="Interviewing">Interviewing</option>
                                                        <option value="Report Interview">Report Interview</option>
                                                        <option value="Offering">Offering</option>
                                                        <option value="Hired">Hired</option>
                                                        <option value="Rejected">Reject</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    </select> -->
                                                </div>
                                                <div class="form-group">
                                                <div class="col">
                                                <button  name="moveunquarantine" id="moveunquarantine" class="btn btn-info " type="button"><i class="fa fa-retweet"></i> Move to un-Quarantine</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <table id="all_quarantine" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Current City</th>
                                                <th>Contact</th>
                                                <th>Status Quarantine</th>
                                                <th>Reminder Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="assign" class="tab-pane fade">
                                    <div class="action-table">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <div class="col">
                                                    <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                    <select id="status-type" class="form-control-sm">
                                                        <option id='status-default' selected disabled="">Status</option>
                                                        <option value="">All</option>
                                                        <option value="active">ACTIVE</option>
                                                        <option value="Send RT">Send RT</option>
                                                        <option value="Review RT">Review RT</option>
                                                        <option value="Interviewing">Interviewing</option>
                                                        <option value="Report Interview">Report Interview</option>
                                                        <option value="Offering">Offering</option>
                                                        <option value="Hired">Hired</option>
                                                        <option value="Rejected">Reject</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                    </select>
                                                    <select id="company-type" class="form-control-sm">
                                                        <option id='company-default' selected disabled="">Company</option>
                                                        <option value="">All</option>
                                                        @foreach($company as $comp)
                                                            <option value="{{$comp->company_name}}">{{$comp->company_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col">
                                                        <span>Move Talent to :</span>
                                                            <select id="status" name="status" class="form-control form-control biarpas">
                                                                    <option value="offered">Offered</option>
                                                                    <option value="hired">Hired</option>
                                                                    <option value="ready">Ready</option>
                                                                    <option value="keep">Keep</option>
                                                                    <option value="rejected">Rejected</option>                                                               
                                                            </select>
                                                            <button name="moveassign" id="moveassign" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Move</button>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <table id="all_assign" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Assign Date</th>
                                                <th>Company - Positions</th>
                                                <th>Status</th>
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

<div class="modal fade show in" id="modal-reminder" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Quarantine Reminder</h5>
          <button type="button" class="close" data-dismiss="modal" >
           &times;
          </button>
        </div>
        <form method="post" action="{{route('talent.editreminder')}}" accept-charset="utf-8">
             {{ csrf_field() }}
            
            <div class="modal-body">
                <div class="form-group col-sm-12">
                    <input type="hidden" id="talent_id" name="talent_id" value="">
                    <label >Set Reminder Date</label>
                    <input type="date" id="reminder_date" name="reminder_date" class="form-control" required>
                </div>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit"  class="btn btn-success" >Submit</button>
            </div>
        </form>
      </div>
    </div>

</div>

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

<div class="modal fade" id="modal-status-quarantine" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Status Quarantine Talent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('talent.changestatusquarantine')}}" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
            <div class="modal-body substeps-modal">
                <input type="hidden" name="talent_id" id="talent_id_quarantine" value="">
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="nothing"></div></div>
                    <input type="text" class="form-control" value="Unprocess" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="chat"></div></div>
                    <input type="text" class="form-control" value="Chat" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="invalid"></div></div>
                    <input type="text" class="form-control" value="Invalid" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="response"></div></div>
                    <input type="text" class="form-control" value="Response" readonly="">
                </div>
                <!-- <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="schedule"></div></div>
                    <input type="text" class="form-control" value="Schedule" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="interviewed"></div></div>
                    <input type="text" class="form-control" value="Interviewed" readonly="">
                </div> -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="done"></div></div>
                    <input type="text" class="form-control" value="DONE" readonly="">
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

<div class="modal fade" id="modal-assign-company" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Assign Company</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('talent.addassign')}}">
             {{ csrf_field() }}
            <div class="modal-body substeps-modal">
            
                    <div class="col">
                    <label for="catatan">Company</label>
                    <span id="error-assign"></span>
                        <div class="input-group">
                        <input type="hidden" name="talent_id" id="talent_id" >
                        <select name="company_id"  id="company_id"  class="form-control active 3col"  required="">
                            @foreach($company as $row)
                            <option value="{{ $row->company_id }}">{{$row->company_name}}
                            </option>
                            @endforeach
                        </select>

                        </div>
                        <hr>
                    </div>
                    <div class="col">
                        <label for="catatan">Request</label>
                        <div class="input-group">
                            <select name="request_id"  class="form-control 3col active job-request"  required="">
                            </select>
                        </div>
                        <hr>
                    </div>
                    <div class="col">
                        <label for="catatan">Prefered Location</label>
                            <span id="error-assign"></span>
                                <div class="input-group">
                                    <select name="location_id"  class="form-control active 3col location-request"  required="">
                                    </select>
                                </div>
                                <hr>
                    </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit"  class="btn btn-success" >Assign</button>
            </div>
        </form>
      </div>
    </div>

</div>


<!-- <div class="modal fade" id="modal-reminder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Quarantine Reminder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('talent.editreminder')}}">
             {{ csrf_field() }}
            
            <div class="modal-body">
                <div class="form-group col-sm-12">
                    <input type="hidden" id="talent_id" name="talent_id" value="">
                    <label class="control-label ">Set Reminder Date</label>
                    <input type="date" id="reminder_date" name="reminder_date" class="form-control" required>
                </div>
            </div>
                
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit"  class="btn btn-success" >Submit</button>
            </div>
        </form>
      </div>
    </div>

</div> -->





<!-- /.row -->

<!-- /.container-fluid -->
@push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


<script type="text/javascript">
$(document).on('click', '.change-status-quarantine', function(){
    var talent_id   = $(this).data('id');
    $('#talent_id_quarantine').val(talent_id);
});
    
$(document).on('click', '.assign-talent', function(){
    var talent_id   = $(this).data('idtalent');
    $('.modal-body #talent_id').val(talent_id);
        var html = '';
            html += '<option value=""> Data Belum Ada</option>';
        var html2 ='';
            html2 +='<option value=""> Data Belum Ada</option>';
            $('.job-request').html(html);
            $('.location-request').html(html2);
    $('.modal-body #company_id').change(function(){
        var id=$(this).val();
        console.log(id);
        var idtalent = $(this).data('idtalent');
        $.ajax({
            headers: {'csrftoken' : '{{ csrf_token() }}' },
            url : '/admin/talent/get/request/'+id+'/talent/'+talent_id,
            type : 'GET',
            dataType : 'json',
            success: function(data){
            var html = '';
            var html2 ='';
            var i;
                console.log(data);
                 if(data.length==0){
                        html += '<option value=""> Data Belum Ada</option>';
                        html2 +='<option value=""> Data Belum Ada</option>';
                    }else{
                        for(i=0; i<data.length; i++){
                            html += '<option value="' + data[i].cp_request+  '"> '+data[i].jobs_title+'</option>';
                            html2 +='<option value="' + data[i].location_id+  '"> '+data[i].location_name+'</option>';
                        }
                    }
                    // for(i=0; i<data.length; i++){
                    //     if(data[i].location_id == null){
                    //         html2 +='<option value=""> Data Belum Ada</option>';
                    //     }
                    //     else{
                    //         html2 +='<option value="' + data[i].location_id+  '"> '+data[i].location_name+'</option>';
                    //     }
                    // }
                    $('.job-request').html(html);
                    $('.location-request').html(html2);
            }
        });
    });
});



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


// $('#job-type').on('change', function () {
//     var table = $("#"+tab_active).DataTable();
//     var type = $('#job-type').val()
//     if(type == 'all')
//     reload();
//     table.columns(3).search( this.value ).draw();
// });

$('#status-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#status').val()
    if(position == 'all') reload();
    if(this.value == 'active') { table.columns(3).search("Send RT|Review RT|Interviewing|Report Interview|Offering", true, false).draw(); }
    else { table.columns(3).search( this.value ).draw(); }
    // table.columns(3).search( this.value ).draw();
});

$('#company-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var company = $('#company').val()
    if(company == 'all')
    reload();
    table.columns(2).search( this.value ).draw();
});

$('#quarantine-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#status').val()
    if(position == 'all') reload();
    if(this.value == 'active') { table.columns(4).search("unprocess|chat|invalid|response|schedule|interviewed|DONE", true, false).draw(); }
    else { table.columns(4).search( this.value ).draw(); }
    // table.columns(3).search( this.value ).draw();
});


// FOR ALL TABLE
$('#register-type').on('change', function () {
    var table = $("#all-table").DataTable();
    var register = $('#register').val()
    if(register == 'all')
    reload_all();
    table.columns(3).search( this.value ).draw();
});

$('#skill-type').on('change', function () {
    var table = $("#all-table").DataTable();
    var skill = $('#skill').val()
    if(skill == 'all')
    reload_all();
    table.columns(2).search( this.value ).draw();
});



function reload(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#status-default-default").attr('selected', true);
    $("#company-default-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}

function reload_all(){
    var tabel = $("#all-table").DataTable();
    tabel.ajax.reload();
    $("#register-default-default").attr('selected', true);
    $("#skill-default-default").attr('selected', true);
    // $("#skill-default-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}



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


$(document).on('click', '.change-status', function() {
    var id   = $(this).data('id');
    $('.modal-body #assign_id').val(id);
});

$(document).on('click', '#submit-status', function(e){
    var assign_id = $('input[name="assign_id"]').val();
    var status    = $('input[name="status"]:checked').val();
    var note      = $('input[name="note"]').val();

    alert('a ' + assign_id + ' - ' + status + ' - ' + note);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('talent.changestatus')}}",
        beforeSend: function(){
            // $('.progress-alert').remove();
            // $('.success-alert').remove();
            alert('nah mau kirim');
        },
        type: 'POST',
        data :{
            assign_id: assign_id,
            status   : status,
            note     : note
        },
        success:function(response)
             {
            if(response == 'berhasil'){
                // $('.success-alert').remove();
                // $('.progress-alert').remove();
                // $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                alert('ok success');
                reload();
            } else {
                // $('.success-alert').remove();
                // $('.progress-alert').remove();
                // $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Tidak Ada Perubahan ! </strong> Tidak terdapat perubahan pada data!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                alert('gagal');
            }
        }
    });
});

$(document).on('click', '.change-reminder', function() {
    var id   = $(this).data('id');
    $('.modal-body #talent_id').val(id);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url     :"{{ route('talent.getreminder')}}",
        type    : 'POST',
        dataType: 'json',
        data :{
            id:id
        },
        success:function(data)
        {   
            $('.modal-body #reminder_date').val(data[0].quarantine_reminder_date);
          
        }
    });
    $('#modal-reminder').modal('show');
});

var all_unprocessFirstTime = true;
var all_quarantineFirstTime = true;
var all_reportFirstTime = true;
var all_tableFirstTime = true;
var all_assignFirstTime = true;
var all_tableFirstTime = true;


var all_unprocess;
var all_quarantine;
var all_report;
var all_table;
var all_offered;
var tab_active = "all-table";



 // function renderTable() {
 //        jQuery('.dataTable').show();
 //        jQuery('.dataTables_info').show();
 //        jQuery('.dataTables_paginate').show();
 //    }

 //    function hideTable() {
 //        jQuery('.dataTable').hide();
 //        jQuery('.dataTables_info').hide();
 //        jQuery('.dataTables_paginate').hide();
 //    }

 //    jQuery('.dataTables_filter input').keypress(function() {
 //        if (jQuery('.dataTables_filter input').val() != '') {
 //            renderTable();
 //        } else {
 //            hideTable();
 //        }
 //    });



$(document).ready(function(){
    // $.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary';
    $('[data-toggle="tooltip"]').tooltip();
    all_tableFirstTime = false;
    tab_active = "all-table";
    all_table = $('#all-table').DataTable({
        autoWidth:false,
        serverSide:true,
        filter:true,
        info:true,
        paging:true,
        processing:true,
        responsive: true,
        ajax:{
            url:"{{route('talent.all')}}",
            type:"GET"
        },

            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"talent_address", defaultColumn:"-",visible:true},
            {data:"skills",defaultColumn:"-",visible:true},
            {data:"info",defaultColumn:"-",visible:true},
            {data:"talent_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ],
    });
   // hideTable();
});




$(document).on('click', 'a[href="#assign"]', function(){
    $('[data-toggle="tooltip"]').tooltip();
    
    tab_active = "all_assign";
    if(all_assignFirstTime){
    all_assign = $('#all_assign').DataTable({
        autoWidth:false,
        serverSide:true,
        filter:true,
        info:false,
        paging:true,
        processing:true,
        ajax:{
            url:"{{route('talent.assign')}}",
            type:"GET"
        },
        columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"assign_date", defaultColumn:"-",visible:true},
            {data:"position",defaultColumn:"-",visible:true},
            {data:"talent_status",defaultColumn:"-",visible:true},
            {data:"talent_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
        ],
    });
        all_assignFirstTime = false;
    }else{
        reload();
    }
});

// $(document).ready(function(){
//     $('[data-toggle="tooltip"]').tooltip();
//     all_quarantineFirstTime = false;
//     tab_active = "all_quarantine";
//      all_quarantine = $('#all_quarantine').DataTable({
//             autoWidth:false,
//             filter:true,
//             info:false,
//             paging:true,
//             processing:false,
//             ajax:{
//                 url:"{{route('talent.quarantine')}}",
//                 type:"GET"
//             },
//             columns:[
//             {data:"checkbox",orderable:false,searchable:false},
//             {data:"talent_name",defaultColumn:"-",visible:true},
//             {data:"talent_address", defaultColumn:"-",visible:true},
//             {data:"talent_gender",defaultColumn:"-",visible:true},
//             {data:"talent_kontak",defaultColumn:"-",visible:true},
//             {data:"action",orderable:false,searchable:false},
//             ],

//         });
       
// });

// $(document).on('click', 'a[href="#ready"]', function(e){ alert('masuk pak eko');
//     tab_active = "all_assign";
//     if(all_keepFirstTime){
//         all_assign = $('#all_assign').DataTable({
//             autoWidth:false,
//             filter:true,
//             info:false,
//             paging:true,
//             processing:false,
//             ajax:{
//                 url:"{{route('talent.assign')}}",
//                 type:"GET"
//             },
//             columns:[
//                 {data:"checkbox",orderable:false,searchable:false},
//                 {data:"talent_name",defaultColumn:"-",visible:true},
//                 {data:"talent_address", defaultColumn:"-",visible:true},
//                 {data:"talent_gender",defaultColumn:"-",visible:true},
//                 {data:"talent_kontak",defaultColumn:"-",visible:true},
//                 {data:"action",orderable:false,searchable:false},
//             ]
//         });
//         all_keepFirstTime = false;
//     } else {
//         reload();
//     }

// });





$(document).on('click', 'a[href="#quarantine"]', function(e){
    tab_active = "all_quarantine";

    if(all_quarantineFirstTime){
        all_quarantine = $('#all_quarantine').DataTable({
            autoWidth:false,
            serverSide:true,
            filter:true,
            info:true,
            paging:true,
            processing:true,
            ajax:{
                url:"{{route('talent.allquarantine')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"talent_address", defaultColumn:"-",visible:true},
            {data:"talent_kontak",defaultColumn:"-",visible:true},
            {data:"quarantine_status",defaultColumn:"-",visible:true},
            {data:"quarantine_reminder",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ],

        });
        all_quarantineFirstTime = false;
    } else {
        reload();
    }

});



$(document).on('click', 'a[href="#all"]', function(e){
    tab_active = "all-table";
    if(all_tableFirstTime){
        all_table = $('#all-table').DataTable({
            autoWidth:false,
            serverSide:true,
            filter:true,
            info:true,
            paging:true,
            processing:true,
            ajax:{
                url:"{{route('talent.all')}}",
                type:"GET"
            },
            columns:[
            {data:"checkbox",orderable:false,searchable:false},
            {data:"talent_name",defaultColumn:"-",visible:true},
            {data:"talent_address", defaultColumn:"-",visible:true},
            {data:"talent_gender",defaultColumn:"-",visible:true},
            {data:"talent_kontak",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ],
        });
        all_tableFirstTime = false;
    } else {
        reload()
    }
});

// function reload(){
//     all_table.ajax.reload();
//     all_unprocess.ajax.reload();
//     all_assign.ajax.reload();
//     all_hired.ajax.reload();
//     all_reject.ajax.reload();
//     fulltime_table.ajax.reload();
//     fulltime_unprocess.ajax.reload();
//     fulltime_interview.ajax.reload();
//     fulltime_hired.ajax.reload();
//     fulltime_reject.ajax.reload();
//     parttime_table.ajax.reload();
//     parttime_unprocess.ajax.reload();
//     parttime_interview.ajax.reload();
//     parttime_hired.ajax.reload();
//     parttime_reject.ajax.reload();
//     internship_table.ajax.reload();
//     internship_unprocess.ajax.reload();
//     internship_interview.ajax.reload();
//     internship_hired.ajax.reload();
//     internship_reject.ajax.reload();
// }


$(document).on('click', '#move', function(){
    var id = [];
    // var status = [];
    // var data = $('#status').val();
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
                    // status.push(dataValue[1]);
                });

                if(id.length > 0)
                {  
                    $.ajax({
                        url:"{{ route('talent.quarantine')}}",
                        method: "get",
                        // data :{id:id, data:data, status:status},
                        data :{id:id},
                        success:function(response)
                        {   
                            if(response == 'success'){
                                swal('Success','Data have been moved','success');
                            }
                            reload_all();
                        }
                    });
                }
                else{
                    swal('Error', 'Please select some data', 'error');
                }
            }
            // else {
            //     alert('else ini');
            // }
        });
});

$(document).on('click', '#moveunquarantine', function(){
    var id = [];
    // var status = [];
    // var data = $('#status').val();
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
                    // status.push(dataValue[1]);
                });

                if(id.length > 0)
                {   
                    $.ajax({
                        url:"{{ route('talent.unquarantine')}}",
                        method: "get",
                        // data :{id:id, data:data, status:status},
                        data :{id:id},
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
            else {
                alert('else ini');
            }
        });
});

$(document).on('click', '#moveassign', function(){
    var id = [];
    var request_id = [];
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
                    request_id.push(dataValue[1]);
                });

                if(id.length > 0)
                {   
                    $.ajax({
                        url:"{{ route('talent.movestatus')}}",
                        method: "get",
                        // data :{id:id, data:data, status:status},
                        data :{id:id, data:data, request_id:request_id},
                        success:function(response)
                        {   
                            if(response == 'success'){
                                swal('Success','Data have been moved','success');
                            }
                            // else{
                            //     swal('Error','gagal','error')
                            // }
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
