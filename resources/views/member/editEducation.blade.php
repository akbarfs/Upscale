@extends('member.template')

@section('content')

<section class="about">
  <form action="" method="post" id="register-talent">
    @csrf

    <div class="section-header"> <h2>Education</h2> </div>
    
      <div class="card mt-5">

          <style type="text/css">
            .card-body
            {    
                padding: 20px;
                border: solid 1px #d2d2d2;
                border-radius: 10px;
                margin-bottom: 20px
            }
            .tambah , .hapus { cursor: pointer; }
          </style>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

          <script type="text/javascript">
            
              $(document).ready(function()
              {
                $(".tambah").click(function()
                {

                    var clone = $(".card-body-template").clone(); 
                    clone.removeClass('card-body-template').show();
                    
                    hapus = clone.find(".hapus"); 
                    $(hapus).click(function()
                    {
                        $(this).parent().parent().remove(); 
                    });

                    $(".card").append(clone);
                });
                  
              });

          </script>

          @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
          @endif

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          @foreach ( $education->get() as $row )
          <div class="card-body">
            
                <div class="info alert alert-warning" style="display: none"></div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Level</label></div>
                      <div class="col-md-8">
                        <select id="edu_level" name="edu_level[]" class="form-control" required="">
                            <option value="High School" @if($row->edu_level == 'High School') selected @endif>High School</option>
                            <option value="Diploma" @if($row->edu_level == 'Diploma') selected @endif>Diploma</option>
                            <option value="Bachelor Degree" @if($row->edu_level == 'Bachelor Degree') selected @endif>Bachelor Degree</option>
                            <option value="Master" @if($row->edu_level == 'Master') selected @endif>Master</option>
                            <option value="Other" @if($row->edu_level == 'Other') selected @endif>other</option>
                        </select>
                      </div>
                   </div>
                </div>

                
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Institution Name</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_name[]" class="form-control" placeholder="Institution Name" value="{{$row->edu_name}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Tanggal Mulai</label></div>
                      <div class="col-md-8">
                        <input type="text" name="edu_start_date[]" class="form-control" placeholder="contoh: 1 januari 2020" value="{{$row->edu_datestart}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Tanggal Selesai</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_end_date[]" class="form-control" placeholder="contoh: 1 januari 2020" value="{{$row->edu_dateend}}">
                      </div>
                   </div>
                </div>

                
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Field</label></div>
                      <div class="col-md-8"><input type="text" name="edu_field[]" class="form-control" placeholder="contoh : informatika" value="{{$row->edu_field}}"></div>
                   </div>
                </div>

                <div align="right">
                    <a class="hapus" href="{{url('member/edit-education-delete/'.$row->edu_id)}}"> 
                      <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
                    </a>  
                </div>
             
          </div>
          @endforeach

         

      </div>

      <div style="padding: 20px">
        <a class="tambah">
            <img class="" src="{{url('template/upscale/media/tambah.png')}}" width="30px">
            Tambah Education
        </a>
      </div>
      
      <div align="right">
          <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
          <button type="submit" class="btn btn-primary">SAVE</button>
      </div>

  </form>
</section>


<div class="card-body-template card-body" style="display: none">
  
      <div class="info alert alert-warning" style="display: none"></div>

      <div class="form-group">
         <div class="row">
            <div class="col-md-4"><label for="Name">Level</label></div>
            <div class="col-md-8">
              <select id="edu_level" name="edu_level[]" class="form-control" required="">
                  <option value="High School">High School</option>
                  <option value="Diploma">Diploma</option>
                  <option value="Bachelor Degree">Bachelor Degree</option>
                  <option value="Master">Master</option>
                  <option value="Other">other</option>
              </select>
            </div>
         </div>
      </div>

      
      <div class="form-group">
         <div class="row">
            <div class="col-md-4"><label for="Name">Institution Name</label></div>
            <div class="col-md-8">
               <input type="text" name="edu_name[]" class="form-control" placeholder="Institution Name" value="">
            </div>
         </div>
      </div>

      <div class="form-group">
         <div class="row">
            <div class="col-md-4"><label for="Name">Tanggal Mulai</label></div>
            <div class="col-md-8">
              <input type="text" name="edu_start_date[]" class="form-control" placeholder="contoh: 1 januari 2020" value="">
            </div>
         </div>
      </div>

      <div class="form-group">
         <div class="row">
            <div class="col-md-4"><label for="Name">Tanggal Selesai</label></div>
            <div class="col-md-8">
               <input type="text" name="edu_end_date[]" class="form-control" placeholder="contoh: 1 januari 2020" value="">
            </div>
         </div>
      </div>

      
      <div class="form-group">
         <div class="row">
            <div class="col-md-4"><label for="Name">Field</label></div>
            <div class="col-md-8"><input type="text" name="edu_field[]" class="form-control" placeholder="contoh : informatika" value=""></div>
         </div>
      </div>

      <div align="right">
          <a class="hapus"> 
            <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
          </a>  
      </div>
   
</div>


@endsection