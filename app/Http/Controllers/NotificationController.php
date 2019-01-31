<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
class NotificationController extends Controller
{
 public function markRead(Request $request){
              $id = $request['id'];
              $user = Auth::user();
           
              $user->unreadNotifications->find($id)->markAsRead();
              $c = $user->unreadNotifications->count();   
              return response()->json(['count'=>$c]);
    } 
      public function allNotifications(){
                $user = Auth::user();
                $notifications = $user->notifications;
                $data = [
                    'user'=>$user,
                    'notifications'=>$notifications
                ];
                 $user->unreadNotifications->markAsRead();
                return view('User.allNotifications')->with($data);
    }
}
