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
                        <li>E-commerce</li>
                        <li>Small-business</li>
                        <li>Startup Company</li>
                    </ul>
                        
                </div>
                <div class="col-lg-6 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    <a href="#" class="btn btn-circle btn-sm">Start Project</a>
                    <a href="#" class="btn btn-circle btn-border light btn-sm">Start Hiring</a>
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
                        <i class="lnr lnr-users"></i>
                        <div class="caption">
                            <h2>Paths tracking</h2>
                            <p>
                                Lorem ipsum dolor sitamet consectetur adipisicino mae.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-user"></i>
                        <div class="caption">
                            <h2>Music player</h2>
                            <p>
                                Lorem ipsum dolor sitamete consectetur adipi elito.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-side-icon">
                        <i class="lnr lnr-users"></i>
                        <div class="caption">
                            <h2>Secure access</h2>
                            <p>
                                Lorem ipsum dolor sitamete are consecte elito ippocrito.
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
                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                        Utenim ad minim venia. Duis aute irure dolor in reprehenderite in voluptate velit esse cillum dolore eurtclo
                        mertiso mortaccio della troia fugiat nulla pariature artolo.
                    </p>
                </div>
                <div class="col-lg-3">
                    <p>
                        Escolo ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempore dolor in reprehenderite in voluptate.
                        Utenim ad minim venia. Duis aute irure dolor in reprehenderite in voluptate velit esse cillum dolore eurtclo
                        mertiso mortaccio della troia fugiat nulla paratiro.
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
                                <a class="img-box" href="{{url('template/upscale/media/music/image-11.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-13.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-7.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-3.jpg')}}" alt="">
                                </a>
                            </div>
                            <div class="grid-item">
                                <a class="img-box" href="{{url('template/upscale/media/music/image-5.jpg')}}">
                                    <img src="{{url('template/upscale/media/music/image-1.jpg')}}" alt="">
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
                    <img src="{{url('template/upscale/media/logos/logo-7.png')}}" alt="" />
                </li>
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
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-11.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>The Factory Company</h2>
                            <span class="extra-field">Small business</span>
                            <p>
                                Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
                            </p>
                            <a class="btn-text" href="#">Read story</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-top">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-9.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>Dimitri Vanilla</h2>
                            <span class="extra-field">Self employer</span>
                            <p>
                                Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
                            </p>
                            <a class="btn-text" href="#">Read story</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cnt-box cnt-box-top">
                        <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-10.jpg')}}" alt="" /></a>
                        <div class="caption">
                            <h2>Traders Corporate</h2>
                            <span class="extra-field">Public company</span>
                            <p>
                                Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore.
                            </p>
                            <a class="btn-text" href="#">Read story</a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="space-lg" />
            <div class="row">
                <div class="col-lg-6">
                    <img class="margin-23" src="{{url('template/upscale/media/customers-2.png')}}" alt="" />
                    <hr class="space-sm" />
                    <h3>Circlebot Alphabet Division</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                    </p>
                    <a href="#" class="btn-text">Read this story</a>
                </div>
                <div class="col-lg-6">
                    <hr class="space-xs" />
                    <h2>More stories from our<br />best costumers around the world.</h2>
                    <hr class="space-sm" />
                    <div class="grid-list" data-columns="1">
                        <div class="grid-box">
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-12.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>Richard Scally</h2>
                                        <p>
                                            Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmo.
                                        </p>
                                        <a href="#" class="btn-text">Read this story</a>
                                    </div>
                                </div>
                            </div>
                            <div class="grid-item">
                                <div class="cnt-box cnt-box-side ">
                                    <a href="#" class="img-box"><img src="{{url('template/upscale/media/photo/image-13.jpg')}}" alt="" /></a>
                                    <div class="caption">
                                        <h2>Bluecircle</h2>
                                        <p>
                                            Lorem ipsum dolor sitamet consectetur adipisicing elito sed do tempo.
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
            <h2 class="align-center">Simple cheap plans for everyone.</h2>
            <p class="align-center width-650">
                Lorem ipsum dolor sit amet no sea takimata sanctus est lorem ipsum dolor sit amete
                sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
            </p>
            <hr class="space" />
            <table class="table table-grid table-border align-center table-full-sm no-padding-y">
                <tbody>
                    <tr>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Monthly activations</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="29" data-speed="3000" data-unit="%">29</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipis ulla pariatur.
                            </p>
                        </td>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Conversations</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="30000" data-speed="3000" data-unit="+">30000</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipis ulla pariatur.
                            </p>
                        </td>
                        <td>
                            <div class="counter counter-vertical counter-icon align-center">
                                <div>
                                    <h3>Revenues increase</h3>
                                    <div class="value">
                                        <span class="text-md" data-to="5" data-speed="3000" data-unit="x">5</span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <hr class="space-xs" />
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipis ulla pariatur.
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


</main>

@endsection 