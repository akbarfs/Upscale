@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@section('content')

<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance: unset !important;
    }

    .select2-container {
        width: 100% !important;
    }

    .select2-selection {
        overflow: hidden;
    }

    .stright-line {
        background: gray;
        margin: auto 10px;
        width: 80%;
        height: 3px;
    }

    .filter-btn {
        background-color: #405B74;
        padding: 10px;
        color: white;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
    }

    .filter-btn.active{
        background-color: #80bde3;
    }

    .filter-btn:hover {
        background-color: #80bde3;
    }

    .filter-btn span {
        background-color: white;
        font-weight: bold;
        color: black;
        padding: 0 5px;
        border-radius: 2px;
    }
</style>


<div class="breadcrumbs">
	<div class="col-sm-4">
		<div class="page-header float-left">
			<div class="page-title">
				<h1>All Talent</h1>
			</div>
		</div>
	</div>
	<div class="col-sm-8">
		@include('admin.layout.notification')
	</div>
</div>
<br>
<br>

<div class="container-fluid">
	
	<div class="content mb-4">
		<div class="row">
			<div class="col-sm-2">
				<div class="d-flex justify-content-between filter-btn rect-border show active" id="unprocess">
					Unprocess
					<span>{{ $talentpool['unprocess'] }}</span>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="d-flex justify-content-between filter-btn rect-border" id="interview">
					Interview
					<span>{{ $talentpool['interview'] }}</span>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="d-flex justify-content-between filter-btn rect-border" id="verified">
					Verified
					<span>{{ $talentpool['verified'] }}</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card" style="margin-bottom: 10px;">

                
                {{-- tabs --}}
				<div class="card-header">
					<nav>
						<div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

							<a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false" value="all" id="all">
								<strong>All</strong>
							</a>

							<a class="nav-item nav-link" data-toggle="tab" href="#quarantine" role="tab" aria-controls="nav-profile" aria-selected="false" value="quarantine" id="non-member">
								<strong>Non-Member</strong>
								<span class="badge badge-primary">{{$nonmember}}</span>
							</a>

							<a class="nav-item nav-link show" data-toggle="tab" href="#assign" role="tab" aria-controls="nav-profile" aria-selected="true" value="assign" id="member">
								<strong>Ready</strong>
								<span class="badge badge-primary">{{$member}}</span>
							</a>

						</div>
					</nav>
				</div>

                {{-- search filter --}}
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
								<input type="text" class="form-control" placeholder="id" name="talent_id">
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
								<input type="text" class="form-control" placeholder="focus" name="talent_focus">
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="min_pengalaman" name="min_pengalaman">
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="max_pengalaman" name="max_pengalaman">
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="min gaji jogaj" name="min_gaji_jogja">
							</div>

							<div class="col-md-2">
								<input type="text" class="form-control" placeholder="max gaji jogja" name="max_gaji_jogja">
							</div>

							<div class="col-md-2">
								<select class="custom-select" name="talent_onsite_jogja">
									<option value="">-- jogja? --</option>
									<option value="unset">unset</option>
									<option value="yes">yes</option>
									<option value="no">no</option>
								</select>
							</div>

							<div class="col-md-2" style="margin-top: 10px">
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

							<div class="col-md-2" style="margin-top: 10px">
								<select class="custom-select" name="apply">
									<option value="">-- apply jobs? --</option>
									<option value="yes">yes</option>
									<option value="no">no</option>
								</select>
							</div>

							<div class="col-md-2" style="margin-top: 10px">
								<select class="custom-select" name="cv">
									<option value="">-- cv ? --</option>
									<option value="yes">yes</option>
									<option value="no">no</option>
								</select>
							</div>

							<div class="col-md-2" style="margin-top: 10px">
								<select class="custom-select" name="order">
									<option value="">-- order? --</option>
									<option value="talent_id">DB ID</option>
									<option value="talent_last_active">last active</option>
									<option value="talent_date_ready">date ready</option>
									<option value="talent_created_date">DB Created</option>
									<option value="member_date">register as member</option>
									<option value="jumlah_apply_jobs">jobs apply</option>
									<option value="talent_mail_invitation">mail invitation</option>
									<option value="talent_mail_regular">mail regular</option>
									<option value="talent_mail_regular">mail regular</option>
								</select>
							</div>



							@push('script')

							@include('sweetalert::alert')
							<script src="{{url('template/upscale/js/tag.js')}}"></script>
							<link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">

							<script>
								$(document).ready(function() {
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
								.fstQueryInput {
									padding: 0
								}

								.fstControls {
									padding: 0 !important;
									min-width: 200px;
									height: 35px
								}

								.fstQueryInputExpanded {
									padding: 0 10px !important;
									margin: 0 !important
								}
							</style>

						</div>

						<div class="row" style="margin-top: 10px">

							<div class="col-md-12">
								<div style="padding: 10px;">
									show :
									<input type="checkbox" name="contact" checked="checked"> Contact &nbsp
									<input type="checkbox" name="skill" checked="checked"> Skill &nbsp
									<input type="checkbox" name="date_ready" checked="checked"> Date Ready &nbsp
									<input type="checkbox" name="status" checked="status"> Status nbsp
									<input type="checkbox" name="created" checked="checked"> Created &nbsp
									<input type="checkbox" name="ready_jogja">
									ready jogja &nbsp
									<input type="checkbox" name="ready_jakarta"> ready jakarta &nbsp
									<input type="checkbox" name="isa"> ISA &nbsp
									<input type="checkbox" name="active"> last active &nbsp
									<input type="checkbox" name="mail_invitation"> mail invitation &nbsp
									<input type="checkbox" name="mail_regular"> mail regular &nbsp
									<input type="checkbox" name="member_date"> member date &nbsp
									<input type="checkbox" name="jumlah_apply_jobs"> Jumlah Apply Jobs &nbsp
									<input type="checkbox" name="focus"> Focus &nbsp
									<input type="checkbox" name="pengalaman"> Pengalaman &nbsp
									<input type="checkbox" name="cv"> cv &nbsp
									<input type="checkbox" name="gaji_jogja"> gaji jogja &nbsp
									<input type="checkbox" name="gaji_jakarta"> gaji jakarta &nbsp
								</div>
								<div>
									<button class="btn btn-outline-primary" type="submit" id="search">Search</button>
								</div>
							</div>



						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<style type="text/css">
		.tb {
			margin-bottom: 10px;
			color: #fff !important
		}
		#mass_del { display: none; }
	</style>

	@if (\Session::has('success'))
	<div class="alert alert-success">
		<ul>
			<li>{!! \Session::get('success') !!}</li>
		</ul>
	</div>
	@endif


	<!-- notif import -->
	{{-- notifikasi form validasi --}}
	@if ($errors->has('file'))
	<span class="invalid-feedback" role="alert">
		<strong>{{ $errors->first('file') }}</strong>
	</span>
	@endif

	{{-- notifikasi gagal --}}
	@if ($gagal = Session::get('gagal'))
	<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $gagal }}</strong>
	</div>
	@endif


	{{-- notifikasi sukses --}}
	@if ($sukses = Session::get('sukses'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>{{ $sukses }}</strong>
	</div>
	@endif


	
    {{-- tambah talent --}}
	<form action="{{ url('admin/talent/del') }}" method="post">
		{{csrf_field()}}
	
		<a href="list/insert" class="btn btn-success btn-sm tb"> Tambah Talent </a>
		<a id="export" class="btn btn-success btn-sm tb"> Export </a>
		<a type="button" class="btn btn-primary btn-sm tb" data-toggle="modal" data-target="#importExcel">
			IMPORT EXCEL
		</a>
		{{-- <button type="submit" class="btn btn-danger btn-sm tb" id="mass_del"> Delete </button> --}}
		<a class="btn btn-success btn-sm tb btnmail" data-toggle="modal" 
		data-target="#myModal"> Send Email </a>

		<!-- LOAD CONTENT -->
		<div class="list-box" style="display: none; margin-bottom: 20px">
            <span>Selected : </span>
            <span class="list"></span>
            <a href="#" class="clear btn btn-sm"> Clear Selected </a>
        </div>
		<div class="container-fluid" id="pembungkus" style="padding: 0"></div>

		Total : {{$total}}<br>
		member : {{$member}}<br>
		non-member : {{$nonmember}}<br>
		invitation : {{$invitation}}<br>

	
	</form>

    <!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ url('admin/talent/list/import') }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                    
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>
                    
                        <a href="list/download" class="btn btn-large pull-left"> Download Template Excel </a>
                    
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


	<!-- Modal -->
	<style type="text/css">
		.mailreport {    padding: 10px; margin-top: 10px; background: #f1f1f1; max-height: 300px ; overflow: auto;} 
	</style>
	<div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Send Email</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>

				</div>
				<div class="modal-body">

					<script type="text/javascript">
						$(document).ready(function()
						{

							var i = 0 ;
							$(".mailsend").click(function() 
							{
								// var list_id = [] ; 
								// i = 0 ; 

								// $('input[name="delid[]"]:checked').each(function() 
								// {
								// 	list_id.push(this.value); 
								// }); 

								// console.log(list); 
								// return false ; 
								$(".mailreport").prepend("<b> send email start process.. <br>");
								sendMail(list,0);
							});

							function sendMail(list,urutan)
							{
								type = $("#email-type").val(); 
								sender = $("#email-sender").val(); 
								judul = $("#email-judul").val(); 
								content = $("#email-content").val(); 
								data = {
											"_token":"{{csrf_token()}}",
											"id":list[urutan],
											"sender":sender, 
											"judul":judul, 
											"content":content,
											"type":type
										};
								$(".mailreport").prepend("id talent : <b>"+data.id+"</b> send<br> ");
								$.ajax({
								    type: "POST",
								    url: "{{url('admin/talent/mail-send')}}",
								    data: data,
								    dataType: "json",
								    success: function(data) 
								    {
								        if ( data.status == 1 )
										{
											$(".mailreport").prepend("<b>"+data.email+"</b> berhasil<br> ");
										}

										//perulangan send 1-1 sampai list id nya habis 
										i++ ; 
										if ( list[i]>0)
										{
											sendMail(list,i);
										}
										else
										{
											$(".mailreport").prepend("<b>DONE!</b> "+(i)+" email<br> ");
										}
								    },
								    error: function (jqXhr, textStatus, errorMessage) {
								    	console.log(jqXhr); 
								    	console.log(textStatus); 
								        $(".mailreport").prepend("<b>"+errorMessage+"</b> <span style='color:red'>error</span><br> ");
								    }
								});
							}

							$("#email-type").change(function()
							{
								var type=$(this).val();
								judul = ''; content = ''; sender = ''; 
								if ( type == 'invitation' )
								{
									sender = "HRD Upscale.id"; 
									judul = 'Hai, #name#. kami mencari talent, bersedia bergabung?';
									content = ''; 
								}
								else
								{
									sender = "HRD Upscale.id"; 
									judul = '';
									content = ''; 
								}

								$("#email-sender").val(sender);
								$("#email-judul").val(judul);
								$("#email-content").val(content);
							});

						});
					</script>
					<select id="email-type" style="padding: 5px ; width: 100%">
						<option> -- pilih -- </option>
						<option value="invitation">join invitation</option>
						<option value="regular">regular</option>
					</select><br>

					Dari Nama <br>
					<input type="text" id="email-sender" style="width:100%"><br>
					Judul <br>
					<input type="text" id="email-judul" style="width:100%"><br>
					content<br>
					<textarea rows="4" id="email-content" style="width: 100%"></textarea>

					<button href="{{ url('admin/talent/mail-send') }}" type="button" class="btn btn-success mailsend" onclick="return confirm('yakin ?')">send</button>
					
					<div style="clear: both;"></div>


					<div class="mailreport"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>


	{{-- <div id="loading" align="center">
		<div class="spinner-border text-primary" id="spinner" role="status" style="text-align: center;">
			<span class="sr-only">Loading...</span>
		</div>
	</div> --}}



	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>



	<script type="text/javascript">
		$(document).ready(function() {

			var export_url;
			//mengambil data tanggal
			$("#datepicker").datepicker();


			//function load table
			function loadTable(url) {
				var param = $("#form-search").serialize();

				$('#loading').show();
				$("#pembungkus").html('');
				export_url = "{{url('admin/talent/list/export_excel?page=1')}}&" + param;

				$.ajax({
					url: url + "&" + param,
					method: "GET",
					success: function(data) {
						$('#loading').hide();
						$("#pembungkus").html(data);
					}
				});
			}


			//load pertama kali
			var identifier = 'unprocess';
			url = `{{url('/admin/all-talent/paginate_data?process_status=${identifier}')}}`
			loadTable(url);


			//klik export_excel
			$("#export").click(function(e) {
				if (confirm("export")) {
					location.replace(export_url);
					return false;
				}
			});
			

			//klik pagination , diambil urlnya langsung di load ajax
			$(document).on("click", ".page-link", function(event) {
				$("body").scrollTop(0);
				var url = $(this).attr("href") + "&" + `{{ 'process_status=${identifier}' }}`;
				loadTable(url);
				event.preventDefault(); //ini biar ga keredirect ke halaman lain 
			});

			// tabs process status
			$('.filter-btn').on('click',function(){
				var identifier = $(this).attr('id');
				$('#process_status').val(identifier);
				
				url = `{{url('/admin/all-talent/paginate_data?process_status=${identifier}')}}`;
				loadTable(url);
				$(".filter-btn").removeClass("active");
				$('#'+identifier).addClass("active");
				event.preventDefault();
			})

			$(document).on("click","#go",function(event)
			{
				var page = prompt();
				loadTable("{{url('/admin/all-talent/paginate_data?page=')}}"+page);
			});

			//search 
			$("#form-search").submit(function() {
				loadTable("{{url('/admin/all-talent/paginate_data?page=1')}}");
				return false;
			});

			$("#mass_del").click(function() {
				return confirm("delete selected ?");
			});

			//klikk all / non-member / member 
			$("#non-member").click(function() {
				$("select[name='status_member']").val("non-member");
				$("select[name='order']").val("talent_mail_invitation");
				$("input[name='mail_invitation']").prop("checked", true);
				$("input[name='date_ready']").prop("checked", false);
				$("input[name='active']").prop("checked", false);
				$("input[name='focus']").prop("checked", false);
				$("#search").click();
			});

			$("#member").click(function() {
				$("select[name='status_member']").val("member");
				$("input[name='date_ready']").prop("checked", true);
				$("input[name='active']").prop("checked", true);
				$("select[name='order']").val("talent_last_active");
				$("input[name='mail_invitation']").prop("checked", false);
				$("input[name='focus']").prop("checked", true);
				$("#search").click();
			});

			$("#all").click(function() {
				$("select[name='status_member']").val("all");
				$("#search").click();
			});
		});

		function refreshId()
	    {
	        $(".list").html(list.join(","));

	        if ( list.length > 0)
	        {
	            $(".list-box").show();
	        }
	        else
	        {
	            $(".list-box").hide();
	        }
	    }

	    list = [] ;
	    function pilih(id)
	    {
	        id = parseInt(id); 
	        if ( list.includes(id) ) 
	        {
	            const index = list.indexOf(id);
	            if (index !== -1) list.splice(index, 1);
	            refreshId();
	        }
	        else
	        {
	            list.push(id); 
	            refreshId();
	        }
	        
	    }

	    $(".clear").click(function()
	    {
	        list = [] ; 
	        $(".pilih").prop('checked',false);
	        $(".select-all").prop('checked',false);
	        refreshId();
	    });

	</script>

	@endsection
