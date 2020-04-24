@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Bootcamp</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Edit Bootcamp</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form id="bootcamp-form" action="{{url('admin/bootcamp/update/'.$bootcamp->event_id)}}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
        <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Bootcamp</strong>
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Bootcamp title</label>
                            <input type="text" value="{{$bootcamp->event_title}}" id="title" name="event_title" class="form-control">
                          </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Fee</label>
                              <select id="event_fee" name="event_fee" class="form-control">
                                <option value=""></option>
                                @if($bootcamp->event_fee=='free')
                                <option value="free" selected>Free</option>
                                <option value="paid">Paid</option>
                                @else
                                <option value="free">Free</option>
                                <option value="paid" selected>Paid</option>
                                @endif
                              </select>
                              <div id="bayar" style="display: none;">
                                <input type="text" id="harga" name="harga" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Class</label>
                              <select name="event_class" id="eventclass" class="select-class form-control">
                                <option value=""></option>
                                @foreach ($class as $class)
                                  <option value="{{$class->class_id}}"
                                  @if($bootcamp->event_class == $class->class_id)
                                    selected
                                  @endif
                                      >{{$class->class_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Description Class</label>
                            <textarea class="form-control" id="desc"  name="event_desclass" id="center">{{$bootcamp->event_desclass}}</textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Software Requirement</label>
                            </div>
                            <div class="col-md-12">
                            <select id="icon" name="icon[]" class="select-icon form-control" multiple="multiple">
                              
                                @foreach ($icon as $icon)
                                <option value="{{$icon->icon_id}}"
                                  @if(isset($bootcamp))
                                    @if($bootcamp->hasIco($icon->icon_id))
                                      selected
                                    @endif
                                  @endif
                                  >{{$icon->icon_name}}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class=" form-control-label">Bootcamp Image</label>
                            </div>
                            <div class="col-12 col-md-12">
                                  <input id="upload-pic" name="event_image" accept=".jpg, .png, .jpeg" type="file" class="form-control"/>
                            </div>
                          </div>
                          @if(!empty($bootcamp->event_image))
                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class=" form-control-label">Current Image</label>
                              <div class="col-12 col-md-12">
                              <img id="blah" src="{{asset('public/event/'.$bootcamp->event_image)}}" class="img-responsive">
                            </div>
                            </div>
                          </div>
                          @endif

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Start Date</label>
                              </div>
                            <div class="col-12 col-md-12">
                              <input type="text" value="{{ $bootcamp->event_date->toDateString() }}" id="date" name="event_date" class="form-control"/>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp End Date</label>
                              </div>
                            <div class="col-12 col-md-12">
                              <input type="date" value="{{ $bootcamp->event_enddate->toDateString() }}" id="enddate" name="event_enddate" class="form-control"/>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Bootcamp Location</label>
                            <select id="eventlocation" name="event_location" class="select-location form-control">
                              <option value=""></option>
                                @foreach ($loc as $loc)
                                  <option value="{{$loc->loc_id}}" 
                                  @if($bootcamp->event_location == $loc->loc_id)
                                    selected
                                  @endif
                                    >{{$loc->loc_address}}</option>
                                @endforeach
                              </select>
                          </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Fasilitas</label>
                            </div>
                            <div class="col-md-12">
                            <select id="fasilitas" name="fasilitas[]" class="select-fasilitas form-control" multiple="multiple">
                              
                                @foreach ($fas as $fasilitas)
                                <option value="{{$fasilitas->id}}"
                                  @if(isset($bootcamp))
                                    @if($bootcamp->hasTag($fasilitas->id))
                                      selected
                                    @endif
                                  @endif
                                  >{{$fasilitas->fasilitas_name}}</option>
                                @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Mentor</label>
                            </div>
                            <div class="col-md-12">
                            <select id="mentor" name="mentor[]" class="select-mentor form-control" multiple="multiple">
                              @foreach ($mentor as $mentor)
                                <option value="{{$mentor->mentor_id}}"
                                  @if(isset($bootcamp))
                                    @if($bootcamp->hasMen($mentor->mentor_id))
                                      selected
                                    @endif
                                  @endif
                                  >{{$mentor->mentor_name}}</option>
                              @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Soal Seleksi</label>
                              <select name="soal" id="soal" class="select-soal form-control">
                                <option selected disabled></option>
                                @foreach ($soal as $soal)
                                <option value="{{$soal->soal_id}}"
                                  @if($bootcamp->event_soal == $soal->soal_id)
                                    selected
                                  @endif
                                >{{$soal->file_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Calendar</label>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-info" id="add" type="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add entry</button>
                                  <table class="table" id="calendartable">
                                    <tr>
                                      <th>Name</th>
                                      <th>Date</th>
                                      <th>URL</th>
                                      <th>File</th>
                                      <th>Text</th>
                                      <th></th>
                                    </tr>
                                    @foreach ($cal as $cal)
                                    <tr>
                                    <input type="hidden" name="id[]" class="form-control" />
                                      <td><input type="text" name="calendar_name[]" class="form-control calendar_name" value="{{$cal['calendar_name']}}" placeholder="Name" /></td>
                                      <td><input type="date" id="date" name="calendar_date[]" value="{{$cal->calendar_date}}" class="form-control" /></td>
                                      <td><input type="text" name="url[]" class="form-control url" placeholder="URL" value="{{$cal->url}}" /></td>
                                      <td><input type="file" name="file[]" class="form-control file"/></td>
                                      <td><input type="text" name="text[]" class="form-control text" value="{{$cal->calendar_text}}" placeholder="Text" /></td>
                                      <td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></td>
                                    </tr>
                                    @endforeach
                                  </table>
                            </div>
                          </div>
                      </div>
                      <div class="card-footer">
                      <div class="pull-left">
                          <button type="button" data-toggle="modal" data-target="#modal-preview" class="btn btn-success" onclick="preview()">Preview</button>
                      </div>
                        <div class="pull-right">
                          <button type="button" id="save" class="btn btn-success">Save</button>
                          <button type="Reset" class="btn btn-danger">Reset</button>
                      </div>
                      </div>
                    </div>
                </div>

        </div>
    </form>
    </div>
</div>

<div class="modal fade" id="modal-add-location">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Location</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-add-location" action="{{route('location.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        City <br>
                        <input type="text" name="loc_city" id="loc_city" class="form-control" placeholder="City"> <br>
                        Address <br>
                        <input type="text" name="loc_address" id="loc_address" class="form-control" placeholder="Address"> <br>
                        Maps (iframe from Google Maps) <br>
                        <input type="text" name="loc_maps" id="loc_maps" class="form-control" placeholder="Maps"> <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="submit" id="savelocation" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>


<div class="modal fade" id="modal-preview">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Preview</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Title</strong>
                        <p id="ptitle"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Fee</strong>
                        <p id="pfee"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp class</strong>
                        <p id="pclass"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Class Description</strong>
                        <p id="pdesc"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Image</strong><br>
                        <img style="display: none;" id="blah" src="">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-8">
                      <strong>Software Requirement</strong>
                        <p id="psoftware"></p>
                      </div>
                      <div class="form-group col-md-4">
                        
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                      <strong>Bootcamp Fasilitas</strong>
                        <p id="pfasilitas"></p>
                      </div>
                      <div class="form-group col-md-6">
                        
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Date</strong><br>
                        Start : <p id="pstart"></p>
                        End : <p id="pend"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Location</strong>
                        <p id="plocation"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Mentor</strong>
                        <p id="pmentor"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Soal</strong>
                        <p id="psoal"></p>
                      </div>
                    </div>
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
        $('.select-location').select2({
            width :'100%',
            language : {
                noResults : function () {
                    return 'Your Location is not Available. <button data-toggle="modal" data-target="#modal-add-location" type="button" class="btn btn-primary">Add Location</button>';
                },
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        });
</script> 

<script>

$(".select-icon").select2({
    width: '80%',
    placeholder:'Software Requirement'
});

$(".select-fasilitas").select2({
    width: '80%',
    placeholder:'Fasilitas'
});

$(".select-mentor").select2({
    width: '80%',
    placeholder:'Mentor'
});


    $(function(){
        CKEDITOR.replace('desc',{
                language:'en-gb'
            });
    });

$(document).ready(function(){
$("#add").click(function(){
      var html = '';
      html += '<tr>';
      html += '<input type="hidden" name="id[]" class="form-control" />';
      html += '<td><input type="text" name="calendar_name[]" class="form-control calendar_name" placeholder="Name" /></td>';
      html += '<td><input type="date" id="date" name="calendar_date[]" class="form-control" /></td>';
      html += '<td><input type="text" name="url[]" class="form-control url" placeholder="URL" /></td>';
      html += '<td><input type="file" name="file[]" class="form-control file"/></td>';
      html += '<td><input type="text" name="text[]" class="form-control text" placeholder="Text" /></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></tr>';
      $('#calendartable').append(html);
 });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });
});

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#upload-pic").change(function(){
        var bootcamp_image = $(this).val();
        readURL(this);    });

        function preview(){
  var x = document.getElementById("title").value;
  document.getElementById("ptitle").innerHTML = x;
  var q = document.getElementById("event_fee").value;
  document.getElementById("pfee").innerHTML = q;
  var w = $( "#eventclass option:selected" ).text();
  document.getElementById("pclass").innerHTML = w;
  var edesc = CKEDITOR.instances['desc'].getData()
  document.getElementById("pdesc").innerHTML = edesc;
  var selSof = $.map($("#icon option:selected"), function (el, i) {
         return $(el).text();
     });
     $("#psoftware").text(selSof.join(", "));
  var d = document.getElementById("date").value;
  document.getElementById("pstart").innerHTML = d;
  var ed = document.getElementById("enddate").value;
  document.getElementById("pend").innerHTML = ed;
  var l = document.getElementById("location").value;
  document.getElementById("plocation").innerHTML = l;
  var selMulti = $.map($("#fasilitas option:selected"), function (el, i) {
         return $(el).text();
     });
     $("#pfasilitas").text(selMulti.join(", "));
  var selMen = $.map($("#mentor option:selected"), function (el, i) {
         return $(el).text();
     });
     $("#pmentor").text(selMen.join(", "));
  var e = $( "#soal option:selected" ).text();
  document.getElementById("psoal").innerHTML = e;
}

    $(document).on('click', '#save', function(){
      var title = $('#title');
      var desc  = CKEDITOR.instances['desc'].getData();
      var pic   = $('#upload-pic');
      var date = $('#date');
      var enddate = $('#event_enddate');

      if(title.val() == ''){
        swal('Please fill out bootcamp title field','');
            title.focus();
            return false;
      }
      if(desc == ''){
        swal('Please fill out bootcamp description field','');
            desc.focus();
            return false;
      }
      if(date.val() == ''){
        swal('No Date Added','');
            date.focus();
            return false;
      }
      if(enddate.val() == ''){
        swal('No Date Added','');
            enddate.focus();
            return false;
      }
      else{
        swal({
                  title: 'Save Bootcamp?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Save',
                  cancelButtonText: 'Cancel',
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                    }).then((result) => 
                        {
                            if (result.value) 
                            {
                                $('#bootcamp-form').submit();
                            }
                        });
      }
    });
  </script>

@endpush

@endsection