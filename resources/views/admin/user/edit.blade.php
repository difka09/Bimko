@extends('admin.templates.default')

@section('content')
<div class="col-md-5 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit a User</h3>
        </div>
            <form action="{{ route('user.update',$user) }}" class="form-horizontal" method="POST">
                @csrf
                @method("PUT")
            <div class="box-body">
                {{-- <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="">
                    </div>
                </div> --}}

                {{-- <div class="form-group">
                    <label for="" class="col-sm-2 control-label">Instansi</label>
                    <div class="col-sm-10">
                    <input type="text" name="agency" class="form-control" value="Nama Sekolah">
                    </div>
                </div> --}}

                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ $user->name ?? old('name') }}" placeholder="Nama Lengkap">
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
                    <input type="email" name="email" class="form-control" value="{{ $user->email ?? old('email') }}" placeholder="email@host.com">
                    @if ($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                    </div>
                </div>

                {{-- <div class="form-group {{ $errors->has('password') ? 'has-error' :'' }}" hidden>
                    <label for="" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" value="{{ $user->password ?? old('password') }}" placeholder="min 8 karakter">
                    @if ($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                     @endif
                    </div>
                </div> --}}

                <div class="form-group {{ $errors->has('identity') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Nomor Identitas</label>
                    <div class="col-sm-10">
                    <input type="number" name="identity" class="form-control" value="{{ $user->identity ?? old('identity') }}" placeholder="NIS">
                    @if ($errors->has('identity'))
                        <p class="help-block">
                            {{ $errors->first('identity') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('grade') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-10">
                    <input type="number" name="grade" class="form-control" value="{{ $user->grade ?? old('grade') }}" placeholder="10 - 12">
                    @if ($errors->has('grade'))
                        <p class="help-block">
                            {{ $errors->first('grade') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('phone') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Nomor HP</label>
                    <div class="col-sm-10">
                    <input type="number" name="phone" class="form-control" value="{{ $user->phone ?? old('phone') }}" placeholder="min 10 karakter">
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
                    <input type="file" name="file" class="form-control" value="{{ $user->file ?? old('file') }}" placeholder="maks 2 Mb">
                    </div>
                </div>

        </div>
        <div class="box-footer">
            <a href="{{ route('user.index') }}" class="btn btn-default">Batal</a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
        </form>
    </div>
</div>
@endsection
