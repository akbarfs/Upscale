

<script type="text/javascript" src="{{ asset('js/sweetalert2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/validator.js') }}"></script>
<script type="text/javascript" src="{{asset('js/momment.js')}}"></script>


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

    .fstElement { min-width: 455px; }

    .fstControls { width: !important; font-size: 14px; padding: 0 }

    .o { margin-top: 0px !important}

    .inr { height: 100% ; overflow: auto; }

    section.boxed-page:before {
    }

    @media only screen and (max-width:990px)
    {

    }

    @media only screen and (max-width:767px)
    {
        .leftclose { display: unset !important; }
    }

    @media only screen and (max-width:480px)
    {
        .leftclose { display: unset !important; }
        .fstElement { min-width: 300px; width: 93% }
        .modal-header {padding: 5px;}
        .scroll-top-btn  { display: none !important }
        .update { font-size: 10px  }
        .o { margin-top: 5px !important}
        .prev-inquiry, .submit-inquiry, .next-inquiry { width: unset !important }
    }
    .ui-datepicker-trigger{background: #47b2e4; color: #fff; 
        border: none; border-radius: 10px; padding: 0px 10px;}
    .close { float: right; text-align: right; display: inline; padding: 10px; margin: 10px }
    .leftclose { display: none }
    .wrap-inquiry
    {
        margin: 0 auto ; max-width: 500px ;margin-top: 10px;
        padding: 20px;
    }
    .option_cat .checkbox { float: left; padding: 10px   }
    .option_cat .op-desc { float: left; padding: 10px; width: calc(100% - 40px);}
    .option_cat .op-title { font-size: 18px ; font-weight: bold; }
    .option_cat .op-dd { font-size: 14px ; max-width: 380px  }
    .option_cat 
    { 
        cursor: pointer; border-radius: 10px; background: #eaeaea; 
        padding: 0 10px; margin-bottom: 20px;
    }

    .right-in
    {
            background: #37517e;
            padding-left: 0;
            background-image: url({{url('template/upscale/media/inquiry.jpg')}});
            background-position: top;
            background-size: cover;
    }
    .option_cat:hover { background: #ddfdea }
    .show_box { display: block !important; }
    .hide_box { display: none ;  }
    .question_box { display: none; margin-top: 10px; }
    .judulqb {font-size: 21px; margin-bottom: 20px; font-weight: bold;}
    .question_box label {display: unset;}
    .question_box {}
    .next-inquiry { margin-bottom: 20px; }
    .success-inquiry{background: #dae7ff; color: #000; padding: 10px 20px; border-radius: 5px; font-size: 18px; font-weight: 200;}
</style>

<script>

    function lanjut()
    {
        $(".infoinquiry").hide(); 
        next = $(".show_box").closest('.question_box').next();
        $(next).addClass("show_box");
        $(".show_box:first").removeClass("show_box");

        $(".inr").animate({ scrollTop: 0 }, 500);
    }

    $(document).ready(function()
    {
        $(".option_cat").click(function()
        {
            $(this).find("input[type='checkbox']").click();
        }); 

        // $(".next-inquiry").click(function()
        // {
        //     $(".infoinquiry").hide(); 
        //     next = $(".show_box").closest('.question_box').next();
        //     $(next).addClass("show_box");
        //     $(".show_box:first").removeClass("show_box");
        // });

        $(".prev-inquiry").click(function()
        {
            prev = $(this).parent().parent().prev();
            $(prev).addClass("show_box");
            $(this).parent().parent().removeClass("show_box");
        });

        $(".submit-inquiry").click(function()
        {
            $(".inr").animate({ scrollTop: 0 }, 500);
            call_when = $('[name="call_when"]:checked').val(); 
            call_jam = $('[name="call_jam"]').val(); 
            call_date = $('[name="call_date"]').val(); 
            
            if ( call_when == 'call_leter')
            {
                if ( call_jam == '' || call_date == '' || call_jam == null  || call_date == null )
                {
                    alert("All forms must be selected");
                    return false ; 
                }
            }
            
            $(".infoinquiry").show().html("<div class='success-inquiry'>loading...</div>");

            log = $("#forminquiry").serialize();
            
            $.ajax({
                url: "{{url('send-inquiry')}}",
                type: 'POST',
                data: log,
                success: function(data)
                {
                    $(".wrap-inquiry").html("<div class='success-inquiry'>{{lang('Inquiry Request Success, we will contact you soon, Thank You','Request Inquiry berhasil, kami akan segera menghubungi anda sesuai waktu yang telah anda tentukan, terimakasih')}}</div>");
                },
                error: function(data){
                    
                }
            });
        });

        $(".radionext").click(function()
        {
            lanjut(); 
        });

    });

</script>

<div class="row inr">
    <div class="col-md-8">
        <button type="button" class="close leftclose" style="color:#000" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form id="forminquiry" method="post" action="{{url('/submit-request-inquiry')}}" name="fif">
            <div class="wrap-inquiry">

                <div style="text-align: justify;" class="infoinquiry">
                    {{lang(
                            
                            'Thanks for your interest in hiring through Upscale ! Before we get started, we’d like to ask a few questions to better understand your business needs.',

                            'Terimakasih sudah tertarik untuk melakukan hiring talent melalui upscale ! sebelum kita mulai, kami ingin mengajukan beberapa pertanyaan agar dapat lebih memahami kebutuhan bisnis anda.'

                            )}}
                </div>
                <div class="question_box show_box">

                    <div class="judulqb">
                        {{lang(
                            'What role would you like to hire?',
                            'Anda ingin mencari talent di bidang apa saja ?'
                        )}}
                    </div>
                    
                    <div class="option_cat">
                        <div class="checkbox">
                            <input type="checkbox" class="position" name="position[]" value="Developer"> 
                        </div>
                        <div class="op-desc">
                            <div class="op-title">Developer</div>
                            <div class="op-dd">Software Developers, Data Scientists, DevOps, and QA</div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                    <div class="option_cat">
                        <div class="checkbox">
                            <input type="checkbox" class="position" name="position[]" value="Designers"> 
                        </div>
                        <div class="op-desc">
                            <div class="op-title">Designers</div>
                            <div class="op-dd">Web, Mobile, UI/UX, Branding, and Visual Designers</div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                    <div class="option_cat">
                        <div class="checkbox">
                            <input type="checkbox" class="position" name="position[]" value="Project Managers"> 
                        </div>
                        <div class="op-desc">
                            <div class="op-title">Project Managers</div>
                            <div class="op-dd">IT Project Managers, Scrum Masters, and Agile Coaches</div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                    <div class="option_cat">
                        <div class="checkbox">
                            <input type="checkbox" class="position" name="position[]" value="position"> 
                        </div>
                        <div class="op-desc">
                            <div class="op-title">Product Managers</div>
                            <div class="op-dd">Product Managers, Product Owners, and Business Analysts</div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                    <div class="option_cat">
                        <div class="checkbox">
                            <input type="checkbox" class="position" name="position[]" value="finance"> 
                        </div>
                        <div class="op-desc">
                            <div class="op-title">Finance</div>
                            <div class="op-dd">Accounting, tax & legal consultant, Finance Consltant</div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step1").click(function()
                            {
                                ar = [];  
                                $(".position").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>
                    
                    <div style="margin-top: 10px">
                        <a class="btn btn-primary next-inquiry step1" style="color: #fff;float: right;">
                            Next
                        </a>
                    </div>

                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang('What type of project are you hiring for?','Anda membutuhkan talent untuk mengerjakan project type seperti apa?')}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="project_type radionext" name="type_project" 
                                value="new idea"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('New idea or project','Ide atau Project Baru')}}
                                </div>
                                <div class="op-dd">
                                    {{lang('Build new startup, new product, new business',
                                            'Membangung bisnis startup, product baru, bisnis baru')}}
                                    
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="project_type radionext" name="type_project" 
                                value="Existing project need more resource"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('Existing project that needs more resources','Project berjalan, membutuhkan talent tambahan')}}
                                </div>
                                <div class="op-dd">
                                    {{lang('If your business already running and need more development'
                                    ,'project yang sedang berjalan dan membutuhkan pengembangan lebih lanjut')}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="project_type radionext" name="type_project" 
                                value="Ongoing assistance or consultation"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('Ongoing assistance or consultation','Coach atau konsultan')}}
                                </div>
                                <div class="op-dd">
                                    {{lang('If you need a someone to helping you as consultant or coach'
                                    ,'apabila anda membutuhkan seseorang yang membantu anda sebagai konsultan atau coach')}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="project_type radionext" name="type_project" 
                                value="None of the above"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('None of the above','tidak ada dalam pilihan diatas')}}
                                </div>
                                <div class="op-dd">
                                    {{lang("I'm just looking to learn more about Upscale","saya hanya sedang mempelajari tentang Upscale")}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step2").click(function()
                            {
                                ar = [];  
                                $(".project_type").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step2" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'How long do you need the developer? ',
                            'Anda membutuhkan talent untuk berapa lama?'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="contract_time radionext" name="contract_time"
                                value="kurang dari 1 bulan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('less than 1 month','kurang dari 1 bulan')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="contract_time radionext" name="contract_time"
                                value="1 sampai 6 bulan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('1 - 6 months','1 sampai 6 bulan')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="contract_time radionext" name="contract_time"
                                value="6 sampai 12 bulan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('6 - 12 months','6 sampai 12 bulan')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="contract_time radionext" name="contract_time"
                                value="lebih dari 1 tahun"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('more than 1 months','lebih dari 1 tahun')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="contract_time radionext" name="contract_time"
                                value="Saya belum menentukan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang("I'll decide later","Saya akan tentukan nanti")}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step3").click(function()
                            {
                                ar = [];  
                                $(".contract_time").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step3" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'How long do you need the developer? ',
                            'Anda membutuhkan talent untuk berapa lama?'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_talent" name="jumlah_talent"
                                value="1 talent"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('1 talent','1 talent')}} </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_talent radionext" name="jumlah_talent"
                                value="lebih dari 1 talent dalam 1 divisi"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('more than 1 talent in 1 division','lebih dari 1 talent dalam 1 divisi')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_talent radionext" name="jumlah_talent"
                                value="berbagai divisi"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('A cross-functional team','berbagai divisi')}}
                                </div>
                                <div class="op-dd">
                                    developer, designer, project manager
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_talent radionext" name="jumlah_talent"
                                value="Belum menentukan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang("i'll decide later",'Belum menentukan')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step4").click(function()
                            {
                                ar = [];  
                                $(".jumlah_talent").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step4" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'What level of time commitment will you require from the developer?',
                            'Tentukan level komitmen waktu kerja untuk talent yang ingin anda rekrut'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="lama_kerja radionext" name="lama_kerja"
                                value="Full time (40 or more hrs/week)"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('Full time','Full time')}}
                                </div>
                                <div class="op-dd">
                                    {{lang('40 or more hrs/week','40 atau lebih jam/minggu')}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="lama_kerja radionext" name="lama_kerja"
                                value="Part time (Less than 40 hrs/week)"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang('Part time','Part Time')}}
                                </div>
                                <div class="op-dd">
                                    {{lang('Less than 40 hrs/week','kurang dari 40 jam/minggu')}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    
                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="lama_kerja radionext" name="lama_kerja"
                                value="perjam"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang("Hourly","Perjam")}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="lama_kerja radionext" name="lama_kerja"
                                value="belum menentukan"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang("I'll decide later","Belum menentukan")}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step5").click(function()
                            {
                                ar = [];  
                                $(".lama_kerja").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step5" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'What skills would you like to see in your new hire?',
                            'Skill apakah yang anda inginkan untuk talent yang kami berikan'
                            )}}
                    </div>

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

                    <div class="form-group" id="web" style="margin-top: 10px">
                        <div class="row">

                            <input
                            type="text"
                            onItemSelect="setClose()"
                            multiple
                            class="tagsInput web_input"
                            value=""
                            data-user-option-allowed="true"
                            data-url="{{url('json/skill')}}"
                            data-load-once="true"
                            name="skill_1"/>

                            <div style="clear: both;"></div>
                            <div style="padding: 15px">
                                {{lang('Please type or can choose from the available options','Silahkan ketik atau bisa memilih dari opsi yang tersedia')}}
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry" style="color: #fff; margin-top: 0 ;
                        float: right;" onClick="lanjut()">
                            Next
                        </a>
                        <a class="btn btn-primary next-inquiry" style="color: #fff; margin-top: 0 ;
                        float: right; margin-right: 10px;" onClick="lanjut()">
                            Skip
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'How many people are employed at your company?',
                            'Berapa jumlah karyawan di perusahaan anda?'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_karyawan radionext" name="jumlah_karyawan"
                                value="less than 10"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('Less than 10','kurang dari 10')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_karyawan radionext" name="jumlah_karyawan"
                                value="11 - 50"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">11 - 50</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_karyawan radionext" name="jumlah_karyawan"
                                value="51 - 200"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">51 - 200</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_karyawan radionext" name="jumlah_karyawan"
                                value="201 - 1000"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">201 - 1000</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="jumlah_karyawan radionext" name="jumlah_karyawan"
                                value="More than 1000"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('More than 1000','kurang dari 1000')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step6").click(function()
                            {
                                ar = [];  
                                $(".jumlah_karyawan").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step6" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'When do you need the developer to start?',
                            'Kapan anda membutuhkan talent untuk mulai bekerja ?'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="mulai_kerja radionext" name="mulai_kerja"
                                value="Immediately"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('Immediately','secepatnya')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="mulai_kerja radionext" name="mulai_kerja"
                                value="In 1 to 2 weeks"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('In 1 to 2 weeks','1 sampai 2 minggu kedepan')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="mulai_kerja radionext" name="mulai_kerja"
                                value="More than 2 weeks from now"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('More than 2 weeks from now','lebih dari 2 minggu dari sekarang')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="mulai_kerja radionext" name="mulai_kerja"
                                value="I'll decide later"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">
                                    {{lang("I'll decide later","Akan saya tentukan nanti")}}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step7").click(function()
                            {
                                ar = [];  
                                $(".mulai_kerja").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step7" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'Are you open to working with a remote developer?',
                            'Apakah anda memperbolehkan talent bekerja remote ?'
                            )}}
                    </div>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="kerja_remote radionext" name="kerja_remote"
                                value="yes"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('Yes','Ya')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="kerja_remote radionext" name="kerja_remote"
                                value="no"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang('No','Tidak')}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <label>
                        <div class="option_cat">
                            <div class="checkbox">
                                <input type="radio" class="kerja_remote radionext" name="kerja_remote"
                                value="not sure"> 
                            </div>
                            <div class="op-desc">
                                <div class="op-title">{{lang("I’m not sure","saya tidak yakin")}}</div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                    </label>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step8").click(function()
                            {
                                ar = [];  
                                $(".kerja_remote").each(function(e)
                                {
                                    if ($(this).is(':checked')) 
                                    {
                                        ar.push($(this).val()); 
                                    };
                                });
                                if (ar.length == 0)
                                {
                                    alert("have choose at least 1");
                                    return false ; 
                                }
                                else
                                {
                                    lanjut() ; 
                                    setTimeout(function() {
                                      lanjut();
                                    }, 2000);
                                }
                            });

                            $(".kerja_remote").click(function()
                            {
                                setTimeout(function() {
                                  lanjut();
                                }, 2000);
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary next-inquiry step8" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>
                </div>

                <div class="question_box">
                    
                    <div class="judulqb">
                        {{lang(
                            'Looking for developers based on your requirements…',
                            'mencari talent berdasarkan requirement yang anda butuhkan...'
                            )}}
                    </div>

                    <div>loading...</div>

                </div>

                <div class="question_box company_contact">
                    
                    <div class="judulqb success-inquiry">
                        {{lang(
                            "Success ! Let's connect you with talent.",
                            "Berhasil ! kami akan segera hubungkan anda dengan talent"
                            )}}
                    </div>

                   
                    <div>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    {{lang('Company Name / website','Nama perusahaan / website')}}
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                            </div>
                        </div>
                    
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    {{lang('Company Email','Email')}}
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="company_email">
                                </div>
                            </div>
                        </div>
                    
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    {{lang('Phone Number','No Telephone')}}
                                </div>
                                <div class="col-md-8 col-sm-12">
                                    <input type="text" class="form-control" name="company_number">
                                </div>
                            </div>
                        </div>

                        <div>
                            {{lang("By completing signup, you are agreeing to be Upscale's partnership so we can keep inform you about our talent","dengan submit form ini, anda setuju untuk menjadi partnership Upscale sehingga kami dapat mengirimkan informasi seputar talent yang kami tawarkan")}}
                        </div>
                    
                    </div>

                    <script type="text/javascript">

                        $(document).ready(function()
                        {
                            $(".step9").click(function()
                            {
                                company_name = $(".question_box").find('[name=company_name]').val(); 
                                company_email = $(".question_box").find('[name=company_email]').val(); 
                                company_number = $(".question_box").find('[name=company_number]').val();

                                if ( company_name == '' || company_email == '' || company_number == '')
                                {
                                    alert("All forms must be filled");
                                }
                                else
                                {
                                    lanjut() ; 
                                }
                            });

                        });
                    </script>

                    <div style="margin-top: 30px">
                        <!-- <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a> -->
                        <a class="btn btn-primary next-inquiry step9" style="color: #fff; margin-top: 0 ;
                        float: right;">
                            Next
                        </a>
                    </div>

                </div>

                <div class="question_box">
                    
                    <div class="judulqb"> Let’s get started! </div>

                    <div style="margin-bottom: 20px">
                        {{lang(
                                "A Upscale talent specialist will call you to discuss the scope of your project, talent preferences (e.g. required skills, rate, time zone), and determine your job specifications. Then we’ll find and send you the best matches for your job from our expert-vetted talent network. After the interview, make a contract, Pay only when found the talent.",
                                'Spesialis Talent kami akan segera menghubungi anda untuk mendiskusikan ruang lingkup project, referensi talent dan deskripsi pekerjaan. Kemudian kami akan menemukan dan mengirimkan Anda talent yang paling cocok untuk pekerjaan Anda dari jaringan talenta eklusif kami. Setelah interview, menentukan yang paling cocok lalu membuat kontrak, Bayar hanya ketika anda menemukan talent yang cocok.'
                        )}}
                    </div>     

                   
                    <div>
                        
                        <div class="judulqb"> 
                            {{lang('When would you like to connect?','Kapan anda ingin dihubungi ?')}}
                        </div>

                        <label>
                            <div class="option_cat">
                                <div class="checkbox">
                                    <input type="radio" name="call_when" class="call" value="call_now" checked="checked"> 
                                </div>
                                <div class="op-desc">
                                    <div class="op-title">{{lang('Now','Sekarang')}}</div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </label>

                        <label>
                            <div class="option_cat">
                                <div class="checkbox">
                                    <input type="radio" name="call_when" class="call" value="call_leter"> 
                                </div>
                                <div class="op-desc">
                                    <div class="op-title">{{lang('Later','Lain Waktu')}}</div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </label>

                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $(".call").change(function () {
                                    if ($(this).val() == "call_now") 
                                    {
                                        $("#pilihtgl").hide();
                                    } 
                                    else if ($(this).val() == "call_leter")
                                    {
                                        $("#pilihtgl").show();
                                    }
                                });
                            });
                        </script>

                        <div id="pilihtgl" style="display: none">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{lang('Choose Date','Pilih Tanggal')}} 
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <?php 
                                            $startDate = time();
                                            $satu = date('d M Y', strtotime('+1 day', $startDate));
                                            $dua = date('d M Y', strtotime('+2 day', $startDate));
                                            $tiga = date('d M Y', strtotime('+3 day', $startDate));
                                            $empat = date('d M Y', strtotime('+4 day', $startDate));
                                            $lima = date('d M Y', strtotime('+5 day', $startDate));
                                            $enam = date('d M Y', strtotime('+6 day', $startDate));
                                            $tujuh = date('d M Y', strtotime('+7 day', $startDate));
                                        ?>
                                        <select class="call_date custom-select" name="call_date">
                                            <option value="">-select-</option>
                                            <option value="<?php echo $satu ?>">Besok</option>
                                            <option value="<?php echo $dua ?>"><?php echo $dua ?></option>
                                            <option value="<?php echo $tiga ?>"><?php echo $tiga ?></option>
                                            <option value="<?php echo $empat ?>"><?php echo $empat ?></option>
                                            <option value="<?php echo $lima ?>"><?php echo $lima ?></option>
                                            <option value="<?php echo $enam ?>"><?php echo $enam ?></option>
                                            <option value="<?php echo $tujuh ?>"><?php echo $tujuh ?></option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        {{lang('choose time','Pilih Jam')}} 
                                    </div>
                                    <div class="col-md-8 col-sm-12">
                                        <select class="call_jam custom-select" name="call_jam">
                                            <option value="">-select-</option>
                                            <option value="10.00">10.00</option>
                                            <option value="10.30">10.30</option>
                                            <option value="11.00">11.00</option>
                                            <option value="11.30">11.30</option>
                                            <option value="12.00">12.00</option>
                                            <option value="12.30">12.30</option>
                                            <option value="13.00">13.00</option>
                                            <option value="13.30">13.30</option>
                                            <option value="14.00">14.00</option>
                                            <option value="14.30">14.30</option>
                                            <option value="15.00">15.00</option>
                                            <option value="15.30">15.30</option>
                                            <option value="16.00">16.00</option>
                                            <option value="16.30">16.30</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary submit-inquiry" style="color: #fff; margin-top: 0 ; 
                        float: right;">
                            Submit
                        </a>
                    </div>

                </div>

                <!-- <div class="question_box">
                    next load ok last
                    <div style="margin-top: 30px">
                        <a class="btn btn-primary prev-inquiry" style="color: #fff" style="float: right;">
                            Prev
                        </a>
                        <a class="btn btn-primary submit-inquiry" style="color: #fff; margin-top: 0 ; 
                        float: right;">
                            Submit
                        </a>
                    </div>
                </div> -->

            </div>
        </form>
    </div>
    <div class="col-md-4 hidden-xs hidden-sm right-in">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" 
        style="position: absolute; right: 20px; color: #fff">
          <span aria-hidden="true">&times;</span>
        </button>

        <div style="text-align: center; margin-top: 20px ; color: #fff ; font-weight: bold ;
        margin-bottom: 80px">
            Our Member Experience
        </div>

        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-1.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-2.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-3.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-4.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-5.png')}}" style="max-width: 200px">
        </div>
        <div align="center" style="margin-top: 20px">
            <img src="{{url('template/upscale/media/logos/white/logo-6.png')}}" style="max-width: 200px">
        </div>

    </div>
</div>






