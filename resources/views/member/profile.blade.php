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

			td { 
					padding-right: 10px;
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

			.edit
			{
			    background: #bfbfbf;
			    padding: 2px 10px;
			    border-radius: 5px;
			    color: #fff;
			}
			.edit:hover { color: #fff ; }

			.in-header {
				margin-left: 0;padding: 20px;background: #e8f1ff;cursor: pointer;
				margin-bottom: 0 !important; 
			}

			.in-header:hover { background: #D1E0F0; }

			.answer 
			{
				margin-top: 20px;
			}

			table tr td { vertical-align: top; }

			@media (max-width: 768px) {
			    .call-cv .tombol{
			        float: left;
			        margin: 10px 10px 10px 0;
			    }
			    #button-pricing { font-size: 18px; }

			    .main-content section .section-header {
			    	margin-bottom: 0; 
			    }

			    .porto { margin-bottom: 20px !important; }
			}

			.fa-whatsapp {
			stroke: black;
			stroke-width: 10;
			}

			.note p { color: #fff }
			.note ul { margin-top: 10px; margin-left: 20px }
			
 			.judul { font-size: 20px; }
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

				$(".answer").hide(); 

				$(".in-header").click(function()
				{
					// $(".answer").hide();
					$(this).parent().find(".answer").toggle();
				});

			});

		</script>

		
		
        <section id="about" class="about">
            <div class="section-header">

            	<div class="col-md-4 col-sm-4 col-xs-12">
            		<h2>About</h2>
				</div>

				@if (Request::segment(2) == '') 
					<a class="edit" style="background: green" href="{{url('/member/edit-cv')}}">upload cv</a>
					<a class="edit" href="{{url('/member/edit-basic-profile')}}">edit</a>
				@else 

				<div class="col-md-8 col-sm-8 col-xs-12 call-cv" style="padding-right: 0">

					@if($talent->talent_cv_update &&  ( Request::segment(2) == '' ) )
						<a href="{{ url('storage/Curriculum Vitae/'.$talent->talent_cv_update) }}" target="_blank" class="tombol" data-toggle="tooltip" data-placement="bottom" title="Download CV">
						 	<i class="fa fa-download" aria-hidden="true"></i> Download CV
						</a>
					@endif
					
					<a href="https://api.whatsapp.com/send?phone=6287888666531&text=Request Interview untuk talent atas nama {{$talent->talent_name}}" target="_blank" class="tombol" style="background: green;">
						<i class="fa fa-phone" aria-hidden="true"></i> Request Interview
					</a>


					
				</div>
				@endif

            </div>

            <div class="intro" id="about">
                 @if($talent)

                 	@php
			        	if ( Request::segment(2) != '' )
			        	{
							$name = explode(" ",$talent->talent_name) ; 
							if ( count($name) > 0 )
							{
								$nama = $name[0];
								//$nama =  $name[0]." (".$talent->talent_id.")";
								$nama =  $name[0];
							}
							else
							{
								$nama = $name ; 
								$nama = " (".$talent->talent_id.")"; 
							}
						}
						else
						{
							$nama = $talent->talent_name;
						}
						
					@endphp
					
					<p style="text-align: justify">
						Hi, perkenalkan nama saya <b>{{ $nama }}</b>. Sebagai Talent <b>{{$talent->talent_focus}}</b>. {{$talent->talent_profile_desc}}
					</p>

					<hr>
					<div class="row biodata" style="padding-left:15px">
						<table class="col-md-6 col-sm-6 col-xs-12">
							<tr>
								<td width="40%"><strong>Nama</strong></td>
								<td><strong>:&nbsp</strong></td>
								<td style="font-weight: bold;">
									{{$nama}}
								</td>
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
								<td> 
									@if ( Request::segment(2) != '' )
										<a href="https://api.whatsapp.com/send?phone=6287888666531&text=Request Interview untuk talent atas nama {{$talent->talent_name}}" target="_blank" class="tombol" style="background: green; float: left">
											<i class="fa fa-whatsapp" aria-hidden="true"></i> &nbsp contact me
										</a>
									@else 
										{{ $talent->talent_phone }} 
									@endif
								</td>
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
									@php 

										if ( $talent->talent_start_career == NULL || $talent->talent_start_career == "0000-00-00")
										{
											echo "-";
										}
										else
										{
											$pengalaman = Carbon\Carbon::parse($talent->talent_start_career)->age ; 
											if ( $pengalaman == 0 )
											{
												echo "< 1 Tahun";
											}
											else
											{
												echo $pengalaman." Tahun" ; 
											}
										}
									@endphp 
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
								<td>
									@if ( Request::segment(2) != '')
										hrd@upscale.id
									@else
										@php $l = strlen($talent->talent_email) @endphp
										@if($l>22)
											<div style="font-size: 9px">
												{{$talent->talent_email}}
											</div>
										@else
											{{$talent->talent_email}}
										@endif
									@endif
								</td>
							</tr>
						</table>
					</div>


	            @endif

	            @if (Request::segment(2) != '')
					
					<hr>

					<div id="button-pricing"> Pricing & Benefit, Click! </div>

					<div class="pricing-box" style="display: none" align="center"> 

						<a style="float: right; color: #fff; cursor: pointer; margin: -10px 10px 0 0;" id="close">x</a>


						<div style="margin-bottom: 10px; font-size: 18px">
							Pricing Talent a/n 
							<b style="text-transform: uppercase; ">{{$nama}}</b>
						</div>

						<hr>

						@if ( $talent->talent_notes_report_talent )
							
							<div style="color: #fff; padding: 0 20px">
								<div style="text-align: justify; color:#fff !important" class="note">
									 {!! $talent->talent_notes_report_talent !!}
								</div>
							</div>
							<hr>
						@endif
						
						@if ( $talent->talent_price_jogja )
						<div>
							<b class="judul">OUTSOURCE</b><br>
							Penempatan di kantor kami (jogja) : <br>
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
											Status karyawan kami yang hanya fokus mengerjakan project anda
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
											Sudah termasuk gaji, pajak & kebutuhan legal lainya
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
							</div>
						</div>

						<hr>
						@endif

						@if ( $talent->talent_price_jakarta )
						<div>
							<b class="judul">OUTSOURCE</b><br>
							lokasi kerja di jakarta: <br>
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
											Status karyawan kami yang hanya fokus mengerjakan project anda
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
											Sudah termasuk gaji, pajak & kebutuhan legal lainya
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

						<hr>
						@endif 

						@if ( $talent->talent_price_bandung )
						<div>
							<b class="judul">OUTSOURCE</b><br>
							Lokasi kerja di Bandung: <br>
							<b style="font-size: 18px">	
								Rp. {{number_format($talent->talent_price_bandung)}},-
							</b> /bulan
						</div>
						<div class="list-benefit">
							<div class="b-container">
								<div class="col-md-4 col-sm-6">
									<div class="benefit-box">
										<i class="fa fa-check"></i>
										<div class="benefit-desc"> 
											Status karyawan kami yang hanya fokus mengerjakan project anda
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
											Sudah termasuk gaji, pajak & kebutuhan legal lainya
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

						<hr>
						@endif 

						
						@if ( isset($talent->talent_hh_price) )
						<div>

							<b class="judul">REKRUT SEBAGAI KARYAWAN ANDA</b><br>
							Biaya Head Hunter / Administrasi : <br>
								
							@if ( $talent->talent_hh_price == 0 )
								<b style="font-size: 25px">FREE</b>
							@else
								<b style="font-size: 18px">
									Rp. {{number_format($talent->talent_hh_price)}},-
									<br> hanya 1x bayar diawal
								</b>
							@endif
						</div>
						<hr>
						@endif

						<div>

							Order, lokasi kerjain lain , requirement dll ? 
							<br>Customize sesuai kebutuhan anda, hubungi :<br><br>
							
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

            <div class="skills" id="skill">
				<div class="row" >

					<div class="section-header" style="margin: 20px 0 -20px 15px;">
			             <h2>Skills</h2>
			             @if (Request::segment(2) == '') 
			             <a class="edit" href="{{url('/member/edit-skill')}}">edit</a>
			             @endif
		            </div>

		            <div style="clear: both;"></div>

                	@foreach($talent->talent_skill()->orderBy('st_skill_verified_date','DESC')->orderBy('st_score','DESC')->get() as $row )
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
									<span style="font-size: 12px"> verified  
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

    @if ( Request::segment(2) != '' && $talent->talent_certification()->count() ==  0  )

    @else
	<section id="experience" class="resume">
		<div class="section-header" style="margin-left: 0">
			<h2>Certification</h2>
			@if (Request::segment(2) == '') 
				<a class="edit" href="{{url('/member/edit-certification')}}">edit</a>
			@endif 
		</div>
		<div class="row" >
			@foreach($talent->talent_certification()->get() as $row )
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="top-item resume-item">
						<h2>
							{{ $row->certif_name }}    
							<!-- | No. {{$row->certif_number}} -->
						</h2>
						<span>{{$row->certif_company}} |  {{$row->certif_years}} - {{$row->certif_expired}}</span>
						<p><param>{!! $row->certif_desc !!}</param></p>
						<p><param></param></p>
					</div>
				</div>
			@endforeach	
		</div>
	</section>
	@endif

	<section id="works" class="works clearfix">
			<div class="section-header porto" style="margin-left: 0">
				<h2>Portfolio</h2>
				@if (Request::segment(2) == '') 
					<a class="edit" href="{{url('/member/edit-porto')}}">edit</a>
				@endif 
			</div>

			<div style="clear: both;"></div>
			
			<div class="item-outer row clearfix">
                @foreach($talent->talent_portfolio()->get() as $row )
				<div class="col-md-4 col-sm-6 col-xs-6 filtr-item" data-sort="value">
					<div class="item popupimage" href="#animatedModal">
						<a href="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}" class="work-image portos" data-id="{{$row->portfolio_id}}" > 
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
				@foreach($talent->talent_portfolio()->get() as $row )
				<div class="modal-content single-porto porto-{{$row->portfolio_id}}" style="margin:10px; padding:5px">
				<div id="btn-close-modal" class=" fa fa-close fa-lg close-animatedModal" style= "color:rgb(55, 81, 126)" ></div>
					<div class="row" style=" padding:30px 20px 20px 20px">
						<div class="col-md-6 col-sm-6">
							@php $random = date("his") @endphp	
							<img src="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}?v={{$random}}" alt="portfolio" style="width:100%; margin-top: -30px" >
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12" style="text-align: justify; margin-top: -10px; padding :10px 30px 0px 30px">
							<h2>{{ $row->portfolio_name }}</h2>
							<table >
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
												<span style="font-size: 12px"> verified 
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
			<section id="pengenalan_diri" class="resume">
				<div style="padding: 10px">hasil interview</div>
				<div class="section-header in-header" style="margin-left: 0">
					<h2>Pengenalan Diri</h2>
					@if ( !$lock && Request::segment(2) == '') 
						<a class="edit" href="{{url('/member/personality-test')}}">edit</a>
					@endif 
				</div>
				<div class="row answer">
				@foreach($talent->talent_interviewtest()->where('it_answer','!=','')->where('it_answer','!=','-')->get() as $row )

					@if ( $row->test_question->tq_ct_id == 3 )
						
						<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: solid 1px #e2e2e2; padding-bottom: 10px; margin-bottom: 10px; ">
							<div class="top-item">
								<span>Soal tentang : {{$row->test_question->katagori->ct_name}}</span>
								<h2 style="font-size: 16px; font-weight: bold">{{$row->test_question->pertanyaan->question_text}}</h2>
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

				<!-- nampilin selain personality interview & point -->
				@if ( $cat->ct_id != 3 && $cat->ct_id != 8 )

					@php 
						$count = DB::table('interview_test')
							->join('test_question','test_question.tq_id','=','interview_test.it_tq_id')
							->where('tq_ct_id','=',$cat->ct_id)
	                      	->where('tq_active','=','YES')
	                      	->where('it_talent_id','=',$talent->talent_id)
	                      	->groupBy('it_id')
	                      	->orderBy('tq_sort', 'asc')->count();
	                @endphp

	                @if ( $count > 0 )

					<section class="resume">
						<div style="padding: 10px">hasil interview skill</div>
						<div class="section-header in-header" style="margin-left: 0">
							<h2>{{$cat->ct_name}}</h2>
							@if ( !$lock && Request::segment(2) == '') 
								<a class="edit" href="{{url('/member/skill-test/'.$cat->ct_id)}}">edit</a>
							@endif 
						</div>
						<div class="row answer">

						@php 
						$result = $talent->talent_interviewtest()
								->where('it_answer','!=','')
								->where('it_answer','!=','-')
								->get()
						@endphp 

						@foreach( $result as $row )

							@if ( $row->test_question->tq_ct_id == $cat->ct_id )
								
								<div class="col-md-12 col-sm-12 col-xs-12" style="border-bottom: solid 1px #e2e2e2; padding-bottom: 10px;margin-bottom: 10px; ">
									<div class="top-item">
										<span>Soal tentang : {{$row->test_question->katagori->ct_name}}</span>
										<h2 style="font-size: 16px; font-weight: bold">
											{!! nl2br($row->test_question->pertanyaan->question_text) !!}
										</h2>
										<p><param>{!! $row->it_answer !!}</param></p>
									</div>
								</div>
								
							@endif

						@endforeach	
						</div>
					</section>
					@endif

				@endif

			@endforeach 
			<!-- END BOX HASIL BACKEND TEST -->


		@else

			@if ( Request::segment(2) == '') 
				<div style="padding: 20px; text-align: center;">
					<a href="{{url('member/personality-test')}}" class="btn btn-success" style="width: 100% ; font-size: 20px">Start Interview</a>
				</div>
			@endif

		@endif
		

		@if ( Request::segment(2) == '' && $talent->jobs_apply()->count() > 0 ) 
			<section id="experience" class="resume">
				<div class="section-header"  style="margin-left: 0">
					<h2>Job Apply History</h2>
				</div>
				<div class="row" >
					@foreach($talent->jobs_apply()->get() as $row )
						<div class="col-md-12 col-sm-12 col-xs-12" >
							<div class="top-item resume-item">
							
								<h2>
								@if ( $soal = $row->job()->first() )
									{{$soal->jobs_title}}<br>
								@endif
								</h2>
							
								<span> {{$row->created_date}} </span>
								<span>{{$row->jobs_apply_location}} </span>
								<h5>{{$row->jobs_apply_type_time}}</h5><br>
							</div>
						</div>
					@endforeach
				</div>
			</section>
		@endif

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
