@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'menu-transparent light')

@section('content')

<main>
    <section class="section-video light">
        <video autoplay loop muted playsinline poster="{{url('template/upscale/media/video-poster-2.jpg')}}">
            <source src="{{url('template/upscale/media/cowork-black.mp4')}}" type="video/mp4">
        </video>
        <div class="container" style="padding-bottom: 100px;">
            <hr class="space-lg" />
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-8" style="font-size: 25px">
                    <h1>
                        Hire Talent On-Demand.
                    </h1>
                    
                    <h2 style="font-size: 35px">Just focus on scaling your business<br> let us do the "Talent things".</h2>

                    <p style="font-size: 20px">
                        Hire dari exlusive network kami. Beranggotakan berbagai talent di bidang software developer, designer, finance, product manager, project manager dan lain-lain. Sesuaikan kebutuhan anda baik Fulltime, Head Hunter, Freelance atau Fix project. Baik Onsite maupun Remote
                    </p>
                        
                </div>
                <div class="col-lg-4 align-right align-left-md" data-anima="fade-in" data-time="1000">
                    <a href="#" class="btn btn-circle btn-sm">Request Quotation</a>
                    <!-- <a href="#" class="btn btn-circle btn-border light btn-sm">Start Hiring</a> -->
                </div>
            </div>
            <hr class="space-lg" />
        </div>
    </section>

    <section id="features" class="section-base section-color section-top-overflow" style="background: #37517E">
        <div class="container" style="padding-top: 0">
            <div class="grid-list" data-columns="4" data-columns-md="2" data-columns-xs="1">
                <div class="grid-box">
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Fulltime</h2>
                                <p>
                                    Hire as your outsource fulltime employee
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Freelance</h2>
                                <p>
                                    Hire as your freelance (Part Time) employee
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Head Hunter</h2>
                                <p>
                                    Hire as your fulltime employee
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Project Base</h2>
                                <p>
                                    Get Talent / Vendor for your sub contractor 
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
                Selain talent onsite, kami juga menyediakan talent remote yang dapat dipastikan produktifasnya secara realtime.
            </h2>
            <p class="align-center width-650" data-anima="fade-bottom" data-time="1000">
                Kami memiliki framework kerja yang dapat digunakan untuk talent anda, baik yang bekerja secara remote atau secara onsite
            </p>
            <hr class="space" />
            <img src="{{url('template/upscale/media/devices.png')}}" alt="" />
        </div>
    </section>

    <section class="section-base no-padding-top align-center">
        <div class="container">
            <hr class="space" />
            <div class="row">
                <div class="col-lg-4">
                    <h3>Aman & Terjamin </h3>
                    <p>
                        Upscale menjadi penjamin dan penengah antara talent & perusahaan
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Space & Management</h3>
                    <p>
                        Dapat membantu mengelola talent beserta workspace & fasilitas 
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Cost Efisien</h3>
                    <p>
                        Membantu anda untuk mengefisiensi pengeluaran sesuai dengan kebutuhan
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="how" class="section-base section-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>How we works ?<br />you name it we do it.</h2>
                    <p>
                       Konsultasikan visi dan ekspektasi terhadap bisnis / plan anda. Kami akan membantu mendapatkan talent yang tepat dari ecosystem upscale untuk membantu mewujudkan plan anda. Kami akan pastikan talent yang kami tawarkan sedekat mungkin dengan yang anda harapkan
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Ekspektasi waktu konsultasi</h3>
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
                                <h3>Share your business vision</h3>
                                <div>
                                    <p>
                                        Agar kami dapat mengerti & dapat membantu anda dalam menentukan pemilihan talent yang tepat
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>2</span>
                            <div class="content">
                                <h3>We find talents & assessment</h3>
                                <div>
                                    <p>
                                        Kami carikan dari network kami & melakukan assassment untuk memastikan talent memiliki skill yang sesuai
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>3</span>
                            <div class="content">
                                <h3>We Bring the list to You</h3>
                                <div>
                                    <p>
                                        Kami akan memberikan laporan hasil dari assessment kami ke anda agar anda dapat memastikan sendiri secara langsung
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" style="padding-top: 50px ; padding-bottom: 50px">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <h2>You can assessment by yourself !<br />lets interview & test the talent.</h2>
                    <p>
                        Kami memberikan anda kebebasan untuk memastikan langsung kandidat yang telah lolos dari assessment kami. Sehingga anda lebih yakin dalam memperkerjakan talent yang anda pilih
                    </p>
                    <hr class="space" />
                    <ul class="text-list text-list-image">
                        <li>
                            <img src="{{url('template/upscale/media/photo/square-1.png')}}" alt="" />
                            <div class="content">
                                <h3>Interview langsung menggunakan media online</h3>
                                <p>Zoom, Whatsapp, atau media lainya.</p>
                                <div></div>
                            </div>
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/photo/square-2.png')}}" alt="" />
                            <div class="content">
                                <h3>Pengujian menggunakan dengan challange</h3>
                                <p>Live test code, logic test atau cara lainya.</p>
                                <div></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 align-center">
                    <hr class="space-sm visible-sm" />
                    <ul class="slider slider-side" data-options="type:slider,arrows:false,nav:true,autoplay:3000,controls:out">
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-7.png')}}" alt="" />
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-8.png')}}" alt="" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="usage" class="section-base section-color">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Mendapat talent yang cocok ?<br />ok lets we execute your idea.</h2>
                    <p>
                        Setelah anda yakin dengan talent terpilih, Apabila anda memilih jenis kontrak remote outsource, kami juga dapat membantu anda mengelola beberapa hal seperti coworkspace, absensi, timeline, task, kpi dll
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Estimasi pencarian talent </h3>
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
                                <h3>Choose Talent & contract </h3>
                                <div>
                                    <p>
                                        Pilih kandidat dan type service yang anda inginkan apakah onsite / remote, fulltime / freelance, outsource / hiring
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>5</span>
                            <div class="content">
                                <h3>Execute</h3>
                                <div>
                                    <p>
                                        Kami juga dapat membantu anda mengelola beberapa hal seperti coworkspace, absensi, perijinan, timeline, task, kpi dll
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>6</span>
                            <div class="content">
                                <h3>Deliver! </h3>
                                <div>
                                    <p>
                                        We are done here. Good Luck & Success !
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
                <div class="col-lg-6">
                    <h2>Ingin mendapatkan quotation?</h2>
                    <hr class="space-xs" />
                    <p>Silahkan masukan email anda atau nomor telephone anda agar kami dapat menghubungi anda </p>
                </div>
                <div class="col-lg-6">
                    <form action="themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax form-inline" method="post" data-email="example@domain.com">
                        <div class="row" style="width: 100%">
                            <div class="col-lg-8">
                                <p>Type your email</p>
                                <input id="email2" name="email2" placeholder="" type="email" class="input-text" required>
                            </div>
                            <div class="col-lg-4">
                                <p></p>
                                <button class="btn btn-sm" type="submit">Subscribe</button>
                            </div>
                        </div>
                        <div class="form-checkbox">
                            <input type="checkbox" id="check2" name="check2" value="check" required>
                            <label for="check">You accept the terms of service and the privacy policy</label>
                        </div>
                        <div class="success-box">
                            <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                        </div>
                        <div class="error-box">
                            <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section id="pricing" class="section-base section-bottom-layer">
        <div class="container" data-anima="fade-bottom" data-time="1000">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Recruitment Type.</h2>
                    <p>Tentukan tipe rekrutmen anda. Pilihan fasilitas tidak bersifat wajib, sehingga masih dapat disesuaikan kembali sesuai kebutuhan. </p>
                    <hr class="space-sm" />
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Dedicated Team</a>
                            <div class="content">
                                <p>
                                    Menyediakan resource talent baik onsite / remote, Fulltime / partime, outsource / karyawan internal
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Head Hunter</a>
                            <div class="content">
                                <p>
                                    Menyediakan fasilitas pencarian talent untuk dijadikan karyawan internal
                                </p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Project Base</a>
                            <div class="content">
                                <p>
                                    Menyediakan fasilitas pencarian vendor untuk menjadi sub-contractor project anda tanpa perlu mengetahui komposisi tim
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <table class="table table-border table-price">
                        <thead>
                            <tr>
                                <th>Pilihan Fasilitas yang disediakan</th>
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
                                <td>Remote Worker</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-close"></i></td>
                                <td><i class="icon-close"></i></td>
                            </tr>
                            <tr>
                                <td>Onsite Worker</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
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
                                <td>Share Project Risk & Responsibilty</td>
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

    <section class="section-base section-color no-padding-bottom section-top-overflow">
        <div class="container">
            <div class="boxed-area">
                <div class="row">
                    <div class="col-lg-8">
                        <form action="https://templates.themekit.dev/codrop/themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax" method="post" data-email="example@domain.com">
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
                            <textarea id="messagge" name="messagge" class="input-textarea" placeholder="Write something ..." required></textarea>
                            
                            <button class="btn btn-sm btn-circle" type="submit">Send inquiry</button>
                            <div class="success-box">
                                <div class="alert alert-success">Congratulations. Your message has been sent successfully</div>
                            </div>
                            <div class="error-box">
                                <div class="alert alert-warning">Error, please retry. Your message has not been sent</div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 order-md-first">
                        <h2>
                            Request Quotation. <br />
                        </h2>
                        <hr class="space-sm" />
                        <ul class="text-list text-list-bold">
                            <li><b>Headquarter</b><p>Upscale Basecamp</p></li>
                            <li><b>Location</b><p>Yogyakarta, Indonesia</p></li>
                            <li><b>Phone</b><p>087888666531</p></li>
                            <li><b>Email</b><p>elvron.indonesia@gmail.com</p></li>
                        </ul>
                        <hr class="space-sm" />
                        <!-- <ul class="accordion-list">
                            <li>
                                <a href="#">Salary and holidays policy</a>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <a href="#">Assistence and support</a>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                        Utenim ad minim veniam quis nostrud exercitation ullamco laboris.
                                    </p>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>
            <hr class="space-lg visible-md" />
        </div>
    </section>

</main>

@endsection