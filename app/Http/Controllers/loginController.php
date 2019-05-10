<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usertable;
use App\login_table;
use App\history_log;
use Session;

class loginController extends Controller
{
    public function newRegister(Request $request){
      $this->validate($request, [
        'registerEmail' => 'required|email',
        'registerPassword' => 'required'
      ]);
      $ct=rand(50,5000)*time();
      $profileID="NP".sprintf("%0.6s",str_shuffle($ct));
      if(usertable::where('useremail',$request->input('registerEmail'))->count() > 0){
          return redirect('/account')->with('errorLog', $request->input('registerEmail').' already associated with another account.');
      }else{
        if(strlen($request->input('registerPassword')) < 7){
          return redirect('/account')->with('errorLog', 'Password must be greater than seven characters.');
        }else{
          $query= new usertable;
          $query->profileID = $profileID;
          $query->useremail = $request->input('registerEmail');
          $query->lastname = " ";
          $query->firstname=" ";
          $query->phone=" ";
          $query->date = time();
          $query->save();

          $query3= new login_table;
          $query3->username = $request->input('registerEmail');
          $query3->password = md5($request->input('registerPassword'));
          $query3->location = "my-account";
          $query3->role="2";
          $query3->loginStat="1";
          $query3->save();

          $log=rand(50,5000)*time();
          $logID="LID".sprintf("%0.4s",str_shuffle($log));
          $query2 = new history_log;
          $query2->logID = $logID;
          $query2->userid = $request->input('registerEmail');
          $query2->action = "Created New Account";
          $query2->date = time();
          $query2->save();
          return redirect('/account')->with('status', 'Account Created Successful');
        }
      }
    }

    public function login(Request $request){
      $this->validate($request, [
        'loginEmail' => 'required|email',
        'loginPassword' => 'required'
      ]);
      if(login_table::where('username',$request->input('loginEmail'))->where('password',md5($request->input('loginPassword')))->count() > 0){
        $login=login_table::where('username',$request->input('loginEmail'))
        ->where('password',md5($request->input('loginPassword')))
        ->first();
        $location=$login->location;
        $role=$login->role;
        $username=$login->username;
        $loginStat=$login->loginstat;
        if($loginStat!=1){
          return redirect('/account')->with('warningLog', 'Account Suspended. Contact Admin');
        }else{

          $log=rand(50,5000)*time();
          $logID="LID".sprintf("%0.4s",str_shuffle($log));
          $query2 = new history_log;
          $query2->logID = $logID;
          $query2->userid = $username;
          $query2->action = "Login into Acoount";
          $query2->date = time();
          $query2->save();

          Session::put('username',$username);
          Session::put('location',$location);
          Session::put('role',$role);
          return redirect($location);
        }
      }else{
        return redirect('/account')->with('errorLog', 'Invalid Login Details.');
      }
    }

    public function recovery(Request $request){
      $this->validate($request, [
        'recoverEmail' => 'required|email',
        'recoverPhone' => 'required|numeric'
      ]);
      if(usertable::where('useremail',$request->input('recoverEmail'))->count() < 1){
        return redirect('/lost-password')->with('warningLog', $request->input('recoverEmail').' is not associated with any account.');
    }elseif(usertable::where('phone',$request->input('recoverPhone'))->count() < 1){
      return redirect('/lost-password')->with('warningLog', $request->input('recoverPhone').' is not associated with any account.');
    }else{
      $data=$request->input('recoverEmail');
      return redirect('lost-password')->with('data',$data);
    }
  }

  public function newReset(Request $request){
    $this->validate($request, [
      'newPassword' => 'required',
      'confirmPassword' => 'required'
    ]);
    if($request->input('newPassword')!==$request->input('confirmPassword')){
      return redirect('/lost-password')->with('warningLog', 'Please make sure that both passwords are the same.');
    }elseif(strlen($request->input('newPassword')) < 7){
      return redirect('/lost-password')->with('warningLog', 'Passwords must exceed seven (7) digits.');
    }else{
      login_table::where('username','=',session()->get('userMail'))
      ->update([
        'password'=>md5($request->input('confirmPassword'))
      ]);

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('userMail');
      $query2->action = "Account Recovery";
      $query2->date = time();
      $query2->save();
      Session::forget('userMail');

      return redirect('/account')->with('status', 'Account Recovery Successful');
    }
  }

}
