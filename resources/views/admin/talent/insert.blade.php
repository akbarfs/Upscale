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
            <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama')}}">

                @if($errors->has('nama'))
                  <div class="alert alert-danger" >{{ $errors->first('nama') }}</div>
                @endif

            </div>
        
        
            <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{old('email')}}">

                @if($errors->has('email'))
                  <div class="alert alert-danger" >{{ $errors->first('email') }}</div>
                @endif

            </div>



            <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" class="custom-select" name="gender">
                    <option selected  > </option>
                    <option value="1" {{old('gender') == 1 ? 'selected' : ''}}>Male</option>
                    <option value="2" {{old('gender') == 2 ? 'selected' : ''}}>Female</option>
            </select>

                @if($errors->has('gender'))
                  <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                @endif

            </div>



            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" id="alamat" placeholder="" name="alamat" value="{{old('alamat')}}">

                @if($errors->has('alamat'))
                  <div class="alert alert-danger">{{ $errors->first('alamat') }}</div>
                @endif

            </div>




            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" placeholder="" name="username" value="{{old('username')}}">

                @if($errors->has('username'))
                  <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                @endif

            </div>



            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="">

                @if($errors->has('password'))
                  <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif



            </div>

            <div class="form-group">
              <label for="confirmpass">Confirm Password</label>
              <input type="password" class="form-control" id="confirmpass" name="confirmpass">

                @if($errors->has('confirmpass'))
                  <div class="alert alert-danger">{{ $errors->first('confirmpass') }}</div>
                @endif

            </div>
        
        

            <div class="form-group">
              <label for="phone">Phone Number / WA</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="{{old('phone')}}">

                @if($errors->has('phone'))
                  <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                @endif

            </div>


            <div class="form-group">
              <label for="datepicker">Birth Date</label>
              <input type="text" name="birthdate" class="form-control" id="birthdate" value="{{old('birthdate')}}">

               @if($errors->has('birthdate'))
                  <div class="alert alert-danger">{{ $errors->first('birthdate') }}</div>
                @endif

            </div>


        
        

            <div class="form-group">
              <label for="birthplace">Birth Place</label>
              <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder=""  value="{{old('birthplace')}}">

                @if($errors->has('birthplace'))
                  <div class="alert alert-danger">{{ $errors->first('birthplace') }}</div>
                @endif

            </div>



            <div class="form-group">
              <label for="martialstatus">Martial Status</label>
              <select id="martialstatus" class="custom-select" name="martialstatus">
                    <option selected> </option>
                    <option value="1" {{old('martialstatus') == 1 ? 'selected' : ''}}>Single</option>
                    <option value="2" {{old('martialstatus') == 2 ? 'selected' : ''}}>Married</option>
              </select>
            </div>

            <div class="form-group">
              <label for="currentaddress">Current Address</label>
              <input type="text" class="form-control" id="currentaddress" name="currentaddress" placeholder="" value="{{old('currentaddress')}}">

                @if($errors->has('currentaddress'))
                  <div class="alert alert-danger">{{ $errors->first('currentaddress') }}</div>
                @endif


            </div>
        
        

            <div class="form-group">
              <label for="level">Condition</label>
              <select id="level" class="custom-select" name="condition" >
                    <option selected> </option>
                    <option value="1" {{old('condition') == 1 ? 'selected' : ''}}>Unprocess</option>
                    <option value="2" {{old('condition') == 2 ? 'selected' : ''}}>Quarantine</option>
                    <option value="3" {{old('condition') == 3 ? 'selected' : ''}}>Assign</option>
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



                <script type="text/javascript">

                  function onSkillOldValue(textbox) {
                  console.log("Old value: " + textbox.oldvalue);
                  
                  }
                </script>


              <style type="text/css">
                .fstQueryInput  { padding: 0 }
                .fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
                .fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
              </style>
              <div class="form-group">
              <label for="skill">Skill</label>
        
                    <p>
                    <input


                                id="skill"
                                type="text"
                                multiple
                                class="tagsInput form-control"
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                                name="skill"
                                data-role="tagsinput" 
                                value="{{old('skill')}}"
                                data-initial-value=''
                                placeholder="" 
                                onfocus="this.oldvalue = this.value;"
                                onchange="onSkillOldValue(this);this.oldvalue = this.value;"/>

                            @if($errors->has('skill'))
                            <div class="alert alert-danger">{{ $errors->first('skill') }}
                            </div>
                            @endif

                            

                    </p>
                    </div>                                                                                                                                                                                                                      
                <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" placeholder="" name="salary" value="{{old('salary')}}">
                </div>
        
        
        

                <div class="form-group">
                <label for="focus">Focus</label>
                <select id="status" class="custom-select" name="focus" >
                        <option selected> </option>
                        <option value="1" {{old('focus') == 1 ? 'selected' : ''}}>Frontend</option>
                        <option value="2" {{old('focus') == 2 ? 'selected' : ''}}>Backend Web</option>
                        <option value="3" {{old('focus') == 3 ? 'selected' : ''}}>Fullstack Web</option>
                        <option value="4" {{old('focus') == 4 ? 'selected' : ''}}>Mobile Programmer</option>
                        <option value="5" {{old('focus') == 5 ? 'selected' : ''}}>UI/UX</option>
                        <option value="6" {{old('focus') == 6 ? 'selected' : ''}}>QA</option>
                        <option value="7" {{old('focus') == 7 ? 'selected' : ''}}>Dev Ops</option>
                        <option value="8" {{old('focus') == 8 ? 'selected' : ''}}>Data Science</option>
                        <option value="9" {{old('focus') == 9 ? 'selected' : ''}}>PM</option>
                        <option value="10" {{old('focus') == 10 ? 'selected' : ''}}>Other</option>
                      </select>

                      @if($errors->has('focus'))
                        <div class="alert alert-danger">{{ $errors->first('focus') }}</div>
                      @endif

                </div>
        
          

                <div class="form-group">
                <label for="startcareer">Start Career</label>
                <input type="text" class="form-control" id="startcareer" name="startcareer" placeholder=""  value="{{old('startcareer')}}">
                </div>
        
        

                <div class="form-group">
                <label for="level">Level</label>
                <select id="level" class="custom-select" name="level"  >
                <option selected> </option>
                <option value="1" {{old('level') == 1 ? 'selected' : ''}}>Undefined</option>
                <option value="2" {{old('level') == 2 ? 'selected' : ''}}>Junior</option>
                <option value="3" {{old('level') == 3 ? 'selected' : ''}}>Middle</option>
                <option value="4" {{old('level') == 4 ? 'selected' : ''}}>Senior</option>
                </select>
                </div>

          </div>

          <div class="col-md-6 float-left">



                <div class="form-group">
                      <label for="lastestsalary">Lastest Salary (Rp)</label>
                      <input type="text" class="form-control" id="lastestsalary" name="lastestsalary" placeholder=""  value="{{old('lastestsalary')}}">
                </div>



                <div class="form-group">
                      <label for="preflocation">Prefered Location</label>
                      <input type="text" class="form-control" id="preflocation" name="preflocation" placeholder=""  value="{{old('preflocation')}}">
                </div>
      
      

                <div class="form-group">
                      <label for="status">Status</label>
                      <select id="status" class="custom-select" name="status" >
                        <option selected> </option>
                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Student</option>
                        <option value="2" {{old('status') == 2 ? 'selected' : ''}}>Worker</option>
                        <option value="3" {{old('status') == 3 ? 'selected' : ''}}>Freelance</option>
                        <option value="4" {{old('status') == 4 ? 'selected' : ''}}>Free</option>
                      </select>
                </div>

      
      

                <div class="form-group">
                      <label for="onsite">Onsite</label>
                      <select id="onsite" class="custom-select" name="onsite" >
                        <option selected> </option>
                        <option value="1" {{old('onsite') == 1 ? 'selected' : ''}}>Unset</option>
                        <option value="2" {{old('onsite') == 2 ? 'selected' : ''}}>Yes</option>
                        <option value="3" {{old('onsite') == 3 ? 'selected' : ''}}>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                     <label for="remote">Remote</label>
                      <select id="remote" class="custom-select" name="remote" >
                        <option selected> </option>
                        <option value="1" {{old('remote') == 1 ? 'selected' : ''}}>Unset</option>
                        <option value="2" {{old('remote') == 2 ? 'selected' : ''}}>Yes</option>
                        <option value="3" {{old('remote') == 3 ? 'selected' : ''}}>No</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="available">Available</label>
                      <select id="available" class="custom-select" name="available" >
                          <option selected> </option>
                          <option value="1" {{old('available') == 1 ? 'selected' : ''}}>Yes</option>
                          <option value="2" {{old('available') == 2 ? 'selected' : ''}}>No</option>
                          <option value="3" {{old('available') == 3 ? 'selected' : ''}}>1 Month</option>
                          <option value="4" {{old('available') == 4 ? 'selected' : ''}}>ASAP</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="apply">Apply</label>
                      <select id="apply" class="custom-select" name="apply" >
                          <option selected> </option>
                          <option value="1" {{old('apply') == 1 ? 'selected' : ''}}>Yes</option>
                          <option value="2" {{old('apply') == 2 ? 'selected' : ''}}>No</option>
                          <option value="3" {{old('apply') == 3 ? 'selected' : ''}}>Old</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="international">International Talent</label>
                      <select id="international" class="custom-select" name="international" >
                          <option selected> </option>
                          <option value="1" {{old('international') == 1 ? 'selected' : ''}}>Ya, Kemungkinan saya tertarik</option>
                          <option value="2" {{old('international') == 2 ? 'selected' : ''}}>Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                          <option value="3" {{old('international') == 3 ? 'selected' : ''}}>Tidak, karena perbedaan budaya kerja</option>
                          <option value="4" {{old('international') == 4 ? 'selected' : ''}}>Tidak, karena suatu hal</option>
                      </select>
                </div>
      
      

                <div class="form-group">
                      <label for="freelancehour">Freelance Hours</label>
                      <input type="text" class="form-control" id="freelancehour" name="freelancehour" placeholder=""  value="{{old('freelancehour')}}">

                      @if($errors->has('freelancehour'))
                        <div class="alert alert-danger">{{ $errors->first('freelancehour') }}</div>
                      @endif

                </div>
      
      

                <div class="form-group">
                      <label for="projectmin" >Project Min</label>
                      <input type="text" class="form-control" id="projectmin" placeholder="" name="projectmin"  value="{{old('projectmin')}}">

                      @if($errors->has('projectmin'))
                        <div class="alert alert-danger">{{ $errors->first('projectmin') }}</div>
                      @endif

                </div>

                <div class="form-group">
                      <label for="projectmax">Project Max</label>
                      <input type="text" class="form-control" id="projectmax" name="projectmax" placeholder=""  value="{{old('projectmax')}}">

                      @if($errors->has('projectmax'))
                        <div class="alert alert-danger">{{ $errors->first('projectmax') }}</div>
                      @endif

                </div>

                <div class="form-group">
                      <label for="konsulrate">Konsultasi Rate</label>
                      <input type="text" class="form-control" id="konsulrate" name="konsulrate" placeholder=""  value="{{old('konsulrate')}}">

                      @if($errors->has('konsulrate'))
                        <div class="alert alert-danger">{{ $errors->first('konsulrate') }}</div>
                      @endif
                </div>
      
      

                <div class="form-group">
                      <label for="tutorrate">Tutor Rate</label>
                      <input type="text" class="form-control" id="tutorrate" name="tutorrate" placeholder=""  value="{{old('tutorrate')}}">

                      @if($errors->has('tutorrate'))
                        <div class="alert alert-danger">{{ $errors->first('tutorrate') }}</div>
                      @endif

                </div> 
      
      
              </div>
                      
          </div>

                <div class="form-group row" style="padding-left: 25px">
                  <div class="col-sm-10">
                  <button type="submit" class="btn btn-success btn-sm tb" onclick="submitForm(this);">Tambah Talent</button>
                  <a href="{{ route('talent.list') }}" class="btn btn-danger btn-sm tb"> Keluar </a>
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

    <script>
    function submitForm(btn) {
        btn.disabled = true;   
        btn.form.submit();
      }
    </script>


    <script type="text/javascript">
      

    </script>




   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous">
     
   </script>



@endsection