<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class userController extends Controller
{
    function updateInfo(Request $request) {

        $request->validate([
            'username'=>'required|min:4',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'phone'=>'required|min:6'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = $request->avatar;
        }
        

        DB::table('users')->where('user_id',session('LoggedUser'))->update([
            'image'=>$renameImage,
            'userName'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->password,
            'phone'=> $request->phone
        ]);

        return back()->with('message','Your information has been updated successfuly');
    }

    function getAlluser(Request $request) {

        $id = $request->session()->get('LoggedUser');
            
        $users =DB::table('users')
        ->Join('roles','roles.role_id','=','users.role_id')
        ->where('users.user_id','!=',$id)
        ->get();
        return view('admin.team',compact('users'));
    }

    function addUserPage() {
        $roles = DB::table('roles')
        ->get();
        return view('admin.addUser',compact('roles'));
    }

    function insertNewUser(Request $request) {

        $request->validate([
            'username'=>'required|min:4|unique:users,username',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:4',
            'phone'=>'required|min:6'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = "not Available";
        }

        DB::table('users')->insert([
            'image'=>$renameImage,
            'userName'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->password,
            'phone'=> $request->phone,
            'role_id'=> $request->role,
        ]);
        return back()->with('message', 'User has been added successfuly');
    }
    function deleteUser($id) {
        DB::table('users')->where('user_id',$id)->delete();

        return back()->with('message','user has been deleted successfuly');
    }

    function updateUserPage($id) {
        $roles = DB::table('roles')
        ->get();
/*         $user = DB::table('users')->where('user_id',$id)->first();
 */        $user =DB::table('users')
            ->Join('roles','roles.role_id','=','users.role_id')
            ->where('user_id',$id)
            ->first();
        
        return view('admin.updateUserInfos',compact('roles','user'));
    }

    function editUserInfos(Request $request) {

        $request->validate([
            'username'=>'required|min:4',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'phone'=>'required|min:6'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = $request->avatar;
        }

        DB::table('users')->where('user_id',$request->user_id)->update([
            'image'=> $renameImage,
            'userName'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->password,
            'phone'=> $request->phone
        ]);

        return back()->with('message','user has been updated successfuly');
 
    }

    //moderator backend

    function updateModeratorPage() {
        if(session()->has('LoggedUser')) {
            $user = User::where('user_id', '=', session('LoggedUser'))->first();
            $data = [
                'loggedUserInfo' => $user
            ];
        }else {
            dd('not logged in');
        }
        return view('moderator.updateModerator',$data);
    }

    function updateModeratorInfos(Request $request) {
        $request->validate([
            'username'=>'required|min:4',
            'email'=>'required|email',
            'password'=>'required|min:4',
            'phone'=>'required|min:6'
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = $request->avatar;
        }
        

        DB::table('users')->where('user_id',session('LoggedUser'))->update([
            'image'=>$renameImage,
            'userName'=> $request->username,
            'email'=> $request->email,
            'password'=> $request->password,
            'phone'=> $request->phone
        ]);

        return back()->with('message','Your information has been updated successfuly');
    


    }

}
