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
    .nav-link {
        padding : 4px 14px !important;
    }




</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <h3>
  Talent
  <small class="text-muted" style="text-transform: capitalize;">{{$all->talent_name}}</small>
</h3>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="row">


    </div><!-- row -->



                <div class="col-md-2" >
                    <div class="row" >
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Menu</strong>
                                </div>
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                                        <a class="nav-link " id="v-pills-education-tab" data-toggle="pill" href="#v-pills-education" role="tab" aria-controls="v-pills-home" aria-selected="true">Education</a>
                                        <a class="nav-link" id="v-pills-cv-tab" data-toggle="pill" href="#v-pills-cv" role="tab" aria-controls="v-pills-profile" aria-selected="false">Curriculum Vitae</a>
                                        
                                        <a class="nav-link" id="v-pills-cv-tab" data-toggle="pill" href="#v-pills-porto" role="tab" aria-controls="v-pills-porto" aria-selected="false">Porto Pdf</a>
                                        
                                        <a class="nav-link" id="v-pills-cv2-tab" data-toggle="pill" href="#v-pills-cv2" role="tab" aria-controls="v-pills-profile" aria-selected="false">Curriculum Vitae2</a>

                                        
                                        
                                        <a class="nav-link" id="v-pills-portfolio-tab" data-toggle="pill" href="#v-pills-portfolio" role="tab" aria-controls="v-pills-profile" aria-selected="false">Portfolio</a>
                                        <a class="nav-link" id="v-pills-experience-tab" data-toggle="pill" href="#v-pills-experience" role="tab" aria-controls="v-pills-profile" aria-selected="false">Work Experience</a>
                                        <a class="nav-link " id="v-pills-certification-tab" data-toggle="pill" href="#v-pills-certification" role="tab" aria-controls="v-pills-home" aria-selected="true">Certification</a>
                                        <a class="nav-link" id="v-pills-apply-tab" data-toggle="pill" href="#v-pills-apply" role="tab" aria-controls="v-pills-profile" aria-selected="false">Apply</a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Skill</a>
                                        <a class="nav-link" id="v-pills-personality-tab" data-toggle="pill" href="#v-pills-personality" role="tab" aria-controls="v-pills-profile" aria-selected="false">Personality</a>
                                        <a class="nav-link" id="v-pills-interview-tab" data-toggle="pill" href="#v-pills-interview" role="tab" aria-controls="v-pills-profile" aria-selected="false">Interview</a>
                                        <a class="nav-link" id="v-date-ready-tab" data-toggle="pill" href="#v-pills-ready" role="tab" aria-controls="v-pills-profile" aria-selected="false">Date Ready</a>
                                        <a class="nav-link" id="v-pills-reportt-tab" data-toggle="pill" href="#v-pills-reportt" role="tab" aria-controls="v-pills-profile" aria-selected="false">Report Talent</a>
                                        <a class="nav-link" id="v-pills-talent-tab" data-toggle="pill" href="#v-pills-talent" role="tab" aria-controls="v-pills-profile" aria-selected="false">Assign</a>
                                        {{-- <a class="nav-link" id="report-interview" aria-selected="false"  href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="tab-content col-md-10 " id="v-pills-tabContent">
                <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                     <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <h3>
                                    <strong class="card-title mb-3">Profil</strong> <button type="button" class="btn btn-primary"> Profile last updated <span class="badge badge-light">{{ date("d-m-Y",strtotime($all->talent_created_date))  }}
                                    </span></button>
                                    <button type="button" class="btn btn-success"> Skill last updated <span class="badge badge-light">{{ $last_update_skill }}</span></button>
                                    <div class="nav nav-pills pull-right" >
                                    <a id="v-pills-edit-tab" data-toggle="pill" href="#v-pills-edit" data-idtalentnih="{{$all->talent_id}}" role="tab" aria-controls="v-pills-edit" aria-selected="false" id="v-pills-tab-edit" role="tablist" aria-orientation="vertical" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Edit</a>
                                    </div>
                                </h3>
                            </div>
                            <form style="padding-left: 20px; padding-top: 15px;">
                            <div class="row form-group">
                                <div class="avatar">
                                    <div class="col col-md-4">
                                    <a href="{{url('admin/detail-talent')}}">
                                    @if ($all->talent_foto)
                                    @php $random = date("his") @endphp
                                    <img src="{{url('storage/photo/'.$talent->talent_foto)}}?v={{$random}}" alt="avatar">
                                    @else
                                    <img src="{{url('img/images.jpg')}}" alt="avatar">
                                        <label class=" form-control-label">  </label>
                                    @endif
                                    </div>
                                    <div class="col-12 col-md-8">

                                      <p class="form-control-static"  style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$all->talent_foto}}</strong></p>
                                    
                                    </div>
                                </div>
                            </div>


                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static"  style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{ucwords($all->talent_name)}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Gender</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static"style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$all->talent_gender}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Place of birth, Birthdate</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong id='ttl'>{{ucwords($all->talent_place_of_birth)}}, {{$all->talent_birth_date}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Phone</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_phone}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_email}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Address</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{ucwords($all->talent_address)}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Current Address</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{ucwords($all->talent_current_address)}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Repository link</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_portfolio}}</strong></p>
                                    </div>
                                </div>

                                  <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Expected Salary</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                @if(is_numeric($all->talent_salary)) Rp. {{number_format($all->talent_salary)}}
                                                @else {{$all->talent_salary}}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Recomendation Salary</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                @if(is_numeric($all->talent_rec_salary)) Rp. {{number_format($all->talent_rec_salary)}}
                                                @else {{$all->talent_rec_salary}}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label"> Focus</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_focus}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label"> Start Career</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_start_career}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label"> status</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                           
                                                {{$all->talent_available}} ,
                                                {{$all->talent_status}} ,
                                            
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Date ready</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            {{$all->talent_date_ready}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label"> Level</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_level}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Prefered location</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_prefered_location}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Prefered City</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="talent_prefered_city" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_prefered_city}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">onsite jakarta</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_onsite_jakarta}}, {{number_format($all->talent_salary_jakarta)}} 
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">onsite jogja</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_onsite_jogja}}, {{number_format($all->talent_salary_jogja)}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">remote</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_remote}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">date ready</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_date_ready}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">international</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_international}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Education isa</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_isa}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">talent rate</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                freelance hour : 
                                                {{number_format($all->talent_freelance_hour)}} / hour<br>
                                                project min : {{number_format($all->talent_project_min)}}<br>
                                                project max : {{number_format($all->talent_project_max)}}<br>
                                                konsulrate : {{number_format($all->talent_konsultasi_rate)}} / hour<br>
                                                ngajar rate : {{number_format($all->talent_ngajar_rate)}} / hour<br>
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label class=" form-control-label">Lastest Salary</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <p class="form-control-static" style="margin-bottom: 0px;">
                                                <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                    @if(is_numeric($all->talent_lastest_salary)) Rp. {{number_format($all->talent_lastest_salary)}}
                                                    @else {{$all->talent_lastest_salary}}
                                                    @endif
                                                </strong>
                                            </p>
                                        </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Total Experience</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_totalexperience}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent condition</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_condition}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Jakarta Salary</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                @if(is_numeric($all->talent_salary_jakarta)) Rp. {{number_format($all->talent_salary_jakarta)}}
                                                @else {{$all->talent_salary_jakarta}}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Jogja Salary</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                @if(is_numeric($all->talent_salary_jogja)) Rp. {{number_format($all->talent_salary_jogja)}}
                                                @else {{$all->talent_salary_jogja}}
                                                @endif
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Martial Status</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static"style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$all->talent_martial_status}}</strong></p>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent CV </label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" action="" style="margin-bottom: 0px;"><strong>{{$all->talent_cv}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent CV update</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_cv_update}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Portofolio update</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->portofolio_update}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Portofolio File</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_portofolio_file}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent Campus</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_campus}}</strong></p>
                                    </div>
                                </div>

                                <!-- <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent Skill</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_skill}}</strong></p>
                                    </div>
                                </div> -->



                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Created Date</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong id='ttl'>{{$all->talent_created_date}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">CV Talent Update</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->cv_talent_update}}</strong></p>
                                    </div>
                                </div>

                                <!-- <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Id Location</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_location_id}}</strong></p>
                                    </div>
                                </div> -->

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Current Work</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_current_work}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent Apply</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_apply}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent Notes Report</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_notes_report_talent}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Rt Status</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="talent_rt_status" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_rt_status}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Last Active</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_last_active}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent la Type</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$all->talent_la_type}}</strong></p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Created Date</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->tcreated_date}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Updated Date</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->tupdated_date}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Talent Rt Status Date</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <p class="form-control-static" style="margin-bottom: 0px;">
                                            <strong id="jobs_apply_expected_salary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
                                                {{$all->talent_rt_status_date}}
                                            </strong>
                                        </p>
                                    </div>
                                </div>

  
                            </form>
                        </section>
                    </aside>
                </div>


            <div class="tab-pane fade" id="v-pills-certification" role="tabpanel" aria-labelledby="v-pills-certification">
                    <div id="alls" class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Certification</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-certification" type="button" class="btn btn-primary">Add Certification</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="certification-table" class="tab-pane fade show active">
                                    <table id="data-certification" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Certification Name</th>
                                                <th>Certification Years</th>
                                                <th>Certification Company</th>
                                                <th>Certification Number</th>
                                                <th>Certification Expired</th>
                                                 <td align="center"><strong>Action</strong></td>
                                            </tr>
                                             <tbody>
                                                @php $no=1; @endphp
                                                @foreach($certif as $c)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$c->certif_name}}</td>
                                                    <td>{{$c->certif_years}}</td>
                                                    <td>{{$c->certif_company}}</td>
                                                    <td>{{$c->certif_number}}</td>
                                                    <td>{{$c->certif_expired}}</td>
                                                    <td align="center">
                                                        <a href="" id="view-certification" data-iddetailcertif="{{$c->certif_id}}" data-toggle="modal" data-target="#modal-view-certification" type="button" class="btn-success btn"><i class="fa fa-eye"></i></a>
                                                        <a href="#edit-certification" data-idcertif="{{$c->certif_id}}" data-toggle="modal" data-target="#modal-edit-certification" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-certification" data-idhapuscertif="{{$c->certif_id}}" data-toggle="modal" data-target="#modal-hapus-certification" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-ready" role="tabpanel" aria-labelledby="v-date-ready">
                     <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Date Ready</strong>
                            </div>
                            <div class="card-body">
                                <div class="col-md-4">
                                    @if($all->talent_date_ready!=null)
                                    {{ date("D, d-M-Y", strtotime($all->talent_date_ready)) }}
                                    @elseif($all->talent_date_ready==null)
                                    <strong class="text-danger">Not Set</strong>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    Available :
                                    @if($all->talent_available=='1_month')
                                    <strong class="text-success">1 Month Notice</strong>
                                    @elseif($all->talent_date_ready!=null & $all->talent_available=='asap')
                                    <strong class="text-success">ASAP</strong>
                                    @elseif($all->talent_date_ready!=null & $all->talent_available=='yes')
                                    <strong class="text-success">{{$all->talent_available}}</strong>
                                    @else {{$all->talent_available}}
                                    @endif
                                </div>
                                <hr style="margin-top: 3rem; margin-bottom: 2rem;">
                                <div class="col-md-12">
                                    <form action="{{url('admin/talent/date_ready/update')}}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                                        <div class="row form-group">
                                            <div class="has-success form-group col col-sm-4" id="datereadynya">
                                                <label for="inputSuccess2i" class=" form-control-label">Date Ready</label>
                                                <input type="date" name="date_ready" id="inputSuccess2i" class="form-control-success form-control">
                                            </div>
                                            <div class="has-success form-group col col-sm-3">
                                                <label for="inputSuccess2i" class=" form-control-label">Available</label>
                                                <select name="avail" id="select" class="form-control">
                                                    <option value="yes">Yes</option>  {{-- Input Tanggal --}}
                                                     <option value="no">No</option>  {{-- Kalo No tidak Usah Input tanggal --}}
                                                     <option value="asap">ASAP</option>  {{-- Kalo Asap waktunya pas saat submit --}}
                                                    <option value="1_month">1 Month Notice</option> {{-- Value Asap --}}
                                                </select>
                                            </div>
                                            <div class="has-success form-group col col-sm-2" style="padding-top: 20px;">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-dot-circle-o"></i> Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-personality" role="tabpanel" aria-labelledby="v-pills-personality-tab">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header">
                                    <strong class="card-title mb-3">Personality Talent</strong>
                                </div>
                                <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="person-tab" data-toggle="tab" href="#person" role="tab" aria-controls="person" aria-selected="true">Personality Skill</a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" id="view-tab" data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="false">View Report Talent</a>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-content pl-3 p-1" id="myTabContent">
                                        <div class="tab-pane fade active show" id="person" role="tabpanel" aria-labelledby="person-tab">
                                            <form  action="{{url('admin/talent/answerpersonality/'.$all->talent_id)}}" method="post" >
                                                <input type="hidden" name="category" value="8">
                                                {{csrf_field()}}
                                                @foreach($person_tes as $pt)
                                                    <div class="form-group row">
                                                        <label for="inputPassword" class="col-sm-10 col-form-label">
                                                            <strong>{{strtoupper($pt->question_text)}}</strong> - <span class="text-muted">{{$pt->question_desc}}</span>
                                                        </label>
                                                        <div class="col-sm-2">
                                                            <input type="number" name="answer[{{$pt->tq_id}}]" class="form-control" min="1" max="10" value="{{strip_tags($answer_per[$pt->tq_id])}}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <hr>
                                                <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                            </form>
                                        </div>
                                        {{-- <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
                                            <h3>View Report Talent</h3><p>Under maintenance</p>
                                        </div> --}}
                                    </div>
                                </div>
                            </section>
                        </aside>
                    </div>

                <div class="tab-pane fade" id="v-pills-reportt" role="tabpanel" aria-labelledby="v-pills-reportt-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Report Talent</strong>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" id="notes-tab" data-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">
                                            Notes SuitCareer
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="view-report-talent-tab" data-toggle="tab" href="#view-report-talent" role="tab" aria-controls="view-report-talent" aria-selected="false">
                                            Report Talent
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade active show" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                                        <form action="{{route('notesreporttalent',$all->talent_id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="talentid" value="{{$all->talent_id}}">
                                            <textarea name="notes" id="konten" cols="30" rows="10" class="form-control">{{$all->talent_notes_report_talent}}</textarea>
                                            <br>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="view-report-talent" role="tabpanel" aria-labelledby="view-report-talent-tab">
                                        <br>
                                        <select name="" class="form-control" id="positionasselect" style="width:20%">
                                                <option value="">Pilih</option>
                                                @foreach ($apply as $posapply)
                                                    <option value="{{$posapply->jobs_title}}">{{$posapply->jobs_title}}</option>
                                                @endforeach
                                        </select> <br>
                                        <a type="button" id="previewsok" data-previewid="{{$all->talent_id}}" class="btn btn-info"><i class="fa fa-eye"></i>Create Report Talent</a>
                                        &nbsp;
                                        <a href="" id="downloadbutton" data-idtalent="{{$all->talent_id}}" data-toggle="modal" data-target="#download-report" type="button" class="btn-success btn"><i class="fa fa-arrow-down"></i> Download</a>
                                        {{-- <a  type="button" id="tombol-download" class="btn btn-info"> Download</a> --}}

                                        <div id="preview-report">
                                                <div class="container"><br>
                                                        <center>
                                                                <img src="{{asset('public/logo-suitcareer.png')}}" alt="" width="20%">
                                                        </center>  <br>
                                                        <p align="center" style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                            <b>REPORT TALENT</b>
                                                        </p>
                                                        <hr>
                                                        <div class="table-responsive">
                                                            <!--<table class="table mx-auto w-auto">-->
                                                            <table class="align-center" width="100%">
                                                                <tr>
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">POSITION AS</strong></td>
                                                                    <td id="positionas"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">TALENT NAME</strong></td>
                                                                    <td  id="namatalent">{{ucwords($all->talent_name)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td >
                                                                        <strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                            TALENT BOD
                                                                        </strong>
                                                                    </td>
                                                                    <td id="birthtalent">{{ucwords($all->talent_place_of_birth)." , ".$all->talent_birth_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td >
                                                                        <strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                            MARTIAL STATUS
                                                                        </strong>
                                                                    </td>
                                                                    <td id="statustalent">{{ucfirst($all->talent_martial_status)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">CURRENT ADDRESS</strong></td>
                                                                    <td id="addresscurrent">{{ucwords($all->talent_address)}}</td>
                                                                </tr>
                                                                <tr >
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">PREFERED LOCATION</strong></td>
                                                                    {{-- <td >Bandung desa Cimahi, Kecamatan Cimahi Kabupaten Bandung</td> --}}
                                                                    <td id="preferlocation">{{ucwords($preferloc->location_name)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">TOTAL EXPERIENCE</strong></td>
                                                                    <td id="pengalamankerja">{{ucwords($all->talent_totalexperience)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td ><strong style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">NOTICE PERIOD</strong></td>
                                                                    <td id="noticeperiode">
                                                                        @if ($all->talent_available=="no")
                                                                            {{ucfirst($all->talent_available)}}
                                                                        @elseif ($all->talent_available=="yes")
                                                                            {{ucfirst($all->talent_available)." , ".\Carbon\Carbon::parse($all->talent_date_ready)->format('d-m-Y')}}
                                                                        @elseif ($all->talent_available=="1_month")
                                                                            1 Month Notice
                                                                        @else
                                                                            ASAP
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <hr>
                                                            </table>
                                                        </div>
                                                        <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>TALENT SKILL OVERVIEW</b>
                                                        </p>

                                                        <table width="50%" style="margin-left: 80px;" border="1" id="teknologidanlevel">
                                                                <tr style="background-color: greenyellow">
                                                                    <td align="center"><strong>TECHNOLOGY STACK</strong> </td>
                                                                    <td align="center" width="50%"><strong>LEVEL</strong></td>
                                                                </tr>
                                                                @foreach ($skill as $s)
                                                                    <tr align="center">
                                                                        <td>{{$s->skill_name}}</td>
                                                                        <td>{{$s->st_level}}</td>
                                                                    </tr>
                                                                @endforeach
                                                        </table>

                                                        <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>EXPERIENCE HIGHLIGHT</b>
                                                        </p>
                                                        <div style="margin-left:50px;" id="experiencehighlight">
                                                            @php
                                                                $getData = DB::table('work_experience')->where('workex_talent_id',$all->talent_id)->get();
                                                            @endphp
                                                            @foreach ($getData as $exper)
                                                                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                    <b>{{$exper->workex_office}}</b>
                                                                </p>
                                                                <p style="margin-top: -15px;">{{$exper->workex_position}}</p>
                                                                <p style="margin-top: -15px; font-size: 13px;">
                                                                    @php
                                                                        $start = explode(' ',$exper->workex_startdate);
                                                                        $end = explode(' ',$exper->workex_enddate);
                                                                        if ($start[0]=='0' && $end[0]=='0') {
                                                                            echo $start[1]." ".$start[2]." - ".$end[1]." ".$end[2]."<br>";
                                                                        }else{
                                                                            echo $exper->workex_startdate." - ".$exper->workex_enddate."<br>";
                                                                        }
                                                                    @endphp
                                                                </p>
                                                                <p style="margin-left: 30px; font-size: 16px;"><strong>Job Description : </strong></p>
                                                                <div style="margin-left: 40px; font-size: 14px;">
                                                                    {!! $exper->workex_desc !!}
                                                                </div>
                                                                <p style="margin-left: 30px; font-size: 16px;"><strong>Project Handled : </strong></p>
                                                                <div style="margin-left: 40px; font-size: 14px;">
                                                                       {!!$exper->workex_handle_project!!}
                                                                </div>
                                                                <br>
                                                            @endforeach
                                                        </div>
                                                        <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>PROJECT HIGHLIGHT</b>
                                                        </p>
                                                        <div style="margin-left:50px;">
                                                            @php
                                                                $getdatapor = DB::table('portfolio')->where('portfolio_talent_id',$all->talent_id)->get();
                                                            @endphp
                                                            @foreach ($getdatapor as $por)
                                                                <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                    <b>{{$por->portfolio_name}}</b>
                                                                </p>
                                                                <p style="margin-top: -15px;">
                                                                    {{$por->portfolio_startdate.' - '.$por->portfolio_enddate}}
                                                                </p>
                                                                <p style="margin-left: 30px; font-size: 16px;"><strong>Project Description : </strong></p>
                                                                <p style="margin-left: 40px; font-size: 14px;">{{$por->portfolio_desc}}</p>
                                                                <p style="margin-left: 30px; font-size: 16px;"><strong>Technology Used : </strong></p>
                                                                <p style="margin-left: 40px; font-size: 14px;">{{$por->portfolio_tech}}</p>
                                                            @endforeach
                                                        </div>
                                                        <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>EDUCATIONAL BACKGROUND</b>
                                                        </p>
                                                            <div class="container" align="center">
                                                                <table width="100%" border="1">
                                                                    <thead align="center" style="background-color: greenyellow">
                                                                        <tr>
                                                                            <td>Educational Institutional</td>
                                                                            <td>Education Level</td>
                                                                            <td>Year</td>
                                                                            <td>GPA</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody align="center">
                                                                        @foreach ($edu as $education)
                                                                        <tr>
                                                                            <td>{{ucfirst($education->edu_name)}}</td>
                                                                            <td>
                                                                                @if ($education->edu_level=='other')
                                                                                    {{ucfirst($education->edu_level_other)}}
                                                                                @else
                                                                                    {{ucfirst($education->edu_level)}}
                                                                                @endif
                                                                            </td>
                                                                            <td>
                                                                                {{$education->edu_datestart}} <br>
                                                                                {{$education->edu_dateend}} <br>                                                                                
                                                                            </td>
                                                                            <td>{{$education->edu_value}}</td>
                                                                        </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>LICENSES & CERTIFICATION</b>
                                                        </p>
                                                            <div style="margin-left:50px;">
                                                                    @foreach ($certif as $certification)
                                                                    <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                            <b>{{$certification->certif_name}}</b>
                                                                    </p>
                                                                    <p style="margin-top: -15px;">
                                                                        {{$certification->certif_company." ".$certification->certif_years}} <br>{{-- Scrum Organization LTD Issued January 2019 • <br> --}}
                                                                        {{-- {{$c->certif_expired}}<br> --}}
                                                                        {{$certification->certif_expired}} <br>
                                                                        Credential ID {{$certification->certif_number}}
                                                                        {{-- 0111101111111 --}}
                                                                    </p>
                                                                    @endforeach
                                                            </div>

                                                        <hr>
                                                        <p style="font: 16px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                                                                <b>SUITCAREER NOTES</b>
                                                        </p>
                                                        <table width=100% border="1" style="border-color: greenyellow">
                                                            <tr>
                                                                <td>
                                                                   {!! $all->talent_notes_report_talent !!}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <br></br>
                                                        <table width="100%">
                                                            <tr style="background-color: greenyellow;">
                                                                 <td style="padding-left: 10px" colspan="2"> Further Information </td>
                                                             </tr>
                                                         </table><br>
                                                         <table width=100%>                
                                                             <!--<tr>-->
                                                             <!--    <td style="">-->
                                                             <!--    </td>-->
                                                             <!--</tr>-->
                                                             <t>
                                                                 <td width="30%">
                                                                         PT Talenta Sinergi Group <br>
                                                                         Website: www.upscale.id <br>
                                                                         Email: hrd@upscale.id <br>
                                                                         Phone : +62 221 5088 0150 <br>
                                                                         WA : +62 857 1281 9290
                                                                 </td>
                                                                 <td width="30%">
                                                                         <strong>Our Main Office, Yogyakarta </strong><br>
                                                                         Jln Ngadinegaran Blok MJ III No. 144 RT/RW, Mantrijeron, Kota Yogyakarta, DI.Yogyakarta <br> <br>
                                                                         <!--<strong>Our Business Office, Jakarta</strong><br>-->
                                                                         <!--Madison Park, Magnolia Tower 10BJ, Tanjung Duren Selatan, Jakarta Barat <br>-->
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td></td>
                                                             </tr>
                                                         </table>
                                         
                                                        </div>
                                        </div>



                                        <div class="modal fade" id="download-report">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Confirmation</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form action="{{route('downloadreporttalentnya')}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <input type="hidden" name="position" id="posisi">
                                                            <input type="hidden" name="talentidnih" id="idtalentnihcuy" value="{{$all->talent_id}}">
                                                            <center><h3>Apa Anda Yakin untuk Menyimpannya ?</h3></center>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <div class="nav nav-pills pull-right">
                                                                <button type="submit" class="btn btn-success">Download</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>





{{-- 
                                                <div class="modal fade" id="download-report" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <h5 class="modal-title" id="judul-panjang">Confirmation</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body substeps-modal">
                                                                            <form method="post" action="{{route('downloadreporttalentnya')}}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="position" id="posisi">
                                                                                <input type="hidden" name="talentidnih" id="idtalentnihcuy" value="{{$all->talent_id}}">
                                                                                <center><h3>Apa Anda Ingin Mendownloadnya ?</h3><br><br>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" name="" class="btn btn-success" data-dismiss="modal" value="Submit">Download</button><center>
                                                                            </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                    </div>
                                </div>

                            </div>
                        </section>
                    </aside>
                </div>


                <div class="tab-pane fade" id="v-pills-interview" role="tabpanel" aria-labelledby="v-interview">
                     <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Interview / Technical Skills</strong>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach ($ct as $cat)
                                      @if ($cat->ct_singkatan=="BE")
                                        <li class="nav-item">
                                            <a class="nav-link active show" id="{{$cat->ct_name}}-tab" data-toggle="tab" href="#{{$cat->ct_name}}" role="tab" aria-controls="{{$cat->ct_name}}" aria-selected="true">
                                                {{$cat->ct_singkatan}}
                                            </a>
                                        </li>
                                        @else
                                        <li class="nav-item">
                                                <a class="nav-link" id="{{$cat->ct_name}}-tab" data-toggle="tab" href="#{{$cat->ct_name}}" role="tab" aria-controls="{{$cat->ct_name}}" aria-selected="true">
                                                    {{$cat->ct_singkatan}}
                                                </a>
                                        </li>
                                      @endif
                                    @endforeach
                                </ul>

                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    @foreach ($ct as $cat)
                                        @if ($cat->ct_singkatan=="BE")
                                            <div class="tab-pane fade active show" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                    <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                    {{csrf_field()}}
                                                    @foreach($be_tes as $bet)
                                                        <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                {{$bet->question_text}}<br><span class="text-muted">{{$bet->question_desc}}</span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <textarea name="answer[{{$bet->tq_id}}]" class="form-control">{{strip_tags($answer_be[$bet->tq_id])}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <!-- <div class="form-group row">
                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                Apa kesimpulannya?<br><span class="text-muted"></span>
                                                            </label>
                                                            <div class="col-sm-8">
                                                                    @php
                                                                    $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                            ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                            ->where('test_question.tq_question_id','=',34)
                                                                            ->limit(1)
                                                                            ->get();
                                                                    @endphp
                                                                     @if (count($cobain)>0)
                                                                        @foreach ($cobain as $key)
                                                                        <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                        @endforeach
                                                                     @else
                                                                         <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                     @endif
                                                            </div>
                                                    </div> -->
                                                    <hr>
                                                    <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                </form>
                                            </div>
                                        @elseif($cat->ct_singkatan=="AD")

                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @foreach($ad_tes as $adt)
                                                            <div class="form-group row">
                                                                <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                    {{$adt->question_text}}<br><span class="text-muted">{{$adt->question_desc}}</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <textarea name="answer[{{$adt->tq_id}}]" class="form-control">{{strip_tags($answer_ad[$adt->tq_id])}}</textarea>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <!-- <div class="form-group row">
                                                                <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                    Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                        @php
                                                                        $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                ->where('test_question.tq_question_id','=',34)
                                                                                ->limit(1)
                                                                                ->get();
                                                                        @endphp
                                                                         @if (count($cobain)>0)
                                                                            @foreach ($cobain as $key)
                                                                            <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                            @endforeach
                                                                         @else
                                                                             <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                         @endif
                                                                </div>
                                                        </div> -->
                                                        <hr>
                                                        <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                    </form>
                                                </div>
                                            @elseif($cat->ct_singkatan=="HR")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @foreach($hr_tes as $hrt)
                                                            <div class="form-group row">
                                                                <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                    {{$hrt->question_text}}<br><span class="text-muted">{{$hrt->question_desc}}</span>
                                                                </label>
                                                                <div class="col-sm-8">
                                                                    <textarea name="answer[{{$hrt->tq_id}}]" class="form-control">{{strip_tags($answer_hr[$hrt->tq_id])}}</textarea>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <hr>
                                                        <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                    </form>
                                                </div>

                                            @elseif($cat->ct_singkatan=="iOS")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @if (count($ios_tes)!=0)
                                                            @foreach($ios_tes as $iost)
                                                                    <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                                {{$iost->question_text}}<br><span class="text-muted">{{$iost->question_desc}}</span>
                                                                            </label>
                                                                            <div class="col-sm-8">

                                                                                    <textarea name="answer[{{$iost->tq_id}}]" class="form-control">{{strip_tags($answer_ios[$iost->tq_id])}}</textarea>

                                                                            </div>
                                                                    </div>
                                                            @endforeach
                                                            <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                        Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                            @php
                                                                            $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                    ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                    ->where('test_question.tq_question_id','=',34)
                                                                                    ->limit(1)
                                                                                    ->get();
                                                                            @endphp
                                                                             @if (count($cobain)>0)
                                                                                @foreach ($cobain as $key)
                                                                                <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                                @endforeach
                                                                             @else
                                                                                 <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                             @endif
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                        @else
                                                        <div class="form-group row">
                                                                <h3>Maaf Lagi Tahap Pengembangan</h3>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            @elseif($cat->ct_singkatan=="FE")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @if (count($fe_tes)!=0)
                                                            @foreach($fe_tes as $fet)
                                                                    <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                                {{$fet->question_text}}<br><span class="text-muted">{{$fet->question_desc}}</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="answer[{{$fet->tq_id}}]" class="form-control">{{strip_tags($answer_fe[$fet->tq_id])}}</textarea>
                                                                            </div>
                                                                    </div>
                                                            @endforeach
                                                            <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                        Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                            @php
                                                                            $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                    ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                    ->where('test_question.tq_question_id','=',34)
                                                                                    ->limit(1)
                                                                                    ->get();
                                                                            @endphp
                                                                             @if (count($cobain)>0)
                                                                                @foreach ($cobain as $key)
                                                                                <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                                @endforeach
                                                                             @else
                                                                                 <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                             @endif
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                        @else
                                                        <div class="form-group row">
                                                                <h3>Maaf Lagi Tahap Pengembangan</h3>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>

                                            @elseif($cat->ct_singkatan=="PM")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @if (count($pm_tes)!=0)
                                                            @foreach($pm_tes as $pmt)
                                                                    <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                                {{$pmt->question_text}}<br><span class="text-muted">{{$pmt->question_desc}}</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                <textarea name="answer[{{$pmt->tq_id}}]" class="form-control">{{strip_tags($answer_pm[$pmt->tq_id])}}</textarea>
                                                                            </div>
                                                                    </div>
                                                            @endforeach
                                                            <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                        Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                            @php
                                                                            $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                    ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                    ->where('test_question.tq_question_id','=',34)
                                                                                    ->limit(1)
                                                                                    ->get();
                                                                            @endphp
                                                                             @if (count($cobain)>0)
                                                                                @foreach ($cobain as $key)
                                                                                <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                                @endforeach
                                                                             @else
                                                                                 <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                             @endif
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                        @else
                                                        <div class="form-group row">
                                                                <h3>Maaf Lagi Tahap Pengembangan</h3>
                                                        </div>
                                                        @endif

                                                    </form>
                                                </div>
                                                @elseif($cat->ct_singkatan=="UIX")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @if(count($ui_tes)!=0)
                                                            @foreach($ui_tes as $uit)
                                                                    <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                                {{$uit->question_text}}<br><span class="text-muted">{{$uit->question_desc}}</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                    <textarea name="answer[{{$uit->tq_id}}]" class="form-control">{{strip_tags($answer_ui[$uit->tq_id])}}</textarea>
                                                                            </div>
                                                                    </div>
                                                            @endforeach
                                                            <!-- <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                        Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                            @php
                                                                            $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                    ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                    ->where('test_question.tq_question_id','=',34)
                                                                                    ->limit(1)
                                                                                    ->get();
                                                                            @endphp
                                                                             @if (count($cobain)>0)
                                                                                @foreach ($cobain as $key)
                                                                                <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                                @endforeach
                                                                             @else
                                                                                 <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                             @endif
                                                                    </div>
                                                            </div> -->
                                                            <hr>
                                                            <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                        @else
                                                        <div class="form-group row">
                                                        
                                                                <h3>Maaf Lagi Tahap Pengembangan</h3>
                                                        </div>
                                                        @endif

                                                    </form>
                                                </div>
                                            @elseif($cat->ct_singkatan=="QA")
                                                <div class="tab-pane fade" id="{{$cat->ct_name}}" role="tabpanel" aria-labelledby="{{$cat->ct_name}}-tab">
                                                    <form  action="{{url('admin/talent/answer/'.$all->talent_id)}}" method="post" >
                                                        <input type="hidden" name="category" value="{{$cat->ct_id}}">
                                                        {{csrf_field()}}
                                                        @if (count($qa_tes)!=0)
                                                            @foreach($qa_tes as $qat)
                                                                    <div class="form-group row">
                                                                            <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                                {{$qat->question_text}}<br><span class="text-muted">{{$qat->question_desc}}</span>
                                                                            </label>
                                                                            <div class="col-sm-8">
                                                                                    <textarea name="answer[{{$qat->tq_id}}]" class="form-control">{{strip_tags($answer_qa[$qat->tq_id])}}</textarea>
                                                                            </div>
                                                                    </div>
                                                            @endforeach
                                                            <div class="form-group row">
                                                                    <label for="inputPassword" class="col-sm-4 col-form-label">
                                                                        Apa kesimpulannya?<br><span class="text-muted"></span>
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                            @php
                                                                            $cobain = DB::table('interview_test')->join('test_question','interview_test.it_tq_id','=','test_question.tq_id')
                                                                                    ->where('test_question.tq_ct_id',$cat->ct_id)
                                                                                    ->where('test_question.tq_question_id','=',34)
                                                                                    ->limit(1)
                                                                                    ->get();
                                                                            @endphp
                                                                             @if (count($cobain)>0)
                                                                                @foreach ($cobain as $key)
                                                                                <textarea name="kesimpulan" class="form-control">{{$key->it_answer}}</textarea>
                                                                                @endforeach
                                                                             @else
                                                                                 <textarea name="kesimpulan" class="form-control">-</textarea>
                                                                             @endif
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" />
                                                        @else
                                                        <div class="form-group row">
                                                                <h3>Maaf Lagi Tahap Pengembangan</h3>
                                                        </div>
                                                        @endif

                                                    </form>
                                                </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>


                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div id="alls" class="card">
                        <div class="card-header">
                            <nav>
                                <div class="action-table">
                                    <span id="error2"></span>
                                    <div class="col-md-12 form-inline">
                                        <div class="form-group">
                                            <div class="col">
                                                <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                <select id="verified-type" class="form-control">
                                                    <option id='verified-type-default' selected disabled="">Status</option>
                                                    <option value="">All</option>
                                                    <option value="YES">Verified</option>
                                                    <option value="NO">No Verified</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <button  data-toggle="modal" data-target="#modal-add-skill" type="button" class="btn btn-primary  tambah-catatan" data-toggle="tooltip"  title="See Substeps For This Application"  class="btn btn-primary ">Add Skill</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="skill-table" class="tab-pane fade show active">
                                    <table id="data-skill" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Skill</th>
                                                <th>Date Verified</th>
                                                <th>Score</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <div id="alls" class="card">
                    <div class="card-header">
                        <nav>
                            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                            <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                            <select id="job-type" class="form-control">
                                <option id='job-type-default' selected disabled="">Type Time</option>
                                <option value="">All</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="internship">Internship</option>
                                <option value="parttime">Parttime</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <span>Change status to :</span>
                            <select id="status" name="status" class="form-control form-control biarpas">
                                <option value="unprocess">Unprocess</option>
                                <option value="quarantine">Quarantine</option>
                                <option value="assign">Assign</option>

                            </select>

                                       <div class="nav nav-pills pull-right" >
        <button id="v-pills-skill-tab" data-toggle="pill" href="#v-pills-skill" role="tab" aria-controls="v-pills-skill" aria-selected="false" id="v-pills-tab-skill" role="tablist" aria-orientation="vertical" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Add Skill</button>
           </div>

                                       <div class="nav nav-pills pull-right" style="margin-right: 10px; margin-left: 10px" >
        <button id="v-pills-skill-edit-tab" data-toggle="pill" href="#v-pills-skill-edit" role="tab" aria-controls="v-pills-skill-edit" aria-selected="false" id="v-pills-tab-skill-edit" role="tablist" aria-orientation="vertical" class="btn btn-primary tambah_skill" type="button"><i class="fa fa-retweet"></i> Edit Skill</button>
           </div>


                        </div>
                    </div>


                </div>
            </div>
        </nav>
                    </div>
                    <div class="card-body">

                            <div class="tab-content">
                                <div id="unprocess" class="tab-pane fade show active">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Skill</th>
                                                <th>Status</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($skill as $row)
                                            <tr><td></td>
                                                <td><strong>{{$row->skill_name}}</strong>
                                                 <td>
                                                    @if($row->st_skill_verified=='NO')
                                                    &nbsp;&nbsp;<span class="badge badge-warning">No Verified</span>
                                                    @elseif($row->st_skill_verified=='YES')
                                                    &nbsp;&nbsp;<span class="badge badge-success">Verified</span>
                                                </td>
                                                    @endif
                                                    <td>
                                                    {{$row->sc_name}}
                                                </td>
                                                </td>
                                                <td>      <center>
                                                                <a href="" type="button" class ="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class ="fa fa-pencil-square-o"></i></a>
                                                                 <a href="" id="'.$data->jobs_apply_id.'"data-toggle="modal" data-target="#modal-tambah-catatan" type="button" class="btn btn-warning btn-xs tambah-catatan" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application"><i class="    fa fa-check"></i></a>
                                                        </center>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-talent" role="tabpanel" aria-labelledby="v-pills-talent">
                    <div id="alls" class="card">
                        <div class="card-header">
                            <nav>
                                <div class="action-table">
                                    <div class="col-md-12 form-inline" style=" display: flex;flex-direction: row;">
                                        <div class="form-group">
                                            <div class="col">
                                                <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                <select id="company-type" class="form-control">
                                                    <option id='company-type-default' selected disabled="">Company</option>
                                                    <option value="">All</option>
                                                    @foreach($company as $row)
                                                    <option value="{{$row->company_name}}">{{$row->company_name}}</option>
                                                    @endforeach
                                                </select>
                                                <select id="skill-type" style="width: 40%; width: auto;" name="skill-item-filter[]" multiple="multiple"  class="filter-skill form-control"  required="">
                                                    @foreach($list_skill as $skill_field)
                                                        <option value="{{ $skill_field->skill_id }}">{{ $skill_field->skill_name }}</option>
                                                    @endforeach
                                                </select>
                                                <select id="location-job-request" style="" class="form-control">
                                                    <option id='location-job-request-default' selected disabled="">Location</option>
                                                    <option value="">All</option>
                                                    @foreach($locate as $loc)
                                                    <option value="{{ $loc->location_name}}">{{$loc->location_name}}
                                                    @endforeach
                                                    </option>
                                                </select> -->
                                                <form method="post" action="{{route('talent.addassign')}}">
                                                        {{ csrf_field() }}
                                               <div class="modal-body substeps-modal">
                                                   <div class="row">
                                                       <div class="col-md-4">
                                                            <label for="catatan">Company</label>
                                                            <span id="error-assign"></span>
                                                           <div class="input-group">
                                                                <select name="company_id" data-idtalent="{{$all->talent_id}}" id="company_id"  class="form-control active 3col"  required="">
                                                                   @foreach($company as $row)
                                                                   <option value="{{ $row->company_id }}">{{$row->company_name}}
                                                                   </option>
                                                                   @endforeach
                                                                </select>
                                                          </div>
                                                       </div>
                                                       <div class="col-md-4">
                                                            <label for="catatan">Request</label>
                                                            <div class="input-group">
                                                                <select name="request_id"  class="form-control 3col active job-request"  required="">

                                                                </select>
                                                             </div>
                                                       </div>
                                                       <div class="col-md-3">
                                                            <label for="catatan">Prefered Location</label>
                                                            <span id="error-assign"></span>
                                                           <div class="input-group">
                                                                <select name="location_id"  class="form-control active 3col location-request"  required="">
                                                                </select>
                                                          </div>
                                                       </div>
                                                       <div class="col-md-1">
                                                            <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                                                            <br>
                                                            <input type="submit" name="submit" class="btn btn-info" value="Assign">
                                                       </div>
                                                   </div>

                                                   </div>
                                               <div class="modal-footer">

                                               </div>
                                           </form>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="col">
                                                <button  data-toggle="modal" data-target="#modal-add-assign" type="button" class="btn btn-primary  tambah-catatan" data-toggle="tooltip"  title="See Substeps For This Application"  class="btn btn-primary ">Assign</button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="assign-table" class="tab-pane fade show active">
                                    <table id="data-assign" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Company</th>
                                                <th>Request</th>
                                                <th>Prefered Location</th>
                                                <th>Position</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="v-pills-portfolio" role="tabpanel" aria-labelledby="v-pills-portfolio">
                    <div id="alls" class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Portfolio</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-portfolio" type="button" class="btn btn-primary">Add Portfolio</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="portfolio-table" class="tab-pane fade show active">
                                    <table id="data-portfolio" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Project Name</th>
                                                <th>Project Description</th>
                                                <th>Technology Used</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="v-pills-experience" role="tabpanel" aria-labelledby="v-pills-experience">
                    <span id="message-workex"></span>
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if ($message = Session::get('Success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if ($message = Session::get('dangeralert'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div id="alls" class="card">
                        <div class="card-header">
                            <h3>
                                <strong class="card-title mb-3">Work Experience</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-workex" type="button" class="btn btn-primary">Add Work Experience</button>
                                </div>
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="workex-table" class="tab-pane fade show active">
                                    <table id="data-workex" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Office</th>
                                                <th>Position</th>
                                                <th>Description</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="tab-pane fade" id="v-pills-cv" role="tabpanel" aria-labelledby="v-pills-cv-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Curiculum Vitae : {{$all->talent_cv_update}}</strong>
                                </div>
                            <div class="card-body">
                            @if($all->talent_cv_update!=NULL)
                            <iframe src="{{asset('storage/Curriculum Vitae/'.$all->talent_cv_update)}}" style="height:1000px;width:100%"></iframe>

                            @else
                            <object data="{{"data:application/pdf;base64," .$all->talent_cv}}" style="height:1000px;width:100%"></object>
                            @endif
                            </div>
                        </section>
                    </aside>
                </div>

                <div class="tab-pane fade" id="v-pills-porto" role="tabpanel" aria-labelledby="v-pills-porto-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Curiculum Vitae : {{$all->portfolio_update}}</strong>
                                </div>
                            <div class="card-body">
                                @if($all->portfolio_update !=NULL)
                                    <iframe src="{{asset('storage/Portfolio/'.$all->portfolio_update)}}" style="height:1000px;width:100%"></iframe>
                                @else
                                    tidak upload porto
                                @endif
                            </div>
                        </section>
                    </aside>
                </div>
                
                
                <div class="tab-pane fade" id="v-pills-cv2" role="tabpanel" aria-labelledby="v-pills-cv2-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Curiculum Vitae</strong>
                                </div>
                            <div class="card-body">
                                @if (isset($all->talent_cv))
                                    <object data="{{"data:application/pdf;base64,".$all->talent_cv}}" style="height:1000px;width:100%"></object>
                                @else
                                    kosong
                                @endif 
                            </div>
                            
                        </section>
                    </aside>
                </div>



                <div class="tab-pane fade" id="v-pills-apply" role="tabpanel" aria-labelledby="v-pills-apply"> {{-- OPEN APPLY --}}
                    <div id="alls" class="card">
                        <div class="card-header">
                            <nav>
                                <div class="action-table">
                                    <div class="col-md-12 form-inline">
                                        <div class="form-group">
                                            <div class="col">
                                                <span data-toggle="tooltip" data-placement="top" title="Hooray!">Filter :</span>
                                                <select id="category-apply" class="form-control">
                                                    <option id='category-apply-default' selected disabled="">Category</option>
                                                    <option value="">All</option>
                                                    <option value="unprocess">Unprocess</option>
                                                    <option value="interview">Interview</option>
                                                    <option value="offered">Offered</option>
                                                    <option value="hired">Hired</option>
                                                    <option value="rejected">Rejected</option>
                                                    <option value="testonline">Test Online</option>
                                                    <option value="keep">Keep</option>
                                                    <option value="ready">Ready</option>
                                                </select>
                                                <select id="location-apply" class="form-control">
                                                    <option id='location-apply-default' selected disabled="">Location</option>
                                                    <option value="">All</option>
                                                    <option value="Jakarta">Jakarta</option>
                                                    <option value="Bandung">Bandung</option>
                                                    <option value="Yogyakarta">Yogyakarta</option>
                                                    <option value="Surabaya">Surabaya</option>
                                                    <option value="Malang">Malang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col">
                                                <button  data-toggle="modal" data-target="#modal-add-apply" type="button" class="btn btn-primary  tambah-catatan" data-toggle="tooltip"  title="See Substeps For This Application"  class="btn btn-primary ">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="apply-table" class="tab-pane fade show active">
                                    <table id="data-apply" class="table is-striped is-bordered" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Jobs</th>
                                                <th>Job Location</th>
                                                <th>Step</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- CLOSE APPLY --}}


                <div class="tab-pane fade" id="v-pills-education" role="tabpanel" aria-labelledby="v-pills-portfolio">
                        <div id="alls" class="card">
                            <div class="card-header">
                                <h3>
                                    <strong class="card-title mb-3">Education</strong>
                                    <div class="nav nav-pills pull-right">
                                        <button data-toggle="modal" data-target="#modal-add-education" type="button" class="btn btn-primary">Add Education</button>
                                    </div>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="education-table" class="tab-pane fade show active">
                                        <table id="data-education" class="table is-striped is-bordered" cellspacing="0">
                                           <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Education Level</th>
                                                    <th>Institution Name</th>
                                                    <th>Education Field</th>                                    
                                                    <th>Education Datestart</th>
                                                    <th>Education Dateend</th>
                                                    <th>IPK</th>
                                                    <td align="center"><strong>Action</strong></td>
                                                </tr>
                                            </thead>
                                             <tbody>
                                                @php $no=1; @endphp
                                                @foreach($edu as $edu)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>
                                                        @if ($edu->edu_level=='other')
                                                            {{ucfirst($edu->edu_level_other)}}
                                                        @else
                                                            {{ucfirst($edu->edu_level)}}
                                                        @endif
                                                    </td>
                                                    <td>{{$edu->edu_name}}</td>
                                                    <td>{{$edu->edu_field}}</td>
                                                    <td>{{$edu->edu_datestart}}</td>
                                                    <td>{{$edu->edu_dateend}}</td>
                                                    <td>{{$edu->edu_value}}</td>
                                                    <td align="center">
                                                        <a href="" id="view-education" data-idviewedu="{{$edu->edu_id}}" data-toggle="modal" data-target="#modal-view-education" type="button" class="btn-success btn"><i class="fa fa-eye"></i></a>
                                                        <a href="#edit-education" data-idedu="{{$edu->edu_id}}" data-toggle="modal" data-target="#modal-edit-education" type="button" class="btn-info btn"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-education" data-idhapusedu="{{$edu->edu_id}}" data-toggle="modal" data-target="#modal-hapus-education" type="button" class="btn-danger btn"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                             </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                    <strong class="card-title mb-3">Portofolio</strong>
                                </div>
                            <div class="card-body">
                                <object data=""></object>
                            </div>
                        </section>
                    </aside>
                </div>

                <div class="tab-pane" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                    <form id="simpantalent-form" action="{{url('admin/talent/update/'.$all->talent_id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="card">
                            <div class="card-header">
                                <strong>Talent Profile Edit</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group col-md-6">

                                
					
                                <label for="text-input" class=" form-control-label">Foto Profil Talent <span class="badge badge-secondary">.pdf Max 1MB</span></label>
                                <input value=" " method="POST" enctype="multipart/form-data" type="file" id="inputgambar" name="gambar" placeholder="Your Photo" required="" class="form-control">
                                {{ csrf_field() }}

                                @section('js')
                                <script type="text/javascript">

                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                        $('#showgambar').attr('src', e.target.result);
                                        }

                                        reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                        $("#inputgambar").change(function () {
                                        readURL(this);
                                    });

                                </script>

                                @stop




                                    <label for="text-input" class=" form-control-label">Talent Name</label>
                                    <input value="{{$all->talent_name}}" type="text" id="talent_name" name="talent_name" placeholder="Your Name" required="" class="form-control">
                                    <label for="text-input" class=" form-control-label">Talent Email</label>
                                    <input value="{{$all->talent_email}}" type="text" id="talent_email" name="talent_email" placeholder="Your Email" required="" class="form-control">
                                    <label for="text-input" class=" form-control-label">Talent Phone</label>
                                    <input value="{{$all->talent_phone}}" type="text" id="talent_phone" name="talent_phone" placeholder="Your Phone" required="" class="form-control">
                                    <label for="select" class=" form-control-label">Talent Gender</label>
                                    <select value="{{$all->talent_gender}}" name="talent_gender" id="talent_gender" class="form-control">
                                        <option  value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <label for="text-input" class=" form-control-label">Place Of Birth</label>
                                    <input type="text" name="talent_place_of_birth" id="talent_place_of_birth" class="form-control" value="{{$all->talent_place_of_birth}}">
                                    <label for="text-input" class=" form-control-label">Birth Day</label>
                                    <input value="{{$all->talent_birth_date}}" type="text" id="talent_birth_date" name="talent_birth_date" placeholder="dd/mm/yyyy" class="form-control">
                                    <label for="text-input" class=" form-control-label">Martial Status</label>
                                    <select name="martial_status" class="form-control">
                                        @if ($all->talent_martial_status == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="married" > Married</option>
                                            <option value="single" > Single</option>
                                        @elseif($all->talent_martial_status == "single")
                                            <option value="single" > Single</option>
                                            <option value="married" > Married</option>
                                        @elseif($all->talent_martial_status == "married")
                                            <option value="married" > Married</option>
                                            <option value="single" > Single</option>
                                        @endif
                                    </select>
                                    <label for="text-input" class=" form-control-label">Campus</label>
                                    <select name="campus" class="form-control campus2">
                                        @if ($all->talent_campus!=NULL)
                                            @php
                                                $cmp = DB::table('campus')->where('campus_id',$all->talent_campus)->first();
                                            @endphp
                                            <option value="{{$all->talent_campus}}">{{$cmp->nama}}</option>
                                        @endif
                                        @foreach ($campus as $c)
                                            <option value="{{$c->campus_id}}">{{$c->nama}}</option>
                                        @endforeach
                                    </select>
                                    <label for="text-input" class=" form-control-label">Request Talent Status</label>
                                    <select name="talent_rt_status" id="talent_rt_status" class="form-control">
                                    @if ($all->talent_rt_status == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="DONE" >DONE</option>
                                            <option value="NOT YET" >NOT YET</option>
                                    @elseif($all->talent_rt_status == "DONE")
                                            <option value="DONE" > DONE</option>
                                            <option value="NOT YET" > NOT YET</option>
                                    @elseif($all->talent_rt_status == "NOT YET")
                                            <option value="NOT YET" > NOT YET</option>
                                            <option value="DONE" > DONE</option>
                                    @endif
                                    </select> 

                                    <label for="text-input" class=" form-control-label">Talent Status</label>
                                    <select name="talent_status" class="form-control">
                                        @if ($all->talent_status == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="worker" > Worker</option>
                                            <option value="alumni" > Alumni</option>
                                            <option value="edu" > Edu</option>
                                        @elseif($all->talent_status == "worker")
                                            <option value="worker" > Worker</option>
                                            <option value="alumni" > Alumni</option>
                                            <option value="edu" > Edu</option>
                                        @elseif($all->talent_status == "alumni")
                                            <option value="alumni" > Alumni</option>
                                            <option value="worker" > Worker</option>
                                            <option value="edu" > Edu</option>
                                        @elseif($all->talent_status == "edu")
                                            <option value="edu" > Edu</option>
                                            <option value="alumni" > Alumni</option>
                                            <option value="worker" > Worker</option>
                                        @endif
                                    </select>

                                    <label for="text-input" class=" form-control-label">Condition</label>
                                    <select name="talent_condition" class="form-control">
                                        @if ($all->talent_condition == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="quarantine" > Quarantine</option>
                                            <option value="assign" > Assign</option>
                                        @elseif($all->talent_condition == "quarantine")
                                            <option value="quarantine" > Quarantine</option>
                                            <option value="assign" > Assign</option>
                                        @elseif($all->talent_condition == "assign")
                                            <option value="assign" > Assign</option>
                                            <option value="quarantine" > Quarantine</option>
                                        @endif
                                    </select>

                                    <label for="text-input" class=" form-control-label">Start Career</label>
                                    <input value="{{$all->talent_start_career}}" type="text" id="talent_start_career" name="talent_start_career" placeholder="dd/mm/yyyy" class="form-control">

                                    <label for="text-input" class=" form-control-label">Level</label>
                                    <select name="talent_status" class="form-control">
                                        @if ($all->talent_level == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="undefined" > Undefined</option>
                                            <option value="junior" > Junior</option>
                                            <option value="middle" > Middle</option>
                                            <option value="senior" > Senior</option>
                                        @elseif($all->talent_level == "undefined")
                                            <option value="undefined" > Undefined</option>
                                            <option value="junior" > Junior</option>
                                            <option value="middle" > Middle</option>
                                            <option value="senior" > Senior</option>
                                        @elseif($all->talent_level == "junior")
                                            <option value="junior" > Junior</option>
                                            <option value="undefined" > Undefined</option>
                                            <option value="middle" > Middle</option>
                                            <option value="senior" > Senior</option>
                                        @elseif($all->talent_level == "middle")
                                            <option value="middle" > Middle</option>
                                            <option value="junior" > Junior</option>
                                            <option value="undefined" > Undefined</option>
                                            <option value="senior" > Senior</option>
                                        @elseif($all->talent_level == "senior")
                                            <option value="senior" > Senior</option>
                                            <option value="middle" > Middle</option>
                                            <option value="junior" > Junior</option>
                                            <option value="undefined" > Undefined</option>
                                        @endif
                                    </select>

                                    <label for="text-input" class=" form-control-label">Date Ready</label>
                                    <input value="{{$all->talent_date_ready}}" type="text" id="talent_date_ready" name="talent_date_ready" placeholder="" class="form-control">

                                    <label for="text-input" class=" form-control-label">Onsite Jakarta</label>
                                    <select name="talent_onsite_jakarta" id="talent_onsite_jakarta" class="form-control">
                                    @if ($all->talent_onsite_jakarta == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="yes" > Yes</option>
                                            <option value="no" > NO</option>
                                    @elseif($all->talent_onsite_jakarta == "Yes")
                                            <option value="yes" > Yes</option>
                                            <option value="no" > No</option>
                                    @elseif($all->talent_onsite_jakarta == "No")
                                            <option value="no" > No</option>
                                            <option value="yes" > Yes</option>
                                    @endif
                                    </select> 

                                    <label for="text-input" class=" form-control-label">Onsite Jogja</label>
                                    <select name="talent_onsite_jogja" id="talent_onsite_jogja" class="form-control">
                                    @if ($all->talent_onsite_jogja == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="yes" > Yes</option>
                                            <option value="no" > NO</option>
                                    @elseif($all->talent_onsite_jogja == "Yes")
                                            <option value="yes" > Yes</option>
                                            <option value="no" > No</option>
                                    @elseif($all->talent_onsite_jogja == "No")
                                            <option value="no" > No</option>
                                            <option value="yes" > Yes</option>
                                    @endif
                                    </select> 

                                    <label for="text-input" class=" form-control-label">Remote</label>
                                    <select name="talent_remote" id="talent_remote" class="form-control">
                                    @if ($all->talent_remote == NULL)
                                            <option value=""> Pilih</option>
                                            <option value="yes" > Yes</option>
                                            <option value="no" > NO</option>
                                    @elseif($all->talent_remote == "Yes")
                                            <option value="yes" > Yes</option>
                                            <option value="no" > No</option>
                                    @elseif($all->talent_remote == "No")
                                            <option value="no" > No</option>
                                            <option value="yes" > Yes</option>
                                    @endif
                                    </select> 


                                </div>
                                <div class="form-group col-md-6">
                                <!-- label for="text-input" class=" form-control-label">Skill</label>
                                    @push('script')
    
							<script src="{{url('template/upscale/js/tag.js')}}"></script>
		                    <link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">
		                    <script>
		                        $(document).ready(function()
		                        {
		                            $('.tagsInput').fastselect({

		                                valueDelimiter: ',',
		                                onItemSelect: function($item, itemModel) {
		                                    $(".fstChoiceRemove").html("x");
		                                    // $(".fstQueryInput").focus(); 
		                                },

		                            });
		                            
		                        });
		                        
		                    </script>

							@endpush


							<style type="text/css">
								.fstQueryInput  { padding: 0 }
								.fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
								.fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
							</style>
							<div style="margin: 10px;">
								<input
                                type="text"
                                onItemSelect="setClose()"
                                multiple
                                class="tagsInput form-control"
                                value=""
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                                placeholder="skill"
                                name="skill"
                                value="{{$all->talent_skill}}" id="talent_skill">
							</div> -->

                                    <label for="text-input" class=" form-control-label">Current Addres</label><br>
                                    <select value="" name="talent_current_address" id="talent_current_addres" class="js-example-basic-single form-control" style="width:100%">
                                    @if ($all->talent_current_address!=NULL)
                                        <option value="{{$all->talent_current_address}}">{{$all->talent_current_address}}</option>
                                    @endif
                                    @foreach($listKota as $kota)
                                        <option value="{{$kota->type." ".$kota->nama}}">{{$kota->type." ".$kota->nama}}</option>
                                    @endforeach
                                    </select><br>
                                    <label for="text-input" class=" form-control-label">Address</label>
                                    <input value="{{$all->talent_address}}" type="text" id="talent_address" name="talent_address"  placeholder="Your Current City" required="" class="form-control"> <br>
                                    <label for="text-input" class=" form-control-label">Prefered Location</label>
                                    <select value="" name="talent_prefered_location" id="talent_prefered_location" class="form-control" style="width:100%">
                                        @foreach ($locate as $location)
                                            <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                                        @endforeach
                                    </select><br>

                                    <label for="text-input" class=" form-control-label">Prefered City</label>
                                    <select value="" name="talent_prefered_city" id="talent_prefered_city" class="form-control" style="width:100%">
                                        @foreach ($locate as $location)
                                            <option value="{{$location->location_id}}">{{$location->location_name}}</option>
                                        @endforeach
                                    </select><br>

                                    <label for="text-input" class=" form-control-label">Recomendation Salary</label>
                                    <input value="{{$all->talent_salary}}" data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="rupiah" type="text" name="talent_salary" class="form-control" placeholder="Your expected salary" required="">
                                    <label for="text-input" class=" form-control-label">Lastest Salary</label>
                                    <input value="{{$all->talent_lastest_salary}}" data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="rupiah2" type="text" name="lastest_salary" class="form-control" placeholder="Lastest salary" required="">
                                    

                                    <label for="text-input" class=" form-control-label">Jakarta Salary</label>
                                    <input value="{{$all->talent_salary_jakarta}}" data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="rupiah2" type="text" name="talent_salary_jakarta" class="form-control" placeholder="Jakarta salary" required="">

                                    <label for="text-input" class=" form-control-label">Jakarta Salary</label>
                                    <input value="{{$all->talent_salary_jogja}}" data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="rupiah2" type="text" name="talent_salary_jogja" class="form-control" placeholder="Jogja salary" required="">

                                    <label for="text-input" class=" form-control-label">Expected Salary</label>
                                    <input value="{{$all->talent_rec_salary}}" data-a-sign="Rp. " data-a-dec="," data-a-sep="." id="rupiah3" type="text" name="recomendation_salary" class="form-control" placeholder="Recomendation salary" required="">
                                    <label for="text-input" class=" form-control-label">Total Experience</label>
                                    <input value="{{$all->talent_totalexperience}}" id="totalexperience" type="text" name="talent_totalexperience" class="form-control" placeholder="Total Experience Ex: 5 years" >
                                    <label for="text-input" class=" form-control-label">CV <span class="badge badge-secondary">.pdf Max 1MB</span></label><br>
                                    {{-- <div id="link_cv">
                                            <small>*Link </small><br>
                                            <input type="text" class="form-control" name="link_cv" placeholder="Link CV">
                                            <small>Or File </small><br>
                                    </div> --}}
                                    <input type="file" value="{{$all->talent_cv}}" id="talent_cv" name="talent_cv" placeholder="dd/mm/yyyy" class="form-control" accept=".pdf">
                                    <label for="text-input" class=" form-control-label">Portofolio <span class="badge badge-secondary">.pdf Max 1MB</span></label><br>
                                    <div id="link_portfolio">
                                        <small>Link </small><br>
                                        <input type="text" class="form-control" name="link_portfolio" id="link_portfolio" placeholder="Link Portfolio">
                                        <small>File </small><br>
                                    </div>
                                    <input type="file" value="{{$all->talent_portofolio_file}}" id="talent_portfolio" name="talent_portfolio" placeholder="dd/mm/yyyy" class="form-control" accept=".pdf">
                                    
                                    
                                   

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="pull-right">
                                    <button type="submit" id="save" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                {{--         <div class="tab-pane fade" id="v-pills-skill-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab">
                 <form  action="{{url('admin/talent/update/'.$all->talent_id)}}" method="post" >
                            {{csrf_field()}}
                 <div class="card">


                                  <div class="card-header">
                                    <strong>Edit Skill</strong>
                                  </div>
                                  <div class="card-body card-block">

                                    <div class="form-group col-md-6">

                                <label for="select" class=" form-control-label">Edit Skill</label>

                                <select name="multicheckbox[]" multiple="multiple"  class="form-control 3col active "  required="">
                                        @foreach($list_skill as $skill_field)
                                        <option value="{{ $skill_field->skill_id }}">{{ $skill_field->skill_name }}
                                        </option>
                                    @endforeach
                                </select>
                        <select id="multicheckboxx" multiple="multiple">
                            <option value="">d</option>
                            <option value="">d</option>
                            <option >d</option>
                            <option value="d"></option>
                        </select>
                                    </div>

                                  </div>
                                           <div class="card-footer">
                                        <div class="pull-right">
                                          <button type="button" id="save" class="btn btn-success">Save</button></div>
                                      </div>

                                </div>
                </form>
                </div>
                 --}}



            </div>








        </div>
        <!-- .animated -->

    </div>
    <!-- .content -->
</div>
<!-- /#right-panel -->



        <div class="modal fade" id="modal-edit-skill" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="judul-panjang">Edit Skill</h5>
                      <button type="button" id="close-edit-skill" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body substeps-modal">
                        <form method="post" id="f-edit-form" action="{{url('admin/talent/skill/update')}}" method="post">
                             {{ csrf_field() }}
                            <div class="form-group">
                            <label for="catatan">Skill</label>
                            <div class="input-group">
                                <input type="hidden" name="st_id" id="st_id">
                                <select name="skill_id" id="skill_id" class="form-control 3col active"  required="">
                                    @foreach($list_skill as $row)
                                        <option value="{{ $row->skill_id }}">{{$row->skill_name}} </option>
                                    @endforeach
                                </select>
                                <select name="level" class="form-control level_skill" id="level">
                                    <option value="Beginner">Beginner</option>
                                    <option value="Beginner-Intermediate">Beginner-Intermediate</option>
                                    <option value="Intermediate">Intermediate</option>
                                    <option value="Intermediate-Senior">Intermediate-Senior</option>
                                    <option value="Senior">Senior</option>
                                </select>
                                <input type="number" id="score_skill" name="score_skill" class="form-control" min="0" max="5">
                            </div>
                            <div class="modal-footer">
                                <!--<input type="submit" name="submit" data-dismiss="modal" class="btn btn-info" value="Insert" />-->
                                <input type="submit" name="submit" class="btn btn-info" value="Insert" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="judul-panjang">Talent Portfolio</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body substeps-modal">
                            <div id="datanya">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="workexdetail" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="judul-panjang">Work Experience</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body substeps-modal">
                            <div id="detailworkex">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-detail-certification" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="judul-panjang">Certification</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body substeps-modal">
                                <div id="lihat-certification">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal fade" id="editworkex" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="judul-panjang">Edit Work Experience</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body substeps-modal">
                                <div id="editworkexnya">
                                        <form method="post" id="form-workupdate" action="{{route('workex.update')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="workex_id" value="" id="idworkexperience">
                                            <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                                            <div class="form-group">
                                                <label for="catatan">Office</label>
                                                <input type="text" name="office" value="" id="office" placeholder="" class="form-control">

                                                <label for="catatan">Position</label>
                                                <input type="text" name="position" value="" id="position" placeholder="" class="form-control">

                                                <label for="catatan">Description</label>
                                                <textarea type="text" name="desc" class="form-control" id="editdescworkex"></textarea>

                                                <label for="catatan">Project Handle</label>
                                                <textarea name="handle" class="form-control" id="editprojecthandle"></textarea>
                                               
                                                <label for="catatan">Start</label>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select name="tanggal" id="tanggal" class="form-control">
                                                            <option value="0">Tanggal</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="bulan" id="bulan" class="form-control">

                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="tahun" id="tahun" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- <input type="month" name="startdate" class="form-control"> --}}

                                                <label for="catatan">End</label>
                                                <div class="row">
                                                        <div class="col-md-3">
                                                            <select name="tanggalend" id="tanggal2" class="form-control">
                                                                <option value="0">Tanggal</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select name="bulanend" id="bulan2" class="form-control">

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select name="tahunend" id="tahun2" class="form-control">

                                                            </select>
                                                        </div>
                                                    </div>
                                                <label for="catatan">Document Work Experience</label><br>
                                                <input value="" type="file" id="workex_file" name="workex_file" class="form-control" accept=".pdf">
                                                <small>Old File : <i id="oldfile"></i> </small>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modal-hapus-certification" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="judul-panjang">Delete Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body substeps-modal">
                                            <form method="post" id="deletecertif" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <center><h3>Apa Anda yakin untuk menghapusnya ?</h3><br><br>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deletecertif()" value="Submit">Delete</button><center>
                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-hapus-education" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="judul-panjang">Delete Confirmation</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body substeps-modal">
                                                <form method="post" id="deleteedu" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <center><h3>Apa Anda yakin untuk menghapusnya ?</h3><br><br>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="deleteedu()" value="Submit">Delete</button><center>
                                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                <div class="modal fade" id="deleteworkex" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="judul-panjang">Delete Confirmation</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body substeps-modal">
                                    <div id="editworkexnya">
                                            <form method="post" id="deleteForm" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="workexid" id="idworkexdelete" value="">
                                                <center><h3>Apa Anda yakin untuk menghapusnya ?</h3><br><br>
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()" value="Submit">Delete</button><center>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <div class="modal fade" id="editportfolio" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="judul-panjang">Edit Portfolio</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body substeps-modal">
                                <div id="dataeditnya">
                                        <form method="post" action="{{url('admin/talent/portfolio-update')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="portfol_id" value="" id="idportfolio">
                                            <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                                            <div class="form-group">
                                                <label for="catatan">Project Name</label>
                                                <input type="text" name="name" value="" placeholder="" id="name" class="form-control">
                                                <label for="catatan">Type Project</label> <br>
                                                <select name="typeproject" id="typeproject" class="form-control type-project" style="width:20%">
                                                        <option value="pribadi">Pribadi</option>
                                                        <option value="kantor">Kantor</option>
                                                    </select> <br>
                                                <label for="catatan">Company</label> <br>
                                                <input type="text" name="office" id="company" class="form-control" placeholder="Nama Office">
                                                <label for="catatan">Project Description</label>
                                                <textarea name="desc" class="form-control" id="descport"></textarea>
                                                <label for="catatan">Project Technology Used</label>
                                                <textarea name="tech" class="form-control" placeholder="Pisahkan dg koma pemisah teknologi" id="tech"></textarea>
                                                <label for="catatan">Portfolio Datestart</label>
                                                <div class="row">                            
                                                    <div class="col-md-3">
                                                        <select name="bulanaddport" id="bulanaddport1" class="form-control">
                                                            <option value="">Pilih</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="tahunaddport" id="tahunaddport1" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <label for="catatan">Portfolio Dateend</label>
                                                <div class="row">                            
                                                    <div class="col-md-3">
                                                        <select name="bulanaddportend" id="bulanaddportend1" class="form-control">
                                                            <option value="">Pilih</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="tahunaddportend" id="tahunaddportend1" class="form-control">

                                                        </select>
                                                    </div>
                                                </div>
                                                <label for="catatan">Project Portfolio</label>
                                                <input value="" type="file" id="portfolio_image" name="portfolio_image" class="form-control" accept="image/jpeg,image/png,image/gif">
                                                <label for="catatan">Project Portfolio Link</label>
                                                <input type="text" name="portfolio_link" id="linkporto" class="form-control" placeholder="Link Your Portfolio">
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


<div class="modal fade" id="modal-add-apply" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Add Apply</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <form method="post" id="save-apply">
                 {{ csrf_field() }}
        <div class="modal-body substeps-modal">
            <div class="form-group">
                <label for="catatan">Jobs</label>
                 <span id="error-apply"></span>
                <div class="input-group">
                    <select name="jobs_id"  class="form-control 3col active"  required="">
                        @foreach($jobs as $row)
                        <option value="{{ $row->jobs_id }}">{{$row->jobs_title}} - {{ $row->jobs_type_time }}
                        </option>
                    @endforeach
                </select>
            </div>
             <div class="input-group">
                    <select name="apply_status"   class="form-control 3col active"  required="">
                        <option value="unprocess">Unprocess</option>
                        <option value="interview">Interview</option>
                        <option value="offered">Offered</option>
                        <option value="hired">Hired</option>
                        <option value="rejected">Rejected</option>
                        <option value="testonline">Test Online</option>
                        <option value="keep">Keep</option>
                        <option value="ready">Ready</option>
                </select>
            </div>
                    <div class="input-group">
                    <select name="apply_location"   class="form-control 3col active"  required="">
                        <option value="Yogyakarta">Yogyakarta</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Malang">Malang</option>
                        <option value="Bandung">Bandung</option>

                </select>
            </div>
                <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
        </div>
    </form>
      </div>
    </div>

</div>


<div class="modal fade" id="modal-add-skill" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Add Skill</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body substeps-modal">
            <form method="post" id="insert_form">
                 {{ csrf_field() }}
            <div class="form-group">
                <span id="error"></span>
                <table class="table table-bordered" id="item_skill">
                    <tr>
                       <th>Item Skill</th>
                       <th>Level</th>
                       <th>Score</th>
                       <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="fa fa-plus"></span></button></th>
                      </tr>
                </table>
        </div>
        <div class="modal-footer">
            <input type="submit" name="submit" class="btn btn-info" value="Insert" />
        </div>
        </form>
      </div>
    </div>
</div>
</div>

<div class="modal fade" id="modal-add-portfolio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Add Portfolio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" action="{{url('admin/talent/portfolio-insert')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Project Name</label>
                        <input type="text" name="name" value="" placeholder="" class="form-control" required="">
                        <label for="catatan">Type Project</label> <br>
                        <select name="typeproject" class="form-control type-project" required="" style="width:20%">
                            <option value="pribadi">Pribadi</option>
                            <option value="kantor">Kantor</option>
                        </select> <br>
                        <label for="catatan">Company</label> <br>
                        <input type="text" name="office" class="form-control"  placeholder="Nama Office">
                        <label for="catatan">Project Description</label>
                        <textarea name="desc" class="form-control" ></textarea>

                        <label for="catatan">Project Technology Used</label>
                        <textarea name="tech" class="form-control"  placeholder="Pisahkan dg koma pemisah teknologi"></textarea>
                        <label for="catatan">Portfolio Datestart</label>
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanaddport" id="bulanaddport" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddport" id="tahunaddport" class="form-control" >

                                </select>
                            </div>
                        </div>
                        <label for="catatan">Portfolio Dateend</label>
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanaddportend" id="bulanaddportend" class="form-control" >
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddportend" id="tahunaddportend" class="form-control" >

                                </select>
                            </div>
                        </div>                        
                        <label for="catatan">Project Portfolio</label>
                        <input value="" type="file" id="portfolio_image" name="portfolio_image" class="form-control"  accept="image/jpeg,image/png,image/gif"><br>
                        <label for="catatan">Project Portfolio Link</label>
                        <input type="text" name="portfolio_link" class="form-control"  placeholder="Link Your Portfolio">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-add-education" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Add Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" action="{{route('education.add')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Education Level</label>
                        <select id="edu_level" name="edu_level" class="form-control" required="">
                            <option value="High School">High School</option>
                            <option value="Diploma">Diploma</option>
                            <option value="Bachelor Degree">Bachelor Degree</option>
                            <option value="Master">Master</option>
                            <option value="Other">other</option>
                        </select> <br>
                        <input type="text" name="edu_level_other" id="edu_level_other" class="form-control"  placeholder="Other">
                        <br>
                        <label for="catatan">Instituion Name</label> <br>
                        <input type="text" name="edu_name" placeholder="Nama Sekolah" class="form-control" required=""><br>
                        <label for="catatan">Education Field</label><br>
                        <textarea name="edu_field" class="form-control" ></textarea><br>
                        <label for="catatan">Education Datestart</label>
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanaddedu" id="bulanaddedu" class="form-control" >
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddedu" id="tahunaddedu" class="form-control" >                                    
                                </select>
                            </div>
                        </div>
                        <label for="catatan">Education Dateend</label>
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanaddeduend" id="bulanaddeduend" class="form-control" >
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddeduend" id="tahunaddeduend" class="form-control" >

                                </select>
                            </div>
                        </div>                        
                        <label for="catatan">Nilai IPK</label><br>
                        <input value="" type="text" name="edu_value" class="form-control" class="form-control" ><br>                        
                        <label for="catatan">Education File</label><br>
                        <input type="file" name="edu_file" class="form-control">                        
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-view-education" tabindex="-1" role="view" aria-hidden="view">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">View Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
            <form method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}" disabled>
                    <div class="form-group">
                        <label for="catatan">Education Level</label><br>
                        <p id="edu_level2view"></p>
                        <p id="edu_level_other2view"></p>
                        <br>
                        <label for="catatan">Education Name</label>
                        <p id="edu_nameview"></p>
                        <label for="catatan">Education Datestart</label>                      
                        <p id="edu_datestartview"></p>
                        <label for="catatan">Education Dateend</label>
                        <p id="edu_dateendview"></p>
                        <label for="catatan">Nilai IPK</label><br>
                        <p id="edu_valueview"></p>
                        <label for="catatan">Education Field</label><br>
                        <p id="edu_fieldview"></p>
                        <label for="catatan">Education File</label><br>
                    </div>

                <div id="viewedu">
                    <p id="viewedu2"></p>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-edit-education" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Edit Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" id="form-edit-edu" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Education Level</label>
                        <select id="edu_level2" name="edu_level" class="form-control">
                            <option value="high_school">High School</option>
                            <option value="diploma">Diploma</option>
                            <option value="bachelor_degree">Bachelor Degree</option>
                            <option value="master">Master</option>
                            <option value="other">other</option>
                        </select> <br>
                        <input type="text" name="edu_level_other" id="edu_level_other2" class="form-control" placeholder="Other">
                        <br>
                        <label for="catatan">Institution Name</label> <br>
                        <input type="text" name="edu_name" placeholder="Nama Sekolah" id="edu_name" class="form-control"><br>
                        <label for="catatan">Education Datestart</label>
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanaddedu" id="bulanaddedu1" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddedu" id="tahunaddedu1" class="form-control">

                                </select>
                            </div>
                        </div>
                        <label for="catatan">Education Dateend</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="bulanaddeduend" id="bulanaddeduend1" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahunaddeduend" id="tahunaddeduend1" class="form-control">

                                </select>
                            </div>
                        </div>                        
                        <label for="catatan">Nilai IPK</label><br>
                        <input value="" type="text" name="edu_value" class="form-control"class="form-control" id="edu_value"><br>
                        <label for="catatan">Education Field</label><br>
                        <textarea name="edu_field" class="form-control" id="edu_field"></textarea><br>
                        <label for="catatan">Education File</label><br>
                        <input type="file" name="edu_file"class="form-control">


                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-certification" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Add Certification </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" action="{{route('certification.add')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Certification Name</label> <br>
                        <input type="text" name="certif_name" placeholder="Nama Sertifikat" class="form-control" required="" ><br>
                        <label for="catatan">Certification Years</label> <br>
                        <input type="text" name="certif_years" placeholder="Tahun Sertifikat" class="form-control"  ><br>
                        <label for="catatan">Certification Company</label><br>
                        <input type="text" name="certif_company" placeholder="Perusahaan Penyelenggara"class="form-control"  ><br>
                        <label for="catatan">Certification Description</label><br>
                        <textarea name="certif_desc" class="form-control" ></textarea><br>
                        <label for="catatan">Certification Number</label><br>
                        <input type="text" name="certif_number"class="form-control"  ><br>
                        <label for="catatan">Certification Expired</label><br>                        
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanacertifex" id="bulancertifex" class="form-control" >
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahuncertifex" id="tahuncertifex" class="form-control" >                                    
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <label for="catatan">Certification File</label><br>
                        <input type="file" name="certif_file" class="form-control" accept=".pdf|.png|.jpg|.jpeg"><br>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-add-campus">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Campus</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{route('campus.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <strong>Tipe</strong> <br>
                    <select name="tipe" class="form-control">
                        <option value="PTN">PTN</option>
                        <option value="PTS">PTS</option>
                    </select>
                    <strong>Provinsi</strong> <br>
                    <input type="text" name="provinsi"  class="form-control" placeholder="Nama Provinsi">
                    <strong>Nama Campus</strong> <br>
                    <input type="text" name="namacampus" class="form-control" placeholder="Nama Campus">
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <div class="nav nav-pills pull-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
</div>

<div class="modal fade" id="modal-view-certification" tabindex="-1" role="view" aria-hidden="view">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">View Certification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <div id="viewcertif">

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-edit-certification" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Edit Certification </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" id="form-edit-certif" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Certification Name</label> <br>
                        <input type="text" name="certif_name" placeholder="Nama Sertifikat" class="form-control" id="certif_name"><br>
                        <label for="catatan">Certification Years</label> <br>
                        <input type="text" name="certif_years" placeholder="Tahun Sertifikat" class="form-control" id="certif_years" ><br>
                        <label for="catatan">Certification Company</label><br>
                        <input type="text" name="certif_company" placeholder="Perusahaan Penyelenggara"class="form-control" id="certif_company"><br>
                        <label for="catatan">Certification Description</label><br>
                        <textarea name="certif_desc" class="form-control" id="certif_desc"></textarea><br>
                        <label for="catatan">Certification Number</label><br>
                        <input type="number" name="certif_number"class="form-control" id="certif_number"><br>                        
                        <label for="catatan">Certification Expired</label><br>                        
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanacertifex" id="bulancertifex1" class="form-control">
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tanuncertifex" id="tahuncertifex1" class="form-control">                                    
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <label for="catatan">Certification File</label><br>
                        <input type="file" name="certif_file"class="form-control" id="certif_file" accept=".pdf"><br>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modal-add-workex" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-panjang">Add Work Experience</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body substeps-modal">
                <form method="post" id="form-workexadd" action="{{route('workex.insert')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
                    <div class="form-group">
                        <label for="catatan">Office</label>
                        <input type="text" name="office" value="" placeholder="" class="form-control" required="">

                        <label for="catatan">Position</label>
                        <input type="text" name="position" value="" placeholder="" class="form-control" required="">

                        <label for="catatan">Description</label>
                        <textarea name="desc" class="form-control"  id="adddescworkex" required=""></textarea>

                        <label for="catatan">Project Handle</label>
                        <textarea name="handle" class="form-control" id="addprojecthandle" required=""></textarea>
                        
                        <label for="catatan">Start</label>
                        <div class="row">
                            <div class="col-md-3">
                                <select name="tanggal" id="tanggaladd" class="form-control">
                                    <option value="0">Tanggal</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="bulan" id="bulanadd" class="form-control">

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahun" id="tahunadd" class="form-control">

                                </select>
                            </div>
                        </div>
                        {{-- <input type="month" name="startdate" class="form-control"> --}}

                        <label for="catatan">End</label>
                        <div class="row">
                                <div class="col-md-3">
                                    <select name="tanggalend" id="tanggalend" class="form-control">
                                        <option value="0">Tanggal</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="bulanend" id="bulanend" class="form-control">
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="tahunend" id="tahunend" class="form-control" >
                                    </select>
                                </div>
                            </div>
                        <label for="catatan">Document Work Experience</label>
                        <input value="" type="file" id="workex_file" name="workex_file" class="form-control"   accept=".pdf|.png|.jpg|.jpeg">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" class="btn btn-success" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>









{{-- <div class="modal fade" id="modal-add-apply" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Add Apply</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body substeps-modal">
            <div class="form-group">
                <label for="catatan">Jobs</label>
                <div class="input-group">
                    <select name="multicheckbox[]" multiple="multiple"  class="form-control 3col active"  required="">
                        @foreach($jobs as $row)
                        <option value="{{ $row->jobs_id }}">{{$row->jobs_title}} - {{ $row->jobs_type_time }}
                        </option>
                    @endforeach
                </select>
            </div>
                <input type="hidden" name="talent_id" value="{{$all->talent_id}}">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input rush" id="rush">
                <label class="custom-control-label" for="rush">Verified</label>
                <input type="hidden" name="rush" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id='batalkan-simpan-catatan' class="btn btn-danger" data-dismiss="modal">Save</button>
        </div>
      </div>
    </div>
</div> --}}

<div class="modal fade" id="modal-status" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Status Assign Talent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('talent.changestatusassign')}}" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
            <div class="modal-body substeps-modal">
                <input type="hidden" name="assign_id" id="assign_id" value="">
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="send_rt"></div></div>
                    <input type="text" class="form-control" value="1. Send Report Talent" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="review_rt"></div></div>
                    <input type="text" class="form-control" value="2. Review Report Talent" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="interviewing"></div></div>
                    <input type="text" class="form-control" value="3. Interviewing" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="report_interview"></div></div>
                    <input type="text" class="form-control" value="4. Report Interview" readonly="">
                </div>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="offering"></div></div>
                    <input type="text" class="form-control" value="5.a. Offering" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="hired"></div></div>
                    <input type="text" class="form-control" value="5.b. Hired" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="reject"></div></div>
                    <input type="text" class="form-control" value="5.c. Reject" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="cancel"></div></div>
                    <input type="text" class="form-control" value="5.d. Cancelled" readonly="">
                </div>
                <hr>
                <div class="input-group">
                    <div class="input-group-prepend "><div class="input-group-text ">Note</div></div>
                    <input type="text" class="form-control" name="note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='submit-status1' class="btn btn-success" data-dismiss="">Submit</button>
            </div>
        </form>
      </div>
    </div>

</div>

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
      <script src="{{asset('public/admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/yadcf/0.9.2/jquery.dataTables.yadcf.min.js"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
        <!--<script src="ckeditor/ckeditor.js"></script>-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>  -->


<script type="text/javascript">
    $(document).ready(function() {
                $('#data-education').DataTable();
              });
    $(document).ready(function() {
                $('#data-certification').DataTable();
              });
</script>

<script>
  var konten = document.getElementById("konten");
    CKEDITOR.replace(konten,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;

  var editdescworkex = document.getElementById("editdescworkex");
    CKEDITOR.replace(editdescworkex,{
    language:'en-gb'
  });
  CKEDITOR.config.allowedContent = true;
</script>

<script>
    var editprojecthandle = document.getElementById("editprojecthandle");
        CKEDITOR.replace(editprojecthandle,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;

    var addprojecthandle = document.getElementById("addprojecthandle");
        CKEDITOR.replace(addprojecthandle,{
        language:'en-gb'
    });
    CKEDITOR.config.allowedContent = true;
</script>

<script>
    var adddescworkex = document.getElementById("adddescworkex");
            CKEDITOR.replace(adddescworkex,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
</script>

<script type="text/javascript">
 $('#edu_level_other').hide();
$('#edu_level').on('change', function() {
  var edulevel = this.value;
  if(edulevel=="other"){
      $('#edu_level_other').show();
  }
  else{
    $('#edu_level_other').hide();
  }
});

$('#edu_level2').on('change', function() {
  var edulevel2 = this.value;
  if(edulevel2=="other"){
      $('#edu_level_other2').show();
  }
  else{
    $('#edu_level_other2').hide();
  }
});



$('#select').on('change', function() {
  var nilai = this.value;
  if(nilai=="no" || nilai=="asap"){
      $('#datereadynya').hide();
  }
  else{
    $('#datereadynya').show();
  }
});

$(document).ready(function(){
        var html = '';
            html += '<option value=""> Data Belum Ada</option>';
        var html2 ='';
            html2 +='<option value=""> Data Belum Ada</option>';
            $('.job-request').html(html);
            $('.location-request').html(html2);
    $('#company_id').change(function(){
      var id=$(this).val();
      console.log(id);
      var idtalent = $(this).data('idtalent');
        $.ajax({
            headers: {'csrftoken' : '{{ csrf_token() }}' },
            url : '/admin/talent/get/request/'+id+'/talent/'+idtalent,
            type : 'GET',
            dataType : 'json',
            success: function(data){
            var html = '';
            var html2 ='';
            var i;
                console.log(data);
                 if(data.length==0){
                        html += '<option value=""> Data Belum Ada</option>';
                        html2 +='<option value=""> Data Belum Ada</option>';
                    }else{
                        for(i=0; i<data.length; i++){
                            html += '<option value="' + data[i].cp_request+  '"> '+data[i].jobs_title+'</option>';
                            html2 +='<option value="' + data[i].location_id+  '"> '+data[i].location_name+'</option>';
                        }
                    }
                    // for(i=0; i<data.length; i++){
                    //     if(data[i].location_id == null){
                    //         html2 +='<option value=""> Data Belum Ada</option>';
                    //     }
                    //     else{
                    //         html2 +='<option value="' + data[i].location_id+  '"> '+data[i].location_name+'</option>';
                    //     }
                    // }
                    $('.job-request').html(html);
                    $('.location-request').html(html2);
            }
        });
    });
});



$(document).ready(function(){

$(".select-skill").select2({
    placeholder: "Select a state",
    allowClear: true
});

$(".skill_id").select2({
    placeholder: "Select a state",
    allowClear: true
});


 $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td><select name="skill_id[]" class="form-control select-skill skill_name">@foreach($list_skill as $row)<option value="{{ $row->skill_id }}">{{$row->skill_name}}</option> @endforeach</select></td>';
      html += '<td><select name="level[]" class="form-control level_skill"><option value="">Pilih Level</option><option value="beginner">Beginner</option><option value="Beginner-Intermediate">Beginner-Intermediate</option><option value="Intermediate">Intermediate</option><option value="Intermediate-Senior">Intermediate-Senior</option><option value="Senior">Senior</option></select></td>'
      html += '<td><input type="hidden" name="talent_id[]" value="{{$all->talent_id}}" class="talent_id" /><input type="number"  min="1" max="5" name="score_skill[]" class="form-control score_skill" /></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus"></span></button></td></tr>';
      $('#item_skill').append(html);
 });


$(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#insert_form').on('submit', function(event){
  event.preventDefault();
  var error = '';
      $('.skill_id').each(function(){
           var count = 1;
           if($(this).val() == '') {
            error += "<p>Enter Item Skill at "+count+" Row</p>";
            return false;
       }
            count = count + 1;
      });

      $('.level_skill').each(function(){
           var count = 1;
           if($(this).val() == '') {
            error += "<p>Enter Level Skill at "+count+" Row</p>";
            return false;
       }
            count = count + 1;
      });

      $('.score_skill').each(function(){
          var count = 1;
         if($(this).val() == '') {
            error += "<p>Enter Skill Score at "+count+" Row</p>";
            return false;
         }
       count = count + 1;
      });


      $('.talent_id').each(function(){
           var count = 1;
           if($(this).val() == ''){
            error += "<p>Select Unit at "+count+" Row</p>";
            return false;
       }
       count = count + 1;
      });

 var form_data = $(this).serialize();

     if(error == ''){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('talent.addskill')}}",
            method: "POST",
            dataType: 'json',
            data :form_data,
            success:function(response){
                console.log(response);
                     if(response['message'] == 'success'){
                      $('#item_skill').find("tr:gt(0)").remove();
                      $('#error').html('<div class="alert alert-success">Skill Saved</div>');
                      reload();
                }
            }
        });
      }
          else {
                 $('#error').html('<div class="alert alert-danger">'+error+'</div>');
          }
 });


});

$(".filter-skill").select2({
    width: 'resolve' ,// need to override the changed default,

     ropdownAutoWidth : true,
    placeholder: 'Filter by Skill',
});

    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 1,
            placeholder: 'Filter by skill',
            search: true,
            searchOptions: {
                'default': 'Search Skill'
            },
            selectAll: true
        });
    });

 $('#save-apply').on('submit', function(event){
  event.preventDefault();

 var form_data = $(this).serialize();
  var error = '';
     if(error == ''){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('talent.addapply')}}",
            method: "POST",
            dataType: 'json',
            data :form_data,
            success:function(response){
                console.log(response);
                     if(response['message'] == 'success'){
                      $('#error-apply').html('<div class="alert alert-success">Apply has added</div>');
                      reload();
                }
            }
        });
      }
          else {
                 $('#error').html('<div class="alert alert-danger"></div>');
          }
 });


 $('#save-assign').on('submit', function(event){
  event.preventDefault();
 var form_data = $(this).serialize();
  var error = '';
     if(error == ''){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{ route('talent.addassign')}}",
            method: "POST",
            dataType: 'json',
            data :form_data,
            success:function(response){
                console.log(response);
                     if(response['message'] == 'success'){
                      $('#error-assign').html('<div class="alert alert-success">Assign has been registered</div>');
                      reload();
                }
            }
        });
      }
          else {
                 $('#error').html('<div class="alert alert-danger"></div>');
          }
 });
 
    $('#f-edit-form').on('submit', function(event){
        event.preventDefault();
        var form_data = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url:"{{url('admin/talent/skill/update')}}",
            method: "POST",
            dataType: 'json',
            data :form_data,
            beforeSend: function() {
                $('#modal-edit-skill').fadeOut();
                $('.modal-backdrop').fadeOut();
                $('.modal-open').css({'overflow': 'visible'});
                $('#error2').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Loading!</strong> Updating Skill</div>');
            },
            success:function(response){
                console.log(response);
                if(response['message'] == 'success'){
                    $('#error2').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Skill saved.</div>');
                    reload();
                } else { alert('gagal'); }
            },
            error: function(xhr) { // if error occured
                $('#error2').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>KAYAKNYA Success!</strong> Skill saved.</div>');
                reload();
            }
        });
    });
    
    
    // $('#form-workexadd').on('submit', function(event){
    //     event.preventDefault();
    //     var form_data = $(this).serialize();
    //     // var form_data = new FormData(this);
    //     $.ajax({
    //         headers    : { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
    //         url        : "{{route('workex.insert')}}",
    //         method     : "POST",
    //         dataType   : 'json',
    //         data       : form_data,
    //         cache      : false,
    //         contentType: false,
    //         beforeSend: function() {
    //             $('#modal-add-workex').fadeOut();
    //             $('.modal-backdrop').fadeOut();
    //             $('.modal-open').css({'overflow': 'visible'});
    //             $('#message-workex').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Loading!</strong> Updating Work Experience</div>');
    //         },
    //         success:function(response){
    //             console.log(response);
    //             if(response['message'] == 'success'){
    //                 $('#message-workex').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Work Experience saved.</div>');
    //                 reload();
    //             } else { alert('gagal'); }
    //         },
    //         error: function(xhr) { // if error occured
    //             // $('#message-workex').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>KAYAKNYA Success!</strong> Work Experience saved.</div>');
    //             $('#message-workex').html(xhr);
    //             reload();
                
    //         }
    //     });
    // });
    

$(document).on('click', '#delete', function(){
    var id = [];
    swal({
          title: 'Delete',
          text: 'Are you sure to delete this data?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel'
        }).then((result) =>
        {
            if (result.value)
            {

                $('.checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('jobsapply.delete')}}",
                            method: "get",
                            data :{id:id},
                            success:function(response)
                            {
                                if(response == 'deleted'){
                                swal('Success','Data deleted','success');
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }

        });
});



$(document).on('click', 'a[href="#skill-action"]', function(e){
        var score_skill = $(this).data('skillscore');
        var skill_id = $(this).data('idskill');
        var st_id = $(this).data('stid');
        var level_skill = $(this).data('levelskill');
        $('#st_id').val(st_id);
        $('#score_skill').val(score_skill);
        $('#skill_id').val(skill_id).trigger('change');
        $('#level').val(level_skill).trigger('change');
});


var skillFirstTime = true;
var tab_active;
var table_skill;
$(document).on('click', 'a[href="#v-pills-profile"]', function(e){
     $.fn.dataTable.ext.classes.sPageButton = 'btn btn-xs';
    tab_active = "data-skill";
    if(skillFirstTime){
        table_skill = $('#data-skill').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            pageLength: 20,
            ajax:{
                url:"{{ route('talent.skill') }}",
                type:"GET",
                data : { id : {{$all->talent_id}}, }
            },
            columns:[
            {data:"nama_skill",defaultColumn:"-",visible:true},
            {data:"date_verified",defaultColumn:"-",visible:true},
            {data:"score_skill",defaultColumn:"-",visible:true},
            {data:"sc_name", defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        skillFirstTime = false;
    } else {
        reload();
    }
});


 $('#job-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var type = $('#job-type').val()
    if(type == 'all')
    reload();
    table.columns(3).search( this.value ).draw();
});

 $('#verified-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var type = $('#verified-type-default').val()
    if(type == 'all')
    reload_skill();
    table.columns(0).search( this.value ).draw();
});

 function reload_skill(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#verified-type-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}



 $('#company-type').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var type = $('#company-type-default').val()
    if(type == 'all')
    reload_assign();
    table.columns(0).search( this.value ).draw();
});

 $('#location-job-request-default').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var type = $('#location-job-request-default').val()
    if(type == 'all')
    reload_assign();
    table.columns(2).search( this.value ).draw();
});


 function reload_assign(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#company-type-default").attr('selected', true);
    $("#location-job-request-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}



 $('#position').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#job-position').val()
    if(position == 'all')
    reload();
    table.columns(1).search( this.value ).draw();
});

function reload(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#job-position-default").attr('selected', true);
    $("#job-type-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}



 $('#category-apply').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#category-apply').val()
    if(position == 'all')
    reload_apply();
    table.columns(2).search( this.value ).draw();
});

 $('#location-apply').on('change', function () {
    var table = $("#"+tab_active).DataTable();
    var position = $('#location-apply').val()
    if(position == 'all')
    reload_apply();
    table.columns(1).search( this.value ).draw();
});


function reload_apply(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    $("#category-apply-default").attr('selected', true);
    $("#location-apply-default").attr('selected', true);
    $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}


var assignFirstTime = true;
var table_assign;
var tab_active;
$(document).on('click', 'a[href="#v-pills-talent"]', function(e){
    tab_active = "data-assign";
    if(assignFirstTime){
        table_assign = $('#data-assign').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{ route('talent.assigndata') }}",
                // url:'/admin/talent/assignTalent',
                type:"GET",
                data : {
                    id : {{$all->talent_id}},
                     }
            },
            columns:[
            {data:"nama_company",defaultColumn:"-",visible:true},
            {data:"request_detail", defaultColumn:"-",visible:true},
            {data:"location_name", defaultColumn:"-",visible:true},
            {data:"jobs_title", defaultColumn:"-",visible:true},
            {data:"assign_status", defaultColumn:"-",visible:true},     
            {data:"action",orderable:false,searchable:false},
            ]
        });
  
        assignFirstTime = false;
    } else {
        reload();
    }
});




    var applyFirstTime = true;
    var table_apply;
    $(document).on('click', 'a[href="#v-pills-apply"]', function(e){
        tab_active = "data-apply";
        if(applyFirstTime){
            table_apply = $('#data-apply').DataTable({
                autoWidth:false,
                filter:false,
                info:false,
                paging:false,
                processing:false,
                ajax:{
                    url:"{{ route('talent.apply') }}",
                    type:"GET",
                    data : {
                        id : {{$all->talent_id}},
                         }
                },
                columns:[
                {data:"jobs_name",defaultColumn:"-",visible:true},
                {data:"jobs_apply_location", defaultColumn:"-",visible:true},
                {data:"jobs_apply_status", defaultColumn:"-",visible:true},
                {data:"jobs_apply_date", defaultColumn:"-",visible:true},
                {data:"action",orderable:false,searchable:false},
                ]
            });
            applyFirstTime = false;
        } else {
            reload();
        }
    });


    var portoFirstTime = true;
    var table_porto;
    $(document).on('click', 'a[href="#v-pills-portfolio"]', function(e){
        tab_active = "data-portfolio";
        if(portoFirstTime){
            table_porto = $('#data-portfolio').DataTable({
                autoWidth:false,
                filter:true,
                info:false,
                paging:true,
                processing:false,
                ajax:{
                    url:"{{ route('portfolio.talent') }}",
                    type:"GET",
                    data : {
                            id : {{$all->talent_id}},
                         }
                },
                columns:[
                {data:"portfolio_name",defaultColumn:"-",visible:true},
                {data:"portfolio_desc", defaultColumn:"-",visible:true},
                {data:"portfolio_tech", defaultColumn:"-",visible:true},
                {data:"portfolio_date_created", defaultColumn:"-",visible:true},
                {data:"action",orderable:false,searchable:false},
                ]
            });
            portoFirstTime = false;
        } else {
            reload();
        }
    });


    var workExtime = true;
    var tab_active;
    var table_workex;
    $(document).on('click', 'a[href="#v-pills-experience"]', function(e){
        tab_active = "data-workex";
        if(workExtime){
            table_workex = $('#data-workex').DataTable({
                autoWidth:false,
                filter:true,
                info:false,
                paging:true,
                processing:false,
                ajax:{
                    url:"{{ route('workex.talent') }}",
                    type:"GET",
                    data : {
                            id : {{$all->talent_id}},
                    }
                },
                columns:[
                // {data:"workex_office",defaultColumn:"-",visible:true},
                // {data:"workex_position", defaultColumn:"-",visible:true},
                // {data:"workex_desc", defaultColumn:"-",visible:true},
                // {data:"workex_startdate", defaultColumn:"-",visible:true},
                // {data:"workex_enddate", defaultColumn:"-",visible:true},
                {data:"workex_office", visible:true},
                {data:"workex_position", visible:true},
                {data:"workex_desc", visible:true},
                {data:"workex_startdate", visible:true},
                {data:"workex_enddate", visible:true},
                {data:"action",orderable:false,searchable:false},
                ]
            });
            workExtime = false;
        } else {
            reload();
        }
    });


    $(document).ready(function(){
        var tanggal_lahir = "{{$all->talent_birth_date}}";
        $('#ttl').text("{{$all->talent_place_of_birth}}" + ", " + moment(tanggal_lahir, 'YYYY-MM-DD, h:m:s').locale('id').format('MMMM Do YYYY'));
        $('#jobs_apply_expected_salary').autoNumeric('init');
        $('#jobs_apply_expected_salary').autoNumeric('set', "{{$all->talent_salary}}");
    });

     $(function() {
       $('#talent_birth_date').datetimepicker({
        'format' : "DD/MM/YYYY",
        });
     });



    $(document).on('click', '#save', function(){

    var talent_name           = $('#talent_name');
    var talent_email          = $('#talent_email');
    var talent_phone          = $('#talent_phone');
    var talent_condition      = $('#talent_condition');
    var talent_gender         = $('#talent_gender');
    var talent_salary         = $('#talent_salary');
    var talent_totalexperience         = $('#talent_totalexperience');
    var talent_birth_date     = $('#talent_birth_date');
    var talent_place_of_birth = $('#talent_place_of_birth');
    var talent_address        = $('#talent_address');
    var talent_rt_status      = $('#talent_rt_status');


        swal({
                  title: 'Save Talent?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Save',
                  cancelButtonText: 'Cancel',
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                    }).then((result) =>
                        {
                            if (result.value)
                            {
                                $('#simpantalent-form').submit();
                            }
                        });

    });

    $(document).on('click', '#save-skill', function(){

        swal({
                  title: 'Save Skill?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Save',
                  cancelButtonText: 'Cancel',
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                    }).then((result) =>
                        {
                            if (result.value)
                            {
                                $('#skill-edit-form').submit();
                            }
                        });

    });

    $(document).on('click', 'a[href="#verified-skill"]', function(){

        swal({
                  title: 'Verified skill?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Save',
                  cancelButtonText: 'Cancel',
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                    }).then((result) =>
                        {
                            if (result.value)    {
                                var id = $(this).data('verifiedskill');
                                $.ajax({
                                    url:"{{ route('talent.skillverified')}}",
                                    method: "GET",
                                    data :{id:id},
                                    success:function(response)
                                    {
                                     if(response == 'verified'){
                                swal('Success','Data deleted','success');
                                 }
                                 reload();
                                    }
                                });
                            }
                            else{
                                swal('Error', 'Please select some data', 'error');
                            }
                        });

    });

</script>


<script type="text/javascript">



$(document).on('click', '.tambah_skill', function(e){

          $option= $('#multicheckboxx option');
          var jobs_apply_id = $('input[name="jobs_apply_id"]').val();
         var catatan = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"http://localhost:8000/admin/talent/talentskill/{{$all->talent_id}}",
        type: 'GET',
        dataType: 'json',

        success:function(response)
            {
            response.forEach(function (d) {
                $option.filter('[value="'+d.skill_id+'"]').prop('selected', true);
                console.log(d.skill_id);
                });
        }
    });
});


    $(document).on('click', '.delete-skill', function(e){
        var id = $(this).data('id');
        var result = confirm("Want to delete?");
        if (result) {
            // alert('bercanda wkwk');
            $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/deleteskill/?id='+id,
                type:'GET',
                dataType:'json',
                beforeSend: function() {
                    $('#error2').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Loading!</strong> Deleting Skill</div>');
                },
                success:function(response){
                    console.log(response);
                    if(response['message'] == 'deleted'){
                        $('#error2').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Skill saved.</div>');
                        reload();
                    } else { alert('gagal'); }
                }
          });
        }
    });

    $(document).on('click', '.delete-workex', function(e){
        var id = $(this).data('workexdel');
        var result = confirm("Want to delete?");
        if (result) {
            $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/workex-delete/?id='+id,
                type:'GET',
                dataType:'json',
                beforeSend: function() {
                    $('#message-workex').html('<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Loading!</strong> Deleting Work Experience</div>');
                },
                success:function(response){
                    console.log(response);
                    if(response['message'] == 'deleted'){
                        $('#message-workex').html('<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Work Experience saved.</div>');
                        reload();
                    } else { alert('gagal'); }
                }
          });
        }
    });




</script>

   <script type="text/javascript">
    $(document).ready(function() {
        $('#fullfeatures').DataTable({
                // drawcallback adalah fungsi yang dipanggila setiap kali mengaktifkan datatble
          "drawCallback": function( settings ) {
                    //parent() untuk menyeleksi parent dari element.
                  if(!$("#fullfeatures").parent().hasClass("table-is-responsive")){
                        // .wrap() fungsi untuk menambah element html
                      $("#fullfeatures").wrap('<div class="table-is-responsive"></div>');
                  }
              }
        });
    });
</script>
    <script type="text/javascript">

        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah          = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>

    <script type="text/javascript">

        var rupiah2 = document.getElementById('rupiah2');
        rupiah2.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah2.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah2             = split[0].substr(0, sisa),
            ribuan2             = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah2 += separator + ribuan.join('.');
            }

            rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
            return prefix == undefined ? rupiah2 : (rupiah2 ? 'Rp. ' + rupiah2 : '');
        }
    </script>

    <script type="text/javascript">

        var rupiah3 = document.getElementById('rupiah3');
        rupiah3.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah3.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split           = number_string.split(','),
            sisa            = split[0].length % 3,
            rupiah3             = split[0].substr(0, sisa),
            ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah3 += separator + ribuan.join('.');
            }

            rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
            return prefix == undefined ? rupiah3 : (rupiah3 ? 'Rp. ' + rupiah3 : '');
        }
    </script>

    <script>

       $('#talent_birth_date').datetimepicker({
        'format' : "DD/MM/YYYY",
        });
    </script>
    <script type="text/javascript">
        $('.js-example-basic-single').select2();
    </script>

    <script type="text/javascript">
        $('.campus2').select2({
            width :'100%',
            language : {
                noResults : function () {
                    return '<button data-toggle="modal" data-target="#modal-add-campus" type="button" class="btn btn-primary">Add Campus</button>';
                },
            },
            escapeMarkup: function(markup) {
                return markup;
            },
        });
    </script>

    <script>
        $(document).on('click','a[href="#v-pills-edit"]', function (e) {
           var dataid = $(this).data('idtalentnih'); 
           $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/detailtalent/'+dataid,
                type:'GET',
                dataType:'json',
                success:function(data){
                  $('.campus2 option[value="'+data.talent_campus+'"]').prop('selected', true);         
                  $('#talent_prefered_location option[value="'+data.talent_prefered_location+'"]').prop('selected', true);                           
                }
           });
        });        
    </script>

    <script type="text/javascript">
        $('.type-project').select2();
    </script>
    <script type="text/javascript">
        $('.company-project').select2();
    </script>
    <script>
        $(document).on('click','a[href="#talent-portfolio"]', function(e){
            var idport = $(this).data('idport');
            console.log(idport);
            $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/portfoliodetail/'+idport,
                type:'GET',
                dataType:'json',
                success:function(data){
                        var html = '';
                        var startdate = new Date(data.portfolio_startdate);
                        var startmonth = startdate.getMonth();
                        var startyear = startdate.getFullYear();
                        var enddate = new Date(data.portfolio_enddate);
                        var endmonth = enddate.getMonth();
                        var endyear = enddate.getFullYear();
                        if(data.portfolio_date_updated!==null){
                            var url = 'storage/app/public/Project Portfolio/Update Porject Portfolio/'+data.portfolio_image;
                            if (data.portfolio_namacompany==null && data.portfolio_tipe_project==null) {
                                html += '<strong>Talent Name</strong> : '+data.talent_name+'<br>';
                                html += '<strong>Project Name</strong> : '+data.portfolio_name+'<br>';
                                html += '<strong>Type Project</strong> : - <br>';
                                html += '<strong>Company Name</strong> : - <br>';
                                html += '<strong>Project Description</strong> : '+data.portfolio_desc+'<br>';
                                html += '<strong>Technology </strong> : '+data.portfolio_tech+'<br>';
                                html += '<strong>Start </strong> : '+data.portfolio_startdate+'<br>';
                                html += '<strong>End </strong> : '+data.portfolio_enddate+'<br>';
                                if (data.portfolio.link==null) {
                                    html += '<strong>Portfolio link</strong> : - <br>';
                                } else {
                                    html += '<strong>Type Project</strong> :'+data.portfolio_link+'';
                                }
                                $('#datanya').append(html);
                                $('#datanya').append('<img src="'+url+'" width="100%">');


                                $("#mymodal").on("hidden.bs.modal", function() {
                                    $("#datanya").html("");
                                });
                            }else{
                                html += '<strong>Talent Name</strong> : '+data.talent_name+'<br>';
                                html += '<strong>Project Name</strong> : '+data.portfolio_name+'<br>';
                                html += '<strong>Type Project</strong> :'+data.portfolio_tipe_project+'<br>';
                                html += '<strong>Company Name</strong> :'+data.portfolio_namacompany+'<br>';
                                html += '<strong>Project Description</strong> : '+data.portfolio_desc+'<br>';
                                html += '<strong>Technology </strong> : '+data.portfolio_tech+'<br>';
                                html += '<strong>Start </strong> : '+data.portfolio_startdate+'<br>';
                                html += '<strong>End </strong> : '+data.portfolio_enddate+'<br>';
                                if (data.portfolio.link==null) {
                                    html += '<strong>Portfolio link</strong> : - <br>';
                                } else {
                                    html += '<strong>Type Project</strong> :'+data.portfolio_link+'';
                                }
                                $('#datanya').append(html);
                                $('#datanya').append('<img src="'+url+'" width="100%">');
                                $("#mymodal").on("hidden.bs.modal", function() {
                                    $("#datanya").html("");
                                });
                            }
                        }else{
                            var url = 'storage/app/public/Project Portfolio/'+data.portfolio_image;
                            if (data.portfolio_namacompany==null && data.portfolio_tipe_project==null) {
                                html += '<strong>Talent Name</strong> : '+data.talent_name+'<br>';
                                html += '<strong>Project Name</strong> : '+data.portfolio_name+'<br>';
                                html += '<strong>Type Project</strong> : - <br>';
                                html += '<strong>Company Name</strong> : - <br>';
                                html += '<strong>Project Description</strong> : '+data.portfolio_desc+'<br>';
                                html += '<strong>Technology </strong> : '+data.portfolio_tech+'<br>';
                                html += '<strong>Start </strong> : '+data.portfolio_startdate+'<br>';
                                html += '<strong>End </strong> : '+data.portfolio_enddate+'<br>';
                                if (data.portfolio.link==null) {
                                    html += '<strong>Portfolio link</strong> : - <br>';
                                } else {
                                    html += '<strong>Type Project</strong> :'+data.portfolio_link+'';
                                }
                                $('#datanya').append(html);
                                $('#datanya').append('<img src="'+url+'" width="100%">');

                                $("#mymodal").on("hidden.bs.modal", function() {
                                    $("#datanya").html("");
                                });
                            }else{
                                html += '<strong>Talent Name</strong> : '+data.talent_name+'<br>';
                                html += '<strong>Project Name</strong> : '+data.portfolio_name+'<br>';
                                html += '<strong>Type Project</strong> :'+data.portfolio_tipe_project+'<br>';
                                html += '<strong>Company Name</strong> :'+data.portfolio_namacompany+'<br>';
                                html += '<strong>Project Description</strong> : '+data.portfolio_desc+'<br>';
                                html += '<strong>Technology </strong> : '+data.portfolio_tech+'<br>';
                                html += '<strong>Start </strong> : '+data.portfolio_startdate+'<br>';
                                html += '<strong>End </strong> : '+data.portfolio_enddate+'<br>';
                                if (data.portfolio.link==null) {
                                    html += '<strong>Portfolio link</strong> : - <br>';
                                } else {
                                    html += '<strong>Type Project</strong> :'+data.portfolio_link+'';
                                }
                                $('#datanya').append(html);
                                $('#datanya').append('<img src="'+url+'" width="100%">');


                                $("#mymodal").on("hidden.bs.modal", function() {
                                    $("#datanya").html("");
                                });
                            }
                        }
                }
            })
        });

        $(document).on('click','a[href="#edit-portfolio"]', function(e){
            var idportfol = $(this).data('idportfol');
            $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/portfoliodetail/'+idportfol,
                type:'GET',
                dataType:'json',
                success:function(data){
                    var splitstart = data.portfolio_startdate.split(" ");
                        var splitend = data.portfolio_enddate.split(" ");                        
                        var bulan =document.getElementById('bulanaddport1');
                        var tanggal =document.getElementById('tanggaladdport1');                        
                        var bulan2 =document.getElementById('bulanaddportend1');
                        var tanggal2 =document.getElementById('tanggaladdportend1');
                        var nama = data.portfolio_name;
                        var descport = data.portfolio_desc;
                        var tech = data.portfolio_tech;
                        var idportfol = data.portfolio_id;
                        $('#idportfolio').val(idportfol);
                        if (splitstart[0]==null||splitend[0]==null) {
                            $('#name').val(nama);
                            $('#descport').val(descport);
                            $('#tech').val(tech);
                            $('#typeproject option[value="'+data.portfolio_type_project+'"]').prop('selected', true);
                            $('#company').val(data.portfolio_namacompany);
                            $('#tahunaddport1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                            $('#tahunaddportend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                            $('#linkporto').val(data.portfolio_link);
                        } else {
                            $('#name').val(nama);
                            $('#descport').val(descport);
                            $('#tech').val(tech);
                            $('#typeproject option[value="'+data.portfolio_type_project+'"]').prop('selected', true);
                            $('#company').val(data.portfolio_namacompany);
                            $('#bulanaddport1 option[value="'+splitstart[0]+'"]').prop('selected', true);
                            $('#tahunaddport1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                            $('#bulanaddportend1 option[value="'+splitend[0]+'"]').prop('selected', true);
                            $('#tahunaddportend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                            $('#linkporto').val(data.portfolio_link);
                        }                        
                        // console.log(idportfol);                        
                }
            })
        });
    </script>
    <script>
        var tanggal = document.getElementById('tanggal');
        var bulan = document.getElementById('bulan');
        var tahun = document.getElementById('tahun');
        for (var i = 1; i<=31; i++){
            var opt = document.createElement('option');
            opt.value = i;
            opt.innerHTML = i;
            tanggal.appendChild(opt);
        }
        var bul = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        for(var j = 0; j<12; j++){
            var optb = document.createElement('option');
            optb.value = bul[j];
            optb.innerHTML=bul[j];
            bulan.appendChild(optb);
        }
        var minYear = new Date().getFullYear()-20;
        var maxYear = minYear+50;
        for(var h=minYear; h<=maxYear; h++){
            var optt = document.createElement('option');
            optt.value = h;
            optt.innerHTML = h;
            tahun.appendChild(optt);
        }

    </script>

    <script>
            var tanggaladd = document.getElementById('tanggaladd');
            var bulanadd = document.getElementById('bulanadd');
            var tahunadd = document.getElementById('tahunadd');
            for (var iadd = 1; iadd<=31; iadd++){
                var optadd = document.createElement('option');
                optadd.value = iadd;
                optadd.innerHTML = iadd;
                tanggaladd.appendChild(optadd);
            }
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }             

    </script>

    <script>
            var tanggal = document.getElementById('tanggal2');
            var bulan = document.getElementById('bulan2');
            var tahun = document.getElementById('tahun2');
            for (var i = 1; i<=31; i++){
                var opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = i;
                tanggal.appendChild(opt);
            }
            var bul = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var j = 0; j<12; j++){
                var optb = document.createElement('option');
                optb.value = bul[j];
                optb.innerHTML=bul[j];
                bulan.appendChild(optb);
            }
            var minYear = new Date().getFullYear()-20;
            var maxYear = minYear+50;
            for(var h=minYear; h<=maxYear; h++){
                var optt = document.createElement('option');
                optt.value = h;
                optt.innerHTML = h;
                tahun.appendChild(optt);
            }

        </script>

<script>
        var tanggalend = document.getElementById('tanggalend');
        var bulanend = document.getElementById('bulanend');
        var tahunend = document.getElementById('tahunend');
        for (var i = 1; i<=31; i++){
            var optend = document.createElement('option');
            optend.value = i;
            optend.innerHTML = i;
            tanggalend.appendChild(optend);
        }
        var bulend = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        for(var j = 0; j<12; j++){
            var optbend = document.createElement('option');
            optbend.value = bulend[j];
            optbend.innerHTML=bulend[j];
            bulanend.appendChild(optbend);
        }
        var minYearend = new Date().getFullYear()-20;
        var maxYearend = minYearend+50;
        for(var h=minYearend; h<=maxYearend; h++){
            var opttend = document.createElement('option');
            opttend.value = h;
            opttend.innerHTML = h;
            tahunend.appendChild(opttend);
        }

    </script>


        <script>
            $(document).on('click','a[href="#talent-workex"]', function(e){
                var idworkex = $(this).data('workex');
                console.log(idworkex);
                $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/talent/workexdetail/'+idworkex,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                            var splitstart = data.workex_startdate.split(" ");
                            var splitend = data.workex_enddate.split(" ");
                            if(splitstart[0]==0&&splitend[0]==0){
                                if (data.workex_updated_date==null) {
                                    var html = '';
                                    var url = 'storage/app/public/Work Experience/'+data.workex_file;
                                    html += '<strong>Name</strong> : '+data.talent_name+'<br>';
                                    html += '<strong>Office</strong> : '+data.workex_office+'<br>';
                                    html += '<strong>Position</strong> : '+data.workex_position+'<br>';
                                    html += '<strong>Description</strong> : '+data.workex_desc+'<br>';
                                    html += '<strong>Project Handle </strong> : '+data.workex_handle_project+'<br>';
                                    html += '<strong>Start Date </strong> : '+splitstart[1]+" "+splitstart[2]+'<br>';
                                    html += '<strong>End Date </strong> : '+splitend[1]+" "+splitend[2]+'<br>';
                                    html += '<strong>Document</strong> :';
                                    $('#detailworkex').append(html);
                                    $('#detailworkex').append('<iframe src="'+url+'" width="100%" height="650px">');
                                }else{
                                    var html = '';
                                    var url = 'storage/app/public/Work Experience/Update Work Experience/'+data.workex_file;
                                    html += '<strong>Name</strong> : '+data.talent_name+'<br>';
                                    html += '<strong>Office</strong> : '+data.workex_office+'<br>';
                                    html += '<strong>Position</strong> : '+data.workex_position+'<br>';
                                    html += '<strong>Description</strong> : '+data.workex_desc+'<br>';
                                    html += '<strong>Project Handle </strong> : '+data.workex_handle_project+'<br>';
                                    html += '<strong>Start Date </strong> : '+splitstart[1]+" "+splitstart[2]+'<br>';
                                    html += '<strong>End Date </strong> : '+splitend[1]+" "+splitend[2]+'<br>';
                                    html += '<strong>Document</strong> :';
                                    $('#detailworkex').append(html);
                                    $('#detailworkex').append('<iframe src="'+url+'" width="100%" height="650px">');
                                }
                            }else{
                                if (data.workex_updated_date==null) {
                                    var html = '';
                                    var url = 'storage/app/public/Work Experience/'+data.workex_file;
                                    html += '<strong>Name</strong> : '+data.talent_name+'<br>';
                                    html += '<strong>Office</strong> : '+data.workex_office+'<br>';
                                    html += '<strong>Position</strong> : '+data.workex_position+'<br>';
                                    html += '<strong>Description</strong> : '+data.workex_desc+'<br>';
                                    html += '<strong>Project Handle </strong> : '+data.workex_handle_project+'<br>';
                                    html += '<strong>Start Date </strong> : '+splitstart[1]+" "+splitstart[2]+'<br>';
                                    html += '<strong>End Date </strong> : '+splitend[1]+" "+splitend[2]+'<br>';
                                    html += '<strong>Document</strong> :';
                                    $('#detailworkex').append(html);
                                    $('#detailworkex').append('<iframe src="'+url+'" width="100%" height="650px">');
                                }else{
                                    var html = '';
                                    var url = '/storage/app/public/Work Experience/Update Work Experience/'+data.workex_file;
                                    html += '<strong>Name</strong> : '+data.talent_name+'<br>';
                                    html += '<strong>Office</strong> : '+data.workex_office+'<br>';
                                    html += '<strong>Position</strong> : '+data.workex_position+'<br>';
                                    html += '<strong>Description</strong> : '+data.workex_desc+'<br>';
                                    html += '<strong>Project Handle </strong> : '+data.workex_handle_project+'<br>';
                                    html += '<strong>Start Date </strong> : '+splitstart[1]+" "+splitstart[2]+'<br>';
                                    html += '<strong>End Date </strong> : '+splitend[1]+" "+splitend[2]+'<br>';
                                    html += '<strong>Document</strong> :';
                                    $('#detailworkex').append(html);
                                    $('#detailworkex').append('<iframe src="'+url+'" width="100%" height="650px">');
                                }
                            }

                            $("#workexdetail").on("hidden.bs.modal", function() {
                                $("#detailworkex").html("");
                            });
                    }
                })
            });

            $(document).on('click','a[href="#edit-workex"]', function(e){
                var idworkexedit = $(this).data('workexedit');
                $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/talent/workexdetail/'+idworkexedit,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                            var splitstart = data.workex_startdate.split(" ");
                            var splitend = data.workex_enddate.split(" ");
                            var tahun = document.getElementById('tahunstart');
                            var bulan =document.getElementById('bulanstart');
                            var tanggal =document.getElementById('tanggalstart');
                            var tahun2 = document.getElementById('tahunend');
                            var bulan2 =document.getElementById('bulanend');
                            var tanggal2 =document.getElementById('tanggalend');
                            if(splitstart[0]==0&&splitend[0]==0){
                                var office = data.workex_office;
                                var pos = data.workex_position;
                                var desc = data.workex_desc;
                                var handle = data.workex_handle_project;
                                var bulanstart = splitstart[1];
                                var tahunstart = splitstart[2];
                                var bulanend = splitend[1];
                                var tahunend = splitend[2];

                                $('#bulan option[value="'+bulanstart+'"]').prop('selected', true);
                                $('#tahun option[value="'+tahunstart+'"]').prop('selected', true);
                                $('#bulan2 option[value="'+bulanend+'"]').prop('selected', true);
                                $('#tahun2 option[value="'+tahunend+'"]').prop('selected', true);
                            }else{
                                var office = data.workex_office;
                                var pos = data.workex_position;
                                var desc = data.workex_desc;
                                var handle = data.workex_handle_project;
                                var tanggalstart = splitstart[0];
                                var bulanstart = splitstart[1];
                                var tahunstart = splitstart[2];
                                var tanggalend = splitend[0];
                                var bulanend = splitend[1];
                                var tahunend = splitend[2];

                                $('#bulan option[value="'+bulanstart+'"]').prop('selected', true);
                                $('#tahun option[value="'+tahunstart+'"]').prop('selected', true);
                                $('#tanggal option[value="'+tanggalstart+'"]').prop('selected', true);

                                $('#bulan2 option[value="'+bulanend+'"]').prop('selected', true);
                                $('#tahun2 option[value="'+tahunend+'"]').prop('selected', true);
                                $('#tanggal2 option[value="'+tanggalend+'"]').prop('selected', true);
                            }
                            $('#office').val(office);
                            $('#position').val(pos);
                            // $('#desc').val(desc);
                            CKEDITOR.instances['editdescworkex'].setData(desc);
                            // $('.handle').val(handle);
                            CKEDITOR.instances['editprojecthandle'].setData(handle);
                            $('#oldfile').html(data.workex_file);
                            $('#idworkexperience').val(data.workex_id);
                    }
                });
            });

        </script>

        <script>
        $(document).on('click','a[href="#delete-workex"]', function(e){
            var idworkexdel = $(this).data('workexdel');
            $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/talent/workexdetail/'+idworkexdel,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        $('#idworkexdelete').val(data.workex_id);
                    }

            })
        });
        </script>

        <script>            
            var bulanadd = document.getElementById('bulanaddedu');
            var tahunadd = document.getElementById('tahunaddedu');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>


        <script>            
            var bulanadd = document.getElementById('bulancertifex');
            var tahunadd = document.getElementById('tahuncertifex');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>


        <script>            
            var bulanadd = document.getElementById('bulancertifex1');
            var tahunadd = document.getElementById('tahuncertifex1');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script>            
            var bulanadd = document.getElementById('bulanaddeduend');
            var tahunadd = document.getElementById('tahunaddeduend');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>


        <script>           
            var bulanadd = document.getElementById('bulanaddport');
            var tahunadd = document.getElementById('tahunaddport');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>


        <script>            
            var bulanadd = document.getElementById('bulanaddedu1');
            var tahunadd = document.getElementById('tahunaddedu1');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script>            
            var bulanadd = document.getElementById('bulanaddeduend1');
            var tahunadd = document.getElementById('tahunaddeduend1');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script>            
            var bulanadd = document.getElementById('bulanaddportend');
            var tahunadd = document.getElementById('tahunaddportend');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script>           
            var bulanadd = document.getElementById('bulanaddport1');
            var tahunadd = document.getElementById('tahunaddport1');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script>           
            var bulanadd = document.getElementById('bulanaddportend1');
            var tahunadd = document.getElementById('tahunaddportend1');            
            var bulandd = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            for(var jadd = 0; jadd<12; jadd++){
                var optbadd = document.createElement('option');
                optbadd.value = bulandd[jadd];
                optbadd.innerHTML=bulandd[jadd];
                bulanadd.appendChild(optbadd);
            }
            var minYearadd = new Date().getFullYear()-20;
            var maxYearadd = minYearadd+50;
            for(var hadd=minYearadd; hadd<=maxYearadd; hadd++){
                var opttadd = document.createElement('option');
                opttadd.value = hadd;
                opttadd.innerHTML = hadd;
                tahunadd.appendChild(opttadd);
            }    
        </script>

        <script type="text/javascript">
            // function deleteData(id)
            // {
            //     var id = id;
            //     var url = '{{ route("workex.delete", ":id") }}';
            //     url = url.replace(':id', id);
            //     $("#deleteForm").attr('action', url);
            // }

            // function formSubmit()
            // {
            //     $("#deleteForm").submit();
            // }
        </script>

        <script type="text/javascript">
            $(document).on('click','a[href="#hapus-certification"]',function(e){
                var idhapuscertif = $(this).data('idhapuscertif');
                var url = '{{ route("certification.delete", ":idhapuscertif") }}';
                url = url.replace(':idhapuscertif', idhapuscertif);
                $("#deletecertif").attr('action', url);
            });
            function deletecertif()
            {
                $("#deletecertif").submit();
            }
        </script>

         <script type="text/javascript">
            $(document).on('click','a[href="#hapus-education"]',function(e){
                var idhapusedu = $(this).data('idhapusedu');
                var url = '{{ route("education.delete", ":idhapusedu") }}';
                url = url.replace(':idhapusedu', idhapusedu);
                $("#deleteedu").attr('action', url);
            });
            function deleteedu()
            {
                $("#deleteedu").submit();
            }
        </script>

        <script>
            $(document).on('click','a[href="#edit-certification"]',function(){
                var idcertif = $(this).data('idcertif');
                console.log(idcertif);
                 $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/talent/detailcertification/'+idcertif,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        $('#certif_name').val(data.certif_name);
                        $('#certif_years').val(data.certif_years);
                        $('#certif_company').val(data.certif_company);
                        $('#certif_desc').val(data.certif_desc);
                        $('#certif_number').val(data.certif_number);
                        $('#certif_expired').val(data.certif_expired);
                        var urlcertif = '{{ route("certification.update", ":idcertif") }}';
                            urlcertif = urlcertif.replace(':idcertif', idcertif);
                            $("#form-edit-certif").attr('action', urlcertif);
                    }
                });
            });
        </script>

        <script>
            $(document).on('click','a[href="#edit-education"]',function(){
                var idedu = $(this).data('idedu');
                 $.ajax({
                    headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                    url:'/admin/talent/detaileducation/'+idedu,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        // $('#edu_level_other2').hide();
                        var splitstart = data.edu_datestart.split(" ");
                        var splitend = data.edu_dateend.split(" ");                        
                        var bulan =document.getElementById('bulanaddedu1');
                        var tanggal =document.getElementById('tanggaladdedu1');                        
                        var bulan2 =document.getElementById('bulanaddeduend1');
                        var tanggal2 =document.getElementById('tanggaladdeduend1');
                        if(splitstart[0]==null||splitend[0]==null){
                            if(data.edu_level=="other"){
                                $('#edu_level_other2').show().val(data.edu_level_other);
                                $('#edu_level2 option[value="'+data.edu_level+'"]').prop('selected', true);
                                $('#edu_name').val(data.edu_name);
                                $('#tahunaddedu1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                                $('#tahunaddeduend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                                $('#edu_value').val(data.edu_value);
                                $('#edu_field').val(data.edu_field);
                            }else{
                                $('#edu_level_other2').hide();
                                $('#edu_level2 option[value="'+data.edu_level+'"]').prop('selected', true);
                                $('#edu_name').val(data.edu_name);
                                $('#tahunaddedu1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                                $('#tahunaddeduend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                                $('#edu_value').val(data.edu_value);
                                $('#edu_field').val(data.edu_field);
                            }
                            var urledu = '{{ route("education.update", ":idedu") }}';
                            urledu = urledu.replace(':idedu', idedu);
                            $("#form-edit-edu").attr('action', urledu);
                        }else{
                            if(data.edu_level=="other"){
                                $('#edu_level_other2').show().val(data.edu_level_other);
                                $('#edu_level2 option[value="'+data.edu_level+'"]').prop('selected', true);
                                $('#edu_name').val(data.edu_name);
                                $('#bulanaddedu1 option[value="'+splitstart[0]+'"]').prop('selected', true);
                                $('#tahunaddedu1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                                $('#bulanaddeduend1 option[value="'+splitend[0]+'"]').prop('selected', true);
                                $('#tahunaddeduend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                                $('#edu_value').val(data.edu_value);
                                $('#edu_field').val(data.edu_field);
                            }else{
                                $('#edu_level_other2').hide();
                                $('#edu_level2 option[value="'+data.edu_level+'"]').prop('selected', true);
                                $('#edu_name').val(data.edu_name);
                                $('#bulanaddedu1 option[value="'+splitstart[0]+'"]').prop('selected', true);
                                $('#tahunaddedu1 option[value="'+splitstart[1]+'"]').prop('selected', true);                                
                                $('#bulanaddeduend1 option[value="'+splitend[0]+'"]').prop('selected', true);
                                $('#tahunaddeduend1 option[value="'+splitend[1]+'"]').prop('selected', true);                                
                                $('#edu_value').val(data.edu_value);
                                $('#edu_field').val(data.edu_field);
                            }
                            var urledu = '{{ route("education.update", ":idedu") }}';
                            urledu = urledu.replace(':idedu', idedu);
                            $("#form-edit-edu").attr('action', urledu);
                        }                                       
                    }
                });
            });
        </script>

        <script>
            $('#preview-report').hide();
            $('#download-report').hide();
            $(document).on('click','#previewsok',function (e){
                $('#preview-report').show();
                $('#download-report').hide();
            });
            $('#tombol-download').click(function () {
                $('#preview-report').hide();
                $('#download-report').show();
            });
        </script>
        <script type="text/javascript">
            $('#positionasselect').change(function(){
                var nilainyanih = $(this).val();                
                // passdataselect(value);
                $('#positionas').html(nilainyanih);                
                    $("#posisi").val(nilainyanih);                
            });
            // function passdataselect(position){
            //     var pos = position;                
                
            // }            
        </script>
        <script>
            $(document).on('click','#view-certification',function (e) {
               var iddetailcertif = $(this).data('iddetailcertif');
               $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/viewcertif/'+iddetailcertif,
                type:'GET',
                dataType:'json',
                success: function(data) {
                    var url='storage/app/public/Certification/'+data.certif_file;
                    console.log(data);
                    $('#viewcertif').html('<iframe src="'+url+'" width="100%" height="650px">')
                }
               });
            });
        </script>
        <script>
            $(document).on('click','#view-education',function (e) {
               var idviewedu = $(this).data('idviewedu');
               $.ajax({
                headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                url:'/admin/talent/vieweducation/'+idviewedu,
                type:'GET',
                dataType:'json',
                success: function(data) {
                    var url='storage/app/public/Education/'+data.edu_file;
                    console.log(data);
                            if(data.edu_level=="other"){
                                $('#edu_level_other2view').html(data.edu_level_other);
                                $('#edu_level2view').html(data.edu_level);
                                $('#edu_nameview').html(data.edu_name);
                                $('#edu_datestartview').html(data.edu_datestart);
                                $('#edu_dateendview').html(data.edu_dateend);                         
                                $('#edu_valueview').html(data.edu_value);
                                $('#edu_fieldview').html(data.edu_field);
                            }else{
                                $('#edu_level_other2view').html('');
                                $('#edu_level2view').html(data.edu_level);
                                $('#edu_nameview').html(data.edu_name);
                                $('#edu_datestartview').html(data.edu_datestart);
                                $('#edu_dateendview').html(data.edu_dateend);                         
                                $('#edu_valueview').html(data.edu_value);
                                $('#edu_fieldview').html(data.edu_field);
                            }
                        

                    if(data.edu_file == null){
                        $('#viewedu').html('<p>tidak ada file</p>')  
                    }
                    else{
                    $('#viewedu').html('<iframe src="'+url+'" width="100%" height="650px">')
                    }
                }
               });
            });
        </script>
<script type="text/javascript">
$(document).on('click', '.change-status', function() {
    var id   = $(this).data('id');
    $('.modal-body #assign_id').val(id);
});

$(document).on('click', '#submit-status', function(e){
    var assign_id = $('input[name="assign_id"]').val();
    var status    = $('input[name="status"]:checked').val();
    var note      = $('input[name="note"]').val();

    alert('a ' + assign_id + ' - ' + status + ' - ' + note);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('talent.changestatusassign')}}",
        beforeSend: function(){
            // $('.progress-alert').remove();
            // $('.success-alert').remove();
            alert('nah mau kirim');
        },
        type: 'POST',
        data :{
            assign_id: assign_id,
            status   : status,
            note     : note
        },
        success:function(response)
             {
            if(response == 'berhasil'){
                // $('.success-alert').remove();
                // $('.progress-alert').remove();
                // $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                alert('ok success');
                reload();
            } else {
                // $('.success-alert').remove();
                // $('.progress-alert').remove();
                // $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Tidak Ada Perubahan ! </strong> Tidak terdapat perubahan pada data!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                alert('gagal');
            }
        }
    });
});
</script>
        <script>

        </script>
@endpush

@endsection
