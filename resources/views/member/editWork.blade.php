@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

</br>
</br>
</br>

<main>
<div class="container" align="left">
            
            <div class="card-body">
                <br/>
                <h4>
    <a href=""> <img class="" src="{{url('template/upscale/media/tambah.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
    WORK EXPERIENCE 
    </h4>

        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <br/>
                    <br/>
                    <form action="/action_page.php">
     <a href=""><img class="" src="{{url('template/upscale/media/hapus.png')}}" style="float:right;" alt="Card image" height="25px" width="25px"></a>   
     <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">POSITION</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">COMPANY</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                </div>
            </div>

            <label for="lname">Starting Year:</label>
  <select id="degree" name="degree">
  <option value="Degree">2017</option>
  <option value="bachelor">2018</option>
  </select>

  <label for="lname">Year Of Graduation:</label>
  <select id="degree" name="degree">
  <option >2021</option>
  <option >2020</option>
  </select><br><br>

  <label for="lname">Starting Year:</label>
  <select id="degree" name="degree">
  <option value="Degree">2017</option>
  <option value="bachelor">2018</option>
  </select>

  <label for="lname">Year Of Graduation:</label>
  <select id="degree" name="degree">
  <option >2021</option>
  <option >2020</option>
  </select><br><br>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">SPESIALIZATION</label></div>
                    <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="Informatics"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Description</label></div>
                    <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="0.00"></div>
                </div>
            </div>

            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
  <label for="vehicle1"> I'm still studying here </label><br>
  
</form>
                </div>
            </div>
        </div>
        </div>

        <div class="form-group" align="right" padding=25px;>
         <input type="submit" class="btn btn-success" value="SAVE">
        </div>


</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection