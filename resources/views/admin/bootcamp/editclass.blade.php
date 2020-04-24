@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp Class</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp Class</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">  
      <div class="well">
        <p class="lead"><a href="{{ url('admin/menu')}}" class="btn btn-default pull-right">Go Back</a> Menu:</p>
		
		{{ Form::model($item, array('url' => "admin/bootcamp/class/editclass/{$item->class_id}", 'class' => 'form-horizontal')) }}
		@csrf
		<div class="form-group">
		    Class Name
		    <div class="col-lg-10">
		      {{ Form::text('class_name',null,array('class'=>'form-control'))}}
		    </div>
		</div>
		<div class="form-group">
		    <div class="col-md-6 col-md-offset-6 text-right">
		      <button type="submit" class="btn btn-lg btn-info">Update item</button>
		    </div>
		</div>
		{{ Form::close()}}
      </div>
    </div>
    
  </div>
@endsection