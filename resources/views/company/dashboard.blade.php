@extends('company.layout.apps')

@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance: unset !important;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
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
    <button type="button" class="btn btn-success rect-border">Bikin Tawaran</button>
    <div class="row justify-content-center mt-4">
        <div class="col-md-3">
            <div class="rect-filter rect-border">Semua Talent</div>
        </div>
        <div class="col-md-3">
             <div class="rect-filter rect-border">Talent yang Dikirim Tawaran</div>
        </div>
        <div class="col-md-3">
             <div class="rect-filter rect-border">Talent yang Approve Tawaran</div>
        </div>
        <div class="col-md-3">
            <div class="rect-filter rect-border">Talent Verified oleh Upscale</div>
        </div>
    </div>

    <div class="mt-4">
        <h5>Saring Pencarian</h5>
        <hr>
        <!--<form action="" method="POST" id="form-search">
            
        </form>-->
        <div class="row">
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Ready Kerja</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">User Terupdate</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Experience in Years</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Skill</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Ready Onsite</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Expektasi Gaji</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Current Salary</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Education</div>
            </div>
            <div class="col-md-2 mt-4">
                <div class="small-rect-filter rect-border">Tipe Pekerjaan</div>
            </div>
        </div>
        <button class="btn btn-info rect-border mt-4">Searching</button>
    </div>

    <div class="mt-4">
        <h5>List Talent</h5>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="all-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name Talent</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nama</td>
                                            <td>
                                                <button class="btn btn-success btn-sm">Tawar Langsung</button>
                                                <button class="btn btn-secondary btn-sm">Kontak</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> 
@push('script')

<script>
    $(document).ready(function() {
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

{{-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}

@endpush

@endsection
