@extends('guru.templates.wtsidebar')
@section('pageTitle', 'Pemberitahuan')
@section('content')

<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Pemberitahuan</h6>
        </div>

        <!-- Notification List -->

        <ul class="notification-list">
            @foreach ($allnotifications as $allnotification)
            @if ($allnotification->type == "App\Notifications\UserCommented")
            <li>
                <div class="post__author author">
                    <img src="{{asset('images/'.$allnotification->data['comment']['user']['file'])}}" alt="author">
                </div>
                <div class="notification-event">
                    @if (($allnotification->data['comment']['parent_id']) == ($allnotification->data['comment']['user_id']))
                    <a href="{{Route('guru.profil',$allnotification->data['comment']['user_id'])}}" class="h6 notification-friend">{{$allnotification->data['comment']['user']['name']}}</a> mengkomentari status <a href="{{Route('guru.show',$allnotification->data['comment']['post_id'])}}" class="notification-link">nya</a>.
                    @endif
                    @if (($allnotification->data['comment']['parent_id']) == (auth()->user()->id))
                    <a href="{{Route('guru.profil',$allnotification->data['comment']['user_id'])}}" class="h6 notification-friend">{{$allnotification->data['comment']['user']['name']}}</a> mengkomentari status <a href="{{Route('guru.show',$allnotification->data['comment']['post_id'])}}" class="notification-link">anda</a>.
                    @endif
                    @if (((($allnotification->data['comment']['parent_id']) != (auth()->user()->id))) && (($allnotification->data['comment']['user_id']) != ($allnotification->data['comment']['parent_id'])))
                    <a href="{{Route('guru.profil',$allnotification->data['comment']['user_id'])}}" class="h6 notification-friend">{{$allnotification->data['comment']['user']['name']}}</a> mengkomentari status <a href="{{Route('guru.show',$allnotification->data['comment']['post_id'])}}" class="notification-link">{{$allnotification->data['comment']['post']['post_name']}}</a>.
                    @endif
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                    <svg class="olymp-comments-post-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg>
                </span>
            </li>
            @endif

            @if ($allnotification->type == "App\Notifications\UserAgenda")
            <li>
                <div class="author-thumb">
                    <img src="{{asset('guru/img/avatar5-sm.jpg')}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$allnotification->data['agenda']['creator']}}</a> Mengundang anda untuk menghadiri rapat <a href="" class="notification-link">"{{$allnotification->data['agenda']['name']}}"</a> di {{$allnotification->data['agenda']['place']}}
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
                </div>
                <span class="notification-icon">
                    <svg class="olymp-calendar-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use></svg>
                </span>

            </li>
            @endif
            @endforeach

      </ul>
        <!-- ... end Notification List -->
    </div>

    {{ $allnotifications->links() }}


</div>

@endsection
