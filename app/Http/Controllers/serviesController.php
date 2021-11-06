<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class serviesController extends Controller
{
    function index() {
            
        $serives =DB::table('servies')
        ->get();

        return view('admin.servies',compact('serives'));
    }

    function ServicePage() {
        return view('admin.addServie');
    }
    function insertServies(Request $request) {

        $request->validate([
            'image'=>'required',
            'title'=>'required|min:6',
            'description'=>'required|min:10',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = "not Available";
        }

        DB::table('servies')->insert([
            'image'=>$renameImage,
            'title'=> $request->title,
            'description'=> $request->description
        ]);
        return back()->with('message','Servies a été ajouter avec succée !');
    }
    function deleteServices($id) {
        DB::table('servies')->where('servie_id',$id)->delete();
        return back()->with('message','Le service a été suprimmé avec succès');
    }

    function updateServicePage($id) {

        $services = DB::table('servies')
        ->where('servies.servie_id',$id)
        ->first();
        return view('admin.updateServices',compact('services'));
    }
    function editService(Request $request) {

        $request->validate([
            'title'=>'required|min:4',
            'description'=>'required|min:4',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $renameImage = time().'.'.$image->getClientOriginalExtension();
            $destination = public_path('/uploads/images');
            $image->move($destination,$renameImage);
        }else {
            $renameImage = $request->avatar;
        }

        DB::table('servies')->where('servie_id',$request->servie_id)->update([
            'image'=>$renameImage,
            'title'=> $request->title,
            'description'=> $request->description
        ]);

        return back()->with('message','le service a été mis à jour avec succès');
    }
}
