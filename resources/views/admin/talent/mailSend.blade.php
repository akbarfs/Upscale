@extends('layouts.master')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


@section('content')
<div class="content-wrapper">


    <div class="card ">
        <div class="card-body">
            <h6> Dashboard / mail </h6>
            <br><br>

            <div class="card" style="width: 55rem; margin-left:7%">
                <div class="card-body center">
                    <h5 class="card-title text-center">Send Email</h5><hr>
                    
                    <form style= "background-color:white" method="post" action="" id="form-search">    
                        <div class="container-fluid">

                            <dic class="row">
                                <div class="col-sm-2" style="padding:18px 0px 0px 15px">
                                        <p class="card-text">Choose Email : </p>
                                </div>
                                <div class="col-sm-10">
                                    <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-check form-check-inline" style="padding-left: 10px;">
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
                                                <div class="form-check form-check-inline" style="padding-left: 10px;">
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

                            <dic class="row">
                                <div class="col-sm-2" style="padding:8px 0px 0px 25px">
                                        <p class="card-text">Details : </p>
                                </div>
                                <div class="col-sm-10">
                                    <div class="card" style="width: 40rem;">
                                        <div class="card-body">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive" style=" padding:2%">
                                <table class="table table-striped">
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
                                        <td colspan="2"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button></td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">2</th>
                                        <td>MO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">3</th>
                                        <td>Teacher Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">4</th>
                                        <td>TO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">5</th>
                                        <td>class Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">6</th>
                                        <td>CO-Followup</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">7</th>
                                        <td>Letter Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">8</th>
                                        <td>LO-Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">9</th>
                                        <td>Job Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>

                                        <tr>
                                        <th scope="row">10</th>
                                        <td>JO-Offer</td>
                                        <td colspan="2">
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">down</button>
                                            <button class="btn btn-outline-primary btn-sm" type="submit" id="search">up</button>
                                        </td>
                                        <td colspan="2">
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Preview</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Edit</button></a>
                                            <a href="/client/mail"><button class="btn btn-outline-primary btn-sm" type="submit" id="search">Delete</button></a>
                                        </td>
                                        <td><input type="radio" aria-label="" style="padding-left:10px"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button class="btn btn-danger btn-sm" type="submit" id="search">Cancel</button>
                                </div>
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button class="btn btn-success btn-sm" type="submit" id="search">Send</button>
                                </div>
                            </div>

                        </div>
                    </form>

                    </div>

                </div>
            </div>

        </div>
    </div>


</div>