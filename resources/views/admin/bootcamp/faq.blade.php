@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp FAQ</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp FAQ</li>
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
                            <h5>
                                <strong class="card-title mb-3">FAQ</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-faq" type="button" class="btn btn-primary btn-sm">Add FAQ</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="faq-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($faq as $item)
                                                <tr>
                                                    <td>{{$nofaq++}}</td>
                                                    <td>{{$item->quest}}</td>
                                                    <td>{{$item->answ}}</td>
                                                    <td align="center">
                                                        <a href="#edit-faq" data-faq_id="{{$item->faq_id}}" data-toggle="modal" data-target="#modal-edit-faq" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-faq" data-deletefaq="{{$item->faq_id}}" data-toggle="modal" data-target="#modal-hapus-faq" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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

    <div class="modal fade" id="modal-add-faq">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add FAQ</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('faq.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Question <br>
                        <input type="text" name="quest"  class="form-control" placeholder="Question"> <br>
                        Answer
                        <input type="text" name="answ"  class="form-control" placeholder="Answer"> <br>
                        <br>
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

        <div class="modal fade" id="modal-edit-faq">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit FAQ</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-faq" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="faq_id" id="faq_id">
                            Question <br>
                            <input type="text" name="quest" id="question" class="form-control" placeholder="Question"> <br>
                            Answer
                            <input type="text" name="answ" id="answer" class="form-control" placeholder="Answer"> <br>
                             <br>
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

            <div class="modal fade" id="modal-hapus-faq">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletefaq" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="submitDelete()" value="Submit">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>


    @push('script')
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
          {{-- <script src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script> --}}
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/yadcf/0.9.2/jquery.dataTables.yadcf.min.js"></script>
          <script>
              $(document).ready(function() {
                $('#faq-table').DataTable();
              });

              

              $(document).on('click','a[href="#edit-faq"]',function(e){
                    var faqid = $(this).data('faq_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editfaq/'+faqid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#faq_id').val(data.faq_id);
                            $('#question').val(data.quest);
                            $('#answer').val(data.answ);
                            var url2 = '{{ route("faq.update", ":faq_id") }}';
                            url2 = url2.replace(':faq_id', faqid);
                            $("#form-edit-faq").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-faq"]',function(){
                var delico = $(this).data('deletefaq');
                var urlico = '{{ route("faq.delete", ":delico") }}';
                urlico = urlico.replace(':delico', delico);
                $("#formdeletefaq").attr('action', urlico);
              });
          </script>
    @endpush

@endsection