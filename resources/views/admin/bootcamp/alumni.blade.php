@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Alumni</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Alumni</li>
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

                    <div class="card-body">
                    <div class="tab-content">
                      <div id="all" class="tab-pane fade show active row">
                      <div class="action-table">
                        <div class="col-md-12 form-inline">
                            <div class="form-group">
                                <div class="col pull-left pb-2">
                                    <!-- <span data-toggle="tooltip" data-placement="top" title="Hooray!">Mo :</span> -->
                                    <button name="move" id="move" class="btn btn-primary " type="button"><i class="fa fa-retweet"></i> Move to Publish</button>
                                </div>
                                <div class="col pull-right pb-2">
                                <button data-toggle="modal" data-target="#modal-add-alumni" type="button" class="btn btn-primary">Add Alumni</button>
                                </div>
                            </div>
                        </div>
                      </div>
                        <table id="t_alumni" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 120px">Created Date</th>
                                    <th>Name</th>
                                    <th>Job</th>
                                    <th>Work</th>
                                    <th>No Telp/WA</th>
                                    <th>Email</th>
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
<div class="modal fade" id="modal-add-alumni">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Alumni</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('alumni.add') }}" method="post" id="add-form" class="mr-3 ml-3" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        Email
                        <input type="email" class="form-control" name="alumni_email" id="alumni_email" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        Nama Lengkap
                        <input type="text" class="form-control" name="alumni_name" id="alumni_name" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-8">
                        Alamat
                        <input type="text" class="form-control" name="alumni_address" id="alumni_address" placeholder="Alamat">
                      </div>
                      <div class="form-group col-md-4">
                        Nomor Telpon/WA
                        <input type="number" class="form-control" name="alumni_wa" id="alumni_wa" placeholder="Nomor Telepon/WA">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        Pekerjaan Sekarang
                        <input type="text" class="form-control" name="alumni_job" id="alumni_job" placeholder="Pekerjaan Sekarang">
                      </div>
                      <div class="form-group col-md-6">
                        Nama Tempat Bekerja
                        <input type="text" class="form-control" name="alumni_work" id="alumni_work" placeholder="Nama Tempat Bekerja">
                      </div>
                    </div>
                    <div class="form-row ml-auto">
                        Pilih batch yang diikuti
                         <select class="custom-select my-1 mr-sm-2" name="bootcamp">
                          <option selected>Pilih..</option>
                        @foreach ($event as $mat)
                            <option value="{{$mat->event_id}}">{{$mat->event_title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Testimonial
                        <textarea class="form-control alamat" name="alumni_testimoni" id="testimoni" rows="3"></textarea>
                      </div>
                    <div class="form-group">
                      Upload Foto
                      <input type="file" class="form-control-file" name="alumni_photo" id="alumni_photo" accept=".jpg, .png, .jpeg">
                    </div>
                         
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="button" id="save" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
</div>

<div class="modal fade" id="modal-edit-alumni">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Alumni</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-alumni" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                        <div class="form-row ">
                      <div class="form-group col-md-6">
                      <input type="hidden" name="alumni_id" id="alumniid">
                        Email
                        <input type="email" class="form-control" name="alumni_email" id="alumniemail" placeholder="Email">
                      </div>
                      <div class="form-group col-md-6">
                        Nama Lengkap
                        <input type="text" class="form-control" name="alumni_name" id="alumniname" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-8">
                        Alamat
                        <input type="text" class="form-control" name="alumni_address" id="alumniaddress" placeholder="Alamat">
                      </div>
                      <div class="form-group col-md-4">
                        Nomor Telpon/WA
                        <input type="number" class="form-control" name="alumni_wa" id="alumniwa" placeholder="Nomor Telepon/WA">
                      </div>
                    </div>
                    <div class="form-row ">
                      <div class="form-group col-md-6">
                        Pekerjaan Sekarang
                        <input type="text" class="form-control" name="alumni_job" id="alumnijob" placeholder="Pekerjaan Sekarang">
                      </div>
                      <div class="form-group col-md-6">
                        Nama Tempat Bekerja
                        <input type="text" class="form-control" name="alumni_work" id="alumniwork" placeholder="Nama Tempat Bekerja">
                      </div>
                    </div>
                    <div class="form-row ml-auto">
                        Pilih batch yang diikuti
                         <select class="custom-select my-1 mr-sm-2" name="bootcamp" id="eventbootcamp">
                          <option selected>Pilih..</option>
                        @foreach ($event as $mat)
                            <option value="{{$mat->event_id}}">{{$mat->event_title}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Testimonial
                        <textarea class="form-control alamat" name="alumni_testimoni" id="testi" rows="3"></textarea>
                      </div>
                    <div class="form-group">
                      Upload Foto
                      <input type="file" class="form-control-file" name="alumni_photo" id="alumniphoto" accept=".jpg, .png, .jpeg">
                    </div>
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
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script type="text/javascript">
$(document).ready(function(){
    alumni_table;
});

function reload(){
    alumni_table.ajax.reload();

}

function reload_all(){
    var tabel = $("#t_alumni").DataTable();
    tabel.ajax.reload();
}

var all_publishFirstTime = true;

var alumni_table = $('#t_alumni').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('alumni.all')}}",
            type:"GET"
        },
        className:"dt-center",target: "alumni_id",
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"alumni_id",defaultColumn:"-"},
        {data:"created_date",defaultColumn:"-",visible:true},
        {data:"alumni_name",defaultColumn:"-",visible:true},
        {data:"alumni_job",defaultColumn:"-",visible:true},
        {data:"alumni_work",defaultColumn:"-",visible:true},
        {data:"alumni_wa",defaultColumn:"-",visible:true},
        {data:"alumni_email",defaultColumn:"-",visible:true},
        {data:"alumni_status",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",visible:true},

        ]
});

$(document).on('click', '#save', function(){
    var email = $('#alumni_email');
    var name = $('#alumni_name');
    var add = $('#alumni_address');
    var nowa = $('#alumni_wa');
    var job = $('#alumni_job');
    var work = $('#alumni_work');
    var boot = $('#bootcamp');
    var desc  = $('#testimoni');
    var photo = $('#alumni_photo');

      if(email.val() == ''){
        swal('Please fill out alumni name field','');
            email.focus();
            return false;
      }
      if(name.val() == ''){
        swal('Please fill out alumni work field','');
            name.focus();
            return false;
      }
      if(add.val() == ''){
        swal('Please fill out alumni bootcamp field','');
            add.focus();
            return false;
      }
      if(nowa == ''){
        swal('Please fill out alumni testimoni field','');
            nowa.focus();
            return false;
      }
      if(job == ''){
        swal('Please fill out alumni testimoni field','');
            job.focus();
            return false;
      }
      if(work == ''){
        swal('Please fill out alumni testimoni field','');
            work.focus();
            return false;
      }
      if(boot == ''){
        swal('Please fill out alumni testimoni field','');
            boot.focus();
            return false;
      }
      if(desc == ''){
        swal('Please fill out alumni testimoni field','');
            desc.focus();
            return false;
      }
      if(photo == ''){
        swal('Please fill out alumni testimoni field','');
            photo.focus();
            return false;
      }
      else{
        swal({
                  title: 'Save Alumni?',
                  text: '',
                  type: 'info',
                  showCancelButton: true,
                  confirmButtonText: 'Save',
                  cancelButtonText: 'Cancel',
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                    }).then((result) => 
                        {
                            if (result.value) 
                            {
                                $('#add-form').submit();
                            }
                        });
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
                        url:"{{ route('alumni.move')}}",
                        method: "get",
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
    
$(document).on('click','a[href="#edit-alumni"]',function(e){
                    var aid = $(this).data('editid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editalumni/'+aid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#alumniid').val(data.alumni_id);
                            $('#alumniemail').val(data.alumni_email);
                            $('#alumniname').val(data.alumni_name);
                            $('#alumniaddress').val(data.alumni_address);
                            $('#alumniwa').val(data.alumni_wa);
                            $('#alumnijob').val(data.alumni_job);
                            $('#alumniwork').val(data.alumni_work);
                            $('#eventbootcamp option[value="'+data.alumni_bootcamp+'"]').prop('selected',true);
                            $('#testi').val(data.alumni_testimoni);
                            var url2 = '{{ route("alumni.update", ":alumni_id") }}';
                            url2 = url2.replace(':alumni_id', aid);
                            $("#form-edit-alumni").attr('action', url2);
                        }
                    });
});

$(document).on('click','a[href="#hapus-alumni"]',function(){
    var id = $(this).data('hapusid');
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
                        url:"{{ route('alumni.delete')}}",
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