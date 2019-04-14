@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin">Biodata</div>
    <div class="col-8">{{ Session::get('msg') }}</div>
    <form class="col-10" method="POST" action="/editBiodata">
        @csrf
        @foreach ($users as $user)
        <input class="col-10 input-main" type="text" name="name" value="{{ $user->name }}">
        <input class="col-10 input-main" type="text" name="email" value="{{ $user->email }}" disabled>
        <input class="col-10 input-main" type="text" name="agency" placeholder="agency" value="{{ $user->agency }}">
        {{-- <input class="col-10 input-main" type="date" name="tgl" placeholder="Tanggal Lahir yyyy/mm/dd" value="{{ Auth::user()->tgl_lahir }}"> --}}
        <input class="col-10 input-main" type="text" name="phone" placeholder="No. HP" value="{{ $user->phone }}">
        <input class="col-3 submit-main" type="submit" value="Edit Biodata">
        @endforeach
    </form>
</div>

@endsection
