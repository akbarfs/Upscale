@extends('member.template')
@section('content')

<style type="text/css">
  .about select { width: 100%; padding: 10px; }
</style>
<section class="about">
    <div class="section-header"> <h2>About Me</h2> </div>
    
    <div class="intro">

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

        <form action="{{url('member/edit-basic-profile')}}" method="post" id="register-talent" enctype="multipart/form-data">
            
            
             
            @csrf

            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Photo</label></div>
                  <div class="col-md-8" style="padding: 10px">
                        <input type="file" id="myFile" name="photo" 
                        accept="image/jpeg,image/png,image/gif,image/JPG,image/JPEG">
                        
                        <!-- <div style="padding:5px 0"> foto harus berbentuk persegi empat </div>  -->

                        @if ($errors->has('photo'))
                            @foreach ($errors->get('photo') as $error)
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
                  <div class="col-md-4"><label for="Number">PROFILE DESCRIPTION</label></div>
                  <div class="col-md-8">
                    <textarea name="profile_desc" rows="5" style="width: 100%">@if(old('name')) {{old('profile_desc')}} @else {{$talent->talent_profile_desc}} @endif</textarea> @if ($errors->has('profile_desc'))
                        @foreach ($errors->get('profile_desc') as $error)
                        <div class="alert alert-danger"><i>{{$error}}</i></div>
                        @endforeach
                    @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Email">EMAIL</label></div>
                  <div class="col-md-8"><input type="text" name="email" class="form-control" placeholder="" value="{{ $talent->talent_email}}" disabled="disabled"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Address">DOMISILI</label></div>
                  <div class="col-md-8"><input type="text" name="address" class="form-control" placeholder="" value="{{ $talent->talent_address}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="select" >GENDER</label></div>
                  <div class="col-md-8">
                     <select class="custom-select" name="gender" id="register-role">
                        <option  value="female">Female</option>
                        <option  value="male">Male</option>
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
                  <div class="col-md-8"><input type="text" name="website" class="form-control" id="Website" placeholder="" value="{{ $talent->talent_web}}"></div>
               </div>
            </div>




            <script type="text/javascript">

              $(document).ready(function()
              {

                  $('.rp').autoNumeric('init', {aSep:'.', aDec:',', mDec:'0'});

                  $('.date').datepicker(
                   {
                      // showOn: "button",
                      // buttonText: "set date",
                      dateFormat: 'yy-mm-dd',
                      changeMonth: true,
                      changeYear: true,
                      yearRange: "1970:2015"
                  });

                  $('.start_career').datepicker(
                   {
                      // showOn: "button",
                      // buttonText: "set date",
                      dateFormat: 'yy-mm-dd',
                      changeMonth: true,
                      changeYear: true,
                      yearRange: "2000:2020"
                  });

                  $('.readykerja').datepicker(
                   {
                      // showOn: "button",
                      // buttonText: "set date",
                      dateFormat: 'yy-mm-dd',
                      changeMonth: true,
                      changeYear: true,
                      yearRange: "2020:2025"
                  });
              });
              
              
             
            </script>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                    <label for="Name">Start Career</label>
                  </div>
                  <div class="col-md-8">
                        <input type="text" name="start_career" class="form-control start_career" placeholder="" value="@if(old('start_career')) {{old('start_career')}} @else{{$talent->talent_start_career}}@endif">
                        @if ($errors->has('start_career'))
                            @foreach ($errors->get('start_career') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Level</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="level">
                            <option value="">-- posisi --</option>
                            <option value="junior" @if($talent->talent_level == 'junior') selected="selected" @endif>junior</option>
                            <option value="middle" @if($talent->talent_level == 'middle') selected="selected" @endif>middle</option>
                            <option value="senior" @if($talent->talent_level == 'senior') selected="selected" @endif>senior</option>
                        </select> 
                        @if ($errors->has('level'))
                            @foreach ($errors->get('level') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Focus</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="focus">
                            <option value="">-- posisi --</option>
                            <option value="Frontend" @if($talent->talent_focus == 'Frontend') selected="selected" @endif>Frontend Web</option>
                            <option value="Backend web" @if($talent->talent_focus == 'Backend web') selected="selected" @endif>Backend Web</option>
                            <option value="Fullstack web" @if($talent->talent_focus == 'Fullstack web') selected="selected" @endif>Fullstack Web</option>
                            <option value="Mobile programmer" @if($talent->talent_focus == 'Mobile programmer') selected="selected" @endif>Mobile programmer</option>
                            <option value="UI UX" @if($talent->talent_focus == 'UI UX') selected="selected" @endif>UI UX</option>
                            <option value="QA" @if($talent->talent_focus == 'QA') selected="selected" @endif>QA</option>
                            <option value="Dev Ops" @if($talent->talent_focus == 'Dev Ops') selected="selected" @endif>Dev Ops</option>
                            <option value="Data science" @if($talent->talent_focus == 'Data science') selected="selected" @endif>Data Science</option>
                            <option value="PM" @if($talent->talent_focus == 'PM') selected="selected" @endif>Project/Product Manager</option>
                            <option value="Other" @if($talent->talent_focus == 'Other') selected="selected" @endif>Other</option>
                        </select> 
                        @if ($errors->has('focus'))
                            @foreach ($errors->get('focus') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Ekspektasi Salary</label></div>
                  <div class="col-md-8">
                        <input type="text" name="salary" class="form-control rp" placeholder="" value="@if(old('salary')) {{old('salary')}} @else{{$talent->talent_salary}}@endif" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">
                        @if ($errors->has('salary'))
                            @foreach ($errors->get('salary') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                    <label for="Name">Ekspektasi Salary apabila di jakarta</label>
                  </div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="salary_jakarta" class="form-control rp" placeholder="" value="@if(old('salary_jakarta')) {{old('salary_jakarta')}} @else{{$talent->talent_salary_jakarta}}@endif" > @if ($errors->has('salary_jakarta'))
                            @foreach ($errors->get('salary_jakarta') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                    <label for="Name">Ekspektasi Salary apabila di yogyakarta</label>
                  </div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="salary_jogja" class="form-control rp" placeholder="" value="@if(old('salary_jogja')) {{old('salary_jogja')}} @else{{$talent->talent_salary_jogja}}@endif">
                        @if ($errors->has('salary_jogja'))
                            @foreach ($errors->get('salary_jogja') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Kerja luar kota?</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="luar_kota">
                            <option value="">-- Pilih --</option>
                            <option value="yes" @if($talent->talent_luar_kota == 'yes') selected="selected" @endif>Yes</option>
                            <option value="no" @if($talent->talent_luar_kota == 'no') selected="selected" @endif>No</option>
                        </select> 
                        @if ($errors->has('luar_kota'))
                            @foreach ($errors->get('luar_kota') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Kerja di jakarta?</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="onsite_jakarta">
                            <option value="">-- Pilih --</option>
                            <option value="yes" @if($talent->talent_onsite_jakarta == 'yes') selected="selected" @endif>Yes</option>
                            <option value="no" @if($talent->talent_onsite_jakarta == 'no') selected="selected" @endif>No</option>
                        </select> 
                        @if ($errors->has('onsite_jakarta'))
                            @foreach ($errors->get('onsite_jakarta') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Kerja di jogja?</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="onsite_jogja">
                            <option value="">-- Pilih --</option>
                            <option value="yes" @if($talent->talent_onsite_jogja == 'yes') selected="selected" @endif>Yes</option>
                            <option value="no" @if($talent->talent_onsite_jogja == 'no') selected="selected" @endif>No</option>
                        </select> 
                        @if ($errors->has('onsite_jogja'))
                            @foreach ($errors->get('onsite_jogja') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Prefer lokasi kerja</label></div>
                  <div class="col-md-8">
                        <input type="text" name="prefered_city" class="form-control" placeholder="" value="@if(old('prefered_city')) {{old('prefered_city')}} @else{{$talent->talent_prefered_city}}@endif">
                        @if ($errors->has('prefered_city'))
                            @foreach ($errors->get('prefered_city') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Current work</label></div>
                  <div class="col-md-8">
                        <input type="text" name="current_work" class="form-control" placeholder="tempat anda bekerja saat ini, contoh : tokopedia" value="@if(old('current_work')) {{old('current_work')}} @else{{$talent->talent_current_work}}@endif">
                        @if ($errors->has('current_work'))
                            @foreach ($errors->get('current_work') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4">
                    <label for="Name">Ready Kerja</label>
                  </div>
                  <div class="col-md-8">
                        <input type="text" name="date_ready" class="form-control readykerja" placeholder="" value="@if(old('date_ready')) {{old('date_ready')}} @else{{$talent->talent_date_ready}}@endif">
                        @if ($errors->has('date_ready'))
                            @foreach ($errors->get('date_ready') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Edukasi ISA</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="isa">
                            <option value="unset" @if($talent->talent_isa == 'unset') selected="selected" @endif >-- Pilih --</option>
                            <option value="yes" @if($talent->talent_isa == 'yes') selected="selected" @endif>Yes</option>
                            <option value="no" @if($talent->talent_isa == 'no') selected="selected" @endif>No</option>
                        </select> 
                        @if ($errors->has('isa'))
                            @foreach ($errors->get('isa') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Kerja remote?</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="remote">
                            <option value="">-- Pilih --</option>
                            <option value="yes" @if($talent->talent_remote == 'yes') selected="selected" @endif>Yes</option>
                            <option value="no" @if($talent->talent_remote == 'no') selected="selected" @endif>No</option>
                        </select> 
                        @if ($errors->has('remote'))
                            @foreach ($errors->get('remote') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Kerja remote luar negri?</label></div>
                  <div class="col-md-8">
                        <select class="custom-select" name="international">
                            <option value="">-- Pilih --</option>

                            <option value="ya" @if($talent->talent_international == 'ya') selected="selected" @endif>Ya, kemungkinan saya tertarik</option>
                            <option value="Tidak yakin, bahasa inggris saya tidak cukup baik" @if($talent->talent_international == 'Tidak yakin, bahasa inggris saya tidak cukup baik') selected="selected" @endif>Tidak yakin, bahasa inggris saya tidak cukup baik</option>
                            <option value="Tidak, karena perbedaan budaya kerja" @if($talent->talent_international == 'Tidak, karena perbedaan budaya kerja') selected="selected" @endif>Tidak, karena perbedaan budaya kerja</option>
                            <option value="Tidak, karna suatu hal" @if($talent->talent_international == 'Tidak, karna suatu hal') selected="selected" @endif>Tidak, karna suatu hal</option>
                        </select> 
                        @if ($errors->has('international'))
                            @foreach ($errors->get('international') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Freelance hour rate</label></div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="freelance_hour" class="form-control rp" placeholder="" value="@if(old('freelance_hour')) {{old('freelance_hour')}} @else{{$talent->talent_freelance_hour}}@endif">
                        @if ($errors->has('freelance_hour'))
                            @foreach ($errors->get('freelance_hour') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Project Min</label></div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="project_min" class="form-control rp" placeholder="" value="@if(old('project_min')) {{old('project_min')}} @else{{$talent->talent_project_min}}@endif">
                        @if ($errors->has('project_min'))
                            @foreach ($errors->get('project_min') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Project Max</label></div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="project_max" class="form-control rp" placeholder="" value="@if(old('project_max')) {{old('project_max')}} @else{{$talent->talent_project_max}}@endif">
                        @if ($errors->has('project_max'))
                            @foreach ($errors->get('project_max') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Konsultasi Rate</label></div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="konsultasi_rate" class="form-control rp" placeholder="" value="@if(old('konsultasi_rate')) {{old('konsultasi_rate')}} @else{{$talent->talent_konsultasi_rate}}@endif">
                        @if ($errors->has('konsultasi_rate'))
                            @foreach ($errors->get('konsultasi_rate') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Name">Rate Mengajar</label></div>
                  <div class="col-md-8">
                        <input type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." name="ngajar_rate" class="form-control rp" placeholder="" value="@if(old('ngajar_rate')) {{old('ngajar_rate')}} @else{{$talent->talent_ngajar_rate}}@endif">
                        @if ($errors->has('ngajar_rate'))
                            @foreach ($errors->get('ngajar_rate') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                  </div>
               </div>
            </div>


            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Linkedin">LINKEDIN</label></div>
                  <div class="col-md-8"><input type="text" name="linkedin" class="form-control" id="Linkedin" placeholder="" value="{{ $talent->talent_linkedin}}"></div>
               </div>
            </div>

            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Facebook">FACEBOOK</label></div>
                  <div class="col-md-8"><input type="text" name="facebook" class="form-control" id="Facebook" placeholder="" value="{{ $talent->talent_facebook}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Instagram">INSTAGRAM</label></div>
                  <div class="col-md-8"><input type="text" name="instagram" class="form-control" id="Instagram" placeholder="" value="{{ $talent->talent_instagram}}"></div>
               </div>
            </div>
            <div class="form-group">
               <div class="row">
                  <div class="col-md-4"><label for="Twitter">TWITTER</label></div>
                  <div class="col-md-8"><input type="text" name="twitter" class="form-control" id="Twitter" placeholder="" value="{{ $talent->talent_twitter}}"> </div>
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