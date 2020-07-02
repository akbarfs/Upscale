@extends('layouts.template',['logo'=>'transparent'])
@section("menu_class",'light')
@section('content')


<main>
    <div class="container" align="left">

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

        <form action="{{url('member/edit-basic-profile')}}" method="post" id="register-talent">
            
            <div class="card-body">
                <h4>BASIC PROFILE</h4>
                <div class="container" align="center">
                    <div class="card" style="width:250px" align="center">
                       <img class="card-img-top" src="{{url('template/upscale/media/profile.png')}}" alt="Card image" style="width:100%">
                       <div class="card-body">
                            <input type="file" id="myFile" name="filename"  style="width:220px">
                       </div>
                    </div>
                    <br>
                </div>
            </div>
             
            @csrf

            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">NAME</label></div>
                  <div class="col-md-8"><input type="text" name="name" class="form-control" placeholder="" value="@if(old('name')) {{old('name')}} @else {{$profile->talent_name}} @endif"></div>
                  @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                    <span class="invalid"><i>{{$error}}</i></span>
                    @endforeach
                  @endif
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
                  <div class="col-md-8"><input type="text" name="address" class="form-control" placeholder="" value="{{ $profile->talent_address}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="select" >GENDER</label></div>
                  <div class="col-md-8">
                     <select class="custom-select" name="gender" id="register-role">
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
                  <div class="col-md-8"><input type="number" name="phone" class="form-control" id="Number" placeholder="" value="{{ $profile->talent_phone}}"></div>
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
            
            <div class="modal-footer">
                <div class="btn btn-primary">
                    <a href="/profile" ><font color="#FFFFFF">Back</font></a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>

        </form>
    </div>
</main>
@endsection