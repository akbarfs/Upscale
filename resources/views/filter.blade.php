@extends('layouts.apps')

@section('content')

	<section class="inner-header-title"> 
        <div class="container"> 
          <h1>Browse Jobs
          </h1>
        </div>
      </section> 
      <div class="clearfix">
      </div>
      <section class="brows-job-category"> 
        <div class="container">
          <div class="row extra-mrg">
            <div class="search-opation"> 
              <form method="get" action="{{ route('filter') }}"> 
                    <div class="wrap-search-filter">
                      <div class="col-md-3 col-sm-6"> 
                        <select name="cat" class="selectpicker form-control" title="All Categories"> 
                            @foreach($categories as $category)
                            <option value="{{ $category->categories_id }}">{{ $category->categories_name }}
                            </option> 
                            @endforeach
                        </select> 
                      </div>
                      <div class="col-md-3 col-sm-6"> 
                          <select name="loc" class="selectpicker form-control" title="Location"> 
                                @foreach($locations as $location)
                                  <option value="{{ $location->location_id }}">{{ $location->location_name }}
                                  </option> 
                                @endforeach
                          </select> 
                      </div>
                      <div class="col-md-3 col-sm-6"> 
                          <select name="type" class="selectpicker form-control" id="job-type" title="Job Type">
                            <option value="fulltime">Fulltime</option>
                            <option id="internship" value="internship">Internship</option>
                            <option value="partime">Partime</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-sm-6">
                        <button type="submit" class="btn btn-primary">Filter</button>
                      </div>

                        {{-- <form method="get" action="{{ url('/search') }}">
                          <div class="col-md-3 col-sm-3"></div>
                            <div class="col-md-4 col-sm-4"> <input type="text" name="keyword" class="form-control" placeholder="Search"> </div>
                            <div class="col-md-3 col-sm-4"> 
                              <select class="selectpicker form-control" multiple title="All Categories"> 
                                  @foreach($categories as $category)
                                  <option value="{{ $category->categories_id }}">{{ $category->categories_name }}
                                  </option> 
                                  @endforeach
                              </select>  
                            </div>
                            <div class="col-md-3 col-sm-3"> 
                              <select name="location" class="selectpicker form-control" multiple title="Location"> 
                                @foreach($locations as $location)
                                  <option value="{{ $location->location_id }}">{{ $location->location_name }}
                                  </option> 
                                @endforeach
                            </select> </div>
                            <div class="col-md-2 col-sm-2"> <button type="submit" class="btn btn-primary">Search</button> </div>
                            <div class="col-md-3 col-sm-3"></div>
                        </form> --}}
                      </div>
                    </form>
                  </div>
                </div> 
          
          @forelse($jobs as $job)
          <a href="{{ url('detail/'.$job->jobs_id) }}" class="item-click"> 
            <article> 
              <div class="brows-job-list"> 
                <div class="col-md-1 col-sm-2 small-padding"> 
                  <div class="brows-job-company-img">
                    <img src="img/com-1.jpg" class="img-responsive" alt=""/>
                  </div>
                </div>
                <div class="col-md-6 col-sm-5"> 
                  <div class="brows-job-position"> 
                    <h3>{{ $job->jobs_title }}
                    </h3> 
                    <p>
                      <span>
                      </span>
                      <span class="brows-job-sallery">
                        <i class="fa fa-suitcase"></i>
                        {{ $job->jobs_desc_short }}
                      </span>
                    </p>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3"> 
                  <div class="brows-job-location"> 
                    <p>
                      <i class="fa fa-map-marker">
                      </i>{{ $job->joblo->location->location_name }}
                    </p>
                  </div>
                </div>
                <div class="col-md-2 col-sm-2"> 
                  <div class="brows-job-type">
                    <span @if($job->jobs_type_time == 'fulltime') class="full-time"
                          @elseif($job->jobs_type_time == 'parttime') class="part-time"
                          @elseif( $job->jobs_type_time == 'internship') class="enternship"
                          @endif>{{ $job->jobs_type_time }}
                    </span>
                  </div>
                </div>
              </div>
              @if($job->jobs_active == 'Y')
              <span class="tg-themetag tg-featuretag">Aktif
              </span>
              @else
              <span class="tg-themetagoff tg-featuretagoff">Non Aktif
              </span> 
              @endif
            </article> 
          </a> 
           @empty
          <div class="alert alert-warning">
              <strong>Sorry!</strong> No Jobs Found. 
              <br><a href="{{route('index')}}">back</a>
            </div>
          @endforelse
          <div class="row"> 
            <ul class="pagination">
            {{ $jobs->render() }} 
            </ul> 
          </div>
        </div>
      </section> 

@push('scripts')
<script type="text/javascript">
  

</script>

@endpush


@endsection