<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upscale.id, Scaling Up your business with right talent</title>
    <meta name="description" content="">
    <script src="{{url('template/upscale/themekit/scripts/jquery.min.js')}}"></script>
    <script src="{{url('template/upscale/themekit/scripts/main.js')}}"></script>
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/style.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/glide.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/content-box.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/contact-form.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/media-box.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/skin.css')}}">
    <link rel="icon" href="{{url('template/upscale/media/upscale.ico')}}">
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>
<body>
    <div id="preloader"></div>
    
    <?php $light_menu = array('ecosystem','dedicated-team','help-business','help-talent','index','home'); $request = $routeName = Route::currentRouteName();  ?>

    <nav class="menu-classic menu-transparent menu-fixed menu-one-page align-right 
                 @if ( in_array($request,$light_menu) ) light  @endif

                " data-menu-anima="fade-bottom" data-scroll-detect="true">
        <div class="container">
            <div class="menu-brand" style="padding: 10px 0 ">
                <a href="{{url('/')}}">
                    
                    @if ( in_array($routeName,$light_menu) )
                        <img class="logo-default" src="{{url('template/upscale/media/logo-white.png')}}" alt="logo" />
                    <img class="logo-retina" src="{{url('template/upscale/media/logo-white.png')}}" alt="logo" />
                    @else
                        <img class="logo-default" src="{{url('template/upscale/media/logo.jpg')}}" alt="logo" />
                        <img class="logo-retina" src="{{url('template/upscale/media/logo.jpg')}}" alt="logo" />
                    @endif
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li> <a href="{{url('')}}">Home</a></li>
                    <li class="dropdown">
                        <a href="{{url('/')}}">Service</a>
                        <ul>
                            <!-- <li class="dropdown-submenu">
                                <a href="{{url('/')}}">Extended Team</a>
                                <ul>
                                    <li><a href="#">Fulltime</a></li>
                                    <li><a href="#">Freelance</a></li>
                                </ul>
                            </li> -->
                            <li><a href="{{url('/dedicated-team')}}">Dedicated Team</a></li>
                            <li><a href="{{url('/dedicated-team')}}">Quick Project</a></li>
                            <li><a href="{{url('/dedicated-team')}}">Head Hunter</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{url('/')}}">Who We Help</a>
                        <ul>
                            <li><a href="{{url('/help-business')}}">Business</a></li>
                            <li><a href="{{url('/help-talent')}}">Talent</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('/ecosystem')}}">Ecosystem</a></li>
                    <li class="dropdown">
                        <a href="#">Other</a>
                        <ul>
                            <li><a href="{{url('/')}}#how">How We Work</a></li>
                            <li><a href="{{url('/')}}#how">F.A.Q</a></li>
                            <!-- <li class="dropdown-submenu">
                                <a href="#">Sites</a>
                                <ul>
                                    <li><a href="index-saas.html">Saas</a></li>
                                    <li><a href="index-fintech.html">Fintech</a></li>
                                    <li><a href="index-sport.html">Sport</a></li>
                                    <li><a href="index-food.html">Food</a></li>
                                    <li><a href="index-chat.html">Chat</a></li>
                                    <li><a href="index-music.html">Music</a></li>
                                    <li><a href="index-photo.html">Photo</a></li>
                                    <li><a href="index-travel.html">Travel</a></li>
                                    <li><a href="index-news.html">News</a></li>
                                    <li><a href="index-2.html">Intro</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="faq.html">Faqs</a></li>
                                    <li><a href="customers.html">Success stories</a></li>
                                    <li><a href="pricing-1.html">Pricing one</a></li>
                                    <li><a href="pricing-2.html">Pricing two</a></li>
                                    <li><a href="team.html">Team</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog-1.html">Blog one</a></li>
                                    <li><a href="blog-2.html">Blog two</a></li>
                                    <li><a href="post.html">Post</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#">Contacts</a>
                                <ul>
                                    <li><a href="contacts-1.html">Contacts one</a></li>
                                    <li><a href="contacts-2.html">Contacts two</a></li>
                                    <li><a href="contacts-3.html">Contacts three</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                </ul>
                

                <div class="menu-right">
                    <ul class="lan-menu">
                        <li class="dropdown">
                            <a href="#"><img src="{{url('template/upscale/media//en.png')}}" alt="" />EN </a>
                            <ul>
                                <li><a href="#"><img src="{{url('template/upscale/media/it.png')}}" alt="" />IT</a></li>
                                <li><a href="#"><img src="{{url('template/upscale/media/es.png')}}" alt="" />ES</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="menu-custom-area">
                        <a class="btn btn-border btn-login btn-xs" href="#">Login</a>
                        <a class="btn btn-border btn-xs btn-circle" href="#">Start Project</a>
                    </div>
                </div>


                <div class="clear"></div>
            </div>
        </div>
    </nav>
    @yield('content')
    <i class="scroll-top-btn scroll-top show"></i>
    <footer class="footer light">
        <div class="container" style="padding-top: 180px">
            <div class="row">
                <div class="col-lg-3">
                    <h4>Company and team</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Company details and team</a>
                            </li>
                            <li>
                                <a href="#">News and blog</a>
                            </li>
                            <li>
                                <a href="#">Press area</a>
                            </li>
                            <li>
                                <a href="#">Affiliates and marketing</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Help and support</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Help centre</a>
                            </li>
                            <li>
                                <a href="#">Feedbacks</a>
                            </li>
                            <li>
                                <a href="#">Request new features</a>
                            </li>
                            <li>
                                <a href="#">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Learn more</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Apps stores</a>
                            </li>
                            <li>
                                <a href="#">Partners</a>
                            </li>
                            <li>
                                <a href="#">Privacy and terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Follow us</h4>
                    <div class="icon-links icon-social icon-links-grid social-colors">
                        <a class="facebook"><i class="icon-facebook"></i></a>
                        <a class="twitter"><i class="icon-twitter"></i></a>
                        <a class="linkedin"><i class="icon-linkedin"></i></a>
                        <a class="youtube"><i class="icon-youtube"></i></a>
                        <a class="instagram"><i class="icon-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <span>© Codrop LTD 2019. Codrop is a powerful Landing Page App Template built with <a target="_blank" href="https://themekit.dev/code/">Themekit</a> by the <a target="_blank" href="https://schiocco.com/">Schiocco</a> Team. </span>
                <span><img src="{{url('template/upscale/media/logo-light.svg')}}" alt="" /></span>
            </div>
        </div>
        <link rel="stylesheet" href="{{url('template/upscale/themekit/media/icons/iconsmind/line-icons.min.css')}}">
        <script src="{{url('template/upscale/themekit/scripts/parallax.min.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/glide.min.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/magnific-popup.min.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/tab-accordion.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/imagesloaded.min.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/contact-form/contact-form.js')}}"></script>
        <script src="{{url('template/upscale/themekit/scripts/progress.js')}}"></script>
        <script src="{{url('template/upscale/media/custom.js')}}"></script>
    </footer>
</body>

</html>