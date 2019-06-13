@extends('guru.templates.defaultprofil')
@section('pageTitle', 'Agenda')
@section('content')

<div class="container">
    <div class="row">
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            @include('admin.templates.partials._alerts')
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
                    <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                        <ul class="more-dropdown">
                            <li>
                                <a data-target="#create-event" data-toggle="modal" href="#" >Buat Undangan Rapat</a>
                            </li>
                        </ul>
                    </div>
                    {{-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a> --}}
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
                        <h4 style="text-align: center;font-weight: bold;">Data rapat kosong,<a data-target="#create-event" href="#" data-toggle="modal"> buat undangan rapat</a>
                        </h4>
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
                                    <a href="#" class="author-name h6">{{$agenda->user->name}}</a> telah membuat undangan<br> rapat <a href="#"> {{$agenda->name}}</a>
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
                                    @if ($agenda->detailAgenda == null)
                                    @else
                                    @foreach ($agenda->detailAgenda->users as $user)
                                    <li>
                                        <a title="{{$user->name}}" href="#">
                                            <img src="{{$user->getImage()}}" alt="friend" style="width: 100%;height:100%">
                                        </a>
                                    </li>
                                    @endforeach
                                    @endif

                                </ul>
                            </td>
                            <td class="add-event">
                                <a style="color:white" href="javascript:void(0)" class="btn btn-breez btn-sm" id="view-detail" data-id="{{$agenda->id}}">Lihat Rincian</a>
                                @if ($agenda->user_id == auth()->user()->id)
                                @if ($agenda->detailAgenda == null)
                                <a style="color:white" class="btn btn-grey btn-sm" id="edit-agenda" data-id="{{$agenda->id}}">Tulis Notulensi</a>
                                @endif
                                @endif
                            </td>
                            <td class="add-event">
                                    {{-- @if ($agenda->user_id == auth()->user()->id) --}}
                                <div class="more"><svg class="olymp-settings"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-settings')}}"></use></svg>
                                    <ul class="more-dropdown">

                                        @if ($agenda->detailAgenda == null)
                                            <li>
                                            <a href="javascript:void(0)" data-id="{{$agenda->id}}" class="edit-detail">Edit Undangan</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="javascript:void(0)" class="delete-agenda" data-id="{{$agenda->id}}">Hapus Undangan</a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- @else --}}
                                {{-- @endif --}}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        {{$agendas->links()}}

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
            <form id="edit-agendalist" method="POST" action="javascript:void(0)">
            <div class="form-group label-floating is-focused">
                <label class="control-label">Nama Rapat</label>
                <input class="form-control" placeholder="" type="text" name="name" id="name" disabled required>
                <span class="material-input"></span></div>
            <div class="form-group label-floating is-focused">
                <label class="control-label">Tempat</label>
                <input class="form-control" placeholder="" value="" type="text" name="place" id="place" disabled required>
                <span class="material-input"></span></div>
            <div class="form-group date-time-picker label-floating is-focused">
                <label class="control-label">Tanggal</label>
                <input name="date" id="date" disabled>
                <input name="editdate" type="date" id="editdate" required>
            </div>

            <div class="row">

            <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="form-group label-floating is-focused" >
                <label class="control-label">Waktu</label>
                <input class="form-control" placeholder="" type="time" name="time" id="time" style="width: 120px" disabled required>
                <span class="material-input"></span>
            </div>
            </div>

            </div>

            <div class="form-group label-floating is-focused">
                <label class="control-label">Deskripsi Rapat</label>
                <textarea name="description" class="form-control" id="description" disabled required>
                </textarea>
                <span class="material-input"></span>
            </div>

            <div class="form-group label-floating is-focused" id="notulen-input">
                <label class="control-label">Notulensi Rapat</label>
                <textarea name="agenda_not" class="form-control" id="agenda_not" disabled>
                </textarea>
                <span class="material-input"></span>
            </div>

            <div class="form-group" id="agenda-file">
            <svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg>
            <div id="filename_file"></div>
            <span class="material-input"></span>
            </div>
            <input type="hidden" id="agendaid" name="agenda_id">
            <input type="submit" class="btn btn-breez btn-lg full-width" id="update-agenda-btn" style="pointer-events: none;display:none" value="Edit Agenda" disabled>
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
            {{-- <form method="post" action="{{Route('guru.updateagenda',$agenda->id)}}" enctype="multipart/form-data"> --}}
                @csrf
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
                <span class="size_error" style="color:red"></span>
                <span class="material-input"></span>
            </div>
            <input type="hidden" id="agenda_id" name="agenda_id">
            <button type="submit" class="btn btn-breez btn-lg full-width" onclick="myFunction()">Tambah Notulensi</button>
        </div>
    </form>

        </div>
    </div>
</div>

<div class="modal fade show" id="create-event" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
        <div class="modal-dialog window-popup create-event" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
                </a>
            <div class="modal-header">
                <h6 class="title">Buat Agenda Rapat</h6>
            </div>
            <div class="modal-body">
                <form action="{{Route('guru.addagenda')}}" method="POST">
                    @csrf
                <div class="form-group label-floating">
                    <label class="control-label">Nama Rapat</label>
                    <input class="form-control" placeholder="" type="text" name="name" required>
                    <span class="material-input"></span></div>
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Tempat</label>
                    <input class="form-control" placeholder="" value="" type="text" name="place" required>
                    <span class="material-input"></span></div>
                <div class="form-group date-time-picker label-floating is-focused">
                    <label class="control-label">Tanggal</label>
                    <input name="date" type="date" id="txtDate" required>
                </div>

                <div class="row">

                <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group label-floating is-focused" >
                    <label class="control-label">Waktu</label>
                    <input class="form-control" placeholder="" type="time" name="time" id="txtTime" style="width: 120px" required>
                    <span class="material-input"></span>
                </div>
                </div>
                </div>

                <div class="form-group label-floating is-empty">
                    <label class="control-label">Deskripsi Rapat</label>
                    <textarea name="description" class="form-control">
                    </textarea>
                    <span class="material-input"></span>
                </div>

                <button type="submit" id="create-agenda-btn" class="btn btn-breez btn-lg full-width" style="pointer-events: none" disabled>Buat Rapat</button>
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

<script>
    $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert-danger").slideUp(500);
    });
</script>

@endpush
