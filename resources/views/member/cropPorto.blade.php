@extends('member.template')
@section('content')

  <style> .error { background: #FF98A0 ; } </style>

  <script src="{{asset('crop/crop.js')}}"></script>
  <link href="{{asset('crop/crop.css')}}" rel="stylesheet">

  <script type="text/javascript">

    jQuery(function($){

      // Create variables (in this scope) to hold the API and image size
      var jcrop_api,
          boundx,
          boundy,

          // Grab some information about the preview pane
          $preview = $('#preview-pane'),
          $pcnt = $('#preview-pane .preview-container'),
          $pimg = $('#preview-pane .preview-container img'),

          xsize = $pcnt.width(), //200
          ysize = $pcnt.height(); //200
      
          console.log('pertama',[xsize,ysize]);


      $('#target').Jcrop({
        onChange: updatePreview,
        onSelect: updatePreview,
        aspectRatio: 1,
        setSelect : [0,0,300,0],
        // boxWidth: 500, 
        // boxHeight: 300
      },function(){
        // Use the API to get the real image size
        var bounds = this.getBounds();
        
        boundx = bounds[0]; // 1666
        boundy = bounds[1]; //937

        // boundx = 1666; // 1666
        // boundy = 937; //937

        // Store the API in the jcrop_api variable
        jcrop_api = this;
        console.log('pertama',[boundx,boundy]);

        // Move the preview into the jcrop container for css positioning
        $preview.appendTo(jcrop_api.ui.holder);
      });

      function updatePreview(c)
      {
          console.log('isi c',c);

          $("#width").val(c.w) ; 
          $("#height").val(c.h) ; 
          $("#x").val(c.x) ; 
          $("#y").val(c.y) ; 

          // if (parseInt(c.w) > 0)
          // {
          //     var rx = xsize / c.w; // 200 / 300 
          //     var ry = ysize / c.h; // 200 / 300 

          //     var width = Math.round(rx * boundx); //
          //     var height = Math.round(ry * boundy); 
          //     var left = Math.round(rx * c.x); 
          //     var top = Math.round(ry * c.y); 
              
          //     console.log('terakhir',width,height,left,top);

          //     $pimg.css({
          //       width: width+"px",
          //       height: height+"px",
          //       marginLeft: "-"+left+"px",
          //       marginTop: "-"+top+"px"
          //     });
          // }
      };

    });


  </script>

  <style type="text/css">

      .jcrop-holder #preview-pane 
      {
        display: block;
        position: absolute;
        z-index: 2000;
        top: 400px;
        padding: 6px;
        border: 1px rgba(0,0,0,.4) solid;
        background-color: white;
      }

      #preview-pane .preview-container 
      {
        width: 200px;
        height: 200px;
        overflow: hidden;
      }

  </style>

<div id="wrapper">
    <!--content -->  
    <div class="content">
        <!--section --> 
        <section id="sec1" style="padding-top: 30px">
            <!-- container -->
            <div>
              
              <h5>Silahkan crop gambar thumbnail anda</h5>

              <form action='{{url("member/crop-porto/".$porto->portfolio_id)}}' method="POST">
                  
                  <div style="float:left;">
                      @csrf         
                      @php $random = date("his") @endphp
                      <img src="{{url('')}}/storage/Project Portfolio/{{$porto->portfolio_image}}?rand={{$random}}" id="target" />

                      <!-- <div id="preview-pane">
                        <div class="preview-container">
                          <img src="{{url('')}}/storage/Project Portfolio/{{$porto->portfolio_image}}" class="jcrop-preview" />
                        </div>
                      </div> -->

                  </div>

                  <input type="hidden" name="height" id="height">
                  <input type="hidden" name="width" id="width">
                  <input type="hidden" name="x" id="x">
                  <input type="hidden" name="y" id="y">
                  <input type="hidden" name="id" value="{{$porto->portfolio_id}}">

                  <div style="float: right; margin-left: 20px ; margin-top: 20px" class="custom-form">
                      <a><button type="submit" class="btn btn-success" id="submit">submit</button></a>
                  </div>
              </form>
            </div>

            <div style="clear: both;"></div>
          </section>
        </div>
      </div>


@endsection