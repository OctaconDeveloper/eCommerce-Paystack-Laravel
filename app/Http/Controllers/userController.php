<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\order;
use App\payment;
use App\history_log;
use App\address;
use App\billingaddress;
use App\usertable;
use App\login_table;
use App\faq;
use App\shopaddress;
use App\slider;
use App\product_review;
use App\negotiation;
use Session;

class userController extends Controller
{


  public function searchuserorder(Request $request){
    $this->validate($request, [
      'useremail' => 'required|email',
    ]);

    if(order::where('useremail','=',$request->input('useremail'))->count() > 0){
      $data=order::where('useremail','=',$request->input('useremail'))->orderby('id', 'DESC')->get();
      return view('control.userorders')->with('data',$data);
    }else{
      return redirect('/userorders')->with('errorLog','No Order Record Found For <b>'.$request->input('useremail').'');
    }
  }


  public function searchuserpayment(Request $request){
    $this->validate($request, [
      'useremail' => 'required|email',
    ]);

    if(payment::where('useremail','=',$request->input('useremail'))->count() > 0){
      $datat=payment::where('useremail','=',$request->input('useremail'))->orderby('id', 'DESC')->get();
      return view('control.userpayments')->with('datat',$datat);
    }else{
      return redirect('/userpayments')->with('errorLog','No Payment Record Found For <b>'.$request->input('useremail').'');
    }
  }



  public function useractivityhistory(Request $request){
    $this->validate($request, [
      'useremail' => 'required|email',
    ]);

    if(history_log::where('userid','=',$request->input('useremail'))->count() > 0){
      $datat=history_log::where('userid','=',$request->input('useremail'))->orderby('id', 'DESC')->get();
      return view('control.userhistory')->with('datat',$datat);
    }else{
      return redirect('/userhistory')->with('errorLog','No Activity Log Found For <b>'.$request->input('useremail').'');
    }
  }




  public function vieworder(Request $request){
    $orderID=$request->id;
    $data=order::where('orderID',$orderID)->get()->first();
    return view('control.viewsingleorder')->with('data',$data);
  }



  public function pendingorders(){
    $data=order::where('orderStatus','<',2)->orderby('id', 'DESC')->get();
      return view('control.pendorders')->with('data',$data);
      return $data;
  }



  public function completeorders(){
    $data=order::where('orderStatus','=',2)->orderby('id', 'DESC')->get();
      return view('control.completeorders')->with('data',$data);
      //return $data;
  }



  public function getorderid(Request $request){
    $this->validate($request, [
      'orderid' => 'required',
    ]);

    if(order::where('orderID','=',$request->input('orderid'))->count() > 0){
      $datat=order::where('orderID','=',$request->input('orderid'))->get()->first();
      return view('control.searchorder')->with('datat',$datat);
    }else{
      return redirect('/searchorder')->with('errorLog','No Order Record Found For <b>'.$request->input('orderid').'');
    }
  }



  public function tracker(Request $request){
    $this->validate($request, [
      'orderEmail' => 'required|email',
      'orderId' => 'required'
    ]);
    if(order::where('orderID','=',$request->input('orderId'))->where('useremail','=',$request->input('orderEmail'))->count() > 0){

      $data=order::where('orderID','=',$request->input('orderId'))->where('useremail','=',$request->input('orderEmail'))->get()->first();

      return view('tracker')->with('data',$data);

    }else{
      return redirect('/track-your-order')->with('errorLog','No Record Found <br/>
      OrderID: <b>'.$request->input('orderId').'</b> <br/>
      Billing Email: <b>'.$request->input('orderEmail').'</b>');
    }

  }


  public function updateShipping(Request $request){
    $this->validate($request, [
      'lastname' => 'required',
      'firstname' => 'required',
      'country' => 'required',
      'firstAddress' => 'required',
      'secondAddress' => 'required',
      'city' => 'required',
      'state' => 'required',
      'postalCode' => 'required',
    ]);

    if(address::where('useremail','=',session()->get('username'))->count() > 0){

      address::where('useremail','=',session()->get('username'))
      ->update([
        'lastname'=>$request->input('lastname'),
        'firstname'=>$request->input('firstname'),
        'country'=>$request->input('country'),
        'street'=>$request->input('firstAddress')."<br/>".$request->input('secondAddress'),
        'city'=>$request->input('city'),
        'state'=>$request->input('state'),
        'company'=>$request->input('company'),
        'postal'=>$request->input('postalCode')
      ]);

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Updated Details For Shipping Address ";
      $query2->date = time();
      $query2->save();
      return redirect('/edit-address')->with('status', 'Shipping Address Updated!');

    }else{

      $query = new address;
      $query->useremail = session()->get('username');
      $query->lastname = $request->input('lastname');
      $query->firstname = $request->input('firstname');
      $query->country = $request->input('country');
      $query->street = $request->input('firstAddress')."<br/>".$request->input('secondAddress');
      $query->city = $request->input('city');
      $query->state = $request->input('state');
      $query->company = $request->input('company');
      $query->postal = $request->input('postalCode');
      $query->save();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added Details For Shipping Address ";
      $query2->date = time();
      $query2->save();
      return redirect('/edit-address')->with('status', 'Shipping Address Added!');
    }
  }


  public function updateBilling(Request $request){
    $this->validate($request, [
      'lastname' => 'required',
      'firstname' => 'required',
      'country' => 'required',
      'firstAddress' => 'required',
      'secondAddress' => 'required',
      'city' => 'required',
      'state' => 'required',
      'postalCode' => 'required',
    ]);

    if(billingaddress::where('useremail','=',session()->get('username'))->count() > 0){

      billingaddress::where('useremail','=',session()->get('username'))
      ->update([
        'lastname'=>$request->input('lastname'),
        'firstname'=>$request->input('firstname'),
        'country'=>$request->input('country'),
        'street'=>$request->input('firstAddress')."<br/>".$request->input('secondAddress'),
        'city'=>$request->input('city'),
        'state'=>$request->input('state'),
        'company'=>$request->input('company'),
        'postal'=>$request->input('postalCode')
      ]);

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Updated Details For Billing Address ";
      $query2->date = time();
      $query2->save();
      return redirect('/edit-address')->with('status', 'Billing Address Updated!');

    }else{

      $query = new billingaddress;
      $query->useremail = session()->get('username');
      $query->lastname = $request->input('lastname');
      $query->firstname = $request->input('firstname');
      $query->country = $request->input('country');
      $query->street = $request->input('firstAddress')."<br/>".$request->input('secondAddress');
      $query->city = $request->input('city');
      $query->state = $request->input('state');
      $query->company = $request->input('company');
      $query->postal = $request->input('postalCode');
      $query->save();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added Details For Billing Address ";
      $query2->date = time();
      $query2->save();
      return redirect('/edit-address')->with('status', 'Billing Address Added!');
    }
  }



    public function saveProfile(Request $request){
      $this->validate($request, [
        'lastName' => 'required',
        'firstName' => 'required',
        'emailAddress' => 'required|email',
        'phoneNumber' => 'required|numeric'
      ]);

        usertable::where('useremail','=',session()->get('username'))
        ->update([
          'lastname'=>$request->input('lastName'),
          'firstname'=>$request->input('firstName'),
          'phone'=>$request->input('phoneNumber')
        ]);

        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Updated Account Details";
        $query2->date = time();
        $query2->save();
        return redirect('/edit-account')->with('status', 'Account Details Updated!');
    }


    public function savePassword(Request $request){
      $this->validate($request, [
        'currentPassword' => 'required',
        'newPassword' => 'required',
        'confirmPassword' => 'required'
      ]);
      if(login_table::where('username','=',session()->get('username'))
      ->where('password','=',md5($request->input('currentPassword')))
      ->count() > 0 ){
        if(strlen($request->input('newPassword'))<7){
          return redirect('/edit-account')->with('warningLog', 'New Password must be greater than 7 (seven) characters  ');
        }else
        if($request->input('newPassword')!=$request->input('confirmPassword')){
          return redirect('/edit-account')->with('warningLog', 'New Password and Confirm Password Not Same  ');
        }else{
          login_table::where('username','=',session()->get('username'))
          ->update([
            'password'=>md5($request->input('confirmPassword'))
          ]);
          $log=rand(50,5000)*time();
          $logID="LID".sprintf("%0.4s",str_shuffle($log));
          $query2 = new history_log;
          $query2->logID = $logID;
          $query2->userid = session()->get('username');
          $query2->action = "Updated Password Details";
          $query2->date = time();
          $query2->save();

            return redirect('/edit-account')->with('status', 'Password Updated! ');
        }

      }else{
          return redirect('/edit-account')->with('errorLog', 'Incorrect Password ');
      }
    }

    public function logout(){
      Session::flush();
      return redirect('/account');
    }

    public function delfaq(Request $request){
      $faqID=$request->id;
      faq::where('faqID',$faqID)->delete();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Deleted FAQ from Database";
      $query2->date = time();
      $query2->save();

      return redirect('/faq')->with('status', 'FAQ Removed from Database');
    }

    public function addfaq(Request $request){
      $this->validate($request, [
        'faqQuestion' => 'required',
        'faqAnswer' => 'required'
      ]);
      if(faq::where('question',$request->input('faqQuestion'))->count() > 0 ){
          return redirect('/addfaq')->with('warningLog', 'Question already in Database');
      }else{
        $log=rand(50,5000)*time();
        $faqID="FAQ".sprintf("%0.5s",str_shuffle($log));
        $query = new faq;
        $query->faqID = $faqID;
        $query->question = $request->input('faqQuestion');
        $query->answer = $request->input('faqAnswer');
        $query->save();

        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Added New FAQ to Database";
        $query2->date = time();
        $query2->save();

      return redirect('/addfaq')->with('status', 'New FAQ Added to Database');
    }
  }

  public function deloffice(Request $request){
    $id=$request->id;
    shopaddress::where('id',$id)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Deleted Office Address from Database";
    $query2->date = time();
    $query2->save();

    return redirect('/office_addresses')->with('status', 'Office Address Removed from Database');
  }
  public function addoffice(Request $request){
    $this->validate($request, [
      'officePhone' => 'required|numeric',
      'officeEmail' => 'required|email',
      'officeStreet1' => 'required',
      'officeStreet2' => 'required',
      'officeCity' => 'required',
      'officeState' => 'required',
      'officeCountry' => 'required'
    ]);
    if(shopaddress::where('street1',$request->input('officeStreet1'))->where('street2',$request->input('officeStreet2'))->count() > 0 ){
        return redirect('/addoffice')->with('warningLog', 'Office Location already in Database');
    }else{
      $query = new shopaddress;
      $query->phone = $request->input('officePhone');
      $query->email = $request->input('officeEmail');
      $query->street1 = $request->input('officeStreet1');
      $query->street2 = $request->input('officeStreet2');
      $query->city = $request->input('officeCity');
      $query->state = $request->input('officeState');
      $query->country = $request->input('officeCountry');
      $query->save();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added New Office Location to Database";
      $query2->date = time();
      $query2->save();

    return redirect('/addoffice')->with('status', 'New Office Location Added to Database');
  }
  }



  public function upPassword(Request $request){
    $this->validate($request, [
      'currentPassword' => 'required',
      'newPassword' => 'required',
      'confirmPassword' => 'required'
    ]);
    if(login_table::where('username','=',session()->get('username'))
    ->where('password','=',md5($request->input('currentPassword')))
    ->count() > 0 ){
      if(strlen($request->input('newPassword'))<7){
        return redirect('/configure')->with('warningLog', 'New Password must be greater than 7 (seven) characters  ');
      }else
      if($request->input('newPassword')!=$request->input('confirmPassword')){
        return redirect('/configure')->with('warningLog', 'New Password and Confirm Password Not Same  ');
      }else{
        login_table::where('username','=',session()->get('username'))
        ->update([
          'password'=>md5($request->input('confirmPassword'))
        ]);
        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Updated Password Details";
        $query2->date = time();
        $query2->save();

          return redirect('/configure')->with('status', 'Password Updated! ');
      }

    }else{
        return redirect('/configure')->with('errorLog', 'Incorrect Password ');
    }
  }


  public function addreview(Request $request){
    $this->validate($request, [
      'productID' => 'required',
      'reviewComment' => 'required',
      'reviewName' => 'required',
      'reviewEmail' => 'required|email'
    ]);
    $lg=rand(56,5600)*time();
    $reviewID="RID".sprintf("%0.4s",str_shuffle($lg));
    $query = new product_review;
    $query->reviewID = $reviewID;
    $query->productID = $request->input('productID');
    $query->review = $request->input('reviewComment');
    $query->name = $request->input('reviewName');
    $query->email = $request->input('reviewEmail');
    $query->date = time();
    $query->save();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = $request->input('reviewEmail');
    $query2->action = "Added Review";
    $query2->date = time();
    $query2->save();

    return redirect($request->input('url'))->with('status', ' Review Added!');
  }

  public function addnegotiation(Request $request){
    $this->validate($request, [
      'negID' => 'required',
      'message' => 'required',
      'orderID' => 'required',
      'status' => 'required',
      'url' => 'required'
    ]);
    $query = new negotiation;
    $query->orderID = $request->input('orderID');
    $query->negID = $request->input('negID');
    $query->useremail = session()->get('username');
    $query->message = $request->input('message');
    $query->date = time();
    $query->status  = $request->input('status');
    $query->save();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Added to Negotiations";
    $query2->date = time();
    $query2->save();

    return redirect('/'.$request->input('url').'/'.$request->input('negID'));

  }

  public function closenegotiation(Request $request){
    $this->validate($request, [
      'negID' => 'required',
      'url' => 'required'
    ]);
    negotiation::where('negID','=',$request->input('negID'))
    ->update([
      'status'=>'1'
    ]);

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Closed Negotiations";
    $query2->date = time();
    $query2->save();

    return redirect('/'.$request->input('url').'/'.$request->input('negID'));

  }

  public function orderPrice(Request $request){
    $this->validate($request, [
      'orderID' => 'required',
      'url2' => 'required',
      'amount' => 'required|numeric'
    ]);
    order::where('orderID','=',$request->input('orderID'))
    ->update([
      'totalAmount'=>$request->input('amount')
    ]);

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Updated Order Amount";
    $query2->date = time();
    $query2->save();

    return redirect('/'.$request->input('url2').'/'.$request->input('negID'));

  }

  public function delslider(Request $request){
    $sliderID = $request->id;
    $slid = slider::where('sliderID',$sliderID)->first();
    $sliderImage =$slid->sliderLocation;
    unlink($sliderImage);
    slider::where('sliderID',$sliderID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Deleted Slider Image from Database";
    $query2->date = time();
    $query2->save();

    return redirect('/slider')->with('status', 'Slider Removed from Database');

  }

  public function addslider(Request $request){
    $this->validate($request, [
      'slideTitle' => 'required',
      'slideDetail' => 'required'
    ]);
    $file= Input::file('slideImage');
    $fileInfo=pathinfo(storage_path().$file->getClientOriginalName());
    $ext=$fileInfo['extension'];

    if($ext!='jpg' && $ext!='jpeg' && $ext!='png'){
      return redirect('/addslider')->with('errorLog','Slider Image must be a valid jpg or png image');
    }else


    if(slider::where('sliderTitle',$request->input('slideTitle'))->count() > 0 ){
        return redirect('/addslider')->with('warningLog', 'Slider already in Database');
    }else{
      $tempFilePath = 'sliderImages/';
      $tempFileName = str_replace(' ','_',$request->input('slideTitle')).'.'.$ext;
      $path = $tempFilePath.$tempFileName;

      $file->move(public_path().'\/'.$tempFilePath, $tempFileName);


      $log=rand(50,5000)*time();
      $siderID="SLD".sprintf("%0.5s",str_shuffle($log));
      $query = new slider;
      $query->sliderID = $siderID;
      $query->sliderTitle = $request->input('slideTitle');
      $query->sliderDetail = $request->input('slideDetail');
      $query->sliderLocation = $path;
      $query->save();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added New Slider to Database";
      $query2->date = time();
      $query2->save();

    return redirect('/addslider')->with('status', 'New Slider Added to Database');
  }
  }

  public function negtracker(Request $request){
    $this->validate($request, [
      'negotiationId' => 'required',
      'orderEmail' => 'required|email'
    ]);

    if(negotiation::where('negID',$request->input('negotiationId'))->where('useremail',$request->input('orderEmail'))->count() > 0 ){
        return redirect('view-negotiation/'.$request->input('negotiationId'))->with('status','Continue Negotiation with NegotiationID: <b>'.$request->input('negotiationId').'</b>');
    }else{
      return redirect('/search-negotiation')->with('warningLog', 'No record found');
    }
  }




}
