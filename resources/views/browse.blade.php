@extends('layouts.hf')

@section('content')

    <!-- Page top section start -->
    <div class="page-top-area set-bg" style="background-image: url('{{asset('public/career/images/cool-background.png')}}');">
        <div class="breadcrumb-area">
            <div class="container">
                <div class="list-jumbotron-text">
                    <h1 class="list-jumbotron-text__h1">My Vacancy</h1>
                    <div class="green-line-small"></div>
                    <br>
                    <h2 class="list-jumbotron-text__h2"><i>Start finding your purpose with Suit Career. See our latest
                        vacancies below.</i></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page top section end -->

    <section class="discovery" style="margin-top: -110px;">
        <div class="container">
            <div class="list-discovery">
                <div class="list-search clearfix" style="margin-bottom: 18px;">
                    <form method="get" action="{{ route('filterbrowse') }}">
                        <div class="list-select">
                            <div class="row">
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="select-wrap">
                                        <i class="list-search__icon"style="background-image: url('{{asset('public/career/images/asset/place-marker.png')}}');"></i>
                                        <select name="loc[]" multiple id="loc">
											@foreach($locations as $location)
												<option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
											@endforeach
										</select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="select-wrap">
                                        <i class="list-search__icon"style="background-image: url('{{asset('public/career/images/asset/document-search.png')}}');"></i>
                                        <select name="cat[]" multiple id="cat">
											@foreach($categories as $category)
												<option value="{{ $category->categories_id }}">{{ $category->categories_name }}</option>
											@endforeach	
										</select>
                                    </div>
                                </div>
                                <div class="list-search-vacancy">
                                    <i class="list-search__icon"
                                        style="background-image: url('{{asset('public/career/images/asset/fa-search.svg')}}');"></i>
                                    <input type="text" class="list-search__input" placeholder="Job Title, Position or Keyword"
                                        value="">
                                    <!-- <input type="submit" class="visible-xs list-search__btn btn-tkpd btn-tkpd--large btn-tkpd--orange ripple-effect ripple-main" value="Search"/> -->
                                    <!-- <button class="visible-xs unf-btn unf-btn--no-shadow unf-btn--small unf-btn--transaction">Search<div class="text">Search</div></button> -->
                                </div>
                                <div class="search-btn-wrapper">
                                    <button class="buttonjob color1">Search</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    
    <section class="job-ye" style="padding-top: 0px">
    @forelse($jobs as $job)
        <div class="container">
            <div class="list-functionactive">
                <div class="row">
                    <div class="list-function-divs clearfix">
                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                            @if($job->jobs_active == 'Y')
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                            @else
                                <span class="badge badge-pill badge-off" style="margin-left:250px">Closed</span>
							@endif
                                <h4 class="list-div__h4">{{ $job->jobs_title }}</h4>
                                <p class="list-div__p">{{ $job->jobs_desc_short }}</p>
                                <span class="badge badge-pill badge-info">
                                    <span @if($job->jobs_type_time == 'fulltime') class="full-time"
										@elseif($job->jobs_type_time == 'parttime') class="part-time"
										@elseif( $job->jobs_type_time == 'internship') class="enternship"
										@endif>{{ $job->jobs_type_time }}
									</span>
                                </span>
                                <hr>
                                <p><i class="fa fa-briefcase" style="margin-right:5px;"></i>
                                @php
													$jobca     = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
																					->leftjoin('jobca','jobca_jobs_id','jobs_id')
                                    												->leftjoin('categories','categories_id','jobca.jobca_category_id')
																					->select('categories_name')
                                    												->first();

								@endphp
													
							    {{ $jobca->categories_name }}
                                </p>
                                <p><i class="fa fa-map-marker" style="margin-right:5px;"></i>
                                @php
													$joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
																					->leftjoin('joblo','joblo_jobs_id','jobs_id')
                                    												->leftjoin('location','location_id','joblo.joblo_location_id')
																					->select('location_name')
                                    												->first();

								@endphp
													
							    {{ $joblo->location_name }}
                                </p>
                                <p><i class="fa fa-clock" style="margin-right:5px;"></i>{{$job->jobs_created_date->format('d M y')}}</p>
                                <a href="{{ url('detail/'.$job->jobs_id) }}" class="item-click">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
							<div class="alert alert-warning">
								<strong>Sorry!</strong> No Jobs Found. 
								<br><a href="{{route('index')}}">back</a>
								</div>
						@endforelse

                        <!-- <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="list-function-divs clearfix">
                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row"style="margin-top: 20px;">
                    <div class="list-function-divs clearfix">
                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4 col-xs-12 col-container">
                            <div class="list-div">
                                <span class="badge badge-pill badge-primary" style="margin-left:250px">Open</span>
                                <h4 class="list-div__h4">Principal Product Design</h4>
                                <p class="list-div__p">Understand basic design process: research, ideation, user
                                    journey. Collaborate and give advise to UI Designers, UX Desig...</p>
                                <span class="badge badge-pill badge-info">Fulltime</span>
                                <hr>
                                <p><i class="fa fa-briefcase"></i> Product Design</p>
                                <p><i class="fa fa-map-marker"></i> Jakarta, Yogyakarta</p>
                                <p><i class="fa fa-clock"></i> 10 Januari 2009</p>
                                <a href="detail job.html">
                                    <h4 class="link-detail">See Detail</h4>
                                </a>
                                <div class="list-div-desc clearfix">
                                    <div class="list-div-action">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="row text-center"> 
            <hr>
            <ul class="pagination">
            {{ $jobs->render() }} 
            </ul> 
          </div>
        </div>
    </section>

@endsection