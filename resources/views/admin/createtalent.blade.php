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
            <div class="page-title">
                <h1>Create Talent</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Create Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($message = Session::get('Success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('Error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" data-toggle="tab" href="#linkedin" role="tab" aria-controls="nav-home" aria-selected="false">
                        <strong>LinkedIn</strong>
                    </a>
                    <a class="nav-item nav-link active"  data-toggle="tab" href="#jobsid" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <strong>JobsID</strong>
                    </a>
                    <a class="nav-item nav-link "  data-toggle="tab" href="#alumni" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <strong>Alumni</strong>
                    </a>
                    <a class="nav-item nav-link"  data-toggle="tab" href="#refferal" role="tab" aria-controls="nav-profile" aria-selected="false">
                        <strong>Refferal</strong>
                    </a>
                </div>
                <br>
                <div class="tab-content">
                    <div id="linkedin" class="tab-pane fade show row">
                            <div class="card">
                                    <div class="card-header">
                                        <div class="col-sm-4">
                                                <div class="float-left">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="linkedin" id="" accept=".xls, .xlsx"> <br> <br>
                                                        <button type="submit" name="submit" class="btn btn-info">Upload</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="float-right">
                                                    <br> <br>
                                                    <input type="text" name="search" id="cari" class="form-control" placeholder="Search...">
                                                </div>
                                        </div>
                                    </div>
                                <div class="card-body">

                                </div>
                        </div>
                    </div>
                    <div id="jobsid" class="tab-pane fade show active row">
                        <div class="card">
                            <div class="card-header">
                                Halo
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/talent/createjobsid')}}" method="POST" class="row">
                                    @csrf
                                    <div class="col-md-9">
                                        <textarea class="form-control" rows="3" name="data" placeholder='Paste here : code <div class="panel-body view-candidate" .....'></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="location" class="js-example-basic-single form-control" style="width:100%">
                                            @foreach($listkota as $kota)
                                                <option value="{{$kota->nama}}">{{$kota->type." ".$kota->nama}}</option>
                                            @endforeach
                                        </select>
                                        <select name="position" class="js-example-basic-single form-control" style="width:100%">
                                                <option value="AD">Android Deveoper (AD)</option>
                                                <option value="BD">Business Deveoper (BD)</option>
                                                <option value="BI">Business Intellegent (BI)</option>
                                                <option value="DE">Data Engineer (DE)</option>
                                                <option value="iOS">iOS Deveoper (iOS)</option>
                                                <option value="QA">QA</option>
                                                <option value="UI/UX">UI/UX</option>
                                                <option value="WD">Web Deveoper (WD)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 text-right"><button type="submit" name="submit" class="btn btn-info">Submit</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="alumni" class="tab-pane fade show row">
                            <div class="card">
                                    <div class="card-header">

                                    </div>
                                <div class="card-body">
                                    TAHAP PENGEMBANGAN
                                </div>
                        </div>
                    </div>
                    <div id="refferal" class="tab-pane fade show row">
                            <div class="card">
                                    <div class="card-header">

                                    </div>
                                <div class="card-body">
                                    TAHAP PENGEMBANGAN
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.js-example-basic-single').select2();
    </script>
@endpush
@endsection
