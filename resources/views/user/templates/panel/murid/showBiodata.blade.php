@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin">Biodata</div>
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="col-8">{{ $error }}</div>
    @endforeach
    @endif
    <div class="col-8">{{ Session::get('msg') }}</div>
    <form class="col-10" method="POST" action="{{Route('murid.updateprofil')}}">
        @csrf
        @method("PUT")
        <input type="hidden" value="{{$user->id}}" name="id">
        <input class="col-10 input-main" type="text" name="name" value="{{ ucwords($user->name) }}">
        <input class="col-10 input-main" type="number" name="nis" value="{{ $user->nis }}" disabled>
        <select name="school_id" class="col-10 input-main">
            @foreach ($schools as $school)
            @if ($user->school)
            <option value="{{$school->id}}" {{$user->school->id == $school->id  ? 'selected' : ''}}>{{ucwords($school->name)}}</option>
            @else
            <option value="{{$school->id}}">{{ucwords($school->name)}}</option>
            @endif
            @endforeach
        </select>
        {{-- <input class="col-10 input-main" type="text" value="{{ucwords($user->school->name)}}" placeholder="sekolah"> --}}
        <input class="col-10 input-main" type="password" name="password" placeholder="Untuk melakukan perubahan password/masukkan password baru">
        <input class="col-10 input-main" type="number" name="phone" placeholder="No. HP" value="{{ $user->phone }}">
        <input class="col-3 submit-main" type="submit" value="Edit Biodata">
    </form>
</div>

@endsection
