@extends('layouts.template',['logo'=>'transparent','title'=>'Scaling Up Karir, Skill & Networkmu bersama komunitas eksklusif network upscale'])

@section("menu_class",'menu-transparent light')

@section('content')

<style>
    body > header.boxed-page-header {
        height: 300px ;
    }
    .fstElement { min-width: 400px; }
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
        .fstElement { min-width: 300px; }
    }
</style>

<header class="header-image ken-burn-center align-center light boxed-page-header" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{url('template/upscale/media/wide-3.jpg')}}" data-offset="0">
        <div class="container">
            <h1>Hi {{$talent->talent_name}}, Set your profile</h1>
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
                <h5 class="modal-title" id="exampleModalRegister">Hi, {{$talent->talent_name}}</h5>
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

                    <hr style="margin: 20px 0">

                    <h4>Add Skill</h4>
                    
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
                    </style>

                    <div class="form-group" style="margin-top: 10px">
                        <div class="row">

                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('talent/json/skill')}}"
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
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    
              </div>
              <div class="modal-footer">
                
                  <div class="">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>

                </form>
            </div>
          </div>
          </div>
        </div>

@endsection