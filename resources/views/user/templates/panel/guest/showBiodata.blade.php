@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin">Biodata</div>
    {{-- <div class="col-8">{{ Session::get('msg') }}</div> --}}
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="col-8">{{ $error }}</div>
    @endforeach
    @endif

    <form class="col-10" method="POST" action="{{Route('guest.updateprofil')}}">
        @csrf
        @method("PUT")
        <input type="hidden" value="{{$user->id}}" name="id">
        <input class="col-10 input-main" type="text" name="name" value="{{ ucwords($user->name) }}">
        <input class="col-10 input-main" type="email" name="email" value="{{ $user->email }}" disabled>
        <input class="col-10 input-main" type="text" name="agency" placeholder="agency" value="{{ ucwords($user->agency) }}">
        <input class="col-10 input-main" type="password" name="password" placeholder="Untuk melakukan perubahan password/masukkan password baru">
        {{-- <input class="col-10 input-main" type="date" name="tgl" placeholder="Tanggal Lahir yyyy/mm/dd" value="{{ Auth::user()->tgl_lahir }}"> --}}
        <input class="col-10 input-main" type="number" name="phone" placeholder="No. HP" value="{{ $user->phone }}">
        <input class="col-3 submit-main" type="submit" value="Edit Biodata">
    </form>
</div>

@endsection
