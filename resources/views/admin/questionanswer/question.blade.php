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
        <form id="job-form" action="{{ route('question.store') }}" method="post" enctype="multipart/form-data" >
            {{csrf_field()}}
            <input type="hidden" name="question_id">            
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
                                    <select class="custom-select mr-sm-2" name="type_question">
                                        <option value="0">Choose...</option>
                                        <option value="test">Test</option>
                                        <option value="interview">Interview</option>
                                        <option value="quisioner">Quisioner</option>
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
                                        <label class="form-control-label"><strong>Type Answer</strong></label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="custom-select mr-sm-2" id="type_answer" name="type">
                                            <option value="0">Choose...</option>
                                            <option value="essay">Essay</option>
                                            <option value="multiple_choice">Multiple Choice</option>
                                            <option value="check_list">Check List</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 row answer">
                                    <div class="col-md-3">
                                        <label class="form-control-label"><strong>Answer Option</strong></label>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control" id="answer">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-primary" id="add">Add</button>
                                    </div>
                                </div>                                                           
                            </div>
                
                            <!-- <span class="temporary"></span> -->
                            <div class="col-md-12 form-group answer_value px-4"  style="display:none">
                                <label class="form-control-label mb-2"><strong>Answer Value</strong></label>
                                <table class="table table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Answer</th>
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

    $('#type_answer').on('change', function()
    {
        var selected = $(this).val();
        if(selected != '0' && selected != 'essay')
        {
            $('.answer').show();
        }
        else
        {
            $('.answer').hide();
            $('.answer_value').hide();
        }
    });

    var count=1;
    $('#add').on('click', function()
    {        
        var answer = $('#answer').val();
        document.getElementById("myTable").insertRow(-1).innerHTML = "<td>"+ (count++) +"</td><td><input type='text' class='form-control' name='answer[]' value='"+answer+"'></td><td><button type='button' class='remove_answer'>Delete</button></td>";
        $('#answer').val('');
        $('.answer_value').show();
        $('.value').on('click', '.edit_answer', function(e)
        {
            $('#answer').val(answer);
            e.preventDefault();
            $(this).parent().parent().remove();
        });
        $('.value').on('click', '.remove_answer', function(e)
        {
            e.preventDefault();
            $(this).parent().parent().remove();
        }); 
    });

    $(document).on('click', '#save', function()
    {
        var texteditor1     = CKEDITOR.instances['texteditor1'].getData();
        var texteditor2     = CKEDITOR.instances['texteditor2'].getData();
        var type            = $('#type');

        if(texteditor1 == '' || texteditor2 == '')
        {
            swal('Please fill out project question field','');
            center.focus();
            return false;
        }
        if (type.val()=='0' )
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
