@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h3>Bootcamp Applicant</h3>
                <strong class="text-muted" style="text-transform: capitalize;">{{$title->event_title}}</strong>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp Applicant</li>
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
                        <nav>
                          <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                            
                            <a class="nav-item nav-link active" data-toggle="tab" href="#all" role="tab" aria-controls="nav-home" aria-selected="false"><strong>All</strong>                           
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#send_soal" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Test</strong>
                                <span class="badge badge-primary">{{$viscount}}</span>
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#lolos" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Lolos</strong>
                                <span class="badge badge-primary">{{$count}}</span>
                            </a>
                            <a class="nav-item nav-link "  data-toggle="tab" href="#recruit" role="tab" aria-controls="nav-profile" aria-selected="false"><strong>Recruit</strong>
                                <span class="badge badge-primary">{{$rcount}}</span>
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
                                <div class="col pull-left pb-2">
                                    <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Mo :</span> -->
                                    <button name="moverecruit" id="moverecruit" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i>Recruit</button>
                                </div>
                                <div class="col pull-left pb-2">
                                    <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Mo :</span> -->
                                    <button name="move" id="move" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Move to Lolos</button>
                                </div>
                                <div class="col pull-right pb-2">
                                <button data-toggle="modal" data-target="#modal-add-applicant" type="button" class="btn btn-primary">Add Applicant</button>
                                </div>
                            </div>
                        </div>
                      </div>
                        <table id="t_register" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 120px">Created Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Job</th>
                                    <th>Step</th>
                                    <th>Status</th>
                                    <th style="width: 120px">Action</th>
                                </tr>
                            </thead>
                        </table>
                      </div>
                        <div id="lolos" class="tab-pane fade ">
                          <div class="action-table">
                            <div class="col-md-12 form-inline">
                              <div class="form-group">
                                <div class="col pull-left pb-2">
                                    <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Mo :</span> -->
                                    <button name="moverecruit" id="moverecruit" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i>Recruit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                                    <table id="all_lolos" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="width: 20px;">No</th>
                                                <th style="width: 120px">Created Date</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Job</th>
                                                <th>Step</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                        </div>
                        <div id="send_soal" class="tab-pane fade ">
                                    <table id="sendsoal" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="width: 20px;">No</th>
                                                <th style="width: 120px">Created Date</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Job</th>
                                                <th>Step</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                        </div>
                        <div id="recruit" class="tab-pane fade ">
                                    <table id="recruitall" class="table table-striped table-bordered ">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th style="width: 20px;">No</th>
                                                <th style="width: 120px">Created Date</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Job</th>
                                                <th>Step</th>
                                                <th>Status</th>
                                                <th style="width: 120px">Action</th>
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

<!-- The Modal -->
<div class="modal fade" id="modal-add-applicant">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Applicant</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('applicant.store')}}" method="post" id="add-form" class="mr-3 ml-3" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="form-row ml-auto pb-2">
                        Batch Event
                        <select class="select-event form-control" name="event_id">
                          <option selected disabled></option>
                          @foreach ($bootcamp as $bootcamp)
                          <option value="{{$bootcamp->event_id}}">{{$bootcamp->event_title}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        First Name
                        <input type="text" class="form-control" name="reg_name_f" id="reg_name_f" placeholder="First Name">
                      </div>
                      <div class="form-group col-md-6">
                        Last Name
                        <input type="text" class="form-control" name="reg_name_b" id="reg_name_b" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-5">
                        Email
                        <input type="email" class="form-control" name="reg_email" id="reg_email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-4">
                        Birthdate
                        <input type="date" class="form-control" name="reg_birthdate" id="reg_birthdate">
                      </div>
                      <div class="form-group col-md-3">
                        Sex
                        <select class="select-sex form-control" name="reg_sex">
                            <option selected disabled></option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        Address Now
                        <input type="text" class="form-control" name="reg_alamatnow" id="reg_alamatnow" placeholder="Address Now">
                      </div>
                      <div class="form-group col-md-6">
                        KTP Address
                        <input type="text" class="form-control" name="reg_alamatktp" id="reg_alamatktp" placeholder="KTP Address">
                      </div>
                    </div>
                    <div class="form-row ml-auto">
                      <div class="form-group col-md-6">
                        <label for="inputEmail4">Nomor Telepon (WA/Telegram)</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="" name="reg_phone">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Job</label>
                        <select class="custom-select " id="inlineFormCustomSelectPref" name="reg_job">
                          <option selected disabled >Pilih...</option>
                          <option value="Freelance">Freelance</option>
                          <option value="Web Developer">Web Developer</option>
                          <option value="FE Designer">FE Designer</option>
                          <option value="Lainnya">Lainnya..</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Apa Pendidikan Terakhir Kamu ? <span style="color: red;">*</span></label>
                    <select class="custom-select " id="inlineFormCustomSelectPref" name="reg_education">
                      <option selected>Pilih...</option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Darimana Kamu Mengetahui Program Ini ? <span style="color: red;">*</span></label>
                    <select class="custom-select " id="inlineFormCustomSelectPref" name="reg_info">
                      <option selected>Pilih...</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Website">Website</option>
                      <option value="Twitter">Twitter</option>
                      <option value="Youtube">Youtube</option>
                      <option value="Orang Lain">Orang Lain</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Apa Motivasi Kamu Mengikuti Program Ini ? <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="" name="reg_motivasi">
                </div>
                <div class="form-group">
                  <label for="inputAddress2">Apa bahasa programming yang kamu kuasai ? <span style="color: red;">*</span></label>
                  <input type="text" class="form-control" id="inputAddress2" placeholder="" name="reg_skill">
                </div>
                <div class="form-group">
                  <label for="">Apa pernah mengerjakan proyek? </label><br>
                  <label for="exampleFormControlTextarea1">dan Jelaskan proyek yang pernah dibuat? <span style="color: red;">*</span></label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reg_project"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Protfolio : bisa menggunakan browse file dan juga berupa link (utk repository etc)</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="reg_portfolio_file">
                </div>
                    
                         
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="submit" id="save" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
</div>

<div class="modal fade" id="modal-edit-applicant">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Edit Applicant</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="" id="form-edit-applicant" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                    <div class="form-row ml-auto pb-2">
                    <input type="hidden" name="reg_id" id="reg_id">
                              @foreach ($all as $all)
                                <input type="hidden" name="maineventid" id="maineventid" value="{{$all->main_event_id}}">
                              @endforeach
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        First Name
                        <input type="text" class="form-control" name="reg_namef" id="reg_namef" placeholder="First Name">
                      </div>
                      <div class="form-group col-md-6">
                        Last Name
                        <input type="text" class="form-control" name="reg_nam_b" id="reg_nameb" placeholder="Last Name">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-5">
                        Email
                        <input type="email" class="form-control" name="regemail" id="regemail" placeholder="Email">
                      </div>
                      <div class="form-group col-md-4">
                        Birthdate
                        <input type="date" class="form-control" name="regbirthdate" id="regbirthdate">
                      </div>
                      <div class="form-group col-md-3">
                        Sex
                        <select class="select-sex form-control" name="regsex" id="regsex">
                            <option selected disabled></option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                      </div>
                      </div>
                      <div class="form-row ">
                      <div class="form-group col-md-6">
                        Address Now
                        <input type="text" class="form-control" name="regalamatnow" id="regalamatnow" placeholder="Address Now">
                      </div>
                      <div class="form-group col-md-6">
                        KTP Address
                        <input type="text" class="form-control" name="regalamatktp" id="regalamatktp" placeholer="KTP Address">
                      </div>
                    </div>
                    <div class="form-row ml-auto">
                      <div class="form-group col-md-6">
                        Nomor Telepon (WA/Telegram)
                        <input type="text" class="form-control" id="regphone" placeholder="" name="regphone">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputPassword4">Job</label>
                        <select class="custom-select " id="regjob" name="regjob">
                          <option selected disabled >Pilih...</option>
                          <option value="Freelance">Freelance</option>
                          <option value="Web Developer">Web Developer</option>
                          <option value="FE Designer">FE Designer</option>
                          <option value="Lainnya">Lainnya..</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                  <div class="form-group col-md-6">
                    Apa Pendidikan Terakhir Kamu ?
                    <select class="custom-select " id="regeducation" name="regeducation">
                      <option selected>Pilih...</option>
                      <option value="Tidak Sekolah">Tidak Sekolah</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    Darimana Kamu Mengetahui Program Ini ? 
                    <select class="custom-select " id="reginfo" name="reginfo">
                      <option selected>Pilih...</option>
                      <option value="Facebook">Facebook</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Website">Website</option>
                      <option value="Twitter">Twitter</option>
                      <option value="Youtube">Youtube</option>
                      <option value="Orang Lain">Orang Lain</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  Apa Motivasi Kamu Mengikuti Program Ini ?
                  <input type="text" class="form-control" id="regmotivasi" placeholder="" name="regmotivasi">
                </div>
                <div class="form-group">
                  Apa bahasa programming yang kamu kuasai ? 
                  <input type="text" class="form-control" id="regskill" placeholder="" name="regskill">
                </div>
                <div class="form-group">
                  Apa pernah mengerjakan proyek? <br>
                  dan Jelaskan proyek yang pernah dibuat? 
                  <textarea class="form-control" id="regproject" rows="3" name="regproject"></textarea>
                </div>
                <!-- <div class="form-group">
                  Upload File Project <br>
                  <input type="file" class="form-control" name="regportfolio" id="regportfolio">
                </div> -->
                        </div>
                    
                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <div class="nav nav-pills pull-right">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                </div>
                </form>
              </div>
            </div>
</div>

<div class="modal fade" id="modal-tambah-catatan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="judul-panjang">Masukan Link Jawaban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body substeps-modal">
            <div class="form-group">
                <label for="catatan">Link Hasil Test</label>
                <input type="text" name="reg_jawabantes_link" class="form-control" id="linkjawaban" placeholder="Masukan Link">
                <input type="hidden" name="reg_id" value="">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id='batalkan-simpan-catatan' class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>

</div>

@push('script')

<script type="text/javascript">
$(document).ready(function(){
    applicant_table;

});

function reload(){
    applicant_table.ajax.reload();

}

function reload(){
    var tabel = $("#"+tab_active).DataTable();
    tabel.ajax.reload();
    // $("#status-default-default").attr('selected', true);
    // $("#company-default-default").attr('selected', true);
    // $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
}


function reload_all(){
    var tabel = $("#t_register").DataTable();
    tabel.ajax.reload();
}

var all_lolosFirstTime = true;
var all_tolakFirstTime = true;
var all_sendFirstTime = true;
var all_recFirstTime = true;
var id = document.getElementById("maineventid").value;

var applicant_table = $('#t_register').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('applicant.all')}}",
            type:"GET",
            data:{id:id},
        },
        className:"dt-center",target: "reg_id",
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"reg_id",defaultColumn:"-"},
        {data:"created_date",defaultColumn:"-",visible:true},
        {data:"reg_name_f",defaultColumn:"-",visible:true},
        {data:"reg_email",defaultColumn:"-",visible:true},
        {data:"reg_job",defaultColumn:"-",visible:true},
        {data:"reg_step",defaultColumn:"-",visible:true},
        {data:"reg_status",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},

        ]
    });
    
    $(document).on('click', 'a[href="#lolos"]', function(e){
      tab_active = "all_lolos";

      if(all_lolosFirstTime){
        all_lolos = $('#all_lolos').DataTable({
          autoWidth:false,
          filter:true,
          info:false,
          paging:true,
          processing:false,
          ajax:{
              url:"{{route('applicant.lolos')}}",
              type:"GET",
              data:{id:id},
          },
          className:"dt-center",target: "reg_id",
          columns:[
          {data:"checkbox",orderable:false,searchable:false},
          {data:"reg_id",defaultColumn:"-"},
          {data:"created_date",defaultColumn:"-",visible:true},
          {data:"reg_name_f",defaultColumn:"-",visible:true},
          {data:"reg_email",defaultColumn:"-",visible:true},
          {data:"reg_job",defaultColumn:"-",visible:true},
          {data:"reg_step",defaultColumn:"-",visible:true},
          {data:"reg_status",defaultColumn:"-",visible:true},
          {data:"action",orderable:false,searchable:false},

          ]
            
        });
        all_lolosFirstTime = false;
      }
      else
      {
        reload();
      }
      

    });

    $(document).on('click', 'a[href="#send_soal"]', function(e){
      tab_active = "sendsoal";

      if(all_sendFirstTime){
        all_send = $('#sendsoal').DataTable({
          autoWidth:false,
          filter:true,
          info:false,
          paging:true,
          processing:false,
          ajax:{
              url:"{{route('applicant.send')}}",
              type:"GET",
              data:{id:id},
          },
          className:"dt-center",target: "reg_id",
          columns:[
          {data:"checkbox",orderable:false,searchable:false},
          {data:"reg_id",defaultColumn:"-"},
          {data:"created_date",defaultColumn:"-",visible:true},
          {data:"reg_name_f",defaultColumn:"-",visible:true},
          {data:"reg_email",defaultColumn:"-",visible:true},
          {data:"reg_job",defaultColumn:"-",visible:true},
          {data:"reg_step",defaultColumn:"-",visible:true},
          {data:"reg_status",defaultColumn:"-",visible:true},
          {data:"action",orderable:false,searchable:false},

          ]
            
        });
        all_sendFirstTime = false;
      }
      else
      {
        reload();
      }
      

    });

    $(document).on('click', 'a[href="#recruit"]', function(e){
      tab_active = "recruitall";

      if(all_recFirstTime){
        all_rec = $('#recruitall').DataTable({
          autoWidth:false,
          filter:true,
          info:false,
          paging:true,
          processing:false,
          ajax:{
              url:"{{route('applicant.rec')}}",
              type:"GET",
              data:{id:id},
          },
          className:"dt-center",target: "reg_id",
          columns:[
          {data:"checkbox",orderable:false,searchable:false},
          {data:"reg_id",defaultColumn:"-"},
          {data:"created_date",defaultColumn:"-",visible:true},
          {data:"reg_name_f",defaultColumn:"-",visible:true},
          {data:"reg_email",defaultColumn:"-",visible:true},
          {data:"reg_job",defaultColumn:"-",visible:true},
          {data:"reg_step",defaultColumn:"-",visible:true},
          {data:"reg_status",defaultColumn:"-",visible:true},
          {data:"action",orderable:false,searchable:false},

          ]
            
        });
        all_recFirstTime = false;
      }
      else
      {
        reload();
      }
      

    });

    $(document).on('click', '#move', function(){
    var id = [];
    // var status = [];
    // var data = $('#status').val();
    swal({
          title: 'Move',
          text: 'Are you sure to move this data?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Move',
          cancelButtonText: 'Cancel'
        }).then((result) => 
        {
            if (result.value) 
            {   
                $('.checkbox:checked').each(function(){
                    var dataValue = $(this).val().split("|");
                    id.push(dataValue[0]);
                    // status.push(dataValue[1]);
                });

                if(id.length > 0)
                {  
                    $.ajax({
                        url:"{{ route('applicant.movelolos')}}",
                        method: "get",
                        // data :{id:id, data:data, status:status},
                        data :{id:id},
                        success:function(response)
                        {   
                            if(response == 'success'){
                                swal('Success','Data have been moved','success');
                            }
                            reload_all();
                        }
                    });
                }
                else{
                    swal('Error', 'Please select some data', 'error');
                }
            }
            // else {
            //     alert('else ini');
            // }
        });
});

$(document).on('click', '#moverecruit', function(){
    var id = [];
    // var status = [];
    // var data = $('#status').val();
    swal({
          title: 'Move',
          text: 'Are you sure to move this data?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Move',
          cancelButtonText: 'Cancel'
        }).then((result) => 
        {
            if (result.value) 
            {   
                $('.checkbox:checked').each(function(){
                    var dataValue = $(this).val().split("|");
                    id.push(dataValue[0]);
                    // status.push(dataValue[1]);
                });

                if(id.length > 0)
                {  
                    $.ajax({
                        url:"{{ route('applicant.moverec')}}",
                        method: "get",
                        // data :{id:id, data:data, status:status},
                        data :{id:id},
                        success:function(response)
                        {   
                            if(response == 'success'){
                                swal('Success','Data have been moved','success');
                            }
                            reload_all();
                        }
                    });
                }
                else{
                    swal('Error', 'Please select some data', 'error');
                }
            }
            // else {
            //     alert('else ini');
            // }
        });
});

    $(document).on('click','a[href="#edit-applicant"]',function(e){
                    var editid = $(this).data('editid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editapplicant/'+editid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#reg_id').val(data.reg_id);
                            $('#eventid option[value="'+data.main_event_id+'"]').prop('selected', true);
                            $('#reg_namef').val(data.reg_name_f);
                            $('#reg_nameb').val(data.reg_name_b);
                            $('#regemail').val(data.reg_email);
                            $('#regbirthdate').val(data.reg_birthdate);
                            $('#regsex option[value="'+data.reg_sex+'"]').prop('selected', true);
                            $('#regalamatnow').val(data.reg_alamatnow);
                            $('#regalamatktp').val(data.reg_alamatktp);
                            $('#regphone').val(data.reg_phone);
                            $('#regjob option[value="'+data.reg_job+'"]').prop('selected', true);
                            $('#regeducation option[value="'+data.reg_education+'"]').prop('selected', true);
                            $('#reginfo option[value="'+data.reg_info+'"]').prop('selected', true);
                            $('#regmotivasi').val(data.reg_motivasi);
                            $('#regskill').val(data.reg_skill);
                            $('#regproject').val(data.reg_project);
                            $('#regportfolio').val(data.reg_portfolio_file);
                            var waks = '{{ route("applicant.update", ":reg_id") }}';
                            waks = waks.replace(':reg_id', editid);
                            $("#form-edit-applicant").attr('action', waks);
                        }
                    });
              });

              $(document).on('click', '.tambah-catatan', function(e){
    $('.success-alert').remove();
    $('.progress-alert').remove();
    $('.substeps').remove();
    $('input[name="reg_id"]').val($(this).attr('id'));
    var reg_id = $('input[name="reg_id"]').val();
    var catatan = $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('link.get')}}",
        type: 'POST',
        dataType: 'json',
        data :{
             reg_id:reg_id,
        },
        success:function(response)
            {
            if(response != false){
                response.forEach(function (d) {
                    var data = d.reg_jawabantes_link;
                    $('input[name="reg_jawabantes_link"]').val(data);
                });
            } 
        }
    }); 
});

$(document).on('blur', 'input[name="reg_jawabantes_link"]', function(e){
    var reg_id = $('input[name="reg_id"]').val();
    var reg_jawabantes_link = $('input[name="reg_jawabantes_link"]').val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"{{ route('link.add')}}",
        beforeSend: function(){ 
            $('.progress-alert').remove();
            $('.success-alert').remove();
            $('.substeps-modal').prepend('<div class="alert alert-warning fade out show progress-alert" role="alert"><strong>Please Wait ! </strong> Perubahan Sedang Disimpan!<span class="close" data-dismiss="alert" aria-label="close" aria-hidden="true" style="font-size:18px;"class="fa fa-spinner fa-spin"></span></div>');
        },
        type: 'POST',
        data :{
            reg_id:reg_id,
            reg_jawabantes_link:reg_jawabantes_link
        },
        success:function(response)
             {
            if(response == 'berhasil'){
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Saved ! </strong> Semua Perubahan Telah Disimpan!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');
                reload();
            } else {
                $('.success-alert').remove();
                $('.progress-alert').remove();
                $('.substeps-modal').prepend('<div class="alert alert-success fade out show success-alert" role="alert"><strong>Tidak Ada Perubahan ! </strong> Tidak terdapat perubahan pada data!<button type="button" class="close" data-dismiss="alert" aria-label="close" ><span aria-hidden="true" style="font-size:18px;"class="fa fa-check"></span></button></div>');

            }
        }
    });
});

      $(document).on('click', '.deleteApplicant', function(){
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
                        url:"{{ route('applicant.delete')}}",
                        method: "get",
                        data :{id:id},
                        success:function(response)
                        {
                            if(response == 'success'){
                            swal('Success','Data deleted','success');
                             }
                             reload_all();
                        }
                    });
                       
                }
                
            });
    });

</script>
@endpush
@endsection