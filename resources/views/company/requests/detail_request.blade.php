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
    <div class="d-flex justify-content-between mt-2">
        <h4>My Talent ({{ $data->hired }}/{{ $data->person_needed }})</h4>
        <button type="button" class="btn btn-sm btn-link" data-toggle="modal" data-target="#exampleModal">
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

    <div id="loading" align="center">
        <div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

<script>
    $(document).ready(function () {

        var id_request = `{{ $data->company_request_id }}`;

        console.log(id_request);

        function loadTable(url) {

            $('#loading').show();
            $("#talent-request").html('');

            $.ajax({
                url: url,
                method: "GET",
                data: {
                    id_request: id_request
                },
                success: function (data) {
                    $('#loading').hide();
                    $("#talent-request").html(data);
                }
            });
        }

        //load pertama kali
        loadTable("{{url('/company/request/talent_data')}}");

        // klik pagination , diambil urlnya langsung di load ajax
        $(document).on("click", ".page-link", function (event) {
            $("body").scrollTop(0);
            var url = $(this).attr("href");
            loadTable(url);
            event.preventDefault(); //ini biar ga keredirect ke halaman lain
        });

        var identifier = 'unprocess';
        url = `{{url('/company/request/talent_data?status=${identifier}')}}`
        loadTable(url);

        $('.nama-talent').on('input',function(){
            var nama = $(this).val();
            url = `{{url('/company/request/talent_data?nama=${nama}')}}`
            loadTable(url);
            event.preventDefault();
        })

        $('.filter-btn').on('click',function(){
            var identifier = $(this).attr('id');
            url = `{{url('/company/request/talent_data?status=${identifier}')}}`
            loadTable(url);
            $(".filter-btn").removeClass("active");
            $('#'+identifier).addClass("active");
            event.preventDefault();
        })

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