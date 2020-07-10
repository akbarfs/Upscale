@extends('member.template')
@section("content")

<section id="about" class="about">
            <div class="section-header">
             <h2>About Me</h2>
             
             @if (Request::segment(2) == '') 
             <a class="edit" href="{{url('/member/edit-basic-profile')}}">edit</a>
             @endif 

			 @if($talent->talent_cv_update)
			 	<a href="{{ url('storage/Curriculum vitae/'.$talent->talent_cv_update) }}" target="_blank" class="resume-download" data-toggle="tooltip" data-placement="bottom" title="Download">
				 <i class="fa fa-download" aria-hidden="true"> </i> Download Resume
				</a>
			@endif
            </div>

            <div class="intro" id="about">
                 @if($talent)
				<p>Hello, My name is {{ $talent->talent_name }}. Lorem ipsum dolor sit amet, usu sumo dicant vulputate in. Quando fabellas adipiscing nam an. An vis congue oporteat, no eros facer suavitate eos. An debet affert aliquid ius. Veritus placerat est ea, est ne nominavi suscipit maluisset.</p>
				<br>
				<div class="row" style="padding-left:15px">
					<table class="col-md-6 col-sm-6 col-xs-6">
						<tr>
							<td><strong>Birthday</strong></td>
							<td><strong>:</strong></td>
							<td>{{ $talent->talent_birth_date }}</td>
						</tr>
						<tr>
							<td><strong>Location</strong></td>
							<td><strong>:</strong></td>
							<td>{{ $talent->talent_place_of_birth }}</td>
                		</tr>
					</table>
				<div class="row"style="padding-left:15px">
					<table class="col-md-6 col-sm-6 col-xs-12" >
						<tr>
							<td><strong>Email</strong></td>
							<td><strong>:</strong></td>
							<td>{{ $talent->talent_email }}</td>
						</tr>
						<tr>
							<td><strong>Phone</strong></td>
							<td><strong>:</strong></td>
							<td> {{ $talent->talent_phone }} <a href="https://api.whatsapp.com/send?phone={{ $talent->talent_phone }}&text=halo" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></td>
                		</tr>
					</table>
				</div>
            @endif
			</div>
			
			
			<style type="text/css">
				.edit
				{
				    background: #bfbfbf;
				    padding: 2px 10px;
				    border-radius: 5px;
				    color: #fff;
				}
				.edit:hover { color: #fff ; }
			</style>

            <div class="skills">
				<div class="row" >

					<div class="section-header" style="margin: 40px 0 -20px 15px;">
			             <h2>Skills</h2>
			             @if (Request::segment(2) == '') 
			             <a class="edit" href="{{url('/member/edit-skill')}}">edit</a>
			             @endif
		            </div>


                	@foreach($talent->talent_skill()->get() as $row )
					<?php 
							$skill = $row->skill()->first();
							$score = $row->st_score;
							$percent = round( $score )/5 * 100;
					?>
					<div class="col-md-4 col-sm-4 col-xs-6 item " style="height: 100px; padding: 20px">
						<div class="skill-info clearfix">
							<h3 class="pull-left"> {{$skill->skill_name}}</h3>
							<span class="pull-right">{{$percent}} %</span>

							@if($row->st_skill_verified_date)
								<br> <i class="fa fa-check" style="color: #379CF4"></i>
								<span style="font-size: 12px"> verified by Upscale 
								<!-- {{ date("l, j F Y", strtotime($row->st_skill_verified_date)) }} -->
							</span>
							@else
								<br> 
								<i class="fa fa-check" style="color: #E0E0E0"></i> <span style="font-size: 12px"> on process</span>
							@endif
						</div>
						<div class="progress">
							<div class="progress-bar" role="progressbar" aria-valuenow="{{$percent}}"
							aria-valuemin="0" aria-valuemax="100" style="width:{{$percent}}%">
							</div>
                        </div>
					</div>
				@endforeach
				</div>
             </div>
        </section>

		<section id="experience" class="resume">
			<div class="section-header">
				<h2>Work Experience</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-work')}}">edit</a>
				@endif 
			</div>
			<div class="row" >
			@foreach($talent->talent_workex()->get() as $row )
						<div class="col-md-12 col-sm-12 col-xs-12" >
							<div class="top-item resume-item">
								<h2>{{ $row->workex_office }}</h2>
								<span>{{ $row->workex_position }} |  {{ $row->workex_startdate }} - {{ $row->workex_enddate }}</span>
								<p><param>{!! $row->workex_desc !!}</param></p>
								<p><param>{!! $row->workex_handle_project !!}</param></p>
							</div>
						</div>
			@endforeach	
			</div>
		</section>

		<section id="education" class="resume">
			<div class="section-header">
				<h2>Education</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-education')}}">edit</a>
				@endif
			</div>
			
			<div class="row">
			@foreach($talent->talent_education()->get() as $row )
                <div class="col-md-6 col-sm-6 col-xs-12">
					<div class="top-item resume-item">
						<h2>{{ $row->edu_name }}</h2>
						<h6>{{ $row->edu_level }}</h6>
						<span>{{ $row->edu_datestart }} - {{ $row->edu_dateend }} </span>
					</div>
				</div>
			@endforeach	
			</div>
        </section>

		<section id="experience" class="resume">
			<div class="section-header">
				<h2>Certification</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-certification')}}">edit</a>
				@endif 
			</div>
			<div class="row" >
			@foreach($talent->talent_certification()->get() as $row )
						<div class="col-md-12 col-sm-12 col-xs-12" >
							<div class="top-item resume-item">
								<h2>{{ $row->certif_name }}    |   No. {{$row->certif_number}}</h2>
								<span>{{$row->certif_company}} |  {{$row->certif_years}} - {{$row->certif_expired}}</span>
								<p><param>{!! $row->certif_desc !!}</param></p>
								<p><param></param></p>
							</div>
						</div>
			@endforeach	
			</div>
		</section>

		<section id="experience" class="resume">
			<div class="section-header">
				<h2>Interview</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-interview')}}">edit</a>
				@endif 
			</div>
			<div class="row" >
			@foreach($talent->talent_interviewtest()->get() as $row )
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="top-item resume-item">
					<h2>
						@if ( $soal = $row->interview_question()->first() )
							{{$soal->question_text}}<br>
							{{$soal->question_desc}}
						@endif
					
					</h2>
					<h6>{{ $row->it_answer }}</h6>
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
				<div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="1" data-sort="value">
					<div class="item">
						<a href="{{url('template/upscale/media/work1.jpg')}}" class="work-image">
							<div class="title">
								<div class="inner">
									<h2>{{ $row->portfolio_name }}</h2>
									<span>{{ $row->portfolio_tech}}s</span>
								</div>
							</div>
						</a>
						<div class="overlay"></div>
						<img src="{{url('template/upscale/media/work1.jpg')}}" alt="portfolio">
                    </div>
                    @endforeach
                </div>
		</section>

		<!-- <section id="certification" class="resume">
			<div class="section-header">
				<h2>Certification</h2>
			</div>
			
			<div class="row">
			@foreach($talent->talent_certification()->get() as $row )
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="top-item resume-item">
						<h2>{{ $row->certif_name }}</h2>
						<h6>{{ $row->certif_years }}</h6>
						<span>{{ $row->certif_company }} </span>
					</div>
				</div>
			@endforeach	
			</div>
        </section>

		<section id="history" class="resume">
			<div class="section-header">
				<h2>History Work Apply</h2>
			</div>
			
			<div class="row">
			@foreach($talent->talent_historyApply()->get() as $row )
                <div class="col-md-12 col-sm-12 col-xs-12">
					<div class="top-item resume-item">
						<h2>{{ $row->jobs_apply_name }}</h2>
						<h6>{{ $row->jobs_apply_type_time }}</h6>
						<span>{{ $row->jobs_apply_status }}</span>
					</div>
				</div>
			@endforeach	
			</div>
        </section> -->

		<!-- <section id="contact" class="contact">
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
		</section> -->

	
        
@endsection