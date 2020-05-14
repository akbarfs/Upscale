

<script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
<script type="text/javascript" src="{{asset('js/momment.js')}}"></script>


<style>
    body > header.boxed-page-header {
        height: 300px ;
    }

    ::-webkit-input-placeholder { /* Edge */
      color: #c5c5c5 !important;
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: #c5c5c5 !important;
    }

    ::placeholder {
      color: #c5c5c5 !important;
    }

    .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus, .ui-button:hover, .ui-button:focus 
    {
        background: #add2ec !important;
    }

    .fstElement { min-width: 455px; }

    .fstControls { width: !important; font-size: 14px; padding: 0 }

    .o { margin-top: 0px !important}

    section.boxed-page:before {
    }

    @media only screen and (max-width:990px)
    {
        
    }

    @media only screen and (max-width:767px)
    {
        
    }

    @media only screen and (max-width:480px)
    {
        .fstElement { min-width: 300px; width: 93% }
        .modal-header {padding: 5px;}
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}
        /*.registerTalent , .back { font-size: 10px; margin: 5px; }*/
    }
    .ui-datepicker-trigger {} 
    .question_box { padding: 10px 0; display: none }
    .show_box { display: block !important; }
</style>

<script>
    $(document).ready(function()
    {
        $(function() {
           $('#tgl_lahir').datepicker(
           {
                showOn: "button",
                buttonText: "set date",
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "1970:2015",
                onSelect: function() 
                {
                    $(".info_tgl_lahir").html($(this).val());
                    // doSomeValidation($(this).getDate());
                }
            });
         });

        $(".back").click(function()
        {
            $(".info").hide() ;
            $(".modal-body").animate({ scrollTop: 0 }, 500);
            $(this).hide();
            $(".registerTalent").hide();

            $("#register_main").show();
            $("#question_register").hide(); 
            $(".next").show();
        });

        function next()
        {
            $(".modal-body").animate({ scrollTop: 0 }, 500);
            $(".next").hide();
            $("#register_main").hide();
            $("#question_register").show(); 
            $(".back").show();
            $(".next_question").show() ; 
            // $(".registerTalent").show();
            $(".question_box").first().addClass("show_box");
        }

        //tombol next
        $(".next_question").click(function()
        {
            next = $(".show_box").closest('.question_box').next();

            if ( next.length == 0)
            {
                $(".registerTalent").show() ; 
                $(".next_question").hide() ; 
                $(".question_box").addClass("show_box");
                $(".modal-body").animate({ scrollTop: 0 }, 500);
                $(".info").removeClass("alert-success").addClass("alert-warning").html("silahkan cek semua jawaban anda sebelum registrasi").show();
            }
            else
            {
                $(next).addClass("show_box");
                $(".show_box:first").removeClass("show_box");

            }
            
            
        });

        $(".back").click(function()
        {
            $(this).parent().hide();
            $(this).parent().prev().show();
        });

        // $(".next_question:last").hide() ;

        $(".next").click(function()
        {
            $(".modal-body").animate({ scrollTop: 0 }, 500);
            $(".info").html("loading...").show();

            url = "{{url('register/talent/step1')}}";

            data = 
            {
                username : $('#talent-update-profile').find('[name=username]').val(),
                email : $('#talent-update-profile').find('[name=email]').val(),
                name : $('#talent-update-profile').find('[name=name]').val(),
                password : $('#talent-update-profile').find('[name=password]').val(),
                password_confirmation : $('#talent-update-profile').find('[name=password_confirmation]').val(),
                phone_number : $('#talent-update-profile').find('[name=phone_number]').val(),
                gender : $('#talent-update-profile').find('[name=gender]').val(),
                tgl_lahir : $('#talent-update-profile').find('[name=tgl_lahir]').val(),
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data)
                {
                    next() ;
                    $(".info").hide() ; 
                    // $(".info").removeClass("alert-warning").addClass("alert-success").html("Silahkan jawab beberapa pertanyaan ini untuk menyelesaikan pendaftaran"); 
                },
                error: function(data){
                    
                    var data = $.parseJSON(data.responseText);
                    $(".info").removeClass("alert-success").addClass("alert-warning").html("");

                    $.each(data.errors, function(index, value) {
                       $.each(value, function(i, e) {
                            $(".info").append(e+"<br>");
                       });
                    });

                }
            });
        }); 

        $(".registerTalent").click(function()
        {
            $(".modal-body").animate({ scrollTop: 0 }, 500);
            $(".info").html("loading...").show();

            url = "{{url('register/talent')}}";
            $.ajax({
                url: url,
                type: 'POST',
                data: $('#talent-update-profile').serialize(),
                success: function(data)
                {
                    $(".info").removeClass("alert-warning").addClass("alert-success").html("berhasil melakukan pendaftaran");
                    $('#login-form').trigger("reset");
                    $(".modal-footer").hide(); 
                    $(".question_box").removeClass('show_box'); 
                    // location.reload();
                },
                error: function(data){
                    
                    var data = $.parseJSON(data.responseText);
                    $(".info").removeClass("alert-success").addClass("alert-warning").html("");

                    $.each(data.errors, function(index, value) {
                       $.each(value, function(i, e) {
                            $(".info").append(e+"<br>");
                       });
                    });

                }
            });


            return false ;
        });    
    });
</script>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalRegister" style="font-size: 16px">Talent Register</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">

        
        
        <form action="/talent/update-profile" method="post" 
        id="talent-update-profile" autocomplete="off">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div id="register_main">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Name">Username</label></div>
                        <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="username"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Email">Email address</label></div>
                        <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="Your Email"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Password">Password</label></div>
                        <div class="col-md-8"><input type="password" name="password" class="form-control" placeholder="Your Password"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Password2">Confirm Password</label></div>
                        <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Retype Your Password"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Name">Nama</label></div>
                        <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Name">Tgl lahir</label></div>
                        <div class="col-md-8">
                            <span class="info_tgl_lahir"></span>
                            <input type="hidden" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="DD/MM/YYYY" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Number">Phone Number</label></div>
                        <div class="col-md-8"><input type="number" name="phone_number" class="form-control" id="Number" placeholder=" 0888 xxx"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4"><label for="Name">Gender</label></div>
                        <div class="col-md-8">
                            <select class="custom-select" name="gender">
                                <option value="male">Laki-laki</option>
                                <option value="femalae">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                

                
            </div>
            
            
            <div id="question_register" style="display: none">

                <!-- <hr style="margin: 20px 0"> -->

                <script src="{{url('template/upscale/js/tag.js')}}"></script>
                <link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">

                <script>
                    
                    $(document).ready(function()
                    {
                        $('.tagsInput').fastselect({

                            valueDelimiter: ',',
                            onItemSelect: function($item, itemModel) {
                                $(".fstChoiceRemove").html("x");
                                // $(".fstQueryInput").focus(); 
                            },

                        });
                        
                    });
                    
                </script>


                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold">
                        Apakah anda memiliki Skill Web Development ?
                    </div>

                    <div style="margin-top: 10px;" id="web_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#web').show();$('#web_option').hide();setTimeout(function(){ $('#web .fstQueryInput').focus(); }, 100);">Ya</a>
                        <a href="#" class="btn btn-sm o"
                        onClick="$('#web_option').html('tidak')">Tidak</a>
                    </div> 


                    <div class="form-group" id="web" style="margin-top: 10px ; display: none">
                        <div class="row">

                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput web_input"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill?cat_id=1')}}"
                            data-load-once="true"
                            name="skill_1"/>

                            <!-- <div class="col-md-12"> <input type="text" name="name" class="form-control tag" autocomplete="off"> </div> -->
                            <!-- <div class="col-md-6">
                                <select name="level" class="input-select">
                                    <option value="junior">junior</option>
                                    <option value="middle">middle</option>
                                    <option value="senior">senior</option>
                                </select>
                            </div> -->
                            <div class="fstLoading"></div>
                            <div style="padding: 15px">
                                Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda memiliki Skill Mobile Development ?
                    </div>

                    <div style="margin-top: 10px;" id="mobile_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#mobile').show();$('#mobile_option').hide();setTimeout(function(){ $('#mobile .fstQueryInput').focus(); }, 100);">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#mobile_option').html('tidak')">Tidak</a>
                    </div> 


                    <div class="form-group" id="mobile" style="margin-top: 10px ; display: none">
                        <div class="row">
                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill?cat_id=2')}}"
                            data-load-once="true"
                            name="skill_2"/>
                            <div class="fstLoading"></div>
                            <div style="padding: 15px">
                                Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda memiliki Skill Desktop Development ?
                    </div>

                    <div style="margin-top: 10px;" id="desktop_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#desktop').show();$('#desktop_option').hide();setTimeout(function(){ $('#desktop .fstQueryInput').focus(); }, 100);">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#desktop_option').html('tidak')">Tidak</a>
                    </div> 


                    <div class="form-group" id="desktop" style="margin-top: 10px ; display: none">
                        <div class="row">
                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill?cat_id=4')}}"
                            data-load-once="true"
                            name="skill_4"/>
                            <div class="fstLoading"></div>
                            <div style="padding: 15px">
                                Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda memiliki pengalaman di posisi managerial ?
                    </div>

                    <div style="margin-top: 10px;" id="management_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#management').show();$('#management_option').hide();setTimeout(function(){ $('#management .fstQueryInput').focus(); }, 100);">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#management_option').html('tidak')">Tidak</a>
                    </div> 


                    <div class="form-group" id="management" style="margin-top: 10px ; display: none">
                        <div class="row">
                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill?cat_id=5')}}"
                            data-load-once="true"
                            name="skill_5"/>
                            <div class="fstLoading"></div>
                            <div style="padding: 15px">
                                Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda memiliki keahlian lainya ?
                    </div>

                    <div style="margin-top: 10px;" id="other_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#other').show();$('#other_option').hide();setTimeout(function(){ $('#other .fstQueryInput').focus(); }, 100);">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#other_option').html('tidak')">Tidak</a>
                    </div> 


                    <div class="form-group" id="other" style="margin-top: 10px ; display: none">
                        <div class="row">
                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill?cat_id=3')}}"
                            data-load-once="true"
                            name="skill_3"/>
                            <div class="fstLoading"></div>
                            <div style="padding: 15px">
                                Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apabila kami menawarkan lowongan fulltime, berapa ekspektasi salary anda ? 
                    </div>
                    
                    <div class="form-group" id="fulltime" style="margin-top: 20px">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="fulltime_rate" class="form-control rp" placeholder="silahkan ketik angka" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.rp').autoNumeric('init', {aSep:'.', aDec:',', mDec:'0'});
                        });
                    </script>

                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda bersedia menerima project freelance ? 
                    </div>
                    <div class="row" style="padding: 0 15px">
                        Project Kami ada 2 jenis, 
                        <ul>
                            <li>Perjam : berdasar total jam pengerjaan , menggunakan aplikasi screen tracking dan time tracking</li>
                            <li>Fix Project : berdasar fix total project & deadline. tidak menggunakan tracking</li>
                        </ul>
                    </div>
                    <div>Bersedia menerima project berbasis jam ?</div>
                    <div style="margin-top: 10px;" id="freelance_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#freelance').show();$('#freelance_option').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#freelance_option').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="freelance" style="display: none;">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_hour" class="form-control rp" placeholder="contoh : 50.000" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="margin-top: 10px">Bersedia menerima fix project  ?</div>
                    <div style="margin-top: 10px;" id="freelance_fix_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#freelance_fix').show();$('#freelance_fix_option').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#freelance_fix_option').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="freelance_fix" style="display: none;">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Minimum Range</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_min" class="form-control rp" placeholder="contoh : 500.0000" value="">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-4"><label for="Name">Maximum Range</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_max" class="form-control rp" placeholder="contoh : 50.000.000" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda menyediakan jasa konsultasi ? 
                    </div>
                    <div style="margin-top: 10px;" id="konsultasi_rate">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#konsultasi').show();$('#konsultasi_rate').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#konsultasi_rate').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="konsultasi" style="display: none; margin-top: 20px">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="konsultasi_rate" class="form-control rp" placeholder="contoh : 50.000" value="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="question_box">
                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda bersedia apabila kami menawarkan jadi pengajar di platform edukasi kami ? 
                    </div>
                    <div style="margin-top: 10px;" id="ngajar_rate">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#ngajar').show();$('#ngajar_rate').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#ngajar_rate').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="ngajar" style="display: none; margin-top: 20px">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="ngajar_rate" class="form-control rp" placeholder="contoh : 50.000" value="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </form>
      </div>
    <div class="modal-footer" style="padding: 0">

        <style type="text/css">
            .back, .next , .registerTalent  , .next_question {
                color: #fff !important; margin: 5px !important; ; width: unset !important; 
            }
            .back { background: gray }
        </style>
        <!-- <a class="btn btn-primary back" style="float: left; display: none">Back</a> -->
        <a type="submit" class="btn btn-primary next">REGISTER</a>
        <a type="submit" class="btn btn-primary next_question" style="display: none">next</a>
        <a type="submit" class="btn btn-primary registerTalent" style="display: none; display: #000">Submit Registration?</a>

    </div>