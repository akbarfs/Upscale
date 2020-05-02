@extends('layouts.template')

@section('content')

<header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{url('template/upscale/media/devc.jpg')}}" data-offset="0">
    <div class="container">
        <h1>About Our Community & Ecosystem</h1>
        <h2>Ayo bergabung untuk meningkatkan kualitas industri indonesia.</h2>
        <!-- <ol class="breadcrumb">
            <li><a href="index-2.html">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Blog</a></li>
        </ol> -->
    </div>
</header>

<main>
		<section class="section-image no-padding-y light" style="background-image:url({{url('template/upscale/media/bg.svg')}})">
            <div class="container">
                <hr class="space space-40" />
                <ul class="slider" data-options="type:carousel,arrows:false,nav:false,perView:6,perViewMd:4,perViewSm:3,perViewXs:2,gap:100,autoplay:3000">
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-1.png')}}" alt="" />
                    </li>
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-2.png')}}" alt="" />
                    </li>
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-3.png')}}" alt="" />
                    </li>
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-6.png')}}" alt="" />
                    </li>
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-5.png')}}" alt="" />
                    </li>
                    <li>
                        <img src="{{url('template/upscale/media/logos/white/logo-4.png')}}" alt="" />
                    </li>
                </ul>
                <hr class="space-sm" />
            </div>
        </section>

        <section class="section-base">
            <div class="container" style="padding-bottom: 0">
                <hr class="space" />
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Join Our Community</h1>
                        <p>
                            Visi kami adalah membangun ecosystem yang dapat mendukung semua pelaku industri, baik talent, perusahaan, universitas, 
                            komunitas dan semua pihak lain yang dapat mendukung visi kami. Ayo bergabung untuk meningkatkan kualitas industri indonesia
                        </p>
                        <a href="#" class="btn btn-border btn-circle btn-sm">Join Community</a>
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
                                    <a class="img-box" href="{{url('template/upscale/media/music/image11.jpg')}}">
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
                <hr class="space" />
                <hr class="space-lg" />
                <div class="row">
                    <div class="col-lg-4">
                        <h2>
                            Share & Learn
                        </h2>
                        <p>
                            Dengan bergabung dengan upscale, talent mendapatkan akses platform edukasi yang kami kembangkan, baik sebagai mentor maupun sebagai siswa.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>
                            Expand Network
                        </h2>
                        <p>
                            Perluas pertemananmu diberbagai bidang kemampuan dan diberbagai regional. Ikuti event-event khusus upscale yang akan dilakukan berkala. 
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>
                            Get jobs & Make Money
                        </h2>
                        <p>
                            Mulai bangun pipeline karirmu dengan Upscale. Daftarkan diri anda, lengkapi profile, ikuti assessment & dapatkan karir / pekerjaan yang sesuai harapan anda.
                        </p>
                    </div>
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
                <!--<hr class="space-lg" />
                <h2>
                    Currently open roles urgently.
                </h2>
                <hr class="space" />
                <ul class="text-list text-list-side boxed-area">
                    <li>
                        <h3>Web Developer</h3>
                        <p>
                            2 Years work experience, 1 year development experience with javascript & PHP, good english, work well under pressure.
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    <li>
                        <h3>Back End Engginer</h3>
                        <p>
                            2+ years in writing GO, Prior experience developing inMicroservice, good english, work well under tight deadlines. 
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    <li>
                        <h3>Quality Assurance</h3>
                        <p>
                            3+ yers of software testing, Ability to design test cases documentation, experience intesting APIs, experience testing tools such as Postman, katalon, cypress, slenium, Gatling, etc. Comfortable with programming languages such as javascript, golang, Phyton etc. 
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    <li>
                        <h3>Quality Assurance Manual</h3>
                        <p>
                            2+ years experience as QA, experience in testing web-based projects, strong interest and experience in play games, experience testing APIs
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    <li>
                        <h3>Data Analyst</h3>
                        <p>
                            2 Yers work experience, Familiar with SQL, Basic scripting skill in phyton, good english, work well under pressure
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    <li>
                        <h3>UI/UX Designer</h3>
                        <p>
                            3+ years working as UI/UX designer, good knowledge html,css, javascript, obsessed with good user-centered design practices
                        </p>
                        <div>Yogyakarta, Remote</div>
                    </li>
                    
                </ul>
                <hr class="space" />   <hr class="space-xs" /> -->
                
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
                        <a href="#" class="btn btn-sm full-width btn-circle">Apply now</a>
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
                        <a href="#" class="btn btn-sm btn-circle full-width">Apply now</a>
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
                        <a href="#" class="btn btn-sm btn-circle full-width">Apply now</a>
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
                        <a href="#" class="btn btn-sm btn-circle full-width">Apply now</a>
                        <hr class="space-xs" />
                        <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                    </div>
                </div>

                <div style=" text-align:center; background: #fff;height: 300px;position: relative;width: 100%;margin-top: -300px; background: rgb(255,255,255);background: linear-gradient(0deg, rgba(255,255,255,1) 53%, rgba(255,255,255,0) 100%);">
                
                    <div><a href="#" class="btn btn-sm btn-circle full-width" style="margin-top: 150px;width: 300px;">load more</a> </div> 

                </div>

                <!-- <hr />
                <h3>Data Analyst</h3>
                <hr class="space-sm" />
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-8">
                                <p>
                                    2 years work experience, Familiar with SQL, writing and optimizing queries, Basic scripting skill in Python, Good English communication skills, and client servicing experience, Work well under pressure and tight deadlines, Nice-to-have previous experience in data analytics
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
                        <a href="#" class="btn btn-sm btn-circle full-width">Apply now</a>
                        <hr class="space-xs" />
                        <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
                    </div>
                </div> -->

            </div>
        </section>
        
    </main>

@endsection