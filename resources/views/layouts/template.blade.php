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

    @yield('top-asset')

</head>
<body>
    
    <style>

        
        @media only screen and (max-width:990px){
        
        }

        @media only screen and (max-width:767px){
            [class*=col-]:not([class*=col-sm]) + [class*=col-]:not([class*=col-sm]) {
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
                                    window.location.href = "{{url('talent/dashboard')}}";
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
                    <div class="col-md-12" style="text-align: right;">
                        <!-- <div class="menu-custom-area"> Already have account? <a class="CreateModal" data-target="#ModalRegister" data-toggle="modal">Create Here</a> </div> -->
                        <div style="margin-right: 20px;margin-bottom: 10px;float: left;">Forget Password ? <a href="#">click</a></div>
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
                    <li> <a href="{{url('')}}">Home</a></li>
                    <li> <a href="{{url('help-business')}}">For Bussiness</a></li>
                    <li> <a href="{{url('help-talent')}}">For Talent</a></li>
                    <li> <a href="{{url('jobs')}}">Jobs</a></li>
                    <li> <a href="{{url('faq')}}">F.A.Q</a></li>
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
                    <div class="menu-custom-area">

                        @if(!Session::has('login'))
                            <a class="btn btn-border btn-login btn-xs light" data-target="#ModalLogin" data-toggle="modal" onClick="$('.info').hide()" >Login</a>
                        @else
                            <a class="btn btn-login btn-xs light" href="{{url('talent/dashboard')}}">Dashboard</a>
                            <a class="btn btn-border btn-login btn-xs light" href="{{url('member/logout')}}">Logout</a>
                        @endif
                        <!-- <a class="btn btn-border btn-xs btn-circle start_project" data-toggle="modal" data-target=".startProject">Start Project</a> -->
                        <a class="btn btn-border btn-xs btn-circle light" href="https://api.whatsapp.com/send?phone=6287888666531&text=Hi Upscale" target="_blank">Contact Us</a>

                    </div>
                </div>


                <div class="clear"></div>
            </div>
        </div>
    </nav>
    @yield('content')
    <i class="scroll-top-btn scroll-top show"></i>
    <footer id="footer-bottom" class="footer light">
        <div class="container" style="padding-top: 180px">
            <div class="row">
                <div class="col-lg-3">
                    <h4>Our Service</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="#">Dedicated Team</a>
                            </li>
                            <li>
                                <a href="#">Head Hunter</a>
                            </li>
                            <li>
                                <a href="#">Project base</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Who We Help</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <li>
                                <a href="{{url('help-business')}}">Bussiness</a>
                            </li>
                            <li>
                                <a href="{{url('help-talent')}}">Talent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Other</h4>
                    <div class="menu-inner menu-inner-vertical">
                        <ul>
                            <!-- <li> <a href="#">About Us</a> </li> -->
                            <li> <a href="{{url('faq')}}">F.A.Q</a> </li>
                            <li> <a href="#">Login / Register</a> </li>
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
                <span>© Upscale LTD 2020. </span>
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
      <div class="modal-dialog modal-dialog-scrollable" style="height: 100%" role="document">
        <div class="modal-content loadRegTalent">
          
        </div>
      </div>
    </div>


    @yield("bottom-asset")
    @stack('scripts')
    
    
</body>

</html>
