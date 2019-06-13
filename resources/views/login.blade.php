<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login Bimko</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
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
                <p class="forgot"><a href="/register">Belum punya akun? Daftar Disini</a></p>
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
                    <input type="number"required autocomplete="off" name="nip"/>
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
                    <button type="submit" class="button button-block">Log In</button>
                </form>
            </div>

        </div><!-- tab-content -->

    </div> <!-- /form -->



 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="{{asset('js/index.js')}}"></script>
</body>

</html>
