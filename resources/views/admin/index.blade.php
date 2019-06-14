@extends('admin.templates.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dashboard Admin
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <section class="content">
            <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-user-md"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Guru</span>
                        <span class="info-box-number">{{ $guru }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        {{-- <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span> --}}
                        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">Murid</span>
                            <span class="info-box-number">{{ $murid }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Responder</span>
                            <span class="info-box-number">{{$responder}}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-university"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sekolah</span>
                            <span class="info-box-number">{{$school}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                    <br>
                    <br>
                    <br>

                  <div class="row">
                        @include('admin.templates.partials._alerts')
                  <div class="col-md-6">
                      <div class="box box-primary">
                          <div class="box-header with-border">
                        <div class="box box-widget widget-user">
                          <div class="widget-user-header bg-aqua-active">
                            <h3 style="text-align: center" class="widget-user-username" style="font-weight: bold">"{{ auth()->user()->name }}"</h3>
                          </div>
                          <div class="box-footer"></div>
                            <form class="form-horizontal">
                                <div class="box-body">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="{{ auth()->user()->email }}" disabled>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="{{ auth()->user()->name }}" disabled>
                                    </div>
                                    <label for="" class="col-sm-2 control-label">Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail3" value="{{ auth()->user()->phone }}" disabled>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="box box-info">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Reset Password</h3>
                                </div>

                                <form class="form-horizontal" method="POST" action="{{Route('admin.changepassword')}}">
                                    @csrf
                                    @method("PUT")
                                    <div class="box-body">
                                    <div class="form-group"></div>
                                    <div class="form-group"></div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password Lama">
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="myInput" class="form-control" name="new_password" placeholder="Password Baru"><br>
                                        <input type="checkbox" onclick="myFunction()"> Lihat Password
                                    </div>
                                    </div>
                                    <div class="form-group"></div>
                                    <div class="form-group"></div>
                                  </div>
                                  <div class="box-footer">
                                    <button type="submit" class="btn btn-info pull-right">Ganti Password</button>
                                  </div>

                                </form>
                              </div>
                        </div>
                </div>
      </section>
@endsection
@push('scripts')
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

@endpush
