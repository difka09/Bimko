@extends('user.templates.panel.default')
@section('content')

<div class="col-10 col-lg-8 main-admin">
    <div class="title-admin pbot">Pemberitahuan</div>
    <div class="col-12 pic-content bbotn mtop">
            <div class="col-12 main-val">
                @foreach ($feednotifications as $feednotification)
                    <div class="col-12 val-content subval-content pbot">
                        <div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
                            <div class="col-12">
                                {{ $feednotification->username }}
                                @if($feednotification->type == 1) Berkomentar pada feed anda.
                                @else membalas komentar anda.
                                @endif
                            </div>
                            <div class="col-12 ket-com">
                                <?php $controller->fullTime($feednotification->created_at); ?>
                                <div class="col-9">Pada : <a href="{{route('feeds.show', $feednotification->slug)}}">{{ $feednotification->feedname }}</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    </div>
    <div>
            {{ $feednotifications->links('vendor.pagination.adminlte') }}
    </div>
</div>

@endsection
