@extends('admin.layout.apps')

@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance:unset !important;
    }
</style>

<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                @include('admin.layout.notification')
            </div>
        </div>

        <div class="content mt-3">
            <div class="row">
                <!-- <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('jobsapply')}}" class="card">
                                <div class="card-header">Fulltime </div>
                                <div class="card-body"> -->
                                    <!-- <div class="stat-widget-one"> -->
                                        <!-- <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div> -->
                                        <!-- <div class="stat-content dib"> -->
                                            <!-- <div class="stat-text">Unprocess</div>
                                            <div class="stat-digit">{{$fullU}}</div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->
                                <!-- </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('jobsapply')}}" class="card">
                                <div class="card-header">Parttime </div>
                                <div class="card-body"> -->
                                    <!-- <div class="stat-widget-one"> -->
                                        <!-- <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div> -->
                                        <!-- <div class="stat-content dib"> -->
                                            <!-- <div class="stat-text">Unprocess</div>
                                            <div class="stat-digit">{{$partU}}</div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->
                                <!-- </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('jobsapply')}}" class="card">
                                <div class="card-header">Internship</div>
                                <div class="card-body"> -->
                                    <!-- <div class="stat-widget-one"> -->
                                        <!-- <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div> -->
                                        <!-- <div class="stat-content dib"> -->
                                            <!-- <div class="stat-text">Unprocess</div>
                                            <div class="stat-digit">{{$intU}}</div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->
                                <!-- </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('index.jobs')}}" class="card">
                                <div class="card-header">Jobs</div>
                                <div class="card-body"> -->
                                    <!-- <div class="stat-widget-one"> -->
                                        <!-- <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div> -->
                                        <!-- <div class="stat-content dib"> -->
                                            <!-- <div class="stat-text">Active</div>
                                            <div class="stat-digit">{{$jobsA}}</div> -->
                                        <!-- </div> -->
                                    <!-- </div> -->
                                <!-- </div>
                            </a>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-2 col-md-6">
                    <div class="card">
                        <div class="card-header">Statistic Unprocess</div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Full</th>
                                        <th class="text-center">Part</th>
                                        <th class="text-center">Intern</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>{{$fullU}}</td>
                                        <td class='text-center'>{{$partU}}</td>
                                        <td class='text-center'>{{$intU}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="card">
                        <div class="card-header">Data Talent - {{$tsPersen}}%</div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Ada Skill</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>{{number_format($talent)}}</td>
                                        <td class='text-center'>{{number_format($talentSkill)}}</td>
                                    </tr>
                                    <tr><td class='text-center' colspan='2'>{{number_format($pra_talent_status)}}/{{number_format($pra_talent)}}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="card">
                        <div class="card-header">Stats Input -
                            @if ($inpApp==0 || $inpInt==0)

                            @else
                                {{round($inpApp/$inpInt*100, 2)}}%
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">Applier</th>
                                        <th class="text-center">Internal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class='text-center'>{{number_format($inpApp)}}</td>
                                        <td class='text-center'>{{number_format($inpInt)}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">Statistic Applier Per Tanggal</div>
                        <div class="card-body">
                            <!-- <div class="stat-widget-one"> -->
                                <!-- <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div> -->
                                <!-- <div class="stat-content dib"> -->
                                    <!-- <div class="stat-text">Active</div>
                                    <div class="stat-digit">{{$jobsA}}</div> -->
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                @foreach($tgl as $tanggal => $count)
                                                    <th class="text-center">{{$tanggal}}</th>
                                                @endforeach
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach($tgl as $tanggal => $count)
                                                    <td class='text-center'>{{$count}}</td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                <div class="card-header" data-toggle="collapse" href="#collapse1">
                        
                        <div class="card-tools d-flex">

                        <div><h5>Jobs Application Summary<h5></div>
                        <div class="ml-auto"><button type="button" class="btn btn-info btn-xs" style="text-align:right;" data-widget="collapse" data-toggle="collapse" title="Collapse">
                                  <i class="fa fa-minus change-icon1"></i></button></div>
                                
                        </div>
                    </div>
                    <div class="card-body fade show collapse" id="collapse1">
                    <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Job Title</th>
                                <th scope="col">Unprocess</th>
                                <th scope="col">Test Online</th>
                                <th scope="col">Interview</th>
                                <th scope="col">Offered</th>
                                <th scope="col">Hired</th>
                                <th scope="col">Rejected</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                    <tr>
                                        <td id='{{$job->jobs_id}}'>{{$job->jobs_title}}</td>
                                        <td class='count-table' id='unprocess-{{$job->jobs_id}}'></td>
                                        <td class='count-table' id='testonline-{{$job->jobs_id}}'></td>
                                        <td class='count-table' id='interview-{{$job->jobs_id}}'></td>
                                        <td class='count-table' id='offered-{{$job->jobs_id}}'></td>
                                        <td class='count-table' id='hired-{{$job->jobs_id}}'></td>
                                        <td class='count-table' id='rejected-{{$job->jobs_id}}'></td>
                                    </tr>
                                @endforeach
                              {{-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                              </tr> --}}
                            </tbody>
                          </table>
                    </div>
                </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-toggle="collapse" href="#collapse2">
                        <div class="card-tools d-flex">
                        <div><h5>Assign Application Summary</h5></div>
                        <div class="ml-auto"><button type="button" class="btn btn-info btn-xs" style="text-align:right;" data-widget="collapse" data-toggle="collapse" title="Collapse">
                                  <i class="fa fa-minus change-icon2"></i></button></div>
                        </div>
                    </div>
                    <div class="card-body fade show collapse" id="collapse2">
                  
                    <table class="table">
                            <thead class="thead-light">
                                <th scope="col">No</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Position</th>
                                <th scope="col"><center>Send RT</center></th>
                                <th scope="col"><center>Review RT</center></th>
                                <th scope="col"><center>TC User</center></th>
                                <th scope="col"><center>Interview User</center></th>
                                <th scope="col"><center>Offering</center></th>
                                <th scope="col"><center>Hired</center></th>
                                <!-- <th scope="col">Reject</th>
                                <th scope="col">Cancel</th> -->
                                <th scope="col">Total Assigned</th>
                            </thead>
                            @php 
                            $no=1; 
                            $rowid=0;
                            $rowspan=0;
                            @endphp
                            <tbody>
                                @foreach($requestcompany as $key => $a)
                                @php
                                    $rowid += 1;
                                    $total=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('request_status','=','active')
                                                                        ->count();

                                $countspan=DB::table('request')
                                        ->join('company','request_company_id','company_id')
                                        ->where('request_company_id','=',$a->request_company_id)
                                        ->where('request_status','=','active')
                                        ->count();
                                @endphp  
                                <tr>
                                    @if ($key == 0 || $rowspan == $rowid)
                                      @php
                                         $rowid = 0;
                                         $rowspan = $countspan;
                                      @endphp
                                    <td style="background-color:#F2F2F2;" rowspan="{{$rowspan}}">{{$no++}}</td>
                                   
                                    <td rowspan="{{$rowspan}}">{{$a->company_name}}</td>
                                    @endif
                                    
                                    <td style="background-color:#F2F2F2;">{{$a->request_posisi}} <span class="badge badge-info">{{$a->request_name}}</span></td>
                                    <td><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','send_rt')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>

                                    <td style="background-color:#F2F2F2;"><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','review_rt')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>

                                    <td><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','interviewing')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>
                                   
                                    <td style="background-color:#F2F2F2;"><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','report_interview')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>

                                    <td><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','offering')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>

                                    <td style="background-color:#F2F2F2;"><center>
                                    @php
                                    $rowposition=DB::table('assign_request')
                                                                        ->join('request','request.request_id','assign_request.request_id')
                                                                        ->join('company','company_id','=','request_company_id')
                                                                        ->join('talent','assign_request.talent_id','talent.talent_id')
                                                                        ->where('request.request_id','=',$a->request_id)
                                                                        ->where('request_company_id','=',$a->request_company_id)
                                                                        ->where('assign_status','=','hired')
                                                                        ->get();
                                    @endphp
                                    @foreach($rowposition as $row)
                                    <span class="badge badge-info">{{$row->talent_name}}</span><br>
                                    @endforeach
                                    </center></td>

                                   
                                    <td><center>{{$total}}</center></td>

                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
                    </div>
            </div>



            <!--/.col-->

{{--             <div>{!! $chart->container() !!}</div>
 --}}        </div> <!-- .content -->
@push('script')

<script>
$(document).ready(function(){
  $("#collapse1").on("hide.bs.collapse", function(){
    $(".change-icon1").removeClass('fa-plus');
    $(".change-icon1").addClass('fa-minus');
  });
  $("#collapse1").on("show.bs.collapse", function(){
    $(".change-icon1").removeClass('fa-minus');
    $(".change-icon1").addClass('fa-plus');
  });

  $("#collapse2").on("hide.bs.collapse", function(){
    $(".change-icon2").removeClass('fa-plus');
    $(".change-icon2").addClass('fa-minus');
  });
  $("#collapse2").on("show.bs.collapse", function(){
    $(".change-icon2").removeClass('fa-minus');
    $(".change-icon2").addClass('fa-plus');
  });

});
</script>

<script>
    var i = 1;
    var array = [];
    $(document).ready(function(){
        $('.count-table').each(function(){
            var id = $(this).attr('id');
            array.push(id);
        });
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('dashboard.count')}}",
            method: "POST",
            dataType: 'json',
            data :{array:array},
            success:function(response)
            {
                response.forEach(function (d) {
                    if (d.count==0) {
                        $('#'+d.id).append('<span style="color:#d9dcde;">'+d.count+'</span>');
                    }
                    else {
                        $('#'+d.id).append(d.count);
                    }
                });
            }
        });
    });

</script>

{{-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}

@endpush

@endsection
