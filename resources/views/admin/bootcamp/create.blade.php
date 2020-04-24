@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Bootcamp</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Create Bootcamp</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form id="bootcamp-form" action="{{route('bootcamp.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Create Bootcamp</strong>
                      </div>
                      <div class="card-body card-block">
                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Bootcamp Title</label>
                            <input type="text" id="event_title" name="event_title" class="form-control">
                          </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Fee</label>
                              <select id="event_fee" name="event_fee" class="select-fee form-control">
                                <option value=""></option>
                                <option value="free">Free</option>
                                <option value="paid">Paid</option>
                              </select>
                              <div id="bayar" style="display: none;">
                                <input type="text" id="harga" name="harga" class="form-control">
                              </div>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Class</label>
                              <select id="eventclass" name="event_class" class="select-class form-control">
                                <option selected disabled></option>
                                @foreach ($class as $class)
                                  <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          
                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Description Class</label>
                            <textarea class="form-control" name="event_desclass" id="desclass"></textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Software Requirement</label>
                            </div>
                            <div class="col-md-12">
                            <select id="icon" name="icon[]" class="select-icon form-control" multiple="multiple">
                              @foreach ($icon as $icon)
                                <option value="{{$icon->icon_id}}">{{$icon->icon_name}}</option>
                              @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class=" form-control-label">Bootcamp Image</label>
                            </div>
                            <div class="col-md-12">
                                  <input type="file" id="upload-pic" name="event_image" accept=".jpg, .png, .jpeg" class="form-control"/>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp Start Date</label>
                            </div>
                            <div class="col-md-12">
                              <input type="date" id="date" name="event_date" class="form-control"/>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Bootcamp End Date</label>
                            </div>
                            <div class="col-md-12">
                              <input type="date" id="event_enddate" name="event_enddate" class="form-control"/>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Bootcamp Location</label>
                            <select id="eventlocation" name="location" class="select-location form-control">
                                <option selected disabled></option>
                                @foreach ($loc as $loc)
                                  <option value="{{$loc->loc_id}}">{{$loc->loc_address}}, {{$loc->loc_city}}</option>
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
                                <option value="{{ $fasilitas->id }}">{{ $fasilitas->fasilitas_name }}</option>
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
                                <option value="{{$mentor->mentor_id}}">{{$mentor->mentor_name}}</option>
                              @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class="form-control-label">Soal Seleksi</label>
                              <select id="soal" name="soal" class="select-soal form-control">
                                <option selected disabled></option>
                                @foreach ($soal as $soal)
                                <option value="{{$soal->soal_id}}">{{$soal->file_name}}</option>
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
                                  </table>
                            </div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <!-- <img style="display: none;" id="blah" src=""> -->
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
    placeholder:'Icon Software Requirement'
});

$(".select-fasilitas").select2({
    width: '80%',
    placeholder:'Bootcamp Fasilitas'
});

$(".select-mentor").select2({
    width: '80%',
    placeholder:'Bootcamp Mentor'
});

$(function(){
    CKEDITOR.replace('desclass',{
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
    
 //   function jenis_bootcamp(that) {
 //   if (that.value == "paid") {
 //       document.getElementById("bayar").style.display = "block";
 //   } else {
 //       document.getElementById("bayar").style.display = "none";
 //   }
 //   };

    $("#upload-pic").change(function(){
        var bootcamp_image = $(this).val();
        readURL(this);
        $('#blah').show();
    });

function preview(){
  var x = document.getElementById("event_title").value;
  document.getElementById("ptitle").innerHTML = x;
  var q = document.getElementById("event_fee").value;
  document.getElementById("pfee").innerHTML = q;
  var w = $( "#eventclass option:selected" ).text();
  document.getElementById("pclass").innerHTML = w;
  var edesc = CKEDITOR.instances['desclass'].getData()
  document.getElementById("pdesc").innerHTML = edesc;
  var selSof = $.map($("#icon option:selected"), function (el, i) {
         return $(el).text();
     });
     $("#psoftware").text(selSof.join(", "));
  var d = document.getElementById("date").value;
  document.getElementById("pstart").innerHTML = d;
  var ed = document.getElementById("event_enddate").value;
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
      var title = $('#event_title');
      var fee = $('#event_fee');
      var bclass = $('#eventclass');
      var desc  = CKEDITOR.instances['desclass'].getData();
      var ico = $('#icon');
      var pic   = $('#upload-pic');
      var date = $('#date');
      var enddate = $('#event_enddate');
      var loca = $('#location');
      var fasi = $('#fasilitas');
      var ment = $('#mentor');
      var soal = $('#soal');

      if(title.val() == ''){
        swal('Please fill out bootcamp title field','');
            title.focus();
            return false;
      }
      if(fee.val() == ''){
        swal('Please select bootcamp fee','');
            fee.focus();
            return false;
      }
      if(bclass.val() == null){
        swal('Please select bootcamp class','');
            bclass.focus();
            return false;
      }
      if(desc == ''){
        swal('Please fill out bootcamp description field','');
            desc.focus();
            return false;
      }
      if(ico.val() == null){
        swal('Please select bootcamp software requirement field','');
            ico.focus();
            return false;
      }
      if(pic.val() == ''){
        swal('No files choosen','');
            pic.focus();
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
      if(loca.val() == ''){
        swal('Please fill out bootcamp location field','');
            loca.focus();
            return false;
      }
      if(fasi.val() == null){
        swal('No Fasilitas Selected','');
            fasi.focus();
            return false;
      }
      if(ment.val() == null){
        swal('No Mentor Selected','');
            ment.focus();
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