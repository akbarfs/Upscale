<style type="text/css">
    .badge {
        cursor: pointer;
    }

    .table td,
    .table th,
    .table thead th {
        vertical-align: middle !important;
    }

    .table thead th {
        height: 50px !important;
    }
</style>

<div class="modal fade" id="hire-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="hire-talent">
            @csrf
            <div class="modal-body text-center px-5">
                <i class="fa fa-envelope" aria-hidden="true" style="font-size: 70px;"></i>
                <div class="form-check m-4">
                    <input type="checkbox" class="form-check-input" id="agree">
                    <label class="form-check-label" for="agree" id="hire-talent"></label>
                </div>
                <p>Saya ingin menjadwalkan meet dengan talent tersebut. Tolong hubungi saya</p>
                <button class="btn btn-success rect-border mt-3" id="send-request" disabled>Kirim Permintaan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="card rect-border">
    <div class="">
        <table class="table table-striped mb-4">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Position</th>
                    <th scope="col">Client</th>
                    <th scope="col">Current City</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="container">

                @foreach ($request_log as $data)
                <tr>
                    <td class="text-center">{{($request_log->currentPage()-1) * $request_log->perPage() + $loop->iteration}}</td>
                    <td>
                        {{ $data->company_request->name_request }}
                    </td>
                    <td>{{ $data->company_request->company->company_name }}</td>
                    <td>{{ $data->talent->talent_address }}</td>
                    <td>
                        {{ $data->talent->talent_name }}
                        @if ($data->is_hire_requested == 1)
                        <br>
                        <span class="my-1 badge badge-info">Requested</span>
                        @endif
                    </td>
                    <td>
                        {{ $data->talent->talent_email }}
                        <br>
                        @if ($data->is_hire_requested == 1)
                        <a href="https://wa.me/62{{ $data->talent->talent_phone }}" target="_blank">
                            <span class="my-1 badge badge-success">
                                <i class="fa fa-whatsapp"></i> {{ $data->talent->talent_phone }}
                            </span>
                        </a>
                        @else
                        <a href="https://wa.me/62{{ $data->talent->talent_phone }}" target="_blank">
                            <span class="my-1 badge badge-secondary">
                                <i class="fa fa-whatsapp"></i> {{ $data->talent->talent_phone }}
                            </span>
                        </a>
                        @endif
                        
                    </td>
                    <td scope="col">
                        <select class="form-control status" company_req_id="{{ $data->company_request_id }}" nama_talent="{{ $data->name }}" id_talent={{ $data->talent_id }} name="status">
                            <option value="unprocess" {{ $data->status == "unprocess" ? "selected":"" }}>Unprocess
                            </option>
                            <option value="interview" {{ $data->status == "interview" ? "selected":"" }}>Interview
                            </option>
                            <option value="prospek" {{ $data->status == "prospek" ? "selected":"" }}>Prospek
                            </option>
                            <option value="offered" {{ $data->status == "offered" ? "selected":"" }}>Offered
                            </option>
                            <option value="hired" {{ $data->status == "hired" ? "selected":"" }}>Hired</option>
                            <option value="reject" {{ $data->status == "reject" ? "selected":"" }}>Reject</option>
                        </select>
                    </td>
                    <td scope="col">
                        {{-- jobsapply detail --}}
                        <a href="{{ route('jobsapply.detail') . '?id=' . $data->talent_id }}" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Application Details" target="_blank"><i class="fa fa-share-square-o"></i></a>

                        {{-- talent detail --}}
                        <a href="{{ route('talent.detail') . '?id=' . $data->talent_id }}" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="See Talent Details" target="_blank"><i class="fa fa-user-o"></i></a>


                        {{-- button modal tambah catatan  --}}
                        <button id="button-substeps" talent_id="{{ $data->talent_id }}" data-toggle="modal" data-target="#modal-substeps" type="button" class="btn btn-warning btn-xs button-substeps" data-toggle="tooltip" data-placement="top" title="See Substeps For This Application">
                            <i class="	fa fa-check"></i>
                        </button>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- modal hired --}}
    <!-- Button trigger modal -->
    <button hidden id="modal-hired-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-hired">
        Hired
    </button>
    
    <div class="modal fade" id="modal-hired" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="title-modal-hired">Modal title</h5>
            <button onClick="window.location.reload();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form method="POST" enctype="multipart/form-data" class="hired" id="hired-form">
                <div class="modal-body">
                    @csrf
                    <div class="modal-body">

                        <ul id="error_list"></ul>

                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hire_status" id="inlineRadio1" value="headhunter" required>
                                    <label class="form-check-label" for="inlineRadio1">Headhunter</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hire_status" id="inlineRadio2" value="dedicated_team">
                                    <label class="form-check-label" for="inlineRadio2">Dedicated Team</label>
                                  </div>
                            </div>
                        </div>      
                        <div class="form-group row">
                            <label for="status" class="col-sm-4 col-form-label">Mulai Kerja</label>
                            <div class="col-sm-8">
                                <input placeholder="masukkan tanggal mulai kerja" type="text" class="form-control datepicker" id="work_start_date" name="work_start_date" required>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </form>
        </div>
        </div>
    </div>


    {{-- modal substeps --}}
    <div class="modal fade" id="modal-substeps" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul-panjang">Substeps dan Tambahkan Catatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body substeps-modal">
                <form action="">
                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <input type="text" name="jobs_apply_note" class="form-control" id="catatan" placeholder="Masukan Catatan">
                        <input type="hidden" name="jobs_apply_id" value="">
                    </div>
                    <div class="form-group">
                        <label for="catatan">Label</label>
                        <input type="text" name="jobs_apply_label" class="form-control" id="label" placeholder="Tulis Label Sesingkat Mungkin">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="rush">
                        <label class="form-check-label" for="rush">
                            Rush / Potensial
                        </label>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary rect-border float-right">Simpan</button>
                </form>
            </div>
          </div>
        </div>
    </div>


</div>
<style>
    .pagination {
        float: right;
    }
</style>

{{$request_log->links()}}

<div style="clear: both;"></div>

<script>
    $(document).ready(function () {

        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });


        // substeps
        $('.button-substeps').on('click', function () {
            var talent_id = $(this).attr('talent_id');
            console.log(talent_id);
            const uri = `talent_id=${talent_id}&company_request_id=${company_request_id}`;
            const _url = `{{ url('company/dashboard/hireTalent?${uri}') }}`;
            $('.hire-talent').attr('action', _url);
        })


        $('.status').on('change', function () {  
            var id_request = $(this).attr('company_req_id');
            var status = this.value;
            var id_talent = $(this).attr('id_talent');
            
            if (status == 'hired'){
                // show modal
                $('#modal-hired-button').click()

                // change modal title
                var title = 'Tambahkan ' + $(this).attr('nama_talent')
                $('#modal-hired').find('#title-modal-hired').text(title)

                // submit form
                $('#hired-form').on('submit', function(e){
                    e.preventDefault()
                    change_to_hired(id_request, id_talent)
                })
                
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: "{{ route('jobsapplyclient.request.changestatus')}}",
                    method: "POST",
                    data: {
                        id_request: id_request,
                        status: status,
                        id_talent: id_talent
                    },
                    success: function (data) {
                        alert(data['message']);
                        location.reload();
                    }
                });
            }
        });


        // store data when change to hired
        function change_to_hired(id_request, id_talent){
            var hire_status = $('input[name="hire_status"]:checked').val();
            var work_start_date = $('#work_start_date').val()

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: "{{ route('company.request.change_to_hired')}}",
                method: "POST",
                data: {
                    id_request: id_request,
                    id_talent: id_talent,
                    hire_status: hire_status,
                    work_start_date: work_start_date
                },
                success: function (data) {
                    alert(data['message']);
                    location.reload();
                }
            });
        }

        $('.hire').on('click', function () {
            var name = $(this).attr('name-talent');
            var text = `Saya sudah membaca profile ${name} dan saya tertarik dengan talent ini`;
            $('#hire-talent').text(text);

        })

        $('#agree').on('change', function () {
            if (this.checked) {
                $('#send-request').attr('disabled', false)
            } else {
                $('#send-request').attr('disabled', true)
            }
        })

        $('#hire-modal').on('show.bs.modal', function (e) {
            var talent_id = e.relatedTarget.dataset.id;
            var company_request_id = $('.hire-me').attr('id-request');
            const uri = `talent_id=${talent_id}&company_request_id=${company_request_id}`;
            const _url = `{{ url('company/dashboard/hireTalent?${uri}') }}`;
            $('.hire-talent').attr('action', _url);
        })
        
        $('#modal-substeps').on('show.bs.modal', function (e) {
            // var talent_id = $('.button-substeps').attr('talent_id');
            console.log('modal-substeps');
            // const uri = `talent_id=${talent_id}&company_request_id=${company_request_id}`;
            // const _url = `{{ url('company/dashboard/hireTalent?${uri}') }}`;
            // $('.hire-talent').attr('action', _url);
        })

    })
</script>