<?php

namespace App\Http\Controllers\User;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Agenda;

// use Image;
// use Intervention\Image\Exception\NotReadableException;

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
        $files = Post::where('type','=',2)->latest()->limit(4)->get();
        $posts = Post::latest()->limit(5)->get();

        $agenda = Agenda::latest()->first();
        if($agenda){
        $date = new Carbon($agenda->start_At);
        $now = Carbon::now();
        if(($date->diffInDays($now) == 0) && ($date->diffInHours($now) == 0))
        {
            $day = 'Sekarang';
            $name = $agenda->name;
        }
        elseif(($date->diffInHours($now) > 0) && ($date->diffInDays($now) == 0))
        {
            $day = ( $date->diffInHours($now)).' Jam Lagi';
            $name = $agenda->name;

        }
        elseif(($date->diffInHours($now) >= 0) && ($date->diffInDays($now) > 0))
        {
            $day = ( $date->diffInDays($now)).' Hari Lagi';
            $name = $agenda->name;

        }else
        {
            $day = 'Belum ada agenda rapat';
            $name = '';

        }
    }
    else
    {
        $day = 'Belum ada agenda rapat';
        $name = '';
    }
        // dd($difference);
        // dd($agendas);
        return view('guru.index', [
            'posts' => $posts,
            'files' => $files,
            'day' => $day,
            'name' => $name,

        ]);
    }

    public function addPost(Request $request)
    {
        $file_2 = $request->file('file_2')->store('posts');
        $data = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'file_2' => $file_2,
            'type' => 2,
            'file_3' => ($request->title."".substr($file_2, -4)),
        ]);

        return response()->json($data);
    }

    public function addStatus(Request $request)
    {
        if ($request->hasFile('file_1')) {
        $upload = $request->file('file_1')->store('posts');
        $file_1 = new Post;
        $file_1->file_1 = $upload;
        $file_1->content = $request->content;
        $file_1->user_id = $request->user_id;
        $file_1->type = 1;
        $file_1->save();
        // echo $file_1->content;
        }
        else {
        $data = Post::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'type' => 1
        ]);

    }

    return response()->json();
    }

    public function showPost(Post $post)
    {
        $comments = Comment::where('post_id',$post->id)->latest()->get();
        // dd($comments);
        return view('guru.show', [
            'post' => $post,
            'comments' => $comments
        ]);

    }

    public function editPost($id)
    {
        $where = array ('id' => $id);
        $post = Post::where($where)->first();

        return response()->json($post);
    }

    public function updateStatus(Request $request, $id)
    {
        $post = Post::find($id);
        //get file_1
        $file_1 = null;
        if ($request->hasFile('file_1')) {
            if($post->file_1){
                Storage::delete($post->file_1);
            }
            $file_1 = $request->file('file_1')->store('posts');
        }
        if (!$request->hasFile('file_1') && $post->file_1) {
            $file_1 = $post->file_1;
        }
        $data = Post::find($id)->update([
            'content' => $request->content,
            'file_1' => $file_1,
        ]);
        return response()->json($data);
    }

    public function updatePost(Request $request, $id)
    {
        $post = Post::find($id);
        //get file_2
        $file_2 = null;
        if ($request->hasFile('file_2')) {
            if($post->file_2){
                Storage::delete($post->file_2);
            }
            $file_2 = $request->file('file_2')->store('posts');
        }
        if (!$request->hasFile('file_2') && $post->file_2) {
            $file_2 = $post->file_2;
        }

        $data = Post::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'file_2' => $file_2,
            'file_3' => ($request->title."".substr($file_2, -4)),
        ]);
        return response()->json($data);
    }

    public function deletePost($id)
    {
        Storage::delete(Post::find($id)->file_1);
        Storage::delete(Post::find($id)->file_2);

        $post = Post::find($id);
        $post->delete();
        $post->comments()->delete();


        return response()->json($post);
    }

    public function addComment(Request $request)
    {
        $postid = $request->input('post_id');
        // $comment = new Comment;
        // $comment->post_id = $request->post_id;
        // $comment->message = $request->message;
        // $comment->parent_id = $request->parent_id;
        // $comment->user_id = auth()->user()->id;
        // $comment->save();

        $data = Comment::create([
            'post_id' => $request->post_id,
            'message' => $request->message,
            'parent_id' => $request->parent_id,
            'user_id' => auth()->user()->id

        ]);
        $id = auth()->user()->id;
        $user = User::where('id','=',$id)->get();

        $posts = Post::find($postid);
        $count = $posts->comments()->count();

        return response()->json([$data,$user,$count]);

        // return response();
        // $tesparent = $comment->parent_id;
        // $tesuser = $comment->user_id;
        // $insertId = $comment->post_id;
        // $notifyparent = Comment::where('parent_id', '=', $tesparent)->select('parent_id')->get();

        // $notifycomment = Comment::where([
        //     ['post_id','=',$insertId],
        //     ['user_id', '!=', $tesuser]
        // ])->select('user_id')->distinct('user_id')->get();

        // $sendnotify1 = User::whereIn('id', $notifycomment)->get();
        // $sendnotify2 = User::whereIn('id', $notifyparent)->get();

        // if($tesuser != $tesparent){
        //     \Notification::send($sendnotify1, new NewLessonNotification(DB::table('thread_lesson_user')->latest('id')->first()));
        //     \Notification::send($sendnotify2, new NewLessonNotification(DB::table('thread_lesson_user')->latest('id')->first()));
        // }
        //     \Notification::send($sendnotify1, new NewLessonNotification(DB::table('thread_lesson_user')->latest('id')->first()));
            // dd($comment);
        // return back();


    }

    public function deleteComment($id)
    {
        $comment = Comment::find($id)->delete();
    }

    public function download(Post $post)
    {
        $file = public_path() .'/images/'. $post->file_2;
        return response()->download($file);
    }
    public function tes()
    {
        $comments = new Comment();
        $id = $comments->user_id = auth()->user()->id;
        $user = User::where('id','=',$id)->get();
        dd($user);
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

    public function showProfil(User $user)
    {
        $posts = Post::where('user_id','=',$user->id)->latest()->limit(2)->get();
        $status = Post::where([
            ['type','=',1],
            ['user_id','=',$user->id],
        ])->count();
        $file = Post::where([
            ['type','=',2],
            ['user_id','=',$user->id],
        ])->count();

        return view('guru.profil',[
            'user' => $user,
            'posts' => $posts,
            'status' => $status,
            'file' => $file,
        ]);
    }
    public function editProfil()
    {
        $id = auth()->user()->id;
        $user = User::where('id','=',$id)->get()->first();

        return view('guru.editprofil',[
            'user' => $user
        ]);
    }

    public function updateProfil(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);
        // dd($user);
        //get file_1
        $file = null;

        if ($request->hasFile('file')) {
            if($user->file){
                Storage::delete($user->file);
            }
            $file = $request->file('file')->store('users');
        }
        if (!$request->hasFile('file') && $user->file) {
            $file = $user->file;
        }

        if(!empty($password)){
            $newpassword = Hash::make($request['password']);
        }else{
            $newpassword = $user->password;
        }

        $data = User::find($id)->update([
            'name' => $request->name,
            'identity' => $request->identity,
            'grade' => $request->grade,
            'phone' => $request->phone,
            'password' => $newpassword,
            'file' => $file
        ]);
        return back();
    }

    public function addAgenda(Request $request)
    {
        // $date = Carbon::createFromFormat('d/m/Y', $request->date);
        $newdate = Carbon::parse($request->date)->format('Y-m-d');
        $time = Carbon::parse($request->time)->format('H:i:s');

        $start_At = date('Y-m-d H:i:s', strtotime("$newdate $time"));
        $data = Agenda::create([
            'name' => $request->name,
            'place' => $request->place,
            'user_id' => auth()->user()->id,
            'creator' => auth()->user()->name,
            'description' => $request->description,
            'start_At' => $start_At
        ]);


        return redirect()->route('guru.index');
    }

    public function updateAgenda(Request $request, $id)
    {
        $agenda = Agenda::find($id);
        //get file
        $file = null;
        if ($request->hasFile('file')) {
            if($agenda->file){
                Storage::delete($agenda->file);
            }
            $file = $request->file('file')->store('agendas');
        }
        if (!$request->hasFile('file') && $agenda->file) {
            $file = $agenda->file;
        }

        $data = Agenda::find($id)->update([
            'summary' => $request->summary,
            'status' => 1,
            'file' => $file,
        ]);

        $users = User::find($request->user);
        $agenda->users()->sync($users);

        return response()->json($data);
    }

    public function indexAgenda()
    {
        $agendas = Agenda::latest()->get();
        $users = User::whereHas('roles',function($q){
            $q->where('name','Guru');
        })->get();
        // dd($agendas);

        return view('guru.agendalist',[
            'agendas' => $agendas,
            'users' => $users
        ]);
    }

    public function showAgenda($id)
    {
        $users = User::whereHas('roles',function($q){
            $q->where('name','Guru');
        })->get();

        $where = array ('id' => $id);
        $agenda = Agenda::where($where)->first();

        return response()->json([$agenda,$users]);
    }

    public function agendaDownload(Agenda $agenda,$id)
    {

        $where = array ('id' => $id);
        $agenda = Agenda::where($where)->first();

        $download = public_path() .'/images/'. $agenda->file;
        // dd($download);
        return response()->download($download);
    }



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
