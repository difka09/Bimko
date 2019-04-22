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
                    {{-- <form method="post" action="{{route('guru.addpost')}}" enctype="multipart/form-data"> --}}
                    <form id="postForm" name="postForm" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                        @csrf
                        <div class="author-thumb">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        </div>
                        <div class="form-group with-icon label-floating is-empty">
                            <label class="control-label">Share what you are thinking here...</label>
                            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                            <textarea class="form-control" name="content" id="content" placeholder="" required></textarea>
                        </div>
                        <div class="add-options-message">
                            <div class="image-upload">
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload File">
                                <label for="file_1">
                                <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                <div id="filename_upload"></div>
                                </label>
                            </a>
                            <input type="file" name="file_1" id="file_1">
                            <button type="submit" id="btn-save" class="btn btn-primary btn-md-2">Post Status</button>
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
    <div id="load-data">
        @foreach ($posts as $post)
        <div id="newsfeed-items-grid">
            <div class="ui-block">
                <article class="hentry post" >
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/avatar10-sm.jpg')}}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">{{$post->username}}</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    9 hours ago
                                </time>
                            </div>
                        </div>
                        <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                            <ul class="more-dropdown">
                                <li>
                                    <a href="#">Edit Post</a>
                                </li>
                                <li>
                                    <a href="#">Delete Post</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                        <p>{{$post->content}}</p>
                    <div class="post-additional-info inline-items">
                        <div class="comments-shared">
                            <a href="#" class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}"></use></svg>
                                <span>17</span>
                            </a>
                        </div>
                    </div>
                </article>

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

        <input type="hidden" value="{{$myid = $post->postid}}">
        @endforeach
    </div>
    <div id="remove-row">
        @if (empty($myid))
        <div title="Data tidak ditemukan">
        <a class="btn btn-control" data-container="newsfeed-items-grid" alt="No Data"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
        </div>
        @else
        <a id="btn-more" class="btn btn-control" data-id="{{$post->postid}}" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
        @endif
    </div>

</main>

@endsection
@push('scripts')

{{-- load more timeline post --}}
<script>
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("...");
       $.ajax({
           url : '{{ route('guru.loaddata') }}',
           method : "POST",
           data : {id:id, _token:"{{csrf_token()}}"},
           dataType : "text",
           success : function (data)
           {
              if(data != '')
              {
                  $('#remove-row').remove();
                  $('#load-data').append(data);
              }
              else
              {
                  $('#btn-more').html("No Data");
              }
           }
       });
   });
});
</script>

{{-- upload form and submit form --}}
<script>
$('form').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: '{{route('guru.addpost')}}',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(result)
        {
            location.reload();
        },
        error: function(data)
        {
            console.log(data);
        }
    });

});
</script>

{{-- get filename --}}
<script>
var input = document.getElementById( 'file_1' );
var infoArea = document.getElementById( 'filename_upload' );
input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  // the change event gives us the input it occurred in
  var input = event.srcElement;

  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;

  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File name : ' + fileName;
}
</script>

{{-- spesial komen --}}
{{-- <script>
    if ($("#postForm").length > 0){
        $("#postForm").validate({
            submitHandler: function(form){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $('#btn-save').html('posting..');
                var formData = new FormData($(this)[0]);

                $.ajax({
                    // data:formData,
                    data: $('#postForm').serialize(),
                    url: "{{route('guru.addpost')}}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data){
                        $('#btn-save').html('Post Status');
                        document.getElementById("postForm").reset();
                        location.reload();

                        //untuk komen $("#data-post").load(location.href + " #data-post");

                    }
                });
                // setInterval(function(){
                //     $('#post-data').html(data.html).fadeIn("slow");
                // }, 1000);
            }
        })
    }
</script> --}}
@endpush
