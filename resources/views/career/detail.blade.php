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
                            <a href="{{ url('jobs/apply/'.$job->jobs_id) }}" class="see-more-link" data-function="business">
                            <button type="button" class="btn btn-lg btn-primary">
                                Join Now
                            </button>
                            </a>
                        </div>
                        @else
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>    
</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>

@endsection