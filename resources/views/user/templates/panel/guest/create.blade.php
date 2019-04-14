@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin">Tambah Artikel</div>
        @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="col-8">{{ $error }}</div>
            @endforeach
        @endif
    {{-- <div class="col-8">{{ Session::get('msg') }}</div> --}}
        <form class="col-12" action="{{ route('feed.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <input class="col-8 input-main" type="text" name="name" placeholder="Judul Artikel" required value="{{ old('name') }}">
            <input class="col-8 input-main" type="file" name="file" placeholder="Foto" required>
            <input type="hidden" name="user_id" value="{{auth::user()->id}}">
            <div class="form-group {{ $errors->has('catfeed') ? 'has-error' :'' }}">
                <label for="" class="col-8 control-label">Kategori : </label>
                    <div class="col-8">
                        <select name="catfeed[]" id="" class="col-8 form-control select2" multiple="multiple">
                            @foreach ($catfeeds as $catfeed)
                            <option value="{{ $catfeed->id }}">{{ $catfeed->name }}</option>
                            @endforeach
                        </select>
                    @if ($errors->has('catfeed'))
                        <p class="help-block">
                            {{ $errors->first('catfeed') }}
                        </p>
                        @endif
                    </div>
            </div>
            <div class="col-9"><textarea  name="content" id="addPost">{{ old('content') }}</textarea></div>
            <input class="col-4 submit-main" type="submit" value="Tambah Artikel">
    </form>
</div>

@endsection

@push('select2styles')
<link rel="stylesheet" href="{{ asset('user/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('user/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
@endpush
