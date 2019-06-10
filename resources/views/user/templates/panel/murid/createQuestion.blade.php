@extends('user.templates.panel.default')
@section('content')
<div class="col-10 col-lg-10 col-md-4 main-admin">
<div class="title-admin">Tambah Pesan</div>
<div class="col-8">{{ Session::get('msg') }}</div>
@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="col-8">{{ $error }}</div>
    @endforeach
@endif
<form action="{{Route('murid.addquestion')}}" method="POST">
@csrf
<div class="container">
<input class="col-12 input-main" type="text" name="name" placeholder="Judul pertanyaan">
<textarea class="col-12 input-main" type="text" name="content" placeholder="pesan*" value="{{ old('message') }}"></textarea>
<input class="col-2 submit-main" type="submit" value="Kirim pesan"></div>
</div>

</form>

</div>
@endsection

@push('select2styles')
<style>
/* Chat containers */
.container {
  max-width: 990px;
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

/* Style the right image */
.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

/* Style time text */
.time-right {
  float: right;
  color: #aaa;
}

/* Style time text */
.time-left {
  float: left;
  color: #999;
}
</style>
@endpush
