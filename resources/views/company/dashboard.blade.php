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
    <button type="button" data-toggle="modal" data-target="#modal-add-offer" class="btn btn-success rect-border">Bikin Tawaran</button>
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

{{-- Modal Offer --}}
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
                    <label for="position" class="col-sm-2 col-form-label font-weight-bold">Position <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="position" id="position" placeholder="Required">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="contract" class="col-sm-2 col-form-label font-weight-bold">Contract <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2">
                            <input type="number" class="form-control" id="contract" placeholder="Required" name="duration_contract">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Month</div>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="job_type" class="col-sm-2 col-form-label font-weight-bold">Job Type <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select name="type_work" id="job_type" class="form-control">
                            <option value="offline">Offline</option>
                            <option value="online">Online</option>
                            <option value="hybrid">Hybrid</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label font-weight-bold">Description <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="benefit" class="col-sm-2 col-form-label font-weight-bold">Benefit <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="benefit" name="benefit"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label font-weight-bold">Salary <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary" class="form-control rp" placeholder="silahkan ketik angka" value="">
                    </div>
                </div>
                <div class="form-check" style="border-top: 2px solid #000;">
                    <input class="form-check-input" type="checkbox" id="offer_type" name="type_offer" style="width:1.5rem;height:1.5rem;">
                    <label class="form-check-label" for="offer_type">
                      <h6 style="margin:0.4rem">
                          Dikirim Ke Spesifik Talent
                      </h6>
                    </label>
                  </div>

                <div class="filter pt-2" style="display: none;">
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-2">
                            <label for="domisili" class="form-control-label">Domisili</label>
                            <input type="text" id="domisili" name="domisili" class="form-control" placeholde="">
                        </div>
                        <div class="col-sm-2">
                            <label for="readkerja" class="form-control-label">Ready Kerja</label>
                            <select class="custom-select" name="readkerja" id="readkerja">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="userupdate" class="form-control-label">User Terupdate</label>
                            <select class="custom-select" name="userupdate" id="userupdate">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">Tidak</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="experience" class="form-control-label">Experience</label>
                            <select name="experience" id="experience" class="form-control">
                                <option >None</option>
                                <option value=" ">No Experience</option>
                                <option value="1 Year of Experience ">1 Year of Experience</option> 
                                <option value="2 Years of Experience ">2 Years of Experience</option> 
                                <option value="3 Years of Experience ">3 Years of Experience</option> 
                                <option value="4 Years of Experience ">4 Years of Experience</option> 
                                <option value="5 Years of Experience ">5 Years of Experience</option> 
                                <option value="6 Years of Experience ">6 Years of Experience</option> 
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="skill" class="form-control-label">Skill</label>
                            <input 
                                type="text" 
                                id="skill" 
                                name="skill" 
                                class="form-control tagsInput" 
                                onItemSelect="setClose()"
                                multiple
                                value=""
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                            />
                        </div>
                    </div>          

                    <div class="form-row justify-content-center">
                        <div class="col-sm-2">
                            <label for="onsite" class="form-control-label">Ready Onsite</label>
                            <select class="custom-select" name="onsite" id="onsite">
                                <option >None</option>
                                <option value="yes">Ya</option>
                                <option value="no">WFH</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="expecsalary" class="form-control-label">Expetasi Gaji</label>
                            <input name="expsalary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary" class="form-control rp" placeholder="silahkan ketik angka" value="">
                        </div>
                        <div class="col-sm-2">
                            <label for="currsalary" class="form-control-label">Current Sallary</label>
                            <input name="currsalary" data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="salary" class="form-control rp" placeholder="silahkan ketik angka" value="">
                        </div>
                        <div class="col-sm-2">
                            <label for="education" class="form-control-label">Education</label>
                            <input type="text" id="education" class="form-control" placeholde="">
                        </div>
                        <div class="col-sm-2">
                            <label for="type" class="form-control-label">Tipe Pekerjaan</label>
                            <select name="type" id="type" class="form-control">
                                <option value="none">None</option>
                                <option value="Fulltime">Fulltime</option>
                                <option value="Parttime">Parttime</option>
                                <option value="Internship">Internship</option>
                              </select>
                        </div>
                    </div>                 
                </div>
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
{{-- End Modal Offer --}}


<link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}"/>
<script type="text/javascript" src="{{ asset('js/autoNumeric.js') }}"></script>
<script>
    $(document).ready(function(){
        CKEDITOR.replace('description',{
                language:'en-gb'
            });
        CKEDITOR.replace('benefit',{
                language:'en-gb'
            });

        $('#offer_type').on('change', function(){
            if($(this).is(':checked')){
                $('.filter').show();
            }else{
                $('.filter').hide();
            }
        })
        $('.rp').autoNumeric('init', {aSep:'.', aDec:',', mDec:'0'});
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
</>

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
</>

{{-- <script src=//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js charset=utf-8></>
<script src=//cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js charset=utf-8></script>
<script src=//cdn.jsdelivr.net/npm/fusioncharts@3.12.2/fusioncharts.js charset=utf-8></script>
<script src=//cdnjs.cloudflare.com/ajax/libs/echarts/4.0.2/echarts-en.min.js charset=utf-8></script> --}}

@endpush

@endsection
