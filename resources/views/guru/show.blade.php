@extends('guru.templates.defaultprofil')
@if ($post->file_2)
@section('pageTitle', 'File | '.str_limit($post->file_3,15).'')
@else
@section('pageTitle', 'Status | '.str_limit($post->content,15).'')
@endif
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

<div class="container">
    <div class="row mt50">
        <div class="col col-xl-8 m-auto col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="ui-block">
                <!-- Single Post -->
                <article class="hentry blog-post single-post single-post-v2">
                    @if ($post->file_2)
                    <a href="#" class="post-category bg-blue-light">UPLOAD FILE</a>
                    @else
                    <a href="#" class="post-category bg-purple">STATUS</a>
                    @endif
                    @if ($post->file_2)
                    <h2 class="h1 post-title">{{$post->title}}</h2>
                    @else
                    @endif
                    <div class="single-post-additional inline-items">
                        <div class="post__author author vcard inline-items">
                            <img alt="author" src="{{$post->user->getImage()}}" class="avatar">
                            <div class="author-date not-uppercase">
                                <a class="h6 post__author-name fn" href="{{route('guru.profil',$post->user)}}">{{ucwords($post->user->name)}}</a>
                                <div class="author_prof">
                                    {{$post->user->school->name}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="post-date-wrap inline-items">
                            <svg class="olymp-calendar-icon">
                                <use xlink:href="#olymp-calendar-icon"></use>
                            </svg>
                            <div class="post-date">
                                <a class="h6 date" href="#"><time class="published" datetime="{{$post->created_at}}"></time></a>
                            </div>
                        </div>
                        <div class="post-comments-wrap inline-items">
                            <svg class="olymp-comments-post-icon">
                                <use xlink:href="#olymp-comments-post-icon"></use>
                            </svg>
                        <div id="countcomment{{$post->id}}">
                            <div class="post-comments">
                                <a class="h6 comments" href="#">{{$post->comments()->count()}}</a>
                                <span>Komentar</span>
                            </div>
                        </div>
                        </div>
                    @if ($post->user_id == auth()->user()->id)
                    <div class="more""><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
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
                            <a class="delete-post" href="javascript:void(0)" id="delete-post" data-id="{{$post->id}}">Hapus Kiriman</a>
                        </li>
                    </ul>
                    </div>
                    @endif
                        
                    </div>
                    @if ($post->file_2)
                    <div class="post-thumb">
                    <a href="{{route('guru.download',$post)}}"><svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg><span>{{$post->file_3}}</span></a>
                    <div>
                    @elseif($post->file_1)
                        <img src="{{$post->getImage1()}}" alt="author" width="770" height="520">
                    @else
                    @endif
                    <div class="post-content-wrap">
                        <div class="post-content">
                            {{-- <h5 class="weight-normal">Lorem ipsum dolor sit amet, consectadipisicing elit, sed do eiusmod por incidid ut labore et dolore
                                magna aliqua. Ut enim ad minim veniam, quis nostrud lorem exercitation ullamco laboris.
                            </h5> --}}
                            <p align="justify">{{$post->content}}</p>
                            {{-- <h3>Best Tattoos Slideshow</h3>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,
                                sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem accusantium doloremque.
                            </p> --}}
                        </div>
                    </div>
                </article>
                <!-- ... end Single Post -->

                <div id="comment{{$post->id}}">
                @foreach ($comments as $comment)
                <!-- Comments -->
                <ul class="comments-list" id="comment-list">
                        <li class="comment-item">
                            {{-- <input type="text" name="ax" class="name_val" value="{{$comment->id}}">
                            <input type="text" name="post" class="name_val" value="{{$comment->post_id}}"> --}}
                            <div class="post__author author vcard inline-items">
                                <img src="{{$comment->user->getImage()}}" alt="author">
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="{{route('guru.profil',$comment->user->id)}}">{{ucwords($comment->user->name)}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="{{$comment->created_at}}">
                                        </time>
                                    </div>
                                </div>
                                @if ($comment->user_id == auth()->user()->id)
                                <div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                <ul class="more-dropdown">
                                        <li>
                                        <a class="delete-comment-show" href="javascript:void(0)" id="delete-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Hapus Komentar</a>
                                        </li>
                                </ul>
                                </div>
                                @endif
                            </div>
                            <p>{{$comment->message}}</p>
                        </li>
                    </ul>
                <!-- ... end Comments -->
                @endforeach
                    <div id="remove-row-comments{{$post->id}}">
                        @if ($post->comments->count()==0)
                        @else
                            <a id="btn-more-comment{{$post->id}}" class="more-comments btn-more-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Lihat Komentar Lainnya<span>+</span></a>
                        @endif
                    </div>
                </div>

                <!-- Comment Form  -->
                <form method="post" id="comment-form-show" action="javascript:void(0)" class="comment-form inline-items" enctype="multipart/form-data">
                    @csrf
                    <div class="post__author author vcard inline-items">
                        <img src="{{auth()->user()->getImage()}}" alt="author">
                        <div class="form-group with-icon-right ">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="hidden" value="{{$post->user_id}}" name="parent_id">
                            <textarea data-id="{{$post->id}}" class="form-control" name="message" id="text{{$post->id}}" placeholder="" autofocus ></textarea>
                            {{-- <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <button type="submit" onclick ="myFunction()" id="btn-comment{{$post->id}}" class="btn btn-md-2 btn-primary btn-comment-show" style="pointer-events: none" disabled>Tulis Komentar</button>
                    <div id="snackbar">Berhasil Berkomentar</div>
                </form>
                <!-- ... end Comment Form  -->

            </div>
        </div>
    </div>
</div>



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
                    <textarea class="form-control" name="content" id="content1" placeholder="Tulis status di sini.."></textarea>
                </div>
                <div class="add-options-message">
                    <div class="image-upload">
                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload gambar">
                        <label for="file_3">
                        <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                        <div id="filename_upload_3"></div>
                        <span class="size3_error" style="color:red"></span>
                        </label>
                    </a>
                    <input accept="image/x-png,image/gif,image/jpeg" type="file" name="file_1" id="file_3">
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
                        <input class="form-control" placeholder="Tulis nama file.." type="text" name="title" id="title2" style="border:none">
                        <textarea class="form-control" name="content" id="content2" placeholder="deskripsi file"></textarea>
                    </div>
                    <div class="add-options-message">
                        <div class="image-upload">
                        <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload gambar">
                            <label for="file_4">
                            {{-- <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg> --}}
                            <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                            <div id="filename_upload_4"></div>
                            <span class="size4_error" style="color:red"></span>
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
@push('customecss')
<style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #333;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
    }

    #snackbar.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
</style>
@endpush

@push('scripts')

<script>
function myFunction() {
   $('.btn-comment-show').html("kirim..");
}
</script>

<script>
        // load more comments
    $(document).ready(function(){
        $(document).on('click','.btn-more-comment',function(){
            var id = $(this).data('id');
            // console.log(id);
            var post = $(this).data('post');
            $("#btn-more-comment"+post).html("...");
            $.ajax({
                url : urls[6],
                method : "POST",
                data : {id:id, post:post, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (data)
                {
                    if(data != '')
                    {
                        $('#remove-row-comments'+post).remove();
                        $('#comment'+post).append(data);
                        $("#countcomment"+post).load(location.href + " #countcomment"+post);
                        // $("#comment"+post).load(location.href + " #comment"+post);
                    }
                    else
                    {
                        // $("#countcomment"+post).load(location.href + " #countcomment"+post);
                        // $("#comment"+post).load(location.href + " #comment"+post);
                        $('#btn-more-comment'+post).html("No Data");
                    }
                }
            });
        });
    });
</script>
<script>
    // get filename file_1 and file_2
var input4 = document.getElementById( 'file_4' );
var infoArea = document.getElementById( 'filename_upload' );
var infoArea4 = document.getElementById( 'filename_upload_4' );

var input3 = document.getElementById( 'file_3' );
var infoArea1 = document.getElementById( 'filename_upload_1' );
var infoArea3 = document.getElementById( 'filename_upload_3' );

input3.addEventListener( 'change', showFileName3 );
input4.addEventListener( 'change', showFileName4 );

function showFileName3( event ) {
    var input3 = event.srcElement;// the change event gives us the input it occurred in
    var fileName3 = input3.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea3.textContent = 'File name : ' + fileName3;// use fileName however fits your app best, i.e. add it into a div
  }
function showFileName4( event ) {
    var input4 = event.srcElement;// the change event gives us the input it occurred in
    var fileName4 = input4.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea4.textContent = 'File name : ' + fileName4;// use fileName however fits your app best, i.e. add it into a div
  };

</script>


@endpush
