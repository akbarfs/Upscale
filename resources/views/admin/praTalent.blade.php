@extends('admin.layout.apps')
@section('content')
<style>
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance:unset !important;
    }
    .nav-link {
        padding : 4px 14px !important;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <h3>Pra Talent <small class="text-muted" style="text-transform: capitalize;"></small></h3>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Pra Talent</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@if ($message = Session::get('Success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('Gagal'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif

<!-- <div class="content mt-3">
    <div class="">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <div class="col">
                            
                            <select id="job-type" class="form-control">
                                <option id='job-type-default' selected disabled="">Template</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="jobs">Jobs</option>
                               
                            </select>
                            <form id="import_file" action="{{route('pratalent.import')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="file" name="file" class="form-control form-control-sm">
                            <button class="btn btn-primary " type="submit">Input New Data</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            
            <div class="col-md-12">
                <div id="alls" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong>                           
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#quarantine" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Quarantine</strong>
                                <span class="badge badge-primary">0</span>
                            </a>
                          </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade show active row">
                                <div class="action-table">
                                    <div class="col-md-12 form-inline">
                                        <div class="form-group">
                                            <div class="col">
                                                <select id="pic" class="form-control-sm">
                                                    <option id="" selected disabled>PIC</option>
                                                    <option value="dian">Dian</option>
                                                    <option value="kikim">Kikim</option>
                                                    <option value="najih1">Najih1</option>
                                                    <option value="najih2">Najih2</option>
                                                    <option value="ulul1">Ulul1</option>
                                                </select>
                                                <select id="status-pic" class="form-control-sm">
                                                    <option id="" selected disabled>Status</option>
                                                    <option value="pic">PIC</option>
                                                    <option value="connect">Connect</option>
                                                    <option value="chat">Chat</option>
                                                    <option value="done">Done</option>
                                                </select>
                                                <button name="move" id="update-status" class="btn btn-info btn-sm" type="button">Update</button>
                                            </div>
                                        </div>
                                     
                                        <div class="form-group">
                                            <div class="col">
                                                <button name="move" id="kick" class="btn btn-warning btn-sm" type="button"><i class="fa fa-retweet"></i> Eliminate</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               

                                <table id="all-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Fullname</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Contact</th>
                                            <th>Organization</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>PIC & Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                            <div id="quarantine" class="tab-pane fade ">
                                <table id="all_quarantine" class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                             <th>No</th>
                                            <th>Fullname</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Contact</th>
                                            <th>Organization</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>PIC & Status</th>
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
        
        
    </div>
    
</div> -->


<div class="content mt-3">
    <div class="">
        <div class="row">
            <div class="action-table">
                <div class="col-md-12 form-inline">
                    <div class="form-group">
                        <!-- <div class="col">
                            <span data-toggle="tooltip" data-placement="top" title="Hooray!">Upload :</span>
                            <select id="job-type" class="form-control">
                                <option id='job-type-default' selected disabled="">Template</option>
                                <option value="linkedin">LinkedIn</option>
                                <option value="jobs">Jobs</option>
                               
                            </select>
                            <input type="file" name="new" class="form-control form-control-sm">
                            <button name="move" id="move" class="btn btn-primary " type="button">Input New Data</button>
                        </div> -->
                    </div>
                    <!-- <div class="form-group">
                        <div class="col">
                            <select id="status" name="status" class="form-control form-control biarpas">
                                <option value="">PIC</option>
                                <option value="Dian">Dian</option>
                                <option value="Najih1">Najih1</option>
                                <option value="Najih2">Najih2</option>
                                <option value="Ulul">Ulul</option>
                            </select>
                            <input type="file" name="new" class="form-control form-control-sm">
                            <button name="move" id="move" class="btn btn-primary " type="button">Input Connect</button>
                        </div>
                    </div> -->
                </div>
            </div>
            
            
            <div class="col-md-12">
                <div id="alls" class="card">   
                    <div class="card-header">
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active" data-toggle="tab" href="#linkedin" role="tab" aria-controls="nav-home" aria-selected="false"><strong>LinkedIn</strong>
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#alumni" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Alumni</strong>
                                <span class="badge badge-primary">0</span>
                            </a>
                            <a class="nav-item nav-link"  data-toggle="tab" href="#referral" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Referral</strong>
                                <span class="badge badge-primary">0</span>
                            </a>


                          </div>
                        </nav>
                    </div>
                    <div class="card-body">
                            <div class="tab-content">


                                <div id="linkedin" class="tab-pane fade show active row">
                                    
                                <div class="card-header">
                                    <nav>
                            <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong>                           
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#quarantine" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Quarantine</strong>
                                <span class="badge badge-primary">0</span>
                            </a>
                          </div>
                        </nav>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="all" class="tab-pane fade show active row">
                                <div class="action-tables">
                                    <div class="col-md-12 form-inline">
                                    <div class="form-group" style="margin-bottom:10px;">
                                         <div class="col">
                                            <form id="import_file" action="{{route('pratalent.import')}}" method="post" enctype="multipart/form-data">
                                             {{csrf_field()}}
                                            <input type="file" name="file" class="form-control form-control-sm">
                                            <button class="btn btn-primary " type="submit">Input New Data</button>
                                            </form>
                                         </div>
                                       
                                       </div>
                                    </div>
                                </div>
                               

                                <table id="all-table" class="table table-striped table-bordered" style="width:97%; margin:auto;" >
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Fullname</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Contact</th>
                                            <th>Organization</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>PIC & Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no=1;
                                        @endphp
                                        @foreach($pratalent as $item)
                                        <tr>
                                            <td>
                                            <center><input type="checkbox" name="pratalent_checkbox[]" class="checkbox" value="{{$item->pt_id}}"></center>
                                            </td>
                                            <td>
                                            <a href="{{$item->pt_profile_url}}" style="color:blue; text-decoration:underline">{{$item->pt_fullname}}</a>
                                            </td>
                                            <td>{{$item->pt_title}}</td>
                                            <td>{{$item->pt_location}}</td>
                                            <td>{{$item->pt_phone1}}</td>
                                            <td>{{$item->pt_organization1}}</td>
                                            <td>{{$item->pt_education}}</td>
                                            <td>{{$item->pt_skill}}</td>
                                            <td>
                                            @php 
                                            if($item->pt_status=='chat')
                                            $color="warning";
                                            elseif($item->pt_status=='connect')
                                            $color="info";
                                            elseif($item->pt_status=='done')
                                            $color="success";
                                            else
                                            $color="secondary"
                                            @endphp
                                            <center>
                                            <a href="#status" data-id="{{$item->pt_id}}" data-status="{{$item->pt_status}}" data-toggle="modal" data-target="#modal-status-pratalent" type="button" class="btn btn-light btn-xs change-status-pratalent"><span class="badge badge-info">{{$item->pt_pic}}</span><br><span class="badge badge-{{$color}}">{{$item->pt_status}}</span></a><br><span>{{$item->pt_note}}</span>
                                            </center>
                                            </td>
                                            <td>
                                            <a href="" type="button" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                   
                                </table>
                                <div class="row" style="margin-left:500px;"> 
                                            <ul class="pagination">
                                            {{ $pratalent->render() }} 
                                            </ul> 
                                    </div>
                            </div>

                            <div id="quarantine" class="tab-pane fade ">
                                <table id="all_quarantine" class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Fullname</th>
                                            <th>Title</th>
                                            <th>Location</th>
                                            <th>Contact</th>
                                            <th>Organization</th>
                                            <th>Education</th>
                                            <th>Skills</th>
                                            <th>PIC & Status</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                                </div>

                              
                                <div id="alumni" class="tab-pane fade ">
                                    
                                    <table id="data-alumni" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Fullname</th>
                                                <th>Title</th>
                                                <th>Location</th>
                                                <th>Contact</th>
                                                <th>Organization</th>
                                                <th>Education</th>
                                                <th>Skills</th>
                                                <th>PIC & Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <div id="referral" class="tab-pane fade">
                                    

                                    <table id="data-referral" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Fullname</th>
                                                <th>Title</th>
                                                <th>Location</th>
                                                <th>Contact</th>
                                                <th>Organization</th>
                                                <th>Education</th>
                                                <th>Skills</th>
                                                <th>PIC & Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                            </div>

                        </div>
                    </div>

            </div>
        </div>
       

    </div>
   
</div>

<div class="modal fade" id="modal-status-pratalent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Status Pra-Talent</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('pratalent.changestatus')}}" method="post" accept-charset="utf-8">
        {{ csrf_field() }}
            <div class="modal-body substeps-modal">
                <div class="input-group mb-3">
                <span><center><b> Select Status : </b></center> </span>
                </div>
                <input type="hidden" name="pt_id" id="talent_id" value="">
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="draft"></div></div>
                    <input type="text" class="form-control" value="Draft" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="chat"></div></div>
                    <input type="text" class="form-control" value="Chat" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="connect"></div></div>
                    <input type="text" class="form-control" value="Connect" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="status" value="done"></div></div>
                    <input type="text" class="form-control" value="DONE" readonly="">
                </div>
                <hr>
                <div class="input-group mb-3">
                <span><center><b> Select PIC : </b></center> </span>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="pic" value="Dian"></div></div>
                    <input type="text" class="form-control" value="Dian" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="pic" value="Ulul"></div></div>
                    <input type="text" class="form-control" value="Ulul" readonly="">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend "><div class="input-group-text "><input type="radio" name="pic" value="Najih"></div></div>
                    <input type="text" class="form-control" value="Najih" readonly="">
                </div>
                <hr>
                <div class="input-group">
                    <div class="input-group-prepend "><div class="input-group-text ">Note</div></div>
                    <input type="text" class="form-control" name="note">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id='submit-status1' class="btn btn-success" data-dismiss="">Submit</button>
            </div>
        </form>
      </div>
    </div>

</div>

@push('script')




<script type="text/javascript">

$(document).on('click', '.change-status-pratalent', function() {
    var id   = $(this).data('id');
    $('.modal-body #talent_id').val(id);
});

// $(document).ready(function() {
//    var all_table=$('#all-table').DataTable({

//     });
// });

// function reload(){
//     all_table.ajax.reload();
// }

    // var all_table = $('#all-table').DataTable({
        // autoWidth:true,
        // serverSide:true,
        // filter:true,
        // info:false,
        // paging:true,
        // processing:true,
        // ajax:{
        //     url:"{{route('pratalent.datalinkedin')}}",
        //     type:"GET"
        //     },
        // columns:[
        //     {data:"pt_id", visible:true},
        //     {data:"pt_fullname", defaultColumn:"-",visible:true},
        //     {data:"pt_title",  defaultColumn:"-",visible:true},
        //     {data:"pt_location_id", defaultColumn:"-",visible:true},
        //     {data:"pt_phone1", defaultColumn:"-",visible:true},
        //     {data:"pt_organization1", defaultColumn:"-",visible:true},
        //     {data:"pt_education", defaultColumn:"-",visible:true},
        //     {data:"pt_skill", defaultColumn:"-",visible:true},
        //     {data:"pt_status", defaultColumn:"-",visible:true},
        //     {data:"action", orderable:false,searchable:false},
        //     ]
    // });


                                           
</script>

@endpush

@endsection
