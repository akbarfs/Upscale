@extends('admin.layout.apps')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@section('content')

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
                    <li><a href="http://127.0.0.1:8000/admin/dashboard">Dashboard</a></li>
                    <li class="active">Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br>
<br>
{{-- card --}}
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<nav>
		              <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
		                <a class="nav-item nav-link" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false" name="condition" value="all"><strong>All</strong>
		                </a>
		                <a class="nav-item nav-link" data-toggle="tab" href="#quarantine" role="tab" aria-controls="nav-profile" aria-selected="false" name="condition" value="quarantine"><strong>Quarantine</strong>
		                    <span class="badge badge-primary">99</span>
		                </a>
		                <a class="nav-item nav-link active show" data-toggle="tab" href="#assign" role="tab" aria-controls="nav-profile" aria-selected="true" name="condition" value="assign"><strong>Assign</strong>
		                    <span class="badge badge-primary">25</span>
		                </a>
		              </div>
		            </nav>
				</div>
				{{-- Card Body --}}
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="input-group mb-3">
							  <input type="text" class="form-control" placeholder="Name/Email/Phone/Addres" aria-label="Name/Email/Phone/Addres" aria-describedby="Search" id="keyword">
							  <div class="input-group-append">
							    <button class="btn btn-outline-primary" type="button" id="Search">Search</button>
							  </div>
							</div>
						</div>
						<div class="col-md-6">
							<select class="custom-select">
							  <option selected disabled="">Register</option>
							  <option value="new" name="select">New</option>
							  <option value="old" name="select">Old</option>
						   </select>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-4">
									<select class="custom-select">
									  <option selected disabled="">Gender</option>
									  <option value="male" name="select">Male</option>
									  <option value="female" name="select">Female</option>
								   </select>
								</div>
								<div class="col-md-4">
									<select class="custom-select">
									  <option selected disabled="">Set Skill</option>
									  <option value="all" name="select">All</option>
									  <option value="yes" name="select">Yes</option>
									  <option value="no" name="select">No</option>
								   </select>	
								</div>
								<div class="col-md-4">
									<select class="custom-select">
									  <option selected disabled="">Ready</option>
									  <option value="this_month" name="select">This month</option>
									  <option value="reminder" name="select">Reminder</option>
								   </select>	
								</div>
							</div>	
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<button class="form-control btn-primary"> Move To Qurantine </button>
								</div>
							</div>
						</div>				
				</div>
				{{-- end of Card Body --}}
			</div>
		</div>
	</div>
</div>
{{-- end of card --}}
<div class="container-fluid" id="pembungkus">

	<div class="spinner-border text-primary" role="status">
  		<span class="sr-only">Loading...</span>
	</div>
	@include('paginate.Talent_data')

</div>
 

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.spinner-border').hide();

			$('.nav-item').on("click",function(event){
				event.preventDefault();
				var val = $(this).attr("value");
				loadAjax(val);
			});

			function loadAjax(val){
				$("#container").html("loading..");
				$.ajax({
 					url:'/admin/talent/list/condition?data='+val,
 					method:"GET",
 					success:function(data){
 						$("#container").html(data);
 					}
 				})	
			}

			// loadTable("talent/test?page=1"); 


			$(document).on("click",".page-link",function(event)
 			{
 				var page = $(this).attr("href").split('page='); //diambil link
 				page  = page[1] ;  
 				loadTable(page);
 				$('.spinner-border').hide();
 				event.preventDefault(); //ini biar ga keredirect ke halaman lain 
 			});

			

			function loadTable(page,select="male")
			{
				var base_url = '/admin/talent/list/paginate_data?page='+page+"&select="+select; 

				$.ajax({
 					url:base_url,
 					method:"GET",
 					success:function(data){
 						$("#pembungkus").html(data);
 					}
 				})
 				// loadTable(url);
			}

			//loadTable(1); 



			$('.custom-select').change(function(){
				var select = $(this).children("option:selected").val();
				//alert(select);
				 loadTable(1,select);
				
			});
			$('#Search').on('click',function(){

				// /talent/test/search/?status=quarantine&skill=laravel+ci+php&location=yogyakarta

				var keyword = $('#keyword').val();
				var no = 1;
				$('.spinner-border').show();
				$.ajax({	
					url:'/admin/talent/list/search?keyword='+keyword, 

					method:'GET',
					success:function(data){
	
						$('#container').html(data);
						$('.spinner-border').hide();
							
					}

				})
			})
		})	
	</script>

@endsection