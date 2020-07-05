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

        $("#form-add-porto").hide(); 

        $("#add-new").click(function()
        {
            $("#form-add-porto").toggle();
        });

        @if ($errors->any())
            $("#form-add-porto").show(); 
        @endif

    });

</script>
<section id="works" class="works clearfix">

    <div class="section-header"> <h2>Portfolio</h2> </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ( $talent->talent_portfolio()->get()->count() > 0 )
        <table class="table">
            <tr style="background: #e2e2e2">
                <td align="center">thumbnail</td>
                <td>project name</td>
                <td>Company</td>
                <td align="right">action</td>
            </tr>
            @foreach ( $talent->talent_portfolio()->get() as $row ) 
            <tr>
                <td align="center">
                    <img src="{{url('storage/Project Portfolio/'.$row->portfolio_image)}}" width="50px">
                </td>
                <td>{{$row->portfolio_name}}</td>
                <td>{{$row->portfolio_namacompany}}</td>
                <td align="right">
                    <a href="{{url('member/delete-porto/'.$row->portfolio_id)}}" class="btn btn-danger"
                        onclick="return confirm('yakin ingin menghapus data ini ?')">
                        hapus
                    </a>
                    <a href="{{url('member/update-porto/'.$row->portfolio_id)}}" class="btn btn-success">
                        edit
                    </a>
                </td>
            </tr>
            @endforeach       
        </table>
    @endif 

    <a href="#" class="btn btn-success" id="add-new">Add New Portfolio</a>
        
    
    <div id="form-add-porto" style="margin-top: 20px ; display: none;">
        <form action="{{url('member/post-porto')}}" method="post" id="register-talent" 
        enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                   <div class="row">
                      <div class="col-md-4"><label for="Name">Project Name</label></div>
                      <div class="col-md-8">
                            <input type="text" name="project_name" class="form-control" placeholder="Sistem POS">
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
                                <option value="pribadi">Pribadi</option>
                                <option value="kantor">Kantor</option>
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
                            <input type="text" name="office" class="form-control" placeholder="Nama Office">
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
                            <textarea name="desc" rows="5" style="width: 100%" placeholder="Ceritakan Selengkapnya tentang sistem apa yang anda buat, sendiri atau dengan berapa orang team, tugas anda bagian apa saja, dll. semakin lengkap semakin menarik anda terpilih"></textarea>
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
                            <textarea name="tech" rows="5" style="width: 100%" placeholder="contoh: Laravel, Jquery, Bootstrap, mysql, dst."></textarea>
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
                            <input type="text" name="date_start" class="form-control date">
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
                            <input type="text" name="date_end" class="form-control date">
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
                            accept="image/jpeg,image/jpg"><br>

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
                            <input type="text" name="link" class="form-control" placeholder="contoh : link git / git website">
                            @if ($errors->has('link'))
                            @foreach ($errors->get('link') as $error)
                            <div class="alert alert-danger"><i>{{$error}}</i></div>
                            @endforeach
                        @endif
                      </div>
                   </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>

        </form>
    </div>
    
    

</section>

<script src="{{url('template/upscale/themekit/scripts/sticky-kit.min.js')}}"></script>
@endsection