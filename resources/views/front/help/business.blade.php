@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'menu-transparent light')

@section('content')

<style>
    
    #start-hiring { margin-top: 15px }
    @media only screen and (max-width:990px){
        
    }

    @media only screen and (max-width:767px){
        
        
    }

    @media only screen and (max-width:480px){
        
    }

</style>

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
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-6" style="font-size: 25px">
                    <h1>
                        We have the best networks.
                    </h1>
                    
                    <p class="slide-title3" style="margin-bottom: 20px">
                        From partnership, universities and IT communities that will help you to Scale Up your business.
                    </p>
                        
                </div>
            </div>
            <hr class="space-lg space hidden-sm" />
        </div>
    </section>

    

    <!-- <section id="overview" class="section-image light" style="background-image:url({{url('template/upscale/media/bg.svg')}})">
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
    </section> -->

    <section class="section-base section-color">
        <div class="container">
            <div class="row row-fit-lg">
                <div class="col-lg-3">
                    <p>
                        Get access to our talent database to help scale up your business. Hiring a best-matched talent and flexible scaling is a crucial business that wants to innovate. Even if you have a clear project roadmap, adding talent capabilities will help you to reach your target faster.
                    </p>
                </div>
                <div class="col-lg-3">
                    <p>
                        Since 2009, UpScale has helped a hundred companies with our dedicated talent or vendor for their project. With the 5000+ talent database, we're here to support your business needs and quickly find the best-matched talent to boost your project.
                    </p>
                </div>
                <div class="col-lg-6">
                    <div class="grid-list list-gallery grid-wall-1" data-lightbox-anima="fade-top" data-columns="2">
                        <div class="grid-box">
                            <div class="grid-item" style="animation: none">
                                <a class="img-box" href="media/music/image-15.jpg">
                                    <img src="{{url('template/upscale/media/music/image-15.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item" style="animation: none">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-1.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-1.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item" style="animation: none">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-3.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-3.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item" style="animation: none">
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
                            <h2>Krafthaus, Corporate Management</h2>
                            <span class="extra-field" style="animation: none">Digital Agency</span>
                            <p>
                                Our experienced member has been trusted by Australian Company as a Managing Director to handle Indonesia's branch office.
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
                            <span class="extra-field" style="animation: none">Startup Education</span>
                            <p>
                                We're helping Cakap since 2015 to find their best software developer and manage their development office in Yogyakarta, Indonesia.
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
                            <span class="extra-field" style="animation: none">Small Business, E-Commerce</span>
                            <p>
                                Our partner vendor has been helping small businesses to transform their retail store and implementing the digital transformation.
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
                    <h3>Arutala, Corporate Management</h3>
                    <p>
                    One of our network members become a CEO for Arutala, an AR/VR tech company that focuses on operational excellence and improved customer experiences.
                    </p>
                    <a href="#" class="btn-text">Indra Haryadi</a>
                </div>
                <div class="col-lg-6">
                    <hr class="space-xs" />
                    <h2>More stories from our community members</h2>
                    <hr class="space-sm" />
                    <div class="grid-list" data-columns="1">
                        <div class="grid-box">
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-12.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>JDV, Incubator Manager</h2>
                                        <p>
                                        One of our experienced members helps Telkom to handle Jogja Digital Valley as Coworking Space & Incubator Manager.
                                        </p>
                                        <a href="#" class="btn-text">Saga Iqranegara</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-13.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>Koinworks, Head Hunter</h2>
                                        <p>
                                           We're helping Koinworks to help them to find their best-matched software developers.
                                        </p>
                                        <a href="#" class="btn-text">Read this story</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="section-base section-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="align-center">Ready to Scale Up your business with us?</h2>
                    <p class="align-center width-650">
                        Our talent includes but not limited to Software Developer, Quality Assurance, Graphic Designer, UX Designer, Product Manager, Finance, Data Entry, etc who are so motivated, discipline, and passionate about technology and productivity.
                    </p>
                    <hr class="space" />
                    <table class="table table-grid table-border align-center table-full-sm no-padding-y">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="counter counter-vertical counter-icon align-center">
                                        <div>
                                            <h3>Talent Pool</h3>
                                            <div class="value">
                                                <span class="text-md" data-to="100000" data-speed="3000" data-unit="+">100.000</span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="space-xs" />
                                    <p>
                                        The talent pool from partnership, community, and universities.
                                    </p>
                                </td>
                                <td>
                                    <div class="counter counter-vertical counter-icon align-center">
                                        <div>
                                            <h3>Talent Hired</h3>
                                            <div class="value">
                                                <span class="text-md" data-to="7000" data-speed="3000" data-unit="+">700</span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="space-xs" />
                                    <p>
                                        Productive talent hired and working with our clients.
                                    </p>
                                </td>
                                <td>
                                    <div class="counter counter-vertical counter-icon align-center">
                                        <div>
                                            <h3>Happy Clients</h3>
                                            <div class="value">
                                                <span class="text-md" data-to="100" data-speed="3000" data-unit="+">5</span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="space-xs" />
                                    <p>
                                        Since 2009, UpScale has been trusted by a hundred companies.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section class="section-base section-color no-padding-bottom section-top-overflow">
        <div class="container">
            <div class="boxed-area">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Request Quotation.</h2>
                        <hr class="space-sm" />
                        <form id="form-complete" action="https://api.whatsapp.com/send" class="form-box" method="get" data-email="example@domain.com">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="name" name="name" placeholder="Name" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <input id="phone" name="phone" placeholder="Phone" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <input id="email" name="email" placeholder="Email" type="email" class="input-text" required>
                                </div>
                            </div>
                            <textarea id="messagge" name="text" class="input-textarea" placeholder="What is your business needs?" required></textarea>
                            
                            <button class="btn btn-sm btn-circle" type="submit">Send Request</button>
                            <!-- <div class="success-box">
                                <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                            </div>
                            <div class="error-box">
                                <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
            <hr class="space-lg visible-md" />
        </div>
    </section>
</main>

@endsection 