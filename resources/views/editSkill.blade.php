@extends('layouts.template',['logo'=>'transparent'])

@section("menu_class",'light')

@section('content')

</br>
</br>
</br>

<main>
 <!-- web -->
  <div class="card-body">
    <br/>
    <h4>
    <img class="" src="tambah.png" style="float:right;" style="bold" alt="Card image" height="25px" width="25px">
    MANAGEMENT SKILL
    </h4>
    <br/>
    <br/>
    <img class="" src="hapus.png" style="float:right;" alt="Card image" height="25px" width="25px">  


 <div class="question_box">

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $("#web_option").change(function()
                                {
                                    if ( $(this).val() == 'ya' ) 
                                    {
                                        $('#web').show();
                                        setTimeout(function(){ $('#web .fstQueryInput').focus(); }, 100);
                                    }
                                    else
                                    {
                                        $('#web').hide();
                                    }
                                });
                            });
                        </script>
                        <select style="margin-top: 10px" class="custom-select" id="web_option">
                            <option value="">-- pilih --</option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                        </select>


                        <div class="form-group" id="web" style="margin-top: 10px ; display: none">
                            <div class="row">

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

                                <!-- <div class="col-md-12"> <input type="text" name="name" class="form-control tag" autocomplete="off"> </div> -->
                                <!-- <div class="col-md-6">
                                    <select name="level" class="input-select">
                                        <option value="junior">junior</option>
                                        <option value="middle">middle</option>
                                        <option value="senior">senior</option>
                                    </select>
                                </div> -->
                                <div class="fstLoading"></div>
                                <div style="padding: 15px">
                                    Silahkan input skill anda atau anda bisa memilih dari opsi yang tersedia
                                </div>
                            </div>
                        </div>
                    </div>
                    
</main>
</br>
</br>
</br>
@endsection