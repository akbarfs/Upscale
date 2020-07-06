@extends('member.template')
@section('content')

<script type="text/javascript">
    $(document).ready(function()
    {
        $('.date').datepicker(
        {
          // showOn: "button",
          // buttonText: "set date",
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true,
          yearRange: "1980:2020"
        });
    });

</script>
<section id="works" class="works clearfix">

    <div class="section-header"> <h2>Portfolio</h2> </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
        </div>
    @endif
    
    <div id="form-add-porto" style="margin-top: 20px;">
        <form action="" method="post" id="register-talent" enctype="multipart/form-data">
                <input type="hidden" name="porto_id" value="{{$porto->portfolio_id}}">
                @csrf
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Project Name</label></div>
                      <div class="col-md-8">
                            <input type="text" name="project_name" class="form-control" placeholder="Sistem POS" value="@if(old('project_name')) {{old('project_name')}} @else {{$porto->portfolio_name}} @endif">
                            @if ($errors->has('project_name'))
                            @foreach ($errors->get('project_name') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Type Project</label></div>
                      <div class="col-md-8">
                            <select name="typeproject" class="form-control">
                                <option value="pribadi" @if($porto->portfolio_tipe_project =='pribadi') selected='selected' @endif>Pribadi</option>
                                <option value="kantor" @if($porto->portfolio_tipe_project =='kantor') selected='selected' @endif>Kantor</option>
                            </select>
                            @if ($errors->has('typeproject'))
                                @foreach ($errors->get('typeproject') as $error)
                                <div class="alert alert-danger"><i>{{$error}}</i></div>
                                @endforeach
                            @endif
                      </div>
                      
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Company</label></div>
                      <div class="col-md-8">
                            <input type="text" name="office" class="form-control" placeholder="Nama Office" value="@if(old('office')) {{old('office')}} @else {{$porto->portfolio_namacompany}} @endif">
                            @if ($errors->has('office'))
                            @foreach ($errors->get('office') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Project Description</label></div>
                      <div class="col-md-8">
                            <textarea name="desc" rows="5" style="width: 100%">@if(old('desc')) {{old('desc')}} @else {{$porto->portfolio_desc}} @endif</textarea>
                            @if ($errors->has('desc'))
                            @foreach ($errors->get('desc') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Project Technology Used</label></div>
                      <div class="col-md-8">
                            <textarea name="tech" rows="5" style="width: 100%">@if(old('tech')) {{old('tech')}} @else {{$porto->portfolio_tech}} @endif</textarea>
                            @if ($errors->has('tech'))
                            @foreach ($errors->get('tech') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Portfolio Date Start</label></div>
                      <div class="col-md-8">
                            <input type="text" name="date_start" class="form-control date" value="@if(old('date_start')) {{old('date_start')}} @else {{$porto->portfolio_startdate}} @endif">
                            @if ($errors->has('date_start'))
                            @foreach ($errors->get('date_start') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Portfolio Date End</label></div>
                      <div class="col-md-8">
                            <input type="text" name="date_end" class="form-control date" value="@if(old('date_end')) {{old('date_end')}} @else {{$porto->portfolio_enddate}} @endif">
                            @if ($errors->has('date_end'))
                            @foreach ($errors->get('date_end') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Screenshoot image</label></div>
                      <div class="col-md-8" style="padding: 15px">
                            
                            <input value="" type="file" name="screenshoot"
                            accept="image/jpeg,image/jpg">max width 600px<br>

                            @if ($errors->has('file'))
                                @foreach ($errors->get('file') as $error)
                                <div class="alert alert-danger"><i>{{$error}}</i></div>
                                @endforeach
                            @endif
                      </div>
                      
                   </div>
                </div>

                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Portfolio Link</label></div>
                      <div class="col-md-8">
                            <input type="text" name="link" class="form-control" placeholder="contoh : link git / git website" value="@if(old('link')) {{old('link')}} @else {{$porto->portfolio_link}} @endif">
                            @if ($errors->has('link'))
                            @foreach ($errors->get('link') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="modal-footer">
                  <a class="btn btn-primary" href="{{url('member/edit-porto')}}" >cancel</a>
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>

        </form>
    </div>
    
    

</section>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection