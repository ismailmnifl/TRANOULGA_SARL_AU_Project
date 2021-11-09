<?php

namespace App\Http\Controllers;

use App\Mail\TNLSomutionsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class messageController extends Controller
{
 /* ************************************************************************************************* */   

    function submitMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'subject' => 'required|min:4',
            'message' => 'required|min:4',
        ]);

        DB::table('messages')->insert([
            'fullName' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        $mailDetails = [
            'fullName' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            
        ];
        Mail::to("tnlsolutionsorgannisation@gmail.com")->send(new TNLSomutionsMail($mailDetails));
        return back()->with('message','Votre message a été envoyer avec succès');

    }
    function deleteMessage($id) {
        DB::table('messages')->where('messages_id',$id)->delete();
        return back()->with('deleteMessage','Le message a été suprimmé avec succès');
    }
 /* ************************************************************************************************* */   
 function replay(Request $request) {

    $request->validate([
        'email' => 'required|email:rfc,dns',
        'suject' => 'required|min:3',
        'message' => 'required|min:5',
    ]);

        $replayDetails = [
            'email' => $request->email,
            'subject' => $request->suject,
            'message' => $request->message,
            
        ];
        Mail::to($request->email)->send(new TNLSomutionsMail($replayDetails));
        return back()->with('message','Votre message a été envoyer avec succès');
    }
 /* ************************************************************************************************* */   
    function getSingleMessage(Request $request,$id) {

        DB::table('messages')->where('messages_id',$id)->update([
            'readStatus'=> 1,
        ]);

        $RaplyMessage = DB::table("messages")
        ->where("messages.messages_id", "=", $id)
        ->first();
        $messages = DB::table('messages')
        ->orderBy("messages.messages_id","desc")
        ->get();

        
        $this->messageNotifications($request);
        return view('admin.message',compact('RaplyMessage','messages'));
    }


    function messageNotifications(Request $request) {
        $unreadMessagesCount = DB::table("messages")
        ->where("messages.readstatus", "=", 0)
        ->select(DB::raw('COUNT(messages_id) AS unread'))
        ->get()
        ->first();
        $request->session()->put('unReadMessage',$unreadMessagesCount->unread);
    
       }
}
