<?php

namespace App\Http\Controllers\User;


use DateTime;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\Catfeed;
use App\Models\FeedComment;
use App\Models\FeedNotification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use App\Models\Answer;
use Illuminate\Support\Facades\Crypt;
use App\Models\School;

class MuridController extends Controller
{
    public function __construct()
    {
        $date = new DateTime();
        $this->month = $date->format('m') - 1;
        $this->year = $date->format('Y');
    }

    public function createQuestion()
    {
        return view('user.templates.panel.murid.createQuestion');
    }

    public function addQuestion(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required'
        ],[
            'name.required'  => '*Judul tidak boleh kosong',
            'content.required' => '*pesan tidak boleh kosong'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal menambah pesan')
                ->withInput($request->all())
                ->withErrors($validate);
        }


        Question::create([
            'name' => $request->name,
            'content' => $request->content,
            'status' => 0,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('msg', 'Berhasil Menambahkan pesan, akan mendapatkan jawaban dari guru BK secepatnya.');
    }

    public function showQuestion($id)
    {
        $id = Crypt::decrypt($id);
        $question = Question::where('id', $id)->get()->first();

        $data1 = Question::where('parent', $id)->orderBy('id', 'asc')->get();
        $data2 = Answer::where('question_id', $id)->orderBy('id', 'asc')->get();

        return view('user.templates.panel.murid.showQuestion',[
            'data1' => $data1,
            'data2' => $data2,
            'id' => $id,
            'question' => $question,
            'controller' => $this

        ]);
    }

    public function addmoreQuestion(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'content' => 'required'
        ],[
            'content.required' => '*pesan tidak boleh kosong'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal menambah pesan')
                ->withInput($request->all())
                ->withErrors($validate);
        }


        Question::create([
            'name' => $request->name,
            'content' => $request->content,
            'status' => 0,
            'parent' => $request->id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with('msg', 'Berhasil membalas pesan konseling, semoga konseling cepat diselesaikan.');

    }

    public function showUser()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->get()->first();
        $schools = School::get();
        // dd($users);
        return view('user.templates.panel.murid.showBiodata', [
            'user' => $user,
            'schools' => $schools,
            'controller' => $this
        ]);
    }

    public function updateUser(Request $request)
    {

        $id = $request->input('id');
        $password = $request->input('password');
        $school_id = $request->input('school_id');
        $user = User::find($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required'
        ],[
            'name.required'  => '*nama tidak boleh kosong',
            'phone.required' => '*nomor telepon tidak boleh kosong'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal memperbarui profil')
                ->withInput($request->all())
                ->withErrors($validate);
        }

        if(!empty($password)){
            $newpassword = Hash::make($request['password']);
        }else{
            $newpassword = $user->password;
        }

        User::find($id)->update([
            'name' => $request->name,
            'password' => $newpassword,
            'school_id' => $school_id,
            'phone' => $request->phone,

        ]);

        return back()->with('msg', 'Berhasil memperbaharui profil');

    }

    public function listQuestion()
    {
        $questions = Question::latest()->where('parent','=', null)->paginate(6);
        return view('user.templates.panel.murid.listQuestion',[
            'questions' => $questions,
            'controller' => $this
        ]);
    }

    public function deleteQuestion(Question $question)
    {
        $question_id = $question->id;

        $morequestion = Question::where('parent','=',$question_id);
        $morequestion->forceDelete();
        $answer = Answer::where('question_id','=',$question->id);
        $answer->forceDelete();

        $question->forceDelete();

        return back()->with('msg', 'Berhasil Menghapus pesan');
    }

    public function showComment()
    {
        $feedcomments = DB::table('feedcomments')->where('feedcomments.user_id', auth::user()->id)
                                                // ->where('feedcomments.id', '==', 'feedcomments.parent_id')
                                                 ->join('feeds', 'feeds.id', '=', 'feedcomments.feed_id')
                                                 ->join('users', 'feedcomments.user_id', '=', 'users.id')
                                                 ->orderBy('feedcomments.id', 'DESC')->select(['feedcomments.*', 'feeds.name as feedname', 'feeds.slug', 'users.name as username'])->paginate(8);


        return view('user.templates.panel.guest.showComment',[
            'feedcomments' => $feedcomments,
            'controller' => $this
        ]);
    }

    public function deleteComment(FeedComment $feedcomment)
    {
        $feedcomment->delete();
        FeedComment::where('parent_id', $feedcomment->id)->delete();

        return back()->with('msg', 'Berhasil Menghapus Komentar');
    }

    public function showNotification()
    {
        $feednotifications = DB::table('feednotifications')->where('feednotifications.parentuser_id', Auth::user()->id)
                                                           ->where('feednotifications.user_id', '!=', Auth::user()->id)
                                                           ->join('feeds', 'feeds.id', '=', 'feednotifications.feed_id')
                                                           ->join('users', 'users.id', '=', 'feednotifications.user_id')
                                                           ->orderBy('feednotifications.id', 'DESC')->select(['feednotifications.*', 'feeds.name as feedname', 'feeds.slug', 'users.name as username'])->paginate(8);

        return view('user.templates.panel.guest.showNotif',[
            'feednotifications' => $feednotifications,
            'controller' => $this

        ]);
    }

    public function tanggal($tgl)//only date
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y');
        echo '<div class="time-news">'.$time.'</div>';

    }

    public function fullTime($tgl)//using clock
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s");
        echo '<div class="time-news">'.$time.'</div>';
    }

}
