@extends('admin.layout.apps')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Insert Talent Baru</h1>
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

        <div class="card-body">
        <form style="margin:0; padding: 0" method="post" action="/admin/talent/list/insert/data">
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @endif
          <div class="col-md-6 float-left">
            @csrf
            <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="">

                @if($errors->has('nama'))
                  <div class="alert alert-danger" >{{ $errors->first('nama') }}</div>
                @endif

            </div>
        
        
            <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="">

                @if($errors->has('email'))
                  <div class="alert alert-danger" >{{ $errors->first('email') }}</div>
                @endif

            </div>



            <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" class="custom-select" name="gender" >
                    <option selected> </option>
                    <option>Male</option>
                    <option>Female</option>
            </select>

                @if($errors->has('gender'))
                  <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                @endif

            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" placeholder="" name="alamat">

                @if($errors->has('alamat'))
                  <div class="alert alert-danger">{{ $errors->first('alamat') }}</div>
                @endif

            </div>
        
        

            <div class="form-group">
              <label for="phone">Phone Number / WA</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="">

                @if($errors->has('phone'))
                  <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                @endif

            </div>
            


            <div class="form-group">
              <label for="datepicker">Birth Date</label>
              <input type="text" name="birthdate" class="form-control" id="birthdate">

               @if($errors->has('birthdate'))
                  <div class="alert alert-danger">{{ $errors->first('birthdate') }}</div>
                @endif

            </div>
        
        

            <div class="form-group">
              <label for="birthplace">Birth Place</label>
              <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="" >

                @if($errors->has('birthplace'))
                  <div class="alert alert-danger">{{ $errors->first('birthplace') }}</div>
                @endif

            </div>



            <div class="form-group">
              <label for="martialstatus">Martial Status</label>
              <select id="martialstatus" class="custom-select" name="martialstatus">
                    <option selected> </option>
                    <option>Single</option>
                    <option>Married</option>
              </select>
            </div>

            <div class="form-group">
              <label for="currentaddress">Current Address</label>
              <input type="text" class="form-control" id="currentaddress" name="currentaddress" placeholder="">

                @if($errors->has('currentaddress'))
                  <div class="alert alert-danger">{{ $errors->first('currentaddress') }}</div>
                @endif


            </div>
        
        

            <div class="form-group">
              <label for="level">Condition</label>
              <select id="level" class="custom-select" name="condition" >
                    <option selected> </option>
                    <option>Unprocess</option>
                    <option>Quarantine</option>
                    <option>Assign</option>
              <select>
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
              <div class="form-group">
              <label for="skill">Skill</label>
        
                    <p>
                    <input
                                type="text"
                                onItemSelect="setClose()"
                                multiple
                                class="tagsInput form-control"
                                value=""
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                                placeholder="Skill"
                                name="skill" />

                            @if($errors->has('skill'))
                            <div class="alert alert-danger">{{ $errors->first('skill') }}
                            </div>
                @endif

                    </p>
                    </div>


                <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" placeholder="" name="salary">
                </div>
        
        
        

                <div class="form-group">
                <label for="focus">Focus</label>
                <select id="status" class="custom-select" name="focus" >
                        <option selected> </option>
                        <option>Frontend</option>
                        <option>Backend Web</option>
                        <option>Fullstack Web</option>
                        <option>Mobile Programmer</option>
                        <option>UI/UX</option>
                        <option>QA</option>
                        <option>Dev Ops</option>
                        <option>Data Science</option>
                        <option>PM</option>
                        <option>Other</option>
                      </select>

                      @if($errors->has('focus'))
                        <div class="alert alert-danger">{{ $errors->first('focus') }}</div>
                      @endif

                </div>
        
          

                <div class="form-group">
                <label for="startcareer">Start Career</label>
                <input type="text" class="form-control" id="startcareer" name="startcareer" placeholder="" >
                </div>
        
        

                <div class="form-group">
                <label for="level">Level</label>
                <select id="level" class="custom-select" name="level"  >
                <option selected> </option>
                <option>Undefined</option>
                <option>Junior</option>
                <option>Middle</option>
                <option>Senior</option>
                </select>
                </div>

          </div>

          <div class="col-md-6 float-left">



                <div class="form-group">
                      <label for="lastestsalary">Lastest Salary (Rp)</label>
                      <input type="text" class="form-control" id="lastestsalary" name="lastestsalary" placeholder="" >
                </div>



                <div class="form-group">
                      <label for="preflocation">Prefered Location</label>
                      <input type="text" class="form-control" id="preflocation" name="preflocation" placeholder="" >
                </div>
      
      

                <div class="form-group">
                      <label for="status">Status</label>
                      <select id="status" class="custom-select" name="status" >
                        <option selected> </option>
                        <option>Student</option>
                        <option>Worker</option>
                        <option>Freelance</option>
                        <option>Free</option>
                      </select>
                </div>

      
      

                <div class="form-group">
                      <label for="onsite">Onsite</label>
                      <select id="onsite" class="custom-select" name="onsite" >
                        <option selected> </option>
                        <option>Unset</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                     <label for="remote">Remote</label>
                      <select id="remote" class="custom-select" name="remote" >
                        <option selected> </option>
                        <option>Unset</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="available">Available</label>
                      <select id="available" class="custom-select" name="available" >
                          <option selected> </option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>1 Month</option>
                          <option>ASAP</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="apply">Apply</label>
                      <select id="apply" class="custom-select" name="apply" >
                          <option selected> </option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>Old</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="international">International Talent</label>
                      <select id="international" class="custom-select" name="international" >
                          <option selected> </option>
                          <option>Ya, Kemungkinan saya tertarik</option>
                          <option>Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                          <option>Tidak, karena perbedaan budaya kerja</option>
                          <option>Tidak, karena suatu hal</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="freelancehour">Freelance Hours</label>
                      <input type="text" class="form-control" id="freelancehour" name="freelancehour" placeholder="" >

                      @if($errors->has('freelancehour'))
                        <div class="alert alert-danger">{{ $errors->first('freelancehour') }}</div>
                      @endif

                </div>
      
      

                <div class="form-group">
                      <label for="projectmin" >Project Min</label>
                      <input type="text" class="form-control" id="projectmin" placeholder="" name="projectmin" >

                      @if($errors->has('projectmin'))
                        <div class="alert alert-danger">{{ $errors->first('projectmin') }}</div>
                      @endif

                </div>

                <div class="form-group">
                      <label for="projectmax">Project Max</label>
                      <input type="text" class="form-control" id="projectmax" name="projectmax" placeholder="" >

                      @if($errors->has('projectmax'))
                        <div class="alert alert-danger">{{ $errors->first('projectmax') }}</div>
                      @endif

                </div>

                <div class="form-group">
                      <label for="konsulrate">Konsultasi Rate</label>
                      <input type="text" class="form-control" id="konsulrate" name="konsulrate" placeholder="" >

                      @if($errors->has('konsulrate'))
                        <div class="alert alert-danger">{{ $errors->first('konsulrate') }}</div>
                      @endif
                </div>
      
      

                <div class="form-group">
                      <label for="tutorrate">Tutor Rate</label>
                      <input type="text" class="form-control" id="tutorrate" name="tutorrate" placeholder="" >

                      @if($errors->has('tutorrate'))
                        <div class="alert alert-danger">{{ $errors->first('tutorrate') }}</div>
                      @endif

                </div> 
      
      
              </div>
      
      
                  
          </div>

                <div class="form-group row" style="padding-left: 25px">
                  <div class="col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm tb">Tambah Talent</button>
                  <a href="list/" class="btn btn-danger btn-sm tb"> Keluar </a>
                  </div>
                </div>


          </form>
      </div>
    </div>
  </div>
</div>


  


          




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
  });


</script>
  

    <script src="https://code.jquery.com/jquery-1.12.4.js">  </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"> </script>

    <script>
      $( function() {
      $( "#birthdate" ).datepicker({
        dateFormat: 'dd-mm-yy'

      });
    });
    </script>




   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
     
   </script>



@endsection