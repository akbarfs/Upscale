@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Jobs</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Edit Jobs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form id="job-form" action="{{url('admin/jobs/update/'.$job->jobs_id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <strong>Job Details</strong>
                  </div>
                  <div class="card-body card-block">
                      
                    <div class="form-group col-md-6">

                          <label for="text-input" class=" form-control-label">Job title</label>
                          <input value="{{$job->jobs_title}}" type="text" id="jobs_title" name="jobs_title" placeholder="Input job title" class="form-control">{{-- <small class="form-text text-muted">This is a help text</small> --}}

                        <label for="select" class=" form-control-label">Urgent Hiring</label>
                            <select name="jobs_urgent" id="urgent" class="form-control">
                                <option {{$job->jobs_urgent == 'urgent' ? 'selected':'' }} value="Fulltime">Urgent</option>
                                <option  {{$job->jobs_urgent == 'noturgent' ? 'selected':'' }} value="Parttime">Not Urgent</option>
                            </select>

                        <label for="select" class=" form-control-label">Job type</label>
                        <select name="jobs_type_time" id="type" class="form-control">
                            <option {{$job->jobs_type_time == 'fulltime' ? 'selected':'' }} value="Fulltime">Fulltime</option>
                            <option  {{$job->jobs_type_time == 'parttime' ? 'selected':'' }} value="Parttime">Parttime</option>
                            <option {{$job->jobs_type_time == 'internship' ? 'selected':'' }} value="Internship">Internship</option>
                          </select>


                          <label for="select" class=" form-control-label">Position Level</label>

                          <select name="position-level" id="position-level" class="form-control">

                            <option value="CEO/GM/Director/Senior Manager">CEO/GM/Director/Senior Manager</option>
                            <option value="Manager/Assistant Manager">Manager/Assistant Manager</option>
                            <option value="Supervisor/Coordinator">Supervisor/Coordinator</option>
                            <option value="Staff (non-management & non-supervisor)">Staff (non-management & non-supervisor)</option>
                            <option value="Less Than 1 year of experience">Less Than 1 year of experience</option>
                          </select>
                          <label for="select" class=" form-control-label">Jobs Status</label>
                          <select name="status" id="status" class="form-control">
                            <option @if($job->jobs_active === 'Y') selected="" @endif value="Y">Aktif</option>
                            <option @if($job->jobs_active === 'N') selected="" @endif  value="N">Inaktif</option>
                          </select>



                    </div>
                    <div class="form-group col-md-6">

                        <label for="select" class=" form-control-label">Location</label>

                          <select name="joblo_location_id" id="location" class="form-control">
                            @foreach($locations as $location)
                            <option @if($location->location_id == $job->joblo->joblo_location_id) selected @endif value="{{$location->location_id}}">{{$location->location_name}}</option> 
                            @endforeach                              
                          </select>

                        <label for="select" class=" form-control-label">Category</label>

                          <select name="jobca_category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option @if($category->categories_id == $job->jobca->jobca_category_id) selected @endif value="{{$category->categories_id}}">{{$category->categories_name}}</option>
                            @endforeach
                          </select>
                          <label for="select" class=" form-control-label">Years of Experience</label>

                              <select name="yoe" id="yoe" class="form-control">
                                
                                <option value="">No Experience</option>
                                <option value="1 Year of Experience ">1 Year of Experience</option> 
                                <option value="2 Years of Experience ">2 Years of Experience</option> 
                                <option value="3 Years of Experience ">3 Years of Experience</option> 
                                <option value="4 Years of Experience ">4 Years of Experience</option> 
                                <option value="5 Years of Experience ">5 Years of Experience</option> 
                                <option value="6 Years of Experience ">6 Years of Experience</option> 
                              </select>


                    </div>

                  </div>
                </div>
            </div>
                

                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Job Description</strong>
                      </div>
                      <div class="card-body card-block">
                          <input type="hidden" name="short" id="short" value="{{$job->jobs_desc_short}}">

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">General Requirement</label>
                            <textarea class="form-control" id="center" name="center" id="center">{{$job->jobs_desc_center}}</textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Requirements Field</label>
                            <textarea class="form-control" id="left" name="left" id="left">{{$job->jobs_desc_left}}</textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                            <label class="form-control-label">Responsibilies and Benefits</label>
                            <textarea class="form-control" id="right" name="right" id="right">{{$job->jobs_desc_right}}</textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>
                          </div>

                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                              <label class=" form-control-label">Job Image</label>
                            </div>
                            <div class="col-12 col-md-12">
                                  <input id="upload-pic" name="job_image" accept=".jpg, .png, .jpeg" type="file"/>
                            </div>
                          </div>
                          @if(!empty($job->jobs_image))
                          <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <img id="blah" src="{{"data:image/;base64,".$job->jobs_image}}">
                            </div>
                          </div>
                          @endif
                      </div>
                      <div class="card-footer">
                        <div class="pull-right">
                          <button type="button" id="save" class="btn btn-success">Save</button>
                          <button type="button" class="btn btn-danger">Reset</button>
                      </div>
                      </div>
                    </div>
                </div>

        </div>
    </form>
    </div>
</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>
      $(document).on('change', '#yoe', function(){
        $('input[name="short"]').val($('#yoe').val() + "(" + $('#position-level').val() + ")");
    });

    $(document).on('change', '#position-level', function(){
        $('input[name="short"]').val($('#yoe').val() + "(" + $('#position-level').val() + ")");
    });

  $(document).ready(function(){
    var string = "{{$job->jobs_desc_short}}";
    var split = string.split("(");
    var hasil = split[1].split(")");
    if(split[0] == '')
     $("#yoe").prepend("<option disabled selected>No Experience</option>");
    else 
     $("#yoe").prepend("<option disabled selected>" + split[0] + "</option>");
    
     $("#position-level").prepend("<option disabled selected>" + hasil[0] + "</option>");
  });
  $(function(){

    CKEDITOR.replace('right',{
        language:'en-gb'
    });
    CKEDITOR.replace('left',{
        language:'en-gb'
    });
    CKEDITOR.replace('center',{
        language:'en-gb'
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
    var job_image = $(this).val();
    readURL(this);
    $('#blah').show();
    });

    $(document).on('click', '#save', function(){

    var jobs_title = $('#jobs_title');
    var type       = $('#type');
    var urgent     = $('#urgent');
    var location   = $('#location');
    var category   = $('#category');
    var short      = $('#short');
    var center     = CKEDITOR.instances['center'].getData();
    var left       = CKEDITOR.instances['left'].getData();
    var right      = CKEDITOR.instances['right'].getData();
    var pic        = $('#upload-pic');
    var status     = $('#status');
    var yoe        = $('#yoe');
    var position_level = $('#position-level');

        if(yoe.val() == null || yoe.val() == ''){
          swal('Please fill out job years of experience field','');
          jobs_title.focus();
          return false;
        }
        if(position_level.val() == null || position_level.val() == ''){
          swal('Please fill out Position Level  field','');
          jobs_title.focus();
          return false;
        }

    if(jobs_title.val() == ''){
    swal('Please fill out job title field','');
    jobs_title.focus();
    return false;
    }
    if(urgent.val() == '0'){
    swal('Please select job urgent','');
    type.focus();
    return false;
    }
    if(type.val() == '0'){
    swal('Please select job type','');
    type.focus();
    return false;
    }
    if(location.val() == '0'){
    swal('Please select locations','');
    location.focus();
    return false;
    }
    if(category.val() == '0'){
    swal('Please select categories','');
    category.focus();
    return false;
    }
    if(short.val() == ''){
    swal('Please fill out description field aa','');
    short.focus();
    return false;
    }
    if(status.val() == ''){
      swal('Please select job status','');
          status.focus();
          return false;
    }
    if(center == '' && left == '' && right == '' ){
    swal('Please fill out description field','');
    center.focus();
    return false;
    }     

      else{
        swal({
                  title: 'Save Job?',
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
                                $('#job-form').submit();
                            }
                        });
      }
    });
  </script>

@endpush

@endsection
