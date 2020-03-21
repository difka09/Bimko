<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Bimko</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="shortcut icon" href="{{ asset('user/img/favicon.ico') }}">
  <link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
  <style>

  .alert-danger {
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}
button.close {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: 0 0;
    border: 0;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
}
  </style>
</head>

<body>
    @if (count($errors) > 0)
    <div class="alert alert-danger" id="alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <p>{{ $errors->first() }}</p>
    </div>
    @endif

    <div class="form">
        <ul class="tab-group">
            <li class="tab active"><a href="#login-responder">Responder</a></li>
            <li class="tab"><a href="#login-murid">Siswa</a></li>
            <li class="tab"><a href="#login-guru">Guru</a></li>
        </ul>

        <div class="tab-content">
            <div id="login-responder">
                <h1>Login Untuk Responder</h1>
                <form action="{{ route('login.admin') }}" method="post">
                    @csrf
                <div class="field-wrap">
                <label>
                    Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off" name="email"/>
                </div>
                <div class="field-wrap">
                <label>
                    Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off" name="password"/>
                </div>
                @if ($errors->has('email'))
                    <span style="color:azure" class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <p class="forgot">
                    <a>
                        <span class="fa fa-info-circle"  rel="tooltip" title="Hanya untuk alumni"></span>
                    </a>
                    <a href="/register">Belum punya akun? Daftar Disini</a>
                </p>
                <button type="submit" class="button button-block">Log In</button>
                </form>
            </div>

            <div id="login-murid" style="display:none" >
                <h1>Login Untuk Siswa</h1>
                <form action="{{Route('login.usermurid')}}" method="post">
                    @csrf
                <div class="field-wrap">
                <label>
                    NIS<span class="req">*</span>
                </label>
                <input type="number"required autocomplete="off" name="nis"/>
                </div>
                <div class="field-wrap">
                <label>
                    Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off" name="password"/>
                </div>
                @if ($errors->has('nis'))
                <span style="color:azure" class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nis') }}</strong>
                </span>
                @endif
                <p>
                <p class="forgot">
                    <a>
                    <span class="fa fa-info-circle"  rel="tooltip" title="Hanya untuk siswa"></span>
                     Info login
                    </a>
                </p>
                <button type="submit" class="button button-block">Log In</button>
                </form>
            </div>

            <div id="login-guru" style="display:none">
                <h1>Login Untuk Guru</h1>
                <form action="{{Route('login.userguru')}}" method="post">
                    @csrf
                    <div class="field-wrap">
                    <label>
                        NIP<span class="req">*</span>
                    </label>
                    <input type="number"required autocomplete="on" name="nip"/>
                    </div>
                    <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password"required autocomplete="off" name="password"/>
                    </div>
                    @if ($errors->has('nip'))
                    <span style="color:azure" class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nip') }}</strong>
                    </span>
                    @endif
                    <p>
                    <p class="forgot">
                        <a>
                        <span class="fa fa-info-circle"  rel="tooltip" title="Hanya untuk guru"></span>
                        Info login
                        </a>
                    </p>
                    <button type="submit" class="button button-block">Log In</button>
                </form>
            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->



 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="{{asset('js/index.js')}}"></script>
 <script>
    $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert-danger").slideUp(500);
    });
</script>

</body>

</html>
