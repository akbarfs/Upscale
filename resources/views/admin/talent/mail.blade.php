@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

@section('content')

   <div class="content-wrapper">
      <div class="putih" style="background-color:white">
        <h3 style="margin:2% 3% 0%" > History </h3>
        <br><br>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card" style="position: relative; float:right ; margin-right: 10%">
                            <div class="card-body">
                            <table class="table table-bordered table-white" style="font-size:10px;text-align:center">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Member offer</th>
                                        <th scope="col">Teacher offer</th>
                                        <th scope="col">Class Offer</th>
                                        <th scope="col">Letter Offer</th>
                                        <th scope="col">Job Offer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">Total Email Send</th>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td>0</td>
                                    <td colspan="2">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form style= "background-color:white" method="post" action="" id="form-search">
				   <div class="row">
                    <div class="col-sm-2" style="padding-left:4%; margin-top:0%">
                        <select class="custom-select" name="status_member">
                            <option value="">--ALL--</option>
                            <option value="all" selected="selected">All</option>
                            <option value="non-member">Member offer</option>
                            <option value="member">Teacher Offer</option>
                            <option value="member">Class Offer</option>
                            <option value="member">Letter Offer</option>
                            <option value="member">Job Offer</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="email" name="talent_email">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" placeholder="phone" name="talent_phone">
                    </div>
                    <style type="text/css">
                        .fstQueryInput  { padding: 0 }
                        .fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
                        .fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
                     </style>
				   </div>
            </form>

            <div class="container-fluid">
                <div class="card" style=" margin : 0% 2.5%">
                    <div class="row mb-2">
                        <div class="col-sm-10" style="margin-top:8px; padding-left:2%;">
                            <form style= "background-color:white" method="post" action="" id="form-search">                     
                                <div class="row" style="margin-top: 10px">
                                    <div class=" col-sm-12">
                                    <div style="padding: 0px;">
                                        show :   
                                        <input type="checkbox" name="contact" checked="checked"> PIC &nbsp;
                                        <input type="checkbox" name="skill" checked="checked"> Office Email &nbsp;
                                        <input type="checkbox" name="date_ready" checked="checked"> Phone &nbsp;
                                        <input type="checkbox" name="created" checked="checked"> Details &nbsp;
                                        <input type="checkbox" name="created" checked="checked"> Status Email &nbsp;
                                        <input type="checkbox" name="created" checked="checked"> Action &nbsp;
                                        <input type="checkbox" name="created" checked="checked"> Date &nbsp;
                                        <button class="btn btn-outline-primary" type="submit" id="search">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-2" style="margin-top:18px;">
                            <a href="{{url('/admin/talent/mail-backup/'.$talent->talent_id)}}"><button class="btn btn-primary" type="submit" id="search">New Email</button></a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="table-responsive" style=" padding: 1% 3%">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">No.</th>
                        <th scope="col" name="tl_type">Type</th>
                        <th scope="col" name="tl_name">Name</th>
                        <th scope="col" name="tl_phone">Phone </th>
                        <th scope="col" name="tl_email">Email</th>
                        <th scope="col" name="tl_status">Status Email </th>
                        <th scope="col" name="tl_desc">Details </th>
                        <th scope="col" name="date">Date </th>
                        <th scope="col">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                
                    @foreach ($talent->Talent_log()->get() as $t)
                         
                        <tr>
                        <td>{{$t->tl_type}}</td>
                        <td>{{$t->tl_name}}</td>
                        <td>{{$t->tl_phone}}</td>
                        <td>{{$t->tl_email}}</td>
                        <td>{{$t->tl_email_status}}</td>
                        <td>{{$t->tl_desc}}</td>
                        </tr>
                      
                    @endforeach
                    </tbody>
                </table>
            </div>
    
           
      </div>
   </div>

@endsection

    