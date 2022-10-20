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
          <th scope="col">Gaji</th>
          <th scope="col">Expetasi Gaji</th>
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
          <td style="min-width:200px">
            @if (!empty($talent->user_id))
            <a href="{{url('/profile/'.encrypt_custom($talent->user_id))}}" class="btn btn-info" target="_blank">
              <i class="fa fa-info"></i>
            </a>
            @else
            <button type="button" data-toggle="modal" data-target="#detail-user" class="btn btn-info" target="_blank">
              <i class="fa fa-info"></i>
            </button>
            @endif
            <button class="btn btn-sm btn-primary rounded" data-target="#modal-offer" data-id="{{$talent->talent_id}}"
              data-toggle="modal">Make A Request</button>
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
      <form action="" method="post" enctype="multipart/form-data" class="request-offer">
      @csrf
      <div class="modal-body">
          <div class="form-group">
            <label for="myrequest">My Request</label>
            <div class="mt-4">
              <select class="form-control" id="request" name="name_request"></select>
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
      var url = "id";
      const _url = `{{ url('company/dashboard/makereq?talent_id=${talent_id}') }}`;
      $('.request-offer').attr('action', _url);
      console.log(id);
      console.log($('.request-offer'));
      console.log(e.relatedTarget)
    })

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