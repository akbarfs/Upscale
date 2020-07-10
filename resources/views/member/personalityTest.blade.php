@extends('member.template')
@section('content')

<style type="text/css">
  .about select { width: 100%; padding: 10px; }
</style>
<section class="about">
    <div class="section-header"> <h2>Personality Test</h2> </div>
    
    <div class="intro">

        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                	Semua form harus terisi
                    <!-- @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach -->
                </ul>
            </div>
        @endif

        <form action="{{url('member/personality-test')}}" method="post" id="register-talent" enctype="multipart/form-data">
            
            
             
            @csrf

            <div class="info alert alert-warning" style="display: none"></div>

            @foreach ( $test as $row )
            <div class="form-group">
               <div class="row">
                  <div class="col-md-12" style="padding: 20px ; font-weight: bold;">
                  		{{$row->question_text}}
                  </div>
                  <div class="col-md-12">
                    
                    <textarea name="answer[{{$row->tq_id}}]" rows="5" style="width: 100%">@if(old('answer.'.$row->tq_id)) {{old('answer.'.$row->tq_id)}} @else {{$answer[$row->tq_id]}} @endif</textarea> 

                    @if ( $errors->has('answer.'.$row->tq_id) )
                        @foreach ($errors->get('answer.'.$row->tq_id) as $error)
                        <div class="alert alert-danger"><i>{{$error}}</i></div>
                        @endforeach
                    @endif

                  </div>
               </div>
            </div>
            @endforeach

            
            <div class="modal-footer">
                <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </div>

        </form>
    </div>

</section>

@endsection