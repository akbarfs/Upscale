@extends('member.template')
@section('content')


<section class="about">
    <div class="section-header"> <h2>About Me</h2> </div>
    
    <div class="intro">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <!-- <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div> -->
        @endif

        <form action="{{url('member/edit-basic-profile')}}" method="post" id="register-talent">
            
            
             
            @csrf

            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Photo</label></div>
                  <div class="col-md-8">
                        <input type="file" id="myFile" name="filename"  style="width:220px">
                        @if ($errors->has('filename'))
                            @foreach ($errors->get('filename') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
                  
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">NAME</label></div>
                  <div class="col-md-8">
                        <input type="text" name="name" class="form-control" placeholder="" value="@if(old('name')) {{old('name')}} @else {{$talent->talent_name}} @endif">
                        @if ($errors->has('name'))
                            @foreach ($errors->get('name') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Email">EMAIL</label></div>
                  <div class="col-md-8"><input type="email" name="email" class="form-control" id="Email" placeholder="" value="{{ $talent->talent_email}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Address">ADDRESS</label></div>
                  <div class="col-md-8"><input type="text" name="address" class="form-control" placeholder="" value="{{ $talent->talent_address}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="select" >GENDER</label></div>
                  <div class="col-md-8">
                     <select class="custom-select" name="gender" id="register-role">
                        <option  value="{{ $talent->talent_gender}}">Female</option>
                        <option  value="{{ $talent->talent_gender}}">Male</option>
                        <!-- <option  value="coworkspace">Cowork</option> -->
                     </select>
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Number">PHONE</label></div>
                  <div class="col-md-8"><input type="number" name="phone" class="form-control" id="Number" placeholder="" value="{{ $talent->talent_phone}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Website">WEBSITE</label></div>
                  <div class="col-md-8"><input type="text" name="Website" class="form-control" id="Website" placeholder="" value="{{ $talent->talent_web}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Linkedin">LINKEDIN</label></div>
                  <div class="col-md-8"><input type="text" name="Linkedin" class="form-control" id="Linkedin" placeholder="" value="{{ $talent->talent_linkedin}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Facebook">FACEBOOK</label></div>
                  <div class="col-md-8"><input type="text" name="Facebook" class="form-control" id="Facebook" placeholder="" value="{{ $talent->talent_facebook}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Instagram">INSTAGRAM</label></div>
                  <div class="col-md-8"><input type="text" name="Instagram" class="form-control" id="Instagram" placeholder="" value="{{ $talent->talent_instagram}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Twitter">TWITTER</label></div>
                  <div class="col-md-8"><input type="text" name="Twitter" class="form-control" id="Twitter" placeholder="" value="{{ $talent->talent_twitter}}"> </div>
               </div>
            </div>
            
            <div class="modal-footer">
                <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>

        </form>
    </div>

</section>

@endsection