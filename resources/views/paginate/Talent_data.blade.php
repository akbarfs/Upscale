<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">No</th>
	      <th scope="col">Name</th>
	      <th scope="col">Current City</th>
	      <th scope="col">Skills</th>
	      <th scope="col">Info</th>
	      <th scope="col">Contact</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody id="container">
	  	<?php $no=1; ?>
	  	@foreach($data as $talent)
	    <tr>
	      <th scope="row">{{$no++}}</th>
	      <td>{{$talent->talent_name}}</td>
	      <td>{{$talent->talent_address}}</td>
	      <td>{{$talent->talent_skill}}</td>
	      <td>{{$talent->talent_created_date}}</td>
	      <td>{{$talent->talent_phone}}</td>
	      <td><a href="">Details</a> || <a href="">Substeps</a></td>
	    </tr>
	    @endforeach
	  </tbody>
 	</table>
 	
 	{{$data->links()}}