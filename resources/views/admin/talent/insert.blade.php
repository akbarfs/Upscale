@extends('layouts.template',['logo'=>'transparent','title'=>'Scaling Up Karir, Skill & Networkmu bersama komunitas eksklusif network upscale'])

@section("menu_class",'menu-transparent light')

@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Talent</title>

    <style>
    body > header.boxed-page-header {
        height: 300px ;
    }

    ::-webkit-input-placeholder { /* Edge */
      color: #c5c5c5 !important;
    }

    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: #c5c5c5 !important;
    }

    ::placeholder {
      color: #c5c5c5 !important;
    }

    .ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus, .ui-button:hover, .ui-button:focus 
    {
        background: #add2ec !important;
    }

    .fstElement { min-width: 455px; }
    .fstControls { padding: 0 }
    section.boxed-page:before {
    }

    @media only screen and (max-width:990px)
    {
        
    }

    @media only screen and (max-width:767px)
    {
        
    }

    @media only screen and (max-width:480px)
    {
        .fstElement { min-width: 300px; width: 93% }
        .modal-header {padding: 5px;}
        .modal-footer { padding: 0; }
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}
    }
</style>
</head>
<body>
        <h2>Buat Talent Baru</h2>
    <form>
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" placeholder="">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" id="email" placeholder="">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" placeholder="">
        </div>

        @push('script')
    
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

							@endpush


							<style type="text/css">
								.fstQueryInput  { padding: 0 }
								.fstControls { padding: 0 !important; min-width: 200px ; height: 35px }
								.fstQueryInputExpanded { padding: 0 10px !important; margin: 0 !important }
							</style>
							<div>
								<input
                                type="text"
                                onItemSelect="setClose()"
                                multiple
                                class="tagsInput form-control"
                                value=""
                                data-user-option-allowed="true"
                                data-url="{{url('json/skill')}}"
                                data-load-once="true"
                                placeholder="skill"
                                name="skill"/>
                            </div>
                           
                            <div class="form-group">
                                <label for="phone">Phone Number / WA</label>
                                <input type="text" class="form-control" id="phone" placeholder="">
                            </div>

                            <!-- <fieldset class="form-group"> -->
                                <div class="row">
                                  <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                  <div class="col-sm-10">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                      <label class="form-check-label" for="gridRadios1">
                                        Male
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                      <label class="form-check-label" for="gridRadios2">
                                        Female
                                      </label>
                                    </div>
                                    </div>
                                </div>
                          <!-- </fieldset> -->

                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Keluar</button>
                              <button type="submit" class="btn btn-danger">Tambah Talent</button>
                            </div>
                          </div>




    </form>
</body>
</html>

@endsection