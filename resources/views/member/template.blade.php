<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title> talent offer</title>
	
    <link rel="stylesheet" type="text/css" href="{{ asset('/cv/bootstrap/css/bootstrap.min.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.carousel.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.theme.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/font-awesome.min.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/magnific-popup.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/style.css' )}}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/normalize.min.css' )}}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/animate.min.css' )}}" media="all">


	<script type="text/javascript" src="{{ asset('/cv/js/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/jquery.onepage-scroll.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/jquery.filterizr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/js/custom.js')}}"></script>
	<script type="text/javascript" src="{{asset('/cv/js/smoothscroll.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/cv/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/cv/js/animatedModal.min.js')}}"></script>
	
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>


	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet" type="text/css">

   
                       

	<style>
	    @media only screen and (max-width:990px){
	    }
	    @media only screen and (max-width:767px){        
	    }
	    @media only screen and (max-width:480px){   
	    }

		#btn-close-modal {
                width:100%;
                text-align: right;
                cursor:pointer;
                color:#fff;
            }
	</style>

</head>   

<body>


<main class="wrapper">
    <header class="header pull-left">
    <div class="mobile-bar visible-sm visible-xs">
			<div class="hamburger-menu">
				  <div class="bar"></div>	
			</div>
		</div>
		
        <div class="avatar">
        	<a href="{{url('member/edit-basic-profile')}}">
	        	@if ( $talent->talent_foto)
	        	@php $random = date("his") @endphp
				<img src="{{url('storage/photo/'.$talent->talent_foto)}}?v={{$random}}" alt="avatar">
				@else
				<img src="{{url('img/images.jpg')}}" alt="avatar">
				@endif
			</a>
        </div>

        @php
        	if ( Request::segment(2) != '' )
        	{
				$name = explode(" ",$talent->talent_name) ; 
				if ( count($name) > 0 )
				{
					$panggilan = $name[0];
					$nama =  $name[0]." (".$talent->talent_id.")";
				}
				else
				{
					$panggilan = $name ; 
					$nama = " (".$talent->talent_id.")"; 
				}
			}
			else
			{
				$nama = $talent->talent_name;
			}
			
		@endphp
        
        <div class="name">
        @if($talent)
		

<?php
		$originalDate = $talent->talent_date_ready ;
		$hari=date('l', strtotime($originalDate));
		$bulan=date('F', strtotime($originalDate) );

		switch ($hari) {
			case"Sunday":$hari="Minggu";break;
			case"Monday":$hari="Senin";break;
			case"Tuesday":$hari="Selasa";break;
			case"Wednesday":$hari="Rabu";break;
			case"Thursday":$hari="Kamis";break;
			case"Friday":$hari="Jumat";break;
			case"Saturday":$hari="Sabtu";break;
		   }
		
		   switch($bulan){
			case"January":$bulan="Januari";break;
			case"February":$bulan="Februari";break;
			case"March":$bulan="Maret";break;
			case"April":$bulan="April";break;
			case"May":$bulan="Mei";break;
			case"June":$bulan="Juni";break;
			case"July":$bulan="Juli";break;
			case"August":$bulan="Agustus";break;
			case"September":$bulan="September";break;
			case"October":$bulan="Oktober"; break;
			case"November":$bulan="November";break;
			case"December":$bulan="Desember";break;
			
		}

		$tanggal=date('j');
		$tahun=date('Y');		
		
		$newDate =  "$hari, $tanggal $bulan $tahun"; 
		

		?>

		@php
        	if ( Request::segment(2) != '' )
        	{
				$name = explode(" ",$talent->talent_name) ; 
				if ( count($name) > 0 )
				{
					$nama = $name[0];
					// $nama =  $name[0]." (".$talent->talent_id.")";
				}
				else
				{
					$nama = $name ; 
				}
			}
			else
			{
				$nama = $talent->talent_name;
			}
			
		@endphp
		@if (Session::get('level') == 'user')
		<h1>
			{{ substr($nama, 0, 1) . preg_replace('/[^@]/', '*', substr($nama, 1)) }}
		</h1>
		@else
		<h1>{{$nama . " (" . $talent->talent_id . ")" }}</h1>
		@endif
            <span style="font-size: 12px">Ready kerja:<br> {{ $newDate }}</span>
			@endif
		</div>

		
        <!-- <div class="social-icons">
			<ul>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
			</ul>
        </div> -->
        
        <!-- klo segment 2 ada isinya -->
        @if ( Request::segment(1) == 'profile' )
	        <nav class="main-nav">
				<ul class="navigation">
					<li><a href="#about">About Me</a></li>
					<li><a href="#skill">Skills</a></li>
					<li><a href="#experience">Experience</a></li>
					<li><a href="#education">Education</a></li>
					<li><a href="#works">Portfolio</a></li>
				</ul>
	        </nav>
	    @elseif (Request::segment(1) == 'member' )
	    	<nav class="main-nav">
				<ul class="navigation">
					<li><a href="{{url('profile')}}#about">About Me</a></li>
					<li><a href="{{url('profile')}}#skill">Skills</a></li>
					<li><a href="{{url('profile')}}#experience">Experience</a></li>
					<li><a href="{{url('profile')}}#education">Education</a></li>
					<li><a href="{{url('profile')}}#works">Portfolio</a></li>
				</ul>
	        </nav>
        @endif

		<div class="copyright">
			<span>?? Copyright 2020 UPSCALE.ID</span>
		</div>
    </header>
    <style type="text/css">
    	.form-group label { padding: 15px; }
    </style>
    <div class="main-content pull-right">
    	<div class="main-content pull-right">
			@yield("content")
    	    	</div>
	</div>		 
								          
</main>
