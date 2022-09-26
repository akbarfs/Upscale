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
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Request Active</h1>
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
    @if (blank($data))
    <h4>Belum Ada Request</h4>
    @else
    @foreach ($data as $req)
    <div class="p-5 my-2 bg-white shadow d-flex justify-content-between rounded">
        <h4>{{ $req->name_request }} <span class="h6"><strong>0/{{ $req->person_needed }}</strong> dari
                <strong>...</strong> Talent Pool</span>
        </h4>
        <div>
            <button type="button" class="btn btn-secondary rounded edit-request"
                request="{{ $req->company_request_id }}" data-toggle="modal" data-target="#edit-modal"><i
                    class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            <button class="btn btn-danger rounded" type="button" data-toggle="modal" data-target="#closed-request"><i
                    class="fa fa-ban" aria-hidden="true"></i></button>
            <a class="btn btn-info rounded" href="{{ route('company.request.detail') }}"><i class="fa fa-info"
                    aria-hidden="true"></i></a>
        </div>
    </div>
    @endforeach
    @endif
</div>


<div class="modal fade" id="edit-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Request</h4>
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
                        <div class="col-sm-9 d-flex">
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
                                class="form-control rp" placeholder="Masukkan minimal gaji" value="" id="min_salary"
                                required>
                            <h3 class="text-center">&nbsp;-&nbsp;</h3>
                            <input data-a-sign="Rp. " data-a-dec="," data-a-sep="." type="text" name="max_salary"
                                class="form-control rp" placeholder="Masukkan maksimal gaji" value="" id="max_salary"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="skill" class="col-sm-3 col-form-label font-weight-bold">Skill <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-secondary btn-sm rect-border mb-3" id="add-skill">Add
                                Skill</button>
                            <div id="category-skill">
                                <div class="d-flex justify-content-between">
                                    <select name="skills[]" class="form-control skill mr-3" required>
                                    </select>
                                    <h3 class="text-center">&nbsp;-&nbsp;</h3>
                                    <input type="number" name="skill-exp[]" class="form-control"
                                        placeholder="Masukkan pengalaman skill" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="orang" class="col-sm-3 col-form-label font-weight-bold">Berapa Orang <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" id="orang" name="person_needed" class="form-control"
                                placeholder="Jumlah Yang Dibutuhkan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deadline" class="col-sm-3 col-form-label font-weight-bold">Dibutuhkan kapan
                            <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="small-rect-filter text-left rect-border form-control" id="deadline">
                                <option>Pilih Deadline</option>
                                <option value="Diploma">Secepatnya</option>
                                <option value="Bachelor Degree">2 Minggu Mendatang</option>
                                <option value="Master">1 Bulan Mendatang</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger rounded" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success rounded">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>

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
    $(document).ready(function () {
        var idx = 1;

        $('.rp').autoNumeric('init', {
            aSep: '.',
            aDec: ',',
            mDec: '0'
        });

        function loadInputSkill() {
            $('.skill').select2({
                tags: true,
                theme: "bootstrap",
                ajax: {
                    url: '{{route("json.skill.company")}}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        var results = [];
                        $.each(data, function (index, item) {
                            results.push({
                                id: item.id,
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
        }

        function deleteSkill(id) {
            $('#skill_' + id).remove();
        }

        $('.edit-request').click(function () {

            var request_id = $(this).attr('request');
            const _url = `{{ url('company/request/detail_data/') }}`;
            $.ajax({
                url: _url + '/' + request_id,
                success: function (response) {
                    var request = response['data'];
                    var skill = response['data2'];
                    $('#name').val(request['name_request']);
                    $('input:radio[name="type_work"]').filter('[value=' + request[
                        'type_work'] + ']').attr('checked', true);
                    $('#benefit').val(request['benefit']);
                    $('#min_salary').val(request['min_salary']);
                    $('#max_salary').val(request['max_salary']);
                    $('#orang').val(request['person_needed']);
                    $('#category-skill').html('');
                    skill.forEach((item, index) => {
                        var html = `<div class="d-flex justify-content-between mt-4" id="skill_${index+1}">
                            <input type="text" name="skills[]" value="${item['skill_name']}" class="form-control"
                                placeholder="Masukkan nama skill" required>
                            <h3 class="text-center">&nbsp;-&nbsp;</h3>
                            <input type="number" name="skill-exp[]" value="${item['experience']}" class="form-control"
                                placeholder="Masukkan pengalaman skill" required>
                            <span class="ml-2 pt-2"> Tahun</span>
                            <h3 class="text-center">&nbsp;-&nbsp;</h3>
                            <a class="btn btn-sm btn-danger rect-border remove-skill" href="javascript:void(0)"
                                id="${index+1}"><i class="fa fa-trash" style="line-height: 2;" aria-hidden="true"></i></a>
                        </div>`;
                        if (index == 0) {
                            html = `<div class="d-flex justify-content-between" id="skill_${index+1}">
                                <input type="text" name="skills[]" value="${item['skill_name']}" class="form-control"
                                    placeholder="Masukkan nama skill" required>
                                <h3 class="text-center">&nbsp;-&nbsp;</h3>
                                <input type="number" name="skill-exp[]" value="${item['experience']}"
                                    class="form-control" placeholder="Masukkan pengalaman skill" required>
                                <span class="ml-2 pt-2"> Tahun</span>
                            </div>`;
                        }
                        $('#category-skill').append(html);
                        idx = index + 1;
                    });
                    $('.remove-skill').click(function () {
                        var id = $(this).attr('id');
                        deleteSkill(id);
                    })
                    // $('#edit-modal').modal('show');
                }
            })

        })

        $('#add-skill').click(function () {

            var html = `<div class="d-flex justify-content-between mt-4" id="skill_${idx+1}">
            <select name="skills[]" class="form-control skill mr-3" required>
            </select>
            <h3 class="text-center">&nbsp;-&nbsp;</h3>
            <input type="number" name="skill-exp[]" class="form-control" placeholder="Masukkan pengalaman skill"
                required>
            <span class="ml-2 pt-2"> Tahun</span>
            <h3 class="text-center">&nbsp;-&nbsp;</h3>
            <a class="btn btn-sm btn-danger rect-border remove-skill" href="javascript:void(0)" id="${idx+1}"><i
                    class="fa fa-trash" style="line-height: 2;" aria-hidden="true"></i></a>
        </div>`

            $('#category-skill').append(html);
            loadInputSkill();
            idx += 1;

            $('.remove-skill').click(function () {
                var id = $(this).attr('id');
                deleteSkill(id);
            })

        })
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