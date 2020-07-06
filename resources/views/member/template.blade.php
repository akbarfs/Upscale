<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title> CV {{ $talent->talent_name }}</title>
	
    <link rel="stylesheet" type="text/css" href="{{ asset('/cv/bootstrap/css/bootstrap.min.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.carousel.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.theme.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/font-awesome.min.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/magnific-popup.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/style.css' )}}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/style.css' )}}" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet" type="text/css">

   
                       

	<style>
	    @media only screen and (max-width:990px){
	    }
	    @media only screen and (max-width:767px){        
	    }
	    @media only screen and (max-width:480px){   
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
        
        <div class="name">
        @if($talent)
		<?php setlocale(LC_ALL, 'IND');
		$originalDate = $talent->talent_date_ready ;
		$newDate =  strftime( "%A, %d %B %Y", $originalDate); ?>
			<h1>{{ $talent->talent_name }}</h1>
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
        
        <nav class="main-nav">
			<ul class="navigation">
				<li><a href="{{url('profile#about')}}">About Me</a></li>
				<li><a href="{{url('profile#skill')}}">Skills</a></li>
				<li><a href="{{url('profile#experience')}}">Experience</a></li>
				<li><a href="{{url('profile#education')}}">Education</a></li>
				<li><a href="{{url('profile#works')}}">Portfolio</a></li>
				<!-- <li><a href="{{url('profile#certification')}}">Certification</a></li> -->
				<!-- <li><a href="{{url('profile#certification')}}">History Work Apply</a></li> -->
				<!-- <li><a href="{{url('profile#history')}}">Contact</a></li>	 -->
			</ul>
        </nav>

		<div class="copyright">
			<span>© Copyright 2020 UPSCALE.ID</span>
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