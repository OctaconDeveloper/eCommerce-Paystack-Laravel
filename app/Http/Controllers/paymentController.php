<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;
use App\payment;
use App\history_log;
use App\negotiation;

class paymentController extends Controller
{
  public function receipt(Request $request){
    $id=$request->id;
    $data=payment::where('paymentID',$id)->first();
    return view('control.receipt')->with('data',$data);
  }


  public function makePayment(Request $request){
    return Paystack :: getAuthorizationUrl()->redirectNow();
  }
  /**
   * Obtain Paystack payment information
   * @return void
   */
  public function handleGatewayCallback()
  {
      $paymentDetails = Paystack::getPaymentData();
      //return $transactionRef = Paystack::genTranxRef();

      //dd($paymentDetails);

      $paymentID = $paymentDetails['data']['reference'];
      $amount = $paymentDetails['data']['amount'];
      $paymentDate = time();
      $paymentDescription = "Online Payment Made Via Paysatck";
      $paymentStatus = 1;
      $paymentCode = 1;
      $paymentType = "Paystack";

      $orderID = $paymentDetails['data']['metadata']['orderID'];
      $paymentShipping = $paymentDetails['data']['metadata']['ship'];
      $negID = $paymentDetails['data']['metadata']['negID'];
      $paymentAmount = $paymentDetails['data']['metadata']['subtotal'];
      $orderID = $paymentDetails['data']['metadata']['orderID'];
      $useremail = $paymentDetails['data']['customer']['email'];
      $orderSummary = $paymentDetails['data']['metadata'];

      $chkStatus = $paymentDetails['data']['status'];
      if($chkStatus==='success'){

      payment::where('paymentID',$paymentID)
      ->update([
        'paymentStatus'=>'1',
        'paymentDate' => time(),
        'paymentType' => 'paystack'
      ]);

      negotiation::where('negID',$negID)
      ->update(['status'=>'1']);
      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = $useremail;
      $query2->action = " Made Payment of ".$amount." via Paystack";
      $query2->date = time();
      $query2->save();
      return redirect('/payment_receipt/'.$paymentID);
    }else{
        return redirect('/view-negotiation/'.$negID)->with('errorLog', ' Payment not successful!');
    }

      //$paymentDetails['data'];
      // Now you have the payment details,
      // you can store the authorization_code in your db to allow for recurrent subscriptions
      // you can then redirect or do whatever you want
  }


}
