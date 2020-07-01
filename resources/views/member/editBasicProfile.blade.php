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


<form action="" method="post" id="register-talent">
            
            @csrf
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="info alert alert-warning" style="display: none"></div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">NAME</label></div>
                    <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="" value="{{ $profile->talent_name}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">EMAIL</label></div>
                    <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="" value="{{ $profile->talent_email}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Address">ADDRESS</label></div>
                    <div class="col-md-8"><input type="text" name="username" class="form-control" placeholder="" value="{{ $profile->talent_address}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="select" >GENDER</label></div>
                    <div class="col-md-8">
                        <select class="custom-select" name="role" id="register-role">
                         
                          <option  value="{{ $profile->talent_gender}}">Female</option>
                         <option  value="{{ $profile->talent_gender}}">Male</option> 
                          <!-- <option  value="coworkspace">Cowork</option> -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Number">PHONE</label></div>
                    <div class="col-md-8"><input type="number" name="phone_number" class="form-control" id="Number" placeholder="" value="{{ $profile->talent_phone}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Website">WEBSITE</label></div>
                    <div class="col-md-8"><input type="text" name="Website" class="form-control" id="Website" placeholder="" value="{{ $profile->talent_web}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Linkedin">LINKEDIN</label></div>
                    <div class="col-md-8"><input type="text" name="Linkedin" class="form-control" id="Linkedin" placeholder="" value="{{ $profile->talent_linkedin}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Facebook">FACEBOOK</label></div>
                    <div class="col-md-8"><input type="text" name="Facebook" class="form-control" id="Facebook" placeholder="" value="{{ $profile->talent_facebook}}"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Instagram">INSTAGRAM</label></div>
                    <div class="col-md-8"><input type="text" name="Instagram" class="form-control" id="Instagram" placeholder="" value="{{ $profile->talent_instagram}}"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Twitter">TWITTER</label></div>
                    <div class="col-md-8"><input type="text" name="Twitter" class="form-control" id="Twitter" placeholder="" value="{{ $profile->talent_twitter}}"> </div>
                </div>
            </div>

            </form>

      </div>
      <div class="modal-footer">
      <div class="btn btn-primary"  >
      <a href="/profile" ><font color="#FFFFFF">Back</font></a>
      </div>

          <div class="">
            <button type="submit" class="btn btn-primary">SAVE</button>
          </div>
        
    </div>
  </div>
  </div>
</div>




</main>
@endsection