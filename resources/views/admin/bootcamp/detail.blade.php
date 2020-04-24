@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp Event Detail</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('bootcamp.index')}}">Bootcamp</a></li>
                    <li class="active">Bootcamp Event Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="tab-content col-md-7 " id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Event Detail</strong>
                                </div>
                                <form style="padding-left: 20px; padding-top: 15px;">
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <h4><label class=" form-control-label">{{ $bootcamp->event_title }}</label></h4>
                                        </div>
                                        <div class="col-12 col-md-8">
                                          <p class="form-control-static" style="margin-bottom: 0px;"><strong></strong></p>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">{{ $bootcamp->event_fee }}</label>
                                        </div>
                                    </div>

                                    <div class="row d-flex pr-4">
                                        <div class="col" style="text-align: justify;">
                                            {!! $bootcamp->event_desclass !!}
                                            <h5>Event Date : </h5>
                                            <label class=" form-control-label">{{ \Carbon\Carbon::parse($bootcamp->event_date)->format('d/m/Y') }}</label>
                                        </div>
                                    </div>
                                </form>
                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Event Photo</strong>
                                </div>
                            <div class="card-body">

                                    <img src="{{asset('storage/event/'.$bootcamp->event_image)}}" style="height:1000px;width:100%"><br>
                            </div>

                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-calendar" role="tabpanel" aria-labelledby="v-pills-calendar-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Event Calendar</strong>
                            </div>
                            <div class="nav nav-pills pull-right pb-2">
                                    <button data-toggle="modal" data-target="#modal-add-calendar" type="button" class="btn btn-primary">Add</button>
                            </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active">
                                            <table id="calendar-table" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%;">No</th>
                                                        <th style="width: 25%">Name</th>
                                                        <th style="width: 25%">Date</th>
                                                        <th style="width: 25%">URL</th>
                                                        <th style="width: 20%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            @foreach ($calendar as $cal)
                                                <tr>
                                                    <td>{{$nocan++}}</td>
                                                    <td>{{$cal->calendar_name}}</td>                                               
                                                    <td>{{$cal->calendar_date}}</td>
                                                    <td>{{$cal->url}}</td>
                                                    <td style="width:10%;" align="center">
                                                        <a href="#edit-calendar" data-calendar_id="{{$cal->calendar_id}}" data-toggle="modal" data-target="#modal-edit-calendar" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-calendar" data-hapusid="{{$cal->calendar_id}}" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                  
                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-location" role="tabpanel" aria-labelledby="v-pills-location-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Event Location</strong>
                                </div>
                            <div class="card-body">

                                    <div class="row d-flex pr-4">
                                        <div class="col">
                                            {!! $bootcamp->event_location !!}
                                        </div>
                                        <i class="{{$bootcamp->event_fee}}"></i>
                                    </div>
                                    <div class="nav nav-pills pull-right pt-2">
                                        <button data-toggle="modal" data-target="#modal-tambah-location" type="button" class="btn btn-primary">Edit</button>
                                    </div>
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
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Event Detail</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Event Photo</a>
                                    <a class="nav-link" id="v-pills-calendar-tab" data-toggle="pill" href="#v-pills-calendar" role="tab" aria-controls="v-pills-calendar" aria-selected="false">Event Calendar</a>
                                    @if(!empty($bootcamp->event_location))
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-location" role="tab" aria-controls="v-pills-location" aria-selected="false">Event Location</a>
                                    @else
                                    <a class="nav-link"  data-toggle="modal" data-target="#modal-tambah-location" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Tambah Location</a>
                                    @endif
                                    <a class="nav-link"  data-toggle="modal" data-target="#modal-tambah-soal" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Soal Seleksi</a>
                                    @if(!empty($bootcamp->event_class))
                                    <a class="nav-link"  data-toggle="" data-target="" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#" disabled>Class</a>
                                    @else
                                    <a class="nav-link"  data-toggle="modal" data-target="#modal-tambah-materi" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Class</a>
                                    @endif
                                    <a class="nav-link"  data-toggle="modal" data-target="#modal-tambah-mentor" role="tab" aria-controls="v-pills-profile" aria-selected="false" href="#">Mentor</a>
                                </div>
                            </div>
                        </div>
                    <!--Jadwal Event-->
                    </div>
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Event</strong>
                            </div>
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <div class="row">
                                        <div class="col-sm-4">Class</div>
                                        @if($bootcamp->event_materi == 0)
                                        <strong>-</strong>
                                        @else
                                        {{ $mat->class_name }}
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">Mentor</div>
                                        @foreach ($listmentor as $lm)
                                        {{ $lm->mentor_name }}<br>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">Soal</div>
                                        @if($bootcamp->event_soal == 0)
                                        <strong>-</strong>
                                        @else
                                        {{ $soalseleksi->file_name }}
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4"><button data-toggle="modal" data-target="#modal-tambah-materi" class="btn btn-warning" style='color:#fff !important;'>Edit Class</button></p></div>
                                        <div class="col-sm-4"><button data-toggle="modal" data-target="#myModal" class="btn btn-warning" style='color:#fff !important;'>Edit Mentor</button></p></div>
                                        <div class="col-sm-4"><button data-toggle="modal" data-target="#modal-tambah-soal" class="btn btn-warning" style='color:#fff !important;'>Edit Soal</button></p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

<div class="modal fade" id="modal-tambah-location" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Lokasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('event.location')}}" id="event_id">
                {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="hidden" name="event_id" id="event_id" value="{{$bootcamp->event_id}}">
                <input type="text" name="event_location" class="form-control" id="event_location" placeholder="Masukan Lokasi">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" id='simpan-location'class="btn btn-success">Simpan</button>
        </div>
                </form>
      </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah-soal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Pilih Soal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('event.soal')}}" id="event_id">
                {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="soal">Soal</label>
                <input type="hidden" name="event_id" id="event_id" value="{{$bootcamp->event_id}}">
                <select id="event_soal" name="event_soal" class="form-control">
                    <option selected="" disabled="">Soal</option>
                    @foreach ($soal as $so)
                        <option value="{{$so->soal_id}}">{{$so->file_name}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="soal" value="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" id='simpan-soal'class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div> 
<div class="modal fade" id="modal-tambah-materi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Pilih Materi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{route('event.materi')}}" id="event_id">
                {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="materi">Class</label>
                <input type="hidden" name="event_id" id="event_id" value="{{$bootcamp->event_id}}">
                <select id="event_materi" name="event_materi" class="form-control">
                    <option selected="" disabled="">Class</option>
                    @foreach ($materi as $item2)
                        <option value="{{$item2->class_id}}">{{{$item2->class_name}}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" id='simpan-materi'class="btn btn-success">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah-mentor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Pilih Mentor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="mentor" class="control-label">Mentor</label>
                <form method="post" action="{{route('event.addmentor')}}" id="mentor_event">
                {{ csrf_field() }}
                <input type="hidden" name="event_id" value="{{$bootcamp->event_id}}" class="event_id" />
                <select name="mentor[]" class="select-mentor form-control" id="" multiple="multiple">
                    @foreach ($mentor as $mentor)
                        <option value="{{$mentor->mentor_id}}">{{{$mentor->mentor_name}}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" id='simpan-mentor'class="btn btn-success">Simpan</button>
        </div>
                </form>
      </div>
    </div>
</div>                



<div class="modal fade" id="modal-add-calendar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Add Calendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body substeps-modal">
            <form method="post" id="insert_form">
                 {{ csrf_field() }}
            <div class="form-group">
                <span id="error"></span>
                <table class="table table-bordered" id="calendars-table">
                    <tr>
                       <th>Name</th>
                       <th>Date</th>
                       <th>URL</th>
                       <th></th>
                       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="fa fa-plus"></span></button></th>
                      </tr>
                </table>
        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-info"value="Insert" />
        </div>
        </form>
      </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-edit-calendar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Edit Calendar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="" method="POST" id="form-edit-calendar">
                @csrf 
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <input type="hidden" name="calendar_id" id="calendar_id">
                    <input type="text" name="calendar_name" id="calendarname" class="form-control" placeholder="Name"> <br>
                    <input type="date" name="calendar_date" id="calendardate" class="form-control"> <br>
                    <input type="url" name="url" id="calendarurl" class="form-control" placeholder="URL"> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">   
                    <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                </div>
      </div>
    </div>
</div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="{{asset('admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/yadcf/0.9.2/jquery.dataTables.yadcf.min.js"></script>

<script>

$(".select-mentor").select2({
    width: '80%',
    placeholder:'Pilih Mentor'
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#calendar-table').DataTable();
});

$(document).ready(function(){
 $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td><input type="text" name="calendar_name[]" class="form-control calendar_name" placeholder="Name" /></td>';
      html += '<td><input type="date" id="date" name="calendar_date[]" class="form-control" /></td>';
      html += '<td><input type="text" name="url[]" class="form-control url" placeholder="URL" /></td>';
      html += '<td><input type="hidden" name="event_id[]" value="{{$bootcamp->event_id}}" class="event_id" /></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></tr>';
      $('#calendars-table').append(html);
 });


$(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
      $('.calendar_name').each(function(){
           var count = 1;
           if($(this).val() == '') {
            error += "<p>Enter Item Skill at "+count+" Row</p>";
            return false;
       }
            count = count + 1;
      });

      $('.calendar_date').each(function(){
           var count = 1;
           if($(this).val() == '') {
            error += "<p>Enter Level Skill at "+count+" Row</p>";
            return false;
       }
            count = count + 1;
      });

      $('.url').each(function(){
          var count = 1;
         if($(this).val() == '') {
            error += "<p>Enter Skill Score at "+count+" Row</p>";
            return false;
         }
       count = count + 1;
      });


      $('.event_id').each(function(){
           var count = 1;
           if($(this).val() == ''){
            error += "<p>Select Unit at "+count+" Row</p>";
            return false;
       }
       count = count + 1;
      });

 var form_data = $(this).serialize();

     if(error == ''){
        $.ajax({
            headers: { 
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('calendar.insert')}}",
            method: "POST",
            dataType: 'json',
            data :form_data,
            success:function(response){
                console.log(response);
                     if(response['message'] == 'success'){
                      $('#calendars-table').find("tr:gt(0)").remove();
                      $('#error').html('<div class="alert alert-success">Date Saved</div>');
                      reload();
                }
            }
        });
      }
          else {
                 $('#error').html('<div class="alert alert-danger">'+error+'</div>');
          }
 });
});

$(document).on('click','a[href="#edit-calendar"]',function(e){
                    var subid = $(this).data('calendar_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editcalendar/'+subid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#calendar_id').val(data.calendar_id);
                            $('#calendarname').val(data.calendar_name);
                            $('#calendardate').val(data.calendar_date);
                            $('#calendarurl').val(data.url);
                            var url2 = '{{ route("calendar.update", ":calendar_id") }}';
                            url2 = url2.replace(':calendar_id', subid);
                            $("#form-edit-calendar").attr('action', url2);
                        }
                    });
              });

$(document).on('click','a[href="#hapus-calendar"]',function(){
    var id = $(this).data('hapusid');
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
                        url:"{{ route('calendar.delete')}}",
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
                
            });
});

</script>
@endpush
@endsection