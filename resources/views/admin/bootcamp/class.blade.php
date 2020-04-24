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
        <p class="lead"><a href="#newModal" class="btn btn-default pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new menu item</a> <a href="#newMateri" class="btn btn-default pull-right" data-toggle="modal"><span class="glyphicon glyphicon-plus-sign"></span> new materi item</a>Menu:</p>
        <div class="dd" id="nestable">
        <meta name="csrf-token" content="{{ csrf_token() }}">
          {!! $menu !!}
        </div>

        <p id="success-indicator" style="display:none; margin-right: 10px;">
          <span class="glyphicon glyphicon-ok"></span> Menu order has been saved
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="well">
        <p>Drag items to move them in a different order</p>
      </div>
    </div>
  </div>

  <!-- Delete item Modal -->
  <div class="modal fade" id="classDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
          {{ Form::open(array('url'=>'admin/bootcamp/class/delete')) }}
          @csrf
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Provide details of the new menu item</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this menu item?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="hidden" name="delete_id" id="postvalue" value="" />
            <input type="submit" class="btn btn-danger" value="Delete Item" />
          </div>
          {{ Form::close() }}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div>

  <!-- Create new item Modal -->
   <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
        {{ Form::open(array('url'=>'admin/bootcamp/class/new','class'=>'form-horizontal','role'=>'form'))}}
          <div class="modal-header">
            <h4 class="modal-title">New item</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                Class Name
                  {{ Form::text('class_name',null,array('class'=>'form-control'))}}
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-primary">Create</button>
         </div>
         {{ Form::close()}}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   <div class="modal fade" id="newMateri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
        {{ Form::open(array('url'=>'admin/bootcamp/class/newmateri','class'=>'form-horizontal','role'=>'form'))}}
          <div class="modal-header">
            <h4 class="modal-title">Add Materi</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                Materi Name
                
                  {{ Form::text('class_name',null,array('class'=>'form-control'))}}
                  <br>Class Name
                  <select name="class_parent_id" class="form-control">
                    @foreach ($class as $class)
                      <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                    @endforeach
                  </select>
                
            </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
           <button type="submit" class="btn btn-primary">Create</button>
         </div>
         {{ Form::close()}}
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

   

@push('scripts')
<script type="text/javascript" src="public/nestable/assets/js/jquery.nestable.js"></script>
<script type="text/javascript">

$(function() {
$('.delete_toggle').each(function(index,elem) {
      $(elem).click(function(e){
        e.preventDefault();
        $('#postvalue').attr('value',$(elem).attr('rel'));
        $('#classDel').modal('toggle');
      });
  });
});
</script>
@endpush
@endsection