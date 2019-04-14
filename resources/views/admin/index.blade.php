@extends('admin.templates.default')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
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
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Guru</span>
                        <span class="info-box-number">{{ $guru }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Murid</span>
                            <span class="info-box-number">{{ $murid }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix visible-sm-block"></div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Sales</span>
                          <span class="info-box-number">760</span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                        <div class="info-box-content">
                          <span class="info-box-text">New Members</span>
                          <span class="info-box-number">2,000</span>
                        </div>
                      </div>
                    </div>
                  </div>
                    <br>
                    <br>
                    <br>

                  <div class="row">
                  <div class="col-md-6">
                      <div class="box box-primary">
                          <div class="box-header with-border">
                        <div class="box box-widget widget-user">
                          <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username">{{ auth()->user()->name }}</h3>
                          </div>
                          <div class="widget-user-image">
                            <img class="img-circle" src="http://localhost:8000/admin/dist/img/user2-160x160.jpg" alt="User Avatar">
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

                                <form class="form-horizontal" method="POST" action="">
                                  <div class="box-body">
                                    <div class="form-group"></div>
                                    <div class="form-group"></div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password lama</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="Password Lama">
                                    </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password baru</label>
                                    <div class="col-sm-10">
                                        <input type="password" id="myInput" class="form-control" name="newPassword" id="newPassword" placeholder="Password Baru"><br>
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
