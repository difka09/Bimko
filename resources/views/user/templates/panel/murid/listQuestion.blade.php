@extends('user.templates.panel.default')
@push('customecss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.label {
    display: inline;
    padding: .2em .6em .3em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    color: #fff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25em;
}
.label-info {
    background-color: #5bc0de;
}
.label-success {
    background-color: #5cb85c;
}
</style>
@endpush
@section('content')
<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin pbot">Daftar Pesan Pertanyaan</div>
    <div class="col-12 pic-content bbotn mtop">
        <div class="col-12 main-val">
            <div class="col-8">{{ Session::get('msg') }}</div>
            <div class="col-12 val-content subval-content pbot">
            @if ($questions->count() == 0)
                <span>daftar pesan konseling kosong, silahkan tambahkan pesan </span><a href="{{Route('murid.createquestion')}}">di sini</a>
            @endif
            @foreach ($questions as $question)
                    <div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
                        <strong><a href="{{route('murid.showquestion',['id' => Crypt::encrypt($question->id)])}}" class="col-12 sub-title-news">{{ $question->name }}</a></strong>
                        <div class="col-md-4 col-lg-4">
                        <a>{{$controller->tanggal($question->created_at)}}</a>
                        </div>
                        <div class="col-md-4 col-lg-4">
                        @if ($question->status == 1)
                            <span class="label label-success">Konseling ditutup</span>
                            @else
                            <span class="label label-info">Konseling dibuka</span>
                        @endif
                        </div>
                        <div class="col-md-4 col-lg-4">
                        <form method="POST" action="{{route('murid.deletequestion',$question)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus pertanyaan ini?')" value="X">
                        </form>
                        </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
    </div>

    {{ $questions->links('vendor.pagination.default') }}
</div>
@endsection
