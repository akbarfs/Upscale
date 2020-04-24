@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            
        <div class="col-md-12">

                <div class="card">
                <div class="card-header">
                <div class="nav nav-pills pull-right">
                      <a href="{{route('bootcamp.create')}}" class="btn btn-primary">Add Event</a>
                    </div>
                </div>
                    <div class="card-body">
                    
                    
                        <table id="t_event" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 100px">Created Date</th>
                                    <th>Title</th>
                                    <th>Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        
                
        

    </div>
</div>

<div class="modal fade" id="modal-preview">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Detail</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                    <div class="modal-body">
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Title</strong>
                        <input type="label" disabled style="background: #fff; border: none;" id="event_title" name="event_title" class="form-control">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Fee</strong>
                        <input type="label" disabled style="background: #fff; border: none;" id="pfee" name="event_title" class="form-control">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp class</strong>
                        <input type="label" disabled style="background: #fff; border: none;" id="pdesc" name="event_title" class="form-control">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Class Description</strong>
                        <p id="pdesc"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Image</strong><br>
                        <img style="display: none;" id="blah" src="">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-8">
                      <strong>Software Requirement</strong>
                        <p id="psoftware"></p>
                      </div>
                      <div class="form-group col-md-4">
                        
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                      <strong>Bootcamp Fasilitas</strong>
                        <p id="pfasilitas"></p>
                      </div>
                      <div class="form-group col-md-6">
                        
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Date</strong><br>
                        Start : <p id="pstart"></p>
                        End : <p id="pend"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Location</strong>
                        <p id="plocation"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Mentor</strong>
                        <p id="pmentor"></p>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        <strong>Bootcamp Soal</strong>
                        <p id="psoal"></p>
                      </div>
                    </div>
                    </div>
                </form>
              </div>
            </div>
</div>

<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script type="text/javascript">
$(document).ready(function(){
    bootcamp_table;

});

function reload(){
    bootcamp_table.ajax.reload();

}

var bootcamp_table = $('#t_event').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('bootcamp.all')}}",
            type:"GET"
        },
        className:"dt-center",target: "event_id",
        columns:[
        {data:"event_id",defaultColumn:"-"},
        {data:"created_date",defaultColumn:"-",visible:true},
        {data:"event_title",defaultColumn:"-",visible:true},
        {data:"event_fee",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",visible:true},

        ]
    });

    $(document).on('click','a[href="#detail-bootcamp"]',function(e){
                    var det = $(this).data('detail');
                    $.ajax({
                        url:'/admin/bootcamp/detail/'+det,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#event_title').val(data.event_title);
                            $('#pfee').val(data.event_fee);
                            $('#pclass').val(data.event_class);
                            $('#pdesc').val(data.event_desclass);
                            $('#blah').val(data.event_image);
                            // $('#psoftware').val(data.id);
                            // $('#pfasilitas').val(data.id);
                            $('#pstart').val(data.event_date);
                            $('#pend').val(data.event_enddate);
                            $('#plocation').val(data.event_location);
                            // $('#pmentor').val(data.id);
                            // $('#psoal').val(data.id);
                        }
                    });
              });

    $(document).on('click', '.deleteBootcamp', function(){
        var id = $(this).attr('id');
        swal({
              title: 'Delete',
              text: 'Are you sure to delete this data?',
              type: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Delete',
              cancelButtonText: 'Cancel'
            }).then((result) => 
            {
                if (result.value) 
                {

                    $.ajax({
                        url:"{{ route('bootcamp.delete')}}",
                        method: "get",
                        data :{id:id},
                        success:function(response)
                        {
                            if(response == 'deleted'){
                            swal('Success','Data deleted','success');
                             }
                             reload();
                        }
                    });
                       
                }
                
            });
    });

</script>
@endpush

@endsection