@extends('layouts.template')

@section('content')

<main>
    <section class="section-video light">
        <!-- <div style="top: 0;right: 0;left: 0;position: absolute;width: 100%;z-index: 1;height: 100%;background: #000;/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#000000+3,000000+100&0.37+26,0.37+26,1+96 */
background: -moz-linear-gradient(top,  rgba(0,0,0,0.37) 3%, rgba(0,0,0,0.37) 26%, rgba(0,0,0,1) 96%, rgba(0,0,0,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(0,0,0,0.37) 3%,rgba(0,0,0,0.37) 26%,rgba(0,0,0,1) 96%,rgba(0,0,0,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(0,0,0,0.37) 3%,rgba(0,0,0,0.37) 26%,rgba(0,0,0,1) 96%,rgba(0,0,0,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5e000000', endColorstr='#000000',GradientType=0 ); /* IE6-9 */

"></div> -->

        <div style="top: 0;right: 0;left: 0;position: absolute;width: 100%;z-index: 1;height: 100%;background: #000; opacity: 0.6"></div>
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-2.jpg')}}">
            <source src="{{url('template/upscale/media/office.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-6" style="font-size: 25px">
                    <h1>
                        Scaling Up Your Business.
                    </h1>
                    
                    Service kami cocok untuk membantu berbagai skala perusahaan
                    <ul>
                        <li>Enterprise Corporation</li>
                        <li>Startup Company</li>
                        <li>E-commerce</li>
                        <li>Small-business</li>
                    </ul>
                        
                </div>
                <div class="col-lg-6 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    <a href="#" class="btn btn-circle btn-sm">Start Project</a>
                    <a href="#" class="btn btn-circle btn-border light btn-sm" style="margin-top: 0">Start Hiring</a>
                </div>
            </div>
            <hr class="space-lg" />
        </div>
    </section>

    

    <section id="overview" class="section-image light" style="background-image:url({{url('template/upscale/media/bg.svg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-user"></i>
                        <div class="caption">
                            <h2>Help find talent</h2>
                            <p>
                                Kami membantu anda dalam mencari talent yang tepat
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-users"></i>
                        <div class="caption">
                            <h2>Help resource management</h2>
                            <p>
                               Kami membantu anda dalam mengatur talent anda
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-diamond"></i>
                        <div class="caption">
                            <h2>Help setup office</h2>
                            <p>
                                Membantu anda setup office di regional tertentu
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-base section-color">
        <div class="container">
            <div class="row row-fit-lg">
                <div class="col-lg-3">
                    <p>
                        <!-- 
                        Access to additional talent pools and flexible scaling are critical for businesses that want to innovate and succeed with their software products. Even if you have a clear project roadmap and a strong core team, extra development capabilities will help you reach your milestones faster. -->

                        Dapatkan akses database talent kami untuk membantu scaling up perusaahaan anda dengan cara yang flexible. Hal ini sangat krusial bagi bisnis yang ingin berinovasi dengan cepat dan tepat. Terlebih apabila anda memiliki roadmap project yang baik dan strategi yang tepat 
                    </p>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Since 2002, N-iX has helped companies across the globe augment their software development teams with top IT talent. With an internal pool of 1,000 tech experts and a strong employer brand, we can quickly find the right specialists to boost your project. -->

                        Sejak tahun 2009, telah membantu banyak perusahaan untuk mewujudkan harapan dengan mencarikan talent atau vendor yang tepat. Dengan database talent pool kami yang jumlahnya lebih dari 5000 talent, kami dapat membantu anda mewujudkan visi anda
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="grid-list list-gallery grid-wall-1" data-lightbox-anima="fade-top" data-columns="2">
                        <div class="grid-box">
                            <div class="grid-item">
                                <a class="img-box" href="media/music/image-15.jpg">
                                    <img src="{{url('template/upscale/media/music/image-15.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-1.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-3.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-3.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-13.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-13.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-base section-color">
        <div class="container" style="padding-top: 0">
            <ul class="slider" data-options="type:carousel,arrows:false,nav:false,perView:5,perViewMd:3,perViewXs:2,gap:80">
                <li>
                    <img src="{{url('template/upscale/media/logos/logo-6.png')}}" alt="" />
                </li>
                <li>
                    <img src="{{url('template/upscale/media/logos/logo-4.png')}}" alt="" />
                </li>
                <li>
                    <img src="{{url('template/upscale/media/logos/logo-1.png')}}" alt="" />
                </li>
                <li>
                    <img src="{{url('template/upscale/media/logos/logo-5.png')}}" alt="" />
                </li>
                <li>
                    <img src="{{url('template/upscale/media/logos/logo-3.png')}}" alt="" />
                </li>
            </ul>
        </div>
    </section>

    <section class="section-base">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-top">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-9.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>Krafthaus, Coorporate management</h2>
                            <span class="extra-field">Digital Agencies</span>
                            <p>
                                Sejak tahun 2012 talent kami dipercaya oleh perusahaan Australia sebagai Managing Director untuk mengelola cabang di Indonesia
                            </p>
                            <a class="btn-text" href="#">Arief Widyananda</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-top">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-10.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>Cakap, Dedicated Office & Team</h2>
                            <span class="extra-field">Startup Education</span>
                            <p>
                                Sejak tahun 2015 s/d 2020 membantu Cakap mendapatkan belasan programer & mengelola development office di jogja.
                            </p>
                            <a class="btn-text" href="#">Dodi Prakoso Wibowo</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-top">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-11.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>HOS, Digital Transformation</h2>
                            <span class="extra-field">UKM, E-Commerce</span>
                            <p>
                                Partner Vendor kami telah banyak membantu UKM untuk mentransformasi usaha retailnya menerapkan transformasi digital O2O.
                            </p>
                            <a class="btn-text" href="#">Sistemtoko.com</a>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="space-lg" />
            <div class="row">
                <div class="col-lg-6">
                    <img class="margin-23" src="{{url('template/upscale/media/customers-2.png')}}" alt="" />
                    <hr class="space-sm" />
                    <h3>Arutala, Coorporate management</h3>
                    <p>
                        Salah satu member dari network kami, dipercaya menjadi CEO untuk mewujudkan visi Arutala, perusahaan AR/VR yang berfokus operational excellence dan improved customer experiences
                    </p>
                    <a href="#" class="btn-text">Indra Haryadi</a>
                </div>
                <div class="col-lg-6">
                    <hr class="space-xs" />
                    <h2>More stories from our<br />member community around indonesia.</h2>
                    <hr class="space-sm" />
                    <div class="grid-list" data-columns="1">
                        <div class="grid-box">
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-12.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>JDV, Incubator Manager</h2>
                                        <p>
                                            Salah satu member kami berpengalaman membantu Telkom dalam mengelola Jogja Digital Valley as coworking space & Incubator
                                        </p>
                                        <a href="#" class="btn-text">Saga Iqranegara</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-13.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>Koinwork, supply programmers </h2>
                                        <p>
                                           Kami telah membantu Koinwork untuk menambah team programmer
                                        </p>
                                        <a href="#" class="btn-text">Read this story</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="space-lg" />
            <h2 class="align-center">Simple & an affordable price plans for everyone.</h2>
            <p class="align-center width-650">
                Paket harga dengan konsep yang sederhana & terjangkau untuk semua orang. Baik skala Coorporate, startup sampai dengan UKM
            </p>
            <hr class="space" />
            <table class="table table-grid table-border align-center table-full-sm no-padding-y">
                <tbody>
                    <tr>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Talent Pool ( partnership )</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="100000" data-speed="3000" data-unit="+">100.000</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                didapat dari partnership, community, universitas dan lain-lain
                            </p>
                        </td>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Talent Database ( member )</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="7000" data-speed="3000" data-unit="+">7.000</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                Kami memiliki database talent lebih dari 7.000 kontak
                            </p>
                        </td>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Talent Deliver</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="100" data-speed="3000" data-unit="+">5</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                Sejak tahun 2009 kami telah mengelola / men-deliver ratusan talent
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


</main>

@endsection 