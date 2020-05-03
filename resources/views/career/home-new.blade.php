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

			
			@forelse($jobs as $job)

				<hr>

	            <h3><a href="{{ url('jobs/'.$job->jobs_id) }}" target="_blank">{{ $job->jobs_title }}</a></h3>
	            <hr class="space-sm" />
	            <div class="row">
	                <div class="col-lg-9">
	                    <div class="row">
	                        <div class="col-lg-8">
	                            <p>
	                                {{ $job->jobs_desc_short }}
	                            </p>
	                        </div>
	                        <div class="col-lg-4">
	                            <ul class="icon-list icon-circle">
	                                <li @if($job->jobs_type_time == 'fulltime') class="full-time"
														@elseif($job->jobs_type_time == 'parttime') class="part-time"
														@elseif( $job->jobs_type_time == 'internship') class="enternship"
														@endif>{{ $job->jobs_type_time }}
													</li>
									<li>
										@php
													$joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
																					->join('joblo','joblo_jobs_id','jobs_id')
                                    												->join('location','location_id','joblo.joblo_location_id')
																					->select('location_name')
                                    												->first();

													@endphp
													
													{{ $joblo->location_name }}
									</li>
	                            </ul>
	                        </div>
	                    </div>
	                    <hr class="space space-40" />
	                    <table class="table table-grid table-border no-padding-y align-left table-full-sm">
	                        <tbody>
	                            <tr>
	                                <td>
	                                    <div class="icon-box icon-box-left">
	                                        <i class="lnr lnr-users"></i>
	                                        <div class="caption">
	                                            <h3 class="text-sm">Availability</h3>
	                                            <p>2 people</p>
	                                        </div>
	                                    </div>
	                                </td>
	                                <td>
	                                    <div class="icon-box icon-box-left">
	                                        <i class="lnr lnr-book"></i>
	                                        <div class="caption">
	                                            <h3 class="text-sm">Experience</h3>
	                                            <p>Min 2 years</p>
	                                        </div>
	                                    </div>
	                                </td>
	                                <td>
	                                    <div class="icon-box icon-box-left">
	                                        <i class="lnr-graduation-hat lnr"></i>
	                                        <div class="caption">
	                                            <h3 class="text-sm">Min. Graduation</h3>
	                                            <p>none</p>
	                                        </div>
	                                    </div>
	                                </td>
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>
	                <div class="col-lg-3">
	                    <a href="{{ url('jobs/'.$job->jobs_id) }}" target="_blank" class="btn btn-sm full-width btn-circle">Apply now</a>
	                    <hr class="space-xs" />
	                    <p class="text-xs">Make sure to have all the requirements before contacting us!</p>
	                </div>
	            </div>
				
			@empty
			<div class="alert alert-warning">
				<strong>Sorry!</strong> No Jobs Found. 
				<br><a href="{{route('index')}}">back</a>
				</div>
			@endforelse
            
            <hr style="margin-bottom: 20px">
			
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