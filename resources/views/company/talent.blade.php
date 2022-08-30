@extends('company.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance: unset !important;
    }

    .col-sm-9 .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        overflow: hidden;
    }

    .select2-container--bootstrap .select2-selection--single {
        height: 40px !important;
        /* background: lightgray !important; */
        /* border: 1px solid black !important; */
    }

    col-md-3 .select2.select2-container.select2-container--bootstrap {
        max-width: 16.7rem;
    }

    /* .small-rect-filter .select2 .selection .select2-selection {
        border: 1px solid black;
    } */
    #select2-domisili-results .select2-results__option {
        text-align: center;
    }

    #select2-domisili-container {
        text-align: center;
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
                <h1>List All Talent</h1>
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
    @if($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <button type="button" data-toggle="modal" data-target="#modal-add-offer"
        class="btn btn-primary rect-border mt-3">Bikin Tawaran</button>
    <div class="mt-4">
        <h5>Saring Pencarian</h5>
        <hr>
        <form action="" method="POST" id="form-search">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <select name="domisili" id="domisili" class="form-control small-rect-filter rect-border">
                        <option selected>Domisili</option>
                        @foreach ($domisili as $domisili)
                        <option value="{{$domisili->location_name}}">{{$domisili->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <select class="small-rect-filter rect-border form-control" name="readykerja" id="readykerja">
                        <option selected>Ready Kerja</option>
                        <option value="yes">Siap Kerja</option>
                        <option value="no">Belum Siap Kerja</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <select class="small-rect-filter rect-border form-control" name="userupdate" id="userupdate">
                        <option selected>User Terupdate</option>
                        <option value="yes">User Terupdate</option>
                        <option value="no">All</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <select name="experience" id="experience" class="small-rect-filter rect-border form-control">
                        <option selected>Experience In Years</option>
                        <option value="1">Less Then 1 Years</option>
                        <option value="1 - 3">1 - 3 Years</option>
                        <option value="3 - 5">3 - 5 Years</option>
                        <option value="5 - 10">5 - 10 Years</option>
                        <option value="10">More Then 10 Years</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <select class="small-rect-filter rect-border form-control" name="education" id="education">
                        <option>Education</option>
                        <option value="High School">High School</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelor Degree">Bachelor Degree</option>
                        <option value="Master">Master</option>
                        <option value="Other">other</option>
                    </select>
                </div>
                <div class="col-md-3 mt-4">
                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="currsalary"
                        class="small-rect-filter rect-border form-control rp" placeholder="Gaji Sekarang" value="" />
                </div>
                <div class="col-md-3 mt-4">
                    <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="expsalary"
                        class="small-rect-filter rect-border form-control rp" placeholder="Expetasi Sekarang"
                        value="" />
                </div>
                <div class="col-md-3 mt-4">
                    <select class="small-rect-filter rect-border form-control" name="readyluarkota" id="ready">
                        <option selected disabled>Ready Luar Kota</option>
                        <option value="yes">Ready Ke Luar Kota</option>
                        <option value="no">Tidak Ready Ke Luar Kota</option>
                    </select>
                </div>
                <div class="col-md-9 mt-4">
                    <div class="input-group" style="border-radius: 3px;">
                        <div class="input-group-prepend border">
                            <div class="input-group-text" style="height: -webkit-fill-available;">Skills : </div>
                        </div>
                        <select name="skills[]" class="skill form-control small-rect-filter rect-border form-control"
                            multiple>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mt-4">
                    <button class="btn btn-info rounded" style="width:100%;" type="submit">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <div class="container-fluid mt-2" id="company-talent" style="padding:0;"></div>

</div>

{{-- Modal Create Offer --}}
<div class="modal fade" id="modal-add-offer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Make Request</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('company.makeoffer') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label font-weight-bold">Nama Request <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_request" id="name"
                                placeholder="Masukkan nama request" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label font-weight-bold">Lokasi Kerja <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9 justify-content-between d-flex">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type_work" id="type_work1"
                                    value="onsite" required>
                                <label class="form-check-label" for="type_work1">On Site</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type_work" id="type_work2"
                                    value="remote" required>
                                <label class="form-check-label" for="type_work2">Remote</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type_work" id="type_work3"
                                    value="hybrid" required>
                                <label class="form-check-label" for="type_work3">Hybrid</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="benefit" class="col-sm-3 col-form-label font-weight-bold">Benefit <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="benefit" name="benefit" rows="10"
                                placeholder="Deskripsikan benefit yang didapat" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="salary" class="col-sm-3 col-form-label font-weight-bold">Range Salary <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9 d-flex justify-content-between">
                            <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="min_salary"
                                class="form-control rp" placeholder="Masukkan minimal gaji" value="" required>
                            <h3 class="text-center">&nbsp;-&nbsp;</h3>
                            <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="max_salary"
                                class="form-control rp" placeholder="Masukkan maksimal gaji" value="" required>
                        </div>
                    </div>
                    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
                        rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
                    <script
                        src="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css">
                    </script>
                    <script>
                        $(document).ready(function () {
                            $('#domisili').select2({
                                theme: "bootstrap"
                            });

                            $('.skill').select2({
                                tags: true,
                                width: 'resolve',
                                ajax: {
                                    url: '{{route("json.skill.company")}}',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function (data) {
                                        var results = [];
                                        $.each(data, function (index, item) {
                                            results.push({
                                                id: item.text,
                                                text: item.value,
                                            });
                                        });
                                        return {
                                            results: results
                                        }
                                    },
                                    cache: false
                                },
                                placeholder: "Silahkan pilih skill"
                            });

                            $('#skill').select2({
                                tags: true,
                                width: 'resolve',
                                ajax: {
                                    url: '{{route("json.skill.company")}}',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function (data) {
                                        var results = [];
                                        $.each(data, function (index, item) {
                                            results.push({
                                                id: item.text,
                                                text: item.value,
                                            });
                                        });
                                        return {
                                            results: results
                                        }
                                    },
                                    cache: false
                                },
                                placeholder: "Silahkan pilih skill"
                            });
                        })
                    </script>

                    <div class="form-group row">
                        <label for="skill" class="col-sm-3 col-form-label font-weight-bold">Skill <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select name="skills[]" id="skill" class="form-control" multiple="multiple">
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="orang" class="col-sm-3 col-form-label font-weight-bold">Berapa Orang <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" name="person_needed" class="form-control"
                                placeholder="Jumlah Yang Dibutuhkan">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success rounded">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal Create Offer --}}

<div id="loading" align="center">
    <div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script>
    $(document).ready(function () {
        // CKEDITOR.replace('benefit', {
        //     language: 'en-gb'
        // });

        // Function Salary
        $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });

        //function load table
        function loadTable(url) {
            var param = $("#form-search").serialize();

            $('#loading').show();
            $("#company-talent").html('');
            // export_url = "{{url('admin/talent/list/export_excel?page=1')}}&" + param;

            $.ajax({
                url: url + "&" + param,
                method: "GET",
                success: function (data) {
                    $('#loading').hide();
                    $("#company-talent").html(data);
                }
            });
        }
        //load pertama kali
        loadTable("{{url('/company/list/paginate_data?page=1')}}");

        // klik pagination , diambil urlnya langsung di load ajax
        $(document).on("click", ".page-link", function (event) {
            $("body").scrollTop(0);
            var url = $(this).attr("href");
            loadTable(url);
            event.preventDefault(); //ini biar ga keredirect ke halaman lain 
        });

        $(document).on("click", "#go", function (event) {
            var page = prompt('page ?');
            loadTable("{{url('/company/list/paginate_data?page=')}}" + page);
        });

        //search 
        $("#form-search").submit(function () {
            loadTable("{{url('/company/list/paginate_data?page=1')}}");
            return false;
        });

        $("#mass_del").click(function () {
            return confirm("delete selected ?");
        });
    });
</script>
@push('script')


<script>
    $(document).ready(function () {
        $('#all-table').DataTable();
    });

    $(document).ready(function () {
        $("#collapse1").on("hide.bs.collapse", function () {
            $(".change-icon1").removeClass('fa-plus');
            $(".change-icon1").addClass('fa-minus');
        });
        $("#collapse1").on("show.bs.collapse", function () {
            $(".change-icon1").removeClass('fa-minus');
            $(".change-icon1").addClass('fa-plus');
        });

        $("#collapse2").on("hide.bs.collapse", function () {
            $(".change-icon2").removeClass('fa-plus');
            $(".change-icon2").addClass('fa-minus');
        });
        $("#collapse2").on("show.bs.collapse", function () {
            $(".change-icon2").removeClass('fa-minus');
            $(".change-icon2").addClass('fa-plus');
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