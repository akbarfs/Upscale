@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

	<style>
		h3 a:hover { text-decoration: none; }
	</style>

	<section class="section-base">
        <div class="container" style="padding-bottom: 0">
            
            <hr class="space-lg" />

            <h2 align="center">
                Currently open roles urgently.
            </h2>
			
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

                        {{ $job->jobs_desc_short }}
                        <!-- {{ $job->jobs_type_time }}, {{ $joblo->location_name }} -->

                    </p>
                    <!-- <div>Dublin, Ireland</div> -->
                    <div style="float: right;">
                    	<a href="{{ url('jobs/'.$job->jobs_id) }}" target="_blank" class="btn btn-xs btn-circle" style="float: right ; margin-top: 5px">Apply now</a>
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