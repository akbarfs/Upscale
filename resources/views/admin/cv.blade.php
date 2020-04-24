@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Job Apply Detail</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('jobsapply')}}">Jobs Apply</a></li>
                    <li class="active">Job Apply Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<object data="{{"data:application/pdf;base64,".$all->jobs_apply_portofolio_file}}" style="height:1000px;width:100%"></object> 

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        </div>
    </div>
</div>


