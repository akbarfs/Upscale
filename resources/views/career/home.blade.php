@extends('layouts.hf')

@section('content')

    <header style="background-image: url('{{asset('career/images/slid.png')}}'); margin-top:80px"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<div class="container">
			<div class="slider-container">
				<div class="intro-text">
					<div class="intro-heading">Join With</div>
					<div class="intro-heading">Our Geek Team</div>
					<div class="intro-lead-in">Indonesia</div>
					<div class="intro-lead-in" style="font-style: italic; font-family: Josefin Sans; width: 320px; margin-top: -10px; color: gray;">Kami Membutuhkan
						Banyak Talent Untuk Posisi
						Beragam Di Tim Startup Maupun
						Project Corporate.</div>
					<div class="intro-lead-in" style="font-family: Arial; font-style: normal; font-weight: 500; font-size: 20px;line-height: 23px;">We Develop Your Passions</div>
				</div>
			</div>
		</div>
	</header>

	<!-- /.start Section trusted -->
	<section id="trusted">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Trusted By</h2>
					</div>
				</div>
			</div>
			<div class="row kotakback">
				<div class="col-lg-12 text-center" style="margin-top: 20px;">
					<div class="owl-carousel">
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/Dot.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/neo.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/sociabuzz.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/dattabot.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/logo_tnk.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/dataon.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/bigin.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/bimasakti.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/gorry.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/gradana.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/pt dian.png') }}" alt="partners"></div>
						</div>
						<div class="item">
							<div class="partner-logo"><img src="{{ asset('clients/wakuliner.png') }}" alt="partners"></div>
						</div>
						<!--<div class="item">-->
						<!--	<div class="partner-logo"><img src="{{ asset('clients/unggul.svg') }}" alt="partners"></div>-->
						<!--</div>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.end Section trusted -->

	<!-- /.start Section Jenis pelamar -->
	<section id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Jenis Pelamar</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="service-item first-service">
						<div class="icon"></div>
						<h4>Cari kerjaan segera?</h4>
						<p>Apply Segera Untuk Mengikuti Proses Hiring Kami. Jika Belum Lolos Akan Ditawarkan Jobs Yang
							Sesuai Keinginan (Skills, Location, Benefits, Team, Dll)</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="service-item second-service">
						<div class="icon"></div>
						<h4>Cari kerjaan saat kontrak habis nanti?</h4>
						<p>Minta Pada Kami Untuk Di Reminder Penawaran Kerja Sesuai Yang Diinginkan (Kami Yang Akan
							Melamarmu) Untuk Beberapa Bulan / Minggu Kedepan Sebelum Kontrak Kerjamu Habis</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="service-item third-service">
						<div class="icon"></div>
						<h4>Mau pindah kerja ke Jakarta / Jogja?</h4>
						<p>Cari Kerja Dekat Kampung Halaman Biar Bisa Pulang Setiap Hari / Setiap Minggu</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="service-item fourth-service">
						<div class="icon"></div>
						<h4>Mau diterima di perusahaan besar?</h4>
						<p>Kami Banyak Kerjasama Dengan Perusahaan Multinasional, Jika Lolos Akan Di Hired Menjadi
							Karyawan Tetap Karena Sudah Handle Project Nya Melalui Suit Career</p>
					</div>
				</div>
			</div>

			<!-- start card job -->
			<div class="row text-center" style="padding-top: 85px;">
				<div class="card-container">
					<div class="col-md-6">
						<div class="service-widget">
							<h4>Job Seeker</h4>
							<p>Explore lowongan kami dan APPLY agar bisa mengikuti proses hiring. Kami membutuhkan lebih
								dari 40 staff IT per bulan dan berbagai posisi</p>
							<a class="btn btn-hover color-9" href="{{ route('browse') }}">BROWSE JOB</a>
						</div><!-- end service -->
					</div><!-- end col -->
				</div>
				<div class="card-container">
					<div class="col-md-6" style="padding-left: 180px;">
						<div class="service-widget">
							<h4>Referral Program</h4>
							<p>Care pada teman yang sedang mencari kerja / teman mau move on pada kerjaan yang diimpikan
								baik tim, suasana kerja maupun kesejahteraan lainnya + dapat bonus Rp.500.000</p>
							<!-- <a class="btn btn-hover color-9" href="{{ route('referral') }}">DETAIL</a> -->
						</div>
						<!-- end service -->
					</div><!-- end col -->
				</div>
			</div><!-- end row -->
		</div>
		<!-- /.container -->
	</section>
	<!-- End card job -->


	<!-- /.start Section employ -->
	<section class="employsection">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Benefits Employee</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="row kotakemploy">
			<div class="container">
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 5.png') }}" alt="">

						<h4>Allownce & Health</h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 6.png') }}" alt="">

						<h4>Flexible Working Flows</h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 7.png') }}" alt="">

						<h4>Coffee, Snack, & Kitchen</h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 8.png') }}" alt="">

						<h4>Fun room & Wifi</h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 9.png') }}" alt="">

						<h4>Training & Skill Development</h4>
					</div>
				</div>
				<div class="col-md-2 col-sm-4">
					<div class="employitem">

						<img src="{{ asset('career/images/asset/asset 10.png') }}" alt="">

						<h4>Homey Office</h4>
					</div>
				</div>
			</div>

		</div>
	</section>



	<section id="discovery">
		<div class="container">
			<div class="row">
				<div class="text-center">
					<div class="section-title">
						<h2>List Career</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="discovery-content">
		<div class="container">
			<div class="list-discovery-content">
				<div class="list-search clearfix" style="margin-bottom: 18px;">
					<form method="get" action="{{ route('filter') }}">
						<div class="list-select">
							<div class="row">
								<div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
									<div class="select-wrap">
											<i class="list-search__icon"style="background-image: url('{{asset('career/images/asset/place-marker.png')}}');"></i>
											<select name="loc[]" multiple id="loc">
											@foreach($locations as $location)
												<option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
											@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
										<div class="select-wrap">
											<i class="list-search__icon"style="background-image: url('{{asset('/images/asset/document-search.png')}}');"></i>
											<select name="cat[]" multiple id="cat">
											@foreach($categories as $category)
												<option value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
											@endforeach	
											</select>
										</div>
									</div>
								
									<div class="list-search-vacancy">
										<i class="list-search__icon"style="background-image: url('{{asset('career/images/asset/fa-search.svg')}}');"></i>
											<input type="text" class="list-search__input" placeholder="Job Title, Position or Keyword" value="">
									</div>
									<div class="search-btn-wrapper">
										<button class="buttonjob color1">Search</button>
									</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			@forelse($jobs as $job)
			<a href="{{ url('detail/'.$job->jobs_id) }}" class="item-click">
				<article>
					<div class="row mb-3">
						<div class="col-md-12">
							<div class="brows-job-list">
								<div class="card-body">
									<div class="row text-left ">
										<div class="col-md-1 col-sm-2 small-padding">
											<div class="brows-job-company-img">
												<img src="{{asset('Suitcareer-logo-icon-small.png')}}"
													class="img-responsive" alt="">
											</div>
										</div>
										<div class="col-md-6 col-sm-5">
											<div class="brows-job-position">
												<h3 style="font-weight: 600;">{{ $job->jobs_title }}</h3>
												<p>
													<i class="fa fa-suitcase"></i>
													{{ $job->jobs_desc_short }}
												</p>
												<p>
													<i class="fa fa-clock"></i>
													<span @if($job->jobs_type_time == 'fulltime') class="full-time"
														@elseif($job->jobs_type_time == 'parttime') class="part-time"
														@elseif( $job->jobs_type_time == 'internship') class="enternship"
														@endif>{{ $job->jobs_type_time }}
													</span>
												</p>
											</div>
										</div>
										<div class="col-md-5 col-sm-5">
											<div class="brows-job-location">
												<p>
													<i class="fa fa-map-marker"></i> 
													@php
													$joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
																					->join('joblo','joblo_jobs_id','jobs_id')
                                    												->join('location','location_id','joblo.joblo_location_id')
																					->select('location_name')
                                    												->first();

													@endphp
													
													{{ $joblo->location_name }}
													<p id="days">posted {{$job->jobs_created_date->diffForHumans()}}</p>
												</p>
												<br>
												@if($job->jobs_active == 'Y')
												<span class="text-white badge">OPEN</span>
												@else
												<span class="text-white badge badge-off">CLOSED</span>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
								</article> 
							</a> 
							@empty
							<div class="alert alert-warning">
								<strong>Sorry!</strong> No Jobs Found. 
								<br><a href="{{route('index')}}">back</a>
								</div>
							@endforelse
							
						</div>
					</div>
				</article>
			</a>
			
			<div class="text-center wrap-line">
				<hr width="10px">
				<a href="{{ route('browse') }}" class="see-more-link" data-function="business">
					<button class="unf-btn unf-btn--small unf-btn--invert">
						<div class="textbtn">BROWSE MORE</div>
					</button>
				</a>
			</div>
		</div>
	</section>
	<!-- <section class="eventbootcamp-head">
			<div class="container">
				<div class="row">
					<div class="text-center">
						<div class="section-title">
							<h2>Event Bootcamp</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
	<section class="eventbootcamp">
			<div class="container">
				<div class="list-functionactive">
					<div class="row">
						<div class="list-function-divs clearfix">
							<div class="col-sm-6 col-md-4 col-xs-12 col-container">
									<div class="boot-div">
										<div class="boot-bg">
											<img src="{{ asset('career/images/boot.png') }}" style="margin: -20px;" width="352px">
											<span class="badge badge-pill badge-primary" style="margin:-300px 10px 10px 270px">FREE</span>
											<h4 class="list-div__h4">TechTalk #117 : Multichannel Customer Experience to Boost...</h4>
											<p class="boot-div__p">Sat, Sep 21, 9:30am</p>
											<p class="boot-div__p">BLOCK71 Yogyakarta, Kec. Gondokusuman, Jogja</p>
											<p class="boot-div__p">Free</p>
											<a style="float: right;" href="#" class="btn btn-primary btn-xs">DETAIL</a>
											<div class="list-div-desc clearfix">
												<div class="list-div-action">
												</div>
											</div>
										</div>
									</div>
							</div>
	
							<div class="col-sm-6 col-md-4 col-xs-12 col-container">
									<div class="boot-div">
										<div class="boot-bg">
											<img src="{{ asset('career/images/boot.png') }}" style="margin: -20px;" width="352px">
											<span class="badge badge-pill badge-primary" style="margin:-300px 10px 10px 270px">FREE</span>
											<h4 class="list-div__h4">TechTalk #117 : Multichannel Customer Experience to Boost...</h4>
											<p class="boot-div__p">Sat, Sep 21, 9:30am</p>
											<p class="boot-div__p">BLOCK71 Yogyakarta, Kec. Gondokusuman, Jogja</p>
											<p class="boot-div__p">Free</p>
											<a style="float: right;" href="#" class="btn btn-primary btn-xs">DETAIL</a>
											<div class="list-div-desc clearfix">
												<div class="list-div-action">
												</div>
											</div>
										</div>
									</div>
							</div>
	
							<div class="col-sm-6 col-md-4 col-xs-12 col-container">
									<div class="boot-div">
										<div class="boot-bg">
											<img src="{{ asset('career/images/boot.png') }}" style="margin: -20px;" width="352px">
											<span class="badge badge-pill badge-primary" style="margin:-300px 10px 10px 270px">FREE</span>
											<h4 class="list-div__h4">TechTalk #117 : Multichannel Customer Experience to Boost...</h4>
											<p class="boot-div__p">Sat, Sep 21, 9:30am</p>
											<p class="boot-div__p">BLOCK71 Yogyakarta, Kec. Gondokusuman, Jogja</p>
											<p class="boot-div__p">Free</p>
											<a style="float: right;" href="#" class="btn btn-primary btn-xs">DETAIL</a>
											<div class="list-div-desc clearfix">
												<div class="list-div-action">
												</div>
											</div>
										</div>
									</div>
							</div>
	
						</div>
					</div>
			</div>
	</section> -->
		
@endsection