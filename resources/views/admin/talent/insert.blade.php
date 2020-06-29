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
        <form style="margin:0; padding: 0" method="post" action="">

          <div class="col-md-6 float-left">
      
      
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
            <select id="gender" class="custom-select" name="gender" onchange="this.form.submit()">
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
              <span class="info_tgl_lahir"></span>
              <input type="hidden" name="birthdate" class="form-control hasDatepicker" id="tgl_lahir" placeholder="DD/MM/YYYY" value>
              <button type="button" class="ui-datepicker-trigger">Set Date</button>
            </div>
        
        

            <div class="form-group">
              <label for="birthplace">Birth Place</label>
              <input type="text" class="form-control" id="birthplace" name="birthplace"placeholder="">
            </div>



            <div class="form-group">
              <label for="martialstatus">Martial Status</label>
              <select id="martialstatus" class="custom-select" name="martialstatus" onchange="this.form.submit()">
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
              <select id="level" class="custom-select" name="condition" onchange="this.form.submit()">
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
                                name="skill"/>

                    </p>
                    </div>


                <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" placeholder="" name="salary">
                </div>
        
        
        

                <div class="form-group">
                <label for="focus">Focus</label>
                <select id="status" class="custom-select" name="focus" onchange="this.form.submit()">
                        <option selected> </option>
                        <option>Student</option>
                        <option>Worker</option>
                        <option>Freelance</option>
                        <option>Free</option>
                      </select>
                </div>
        
          

                <div class="form-group">
                <label for="startcareer">Start Career</label>
                <input type="text" class="form-control" id="startcareer" name="startcareer" placeholder="">
                </div>
        
        

                <div class="form-group">
                <label for="level">Level</label>
                <select id="level" class="custom-select" name="level" onchange="this.form.submit()">
                <option selected> </option>
                <option>Developers</option>
                <option>Designers</option>
                <option>Project Managers</option>
                <option>Product Managers</option>
                <option>Finance</option>
                </select>
                </div>

          </div>

                           

          <div class="col-md-6 float-left">



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
                      <select id="status" class="custom-select" name="status" onchange="this.form.submit()">
                        <option selected> </option>
                        <option>Student</option>
                        <option>Worker</option>
                        <option>Freelance</option>
                        <option>Free</option>
                      </select>
                </div>
                
      
      

                <div class="form-group">
                      <label for="onsite">Onsite</label>
                      <select id="onsite" class="custom-select" name="onsite" onchange="this.form.submit()">
                        <option selected> </option>
                        <option>Unset</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                     <label for="remote">Remote</label>
                      <select id="remote" class="custom-select" name="remote" onchange="this.form.submit()">
                        <option selected> </option>
                        <option>Unset</option>
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="available">Available</label>
                      <select id="available" class="custom-select" name="available" onchange="this.form.submit()">
                          <option selected> </option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>1 Month</option>
                          <option>ASAP</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="apply">Apply</label>
                      <select id="apply" class="custom-select" name="apply" onchange="this.form.submit()">
                          <option selected> </option>
                          <option>Yes</option>
                          <option>No</option>
                          <option>Old</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="international">International Talent</label>
                      <select id="international" class="custom-select" name="international" onchange="this.form.submit()">
                          <option selected> </option>
                          <option>Ya, Kemungkinan saya tertarik</option>
                          <option>Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                          <option>Tidak, karena perbedaan budaya kerja</option>
                          <option>Tidak, karena suatu hal</option>
                      </select>
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
                      <input type="text" class="form-control" id="konsulrate" name="konsulrate" placeholder="">
                </div>
      
      

                <div class="form-group">
                      <label for="tutorrate">Tutor Rate</label>
                      <input type="text" class="form-control" id="tutorrate" name="tutorrate" placeholder="">
                </div> 
      
      
              </div>
      
      
                  
          </div>



                <div class="form-group row" style="padding-left: 25px">
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


@if($errors->any())
<div>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$errors}}</li>
    @endforeach
  </ul>
</div>
@endif