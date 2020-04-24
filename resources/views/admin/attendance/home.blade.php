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
                        <div class="col-md-12 form-inline mb-4">
                            <div class="form-group">
                                <div class="col">
                                    <form action="{{ route('attend.uploadlog') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                                        {{csrf_field()}}
                                        <select name="type" class="form-control" required>
                                            <option disabled="">Type</option>
                                            <option value="dat">.dat (Cloud)</option>
                                            <option value="log">.log (Local)</option>
                                        </select>
                                        <input type="file" name="file" class="form-control form-control-sm">
                                        <button name="move" class="btn btn-primary" type="submit">Input Data</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-inline">
                            <div class="form-group">
                                <div class="col">
                                    <form action="{{ route('attend.dopermit') }}" method="post">
                                        {{csrf_field()}}
                                        <select name="staff" class="form-control" required>
                                            <option disabled="">Staff</option>
                                            <?php
                                                foreach($staff as $vs) {
                                                    echo "<option value='".$vs->as_id."'>".ucfirst($vs->as_name)."</option>";
                                                }
                                            ?>
                                        </select>
                                        <input name="start" type="date" class="form-control" required>
                                        <input name="end" type="date" class="form-control" required>
                                        <input name="desc" type="text" class="form-control" placeholder="Input description" required>
                                        <select name="status" class="form-control" required>
                                            <option disabled="">Status</option>
                                            <option value="approved">Approved</option>
                                        </select>
                                        <button class="btn btn-primary" type="submit">Submit Permit</button>
                                    </form>
                                </div>
                            </div>
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

<script type="text/javascript">
$(document).ready(function(){
    bootcamp_table;
});

function reload(){
    bootcamp_table.ajax.reload();
}

var bootcamp_table = $('#bootcamp_table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('bootcamp.all')}}",
            type:"GET"
        },
        className:"dt-center",target: "DT_Row_Index",
        columns:[
        {data:"DT_Row_Index",defaultColumn:"-"},
        {data:"bootcamp_created_date",defaultColumn:"-",visible:true},
        {data:"bootcamp_title",defaultColumn:"-",visible:true},
        {data:"status",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",visible:true},

        ]
    });
</script>
@endpush

@endsection