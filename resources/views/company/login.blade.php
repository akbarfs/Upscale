<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Company - Upscale</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="{{asset('/admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('company/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('company/css/util.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="d-md-flex d-block middle">
                <div class="col-md-7 col-sm-7 col-12 bg-custom-secondary rounded-left text-center shadow range-custom">
                    <h3 class="judul-login-1 mt-md-5">Tentang Kami</h3>
                    <img class="img-size mt-md-5" src="{{url('template/upscale/media/logo-transparent.png')}}"
                        alt="logo" width="400">
                    <p class="detail-login mt-md-5">Kami adalah perusahaan yang berfokus pada solusi penyedia talent /
                        tenaga
                        kerja. Semua perusahaan yang membutuhkan talent baik sebagai karyawan fulltime, freelance,
                        secara onsite atau secara remote</p>
                </div>
                <div class="col-md-5 col-sm-7 col-12 bg-white rounded-right shadow pr-4 pl-4 range-custom">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show m-t-20" id="fail-alert">
                        {{ $errors->first() }}
                    </div>
                    @endif
                    <div class="judul-login-2 m-t-50 mb-2">Login Company</div>
                    <div class="dropdown-divider"></div>
                    <form action="{{route('process.login.company')}}" method="POST" class="m-t-30">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="font-weight-bold text-uppercase" for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Username Anda" required>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold text-uppercase" for="password">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control" name="password" id="password"
                                    data-toggle="password" placeholder="Password Anda" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a style="color: grey;"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-30 text-center">
                            <button type="submit" class="btn btn-login btn-custom">Login</button>

                        </div>
                    </form>
                    <div class="text-center link-login m-t-20">
                        <a href="javascript:void(0)" class="lupadaftar" id="forgot">Lupa Password</a>
                        <div class="dropdown-divider m-t-20 m-b-20"></div>
                        <span class="text-muted fs-12">All Rigths Reserved &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('company/js/script.js')}}"></script>
</body>

</html>