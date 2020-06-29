@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

</br>
</br>
</br>

<main>
<div class="container">
<div class="container" align="left">
            
            <div class="card-body">
                <br/>
                <h4>
    CV And PORTOFOLIO 
    </h4>

        
            <div class="card mt-5">
                <div class="card-body">
                    <br/>
                
                    <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">CV</label></div>
                    <div class="card md-8">
                        <form action="/action_page.php" >
                        <input type="file" id="myFile" name="filename"  style="width:220px">
                        </form>
                    </div>
                </div>
            </div>
            </br>
            </br>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4"><label for="Name">PORTOFOLIO</label></div>
                    <div  class="card md-8">
                    <form action="/action_page.php">
                     <input type="file" id="myFile" name="filename"  style="width:220px">
                    </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
       </br>
       </br>


        <div class="form-group" align="right" padding=25px;>
         <input type="submit" class="btn btn-success" value="SAVE">
        </div>


</main>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection