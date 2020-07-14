@extends('member.template')
@section("content")
		
		<style type="text/css">

				.popup-overlay {
				/*Hides pop-up when there is no "active" class*/
				visibility: hidden;
				position: absolute;
				background: #ffffff;
				border: 3px solid #666666;
				width: 50%;
				height: 50%;
				left: 25%;
				}

				.popup-overlay.active {
				/*displays pop-up when "active" class is present*/
				visibility: visible;
				text-align: center;
				}

				.popup-content {
				/*Hides pop-up content when there is no "active" class */
				visibility: hidden;
				}

				.popup-content.active {
				/*Shows pop-up content when "active" class is present */
				visibility: visible;
				}

			.biodata { vertical-align: top }
			.tombol ,.edit
			{ 
				text-decoration: none ; 
				display: block;
				float: right;
			    background: #379cf4;
			    font-family: 'Poppins', sans-serif;
			    font-size: 12px;
			    font-weight: 400;
			    color: #FFF;
			    padding: 5px 10px;
			    border-radius: 3px; 
			    margin: 0 5px;
			}

			.tombol:hover, .tombol:active, .tombol:visited{text-decoration: none; color: #fff}

			.list-benefit 
			{
				margin-top: 10px;
			}

			.b-container 
			{
			  display: -webkit-box;
			  display: -webkit-flex;
			  display: -ms-flexbox;
			  display: flex;
			  flex-wrap: wrap;
			  padding-top: 10px;
			}

			/*.b-container > [class*='col-'] {
			  display: flex;
			  flex-direction: column;
			}*/

			.list-benefit i { float: left; width: 25px ;margin-top:3px; }
			.benefit-desc {
				width: calc(100% - 25px);
				float: left;
				text-align: left;
			}
			.benefit-box
			{
				background: #2d4b7d;
			    border-radius: 10px;
			    padding: 10px;
			    margin-bottom: 10px;
			    height: 93%;
			}

			.b-container > [class*='col-'] {
			  padding: 0 5px;
			}

			.pricing-box
			{
				padding: 20px 10px; background: #45659d; color: #fff; border-radius: 10px; 
				margin: 0 -20px 10px -20px 
			}
			.section-header{margin-left: -15px;}



			#button-pricing {padding: 10px; cursor: pointer; background: #37517E; color: #fff ; text-align: center; border-radius: 10px; font-size: 25px}
			#button-pricing:hover { background: #379CF4 }

			.biodata td { padding: 5px 0 }
			@media (max-width: 768px) {
			    .call-cv .tombol{
			        float: left;
			        margin: 10px 10px 10px 0;
			    }
			    #button-pricing { font-size: 18px; }
			}

			.fa-whatsapp {
			stroke: black;
			stroke-width: 10;
			}
			
 }
		</style>

		<script type="text/javascript">
			$(document).ready(function()
			{
				$(".pricing-box").hide();
				$("#button-pricing").click(function()
				{
					$(this).hide();
					$(".pricing-box").show();
				});

				$("#close").click(function()
				{
					$(this).parent().hide();
					$("#button-pricing").show();
				});
			});

		</script>
		
        <section id="about" class="about">
            <div class="section-header">

            	<div class="col-md-4 col-sm-4 col-xs-12">
            		<h2>About Me</h2>
				</div>

				@if (Request::segment(2) == '') 
					<a class="edit" style="background: green" href="{{url('/member/edit-cv')}}">upload cv</a>
					<a class="edit" href="{{url('/member/edit-basic-profile')}}">edit</a>
				@else 

				<div class="col-md-8 col-sm-8 col-xs-12 call-cv" style="padding-right: 0">
					@if($talent->talent_cv_update)
						<a href="{{ url('storage/Curriculum vitae/'.$talent->talent_cv_update) }}" target="_blank" class="tombol" data-toggle="tooltip" data-placement="bottom" title="Download CV">
						 	<i class="fa fa-download" aria-hidden="true"></i> Download CV
						</a>
						<a href="https://api.whatsapp.com/send?phone=6287888666531&text=Request Interview untuk talent atas nama {{$talent->talent_name}}" target="_blank" class="tombol" style="background: green;">
							<i class="fa fa-phone" aria-hidden="true"></i> Request Interview
						</a>
					@endif

					
				</div>
				@endif

            </div>

            <div class="intro" id="about">
                 @if($talent)
					
					<p style="text-align: justify">
						Hi, perkenalkan nama saya <b>{{ $talent->talent_name }}</b>. Sebagai Talent <b>{{$talent->talent_focus}}</b>. {{$talent->talent_profile_desc}}
					</p>

					<hr>
					<div class="row biodata" style="padding-left:15px">
						<table class="col-md-6 col-sm-6 col-xs-12">
							<tr>
								<td width="40%"><strong>Nama</strong></td>
								<td><strong>:&nbsp</strong></td>
								<td>{{$talent->talent_name}}</td>
							</tr>
							<tr>
								<td><strong>Umur</strong></td>
								<td><strong>:</strong></td>
								<td>{{Carbon\Carbon::parse($talent->talent_birth_date)->age}} Tahun</td>
							</tr>
							<tr>
								<td><strong>Gender</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_gender }}</td>
							</tr>
							<tr>
								<td><strong>Birthday</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_birth_date }}</td>
							</tr>
							<tr>
								<td><strong>Birth Location</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_place_of_birth }}</td>
	                		</tr>
	                		<tr>
								<td><strong>Domisili</strong></td>
								<td><strong>:</strong></td>
								<td>{{$talent->talent_address}}</td>
							</tr>
							<tr>
								<td><strong>Phone</strong></td>
								<td><strong>: &nbsp</strong></td>
								<td> {{ $talent->talent_phone }} <a href="https://api.whatsapp.com/send?phone={{ $talent->talent_phone }}&text=halo" target="_blank"><i class="fa fa-whatsapp fa-lg"  style="color:green"  aria-hidden="true"></i></a></td>
	                		</tr>
						</table>
						
						<table class="col-md-6 col-sm-6 col-xs-12" >
							<tr>
								<td width="40%"><strong>Focus</strong></td>
								<td><strong>:&nbsp</strong></td>
								<td>{{$talent->talent_focus}}</td>
							</tr>
							<tr>
								<td><strong>Pengalaman</strong></td>
								<td><strong>:&nbsp</strong></td>
								<td>
									{{Carbon\Carbon::parse($talent->talent_start_career)->age}} Tahun
								</td>
							</tr>
	                		<tr>
								<td><strong>Onsite Jakarta</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_onsite_jakarta }}</td>
							</tr>
							<tr>
								<td><strong>Onsite Jogja</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_onsite_jogja }}</td>
							</tr>
							<tr>
								<td><strong>Prefer Location</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_prefered_city }}</td>
							</tr>
							<tr>
								<td><strong>Remote</strong></td>
								<td><strong>:</strong></td>
								<td>{{ $talent->talent_remote }}</td>
							</tr>
							<tr>
								<td width="40%"><strong>Email</strong></td>
								<td><strong>:</strong></td>
								<td>hrd@upscale.id</td>
							</tr>
						</table>
					</div>


	            @endif

	            @if (Request::segment(2) != '')
					
					<hr>

					<div id="button-pricing"> Pricing & Facilities, Click! </div>

					<div class="pricing-box" align="center"> 

						<a style="float: right; color: #fff; cursor: pointer; margin: -10px 10px 0 0;" id="close">x</a>


						<div style="margin-bottom: 10px; font-size: 18px">
							Pricing Talent a/n 
							<b style="text-transform: uppercase; ">{{$talent->talent_name}}</b>
						</div>
						
						<hr>
						<div>
							Penempatan Onsite Office Upscale Jogja : <br>
							@if ( $talent->talent_price_jogja)
								<b style="font-size: 18px">
									Rp. {{number_format($talent->talent_price_jogja)}},-
								</b>/bulan 
							@else
								<b style="font-size: 18px">Request</b>
							@endif
						</div>
						<!-- Dengan merekrut talent ini melalui upscale anda mendapatkan -->

						<div class="list-benefit">
							<div class="b-container">
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Talent dedicated fulltime, hanya fokus 	mengerjakan project anda
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk sewa space untuk tempat kerja
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk overhead seperti listrik, internet dll
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk monitoring produktifitas (HRD)
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk pendampingan senior konsultan IT  
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk pajak & kebutuhan legal lainya
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
							</div>
						</div>

						<hr>

						@if ( $talent->talent_price_jakarta )
						<div>
							Penempatan jakarta<br>
							<b style="font-size: 18px">	
								Rp. {{number_format($talent->talent_price_jakarta)}},-
							</b> /bulan
						</div>
						<div class="list-benefit">
							<div class="b-container">
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Talent dedicated fulltime, hanya fokus 	mengerjakan project anda
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk monitoring produktifitas (HRD)
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk pendampingan senior konsultan IT  
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Sudah termasuk pajak & kebutuhan legal lainya
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box" style="background: unset;">
										<i class="fa fa-close"></i>
										<div class="benefit-desc" style="color: #acbdda"> 
											Tidak ada biaya sewa office ke kami karena penempatan dikantor client
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box" style="background: unset;">
										<i class="fa fa-close"></i>
										<div class="benefit-desc" style="color: #acbdda"> 
											Tidak ada overhead seperti listrik, internet dll ke kami
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
							</div>
						</div>
						@endif 

						<hr>

						<div>
							Pricing Head Hunter 
							<b style="font-size: 18px">	
								Rp. {{number_format($talent->talent_hh_price)}},-
							</b> <br> hanya 1x bayar diawal 
						</div>

						<hr>

						<div>

							Penempatan lokasi lain , requirement dll ? 
							<br>Customize sesuai kebutuhan anda<br><br>
							
							<a class="btn btn-success" style="font-size: 20px; color: #fff" 
							target="_blank" href="https://api.whatsapp.com/send?phone=6287888666531&text=halo">
								<i class="fa fa-whatsapp" aria-hidden="true"></i>
								087-888-666-531
							</a>
						</div>

					</div>

				@endif


	            <hr>
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

            <div class="skills" id="skill">
				<div class="row" >

					<div class="section-header" style="margin: 20px 0 -20px 15px;">
			             <h2>Skills</h2>
			             @if (Request::segment(2) == '') 
			             <a class="edit" href="{{url('/member/edit-skill')}}">edit</a>
			             @endif
		            </div>

		            <div style="clear: both;"></div>

                	@foreach($talent->talent_skill()->orderBy('st_score','DESC')->get() as $row )
					<?php 
							$skill = $row->skill()->first();
							$score = $row->st_score;
							$percent = round( $score )/5 * 100;
					?>
					<div class="col-md-4 col-sm-4 col-xs-6 item " style="height: 100px; padding: 20px">
						<div class="skill-info clearfix">
							<h3 class="pull-left"> {{$skill->skill_name}}</h3>
							<span class="pull-right">{{($percent/10)}}</span>

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
			<div class="section-header" style="margin-left: 0">
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
			<div class="section-header" style="margin-left: 0">
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
		
		<section id="works" class="works clearfix">
			
			<div class="section-header" style="margin-left: 0">
				<h2>Portfolio</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-porto')}}">edit</a>
				@endif 
			</div>

			<div style="clear: both;"></div>
			
			<div class="item-outer row clearfix">
                @foreach($talent->talent_portfolio()->get() as $row )
				<div class="col-md-4 col-sm-6 col-xs-12 filtr-item"  data-sort="value">
					<div class="item popupimage" href="#animatedModal">
						<a href="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}" class="work-image portos" data-id="{{$row->portfolio_id}}">
							<div class="title">
								<div class="inner">
									<h2 >{{ $row->portfolio_name }}</h2>
									<span>{{ $row->portfolio_tech}}</span>
								</div>
							</div>
						</a>
						<div class="overlay"></div>
						@php $random = date("his") @endphp
						<img src="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}?v={{$random}}" alt="portfolio">
                    </div>
                </div>
                @endforeach
			</div>
			
			<div id="animatedModal">
				<div id="btn-close-modal" class="fa fa-close fa-2x close-animatedModal" style= "position: relative; right: 10px;" ></div>
				@foreach($talent->talent_portfolio()->get() as $row )
				<div class="modal-content single-porto porto-{{$row->portfolio_id}}" style="margin-bottom:10px; margin-left:10px; margin-right:10px; padding:5px">
					<div class="row" >
						<div class="col-md-7 col-sm-7">
							@php $random = date("his") @endphp	
							<img src="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}?v={{$random}}" alt="portfolio" style="width:100%" >
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<h2>{{ $row->portfolio_name }}</h2>
							<table>
								<tr>
									<td><strong>Technology Used</strong></td>
									<td><strong>:</strong></td>
									<td>{{ $row->portfolio_tech }}</td>
								</tr>
								<tr>
									<td><strong>Project Type</strong></td>
									<td><strong>:</strong></td>
									<td>{{ $row->portfolio_tipe_project }}</td>
								</tr>
								<tr>
									<td><strong>Company Name</strong></td>
									<td><strong>:</strong></td>
									<td>{{ $row->portfolio_namacompany }}</td>
								</tr>
								@if ( $row->portfolio_link)
								<tr>
									<td><strong>Link</strong></td>
									<td><strong>:</strong></td>
									<td>{{ $row->portfolio_link }}</td>
								</tr>
								@endif
							</table> <br>
							<span>{{ $row->portfolio_desc }}</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>

			<script>

					$(".popupimage").animatedModal({
						color:'#37517e'
					});


					$(".portos").click(function()
					{
						id = $(this).data("id");
						$(".single-porto").hide(); 
						$(".porto-"+id).show(); 
					});

								
			</script>


			
		
		</section>

@if ( $talent->talent_interviewtest()->count() > 0 )

			<!-- UNTUK NGECEK APAKAH UDAH ADA HASIL PENILAIAN PERSONALITY OLEH ADMIN -->
			@foreach($talent->talent_interviewtest()->get() as $row)
				@if ( $row->test_question->tq_ct_id == 8 )
					@php $personality = 'on' @endphp 
				@endif
			@endforeach 

			@if ( isset($personality) && $personality == 'on')

			<section id="about" class="about">
	            <div class="skills" id="assessment">
					<div class="row" >

						<div class="section-header" style="margin: 20px 0 -20px 15px;">
				             <h2>Personality</h2>
				             <!-- @if ( !$lock && Request::segment(2) == '') 
				             <a class="edit" href="{{url('/member/edit-skill')}}">Take a Test</a>
				             @endif -->
			            </div>

			            <div style="clear: both;"></div>

	                	@foreach($talent->talent_interviewtest()->get() as $row )

							@if ( $row->test_question->tq_ct_id == 8 )
								@if ( $soal = $row->test_question->pertanyaan )
									@php
										$nilai = ($row->it_answer>0) ? $row->it_answer : 0 ; 
										$percent = ($nilai/10)*100 ; 
									@endphp
									<div class="col-md-4 col-sm-4 col-xs-6 item " style="height: 100px; padding: 20px">
										<div class="skill-info clearfix">
											<h3 class="pull-left">{{$soal->question_text}}</h3>
											<span class="pull-right">{{ $nilai }}</span>

											@if( $nilai >0 )
												<br> <i class="fa fa-check" style="color: #379CF4"></i>
												<span style="font-size: 12px"> verified by Upscale 
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

								@endif
							@endif 

						@endforeach
					</div>
				</div>
			</section>
			@endif
			<!-- BOX PENILAIAN PERSONALITY END -->

			<!-- START HASIL PERSONALITY INTERVIEW  -->

			<!-- START HASIL BACKEND TEST  -->
			@foreach($talent->talent_interviewtest()->get() as $row)
				@if ( $row->test_question->tq_ct_id == 3 )
					@php $pengenalan_diri = 'on' @endphp 
				@endif
			@endforeach 

			@if ( isset($pengenalan_diri) && $pengenalan_diri == 'on')
			<section id="experience" class="resume">
				<div class="section-header" style="margin-left: 0">
					<h2>Pengenalan Diri Dasar</h2>
					@if ( !$lock && Request::segment(2) == '') 
						<a class="edit" href="{{url('/member/personality-test')}}">edit</a>
					@endif 
				</div>
				<div class="row" >
				@foreach($talent->talent_interviewtest()->where('it_answer','!=','')->where('it_answer','!=','-')->get() as $row )

					@if ( $row->test_question->tq_ct_id == 3 )
						
						<div class="col-md-12 col-sm-12 col-xs-12" style="border-top: solid 1px #e2e2e2; padding-top: 10px; margin-top: 10px; ">
							<div class="top-item resume-item">
								<span>Soal tentang : {{$row->test_question->katagori->ct_name}}</span>
								<h2>{{$row->test_question->pertanyaan->question_text}}</h2>
								<p><param>{!! $row->it_answer !!}</param></p>
							</div>
						</div>
						
					@endif

				@endforeach	
				</div>
			</section>
			@endif
			<!-- END BOX HASIL PERSONALITY INTERVIEW -->

			<!-- START HASIL skill TEST  -->



			@foreach ( $test as $cat )

				@if ( $cat->ct_id != 3 && $cat->ct_id != 8 )
				<section id="experience" class="resume">
					<div class="section-header" style="margin-left: 0">
						<h2>{{$cat->ct_name}}</h2>
						@if ( !$lock && Request::segment(2) == '') 
							<a class="edit" href="{{url('/member/skill-test/'.$cat->ct_id)}}">edit</a>
						@endif 
					</div>
					<div class="row" >

					@php 
					$result = $talent->talent_interviewtest()
							->where('it_answer','!=','')
							->where('it_answer','!=','-')
							->get()
					@endphp 

					@foreach( $result as $row )

						@if ( $row->test_question->tq_ct_id == $cat->ct_id )
							
							<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: solid 1px #e2e2e2; padding-bottom: 10px;margin-bottom: 10px; ">
								<div class="top-item resume-item">
									<span>Soal tentang : {{$row->test_question->katagori->ct_name}}</span>
									<h2>{{$row->test_question->pertanyaan->question_text}}</h2>
									<p><param>{!! $row->it_answer !!}</param></p>
								</div>
							</div>
							
						@endif

					@endforeach	
					</div>
				</section>
				@endif

			@endforeach 
			<!-- END BOX HASIL BACKEND TEST -->


		@else

			@if ( Request::segment(2) == '') 
				<div style="padding: 20px; text-align: center;">
					<a href="{{url('member/personality-test')}}" class="btn btn-success ; font-size: 20px">Klik disini untuk memulai pengenalan diri anda</a>
				</div>
			@endif

		@endif


		<section id="testimonials" class="testimonials">
			
			<div class="section-header">
				<h2>Testimonials</h2>
			</div>

				<div class="item">
					<div class="row">
						<div class="col-md-2 col-sm-2 col-sm-12 ">
							<div class="thumb">
							@if ( $talent->talent_foto)
							@php $random = date("his") @endphp
									<img src="{{url('storage/photo/'.$talent->talent_foto)}}?v={{$random}}" alt="testimonial-customer">
									@else
									<img src="{{url('img/images.jpg')}}" alt="testimonial-customer">
									@endif
							</div>
						</div>
						<div class="text col-md-10 col-sm-10 col-xs-12">
						<p style="text-align: justify">
						 {!! $talent->talent_notes_report_talent !!}</p>
							<span class="author">-{{ $talent->talent_name }}-</span>
						</div>
					</div>
			</div>
		</section>






	{{--	<section id="personality" class="works clearfix">
			
			<div class="section-header" style="margin-left: 0">
				<h2>Personality</h2> 
			</div>

			<div style="clear: both;"></div>
			
			
		</section>

		--}}






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
