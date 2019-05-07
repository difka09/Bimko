<?php

namespace App\Http\Controllers\User;

// use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feed;
use App\Models\School;
use App\Models\User;
use App\Models\Catfeed;
use App\Models\FeedComment;
use App\Models\FeedNotification;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class FeedController extends Controller
{
    public function __construct()
    {
        $date = new DateTime();
        $this->month = $date->format('m') - 1;
        $this->year = $date->format('Y');

        $this->maps = School::orderBy('name', 'asc')->get();
        $this->populars = Feed::orderBy('readby', 'desc')->limit(4)->get();
        $this->latests = Feed::orderBy('created_at', 'desc')->limit(4)->get();


    }

    public function indexFeed()
    {
        $categories = Catfeed::get();
        $feeds = Feed::latest()->paginate(5);

        // dd($latests);

        return view('user.feed.index', [
            'feeds' => $feeds,
            'categories' => $categories,
            'populars' => $this->populars,
            'latests' => $this->latests,
            'maps' => $this->maps,
            'controller' => $this
        ]);
    }
    public function search(Request $request)
    {
        $categories = Catfeed::get();
        $input = $request->cari;

        $feeds = new Feed;
        if(request()->has('cari')){
            $feeds = $feeds->where([
               ['name','LIKE',"%{$request->cari}%"],
           ]);
       }

       $feeds = $feeds->paginate(4)->appends([
        'cari' =>  request('cari'),
    ]);

    return view('user.feed.search',[
        'feeds' => $feeds,
        'input' => $input,
        'populars' => $this->populars,
        'latests' => $this->latests,
        'feeds' => $feeds,
        'maps' => $this->maps,
        'categories' => $categories,
        'controller' => $this
        ]);
    }

    // public function index()
    // {
    //     $Allfeeds = Feed::get();
    //     $feeds = Feed::orderBy('name', 'asc')->paginate(3);

    //     return view('user.feed.index', [
    //         'feeds' => $feeds,
    //         'Allfeeds' => $Allfeeds,
    //         'controller' => $this
    //     ]);
    // }

    public function category($id)
    {
        $category_name = Catfeed::where('slug',$id)->select('name')->get();

        $feeds = Feed::whereHas('catfeeds', function($q) use ($id){
            $q->where('slug', $id);
        })->latest()->paginate(5);


        $categories = Catfeed::get();

        return view('user.feed.category', [
            'category_name' => $category_name,
            'categories' => $categories,
            'populars' => $this->populars,
            'latests' => $this->latests,
            'feeds' => $feeds,
            'maps' => $this->maps,
            'controller' => $this
        ]);
    }

    public function create()
    {
        $catfeeds = Catfeed::get();
        return view('user.templates.panel.guest.create', [
            'catfeeds' => $catfeeds
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'catfeed.*' => 'required'
        ]);

        $file = $request->file('file')->store('feeds');
        // $date = new DateTime($tgl);
        // $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        // $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y');
        $date = new DateTime();
        $newDate = $date->format('dmy');

        $feed = Feed::create([
            'name' => $request->name,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'file' => $file,
            'slug' => str_slug($request->name." ".$newDate),
            'readby' => $request->readby,
        ]);
        // dd($date);

        $catfeeds = Catfeed::find($request->catfeed);
        $feed->catfeeds()->attach($catfeeds);
        return redirect()->route('guest.showfeed')->with('msg', 'Berhasil Menambahkan Artikel, Akan tampil setelah disetujui admin (1x24jam)');
    }


    public function show(Feed $feed)
    {
        $categories = Catfeed::get();

        $feed->readby = $feed->readby + 1;
        $feed->save();


    $relates = $feed->catfeeds;

    foreach($relates as $relate){
        $relatednews = Feed::whereHas('catfeeds', function($q) use ($relate){
            $q->where([
                ['slug', $relate->slug]
                ]);
        })->where('slug','!=',$feed->slug)->latest()->limit(2)->get();
    }

        $feedcomments = DB::table('feedcomments')
                                                ->where('feedcomments.feed_id', $feed->id)
                                                ->where('parent_id','==', '0')
                                                ->join('users', 'users.id', '=', 'feedcomments.user_id')
                                                ->orderBy('feedcomments.id', 'DESC')->get(['feedcomments.*', 'users.name', 'users.email', 'users.phone', 'users.agency', 'users.file as userphoto']);
                                                // dd($feedcomments);
        $feedreplies = DB::table('feedcomments')
                                                ->where('feedcomments.feed_id', $feed->id)
                                                ->where('parent_id','!=', '0')
                                                ->join('users', 'users.id', '=', 'feedcomments.user_id')
                                                ->orderBy('feedcomments.id', 'DESC')->get(['feedcomments.*', 'users.name', 'users.email', 'users.phone', 'users.agency', 'users.file as userphoto']);


         return view('user.feed.show',[
            'feed' => $feed,
            'relatednews' => $relatednews,
            'categories' => $categories,
            'feedcomments' => $feedcomments,
            'feedreplies' => $feedreplies,
            'populars' => $this->populars,
            'latests' => $this->latests,
            'maps' => $this->maps,
            'controller' => $this

        ]);
    }

    public function addComment(Request $request)
    {
        $feedcomment = new FeedComment;
        $feedcomment->user_id = Auth::user()->id;
        $feedcomment->feed_id = $request->feed_id;
        $feedcomment->message = $request->message;
        $feedcomment->save();

        $feednotification = new FeedNotification;
        $feednotification->user_id = Auth::user()->id;
        $feednotification->feed_id = $request->feed_id;
        $feednotification->parent_id = $request->parent_id;
        $feednotification->type     = 1;
        $feednotification->parentuser_id = $request->parentuser_id;
        $feednotification->save();

        return back();

    }

    public function reply(Request $request)
    {
        $feedcomment = new FeedComment;
        $feedcomment->user_id = Auth::user()->id;
        $feedcomment->feed_id = $request->feed_id;
        $feedcomment->parent_id = $request->parent_id;
        $feedcomment->message = $request->message;
        $feedcomment->save();

        $feednotification = new FeedNotification;
        $feednotification->user_id = Auth::user()->id;
        $feednotification->feed_id = $request->feed_id;
        $feednotification->parent_id = $request->parent_id;
        $feednotification->parentuser_id = $request->parentuser_id;
        $feednotification->save();

        return back();

    }
    public function showCategory(Feed $feed)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

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

    public function fullTimeShow($tgl)//using clock
    {
        $date = new DateTime($tgl);
        $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $time = $date->format('d')." ".$month[$date->format('m') - 1]." ".$date->format('Y')." ".$date->format("H:i:s");
        echo $time;
    }


}
