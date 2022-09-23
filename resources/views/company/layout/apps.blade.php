<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Upscale | Company Dashboard</title>
    <meta name="description" content="Web Develop Your Passions - Build Talent">
    <meta property="og:image" itemprop="image" content="{{ asset('img/logo3.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}" />

    <script src="{{asset('/admin/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('/upscale.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/admin/css/inputyears.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{asset('/admin/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/tempusdominus-bootstrap-4.min.css')}}" />
    <link href="https://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/nestable/assets/css/nestable.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link rel="stylesheet" href="{{asset('/company/css/style.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <style type="text/css">
        /*hidden tooltip*/
        .ui-helper-hidden-accessible {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
            display: none;
        }

        div.action-table {
            margin-bottom: 10px;
        }

        html {
            padding: -10px 0 !important;
        }

        .table td,
        .table th {
            padding: 0.2rem !important;
        }

        .card-body {
            padding: 0.5rem !important;
        }

        .card-header {
            padding: .25rem .75rem !important;
        }

        .header {
            padding: 0 !important;
        }

        .menutoggle {
            margin: 5px 20px 0 -32px !important;
        }

        .mt-3 {
            margin-top: 0.5rem !important;
        }

        .navbar .navbar-nav li>a {
            padding: 2px 0 !important;
        }

        label {
            margin-bottom: 0 !important;
        }

        .nav-link {
            padding: 0rem 1rem !important;
        }

        .list-group-item {
            padding: .4rem .4rem .4rem 1.25rem !important;
        }
    </style>
    <style type="text/css">
        .wrapper {
            width: 70%;
        }

        @media(max-width:992px) {
            .wrapper {
                width: 100%;
            }
        }

        .panel-heading {
            padding: 0;
            border: 0;
        }

        .panel-title>a,
        .panel-title>a:active {
            display: block;
            padding: 15px;
            color: #555;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            word-spacing: 3px;
            text-decoration: none;
        }

        .panel-heading a:before {
            font-family: 'Glyphicons Halflings';
            content: "\e114";
            float: right;
            transition: all 0.5s;
        }

        .panel-heading.active a:before {
            -webkit-transform: rotate(180deg);
            -moz-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    </style>
    <!-- </head> -->
</head>

<body style="padding-right:0; border-collapse: collapse;">
    @include('company.layout.sidebar')

    <div id="right-panel" class="right-panel">
        @include('company.layout.header')
        @yield('content')
    </div>


    <script src="{{asset('/admin/js/plugins.js')}}"></script>
    <script src="{{asset('/admin/js/main.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script src="{{asset('/admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/pdfmake.min.js')}}"></script>
    <script src="{{asset('/nestable/assets/js/jquery.nestable.js')}}"></script>
    <script src="{{asset('/nestable/assets/js/jquery-sortable.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('/admin/js/lib/data-table/datatables-init.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js">
    </script>
    <script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/js/momment.js')}}"></script>
    <script src="{{asset('/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('/js/moment.min.js')}}"></script>
    <script src="{{asset('/js/moment-with-locales.min.js')}}"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        $(function () {
            $('.dd').nestable({
                group: 'categories', // you can change this name as you like
                maxDepth: 3,
                dropCallback: function (details) {

                    var order = new Array();
                    $("li[data-id='" + details.destId + "']").find('ol:first').children().each(
                        function (index, elem) {
                            order[index] = $(elem).attr('data-id');
                        });
                    if (order.length === 0) {
                        var rootOrder = new Array();
                        $("#nestable > ol > li").each(function (index, elem) {
                            rootOrder[index] = $(elem).attr('data-id');
                        });
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.post('{{route("class.postindex")}}', {
                                source: details.sourceId,
                                destination: details.destId,
                                order: JSON.stringify(order),
                                rootOrder: JSON.stringify(rootOrder)
                            },
                            function (data) {
                                // console.log('data '+data); 
                            })
                        .done(function () {
                            $("#success-indicator").fadeIn(100).delay(1000).fadeOut();
                        })
                        .fail(function () {})
                        .always(function () {});
                }
            });
            $('.dd').nestable('collapseAll');
        });
    </script>


    @stack('script')

</body>

</html>