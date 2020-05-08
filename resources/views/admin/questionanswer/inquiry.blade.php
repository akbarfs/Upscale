@extends('admin.layout.apps')
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Inquiry</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li><a href="#">Project</a></li>
                    <li class="active">Create Inquiry</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">                    
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Project Question</strong>
                    </div>
                        <form id="job-form" action="{{ route('inquiry.storeInquiry') }}" method="post">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="card-body card-block">                            
                                <div class="form-group col-md-12 mt-4">
                                    <div class="col-md-2">
                                        <label class="form-control-label"><strong>Inquiry Package</strong></label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control text-capitalize" name="package_inquiry" id="package_inquiry">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="button" value="save" id="save" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body card-block">                            
                            <div class="form-group col-md-12 mt-4">
                                <table class="table table-lg table-hover">
                                    <thead>
                                        <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th scope="col">Package Inqueries</th>
                                        <th scope="col">Configuration</th>
                                        </tr>
                                    </thead>
                                    <?php $no=1; ?>
                                    @foreach ($inquiry as $data)
                                    <tbody>
                                        <tr class="text-center col-md-auto">
                                            <th scope="row" class="number">{{$no++}}</th>
                                            <td class="text-capitalize">{{$data->package_inquiry}}</td>
                                            <td class="row">
                                                <a href="{{ url('inquiry/create/'.$data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>||
                                                <a href="#" data-toggle="modal" data-target="#modal-edit-company" type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>||
                                                <form name="delete" action="{{ url('inquiry/destroyInquiry'.$data->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-md " role="button" aria-pressed="true" type="submit" onclick="deleteFunction()">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>
    $(document).on('click', '#save', function()
    {
        var package  = $('#package_inquiry');

        if (package.val()=='')
        {
            swal('Please fill out project question field','');
            center.focus();
            return false;
        }
        else
        {
            swal({
                    title: 'Save Question?',
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
                        $('#job-form').submit();
                    }
                });
        }
    });
</script>

@endpush
@endsection
