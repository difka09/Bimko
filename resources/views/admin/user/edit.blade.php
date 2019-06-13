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

                @if ($user->gender!=0)
                <div class="form-group {{ $errors->has('gender') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                    <select name="gender" class="form-control">
                        <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Laki-Laki</option>
                        <option value="2" {{$user->gender == 2 ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @if ($errors->has('gender'))
                        <p class="help-block">
                            {{ $errors->first('gender') }}
                        </p>
                    @endif
                    </div>
                </div>
                @endif

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
                @if ($user->nip != 0)
                <div class="form-group {{ $errors->has('nip') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">NIP</label>
                    <div class="col-sm-10">
                    <input type="number" name="nip" class="form-control" value="{{ $user->nip ?? old('nip') }}" placeholder="NIP">
                    @if ($errors->has('nip'))
                        <p class="help-block">
                            {{ $errors->first('nip') }}
                        </p>
                        @endif
                    </div>
                </div>
                @endif
                @if ($user->nis != 0)
                <div class="form-group {{ $errors->has('nis') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-10">
                    <input type="number" name="nis" class="form-control" value="{{ $user->nis ?? old('nis') }}" placeholder="NIS">
                    @if ($errors->has('nis'))
                        <p class="help-block">
                            {{ $errors->first('nis') }}
                        </p>
                        @endif
                    </div>
                </div>
                @endif

                @if ($user->school_id != 0)
                <div class="form-group {{ $errors->has('school_id') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Sekolah</label>
                    <div class="col-sm-10">
                    <select name="school_id" class="form-control">
                        @foreach ($schools as $school)
                        <option value="{{$school->id}}" {{$user->school_id == $school->id ? 'selected' : ''}}>{{$school->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('school_id'))
                        <p class="help-block">
                            {{ $errors->first('school_id') }}
                        </p>
                    @endif
                    </div>
                </div>
                @endif


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
            <a href="{{ URL::previous() }}" class="btn btn-default">Batal</a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
        </form>
    </div>
</div>
@endsection
