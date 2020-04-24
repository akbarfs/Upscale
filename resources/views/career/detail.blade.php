@extends('layouts.hf')

@section('content')

    <section id="jobdetail" class="section" style="margin-top: 100px;">
        <div class="container">
            <img src="{{ asset('public/career/images/slide.png') }}" class="img-container">
            <div class="job-post-body">
                <div class="job-post-section job-post-section-summary">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 itemprop="title" class="job-post-title">{{ $job->jobs_title }}
                                <!---->
                            </h1>
                            <p style="color: #323232;font-size:14px;font-weight:500"><i class=" fa fa-suitcase"></i>
                                {{ $job->jobs_desc_short }}
                            </p>
                            <div>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span  class="text-white badge badge-loc">
                                        @php
										$joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
																					->join('joblo','joblo_jobs_id','jobs_id')
                                    												->join('location','location_id','joblo.joblo_location_id')
																					->select('location_name')
                                    												->first();

										@endphp
													
									{{ $joblo->location_name }}
                                        
                                        </span>
                                </span>
                                <span class="m-2"><span class="icon-clock-o mr-2"
                                        style="padding-left: 45px;"></span>
                                        <span class="text-white badge" style="margin-left:-30px" @if($job->jobs_type_time == 'fulltime') class="full-time"
														@elseif($job->jobs_type_time == 'parttime') class="part-time"
														@elseif( $job->jobs_type_time == 'internship') class="enternship"
														@endif>{{ $job->jobs_type_time }}
										</span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4-xs-12">
                            <div class="text-extra-small text-muted job-post-deadline">
                                <div>
                                    <b>Posted {{$date}}</b>
                                </div>
                                <!-- <div>
                                    <b>was hiring {{$job->jobs_created_date->format('d M y')}}</b>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-3">
                        </div>
                    </div>
                </div>
                @if($job->jobs_active == 'Y')
                <div class="btn-spaced-group">
                    <a href="{{ url('/apply/'.$job->jobs_id) }}" class="see-more-link" data-function="business">
                    <button type="button" class="btn btn-lg btn-primary">
                        Apply Now
                    </button>
                    </a>
                </div>
                @else
                @endif
            </div>
            <div class="job-post-body">
                <div class="container">
                @if($job->jobs_desc_right === null)
                    <div class="col-md-12">
                        {!!$job->jobs_desc_left!!}
                    </div>
                @else
                    <div class="col-md-6">
                        {!!$job->jobs_desc_left!!}
                    </div>
                    <div class="col-sm-6">
                        {!!$job->jobs_desc_right!!}
                    </div>
                @endif
                </div>
            </div>
        </div>
    </section>

@endsection