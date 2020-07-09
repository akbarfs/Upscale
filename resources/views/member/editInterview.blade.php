@extends('member.template')

@section('content')

<section class="about">
  <form action="" method="post" id="register-talent">
    @csrf

    <div class="section-header"> <h2>Interview</h2> </div>
    
      <div class="card mt-5">

          <style type="text/css">
            .card-body
            {    
                padding: 20px;
                border: solid 1px #d2d2d2;
                border-radius: 10px;
                margin-bottom: 20px
            }
            .tambah , .hapus { cursor: pointer; }
          </style>
         

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

          
          <div class="card-body">
                
                <div class="info alert alert-warning" style="display: none"></div>
                
               
                <div class="form-group">
                   @foreach($question as $row)
                          <div class="row">
                          
                            <div class=""><label for="Name"><p> {{$row->question_text}} </p>
                            Jawaban
                            </label>
                            </div>  
                           
                            <div >
                            @foreach ( $interview->get() as $row )
                              <textarea rows="" name="project[]" class="form-control" value="">
                              {{$row->it_answer}}
                              </textarea>
                            @endforeach
                           </br>
                            </div>
                        </div>
                    @endforeach

                       
                   

                </div>

             
          </div>
         
 
      </div>
  </form>

      <div align="right">
          <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
          <button type="submit" class="btn btn-primary">SAVE</button>
      </div>
</section>


</div>


@endsection


