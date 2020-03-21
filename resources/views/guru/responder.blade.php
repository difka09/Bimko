@extends('guru.templates.wtsidebar')
@section('pageTitle', 'Permintaan Responder')
@section('content')
@push('customecss')
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
.label-default {
    background-color: #777;
}
.label-success {
    background-color: #5cb85c;
}
</style>
@endpush
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">

<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <ul class="nav nav-tabs calendar-events-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#notifications" role="tab">
                                {{-- Event Invites <span class="items-round-little bg-breez">2</span> --}}
                               Daftar Permintaan Persetujuan Responder
                            </a>
                        </li>
                    </ul>
                    {{-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@if ($feeds->count() == 0)
<div class="tab-content">
<div class="tab-pane active" id="notifications" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <table class="event-item-table event-item-table-fixed-width">
                        <thead>
                        <h4 style="text-align: center;font-weight: bold;">Data permintaan responder kosong, tunggu data permintaan persetujuan responder</a></h4>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif
@if ($feeds->count() != 0)

<div class="tab-content">
<div class="tab-pane active" id="notifications" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <table class="event-item-table event-item-table-fixed-width">
                        <thead>
                        <tr>
                            <th class="author">
                                Informasi
                            </th>
                            <th class="location">
                                Judul Artikel
                            </th>
                            <th class="upcoming">
                                Waktu
                            </th>
                            <th class="description">
                                Status
                            </th>
                            <th class="users">
                                Keterangan
                            </th>
                            <th class="add-event">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($feeds as $feed)
                        <tr class="event-item">
                            <td class="author">
                                <div class="event-author inline-items">
                                    {{-- <div class="author-thumb">
                                        <img src="{{asset('guru/img/avatar78-sm.jpg')}}" alt="author">
                                    </div> --}}
                                    <div class="author-date">
                                    <a href="#" class="author-name h6">{{ucwords($feed->user->name)}}</a> telah mengirimkan permintaan persetujuan artikel<a href="#"> {{$feed->name}}</a>
                                    </div>
                                </div>
                            </td>
                            <td class="location">
                                <div class="place inline-items">
                                    <svg class="olymp-checked-calendar-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-checked-calendar-icon')}}"></use></svg>
                                    <strong><span>{{$feed->name}}</span></strong>
                                </div>
                            </td>
                            <td class="upcoming" style="width:100px" >
                                <span>{{$controller->tanggalView($feed->created_at)}}</span>
                            </td>
                            <td class="description" style="text-align: center">
                                @if ($feed->status == 0)
                                <span class="label label-default">Belum Disetujui</span>
                                @else
                                <span class="label label-success">Disetujui</span>
                                @endif
                            </td>
                            <td class="add-event">
                                <a href="javascript:void(0)" class="btn btn-sm btn-border-think custom-color c-grey" id="view-article" data-id="{{$feed->id}}">Lihat Konten</a>
                                @if ($feed->status == 0)
                                <a style="color:white" class="btn btn-breez btn-sm" id="approve-article" data-id="{{$feed->id}}">Setujui Artikel</a>
                                @else
                                <a style="color:white" class="btn btn-primary btn-sm" id="deny-article" data-id="{{$feed->id}}">Tolak Artikel</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif

{{ $feeds->links() }}

</div>

<div class="modal fade show view-content" tabindex="-1" role="dialog" style="display:none; padding-right: 17px;">
    <div class="modal-dialog window-popup" role="document" style="width: 50%">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
            </a>
        <div class="modal-header">
            <h6 class="title" id="content-modal"></h6>
        </div>
        <div class="modal-body">
            <div class="form-group label-floating is-focused">
                <img src="" alt="" class="entry__img">
                <div id="description"></div>
                <span class="material-input"></span>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="modal fade show agree-modal" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
    <div class="modal-dialog create-event" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
            </a>
        <div class="modal-header">
            <h6 class="title" id="title-modal"></h6>
        </div>
        <div class="modal-body">
            <form class="responderForm" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="feed_id" name="feed_id">
                <input type="hidden" name="status" class="statusyes">
                <div style="text-align: center">
                    <a data-dismiss="modal" class="btn btn-sm btn-border-think custom-color c-grey">Batalkan</a>
                    <button type="submit" style="color:white" class="btn btn-breez btn-sm agree-btn"></button>
                    <button type="submit" style="color:white" class="btn btn-primary btn-sm disagree-btn"></button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
@endpush
