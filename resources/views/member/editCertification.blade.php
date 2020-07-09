@extends('member.template')

@section('content')

<section class="about">
  <form action="" method="post" id="register-talent">
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

          @foreach($talent->talent_certification()->get() as $row )
          <div class="card-body">
            
                <div class="info alert alert-warning" style="display: none"></div>
                
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Name</label></div>
                      <div class="col-md-8">
                         <input type="text" name="name[]" class="form-control" placeholder="Certification Years" value="{{ $row->certif_name }}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Years</label></div>
                      <div class="col-md-8">
                         <input type="text" name="years[]" class="form-control" placeholder="Certification Years" value="{{$row->certif_years}}">
                         </input>
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Company</label></div>
                      <div class="col-md-8">
                         <input type="text" name="company[]" class="form-control" placeholder="Certification Company" value="{{$row->certif_company}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Description</label></div>
                      <div class="col-md-8">
                         <input type="text" name="desc[]" class="form-control" placeholder="Certification Company" value="{{$row->certif_desc}}">
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Number</label></div>
                      <div class="col-md-8">
                         <input type="text" name="number[]" class="form-control" placeholder="Certification Number" value="{{$row->certif_number}}">
                      </div>
                   </div>
                </div>


                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification Expired</label></div>
                      <div class="col-md-8">
                        <input type="text" name="expired[]" class="form-control" placeholder="contoh: januari 2020" value="{{$row->certif_expired}}">
                      </div>
                   </div>
                   </div>

                   <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Certification File</label></div>
                      <div class="col-md-8">
                      <input type="file" name="certif_file" class="form-control" accept=".pdf|.png|.jpg|.jpeg" value="">
                      {{$row->certif_file}}
                      <br>
                      </div>
                   </div>
                   </div>
                   
                  
        
<!--
                <div class="modal-body substeps-modal">
                <form method="post" action="" >
                    {{ csrf_field() }}
                    <input type="hidden" >
                    <div class="form-group">

                <label for="catatan">Certification Expired</label><br>                        
                        <div class="row">                            
                            <div class="col-md-3">
                                <select name="bulanacertifex" id="bulancertifex" class="form-control" >
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="tahuncertifex" id="tahuncertifex" class="form-control" >                                    
                                    <option value="">Pilih</option>
                                </select>
                            </div>
                        </div>
-->



                <div align="right">
                    <a class="hapus" href="{{url('member/edit-certification-delete/'.$row->certif_id)}}"> 
                      <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
                    </a>  
                </div>
             
          </div>
          @endforeach

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


<div class="card-body-template card-body" style="display: none">
      
<div class="info alert alert-warning" style="display: none"></div>

<div class="form-group">
             <div class="row">
                <div class="col-md-4"><label for="Name">Certification Name</label></div>
                <div class="col-md-8">
                   <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Name" value="">
                </div>
             </div>
          </div>

          <div class="form-group">
             <div class="row">
                <div class="col-md-4"><label for="Name">Certification Years</label></div>
                <div class="col-md-8">
                   <input type="text" name="edu_name[]" class="form-control" placeholder="Certification Years" value="">
                   </input>
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
                      <div class="col-md-4"><label for="Name">Description</label></div>
                      <div class="col-md-8">
                         <input type="text" name="desc[]" class="form-control" placeholder="Certification Company" value="">
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

          <div class="form-group">
            <div class="row">
               <div class="col-md-4"><label for="Name">Certification File</label></div>
               <div class="col-md-8">
                  <input type="file" name="certif_file" class="form-control" accept=".pdf|.png|.jpg|.jpeg" value=""><br>
            `</div>
         `</div>
         </div>


<div align="right">
<a class="hapus"> 
  <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="20px"> Hapus
</a>  
</div>

</div>

</div>


@endsection