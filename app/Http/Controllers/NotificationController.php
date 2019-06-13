<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feed;
use App\Models\Question;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->responders = Feed::where('status','=',0)->latest()->limit(4)->get();
        $this->murids = Question::where([
            ['status','=',0],
            ['parent','=',null]
            ])->latest()->limit(4)->get();

    }
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->latest()->limit(20)->get()->toArray();
    }

    public function allNotifications()
    {
        $allnotifications = auth()->user()->Notifications()->latest()->paginate(15);

        return view('guru.notification',[
            'allnotifications' => $allnotifications,
            'responders' => $this->responders,
            'murids' => $this->murids,

        ]);
    }

    public function markAsRead(Request $request)
    {
        $notification = $request->user()->notifications->find($request->notif_id);
        $notification->markAsRead();

        // return redirect()->to($request->redirect);
        return response()->json($notification);
    }

    public function allMarkAsRead(Request $request)
    {
        $notification = $request->user()->unreadNotifications->markAsRead();
        return response()->json($notification);
    }
}
