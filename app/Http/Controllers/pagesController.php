<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class pagesController extends Controller
{
    public function index() {
        return view('index');
    }
    function login() {
        return view('auth.login');
    }
    function AdminProfile() {

        if(session()->has('LoggedUser')) {
            $user = User::where('user_id', '=', session('LoggedUser'))->first();
            $data = [
                'loggedUserInfo' => $user
            ];
        }
        return view('admin.profile',$data);
    }
    function ModeratorProfile() {

        if(session()->has('LoggedUser')) {
            $user = User::where('user_id', '=', session('LoggedUser'))->first();
            $data = [
                'loggedUserInfo' => $user
            ];
        }
        return view('moderator.profile',$data);
    }
    function UpdateAdminPage() {
        if(session()->has('LoggedUser')) {
            $user = User::where('user_id', '=', session('LoggedUser'))->first();
            $data = [
                'loggedUserInfo' => $user
            ];
        }else {
            dd('not logged in');
        }
        return view('admin.UpdateInfos',$data);
    }

    function missionPage() {

        $missions = DB::table('missions')
        ->Join('users','users.user_id','=','missions.user_id')
        ->get();
        return view('admin.missions',compact('missions'));
    }

    function updateMissionPage(Request $request) {

        $id = $request->session()->get('LoggedUser');

        $users =DB::table('users')
        ->Join('roles','roles.role_id','=','users.role_id')
        ->where('users.user_id','!=',$id)
        ->get();
        return view('admin.updateMission',compact('users'));
    }

    function moderatormission() {

        $missions = DB::table('missions')
        ->Join('users','users.user_id','=','missions.user_id')
        ->where('missions.user_id',session('LoggedUser'))
        ->get();
        return view('moderator.moderatorMission',compact('missions'));
    }
    function notFound() {
        return view('404');
    }
    function messagesPages() {
        
        $messages = DB::table('messages')
        ->orderBy("messages.messages_id","desc")
        ->get();
        return view('admin.message',compact('messages'));
    }
    function contactView() {
        return view('contact');
    }
}
