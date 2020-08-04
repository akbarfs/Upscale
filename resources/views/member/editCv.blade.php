@extends('member.template')
@section('content')


<section class="about">
        
    <div class="section-header"> <h2>Curriculim Vitae</h2> </div>

    <form action="{{url('member/post-cv')}}" method="post" id="register-talent" enctype="multipart/form-data">
            
        @csrf

        <div class="info alert alert-warning" style="display: none"></div>

        <div class="form-group">
           <div class="row">
              <div class="col-md-4"><label for="Name">Curriculum Vitae</label></div>
              <div class="col-md-8" style="padding: 10px">
                    <input type="file" id="myFile" name="cv"  style="width:220px">
                    @if ($errors->has('cv'))
                        @foreach ($errors->get('cv') as $error)
                        <div class="alert alert-danger"><i>{{$error}}</i></div>
                        @endforeach
                    @endif
              </div>
           </div>
        </div>
            
        <div class="modal-footer">
            <a href="/profile" class="btn btn-primary"><font color="#FFFFFF">Back</font></a>
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
        <hr style="margin-top: 0">
    </form>
    
    @if ( $talent->talent_cv_update)
    <iframe src="{{url('storage/Curriculum Vitae/'.$talent->talent_cv_update)}}?v={{date('H:i:s')}}" 
        style="height:500px;width:100%;"></iframe>
    @endif 

</section>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection