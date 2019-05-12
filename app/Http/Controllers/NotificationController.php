<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(20)->get()->toArray();
    }

    public function read(Request $request)
    {
        $notification = $request->user()->notifications->find($request->notif_id);
        $notification->markAsRead();

        // return redirect()->to($request->redirect);
        return response()->json($notification);
    }
}
