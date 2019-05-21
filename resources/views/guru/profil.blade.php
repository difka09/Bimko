@extends('guru.templates.defaultprofil')
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
<div class="modal fade" id="open-photo-popup-v1" tabindex="-1" role="dialog" aria-labelledby="open-photo-popup-v1" aria-hidden="true" style="display:none">
	<div class="modal-dialog window-popup open-photo-popup open-photo-popup-v1" role="document">
		<div class="modal-content" style="width: 970px;height:756px;">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
			</a>

			<div class="modal-body">
				<div class="open-photo-thumb">
					<div class="swiper-container" data-slide="fade">
						{{-- <div class="swiper-wrapper"> --}}
							{{-- <div class="swiper-slide"> --}}
								<div class="photo-item" style="max-width: 970px;max-height:756px">
                                <img src="{{$user->getImage()}}" alt="photo" style="width: 100%;height: 100%;" width="970px" height="100px">
									<div class="overlay"></div>
								</div>
							{{-- </div> --}}
						{{-- </div> --}}
					</div>
                </div>
			</div>
		</div>
	</div>
</div>
<?php $nameku = $user->name?>
@section('pageTitle', 'Profil | '.$nameku.'')
@section('content')

<div class="container">
<div class="row">
    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="ui-block">
            <div class="top-header">
                <div class="top-header-thumb bg-music">
                    <img src="{{asset('guru/img/top-header7.png')}}" alt="nature">
                </div>
                <div class="profile-section">
                    <div class="row">
                        <div class="col col-lg-5 col-md-5 col-sm-12 col-12">
                            <ul class="profile-menu">
                                <li>
                                </li>
                                <li>
                                    <a href="{{route('guru.filepage')}}" style="text-align: center">{{$file}}
                                    <br>File
                                    </a>
                                </li>
                                <li>
                                    <a style="text-align: center">{{$status}}</a>
                                    <a style="text-align: center">Status</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
                            <ul class="profile-menu">
                                <li>
                                    <a href="{{route('guru.indexresponder')}}" style="text-align: center">{{$user->agreements->count()}}
                                        <br>Menyetujui Artikel
                                    </a>
                                </li>
                                <li>
                                    <a style="text-align: center">{{$user->comments->count()}}</a>
                                    <a style="text-align: center">Menjawab</a>
                                </li>
                            </ul>
						</div>

                    </div>
                    @if($user->id == auth()->user()->id)
                    <div class="control-block-button" style="margin-top:10px">
                        <div class="btn btn-control bg-primary more">
                            <svg style="margin-top:10px" class="olymp-settings-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-settings-icon')}}"></use></svg>
                            <ul class="more-dropdown more-with-triangle triangle-bottom-right">
                                <li>
                                    <a href="{{route('guru.editprofil')}}">Edit Akun</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>


                <div class="top-header-author">
                    <a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="author-thumb full-block">
                        <img style="width:100%;height: 100%" src="{{$user->getimage()}}" alt="author">
                    </a>
                    <div class="author-content">
                        <a class="h4 author-name">{{$user->name}}</a>
                    <div class="country">{{$user->school->name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        @if($user->id == auth()->user()->id)
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
                        <form id="statusForm" method="post" action="{{route('guru.addstatus')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group with-icon label-floating is-empty">
                                <label class="control-label">Share what you are thinking here...</label>
                                <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                <textarea class="form-control" name="content" id="content" placeholder="" required></textarea>
                                {{-- <div class="error-message" style="color:red"></div> --}}
                            </div>
                            <div class="add-options-message">
                                <div class="image-upload">
                                <a href="#" class="options-message" data-toggle="tooltip" data-placement="top" data-original-title="Upload gambar">
                                    <label for="file_1">
                                    <svg class="olymp-multimedia-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-multimedia-icon')}}"></use></svg>
                                    <div id="filename_upload_1"></div>
                                    <span class="size_error" style="color:red"></span>
                                    </label>
                                </a>
                                <input type="file" name="file_1" id="file_1">
                                <button type="submit" id="btn-save" class="btn btn-primary btn-md-2">Post Status</button>
                            </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="upload" role="tabpanel" aria-expanded="true">
                        <form id="uploadForm" method="post" action="{{route('guru.addpost')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group with-icon label-floating is-empty">
                                    {{-- <label class="control-label">Share what you are thinking here...</label> --}}
                                    <input class="form-control" placeholder="Tulis nama file" type="text" name="title" id="title" style="border:none" required>
                                    <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                                    <textarea class="form-control" name="content" id="content" placeholder="Deskripsi file" required></textarea>
                                    {{-- <div style="color:red" class="error-message"></div> --}}


                                </div>
                                <div class="add-options-message">
                                    <div class="image-upload">
                                    <a href="#" class="options-message" data-toggle="tooltip" data-placement="top"  data-original-title="Upload File">
                                        <label for="file_2">
                                        <svg class="olymp-computer-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-computer-icon')}}"></use></svg>
                                        <div id="filename_upload"></div>
                                        <span class="size1_error" style="color:red"></span>
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
            @endif
            <div id="load-data">
            <div id="data-post">
            @foreach ($posts as $post)
            <div id="newsfeed-items-grid{{$post->id}}">
                <div class="ui-block">
                    <article class="hentry post"  id="post_id_{{$post->id}}">
                        <div class="post__author author vcard inline-items">
                            <img src="{{$user->getimage()}}" alt="author">
                            <div class="author-date">
                                <a class="h6 post__author-name fn" href="{{route('guru.profil',$post->user->id)}}">{{$post->user->name}}</a>
                                <div class="post__date">
                                    <a href="{{route('guru.show',$post)}}"><time class="published" datetime="{{$post->created_at}}"></time></a>
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
                        <div id="khusus{{$post->id}}">
                            <p>{{$post->content}}</p>
                            @if ($post->file_2)
                        <div class="post-thumb">
                            <a href="{{route('guru.download',$post)}}"><svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg><span>{{$post->title}}{{substr(($post->file_2),-4)}}</span></a>
                        </div>
                        @elseif($post->file_1)
                            <img src="{{$post->getImage1()}}" alt="author" width="770" height="520">
                        @else
                        @endif
                        </div>
                    <div id="countcomment{{$post->id}}" class="countcomment">
                        <div class="post-additional-info inline-items">
                            <div class="comments-shared">
                                <a class="post-add-icon inline-items">
                                    <svg class="olymp-speech-balloon-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon')}}"></use></svg>
                                    <span>{{$post->comments->count()}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    </article>

                    <!-- Comments -->
                    <?php $comments = $post->comments->take(3);?>
                    <div id="comment{{$post->id}}" class="comment">
                        {{-- <textarea>{{$post->id}}</textarea> --}}
                    @foreach ($comments as $comment)
                    {{-- @if ($comments->count()>5) --}}
                    <ul class="comments-list" id="comment-list">
                        <div class="komen">
                        <li class="comment-item">
                            <input type="hidden" name="ax" class="name_val" value="{{$comment->id}}">
                            <input type="hidden" name="post" class="name_val" value="{{$comment->post_id}}">
                            <div class="post__author author vcard inline-items">
                                <img src="{{$comment->user->getImage()}}" alt="author">
                                <div class="author-date">
                                    <a class="h6 post__author-name fn" href="{{route('guru.profil',$comment->user->id)}}">{{$comment->user->name}}</a>
                                    <div class="post__date">
                                        <time class="published" datetime="{{$comment->created_at}}">
                                        </time>
                                    </div>
                                </div>
                                @if ($comment->user_id == auth()->user()->id)
                                <div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon')}}"></use></svg>
                                <ul class="more-dropdown">
                                        <li>
                                        <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Delete Komentar</a>
                                        </li>
                                </ul>
                                </div>
                                @endif
                            </div>
                            <p>{{$comment->message}}</p>
                        </li>
                        </div>
                    </ul>
                    {{-- @break
                    @endif
                    @continue --}}
                    @endforeach
                    <!-- ... end Comments -->
                        <div id="remove-row-comments{{$post->id}}">
                                @if ($post->comments->count()==0)
                                @elseif($post->comments->count() > 3)
                            <a id="btn-more-comment{{$post->id}}" class="more-comments btn-more-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Lihat Komentar Lainnya<span>+</span></a>
                                @endif
                        </div>
                    </div>


                    <!-- Comment Form  -->
                    <form method="post" id="comment-form{{$post->id}}" action="javascript:void(0)" class="comment-form form-komen inline-items" enctype="multipart/form-data">
                    {{-- <form method="post" class="comment-form" id="comment-form{{$post->id}}" action="{{route('guru.addcomment')}}" class="comment-form inline-items" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="post__author author vcard inline-items">
                            <img src="{{auth()->user()->getImage()}}" alt="author">
                            <div class="form-group with-icon-right comment-id">
                                <input type="hidden" value="{{$post->id}}" name="post_id">
                                <input type="hidden" value="{{$post->user_id}}" name="parent_id">
                                <textarea data-id="{{$post->id}}" class="form-control" name="message" id="text{{$post->id}}" placeholder=""></textarea>
                                {{-- <div class="add-options-message">
                                    <a href="#" class="options-message" data-toggle="modal" data-target="#update-header-photo">
                                        <svg class="olymp-camera-icon">
                                            <use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-camera-icon')}}"></use>
                                        </svg>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <button type="submit" onclick ="myFunction(this)" id="btn-comment{{$post->id}}" data-id="{{$post->id}}" class="btn btn-md-2 btn-primary btn-comment-show" style="pointer-events: none" disabled>Tulis Komentar</button>
                        <div id="snackbar">Berhasil Berkomentar</div>
                    </form>
                    <!-- ... end Comment Form  -->
                </div>
            </div>

            <input type="hidden" value="{{$myid = $post->id}}">
            @endforeach
        </div>
        </div>

        <div id="iniload"></div>
            <div id="remove-row">
                @if (empty($myid))
                <div title="Data tidak ditemukan">
                    <a class="btn btn-control" data-container="newsfeed-items-grid" alt="No Data"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
                </div>
                @else
                <a id="btn-more" class="btn btn-control" data-user="{{$user->id}}" data-id="{{$post->id}}" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon')}}"></use></svg></a>
                @endif
            </div>
        </div>
        <!-- ... end Main Content -->

        <!-- Left Sidebar -->
    <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
        <div class="ui-block">
            <div class="ui-block-title">
                <h6 class="title">Profile Intro</h6>
            </div>
            <div class="ui-block-content">
                <!-- W-Personal-Info -->
                <ul class="widget w-personal-info item-block">
                    <li>
                        <span class="title">About Me:</span>
                        <span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the  “Daydreams” Agency in Pier 56.</span>
                    </li>
                    <li>
                        <span class="title">Favourite TV Shows:</span>
                        <span class="text">Breaking Good, RedDevil, People of Interest, The Running Dead, Found,  American Guy.</span>
                    </li>
                    <li>
                        <span class="title">Favourite Music Bands / Artists:</span>
                        <span class="text">Iron Maid, DC/AC, Megablow, The Ill, Kung Fighters, System of a Revenge.</span>
                    </li>
                </ul>
                <!-- .. end W-Personal-Info -->

                <!-- W-Socials -->
                <div class="widget w-socials">
                    <h6 class="title">Other Social Networks:</h6>
                    <a href="#" class="social-item bg-facebook">
                        <svg class="svg-inline--fa fa-facebook-f fa-w-9" aria-hidden="true" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 512" data-fa-i2svg=""><path fill="currentColor" d="M76.7 512V283H0v-91h76.7v-71.7C76.7 42.4 124.3 0 193.8 0c33.3 0 61.9 2.5 70.2 3.6V85h-48.2c-37.8 0-45.1 18-45.1 44.3V192H256l-11.7 91h-73.6v229"></path></svg><!-- <i class="fab fa-facebook-f" aria-hidden="true"></i> -->
                        Facebook
                    </a>
                    <a href="#" class="social-item bg-twitter">
                        <svg class="svg-inline--fa fa-twitter fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter" aria-hidden="true"></i> -->
                        Twitter
                    </a>
                    <a href="#" class="social-item bg-dribbble">
                        <svg class="svg-inline--fa fa-dribbble fa-w-16" aria-hidden="true" data-prefix="fab" data-icon="dribbble" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119.252 8 8 119.252 8 256s111.252 248 248 248 248-111.252 248-248S392.748 8 256 8zm163.97 114.366c29.503 36.046 47.369 81.957 47.835 131.955-6.984-1.477-77.018-15.682-147.502-6.818-5.752-14.041-11.181-26.393-18.617-41.614 78.321-31.977 113.818-77.482 118.284-83.523zM396.421 97.87c-3.81 5.427-35.697 48.286-111.021 76.519-34.712-63.776-73.185-116.168-79.04-124.008 67.176-16.193 137.966 1.27 190.061 47.489zm-230.48-33.25c5.585 7.659 43.438 60.116 78.537 122.509-99.087 26.313-186.36 25.934-195.834 25.809C62.38 147.205 106.678 92.573 165.941 64.62zM44.17 256.323c0-2.166.043-4.322.108-6.473 9.268.19 111.92 1.513 217.706-30.146 6.064 11.868 11.857 23.915 17.174 35.949-76.599 21.575-146.194 83.527-180.531 142.306C64.794 360.405 44.17 310.73 44.17 256.323zm81.807 167.113c22.127-45.233 82.178-103.622 167.579-132.756 29.74 77.283 42.039 142.053 45.189 160.638-68.112 29.013-150.015 21.053-212.768-27.882zm248.38 8.489c-2.171-12.886-13.446-74.897-41.152-151.033 66.38-10.626 124.7 6.768 131.947 9.055-9.442 58.941-43.273 109.844-90.795 141.978z"></path></svg><!-- <i class="fab fa-dribbble" aria-hidden="true"></i> -->
                        Dribbble
                    </a>
                </div>
                <!-- ... end W-Socials -->
            </div>
        </div>
     </div>
    <!-- ... end Left Sidebar -->

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
            <textarea class="form-control" name="content" id="content1" placeholder="Tulis status di sini.." required></textarea>
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
                <input class="form-control" placeholder="Tulis nama file.." type="text" name="title" id="title2" style="border:none" required>
                <textarea class="form-control" name="content" id="content2" placeholder="deskripsi file" required></textarea>
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

@push('scripts')

<script>
function myFunction(getId) {
    var idpost = $(getId).data('id');
    $('#btn-comment'+idpost).html("kirim..");
}
</script>

<script>
// load more timeline post
$(document).ready(function(){
    $(document).on('click','#btn-more',function(){
        var id = $(this).data('id');
        var user = $(this).data('user');
    //    console.log(id);
        $("#btn-more").html("...");
        $.ajax({
            url : urls[8],
            method : "POST",
            data : {id:id, user:user, _token:"{{csrf_token()}}"},
            dataType : "text",
            success : function (data)
            {
            //    console.log(data);
                if(data != '')
                {
                    $('#remove-row').remove();
                    $('#iniload').append(data);
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

<script>
    // load more comments
$(document).ready(function(){
    $(document).on('click','.btn-more-comment',function(){
        var id = $(this).data('id');
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
                    // console.log(data);

                    // console.log(post);

                    // $("#comment"+post).load(location.href + " #comment"+post);
                    // $("#countcomment"+post).load(location.href + " #countcomment"+post);

                }
                else
                {
                    $('#btn-more-comment'+post).html("No Data");
                }
            }
        });
    });
});
</script>

<script>
        // get filename file_1 and file_2
var input = document.getElementById( 'file_2' );
var input4 = document.getElementById( 'file_4' );
var infoArea = document.getElementById( 'filename_upload' );
var infoArea4 = document.getElementById( 'filename_upload_4' );

var input1 = document.getElementById( 'file_1' );
var input3 = document.getElementById( 'file_3' );
var infoArea1 = document.getElementById( 'filename_upload_1' );
var infoArea3 = document.getElementById( 'filename_upload_3' );

input.addEventListener( 'change', showFileName );
input1.addEventListener( 'change', showFileName1 );
input3.addEventListener( 'change', showFileName3 );
input4.addEventListener( 'change', showFileName4 );

function showFileName( event ) {
  var input = event.srcElement;// the change event gives us the input it occurred in
  var fileName = input.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  infoArea.textContent = 'File name : ' + fileName;// use fileName however fits your app best, i.e. add it into a div
}
function showFileName1( event ) {
    var input1 = event.srcElement;// the change event gives us the input it occurred in
    var fileName1 = input1.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea1.textContent = 'File name : ' + fileName1;// use fileName however fits your app best, i.e. add it into a div
  }
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

            {{-- $(document).ready(function () {
            $(".content").hide();
            $(".show_hide").on("click", function () {
                var txt = $(".content").is(':visible') ? 'Read More' : 'Read Less';
                $(".show_hide").text(txt);
                $(this).next('.content').slideToggle(200);
            });
        }); --}}

@endpush

