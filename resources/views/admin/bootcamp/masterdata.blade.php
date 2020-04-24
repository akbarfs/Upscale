@extends('admin.layout.apps')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Bootcamp MasterData</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="active">Bootcamp MasterData</li>
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
                                <strong class="card-title mb-3">Fasilitas</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-fasilitas" type="button" class="btn btn-primary btn-sm">Add Fasilitas</button>
                                </div>

                                <div class="nav nav-pills pull-right pr-2">
                                    <button  type="button" id="bfas" class="btn btn-primary btn-sm more_btn">Toggle</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body" id="card-body-fas">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="fasilitas-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Nama Fasilitas</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($fas as $item)
                                                <tr>
                                                    <td>{{$nofas++}}</td>
                                                    <td>{{$item->fasilitas_name}}</td>
                                                    <td align="center">
                                                        <a href="#edit-fasilitas" data-fasilitasid="{{$item->id}}" data-toggle="modal" data-target="#modal-edit-fasilitas" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-fasilitas" data-idhapusfasilitas="{{$item->id}}" data-toggle="modal" data-target="#modal-hapus-fasilitas" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
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

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <strong class="card-title mb-3">Icon Software</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-icon" type="button" class="btn btn-primary btn-sm">Add Icon</button>
                                </div>
                                
                                <div class="nav nav-pills pull-right pr-2">
                                    <button  type="button" id="bicon" class="btn btn-primary btn-sm more_btn">Toggle</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body" id="card-body-icon">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="icon-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Nama Icon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($ico as $ico)
                                                <tr>
                                                    <td>{{$noico++}}</td>
                                                    <td>{{$ico->icon_name}}</td>
                                                    <td align="center">
                                                        <a href="#edit-icon" data-iconid="{{$ico->icon_id}}" data-toggle="modal" data-target="#modal-edit-icon" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-icon" data-deleteico="{{$ico->icon_id}}" data-toggle="modal" data-target="#modal-hapus-icon" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
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

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <strong class="card-title mb-3">Mentor</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-mentor" type="button" class="btn btn-primary btn-sm">Add Mentor</button>
                                </div>

                                <div class="nav nav-pills pull-right pr-2">
                                    <button  type="button" id="bmentor" class="btn btn-primary btn-sm more_btn">Toggle</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body" id="card-body-mentor">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="mentor-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Nama</th>
                                                <th>Tempat Kerja</th>
                                                <th>Skill</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($mentor as $item)
                                                <tr>
                                                    <td>{{$nomen++}}</td>
                                                    <td>{{$item->mentor_name}}</td>
                                                    <td>{{$item->mentor_work}}</td>
                                                    <td>{{$item->mentor_skill}}</td>
                                                    <td align="center">
                                                        <a href="#edit-mentor" data-mentorid="{{$item->mentor_id}}" data-toggle="modal" data-target="#modal-edit-mentor" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-mentor" data-idhapusmentor="{{$item->mentor_id}}" data-toggle="modal" data-target="#modal-hapus-mentor" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
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

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <strong class="card-title mb-3">Soal</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-soal" type="button" class="btn btn-primary btn-sm">Add Soal</button>
                                </div>

                                <div class="nav nav-pills pull-right pr-2">
                                    <button id="bsoal" type="button" class="btn btn-primary btn-sm more_btn">Toggle</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body" id="card-body-soal">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="soal-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Filename</th>
                                                <th>Class</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($soal as $it)
                                                <tr>
                                                    <td>{{$no++}}</td>
                                                    <td>{{$it->file_name}}</td>
                                                    <td>{{$it->class_name}}</td>
                                                    <td align="center">
                                                        <a href="#edit-soal" data-soal_id="{{$it->soal_id}}" data-toggle="modal" data-target="#modal-edit-soal" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-soal" data-hapid="{{$it->soal_id}}" data-toggle="modal" data-target="#modal-hapus-soal" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
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

<div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <strong class="card-title mb-3">Location</strong>
                                <div class="nav nav-pills pull-right">
                                    <button data-toggle="modal" data-target="#modal-add-location" type="button" class="btn btn-primary btn-sm">Add Location</button>
                                </div>

                                <div class="nav nav-pills pull-right pr-2">
                                    <button id="blocation" type="button" class="btn btn-primary btn-sm more_btn">Toggle</button>
                                </div>
                            </h5>
                        </div>
                        <div class="card-body" id="card-body-location">
                            <div class="tab-content">
                                <div class="tab-pane fade show active">
                                    <table id="location-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>City</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($loc as $loc)
                                                <tr>
                                                    <td>{{$nol++}}</td>
                                                    <td>{{$loc->loc_city}}</td>
                                                    <td>{{$loc->loc_address}}</td>
                                                    <td align="center">
                                                        <a href="#edit-location" data-loc_id="{{$loc->loc_id}}" data-toggle="modal" data-target="#modal-edit-location" type="button" class="btn-info btn btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="#hapus-location" data-haploc="{{$loc->loc_id}}" data-toggle="modal" data-target="#modal-hapus-location" type="button" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i></a>
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

        <div class="modal fade" id="modal-add-fasilitas">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Fasilitas</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('fasilitas.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        Nama Fasilitas <br>
                        <input type="text" name="fasilitas_name"  class="form-control" placeholder="Nama Fasilitas"> <br>
                        Icon Fasilitas <br>
                        <input type="file" id="upload-pic" name="fasilitas_icon" accept=".jpg, .png, .jpeg, .svg" /> <br>
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

        <div class="modal fade" id="modal-edit-fasilitas">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Fasilitas</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-fasilitas" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            Nama Fasilitas <br>
                            <input type="text" name="fasilitas_name"  id="fasilitas_name" class="form-control" placeholder="Nama Fasilitas"> <br>
                            Icon Fasilitas <br>
                            <input type="file" id="upload-pic" name="fasilitas_icon" accept=".jpg, .png, .jpeg" /> <br>
                             <br>
                            @if(!empty($fas->fasilitas_icon))
                                <img id="blah" src="{{asset('storage/fasilitas/'.$fas->fasilitas_name)}}" style="height: auto; width: auto; margin: auto;" class="img-responsive">
                            @endif
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

            <div class="modal fade" id="modal-hapus-fasilitas">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletefasilitas" method="post" enctype="multipart/form-data">
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

        <div class="modal fade" id="modal-add-icon">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Icon</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-add-icon" action="{{route('icon.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        Nama Icon <br>
                        <input type="text" name="icon_name" id="icon_name" class="form-control" placeholder="Nama Icon"> <br>
                        Icon Image <br>
                        <input type="file" id="upload-ico" name="icon_image" class="form-control" accept=".jpg, .png, .jpeg, .svg" /> <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="button" id="save" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-icon">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Icon</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-icon" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="icon_id" id="icon_id">
                            Nama Icon <br>
                            <input type="text" name="icon_name"  id="iconname" class="form-control" placeholder="Nama Icon"> <br>
                            Icon Image <br>
                            <input type="file" id="upload-ico" name="icon_image" class="form-control" accept=".jpg, .png, .jpeg, .svg" /> <br>
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

        <div class="modal fade" id="modal-hapus-icon">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeleteicon" method="post" enctype="multipart/form-data">
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

        <div class="modal fade" id="modal-add-mentor">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Mentor</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('mentor.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        Nama Mentor <br>
                        <input type="text" name="mentor_name"  class="form-control" placeholder="Nama Mentor"> <br>
                        Tempat Kerja Mentor
                        <input type="text" name="mentor_work"  class="form-control" placeholder="Tempat Kerja Mentor"> <br>
                        Deskripsi Mentor
                        <textarea class="form-control" name="mentor_desc" placeholder="Deskripsi Mentor"></textarea> <br>
                        Skill Mentor
                        <input type="text" name="mentor_skill"  class="form-control" placeholder="Skill Mentor"> <br>
                        Photo Mentor <br>
                        <input type="file" id="upload-pic" name="mentor_photo" accept=".jpg, .png, .jpeg" /> <br>
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

        <div class="modal fade" id="modal-edit-mentor">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Mentor</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-mentor" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="mentor_id" id="mentor_id">
                            Nama Mentor <br>
                            <input type="text" name="mentor_name"  id="mentor_name" class="form-control" placeholder="Nama Mentor"> <br>
                            Tempat Kerja Mentor
                            <input type="text" name="mentor_work"  id="mentor_work" class="form-control" placeholder="Tempat Kerja Mentor"> <br>
                            Deskripsi Mentor
                            <textarea class="form-control" name="mentor_desc" id="mentor_desc" placeholder="Deskripsi Mentor"></textarea> <br>   
                            Skill Mentor
                            <input type="text" name="mentor_skill"  id="mentor_skill" class="form-control" placeholder="Skill Mentor"> <br>
                            Photo Mentor <br>
                            <input type="file" id="upload-pic" name="mentor_photo" accept=".jpg, .png, .jpeg" /> <br>
                             <br>
                            @if(!empty($mentor->mentor_photo))
                                <img id="blah" src="{{asset('storage/mentor/'.$mentor->mentor_name)}}" style="height: auto; width: auto; margin: auto;" class="img-responsive">
                            @endif
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

            <div class="modal fade" id="modal-hapus-mentor">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletementor" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="modal-body">
                                    <input type="hidden" name="mentor_id" id="mentor_id">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="submitdeletementor()" value="Submit">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

            <div class="modal fade" id="modal-add-soal">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Soal</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{route('soal.add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        File Name <br>
                        <input type="text" name="file_name"  class="form-control" placeholder="File Name"> <br>
                        Class
                        <select name="t_materi_soal"  class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($class as $class)
                                    <option value="{{$class->class_id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select> <br>
                        Upload File <br>
                        <input type="file" id="file_soal" name="file_soal" accept=".doc, .docx, .pdf">
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

        <div class="modal fade" id="modal-edit-soal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Soal</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-soal" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-body">
                            <input type="hidden" name="soal_id" id="soal_id">
                            File Name <br>
                            <input type="text" name="file_name" id="file_name" class="form-control" placeholder="File Name"> <br>
                            Class
                            <select name="t_materi_soal" id="materisoal" class="form-control">
                                <option value="" disabled>Pilih</option>
                                @foreach ($cla as $cla)
                                        <option value="{{$cla->class_id}}">{{$cla->class_name}}</option>
                                @endforeach
                            </select> <br>
                            Upload File <br>
                            <input type="file" id="file_soal" name="file_soal" accept=".doc, .docx, .pdf">
                            
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

            <div class="modal fade" id="modal-hapus-soal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletesoal" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <input type="hidden" name="soal_id" id="soal_id">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="deletesoal()" value="Submit">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

        <div class="modal fade" id="modal-add-location">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add Location</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="form-add-location" action="{{route('location.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        City <br>
                        <input type="text" name="loc_city" id="loc_city" class="form-control" placeholder="City"> <br>
                        Address <br>
                        <input type="text" name="loc_address" id="loc_address" class="form-control" placeholder="Address"> <br>
                        Maps (iframe from Google Maps) <br>
                        <input type="text" name="loc_maps" id="loc_maps" class="form-control" placeholder="Maps"> <br>
                        <br>
                    </div>
                    <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <div class="nav nav-pills pull-right">
                            <button type="button" id="savelocation" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </div>

        <div class="modal fade" id="modal-edit-location">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Edit Location</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="" id="form-edit-location" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="modal-body">
                            <input type="hidden" name="loc_id" id="loc_id">
                            City <br>
                            <input type="text" name="loc_city" id="loccity" class="form-control" placeholder="City"> <br>
                            Address <br>
                            <input type="text" name="loc_address" id="locaddress" class="form-control" placeholder="Address"> <br>
                            Maps (iframe from Google Maps) <br>
                            <input type="text" name="loc_maps" id="locmaps" class="form-control" placeholder="Maps"> <br>
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

        <div class="modal fade" id="modal-hapus-location">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Confirmation</h5>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" id="formdeletelocation" method="post">
                                @csrf
                                
                                <div class="modal-body">
                                    <h6 align="center">Apa anda yakin untuk menghapusnya ?</h6>
                                </div>
                                <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                                    <div class="nav nav-pills pull-right">
                                        <button type="submit" class="btn btn-danger" onclick="submitDeleteLoc()" value="Submit">Hapus</button>
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

$( function() {
    $( ".card-body" ).hide();
  } );

  $(document).ready(function(){
  $("#bfas").click(function(){
    $("#card-body-fas").toggle();
  });
});
$(document).ready(function(){
  $("#bicon").click(function(){
    $("#card-body-icon").toggle();
  });
});
$(document).ready(function(){
  $("#bmentor").click(function(){
    $("#card-body-mentor").toggle();
  });
});
$(document).ready(function(){
  $("#bsoal").click(function(){
    $("#card-body-soal").toggle();
  });
});
$(document).ready(function(){
  $("#blocation").click(function(){
    $("#card-body-location").toggle();
  });
});
              $(document).ready(function() {
                $('#fasilitas-table').DataTable();
              });

              

              $(document).on('click','a[href="#edit-fasilitas"]',function(e){
                    var fasid = $(this).data('fasilitasid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editfasilitas/'+fasid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#id').val(data.id);
                            $('#fasilitas_name').val(data.fasilitas_name);
                            var url2 = '{{ route("fasilitas.update", ":id") }}';
                            url2 = url2.replace(':id', fasid);
                            $("#form-edit-fasilitas").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-fasilitas"]',function(){
                var fashapus = $(this).data('idhapusfasilitas');
                var urlhapus = '{{ route("fasilitas.delete", ":fashapus") }}';
                urlhapus = urlhapus.replace(':fashapus', fashapus);
                $("#formdeletefasilitas").attr('action', urlhapus);
              });

              function submitDelete(){
                    $('#formdeletefasilitas').submit();
              }

              $(document).on('click', '#save', function(){
                  var iconname = $('#icon_name');
                  var iconimage = $('#upload-ico');

                  if(iconname.val() == ''){
                      swal('Please fill out Icon Name field','');
                        iconname.focus();
                        return false;
                  }
                  if(iconimage.val() == ''){
                      swal('No File Choosen','');
                        iconimage.focus();
                        return false;
                  }
                  else{
                    swal({
                  title: 'Save Icon?',
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
                                $('#form-add-icon').submit();
                            }
                        });
                    }
              });

              $(document).on('click','a[href="#edit-icon"]',function(e){
                    var iconid = $(this).data('iconid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editicon/'+iconid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#icon_id').val(data.icon_id);
                            $('#iconname').val(data.icon_name);
                            var uico = '{{ route("icon.update", ":id") }}';
                            uico = uico.replace(':id', iconid);
                            $("#form-edit-icon").attr('action', uico);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-icon"]',function(){
                var delico = $(this).data('deleteico');
                var urlico = '{{ route("icon.delete", ":delico") }}';
                urlico = urlico.replace(':delico', delico);
                $("#formdeleteicon").attr('action', urlico);
              });

              $(document).on('click','a[href="#edit-mentor"]',function(e){
                    var menid = $(this).data('mentorid');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/masterdata/editmentor/'+menid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#mentor_id').val(data.mentor_id);
                            $('#mentor_name').val(data.mentor_name);
                            $('#mentor_work').val(data.mentor_work);
                            $('#mentor_desc').val(data.mentor_desc);
                            $('#mentor_skill').val(data.mentor_skill);
                            var url2 = '{{ route("mentor.update", ":mentor_id") }}';
                            url2 = url2.replace(':mentor_id', menid);
                            $("#form-edit-mentor").attr('action', url2);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-mentor"]',function(){
                var mentorhapus = $(this).data('idhapusmentor');
                var urlhapusidmentor = '{{ route("mentor.delete", ":mentorhapus") }}';
                urlhapusidmentor = urlhapusidmentor.replace(':mentorhapus', mentorhapus);
                $("#formdeletementor").attr('action', urlhapusidmentor);
              });

              function submitdeletementor(){
                    $('#formdeletementor').submit();
              }

              $(document).on('click','a[href="#edit-soal"]',function(e){
                    var sid = $(this).data('soal_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/materi/editsoal/'+sid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            $('#soal_id').val(data.soal_id);
                            $('#file_name').val(data.file_name);
                            $('#materisoal option[value="'+data.id_materi+'"]').prop('selected', true);
                            var urledit = '{{ route("soal.update", ":soal_id") }}';
                            urledit = urledit.replace(':soal_id', sid);
                            $("#form-edit-soal").attr('action', urledit);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-soal"]',function(){
                var hapid = $(this).data('hapid');
                var urlsoal = '{{ route("soal.delete", ":hapid") }}';
                urlsoal = urlsoal.replace(':hapid', hapid);
                $("#formdeletesoal").attr('action', urlsoal);
              });

              function deletesoal(){
                    $('#formdeletesoal').submit();
              }

              $(document).on('click', '#savelocation', function(){
                  var loc_city = $('#loc_city');
                  var loc_address = $('#loc_address');
                  var loc_maps = $('#loc_maps');

                  if(loc_city.val() == ''){
                      swal('Please fill out City field','');
                        loc_city.focus();
                        return false;
                  }
                  if(loc_address.val() == ''){
                      swal('Please fill out Address field','');
                        loc_address.focus();
                        return false;
                  }
                  if(loc_maps.val() == ''){
                      swal('Please fill out Maps field','');
                        loc_maps.focus();
                        return false;
                  }
                  else{
                    swal({
                  title: 'Save Location?',
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
                                $('#form-add-location').submit();
                            }
                        });
                    }
              });

              $(document).on('click','a[href="#edit-location"]',function(e){
                    var locid = $(this).data('loc_id');
                    $.ajax({
                        headers:{ 'csrftoken' : '{{ csrf_token() }}' },
                        url:'/admin/bootcamp/editlocation/'+locid,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            $('#loc_id').val(data.loc_id);
                            $('#loccity').val(data.loc_city);
                            $('#locaddress').val(data.loc_address);
                            $('#locmaps').val(data.loc_maps);
                            var uloc = '{{ route("location.update", ":id") }}';
                            uloc = uloc.replace(':id', locid);
                            $("#form-edit-location").attr('action', uloc);
                        }
                    });
              });

              $(document).on('click','a[href="#hapus-location"]',function(){
                var haploc = $(this).data('haploc');
                var delloc = '{{ route("location.delete", ":haploc") }}';
                delloc = delloc.replace(':haploc', haploc);
                $("#formdeletelocation").attr('action', delloc);
              });

              function submitDeleteLoc(){
                    $('#formdeletelocation').submit();
              }

          </script>
    @endpush
@endsection