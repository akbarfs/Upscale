@extends('layouts.template')

@section('content')

<main>
    <section class="section-base" style="padding-bottom: 100px">
        <div class="container">
            <div class="row align-items-center" data-anima="fade-in" data-time="1000">
                <div class="col-lg-6">
                    <hr class="space-lg" />
                    <h1 style="line-height: 52px">
                        <!-- Kemudahan rekrutment <br />ada di genggaman anda. -->
                        Hire Talent On-Demand<br>
                        <div style="font-size: 32px">Just focus on scaling your business, let us do the "Talent things".</div>
                    </h1>
                    <p>
                        <!-- Toptal is an exclusive network of the top freelance software developers, designers, finance experts, product managers, and project managers in the world. Top companies hire Toptal freelancers for their most important projects. -->

                        Hire dari exlusive network kami. Beranggotakan berbagai talent di bidang software developer, designer, finance, product manager, project manager dan lain-lain. Sesuaikan kebutuhan anda baik Fulltime, Head Hunter, Freelance atau Fix project.

                    </p>
                    <a data-toggle="modal" data-target=".startProject" class="btn btn-sm text-bold btn-circle shadow-1 full-width-sm start_project">Request Quotation</a><span class="space-sm"></span>
                    <a data-toggle="modal" data-target=".startProject" class="btn-text active hidden-sm start_project">Are You Talent ?</a>
                    <hr class="space-xs" />
                </div>
                <div class="col-lg-6">
                    <hr class="space" />
                    <img class="margin-23 margin-md-23" src="{{url('template/upscale/media/photo-1.png')}}" alt="" />
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="section-base section-color section-top-overflow">
        <div class="container" style="padding-top: 0">
            <div class="grid-list" data-columns="4" data-columns-md="2" data-columns-xs="1">
                <div class="grid-box">
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Fulltime</h2>
                                <p>
                                    Lorem ipsum dolor sitamet consecte.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Freelance</h2>
                                <p>
                                    Lorem ipsum dolor sitamet consecte.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Head Hunter</h2>
                                <p>
                                    Lorem ipsum dolor sitamet consecte.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="cnt-box cnt-box-top-icon boxed">
                            <div class="caption">
                                <h2>Fix Project</h2>
                                <p>
                                    Lorem ipsum dolor sitamet consecte.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="space-lg" />
            
        </div>
    </section>


    <section class="section-base section-color section-top-overflow">
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

    <section class="section-image light" style="background-image:url(template/upscale/media/bg.svg)">
        <div class="container">
            <div class="row" data-anima="fade-bottom" data-time="1000">
                <div class="col-lg-6">
                    <h2>Ingin mendapatkan quotation?</h2>
                    <p>
                        Silahkan masukan email anda atau nomor telephone anda agar kami dapat menghubungi anda
                    </p>
                </div>
                <div class="col-lg-6">
                    <form action="https://templates.themekit.dev/codrop/themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax form-inline" method="post" data-email="example@domain.com">
                        <div class="row">
                            <div class="col-lg-8">
                                <p>Type your email / phone number</p>
                                <input id="email" name="email" placeholder="" type="email" class="input-text" required>
                            </div>
                            <div class="col-lg-4">
                                <p></p>
                                <button class="btn btn-sm" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="form-checkbox">
                            <input type="checkbox" id="check" name="check" value="check" required>
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

    <section id="features" class="section-base section-color align-center section-bottom-layer-2">
        <div class="container">
            <h2 class="align-center" data-anima="fade-bottom" data-time="1000">Pastikan Remote Worker anda produktif.</h2>
            <p class="align-center width-650" data-anima="fade-bottom" data-time="1000">
                Dengan menggunakan aplikasi yang kami sediakan, anda dapat memonitor tingkat produktifitas talent secara realtime.
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
                    <h3>Jam mulai kerja</h3>
                    <p>
                        Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore fugiata nulla paria mesta.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Lama bekerja</h3>
                    <p>
                        Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore fugiata nulla paria mesta.
                    </p>
                </div>
                <div class="col-lg-4">
                    <h3>Tingkat produktifitas</h3>
                    <p>
                        Lorem ipsum dolor sitamet consectetur adipisicing elito sed do eiusmod tempore fugiata nulla paria mesta.
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
                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                        Utenim ad minim veniam quis nostrud exercit  aliquip d minim veniam quis nostrud exercit ex ea commodo consequata elitsed do eiusmo dolore.
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Order your food in less than </h3>
                            <div class="value text-lg">
                                <span data-to="90" data-speed="5000">90</span>
                                <span class="text-md">Seconds</span>
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
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                        Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
                        sare nostrudente exercitation ullamco sea takiquis nostrud exercitatio.
                    </p>
                    <hr class="space" />
                    <ul class="text-list text-list-image">
                        <li>
                            <img src="{{url('template/upscale/media/photo/square-1.png')}}" alt="" />
                            <div class="content">
                                <h3>Slow battery usage and high performance</h3>
                                <p>Placeat orci commodo, amet quo rem architecto possimus.</p>
                                <div></div>
                            </div>
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/photo/square-2.png')}}" alt="" />
                            <div class="content">
                                <h3>Snapchat style filters with a plus</h3>
                                <p>Placeat orci commodo, amet quo rem architecto possimuse arte.</p>
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
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-9.png')}}" alt="" />
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-4.png')}}" alt="" />
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-5.png')}}" alt="" />
                        </li>
                        <li>
                            <img src="{{url('template/upscale/media/phone-screen-6.png')}}" alt="" />
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
                    <h2>Sudah memilih talent ?<br />ok lets we execute your idea.</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                        Utenim ad minim veniam quis nostrud exercit  aliquip d minim veniam quis nostrud exercit ex ea commodo consequata elitsed do eiusmo dolore.
                    </p>
                    <hr class="space-sm" />
                    <div class="counter counter-horizontal counter-icon">
                        <div>
                            <h3>Order your food in less than </h3>
                            <div class="value text-lg">
                                <span data-to="90" data-speed="5000">90</span>
                                <span class="text-md">Seconds</span>
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
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="step-item">
                            <span>6</span>
                            <div class="content">
                                <h3>Deliver!</h3>
                                <div>
                                    <p>
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-image light ken-burn-center" data-parallax="scroll" data-image-src="{{url('template/upscale/media/hd-6.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Ingin mendapatkan quotation?</h2>
                    <hr class="space-xs" />
                    <p>Silahkan masukan email anda atau nomor telephone anda agar kami dapat menghubungi anda </p>
                </div>
                <div class="col-lg-6">
                    <form action="themekit/scripts/contact-form/contact-form.php" class="form-box form-ajax form-inline" method="post" data-email="example@domain.com">
                        <div class="row">
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
                    <h2>Get the most aggressive prices on the market.</h2>
                    <p>
                        Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsumo.
                    </p>
                    <hr class="space-sm" />
                    <ul class="accordion-list">
                        <li>
                            <a href="#">Refunds and money back policy</a>
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
                    </ul>
                </div>
                <div class="col-lg-8">
                    <table class="table table-border table-price">
                        <thead>
                            <tr>
                                <th>Features</th>
                                <th>Personal</th>
                                <th>Commercial</th>
                                <th>Enterprise</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Suggestions related to your interests</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Listen on all devices</td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Upload up to 50.000 songs</td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Radio based on sentiments and more</td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Switch to another song whenever you want</td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Music download and offline playing</td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check-gray"></i></td>
                                <td><i class="icon-check"></i></td>
                            </tr>
                            <tr>
                                <td>Price per month</td>
                                <td><b>$19</b></td>
                                <td><b>$39</b></td>
                                <td><b>$99</b></td>
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
                                <div class="col-lg-6">
                                    <input id="name" name="name" placeholder="Name" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <input id="surname" name="surname" placeholder="Surname" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-3">
                                    <input id="town" name="town" placeholder="Town" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-3">
                                    <input id="state" name="state" placeholder="State" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-3">
                                    <input id="address" name="address" placeholder="Address" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-3">
                                    <input id="zip" name="zip" placeholder="Zip Code" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <input id="phone" name="phone" placeholder="Phone" type="text" class="input-text" required>
                                </div>
                                <div class="col-lg-6">
                                    <input id="email" name="email" placeholder="Email" type="email" class="input-text" required>
                                </div>
                            </div>
                            <textarea id="messagge" name="messagge" class="input-textarea" placeholder="Write something ..." required></textarea>
                            <div class="form-checkbox">
                                <input type="checkbox" id="check" name="check" value="check" required>
                                <label for="check">You accept the terms of service and the privacy policy</label>
                            </div>
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
                            Apply for the job <br />before it is too late.
                        </h2>
                        <hr class="space-sm" />
                        <ul class="text-list text-list-bold">
                            <li><b>Headquarter</b><p>Millennium Tower</p></li>
                            <li><b>Location</b><p>Mountain View, California</p></li>
                            <li><b>Phone</b><p>+2 22255566</p></li>
                            <li><b>Email</b><p>info@business.com</p></li>
                        </ul>
                        <hr class="space-sm" />
                        <ul class="accordion-list">
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
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="space-lg visible-md" />
        </div>
    </section>

</main>

@endsection