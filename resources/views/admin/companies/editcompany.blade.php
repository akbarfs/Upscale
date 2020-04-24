@extends('admin.layout.apps')

@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Edit Company</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Edit Company</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form id="company-form" action="{{url('admin/company/update/'.$company->company_id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <strong>Company Details</strong>
                  </div>
                  <div class="card-body card-block">
                      
                    <div class="form-group col-md-6">

                          <label for="text-input" class=" form-control-label">Company Name</label>
                          <input value="{{$company->company_name}}" type="text" id="company_name" name="company_name" placeholder="Input Company Name" class="form-control">  

                          <label for="text-input" class=" form-control-label">Company Username</label>
                          <input value="{{$company->company_username}}" type="text" id="company_username" name="company_username" placeholder="Input Company Username" class="form-control">

                          <label for="text-input" class=" form-control-label">Company password</label>
                          <input value="{{$company->company_password}}" type="password" id="company_password" name="company_password" placeholder="Input Company Pssword" class="form-control">

                          <label for="text-input" class=" form-control-label">Company email</label>
                          <input value="{{$company->company_email}}" type="email" id="company_email" name="company_email" placeholder="Input Company email" class="form-control">

                          <label for="text-input" class=" form-control-label">Company phone</label>
                          <input value="{{$company->company_phone}}" type="text" id="company_phone" name="company_phone" placeholder="Input Company Phone" class="form-control">

                          <label for="text-input" class=" form-control-label">Company pic</label>
                          <input value="{{$company->company_pic}}" type="text" id="company_pic" name="company_pic" placeholder="Input Company Username" class="form-control">

                          <label for="text-input" class=" form-control-label">Company address</label>
                          <input value="{{$company->company_address}}" type="text" id="company_address" name="company_address" placeholder="Input Company Username" class="form-control">
                          <label class="control-label ">Company Description</label>
                          <input value="{{$company->company_description}}" type="text" id="company_decription" name="company_description" class="form-control" placeholder="Input Company Description">
                          <div class="card-footer">
                        <div class="pull-right">
                          <button type="submit" id="save" class="btn btn-success">Save</button>
                          <a href="{{route('company.index')}}" type="button" class="btn btn-danger" >Cancel</a>
                      </div>
                   </div>
                </div>

        </div>
    </form>
    </div>
</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>
     

    $(document).on('click', '#save', function(){

    var name         = $('#company_name');
    var username     = $('#company_username');
    var password     = $('#company_password');
    var pic          = $('#company_pic');
    var phone        = $('#company_phone');
    var email        = $('#company_email');
    var address      = $('#company_address');
    var description  = $('#company_description');




    if(name.val() == ''){
    swal('Please fill out company name field','');
    name.focus();
    return false;
    }
    if(username.val() == ''){
    swal('Please fill out company username field','');
    username.focus();
    return false;
    }
    if(password.val() == ''){
    swal('Please fill out company password field','');
    password.focus();
    return false;
    }
    if(phone.val() == ''){
    swal('Please fill out company phone field','');
    phone.focus();
    return false;
    }
    if(address.val() == ''){
    swal('Please fill out company addesss field','');
    address.focus();
    return false;
    }
    if(pic.val() == ''){
    swal('Please fill out company pic field','');
    pic.focus();
    return false;
    }
    if(description.val() == ''){
      swal('Please fill out company description field','');
      description.focus();
      return false;
   

      else{
        swal({
                  title: 'Save company',
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
                                $('#company-form').submit();
                            }
                        });
      }
    });
  </script>

@endpush

@endsection
