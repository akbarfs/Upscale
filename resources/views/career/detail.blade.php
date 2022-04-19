@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'menu-transparent light')

@section('content')


@php
    $joblo  = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
                            ->join('joblo','joblo_jobs_id','jobs_id')
                            ->join('location','location_id','joblo.joblo_location_id')
                            ->select('location_name')
                            ->first();

@endphp

<style>
    
    .slide-title1 { font-size: 35px }
    .slide-title2 { font-size: 35px }
    .slide-title3 { font-size: 20px }
    .boxIn { height: 100% }

    @media only screen and (max-width:990px){
        .grid-list{ padding-top: 30px }
        #features .container { padding-bottom:0 }

    }

    @media only screen and (max-width:767px){
        .grid-list{ padding-top: 30px }
        #features .container { padding-bottom:0 }
        
    }

    @media only screen and (max-width:480px){
        .slide-title1 { font-size: 27px }
        .slide-title2 { font-size: 25px !important }
        .slide-title3 { font-size: 18px }
        .boxIn { height: unset; }
        .grid-list{ padding-top: 30px }
        #features .container { padding-bottom:0 }
        .join_community { margin-top: 10px; }
    }

    

</style>

<main>

    <section class="section-video light">
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-3.jpg')}}">
            <source src="{{url('template/upscale/media/repeat-medium.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-8" style="font-size: 25px">
                    <h2 class="slide slide-title1">
                         {{lang('Apply as our talent.','Daftar sebagai talent')}}.
                    </h2>
                    <h1>{{$job->jobs_title}} </h1>
                    
                    <!-- <h2 class="slide-title2">
                        {!!lang(
                            
                            'Just focus on scaling your business and let us do the "Talent" things.',

                            'Kami membantu meng-handle semua urusan "talent", agar anda dapat fokus pada pengembangan bisnis.'

                        )!!}
                    </h2> -->

                    <p class="slide-title3" style="margin-bottom: 20px">
                    {!!lang(
                        "We are looking for talented talent to join Upscale's exclusive ecosystem. We are a company that helps talent find the job they want, from the location of the company, what company they want to work for, to the expected salary expectations.<br /><br />Let's join the exclusive high-end ecosystem, it's FREE!.",
                        "Kami mencari talent berbakat untuk bergabung dalam ekosistem eklusif Upscale. Kami adalah perusahaan yang membantu talent mendapatkan pekerjaan yang mereka inginkan, baik dari segi lokasi perusahaan, diperusahaan apa mereka ingin bekerja, sampai ekspektasi gaji yang di inginkan.<br /><br />Tidak hanya itu, kami juga mencarikan kamu tambahan penghasilan dari project based, sampai mentoring dll. Mari bergabung dengan ekosistem ekslusif upscale, GRATIS!"
                    )!!}
                    </p>

                    <!-- Bergabung dan dapatkan beberapa manfaat:
                    <ul class="desc-list-talent" style="padding-top: 15px">
                        <li>Karir di perusahaan idaman</li>
                        <li>Project as a freelance</li>
                        <li>Pasif Income</li>
                        <li>Free Education</li>
                        <li>Konsultasi senior programer</li>
                        <li>Kerja Remote (lokal/International)</li>
                    </ul> -->
                        
                </div>
                <div class="col-lg-4 align-center align-center-md" data-anima="fade-in" data-time="1000">

                       <!--  <a href="#" class="btn btn-circle btn-sm join_community" data-target="#registerTalent" data-toggle="modal" style="border-color: #fff !important; color: #fff !important;">
                            {!!lang('Join as Talent','Daftar Sebagai Talent')!!}
                        </a> -->

                        @if ( Session::has("login"))
                            <a href="{{ url('jobs/apply/'.$job->jobs_id) }}" class="see-more-link" data-function="business">
                                <button type="button" class="btn btn-sm btn-circle" 
                                style="width: 100%">
                                    Join As Talent
                                </button>
                            </a>
                        @else
                            <a class="see-more-link" data-target="#mustLogin" data-toggle="modal" data-dismiss="modal">
                                <button type="button" class="btn btn-sm btn-circle" 
                                style="width: 100%">
                                    Join As Talent
                                </button>
                            </a>
                        @endif

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
                                <h2>Join Community</h2>
                                <p>
                                    {{lang('Get various benefits as a member.','Dapatkan berbagai benefit sebagai member.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Career Support</h2>
                                <p>
                                    {{lang('find a job according to your expectations.',' Mencarikan pekerjaan sesuai ekspektasimu.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Project Based</h2>
                                <p>
                                    {{lang('Offer projects for additional income.','Project offer untuk tambahan penghasilan.')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Free Mentoring</h2>
                                <p>
                                    {{lang('Improve skills with free mentoring.','Tingkatkan skill dengan free mentoring.')}}
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


    

    <!-- JOIN OUR COMMUNITY -->
    <section class="section-base section-color">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6">
                    <h1>Join Our Community</h1>
                    <p>
                        {{lang(
                            'Our vision is to build an ecosystem that will helps all of business, talent, company, universities, and community. Let\'s join our community to boost the international creative industry.',
                            'Visi kami adalah membangun ecosystem yang dapat mendukung semua pelaku industri, baik talent, perusahaan, universitas, 
                        komunitas dan semua pihak lain yang dapat mendukung visi kami. Ayo bergabung untuk meningkatkan kualitas industri indonesia'
                        )}}
                    </p>
                    
                    <a href="https://eduwork.id" class="btn btn-circle btn-border btn-sm join_community" data-target="#registerTalent" data-toggle="modal" style="margin-top: 20px" target="_blank">
                        Join Community
                    </a>

                </div>
                <div class="col-lg-6">
                    <hr class="space-sm visible-md" />
                    <div class="grid-list list-gallery grid-wall-1" data-lightbox-anima="fade-top" data-columns="2">
                        <div class="grid-box">
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-15.jpg?v=2')}}">
                                    <img src="{{url('template/upscale/media/music/image-15.jpg?v=2')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-5.jpg?v=2')}}">
                                    <img src="{{url('template/upscale/media/music/image-5.jpg?v=2')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-11.jpg?v=2')}}">
                                    <img src="{{url('template/upscale/media/music/image-11.jpg?v=2')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-1.jpg?v=2')}}">
                                    <img src="{{url('template/upscale/media/music/image-1.jpg?v=2')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 100px">

                <div class="col-lg-4">
                    <h2>
                        Share & Learn
                    </h2>
                    <p>
                        {{lang(
                            'By joining UpScale, talent will have access to our education platform (on progress) as a mentor or as a student.',
                            'Dengan bergabung dengan upscale, talent mendapatkan akses platform edukasi yang kami kembangkan, baik sebagai mentor maupun sebagai siswa.'
                        )}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <h2>
                        Expand Your Network
                    </h2>
                    <p>
                        {{lang(
                            'Expand your network on the multi-talent community and join our periodic dedicated event just for UpScale member.',
                            'Perluas pertemananmu diberbagai bidang kemampuan dan diberbagai regional. Ikuti event-event khusus upscale yang akan dilakukan berkala.'
                        )}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <h2>
                        Get Hired & Make Money
                    </h2>
                    <p>
                        {{lang(
                            'Start planning your career path with UpScale. Complete your profile, join our internal assessment and land on your dream job.',
                            'Mulai bangun pipeline karirmu dengan Upscale. Daftarkan diri anda, lengkapi profile, ikuti assessment & dapatkan karir / pekerjaan yang sesuai harapan anda.'
                        )}}
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- perbandingan -->
    <section id="pricing" class="section-base" style="background: #f1f5f7;">
        <div class="container" style="padding-top: 0px">

            <div class="row">
                <div class="col-lg-4">
                    <h2>{{lang('We are Difference','Kami Berbeda.')}}</h2>
                    <p>{!!lang(
                        'Our service is different from some existing services. There are several types of services that we might be able to compare such as:',
                        'Layanan kami berbeda dengan beberapa layanan yang ada. Ada beberapa jenis layanan yang mungkin bisa dibandingkan dengan kami seperti'
                        )!!}
                    </p>
                    <hr class="space-sm" />
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Upscale Platform</a>
                            <div class="content">
                                <p>
                                    {{lang('A platform that helps us build a career from looking for a dream job, freelance projects to mentoring','Platform yang membantu kami membangun karir dari mencari pekerjaan idaman, project freelance sampai mentoring')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Bootcamp & Penyaluran kerja</a>
                            <div class="content">
                                <p>
                                    {{lang('Training held by an agency / company to provide training, sometimes there are job distribution facilities.','Pelatihan yang diadakan suatu instansi / perusahaan untuk memberikan pelatihan, terkadang terdapat fasilitas penyaluran kerja.')}}
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Job Portal</a>
                            <div class="content">
                                <p>
                                    {{lang('Job vacancies websites like jobstreet.com.','Website lowongan kerja seperti jobstreet.')}}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <table class="table table-border table-price">
                        <thead>
                            <tr>
                                <th>{{lang('Services','Fasilitas')}}</th>
                                <th>Upscale</th>
                                <th>Bootcamp</th>
                                <th>Portal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Career Assistance</td>
                                <td><i class="icon-check"></i></td> <!---icon-check-gray-->
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Pelatihan / mentoring</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Jaminan kerja</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>List lowker</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Peluang Project as Freelance</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Bekerja dengan client International</td>
                                <td><i class="icon-check"></i></td>
                                <td></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Peluang Pasif Income</td>
                                <td><i class="icon-check"></i></td>
                                <td></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Bantuan dari expert saat kesulitan</td>
                                <td><i class="icon-check"></i></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- <div class="cnt-box cnt-call" style="margin-top: 100px">
                <i class="im-instagram"></i>
                <div class="caption">
                    <h2>Download the app now.</h2>
                    <p>
                        Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
                        Duisera aute irure dolor in reprehenderit e eu fugiat nulla pariatur.
                    </p>
                    <a href="#" class="btn btn-circle btn-sm">Download App</a>
                </div>
            </div> -->

        </div>
    </section>

    <!-- our parnership / map -->
    <section class="section-base">
        <div class="container" style="padding-bottom: 0">

            @if ( isset($_GET['lang']) && $_GET['lang'] == 'id' || !isset($_GET['lang']))
            <!-- <hr class="space-lg" /> -->
            <h2 class="align-center">Bergabung dengan komunitas kami</h2>
            <p class="align-center width-650">
                Kami secara aktif akan terus mengembangkan komunitas dan network kami dengan berbagai pihak.
            </p>
            <hr class="space" />
            <div class="row">
                <div class="col-lg-9">
                    <img src="{{url('template/upscale/media/map.jpg')}}" alt="" />
                </div>
                <div class="col-lg-3">
                    <ul class="icon-list icon-circle align-right align-left-md">
                        <li>Yogyakarta, Indonesia</li>
                        <li>Jakarta, Indonesia</li>
                        <li>Bandung, Indonesia</li>
                        <li>Malang, Indonesia</li>
                        <li>Bali, Indonesia</li>
                        <li>Surabaya, Indonesia</li>
                        <li>Tangerang, Indonesia</li>
                        <li>Semarang, Indonesia</li>
                        <li>Solo, Indonesia</li>
                        <li>Bogor, Indonesia</li>
                    </ul>
                </div>
            </div>
            @endif

            <hr class="space" />

        </div>
    </section>



    <!-- TAHAPAN prosedur -->
    <section id="how" class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>{!!lang(
                        'How do we work?<br /> We will work your way.'
                        ,'Bagaimana tahapanya ?<br /> Kami menyesuaikan dengan kebutuhan dan ekspektasi Anda'
                        )!!}</h2>
                    <p>
                        {{lang(
                            'A short consultation with our business specialist will help us understand your business needs and your talent qualification. We will make sure our list of talent will be the best-matched for your needs.',
                            'Konsultasi singkat dengan konsultan kami akan membantu kami untuk mengetahui kebutuhan kamu. Kami pastikan kami akan membantu kamu untuk mendapatkan apa yang kamu cari.'
                        )}}
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>{{lang('Estimated Consultation Time','Perkiraan waktu untuk konsultasi')}}</h3>
                            <div class="value text-lg">
                                <span data-to="30" data-speed="1000">0</span>
                                <span class="text-md">{{lang('Minutes','Menit')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-steps box-steps-vertical">
                        <div class="step-item">
                            <span>1</span>
                            <div class="content">
                                <h3>{{lang('Join as member','Daftar sebagai member')}}</h3>
                                <div>
                                    <p>
                                        {{lang('Register as member to our eklusif network.','Daftarkan dirimu sebagai salah satu member di komunitas eklusif kami')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>2</span>
                            <div class="content">
                                <h3>Konsultasikan dengan talent care</h3>
                                <div>
                                    <p>
                                        {{lang('Our talent care help you get your dream','Talent care kami akan membantu Anda dalam mendapatkan apa yang kamu inginkan')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>3</span>
                            <div class="content">
                                <h3>{{lang('Choose Your Talent','Dapatkan yang kamu inginkan')}}</h3>
                                <div>
                                    <p>
                                        {{lang('Your internal assessment based on our best-matched candidates.','Kami secara aktif akan mencarikan pekerjaan idaman kamu. Yuk bergabung!')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-base" style="background: #f1f5f7;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1>{{ $job->jobs_title }}</h1>

                    
                                
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
                                <button type="button" class="btn btn-lg btn-primary" 
                                style="width: 100%">
                                    Apply Job
                                </button>
                            </a>
                            @else

                            <a class="see-more-link" data-target="#mustLogin" data-toggle="modal" data-dismiss="modal">
                                <button type="button" class="btn btn-lg btn-primary" 
                                style="width: 100%">
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

    <section class="section-base" id="list-lowker">
        <div class="container" style="padding-bottom: 0">
            <h2 align="left">
                    Currently open roles urgently.
            </h2>
            <hr class="space" />


            <h3>Web Developer</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>
                                2 years work experience, 1 year development experience with Javascript, 1 year development experience with PHP, Good English communication skills and client servicing experiences, Work well under pressure and tight deadlines
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <ul class="icon-list icon-circle">
                                <li>Fulltime Jobs</li>
                                <li>Remote/onsite</li>
                                <li>Contract 6 month</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="space space-40" />
                    <table class="table table-grid table-border no-padding-y align-left table-full-sm">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-users"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Availability</h3>
                                            <p>2 people</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-book"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Experience</h3>
                                            <p>Min 2 years</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr-graduation-hat lnr"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Min. Graduation</h3>
                                            <p>none</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <a href="{{url('/jobs').param()}}" class="btn btn-lg btn-primary full-width ">
                        Apply now
                    </a>


                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>

            <hr />
            <h3>UI/UX Designer</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>
                                3+ years working as a UI/UX designer, Good knowledge and ability to implement the vision using HTML, CSS, Javascript, Experienced at driving a user experience from start-to-finish that delivers results, connects emotionally., Obsessed with good user-centered design practices and have an eye for detail.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <ul class="icon-list icon-circle">
                                <li>Fulltime Jobs</li>
                                <li>Remote/onsite</li>
                                <li>Contract 6 month</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="space space-40" />
                    <table class="table table-grid table-border no-padding-y align-left table-full-sm">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-users"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Availability</h3>
                                            <p>2 people</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-book"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Experience</h3>
                                            <p>Min 3 years</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr-graduation-hat lnr"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Min. Graduation</h3>
                                            <p>none</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <a href="{{url('/jobs').param()}}" class="btn btn-lg btn-primary full-width ">
                        Apply now
                    </a>
                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>


            <hr />
            <h3>Backend Engineer (Go)</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>
                                2+ years in writing GO, Prior experience developing microservices in the cloud using G, Ability to write scalable Go code adhering to the best practice, Solid security best practice, Strong computer science and engineering backgroun, Forward thinking and up to date on current and emerging architecture pattern.
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <ul class="icon-list icon-circle">
                                <li>Fulltime Jobs</li>
                                <li>Remote/onsite</li>
                                <li>Contract 6 month</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="space space-40" />
                    <table class="table table-grid table-border no-padding-y align-left table-full-sm">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-users"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Availability</h3>
                                            <p>2 people</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr lnr-book"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Experience</h3>
                                            <p>Min 2 years</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="icon-box icon-box-left">
                                        <i class="lnr-graduation-hat lnr"></i>
                                        <div class="caption">
                                            <h3 class="text-sm">Min. Graduation</h3>
                                            <p>none</p>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">

                    <a href="{{url('/jobs').param()}}" class="btn btn-lg btn-primary full-width ">
                        Apply now
                    </a>

                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>

            <div style=" text-align:center; background: #fff;height: 300px;position: relative;width: 100%;margin-top: -300px; background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 53%, rgba(255,255,255,0) 100%);">
            
                <div><a href="{{url('jobs').param()}}" class="btn btn-sm btn-circle full-width" style="margin-top: 150px;width: 300px;">Show All Opportunities</a> </div> 

            </div>
        </div>
    </section>

    

    <!-- Dapatkan oportunity -->
    <section class="section-base" id="dapatkan-oportunity" style="background: #f1f5f7;">
        <div class="container">
            <style>
                .talent { margin-top: 20px }
            </style>


            <div class="row">
                <div class="col-lg-12" align="center">
                    <h2>{{lang('Get your opportunity and be like them.','Dapatkan opportunity dan jadilah seperti mereka.')}}</h2>
                </div>
            </div>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-6 talent">
                    <div class="cnt-box cnt-box-side boxed">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/users/user-1.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2 style="margin-bottom: 0">Arief Widyananda</h2>
                            <div class="extra-field">Managing Director Krafthaus</div>
                            <p>
                                {!!lang(
                                    'Starts from 2011 as a remote software developer, Arief is now working as Managing Director at Krafthaus, an Australian Digital Agency in Yogyakarta. Start with 3 people, this company now scaling up to 30 team members.',
                                    'Berawal dari tahun 2011 sebagai 
                                <b style="color: #4ab5e6; text-decoration: underline;">remote programer</b>, 
                                tahun 2012 dipercaya menjadi Managing Director Krafthaus, Digital Agency dari Australia cabang Yogyakarta, semula hanya 3 orang team, kini jumlah team lebih dari 30 orang.'
                                )!!}
                                
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 talent">
                    <div class="cnt-box cnt-box-side boxed">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/users/user-3.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2 style="margin-bottom: 0">Dodi Prakoso Wibowo</h2>
                            <div class="extra-field">Founder PT Erporate Solusi Global</div>
                            <p>
                                Berawal tahun 2007 sebagai <b style="color: #4ab5e6; text-decoration: underline;">remote project manager & freelance programer</b>,  
                                2012 founding Imedia, tahun 2016 mendapatkan kepercayaan dan investasi dari client untuk membangun software house
                                & talent solution
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-image light ken-burn-center" data-parallax="scroll" data-image-src="{{url('template/upscale/media/hd-4.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2>{{lang('Ready for a quick consultation?','Ingin Konsultasi Kebutuhan Anda?')}}</h2>
                    <hr class="space-xs">
                    <p>{{lang('Our business analyst always ready to hear your business needs, for FREE.','Bisnis analis kami selalu siap untuk mendengar kebutuhan bisnis Anda, secara GRATIS.')}}</p>
                </div>
                <div class="col-lg-4">
                    <form action="#" class="form-box form-inline" method="get" data-email="example@domain.com">
                        <div class="row" style="width: 100%">
                            <div class="col-lg-12">
                                <p></p>
                                <a class="btn btn-sm" onClick="Tawk_API.maximize();">
                                    {{lang('Schedule a Call','Hubungi kami sekarang')}}
                                </a>
                            </div>
                        </div>
                    </form>
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
                        Register
                    </a> 
                    
                    &nbsp

                    or 

                    &nbsp

                    <a class="btn login-apply" data-target="#ModalLogin" data-toggle="modal" 
                    style="color: #fff;margin: 0" data-dismiss="modal" 
                    data-redirect='{{url("jobs/apply/".$id)}}'>
                        Login
                    </a>
                    
                </div>

            </div>
        </div>
    </div>


</main>




<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection