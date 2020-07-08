@extends('admin.layout.apps')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

@section('content')
<div class="content-wrapper">


    <div class="card ">
        <div class="card-body">
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard" style="color:#3532ff">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Send Email</li>
                </ol>
            </nav>
            
            <br>
            <a href="{{url('/admin/talent/mail/'.$talent->talent_id)}}"><button class="btn btn-primary btn-sm" type="submit" id="search" style="margin-left:10px">Back</button></a>
            <a href="{{url('/admin/talent/create-type-email/'.$talent->talent_id)}}"><button class="btn btn-success btn-sm" type="submit" id="search" style="margin-left:1%">Create New Email Type</button></a>
            <br><br>
            <div class="card" style="width: 55rem; margin-left:7%">
                <div class="card-body center">
                    <h5 class="card-title text-center">Send Email</h5><hr><br>
                    
                    <form style= "background-color:white" method="GET" action="" id="form-search">    
                        <div class="container-fluid">

                            <dic class="row">
                                <div class="col-sm-2" style="padding:18px 0px 0px 10px">
                                        <p class="card-text">Choose Email : </p>
                                </div>
                                <div class="col-sm-10">
                                    <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-check form-check-inline" style="padding-left: 15px;">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                                    <label class="form-check-label" for="inlineCheckbox1">Gery789@gmail.com</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="padding-left: 10px;">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Gery789@gmail.com</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="padding-left: 10px;">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Gery789@gmail.com</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="padding-left: 15px;">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Gery456@gmail.com</label>
                                                </div>
                                                <div class="form-check form-check-inline" style="padding-left: 10px;">
                                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                                    <label class="form-check-label" for="inlineCheckbox2">Gery123@gmail.com</label>
                                                </div>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-2" style="padding:8px 0px 0px 25px">
                                        <p class="card-text">Details : </p>
                                </div>
                                <div class="col-sm-9" >
                                    <textarea type="text" class="form-control" placeholder="" style="width:40.5rem"></textarea>
                                </div>
                            </div>

                            <div class="table-responsive" style=" padding:2%">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Emails Type</th>
                                        <th colspan="2">Order</th>
                                        <th colspan="2">Action</th>
                                        <th scope="col">Choose</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <th scope="row">1</th>
                                        <td>Member Offer</td>
                                        <td colspan="2"><button class="btn btn-primary btn-sm" type="submit" id="search">down</button></td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">2</th>
                                        <td>MO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Teacher Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">4</th>
                                        <td>TO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">5</th>
                                        <td>class Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">6</th>
                                        <td>CO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">7</th>
                                        <td>Letter Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">8</th>
                                        <td>LO-Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">9</th>
                                        <td>Job Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                        <th scope="row">10</th>
                                        <td>JO-Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#preview" id="" >Preview</button>
                                            <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#edit" id="" >edit</button>
                                            <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="mail">Delete</a>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="materialGroupExample1" name="groupOfMaterialRadios">
                                                <label class="form-check-label" for="materialGroupExample1"></label>
                                            </div>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups" style="padding-left:83%;padding-top:3%; margin-bottom:20px">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <a href="{{url('/admin/talent/mail/'.$talent->talent_id)}}"><button class="btn btn-danger btn-sm" type="submit" id="search">Cancel</button></a>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <a href="{{url('/admin/talent/mail/'.$talent->talent_id)}}"><button class="btn btn-success btn-sm" type="submit" data-toggle="modal" data-target="#sent">Sent</button></a>
                                </div>
                            </div>

                        </div>

                        <div class="container">	


                            <!-- Modal Sent -->
                            <div id="sent" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- konten modal-->
                                    <div class="modal-content">
                                        <!-- body modal -->
                                        <div class="modal-body">
                                            <div class="card" style="width: 27rem; margin: 2% 3% 0%">
                                                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                                                    <div class="card-body">
                                                        <center><h3>Email Sent</h3></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer modal -->
                                        
                                    </div>
                                </div>
                            </div>	
        
                            <!-- Modal Preview -->
                            <div id="preview" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- konten modal-->
                                    <div class="modal-content">
                                        <!-- body modal -->
                                        <div class="modal-body">
                                            <div class="card" style="width: 27rem; margin: 2% 3% 0%">
                                                <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
                                                    <img src="..." class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer modal -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit -->
                            <div id="edit" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- konten modal-->
                                    <div class="modal-content">
                                        <!-- body modal -->
                                        <div class="modal-body">
                                            <div class="row" style="margin:2% 5%">
                                                <h6>Email Subject : </h6>                                       
                                                <input type="text" class="form-control" placeholder="" style="width:45rem" >
                                            </div>

                                            <div class="row" style="margin:1% 5%">
                                                <h6>Email Body : </h6>                                       
                                                <textarea type="text" class="form-control" placeholder="" style="width:45rem; height:20rem" >
                                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                    Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.
                                                </textarea>
                                            </div>

                                        </div>
                                        <!-- footer modal -->
                                        <div class="modal-footer">
                                            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#edit-preview" id="" style="margin-right:54%">Preview</button>
                                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="margin-right:3%">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Edit Preview -->
                            <div id="edit-preview" class="modal fade" role="dialog">
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
                            
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>


</div>

@endsection