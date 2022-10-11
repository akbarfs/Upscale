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
    <div class="d-flex justify-content-between mt-2">
        <h4>My Talent (0/{{ $data->person_needed }})</h4>
        <div class="stright-line"></div>
        <button class="btn btn-primary btn-sm rect-border" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-arrow-up change-icon1" aria-hidden="true"></i>
        </button>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="row">
            @foreach ($talents as $talent)
            <div class="col-sm-4">
                <div class="mt-4">
                    <div class="p-3 my-2 bg-white shadow-sm rounded" style="height: 200px;">
                        <div class="row">
                            <div class="col-md-4 m-auto">
                                <img src="{{url('/img/avatar/noimage.jpg')}}" style="width: 100px;" alt="icon-profile">
                            </div>
                            <div class="col-md-8">
                                <h4>{{ $talent->talent_name }}</h4>
                                <div class="my-2" style="overflow-wrap: break-word;">{{ $talent->talent_email }}</div>
                                <div class="my-2">{{ $talent->talent_phone }}</div>
                                <div class="d-flex">
                                    <select class="form-control status" name="status">
                                        <option value="unprocess">Unprocess</option>
                                        <option value="interview">Interview</option>
                                        <option value="prospek">Prospek</option>
                                        <option value="offered">Offered</option>
                                        <option value="hired">Hired</option>
                                        <option value="reject">Reject</option>
                                    </select>
                                    <form
                                        action="{{ route('company.request.unkeeptalent', ['id_request'=>$data->company_request_id, 'id_talent'=>$talent->talent_id] ) }}"
                                        method="POST" style="margin-bottom: 0; ">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-warning rect-border ml-2"
                                            style="padding-bottom: 10px; ">Move To
                                            List</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @for ($i=0;$i<$data->person_needed - $count['bookmark'] ;$i++)
                <div class="col-sm-4">
                    <div class="mt-4">
                        <div class="p-3 my-2 bg-white shadow-sm rounded">
                            <div class="row">
                                <div class="col-md-4 m-auto">
                                    <img src="{{url('/img/avatar/quest.png')}}" style="width: 100px;"
                                        alt="icon-profile">
                                </div>
                                <div class="col-md-8">
                                    <hr style="margin: 32px 0;">
                                    <hr style="margin: 32px 0;">
                                    <hr style="margin: 32px 0;">
                                    <hr style="margin: 34px 0;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor

        </div>
    </div>
    <div class="mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
                    Unprocess<span>{{ $count['unprocess'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
                    Interview<span>{{ $count['interview'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
                    Prospek<span>{{ $count['prospek'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
                    Offered<span>{{ $count['offered'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
                    Hired<span>{{ $count['hired'] }}</span></div>
            </div>
            <div class="col-sm-2">
                <div class="d-flex justify-content-between filter-btn rect-border">
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

</div>



<script>
    $(document).ready(function () {
        var id_request = `{{ $data->company_request_id }}`;

        var status = `{{session('message')}}`;

        if (status) {
            alert(status);
        }

        function loadTable(url) {
            // var param = $("#form-search").serialize();

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