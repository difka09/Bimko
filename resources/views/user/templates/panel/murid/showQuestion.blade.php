@extends('user.templates.panel.default')
@section('content')
<div class="col-10 col-lg-10 col-md-4 main-admin">
    <div class="title-admin">Pesan "{{$question->name}}"</div>
<div class="container">
    <span style="font-size: 10pt">saya:</span>
    <p>{{$question->content}}</p>
    <time class="time-right" datetime="{{$question->created_at}}">
    </time>
</div>
@foreach ($data2 as $d2)
@if ($d2->parent == $question->id)
<div class="container darker">
    <span class="pull-right" style="font-size: 10pt">Guru BK:</span>
    <br>
    <p class="pull-right">{{$d2->message}}</p>
    <br>
    <time class="time-left" datetime="{{$d2->created_at}}"></time>
</div>
@endif
@endforeach

@foreach ($data1 as $d1)
<div class="container">
    <span style="font-size: 10pt">saya:</span>
    <p>{{$d1->content}}</p>
    <time class="time-right" datetime="{{$d1->created_at}}"></time>
</div>
@foreach ($data2 as $d2)
@if ($d2->parent == $d1->id)
<div class="container darker">
    <span class="pull-right" style="font-size: 10pt">Guru BK:</span>
    <br>
    <p class="pull-right">{{$d2->message}}</p>
    <br>
    <time class="time-left" datetime="{{$d2->created_at}}">11:01</time>
</div>
@endif
@endforeach
@endforeach

@if ($question->status == 0)
<div class="container">
<form action="{{Route('murid.addmorequestion')}}" method="POST">
@csrf
    <textarea class="col-12 input-main" type="text" name="content" placeholder="pesan*" value="{{ old('message') }}" required></textarea>
    <input type="hidden" name="id" value="{{$question->id}}">
    <input class="col-2 submit-main" type="submit" value="Kirim pesan">

</form>
</div>
@else
<div class="container">
<a style="font-weight: bold;color:black">"Permintaan pesan konseling telah ditutup oleh guru"</a>
</div>
@endif

</div>

@endsection

@push('select2styles')
<style>
/* Chat containers */
.container {
    max-width: 990px;
  border: 2px solid #dedede;
  background-color:gainsboro;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 10px;
}

/* Darker chat container */
.darker {
  border-color: linen;
  background-color: linen;
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
.container span.right {
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
