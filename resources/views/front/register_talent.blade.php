

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
    .fstControls { padding: 0 }
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
        .registerTalent { font-size: 10px; margin: 5px; }
    }
</style>

<script>
    $(document).ready(function()
    {
        $(function() {
           $('#tgl_lahir').datepicker({
              dateFormat: 'yy-mm-dd',
              changeMonth: true,
                changeYear: true,
                yearRange: "1970:2015",
              onSelect: function() {
                doSomeValidation($(this).getDate());
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
                    $(".info").removeClass("alert-warning").addClass("alert-success").html("berhasil update profile");
                    $('#login-form').trigger("reset");
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

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Nama</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                </div>
            </div>

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
                    <div class="col-md-4"><label for="Number">Phone Number</label></div>
                    <div class="col-md-8"><input type="number" name="phone_number" class="form-control" id="Number" placeholder=" 0888 xxx"></div>
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
                    <div class="col-md-4"><label for="Name">Gender</label></div>
                    <div class="col-md-8">
                        <select class="custom-select" name="gender">
                            <option value="male">Laki-laki</option>
                            <option value="femalae">Perempuan</option>
                        </select>
                    </div>
                </div>
            </div>

            

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Tgl lahir</label></div>
                    <div class="col-md-8">
                        <input type="text" name="tgl_lahir" class="form-control" id="tgl_lahir" placeholder="DD/MM/YYYY" value="">
                    </div>
                </div>
            </div>

            <hr style="margin: 20px 0">

            
            
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

            <style>
                .fstControls { width: !important; font-size: 14px }
                .btn + .btn { margin-top: 0; } 

            </style>

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
                </div>
            </div>
            
            <hr style="margin: 20px 0">

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
                </div>
            </div>

            <hr style="margin: 20px 0">

            <div style="font-size: 18px ; font-weight: bold ;">
                Apakah anda memiliki keahlian lain ?
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
                    data-url="{{url('json/skill?cat_id=other')}}"
                    data-load-once="true"
                    name="skill_2"/>
                </div>
            </div>

            <hr style="margin: 20px 0">

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

            <hr style="margin: 20px 0">

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

            <hr style="margin: 20px 0">

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

            <hr style="margin: 20px 0">

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
            <br><br>

            </form>
      </div>
      <div class="modal-footer" style="padding: 0">
        
          
        <button type="submit" class="btn btn-primary registerTalent">REGISTER</button>
          

        
    </div>