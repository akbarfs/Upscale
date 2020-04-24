@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Job Apply Detail</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('jobsapply')}}">Jobs Apply</a></li>
                    <li class="active">Job Apply Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
        @if(isset($interview->interview_schedule_status))
            @if($all->jobs_apply_status == 'interview' && $interview->interview_schedule_status == "not-scheduled")
            <div class="alert alert-danger fade out show" role="alert">
                <strong>Perhatian ! </strong> Status pelamar telah diubah menjadi <strong>Interview</strong> tetapi jadwal interview belum ditentukan! harap <strong data-toggle="modal" data-target="#myModal">Jadwalkan Interview</strong>
                <button type="button" class="close" data-toggle="modal" data-target="#myModal">
                    <span aria-hidden="true" class="fa fa-calendar"></span>
                </button>
            </div>
            @endif
        @endif
        @if($all->jobs_apply_note != '')
        <div class="alert alert-warning fade out show" role="alert">
            <strong>Catatan : </strong> {{$all->jobs_apply_note}}
            <button type="button" class="close tambah-catatan" data-toggle="modal" data-target="#modal-tambah-catatan">
                <span aria-hidden="true" class="fa fa-commenting-o"></span>
            </button>
        </div>
        @endif
    <div class="animated fadeIn">
        <div class="row">


            <div class="tab-content col-md-7 " id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Profile</strong>
                                </div>
                                <form style="padding-left: 20px; padding-top: 15px;">
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_name}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Position</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_title}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Location</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_location}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Status</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_status}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Gender</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_gender}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Place of birth, Birthdate</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong id='ttl'></strong></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Phone</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_phone}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_email}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Current Address</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_current_address}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Information From</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_information}}</strong></p>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Repository link</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_portofolio}}</strong></p>
                                        </div>
                                    </div>
                                    @if($all->jobs_apply_type_time == 'fulltime')
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Expected Salary</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >{{$all->jobs_apply_expected_salary}}</strong></p>
                                        </div>
                                    </div>
                                    @elseif($all->jobs_apply_type_time == 'internship')
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Campus</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_campus}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Skill</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_skill}}</strong></p>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Periode</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->jobs_apply_periode}}</strong></p>
                                        </div>
                                    </div>
                                    @endif
                                </form>
                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Curriculum Vitae</strong>
                                </div>
                            <div class="card-body">

                                    <iframe src="{{asset('storage/Curriculum Vitae/'.$all->jobs_apply_cv)}}" style="height:1000px;width:100%"></iframe>
                            </div>

                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-report" role="tabpanel" aria-labelledby="v-pills-report-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Report Talent</strong>
                                </div>
                            <div class="card-body">
                                    <object data="{{"data:application/vnd.openxmlformats-officedocument.presentationml.presentation;base64,".$all->jobs_apply_report_talent}}" style="height:1000px;width:100%"></object>
                                <!-- <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{"data:application/vnd.openxmlformats-officedocument.presentationml.presentation;base64,".$all->jobs_apply_report_talent}}' width='100%' height='600px' frameborder='0'> -->
                            </div>

                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Portofolio</strong>
                                </div>
                            <div class="card-body">
                                <object data="{{"data:application/pdf;base64,".$all->jobs_apply_portofolio_file}}" style="height:1000px;width:100%"></object>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>

            <div class="col-md-5">
                <div class="row" style="width:100% !important;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Menu</strong>
                            </div>
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Curriculum Vitae</a>
                                    <a  @if(empty($all->jobs_apply_portofolio_file)) style="display: none;" @endif class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Portofolio</a>
                                    @if($all->jobs_apply_status == 'interview' && $interview->interview_schedule_status != "not-scheduled")
                                        <a class="nav-link" id="report-interview" aria-selected="false"  href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Report Interview</a>
                                    @elseif($all->jobs_apply_status != 'report')
                                        <a class="nav-link"  data-toggle="modal" data-target="#myModal" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Jadwalkan Interview</a>
                                    @endif
                                    <a class="nav-link tambah-catatan"  data-toggle="modal" data-target="#modal-tambah-catatan" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Tambahkan Catatan</a>
                                </div>
                            </div>
                        </div>

                </div>
                @if($all->jobs_apply_status == 'offered')

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Report Interview</strong>
                                </div>
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link" id="v-pills-report-tab" data-toggle="pill" href="#v-pills-report" role="tab" aria-controls="v-pills-report" aria-selected="false">View Report Talent</a>
                                        <a class="nav-link" href="{{url('admin/jobsapply/interview/downloadReportTalent/'.$all->jobs_apply_id)}}">Download Report Interview</a>
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Upload Report Talent</a>
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#inputSkill">Skills</a>
                                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Launch Modal</button> -->

                                    </div>
                                </div>
                            </div>
                        </div>
                @elseif($all->jobs_apply_status != 'offered' && isset($interview)  && $interview->interview_schedule_status != "not-scheduled")

                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Jadwal Interview</strong>
                            </div>
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <div class="row">
                                        <div class="col-sm-4">Lokasi</div>
                                        <div class="col-sm-8">{{$interview->location_name}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">Hari</div>
                                        <div class="col-sm-8" id='hari-interview'></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">Tanggal</div>
                                        <div class="col-sm-8" id='tanggal-interview'></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">Pukul</div>
                                        <div class="col-sm-8" id='pukul-interview'></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6"><button id="batalkan-interview" class="btn btn-danger">Batalkan</button></div><div class="col-sm-6"><button data-toggle="modal" data-target="#myModal" id="reschedule-interview" class="btn btn-warning" style='color:#fff !important;'>Reshcedule</button></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif

            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah-catatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Tambahkan Catatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <input type="text" name="jobs_apply_note" class="form-control" id="catatan" placeholder="Masukan Catatan">
                <input type="hidden" name="jobs_apply_id" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="button" id='simpan-catatan'class="btn btn-success">Simpan Catatan</button>
        </div>
      </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <strong class="modal-title">Tentukan Perubahan Jadwal Interview</strong>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class='input-group date' id='jadwal-interview'>
                        <input type="datetime" id="interview_schedule" id="jobs_apply_interview_schedule" hidden>
                        {{-- <input  type='text' class="form-control" style='margin-bottom=10px !important;'/> --}}
                        {{-- <p class="text-center" id="tanggal-interview"></p> --}}
                    </div>
                    <label for="select" class=" form-control-label">Lokasi Interview</label>
                    <div class='input-group date'>
                            <select id="location" class="form-control">
                                    <option selected="" disabled="">Lokasi Interview</option>
                                    @foreach($locations as $location)
                                    <option value='{{$location->location_id}}'>{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            {{-- <input  type='text' class="form-control" style='margin-bottom=10px !important;'/> --}}
                            {{-- <p class="text-center" id="tanggal-interview"></p> --}}
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button disabled type="button" class="btn btn-success" id='jadwalkan' data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Report Talent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-apply" data-toggle="validator" method="POST" action="{{url('admin/jobsapply/interview/uploadReportTalent/'.$all->jobs_apply_id)}}" class="add-feild" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="file-loading">
              <input id="input-b9" name="rt" multiple type="file" accept=".pptx" required>
            </div>
            <div id="kartik-file-errors"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" title="Your custom upload logic">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="inputSkill" tabindex="-1" role="dialog" aria-labelledby="inputSkillLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input / Edit Skills</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-apply" data-toggle="validator" method="POST" action="{{url('admin/jobsapply/interview/uploadReportTalent/'.$all->jobs_apply_id)}}" class="add-feild" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="file-loading">
              <input id="input-b9" name="rt" multiple type="file" accept=".pptx" required>
            </div>
            <div id="kartik-file-errors"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" title="Your custom upload logic">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>


@push('script')
@if(isset($interview)  && $interview->interview_schedule_status != "not-scheduled")
<script>
    $(document).on('ready', function() {
        $("#input-b9").fileinput({
            showPreview: false,
            showUpload: false,
            elErrorContainer: '#kartik-file-errors',
            allowedFileExtensions: ["ppt", "pptx", "pdf"]
            //uploadUrl: '/site/file-upload-single'
        });
    });

    $(document).on('click', '#report-interview', function(){
        var interview_schedule = "{{ $interview->interview_schedule }}";
        if(moment(interview_schedule, 'YYYY-MM-DD, h:m:s').isAfter(moment().format('YYYY-MM-DD, h:m:s'))){
            swal({title : 'Perhatian!',text : 'Belum saatnya isi laporan interview saudara ' + "{{ $all->jobs_apply_name }}" + ". Lanjutkan ?",type : 'warning', cancelButtonText: 'Kembali', showCancelButton: true, confirmButtonText: "Lanjutkan"}).then((result) => {if (result.value) location.replace("{{url('admin/jobsapply/interview/'.$all->jobs_apply_id)}}");});
        } else {
            swal({title : 'Perhatian!',text : 'Mulai isi laporan interview saudara ' + "{{ $all->jobs_apply_name }}" + " ?",type : 'warning', cancelButtonText: 'Kembali', showCancelButton: true, confirmButtonText: "Lanjutkan"}).then((result) => {if (result.value) location.replace("{{url('admin/jobsapply/interview/'.$all->jobs_apply_id)}}");});

        }
    });

    $(document).ready(function(){

        var interview_schedule = "{{ $interview->interview_schedule }}";
        if(interview_schedule != null){
            $('#hari-interview').text(moment(interview_schedule, 'YYYY-MM-DD, h:m:s').locale('id').format('dddd'));
            $('#tanggal-interview').text(moment(interview_schedule, 'YYYY-MM-DD, h:m:s').locale('id').format('MMMM Do YYYY'));
            $('#pukul-interview').text(moment(interview_schedule, 'YYYY-MM-DD, h:m:s').locale('id').format('h:mm'));
        }
    });

    $(document).on('click', '#reshcedule', function(){
        var interview_id = parseInt("{{ $interview->interview_id }}");
        var interview_jobs_apply_id = parseInt("{{ $interview->interview_jobs_apply_id }}");
        var interview_location_id = $("#location").val();
        var interview_schedule = $("#jadwal-interview").datetimepicker('date').format('DD/MM/YYYY hh.m');
        if(interview_location_id != null && interview_schedule != '' && interview_id > 0){
            swal({
            title: 'Reschedule Menjadi <br>'+moment(interview_schedule, 'DD/MM/YYYY, h.m').locale('id').format('MMMM Do YYYY, h:mm') + " ?",
            text: $('#jobs_apply_interview_schedule').val(),
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Reschedule'

            }).then((result) =>
            {
                if (result.value)
                {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('interview.reschedule')}}",
                        type: 'POST',
                        data :{
                            interview_id:interview_id,
                            interview_jobs_apply_id:interview_jobs_apply_id,
                            interview_location_id:interview_location_id,
                            interview_schedule : interview_schedule
                        },
                        success:function(response)
                         {
                            if(response == 'berhasil'){
                                swal({title : 'Berhasil',text : 'Jadwal Interview Berhasil Diubah',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                            } else {

                                swal('Gagal', 'Pengubahan Jadwal Gagal!', "error");
                            }
                        }
                    });
                }else{
                    swal('Pengubahan Jadwal Interview Dibatalkan', '', 'error');
                }
            });
        } else {
            swal('Galat', 'Tolong Periksa Lagi Isian Data Anda', 'error');
        }


    });

    $(document).on('click', '#reschedule-interview', function(){
        $("#jadwalkan").attr("id","reshcedule");
    });



    $(document).on('click', '#batalkan-interview', function(){
        var interview_id = parseInt("{{ $interview->interview_id }}");
        var interview_jobs_apply_id = parseInt("{{ $all->jobs_apply_id }}");
        swal({
            title: 'Batalkan Jadwal Interview',
            text: 'Dengan Jadwal ' +moment(interview_schedule, 'DD/MM/YYYY, h.m').locale('id').format('MMMM Do YYYY, h:mm') + " ?",
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Batalkan'

            }).then((result) =>
            {
                if (result.value)
                {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('interview.batalkan')}}",
                        type: 'POST',
                        data :{
                            interview_id:interview_id,
                            interview_jobs_apply_id:interview_jobs_apply_id
                        },
                        success:function(response)
                         {
                            if(response == 'berhasil'){
                                swal({title : 'Berhasil',text : 'Jadwal Interview Berhasil Dibatalkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                            } else {
                                swal('Gagal', 'Pembatalan Jadwal Gagal!', "error");
                            }
                        }
                    });
                }else{
                    swal('Tidak Jadi Membatalkan Jadwal', '', 'error');
                }
            });
    });
</script>
@endif
<script>
    $('#modal-tambah-catatan').on('hidden.bs.modal', function(e){
        $('body').css('padding-right', 0);
    });
    $('#myModal').on('hidden.bs.modal', function(e){
        $('body').css('padding-right', 0);
    });
    $(document).on('click', '.tambah-catatan', function(e){
    $('input[name="jobs_apply_id"]').val("{{$all->jobs_apply_id}}");
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
});

$(document).on('click', '#simpan-catatan', function(e){
    var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
    var jobs_apply_note = $('input[name="jobs_apply_note"]').val();
    swal({
        title :'Perhatian!',
        text : 'Tambahkan Catatan?',
        type : 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Tambahkan'
        }).then((result) => {
            if (result.value){
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('note.add')}}",
                    type: 'POST',
                    data :{
                        jobs_apply_id:jobs_apply_id,
                        jobs_apply_note:jobs_apply_note
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Catatan Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {

                            swal('Gagal', 'Penambahan catatan gagal!', "error");
                        }
                    }
                });
            }
        });
});
    $(function () {
        $('#jadwal-interview').datetimepicker({
            inline: true,
            sideBySide: true,
            minDate: moment().add(1, 'd'),
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            locale : 'id'

        });
        $("#jadwal-interview").on("dp.change", function (e) {
            $('#jobs_apply_interview_schedule').val(e.date);
        });
    });
    $('#location').on('change', function() {
        $("#jadwalkan").removeAttr("disabled");
        $("#reshcedule").removeAttr("disabled");
    })
    $(document).on('click', '#jadwalkan', function(){
        var interview_jobs_apply_id = parseInt("{{ $all->jobs_apply_id}}");
        var interview_location_id = $("#location").val();
        var interview_schedule = $("#jadwal-interview").datetimepicker('date').format('DD/MM/YYYY hh.m');
        if(interview_location_id != null && interview_schedule != '' && interview_jobs_apply_id > 0){
            swal({
            title: 'Jadwalkan Interview Pada<br>'+moment(interview_schedule, 'DD/MM/YYYY h.m').locale('id').format('MMMM Do YYYY, h:mm') + " ?",
            text: $('#jobs_apply_interview_schedule').val(),
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Jadwalkan'

            }).then((result) =>
            {
                if (result.value)
                {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('interview.add')}}",
                        type: 'POST',
                        data :{
                            interview_jobs_apply_id:interview_jobs_apply_id,
                            interview_location_id : interview_location_id,
                            interview_schedule : interview_schedule
                        },
                        success:function(response)
                         {
                            if(response == 'berhasil'){
                                swal({title : 'Berhasil',text : 'Jadwal Interview Berhasil Dijadwalkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});
                            } else {

                                swal('Gagal', 'Penentuan Jadwal Gagal!', "error");
                            }
                        }
                    });
                }else{
                    swal('Penentuan Jadwal Interview Dibatalkan', '', 'error');
                }
            });
        } else {
            swal('Galat', 'Tolong Periksa Lagi Isian Data Anda', 'error');
        }

    });
    $(document).ready(function(){
        var tanggal_lahir = "{{$all->jobs_apply_birth_date}}";
        $('#ttl').text("{{$all->jobs_apply_place_of_birth}}" + ", " + moment(tanggal_lahir, 'YYYY-MM-DD, h:m:s').locale('id').format('MMMM Do YYYY'));
        $('#jobs_apply_expected_salary').autoNumeric('init');
        $('#jobs_apply_expected_salary').autoNumeric('set', "{{$all->jobs_apply_expected_salary}}");
    });
</script>

@endpush

@endsection
