@extends('member.template')

@section('content')

<style type="text/css">
    .tambah { cursor: pointer; }
    .web_input {width: 500px !important; }
</style>
<section class="about">
  <form action="" method="post" id="register-talent">
    @csrf

        <div class="section-header"> <h2>Skill</h2> </div>
    
      <div class="card mt-5">

        @foreach($talent->talent_skill()->get() as $row)
            <div style="display: block; padding: 10px; float: left; border: solid 1px #D1D1D1 ; border-radius: 5px ; margin: 5px; ">
                
                <span style="font-weight: bold; font-size: 16px">{{$row->skill()->first()->skill_name}}</span><br>

                {{$row->st_level}}

                @if ( $row->st_skill_verified == 'NO' ) 
                <select name="level[]" class="skill_level">
                    <option value="">-unset-</option>
                    <option value="1">beginer</option>
                    <option value="2">beginer intermediate</option>
                    <option value="3">intermediate</option>
                    <option value="4">intermediate senior</option>
                    <option value="5">senior</option>
                </select>
                @else


                @endif
                
                <a href="" onclick="return confirm('data verifikasi skill anda akan hilang juga, apakah yakin ?')">
                    <img class="" src="{{url('template/upscale/media/hapus.png')}}" width="15px">
                </a>
            </div>
        @endforeach

        <div style="clear: both;"></div>

        <div style="padding: 20px">
            <a class="tambah" onclick="$('#insert').show()">
                <img class="" src="{{url('template/upscale/media/tambah.png')}}" width="30px">
                Tambah skill
            </a>
        </div>


        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{url('template/upscale/js/tag.js')}}"></script>
        <link rel="stylesheet" href="{{url('template/upscale/css/tag.css')}}">

        <script>
            
            $(document).ready(function()
            {
                $('.tagsInput').fastselect({

                    valueDelimiter: ',',
                    onItemSelect: function($item, itemModel) {
                        $(".fstChoiceRemove").html("x");
                        // $(".fstQueryInput").focus(); 
                    },

                });
                
            });
            
        </script>
        <div class="form-group" id="insert" style="margin-top: 10px ; display: none;">
            <div class="row">

                <div style="padding: 0 20px"> Web Developer </div>

                <input
                type="text"
                onItemSelect="setClose()"
                multiple
                class="tagsInput web_input"
                value=""
                data-user-option-allowed="true"
                data-url="{{url('json/skill?cat_id=1')}}"
                data-load-once="true"
                name="skill_1"/>
                <br><br>

                <div style="padding: 0 20px"> Mobile </div>

                <input
                type="text"
                onItemSelect="setClose()"
                multiple
                class="tagsInput web_input"
                value=""
                data-user-option-allowed="true"
                data-url="{{url('json/skill?cat_id=2')}}"
                data-load-once="true"
                name="skill_2"/><br><br>

                <div style="padding: 0 20px"> Desktop </div>

                <input
                type="text"
                onItemSelect="setClose()"
                multiple
                class="tagsInput web_input"
                value=""
                data-user-option-allowed="true"
                data-url="{{url('json/skill?cat_id=2')}}"
                data-load-once="true"
                name="skill_3"/><br><br>

                <div style="padding: 0 20px"> Managerial </div>

                <input
                type="text"
                onItemSelect="setClose()"
                multiple
                class="tagsInput web_input"
                value=""
                data-user-option-allowed="true"
                data-url="{{url('json/skill?cat_id=2')}}"
                data-load-once="true"
                name="skill_4"/><br><br>

                <div style="padding: 0 20px"> Other </div>

                <input
                type="text"
                onItemSelect="setClose()"
                multiple
                class="tagsInput web_input"
                value=""
                data-user-option-allowed="true"
                data-url="{{url('json/skill?cat_id=2')}}"
                data-load-once="true"
                name="skill_5"/><br><br>


                <div style="padding: 15px">
                    <!-- Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia -->
                    <button style="margin-top: 10px" type="submit" class="btn btn-primary">
                        SAVE NEW SKILl
                    </button>
                </div>
            </div>
        </div>
      </div>

      <div class="modal-footer">
        <a class="btn btn-primary" href="/profile" ><font color="#FFFFFF">Cancel</font></a>
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>



    </form>
</section>
@endsection