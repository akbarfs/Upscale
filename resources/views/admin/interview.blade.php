@extends('admin.layout.apps')

@section('content')
<style>

    .notActive{
        color: #3276b1;
        background-color: #fff !important;
    }
</style>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report Interview</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li><a href="{{route('jobsapply')}}">Jobs Apply</a></li>
                    <li><a href="{{route('jobsapply.detail').'?id='.$all->jobs_apply_id}}">Detail</a></li>
                    <li class="active">Interview</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3">
    @php
    $today = date("Y-m-d H:i:s");
    $date = $interview->interview_schedule;
    @endphp

    @if($date > $today)
    <div class="alert alert-danger fade out show" role="alert">
        <strong>Perhatian!</strong> Saat ini belum jadwal interview!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="animated fadeIn">
        <form id="job-form" action="{{route('interview.simpanreport')}}" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="jobs_apply_id" value="{{$all->jobs_apply_id}}">

        <input type="hidden" name="interview_id" value="{{$interview->interview_id}}">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                    <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <aside class="profile-nav alt">
                                <section class="card">
                                    <div class="card-header">
                                            <strong class="card-title mb-3">Curriculum Vitae</strong>
                                        </div>
                                    <div class="card-body">
                                        <object data="{{"data:application/pdf;base64,".$all->jobs_apply_cv}}" style="height:1000px;width:100%"></object>
                                    </div>
                                    
                                </section>
                            </aside>
                        </div>
            </div>
                <div class="col-md-5" id='kolom-isian'>
                        
                    <div class="card">
                      <div class="card-header">
                        <strong>Penilaian</strong><a id='simpan-penilaian'style='color : #fff !important;' class="pull-right btn-xs btn btn-success">Simpan Penilaian</a>
                      </div>
                      <div class="card-body card-block">
                            <div class="row">
                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Nama Pelamar</label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12"><input id='tes'class="form-control" type="text" value="{{$all->jobs_apply_name}}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Tempat, Tanggal Lahir</label></div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12"><input id='tes'class="form-control" type="text" value="{{$all->jobs_apply_place_of_birth.", ".$all->jobs_apply_birth_date}}" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Posisi Yang Diajukan</label></div>
                            </div>
                            <div class="row form-group">
                                    <div class="col-md-12"><input id='tes'class="form-control" type="text" value="{{$all->jobs_title}}" readonly></div>
                            </div>
                        <div class="row">   
                            <div class="col-md-12"><label for="text-input" class=" form-control-label">Status Pernikahan</label></div>
                          </div>
                          <div class="row form-group">
                                <div class="col-md-12 btn-group" id="radioBtn" >
                                    <a class="btn btn-primary btn-xs active" data-toggle="status-pernikahan" data-title="0">Belum Menikah</a>
                                    <a class="btn btn-primary btn-xs notActive" data-toggle="status-pernikahan" data-title="1">Sudah Menikah</a>
                                    <input type="hidden" id="status-pernikahan" value='0'name="interview_marriage_status">
                                </div>
                          </div>

                                <div class="row">
                                    <div class="col-md-12"><label for="text-input" class=" form-control-label">Deskripsi Karakter</label>
                                </div>
                                </div>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <textarea class="form-control" id="interview_character_desc" name="interview_character_desc"></textarea>  
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-12"><label for="text-input" class=" form-control-label">Skill</label>
                                        </div>
                                        </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <select style='width:100% !important;' class="pilihan-skill" id='skill'name="interview_skill_names[]" multiple="multiple">
                                                        <option value="PHP">PHP</option>
                                                        <option value="CSS">CSS</option>
                                                        <option value="Javascript">Javascript</option>
                                                        <option value="C++">C++</option>
                                                        <option value="Laravel">Laravel</option>
                                                        <option value="Codeigniter">Codeigniter</option>
                                                        <option value="Bootsrap">Bootsrap</option>
                                                        <option value="JQuery">JQuery</option>
                                                        <option value="JavaScript">JavaScript</option>
                                                    </select>  
                                                </div>
                                            </div>
                                        </div>
                                </div>    
                                <div id='exp-card-header-1' style='margin-bottom : 0px !important;' class="card exp-card">
                                    <div class="card-header">
                                        <a href="#exp-card-header-1" class='tampilkan-exp-card' ><strong>Experience Highlight</strong></a><a ><i style='top:5px !important;'class="tambah pull-right fa fa-plus-circle"></i></a>
                                    </div>
                                    <div class="collapse">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Nama Perusahaan</label></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12"><input class="form-control" type="text" placeholder="Nama Perusahaan..." name="interview_experience_names[]"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Tahun</label></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <select class="form-control" name="interview_experience_years[]">
                                                        <option selected disabled value=''>Pilih Tahun masuk</option>
                                                        @for ($i = 2018; $i >= 1990; $i--)
                                                        <option  value='{{$i}}'>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Posisi</label></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12"><input class="form-control" type="text" placeholder="Posisi.." name="interview_experience_poses[]"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"><label for="text-input" class=" form-control-label">Deskripsi Tanggung Jawab</label></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-md-12"><textarea class="form-control" id="interview_experience_descs" name="interview_experience_descs[]"></textarea></div> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>     
                            </div>
                      </div>
                    </div>
                </div>

                

        </div>
        <input type="submit" hidden id="kirim-data-sekarang">
    </form>
    </div>
</div>
<!-- /#right-panel -->

<!-- /.row -->

<!-- /.container-fluid -->
@push('script')
<script src="{{asset('admin/js/select2.min.js')}}"></script>

<script>
    function toggleAlert(){
    $(".alert").toggleClass('in out'); 
    return false; // Keep close.bs.alert event from removing from DOM
}

    $(document).ready(function(e){
        var interview_schedule = "{{$interview->interview_schedule}}";
        if(moment(interview_schedule, 'YYYY-MM-DD, h:m:s').isAfter(moment().format('YYYY-MM-DD, h:m:s'))){
            toggleAlert();
        }
    });
    var i = 1;
    $(document).on('click', '.tambah', function(e){
        e.preventDefault();
        i++;
        var element = "<div style='margin-bottom : 10px !important;' id='exp-card-header-" + i + "' class='card exp-card'><div class='card-header'><a href='#exp-card-header-" + i + "'class='tampilkan-exp-card' ><strong>Experience Highlight</strong></a><a ><i style='top:5px !important;'class='tambah pull-right fa fa-plus-circle'></i></a></div><div class='collapse'><div class='card-body'><div class='row'><div class='col-md-12'><label for='text-input' class=' form-control-label'>Nama Perusahaan</label></div></div><div class='row form-group'><div class='col-md-12'><input class='form-control' type='text' placeholder='Nama Perusahaan...' name='interview_experience_names[]'></div></div><div class='row'><div class='col-md-12'><label for='text-input' class=' form-control-label'>Tahun</label></div></div><div class='row form-group'><div class='col-md-12'><select class='form-control' name='interview_experience_years[]'><option selected disabled value=''>Pilih Tahun masuk</option>@for ($i = 2018; $i >= 1990; $i--)<option  value='{{$i}}'>{{$i}}</option>@endfor</select></div></div><div class='row'><div class='col-md-12'><label for='text-input' class=' form-control-label'>Posisi</label></div></div><div class='row form-group'><div class='col-md-12'><input class='form-control' type='text' placeholder='Posisi..' name='interview_experience_poses[]'></div></div><div class='row'><div class='col-md-12'><label for='text-input' class=' form-control-label'>Deskripsi Tanggung Jawab</label></div></div><div class='row form-group'><div class='col-md-12'><textarea class='form-control' id='interview_experience_descs_" + i + "' name='interview_experience_descs[]'></textarea></div></div></div></div></div>";
        var controlForm = $('#kolom-isian'),
            currentEntry = $(this).parents('.exp-card:first'),
            newEntry = $(element).appendTo(controlForm);
            CKEDITOR.replace('interview_experience_descs_' + i,{
            language:'en-gb'
        }); 
        newEntry.find('input').val('');
        
        controlForm.find('.exp-card:not(:last) .tambah')
            .removeClass('tambah').addClass('kurangi')
            .removeClass('fa-plus').addClass('fa-minus-circle');
        if(newEntry.find(".collapse").hasClass('show'))
            newEntry.find(".collapse").removeClass('show');
            
    }).on('click', '.kurangi', function(e)
    {
		$(this).parents('.exp-card:first').remove();

		e.preventDefault();
		return false;
	}).on('click', '.tampilkan-exp-card', function(e){
        
        if($(this).parents('.exp-card:first').find(".collapse").hasClass('show'))
            $(this).parents('.exp-card:first').find(".collapse").removeClass('show');
        else
            $(this).parents('.exp-card:first').find(".collapse").addClass('show');
    });

    $(document).on('click', '#simpan-penilaian', function(e){
        var isianKosong = [];
        $('#kolom-isian input[type=text]').each(function(e){
            if($(this).val() == '') {
                $(this).css('border-color', '#a94442', 'important');
                isianKosong.push('true');
            } else {
                $(this).css('border-color', '#ced4da', 'important');
                isianKosong.push('false');
            }
        });
        $('select[name="interview_skill_names[]"]').each(function(e){
            if($(this).val() == null) {
                $(this).css('border', '1px solid #a94442', 'important');
                isianKosong.push('true');
            } else {
                $(this).css('border', '1px solid #ced4da', 'important');
                isianKosong.push('false');
            }
        });
        $('select[name="interview_experience_years[]"]').each(function(e){
            if($(this).val() == null) {
                $(this).css('border', '1px solid #a94442', 'important');
                isianKosong.push('true');
            } else {
                $(this).css('border', '1px solid #ced4da', 'important');
                isianKosong.push('false');
            }
        });
        $('textarea').each(function(e){
            
            if(CKEDITOR.instances[$(this).attr('id')].getData() == '') {
                $(this).parents('fr-box').css('border-color', '#a94442', 'important');
                isianKosong.push('true');
            } else {
                $(this).parents('fr-box').css('border-color', '#ced4da', 'important');
                isianKosong.push('false');
            }
        });
       
        if(isianKosong.includes('true')){
            swal('Gagal', 'Mohon Isi Semua Kolom', "error");
        } else {
            swal({
                title : 'Perhatian!',
                text : 'Apakah Anda Yakin Ingin Menyimpan Penilaian Interview ?',
                type : 'warning', 
                cancelButtonText: 'Kembali', 
                showCancelButton: true, 
                confirmButtonText: "Simpan"
            }).then((result) => {
                if (result.value){ 
                    $("#kirim-data-sekarang").trigger('click');
                }        
            });
            
        }
    });

    
    $(document).ready(function() {
        $('.pilihan-skill').select2();
        CKEDITOR.replace('interview_character_desc',{
            language:'en-gb'
        });
        CKEDITOR.replace('interview_experience_descs',{
            language:'en-gb'
        });
    });

    $('#radioBtn a').on('click', function(){
        var sel = $(this).data('title');
        var tog = $(this).data('toggle');
        $('#'+tog).prop('value', sel);
        // alert($('#'+tog).val());
        
        $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
        $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
    })
  </script>

@endpush

@endsection