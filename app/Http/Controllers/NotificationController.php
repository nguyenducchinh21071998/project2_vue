<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\User;
use App\UserNotification;
use Mail;
use App\Mail\MailNotify;
use Auth;
class NotificationController extends Controller
{
    public function index(){
        $notifications = Notification::orderBy('id', 'desc')->get();
        return $notifications;
    }
    public function store(Request $request) {
        $data = $request->all();
        $createNoti = Notification::create([
            'title' => $data['title'],
            'content' => $data['content']
        ]);
        $ar = [];
        $ar['title'] = $createNoti->title;
        $ar['content'] = $createNoti->content;
        $users = User::where('isLogin', 1)->where('status', 0)->get();
        foreach ($users as $key => $user) {
            $createUserNotification = UserNotification::create([
                'user_id' => $user->id,
                'notifical_id' => $createNoti->id,
                'status' => 0
            ]);
            $ar['id_user_notification'] = $createUserNotification->id;
            $ar['notification_id'] = $createNoti->id;
            Mail::to($user->email)->send(new MailNotify($ar));
        }
        return response()->json([
            'errors' => false,
            'data'   => $createNoti,
        ]);
    }
    public function detail($id){
        $detail = Notification::where('id', $id)->first();
        $user = UserNotification::where('notifical_id', $id)->first();
        $user->update([
            'status' => 1,
        ]);
        return response()->json([
            'data' => $detail,
            'errors' => false
        ]);
    }
}
