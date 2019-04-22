<?php

namespace App\Http\Controllers\User;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use DB;
use Image;
use Intervention\Image\Exception\NotReadableException;

class GuruController extends Controller
{

    public function __construct()
    {
        $date = new DateTime();
        $this->month = $date->format('m') - 1;
        $this->year = $date->format('Y');
    }

    //guru controller
    public function home()
    {
        return view('guru.index');
    }

    public function index()
    {
        // $feedcomments = DB::table('feedcomments')
        //                                         ->where('feedcomments.feed_id', $feed->id)
        //                                         ->where('parent_id','==', '0')
        //                                         ->join('users', 'users.id', '=', 'feedcomments.user_id')
        //                                         ->orderBy('feedcomments.id', 'DESC')->get(['feedcomments.*', 'users.name', 'users.email', 'users.phone', 'users.agency', 'users.file as userphoto']);
                                                // dd($feedcomments);
        $data['posts'] = DB::table('posts')->join('users', 'users.id', '=', 'posts.user_id')->orderBy('posts.created_at','DESC')
                                ->limit(2)
                                ->get(['posts.id as postid','posts.content', 'users.name as username' ,'users.id as usersid', 'users.email', 'users.phone', 'users.school_id', 'users.file as userphoto']);

        return view('guru.index', $data);
    }

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        $posts = DB::table('posts')
                                ->where('posts.id','<',$id)
                                ->join('users', 'users.id', '=', 'posts.user_id')->orderBy('posts.created_at','DESC')
                                ->limit(2)

                                ->get(['posts.id as postid','posts.content', 'users.name as username' ,'users.id as usersid', 'users.email', 'users.phone', 'users.school_id', 'users.file as userphoto']);


        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {
                $output .= ' <article class="hentry post">
                <div class="post__author author vcard inline-items">
                <img src="'.asset('guru/img/avatar10-sm.jpg').'" alt="author">

                <div class="author-date">
                    <a class="h6 post__author-name fn" href="#">'.$post->username.'</a>
                    <div class="post__date">
                        <time class="published" datetime="2004-07-24T18:18">
                            9 hours ago
                        </time>
                    </div>
                </div>
                <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-three-dots-icon').'"></use></svg>
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
                <p>'.$post->content.'</p>
            <div class="post-additional-info inline-items">
                <div class="comments-shared">
                    <a href="#" class="post-add-icon inline-items">
                        <svg class="olymp-speech-balloon-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-speech-balloon-icon').'"></use></svg>
                        <span>17</span>
                    </a>
                </div>
            </div>
            </article>';
            $last_id = $post->postid;
            }
            $output.= '<div id="remove-row">
            <a id="btn-more" class="btn btn-control" data-id="'.$last_id.'" data-container="newsfeed-items-grid"><svg class="olymp-dropdown-arrow-icon"><use xlink:href="'.asset('guru/svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon').'"></use></svg></a>
            </div>
            ';
            echo $output;

        }
    }

    public function addPost(Request $request)
    {

        $file_1 = $request->file('file_1')->store('posts');

        $data = Post::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'file_1' => $file_1,
            'type' => 1
        ]);

        return response()->json($data);
    }

    public function showPost(Post $post)
    {

    }

    public function updatePost(Post $post)
    {

    }

    public function deletePost(Post $post)
    {

    }

    public function addComment(Request $request)
    {

    }

    //notifikasi
    // public function notification()
    // {
    //     return auth()->user()->unreadNotifications;

    // }
    // public function markAsRead(Request $request)
    // {
    //     auth()->user()->unreadNotifications->find($request->not_id)->markAsRead();

    // }
    // public function readLesson($lesson_id)
    // {
    //     $lesson = Lesson::find([$lesson_id]);
    //     return view('lesson', compact('lesson'));

    // }
    // public function allMarkAsread()
    // {
    //     auth()->user()->unreadNotifications->markAsRead();

    // }
    // public function readAllLesson()
    // {
    //     $lessons = auth()->user()->readNotifications;
    //     return view('allLesson', compact('lessons'));
    // }



    //konversi tanggal
    public function tanggal($tgl)//only date
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y');
        echo '<li class="entry__meta-date"><i class="ui-date"></i>'.$time.'</li>';

    }

    public function fullTime($tgl)//using clock
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s");
        echo '<li class="entry__meta-date"><i class="ui-date"></i>'.$time.'</li>';
    }

}
