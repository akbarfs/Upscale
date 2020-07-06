@extends('layouts.template',['logo'=>'transparent']) @section("menu_class",'light') @section('content')
<main>

    <div class="container">
        <div class="row">
            <!-- <div class="col-md-2"></div> -->
            <div class="col-md-12 col-sm-12">
               <div class="container" align="left">
                  </br>
                  <div class="container">
                     <div class="card mt-5">
                        <div class="card-body">
                           <h5>
                              <a href="/member/edit-basic-profile"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;"  alt="Card image" height="25px" width="25px"></a><strong>
                              BASIC PROFILE</strong>
                           </h5>
                           <div class="form-group" style="margin: 15px;">
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="Email">
                                       <p style="margin: 15px;"> <img class="" src="{{url('template/upscale/media/profile.png')}}" style="float:left;" style="bold" alt="Card image" height="250px" width="250px"> 
                                    </label>
                                 </div>
                                 <div class="col-md-8">
                                    <form action="/register/member" method="post" id="register-talent">
                                    @csrf
                                    <div class="info alert alert-warning" style="display: none"></div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label for="Name">
                                                <h6><strong>Name</strong></h6>
                                             </label>
                                          </div>
                                          <div class="col-md-8"> {{ $profile->talent_name}} </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label for="Email">
                                                <h6><strong>Email</strong></h6>
                                             </label>
                                          </div>
                                          <div class="col-md-8"> {{ $profile->talent_email}} </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label for="Name">
                                                <h6><strong>Address</strong></h6>
                                             </label>
                                          </div>
                                          <div class="col-md-8"> {{ $profile->talent_address}} </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label for="Name">
                                                <h6><strong>Gender</strong></h6>
                                             </label>
                                          </div>
                                          <div class="col-md-8"> {{ $profile->talent_gender}} </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <label for="Name">
                                                <h6><strong>Date Of Birth</strong></h6>
                                             </label>
                                          </div>
                                          <div class="col-md-8"> {{ $profile->talent_birth_date}} </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-md-4">
                                             <div class="w3-container">
                                                <p onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">
                                                <h6><strong>Contact Info</strong></h6>
                                                </p>
                                                <div id="id01" class="w3-modal">
                                                   <div class="w3-modal-content">
                                                      <div class="w3-container">
                                                         <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                                         <h5><strong>Contact Info</strong></h5>
                                                         </br>
                                                         <p> <img class="" src="{{url('template/upscale/media/wa.png')}}" style="margin: 4px;" style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a> {{ $profile->talent_phone}} </p>
                                                         <p> <img class="" src="{{url('template/upscale/media/web.png')}}" style="margin: 6px;" style="float:left;" style="bold" alt="Card image" height="20px" width="20px"></a> {{ $profile->talent_web }} </p>
                                                         <p> <img class="" src="{{url('template/upscale/media/link.png')}}" style="margin: 4px;" style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a> {{ $profile->talent_linkedin}} </p>
                                                         <p> <img class="" src="{{url('template/upscale/media/fb.png')}}" style="margin: 4px;" style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a> {{ $profile->talent_facebook }} </p>
                                                         <p> <img class="" src="{{url('template/upscale/media/ig.png')}}" style="margin: 4px;" style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a> {{ $profile->talent_instagram }} </p>
                                                         <p> <img class="" src="{{url('template/upscale/media/tw.png')}}" style="margin: 4px;" style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a> {{ $profile->talent_twitter }} </p>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- spasi  -->
               <div class="container" align="left">
                  <div class="container">
                     <div class="card mt-5">
                        <div class="card-body">
                           <h5>
                              <a href="/member/edit-education/"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
                              <strong> EDUCATIONAL BACKGROUND</strong>
                           </h5>
                           </br>
                           <h6>INSTITUT TEKNOLOGI DEL</h6>
                           <h6>Informatics Bachelor</h6>
                           <p>2017 - Present</p>
                           </br>
                           <h6>INSTITUT TEKNOLOGI DEL</h6>
                           <h6>Informatics Bachelor</h6>
                           <p>2017 - Present</p>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="container" align="left">
                  <div class="container">
                     <div class="card mt-5">
                        <div class="card-body">
                           <h5>
                              <a href="/member/edit-work/"><img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
                              <strong>WORK EXPERIENCE</strong>
                           </h5>
                           </br>
                           <form action="/register/member" method="post" id="register-talent">
                           @csrf
                           <div class="info alert alert-warning" style="display: none"></div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="Name">
                                       <h6>2020 - Present</h6>
                                    </label>
                                 </div>
                                 <div class="col-md-8">
                                    <p>
                                    <ul style="list-style-type:none;">
                                       <li>
                                          <h6>UI/UX Desaigner</h6>
                                       </li>
                                       <li>
                                          <h6>UPSCALE.ID</h6>
                                       </li>
                                       </br>
                                       <li>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label for="Email">
                                                      <h6>Specialization</h6>
                                                   </label>
                                                </div>
                                                <div class="col-md-8">Web Design</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label for="Email">
                                                      <h6>Salary</h6>
                                                   </label>
                                                </div>
                                                <div class="col-md-8">20000000</div>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-md-4">
                                                   <label for="Email">
                                                      <h6>Description</h6>
                                                   </label>
                                                </div>
                                                <div class="col-md-8">Design Interface Upscale Website</div>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="container" align="left">
                  <div class="container">
                     <div class="card mt-5">
                        <div class="card-body">
                           <h5>
                              <a href="/member/edit-skill/"><img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
                              <strong> SKILL</strong>
                           </h5>
                           </br>
                           <form action="/register/member" method="post" id="register-talent">
                           @csrf
                           <div class="info alert alert-warning" style="display: none"></div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="Name">
                                       <h6><strong>Web Development</strong></h6>
                                    </label>
                                 </div>
                                 <div class="col-md-8">
                                    <p>
                                    <ul>
                                       <li>PHP</li>
                                       <li>HTML</li>
                                       <li>Laravel</li>
                                    </ul>
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="container" align="left">
                  <div class="container">
                     <div class="card mt-5">
                        <div class="card-body">
                           <h5>
                              <a href="/member/edit-cv/"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
                              CV And PORTOFOLIO
                           </h5>
                           </br>
                           <form action="/register/member" method="post" id="register-talent">
                           @csrf
                           <div class="info alert alert-warning" style="display: none"></div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="Name">
                                       <h6><strong>CV</strong></h6>
                                    </label>
                                 </div>
                                 <div class="col-md-8"></div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-md-4">
                                    <label for="Name">
                                       <h6><strong>Portofolio</strong></h6>
                                    </label>
                                 </div>
                                 <div class="col-md-8"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           </div>
        </div>
    </div>
   
</main>
<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script> @endsection