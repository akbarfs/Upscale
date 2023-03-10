@extends('company.layout.apps')
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
                <h1>Request Detail</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">
                        <div>
                            <h5><i class="menu-icon fa fa-bell"></i> Notifikasi</h5>
                            <small>Notif talent yang approve tawaran</small>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">


    <div class="my-2">
        <form action="" method="POST" id="form-search">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <select name="is_hire_requested" id="is_hire_requested" class="form-control small-rect-filter text-left rect-border">
                        <option value="all" selected>All Status Request</option>
                        <option value="1">Requested</option>
                        <option value="0">Tidak Requested</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <input type="text" name="talent"
                        class="small-rect-filter text-left rect-border form-control " placeholder="ID Talent"
                        value="" />
                </div>
                <div class="col-md-3 mt-4">
                    <button class="btn btn-info rounded" style="width:100%;" type="submit">Filter</button>
                </div>
            </div>
        </form>
        <hr>
    </div>

    <div class="d-flex justify-content-between mt-2">
        <h4 class="mx-0">My Talent ({{ $data->hired }}/{{ $data->person_needed }})</h4>
        <button type="button" class="btn mx-0 btn-xs btn-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-pencil"></i>
        </button>
        <div class="stright-line"></div>
    </div>

    {{-- modal update person needed --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Jumlah yang Dibutuhkan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('company.request.detail.change-person-needed', $data->company_request_id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="number" class="form-control" id="person_nedeed" name="person_needed" aria-describedby="emailHelp" placeholder="Masukkan jumlah orang yang dibutuhkan" value="{{ $data->person_needed }}" required>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary rect-border float-right">Update</button>
                </form>
            </div>
        </div>
        </div>
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

    <div id="loading" align="center">
        <div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

<script>
    $(document).ready(function () {

        var id_request = `{{ $data->company_request_id }}`;

        function loadTable(url) {

            var param = $("#form-search").serialize();
            $('#loading').show();
            $("#talent-request").html('');

            $.ajax({
                url: url + "&" + param,
                method: "GET",
                data: {
                    id_request: id_request
                },
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
        url = `{{url('/company/request/talent_data?status=${identifier}')}}`
        loadTable(url);

        // klik pagination , diambil urlnya langsung di load ajax
        $(document).on("click", ".page-link", function (event) {
            $("body").scrollTop(0);
            var url = $(this).attr("href");
            loadTable(url);
            event.preventDefault(); //ini biar ga keredirect ke halaman lain
        });

        

        $('.filter-btn').on('click',function(){
            var identifier = $(this).attr('id');
            url = `{{url('/company/request/talent_data?status=${identifier}')}}`
            loadTable(url);
            $(".filter-btn").removeClass("active");
            $('#'+identifier).addClass("active");
            event.preventDefault();
        })

        //search 
        $("#form-search").submit(function () {
            loadTable(`{{url('/company/request/talent_data?status=${identifier}')}}`);
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

<script>
    var i = 1;
    var array = [];
    $(document).ready(function () {
        $('.count-table').each(function () {
            var id = $(this).attr('id');
            array.push(id);
        });
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: "{{ route('dashboard.count')}}",
            method: "POST",
            dataType: 'json',
            data: {
                array: array
            },
            success: function (response) {
                response.forEach(function (d) {
                    if (d.count == 0) {
                        $('#' + d.id).append('<span style="color:#d9dcde;">' + d.count +
                            '</span>');
                    } else {
                        $('#' + d.id).append(d.count);
                    }
                });
            }
        });
    });
</script>

@endpush

@endsection