<?php

namespace App\Http\Controllers\User;

use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Agenda;
// use Pusher\Pusher;
// use App\Events\StatusLiked;
// use App\Notifications\NewNotif;
use App\Notifications\UserCommented;
use App\Models\Feed;
use App\Models\Agreement;
use App\Notifications\UserAgenda;
use App\Models\DetailAgenda;
use App\Models\Question;
use App\Models\Answer;
// use Intervention\Image\ImageManager;
// use Intervention\Image\Image;
// use Intervention\Image\Exception\NotReadableException;
use App\Models\School;
use Illuminate\Support\Facades\Validator;
use Image;


class GuruController extends Controller
{

    public function __construct()
    {
        $date = new DateTime();
        $this->month = $date->format('m') - 1;
        $this->year = $date->format('Y');
        $this->responders = Feed::where('status','=',0)->latest()->limit(4)->get();
        $this->murids = Question::where([
            ['status','=',0],
            ['parent','=',null]
            ])->latest()->limit(4)->get();
    }

    public function home()
    {
        return view('guru.index');
    }

    public function index(Request $request)
    {
        $files = Post::where('type','=',2)->latest()->limit(4)->get();
        $posts = Post::latest()->limit(5)->get();
        $notifications = $request->user()->unreadNotifications()->limit(20)->get()->toArray();

        $agenda = Agenda::latest()->where('start_At','>', Carbon::now()->subDays(0))->first();
        // dd($agenda);
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
            'notifications' => $notifications,
            'responders' => $this->responders,
            'murids' => $this->murids,


        ]);
    }

    public function addPost(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'file_2' => 'required|max:20024',

        ],[
            'title.required'  => '*Judul file kosong',
            'content.required' => '*Deskripsi file kosong',
            'file_2.required' => '*file tidak ada',
            'file_2.max' => 'maksimal file berukuran 20mb',
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(array(
                'success' => false,
                'errors' => $error
            ), 400);
        }

        // $file_2 = Image::make($request->file('file_2'))->resize(300,200)->store('posts');
        $file_2 = $request->file('file_2')->store('posts');
        $data = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'file_2' => $file_2,
            'type' => 2,
            'file_3' => ($request->title."".substr($file_2, -5)),
            'post_name' => auth()->user()->name,
        ]);

        return response()->json($data);

    }

    public function addStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'content' => 'required',
            'file_1' => 'image|mimes:jpeg,bmp,jpg,png|max:5024',
        ],[
            'content.required' => '*status kosong',
            'file_1.image' => 'file harus berupa gambar atau berformat (.jpeg, .bmp, .jpg, .png)',
            'file_1.mimes' => 'hanya untuk gambar berformat (.jpeg, .bmp, .jpg, .png)',
            'file_1.max' => 'maksimal gambar berukuran 5mb'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(array(
                'success' => false,
                'errors' => $error
            ), 400);
        }

        if ($request->hasFile('file_1')) {
            $image = $request->file('file_1');
            $resize = Image::make($image->getRealPath())->resize(960,960, function($constraint){
                $constraint->aspectRatio();
            })->encode('jpg');
            // $hash = md5($resize->__toString());
            $hash = str_random(50);
            $path = "images/posts/{$hash}.jpg";
            $resize->save(public_path($path));
            $upload = "posts/{$hash}.jpg";

        // $upload = $request->file('file_1')->store('posts');

        $file_1 = new Post;
        $file_1->file_1 = $upload;
        $file_1->content = $request->content;
        $file_1->user_id = $request->user_id;
        $file_1->type = 1;
        $file_1->post_name = auth()->user()->name;
        $file_1->save();
        }

        else {
        $data = Post::create([
            'content' => $request->content,
            'user_id' => $request->user_id,
            'type' => 1,
            'post_name' => auth()->user()->name,
        ]);

    }
    // $file_path = asset('images/' . $this->file_1);
    return response()->json();
    }

    public function showPost(Post $post, Request $request)
    {
        $comments = Comment::where('post_id',$post->id)->latest()->get();
        $notifications = $request->user()->notifications;

        return view('guru.show', [
            'post' => $post,
            'comments' => $comments,
            'notifications' => $notifications

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
        $validate = Validator::make($request->all(), [
            'content' => 'required',
            'file_1' => 'image|mimes:jpeg,bmp,jpg,png|max:5024',
        ],[
            'content.required' => '*status kosong',
            'file_1.image' => 'file harus berupa gambar atau berformat (.jpeg, .bmp, .jpg, .png)',
            'file_1.mimes' => 'hanya untuk gambar berformat (.jpeg, .bmp, .jpg, .png)',
            'file_1.max' => '*maksimal gambar berukuran 5mb'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(array(
                'success' => false,
                'errors' => $error
            ), 400);
        }

        $post = Post::find($id);

        //get file_1
        $file_1 = null;
        if ($request->hasFile('file_1')) {
            if($post->file_1){
                Storage::delete($post->file_1);
            }
            // $file_1 = $request->file('file_1')->store('posts');
            $image = $request->file('file_1');
            $resize = Image::make($image->getRealPath())->resize(960,960, function($constraint){
                $constraint->aspectRatio();
            })->encode('jpg');
            // $hash = md5($resize->__toString());
            $hash = str_random(50);
            $path = "images/posts/{$hash}.jpg";
            $resize->save(public_path($path));
            $file_1 = "posts/{$hash}.jpg";
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
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'content' => 'required',
            'file_2' => 'max:20024'
        ],[
            'title.required'  => '*Judul file kosong',
            'content.required' => '*Deskripsi file kosong',
            'file_2.max' => 'maksimal file berukuran 20mb'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(array(
                'success' => false,
                'errors' => $error
            ), 400);
        }

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
            'file_3' => ($request->title."".substr($file_2, -5)),
        ]);
        return response()->json($data);
    }

    public function deletePost($id)
    {
        Storage::delete(Post::find($id)->file_1);
        Storage::delete(Post::find($id)->file_2);

        $post = Post::find($id);
        $post->comments()->forceDelete();
        $post->forceDelete();


        return response()->json($post);
    }

    public function addComment(Request $request)
    {
        $postid = $request->input('post_id');

        $data = Comment::create([
            'post_id' => $request->post_id,
            'message' => $request->message,
            'parent_id' => $request->parent_id,
            'user_id' => auth()->user()->id

        ]);

        $data->load('user','post');
        $id = auth()->user()->id;
        $user = User::where('id','=',$id)->get();

        $posts = Post::find($postid);
        $count = $posts->comments()->count();

        $tesparent = $request->parent_id;
        $tesuser = auth()->user()->id;
        $insertId = $request->post_id;
        $notifyparent = Comment::where('parent_id', '=', $tesparent)->distinct('parent_id')->pluck('parent_id');
        // $notifyparent = Comment::where('parent_id', '=', $tesparent)->select('parent_id')->get();

        $notifycomment = Comment::where([
            ['post_id','=',$insertId],
            ['user_id', '!=', $tesuser]
        ])->distinct('user_id')->pluck('user_id');
        // dd($notifyparent);

        $sendnotify1 = User::whereIn('id', $notifycomment)->get();
        $sendnotify2 = User::whereIn('id', $notifyparent)->get();

        if(($tesuser != $tesparent) && (!$notifycomment->isEmpty())){
            $sendnotify3 = User::where('id',$notifycomment)->orwhere('id',$notifyparent)->distinct('id')->get();
            \Notification::send($sendnotify3, new UserCommented($data));
        }elseif(($tesuser == $tesparent) && (!$notifycomment->isEmpty())){
            \Notification::send($sendnotify1, new UserCommented($data));
        }elseif($tesuser != $tesparent){
            \Notification::send($sendnotify2, new UserCommented($data));
        }elseif(($tesuser == $tesparent) && ($notifycomment->isEmpty())){
        }


        return response()->json([$data,$user,$count]);
    }


    public function deleteComment($id)
    {

        $comment = Comment::find($id);
        $comment->forceDelete();

        // $a = $comment->user->notifications();
        // $a->delete();
        // $comment->user->notifications->delete();

    }

    public function download(Post $post)
    {
        $file = public_path() .'/images/'. $post->file_2;
        return response()->download($file);

    }
    public function tes()
    {
        // $comments = new Comment();
        // $id = $comments->user_id = auth()->user()->id;
        // $user = User::where('id','=',$id)->get();
        // dd($user);
        // $detail = DetailAgenda::find(1);
        // $user = User::onlyTrashed()->where('id', 19);
        // dd($user);
        $agenda = Agenda::withTrashed()->where('user_id', 20)->first();
            if($agenda->detailAgenda->file){
            Storage::delete($agenda->detailAgenda->file);
        }
dd($agenda);

        // $comment = Comment::find($id);

        // // dd($comment);
        // $a = DB::table('notifications')->where('data','==','\"comment_id\":'.$id)->get();
        // dd($a);
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

    public function showProfil(User $user,Request $request)
    {
        $notifications = $request->user()->notifications;
        $posts = Post::where('user_id','=',$user->id)->latest()->limit(2)->get();
        $status = Post::where([
            ['type','=',1],
            ['user_id','=',$user->id],
        ])->count();
        $file = Post::where([
            ['type','=',2],
            ['user_id','=',$user->id],
        ])->count();

        $answer = Answer::where('user_id', '=', $user->id)->distinct('question_id')->pluck('question_id')->count();
        return view('guru.profil',[
            'user' => $user,
            'posts' => $posts,
            'status' => $status,
            'file' => $file,
            'answer' => $answer,
            'notifications' => $notifications,
        ]);
    }
    public function editProfil(Request $request)
    {
        $notifications = $request->user()->notifications;
        $id = auth()->user()->id;
        $user = User::where('id','=',$id)->get()->first();
        $schools = School::get();

        return view('guru.editprofil',[
            'user' => $user,
            'schools' => $schools,
            'notifications' => $notifications,
            'responders' => $this->responders,
            'murids' => $this->murids,

        ]);
    }

    public function updateProfil(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);

        //get file_1
        $file = null;
        if ($request->hasFile('file')) {
            if($user->file == "users/woman.png")
            {
                $file = $request->file('file')->store('users');
            }
            elseif($user->file == "users/man.png")
            {
                $file = $request->file('file')->store('users');
            }
            else{
                Storage::delete($user->file);
                $image = $request->file('file');
                $resize = Image::make($image->getRealPath())->resize(960,960, function($constraint){
                    $constraint->aspectRatio();
                })->encode('jpg');
                // $hash = md5($resize->__toString());
                $hash = str_random(50);
                $path = "images/users/{$hash}.jpg";
                $resize->save(public_path($path));
                $file = "users/{$hash}.jpg";
                // $file = $request->file('file')->store('users');
            }

        }
        if (!$request->hasFile('file') && $user->file) {
            $file = $user->file;
        }

        // get password
        if(!empty($password)){
            $newpassword = Hash::make($request['password']);
        }else{
            $newpassword = $user->password;
        }

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'grade' => 'required',
            'nip' => 'required|numeric|unique:users,nip,'.$user->id,
            'phone' => 'required',
            'file' => 'image|mimes:jpeg,bmp,jpg,png|max:5024'

        ],[
            'name.required'  => '*nama tidak boleh kosong',
            'email.required' => '*email tidak boleh kosong',
            'grade.required' => '*kelas tidak boleh kosong',
            'nip.unique' => '*NIP sudah terpakai',
            'nip.required' => '*NIP tidak boleh kosong',
            'nip.numeric' => '*NIP harus berupa angka',
            'phone.required' => '*nomor telepon tidak boleh kosong',
            'file.image' => 'file harus berupa gambar atau berformat (.jpeg, .bmp, .jpg, .png)',
            'file.mimes' => 'hanya untuk gambar berformat (.jpeg, .bmp, .jpg, .png)'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal memperbarui informasi profil '.$validate->getMessageBag()->first().'')
                ->withInput($request->all())
                ->withErrors($validate);
        }

        $data = User::find($id)->update([
            'name' => $request->name,
            'school_id' => $request->school,
            'email' => $request->email,
            'nip' => $request->nip,
            'grade' => $request->grade,
            'phone' => $request->phone,
            'password' => $newpassword,
            'file' => $file
        ]);
        return back();
    }

    public function addAgenda(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'place' => 'required',
            'description' => 'required'
            // 'start_At' => 'required'
        ],[
            'name.required'  => '*nama tidak boleh kosong',
            'place.required' => '*tempat tidak boleh kosong',
            'description.required' => '*deskripsi tidak boleh kosong'
            // 'start_At.required' => '*tanggal pelaksanaan tidak boleh kosong'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal membuat agenda rapat')
                ->withInput($request->all())
                ->withErrors($validate);
        }

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

        $data->load('user');

        $users = User::whereHas('roles',function($q){
            $q->where('name','Guru');
        })->where('id','!=', auth()->user()->id)->get();

        \Notification::send($users, new UserAgenda($data));


        return redirect()->route('guru.indexagenda');
    }

    public function AddDetail(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'summary' => 'required',
            'user' => 'required'
        ],[
            'summary.required'  => '*notulensi rapat kosong',
            'user.required'  => '*peserta rapat tidak ada'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return response()->json(array(
                'success' => false,
                'errors' => $error
            ), 400);
        }

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file')->store('agendas');
        }
        if (!$request->hasFile('file')) {
            $file;
        }

        $data = DetailAgenda::create([
            'summary' => $request->summary,
            'agenda_id' => $request->agenda_id,
            'status' => 1,
            'file' => $file,
        ]);


        $users = User::find($request->user);
        $data->users()->sync($users);

        return response()->json($data);
    }

    public function indexAgenda(Request $request)
    {
        $notifications = $request->user()->notifications;
        $agendas = Agenda::latest()->paginate(8);
        $users = User::whereHas('roles',function($q){
            $q->where('name','Guru');
        })->get();

        return view('guru.agendalist',[
            'agendas' => $agendas,
            'users' => $users,
            'notifications' => $notifications,
        ]);
    }

    public function showAgenda($id)
    {
        $users = User::whereHas('roles',function($q){
            $q->where('name','Guru');
        })->get();

        $where = array ('id' => $id);
        $agenda = Agenda::where($where)->first();
        $agenda->load('detailAgenda');

        return response()->json([$agenda,$users]);
    }

    public function agendaDownload(Agenda $agenda,$id)
    {

        $where = array ('id' => $id);
        $agenda = Agenda::where($where)->first();

        $download = public_path() .'/images/'. $agenda->detailAgenda->file;

        return response()->download($download);
    }

    public function deleteAgenda(Request $request,$id)
    {
        $agenda = Agenda::find($id);
        $agenda->forceDelete();
        if($agenda->detailAgenda){
        $agenda->detailAgenda->forceDelete();

        $users = User::find($request->user);

        $agenda->detailAgenda->users()->detach($users);

        if($agenda->detailAgenda->file){
            Storage::delete($agenda->detailAgenda->file);
        }
        }
        return response()->json($agenda);
    }

    public function updateAgendaList(Request $request, $id)
    {
        $newdate = Carbon::parse($request->editdate)->format('Y-m-d');
        $time = Carbon::parse($request->time)->format('H:i:s');

        $start_At = date('Y-m-d H:i:s', strtotime("$newdate $time"));

        $data = Agenda::find($id)->update([
            'name' => $request->name,
            'place' => $request->place,
            'description' => $request->description,
            'start_At' => $start_At,

        ]);

        return response()->json($data);
    }

    public function indexResponder()
    {
        $feeds = Feed::latest()->paginate(8);
        return view('guru.responder',[
        'feeds' => $feeds,
        'controller' => $this,
        'responders' => $this->responders,
        'murids' => $this->murids,


        ]);
    }

    public function showFeed($id)
    {
        $where = array ('id' => $id);
        $feed = Feed::where($where)->first();

        return response()->json($feed);
    }

    public function updateFeed(Request $request, $id)
    {
        $date = new DateTime();
        $newDate = $date->format('dmy');
        $feed = Feed::find($id);
        if($feed->status == 0){
        $data1 = Feed::find($id)->update([
            'status' => 1,
            'slug' => str_slug($feed->name." ".$newDate),

        ]);
        }
        else
        {
            $data1 = Feed::find($id)->update([
                'status' => 0,
                'slug' => str_slug($feed->name." ".$newDate),

            ]);
        }
        if($request->status == 1)
        {
        Agreement::create([
            'user_id' => auth()->user()->id,
            'feed_id' => $request->feed_id,
        ]);
        }else{
            $feed->agreement()->delete();
        }

        return response()->json($data1);
    }

    public function indexMurid()
    {
        $questions = Question::where('parent','=', null)->latest()->paginate(8);

        return view('guru.murid',[
            'controller' => $this,
            'responders' => $this->responders,
            'murids' => $this->murids,
            'questions' => $questions,
            ]);
    }
    public function addAnswer(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'message' => 'required',
        ],[
            'message.required' => '*jawaban pesan kosong, silahkan isi terlebih dahulu'
        ]);

        if($validate->fails())
        {
            $error = $validate->getMessageBag()->first();
            return redirect()->back()->with('danger', $error);
        }
        $parent_id = Question::where('parent', $request->question_id)->latest()->select('id')->get()->first();
        if($parent_id !== null)
        {
            Answer::create([
                'user_id' => auth()->user()->id,
                'parent' => $parent_id->id,
                'question_id' => $request->question_id,
                'message' => $request->message,
            ]);
            return redirect()->back()->with('success-guru', 'Berhasil menjawab pesan');
        }
        else
        {
            Answer::create([
                'user_id' => auth()->user()->id,
                'parent' => $request->question_id,
                'question_id' => $request->question_id,
                'message' => $request->message,
            ]);
            return redirect()->back()->with('success-guru', 'Berhasil menjawab pesan');
        }

    }

    public function updatePesan(Request $request, $id)
    {
        $question = Question::find($id);
        if($question->status == 0){
        $data = Question::find($id)->update([
            'status' => 1,
        ]);
        }
        else
        {
            $data = Question::find($id)->update([
                'status' => 0,
            ]);
        }
        return response()->json($data);
        // ->with('success-guru', 'Berhasil menyelesaikan konseling')
    }

    public function showQuestion($id)
    {
        $question = Question::where('id', $id)->get()->first();
        return response()->json($question);
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

    public function tanggalView($tgl)//only date
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y');
        echo $time;

    }



}
