@extends('guru.templates.wtsidebar')
@section('content')

<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Permintaan Responder</h6>
        </div>

        <!-- Notification List -->

        <ul class="notification-list">
            <li>
                <div class="author-thumb">
                    <img src="{{asset('guru/img/avatar1-sm.jpg')}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">Mathilda Brinker</a> telah mengirimkan permintaan persetujuan artikel <a>pesan</a>.
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                    <a href="#" class="btn btn-blue btn-sm">Lihat</a>
                    <a href="#" class="btn btn-primary btn-sm">Hapus</a>
                </span>
            </li>
      </ul>
        <!-- ... end Notification List -->
    </div>


    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">12</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <!-- ... end Pagination -->

</div>

@endsection
