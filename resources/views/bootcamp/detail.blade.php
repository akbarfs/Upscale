@extends('layouts.apps')

@section('content')

        <section class="inner-header-title">
            <div class="container">
                <h1>Bootcamp Detail</h1>
            </div>
        </section>
        <div class="clearfix"></div>
        <section class="section">
            <div class="container">
                <div class="row .no-mrg">
                    <div class="col-md-8">
                        <article class="blog-news">
                            <div class="short-blog">
                                <figure class="img-holder"> <a href="#"><img src="{{"data:image/;base64,".$bootcamp->bootcamp_image}}" style="height: 500px; width: 1000px; margin: auto; " class="img-responsive"></a>
                                    <div class="blog-post-date">{{$bootcamp->bootcamp_created_date->format('d M, Y')}}</div>
                                </figure>
                                <div class="blog-content">
                                    <a href="{{ url('/bootcamp/'.$bootcamp->bootcamp_id) }}" class="item-click"">
                                        <h2>{{$bootcamp->bootcamp_title}}</h2>
                                    </a>
                                    <div class="blog-text">
                                        <p>{!!$bootcamp->bootcamp_desc!!}</p>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="blog-sidebar">
                            <form action="#">
                                <div class="search-form">
                                    <div class="input-group"> <input type="text" class="form-control" placeholder="Search…"><span class="input-group-btn"><button type="button" class="btn btn-default">Go</button></span></div>
                                </div>
                            </form>
                            <div class="sidebar-widget">
                                <h4>List Bootcamp</h4>
                                <ul class="sidebar-list">
                                    @foreach($bootcamps as $bootcamp)
                                    <li><a href="{{ url('/bootcamp/'.$bootcamp->bootcamp_id) }}" class="item-click"">{{$bootcamp->bootcamp_title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection