@extends('member.template')
@section('content')


<section class="about">
  <form action="" method="post" id="">
    @csrf

    <div class="section-header"> <h2>Certification</h2> </div>
    
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

        

          <div class="card-body">
            
                <div class="info alert alert-warning" style="display: none"></div>
                
                <div class="form-group">
                   <div class="row">
                   @foreach($talent->talent_certification()->get() as $row )
                      <div class="col-md-4"><label for="Name">Certification Name</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Years" value="{{ $certification->certif_name }}">
                      </div>
                   </div>
                   @endforeach	
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Years</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Years" value="">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Company</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Company" value="">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Number</label></div>
                      <div class="col-md-8">
                         <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Number" value="">
                      </div>
                   </div>
                </div>


                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Expired</label></div>
                      <div class="col-md-8">
                        <input type="text" name="edu_start_date[]" class="form-control" placeholder="contoh: 1 januari 2020" value="">
                      </div>
                   </div>
                </div>


                <div align="right">
                    <a class="hapus" href="{{url('member/edit-education-delete/')}}"> 
                      <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
                    </a>  
                </div>
             
          </div>

         

      </div>

      <div style="padding: 20px">
        <a class="tambah">
            <img class="" src="{{url('template/upscale/media/tambah.png')}}" width="30px">
            Tambah Certification
        </a>
      </div>
      
      <div align="right">
          <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
          <button type="submit" class="btn btn-primary">SAVE</button>
      </div>

  </form>
</section>

      
</div>


@endsection