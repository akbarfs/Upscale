@extends('admin.layout.apps')

@section('content')
<style>
    .notActive{
        color: #3276b1;
        background-color: #fff !important;
    }
    .bootstrap-datetimepicker-widget { display: block !important; }
    .datepicker,
    .table-condensed {
    }
    .btn-xs {
        padding: 0.1rem 0.25rem;
        font-size: 0.875rem;
        line-height: 1.3;
        border-radius: 0.2rem !important;
        -webkit-appearance:unset;
    }
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Others</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Manage jobs</a></li>
                    <li class="active">Others</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3">Locations</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="add_loc" name="add_loc" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#locationsAdd"><i class="fa fa-plus" ></i> Add</button>
                            </div>
                            <table id="loc-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Location Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div>
           <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3">Categories</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="add_cat" name="add_cat" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#categoriesAdd"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            <table id="cat-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div>  
        </div>
        <div class="row">
            <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3">Campaigns</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="add_cam" name="add_cam" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#campaignAdd"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            <table id="cam-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Capaign Start - End</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div>  
            <div class="col-md-6">
                <aside class="profile-nav alt">
                    
                    <section class="card">
                        <div class="card-header">
                                <strong class="card-title mb-3">Recruitment Media</strong>
                        </div>
                        <div class="card-body">
                            <div class="action-table">
                                <button style="margin-left: 3px;" id="add_cam" name="add_med" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#mediaAdd"><i class="fa fa-plus"></i> Add</button>
                            </div>
                            <table id="med-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>media</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </section>
                </aside>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">
                <aside class="profile-nav alt">
                    <div id="alls" class="card">   
                        <div class="card-header">

                            <nav>
                            <strong>Sub Steps</strong>
                              <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                
                                <a class="nav-item nav-link  active" data-toggle="tab" href="#unprocess" role="tab" aria-controls="nav-home" aria-selected="true"><strong>Unprocess</strong> 
    {{--                                 <span class="badge badge-primary">{{$countU}}</span>
     --}}                            </a>
                                <a class="nav-item nav-link"  data-toggle="tab" href="#testonline" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Test Online</strong> 
        {{--                                 <span class="badge badge-primary">{{$countI}}</span>
         --}}                        </a>
                                <a class="nav-item nav-link"  data-toggle="tab" href="#interview" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Interview</strong> 
    {{--                                 <span class="badge badge-primary">{{$countI}}</span>
     --}}                            </a>
                                <a class="nav-item nav-link"  data-toggle="tab" href="#offered" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Offered</strong> 
        {{--                                 <span class="badge badge-primary">{{$countI}}</span>
         --}}                            </a>
                                <a class="nav-item nav-link"  data-toggle="tab" href="#hired" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Hired</strong> 
    {{--                                 <span class="badge badge-primary">{{$countH}}</span>
     --}}                            </a>
                                <a class="nav-item nav-link" data-toggle="tab" href="#reject" role="tab" aria-controls="nav-contact" aria-selected="false"><strong>Rejected</strong> 
    {{--                                 <span class="badge badge-primary">{{$countR}}</span>
     --}}                            </a>
    
                              </div>
                            </nav>
                        </div>
                        <div class="card-body">
                                <button style="margin: 0 6px 6px 6px;" id="add_substeps" name="add_substeps" class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#substepsAdd"><i class="fa fa-plus" ></i> Add</button>
                                <div class="tab-content">
                                    
                                    <div id="unprocess" class="tab-pane fade show active">
                                        <table id="all_unprocess" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Move</th>
                                                    <th>Substeps Name</th>
                                                    <th>Substeps Order</th>
                                                    <th>Substeps Jobs Apply Status</th>
                                                    <th>Send Email Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div id="offered" class="tab-pane fade">
                                            <table id="all_offered" class="table table-striped table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Move</th>
                                                        <th>Substeps Name</th>
                                                        <th>Substeps Order</th>
                                                        <th>Substeps Jobs Apply Status</th>
                                                        <th>Send Email Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    <div id="interview" class="tab-pane fade">
                                        <table id="all_interview" class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Move</th>
                                                    <th>Substeps Name</th>
                                                    <th>Substeps Order</th>
                                                    <th>Substeps Jobs Apply Status</th>
                                                    <th>Send Email Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div id="testonline" class="tab-pane fade">
                                        <table id="all_testonline" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Move</th>
                                                    <th>Substeps Name</th>
                                                    <th>Substeps Order</th>
                                                    <th>Substeps Jobs Apply Status</th>
                                                    <th>Send Email Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div id="hired" class="tab-pane fade ">
                                        <table id="all_hired" class="table table-striped table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Move</th>
                                                    <th>Substeps Name</th>
                                                    <th>Substeps Order</th>
                                                    <th>Substeps Jobs Apply Status</th>
                                                    <th>Send Email Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
    
                                    <div id="reject" class="tab-pane fade ">
                                        <table id="all_reject" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Move</th>
                                                    <th>Substeps Name</th>
                                                    <th>Substeps Order</th>
                                                    <th>Substeps Jobs Apply Status</th>
                                                    <th>Send Email Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </aside>
            </div>      
        </div>
    </div>
</div>
<div class="modal fade" id="mediaEdit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Recruitment Media</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Recruitment Media Name</label>
                <input type="text" id="edit-media-name" name="media-name" class="form-control" placeholder="Input Recruitment Media Name" required="">
                <input type="hidden" id="edit-media-id" name="edit-media-id">
            </div>
            <div class="form-group">
                <label class="control-label ">Recruitment Media Status</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs active edit-media-status" data-toggle="edit-media-status" data-title="active">Active</a>
                    <a class="btn btn-primary btn-xs notActive edit-media-status" data-toggle="edit-media-status" data-title="not-active">Not Active</a>
                    <input type="hidden" id="edit-media-status" value='active'name="edit-media-status">
                </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="editMedia" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="mediaAdd">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Recruitment Media</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Recruitment Media Name</label>
                <input type="text" id="media-name" name="media-name" class="form-control" placeholder="Input Recruitment Media Name" required="">
            </div>
            <div class="form-group">
                <label class="control-label ">Recruitment Media Status</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs active media-status" data-toggle="media-status" data-title="active">Active</a>
                    <a class="btn btn-primary btn-xs notActive media-status" data-toggle="media-status" data-title="not-active">Not Active</a>
                    <input type="hidden" id="media-status" value='active'name="media-status">
                </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="addMedia" type="button" class="btn btn-success" data-dismis="modal">Add</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="mediaAdd">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Recruitment Media</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Recruitment Media Name</label>
                <input type="text" id="media-name" name="media-name" class="form-control" placeholder="Input Recruitment Media Name" required="">
            </div>
            <div class="form-group">
                <label class="control-label ">Recruitment Media Status</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs active media-status" data-toggle="media-status" data-title="active">Active</a>
                    <a class="btn btn-primary btn-xs notActive media-status" data-toggle="media-status" data-title="not-active">Not Active</a>
                    <input type="hidden" id="media-status" value='active'name="media-status">
                </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="addMedia" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
        </div>
      </div>
    </div>
  </div>

<!-- The Modal -->
<div class="modal fade" id="campaignEdit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Campaign</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Campaign Name</label>
                <input type="text" id="edit-campaign-name" name="edit-campaign-name" class="form-control" placeholder="Input Campaign Name" required="">
                <input type="hidden" id="edit-campaign-id" name="edit-campaign-id">
            </div>
            <div class="form-group">
                <label class="control-label ">Campaign Status</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs edit-campaign-status" data-toggle="edit-campaign-status" data-title="active">Active</a>
                    <a class="btn btn-primary btn-xs edit-campaign-status" data-toggle="edit-campaign-status" data-title="not-active">Not Active</a>
                    <input type="hidden" id="edit-campaign-status" value='active'name="edit-campaign-status">
                </div>
                <br><br>
                <label class="control-label ">Campaign Start Date</label><br>
                <div class="input-group date" id="edit-campaign-start-date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#edit-campaign-start-date"/>
                    <div class="input-group-append" data-target="#edit-campaign-start-date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <br>
                <label class="control-label ">Campaign End Date</label><br>
                <div class="input-group date" id="edit-campaign-end-date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#edit-campaign-end-date"/>
                    <div class="input-group-append" data-target="#edit-campaign-end-date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="editCampaign" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
        </div>
      </div>
    </div>
  </div>

<!-- The Modal -->
<div class="modal fade" id="campaignAdd">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add Campaign</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="control-label ">Campaign Name</label>
                    <input type="text" id="campaign-name" name="campaign-name" class="form-control" placeholder="Input Campaign Name" required="">
                </div>
                <div class="form-group">
                    <label class="control-label ">Campaign Status</label><br>
                    <div class="btn-group" id="radioBtn" >
                        <a class="btn btn-primary btn-xs active" data-toggle="campaign-status" data-title="active">Active</a>
                        <a class="btn btn-primary btn-xs notActive" data-toggle="campaign-status" data-title="not-active">Not Active</a>
                        <input type="hidden" id="campaign-status" value='active'name="campaign-status">
                    </div>
                    <br><br>
                    <label class="control-label ">Campaign Start Date</label><br>
                    <div class="input-group date" id="campaign-start-date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#campaign-start-date"/>
                        <div class="input-group-append" data-target="#campaign-start-date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <br>
                    <label class="control-label ">Campaign End Date</label><br>
                    <div class="input-group date" id="campaign-end-date" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#campaign-end-date"/>
                        <div class="input-group-append" data-target="#campaign-end-date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitCampaign" type="button" class="btn btn-success" data-dismis="modal">Add</button>
            </div>
          </div>
        </div>
      </div>
    

<!-- The Modal -->
<div class="modal fade" id="substepsAdd">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Substeps</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Substeps Name</label>
                <input type="text" id="substeps_name" name="substeps_name" class="form-control" placeholder="Input Substeps Name" required="">
            </div>
            <div class="form-group">
                <label class="control-label ">Jobs Apply Status</label>
                <select name="substeps_jobs_apply_status" id="substeps_jobs_apply_status" class="form-control">
                    <option selected value="false" disabled>-- Jobs Apply Status --</option>
                    <option value="unprocess">Unprocess</option>
                    <option value="testonline">Testonline</option>
                    <option value="interview">Interview</option>
                    <option value="offered">Offered</option>
                    <option value="hired">Hired</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label ">Send Notification Email</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs notActive substeps-email-status" data-toggle="substeps-email-status" data-title="yes">Yes</a>
                    <a class="btn btn-primary btn-xs active substeps-email-status" data-toggle="substeps-email-status" data-title="no">No</a>
                    <input type="hidden" id="substeps-email-status" value='no'name="substeps-email-status">
                </div>
          </div>
          <div class="form-group email-text" style="display:none;">
            <label class="form-control-label">Email Text</label>
            <textarea class="form-control" id="substeps-email-text" name="substeps-email-text" id="substeps-email-text"></textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>

        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="submitSubsteps" type="button" class="btn btn-success" data-dismis="modal">Add</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="substepsEdit">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Substeps</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
         <!-- Modal body -->
        <div class="modal-body">
 
           
            <input type="hidden" name="substeps_id" value="">
            <div class="form-group">
                <label class="control-label ">Substeps Name</label>
                <input type="text" id="edit_substeps_name" name="edit_substeps_name" class="form-control" placeholder="Input Substeps Name" required="">
                <input type="hidden" id="edit_substeps_id">
            </div>
            <div class="form-group">
                <label class="control-label ">Jobs Apply Status</label>
                <select name="edit_substeps_jobs_apply_status" id="edit_substeps_jobs_apply_status" class="form-control">
                    
                    <option value="unprocess">Unprocess</option>
                    <option value="testonline">Testonline</option>
                    <option value="interview">Interview</option>
                    <option value="offered">Offered</option>
                    <option value="hired">Hired</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label ">Send Notification Email</label><br>
                <div class="btn-group" id="radioBtn" >
                    <a class="btn btn-primary btn-xs edit-substeps-email-status" data-toggle="edit-substeps-email-status" data-title="yes">Yes</a>
                    <a class="btn btn-primary btn-xs edit-substeps-email-status" data-toggle="edit-substeps-email-status" data-title="no">No</a>
                    <input type="hidden" id="edit-substeps-email-status" name="edit-substeps-email-status">
                </div>
          </div>
          <div class="form-group edit-mail-text" style="display:none;">
            <label class="form-control-label">Email Text</label>
            <textarea class="form-control" id="edit-substeps-email-text" name="edit-substeps-email-text" id="edit-substeps-email-text"></textarea>{{-- <small class="form-text text-muted">This is a help text</small> --}}</div>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
            <button id="submit-edit-substeps" type="button" class="btn btn-success" data-dismis="modal"> Edit</button>
        </div>
      </div>
    </div>
  </div>

<!-- The Modal -->
  <div class="modal fade" id="locationsAdd">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Location</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="locationsForm" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Input location name" required="">
            </div>
            <div class="form-group">
                <label class="control-label ">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Y">Active</option>
                    <option value="N">Inactive</option>
                </select>
          </div>
      </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="submitLocation" type="button" class="btn btn-success" data-dismis="modal">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="locationsEdit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Location</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="locationsForm" class="form-horizontal" role="form">
            {{csrf_field()}}
            <input type="hidden" name="idLoc" id="idLoc" value="">
            <div class="form-group">
                <label class="control-label ">Name</label>
                    <input type="text" id="nameLoc" value="" class="form-control" placeholder="Input location name" required="">
            </div>
            <div class="form-group">
                <label class="control-label ">Status</label>
                  <select name="status" id="statusLoc" class="form-control">
                      <option value="Y">Active</option>
                      <option value="N">Inactive</option>
                  </select>
          </div>
      </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="editLoc" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="categoriesAdd">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="categoriesForm" class="form-horizontal" role="form">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label ">Name</label>
                    <input type="text" id="categories" name="categories" class="form-control" placeholder="Input category name" required="">
            </div>
      </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="submitCategories" type="button" class="btn btn-success" data-dismis="modal">Add</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="categoriesEdit">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form id="categoriesForm" class="form-horizontal" role="form">
            {{csrf_field()}}
            <input type="hidden" id="idCat" name="idCat" value="">
            <div class="form-group">
                <label class="control-label ">Name</label>
                    <input type="text" id="nameCat" name="nameCat" value="" class="form-control" placeholder="Input category name" required="">
            </div>
      </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button id="editCat" type="button" class="btn btn-success" data-dismis="modal">Edit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



@push('script')
<script type="text/javascript">

var all_unprocessFirstTime = true;
var all_interviewFirstTime = true;
var all_reportFirstTime = true;
var all_hiredFirstTime = true;
var all_rejectFirstTime = true;
var all_tableFirstTime = true;
var all_offeredFirstTime = true;
var all_tableFirstTime = true;
var all_testonlineFirstTime = true;

var all_unprocess;
var all_interview;
var all_report;
var all_hired;
var all_reject;
var all_table;
var all_offered;
var tab_active = "all_unprocess";

function refreshDatatable(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
}

    $("#campaign-start-date").on("change.datetimepicker", function (e) {
        $('#campaign-end-date').datetimepicker('minDate', e.date);
    });
    $("#campaign-end-date").on("change.datetimepicker", function (e) {
        $('#campaign-start-date').datetimepicker('maxDate', e.date);
    });

    $("#edit-campaign-start-date").on("change.datetimepicker", function (e) {
        $('#edit-campaign-end-date').datetimepicker('minDate', e.date);
    });
    $("#edit-campaign-end-date").on("change.datetimepicker", function (e) {
        $('#edit-campaign-start-date').datetimepicker('maxDate', e.date);
    });

$(document).ready(function(){
    $('#campaign-start-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#edit-campaign-start-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#campaign-end-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    $('#edit-campaign-end-date').datetimepicker({
        format : "dddd, MMMM Do YYYY",
        locale : 'id'
    });
    all_unprocessFirstTime = false;
    tab_active = "all_unprocess";
    all_unprocess = $('#all_unprocess').DataTable({
        autoWidth:true,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('get.unprocess')}}",
            type:"GET"
        },
        columns:[
            {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
        ]
    });
    CKEDITOR.replace('substeps-email-text',{
        language:'en-gb'
    });
    CKEDITOR.replace('edit-substeps-email-text',{
        language:'en-gb'
    });
    
});

$(document).on('click', 'a[href="#unprocess"]', function(e){
    tab_active = "all_unprocess";
    if(all_unprocessFirstTime){
        all_unprocess = $('#all_unprocess').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.unprocess')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_unprocessFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', 'a[href="#hired"]', function(e){
    tab_active = "all_hired";
    if(all_hiredFirstTime){
        all_hired = $('#all_hired').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.hired')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_hiredFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', 'a[href="#offered"]', function(e){
    tab_active = "all_offered";
    if(all_offeredFirstTime){
        all_offered = $('#all_offered').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.offered')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_offeredFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', 'a[href="#interview"]', function(e){
    tab_active = "all_interview";
    if(all_interviewFirstTime){
        all_unprocess = $('#all_interview').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.interview')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_interviewFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', 'a[href="#reject"]', function(e){
    tab_active = "all_reject";
    if(all_rejectFirstTime){
        all_reject = $('#all_reject').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.reject')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_rejectFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', 'a[href="#testonline"]', function(e){
    tab_active = "all_testonline";
    if(all_testonlineFirstTime){
        all_testonline = $('#all_testonline').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            ajax:{
                url:"{{route('get.testonline')}}",
                type:"GET"
            },
            columns:[
                {data:"move",orderable:false,searchable:false},
            {data:"substeps_name",orderable:false,searchable:false},
            {data:"substeps_order",orderable:false,searchable:false},
            {data:"substeps_jobs_apply_status",orderable:false,searchable:false},
            {data:"substeps_email_status",orderable:false,searchable:false},
            {data:"action",orderable:false,searchable:false},
            ]
        });
        all_testonlineFirstTime = false;
    } else {
    refreshDatatable();
    }
    
});

$(document).on('click', '#submitSubsteps', function(e){
    var isempty = [];
    var substeps_name = $('#substeps_name').val();
    var substeps_jobs_apply_status = $('#substeps_jobs_apply_status').val();
    var substeps_email_status = $('#substeps-email-status').val();
    var substeps_email_text = null;
    if(substeps_email_status == 'yes') substeps_email_text = CKEDITOR.instances['substeps-email-text'].getData();
    if(substeps_email_status == 'yes' && substeps_email_text == ''){
        $('#subteps-email-text').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#subteps-email-text').removeClass('is-invalid');
        isempty.push("false");
    }
    if(substeps_name == "") {
        $('#substeps_name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#substeps_name').removeClass('is-invalid');
        isempty.push("false");
    } 
    
    if(substeps_jobs_apply_status == null){
        $('#substeps_jobs_apply_status').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#substeps_jobs_apply_status').removeClass('is-invalid');
        isempty.push("false");
    } 

    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Penilaian Substeps ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('substeps.add')}}",
                    type: 'POST',
                    data :{
                        substeps_jobs_apply_status:substeps_jobs_apply_status,
                        substeps_name:substeps_name,
                        substeps_email_status:substeps_email_status,
                        substeps_email_text:substeps_email_text
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Substeps Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan substeps gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});

$(document).on('click', '#addMedia', function(e){
    var media_name = $('#media-name').val();
    var media_status = $('#media-status').val();
    var isempty = [];
    if(media_name == "") {
        $('#media-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#media-name').removeClass('is-invalid');
        isempty.push("false");
    }
    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Recruitment Media ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('media.add')}}",
                    type: 'POST',
                    data :{
                        media_name:media_name,
                        media_status:media_status
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Recruitment Media Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan Recruitment Media gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }
});
$(document).on('click', '#editMedia', function(e){
    var media_name = $('#edit-media-name').val();
    var media_status = $('#edit-media-status').val();
    var media_id = $('#edit-media-id').val();
    var isempty = [];
    if(media_name == "") {
        $('#edit-media-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit-media-name').removeClass('is-invalid');
        isempty.push("false");
    }
    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Mengubah Data Recruitment Media?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('media.edit')}}",
                    type: 'POST',
                    data :{
                        media_id:media_id,
                        media_name:media_name,
                        media_status:media_status
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Recruitment Media Berhasil Diubah',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Pengubahan Recruitment Media gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }
});

$(document).on('click', '#submitCampaign', function(e){
    if($("#campaign-start-date").datetimepicker('date') == null||$("#campaign-end-date").datetimepicker('date') == null){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error"); return;
    }
    var isempty = [];
    var campaign_name = $('#campaign-name').val();
    var campaign_status = $('#campaign-status').val();
    var campaign_start = $("#campaign-start-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    var campaign_end = $("#campaign-end-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    if(campaign_name == "") {
        $('#campaign-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#campaign-name').removeClass('is-invalid');
        isempty.push("false");
    }


    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Campaign ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('campaign.add')}}",
                    type: 'POST',
                    data :{
                        campaign_name:campaign_name,
                        campaign_status:campaign_status,
                        campaign_start:campaign_start,
                        campaign_end:campaign_end
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Campaign Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan Campaign gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});
$(document).on('click', '#editCampaign', function(e){
    if($("#edit-campaign-start-date").datetimepicker('date') == null||$("#edit-campaign-end-date").datetimepicker('date') == null){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error"); return;
    }
    var isempty = [];
    var campaign_name = $('#edit-campaign-name').val();
    var campaign_status = $('#edit-campaign-status').val();
    var campaign_id = $('#edit-campaign-id').val();
    var campaign_start = $("#edit-campaign-start-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    var campaign_end = $("#edit-campaign-end-date").datetimepicker('date').format('DD/MM/YYYY hh.mm');
    if(campaign_name == "") {
        $('#edit-campaign-name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit-campaign-name').removeClass('is-invalid');
        isempty.push("false");
    } 

    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Data Campaign ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('campaign.edit')}}",
                    type: 'POST',
                    data :{
                        campaign_name:campaign_name,
                        campaign_id:campaign_id,    
                        campaign_status:campaign_status,
                        campaign_start:campaign_start,
                        campaign_end:campaign_end
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Campaign Berhasil Ditambahkan',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Penambahan Campaign gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});




$(document).ready(function(){
    loc_table;
    cat_table;
    cam_table;
    med_table;


    function reload(){
        loc_table.ajax.reload();
        cat_table.ajax.reload();
        cam_table.ajax.reload();
        med_table.ajax.reload();
    }

    var cam_table = $('#cam-table').DataTable({
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            ajax:{
                url:"{{route('campaign')}}",
                type:"GET"
            },
            columns:[
            {data:"campaign_name",defaultColumn:"-",visible:true},
            {data:"campaign_start_end",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
    });

    var med_table = $('#med-table').DataTable({
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            ajax:{
                url:"{{route('media.showtable')}}",
                type:"GET"
            },
            columns:[
            {data:"media_name",defaultColumn:"-",visible:true},
            {data:"media_status",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
    });
        
    var loc_table = $('#loc-table').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            ajax:{
                url:"{{route('locations')}}",
                type:"GET"
            },
            columns:[
            {data:"location_name",defaultColumn:"-",visible:true},
            {data:"status",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
    });

    $('.modal-footer').on('click', '#submitLocation', function() {
            $.ajax({
                type: 'POST',
                url: "{{route('locations.add')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#name').val(),
                    'status': $('#status').val()
                },
                success:function(response)
                {
                    if(response == 'success'){
                    swal('Success','Data added','success');
                     }
                     reload();
                }
            });
        });

        $(document).on('click', '.deleteMed', function(){
        var media_id = $(this).attr('id');
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
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('media.delete')}}",
                        method: "POST",
                        data :{media_id:media_id},
                        success:function(response)
                        {
                            if(response == 'berhasil'){
                            swal('Success','Data deleted','success');
                            reload();
                            } else {
                                swal('Error', 'Data is being used', 'error');
                            }
                            
                             
                        }
                    });
                       
                }
                
            });
        
    });
    $(document).on('click', '.deleteCam', function(){
        var campaign_id = $(this).attr('id');
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
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        url:"{{ route('campaign.delete')}}",
                        method: "POST",
                        data :{campaign_id:campaign_id},
                        success:function(response)
                        {
                            if(response == 'berhasil'){
                            swal('Success','Data deleted','success');
                            reload();
                            } else {
                                swal('Error', 'Data is being used', 'error');
                            }
                            
                             
                        }
                    });
                       
                }
                
            });
    });

    $(document).on('click', '.deleteLoc', function(){
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
                        url:"{{ route('locations.delete')}}",
                        method: "get",
                        data :{id:id},
                        success:function(response)
                        {
                            if(response == 'deleted'){
                            swal('Success','Data deleted','success');
                             reload();
                             }
                            
                             
                        },
                        error:function(response)
                        {
                          swal('Error', 'Data is being used', 'error');
                        }
                    });
                       
                }

                
                
            });
    });

    $(document).on('click', '.editLoc', function() { 
        var id = $(this).data('id');
        var name = $(this).data('name');
        var status = $(this).data('status');       
        $('.modal-body #nameLoc').val(name);
        $('.modal-body #statusLoc').val(status);
        $('.modal-body #idLoc').val(id);
        });

    $('.modal-footer').on('click', '#editLoc', function() {
        $.ajax({
            type: 'POST',
            url: "{{route('locations.edit')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#idLoc').val(),
                'name': $('#nameLoc').val(),
                'status': $('#statusLoc').val()
            },
            success:function(response)
            {
                if(response == 'success'){
                swal('Success','Data added','success');
                 }
                 reload();
            },
            error:function(response)
            {
              swal('Error', 'Data is being used', 'error');
            }
        });
    });



    var cat_table = $('#cat-table').DataTable({
            autoWidth:false,
            filter:true,
            info:false,
            paging:true,
            processing:false,
            searching: false,
            ajax:{
                url:"{{route('categories')}}",
                type:"GET"
            },
            columns:[
            {data:"categories_name",defaultColumn:"-",visible:true},
            {data:"action",orderable:false,searchable:false},
            ]
    });

    $('.modal-footer').on('click', '#submitCategories', function() {
            $.ajax({
                type: 'POST',
                url: "{{route('categories.add')}}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#categories').val(),
                },
                success:function(response)
                {

                    if(response == 'success'){
                    swal('Success','Data added','success');
                     }
                     reload();
                }
            });
        });

    $(document).on('click', '.deleteCat', function(){
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
                        url:"{{ route('categories.delete')}}",
                        method: "get",
                        data :{id:id},
                        success:function(response)
                        {
                            if(response == 'deleted'){
                            swal('Success','Data deleted','success');
                             reload();
                           }
                        },
                        error:function(response)
                        {
                          swal('Error', 'Data is being used', 'error');
                        }
                      
                       
                });
                
            };
        });
      });

    $(document).on('click', '.editCat', function() { 
        var id = $(this).data('id');
        var name = $(this).data('name');      
        $('.modal-body #nameCat').val(name);
        $('.modal-body #idCat').val(id);
        });

    $('.modal-footer').on('click', '#editCat', function() {
        $.ajax({
            type: 'POST',
            url: "{{route('categories.edit')}}",
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('#idCat').val(),
                'name': $('#nameCat').val()
            },
            success:function(response)
            {
                if(response == 'success'){
                swal('Success','Data added','success');
                 }
                 reload();
            }
        });
    });

});

$(document).on('click', '#edit-substeps', function(){
    var id = $(this).data('name');
    var data = id.split("|");
    var send_email = $(this).data('email');
    $("#edit_substeps_name").val(data[0]);
    $("#edit_substeps_id").val( $(this).data('id'));
    $("#edit_substeps_jobs_apply_status").prepend("<option disabled selected>" + data[2] + "</option>");

    $('.edit-substeps-email-status').each(function(){
        $(this).removeClass('active');
        $(this).removeClass('notActive');
        if($(this).data('title') == send_email){
            $(this).addClass('active');
        } else {
            $(this).addClass('notActive');
        }
    });

    $("#edit-substeps-email-status").val(send_email);
    
    if(send_email == 'yes'){
        $.ajax({
            type: 'POST',
            headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
            url: "{{route('substeps.getemailtext')}}",
            dataType: 'json',
            data: {
                substeps_id:$(this).data('id'),
            },
            success:function(response)
            {
                if(response != false){
                    response.forEach(function (d) {
                        CKEDITOR.instances['edit-substeps-email-text'].setData(d.substeps_email_text);
                        $('.edit-mail-text').attr('style','');

                });
                }
            }
        });
    }
});


$(document).on('click', '.editCam', function(){
    var id = $(this).data('name');
    var status = $(this).data('status');
    var data = id.split("|");
    var start = moment($(this).data('campaign-start'), 'YYYY-MM-DD, h:m:s');
    var end = moment($(this).data('campaign-end'), 'YYYY-MM-DD, h:m:s');
    $("#edit-campaign-name").val(data[0]);
    $("#edit-campaign-id").val( $(this).data('id'));
    $('.edit-campaign-status').each(function(){
        $(this).removeClass('active');
        $(this).removeClass('notActive');
        if($(this).data('title') == status){
            $(this).addClass('active');
        } else {
            $(this).addClass('notActive');
        }
    });
    $('#edit-campaign-end-date').datetimepicker('date', end);
    $('#edit-campaign-start-date').datetimepicker('date', start);
});

$(document).on('click', '.editMedia', function(){
    var id = $(this).data('name');
    var status = $(this).data('status');
    var data = id.split("|");
    $("#edit-media-name").val(data[0]);
    $("#edit-media-id").val( $(this).data('id'));
    $('.edit-media-status').each(function(){
        $(this).removeClass('active');
        $(this).removeClass('notActive');
        if($(this).data('title') == status){
            $(this).addClass('active');
        } else {
            $(this).addClass('notActive');
        }
    });
});

$(document).on('click', ".deleteSubsteps", function(){
    var substeps_id = $(this).attr('id');
    var substeps_order = $(this).data('name').split("|");
    swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menghapus Substeps ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Hapus"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('substeps.delete')}}",
                    type: 'POST',
                    
                    data :{
                        substeps_id:substeps_id,
                        substeps_order:substeps_order[1],   
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Substeps Berhasil Dihapus',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});
                        } else {
                            swal('Gagal', 'Penghapusan substeps gagal!', "error");
                        }
                    }
                });
            }        
        });
});

$(document).on('click', '#submit-edit-substeps', function(){
    var isempty = [];
    var substeps_name = $('#edit_substeps_name').val();
    var substeps_id = $('#edit_substeps_id').val();
    var substeps_jobs_apply_status = $('#edit_substeps_jobs_apply_status').val();
    var substeps_email_status = $('#edit-substeps-email-status').val();
    var substeps_email_text = substeps_email_text = CKEDITOR.instances['edit-substeps-email-text'].getData();
    if(substeps_email_status == 'yes' && substeps_email_text == ''){
        $('#edit-subteps-email-text').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit-subteps-email-text').removeClass('is-invalid');
        isempty.push("false");
    }
    if(substeps_name == "") {
        $('#edit_substeps_name').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit_substeps_name').removeClass('is-invalid');
        isempty.push("false");
    } 
    if(substeps_jobs_apply_status == null){
        $('#edit_substeps_jobs_apply_status').addClass('is-invalid');
        isempty.push("true");
    }else{
        $('#edit_substeps_jobs_apply_status').removeClass('is-invalid');
        isempty.push("false");
    } 

    if(isempty.includes('true')){
        swal('Gagal', 'Mohon Isi Semua Kolom', "error");
    } else {
        swal({
            title : 'Perhatian!',
            text : 'Apakah Anda Yakin Ingin Menyimpan Perubahan Substeps ?',
            type : 'warning', 
            cancelButtonText: 'Kembali', 
            showCancelButton: true, 
            confirmButtonText: "Simpan"
        }).then((result) => {
            if (result.value){ 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('substeps.edit')}}",
                    type: 'POST',
                    data :{
                        substeps_jobs_apply_status:substeps_jobs_apply_status,
                        substeps_name:substeps_name,
                        substeps_id:substeps_id,
                        substeps_email_status:substeps_email_status,
                        substeps_email_text:substeps_email_text
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            swal({title : 'Berhasil',text : 'Substeps Berhasil Diubah',type : 'success', confirmButtonText: "OK"}).then((result) => {if (result.value) location.reload();});

                        } else {
                                
                            swal('Gagal', 'Pengubahan substeps gagal!', "error");
                        }
                    }
                });
            }        
        });
        
    }

});

$(document).on('click', '#move-up', function(){
    var data = $(this).data('name').split("|");
    var substeps_id = $(this).data('id');
    var substeps_order = data[1];
    var substeps_jobs_apply_status = data[2];
    if(substeps_order > 1){
        $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('substeps.moveup')}}",
                    type: 'POST',
                    data :{
                        substeps_jobs_apply_status:substeps_jobs_apply_status,
                        substeps_order:substeps_order,
                        substeps_id:substeps_id
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            refreshDatatable();
                        } else {  
                            swal('Gagal', 'menaikkan substeps gagal!', "error");
                        }
                    }
                });
    } else {
        swal('Gagal', 'Substeps Sudah Bagian Atas', "error");
    }
});

$(document).on('click', '#move-down', function(){
    var data = $(this).data('name').split("|");
    var substeps_id = $(this).data('id');
    var substeps_order = data[1];
    var substeps_jobs_apply_status = data[2];
    if(substeps_order != 0){
        $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    url:"{{ route('substeps.movedown')}}",
                    type: 'POST',
                    data :{
                        substeps_jobs_apply_status:substeps_jobs_apply_status,
                        substeps_order:substeps_order,
                        substeps_id:substeps_id
                    },
                    success:function(response)
                        {
                        if(response == 'berhasil'){
                            refreshDatatable();
                        } else {  
                            swal('Gagal', 'menaikkan substeps gagal!', "error");
                        }
                    }
                });
    } else {
        swal('Gagal', 'Substeps Sudah Bagian Atas', "error");
    }
});

$('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        // alert($('#'+tog).val());
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
        

    })

    $(document).on('click', '.substeps-email-status', function(e){
        if($('#substeps-email-status').val() == 'yes') $('.email-text').attr('style', '');
        else $('.email-text').attr('style', 'display:none !important');
    });

        $(document).on('click', '.edit-substeps-email-status', function(e){
        if($('#edit-substeps-email-status').val() == 'yes') $('.edit-mail-text').attr('style', '');
        else $('.edit-mail-text').attr('style', 'display:none !important');
    });

    

</script>

@endpush

@endsection