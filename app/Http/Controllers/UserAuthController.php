<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;


class UserAuthController extends Controller
{


   function check(Request $request) {

       $request->validate([
           'username'=>'required|min:5',
           'password'=>'required|min:4'
       ]);

            $user = DB::table('users')
                ->where('userName', $request->username)
                ->first();

       if($user) {
           if($request->password === $user->password ) {
                if($user->role_id === 1) {

                    $request->session()->put('LoggedUser',$user->user_id);
                    $request->session()->forget('isAdmin');
                    $request->session()->put('isAdmin',$user->role_id);
                    $this->updateNotification($request);
                    $this->messageNotifications($request);
                    return redirect('admin/profile');

                }elseif($user->role_id === 2) {

                    $request->session()->put('LoggedUser',$user->user_id);
                    $request->session()->forget('isAdmin');
                    $request->session()->put('isAdmin',$user->role_id);

                    $this->updateNotification($request);
                   

                    return redirect('moderator/profile');
                }
            
           }else {
               return back()->with('fail','Invalid password');
           }

       }else {
        return back()->with('fail','No account found for this username');

       }

   }


   function logout(Request $request) {
       if (session()->has('LoggedUser')) {

           session()->pull('LoggedUser');
           session()->pull('isAdmin');
           session()->pull('notify');
           
           $request->session()->forget('LoggedUser');
           $request->session()->forget('isAdmin');
           $request->session()->forget('notify');
           

           return redirect('login');
       }
   }

   function updateNotification(Request $request) {
    $id = session('LoggedUser');
    $notification = DB::table('missions')
    ->Join('users','users.user_id','=','missions.user_id')
    ->where('missions.status','!=','terminé')
    ->Where('users.user_id',$id)
    ->select(DB::raw('COUNT(missions.mission_id) AS notify'))
    ->get()
    ->first();
    $request->session()->put('notify',$notification->notify);
   }

   function messageNotifications(Request $request) {
    $unreadMessagesCount = DB::table("messages")
    ->select("count (messages.messages_id) as 'unreadmessage'")
    ->where("messages.readstatus", "=", 0)
    ->first();
    $request->session()->put('unReadMessage',$unreadMessagesCount->unreadmessage);

   }
   
}
