@extends('layouts.apps')

@section('content')

        <section class="inner-header-title">
            <div class="container">
                <h1>Job Detail</h1>
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="detail-desc">
            <div class="container white-shadow">
                <div class="row  margin">
                    <div class="detail-status"><span>{{$date}}</span></div>
                </div>
                <div class="row bottom-mrg">
                    @if(!empty($job->jobs_image))
                    <div class="col-md-12 col-sm-12">
                        <center>
                            <img src="{{"data:image/;base64,".$job->jobs_image}}" style="height: auto; width: auto; margin: auto;">
                        </center>
                    </div>
                    @endif
                    <div class="col-md-12 col-sm-12">
                        <div class="detail-desc-caption">
                            <h2><strong>{{ $job->jobs_title }}</strong></h2>
                            <i class="fa fa-suitcase"></i>
                            <span class="designation">{{ $job->jobs_desc_short }}</span>

                            <p class="designation">{!!$job->jobs_desc_center!!}</p>
                        </div>
                    </div>
                </div>
                <div class="row no-padd">
                    <div class="row margin"></div>
                    <div class="row bottom-mrg">
                    @if($job->jobs_desc_right === null)
                        <div class="col-md-12 col-sm-12">
                            {!!$job->jobs_desc_left!!}
                        </div>
                    @else
                        <div class="col-md-6 col-sm-6 ">
                            {!!$job->jobs_desc_left!!}
                        </div>
                        <div class="col-md-6 col-sm-6">
                        
                            {!!$job->jobs_desc_right!!}
                        </div>
                    
                    @endif
                </div>
                </div>
                @if($job->jobs_active == 'Y')
                <div class="row no-padd">
                    <div class="detail pannel-footer">
                        <div class="col-md-5 col-sm-5">
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <div class="detail-pannel-footer-btn pull-right"><a href="{{ url('/apply/'.$job->jobs_id) }}" class="footer-btn grn-btn" title="">Quick Apply</a></div>
                        </div>
                    </div>
                </div>
                @else
                @endif
                
            </div>
        
        </section>

@endsection