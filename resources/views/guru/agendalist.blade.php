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
@if ($agendas->count() == 0)
<div class="tab-content">
<div class="tab-pane active" id="notifications" role="tabpanel">
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <table class="event-item-table event-item-table-fixed-width">
                        <thead>
                            <h4 style="text-align: center;font-weight: bold;">Data rapat kosong</h4>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endif
@if ($agendas->count() != 0)

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
                                    {{-- <div class="author-thumb">
                                        <img src="{{asset('guru/img/avatar78-sm.jpg')}}" alt="author">
                                    </div> --}}
                                    <div class="author-date">
                                    <a href="#" class="author-name h6">{{$agenda->creator}}</a> telah membuat undangan<br> rapat <a href="#"> {{$agenda->name}}</a>
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
                                <p class="description">{{$agenda->description}}</p>
                            </td>
                            <td class="users">
                                <ul class="friends-harmonic">
                                    @foreach ($agenda->users as $user)
                                    <li>
                                        <a title="{{$user->name}}" href="#">
                                            <img src="{{$user->getImage()}}" alt="friend">
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="add-event">
                                <a href="javascript:void(0)" class="btn btn-breez btn-sm" id="view-detail" data-id="{{$agenda->id}}">Lihat Rincian</a>
                                @if ($agenda->status == 0)
                                <a class="btn btn-sm btn-border-think custom-color c-grey" id="edit-agenda" data-id="{{$agenda->id}}">Tulis Notulensi</a>
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
<div id="snackbar">Berhasil menambahkan notulensi</div>

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
                <textarea name="description" class="form-control" id="description" disabled>
                </textarea>
                <span class="material-input"></span>
            </div>

            <div class="form-group label-floating is-focused">
                <label class="control-label">Notulensi Rapat</label>
                <textarea name="agenda_not" class="form-control" id="agenda_not" disabled>
                </textarea>
                <span class="material-input"></span>
            </div>

            <div class="form-group">
            <svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg>
            <div id="filename_file"></div>
            <span class="material-input"></span>
            </div>

        </div>
    </form>

        </div>
    </div>
</div>

<div class="modal fade show" id="add-notulensi" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
    <div class="modal-dialog window-popup create-event" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
            </a>
        <div class="modal-header">
            <h6 class="title" id="title-modal"></h6>
        </div>
        <div class="modal-body">
            <form id="notulensiForm" method="post" action="javascript:void(0)" enctype="multipart/form-data">
            <div class="form-group label-floating is-focused">
                <label class="control-label">Nama Rapat</label>
                <input class="form-control" placeholder="" type="text" name="name" id="agenda_name" disabled>
                <span class="material-input"></span></div>

            <label for="" class="control-label is-focused">Peserta Rapat</label>
                <select name="user[]" id="" class="form-control select2" multiple="multiple" style="width: 422px">
                    @foreach ($users as $user)
                    <option style="background-color: aqua;color:black" value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

            <div class="form-group label-floating is-focused">
                <label class="control-label">Notulensi Rapat</label>
                <textarea name="summary" class="form-control" id="summary-notulensi">
                </textarea>
                <span class="material-input"></span>
            </div>

            <div class="form-group label-floating is-focused">
                <label class="control-label">File</label>
                <input class="form-control" placeholder="" type="file" name="file" id="file" accept=".xlsx,.xls,.doc, .docx,.ppt, .pptx,.txt,.pdf,.rar,.zip,.7zip">
                <span class="material-input"></span>
            </div>
            <input type="hidden" id="agenda_id" name="agenda_id">
            <button type="submit" class="btn btn-breez btn-lg full-width" onclick="myFunction()">Tambah Notulensi</button>
        </div>
    </form>

        </div>
    </div>
</div>
@endsection
@push('select2css')
    <link rel="stylesheet" href="{{ asset('guru/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('guru/select2/dist/js/select2.full.min.js') }}"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>
<script>
    function myFunction() {
        var x = document.getElementById("snackbar");
        x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
</script>
@endpush
