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
        background-color: darkgray;
        padding: 10px;
        color: white;
        text-align: center;
        cursor: pointer;
    }

    .filter-btn:hover {
        background-color: gray;
    }

    .filter-btn span {
        background-color: aliceblue;
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
    <div class="d-flex justify-content-between m-2">
        <h4>My Talent (3/3)</h4>
        <div class="stright-line"></div>
        <button class="btn btn-primary btn-sm rect-border" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-arrow-up change-icon1" aria-hidden="true"></i>
        </button>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row justify-content-center">
            
            <div class="col-sm-4">
                <div class="content mt-3">
                    <div class="p-5 my-2 bg-white shadow-sm rounded">
                        <h4>Test</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="content mt-3">
                    <div class="p-5 my-2 bg-white shadow-sm rounded">
                        <h4>Test</h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="content mt-3">
                    <div class="p-5 my-2 bg-white shadow-sm rounded">
                        <h4>Test</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="row justify-content-center m-2">
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">All<span>0</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">VT<span>0</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">Interview<span>0</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">Offered<span>0</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">Ready<span>0</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">Keep<span>0</span></div>
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="container-fluid mt-2" id="talent-request" style="padding:0;">
            <!-- ini adalah isi data talent -->
        </div>
    </div>
</div>



<script>
    $(document).ready(function () {

        function loadTable(url) {
            // var param = $("#form-search").serialize();

            $('#loading').show();
            $("#talent-request").html('');

            $.ajax({
                url: url,
                method: "GET",
                success: function (data) {
                    $('#loading').hide();
                    $("#talent-request").html(data);
                }
            });
        }

        //load pertama kali
        loadTable("{{url('/company/request/talent_data')}}");
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