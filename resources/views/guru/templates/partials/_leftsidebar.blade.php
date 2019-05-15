<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
    <div class="ui-block">
        <div class="custome-title">
            <a href="{{route('guru.indexresponder')}}">
        <div class="ui-block-title">
            <h6 class="title">Permintaan Responder</h6>
            <a href="{{route('guru.indexresponder')}}" class="more btn"><svg class="olymp-checked-calendar-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-checked-calendar-icon')}}"></use></svg></a>
        </div>
            </a>
        </div>
        <!-- W-Activity-Feed -->
        <ul class="widget w-activity-feed notification-list">
            @if ($responders->count()==0)
            <li>
                Belum ada permintaan persetujuan artikel
            </li>
            @else
            @foreach ($responders as $responder)
            <li>
                <div class="author-thumb" id="author-thumb">
                    <img src="{{$responder->user->getImage()}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$responder->user->name}}</a> telah mengirimkan permintaan persetujuan artikel <a href="#" class="notification-link">{{$responder->name}}.</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
                </div>
           </li>
           @endforeach
           @endif
        </ul>
        <!-- .. end W-Activity-Feed -->
    </div>

    <div class="ui-block">
        <div class="custome-title">
            <a href="{{route('guru.filepage')}}">
        <div class="ui-block-title">
            <h6 class="title">Permintaan Pesan Murid</h6>
            <a href="{{route('guru.filepage')}}" class="more btn"><svg class="olymp-comments-post-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg></a>
        </div>
            </a>
        </div>
        <!-- W-Activity-Feed -->
        <ul class="widget w-activity-feed notification-list">
            <li>
                <div class="author-thumb">
                    <img src="{{asset('guru/img/avatar49-sm.jpg')}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Marina Polson</a> commented on Jason Mark’s <a href="#" class="notification-link">photo.</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
                </div>
            </li>
        </ul>
            <!-- .. end W-Activity-Feed -->
    </div>
</aside>
