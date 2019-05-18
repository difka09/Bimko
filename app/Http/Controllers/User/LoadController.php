<?php

namespace App\Http\Controllers\User;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;


class LoadController extends Controller
{


    public function loadDataCommentShow(Request $request)
    {
        $output = '';
        $id = $request->id;
        $postid = $request->post;
        $posts = Post::find($postid);
        $comments = $posts->comments()->where('id', '<', $id)->take(2)->get();

        if(!$comments->isEmpty())
        {
            foreach($comments as $comment){
                $output .= ' <ul class="comments-list" id="comment-list">
                <div class="komen">
                <li class="comment-item">
                <input type="hidden" class="name_val" value="'.$comment->id.'">
                <input type="hidden" name="post" class="name_val" value="'.$comment->post_id.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.$comment->user->getImage().'" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="'.Route('guru.profil',$comment->user->id).'">'.$comment->user->name.'</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    38 mins ago
                                </time>
                            </div>
                        </div>';
                        if($comment->user_id == auth()->user()->id){
                        $output .= '<div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                        <ul class="more-dropdown">
                                <li>
                                <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Delete Comment</a>
                                </li>
                        </ul>
                        </div>';
                        }
                        $output .= ' </div>
                                <p>'.$comment->message.'</p>
                                </li>
                                </div>
                        </ul>';
                        $postid = $comment->post_id;
                        $commentid = $comment->id;
            }
                        $output .= '<div id="remove-row-comments'.$comment->post_id.'">';
                        if ($comments->isEmpty()){

                        }else{
                            $output .='<a id="btn-more-comment'.$comment->post_id.'" class="more-comments btn-more-comment" data-post="'.$postid.'" data-id="'.$commentid.'">Lihat Komentar Lainnya<span>+</span></a>';
                        }
                        $output .='</div>';


            echo $output;
        }

    }

    public function loadDataComment(Request $request)
    {
        $output = '';
        $id = $request->id;
        $postid = $request->post;
        $posts = Post::find($postid);
        $comments = $posts->comments()->where('id', '<', $id)->take(2)->get();

        if(!$comments->isEmpty())
        {
            foreach($comments as $comment){
                $output .= ' <ul class="comments-list" id="comment-list">
                <div class="komen">
                <li class="comment-item">
                <input type="hidden" class="name_val" value="'.$comment->id.'">
                <input type="hidden" name="post" class="name_val" value="'.$comment->post_id.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.$comment->user->getImage().'" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="'.Route('guru.profil',$comment->user->id).'">'.$comment->user->name.'</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    38 mins ago
                                </time>
                            </div>
                        </div>';
                        if($comment->user_id == auth()->user()->id){
                        $output .= '<div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                        <ul class="more-dropdown">
                                <li>
                                <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="{{$comment->post_id}}" data-id="{{$comment->id}}">Delete Comment</a>
                                </li>
                        </ul>
                        </div>';
                        }
                        $output .= ' </div>
                                <p>'.$comment->message.'</p>
                                </li>
                                </div>
                        </ul>';
                        $postid = $comment->post_id;
                        $commentid = $comment->id;
            }
                        $output .= '<div id="remove-row-comments'.$comment->post_id.'">';
                        if ($comments->isEmpty()){

                        }else{
                            $output .='<a id="btn-more-comment'.$comment->post_id.'" class="more-comments btn-more-comment" data-post="'.$postid.'" data-id="'.$commentid.'">Lihat Komentar Lainnya<span>+</span></a>';
                        }
                        $output .='</div>';


            echo $output;
        }

    }

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        // $posts = DB::table('posts')
        //                         ->where('posts.id','<',$id)
        //                         ->join('users', 'users.id', '=', 'posts.user_id')->orderBy('posts.created_at','DESC')
        //                         ->limit(2)

        //                         ->get(['posts.id as postid','posts.content','posts.type', 'users.name as username' ,'users.id as usersid', 'users.email', 'users.phone', 'users.school_id', 'users.file as userphoto']);
        $posts = Post::where('id','<',$id)->latest()->limit(4)->get();


        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $output .= '<div id="newsfeed-items-grid'.$post->id.'">
                <div class="ui-block">
                <article class="hentry post" id="post_id_'.$post->id.'">
                <div class="post__author author vcard inline-items">
                <img src="'.$post->user->getImage().'" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="'.route('guru.profil',$post->user->id).'">'.$post->user->name.'</a>
                    <div class="post__date">
                        <time class="published" datetime="2004-07-24T18:18">
                            <a href="'.route('guru.show',$post).'">9 hours ago</a>
                        </time>
                    </div>
                </div>';

                if(($post->user_id == auth()->user()->id)){
                $output .= '
                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                    <ul class="more-dropdown">';
                if ($post->type == 1){
                    $output .=' <li>
                    <a href="javascript:void(0)" id="edit-post1" data-id="'.$post->id.'">Edit Status</a>
                </li>';
                } else{
                    $output .=' <li>
                    <a href="javascript:void(0)" id="edit-post2" data-id="'.$post->id.'">Edit File</a>
                </li>';
                }
                $output .='<li>
                <a class="delete-post" href="javascript:void(0)" id="delete-post" data-id="'.$post->id.'">Delete Post</a>
                </li>
                    </ul>
                </div>';
            }
            $output .= '
            </div>
            <div id="khusus'.$post->id.'">
                <p>'.$post->content.'</p>';
            if ($post->file_2){
            $output .='<div class="post-thumb"><a href="'.route('guru.download',$post).'"><svg class="olymp-blog-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon').'"></use></svg><span>'.$post->title.''.substr(($post->file_2),-4).'</span></a>
            </div>';
            }
            elseif($post->file_1){
            $output .='<img src="'.$post->getImage1().'" alt="author" width="770" height="520">';
            }
            $output .=' </div>
            <div id="countcomment'.$post->id.'" class="countcomment">
            <div class="post-additional-info inline-items"><div class="comments-shared"><a class="post-add-icon inline-items">
            <svg class="olymp-speech-balloon-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon').'"></use></svg>
            <span>'.$post->comments->count().'</span></a>
            </div></div></div>
            </article>';

            $comments = $post->comments->take(3);
            $output .='<div id="comment'.$post->id.'" class="comment">';
            foreach ($comments as $comment){

                $output .='<ul class="comments-list" id="comment-list">
                <div class="komen">
                <li class="comment-item">
                    <input type="hidden" name="ax" class="name_val" value="'.$comment->id.'">
                    <input type="hidden" name="post" class="name_val" value="'.$comment->post_id.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.$comment->user->getImage().'" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="'.route('guru.profil',$comment->user->id).'">'.$comment->user->name.'</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    38 mins ago
                                </time>
                            </div>
                        </div>';
            if($comment->user_id == auth()->user()->id){
                $output .='<div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                <ul class="more-dropdown">
                    <li>
                    <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="'.$comment->post_id.'" data-id="'.$comment->id.'">Delete Comment</a>
                    </li>
                </ul>
                </div>';
            }
            $output .=' </div>
            <p>'.$comment->message.'</p>
                </li>
                </div>
            </ul>';
            }
            $output .='<div id="remove-row-comments'.$post->id.'">';
            if($post->comments->count()==0){
            }elseif($post->comments->count() > 3){
            $output .='<a id="btn-more-comment'.$post->id.'" class="more-comments btn-more-comment" data-post="'.$comment->post_id.'" data-id="'.$comment->id.'">Lihat Komentar Lainnya<span>+</span></a>';
            }
            $output .='</div>
            </div>
            <form method="post" id="comment-form'.$post->id.'" action="javascript:void(0)" class="comment-form form-komen inline-items" enctype="multipart/form-data">';
            $csrf = $request->session()->token();
            $output .='<input type="hidden" name="_token" value="'.$csrf.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.auth()->user()->getImage().'" alt="author">
                        <div class="form-group with-icon-right ">
                            <input type="hidden" value="'.$post->id.'" name="post_id">
                            <input type="hidden" value="'.$post->user_id.'" name="parent_id">
                            <textarea data-id="'.$post->id.'" class="form-control tgInput" name="message" id="text'.$post->id.'" placeholder=""></textarea>
                        </div>
                    </div>
                    <button type="submit" onclick ="myFunction(this)" id="btn-comment'.$post->id.'" data-id="'.$post->id.'" class="btn btn-md-2 btn-primary btn-comment-show" style="pointer-events: none" disabled>Tulis Komentar</button>
                    <div id="snackbar">Berhasil Berkomentar</div>
                </form>
            </div>
        </div>';

            $last_id = $post->id;
            }
            $output.= '<div id="remove-row">
            <a id="btn-more" class="btn btn-control" data-id="'.$last_id.'" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon').'"></use></svg></a>
            </div>
            ';
            echo $output;

        }
    }

     public function loadDataAjaxShow(Request $request)
    {
        $output = '';
        $id = $request->id;
        $user = $request->user;
        // $posts = DB::table('posts')
        //                         ->where('posts.id','<',$id)
        //                         ->join('users', 'users.id', '=', 'posts.user_id')->orderBy('posts.created_at','DESC')
        //                         ->limit(2)

        //                         ->get(['posts.id as postid','posts.content','posts.type', 'users.name as username' ,'users.id as usersid', 'users.email', 'users.phone', 'users.school_id', 'users.file as userphoto']);
        // $posts = Post::where('id','<',$id)->latest()->limit(4)->get();

        $posts = Post::where([
            ['id','<',$id],
            ['user_id','=',$user]
            ])->latest()->limit(2)->get();
        // dd($posts);

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $output .= '<div id="newsfeed-items-grid'.$post->id.'">
                <div class="ui-block">
                <article class="hentry post" id="post_id_'.$post->id.'">
                <div class="post__author author vcard inline-items">
                <img src="'.$post->user->getImage().'" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="'.route('guru.profil',$post->user->id).'">'.$post->user->name.'</a>
                    <div class="post__date">
                        <time class="published" datetime="2004-07-24T18:18">
                            <a href="'.route('guru.show',$post).'">9 hours ago</a>
                        </time>
                    </div>
                </div>';

                if(($post->user_id == auth()->user()->id)){
                $output .= '
                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                    <ul class="more-dropdown">';
                if ($post->type == 1){
                    $output .=' <li>
                    <a href="javascript:void(0)" id="edit-post1" data-id="'.$post->id.'">Edit Status</a>
                </li>';
                } else{
                    $output .=' <li>
                    <a href="javascript:void(0)" id="edit-post2" data-id="'.$post->id.'">Edit File</a>
                </li>';
                }
                $output .='<li>
                <a class="delete-post" href="javascript:void(0)" id="delete-post" data-id="'.$post->id.'">Delete Post</a>
                </li>
                    </ul>
                </div>';
            }
            $output .= '
            </div>
            <div id="khusus'.$post->id.'">
                <p>'.$post->content.'</p>';
            if ($post->file_2){
            $output .='<div class="post-thumb"><a href="'.route('guru.download',$post).'"><svg class="olymp-blog-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon').'"></use></svg><span>'.$post->title.''.substr(($post->file_2),-4).'</span></a>
            </div>';
            }
            elseif($post->file_1){
            $output .='<img src="'.$post->getImage1().'" alt="author" width="770" height="520">';
            }
            $output .=' </div>
            <div id="countcomment'.$post->id.'" class="countcomment">
            <div class="post-additional-info inline-items"><div class="comments-shared"><a class="post-add-icon inline-items">
            <svg class="olymp-speech-balloon-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon').'"></use></svg>
            <span>'.$post->comments->count().'</span></a>
            </div></div></div>
            </article>';

            $comments = $post->comments->take(3);
            $output .='<div id="comment'.$post->id.'" class="comment">';
            foreach ($comments as $comment){

                $output .='<ul class="comments-list" id="comment-list">
                <div class="komen">
                <li class="comment-item">
                    <input type="hidden" name="ax" class="name_val" value="'.$comment->id.'">
                    <input type="hidden" name="post" class="name_val" value="'.$comment->post_id.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.$comment->user->getImage().'" alt="author">
                        <div class="author-date">
                            <a class="h6 post__author-name fn" href="'.route('guru.profil',$comment->user->id).'">'.$comment->user->name.'</a>
                            <div class="post__date">
                                <time class="published" datetime="2004-07-24T18:18">
                                    38 mins ago
                                </time>
                            </div>
                        </div>';
            if($comment->user_id == auth()->user()->id){
                $output .='<div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
                <ul class="more-dropdown">
                    <li>
                    <a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="'.$comment->post_id.'" data-id="'.$comment->id.'">Delete Comment</a>
                    </li>
                </ul>
                </div>';
            }
            $output .=' </div>
            <p>'.$comment->message.'</p>
                </li>
                </div>
            </ul>';
            }
            $output .='<div id="remove-row-comments'.$post->id.'">';
            if($post->comments->count()==0){
            }elseif($post->comments->count() > 3){
            $output .='<a id="btn-more-comment'.$post->id.'" class="more-comments btn-more-comment" data-post="'.$comment->post_id.'" data-id="'.$comment->id.'">Lihat Komentar Lainnya<span>+</span></a>';
            }
            $output .='</div>
            </div>
            <form method="post" id="comment-form'.$post->id.'" action="javascript:void(0)" class="comment-form form-komen inline-items" enctype="multipart/form-data">';
            $csrf = $request->session()->token();
            $output .='<input type="hidden" name="_token" value="'.$csrf.'">
                    <div class="post__author author vcard inline-items">
                        <img src="'.auth()->user()->getImage().'" alt="author">
                        <div class="form-group with-icon-right ">
                            <input type="hidden" value="'.$post->id.'" name="post_id">
                            <input type="hidden" value="'.$post->user_id.'" name="parent_id">
                            <textarea data-id="'.$post->id.'" class="form-control tgInput" name="message" id="text'.$post->id.'" placeholder=""></textarea>
                        </div>
                    </div>
                    <button type="submit" onclick ="myFunction(this)" id="btn-comment'.$post->id.'" data-id="'.$post->id.'" class="btn btn-md-2 btn-primary btn-comment-show" style="pointer-events: none" disabled>Tulis Komentar</button>                    <div id="snackbar">Berhasil Berkomentar</div>
                </form>
            </div>
        </div>';

            $last_id = $post->id;
            $current_user = $post->user->id;
            }
            $output.= '<div id="remove-row">
            <a id="btn-more" class="btn btn-control" data-user="'.$current_user.'" data-id="'.$last_id.'" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon').'"></use></svg></a>
            </div>
            ';
            // echo $current_user;
            echo $output;

        }
    }
}


