<style type="text/css">
  .badge{
    cursor: pointer;
  }
</style>

{{-- <script type="text/javascript">
	$(document).ready(function()
	{
		$('#all-checkbox').click (function () {
		  $('.talent_id').prop('checked', this.checked);
		  $(".btnmail").toggle();
		  $("#mass_del").toggle();
		});
	});
</script> --}}

<table class="table table-striped">
  <thead>
    <tr>
      {{-- <th><input type="checkbox" id="all-checkbox" class="select-all"></th> --}}
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
        {{-- <td>
          <input type="checkbox" name="delid[]" class="talent_id pilih id-{{ $talent->talent_id }}" value="{{ $talent->talent_id }}" onclick="pilih('{{ $talent->talent_id }}')" data-id="{{ $talent->talent_id }}">
        </td> --}}
        <script>
					$(document).ready(function(){
						
						$(".btnmail").hide();
						$(".talent_id").click(function()
						{
							jumlah = $('input[name="delid[]"]:checked').length;
							if (jumlah > 0) 
							{
								$("#mass_del").show();
								$(".btnmail").show();
								// console.log(jumlah);
							}
							else
							{
								$("#mass_del").hide();
								$(".btnmail").hide();
								// console.log(jumlah);
							}
						});
					  
					});
				</script>
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
            <span class="badge badge-{{$badge}}">{{$skill->skill_name}}</span> 
          @endforeach
        </td>
        <td>
          {{-- Rp. {{ number_format($talent->gaji) }} --}}
          {{ $talent->gaji }}
        </td>
        <td>
          {{-- Rp {{ number_format($talent->expetasi) }} --}}
          {{ $talent->expetasi }}
        </td>
        <td style="min-width:200px">
          <button class="btn btn-info rounded" data-toggle="modal" data-target="#modal-detail-{{$talent->talent_id}}">
            <i class="fa fa-info" aria-hidden="true"></i>
          </button>
          @include('company.modal-detail')
          <button class="btn btn-sm btn-primary rounded" data-target="#modal-offer" data-id="{{$talent->talent_id}}" data-toggle="modal">Make A Request</button>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<style>
  .pagination{float: right;}
</style>

{{$data->links()}}

<input type="button" value="go" id="go">

<div style="clear: both;"></div>

<script>
  $(document).ready(function(){
    // list.forEach(function(item,index)
    // {
    //     $(".id-"+item).prop('checked', true);
    // });

    $(".select-all").click(function()
    {
        $('input:checkbox').not(this).prop('checked', this.checked);
        $(".pilih").each(function()
        {
            id  = $(this).data("id");
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
          <div class="modal-body">
            <form action="" class="request-offer">
              <div class="form-group">
                <label for="myrequest">My Request</label>
                <select class="form-control" id="request">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
              <div class="nav nav-pills pull-right">
                  <button type="submit" class="btn btn-success rounded">Add</button>
              </div>
          </div>
      </div>
  </div>
</div>
{{-- End Modal Offer Langsung --}}

<script>
  $(document).ready(function(){
    $('#modal-offer').on('show.bs.modal', function (e) {
      var id = e.relatedTarget.dataset.id;
      var url = "id";
      $('.request-offer').attr('action', 'https://'+id+'.com');
      console.log(id);
      console.log($('.request-offer'));
      console.log(e.relatedTarget) 
    })
  })
</script>