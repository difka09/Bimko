@extends('user.templates.panel.default')
@push('customecss')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
@section('content')
<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin pbot">Daftar Artikel</div>
    <div class="col-12 pic-content bbotn mtop">
        <div class="col-12 main-val">
            @if($feeds->count() == 0)
                tidak ada artikel, buat artikel <a href="{{Route('guest.createfeed')}}">disini</a>
            @endif
            <div class="col-8">{{ Session::get('msg') }}</div>
            @foreach ($feeds as $feed)
                <div class="col-12 val-content subval-content pbot">
                    <div class="col-1 col-xs-2"><img src="{{$feed->getImage()}}"></div>
                    <div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
                        <strong><a href="{{route('feeds.show',$feed)}}" class="col-12 sub-title-news">{{ ucwords($feed->name) }}</a></strong>
                        <div class="col-12">
                            @foreach ($feed->catfeeds as $catfeed)
                           <a class="cat-news">{{ ucwords($catfeed->name) }},</a>
                           @endforeach
                            <span>{{$controller->tanggal($feed->created_at)}}</span>
                            @if ($feed->readby == 0)
                            <a class="time-news">dilihat: 0</a> &nbsp;
                            @else
                            <a class="time-news">dilihat:{{$feed->readby}}</a> &nbsp;
                            @endif
                            @if ($feed->status == 1)
                            <i title="disetujui" class="fa fa-check-circle" style="color:green"></i>
                            @else
                            <i title="belum disetujui/ditolak" class="fa fa-close" style="color:red"></i>
                            @endif
                        </div>
                        <div class="col-12 pad1 ptop">
                            {{-- <a href="/edit/{{ $berita->id }}" class="col-1 col-xs-4 btn-edit">Edit</a> --}}
                            {{-- <button type="submit" href="{{route('guest.deletefeed',$feed)}}" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button> --}}
                            <form method="POST" action="{{route('guest.deletefeed',$feed)}}">
                            @csrf
                            @method("DELETE")
                            <input type="submit" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus artikel ini?')" value="hapus">
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>
    </div>

    {{ $feeds->links('vendor.pagination.default') }}
</div>
@endsection
