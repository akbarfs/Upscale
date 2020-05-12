@extends('layouts.template',['logo'=>'transparent','title'=>'Scaling Up Karir, Skill & Networkmu bersama komunitas eksklusif network upscale'])

@section("menu_class",'menu-transparent light')

@section("top-asset")
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link rel="stylesheet" href="/resources/demos/style.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection

@section('bottom-asset')
    <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/momment.js')}}"></script>
    <script type="text/javascript">
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
    </script>
@endsection

@section('content')

<style>
    body > header.boxed-page-header {
        height: 300px ;
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
        .modal-footer { padding: 0; }
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}
    }
</style>

<header class="header-image ken-burn-center align-center light boxed-page-header" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{url('template/upscale/media/wide-3.jpg')}}" data-offset="0">
        <div class="container">
            <h1>Hi {{$user->name}}, Set your profile</h1>
            <!-- <h2>October 15, 2019</h2> 
            <ol class="breadcrumb" style="background: unset;">
                <li><a href="index-2.html">Home</a></li>
                <li><a href="#">Talent</a></li>
                <li><a href="#">Profile</a></li>
            </ol>-->
        </div>
    </header>
    <main>
        <section class="section-base boxed-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-color">


                        
                        <p class="quote">
                            Visi kami adalah membangun ecosystem yang dapat mendukung semua pelaku industri, baik talent, perusahaan, universitas, komunitas dan semua pihak lain yang dapat mendukung visi kami. Ayo bergabung untuk meningkatkan kualitas industri indonesia
                        </p>
                        
                        <script>
                            $(document).ready(function()
                            {
                                $("#set-profile").click();
                            });
                        </script>
                        <div align="center" style="padding: 20px">
                            <a id="set-profile" class="btn btn-border" data-target="#ModalProfile" data-toggle="modal" >Lengkapi Profile</a>
                        </div>
                        

                    </div>
                   
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="ModalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLogin" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalRegister">Hi, {{$user->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <script>
                    $(document).ready(function()
                    {
                        
                    });
                </script>
                
                <form action="/register/member" method="post" id="register-talent" autocomplete="off">
                    
                    @csrf
                    
                    <div class="info alert alert-warning" style="display: none"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Username</label></div>
                            <div class="col-md-8"><input type="text" name="username" class="form-control" id="Name" placeholder="Your Name" value="{{$user->username}}" readonly="readonly"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Email</label></div>
                            <div class="col-md-8"><input type="text" name="Email" class="form-control" id="Name" placeholder="Your Name" value="{{$user->email}}" readonly="readonly"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Nama</label></div>
                            <div class="col-md-8"><input type="text" name="name" class="form-control" id="Name" placeholder="Your Name" value="{{$user->name}}"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Gender</label></div>
                            <div class="col-md-8">
                                <select class="custom-select">
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
                            data-url="{{url('talent/json/skill?cat_id=1')}}"
                            data-load-once="true"
                            name="language"/>

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
                            data-url="{{url('talent/json/skill?cat_id=2')}}"
                            data-load-once="true"
                            name="language"/>
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
                            data-url="{{url('talent/json/skill?cat_id=other')}}"
                            data-load-once="true"
                            name="language"/>
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
                    <div>Apakah anda bersedia menerima project berbasis jam ?</div>
                    <div style="margin-top: 10px;" id="freelance_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#freelance').show();$('#freelance_option').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#freelance_option').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="freelance" style="display: none;">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Rate / Jam ?</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_rate" class="form-control rp" placeholder="Your expected salary" value="50000">
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 10px">Apakah anda bersedia menerima fix project  ?</div>
                    <div style="margin-top: 10px;" id="freelance_fix_option">
                        <a href="#" class="btn btn-sm" 
                        onClick="$('#freelance_fix').show();$('#freelance_fix_option').hide()">Ya</a>
                        <a href="#" class="btn btn-sm o" onclick="$('#freelance_fix_option').html('tidak')">Tidak</a>
                    </div> 
                    <div class="form-group" id="freelance_fix" style="display: none;">
                        <div class="row">
                            <div class="col-md-4"><label for="Name">Minimum Range</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_rate" class="form-control rp" placeholder="Your expected salary" value="500000">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-md-4"><label for="Name">Maximum Range</label></div>
                            <div class="col-md-8">
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="freelance_rate" class="form-control rp" placeholder="Your expected salary" value="50000000">
                            </div>
                        </div>
                    </div>

                    <hr style="margin: 20px 0">

                    <div style="font-size: 18px ; font-weight: bold ;">
                        Apakah anda menyediakan jasa konsultasi dengan bayaran / jam ? 
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
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="konsultasi_rate" class="form-control rp" placeholder="Your expected salary" value="50000">
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
                                <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="ngajar_rate" class="form-control rp" placeholder="Your expected salary" value="50000">
                            </div>
                        </div>
                    </div>


                    
              </div>
              <div class="modal-footer">
                
                  <div class="">
                    <button type="submit" class="btn btn-primary update">UPDATE</button>
                  </div>

                </form>
            </div>
          </div>
          </div>
        </div>

@endsection