@extends('layouts.template',['logo'=>'transparent','title'=>'Scaling Up Karir, Skill & Networkmu bersama komunitas eksklusif network upscale'])

@section("menu_class",'menu-transparent light')

@section('content')

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
        .modal-footer { padding: 0; }
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}
    }
</style>

<header class="header-image ken-burn-center align-center light boxed-page-header" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{url('template/upscale/media/wide-3.jpg')}}" data-offset="0">
        <div class="container">
            <h1>Hi {{$user->name}}, Terimakasih sudah bergabung</h1>
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
                            Visi kami adalah membangun ecosystem yang dapat mendukung semua pelaku industri, baik talent, perusahaan, universitas, komunitas dan semua pihak lain yang dapat mendukung visi kami. 
                            Ayo ikut serta meningkatkan kualitas industri indonesia
                        </p>

                        <div align="center" style="padding: 50px">
                            Halaman ini sedang dalam pengembanan
                        </div>
                        
                        <!-- <script>
                            $(document).ready(function()
                            {
                                $("#set-profile").click();
                            });
                        </script>
                        <div align="center" style="padding: 20px">
                            <a id="set-profile" class="btn btn-border" data-target="#ModalProfile" data-toggle="modal" >Lengkapi Profile</a>
                        </div> -->
                        

                    </div>
                   
                </div>
            </div>
        </section>
    </main>

@endsection