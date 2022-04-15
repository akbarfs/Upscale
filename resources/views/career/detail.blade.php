@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')


<main>

    <section class="section-video light">
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-3.jpg')}}">
            <source src="{{url('template/upscale/media/repeat-medium.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-6" style="font-size: 25px">
                    <h1 class="slide slide-title1">
                         {{lang('Apply as our talent.','Daftar sebagai talent.')}}
                    </h1>
                    
                    <!-- <h2 class="slide-title2">
                        {!!lang(
                            
                            'Just focus on scaling your business and let us do the "Talent" things.',

                            'Kami membantu meng-handle semua urusan "talent", agar anda dapat fokus pada pengembangan bisnis.'

                        )!!}
                    </h2> -->

                    <p class="slide-title3" style="margin-bottom: 20px">
                    {!!lang(
                        'Hire software developers, designers, product manager, finance or administrative team from our exclusive networks. Our talents are available for both on-site or work remotely from our office.<br /><br />Choose from the Full-time or Freelance contract based on your business need.',
                        'Hire software developers, designers, product manager, finance, atau administratif team dari eksklusif network kami. Talent kami bisa bekerja secara remote maupun on-site.<br /><br />Kontrak full-time maupun freelance yang disesuaikan dengan kebutuhan bisnis Anda.'
                    )!!}
                    </p>
                        
                </div>
                <div class="col-lg-6 align-center align-center-md" data-anima="fade-in" data-time="1000">

                        <a href="#" class="btn btn-circle btn-sm join_community" data-target="#registerTalent" data-toggle="modal" style="border-color: #fff !important; color: #fff !important;">
                            {!!lang('Join as Talent','Daftar Sebagai Talent')!!}
                        </a>

                </div>
            </div>
            <hr class="space-lg hidden-sm" />
        </div>
    </section>

    <section id="features" class="section-base section-color section-top-overflow" style="background: #37517E">
        <div class="container" style="padding-top: 0">
            <div class="grid-list" data-columns="4" data-columns-md="2" data-columns-xs="1">

                
                <div class="grid-box">

                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Dedicated Team</h2>
                                <p>
                                    {{lang('Hire an outsource talented team to help scale up your business.','Hire talent sebagai karyawan outsource.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Freelance Team</h2>
                                <p>
                                    {{lang('Part-time team that work based on the man-hour rate.','Hire talent freelance berbasis man-hour.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Head Hunter</h2>
                                <p>
                                    {{lang('Make your recruitment process faster and hassle-free.','Hire talent sebagai karyawan internal anda.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Project-Based</h2>
                                <p>
                                    {{lang('A legacy project-based team to finish up your project.','Hire vendor / freelance berbasis project.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="space-lg" />
            
        </div>
    </section>

    <section class="section-base section-color section-top-overflow" style="background: #37517E">
        <div class="container" style="padding-top: 0">
            <ul class="slider" data-options="type:carousel,arrows:false,nav:false,perView:5,perViewMd:3,perViewXs:2,gap:80">
                <li  class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-1.png')}}" alt=""  />
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-2.png')}}" alt="" />
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-3.png')}}" alt="" />
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-4.png')}}" alt="" />
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-5.png')}}" alt="" />
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-6.png')}}" alt="" />
                </li>
            </ul>
        </div>
    </section>

    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>{{ $job->jobs_title }}</h3>

                    @php
                    $joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
                                                                ->join('joblo','joblo_jobs_id','jobs_id')
                                                                ->join('location','location_id','joblo.joblo_location_id')
                                                                ->select('location_name')
                                                                ->first();

                    @endphp
                                
                    {{ @$joblo->location_name }},
                            
                    {{ $job->jobs_type_time }},

                    <b>Posted {{$date}}</b><br>

                    {{ $job->jobs_desc_short }}

                    <hr class="space-sm">
                    
                    {!!$job->jobs_desc_center!!}
                    {!!$job->jobs_desc_left!!}
                    


                </div>
                <div class="col-lg-4">
                    <hr class="space visible-md" />
                    <div class="fixed-area" data-offset="80">
                        
                        {!!$job->jobs_desc_right!!}

                        @if($job->jobs_active == 'Y')
                        <div class="btn-spaced-group">
                            
                            @if ( Session::has("login"))
                            <a href="{{ url('jobs/apply/'.$job->jobs_id) }}" class="see-more-link" data-function="business">
                                <button type="button" class="btn btn-lg btn-primary">
                                    Apply Job
                                </button>
                            </a>
                            @else

                            <a class="see-more-link" data-target="#mustLogin" data-toggle="modal" data-dismiss="modal">
                                <button type="button" class="btn btn-lg btn-primary">
                                    Apply Job
                                </button>
                            </a>

                            @endif

                        </div>
                        @else
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>    



    <div class="modal fade" id="mustLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you have an account ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    
                    <style type="text/css">
                        .btn:hover { color: #fff }
                    </style>

                    <a href="#" class="btn join_community" data-target="#registerTalent" 
                    data-toggle="modal" data-dismiss="modal" data-redirect='{{url("jobs/apply/".$id)}}' data-action-apply="{{ $id }}">
                        Register & Apply Job
                    </a> 
                    
                    &nbsp

                    or 

                    &nbsp

                    <a class="btn login-apply" data-target="#ModalLogin" data-toggle="modal" 
                    style="color: #fff;margin: 0" data-dismiss="modal" 
                    data-redirect='{{url("jobs/apply/".$id)}}'>
                        Login & Apply Job
                    </a>
                    
                </div>

            </div>
        </div>
    </div>


</main>




<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection