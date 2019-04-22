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
        $users = User::where('id',$id)->get();
        // dd($users);
        return view('user.templates.panel.guest.showBiodata', [
            'users' => $users,
            'controller' => $this
        ]);
    }
    public function showFeed()
    {
        $feeds = Feed::orderBy('id','DESC')->where('user_id', Auth::user()->id)->get();
        // dd($feeds);
        return view('user.templates.panel.guest.showFeed',[
            'feeds' => $feeds,
            'controller' => $this
        ]);
    }

    public function deleteFeed(Feed $feed)
    {
        $feed->delete();
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
                                                 ->orderBy('feedcomments.id', 'DESC')->get(['feedcomments.*', 'feeds.name as feedname', 'feeds.slug', 'users.name as username']);

        return view('user.templates.panel.guest.showComment',[
            'feedcomments' => $feedcomments,
            'controller' => $this
        ]);
    }

    public function deleteComment(FeedComment $feedcomment)
    {
        $feedcomment->delete();
        FeedComment::where('parent_id', $feedcomment->id)->delete();

        return back()->with('msg', 'Berhasil Menghapus Artikel');
    }

    public function showNotification()
    {
        $feednotifications = DB::table('feednotifications')->where('feednotifications.parentuser_id', Auth::user()->id)
                                                           ->where('feednotifications.user_id', '!=', Auth::user()->id)
                                                           ->join('feeds', 'feeds.id', '=', 'feednotifications.feed_id')
                                                           ->join('users', 'users.id', '=', 'feednotifications.user_id')
                                                           ->orderBy('feednotifications.id', 'DESC')->get(['feednotifications.*', 'feeds.name as feedname', 'feeds.slug', 'users.name as username']);

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
