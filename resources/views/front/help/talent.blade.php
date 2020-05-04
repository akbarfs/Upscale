@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'menu-transparent light')

@section('content')

<main>
    <section class="section-video light">
        <div style="top: 0;right: 0;left: 0;position: absolute;width: 100%;z-index: 1;height: 100%;background: #000; opacity: 0.7"></div>
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-2.jpg')}}">
            <source src="{{url('template/upscale/media/talent.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-8" style="font-size: 25px">
                    <h1>
                        Scaling Up Your Skill & Networks.
                    </h1>
                    
                    Bergabung dan dapatkan banyak manfaat di ecosystem kami
                    <ul>
                        <li>Get Jobs / Project </li>
                        <li>Access to Coworking Space</li>
                        <li>Acces to Education Class</li>
                        <li>Get Exponensial Opportunity</li>
                        <li>Constructive Community</li>
                    </ul>
                        
                </div>
                <div class="col-lg-4 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    <a href="https://api.whatsapp.com/send?phone=6287888666531&text=hi, saya ingin bergabung" target="_blank" class="btn btn-circle btn-sm">Join Community</a>
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
                            <h2>Get the dream jobs</h2>
                            <p>
                                Membantu talent mendapatkan karir yang sesuai
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-user"></i>
                        <div class="caption">
                            <h2>Help improve skill</h2>
                            <p>
                                Mendapat akses kelas yang sedang berjalan secara gratis
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-users"></i>
                        <div class="caption">
                            <h2>Ensure Rights</h2>
                            <p>
                                Membantu talent untuk mendapatkan hak yang dijanjikan 
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

        </div>

    </section>

    <section class="section-base">
        <div class="container" style="padding-bottom: 0">
            

            <div class="row">
                <div class="col-lg-12" align="center">
                    <h2>Dapatkan opportunity dan jadilah seperti mereka.</h2>
                </div>
            </div>
            <hr class="space-sm" />
            <div class="row">
                <div class="col-lg-6">
                    <div class="cnt-box cnt-box-side boxed">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/users/user-1.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2 style="margin-bottom: 0">Arief Widyananda</h2>
                            <div class="extra-field">Managing Director Krafthaus</div>
                            <p>
                                Berawal dari tahun 2011 sebagai 
                                <b style="color: #4ab5e6; text-decoration: underline;">remote programer</b>, 
                                tahun 2012 dipercaya menjadi Managing Director Krafthaus, Digital Agency dari Australia cabang Yogyakarta, semula hanya 3 orang team, kini jumlah team lebih dari 30 orang.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
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