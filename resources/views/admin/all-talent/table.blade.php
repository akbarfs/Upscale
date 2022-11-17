<style type="text/css">
	.badge {
		cursor: pointer;
	}
</style>

<script type="text/javascript">
	$(document).ready(function()
	{
		$('#all-checkbox').click (function () {
		  $('.talent_id').prop('checked', this.checked);
		  $(".btnmail").toggle();
		  $("#mass_del").toggle();
		});
	});
</script>

<table class="table table-striped">
	<thead>
		<tr>
			<th><input type="checkbox" id="all-checkbox" class="select-all"></th>
			<th scope="col">id</th>
			<th scope="col">Name</th>
			@if (Request::input('contact') )
			<th scope="col">Contact</th>
			@endif
			
			@if (Request::input('focus') )
			<th scope="col">focus</th>
			@endif

			@if (Request::input('skill') )
			<th scope="col">Skills</th>
			@endif

			@if (Request::input('date_ready') )
			<th scope="col">Ready</th>
			@endif

			@if (Request::input('pengalaman') )
			<th scope="col">pengalaman</th>
			@endif

			@if (Request::input('ready_jogja') )
			<th scope="col">Jogja</th>
			@endif

			@if (Request::input('ready_jakarta') )
			<th scope="col">Jakarta</th>
			@endif

			@if (Request::input('isa') )
			<th scope="col">ISA</th>
			@endif

			@if (Request::input('mail_invitation') )
			<th scope="col">mail invitation</th>
			@endif

			@if (Request::input('mail_regular') )
			<th scope="col">mail regular</th>
			@endif

			@if (Request::input('active') )
			<th scope="col">active</th>
			@endif

			@if (Request::input('member_date') )
			<th scope="col">member date</th>
			@endif

			@if (Request::input('created') )
			<th scope="col">Created</th>
			@endif

			@if (Request::input('jumlah_apply_jobs') )
			<th scope="col">Apply</th>
			@endif

			@if (Request::input('gaji_jogja') )
			<th scope="col">gaji jogja</th>
			@endif

			@if (Request::input('gaji_jakarta') )
			<th scope="col">gaji jogja</th>
			@endif

			@if (Request::input('cv') )
			<th scope="col">cv</th>
			@endif

			  <th scope="col">Action</th>
			</tr>
		</thead>
		<tbody id="container">
			
			@foreach($data as $talent)
			<tr>
			  <td>
			  	<input type="checkbox" name="delid[]" class="talent_id pilih id-{{$talent->talent_id}}"
			  	value="{{$talent->talent_id}}" onclick="pilih('{{$talent->talent_id}}')" data-id="{{$talent->talent_id}}">
			  </td> 			  
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


		  <th scope="row">{{$talent->talent_id}}</th>
		  <td>
		  		{{$talent->talent_name}}
		  		<br>
		  		@if ( $talent->member_email )
		  			<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member">m</span>
		  		@endif
		  		@if($talent->ref)
		  		<span class="badge badge-warning" data-toggle="tooltip" data-placement="top" 
		  			title="member">{{$talent->ref}}</span>
		  		@endif
		  		<br>
		  </td>

		  @if (Request::input('contact') )
		  <td>{{$talent->talent_email}}<br>{{$talent->talent_phone}}</td>
		  @endif

		  @if (Request::input('focus') )
		  <td>{{$talent->talent_focus}}</td>
		  @endif

		  @if (Request::input('skill') )
		  <td style="max-width: 400px">
		  	@foreach ( $talent->talent_skill()->get() as $row ) 
		  		<?php 
		  			
		  			if ( $row->st_skill_verified == "YES")
		  			{
		  				$badge = 'success'; 
		  			}
		  			else
		  			{
		  				$badge = 'default'; 
		  			}
		  			$skill = $row->skill()->first(); 
		  		?>
		  		<span class="badge badge-{{$badge}}">{{$skill->skill_name}}</span> 
		  	@endforeach
		  </td>
		  @endif

		  @if (Request::input('date_ready') )
		  <td>
		  	@if ( isset($talent->talent_date_ready))
		  	{{ \Carbon\Carbon::parse($talent->talent_date_ready)->format('D, d-m-Y') }}<br>
		  	<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member date">
		  			{{\Carbon\Carbon::createFromTimeStamp(strtotime($talent->talent_date_ready))->diffForHumans()}}</b>
		  	</span>
		  	@endif
		  </td>
		  @endif

		  @if (Request::input('pengalaman') )
		  <td>
		  	@php
		  		$tahun = abs($talent->pengalaman) / 365 ; 
		  		$tahun = number_format($tahun,2);
		  		if ( $tahun > 0 )
		  		{
		  			echo $tahun." th"; 
		  		}
		  		else
		  		{
		  			$tahun  =''; 
		  		}
		  	@endphp
		  </td>
		  @endif

		  @if (Request::input('ready_jogja') )
		  <td>{{ $talent->talent_onsite_jogja }}</td>
		  @endif

		  @if (Request::input('ready_jakarta') )
		  <td>{{ $talent->talent_onsite_jakarta }}</td>
		  @endif

		  @if (Request::input('isa') )
		  <td>{{ $talent->talent_isa }}</td>
		  @endif


		  @if (Request::input('mail_invitation') )
		  <td>{{$talent->talent_mail_invitation}}</td>
		  @endif


		  @if (Request::input('mail_regular') )
		  <td>{{$talent->talent_mail_regular}}</td>
		  @endif


		  @if (Request::input('active') )
		  <td>
		  		@if ( isset($talent->talent_last_active))
		  		{{$talent->talent_la_type ? $talent->talent_la_type : '-'}}<br>
		  		{{ \Carbon\Carbon::parse($talent->talent_last_active)->format('D, d-m-Y H:i') }}<br>
		  		<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member date">
		  		{{\Carbon\Carbon::createFromTimeStamp(strtotime($talent->talent_last_active))->diffForHumans()}}
		  		</span>
		  		@endif
		  </td>
		  @endif

		  @if (Request::input('member_date') )
		  <td>
		  	
		  		@if ( isset($talent->member_date))
		  		{{ \Carbon\Carbon::parse($talent->member_date)->format('D, d-m-Y H:i') }}<br>
		  		<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member date">
			  		{{\Carbon\Carbon::createFromTimeStamp(strtotime($talent->member_date))->diffForHumans()}}
			  	</span>
			  	@endif
		  </td>
		  @endif

		  @if (Request::input('created') )
		  <td>
		  	{{ \Carbon\Carbon::parse($talent->talent_created_date)->format('D, d-m-Y H:i') }}<br>
		  	<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member date">
		  			{{\Carbon\Carbon::createFromTimeStamp(strtotime($talent->talent_created_date))->diffForHumans()}}</b>
		  	</span>
		  </td>
		  @endif

		  @if (Request::input('jumlah_apply_jobs') )
		  <td>
		  	{{$talent->jumlah_apply_jobs}}
		  </td>
		  @endif

		  @if (Request::input('gaji_jogja') )
		  <td>
		  	{{$talent->talent_salary_jogja}}
		  </td>
		  @endif

		  @if (Request::input('gaji_jakarta') )
		  <td>
		  	{{$talent->talent_salary_jakarta}}
		  </td>
		  @endif

		  @if (Request::input('cv') )
		  <td>
		  	{{ $talent->talent_cv_update ? $talent->talent_cv_update : 'no' }}
		  </td>
		  @endif

		  <td style="min-width: 200px">
		  		<a href="{{url('/admin/talent/detail?id='.$talent->talent_id)}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-pencil"></i>
		  		</a>

		  		<a href="{{url('/profile/'.encrypt_custom($talent->user_id))}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-user-o"></i>
		  		</a>

		  		<a href="{{url('/admin/talent/mail/?id='.$talent->talent_id)}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-envelope"></i>
		  		</a>

		  		<?php $wa = preg_replace('/^0?/', '62', $talent->talent_phone); ?>
		  		<a class="btn btn-success btn-sm button-wa" data-toggle="modal" style="color: #fff" 
				data-target="#wa" data-wa='{{$wa}}' data-nama='{{$talent->talent_name}}' data-link="{{url('loginas/'.encrypt_custom($talent->talent_id))}}"> <i class=" fa fa-whatsapp"></i> </a>

				<a href="{{url('/loginas/'.encrypt_custom($talent->talent_id))}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-sign-in"></i>
		  		</a>
				
                <a class="btn btn-sm btn-secondary text-white" 
                data-toggle="modal"
				data-target="#add-to-client" 
                data-id="{{$talent->talent_id}}"
                data-nama='{{$talent->talent_name}}'>
                    <small>Add to Client</small> 
                </a>
		  </td>
		</tr>
		@endforeach
	</tbody>
</table>

<style type="text/css">
	.pagination { float: left; }
</style>

{{$data->links()}}

<input type="button" id="go" value="go" style="margin-left: 10px">

<div style="clear: both;"></div>

<script type="text/javascript">
	$(document).ready(function()
	{
		$(".button-wa").click(function()
		{
			wa = $(this).data("wa");
			nama = $(this).data("nama");
			link = $(this).data("link");
			$(".wa-pilih").click(function(index)
			{
				type = $(this).data("type")  ;
				if ( type == 'say-hai')
				{
					text = 'https://api.whatsapp.com/send?phone='+wa+'&text=Halo '+nama+', perkenalkan saya Dodi dari upscale.id'; 
				}
				else if ( type == 'cv-interview-umum')
				{
					text = 'https://api.whatsapp.com/send?phone='+wa+'&text=Halo '+nama+', saya lihat anda mendaftar menjadi member di Upscale.id, silahkan lengkapi dulu informasi profile anda berupa : %0A%0A - biodata %0A - skill %0A - pengalaman kerja  %0A - portofolio  %0A - pendidikan %0A - Upload Cv %0A - Foto Profil %0A - Form Interview %0A %0A di link berikut:  '+link+' %0A %0A Selanjutnya kami perlu tau harapan anda ketika menjadi member upscale, apakah ingin mencari lowongan pekerjaan, mencari project freelance atau mungkin ada harapan lainya.%0A %0A Oleh sebab itu apakah besok / hari ini bisa saya interview via online?'; 
				} 
				else if ( type == 'personality-test')
				{
					text = 'https://api.whatsapp.com/send?phone='+wa+'&text=Halo '+nama+', saya admin dari Upscale.id, saya lihat anda mendaftar di Upscale.id dengan profile : %0A%0A'+link+' %0A%0AProses selanjutnya kami perlu melakukan interview via online form terlebih dahulu sebelum interview langsung oleh HRD, %0A%0ASilahkan klik link berikut : %0A%0A1.'+link+'?redirect=member/personality-test %0A %0AApakah '+nama+' masih berminat untuk melanjutkan proses ini ?'; 
				} 
				else if ( type == 'personality-backend-test')
				{
					text = 'https://api.whatsapp.com/send?phone='+wa+'&text=Halo '+nama+', saya admin dari Upscale.id, saya lihat anda mendaftar di Upscale.id dengan profile : %0A%0A'+link+' %0A%0AProses selanjutnya kami perlu melakukan interview via online form terlebih dahulu sebelum interview langsung oleh HRD, %0A%0ASilahkan isi form berikut : %0A%0A1. '+link+'?redirect=member/personality-test %0A%0A2. '+link+'?redirect=member/skill-test/1 %0A %0AApakah '+nama+' masih berminat untuk melanjutkan proses ini ?';
				}

				// link = link.replace("#wa#", wa); 
				// link = link.replace("#nama#", nama);
				// alert(link); return false ;
				$(this).attr("href",text); 

			});
		});	
	});

	list.forEach(function(item,index)
    {
        $(".id-"+item).prop('checked', true);
    });

    $(".select-all").click(function()
    {
        $('input:checkbox').not(this).prop('checked', this.checked);
        $(".pilih").each(function()
        {
            id  = $(this).data("id");
            pilih(id);
           
        });
    });



</script>
<style type="text/css">
	.wa-pilih { margin-bottom: 10px; }
</style>

<div class="modal fade" id="wa" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h2>Pilih template WA</h2>
			</div>
			<div class="modal-body">
				
				<a href="#" data-type="say-hai" type="button" target="_blank" 
				class="btn btn-success btn-sm wa-pilih">
					<i class=" fa fa-whatsapp"></i> 
					Say Hello
				</a>

				<a href="#" data-type='cv-interview-umum' type="button" target="_blank" class="btn btn-success btn-sm wa-pilih">
					<i class=" fa fa-whatsapp"></i> 
					lengkapi data
				</a>

				<a href="#" data-type='personality-test' type="button" target="_blank" class="btn btn-success btn-sm wa-pilih">
					<i class=" fa fa-whatsapp"></i> 
					Personlity test
				</a>

				<a href="#" data-type='personality-backend-test' type="button" target="_blank" class="btn btn-success btn-sm wa-pilih">
					<i class=" fa fa-whatsapp"></i> 
					Personality + Backend Test
				</a>

			</div>
		</div>

	</div>
</div>

{{-- modal add to client --}}
<div class="modal fade" id="add-to-client">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Add To Client</div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="POST" enctype="multipart/form-data" class="add-to-client">
                @csrf
                <div class="modal-body">
					<p class="text-center" id="note-need"></p>
					<div class="row justify-content-center mt-4">
						<div class="form-group">
							<select class="" id="client" name="name_request"></select>
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


<script>

    $(document).ready(function () {
      $('#add-to-client').on('show.bs.modal', function (e) {
        var talent_id = e.relatedTarget.dataset.id;
        const _url = `{{ url('admin/all-talent/add_to_client?talent_id=${talent_id}') }}`;
        $('.add-to-client').attr('action', _url);
      })
  
      $('#client').on('change', function (e) {
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
      $("#client").select2({
        placeholder: "Pilih Client Request",
        ajax:{
          url: '{{route("all-talent.company_request_list")}}',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
              var results = [];
              $.each(data, function (index, item) {
                  results.push({
                      id: item.id,
                      text: item.company_name + ' - ' + item.value,
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
