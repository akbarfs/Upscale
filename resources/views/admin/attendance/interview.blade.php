@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp</li>
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
                    <div class="card-body">
                        <div class="col-md-7 col-sm-7 form-inline mb-4">
                            <!--<iframe src="{{ $url }}" width="100%" width="100%" height="550"></iframe>-->
                            <iframe src="https://career.erporate.com" width="100%" height="550"></iframe>
                        </div>
                        <div class="col-md-5 col-sm-5 form-inline">
                            Ini soal2nya
                        </div>
                    </div>
                </div>
                
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}
                    </div>
                @endif
            </div>

        </div>
    </div>
</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

@endpush

@endsection