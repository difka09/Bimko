@extends('guru.templates.defaultprofil')
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
                            <img alt="author" src="{{asset('guru/img/avatar84-sm.jpg')}}" class="avatar">
                            <div class="author-date not-uppercase">
                                <a class="h6 post__author-name fn" href="#">{{$post->user->name}}</a>
                                <div class="author_prof">
                                    {{$post->user->school_id}}
                                </div>
                            </div>
                        </div>
                        <div class="post-date-wrap inline-items">
                            <svg class="olymp-calendar-icon">
                                <use xlink:href="#olymp-calendar-icon"></use>
                            </svg>
                            <div class="post-date">
                                <a class="h6 date" href="#">2 Months Ago</a>
                                <span>Date</span>
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
                    </div>
                    @if ($post->file_2)
                    <div class="post-thumb">
                    <a href="{{route('guru.download',$post)}}"><svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg><span>{{$post->title}}{{substr(($post->file_2),-4)}}</span></a>
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
                                @if ($comment->user_id == auth()->user()->id)
                                <div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                <ul class="more-dropdown">
                                        <li>
                                        <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Delete Comment</a>
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
                <form method="post" class="comment-form" id="comment-form{{$post->id}}" action="javascript:void(0)" class="comment-form inline-items" enctype="multipart/form-data">
                    @csrf
                    <div class="post__author author vcard inline-items">
                        <img src="{{asset('guru/img/author-page.jpg')}}" alt="author">
                        <div class="form-group with-icon-right ">
                            <input type="hidden" value="{{$post->id}}" name="post_id">
                            <input type="hidden" value="{{$post->user_id}}" name="parent_id">
                            <textarea class="form-control" name="message" id="text{{$post->id}}" placeholder=""></textarea>
                            {{-- <div class="add-options-message">
                                <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                    <svg class="olymp-camera-icon">
                                        <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                    </svg>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <button type="submit" id="btn-comment" class="btn btn-md-2 btn-primary">Tulis Komentar</button>
                </form>
                <!-- ... end Comment Form  -->

            </div>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script>
        // load more comments
    $(document).ready(function(){
        $(document).on('click','.btn-more-comment',function(){
            var id = $(this).data('id');
            console.log(id);
            var post = $(this).data('post');
            $("#btn-more-comment"+post).html("...");
            $.ajax({
                url : urls[4],
                method : "POST",
                data : {id:id, post:post, _token:"{{csrf_token()}}"},
                dataType : "text",
                success : function (data)
                {
                    if(data != '')
                    {
                        $('#remove-row-comments'+post).remove();
                        $('#comment'+post).append(data);
                        $("#countcomment"+post).load(location.href + " #countcomment"+post);                    }
                    else
                    {
                        $('#btn-more-comment'+post).html("No Data");
                    }
                }
            });
        });
    });
</script>
@endpush
