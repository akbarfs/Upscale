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

        <div class="card-body">

          <form style="margin:0; padding: 0" method="post" action="" id="form-search">
            <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" id="email" placeholder="">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="">
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
              </div>
              

              
                           
                            <div class="form-group">
                                <label for="phone">Phone Number / WA</label>
                                <input type="text" class="form-control" id="phone" placeholder="">
                            </div>

                            <!-- <fieldset class="form-group"> -->
                                <div class="row">
                                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                  <div class="col-sm-10">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                      <label class="form-check-label" for="gridRadios1">
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                      <label class="form-check-label" for="gridRadios2">
                                        Female
                                      </label>
                                    </div>
                                    </div>
                                </div>
                          <!-- </fieldset> -->

                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Keluar</button>
                              <button type="submit" class="btn btn-danger">Tambah Talent</button>
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


    });
  </script>

@endsection