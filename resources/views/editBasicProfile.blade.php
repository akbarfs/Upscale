<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit Basic Profile</title>
    </head>
    <body>
    
        <div class="container" align="left">
            
                <div class="card-body">
                    <br/>
                    <h4>BASIC PROFILE</h4>
                    <br/>

                    <div class="container" align="center">
  <div class="card" style="width:200px" align="center">
    <img class="card-img-top" src="profile.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <a href="#" class="btn btn-primary">UPLOAD</a>
    </div>
  </div>
  <br>
</div>
                    

                    <form method="post" >

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>NAME</label>
                            <input type="text" name="id" class="form-control" placeholder="">

                            @if($errors->has('id'))
                                <div class="text-danger">
                                    {{ $errors->first('id')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>EMAIL</label>
                            <input name="judul" class="form-control" placeholder="" ></input>

                             @if($errors->has('judul'))
                                <div class="text-danger">
                                    {{ $errors->first('judul')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>ADDRESS</label>
                            <input name="penulis" class="form-control" placeholder="" ></input>

                             @if($errors->has('penulis'))
                                <div class="text-danger">
                                    {{ $errors->first('penulis')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>GENDER</label>
                            <input name="penerbit" class="form-control" placeholder="" ></input>

                             @if($errors->has('penerbit'))
                                <div class="text-danger">
                                    {{ $errors->first('penerbit')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>DATE OF BIRTH</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>PHONE</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div> <div class="form-group">
                            <label>WEBSITE</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div> <div class="form-group">
                            <label>LINKEDIN</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>FACEBOOK</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>INSTAGRAM</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label>TWITTER</label>
                            <input name="jenis" class="form-control" placeholder="" ></input>

                             @if($errors->has('jenis'))
                                <div class="text-danger">
                                    {{ $errors->first('jenis')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group" align="right">
                            <input type="submit" class="btn btn-success" value="SAVE">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>