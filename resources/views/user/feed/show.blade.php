@extends('user.templates.default')
@section('pageTitle', 'Bimko | Artikel : '.$feed->name.'')
@section('content')

        <!-- post content -->
        <div class="col-lg-8 blog__content mb-30">

            <!-- Breadcrumbs -->
                <ul class="breadcrumbs">
                  <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__url"><i class="ui-home"></i></a>
                  </li>
                  <li class="breadcrumbs__item">
                    <a href="index.html" class="breadcrumbs__url">Artikel</a>
                  </li>
                </ul>

                <!-- standard post -->
                <article class="entry">
                    @if ($feed->status == 0)
                        <a>Artikel tidak ditemukan</a>
                    @else
                  <div class="single-post__entry-header entry__header">
                    <h1 class="single-post__entry-title">
                    {{ $feed->name }}
                    </h1>

                    <ul class="entry__meta">
                      <li class="entry__meta-author">
                        <i class="ui-author"></i>
                        <a href="#" data-toggle="modal" style="cursor:pointer" data-target="#commentmodal{{$feed->user_id}}">{{$feed->user->name}}</a>
                      </li>
                        <?php
                            $controller->tanggal($feed->agreement->created_at);
                        ?>
                      <li class="entry__meta-comments">
                        <i class="ui-comments"></i>
                        <a href="#">{{$feed->feedcomments->count()}}</a>
                      </li>
                    </ul>
                  </div>

                  <div class="entry__img-holder">
                    <img src="{{$feed->getImage()}}" alt="" class="entry__img">
                  </div>

                  <div class="entry__article">
                  <div class="col-12 val-news">{!! $feed->content !!}</div>
                    {{-- <p>{{!! $feed->content!! }}</p> --}}

                    <!-- Share -->
                  <div class="entry__share">
                    <div class="socials entry__share-socials social-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&display=popup" class="social social-facebook entry__share-social social--wide social--medium" target="_blank">
                        <i class="ui-facebook"></i>
                        <span class="social__text">Bagikan ke Facebook</span>
                      </a>
                      <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}" class="social social-twitter entry__share-social social--wide social--medium" target="_blank">
                        <i class="ui-twitter"></i>
                        <span class="social__text">Bagikan ke Twitter</span>
                      </a>
                    </div>
                  </div> <!-- share -->

                    {{-- <!-- tags -->
                    <div class="entry__tags">
                      <span class="entry__tags-label">Tags:</span>
                      <a href="#" rel="tag">mobile</a><a href="#" rel="tag">gadgets</a><a href="#" rel="tag">satelite</a>
                    </div> <!-- end tags --> --}}

                  </div> <!-- end entry article -->

                  <!-- Related Posts -->
                  <div class="related-posts">
                    <div class="title-wrap mt-40">
                      <h5 class="uppercase">Artikel lain</h5>
                    </div>
                    <div class="row row-20">

                    @foreach ($relatednews as $relatednew)
                        <div class="col-md-4">

                        <article class="entry">
                          <div class="entry__img-holder">
                            <a href="{{ route('feeds.show', $relatednew)}}">
                              <div class="thumb-container thumb-75">
                                <img data-src="{{$relatednew->getImage()}}" class="entry__img lazyload" alt="">
                              </div>
                            </a>
                          </div>

                          <div class="entry__body">
                            <div class="entry__header">
                              <h2 class="entry__title entry__title--sm">
                                <a href="{{ route('feeds.show', $relatednew)}}">{{$relatednew->name}}</a>
                              </h2>
                            </div>
                          </div>
                        </article>
                        </div>
                      @endforeach

                    </div>
                  </div> <!-- end related posts -->

                </article> <!-- end standard post -->


                <!-- Comments -->
                <div class="entry-comments mt-30">
                  <div class="title-wrap mt-40">
                    <h5 class="uppercase">{{$feed->feedcomments->count()}} Komentar</h5>
                  </div>
                  <ul class="comment-list">
                    <li class="comment">
                        @foreach ($feedcomments as $feedcomment)
                      <div class="comment-body">
                        <div class="comment-avatar">
                            @if ($feedcomment->user->isGuest())
                            <img src="http://placehold.it/64/006400/fff&text={{substr($feedcomment->user->name,0,2)}}" alt="author" style="width:100%">
                            @else
                            <img src="http://placehold.it/64/55C1E7/fff&text={{substr($feedcomment->user->name,0,2)}}" alt="author" style="width:100%">
                            @endif
                        </div>
                        <div class="comment-text">
                          <h6 data-toggle="modal" style="cursor:pointer" class="comment-author" data-target="#commentmodal{{$feedcomment->user_id}}">{{$feedcomment->user->name}}:</h6>
                          {{-- <h6 class="comment-author">{{$feedcomment->name}}: </h6> --}}
                          <div class="comment-metadata">
                            <a href="#" class="comment-date">{{$controller->fullTimeShow($feedcomment->created_at)}}</a>
                          </div>
                            <p>{{$feedcomment->message}}</p>
                          {{-- <a class="comment-reply" style="cursor: pointer" id="reply">Reply</a> --}}
                          <?php
                          $qtyReply = 0;
                          foreach ($feedreplies as $feedreply) {
                              if($feedreply->parent_id == $feedcomment->id) $qtyReply++;
                          }
                          ?>
                          <a class="comment-reply reply" style="cursor: pointer" data-id="{{$feedcomment->id}}" >balasan <span><strong>({{$qtyReply}})</strong></span></a>

                          {{-- <button id="tombol_show" href="#" class="comment-reply">Reply</button> --}}
                        </div>
                      </div>

                    <div id="detail-reply-{{$feedcomment->id}}" style="display:none">
                      <ul class="children">
                          @foreach ($feedreplies as $feedreply)
                          @if ($feedreply->parent_id == $feedcomment->id)
                        <li class="comment">
                          <div class="comment-body">
                            <div class="comment-avatar">
                              @if ($feedreply->user->isGuest())
                              <img src="http://placehold.it/64/006400/fff&text={{substr($feedreply->user->name,0,2)}}" alt="author" style="width:100%">
                              @else
                              <img src="http://placehold.it/64/55C1E7/fff&text={{substr($feedreply->user->name,0,2)}}" alt="author" style="width:100%">
                              @endif
                              </div>
                            <div class="comment-text">
                            <h6 data-toggle="modal" style="cursor:pointer" class="comment-author" data-target="#replymodal{{$feedreply->user_id}}">{{$feedreply->user->name}}:</h6>
                              <div class="comment-metadata">
                              <a href="#" class="comment-date">{{$controller->fullTimeShow($feedreply->created_at)}}</a>
                              </div>
                              <p>{{$feedreply->message}}</p>
                              {{-- <a href="#" class="comment-reply">Reply</a> --}}
                            </div>
                          </div>
                        </li> <!-- end reply comment -->
                        @endif
                        @endforeach
                        @auth
                        @if (auth()->user()->isAdmin()||auth()->user()->isGuru())
                        @else
                        <div id="form-comment">
                            <form id="form-{{$feedcomment->id}}" class="comment-form" method="post" action="{{route('reply.store')}}" style="display:none" data-parentuser="{{$feedcomment->user_id}}">
                              @csrf
                              <input type="hidden" value="{{$feedcomment->user_id}}" name="parentuser_id">
                              <input type="hidden" value="{{$feedcomment->id}}" name="parent_id">
                              <input type="hidden" value="{{$feed->id}}" name="feed_id">
                              <p class="comment-form-comment">
                              <textarea id="comment" name="message" rows="5" required="required" placeholder="Balas Komentar*"></textarea>
                              </p>
                              <p class="comment-form-submit">
                                @if ($errors->has('message'))
                                <span style="color:red">{{ $errors->first('message') }}</span><br>
                                @endif
                              <button type="submit" class="btn btn-lg btn-color btn-button">Balas Komentar</button>
                              <div class="title-wrap"><br></div>
                              </p>
                          </form>
                        </div>
                        @endauth
                        @endif
                      </ul>
                    </div>

                    @endforeach
                    </li> <!-- end 1-2 comment -->
                  </ul>
                </div> <!-- end comments -->


                <!-- Comment Form -->
                <div id="respond" class="comment-respond">
                    @guest
                    <div class="title-wrap">
                        <p>Silahkan <a href="/login"><strong>login</strong></a> untuk berkomentar!!</p>
                    </div>
                    @endguest
                    @auth
                    @if (auth()->user()->isAdmin()||auth()->user()->isGuru())
                    @else
                    <div class="title-wrap">
                        <h5 class="comment-respond__title uppercase">Tinggalkan Komentar</h5>
                    </div>
                        <form class="comment-form" method="POST" action="{{route('comment.store')}}">
                            @csrf
                            <p class="comment-form-comment">
                            <input type="hidden" value="{{$feed->user_id}}" name="parentuser_id">
                            <input type="hidden" value=0 name="parent_id">
                            <input type="hidden" value="{{$feed->id}}" name="feed_id">
                            <textarea id="comment" name="message" rows="5" required="required" placeholder="Komentar*"></textarea>
                            </p>
                            <p class="comment-form-submit">
                                @if ($errors->has('message'))
                                <span style="color:red">{{ $errors->first('message') }}</span><br>
                                @endif
                            <button type="submit" class="btn btn-lg btn-color btn-button">Kirim Komentar</button>
                            </p>
                        </form>
                    @endif
                    @endauth

                </div> <!-- end comment form -->
                @endif

              </div> <!-- end col -->


@endsection

@push('stylecustome')
<style>
.myDIV1 {
    width: 100%;
    text-align: center;
    margin-top: 20px;
    font-weight: bold
  }
.myDIV2 {
    width: 100%;
    text-align: center;
    margin-top: 20px;
    font-weight: bold
  }
</style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function(){
            $(".reply").click(function(){
                var $toggle = $(this);
                var id = "#form-" + $toggle.data('id');
                $( id ).toggle();
                var id = "#detail-reply-" + $toggle.data('id');
                $( id ).toggle();
            });
        });
    </script>

    <script>
        $('body').on('click', '.phone1', function(){
            var id = $(this).data("id");
            var x = document.getElementById("myDIV1" + id);
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        });
    </script>

<script>
        $('body').on('click', '.phone2', function(){
        var id = $(this).data("id");
          var x = document.getElementById("myDIV2" + id);
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        });
    </script>

<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
@endpush

@foreach ($feedcomments as $feedcomment)
<div id="commentmodal{{$feedcomment->user_id}}" class="modal fade" role="dialog" aria-labelledby="myModalLabel" style="display:none">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background:transparent !important;">
            <div class="modal-body" style="background:transparent !important;">
                <div class="cardmodal" style="background:white">
                        @if ($feedcomment->user->isGuest())
                        <img src="http://placehold.it/64/006400/fff&text={{substr($feedcomment->user->name,0,2)}}" alt="author" style="width:100%">
                        @else
                        <img src="http://placehold.it/64/55C1E7/fff&text={{substr($feedcomment->user->name,0,2)}}" alt="author" style="width:100%">
                        @endif
                        <h1>{{$feedcomment->user->name}}</h1>
                        <p class="titlemodal">Info :  </p>
                        <div style="margin: 24px 0;">
                            @if ($feedcomment->user->isGuest())
                            <p href="#"><i class="fa fa-building">&nbsp;&nbsp;{{$feedcomment->user->agency}}</i></p>
                            @else
                            @if ($feedcomment->user->school)
                            <p href="#"><i class="fa fa-university">&nbsp;&nbsp;{{$feedcomment->user->school->name}}</i><p>
                            @endif
                            @endif
                        </div>
                        @auth
                        <div class="myDIV1" id="myDIV1{{$feedcomment->id}}" style="display:none"><i class="fa fa-phone"></i>&nbsp;&nbsp;{{$feedcomment->user->phone}}</div>
                        @endauth
                        @guest
                        <div class="myDIV1" id="myDIV1{{$feedcomment->id}}" style="display:none">silahkan <a href="/login">login</a> terlebih dahulu</div>
                        @endguest
                        <p><buttonmodal class="phone1" data-id="{{$feedcomment->id}}">Contact</buttonmodal></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($feedreplies as $feedreply)
<div id="replymodal{{$feedreply->user_id}}" class="modal fade" role="dialog" aria-labelledby="myModalLabel" style="display:none">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background:transparent">
            <div class="modal-body" style="background:transparent !important;">
                    <div class="cardmodal" style="background:white">
                        @if ($feedreply->user->isGuest())
                        <img src="http://placehold.it/64/006400/fff&text={{substr($feedreply->user->name,0,2)}}" alt="author" style="width:100%">
                        @else
                        <img src="http://placehold.it/64/55C1E7/fff&text={{substr($feedreply->user->name,0,2)}}" alt="author" style="width:100%">
                        @endif
                            <h1>{{$feedreply->user->name}}</h1>
                            <p class="titlemodal">Info :</p>
                            <div style="margin: 24px 0;">
                              @if ($feedreply->user->isGuest())
                              <p href="#"><i class="fa fa-building">&nbsp;&nbsp;{{$feedreply->user->agency}}</i></p>
                              @else
                              @if ($feedreply->user->school)
                              <p href="#"><i class="fa fa-university">&nbsp;&nbsp;{{$feedreply->user->school->name}}</i><p>
                              @endif
                              @endif
                            </div>
                                @auth
                            <div class="myDIV2" id="myDIV2{{$feedreply->id}}" style="display:none"><i class="fa fa-phone"></i>&nbsp;&nbsp;{{$feedreply->user->phone}}</div>
                                @endauth
                                @guest
                            <div class="myDIV2" id="myDIV2{{$feedreply->id}}" style="display:none">silahkan <a href="/login">login</a> terlebih dahulu</div>
                                @endguest
                            <p><buttonmodal class="phone2" data-id="{{$feedreply->id}}">Contact</buttonmodal></p>
                    </div>
            </div>
        </div>
    </div>
</div>
@endforeach
