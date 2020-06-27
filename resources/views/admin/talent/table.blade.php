<style type="text/css">
	.badge { cursor: pointer; }
</style>
<table class="table table-striped">
	<thead>
		<tr>
		  <th scope="col">id</th>
		  <th scope="col">Name</th>
		  @if (Request::input('contact') )
		  <th scope="col">Contact</th>
		  @endif
		  @if (Request::input('skill') )
		  <th scope="col">Skills</th>
		  @endif 
		  @if (Request::input('date_ready') )
		  <th scope="col">Ready</th>
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

		  @if (Request::input('active') )
		  <th scope="col">active</th>
		  @endif

		  @if (Request::input('member_date') )
		  <th scope="col">member date</th>
		  @endif

		  @if (Request::input('created') )
		  <th scope="col">Created</th>
		  @endif 

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
		  		<br>
		  </td>

		  @if (Request::input('contact') )
		  <td>{{$talent->talent_email}}<br>{{$talent->talent_phone}}</td>
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

		  @if (Request::input('ready_jogja') )
		  <td>{{ $talent->talent_onsite_jogja }}</td>
		  @endif

		  @if (Request::input('ready_jakarta') )
		  <td>{{ $talent->talent_onsite_jakarta }}</td>
		  @endif

		  @if (Request::input('isa') )
		  <td>{{ $talent->talent_isa }}</td>
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

		  <td>
		  		<a href="{{url('/admin/talent/detail?id='.$talent->talent_id)}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-user-o"></i>
		  		</a>

		  		<a href="https://api.whatsapp.com/send?phone={{$talent->talent_phone}}&amp;text=Halo {{$talent->talent_name}}, perkenalkan saya Dodi dari upscale.id" type="button" target="_blank" class="btn btn-success btn-sm"><i class=" fa fa-whatsapp"></i></a>

		  		<a href="{{url('/admin/talent/mail/'.$talent->talent_id)}}" 
		  		class="btn btn-sm btn-primary" target="_blank">
		  			<i class="fa fa-envelope"></i>
		  		</a>
		  </td>
		</tr>
		@endforeach
	</tbody>
</table>

{{$data->links()}}