@extends('admin.layout.apps')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@section('content')

<div class="putih" style="background-color:white">

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Talent</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="">Dashboard</a></li>
                    <li class="active">Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container-fluid" >
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="position: relative; float:right ; margin-right: 10%">
				
				<div class="card-body">

                <table class="table table-bordered table-white" style="font-size:10px;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Member offer</th>
                        <th scope="col">Teacher offer</th>
                        <th scope="col">Class Offer</th>
                        <th scope="col">Letter Offer</th>
                        <th scope="col">Job Offer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">Total Email Send</th>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>

                        </tr>
                    
                    
                    </tbody>
                </table>

				</div>
				
			</div>
		</div>
	</div>
</div>

<form style="margin:0; padding: 0 ; background-color:white" method="post" action="" id="form-search">
						<div class="row">
							<div class="col-md-2">
								<select class="custom-select" name="status_member">
								  <option value="">--ALL--</option>
								  <option value="all" selected="selected">All</option>
								  <option value="non-member">Member offer</option>
								  <option value="member">Teacher Offer</option>
                                  <option value="member">Class Offer</option>
                                  <option value="member">Letter Offer</option>
                                  <option value="member">Job Offer</option>
							   </select>
							</div>
				
							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="email" name="talent_email">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="phone" name="talent_phone">
							</div>

							

							<style type="text/css">
								.fstQueryInput  { padding: 0 }
								.fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
								.fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
							</style>



						</div>
                                    
						<div class="row" style="margin-top: 10px">
							
							<div class="col-md-12">
								<div style="padding: 10px;">
									show : 	
									<input type="checkbox" name="contact" checked="checked"> PIC &nbsp;
									<input type="checkbox" name="skill" checked="checked"> Office Email &nbsp;
									<input type="checkbox" name="date_ready" checked="checked"> Phone &nbsp;
									<input type="checkbox" name="created" checked="checked"> Details &nbsp;
                                    <input type="checkbox" name="created" checked="checked"> Status Email &nbsp;
                                    <input type="checkbox" name="created" checked="checked"> Action &nbsp;
                                    <input type="checkbox" name="created" checked="checked"> Date &nbsp;
									<button class="btn btn-outline-primary" type="submit" id="search">Search</button>
								</div>
							</div>
						</div>
					</form>
</div>

<a href="/mailSends"><button type="button" class="btn btn-primary" style="float:right">Send Email</button></a>



<div class="table-responsive">
<table class="table">
  <caption></caption>
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">PIC</th>
      <th scope="col">Email</th>
      <th scope="col">Type Email</th>
      <th scope="col">Phone </th>
      <th scope="col">Details </th>
      <th scope="col">Status Email </th>
      <th scope="col">Action </th>
      <th scope="col">Date </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>A</td>
      <td>a@gmail.com</td>
      <td>Member offer</td>
      <td>081245457878</td>
      <td>sudah menjadi member</td>
      <td><span class="badge badge-danger">Error</span>
          <span class="badge badge-success">Valid</span> <d>
      <td>dfdsf</td>
      <td>24-Apr-2020</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>A</td>
      <td>a@gmail.com</td>
      <td>Member offer</td>
      <td>081245457878</td>
      <td>sudah menjadi member</td>
      <td><span class="badge badge-danger">Error</span>
          <span class="badge badge-success">Valid</span> <d>
      <td>dfdsf</td>
      <td>24-Apr-2020</td> 
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>A</td>
      <td>a@gmail.com</td>
      <td>Member offer</td>
      <td>081245457878</td>
      <td>sudah menjadi member</td>
      <td><span class="badge badge-danger">Error</span>
          <span class="badge badge-success">Valid</span> <d>
      <td>dfdsf</td>
      <td>24-Apr-2020</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>A</td>
      <td>a@gmail.com</td>
      <td>Member offer</td>
      <td>081245457878</td>
      <td>sudah menjadi member</td>
      <td><span class="badge badge-danger">Error</span>
          <span class="badge badge-success">Valid</span> <d>
      <td>dfdsf</td>
      <td>24-Apr-2020</td>
    </tr>
  
  </tbody>
</table>
</div>
@endsection