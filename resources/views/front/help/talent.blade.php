@extends('layouts.template',['logo'=>'transparent','title'=>'Scaling Up Karir, Skill & Networkmu bersama komunitas eksklusif network upscale'])

@section("menu_class",'menu-transparent light')


@section('content')

<style>

    #desc-talent { font-size: 20px; }
    .desc-list-talent { line-height: 1.5em; }
    @media only screen and (max-width:990px){
        
    }

    @media only screen and (max-width:767px){
       
        
    }

    @media only screen and (max-width:480px){
        #desc-talent { font-size: 18px; }
    }
</style>


<main>
    <section class="section-video light">
        <div style="top: 0;right: 0;left: 0;position: absolute;width: 100%;z-index: 1;height: 100%;background: #000; opacity: 0.7"></div>
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-2.jpg')}}">
            <source src="{{url('template/upscale/media/talent.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-8" id="desc-talent">
                    <h1>
                        Scaling Up Your Skill & Networks.
                    </h1>
                    
                    Join and get the following benefits:
                    <ul class="desc-list-talent" style="padding-top: 15px">
                        <li>Land on your Dream Jobs and Project</li>
                        <li>Exponential Opportunity</li>
                        <li>Constructive Community</li>
                        <li>Access to Our Coworking Space Network</li>
                        <li>Access to Our Education Class Network</li>
                    </ul>
                        
                </div>
                <div class="col-lg-4 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    @if(!Session::has('login'))
                        <!-- <a href="{{url('jobs')}}" class="btn btn-circle btn-sm" data-target="#ModalRegister" data-toggle="modal" onClick="$('#register-role').val('talent');$('.info').hide()">Join Community</a> -->

                        <a href="#" class="btn btn-circle btn-border light btn-sm join_community" data-target="#registerTalent" data-toggle="modal" style="margin: 0; border-color: #fff !important; color: #fff !important;">
                            Join Community
                        </a>

                    @endif
                    <!-- <a href="#" class="btn btn-circle btn-border light btn-sm">Start Hiring</a> -->
                </div>
            </div>
            <hr class="space-lg hidden-sm" />
        </div>
    </section>

    

    <section id="overview" class="section-image light" style="background-image:url({{url('template/upscale/media/bg.svg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-heart"></i>
                        <div class="caption">
                            <h2>Get the Dream Jobs</h2>
                            <p>
                            Helps talent to get the best-matched company and career.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-user"></i>
                        <div class="caption">
                            <h2>Skill Improvement</h2>
                            <p>
                                FREE access to our educational classes.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-users"></i>
                        <div class="caption">
                            <h2>Know your Rights</h2>
                            <p>
                            Helps talent to get their rights based on company rules and regulation.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    
                    <a href="#" class="btn btn-circle btn-border btn-sm join_community" data-target="#registerTalent" data-toggle="modal" style="margin-top: 20px">
                        Join Community
                    </a>

                </div>
                <div class="col-lg-6">
                    <hr class="space-sm visible-md" />
                    <div class="grid-list list-gallery grid-wall-1" data-lightbox-anima="fade-top" data-columns="2">
                        <div class="grid-box">
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-15.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-15.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-5.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-5.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-11.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-11.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-1.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-1.jpg')}}" alt="">
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

    <section class="section-base">
        <div class="container" style="padding-bottom: 0">
            
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
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/users/pp.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2 style="margin-bottom: 0">Fakhrus Syakirin Ramadhan</h2>
                            <div class="extra-field">Founder Pola Kreatif</div>
                            <p>
                                {!!lang(
                                    'Starts from 2014 as freelance UI/UX, and continue the career as full-time Mobile Developer, after got the skill, experience, and network from our ecosystem, he started his agency, Pola Kreatif in 2019.',
                                    'Berawal dari tahun 2014 sebagai <b style="color: #4ab5e6; text-decoration: underline;">freelance UI UX</b>.
                                berlanjut ke <b style="color: #4ab5e6; text-decoration: underline;">fulltime programmer IOS & Android </b>, setelah memiliki skill, pengalaman dan network dari ecosystem kami, tahun 2019 berhasil menjalankan agency sendiri, Pola Kreatif'
                                )!!}
                                
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6 talent">
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
                </div> -->
            </div>

            <hr class="space-lg" />
            <h2 class="align-center">Our Partnership in many regional</h2>
            <p class="align-center width-650">
                Kami secara aktif akan terus mengembangkan komunitas dan network kami dengan berbagai pihak. Nantikan kami hadir di kota anda.
            </p>
            <hr class="space" />
            <div class="row">
                <div class="col-lg-9">
                    <img src="{{url('template/upscale/media/map.png')}}" alt="" />
                </div>
                <div class="col-lg-3">
                    <ul class="icon-list icon-circle align-right align-left-md">
                        <li>Yogyakarta, Indonesia</li>
                        <li>Jakarta, soon</li>
                        <li>Bandung, soon</li>
                        <li>Malang, soon</li>
                        <li>Bali, soon</li>
                        <li>Surabaya, soon</li>
                        <li>Tangerang, soon</li>
                        <li>Semarang, soon</li>
                        <li>Solo, soon</li>
                        <li>Bogor, soon</li>
                    </ul>
                </div>
            </div>

            <hr class="space" />

            <h2 align="center">
                Currently open roles urgently.
            </h2>
            <hr class="space" />


            <h3>Web Developer</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-9">
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
                <div class="col-lg-3">
                    <a href="{{url('/jobs')}}" class="btn btn-sm full-width btn-circle">Apply now</a>
                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>

            <hr />
            <h3>UI/UX Designer</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-9">
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
                <div class="col-lg-3">
                    <a href="{{url('/jobs')}}" class="btn btn-sm btn-circle full-width">Apply now</a>
                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>



            <hr />
            <h3>Quality Assurance (Manual)</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-8">
                            <p>
                                2+ years experience as a Quality Assurance, Experience in testing web-based projects, Strong interest and experience in playing video games, Experience in designing test plan and test cases documentation, Good English communication skills both written and verbal, able to explain defects and provide steps to reproduce clearly, Experience in testing APIs (REST API preferred), Ability to work with clients on tight deadlines and fluid requirements
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
                <div class="col-lg-3">
                    <a href="{{url('/jobs')}}" class="btn btn-sm btn-circle full-width">Apply now</a>
                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>



            <hr />
            <h3>Backend Engineer (Go)</h3>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-9">
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
                <div class="col-lg-3">
                    <a href="{{url('/jobs')}}" class="btn btn-sm btn-circle full-width">Apply now</a>
                    <hr class="space-xs" />
                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                </div>
            </div>

            <div style=" text-align:center; background: #fff;height: 300px;position: relative;width: 100%;margin-top: -300px; background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 53%, rgba(255,255,255,0) 100%);">
            
                <div><a href="{{url('jobs')}}" class="btn btn-sm btn-circle full-width" style="margin-top: 150px;width: 300px;">load more</a> </div> 

            </div>


        </div>
    </section>


</main>


@endsection 