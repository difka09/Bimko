@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin">Biodata</div>
    <div class="col-8">{{ Session::get('msg') }}</div>
    <form class="col-10" method="POST" action="{{Route('murid.updateprofil')}}">
        @csrf
        @method("PUT")
        <input type="hidden" value="{{$user->id}}" name="id">
        <input class="col-10 input-main" type="text" name="name" value="{{ $user->name }}">
        <input class="col-10 input-main" type="number" name="nis" value="{{ $user->nis }}" disabled>
        <select name="school_id" class="col-10 input-main">
            @foreach ($schools as $school)
            <option value="{{$school->id}}" {{$user->school->id == $school->id  ? 'selected' : ''}}>{{$school->name}}</option>
            @endforeach
        </select>
        {{-- <input class="col-10 input-main" type="text" value="{{$user->school->name}}" placeholder="sekolah"> --}}
        <input class="col-10 input-main" type="password" name="password" placeholder="Untuk melakukan perubahan password/masukkan password baru">
        <input class="col-10 input-main" type="number" name="phone" placeholder="No. HP" value="{{ $user->phone }}">
        <input class="col-3 submit-main" type="submit" value="Edit Biodata">
    </form>
</div>

@endsection
