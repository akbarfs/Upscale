<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@if ( isset($title) ) {{$title}} @else Upscale.id, Scaling Up your business with right talent @endif </title>
    <meta name="description" content="">
    <script src="{{url('template/upscale/themekit/scripts/jquery.min.js')}}"></script>
    <script src="{{url('template/upscale/themekit/scripts/main.js')}}"></script>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/style.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/css/tooltip.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/glide.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/content-box.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/contact-form.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/themekit/css/media-box.css')}}">
    <link rel="stylesheet" href="{{url('template/upscale/skin.css')}}">
    <link rel="icon" href="{{url('template/upscale/media/upscale.ico')}}">
    <!-- <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script> -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Start of HubSpot Embed Code -->
     <!--  <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/7727872.js"></script> -->
    <!-- End of HubSpot Embed Code -->

    @yield('top-asset')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167086272-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-167086272-1');
    </script>

    <!-- Hotjar Tracking Code for www.upscale.id -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:1817737,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

</head>
<body>


    @if ( isset($_GET['lang']) && $_GET['lang'] == 'en')
    
    <!--Start of Tawk.to Script - ENGLISH -->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ec74952c75cbf1769ee460a/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    @else
    
    <!-- widget indonesia -->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ebfe22d967ae56c521a60eb/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();

        //Example

        // Tawk_API.onLoad = function(){
        //     Tawk_API.maximize();
        // };

    </script>

    @endif
    <!--End of Tawk.to Script-->

    
    <style>

        <!-- widget date picker -->
        .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus, .ui-button:hover, .ui-button:focus 
        {
            background: #add2ec !important;
        }

        .modal { z-index: 100000000000 !important ; }


        .minht {min-height: 550px;}
        @media only screen and (max-width:1200px){
            .m { display: none !important }
        }

        @media only screen and (max-width:767px){
            .modal-body [class*=col-]:not([class*=col-sm]) + [class*=col-]:not([class*=col-sm]) {
                margin-top: 0 !important;
            }
            
        }

        @media only screen and (max-width:480px){
            .menu-right { float: left !important }
            .btn-border.light:not(:hover)
            { 
                color: rgb(71, 178, 228) !important ; 
                border-color: rgb(71, 178, 228) !important ; margin: 20px; 
            }
            .btn-login { margin-left: 0 !important; border-left: none !important }
            .minht { height: 100% }
            .lan-menu { margin-top: 0 !important; }
            .menu-right { margin-top: 0 !important; }
        }
    </style>

{{-- Modal Login --}}

<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login Dashboard</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <script>
            $(document).ready(function()
            {

                $("a").click(function()
                {
                    redirect =  $(this).data("redirect");
                    // if ( redirect != undefined)
                    // {
                    //     // action = $("#login-form").attr("action"); 
                    //     // action = action+"?redirect="+redirect;
                    //     // // $("#login-form").attr("action",action);
                    // }
                });

                $("#login-form").submit(function()
                {
                    $(".modal-body").animate({ scrollTop: 0 }, 500);
                    $(".info").html("loading...").show();

                    url = $(this).attr("action") ; 
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data)
                        {
                            if ( data.status )
                            {   
                                $(".info").removeClass("alert-warning").addClass("alert-success").html("berhasil login");
                                $('#login-form').trigger("reset");
                                //redirect halaman member
                                if ( data.level == 'talent')
                                {
                                    if ( redirect != undefined)
                                    {
                                        window.location.href = redirect ; 
                                    }
                                    else
                                    {
                                        // window.location.href = "{{url('talent/dashboard')}}";
                                        location.reload();
                                    }
                                    
                                }
                                else if ( data.level == 'client')
                                {
                                    window.location.href = "{{url('client/dashboard')}}";   
                                }
                            }
                            else
                            {
                                $(".info").removeClass("alert-success").addClass("alert-warning").html(data.message);
                            }
                        },
                        error: function(data){
                            
                            var data = $.parseJSON(data.responseText);
                            $(".info").removeClass("alert-success").addClass("alert-warning").html("");

                            $.each(data.errors, function(index, value) {
                               $.each(value, function(i, e) {
                                    $(".info").append(e+"<br>");
                               });
                            });

                        }
                    });


                    return false ;
                });
            });
        </script>
        <form action="{{url('login/member')}}" method="post" id="login-form">
            @csrf
            <div class="info alert alert-warning" style="display: none"></div>
              <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4"><label for="Name">email</label></div>
                            <div class="col-lg-8"><input type="text" name="email" class="form-control nameTest" id="email" placeholder="Type Your Name"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-4"><label for="Password">Password</label></div>
                            <div class="col-lg-8"><input type="password" name="password" class="form-control passwordTest" id="Password" placeholder="Type Your Password"></div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer" style="display: block;">
                <div class="row">
                    <div class="col-md-12" style="text-align: right; margin-top: 0">
                        <!-- <div class="menu-custom-area"> Already have account? <a class="CreateModal" data-target="#ModalRegister" data-toggle="modal">Create Here</a> </div> -->
                        <div style="margin-right: 20px;margin-bottom: 10px;float: left;">
                            Register as talent ? 
                            <a href="#" class="join_community" data-target="#registerTalent" data-toggle="modal" data-dismiss="modal">
                                Click
                            </a>
                        </div>
                        <button type="submit" class="btn btn-primary" id="login">Login</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
   </div>
  </div>
</div>



{{-- Modal register --}}
<div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLogin" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalRegister">Register Here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <script>
            $(document).ready(function()
            {
                $("#register-talent").submit(function()
                {
                    $(".modal-body").animate({ scrollTop: 0 }, 500);
                    $(".info").html("loading...").show();

                    url = $(this).attr("action") ; 
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(data)
                        {
                            if ( data.status )
                            {   
                                $(".info").removeClass("alert-warning").addClass("alert-success").html("berhasil mendaftar");
                                $('#register-talent').trigger("reset");
                            }
                        },
                        error: function(data){
                            
                            var data = $.parseJSON(data.responseText);
                            $(".info").removeClass("alert-success").addClass("alert-warning").html("");

                            $.each(data.errors, function(index, value) {
                               $.each(value, function(i, e) {
                                    $(".info").append(e+"<br>");
                               });
                            });

                        }
                    });


                    return false ;
                });
            });
        </script>
        
        <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Nama</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Username</label></div>
                    <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="username"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">Email address</label></div>
                    <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="Your Email"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Number">Phone Number</label></div>
                    <div class="col-md-8"><input type="number" name="phone_number" class="form-control" id="Number" placeholder=" 0888 xxx"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password">Password</label></div>
                    <div class="col-md-8"><input type="password" name="password" class="form-control" id="Password" placeholder="Your Password"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password2">Confirm Password</label></div>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Retype Your Password"></div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="select">You Are</label></div>
                    <div class="col-md-8">
                        <select class="custom-select" name="role" id="register-role">
                          <option> - select -</option>
                          <option  value="talent">Talent</option>
                          <!-- <option  value="client">Client</option> -->
                          <!-- <option  value="coworkspace">Cowork</option> -->
                        </select>
                    </div>
                </div>
            </div>
            

      </div>
      <div class="modal-footer">
        
          <div class="">
            <button type="submit" class="btn btn-primary">Register</button>
          </div>

        </form>
    </div>
  </div>
  </div>
</div>


    <div id="preloader"></div>
    

    <nav class="menu-classic menu-fixed menu-one-page align-right @yield('menu_class')" data-menu-anima="fade-bottom" data-scroll-detect="true">
        <div class="container">
            <div class="menu-brand" style="padding: 10px 0 ">
                <a href="{{url('/')}}">
                    
                    @if ( isset($logo) && $logo == 'transparent' )
                        <img class="logo-default" src="{{url('template/upscale/media/logo-transparent.png')}}" alt="logo" />
                    <img class="logo-retina" src="{{url('template/upscale/media/logo-transparent.png')}}" alt="logo" />
                    @else
                        <img class="logo-default" src="{{url('template/upscale/media/logo.jpg')}}" alt="logo" />
                        <img class="logo-retina" src="{{url('template/upscale/media/logo.jpg')}}" alt="logo" />
                    @endif
                </a>
            </div>
            <i class="menu-btn"></i>
            <div class="menu-cnt">
                <ul>
                    <li> <a href="{{url('').param()}}">Home</a></li>
                    <li> <a href="{{url('help-business').param()}}">For Business</a></li>
                    <li> <a href="{{url('help-talent').param()}}">For Talent</a></li>

                    @if ( isset($_GET['lang']) && $_GET['lang'] == 'id' || !isset($_GET['lang']))
                        <li class="m"> <a href="{{url('jobs')}}">Jobs</a></li>
                        <li class="m"> <a href="{{url('faq').param()}}">F.A.Q</a></li>
                    @endif
                    <!-- <li> <a href="https://api.whatsapp.com/send?phone=6287888666531&text=Hi Upscale">Contact Us</a></li> -->
                    <!-- <li class="dropdown">
                        <a href="{{url('/')}}">Service</a>
                        <ul>
                            <li><a href="{{url('/dedicated-team')}}">Dedicated Team</a></li>
                            <li><a href="{{url('/headhunter')}}">Head Hunter</a></li>
                            <li><a href="{{url('/dedicated-team')}}">Project Base</a></li>
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
                            <li><a href="{{url('/')}}#how">About Us</a></li>
                            <li><a href="{{url('/faq')}}#how">F.A.Q</a></li>
                            <li class="dropdown-submenu">
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
                            </li>
                        </ul>
                    </li>
                </ul> -->
                
        </ul>
            </li>
                </ul>
                {{-- menambahkan login link --}}
                <div class="menu-right">
                    
                    <ul class="lan-menu">
                        <li class="dropdown">
                            @if ( isset($_GET['lang']) && $_GET['lang'] == 'en')
                                <a href="{{Request::url()}}?lang=en"><img src="{{url('template/upscale/media/en.png')}}" alt="" />EN </a>
                            @else
                                <a href="{{Request::url()}}?lang=id"><img src="{{url('template/upscale/media/id.png')}}" alt="" />ID </a>
                            @endif

                            <ul>
                                <li><a href="{{Request::url()}}?lang=id"><img src="{{url('template/upscale/media/id.png')}}" alt="" />ID</a></li>
                                
                                <li><a href="{{Request::url()}}?lang=en"><img src="{{url('template/upscale/media/en.png')}}" alt="" />EN</a></li>
                                
                            </ul>
                        </li>
                    </ul>
                    <div class="menu-custom-area">

                        @if ( isset($_GET['lang']) && $_GET['lang'] == 'id' || !isset($_GET['lang']))
                            @if(!Session::has('login'))
                                <a class="btn btn-border btn-login btn-xs light" data-target="#ModalLogin" data-toggle="modal" onClick="$('.info').hide()" >Login</a>
                            @else
                                
                                <a class="btn btn-border btn-login btn-xs light" href="{{url('member/logout')}}">Logout</a>
                            @endif
                        @endif

                        <!-- <a class="btn btn-border btn-xs btn-circle start_project" data-toggle="modal" data-target=".startProject">Start Project</a> -->
                        <a class="btn btn-border btn-xs btn-circle light" href="#" 
                        target="_blank" onClick="Tawk_API.maximize();">Live Chat</a>

                    </div>
                </div>


                <div class="clear"></div>
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- <i class="scroll-top-btn scroll-top show"></i> -->
    <footer id="footer-bottom" class="footer light">
        <div class="container footerpadding">
            <div class="row">
                <div class="col-lg-6">
                    <h4>UpScale</h4>
                    <hr class="space-sm" />
                    <table class='table table-borderless table-sm light'>
                        <tr>
                            <td width='100'><b>Location</b></td>
                            <td>Jln. Ringroad Utara No 34 Maguwoharjo Yogyakarta, Indonesia</td>
                        </tr>
                        <tr>
                            <td><b>Phone</b></td>
                            <td>
                                <img src="{{url('template/upscale/media/id.png')}}"/> +62 87 888 666 531
                                &nbsp
                                <img src="{{url('template/upscale/media/en.png')}}"/> +61 3 9010 6067
                            </td>
                        </tr>
                        <tr>
                            <td><b>Email</b></td>
                            <td>sales@upscale.id</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-3">
                    <h4>For Talent</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="{{url('help-talent').param()}}">Why Join as Talent?</a>
                            </li>
                            <li> <a href="{{url('jobs').param()}}">Job Opportunities</a> </li>
                            <li> <a class="join_community" data-target="#registerTalent" data-toggle="modal" data-dismiss="modal">Register as Talent</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bar">
            <div class="container">
                <span>© UpScale 2020. Member of PT Talenta Sinergi Group</span>
                <span><img src="{{url('template/upscale/media/logo-transparent.png')}}" alt="" /></span>
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
        <script src="{{url('js/bootstrap.min.js')}}"></script>
    </footer>

    <!-- Modal Start Project-->
    <div class="modal fade startProject" id="startProject" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="question"></div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary mt-1">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function()
        {
            $(".startProject").click(function()
            {
                $('#question').load("{{url('/startproject')}}");
            });
        });
    </script>

    <!-- START REGISTER TALENT -->

    <style type="text/css"> .loading { padding: 20px; } </style>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".join_community").click(function() {
                $(".loadRegTalent").html("<div class='loading'>loading..</div>").load("{{url('register/talent')}}");
            }) ;

        }); 
    </script>

    <div class="modal fade" id="registerTalent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLogin" aria-hidden="true" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog modal-dialog-scrollable minht" role="document">
        <div class="modal-content loadRegTalent">
          
        </div>
      </div>
    </div>


    @yield("bottom-asset")
    @stack('scripts')
    
    
</body>

</html>
