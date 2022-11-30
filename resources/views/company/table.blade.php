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

  .select2-container {
  width: 100% !important;
  }
</style>

<div class="card rect-border">
  <div class="">
    <table class="table table-striped mb-4">
      <thead>
        <tr>
          <th style="text-align:center;" scope="col">No.</th>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Skills</th>
          <th scope="col">Ready to Work</th>
          <th scope="col">Gaji</th>
          <th scope="col">Expetasi Gaji</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="container">
        @foreach ($data as $talent)
        <tr>
          <td style="text-align:center;">{{($data->currentPage()-1) * $data->perPage() + $loop->iteration}}</td>
          <td>
            <div class="avatar-wrapper">
              <img src="{{url('/img/avatar/noimage.jpg')}}" alt="Avatar" class="avatar">
              @if ($talent->talent_process_status == 'verified')
              <div class="verified-avatar-icon">✓</div>
              @endif
            </div>

          </td>
          <?php $result = substr($talent->name, 0, 1) . preg_replace('/[^@]/', '*', substr($talent->name, 1));?>
          <td style="max-width: 10rem;">{{$result}}</td>
          <td style="max-width: 400px">
            @foreach ( $talent->talent_skill()->get() as $row )
            <?php 
              
              if ( $row->st_skill_verified == "YES")
              {
                $badge = 'success'; 
              }
              else
              {
                $badge = 'light'; 
              }
              $skill = $row->skill()->first(); 
            ?>
            <span class="badge badge-{{$badge}}">
              {{$skill->skill_name}}
            </span>
            @endforeach
          </td>
          <td>{{ $talent->talent_date_ready ? $talent->talent_date_ready : '-' }}</td>
          <td>
            @if (!empty($talent->gaji))
            {{ $talent->gaji }}
            @else
            -
            @endif
          </td>
          <td>
            @if (!empty($talent->expetasi))
            {{ $talent->expetasi }}
            @else
            -
            @endif
          </td>
          <td style="min-width:250px">
            @if ($talent->user_id !== 0)
            <a href="{{url('/profile/'.encrypt_custom($talent->user_id))}}" class="btn btn-info" target="_blank" data-toggle="tooltip" data-placement="top" title="Profile Talent">
              <i class="fa fa-info"></i>
            </a>
            @else
            <button type="button" data-toggle="modal" data-target="#detail-user" class="btn btn-info" target="_blank">
              <i class="fa fa-info"></i>
            </button>
            @endif
            <button class="btn btn-sm btn-primary rounded" data-target="#modal-offer" data-id="{{$talent->talent_id}}" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="Add to My Request Talent">Add to My Request Talent</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="detail-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Caution Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>This account does not have detailed information</p>
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

<input type="button" value="go" id="go">

<div style="clear: both;"></div>

<script>
  $(document).ready(function () {
    // list.forEach(function(item,index)
    // {
    //     $(".id-"+item).prop('checked', true);
    // });

    $(".select-all").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
      $(".pilih").each(function () {
        id = $(this).data("id");
        pilih(id);

      });
    });
  })
</script>

{{-- Modal Offer Langsung --}}
<div class="modal fade" id="modal-offer">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">Add To My Request</div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" enctype="multipart/form-data" class="request-offer">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <p class="text-center" id="note-need"></p>
            <div class="row justify-content-center mt-4">
              <div class="col-md-10">
                <select class="form-control" id="request" name="name_request"></select>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="nav nav-pills pull-right">
          <button type="submit" class="btn btn-success rounded">Add</button>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- End Modal Offer Langsung --}}

<script>
  $(document).ready(function () {
    $('#modal-offer').on('show.bs.modal', function (e) {
      var talent_id = e.relatedTarget.dataset.id;
      const _url = `{{ url('company/dashboard/addTalentReq?talent_id=${talent_id}') }}`;
      $('.request-offer').attr('action', _url);
    })

    $('#request').on('change', function (e) {
      var value = $(this).val();
      const _url = `{{ url('company/dashboard/getInfoReq?id_request=${value}') }}`
      $.ajax({
        url: _url,
        success: function (data) {
          var content = `<strong>${data['hired']}/${data['need']}</strong> dari total <strong>${data['total']}</strong> Talent`;
          $("#note-need").html(content);
        }
      });
    });

    loadSelect();

  })

  function loadSelect() {
    $("#request").select2({
      theme: "bootstrap",
      placeholder: "Pilih Request",
      ajax:{
        url: '{{route("json.comp_req.company")}}',
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
    });
  }

</script>