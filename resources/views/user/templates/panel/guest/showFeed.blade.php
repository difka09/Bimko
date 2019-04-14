@extends('user.templates.panel.default')
@section('content')
<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin pbot">Daftar Berita</div>
    <div class="col-12 pic-content bbotn mtop">
        <div class="col-12 main-val">
            <div class="col-8">{{ Session::get('msg') }}</div>
            @foreach ($feeds as $feed)
                <div class="col-12 val-content subval-content pbot">
                    <div class="col-1 col-xs-2"><img src="{{$feed->getImage()}}"></div>
                    <div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
                        <strong><a href="{{route('feeds.show',$feed)}}" class="col-12 sub-title-news">{{ $feed->name }}</a></strong>
                        <div class="col-12">
                            @foreach ($feed->catfeeds as $catfeed)
                           <a class="cat-news">{{ $catfeed->name }},</a>
                           @endforeach
                            <span>{{$controller->tanggal($feed->created_at)}}</span>
                            <a class="time-news">dilihat:{{$feed->readby}}x</a>


                        </div>
                        <div class="col-12 pad1 ptop">
                            {{-- <a href="/edit/{{ $berita->id }}" class="col-1 col-xs-4 btn-edit">Edit</a> --}}
                            {{-- <button type="submit" href="{{route('guest.deletefeed',$feed)}}" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button> --}}
                            <form method="POST" action="{{route('guest.deletefeed',$feed)}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
