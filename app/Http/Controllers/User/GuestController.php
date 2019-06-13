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
use Illuminate\Support\Facades\Validator;

// use Illuminate\Support\Facades\Auth;





class GuestController extends Controller
{
    public function __construct()
    {
        $date = new DateTime();
        $this->month = $date->format('m') - 1;
        $this->year = $date->format('Y');
    }

    public function showUser()
    {
        $id = Auth::user()->id;
        $user = User::where('id',$id)->get()->first();
        // dd($users);
        return view('user.templates.panel.guest.showBiodata', [
            'user' => $user,
            'controller' => $this
        ]);
    }

    public function updateUser(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');
        $user = User::find($id);

        //get file_1
        // $file = null;

        // if ($request->hasFile('file')) {
        //     if($user->file){
        //         Storage::delete($user->file);
        //     }
        //     $file = $request->file('file')->store('users');
        // }
        // if (!$request->hasFile('file') && $user->file) {
        //     $file = $user->file;
        // }

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'agency' => 'required',
            'phone' => 'required'
        ],[
            'name.required'  => '*nama tidak boleh kosong',
            'agency.required' => '*instansi tidak boleh kosong',
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

        $data = User::find($id)->update([
            'name' => $request->name,
            'password' => $newpassword,
            'agency' => $request->agency,
            'phone' => $request->phone,

        ]);
        return back()->with('msg', 'Berhasil memperbaharui profil');

    }

    public function showFeed()
    {
        $feeds = Feed::orderBy('id','DESC')->where('user_id', Auth::user()->id)->paginate(6);
        // dd($feeds);
        return view('user.templates.panel.guest.showFeed',[
            'feeds' => $feeds,
            'controller' => $this
        ]);
    }

    public function deleteFeed(Feed $feed)
    {
        $feed->forceDelete();
        $catfeeds = Catfeed::find($feed->catfeed);
        $feed->catfeeds()->detach($catfeeds);

        $feed->feedcomments()->delete();
        return back()->with('msg', 'Berhasil Menghapus Artikel');
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
