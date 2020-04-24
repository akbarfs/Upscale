<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>404</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('admin/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert2.min.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('admin/scss/style.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/froala_editor.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/froala_style.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/code_view.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/colors.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/emoticons.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/image_manager.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/image.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/line_breaker.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/table.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/char_counter.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/video.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/fullscreen.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/quick_insert.css')}}">
    <link rel="stylesheet" href="{{asset('froala/css/plugins/file.css')}}">

    <link rel="stylesheet" href="{{asset('froala/css/themes/gray.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style type="text/css">
        div.action-table{
    margin-bottom: 10px;
  }
    </style>

</head>
<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section style="margin: auto; margin-top: 200px;" id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Page Not Found !</h3>
                <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
                <a href="{{route('index')}}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a> </div>
        </div>
    </section>

    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    </script>

    <script src="{{asset('admin/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('admin/js/plugins.js')}}"></script>
    <script src="{{asset('admin/js/main.js')}}"></script>


    <script src="{{asset('admin/js/lib/chart-js/Chart.bundle.js')}}"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/widgets.js')}}"></script>
    <script src="{{asset('admin/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>

</body>

    

</html>