@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

<main>
<div class="container" align="left">
         </br>

        <div class="container">
            <div class="card mt-5">
                <div class="card-body">
                    <h5>
   <a href="/profile/edit-basic-profile"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
    BASIC PROFILE
    </h5>
    </br>

    <p>
    <img class="" src="{{url('template/upscale/media/profile.png')}}" style="float:left;" style="bold" alt="Card image" height="300px" width="300px">

    <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">NAME</label></div>
                    <div class="col-md-8">Clara Simanjuntak</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">EMAIL</label></div>
                    <div class="col-md-8">Clara1@gmail.com</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">ADDRESS</label></div>
                    <div class="col-md-8">SIANTAR</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">GENDER</label></div>
                    <div class="col-md-8">FEMALE</div>
                </div>
            </div>
            

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">DATE OF BIRTH</label></div>
                    <div class="col-md-8">25 Juni 2020</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                    <div class="w3-container">
  <p onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-blue">CONTACT INFO</p>

  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <h4><strong>Contact Info</strong></h4>
        </br>
        <p >
   <img class="" src="{{url('template/upscale/media/wa.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
    08123456789
    </p>
    <p>
   <img class="" src="{{url('template/upscale/media/web.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
   www.clara.com
    </p>
    <p>
   <img class="" src="{{url('template/upscale/media/link.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
    linkedin.com/clara
    </p>
    <p>
   <img class="" src="{{url('template/upscale/media/fb.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
    facebook.com/clara
    </p>
    <p>
   <img class="" src="{{url('template/upscale/media/ig.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
    instagram.com/clara
    </p>
    <p>
   <img class="" src="{{url('template/upscale/media/tw.png')}}" style="margin: 4px;"  style="float:left;" style="bold" alt="Card image" height="25px" width="25px"></a>
    twitter.com/clara
    </p>
        
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
            
            </br>

           <div class="container">
               <div class="card mt-5">
                   <div class="card-body">
                       <h5>
      <a href="/profile/edit-education"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
      EDUCATIONAL BACKGROUND
       </h5>
       </br>
       </br>

       <h4>INSTITUT TEKNOLOGI DEL</h4>
       <h5>Informatics Bachelor</h5>
       <p>2017 - Present</p>
       </br>

       <h4>INSTITUT TEKNOLOGI DEL</h4>
       <h5>Informatics Bachelor</h5>
       <p>2017 - Present</p>

       </div>
            </div>
        </div>
        </div>

        <div class="container" align="left">
            
            </br>

           <div class="container">
               <div class="card mt-5">
                   <div class="card-body">
                       <h5>
     <a href="/profile/edit-work"><img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
      WORK EXPERIENCE
       </h5>
       </br>
    
       <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">2020 - Present</label></div>
                    <div class="col-md-8">
                    <p>
                    <ul style="list-style-type:none;">
                        <li>UI/UX Desaigner</li>
                         <li>UPSCALE.ID</li>
                         </br>
                         <li>

                     <div class="form-group">
                  <div class="row">
                    <div class="col-md-4"><label for="Email">Specialization</label></div>
                    <div class="col-md-8">Web Design</div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">Salary</label></div>
                    <div class="col-md-8">20000000</div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Email">Description</label></div>
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
            
            </br>

           <div class="container">
               <div class="card mt-5">
                   <div class="card-body">
                       <h5>
     <a href="/profile/edit-skill"><img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
      SKILL
       </h5>
       </br>
    
       <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Web Development</label></div>
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
            
            </br>

           <div class="container">
               <div class="card mt-5">
                   <div class="card-body">
                       <h5>
     <a href="/profile/edit-cv"> <img class="" src="{{url('template/upscale/media/edit.png')}}" style="float:right;" style="bold" alt="Card image" height="25px" width="25px"></a>
      CV And POTOFOLIO
       </h5>
       </br>
    
       <form action="/register/member" method="post" id="register-talent">
            
            @csrf
            
            <div class="info alert alert-warning" style="display: none"></div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">CV</label></div>
                    <div class="col-md-8"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">Portofolio</label></div>
                    <div class="col-md-8"></div>
                </div>
            </div>

      
       </div>
            </div>
        </div>
        </div>

         </br>
         </br>

</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection