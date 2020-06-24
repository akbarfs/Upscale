<!DOCTYPE html>
<html lang="en-US">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
    <link rel="stylesheet" type="text/css" href="{{ asset('/cv/bootstrap/css/bootstrap.min.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.carousel.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/owl.theme.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/font-awesome.min.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/magnific-popup.css') }}"  media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/style.css' )}}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('/cv/css/style.css' )}}" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('/cv/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/jquery.onepage-scroll.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/jquery.easing.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/jquery.backstretch.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/jquery.filterizr.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/bootstrap/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/cv/custom.js')}}"></script>
    <script type="text/javascript" src="{ {asset('/cv/smoothscroll.min.js')}}"></script>
	
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
		<img src="{{url('template/upscale/media/images.jpg')}}" alt="avatar">
        </div>
        
        <div class="name">
        @if($talent)
			<h1>{{ $talent->talent_name }}</h1>
            <span>{{ $talent->talent_focus}}</span>
            @endif
        </div>

        <div class="social-icons">
			<ul>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
			</ul>
        </div>
        
        <nav class="main-nav">
			<ul class="navigation">
				
				<li><a href="#about">About Me</a></li>
				<li><a href="#experience">Expereince</a></li>
				<li><a href="#education">Education</a></li>
				<li><a href="#works">Works</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
        </nav>

		<div class="copyright">
			<span>© Copyright 2020 UPSCALE.ID</span>
		</div>
    </header>

    <div class="main-content pull-right">
        <section id="about" class="about">
            <div class="section-header">
             <h2>About Me</h2>
                <a href="#" class="resume-download" data-toggle="tooltip" data-placement="bottom" title="Download">
                <i class="fa fa-download" aria-hidden="true"> </i>  Download Resume
                </a>
            </div>

            <div class="intro" id="about" >
                 @if($talent)
				<p>Hello, My name is {{ $talent->talent_name }}. Lorem ipsum dolor sit amet, usu sumo dicant vulputate in. Quando fabellas adipiscing nam an. An vis congue oporteat, no eros facer suavitate eos. An debet affert aliquid ius. Veritus placerat est ea, est ne nominavi suscipit maluisset.</p>
				<ul class="info">
					<li><strong>Birthday:</strong> {{ $talent->talent_birth_date }}</li>
					<li><strong>Location:</strong> {{ $talent->talent_place_of_birth }}</li>
					<li><strong>Email:</strong> {{ $talent->talent_email }}</li>
					<li><strong>Phone:</strong> {{ $talent->talent_phone }}</li>
                </ul>
            @endif
            </div>


            <div class="skills" >
				<div class="row">
                @foreach($talent->talent_skill()->get() as $row )
				<?php $skill = $row->skill()->first();
						$score = $row->st_score;
						$percent = round( $score )/5 * 100;
				?>
					<div class="col-md-6 col-sm-6 col-xs-12 item">
						<div class="skill-info clearfix">
							<h3 class="pull-left"> {{$skill->skill_name}}</h3>
							<span class="pull-right">{{$percent}} %</span>
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="{{$percent}}"
							aria-valuemin="0" aria-valuemax="100" style="width:{{$percent}}%">
							</div>
                        </div>
					</div>
                @endforeach
             </div>
        </section>
		
		<section id="experience" class="resume">
			<div class="section-header">
				<h2>Work Experience</h2>	
			</div>
			<div class="row" >
			@foreach($talent->talent_workex()->get() as $row )
						<div class="col-md-12 col-sm-12 col-xs-12" >
							<div class="top-item resume-item">
								<h2>{{ $row->workex_office }}</h2>
								<span>{{ $row->workex_position }} |  {{ $row->workex_startdate }} - {{ $row->workex_enddate }}</span>
								<p>{{ $row->workex_desc }}</p>
							</div>
						</div>
			@endforeach	
			</div>
		</section>

        <section id="education" class="resume">
			<div class="section-header">
				<h2>Education</h2>
			</div>
			
			<div class="row">
			@foreach($talent->talent_education()->get() as $row )
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="top-item resume-item">
						<h2>{{ $row->edu_name }}</h2>
						<span>{{ $row->edu_datestart }} - {{ $row->edu_dateend }} </span>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit maxime laborum sequi, magni earum quo soluta sint velit numquam, ipsum illum! Nostrum possimus illo architecto praesentium ut aliquam dolorem.</p>
					</div>
				</div>
			@endforeach	
			</div>
        </section>
		
        <section id="works" class="works clearfix">
			<div class="section-header">
				<h2>Portfolio</h2>
			</div>
			
            <div class="item-outer row clearfix">
				@foreach($talent->talent_portfolio()->get() as $row )
				<div class="col-md-4 col-sm-6 col-xs-12 filtr-item" >
					<div class="item">
						<a href="{{url('template/upscale/media/work1.jpg')}}"  class="work-image">
							<div class="title">
								<div class="inner">
									<h2>{{ $row->portfolio_name }}</h2>
									<span>View Details</span>
								</div>
							</div>
						</a>
						<div class="overlay"></div>
						<img src="{{url('template/upscale/media/work1.jpg')}}"  alt="portfolio">
					</div>
				</div>
				@endforeach	
        </section>

        <section id="contact" class="contact">	
			<div class="section-header">
				<h2>Get In Touch</h2>
            </div>
            <form method="post" action="">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your Name" required>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Your Email" required>
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<input type="text" class="form-control" name="InputPhone" id="InputPhone" placeholder="Phone (optional)">
						</div>
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="Subject">
						</div>
					</div>

					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
							<textarea name="InputMessage" id="InputMessage" class="form-control" rows="6" placeholder="Message" required></textarea>
						</div>
                    </div>
            </div>
                    <input type="submit" name="submit" id="submit" value="Send Message" class="btn btn-default pull-left">
                    </form>                  
</main>