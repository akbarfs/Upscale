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


        <div class="panel panel-default float-left">


          <form style="margin:0; padding: 0" method="post" action="">
            <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="">
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" class="form-control" name="gender">
                <option selected> </option>
                <option>Male</option>
                <option>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="" name="alamat">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number / WA</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="">
        </div>

        <div class="form-group">
            <label for="birthdate">Birth Date</label>
            <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="">
        </div>

        <div class="form-group">
            <label for="birthplace">Birth Place</label>
            <input type="text" class="form-control" id="birthplace" name="birthplace"placeholder="">
        </div>

        <div class="form-group">
            <label for="martialstatus">Martial Status</label>
            <select id="martialstatus" class="form-control" name="martialstatus">
                <option selected> </option>
                <option>Single</option>
                <option>Married</option>
            </select>

        </div>

        <div class="form-group">
            <label for="currentaddress">Current Address</label>
            <input type="text" class="form-control" id="currentaddress" name="currentaddress" placeholder="">
        </div>

        <div class="form-group">
            <label for="level">Condition</label>
            <select id="level" class="form-control" name="condition">
                <option selected> </option>
                <option>Unprocess</option>
                <option>Quarantine</option>
                <option>Assign</option>
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
                                name="skill"/>

              </p>
              </div>


        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="text" class="form-control" id="salary" placeholder="" name="salary">
        </div>

        <div class="form-group">
            <label for="focus">Focus</label>
            <input type="text" class="form-control" id="focus" placeholder="" name="focus">
        </div>

        <div class="form-group">
            <label for="startcareer">Start Career</label>
            <input type="text" class="form-control" id="startcareer" name="startcareer" placeholder="">
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select id="level" class="form-control" name="level">
                <option selected> </option>
                <option>Undefined</option>
                <option>Junior</option>
                <option>Middle</option>
                <option>Senior</option>
            </select>
        </div>

         </div>

                           

        <div class="panel panel-default float-left" style="padding-left: 300px">

        <div class="form-group">
            <label for="lastestsalary">Lastest Salary</label>
            <input type="text" class="form-control" id="lastestsalary" name="lastestsalary" placeholder="">
        </div>

        <div class="form-group">
            <label for="preflocation">Prefered Location</label>
            <input type="text" class="form-control" id="preflocation" name="preflocation" placeholder="">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control" name="status">
                <option selected> </option>
                <option>Student</option>
                <option>Worker</option>
                <option>Freelance</option>
                <option>Free</option>
            </select>
        </div>

        <div class="form-group">
            <label for="onsite">Onsite</label>
            <select id="onsite" class="form-control" name="onsite">
                <option selected> </option>
                <option>Unset</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="remote">Remote</label>
            <select id="remote" class="form-control" name="remote">
                <option selected> </option>
                <option>Unset</option>
                <option>Yes</option>
                <option>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="available">Available</label>
            <select id="available" class="form-control" name="available">
                <option selected> </option>
                <option>Yes</option>
                <option>No</option>
                <option>1 Month</option>
                <option>ASAP</option>
            </select>
        </div>

        <div class="form-group">
            <label for="apply">Apply</label>
            <select id="apply" class="form-control" name="apply">
                <option selected> </option>
                <option>Yes</option>
                <option>No</option>
                <option>Old</option>
            </select>
        </div>

        <div class="form-group">
            <label for="international">International Talent</label>
            <select id="international" class="form-control" name="international">
                <option selected> </option>
                <option>Ya, Kemungkinan saya tertarik</option>
                <option>Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                <option>Tidak, karena perbedaan budaya kerja</option>
                <option>Tidak, karena suatu hal</option>
            </select>
        </div>

        <div class="form-group">
            <label for="locationid">Location Id</label>
            <input type="text" id="disabledTextInput" class="form-control" placeholder="12" name="locationID">
        </div>

        <div class="form-group">
            <label for="freelancehour">Freelance Hours</label>
            <input type="text" class="form-control" id="freelancehour" name="freelancehour" placeholder="">
        </div>

        <div class="form-group">
            <label for="projectmin" >Project Min</label>
            <input type="text" class="form-control" id="projectmin" placeholder="" name="projectmin">
        </div>

        <div class="form-group">
            <label for="projectmax">Project Max</label>
            <input type="text" class="form-control" id="projectmax" name="projectmax" placeholder="">
        </div>

        <div class="form-group">
            <label for="konsulrate">Konsultasi Rate</label>
            <select id="konsulrate" class="form-control" name="konsulrate">
                <option selected> </option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Excellent</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tutorrate">Tutor Rate</label>
            <select id="tutorrate" class="form-control" name="tutorrate">
                <option selected> </option>
                <option>Poor</option>
                <option>Fair</option>
                <option>Good</option>
                <option>Excellent</option>
            </select>
        </div> 
      </div>

                         
        </div>


         <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-danger">Keluar</button>
              <button type="submit" class="btn btn-primary">Tambah Talent</button>
            </div>
          </div>
            
          </form>
      </div>
    </div>
  </div>
</div>
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


<<<<<<< HEAD

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
  </script>

@endsection