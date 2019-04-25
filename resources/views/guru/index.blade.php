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
                    <a class="nav-link active inline-items" data-toggle="tab" href="#status" role="tab" aria-expanded="true">
                        <svg class="olymp-status-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-status-icon')}}"></use></svg>
                        <span>Status</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link inline-items" data-toggle="tab" href="#upload" role="tab" aria-expanded="false">
                        <svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg>
                        <span>Upload File</span>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="status" role="tabpanel" aria-expanded="true">
                    <form id="uploadForm" method="post" action="{{route('guru.addstatus')}}" enctype="multipart/form-data">
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
                            <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload gambar">
                                <label for="file_1">
                                <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                                <div id="filename_upload_1"></div>
                                </label>
                            </a>
                            <input type="file" name="file_1" id="file_1">
                            <button type="submit" id="btn-save" class="btn btn-primary btn-md-2">Post Status</button>
                        </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                    <form id="postForm" method="post" action="{{route('guru.addpost')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="author-thumb">
                                <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            </div>
                            <div class="form-group with-icon label-floating is-empty">
                                {{-- <label class="control-label">Share what you are thinking here...</label> --}}
                                <input class="form-control" placeholder="Tulis nama file" type="text" name="title" id="title" style="border:none" required>
                                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                <textarea class="form-control" name="content" id="content" placeholder="Deskripsi file" required></textarea>


                            </div>
                            <div class="add-options-message">
                                <div class="image-upload">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload File">
                                    <label for="file_2">
                                    <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                    <div id="filename_upload"></div>
                                    </label>
                                </a>
                                <input type="file" name="file_2" id="file_2" nonvalidate>
                                <button type="submit" id="btn-save" class="btn btn-primary btn-md-2">Post File</button>
                            </div>
                            </div>
                        </form>
                    </div>
           </div>
        </div>
        <!-- ... end News Feed Form  -->
    </div>
    <div id="load-data">
        <div id="data-post">
        @foreach ($posts as $post)
        <?php
        $comments = $post->comments
        ?>
        <div id="newsfeed-items-grid">
            <div class="ui-block">
                <article class="hentry post"  id="post_id_{{$post->id}}">
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/avatar10-sm.jpg')}}" alt="author">

                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="#">{{$post->user->name}}</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    9 hours ago
                                </time>
                            </div>
                        </div>
                        @if ($post->user_id == auth()->user()->id)
                        <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                            <ul class="more-dropdown">
                                @if ($post->type == 1)
                                <li>
                                    <a href="javascript:void(0)" id="edit-post1" data-id="{{$post->id}}">Edit Status</a>
                                </li>
                                @else
                                <li>
                                    <a href="javascript:void(0)" id="edit-post2" data-id="{{$post->id}}">Edit File</a>
                                </li>
                                @endif
                                <li>
                                    <a class="delete-post" href="javascript:void(0)" id="delete-post" data-id="{{$post->id}}">Delete Post</a>
                                </li>
                            </ul>
                        </div>
                        @endif
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
                <div id="comment{{$post->id}}">
                @foreach ($comments as $comment)
                <ul class="comments-list" id="comment-list">
                    <li class="comment-item">
                        <div class="post__author author vcard inline-items">
                            <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="02-ProfilePage.html">{{$comment->user->name}}</a>
                                <div class="post__date">
                                    <time class="published" datetime="2004-07-24T18:18">
                                        38 mins ago
                                    </time>
                                </div>
                            </div>
                            <a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg></a>
                        </div>
                        <p>{{$comment->message}}</p>
                    </li>
                </ul>
                @endforeach
            </div>



                {{-- @endif --}}
                <!-- ... end Comments -->

                <a href="#" class="more-comments">View more comments <span>+</span></a>
                <!-- Comment Form  -->
                <form method="post" class="comment-form" id="comment-form{{$post->id}}" action="javascript:void(0)" class="comment-form inline-items" enctype="multipart/form-data">
                    @csrf
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        <div class="form-group with-icon-right ">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="hidden" value="{{$post->user_id}}" name="parent_id">
                            <textarea class="form-control" name="message" id="text{{$post->id}}" placeholder=""></textarea>
                            <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn-comment" class="btn btn-md-2 btn-primary">Post Comment</button>
                    <button class="btn btn-md-2 btn-border-think c-grey btn-transparent custom-color">Cancel</button>
                </form>
                <!-- ... end Comment Form  -->
            </div>
        </div>

        <input type="hidden" value="{{$myid = $post->id}}">
        @endforeach
    </div>
    </div>
    <div id="remove-row">
        @if (empty($myid))
        <div title="Data tidak ditemukan">
        <a class="btn btn-control" data-container="newsfeed-items-grid" alt="No Data"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
        </div>
        @else
        <a id="btn-more" class="btn btn-control" data-id="{{$post->id}}" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
        @endif
    </div>

</main>

@endsection
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="postCrudModal"></h4>
        </div>

        <div class="modal-body">
        <form id="updateForm1" name="updateForm1" method="post" action="javascript:void(0)" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="id" id="postid">
                <textarea class="form-control" name="content" id="content" placeholder="Tulis status di sini.." required></textarea>
            </div>
            <div class="add-options-message">
                <div class="image-upload">
                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload gambar">
                    <label for="file_3">
                    <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                    <div id="filename_upload_3"></div>
                    </label>
                </a>
                <input type="file" name="file_1" id="file_3">
                </div>
                <button type="submit" id="btn-save1" class="btn btn-primary btn-md-2 btn-save1">Edit Post</button>
            </div>
        </form>
        </div>

        </div>
    </div>
</div>

<div class="modal fade" id="ajax-crud-modal2" aria-hidden="true" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="postCrudModal2"></h4>
            </div>

            <div class="modal-body">
                <form id="updateForm2" name="updateForm2" method="post" action="javascript:void(0)" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="user_id" id="user_id2" value="{{auth()->user()->id}}">
                    <input type="hidden" name="id" id="postid2">
                    <input class="form-control" placeholder="Tulis nama file.." type="text" name="title" id="title2" style="border:none" required>
                    <textarea class="form-control" name="content" id="content2" placeholder="deskripsi file" required></textarea>
                </div>
                <div class="add-options-message">
                    <div class="image-upload">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload gambar">
                        <label for="file_4">
                        <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                        <div id="filename_upload_4"></div>
                        </label>
                    </a>
                    <input type="file" name="file_2" id="file_4">
                    </div>
                    <button type="submit" id="btn-save2" class="btn btn-primary btn-md-2 btn-save2">Edit Post</button>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>

@push('scripts')


<script>
// load more timeline post
$(document).ready(function(){
   $(document).on('click','#btn-more',function(){
       var id = $(this).data('id');
       $("#btn-more").html("...");
       $.ajax({
           url : urls[0],
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



@endpush
