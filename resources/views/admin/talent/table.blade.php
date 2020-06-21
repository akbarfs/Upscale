<style type="text/css">
	.badge { cursor: pointer; }
</style>
<table class="table table-striped">
	<thead>
		<tr>
		  <th scope="col">id</th>
		  <th scope="col">Name</th>
		  <th scope="col">email</th>
		  <th scope="col">Skills</th>
		  <th scope="col">Created</th>
		  <th scope="col">Action</th>
		</tr>
	</thead>
	<tbody id="container">
		
		@foreach($data as $talent)
		<tr>
		  <th scope="row">{{$talent->talent_id}}</th>
		  <td>
		  		{{$talent->talent_name}}
		  		@if ( $talent->member_email )
		  			<span class="badge badge-info" data-toggle="tooltip" data-placement="top" 
		  			title="member">m</span>
		  		@endif
		  </td>
		  <td>{{$talent->talent_phone}}<br>{{$talent->member_email}}</td>
		  <td style="width: 400px">
		  	@foreach ( $talent->talent_skill()->get() as $row ) 
		  		<span class="badge badge-info">{{$row->skill()->first()->skill_name}}</span> 
		  	@endforeach
		  </td>
		  <td>{{ \Carbon\Carbon::parse($talent->talent_created_date)->format('D, d-m-Y H:i') }}</td>
		  <td>
		  		<a href="{{url('/admin/talent/detail?id='.$talent->talent_id)}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-user-o"></i>
		  		</a>

		  		<a href="https://api.whatsapp.com/send?phone=6287888666531&amp;text=Halo {{$talent->talent_name}}, Perkenalkan saya Arief dari Tim HR Upscale.id, Mohon maaf sebelumnya saya menghubungi secara langsung via WA ini. Kami ingin menginformasikan bahwa saat ini kami memiliki banyak kebutuhan untuk beberapa posisi di Web %20%26%20 Mobile Development. Jika tertarik baik dalam waktu saat ini atau untuk beberapa bulan kedepan saat available cari kerja, apakah bersedia untuk kami minta beberapa informasi terkait skills, portofolio, kapan available kerjanya serta berapa gaji yang diinginkan. Terimakasih" type="button" target="_blank" class="btn btn-success btn-sm"><i class=" fa fa-whatsapp"></i></a>
		  </td>
		</tr>
		@endforeach
	</tbody>
</table>

{{$data->links()}}