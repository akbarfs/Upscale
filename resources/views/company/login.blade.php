<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('logins/css/style.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <form class="login" action="{{route('process.login.company')}}" method="POST">
            <p class="title">Log in</p>
            {{csrf_field()}}
            <input type="text" placeholder="Username" name="username" autofocus />
            <i class="fa fa-user"></i>
            <input type="password" name="password" placeholder="Password" />
            <i class="fa fa-key"></i>
            @if($errors->any())
            <span class="invalid-feedback" style="color: #ff0000"><small>*{{ $errors->first() }}</small>
            </span>
            @endif
            <button>
                <i class="spinner"></i>
                <button type="submit"><span class="state">Log in</span></button>
            </button>
        </form>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    {{-- <script  src="{{ asset('logins/js/index.js') }}"></script>
    --}}
</body>

</html>
