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
                    {{-- <img src="{{$responder->user->getImage()}}" alt="author"> --}}
                    <img src="http://placehold.it/64/006400/fff&text=R" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$responder->user->name}}</a> telah mengirimkan permintaan persetujuan artikel <a href="#" class="notification-link">{{str_limit($responder->name,10)}}</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="{{$responder->created_at}}"></time></span>
                </div>
           </li>
           @endforeach
           @endif
        </ul>
        <!-- .. end W-Activity-Feed -->
    </div>

    <div class="ui-block">
        <div class="custome-title">
            <a href="{{route('guru.indexmurid')}}">
        <div class="ui-block-title">
            <h6 class="title">Permintaan Konseling</h6>
            <a href="{{route('guru.indexmurid')}}" class="more btn"><svg class="olymp-comments-post-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-comments-post-icon')}}"></use></svg></a>
        </div>
            </a>
        </div>
        <!-- W-Activity-Feed -->
        <ul class="widget w-activity-feed notification-list">
            @if ($murids->count()==0)
            <li>
                Belum ada permintaan pesan konseling
            </li>
            @else
            @foreach ($murids as $murid)
            <li>
                <div class="author-thumb">
                    <img src="http://placehold.it/64/55C1E7/fff&text={{substr($murid->user->name,0,2)}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$murid->user->name}}</a> telah mengirimkan permintaan konseling <a href="#" class="notification-link">{{str_limit($murid->name,10)}}</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="{{$murid->created_at}}"></time></span>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
            <!-- .. end W-Activity-Feed -->
    </div>
</aside>
