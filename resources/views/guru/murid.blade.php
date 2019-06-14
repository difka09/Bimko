@extends('guru.templates.wtsidebar')
@section('pageTitle', 'Permintaan Konseling')
@section('content')
@push('customizecss')
<style>

.pull-right {
    float: right!important;
}
.pull-left {
    float: left!important;
}
.chat
{
    list-style: none;
    margin: 0;
    padding: 0;
}

.chat li
{
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
}

.chat li.left .chat-body
{
    margin-left: 60px;
}

.chat li.right .chat-body
{
    margin-right: 60px;
}


.chat li .chat-body p
{
    margin: 0;
    color: #777777;
}

.panel .slidedown .glyphicon, .chat .glyphicon
{
    margin-right: 5px;
}

.modal-body
{
    overflow-y: scroll;
}

::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

/* Important part */
/* .modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 450px;
    overflow-y: auto;
} */
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}

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
.label-warning {
    background-color: #f0ad4e;
}
.label-success {
    background-color: #5cb85c;
}

</style>
@endpush
@section('content')
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
        @include('admin.templates.partials._alerts')
    <div class="container">
        <div class="row">
            <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="ui-block responsive-flex">
                    <div class="ui-block-title">
                        <ul class="nav nav-tabs calendar-events-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#notifications" role="tab">
                                    {{-- Event Invites <span class="items-round-little bg-breez">2</span> --}}
                                    Daftar Permintaan Konseling Siswa
                                </a>
                            </li>
                        </ul>
                        {{-- <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($questions->count() == 0)
    <div class="tab-content">
    <div class="tab-pane active" id="notifications" role="tabpanel">
        <div class="container">
            <div class="row">
                <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="ui-block">
                        <table class="event-item-table event-item-table-fixed-width">
                            <thead>
                            <h4 style="text-align: center;font-weight: bold;">Data permintaan pesan konseling kosong, tunggu data permintaan pesan konseling dari siswa</a></h4>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endif
    @if ($questions->count() != 0)

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
                                    Judul Pesan
                                </th>
                                <th class="upcoming">
                                    Waktu
                                </th>
                                <th class="description">
                                    Status
                                </th>
                                <th class="users">
                                    Opsi
                                </th>
                                <th class="add-event">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($questions as $question)
                            <tr class="event-item">
                                <td class="author">
                                    <div class="event-author inline-items">
                                        {{-- <div class="author-thumb">
                                            <img src="{{asset('guru/img/avatar78-sm.jpg')}}" alt="author">
                                        </div> --}}
                                        <div class="author-date">
                                        <a href="#" class="author-name h6">{{$question->user->name}}</a> telah mengirimkan permintaan pesan konseling<a href="#"> {{$question->name}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="location">
                                    <div class="place inline-items">
                                        <strong><span>{{$question->name}}</span></strong>
                                    </div>
                                </td>
                                <td class="upcoming" style="width:100px" >
                                    <div class="place inline-items">
                                        <span>{{$controller->tanggalView($question->created_at)}}</span>
                                    </div>
                                </td>
                                <td class="description" style="text-align: center">
                                    @if ($question->status == 0)
                                    <span class="label label-warning">Konseling Dibuka</span>
                                    @else
                                    <span class="label label-success">Konseling Ditutup</span>
                                    @endif
                                </td>
                                <td class="add-event">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-border-think custom-color c-grey" id="view-question" data-id="{{$question->id}}">Lihat pesan</a>
                                    @if ($question->status == 0)
                                    @if($question->answers->count()==0)
                                    <a style="color:white" class="btn btn-green btn-sm close-question" data-id="{{$question->id}}">Tutup konseling</a>
                                    @else
                                    <?php $answerid = $question->answers[0]->user_id ?>
                                    @if(auth()->user()->id == $answerid)
                                    <a style="color:white" class="btn btn-green btn-sm close-question" data-id="{{$question->id}}">Tutup konseling</a>
                                    @endif
                                    @endif
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
    {{ $questions->links() }}
    </div>
@endsection

<div class="modal fade show questionModal" tabindex="-1" role="dialog" style="display:none; padding-right: 17px;">
    <div class="modal-dialog window-popup" role="document" style="width: 50%">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
            <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
            </a>
        <div id="modal-chat">
        </div>
        </div>
    </div>
</div>

<div class="modal fade show closeconselingModal" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
        <div class="modal-dialog create-event" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
                </a>
            <div class="modal-header">
                <h6 class="title" id="title-close"></h6>
            </div>
            <div class="modal-body">
                <form class="closeForm" method="post" action="javascript:void(0)">
                    @csrf
                    <input type="hidden" name="question_id" id="question_id">
                    <div style="text-align: center">
                        <a data-dismiss="modal" class="btn btn-sm btn-border-think custom-color c-grey">Batalkan</a>
                        <button type="submit" style="color:white" class="btn btn-sm close-btn"></button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click','#view-question',function(){
            var id = $(this).data('id');
            $.ajax({
                url : urls[22] + '/show/' + id,
                method : "POST",
                data : {id:id, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (data)
                {
                    if(data != '')
                    {
                        $('#modal-chat').html(data);
                        $('.questionModal').modal('show');
                    }
                    else
                    {
                        return false;
                    }
                }
            });
        });
    });
</script>
<script>
    $("#alert-guru-success").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert-guru-success").slideUp(500);
    });

    $("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
        $("#alert-danger").slideUp(500);
    });
</script>
@endpush
