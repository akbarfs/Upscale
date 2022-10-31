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
            <form method="post" enctype="multipart/form-data" class="hire-talent">
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
    <div class="card-body">
        <table class="table table-striped mt-4 mb-4">
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
                            <form
                                action="{{ route('company.request.keeptalent', ['id_request'=>$id_request, 'id_talent'=>$talent->talent_id] ) }}"
                                method="POST" style="margin-bottom: 0;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success rect-border me-2">Move To
                                    Top</button>
                            </form>
                            <button class="btn btn-sm btn-info rect-border ml-2 hire" data-target="#hire-modal" data-id="{{$talent->talent_id}}"
                                name-talent="{{$result}}" data-toggle="modal">Hire Me!</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
        $('.status').on('change', function () {
            var id_request = `{{ $id_request }}`;
            var status = this.value;
            var id_talent = $(this).attr('id_talent');
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
        });

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
            var company_request_id = `null`;
            const _url = `{{ url('company/dashboard/hireTalent?talent_id=${talent_id}&company_request_id=${company_request_id}') }}`;
            $('.hire-talent').attr('action', _url);
        })

    })
</script>