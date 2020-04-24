$(document).ready(function(){
    all_table;
    unprocess_table;
    interview_table;
    hired_table;
    reject_table;

});

function reload(){
    all_table.ajax.reload();
    unprocess_table.ajax.reload();
    interview_table.ajax.reload();
    hired_table.ajax.reload();
    reject_table.ajax.reload();
}

var all_table = $('#all-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.all')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_apply_created_date",defaultColumn:"-",visible:true},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

$(document).on('click', '#delete_all', function(){
    var id = [];
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

                $('.all_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('delete.allf')}}",
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
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});

var unprocess_table = $('#unprocess-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.unprocess')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",orderable:false,searchable:false},
        {data:"jobs_apply_created_date",defaultColumn:"-",visible:true},
        {data:"jobs_title",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",orderable:false,searchable:false},
        ]
});

$(document).on('click', '#multi_delete', function(){
    var id = [];
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

                $('.unprocess_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('delete.unprocess')}}",
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
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});

$(document).on('click', '#move', function(){
    var id = [];
    var data = $('#status_unprocess').val();
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

                $('.unprocess_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                            $.ajax({
                            url:"{{ route('move.unprocess')}}",
                            method: "get",
                            data :{id:id, data:data},
                            success:function(response)
                            {
                                if(response == 'success'){
                                swal('Success','Data have been moved','success');
                                
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
                }
           });
});




var interview_table = $('#interview-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.interview')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",defaultColumn:"-",orderable:false,searchable:false},               
        {data:"jobs_apply_created_date",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_gender",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",orderable:false,searchable:false}
        ]
});

$(document).on('click', '#delete_interview', function(){
    var id = [];
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

                $('.interview_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('delete.interview')}}",
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
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});


$(document).on('click', '#move_interview', function(){
    var id = [];
    var data = $('#status_interview').val();
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

                $('.interview_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                            $.ajax({
                            url:"{{ route('move.interview')}}",
                            method: "get",
                            data :{id:id, data:data},
                            success:function(response)
                            {
                                if(response == 'success'){
                                swal('Success','Data have been moved','success');
                                
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
                }
           });
});


var hired_table = $('#hired-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.hired')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",defaultColumn:"-",orderable:false,searchable:false},
        {data:"jobs_apply_created_date",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_gender",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",orderable:false,searchable:false}
        ]
});

$(document).on('click', '#delete_hired', function(){
    var id = [];
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

                $('.hired_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('delete.hired')}}",
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
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});

$(document).on('click', '#move_hired', function(){
    var id = [];
    var data = $('#status_hired').val();
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

                $('.hired_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                            $.ajax({
                            url:"{{ route('move.hired')}}",
                            method: "get",
                            data :{id:id, data:data},
                            success:function(response)
                            {
                                if(response == 'success'){
                                swal('Success','Data have been moved','success');
                                
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
                }
           });
});

var reject_table = $('#reject-table').DataTable({
        autoWidth:false,
        filter:true,
        info:false,
        paging:true,
        processing:false,
        ajax:{
            url:"{{route('fulltime.reject')}}",
            type:"GET"
        },
        columns:[
        {data:"checkbox",defaultColumn:"-",orderable:false,searchable:false},
        {data:"jobs_apply_created_date",defaultColumn:"-",visible:true},
        {data:"jobs_apply_name",defaultColumn:"-",visible:true},
        {data:"jobs_apply_gender",defaultColumn:"-",visible:true},
        {data:"jobs_apply_email",defaultColumn:"-",visible:true},
        {data:"jobs_apply_phone",defaultColumn:"-",visible:true},
        {data:"action",defaultColumn:"-",orderable:false,searchable:false}
        ]
});

$(document).on('click', '#delete_reject', function(){
    var id = [];
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

                $('.reject_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                        $.ajax({
                            url:"{{ route('delete.reject')}}",
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
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
            }
            
        });
});

$(document).on('click', '#move_reject', function(){
    var id = [];
    var data = $('#status_reject').val();
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

                $('.reject_checkbox:checked').each(function(){
                id.push($(this).val());
                });

                    if(id.length > 0)
                    {
                            $.ajax({
                            url:"{{ route('move.reject')}}",
                            method: "get",
                            data :{id:id, data:data},
                            success:function(response)
                            {
                                if(response == 'success'){
                                swal('Success','Data have been moved','success');
                                
                                 }
                                 reload();
                            }
                        });
                    }
                    else{
                        swal('Error', 'Please select some data', 'error');
                    }
                }
           });
});
