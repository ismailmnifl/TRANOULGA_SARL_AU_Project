<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class missionController extends Controller
{
    function addMission(Request $request) {

        $id = $request->session()->get('LoggedUser');

        $users =DB::table('users')
        ->Join('roles','roles.role_id','=','users.role_id')
        ->where('users.user_id','!=',$id)
        ->get();

        return view('admin.addMission',compact('users'));

    }

    function insertMission(Request $request) {
        $request->validate([
            'type'=>'required|min:4',
            'dateOfDelivery'=>'required',
            'description'=>'required|min:4', 
        ]);

        if($request->hasFile('data')) {
            $file = $request->file('data');
            $renameFile = time().'.'.$file->getClientOriginalExtension();
            $destination = public_path('/uploads/files');
            $file->move($destination,$renameFile);
        }else {
            $renameFile = "not Available";
        }

        DB::table('missions')->insert([
            'status' =>$request->status,
            'type'=>$request->type,
            'priority'=> $request->priority,
            'user_id'=> $request->user,
            'description'=> $request->description,
            'dateOfDelivery'=> $request->dateOfDelivery,
            'data'=> $renameFile,
        ]);
        return back()->with('message', 'the mission has been added successfuly');
    }
    function deleteMission($id) {
        DB::table('missions')->where('mission_id',$id)->delete();

        return back()->with('message','the mission has been deleted successfuly');
    }

    function updateMissionPage(Request $request,$missionID) {

        $id = $request->session()->get('LoggedUser');

        
        $mission = DB::table('missions')
        ->Join('users','missions.user_id','=','users.user_id')
        ->where('missions.mission_id',$missionID)
        ->get()->first();


        $users =DB::table('users')
        ->Join('roles','roles.role_id','=','users.role_id')
        ->where('users.user_id','!=',$id)
        ->get();

       
        return view('admin.updateMission',compact('users','mission'));
    }

    function editMission(Request $request) {

        $request->validate([
            'type'=>'required|min:4',
            'dateOfDelivery'=>'required',
            'description'=>'required|min:4', 
        ]);

        if($request->hasFile('data')) {
            $file = $request->file('data');
            $renameFile = time().'.'.$file->getClientOriginalExtension();
            $destination = public_path('/uploads/files');
            $file->move($destination,$renameFile);
        }else {
            $renameFile = $request->oldFile;
        }
        

        DB::table('missions')->where('mission_id',$request->mission_id)->update([
            'type'=>$request->type,
            'priority'=> $request->priority,
            'user_id'=> $request->user,
            'description'=> $request->description,
            'dateOfDelivery'=> $request->dateOfDelivery,
            'data'=> $renameFile,
        ]);


        return back()->with('message','the mission has been updated successfuly');

    }

    function missionDone(Request $request,$missionID) {
        DB::table('missions')->where('mission_id',$missionID)->update([
            'status'=>'Terminé'
        ]);

        $this->notifyMissions($request);
        return back()->with('message','felicitation une mission est terminée !');
    }

    function AdminMissionDone(Request $request,$missionID) {
        DB::table('missions')->where('mission_id',$missionID)->update([
            'status'=>'Terminé'
        ]);

        $this->notifyMissions($request);
        return back()->with('message','felicitation une mission est terminée !');
    }

    function notifyMissions(Request $request) {
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

    function ownMissions() {

        $missions = DB::table('missions')
        ->Join('users','users.user_id','=','missions.user_id')
        ->where('missions.user_id',session('LoggedUser'))
        ->get();
        return view('admin.AdminMIssions',compact('missions'));
    }
}
