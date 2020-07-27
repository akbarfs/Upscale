@extends('member.template')

@section('content')

<style type="text/css">
    .tambah { cursor: pointer; }
    .web_input {width: 500px !important; }
</style>
<script type="text/javascript">
    $(document).ready(function()
    {
        $(".skill_level").change(function()
        {
            st_id = $(this).data("id");
            level = $(this).val(); 
            $.post("{{url('member/update-level')}}",{st_id:st_id,level:level,'_token':'{{csrf_token()}}'},function(response)
            {
                // alert(response.message) ; 
            });
        });
    });
</script>
<section class="about">
  <form action="" method="post" id="register-talent">
    @csrf

        <div class="section-header"> <h2>Skill</h2> </div>
    
      <div class="card mt-5">

        @foreach($talent->talent_skill()->get() as $row)
            <div style="display: block; padding: 10px; float: left; border: solid 1px #D1D1D1 ; border-radius: 5px ; margin: 5px; min-height: 70px; min-width: 30% ">


                
                <span style="font-weight: bold; font-size: 16px">{{$row->skill()->first()->skill_name}}</span>

                <a href="" onclick="return confirm('data verifikasi skill anda akan hilang juga, apakah yakin ?')" style="float: right;">
                    <i class="fa fa-close"></i>
                </a>

                <br>

                @if ( !$row->st_skill_verified_date ) 
                    <select name="level[]" class="skill_level" data-id="{{$row->st_id}}" style="width: 100%">
                        <option value="">-unset-</option>
                        <option value="beginer" @if($row->st_level == 'beginer') selected='selected' @endif>beginer</option>
                        <!-- <option value="beginer intermediate">beginer intermediate</option> -->
                        <option value="intermediate" @if($row->st_level == 'intermediate') selected='selected' @endif>intermediate</option>
                        <!-- <option value="intermediate senior">intermediate senior</option> -->
                        <option value="senior"  @if($row->st_level == 'senior') selected='selected' @endif>senior</option>
                    </select>
                    
                @else
                    <i class="fa fa-check" title="verified"></i> {{$row->st_level}} 
                @endif
                
                
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