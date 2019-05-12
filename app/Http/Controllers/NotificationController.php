<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->latest()->limit(20)->get()->toArray();
    }

    public function allNotifications()
    {
        $allnotifications = auth()->user()->Notifications()->latest()->paginate(15);
        return view('guru.notification',[
            'allnotifications' => $allnotifications,
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
