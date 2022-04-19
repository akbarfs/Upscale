@extends('layouts.template')

@section('content')

<header class="header-image ken-burn-center light" data-parallax="true" data-natural-height="600" data-natural-width="1920" data-bleed="0" data-image-src="{{url('template/upscale/media/devc.jpg')}}" data-offset="0">
    <div class="container">
        <h1>About Our Community & Ecosystem</h1>
        <h2>Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua eprehenderite exercita.</h2>
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

        <section class="section-base section-bottom-layer">
            <div class="container">
                <hr class="space" />
                <div class="row">
                    <div class="col-lg-6">
                        <h1>Join Our Community</h1>
                        <p>
                            We’re fixing the internet’s apps showcase problem. So we have to find the right humans to make that happen.
                            If that’s you, awesome. Come join us on this increidible and long journey.
                        </p>
                        <a href="#" class="btn btn-border btn-circle btn-sm">See open jobs</a>
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
                <hr class="space" />
                <hr class="space-lg" />
                <div class="row">
                    <div class="col-lg-4">
                        <h2>
                            Share
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                            Utenim ad minim veniam quis nostrud exercitation ullamco laboris .
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>
                            Learn
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                            Utenim ad minim veniam quis nostrud exercitation ullamco laboris .
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h2>
                            Make Money
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                            Utenim ad minim veniam quis nostrud exercitation ullamco laboris .
                        </p>
                    </div>
                </div>
                <hr class="space-lg" />
                <h2 class="align-center">Our Network in many regional</h2>
                <p class="align-center width-650">
                    Lorem ipsum dolor sit amet no sea takimata sanctus est Lorem ipsum dolor sit amete
                    sare nostrud exercitation ullamco sea takiquis nostrud exercitatio.
                </p>
                <hr class="space" />
                <div class="row">
                    <div class="col-lg-9">
                        <img src="{{url('template/upscale/media/map.jpg')}}" alt="" />
                    </div>
                    <div class="col-lg-3">
                        <ul class="icon-list icon-circle align-right align-left-md">
                            <li>Jakarta, Indonesia</li>
                            <li>Bandung, Indonesia</li>
                            <li>Yogyakarta, Indonesia</li>
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
                <hr class="space-lg" />
                <h2>
                    Currently open roles.
                </h2>
                <hr class="space" />
                <ul class="text-list text-list-side boxed-area">
                    <li>
                        <h3>Software Engineer</h3>
                        <p>
                            Placeat orci commodo, amet quo rem architecto possimus, accumsa.
                        </p>
                        <div>Dublin, Ireland</div>
                    </li>
                    <li>
                        <h3>Community Manager</h3>
                        <p>
                            Placeat orci commodo, amet quo exercitation ullamco labori rem architecto possimus, accumsa.
                        </p>
                        <div>Dublin, Ireland</div>
                    </li>
                    <li>
                        <h3>Sales supervisor</h3>
                        <p>
                            Placeat orci commodo, amet quo rem architecto possimus exercitation ullamco accumsa.
                        </p>
                        <div>Dublin, Ireland</div>
                    </li>
                    <li>
                        <h3>React Developer</h3>
                        <p>
                            Placeat orci commodo, amet quo rem architecto possimus, accumsa.
                        </p>
                        <div>Dublin, Ireland</div>
                    </li>
                </ul>
                <hr class="space" />   <hr class="space-xs" />
                <h3>Financial department manager</h3>
                <hr class="space-sm" />
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-8">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                    Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <ul class="icon-list icon-circle">
                                    <li>Knowledge of blockchain</li>
                                    <li>Team communication</li>
                                    <li>Experience in Android apps</li>
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
                                                <p>1 people</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon-box icon-box-left">
                                            <i class="lnr lnr-book"></i>
                                            <div class="caption">
                                                <h3 class="text-sm">Experience</h3>
                                                <p>Min 5 years</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon-box icon-box-left">
                                            <i class="lnr-graduation-hat lnr"></i>
                                            <div class="caption">
                                                <h3 class="text-sm">Graduation</h3>
                                                <p>Required</p>
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
                <h3>Financial department manager</h3>
                <hr class="space-sm" />
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-8">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipiscing elitsed do eiusmod tempor incididunt utlabore et dolore magna aliqua.
                                    Utenim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <ul class="icon-list icon-circle">
                                    <li>Knowledge of blockchain</li>
                                    <li>Team communication</li>
                                    <li>Experience in Android apps</li>
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
                                                <p>1 people</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon-box icon-box-left">
                                            <i class="lnr lnr-book"></i>
                                            <div class="caption">
                                                <h3 class="text-sm">Experience</h3>
                                                <p>Min 5 years</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="icon-box icon-box-left">
                                            <i class="lnr-graduation-hat lnr"></i>
                                            <div class="caption">
                                                <h3 class="text-sm">Graduation</h3>
                                                <p>Required</p>
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