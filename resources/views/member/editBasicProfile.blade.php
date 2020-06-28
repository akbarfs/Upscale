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
                <h4>BASIC PROFILE</h4>
                <br/>

                <div class="container" align="center">
<div class="card" style="width:250px" align="center">
<img class="card-img-top" src="{{url('template/upscale/media/profile.png')}}" alt="Card image" style="width:100%">
<div class="card-body">
  <form action="/action_page.php">
  <input type="file" id="myFile" name="filename"  style="width:220px">
</form>
</div>
</div>
<br>
</div>


<form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">NAME</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="Your Name"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">EMAIL</label></div>
                    <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="Your Email"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">ADDRESS</label></div>
                    <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="Your Address"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="select">GENDER</label></div>
                    <div class="col-md-8">
                        <select class="custom-select" name="role" id="register-role">
                          <option> - select -</option>
                          <option  value="talent">Female</option>
                         <option  value="client">Male</option> 
                          <!-- <option  value="coworkspace">Cowork</option> -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Number">PHONE</label></div>
                    <div class="col-md-8"><input type="number" name="phone_number" class="form-control" id="Number" placeholder=" 0888 xxx"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password">WEBSITE</label></div>
                    <div class="col-md-8"><input type="password" name="password" class="form-control" id="Password" placeholder="Your Website"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password2">LINKEDIN</label></div>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Youre Linkedin"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password2">FACEBOOK</label></div>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Youre Facebook"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password2">INSTAGRAM</label></div>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Your Instagram"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Password2">TWITTER</label></div>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control" id="Password2" placeholder="Your Twitter"></div>
                </div>
            </div>



      </div>
      <div class="modal-footer">
        
          <div class="">
            <button type="submit" class="btn btn-primary">SAVE</button>
          </div>

        </form>
    </div>
  </div>
  </div>
</div>




</main>
@endsection