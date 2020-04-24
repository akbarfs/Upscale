@extends('layouts.apps') @section('content')

<section class="inner-header-title">
    <div class="container">
        <h1>Create Resume</h1>
    </div>
</section>
<div class="clearfix"></div>
<div class="section detail-desc">
    <form id="form-apply" data-toggle="validator" method="POST" action="{{url('apply/storeinkeep/'.$apply->jobs_id)}}" class="add-feild" enctype="multipart/form-data">
        
        {{-- <form class="add-feild"> --}}
            <div class="container white-shadow">
            <div class="row">
                <div class="detail-pic js">
                    <div class="box"> <span name="upload-pic" id="upload-pic" class="inputfile"></span> <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label> </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row bottom-mrg">
                {{ csrf_field() }}

                <div class="col-md-10 col-md-offset-1">
                    <h2 class="detail-title">{{$apply->jobs_title}}'s Form</h2>
                    <div class="extra-field-box">
                        <div class="multi-box">
                            <div class="dublicat-box">
                                <div class="col-md-6 col-sm-6">
                                    <label for="name" class="control-label">Name</label>
                                    <div class="input-group">
                                        <input id="inputname" type="text" name="name" class="form-control" placeholder="Your Name" required=""> 
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-sm-6">
                                    <label class="control-label">Place of Birth</label>
                                    <div class="input-group">
                                        <input id="place" type="text" name="place" class="form-control" placeholder="Place of Birth" required="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label class="control-label">Gender</label>
                                    <div class="input-group">
                                        <select id="gender" class="form-control" name="gender" required="">
                                            <option disabled="">Select Gender</option>
                                            <!-- <option value="0">None</option> -->
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label class="control-label">Email</label>
                                    <div class="input-group">
                                        <input id="email" type="text" name="email" class="form-control" placeholder="Your Email" required=""> 
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="birthdate" class="control-label">Birth Date</label>
                                    <div class="input-group date" >
                                        <input type="text" id="tgl" name="tgl" placeholder="dd/mm/yyyy" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="phone" class="control-label">Phone</label>
                                    <div class="input-group">
                                        <input id="phone" type="number" name="phone" class="form-control" placeholder="Your Phone" required="">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="address" class="control-label">Current City</label>
                                    <div class="input-group">
                                        <input type="text" id="address" name="address" class="form-control" placeholder="Your Current City" required="">
                                    </div>
                                </div>
                                <div id="salary" class="col-md-4 col-sm-4">
                                    <label class="control-label">Expected Salary</label>
                                    <div class="input-group">
                                        <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="es" type="text" name="es" class="form-control" placeholder="Your expected salary" required="">
                                    </div> 
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label for="phone" class="control-label">Job Location</label>
                                    <div class="input-group">
                                        <select id="location" class="form-control" name="jobs_location" required="" title="Select Job Location">
                                            @foreach($location as $loc)
                                            <option value="{{$loc->location_name}}">{{$loc->location_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                

                                
                                
                                
                                
                                <div class="col-md-4 col-sm-4">
                                    <label for="phone" class="control-label">Job Type</label>
                                    <div class="input-group">
                                        <select id="job-type" class="form-control" name="type" required="" title="Select Job Type" onchange="jobType()">
                                            <option value="fulltime">Fulltime</option>
                                            <option id="internship" value="internship">Internship</option>
                                            <option value="partime">Partime</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <label class="control-label">How to know job vacancy info?</label>
                                    <div class="input-group">
                                        <select id="info" name="info" class="form-control">
                                            <option disabled selected value="">Pilih</option>
                                            <option value="Jobstreet" selected>Jobstreet</option>
                                            <option value="Media Cetak">Media Cetak</option>
                                            <option value="Media Elektronik">Media Elektronik</option>
                                            <option value="Bursa Kerja">Bursa Kerja</option>
                                            <option value="Referensi Teman">Referensi Teman</option>
                                            <option value="Alumni">Alumni</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="detail" class="control-label">Detail jobs info from ?</label>
                                    <div class="input-group">
                                        <input type="text" id="detail" name="detail" class="form-control" placeholder="Detail name of job vacancy media" required="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <label for="detail" class="control-label">Input From ?</label>
                                    <div class="input-group">
                                        <select id="applyk" name="apply" class="form-control">
                                            <option value="OLD" selected>Apply Old</option>
                                            <option value="NO">Collect General (No Apply)</option>
                                        </select>
                                    </div>
                                </div>
                                <div style="display: none;" id="campus" class="col-md-12 col-sm-12">
                                    <label class="control-label">Campus/University</label>
                                    <div class="input-group">
                                        <input id="campus" type="text" name="campus" class="form-control" placeholder="Your Campus or University" > 
                                    </div>
                                </div>

                                <div style="display: none;" id="skill" class="col-md-12 col-sm-12">
                                    <label class="control-label">Programming Language</label>
                                    <div class="input-group">
                                        <input id="skill" type="text" name="skill" class="form-control" placeholder="Your Programming Language that experienced" > 
                                    </div>
                                </div>

                                <div style="display: none;" id="periode" class="col-md-12 col-sm-12">
                                    <label class="control-label">Periode</label>
                                    <div class="input-group">
                                        <input id="range" type="text" name="range" class="form-control" placeholder="Periode" > 
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-10 col-md-offset-1" style="margin-top: 40px;">
                    <h2 class="detail-title">Curiculum Vitae</h2>
                    <div class="extra-field-box">
                        <div class="multi-box">
                            <div class="dublicat-box">
                                <div class="col-md-12 col-sm-12">
                                    <p>
                                        *Document that can be uploaded is has type .PDF and have maximum size 600kb
                                        <br> or You Can use template from us <a href="#"><strong>Download Here</strong></a>
                                    </p>
                                    <p></p>
                                    <div class="box"><input type="file" accept=".pdf" name="cv" id="cv" class="inputfile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-10 col-md-offset-1" style="margin-top: 40px;">
                    <h2 class="detail-title">Portofolio</h2>
                    <div class="extra-field-box">
                        <div class="multi-box">
                            <div class="dublicat-box">
                                <div class="col-md-12 col-sm-12">
                                    <div id="pp1" class="input-group">
                                        <p>
                                            *Upload your portofolio to Gitlab/Github, and put the link here
                                        </p>
                                        <p></p>
                                        <input class="form-control" type="text" name="pp" id="pp" placeholder="Your repository link">
                                    </div>
                                    <div id="pp2" class="input-group">
                                        <p>
                                        *or You can upload your Portofolio as PDF file, maximum size 1 MB
                                        </p>
                                        <p></p>
                                            <input type="file" name="filepp" id="filepp" accept=".pdf" >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="row bottom-mrg extra-mrg">
            <div class="col-md-12"> 
                <input type="button" value="Submit your resume" id="apply" class="btn btn-success btn-primary small-btn"> </div>
        </div>

    </form>


</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>
<script type="text/javascript">
	function jobType(){
		var select_status = $('#job-type').val();
        if(select_status == 'fulltime'){
            $('#salary').show();
            $('#campus').hide();
            $('#skill').hide();
            $('#periode').hide();
        }
		if(select_status == 'internship'){
			$('#campus').show();
			$('#skill').show();
			$('#periode').show();
            $('#salary').hide();

		}
		else{
			$('#campus').hide();
			$('#skill').hide();
			$('#periode').hide();
            $('#salary').hide();
		}
	}

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('#blah').attr('src', e.target.result);
    //         }
            
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    
    // $("#image").change(function(){
    //     var image = $(this).val();
    // });

    $("#cv").change(function(){
        var cv = $(this).val();
    });

    $( "#pp" ).keyup(function() {
        if($(this).val() == ''){
            $("#filepp").css("display", 'block');
        } else {
            $("#filepp").css("display", 'none');
        }
    });
    
    $(document).on('change','#filepp' , function(){
        if($('#filepp').val() == ''){
            $("#pp").css("display", 'block');
        } else {
            $("#pp").css("display", 'none');
        }
    });


     $(function() { 
       $('#tgl').datetimepicker({
        'format' : "DD/MM/YYYY", 
        });
     });

     $(document).on('click', '#apply', function(){
		var kolom_kosong = [];
		var location     = $('#location');
		var type         = $('#job-type');
		var name         = $('#inputname');
		var place        = $('#place');
		var tgl          = $('#tgl');
		var gender       = $('#gender');
		var email        = $('#email');
		var phone        = $('#phone');
        var address      = $('#address');
		var detail       = $('#detail');
		var info         = $('#info');
		var campus       =  $('#campus');
		var skill        = $('#skill');
		var range        = $('#range');
		// var image     = $('#image');
		var cv           = $('#cv');
		var pp           = $('#pp');
		var filepp       = $('#filepp');
		var es           = $('#es');
		mailformat       = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
        

        if(name.val() == ''){
            swal('Please fill out name field','');
            name.focus();
            kolom_kosong.push('true');
        }
        if(place.val() == ''){
            swal('Please fill out place of birth field','');
            place.focus();
            kolom_kosong.push('true');
        }
        if(tgl.val() == ''){
            swal('Please fill out birthdate field','');
            tgl.focus();
            kolom_kosong.push('true');
        }
        if(gender.val() == 0){
            swal('Please select gender','');
            gender.focus();
            kolom_kosong.push('true');
        }
        if(email.val() == ''){
            swal('Please fill out email field','');
            email.focus();
            kolom_kosong.push('true');
        }

        var x = document.forms["form-apply"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            swal('Email is invalid','');
            kolom_kosong.push('true');
            }
    
        if(phone.val() == ''){
            swal('Please fill out phone field','');
            phone.focus();
            kolom_kosong.push('true');
        }
        if(address.val() == ''){
            swal('Please fill out address field','');
            address.focus();
            kolom_kosong.push('true');
        }
        if(detail.val() == ''){
            swal('Please fill out detail field','');
            detail.focus();
            kolom_kosong.push('true');
        }
        if(info.val() == ''){
            swal('Please fill out information field','');
            info.focus();
            kolom_kosong.push('true');
        }
        if(campus.val() == '' && type.val() == 'internship' ){
            swal('Please fill out university field','');
            campus.focus();
            kolom_kosong.push('true');
        }
        if(skill.val() == '' && type.val() == 'internship' ){
            swal('Please fill out skill field','');
            skill.focus();
            kolom_kosong.push('true');
        }
        if(range.val() == '' && type.val() == 'internship' ){
            swal('Please fill out all field','');
            range.focus();
            kolom_kosong.push('true');
        }
        // if(image.val() == ''){
        //     swal('No files choosen','');
        //     image.focus();
        //     return false;
        // }

        // var sizeImg = image.prop('files')[0].size;

        // if(sizeImg>500000){
        //     swal('Maximum image size is 500KB','')
        //     image.focus();
        //     return false;
        // }
        if(cv.val() == ''){
            swal('No files choosen','');
            cv.focus();
            kolom_kosong.push('true');
        }

        var sizeCV = cv.prop('files')[0].size;

        if(sizeCV > 1550000){
            swal('Maximum file size is 600KB','')
            cv.focus();
            kolom_kosong.push('true');
        }
        if(pp.val() == '' && filepp.val() == ''){
            swal('Please fill out portofolio field','');
            pp.focus();
            kolom_kosong.push('true');
        }

        if(filepp.val() != ''){
            var sizePP = filepp.prop('files')[0].size;
            if(sizePP>1000000){
                swal('Maximum file size is 1MB','')
                filepp.focus();
                kolom_kosong.push('true');
            }
        }
        // alert(es.val());
        if(!kolom_kosong.includes('true')) {
            swal({
                  title: 'Submit your apply?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Submit',
                  cancelButtonText: 'Cancel',
                }).then((result) => 
                    {
                        if (result.value) 
                        {
                            $('#form-apply').submit();
                        }
                    });
        }
     });


    $(function() {
      $('input[id="range"]').daterangepicker({
        opens: 'left',
        locale: {
          format: 'DD/MM/YYYY'
        }
      });
    });

    $(document).ready(function(){
        $('#es').autoNumeric('init', {aSep:'.', aDec:',', mDec:'0'});
    });
    

	
</script>

@endpush

@endsection