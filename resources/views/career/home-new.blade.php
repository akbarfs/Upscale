@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

	<style>
		h3 a:hover { text-decoration: none; }
		.wrap-apply { float: right; }

		.urgent {background: #ff9e9e; font-size: 14px; padding: 5px 10px; color: #fff; border-radius: 21px;}

		@media only screen and (max-width:990px){
        
	    }

	    @media only screen and (max-width:767px){
	        
	        
	    }

	    @media only screen and (max-width:480px){
	        .wrap-apply { float: none }
	    }

	    .reg:hover { color:#fff; }

	</style>

	<section class="section-base">
        <div class="container" style="padding-bottom: 0">
            
            <hr class="space-lg" />

            <h2 align="center">
                {{lang('Join Now and Build Your Career!','Join Now , choose your Expertise !')}}
            </h2>
            <p class="align-center width-650">
                {!!lang(
					'Join our exclusive networks and scale up your skill and career with UpScale. We will actively find your best-matched opportunities for you.',
					'Bergabung dengan eksklusif network kami. Kembangkan Karir, Skill & Network kamu bersama Upscale. Kami secara aktif akan mencarikan kamu peluang yang lebih baik'
				)!!}
            </p>
			
			<hr class="space-sm" />

            <ul class="text-list text-list-side boxed-area">
                
				@forelse($jobs as $job)
                <li style="display: block">
                    <h3 style="float: left;"><a href="{{ url('jobs/'.$job->jobs_id) }}" style="color:#12304A; margin-top: 3px;">{{ $job->jobs_title }}</a></h3>
                    <p style="float: left;">
						
						@php
							$joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
															->join('joblo','joblo_jobs_id','jobs_id')
	        												->join('location','location_id','joblo.joblo_location_id')
															->select('location_name')
	        												->first();
						@endphp

                        <!-- {{ $job->jobs_type_time }},  -->
                        @if ( isset($joblo->location_name) ) {{ $joblo->location_name }} - @endif

                        {{ $job->jobs_desc_short }}

                        @if ( $job->jobs_urgent =='urgent' ) <span class="urgent">Urgent</span> @endif

                    </p>
                    <!-- <div>Dublin, Ireland</div> -->
                    <div class="wrap-apply" >
                    	<a href="{{ url('lowongan-'.$job->jobs_id.'-'.str_replace(' ', '-', $job->jobs_title)) }}" target="_blank" class="btn btn-xs btn-circle reg" style="float: right ; margin-top: 5px">Join</a>
                    </div>
                    <div style="clear: both"></div>
                </li>
                @empty
					<div class="alert alert-warning">
						<strong>Sorry!</strong> No Jobs Found. 
						<br><a href="{{route('index')}}">back</a>
					</div>
				@endforelse
                
            </ul>
			
			<style>
				.pagination { margin:10px 0 50px 0; }
				.pagination .page-link { padding: 8px; }
			</style>

			<div align="center">
				
	            {{ $jobs->render() }} 
	            
	        </div> 

        </div>
    </section>

@endsection