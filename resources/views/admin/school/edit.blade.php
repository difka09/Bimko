@extends('admin.templates.default')

@section('content')
<div class="col-md-5 col-md-offset-3">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Data Sekolah</h3>
        </div>
            <form action="{{ route('school.update',$school) }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="name" class="form-control" value="{{ $school->name ?? old('name') }}" placeholder="Nama Lengkap">
                    @if ($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('address') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" value="{{ $school->address ?? old('address') }}" placeholder="jalan, kecamatan, kabupaten">
                    @if ($errors->has('school'))
                        <p class="help-block">
                            {{ $errors->first('school') }}
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

                <div class="form-group {{ $errors->has('description') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <textarea name="description" rows="5" class="form-control" placeholder="Keterangan Sekolah">{{ $school->description ?? old('description') }} </textarea>
                    {{-- <input type="text" name="description" class="form-control" value="{{ $school->description ?? old('description') }}" placeholder="keterangan Sekolah"> --}}
                    @if ($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('longitude') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Longitude</label>
                    <div class="col-sm-10">
                    <input type="text" id="long" name="longitude" class="form-control" value="{{ $school->longitude ?? old('longitude') }}" placeholder="longitude">
                    @if ($errors->has('longitude'))
                        <p class="help-block">
                            {{ $errors->first('longitude') }}
                        </p>
                     @endif
                    </div>
                </div>

                <div class="form-group {{ $errors->has('latitude') ? 'has-error' :'' }}">
                    <label for="" class="col-sm-2 control-label">Latitude</label>
                    <div class="col-sm-10">
                    <input type="text" id="lat" name="latitude" class="form-control" value="{{ $school->latitude ?? old('latitude') }}" placeholder="Latitude">
                    @if ($errors->has('latitude'))
                        <p class="help-block">
                            {{ $errors->first('latitude') }}
                        </p>
                    @endif
                    </div>
                </div>

                <div class="form-group" {{ $errors->has('image') ? 'has-error' :'' }}>
                    <label for="" class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                    <input type="file" name="image" class="form-control" value="{{ $school->image ?? old('image') }}" placeholder="maks 2 Mb">
                    @if ($errors->has('image'))
                    <p class="help-block">
                        {{ $errors->first('image') }}
                    </p>
                @endif
                    </div>
                </div>
                <div class="col-sm-12">
                        <div class="panel-body no-padding">
                            <div id="map"></div>
                        </div>
                    </div>

        </div>
        <div class="box-footer">
            <a href="{{ route('school.index') }}" class="btn btn-default">Batal</a>
            <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var map = new GMaps({
    el: '#map',
    zoom: 12,
    lat: -6.9611102,
    lng: 111.4038343,
    click: function(e) {
    // alert('click');
    var latLng = e.latLng;
    console.log(latLng);
    var lat = $('#lat');
    var long = $('#long');

    lat.val(latLng.lat());
    long.val(latLng.lng());
    map.removeMarkers();
    map.addMarker({
        lat: latLng.lat(),
        lng: latLng.lng(),
        title: 'Create Here',
        click: function(e) {
            alert('You clicked in this marker');
        }
    });

    },
    });
</script>

@endpush
