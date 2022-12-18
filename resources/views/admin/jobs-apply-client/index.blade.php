@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance: unset !important;
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

    select.form-control:not([size]):not([multiple]) {
        height: auto !important;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .col-sm-9 .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        overflow: hidden;
    }

    .select2-container--bootstrap .select2-selection--single {
        height: 38px !important;
        /* background: lightgray !important; */
        /* border: 1px solid black !important; */
    }

    col-md-3 .select2.select2-container.select2-container--bootstrap {
        max-width: 16.7rem;
    }

    #select2-companyrequest-results .select2-results__option {
        text-align: left;
    }

    #select2-companyrequest-container {
        text-align: left;
        color: #000;
        font-size: 1rem;
    }

    .select2:hover {
        font-weight: 500;
    }

    .small-rect-filter.rect-border.rp::placeholder {
        color: black;
        opacity: 1;
        /* Firefox */
    }

    .input-group .select2.select2-container {
        max-width: 786px !important;
    }

    .select2-container--bootstrap .select2-selection--multiple {
        min-height: 40px !important;
        /* background-color: lightgray !important; */
    }
    .skill .select2-default{
        color: #f00 !important;
    }

    @media only screen and (max-width:1300px) {
        .input-group .select2.select2-container {
            max-width: 687px !important;
        }
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
                        <option value="{{$req->company_request_id}}">{{ $req->company->company_name }} - {{ $req->name_request }}</option>
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
                    Unprocess<span id="filter_0">{{ $count['unprocess'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="interview">
                    Interview<span id="filter_1">{{ $count['interview'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="prospek">
                    Prospek<span id="filter_2">{{ $count['prospek'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="offered">
                    Offered<span id="filter_3">{{ $count['offered'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="hired">
                    Hired<span id="filter_4">{{ $count['hired'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border" id="reject">
                    Reject<span id="filter_5">{{ $count['reject'] }}</span></div>
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

        // company request select
        $('#company_request').select2({
            theme: "bootstrap"
        });

        function loadTable(url) {
            var param = $("#form-search").serialize();
            $('#loading').show();
            $("#talent-request").html('');

            $.ajax({
                url: url + "&" + param,
                method: "GET",
                success: function (data) {
                    $('#loading').hide();
                    $("#talent-request").html(data.view);

                    // change total in each tab
                    for (let index = 0; index < data.filter.length; index++) {
                        $("#filter_" + index).text(data.filter[index])
                    }

                }
            });
        }

        //load pertama kali
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

        // from click notif
        var status = `{{session('identifier')}}`;
        if (status) {
            $('#'+status).click();
        }

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