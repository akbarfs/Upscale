@extends('admin.layout.apps')
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Create Question</h1>
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
                    <li class="active">Create Question</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <form id="save-form" action="{{ route('inquiry.storeQuestion') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <input type="hidden" name="id">            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Project Question</strong>
                        </div>
                        <div class="card-body card-block">                            
                            <div class="form-group col-md-12 mt-4">
                                <div class="col-md-2">
                                    <label class="form-control-label"><strong>Type Question</strong></label>
                                </div>
                                <div class="col-md-5">
                                    <select class="custom-select mr-sm-2 text-capitalize" id="inquiry_id" name="inquiry_id">
                                        <!-- <option value="0">Choose...</option> -->
                                            <option value="{{$inquiry->id}}">{{$inquiry->package_inquiry}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group px-4">
                                <div class="col-12 col-md-12">
                                    <label class="form-control-label"><strong>Question</strong></label>
                                    <textarea class="form-control" name="question" id="texteditor1" cols="200"></textarea>
                                    {{-- <small class="form-text text-muted">This is a help text</small> --}}
                                </div>
                            </div>

                            <div class="row form-group px-4">
                                <div class="col-12 col-md-12">
                                    <label class="form-control-label"><strong>Description</strong></label>
                                    <textarea class="form-control" name="description" id="texteditor2"></textarea>
                                    {{-- <small class="form-text text-muted">This is a help text</small> --}}
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 px-4">
                                    <div class="col-md-3">
                                        <label class="form-control-label"><strong>Type Option</strong></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="custom-select mr-sm-2" id="type_option" name="type_option">
                                            <option value="0">Choose...</option>
                                            <option value="essay">Essay</option>
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="check_list">Check List</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row option" style="display:none">
                                    <div class="col-md-3">
                                        <label class="form-control-label"><strong>Option Value</strong></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="option">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-primary" id="add">Add</button>
                                    </div>
                                </div>                                                           
                            </div>
                            <!-- <span class="temporary"></span> -->
                            <div class="col-md-12 form-group option_value px-4"  style="display:none">
                                <label class="form-control-label mb-2"><strong>Option Value</strong></label>
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Option</th>
                                            <th scope="col">Config</th>
                                        </tr>
                                    </thead>
                                    <tbody class="value">
                                        <tr class="number">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="pull-right">
                            <input type="button" value="save" id="save" class="btn btn-success">
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<a href="{{url('inquiry')}}" class="btn btn-info" role="button">Link Button</a>
<div class="content mt-3">
    <div class="animated fadeIn">                    
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Question List</strong>
                    </div>
                    <div class="card-body card-block">                            
                        <div class="form-group col-md-12 mt-4">
                            <table class="table table-lg table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Package Inqueries</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Type Option</th>
                                        <th scope="col">Option</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <?php $no=1; ?>
                                @foreach ($question as $data)
                                <tbody>
                                    <tr>
                                        <th scope="row" class="number">{{$no++}}</th>
                                        <td class="text-capitalize">{{$data->package_inquiry}}</td>
                                        <td class="text-capitalize">{!!$data->question!!}</td>
                                        <td class="text-capitalize">{{$data->type_option}}</td>
                                        <td class="text-capitalize">{{$data->option}}</td>
                                        <td class="row">
                                            <a href="#" data-toggle="modal" data-target="#modal-edit-company" type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>&nbsp;
                                            <form id="delete-form" action="{{ url('inquiry/destroyQuestion'.$data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-md " value="delete" id="delete">
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
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')

<script>
    $(function()
    {
        CKEDITOR.replace( 'texteditor1' );
        CKEDITOR.replace( 'texteditor2' );
    });
    
    $(window).on('load', function()
    {   
        $('select[name="type_option"]:first').val('essay')
        document.getElementById("option").innerHTML = "<input type='text' class='form-control' name='option[]' value='essay' id='x'>";
    });

    $('#type_option').on('click', function()
    {
        var selected = $(this).val();
        // if(selected == 'essay')
        // {
        //     $('.option').hide();
        // }
        if(selected == 'multiple_choice' || selected == 'check_list')
        {
            $( "#x" ).prop( "disabled", true );
            $('.option').show();
            $('#option').val('');
        }
        if(selected == '0')
        {
            $('.option').hide();
            $('#option').val('');
        }
    });

    var count=1;
    $('#add').on('click', function()
    {        
        var option = $('#option').val();
        document.getElementById("myTable").insertRow(-1).innerHTML = "<td>"+ (count++) +"</td><td><input type='text' class='form-control' name='option[]' value='"+option+"'></td><td><button type='button' class='remove_option'>Delete</button></td>";
        $('#option').val('');
        $('.option_value').show();
        $('.value').on('click', '.edit_option', function(e)
        {
            $('#option').val(option);
            e.preventDefault();
            $(this).parent().parent().remove();
        });
        $('.value').on('click', '.remove_option', function(e)
        {
            e.preventDefault();
            $(this).parent().parent().remove();
        }); 
    });

    $(document).on('click', '#save', function()
    {
        var texteditor1     = CKEDITOR.instances['texteditor1'].getData();
        var texteditor2     = CKEDITOR.instances['texteditor2'].getData();
        var typequestion    = $('#inquiry_id');
        var typeoption      = $('#type_option');
        var value           = $('.value');

        if(texteditor1 == '' || texteditor2 == '')
        {
            swal('Please fill out project question field','');
            center.focus();
            return false;
        }
        if (typequestion.val()=='0' || typeoption.val()=='0')
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
                        $('#save-form').submit();
                    }
                });
        }
    });

    $(document).on('click', '#delete', function()
    {
        swal({
                title: 'Delete Question?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }).then((result) => 
            {
                if (result.value) 
                {
                    // $('#delete-form').submit();
                }
            });
    });
</script>

@endpush

@endsection
