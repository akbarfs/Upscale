@extends('member.template')

@section('content')

<section class="about">
  <form action="" method="post" id="register-talent">
    @csrf

    <div class="section-header"> <h2>Work Experience</h2> </div>
    
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

          @foreach ( $work->get() as $row )
          <div class="card-body">
            
                <div class="info alert alert-warning" style="display: none"></div>
                
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">COMPANY</label></div>
                      <div class="col-md-8">
                         <input type="text" name="name[]" class="form-control" placeholder="Company Name" value="{{$row->workex_office}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Tanggal Mulai</label></div>
                      <div class="col-md-8">
                         <input type="text" name="tglmulai[]" class="form-control" placeholder="contoh : 1 januari 2000" value="{{$row->workex_startdate}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Tanggal Selesai</label></div>
                      <div class="col-md-8">
                         <input type="text" name="tglselesai[]" class="form-control" placeholder="contoh : 1 januari 2010" value="{{$row->workex_enddate}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">POSITION</label></div>
                      <div class="col-md-8">
                        <input type="text" name="position[]" class="form-control" placeholder="position" value="{{$row->workex_position}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Description</label></div>
                      <div class="col-md-8"><input type="text" name="desc[]" class="form-control" placeholder="Ceritakan jobdesk general anda" value="{{$row->workex_desc}}"></div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Handle Project</label></div>
                      <div class="col-md-8">
                        <textarea rows="5" name="project[]" class="form-control" placeholder="Ceritakan Selengkapnya tentang sistem apa yang anda buat, sendiri atau dengan berapa orang team, tugas anda bagian apa saja, dll. semakin lengkap semakin menarik anda terpilih">{{$row->workex_handle_project}}</textarea>
                      </div>
                   </div>
                </div>

                <div align="right">
                    <a class="hapus" href="{{url('member/edit-work-delete/'.$row->workex_id)}}"> 
                      <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
                    </a>  
                </div>
             
          </div>
          @endforeach

         

      </div>

      <div style="padding: 20px">
        <a class="tambah">
            <img class="" src="{{url('template/upscale/media/tambah.png')}}" width="30px">
            Tambah Pengalaman kerja
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
        <div class="col-md-4"><label for="Name">COMPANY</label></div>
        <div class="col-md-8">
           <input type="text" name="name[]" class="form-control" placeholder="Your Name">
        </div>
     </div>
  </div>

  <div class="form-group">
     <div class="row">
        <div class="col-md-4"><label for="Name">Tanggal Mulai</label></div>
        <div class="col-md-8">
           <input type="text" name="tglmulai[]" class="form-control" placeholder="contoh : 1 januari 2000" value="">
        </div>
     </div>
  </div>

  <div class="form-group">
     <div class="row">
        <div class="col-md-4"><label for="Name">Tanggal Selesai</label></div>
        <div class="col-md-8">
           <input type="text" name="tglselesai[]" class="form-control" placeholder="contoh : 1 januari 2010" value="">
        </div>
     </div>
  </div>

  <div class="form-group">
     <div class="row">
        <div class="col-md-4"><label for="Name">POSITION</label></div>
        <div class="col-md-8"><input type="text" name="position[]" class="form-control" placeholder="position"></div>
     </div>
  </div>

  <div class="form-group">
     <div class="row">
        <div class="col-md-4"><label for="Name">Description</label></div>
        <div class="col-md-8"><input type="text" name="desc[]" class="form-control" placeholder="Ceritakan jobdesk general anda"></div>
     </div>
  </div>

  <div class="form-group">
     <div class="row">
        <div class="col-md-4"><label for="Name">Handle Project</label></div>
        <div class="col-md-8">
          <textarea name="project[]" rows="10" class="form-control" placeholder="Ceritakan Selengkapnya tentang sistem apa yang anda buat, sendiri atau dengan berapa orang team, tugas anda bagian apa saja, dll. semakin lengkap semakin menarik anda terpilih"></textarea>
        </div>
     </div>
  </div>

  <div align="right">
      <a class="hapus"> 
        <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
      </a>  
  </div>

</div>


@endsection