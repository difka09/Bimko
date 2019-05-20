@extends('admin.templates.default')

@section('content')
<div class="col-md-5 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Kategori</h3>
        </div>
            <form action="{{Route('user.category.store')}}" class="form-horizontal" method="POST">
                @csrf
            <div class="box-body">

                <div class="form-group {{ $errors->has('name') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nama Lengkap">
                    @if ($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
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
