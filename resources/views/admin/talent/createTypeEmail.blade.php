@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

@section('content')
<div class="content-wrapper">
    <div class="putih" style="background-color:white">
    
    
        <div class="card ">
            <div class="card-body">
            <h6> Dashboard / createEmail </h6><br>
            <a href=""><button class="btn btn-default btn-sm" type="submit" id="search" style="margin-left:60px">Back</button></a>
            <br><br>

                <div class="card" style="width: 55rem; margin-left:7%">

                    <form style= "background-color:white" method="POST" action="" id="form-search">
                        <div class="row" style="margin:3% 5% 2%">
                            <div class="col-sm-2" style="padding:8px 0px 0px 25px">
                                <p class="card-text">Title </p>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" placeholder=" New mail Type" >
                            </div>
                        </div>
                    
                        <div class="row" style="margin:1% 5%">
                            <div class="col-sm-2" style="padding:8px 0px 0px 25px">
                                <p class="card-text">Email Subject </p>
                            </div>
                            <div class="col-sm-8" >
                                <input type="text" class="form-control" placeholder="" >
                            </div>
                        </div>

                        <div class="row" style="margin:2% 7%">
                            <div class="col-sm-8" >
                                <h6>Email Body : </h6>                                       
                                <textarea type="text" class="form-control" placeholder="" style="width:45rem; height:30rem" >
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                </textarea>
                            </div>
                        </div>

                        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="padding:3% 0% 3% 7%; margin-bottom:20px">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#createEmail-preview" id="" style="margin:2% 60% 2% 5%">Preview</button>
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="First group" style="margin:0% 0% 0% 60%">
                                <a href="mail"><button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="margin:4% 0% 4% 62%">Cancel</button></a>            
                            </div>
                            <div class="btn-group mr-2" role="group" aria-label="First group" style="margin:0% 0% 0% 5%">
                                <a href="mail"><button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="margin:4% 0% 4% 1%">Save</button></a>
                            </div>
                        </div>

                        <!-- Modal createEmail Preview -->
                        <div id="createEmail-preview" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- konten modal-->
                                <div class="modal-content">
                                <!-- body modal -->
                                    <div class="modal-body">
                                        <div class="row" style="margin:1% 5%">                                   
                                            <textarea type="text" class="form-control" placeholder="" style="width:45rem; height:28rem" >
                                                Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                            </textarea>
                                        </div>
                                    </div>
                                <!-- footer modal -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection