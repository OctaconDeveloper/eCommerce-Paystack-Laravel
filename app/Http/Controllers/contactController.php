<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\history_log;
use App\contact;

class contactController extends Controller
{
  public function submitContact(Request $request){
    $this->validate($request,[
      'yourName' => 'required',
      'yourEmail' => 'required',
      'yourSubject' => 'required',
      'yourMessage' => 'required'
    ]);

    $cat=rand(50,5000)*time();
    $categoryID="NUC".sprintf("%0.6s",str_shuffle($cat));
    $query = new contact;
    $query->msgID = $categoryID;
    $query->name = $request->input('yourName');
    $query->email = $request->input('yourEmail');
    $query->subject = $request->input('yourSubject');
    $query->message = $request->input('yourMessage');
    $query->stat = '0';
    $query->save();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = $request->input('yourEmail');
    $query2->action = "Sent Contact Message ";
    $query2->date = time();
    $query2->save();
    return redirect('/contact')->with('status','Message Sent');
  }
}
