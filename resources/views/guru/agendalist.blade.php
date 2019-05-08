@extends('guru.templates.defaultprofil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block responsive-flex">
                <div class="ui-block-title">
                    <ul class="nav nav-tabs calendar-events-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#notifications" role="tab">
                                {{-- Event Invites <span class="items-round-little bg-breez">2</span> --}}
                               Daftar Pelaksanaan Rapat
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                Tempat
                            </th>
                            <th class="upcoming">
                                Waktu
                            </th>
                            <th class="description">
                                Deskripsi
                            </th>
                            <th class="users">
                                Peserta
                            </th>
                            <th class="add-event">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendas as $agenda)
                        <tr class="event-item">
                            <td class="author">
                                <div class="event-author inline-items">
                                    <div class="author-thumb">
                                        <img src="{{asset('guru/img/avatar78-sm.jpg')}}" alt="author">
                                    </div>
                                    <div class="author-date">
                                        <a href="#" class="author-name h6">Walter Havock </a>invited you to <br> an event <a href="#"> Daydreamz New <br> Year’s Party.</a>
                                    </div>
                                </div>
                            </td>
                            <td class="location">
                                <div class="place inline-items">
                                    <svg class="olymp-add-a-place-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-add-a-place-icon')}}"></use></svg>
                                    <span>{{$agenda->place}}</span>
                                </div>
                            </td>
                            <td class="upcoming">
                                <div class="date-event inline-items align-left">
                                    <svg class="olymp-small-calendar-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-calendar-icon')}}"></use></svg>
                                <span>{{date('d-m-Y', strtotime($agenda->start_At))}} pukul {{date('H:i', strtotime($agenda->start_At))}}</span>
                                </div>
                            </td>
                            <td class="description">
                                <p class="description">Let’s celebrate the new year together! We are organizing a big party for all the agency...</p>
                            </td>
                            <td class="users">
                                <ul class="friends-harmonic">
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic5.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic10.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic7.jpg')}}" alt="friend">
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('guru/img/friend-harmonic8.jpg')}}" alt="friend">
                                        </a>
                                    </li>

                                </ul>
                            </td>
                            <td class="add-event">
                                <a href="javascript:void(0)" class="btn btn-breez btn-sm" id="view-detail" data-id="{{$agenda->id}}">Lihat Rincian</a>
                                <a class="btn btn-sm btn-border-think custom-color c-grey">Tulis Notulensi</a>
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

<div class="modal fade show" id="view-agenda" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
    <div class="modal-dialog window-popup create-event" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
            </a>
        <div class="modal-header">
            <h6 class="title">Informasi Rapat</h6>
        </div>
        <div class="modal-body">
            <form>
            <div class="form-group label-floating is-focused">
                <label class="control-label">Nama Rapat</label>
                <input class="form-control" placeholder="" type="text" name="name" id="name" disabled>
                <span class="material-input"></span></div>
            <div class="form-group label-floating is-focused">
                <label class="control-label">Tempat</label>
                <input class="form-control" placeholder="" value="" type="text" name="place" id="place" disabled>
                <span class="material-input"></span></div>
            <div class="form-group date-time-picker label-floating is-focused">
                <label class="control-label">Tanggal</label>
                <input name="date" id="date" disabled>
            </div>

            <div class="row">

            <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="form-group label-floating is-focused" >
                <label class="control-label">Waktu</label>
                <input class="form-control" placeholder="" type="time" name="time" id="time" style="width: 120px" disabled>
                <span class="material-input"></span>
            </div>
            </div>

            </div>

            <div class="form-group label-floating is-focused">
                <label class="control-label">Deskripsi Rapat</label>
                <textarea name="summary" class="form-control" id="summary" disabled>
                </textarea>
                <span class="material-input"></span>
            </div>
        </div>
    </form>

        </div>
    </div>
</div>


@endsection
