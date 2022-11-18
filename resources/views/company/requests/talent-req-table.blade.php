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
            <thead class="text-center">
                <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Gaji Sekarang</th>
                    <th scope="col">Expetasi Gaji</th>
                    <th scope="col">Status</th>
                    <th scope="col">Note</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="container">
                @foreach ($data as $talent)
                <tr>
                    <td class="text-center">{{($data->currentPage()-1) * $data->perPage() + $loop->iteration}}</td>
                    <td class="text-center">
                        <img src="{{url('/img/avatar/noimage.jpg')}}" style="width: 50px; height:50px;" alt="">
                    </td>
                    <?php $result = substr($talent->name, 0, 1) . preg_replace('/[^@]/', '*', substr($talent->name, 1));?>
                    <td style="max-width: 10rem;">{{$result}}</td>
                    <td style="max-width: 250px">
                        @foreach ( $talent->talent_skill()->get() as $row )
                        <?php 
                            if ( $row->st_skill_verified == "YES"){$badge = 'success'; }
                            else{$badge = 'light';}
                            $skill = $row->skill()->first(); 
                        ?>
                        <span class="badge badge-{{$badge}}">{{$skill->skill_name}}</span>
                        @endforeach
                    </td>
                    <td>
                        @if (!empty($talent->gaji))
                        @php
                        $gaji = (int)preg_replace('/[^0-9]/', '', $talent->gaji);
                        @endphp
                        @currency($gaji)
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if (!empty($talent->expetasi))
                        @php
                           $expetasi = (int)preg_replace('/[^0-9]/', '', $talent->expetasi);
                        @endphp
                        @currency($expetasi)
                        @else
                        -
                        @endif
                    </td>
                    <td scope="col">
                        <select class="form-control status" id_talent={{ $talent->talent_id }} name="status">
                            <option value="unprocess" {{ $talent->status == "unprocess" ? "selected":"" }}>Unprocess
                            </option>
                            <option value="interview" {{ $talent->status == "interview" ? "selected":"" }}>Interview
                            </option>
                            <option value="prospek" {{ $talent->status == "prospek" ? "selected":"" }}>Prospek
                            </option>
                            <option value="offered" {{ $talent->status == "offered" ? "selected":"" }}>Offered
                            </option>
                            <option value="hired" {{ $talent->status == "hired" ? "selected":"" }}>Hired</option>
                            <option value="reject" {{ $talent->status == "reject" ? "selected":"" }}>Reject</option>
                        </select>
                    </td>
                    <td scope="col">-</td>
                    <td scope="col">
                        <div class="d-flex">
                        @if (!empty($talent->talent_id))
                        <a href="{{url('/profile/'.encrypt_custom($talent->talent_id))}}" class="btn btn-info" target="_blank">
                        <i class="fa fa-info"></i>
                        </a>
                        @else
                        <button type="button" data-toggle="modal" data-target="#detail-user" class="btn btn-info" target="_blank">
                        <i class="fa fa-info"></i>
                        </button>
                        @endif

                            <form
                                action="{{ route('company.request.keeptalent', ['id_request'=>$id_request, 'id_talent'=>$talent->talent_id] ) }}"
                                method="POST" style="margin-bottom: 0;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success rect-border ml-2 me-2">Move To
                                    Top</button>
                            </form>
                            <button class="btn btn-sm btn-info rect-border ml-2 hire hire-me" data-target="#hire-modal" data-id="{{$talent->talent_id}}"
                            id-request="{{$id_request}}" name-talent="{{$result}}" data-toggle="modal">Hire Me!</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    {{-- modal hired --}}
    <!-- Button trigger modal -->
    <button hidden id="modal-hired-button" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-hired">
        Launch demo modal
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modal-hired" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                <input placeholder="masukkan tanggal Akhir" type="text" class="form-control datepicker" id="work_start_date" name="work_start_date" required>
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


</div>
<style>
    .pagination {
        float: right;
    }
</style>

{{$data->links()}}

<div style="clear: both;"></div>

<script>
    $(document).ready(function () {

        $(".datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });


        $('.status').on('change', function () {  
            
            var id_request = `{{ $id_request }}`;
            var status = this.value;
            var id_talent = $(this).attr('id_talent');
            
            if (status == 'hired'){
                $('#modal-hired-button').click()
                $('#hired-form').on('submit', function(e){
                    e.preventDefault()
                    change_to_hired(id_request, id_talent)
                })
                
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url: "{{ route('company.request.changestatus')}}",
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

    })
</script>