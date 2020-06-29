

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

    

    .fstElement { min-width: 455px; }

    .fstControls { width: !important; font-size: 14px; padding: 0 }

    .o { margin-top: 0px !important}

    .inr { height: 100% ; overflow: auto; }
    .right-in
    {
            background: #37517e;
            padding-left: 0;
            background-image: url({{url('template/upscale/media/inquiry.jpg')}});
            background-position: top;
            background-size: cover;
    }

    section.boxed-page:before {
    }

    .wrap-inquiry
    {
        margin: 0 auto ; max-width: 500px ;margin-top: 10px;
        padding: 20px;
    }

    .fstElement { margin-left: 15px !important; }

    @media only screen and (max-width:990px)
    {
        
    }

    @media only screen and (max-width:767px)
    {
        [class*=col-]:not([class*=col-sm]) + [class*=col-]:not([class*=col-sm]) {
            margin-top: 10px !important;
        }
    }

    @media only screen and (max-width:480px)
    {
        .fstElement { min-width: 300px; width: 93% }
        .modal-header {padding: 5px;}
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}

        .leftclose { display: unset !important; }
    }
    .ui-datepicker-trigger {    background: #47b2e4; color: #fff; border: none; border-radius: 10px; padding: 0px 10px;}

    .question_box { padding: 10px 0; display: none }
    .show_box { display: block !important; }
    .info_tgl_lahir , .info_tgl_ready { float: left; margin-right: 10px; }
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
                beforeShow: function () {
                  setTimeout(function () {
                      $('.ui-datepicker').css('top', 100);
                  }, 0);
                },
                onSelect: function() 
                {
                    $(".info_tgl_lahir").html($(this).val());
                    // doSomeValidation($(this).getDate());
                }
            });
         });

        $(function() {
           $('.tgl_ready').datepicker(
           {
                showOn: "button",
                buttonText: "set date",
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
                yearRange: "2020:2030",
                beforeShow: function () {
                  setTimeout(function () {
                      $('.ui-datepicker').css('top', 100);
                  }, 0);
                },
                onSelect: function() 
                {
                    $(".info_tgl_ready").html($(this).val());
                    // doSomeValidation($(this).getDate());
                }
            });
         });

        $(".back").click(function()
        {
            
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
                $(".info_reg_talent").removeClass("alert-success").addClass("alert-warning").html("silahkan cek semua jawaban anda sebelum registrasi").show();
            }
            else
            {
                $(next).addClass("show_box");
                $(".show_box:first").removeClass("show_box");
            }
            
        });

        // $(".back").click(function()
        // {
        //     $(this).parent().hide();
        //     $(this).parent().prev().show();
        // });

        // $(".next_question:last").hide() ;

        $(".next").click(function()
        {
            $(".inr").animate({ scrollTop: 0 }, 500);
            $(".info_reg_talent").html("loading...").show();

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
                tempat_lahir : $('#talent-update-profile').find('[name=tempat_lahir]').val(),
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(data)
                {
                    next() ;
                    $(".info_reg_talent").hide() ; 
                    // $(".info_reg_talent").removeClass("alert-warning").addClass("alert-success").html("Silahkan jawab beberapa pertanyaan ini untuk menyelesaikan pendaftaran"); 
                },
                error: function(data){
                    
                    var data = $.parseJSON(data.responseText);
                    $(".info_reg_talent").removeClass("alert-success").addClass("alert-warning").html("");

                    $.each(data.errors, function(index, value) {
                       $.each(value, function(i, e) {
                            $(".info_reg_talent").append(e+"<br>");
                       });
                    });

                }
            });
        });

        $(".registerTalent").click(function()
        {
            $(".inr").animate({ scrollTop: 0 }, 500);
            $(".info_reg_talent").html("loading...").show();

            url = "{{url('register/talent')}}";
            $.ajax({
                url: url,
                type: 'POST',
                data: $('#talent-update-profile').serialize(),
                success: function(data)
                {
                    $(".info_reg_talent").removeClass("alert-warning").addClass("alert-success").html("berhasil mendaftar, silahkan apply lowongan yang tersedia di menu jobs");
                    $('#login-form').trigger("reset");
                    $(".modal-footer").hide(); 
                    $(".question_box").removeClass('show_box'); 
                    $(".registerTalent").hide(); 

                    if ( typeof redirect != 'undefined' )
                    {
                        window.location.href = redirect ; 
                    }
                    else
                    {
                        // location.reload();
                        setTimeout(function () {
                              window.location.href = "{{url('jobs')}}";
                        }, 3000);

                        
                    }
                },
                error: function(data){
                    
                    var data = $.parseJSON(data.responseText);
                    $(".info_reg_talent").removeClass("alert-success").addClass("alert-warning").html("");

                    $.each(data.errors, function(index, value) {
                       $.each(value, function(i, e) {
                            $(".info_reg_talent").append(e+"<br>");
                       });
                    });

                }
            });


            return false ;
        });    
    });
</script>

        
<div class="row inr">
    <div class="col-md-8">



        <div class="wrap-inquiry">

            <button type="button" class="close leftclose" style="color:#000" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>

            <h2>Register as Talent</h2><hr style="margin: 20px 0">
            <form action="/talent/update-profile" method="post" 
            id="talent-update-profile" autocomplete="off">
                
                @csrf
                
                <div class="info_reg_talent alert alert-warning" style="display: none"></div>

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
                            <div class="col-md-4"><label for="Name">Tempat Lahir</label></div>
                            <div class="col-md-8"><input type="text" name="tempat_lahir" class="form-control" placeholder="Your Name"></div>
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
                                    <option value="female">Perempuan</option>
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

                    <!-- career -->
                    <div class="question_box">

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#pengalaman_option").change(function()
                                {
                                    if ( $(this).val() == 'sudah' ) 
                                    {
                                        $('#pengalaman').show();
                                        $(".isa").hide() ;
                                    }
                                    else
                                    {
                                        $('#pengalaman').hide();
                                        $(".isa").show() ;
                                    }
                                });
                            });
                        </script>

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="ready">Memiliki pengalaman kerja?</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="custom-select" id="pengalaman_option">
                                        <option value="">-- pilih --</option>
                                        <option value="sudah">Sudah</option>
                                        <option value="belum">Belum/Sangat sedikit</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group isa" style="margin-top: 20px; display: none;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="ready">Apakah anda bersedia untuk kami berikan edukasi intensif sebelum disalurkan ke lapangan pekerjaan ?
                                        </label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="custom-select" name="talent_isa">
                                            <option value="unset">-- pilih --</option>
                                            <option value="yes">ya</option>
                                            <option value="no">tidak</option>
                                        </select>   
                                    </div>
                                </div>
                            </div>

                        <div id="pengalaman" style="display: none;">
                            <div style="font-size: 18px ;">
                                Kapan anda mendapatkan pekerjaan pertama ?
                            </div>
                            
                            
                            <select name="karir_bulan" style="margin-top: 10px ; width: 100px; float: left;margin-right: 10px" class="custom-select">
                                <option value="">-- bulan --</option>
                                <option value="1">januari</option>
                                <option value="2">februari</option>
                                <option value="3">maret</option>
                                <option value="4">april</option>
                                <option value="5">mei</option>
                                <option value="6">juni</option>
                                <option value="7">juni</option>
                                <option value="8">agustus</option>
                                <option value="9">september</option>
                                <option value="10">oktober</option>
                                <option value="11">november</option>
                                <option value="12">desember</option>
                            </select>   

                            <select name="karir_tahun" style="margin-top: 10px ; width: 100px; float: left;" class="custom-select">
                                <option value="">-- tahun--</option>
                                <?php for($i=2005; $i<= 2020; $i++) { ?>
                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                <?php } ?>
                            </select>
                            <div style="clear: both;"></div>

                            <div class="form-group" style="margin-top: 20px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="ready">Level kemampuan anda sekarang?</label>
                                    </div>
                                    <div class="col-md-12">
                                        <select class="custom-select" name="talent_level">
                                            <option value="undefined">-- posisi --</option>
                                            <option value="junior">Junior</option>
                                            <option value="middle">Middle</option>
                                            <option value="senior">Senior</option>
                                        </select>   
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="ready">Ingin mengembangkan karir dibidang?</label>
                                </div>
                                <div class="col-md-12">
                                    <select class="custom-select" name="talent_focus">
                                        <option value="">-- posisi --</option>
                                        <option value="Frontend">Frontend Web</option>
                                        <option value="Backend web">Backend Web</option>
                                        <option value="Fullstack web">Fullstack Web</option>
                                        <option value="Mobile programmer">Mobile programmer</option>
                                        <option value="UI UX">UI UX</option>
                                        <option value="QA">QA</option>
                                        <option value="Dev Ops">Dev Ops</option>
                                        <option value="Data science">Data Science</option>
                                        <option value="PM">Project/Product Manager</option>
                                        <option value="Other">Other</option>
                                    </select>   
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- web -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold">
                            Apakah anda memiliki Skill Web Development ?
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#web_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#web').show();
                                        setTimeout(function(){ $('#web .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#web').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="web_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


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
                    
                    <!-- mobile -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda memiliki Skill Mobile Development ?
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#mobile_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#mobile').show();
                                        setTimeout(function(){ $('#mobile .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#mobile').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="mobile_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


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

                    <!-- desktop -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda memiliki Skill Desktop Development ?
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#desktop_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#desktop').show();
                                        setTimeout(function(){ $('#desktop .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#desktop').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="desktop_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


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

                    <!-- managerial -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda memiliki pengalaman di posisi managerial ?
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#management_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#management').show();
                                        setTimeout(function(){ $('#management .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#management').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="management_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


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

                    <!-- keahlian lain -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda memiliki keahlian lainya ?
                        </div>

                        <div style="font-size: 18px">
                            Apakah anda memiliki kemampuan seperti design, ui ux, server, QA, data science, dev ops dll anda bisa input keahlian tersebut form bawah ini
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#other_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#other').show();
                                        setTimeout(function(){ $('#other .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#other').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="other_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


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

                    <!-- ekspektasi salary -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apabila kami menawarkan lowongan fulltime, berapa ekspektasi salary anda ? 
                        </div>
                        
                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Salary / month</label></div>
                                <div class="col-md-6">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="fulltime_rate" class="form-control rp" placeholder="silahkan ketik angka" value="">
                                </div>
                            </div>
                        </div>

                        <hr style="margin: 20px 0">

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Status Kerja saat ini</label></div>
                                <div class="col-md-6">

                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $("#av").change(function()
                                            {
                                                var av = $(this).val();
                                                if ( av == 'no') 
                                                {
                                                    $(".ready").html('Selesai kontrak tanggal ?');
                                                    $(".kantor_sekarang").show() ;
                                                }
                                                else if ( av == 'yes')
                                                {
                                                    $(".ready").html('Ready Kerja tanggal berapa ?');
                                                    $(".kantor_sekarang").hide() ;
                                                }
                                                else if ( av == '1_month')
                                                {
                                                    $(".ready").html('Mencari kerja untuk tanggal ?');
                                                    $(".kantor_sekarang").show() ;
                                                }
                                                else
                                                {
                                                    $(".kantor_sekarang").hide() ;
                                                }
                                            });
                                        }); 
                                    </script>
                                    
                                    <select class="custom-select" name="talent_available" id="av">
                                        <option value="">--pilih--</option>
                                        <option value="yes">Tidak terikat kontrak</option>
                                        <option value="no">Terikat sampai akhir kontrak</option>
                                        <option value="1_month">Boleh keluar sewaktu-waktu</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="form-group kantor_sekarang" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Name">Perusahaan tempat kerja sekarang ?</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="talent_current_work" class="form-control" 
                                    placeholder="Ex : Tokopedia" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="ready">Ready Kerja tanggal berapa?</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="info_tgl_ready"></div>
                                    <input type="hidden" name="talent_date_ready" class="form-control tgl_ready" placeholder="DD/MM/YYYY">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Name">Kota Sekarang tinggal ?</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="talent_address" class="form-control" 
                                    placeholder="Ex : Yogyakarta" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-top: 20px">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Name">Bersedia onsite diluar kota ?</label>
                                </div>
                                <div class="col-md-6">
                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $("#luar_kota_option").change(function()
                                            {
                                                var av = $(this).val();
                                                if ( av == 'yes') 
                                                {
                                                    $(".luar_kota").show();
                                                }
                                                else
                                                {
                                                    $(".luar_kota").hide();
                                                }
                                            });
                                        }); 
                                    </script>
                                    
                                    <select class="custom-select" id="luar_kota_option">
                                        <option value="">-- pilih --</option>
                                        <option value="yes">Bersedia</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group luar_kota" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Bersedia di jakarta / sekitar ?</label></div>
                                <div class="col-md-6">
                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $("select[name='talent_onsite_jakarta']").change(function()
                                            {
                                                var av = $(this).val();
                                                if ( av == 'yes') 
                                                {
                                                    $(".min_sal_jak").show();
                                                }
                                                else
                                                {
                                                    $(".min_sal_jak").hide();
                                                }
                                            });
                                        }); 
                                    </script>
                                    <select class="custom-select" name="talent_onsite_jakarta">
                                        <option value="">-- pilih --</option>
                                        <option value="yes">Bersedia</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group min_sal_jak" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Min-salary Jakarta</label></div>
                                <div class="col-md-6">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary_jakarta" class="form-control rp" placeholder="silahkan ketik angka" value="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group luar_kota" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Bersedia di Jogja ?</label></div>
                                <div class="col-md-6">
                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $("select[name='talent_onsite_jogja']").change(function()
                                            {
                                                var av = $(this).val();
                                                if ( av == 'yes') 
                                                {
                                                    $(".min_sal_jog").show();
                                                }
                                                else
                                                {
                                                    $(".min_sal_jog").hide();
                                                }
                                            });
                                        }); 
                                    </script>
                                    <select class="custom-select" name="talent_onsite_jogja">
                                        <option value="">-- pilih --</option>
                                        <option value="yes">Bersedia</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group min_sal_jog" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Min-salary Jogja</label></div>
                                <div class="col-md-6">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary_jogja" class="form-control rp" placeholder="silahkan ketik angka" value="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group luar_kota" style="margin-top: 20px; display: none">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Prefer kerja di kota ?</label></div>
                                <div class="col-md-6">
                                    <input type="text" name="talent_prefered_city" class="form-control" placeholder="Ex : Yogyakarta, Bandung" value="">
                                </div>
                            </div>
                        </div>

                        <hr style="margin:0">
                        <div class="form-group" style="margin-top: 20px;">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Apakah bersedia bekerja secara remote ?</label></div>
                                <div class="col-md-6">
                                    <select class="custom-select" name="talent_remote">
                                        <option value="">-- pilih --</option>
                                        <option value="yes">Bersedia</option>
                                        <option value="no">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- project freelance -->
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
                                <li>Perjam : berdasar total jam pengerjaan</li>
                                <li>Fix Project : berdasar fix total project & deadline.</li>
                            </ul>
                        </div>
                        <div>Bersedia menerima project berbasis jam ?</div>
                        <!-- <div style="margin-top: 10px;" id="freelance_option">
                            <a href="#" class="btn btn-sm" 
                            onClick="$('#freelance').show();$('#freelance_option').hide()">Ya</a>
                            <a href="#" class="btn btn-sm o" onclick="$('#freelance_option').html('tidak')">Tidak</a>
                        </div>  -->

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#freelance_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#freelance').show();
                                    }
                                    else
                                    {
                                        $('#freelance').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin: 10px 0" class="custom-select" id="freelance_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>

                        <div class="form-group" id="freelance" style="display: none;">
                            <div class="row">
                                <div class="col-md-6"><label for="Name">Ok, berapa Rate/Jam anda?</label></div>
                                <div class="col-md-6">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_hour" class="form-control rp" placeholder="contoh : 50.000" value="">
                                </div>
                            </div>
                        </div>
                        
                        <hr style="margin: 20px 0">
                        
                        <div style="margin-top: 10px">Bersedia menerima fix project  ?</div>
                        
                        <!-- <div style="margin-top: 10px;" id="freelance_fix_option">
                            <a href="#" class="btn btn-sm" 
                            onClick="$('#freelance_fix').show();$('#freelance_fix_option').hide()">Ya</a>
                            <a href="#" class="btn btn-sm o" onclick="$('#freelance_fix_option').html('tidak')">Tidak</a>
                        </div>  -->

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#project_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#freelance_fix').show();
                                    }
                                    else
                                    {
                                        $('#freelance_fix').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin: 10px 0" class="custom-select" id="project_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


                        <div class="form-group" id="freelance_fix" style="display: none;">
                            <div class="row" style="padding: 0 15px">
                                Berapakah range project yang pernah anda terima selama ini?
                            </div>
                            <div class="row">
                                <div class="col-md-4"><label for="Name">Paling rendah</label></div>
                                <div class="col-md-8">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_min" class="form-control rp" placeholder="contoh : 500.0000" value="">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-4"><label for="Name">Paling tinggi</label></div>
                                <div class="col-md-8">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_max" class="form-control rp" placeholder="contoh : 50.000.000" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- jasa konsultasi -->
                    <!-- <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda menyediakan jasa konsultasi ? 
                        </div>
                        
                        <div class="row" style="padding: 0 15px">
                            Berapakah range project yang pernah anda terima selama ini?
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
                    </div> -->

                    <!-- pengajar eduwork -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Apakah anda bersedia menjadi mentor di platform / ekosistem upscale ?
                        </div>
                        <div class="row" style="padding: 0 15px">
                            Dengan mengajar di platform kami, anda bisa mendapatkan penghasilan
                            tambahan
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#ngajar_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#ngajar').show();
                                    }
                                    else
                                    {
                                        $('#ngajar').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin: 10px 0" class="custom-select" id="ngajar_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya, kemungkinan saya tertarik</option>
                            <option value="belum">Tidak ingin mengajar</option>
                            <option value="belum">Saya belum memiliki kemampuan yang cukup</option>
                        </select>


                        <div class="form-group" id="ngajar" style="display: none; margin-top: 20px">
                            <div class="row">
                                <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                                <div class="col-md-8">
                                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="ngajar_rate" class="form-control rp" placeholder="contoh : 50.000" value="">
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- international -->
                    <div class="question_box">
                        <div style="font-size: 18px ; font-weight: bold ;">
                            Penawaran Kerja Remote International
                        </div>
                        <div class="row" style="padding: 0 15px">
                            Saat ini kami sedang berusaha untuk mempromosikan talent indonesia 
                            agar mendapatkan pekerjaan secara remote dari perusahaan luar negri 
                            dengan salary minimum junior-middle Rp.10jt. Apakah anda ingin mencoba bekerja di perusahaan luar negri ?
                        </div>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#inter_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#ngajar').show();
                                    }
                                    else
                                    {
                                        $('#ngajar').hide();
                                    }
                                });
                            });
                        </script>
                        <select name="talent_international" style="margin: 10px 0" class="custom-select" id="inter_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya, kemungkinan saya tertarik</option>
                            <option value="Tidak yakin, bahasa inggris saya tidak cukup baik">Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                            <option value="Tidak, karena perbedaan budaya kerja">Tidak, karena perbedaan budaya kerja</option>
                            <option value="Tidak, karna suatu hal">Tidak, karna suatu hal</option>
                        </select>
                    </div>

                </div>

            </form>
        
        
            <style type="text/css">
                .back, .next , .registerTalent  , .next_question {
                    color: #fff !important; margin: 5px !important; ; width: unset !important; 
                }
                .back { background: gray; border: none }
            </style>

            <hr style="margin:10px 0">
            <div align="right">
                
                <!-- <a class="btn btn-primary back" style="float: left; display: none">Back</a> -->
                <a type="submit" class="btn btn-primary next_question" style="display: none">next</a>

                <a type="submit" class="btn btn-primary next">REGISTER</a>
                <a type="submit" class="btn btn-primary registerTalent" style="display: none; display: #000">Submit Registration?</a>    
            </div>
            
        </div>



    </div>
    <div class="col-md-4 hidden-xs hidden-sm right-in">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" 
        style="position: absolute; right: 20px; color: #fff">
          <span aria-hidden="true">&times;</span>
        </button>

        <div style="text-align: center; margin-top: 20px ; color: #fff ; font-weight: bold ;
        margin-bottom: 80px">
            Our Member Experience
        </div>

        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-1.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-2.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-3.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-4.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-5.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-6.png')}}" style="max-width: 200px">
        </div>

    </div>
</div>