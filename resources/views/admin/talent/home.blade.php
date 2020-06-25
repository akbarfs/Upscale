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
                    <li><a href="">Dashboard</a></li>
                    <li class="active">Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<nav>
		              <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

		                <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab"
		                aria-controls="nav-home" aria-selected="false" value="all" 
		                id="all">
		                	<strong>All</strong> 
		                </a>
		                
		                <a class="nav-item nav-link" data-toggle="tab" href="#quarantine" role="tab"
		                aria-controls="nav-profile" aria-selected="false" value="quarantine" 
		                id="non-member">
		                	<strong>Non-Member</strong> 
		                	<span class="badge badge-primary">99</span> 
		                </a>
		                
		                <a class="nav-item nav-link show" data-toggle="tab" href="#assign" role="tab"
		                aria-controls="nav-profile" aria-selected="true" value="assign"
		                id="member">
		                	<strong>Member</strong> 
		                	<span class="badge badge-primary">25</span> 
		                </a>

		              </div>
		            </nav>
				</div>

				<div class="card-body">

					<form style="margin:0; padding: 0" method="post" action="" id="form-search">
						<div class="row">
							<div class="col-md-2">
								<select class="custom-select" name="status_member">
								  <option value="">--member?--</option>
								  <option value="all" selected="selected">all</option>
								  <option value="non-member">non-member</option>
								  <option value="member">member</option>
							   </select>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="name" name="talent_name">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="email" name="talent_email">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="phone" name="talent_phone">
							</div>

							<div class="col-md-2">
								<select class="custom-select" name="talent_onsite_jogja">
								  <option value="">-- jogja? --</option>
								  <option value="unset">unset</option>
								  <option value="yes">yes</option>
								  <option value="no">no</option>
							   </select>
							</div>

							<div class="col-md-2">
								<select class="custom-select" name="talent_onsite_jakarta">
								  <option value="">-- jakarta? --</option>
								  <option value="unset">unset</option>
								  <option value="yes">yes</option>
								  <option value="no">no</option>
							   </select>
							</div>

							<div class="col-md-2" style="margin-top: 10px">
								<select class="custom-select" name="talent_isa">
								  <option value="">-- isa? --</option>
								  <option value="unset">unset</option>
								  <option value="yes">yes</option>
								  <option value="no">no</option>
							   </select>
							</div>

							@push('script')
    
							<script src="{{url('template/upscale/js/tag.js')}}"></script>
		                    <link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">

		                    <script>
		                        
		                        $(document).ready(function()
		                        {
		                            $('.tagsInput').fastselect({

		                                valueDelimiter: ',',
		                                onItemSelect: function($item, itemModel) {
		                                    $(".fstChoiceRemove").html("x");
		                                    // $(".fstQueryInput").focus(); 
		                                },

		                            });
		                            
		                        });
		                        
		                    </script>

							@endpush


							<style type="text/css">
								.fstQueryInput  { padding: 0 }
								.fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
								.fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
							</style>
							<div style="margin: 10px;">
								<input
                                type="text"
                                onItemSelect="setClose()"
                                multiple
                                class="tagsInput form-control"
                                value=""
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                                placeholder="skill"
                                name="skill"/>
							</div>



						</div>
							
						<div class="row" style="margin-top: 10px">
							
							<div class="col-md-12">
								<div style="padding: 10px;">
									show : 	
									<input type="checkbox" name="contact" checked="checked"> Contact &nbsp
									<input type="checkbox" name="skill" checked="checked"> Skill &nbsp
									<input type="checkbox" name="date_ready" checked="checked"> Date Ready &nbsp
									<input type="checkbox" name="created" checked="checked"> Created &nbsp
									<input type="checkbox" name="ready_jogja"> 
									ready jogja &nbsp
									<input type="checkbox" name="ready_jakarta"> ready jakarta &nbsp
									<input type="checkbox" name="isa"> ISA &nbsp
									<button class="btn btn-outline-primary" type="submit" id="search">Search</button>
								</div>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>

<div id="loading" align="center">
	<div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
		<span class="sr-only">Loading...</span>
	</div>
</div>

<div class="container-fluid" id="pembungkus">


</div>


	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

	<script type="text/javascript">

		$(document).ready(function()
		{
			//mengambil data tanggal
			$( "#datepicker" ).datepicker();

			//function load table
			function loadTable(url)
			{
				var param = $("#form-search").serialize();

				$('#loading').show();
				$("#pembungkus").html('');

				
				$.ajax({
 					url:url+"&"+param,
 					method:"GET",
 					success:function(data)
 					{
 						$('#loading').hide();
 						$("#pembungkus").html(data);
 					}
 				});
			}

			
			//load pertama kali
			loadTable("{{url('/admin/talent/list/paginate_data?page=1')}}"); 

			//klik pagination , diambil urlnya langsung di load ajax
			$(document).on("click",".page-link",function(event) {
 				$( "body" ).scrollTop( 0 );
 				var url = $(this).attr("href");
 				loadTable(url);
 				event.preventDefault(); //ini biar ga keredirect ke halaman lain 
 			});

			//search 
			$("#form-search").submit(function()
			{	
				loadTable("{{url('/admin/talent/list/paginate_data?page=1')}}"); 
				return false;
			});

			//klikk all / non-member / member 
			$("#non-member").click(function() 
			{
				$("select[name='status_member']").val("non-member");
				$("#form-search").submit();
			});

			$("#member").click(function() 
			{
				$("select[name='status_member']").val("member");
				$("#form-search").submit();
			});

			$("#all").click(function() 
			{
				$("select[name='status_member']").val("all");
				$("#form-search").submit();
			});


		});
	</script>

@endsection