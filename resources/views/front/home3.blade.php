@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'menu-transparent light')

@section('content')

<style>
    
    .slide-title1 { font-size: 35px }
    .slide-title2 { font-size: 35px }
    .slide-title3 { font-size: 20px }


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

        .grid-list{ padding-top: 30px }
        #features .container { padding-bottom:0 }
        .join_community { margin-top: 10px; }
    }

</style>

<main>
    <section class="section-video light">
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-2.jpg')}}">
            <source src="{{url('template/upscale/media/cowork-black.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg hidden-sm" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-8" style="font-size: 25px">
                    <h1 class="slide slide-title1">
                         {{lang('Hire On-Demand Talent.','Hire On-Demand Talent.')}}
                    </h1>
                    
                    <h2 class="slide-title2">
                        {!!lang(
                            
                            'Just focus on scaling your business and let us do the "Talent" things.',

                            'Fokuskan pada pengembangan bisnis Anda dan biarkan kami mengerjakan urusan "Talent".'

                        )!!}
                    </h2>

                    <p class="slide-title3" style="margin-bottom: 20px">
                    {!!lang(
                        'Hire software developers, designers, product manager, finance or administrative team from our exclusive networks. Our talents are available for both on-site or work remotely from our office.<br /><br />Choose from the Full-time or Freelance contract based on your business need.',
                        'Hire software developers, designers, product manager, finance, atau administraif team dari eksklusif network kami. Talent kami bisa bekerja secara remote maupun on-site.<br /><br />Kontrak full-time maupun freelance yang disesuaikan dengan kebutuhan bisnis Anda.'
                    )!!}
                    </p>
                        
                </div>
                <div class="col-lg-4 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    <a href="#quotation" class="btn btn-circle btn-sm" style="margin-top: 15px">
                        Request Quotation
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
                                    {{lang('Hire a talented team to help scale up your business.','Hire talent yang akan membantu mengembangkan bisnis Anda')}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Freelance Team</h2>
                                <p>
                                    Part-time team that work based on the man-hour rate.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Head Hunter</h2>
                                <p>
                                    Make your recruitment process hassle-free.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Project-Based</h2>
                                <p>
                                    A legacy project-based team to finish up your project.
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
                    <span class="tooltiptext">Our member experience</span>
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-2.png')}}" alt="" />
                    <span class="tooltiptext">Our member experience</span>
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-3.png')}}" alt="" />
                    <span class="tooltiptext">Our member experience</span>
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-4.png')}}" alt="" />
                    <span class="tooltiptext">Our member experience</span>
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-5.png')}}" alt="" />
                    <span class="tooltiptext">Our member experience</span>
                </li>
                <li class="tooltipx">
                    <img src="{{url('template/upscale/media/logos/white/logo-6.png')}}" alt="" />
                    <span class="tooltiptext">Our member experience</span>
                </li>
            </ul>
        </div>
    </section>

    <section id="features" class="section-base section-color align-center section-bottom-layer-2">
        <div class="container">
            <h2 class="align-center" data-anima="fade-bottom" data-time="1000" style="margin: 0 auto; max-width: 900px">
                Seriously, just focus on scaling up your business.
            </h2>
            <p class="align-center width-650" data-anima="fade-bottom" data-time="1000">
                We will handle the tax regulation, legal, and management. We have a proven working framework and tools to ensure team collaboration with real-time productivity monitoring.
            </p>
            <hr class="space" />
            <img src="{{url('template/upscale/media/devices.png')}}" alt="" style="animation: none"/>
        </div>
    </section>

    <section class="section-base no-padding-top align-center">
        <div class="container">
            <hr class="space" />
            <div class="row">
                <div class="col-lg-4">
                    <h3>Fast Recruitment Process</h3>
                    <p>
                        Let us hear your needs, and your talents will be ready within 14 days.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Take Control of Your Talent</h3>
                    <p>
                        You will receive a periodic report and check our real-time monitoring tool anytime.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Cost-Efficient</h3>
                    <p>
                        No need to spend on the office space and unproductive team.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="counter" class="section-base section-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="align-center">Which department do you need right now?</h2>
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
                    <hr class="space-sm" />
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>How do we work?<br />We will work your way.</h2>
                    <p>
                        A short consultation with our business specialist will help us understand your business needs and your talent qualification. We will make sure our list of talent will be the best-matched for your needs.
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Estimated Consultation Time</h3>
                            <div class="value text-lg">
                                <span data-to="60" data-speed="1000">0</span>
                                <span class="text-md">Minutes</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-steps box-steps-vertical">
                        <div class="step-item">
                            <span>1</span>
                            <div class="content">
                                <h3>Share your Business Needs</h3>
                                <div>
                                    <p>
                                        Our business analyst will help you to determine your talent qualification.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>2</span>
                            <div class="content">
                                <h3>Talent Assessment</h3>
                                <div>
                                    <p>
                                        We looking for the best-matched candidate, we will conduct an interview, psychological test, and online technical test.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>3</span>
                            <div class="content">
                                <h3>Choose Your Talent</h3>
                                <div>
                                    <p>
                                        Your internal assessment based on our best-matched candidates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-image light ken-burn-center" data-parallax="scroll" data-image-src="{{url('template/upscale/media/hd-4.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ready for a quick consultation?</h2>
                    <hr class="space-xs" />
                    <p>Our business analyst always ready to hear your business needs, for FREE.</p>
                    <a class='btn btn-sm' href="#quotation">Schedule a Call</a>
                </div>
            </div>
        </div>
    </section>

    <section id="usage" class="section-base section-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>You got your best-matched talent,<br/> We still here to support you</h2>
                    <p>
                        Whenever you're ready to choose our best-matched talent, we will be ready to prepare the HR stuff like online attendance, contract, tax regulation etc.
                        <br/><br/>
                        Our business consultant will also ready to support your management or project consultation like project timeframe, finance, KPI building, etc.
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Estimated Talent Matching</h3>
                            <div class="value text-lg">
                                <span data-to="14" data-speed="1000">2</span>
                                <span class="text-md">days</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="box-steps box-steps-vertical">
                        <div class="step-item">
                            <span>4</span>
                            <div class="content">
                                <h3>Paperwork</h3>
                                <div>
                                    <p>
                                        Will finish up all of the contract and other preparation here.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>5</span>
                            <div class="content">
                                <h3>Talent Ready to Work</h3>
                                <div>
                                    <p>
                                        Your talent is ready to add value to your business.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>6</span>
                            <div class="content">
                                <h3>Support</h3>
                                <div>
                                    <p>
                                        Don't worry we will provide both HR and Project support during our contract like attendance, timeline, building KPI, etc.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="section-base section-bottom-layer">
        <div class="container" data-anima="fade-bottom" data-time="1000">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Still not sure which services you should choose?</h2>
                    <p>This list of services will help you to decide.<br /><br />Don't worry if you don't need some of our services, all services are customizable based on your needs.</p>
                    <hr class="space-sm" />
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Dedicated Team / Freelance Team</a>
                            <div class="content">
                                <p>
                                    Find the best-matched talent for your needs. The talent is available to works on-site or remotely, both full-Time or freelance.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Head Hunter</a>
                            <div class="content">
                                <p>
                                    Find the best-matched talent for your needs. The talent will work as your internal team under your contract and company regulation.
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Project-Based</a>
                            <div class="content">
                                <p>
                                    Find the best-matched team or vendor for your project.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <table class="table table-border table-price">
                        <thead>
                            <tr>
                                <th>Services</th>
                                <th>Dedicated Team</th>
                                <th>Head Hunter</th>
                                <th>Project base</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Talent Hunt</td>
                                <td><i class="icon-check"></i></td> <!---icon-check-gray-->
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>CoWork Space</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Remote Worker / On-Site Worker</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Resource Operational & Management</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>HR Manager</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>IT Consultant</td>
                                <td><i class="icon-check"></i></td>
                                <td></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Resource Tax and Legal</td>
                                <td><i class="icon-check"></i></td>
                                <td></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Shared Project Risk & Responsibilty</td>
                                <td></td>
                                <td></td>
                                <td><i class="icon-check"></i></td>
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
    
   
    <section id='quotation' class="section-base section-color no-padding-bottom section-top-overflow">
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
    
    <script>
        $(document).ready(function()
        {
            $("#form-complete").submit(function()
            {
                var name = $(this).find('input[name="name"]').val();
                var phone = $(this).find('input[name="phone"]').val();
                var email = $(this).find('input[name="email"]').val();
                var text = $(this).find('textarea[name="text"]').val();
                var url = "?phone=6287888666531&text=Hi, saya "+name+" ("+phone+" "+email+") : "+text ; 
                alert(url) ; 
                window.location.replace("https://api.whatsapp.com/send?"+url);
                return false ;
            });
        });
    </script>

</main>

@endsection