<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Daftar Akun Responder</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  {{-- <link type="text/css" rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}" /> --}}
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
    @include('admin.templates.partials._alerts')
    <div class="form">
             <div id="login-responder" style="display:block">
                <h1>Daftar Sebagai Responder</h1>
                <form action="{{Route('guest.store')}}" method="POST">
                    @csrf
                <div class="field-wrap {{ $errors->has('name') ? 'has-error' :'' }}">
                    <label class=" active">
                        Nama<span class="req">*</span>
                    </label>
                    <input type="text"required autocomplete="off" name="name" value="{{ old('name') }}" placeholder="Nama"/>
                    @if ($errors->has('name'))
                    <br>
                    <p class="help-block" style="color:coral">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                </div>

                <div class="field-wrap {{ $errors->has('email') ? 'has-error' :'' }}">
                <label class=" active">
                    Email Address<span class="req">*</span>
                </label>
                <input type="email"required autocomplete="off" name="email" value="{{ old('email') }}" placeholder="email:abc@domain.com"/>
                @if ($errors->has('email'))
                <br>
                <p class="help-block" style="color:coral">
                    {{ $errors->first('email') }}
                </p>
                @endif
                </div>

                <div class="field-wrap {{ $errors->has('password') ? 'has-error' :'' }}">
                <label class=" active">
                    Password<span class="req">*</span>
                </label>
                <input type="password"required autocomplete="off" name="password" placeholder="password"/>
                @if ($errors->has('password'))
                <br>
                <p class="help-block" style="color:coral">
                    {{ $errors->first('password') }}
                </p>
                @endif
                </div>

                <div class="field-wrap {{ $errors->has('agency') ? 'has-error' :'' }}">
                <label class=" active">
                    Instansi<span class="req">*</span>
                </label>
                <input type="text"required autocomplete="off" name="agency" value="{{ old('agency') }}" placeholder="Instansi:Universitas Diponegoro"/>
                @if ($errors->has('agency'))
                <br>
                <p class="help-block" style="color:coral">
                    {{ $errors->first('agency') }}
                </p>
                @endif
                </div>

                <div class="field-wrap {{ $errors->has('phone') ? 'has-error' :'' }}">
                <label class=" active">
                    Nomor HP<span class="req">*</span>
                </label>
                <input type="number"required autocomplete="off" name="phone" value="{{ old('phone') }}" placeholder="Nomor HP"/>
                @if ($errors->has('phone'))
                <br>
                <p class="help-block" style="color:coral">
                    {{ $errors->first('phone') }}
                </p>
                @endif
                </div>

                <p class="forgot"><a href="/login">Sudah punya akun? Login Disini</a></p>
                <button type="submit" class="button button-block">Daftar</button>
                </form>
            </div>

    </div> <!-- /form -->



 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
 <script>
    $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert-danger").slideUp(500);
    });
</script>
<script  src="{{asset('js/index.js')}}"></script>
</body>

</html>
