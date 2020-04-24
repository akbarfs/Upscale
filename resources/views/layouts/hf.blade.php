<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index,follow"> 
    
    <meta property="og:site_name" content="Suit Career">
    <meta property="og:title" content="Suit Career" />
    <meta property="og:description" content="We develop your passions - Build Talent" />
    <meta property="og:image" itemprop="image" content="{{ asset('img/logo3.png') }}">
    <meta property="og:type" content="website" />

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="{{ asset('upscale.ico') }}">
	<title>Suit Career</title>
	<link href="{{ asset('career/css/bootstrap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('career/css/fontawesome.css') }}" />
	<link rel="stylesheet" href="{{ asset('career/css/fontawesome.min.css') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="{{ asset('career/css/owl.carousel.css') }}" rel="stylesheet">
	<link href="{{ asset('career/css/owl.theme.default.min.css') }}" rel="stylesheet">
	<link href="{{ asset('career/css/style.css') }}" rel="stylesheet">
	<script src="{{ asset('career/js/ie-emulation-modes-warning.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
	<link href="{{ asset('career/css/jquery.multiselect.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
</head>

<body id="page-top">
	<!-- Navigation -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="{{url('/')}}"><img src="{{ asset('upscale-logo-small.png') }}" alt="logo"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden">
						<a href="#page-top"></a>
					</li>
					<li>
						<a href="{{ route('homapply') }}" class="active">Home</a>
					</li>
					<!--<li>-->
					<!--	<a href="https://bootcamp.erpodev.com">Bootcamp</a>-->
					<!--</li>-->
					<!-- <li>
						<a class="page-scroll" href="#portfolio">Procedure</a>
					</li> -->
					<!--<li>-->
					<!--	<a href="{{ route('contact') }}">Contact</a>-->
					<!--</li>-->
					<!-- <li>
                        <a href="{{ route('reference') }}">Reference</a>
                    </li> -->
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	@yield('content')

    <footer class="footer">
            <div class="container">
                <div class="row" style="margin: 30px 0px 30px 0px">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4><b>REFERRAL PROGRAM</b></h4>
                            </div>
                            <p>Get IDR 500.000</p>
                            <p>Just Referral Your Friend To Join Us Until Hired.</p>
                            <p>We Will Give You The Notice And The Money After Ask Your Referral From Who</p>
                            <p>For More Information Please Contact HRD</p>
                        </div><!-- end clearfix -->
                    </div><!-- end col -->
    
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding-left: 100px;">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                <h4><b>ADDRESS</b></h4>
                            </div>
                            Jln Ngadinegaran Blok MJ III No. 144 RT/RW, Mantrijeron, Kota Yogyakarta, DI.Yogyakarta
                        </div><!-- end clearfix -->
                    </div><!-- end col -->
    
                    <div class="col-md-4 col-sm-4 col-xs-12" style="padding-left: 170px;">
                        <div class="widget clearfix">
                            <div class="widget-title">
                                    <h4><b>CONTACT</b></h4>
                            </div>
                            <ul class="footer-links">
                                <span class="fa fa-phone"></span>
                                <a href="https://api.whatsapp.com/send?phone=6285749487679" style="color: #fff;">
                                    085749487679</a> (Business)<br>
                                <span class=" fa fa-whatsapp"></span>
                                <a href="https://api.whatsapp.com/send?phone=6285712819290" style="color: #fff;">
                                    +62 857-1281-9290</a> (HRD)<br>
                                <span class=" fa fa-whatsapp"></span>
                                <a href="https://api.whatsapp.com/send?phone=6282136191057" style="color: #fff;">
                                    +62 821-3619-1057</a> (HRD2)<br>
                                <a class="fb" href="https://www.facebook.com/"><i class="fa fa-facebook-square fa-2x"></i></a>
                                <a class="tw" href="https://twitter.com/"><i class="fa fa-twitter-square fa-2x"></i></a>
                                <a class="pi" href="https://plus.google.com/"><i
                                            class="fa fa-google-plus-square fa-2x"></i></a>
                                <a class="dr" href="https://www.linkedin.com/"><i
                                            class="fa fa-linkedin-square fa-2x"></i></a>
                                
                            </ul><!-- end links -->
                        </div><!-- end clearfix -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer><!-- end footer -->
    
        <p id="back-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </p>
        <!-- <div class="nav-footer">
            <ul id="menu-main" class="nav navbar-nav">
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Erporate</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Term of Use</a></li>
                <li><a href="#">Site Map</a></li>
            </ul>
        </div> -->
        <div class="copyrights">
            <div class="col-md-12">
                <div class="footer-distributed">
                    <p style="color: white;">Copyright Suit Career (PT Talenta Sinergi Group) &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>. All Rights Reserved
                    </p>
                </div>
            </div><!-- end container -->
        </div><!-- end copyrights -->
	<!-- Bootstrap core JavaScript
			================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="{{ asset('career/js/jquery.selectric.min.js') }}"></script>
	<script src="{{ asset('career/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('career/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('career/js/cbpAnimatedHeader.js') }}"></script>
	<script src="{{ asset('career/js/theme-scripts.js') }}"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="{{ asset('career/js/ie10-viewport-bug-workaround.js') }}"></script>
	<script src="{{ asset('career/js/jquery.min.js') }}"></script>
    <script src="{{ asset('career/js/jquery.multiselect.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/momment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('#loc').multiselect({
            columns: 1,
            placeholder: 'All Locations'
		});
		$('#cat').multiselect({
            columns: 1,
            placeholder: 'Job Type'
        });
    </script>
    <script type="text/javascript">// <![CDATA[
        function ShowHide(divId)
        {
        if(document.getElementById(divId).style.display == 'none')
        {
        document.getElementById(divId).style.display='block';
        }
        else
        {
        document.getElementById(divId).style.display = 'none';
        }
        }
        // ]]></script>
        @stack('scripts')
</body>

</html>