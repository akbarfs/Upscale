@extends('layouts.hf')

@section('content')

    <section id="daftar" class="section" style="margin-top: 100px;">
        <div class="container">
            <div class="row text-center" style="margin: 0 30px 60px 30px;">
                <div class="col-md-12">
                    <h2>{{$apply->jobs_title}}'s Form</h2>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-12">
                    <div class="boxed boxed--border">
                        <form class="row mx-0" id="form-apply" data-toggle="validator" method="POST" action="{{url('apply/store/'.$apply->jobs_id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Nama<span
                                        style="color: red;">
                                        *</span></label>
                                <input id="inputname" type="text" name="name" class="validate-required form-control" placeholder="Nama Lengkap" required="">
                            </div>
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Nomor Telepon (Whatsapp/Telegram)<span
                                        style="color: red;">
                                        *</span></label>
                                <input id="phone" type="number" name="phone" placeholder="+62" class="validate-required form-control" required="">
                            </div>
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Email<span style="color: red;">
                                        *</span></label>
                                <input type="email" name="email" class="validate-required form-control" placeholder="Email Anda" required="">
                            </div>
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Tempat Lahir<span
                                        style="color: red;"> *</span></label>
                                <input id="place" type="text" name="place" class="form-control" placeholder="Tempat Lahir" required="">
                            </div> 
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Tanggal Lahir<span
                                        style="color: red;"> *</span></label>
                                <input type="text" id="tgl" name="tgl" placeholder="dd/mm/yyyy" class="form-control">
                                <!-- <input type="date" name="tgl" required="" class="form-control"> -->
                            </div> 
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Jenis Kelamin<span
                                        style="color: red;"> *</span></label>
                                <div class="input-select">
                                    <select id="gender" class="form-control validate-required" name="gender" required="">
                                        <option value="">Pilih</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Pilih Job Type yang kamu
                                    inginkan<span style="color: red;">
                                        *</span></label>
                                        <div>
                                        <select id="job-type" class="form-control" name="type" required="" title="Select Job Type" onchange="jobType()">
                                            <option value="fulltime">Fulltime</option>
                                            <option id="internship" value="internship">Internship</option>
                                            <option value="partime">Partime</option>
                                        </select>
                                        </div>
                                        
                            </div>
                            <div class="col-md-4">
                                <label style="margin-bottom:55px; font-size: .85714286em; font-weight: 300;">Pilih Job Lokasi
                                    <span style="color: red;">*</span></label>
                                        <div>
                                        <select id="location" name="jobs_location" required="" title="Select Job Location" class="form-control">
                                        @foreach($location as $loc)
                                            <option value="{{$loc->location_name}}">{{$loc->location_name}}</option>
                                        @endforeach
                                    </select>
                                        </div>
                                        
                            </div>
                            <div id="salary" class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Gaji yang Kamu Inginkan</label>
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="es" type="text" name="es" class="form-control" placeholder="Your expected salary">
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: .85714286em; font-weight: 300;">Kota Sekarang<span
                                        style="color: red;"> *</span></label>
                                <input type="text" id="address" name="address" class="form-control" placeholder="Tempat Tinggal Sekarang" required="">
                            </div> 
                            <div class="col-md-6">
                                <label style="font-size: .85714286em; font-weight: 300;">Darimana kamu mengetahui Job
                                    Vacancy ini?</label>

                                <div class="input-select">
                                    <select id="info" name="info" class="form-control">
                                            <option disabled selected value="">Pilih</option>
                                            <option value="Jobstreet">Jobstreet</option>
                                            <option value="Media Cetak">Media Cetak</option>
                                            <option value="Media Elektronik">Media Elektronik</option>
                                            <option value="Bursa Kerja">Bursa Kerja</option>
                                            <option value="Referensi Teman">Referensi Teman</option>
                                            <option value="Alumni">Alumni</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display: none;" id="campus" class="col-md-12">
                                <label style="font-size: .85714286em; font-weight: 300;">Campus/University</label>
                                <input id="campus" type="text" class="form-control" name="campus" placeholder="Your Campus or University" >
                            </div>
                            <div style="display: none;" id="skill" class="col-md-12">
                                <label style="font-size: .85714286em; font-weight: 300;">Programming Language</label>
                                <input id="skill" type="text" class="form-control" name="skill" placeholder="Your Programming Language that experienced" >
                            </div>
                            <div style="display: none;" id="periode" class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Periode</label>
                                <input id="range" type="text" class="form-control" name="range" placeholder="Periode" >
                            </div>
                            <div class="col-md-12">
                                <label>Link Portofolio<span style="color: red;">
                                        *</span></label>
                                <label style="font-size: .85714286em; font-weight: 300;">Upload Your Portofolio
                                    To
                                    Gitlab/Github, And Put The Link Here<span style="color: red;">
                                        *</span></label>
                                <input type="text" name="pp" id="pp" placeholder="Your repository link" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label style="font-size: .85714286em; font-weight: 300;">Protfolio : bisa menggunakan
                                    browse file dan juga
                                    berupa link (utk
                                    repository etc)</label>
                                <input type="file" name="filepp" id="filepp" accept=".pdf" class="form-control-file form-control">
                            </div>
                            <div class="col-md-12">
                                <label>Upload Your CV<span style="color: red;">
                                        *</span></label>
                                <label style="font-size: .85714286em; font-weight: 300;">Format nama file:
                                    Name_JobPosition
                                    Accepted file formats: pdf, doc, docx (500 KB Max)</label>
                                <input type="file" accept=".pdf" name="cv" id="cv" class="form-control-file validate-required form-control">
                            </div>
                            <div class="col-md-12">
                                <p>Kamu akan diinterview oleh Admissions Consultant untuk tahap selanjutnya. Pilih
                                    kesediaan jadwal kamu untuk melakukan interview di kantor Suit Career. *</p>
                            </div>
                            <!-- <div class="col-md-4">
                                <label style="font-size: .85714286em; font-weight: 300;">Punya Kode Referral?</label>
                                <input type="text" name="referral">
                            </div>
                            <div class="col-md-12">
                            <h5 style="color: black;">Ingin memiliki Kode referral? <a style="color: blue;" onclick="javascript:ShowHide('HiddenDiv')">klik disini.</a></h5>
                            
                            </div>
                            <div class="row col-md-12" id="HiddenDiv" style="display: none;">
                                <div class="col-md-6">
                                    <label style="font-size: .85714286em; font-weight: 300;">Nama Lengkap<span
                                            style="color: red;">
                                            *</span></label>
                                    <input type="text" name="name" class="validate-required" required="">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: .85714286em; font-weight: 300;">Email<span style="color: red;">
                                            *</span></label>
                                    <input type="email" name="email" class="validate-required" required="">
                                </div>
                                <div class="col-md-4">
                                    <label style="font-size: .85714286em; font-weight: 300;">Nomor Telepon (Whatsapp/Telegram)<span
                                            style="color: red;">
                                            *</span></label>
                                    <input type="number" name="phone" placeholder="+62" class="validate-required" required="">
                                </div>
                                <div class="col-md-4">
                                    <label style="font-size: .85714286em; font-weight: 300;">Nama Bank<span
                                            style="color: red;"> *</span></label>
                                    <input type="text" name="bankname" required="">
                                </div> 
                                <div class="col-md-4">
                                    <label style="font-size: .85714286em; font-weight: 300;">Nomer Rekening Bank<span
                                            style="color: red;"> *</span></label>
                                    <input type="text" name="bankaccountnumber" required="">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: .85714286em; font-weight: 300;">Nama Penerima<span
                                            style="color: red;"> *</span></label>
                                    <input type="text" name="namapenerima" required="">
                                </div>
                                <div class="col-md-6">
                                    <label style="font-size: .85714286em; font-weight: 300;">Kota<span
                                            style="color: red;"> *</span></label>
                                    <input type="text" name="kota" required="">
                                </div>
                            </div>
                             -->
                            <div class="col-md-12 g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                            <!-- @if($errors->has('g-recaptcha-response'))
                            <span class="invalid-feedback" style="display:block">
                                <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                            </span>
                            @endif -->
                            <div class="col-md-12">
                            @if (session('failed'))
                                <div class="alert  alert-danger alert-dismissible" role="alert">
                                    <span class="badge badge-off">Failed</span> {{ session('failed') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                            @endif
                            </div>
                            <div class="col-md-3 boxed">
                                <!-- <button id="apply" class="btn btn--primary" type="submit"
                                    style="background: #4AB3FF; color: #fff;">
                                    APPLY
                                </button> -->
                                <input type="button" value="Apply" id="apply" class="btn btn--primary" style="background: #4AB3FF; color: #fff;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@push('scripts')
<script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>
<script>
    $(function(){
        $('#form').submit(function(event){
            var verified = grecaptcha.getResponse();
            if (verified.length === 0){
                event.preventDefault();
            }
        });
    });
</script>
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
            swal('Upload file CV','');
            cv.focus();
            kolom_kosong.push('true');
        }

        if(pp.val() == '' && filepp.val() == ''){
            swal('Upload file Portofolio','');
            pp.focus();
            kolom_kosong.push('true');
        }
        
        if(info.val() == ''){
            swal('Please fill out information field','');
            info.focus();
            kolom_kosong.push('true');
        }

        if(address.val() == ''){
            swal('Tolong isi tempat tinggal sekarang','');
            address.focus();
            kolom_kosong.push('true');
        }

        if(gender.val() == ''){
            swal('Tolong pilih jenis kelamin','');
            gender.focus();
            kolom_kosong.push('true');
        }

        if(tgl.val() == ''){
            swal('Tolong isi tanggal lahir','');
            tgl.focus();
            kolom_kosong.push('true');
        }

        if(place.val() == ''){
            swal('Tolong isi tempat lahir','');
            place.focus();
            kolom_kosong.push('true');
        }

        if(email.val() == ''){
            swal('Tolong isi kolom email','');
            email.focus();
            kolom_kosong.push('true');
        }

        var x = document.forms["form-apply"]["email"].value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            swal('Cek email kembali','');
            kolom_kosong.push('true');
            }

        if(phone.val() == ''){
            swal('Tolong isi nomor telepon','');
            phone.focus();
            kolom_kosong.push('true');
        }

        if(name.val() == ''){
            swal('Tolong isi kolom nama','');
            name.focus();
            kolom_kosong.push('true');
        }

        var sizeCV = cv.prop('files')[0].size;

        if(sizeCV > 1550000){
            swal('Maximum file size is 600KB','')
            cv.focus();
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
