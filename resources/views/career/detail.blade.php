@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')


<main>
    <section class="section-base">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3>{{ $job->jobs_title }}</h3>

                    @php
                    $joblo      = DB::table('jobs')->where('jobs_id','=',$job->jobs_id)
                                                                ->join('joblo','joblo_jobs_id','jobs_id')
                                                                ->join('location','location_id','joblo.joblo_location_id')
                                                                ->select('location_name')
                                                                ->first();

                    @endphp
                                
                    {{ $joblo->location_name }},
                            
                    {{ $job->jobs_type_time }},

                    <b>Posted {{$date}}</b><br>

                    {{ $job->jobs_desc_short }}

                    <hr class="space-sm">
                    
                    {!!$job->jobs_desc_center!!}
                    {!!$job->jobs_desc_left!!}
                    


                </div>
                <div class="col-lg-4">
                    <hr class="space visible-md" />
                    <div class="fixed-area" data-offset="80">
                        
                        {!!$job->jobs_desc_right!!}

                        @if($job->jobs_active == 'Y')
                        <div class="btn-spaced-group">
                            
                            @if ( Session::has("login"))
                            <a href="{{ url('jobs/apply/'.$job->jobs_id) }}" class="see-more-link" data-function="business">
                                <button type="button" class="btn btn-lg btn-primary">
                                    Apply Job
                                </button>
                            </a>
                            @else

                            <a class="see-more-link" data-target="#mustLogin" data-toggle="modal" data-dismiss="modal">
                                <button type="button" class="btn btn-lg btn-primary">
                                    Apply Job
                                </button>
                            </a>

                            @endif

                        </div>
                        @else
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>    

    <div class="modal fade" id="mustLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you have an account ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    
                    <style type="text/css">
                        .btn:hover { color: #fff }
                    </style>

                    <a href="#" class="btn join_community" data-target="#registerTalent" 
                    data-toggle="modal" data-dismiss="modal" data-redirect='{{url("jobs/apply/".$id)}}' data-action-apply="{{ $id }}">
                        Register & Apply Job
                    </a> 
                    
                    &nbsp

                    or 

                    &nbsp

                    <a class="btn login-apply" data-target="#ModalLogin" data-toggle="modal" 
                    style="color: #fff;margin: 0" data-dismiss="modal" 
                    data-redirect='{{url("jobs/apply/".$id)}}'>
                        Login & Apply Job
                    </a>
                    
                </div>

            </div>
        </div>
    </div>


</main>




<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection