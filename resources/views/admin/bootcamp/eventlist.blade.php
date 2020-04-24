@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Event List</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Event List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <strong class="card-title mb-3">Applicant Event List</strong>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="event-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Event Title</th>
                                                <th>Event Location</th>
                                                <th>Event Fee</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach ($bootcamp as $waks)
                                            <tr>
                                                <td style="width: 20px;">{{$no++}}</td>
                                                <td>{{$waks->event_title}}</td>
                                                <td>{{$waks->loc_city}}</td>
                                                <td>{{$waks->event_fee}}</td>
                                                <td align="center">
                                                    <a href="{{route('applicant.index',$waks->event_id)}}" type="button" class="btn btn-success btn-xs "><i class="fa fa-user"></i></a>&nbsp;
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
            </div>
        </div>
</div>


@endsection