@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Jobs</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Jobs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                            <span>Filter :</span>
                            <select id="job-type" class="form-control">
                                <option selected="" disabled="">Type Time</option>
                                <option value="">All</option>
                                <option value="fulltime">Fulltime</option>
                                <option value="internship">Internship</option>
                                <option value="parttime">Parttime</option>
                            </select>
                            <select id="position" class="form-control">
                                <option selected="" disabled="">Position</option>
                                <option value="">All</option>
                                @foreach($jobs as $job)
                                <option>{{$job->jobs_title}}</option>
                                @endforeach
                            </select>
                            <select id="location" class="form-control">
                                <option selected="" disabled="">Location</option>
                                <option value="">All</option>
                                @foreach($locations as $location)
                                <option>{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col">
                            <span>Add jobs :</span>
                            <a href="{{route('jobs.create')}}" class="btn btn-primary "><i class="fa fa-plus"> Add</i></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <span>Delete selected :</span>
                            <button style="margin-left: 3px;" id="delete" name="delete" class="btn btn-danger " type="button"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </div>
                </div>
                    
            </div>

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active">
                                <table id="all-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Position</th>
                                            <th>Type</th>
                                            <th>Location</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($all as $a)
                                        <tr>
                                            <td><center><input type="checkbox" name="a_checkbox[]" class="checkbox" value="{{$a->jobs_id}}"/></center></td>
                                            <td>{{$a->jobs_title}}</td>
                                            <td>{{$a->jobs_type_time}}</td>
                                            <td>{{$a->location_name}}</td>
                                            <td>{{$a->categories_name}}</td>
                                            <td>
                                            @if($a->jobs_active==='Y')
                                            <center><span class="badge badge-success">Active</span></center>
                                            @else
                                            <center><span class="badge badge-danger">Not active</span></center>
                                            @endif
                                            </td>
                                            <td>{{\Carbon\Carbon::parse($a->jobs_created_date)->format('d M Y')}}</td>
                                            <td>
                                            <center><a href="{{route('edit.job',$a->jobs_id)}}" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a></center>
                                            </td>                                    
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modal-campaign" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="judul-panjang">Jobs Media & Campaigns</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body media-modal">
            </div>
            <input type="hidden" name="jobs_id">
            <div class="modal-footer">
                <button type="button" id='tutup-modal-campaign' class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
    </div>


<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script type="text/javascript">


$(document).ready(function(){
    all_table;

});

function reload(){
    all_table.ajax.reload();


}

var all_table = $('#all-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        // ajax:{
        //     url:"{{route('jobs.all')}}",
        //     type:"GET"
        // },
        // columns:[
        // {data:"checkbox",orderable:false,searchable:false},
        // {data:"jobs_title",defaultColumn:"-",visible:true},
        // {data:"jobs_type_time",defaultColumn:"-",visible:true},
        // {data:"location_name",defaultColumn:"-",visible:true},
        // {data:"category_name",defaultColumn:"-",visible:true},
        // {data:"status",defaultColumn:"-",visible:true},
        // {data:"jobs_created_date",defaultColumn:"-",visible:true},
        // {data:"action",orderable:false,searchable:false},
        // ]
});

$(document).ready(function() {
   var table =  $('#all-table').DataTable();

    
 $('#job-type').on('change', function () {
    var type = $('#job-type').val()
    if(type == 'all')
    {
    reload();
    }

    table.columns(2).search( this.value ).draw();
});

$('#position').on('change', function () {
    var type = $('#position').val()
    if(type == 'all')
    {
    reload();
    }

    table.columns(1).search( this.value ).draw();
});

$('#location').on('change', function () {
    var type = $('#location').val()
    if(type == 'all')
    {
    reload();
    }

    table.columns(3).search( this.value ).draw();
});

});



$(document).on('click', '#delete', function(){
    var id = [];
    swal({
          title: 'Delete',
          text: 'If you delete this jobs, applied data will deleted. Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel'
        }).then((result) => 
        {
            if (result.value) 
            {

                $('.checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('jobsAll.delete')}}",
                            method: "get",
                            data :{id:id},
                            success:function(response)
                            {
                                if(response == 'deleted'){
                                swal('Success','Data deleted','success');
                                 }
                                 else{
                                    swal('Error', 'Data is being used', 'error');
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});






</script>
@endpush

@endsection