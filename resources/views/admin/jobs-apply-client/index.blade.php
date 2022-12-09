@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance: unset !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        overflow: hidden;
    }

    .stright-line {
        background: gray;
        margin: auto 10px;
        width: 80%;
        height: 3px;
    }

    .filter-btn {
        background-color: #405B74;
        padding: 10px;
        color: white;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
    }

    .filter-btn.active{
        background-color: #80bde3;
    }

    .filter-btn:hover {
        background-color: #80bde3;
    }

    .filter-btn span {
        background-color: white;
        font-weight: bold;
        color: black;
        padding: 0 5px;
        border-radius: 2px;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jobs Apply Client</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        @include('admin.layout.notification')
    </div>
</div>

<div class="content mt-3">

    <div class="my-2">
        <form action="" method="POST" id="form-search">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <input type="text" name="client"
                        class="small-rect-filter text-left rect-border form-control " placeholder="Client"
                        value="" />
                </div>
                <div class="col-md-6 mt-4">
                    <input type="text" name="talent"
                        class="small-rect-filter text-left rect-border form-control " placeholder="Talent"
                        value="" />
                </div>

                <div class="col-md-3 mt-4">
                    <select name="company_request" id="company_request" class="form-control small-rect-filter text-left rect-border">
                        <option value="" selected>Company Request</option>
                        @foreach ($company_req as $req)
                        <option value="{{$req->company_request_id}}">{{$req->name_request}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <select name="is_hire_requested" id="is_hire_requested" class="form-control small-rect-filter text-left rect-border">
                        <option value="all" selected>All Status Request</option>
                        <option value="1">Requested</option>
                        <option value="0">Tidak Request</option>
                    </select>
                </div>
                
                <div class="col-md-3 mt-4">
                    <button class="btn btn-info rounded" style="width:100%;" type="submit">Filter</button>
                </div>
            </div>
        </form>
        <hr>
    </div>

    <div class="mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border show active" id="unprocess">
                    Unprocess<span>{{ $count['unprocess'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="interview">
                    Interview<span>{{ $count['interview'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="prospek">
                    Prospek<span>{{ $count['prospek'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="offered">
                    Offered<span>{{ $count['offered'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="hired">
                    Hired<span>{{ $count['hired'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="reject">
                    Reject<span>{{ $count['reject'] }}</span></div>
            </div>
        </div>
        
    </div>

    <div class="mt-4">
        <div class="container-fluid mt-2" id="talent-request" style="padding:0;">
            <!-- ini adalah isi data talent -->
        </div>
    </div>

    {{-- <div id="loading" align="center">
        <div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}

<script>
    $(document).ready(function () {

        var status = `{{session('message')}}`;

        if (status) {alert(status);}

        function loadTable(url) {
            var param = $("#form-search").serialize();
            $('#loading').show();
            $("#talent-request").html('');

            $.ajax({
                url: url + "&" + param,
                method: "GET",
                success: function (data) {
                    $('#loading').hide();
                    $("#talent-request").html(data);
                }
            });
        }

        //load pertama kali
        // loadTable("{{url('/admin/jobsapplyclient/table/data?page=1')}}");
        var identifier = 'unprocess';
        url = `{{url('/admin/jobsapplyclient/table/data?status=${identifier}')}}`
        loadTable(url);

        // klik pagination , diambil urlnya langsung di load ajax
        $(document).on("click", ".page-link", function (event) {
            $("body").scrollTop(0);
            var url = $(this).attr("href") + "&" + `{{ 'status=${identifier}' }}`;
            console.log(url);
            loadTable(url);
            event.preventDefault(); //ini biar ga keredirect ke halaman lain
        });

        // $('.nama-talent').on('input',function(){
        //     var nama = $(this).val();
        //     url = `{{url('/admin/jobsapplyclient/table/data?nama=${nama}')}}`
        //     loadTable(url);
        //     event.preventDefault();
        // })

        $('.filter-btn').on('click',function(){
            var identifier = $(this).attr('id');
            url = `{{url('/admin/jobsapplyclient/table/data?status=${identifier}')}}`
            loadTable(url);
            $(".filter-btn").removeClass("active");
            $('#'+identifier).addClass("active");
            event.preventDefault();
        })


        //search 
        $("#form-search").submit(function () {
            loadTable(`{{url('/admin/jobsapplyclient/table/data?status=${identifier}')}}`);
            return false;
        });

    })
</script>

@push('script')

<script>
    $(document).ready(function () {
        $('#all-table').DataTable();
    });

    $(document).ready(function () {
        $("#collapseOne").on("hide.bs.collapse", function () {
            $(".change-icon1").removeClass('fa-arrow-down');
            $(".change-icon1").addClass('fa-arrow-up');
        });
        $("#collapseOne").on("show.bs.collapse", function () {
            $(".change-icon1").removeClass('fa-arrow-up');
            $(".change-icon1").addClass('fa-arrow-down');
        });
    });
</script>

@endpush

@endsection