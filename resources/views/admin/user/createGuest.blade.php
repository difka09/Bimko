@extends('admin.templates.default')

@section('content')
<div class="col-md-5 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Responder</h3>
        </div>
            <form action="{{Route('user.guest.store')}}" class="form-horizontal" method="POST">
                @csrf
            <div class="box-body">

                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap">
                    @if ($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('email') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@host.com">
                    @if ($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="min 8 karakter">
                    @if ($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('agency') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Instansi</label>
                    <div class="col-sm-10">
                    <input type="text" name="agency" class="form-control" value="{{ old('agency') }}" placeholder="Instansi">
                    @if ($errors->has('agency'))
                        <p class="help-block">
                            {{ $errors->first('agency') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Nomor HP</label>
                    <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="min 10 karakter">
                    @if ($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="file" name="file" class="form-control" value="{{ old('file') }}" placeholder="maks 2 Mb">
                    </div>
                </div>

        </div>
        <div class="box-footer">
            <a href="{{ URL::previous() }}" class="btn btn-default">Batal</a>
            <button type="submit" class="btn btn-info pull-right">Simpan</button>
        </div>
        </form>
    </div>
</div>
@endsection
