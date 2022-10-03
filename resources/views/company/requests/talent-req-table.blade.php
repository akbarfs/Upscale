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

<div class="card rect-border">
    <div class="card-body">
        <table class="table table-striped mt-4 mb-4">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Image</th>
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
                    <td>{{($data->currentPage()-1) * $data->perPage() + $loop->iteration}}</td>
                    <td>
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
                        @currency($talent->expetasi)
                        @else
                        -
                        @endif
                    </td>
                    <td scope="col">
                        <select class="form-control" name="status">
                            <option value="interview">Interview</option>
                            <option value="ready">Ready</option>
                            <option value="keep">Keep</option>
                            <option value="reject">Reject</option>
                        </select>
                    </td>
                    <td scope="col">-</td>
                    <td scope="col">
                        <button class="btn btn-sm btn-success rect-border me-2">Move To Top</button>
                        <button class="btn btn-sm btn-info rect-border">Hire Me!</button>
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