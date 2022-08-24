@extends('company.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
    .select2-selection{
        overflow: hidden;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Talent</h1>
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
    <button type="button" data-toggle="modal" data-target="#modal-add-offer" class="btn btn-success rect-border">Bikin Tawaran</button>
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

    {{-- <div class="mt-4">
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
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-offer">Tawar Langsung</button>
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
    </div> --}}

    <div class="container-fluid mt-2" id="company-talent" style="padding:0;"></div>
    
</div> 

{{-- Modal Create Offer --}}
<div class="modal fade" id="modal-add-offer">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Make An Offer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('company.makeoffer') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label font-weight-bold">Nama Request <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Request" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-3 col-form-label font-weight-bold">Lokasi Kerja <span class="text-danger">*</span></label>
                    <div class="col-sm-9 justify-content-between d-flex">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="location" id="location1" value="Onsite">
                            <label class="form-check-label" for="location1">On Site</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="location" id="location2" value="remote">
                          <label class="form-check-label" for="location2">Remote</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="location" id="location3" value="hybrid">
                          <label class="form-check-label" for="location3">Hybrid</label>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label for="contract" class="col-sm-2 col-form-label font-weight-bold">Contract <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" id="contract" placeholder="Durasi Kontrak" name="duration_contract">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Month</div>
                            </div>
                          </div>
                    </div>
                </div> --}}
                {{-- <div class="form-group row">
                    <label for="job_type" class="col-sm-2 col-form-label font-weight-bold">Job Type <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select name="type_work" id="job_type" class="form-control">
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                    </div>
                </div> --}}
                {{-- <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label font-weight-bold">Description <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="benefit" class="col-sm-3 col-form-label font-weight-bold">Benefit <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="benefit" name="benefit"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="salary" class="col-sm-3 col-form-label font-weight-bold">Range Salary <span class="text-danger">*</span></label>
                    <div class="col-sm-9 d-flex justify-content-between">
                        <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="from" class="form-control rp" placeholder="silahkan ketik angka" value="" required>
                        <h3 class="text-center">&nbsp;-&nbsp;</h3>
                        <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="to" class="form-control rp" placeholder="silahkan ketik angka" value="" required>
                    </div>
                </div>
                <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $('#skill').select2({
                            width: 'resolve',
                            ajax: {
                                url: '{{route("json.skill.company")}}',
                                dataType: 'json',
                                delay: 250,
                                processResults: function (data) {
                                    var results = [];
                                    $.each(data, function(index,item){
                                        results.push({
                                            id : item.id,
                                            text: item.value,
                                        });
                                    });
                                    return {
                                        results : results
                                    }                                                
                                },
                                cache: false
                            }
                        });
                    })
                </script>
                <div class="form-group row">
                    <label for="skill" class="col-sm-3 col-form-label font-weight-bold">Skill <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <select name="skill[]" id="skill" class="form-control" multiple="multiple">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="orang" class="col-sm-3 col-form-label font-weight-bold">Berapa Orang <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="Jumlah Yang Dibutuhkan">
                    </div>
                </div>

                {{-- <div class="form-check" style="border-top: 2px solid #000;">
                    <input class="form-check-input" type="checkbox" id="offer_type" name="type_offer" style="width:1.5rem;height:1.5rem;">
                    <label class="form-check-label" for="offer_type">
                      <h6 style="margin:0.4rem">
                          Dikirim Ke Spesifik Talent
                      </h6>
                    </label>
                </div> --}}

                {{-- <div class="filter pt-2" style="display: none;">
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-6 col-md-2">
                            <label for="domisili" class="form-control-label">Domisili</label>
                            <input type="text" id="domisili" name="domisili" class="form-control" placeholde="">
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="readkerja" class="form-control-label">Ready Kerja</label>
                            <select class="custom-select" name="readkerja" id="readkerja">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="userupdate" class="form-control-label">User Terupdate</label>
                            <select class="custom-select" name="userupdate" id="userupdate">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="experience" class="form-control-label">Experience</label>
                            <select name="experience" id="experience" class="form-control">
                                <option value="none">None</option>
                                <option value="Less Then 1 Years">Less Then 1 Years</option> 
                                <option value="1 - 3 Years">1 - 3 Years</option> 
                                <option value="3 - 5 Years">3 - 5 Years</option> 
                                <option value="5 - 10 Years">5 - 10 Years</option> 
                                <option value="More Then 10 Years">More Then 10 Years</option>  
                            </select>
                        </div>
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
                        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                        <script>
                            $(document).ready(function(){
                                $('#skill').select2({
                                    width: 'resolve',
                                    ajax: {
                                        url: '{{route("json.skill.company")}}',
                                        dataType: 'json',
                                        delay: 250,
                                        processResults: function (data) {
                                            var results = [];
                                            $.each(data, function(index,item){
                                                results.push({
                                                    id : item.id,
                                                    text: item.value,
                                                });
                                            });
                                            return {
                                                results : results
                                            }                                                
                                        },
                                        cache: false
                                    }
                                });
                            })
                        </script>
                        <div class="col-sm-6 col-md-2" style="display: inline-grid">
                            <label for="skill" class="form-control-label">Skill</label>
                            <select name="skill[]" id="skill" class="form-control" multiple="multiple">
                            </select>
                        </div>
                    </div>          

                    <div class="form-row justify-content-center">
                        <div class="col-sm-6 col-md-2">
                            <label for="onsite" class="form-control-label">Ready Onsite</label>
                            <select class="custom-select" name="onsite" id="onsite">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="expecsalary" class="form-control-label">Salary From</label>
                            <input name="expsalary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary" class="form-control rp" placeholder="silahkan ketik angka" value="">
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="currsalary" class="form-control-label">To</label>
                            <input name="currsalary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary" class="form-control rp" placeholder="silahkan ketik angka" value="">
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="education" class="form-control-label">Education</label>
                            <select class="custom-select" name="education" id="onsite">
                                <option>None</option>
                                <option value="High School">High School</option>
                                <option value="Diploma">Diploma</option>
                                <option value="Bachelor Degree">Bachelor Degree</option>
                                <option value="Master">Master</option>
                                <option value="Other">other</option>
                            </select>
                        </div>
                        <div class="col-sm-6 col-md-2">
                            <label for="type" class="form-control-label">Tipe Pekerjaan</label>
                            <select name="type" id="type" class="form-control">
                                <option value="none">None</option>
                                <option value="Fulltime">Fulltime</option>
                                <option value="Parttime">Parttime</option>
                                <option value="Internship">Internship</option>
                              </select>
                        </div>
                    </div>                 
                </div> --}}

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded" data-dismiss="modal">Close</button>
                <div class="nav nav-pills pull-right">
                    <button type="submit" class="btn btn-success rounded">Kirim</button>
                </div>
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

<script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>
<script>
    $(document).ready(function(){
        // CKEDITOR.replace('description',{
        //         language:'en-gb'
        //     });
        CKEDITOR.replace('benefit',{
                language:'en-gb'
            });
        
        // Function Salary
        $('.rp').autoNumeric('init', {aSep:'.', aDec:',', mDec:'0'});

        //function load table
        function loadTable(url) {
            var param = $("#form-search").serialize();

            $('#loading').show();
            $("#company-talent").html('');
            // export_url = "{{url('admin/talent/list/export_excel?page=1')}}&" + param;

            $.ajax({
                url: url + "&" + param,
                method: "GET",
                success: function(data) {
                    $('#loading').hide();
                    $("#company-talent").html(data);
                }
            });
        }
        //load pertama kali
        loadTable("{{url('/company/list/paginate_data?page=1')}}");
        
        // klik pagination , diambil urlnya langsung di load ajax
        $(document).on("click", ".page-link", function(event) {
            $("body").scrollTop(0);
            var url = $(this).attr("href");
            loadTable(url);
            event.preventDefault(); //ini biar ga keredirect ke halaman lain 
        });

        $(document).on("click","#go",function(event)
        {
            var page = prompt();
            loadTable("{{url('/company/list/paginate_data?page=')}}"+page);
        });

        //search 
        $("#form-search").submit(function() {
            loadTable("{{url('/company/list/paginate_data?page=1')}}");
            return false;
        });

        $("#mass_del").click(function() {
            return confirm("delete selected ?");
        });
    });
</script>
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

{{-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}

@endpush

@endsection
