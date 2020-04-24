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
@foreach($all as $a)
<div class="breadcrumbs">
    <div class="col-sm-6">
        <div class="page-header float-left">
            <h1>
  Company
  <small class="text-muted" style="text-transform: capitalize;">{{$a->company_name}}</small>
</h1>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Company</li>
                </ol>
            </div>
        </div>
    </div>
</div>


        <div class="row">


</div><!-- row -->

            <div class="tab-content col-md-10 " id="v-pills-tabContent">
                <div class="tab-pane show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                     <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header">
                                <h3>
                                    <strong class="card-title mb-3">Profil Company</strong> 
                                    <button type="button" class="btn btn-primary"> Profile last updated <span class="badge badge-light">{{ date("d-m-Y",strtotime($a->company_created_date))  }}
                                    </span></button>
                                    </div>
                                </h3>
                            </div>
                            <form style="padding-left: 20px; padding-top: 15px;">
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Name</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static"  style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$a->company_name}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Address</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static"style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$a->company_address}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Phone</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$a->company_phone}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Email</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$a->company_email}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">PIC</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;"><strong>{{$a->company_pic}}</strong></p>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-4">
                                        <label class=" form-control-label">Description</label>
                                    </div>
                                    <div class="col-12 col-md-8">
                                      <p class="form-control-static" style="margin-bottom: 0px;text-transform: capitalize;"><strong>{{$a->company_description}}</strong></p>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </aside>
                </div>
@endforeach
@endsection
