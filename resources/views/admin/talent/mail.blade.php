@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

@section('content')

<div class="content-wrapper">
    <div class="putih" style="background-color:white">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/dashboard" style="color:#3532ff">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">History</li>
            </ol>
        </nav>

        <h3 style="margin:2% 3% 0%"> History </h3>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="position: relative; float:right ; margin-right: 10%; width: 30rem">
                        <div class="card-body">
                            <table class="table table-bordered table-white" style="font-size:10px;text-align:center">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Join Invitation</th>
                                        <th scope="col">Regular</th>
                                        <th scope="col">Class Offer</th>
                                        <th scope="col">Letter Offer</th>
                                        <th scope="col">Job Offer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Total Email Send</th>
                                        <td>{{$talent->talent_mail_invitation}}</td>
                                        <td>{{$talent->talent_mail_regular}}</td>
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

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form style="margin-top:10; padding: 0" method="post" action="" id="form-search">
                        <div class="row">
                            <div class="col-md-2">
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
                                <input type="text" class="form-control" placeholder="email" name="email_tl">
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="phone number" name="phonenum">
                            </div>

                            <div class="col-md-2">
                                <input type="text" class="form-control" placeholder="mail type" name="mailtype">
                            </div>

                            <div class="col-md-2">
                                <select class="custom-select" name="order">
                                    <option value="">-- order? --</option>
                                    <option value="created_at">Email Sent</option>
                                </select>
                            </div>


                            @push('script')

                            <script src="{{url('template/upscale/js/tag.js')}}"></script>
                            <link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">

                            <script>
                                $(document).ready(function() {
                                    $('.tagsInput').fastselect({

                                        valueDelimiter: ',',
                                        onItemSelect: function($item, itemModel) {
                                            $(".fstChoiceRemove").html("x");
                                            // $(".fstQueryInput").focus(); 
                                        },

                                    });

                                });
                            </script>

                            @endpush


                            <style type="text/css">
                                .fstQueryInput {
                                    padding: 0
                                }

                                .fstControls {
                                    padding: 0 !important;
                                    min-width: 200px;
                                    height: 35px
                                }

                                .fstQueryInputExpanded {
                                    padding: 0 10px !important;
                                    margin: 0 !important
                                }
                            </style>

                        </div>

                        <div class="row" style="margin-top: 10px">

                            <div class="col-md-12">
                                <div style="padding: 10px;">
                                    show :

                                    <input type="checkbox" name="tl_type" checked="checked"> Type &nbsp
                                    <input type="checkbox" name="tl_name" checked="checked"> Name &nbsp
                                    <input type="checkbox" name="tl_phone" checked="checked"> Phone &nbsp
                                    <input type="checkbox" name="tl_email" checked="checked"> Email &nbsp
                                    <input type="checkbox" name="tl_status" checked="checked"> Status Email &nbsp
                                    <input type="checkbox" name="tl_desc" checked="checked"> Details &nbsp
                                    <input type="checkbox" name="created_at" checked="checked"> Created &nbsp
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit" id="search">Search</button>
                                </div>
                            </div>



                        </div>
                    </form>

                </div>
            </div>

        </div>




        <!-- <div class="table-responsive" style=" padding: 1% 3%">
            <table id="log_data" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" name="tl_talent_id">Talent Id</th>
                        <th scope="col" name="tl_type">Type Email</th>
                        <th scope="col" name="tl_name">Name</th>
                        <th scope="col" name="tl_phone">Phone </th>
                        <th scope="col" name="tl_email">Email</th>
                        <th scope="col" name="tl_email_status">Status Email </th>
                        <th scope="col" name="tl_desc">Details </th>
                        <th scope="col" name="tl_created_at">Created </th>
                        <th scope="col" name="updated_at">Updated </th>
                    </tr>
                </thead>
                <tbody> -->
        <div id="table_data">

        </div>

        <!-- @foreach ($talent->Talent_log()->get() as $t) -->

        <!-- <tr>
                        <td>{{$t->id}}</td>
                        <td>{{$t->tl_talent_id}}</td>
                        <td>{{$t->tl_type}}</td>
                        <td>{{$t->tl_name}}</td>
                        <td>{{$t->tl_phone}}</td>
                        <td>{{$t->tl_email}}</td>
                        <td>{{$t->tl_email_status}}</td>
                        <td>{{$t->tl_desc}}</td>
                        <td>{{ \Carbon\Carbon::parse($t->created_at)->format('D, d-m-Y H:i') }}
                            <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="member date">
                                {{\Carbon\Carbon::createFromTimeStamp(strtotime($t->created_at))->diffForHumans()}}</b>
                            </span>
                        </td>
                         <td>{{$t->updated_at}}</td> 
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div> -->


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script>
    function loadTable(url) {
        var param = $("#form-search").serialize();

        $('#loading').show();
        $("#table_data").html('');
        export_url = "{{url('admin/talent/list/export_excel?page=1')}}&" + param;

        $.ajax({
            url: url + "&" + param,
            method: "GET",
            success: function(data) {
                $('#loading').hide();
                $("#table_data").html(data);
            }
        });
    }

    //load pertama kali
    loadTable("{{url('/admin/talent/list/mail/table?page=1')}}");

    //klik pagination , diambil urlnya langsung di load ajax
    $(document).on("click", ".page-link", function(event) {
        $("body").scrollTop(0);
        var url = $(this).attr("href");
        loadTable(url);
        event.preventDefault(); //ini biar ga keredirect ke halaman lain 
    });

    $("#form-search").submit(function() {
        loadTable("{{url('/admin/talent/list/mail/table?page=1')}}");
        return false;
    });
</script>
@endsection