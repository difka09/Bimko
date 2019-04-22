@extends('guru.templates.default')

@push('uploadicon')
<style>
.image-upload > input
{
    display: none;
}

.image-upload svg
{
    width: 80px;
    cursor: pointer;
}
</style>
@endpush

@section('content')
<main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

    <div class="ui-block">
        <!-- News Feed Form  -->
        <div class="news-feed-form">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active inline-items" data-toggle="tab" href="#home-1" role="tab" aria-expanded="true">
                        <svg class="olymp-status-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use></svg>
                        <span>Status</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#profile-1" role="tab" aria-expanded="false">
                        <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                        <span>Multimedia</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home-1" role="tabpanel" aria-expanded="true">
                    <form method="post" action="{{route('guru.addpost')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="author-thumb">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        </div>
                        <div class="form-group with-icon label-floating is-empty">
                            <label class="control-label">Share what you are thinking here...</label>
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                            <textarea class="form-control" name="content" placeholder="" required></textarea>
                        </div>
                        <div class="add-options-message">
                            <div class="image-upload">
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload File">
                                <label for="file-input">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                </label>
                            </a>
                                <input id="file-input" type="file" name="file_1" required>
                            {{-- </a> --}}
                            {{-- <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                            </a>

                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                            </a> --}}

                            <button type="submit" class="btn btn-primary btn-md-2">Post Status</button>
                            {{-- <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button> --}}
                        </div>
                        </div>

                    </form>
                </div>

                <div class="tab-pane" id="profile-1" role="tabpanel" aria-expanded="true">
                    <form>
                        <div class="author-thumb">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        </div>
                        <div class="form-group with-icon label-floating is-empty">
                            <label class="control-label">Share what you are thinking here...</label>
                            <textarea class="form-control" placeholder=""  ></textarea>
                        </div>
                        <div class="add-options-message">
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                            </a>
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                            </a>

                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                            </a>

                            <button class="btn btn-primary btn-md-2">Post Status</button>
                            <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                        </div>

                    </form>
                </div>

                <div class="tab-pane" id="blog" role="tabpanel" aria-expanded="true">
                    <form>
                        <div class="author-thumb">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        </div>
                        <div class="form-group with-icon label-floating is-empty">
                            <label class="control-label">Share what you are thinking here...</label>
                            <textarea class="form-control" placeholder=""  ></textarea>
                        </div>
                        <div class="add-options-message">
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD PHOTOS">
                                <svg class="olymp-camera-icon" data-toggle="modal" data-target="#update-header-photo"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use></svg>
                            </a>
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="TAG YOUR FRIENDS">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                            </a>

                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"   data-original-title="ADD LOCATION">
                                <svg class="olymp-small-pin-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-small-pin-icon')}}"></use></svg>
                            </a>
                            <button class="btn btn-primary btn-md-2">Post Status</button>
                            <button   class="btn btn-md-2 btn-border-think btn-transparent c-grey">Preview</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- ... end News Feed Form  -->
    </div>


    <div id="newsfeed-items-grid">
        <div class="ui-block">
            @csrf
            <div id="post_data">
            {{-- ini isi post --}}



        </div>

            <!-- Comments -->
            <ul class="comments-list">
                <li class="comment-item">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="02-ProfilePage.html">James Spiegel</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    38 mins ago
                                </time>
                            </div>
                        </div>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                    </div>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium der doloremque laudantium.</p>
                </li>
                <li class="comment-item">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/avatar1-sm.jpg')}}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">Mathilda Brinker</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    1 hour ago
                                </time>
                            </div>
                        </div>
                        <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                    </div>
                    <p>Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum
                        quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                    </p>
                </li>
            </ul>
            <!-- ... end Comments -->

            <a href="#" class="more-comments">View more comments <span>+</span></a>

            <!-- Comment Form  -->
            <form class="comment-form inline-items">
                <div class="post__author author vcard inline-items">
                    <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                    <div class="form-group with-icon-right ">
                        <textarea class="form-control" placeholder=""></textarea>
                        <div class="add-options-message">
                            <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                <svg class="olymp-camera-icon">
                                    <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <button class="btn btn-md-2 btn-primary">Post Comment</button>
                <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
            </form>
            <!-- ... end Comment Form  -->
        </div>
    </div>





</main>

@endsection
@push('scripts')
<script>
    $(document).ready(function(){

    var _token = $('input[name="_token"]').val();

    load_data('', _token);

    function load_data(id="", _token)
    {
    $.ajax({
        url:"{{ route('loadmore.load_data') }}",
        method:"POST",
        data:{id:id, _token:_token},
        success:function(data)
        {
            $('#load_more_button').remove();
            $('#post_data').append(data);
        }
        })
    }

    $(document).on('click', '#load_more_button', function(){
        var id = $(this).data('id');
        $('#load_more_button').html('<b>Loading...</b>');
        load_data(id, _token);
        });

    });


</script>

@endpush
