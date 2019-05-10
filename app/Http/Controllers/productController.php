<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\product;
use App\history_log;
use App\specialoffer;
use App\featureproduct;
use App\wishlist;
use App\order;
use App\order_log;
use App\negotiation;
use App\payment;
use Session;
use Config;


class productController extends Controller
{
  public function newproduct(Request $request){
    $this->validate($request,[
      'categoryName' => 'required',
      'brandName' => 'required',
      'productName' => 'required',
      'thumbnail1' => 'required|file',
      'thumbnail2' => 'required|file',
      'thumbnail3' => 'required|file',
      'thumbnail4' => 'required|file',
      'productPrice' => 'numeric',
      'ProductadditionalInfo' => 'required',
      'productDescription' => 'required'
    ]);

    $file1= Input::file('thumbnail1');
    $fileInfo1=pathinfo(storage_path().$file1->getClientOriginalName());
    $ext1=$fileInfo1['extension'];

    $file2= Input::file('thumbnail2');
    $fileInfo2=pathinfo(storage_path().$file2->getClientOriginalName());
    $ext2=$fileInfo2['extension'];

    $file3= Input::file('thumbnail3');
    $fileInfo3=pathinfo(storage_path().$file3->getClientOriginalName());
    $ext3=$fileInfo3['extension'];

    $file4= Input::file('thumbnail4');
    $fileInfo4=pathinfo(storage_path().$file4->getClientOriginalName());
    $ext4=$fileInfo4['extension'];

    if($ext1!='jpg' && $ext1!='jpeg' && $ext1!='png'){
      return redirect('/newproduct')->with('errorLog','Thumbnail 1 must be a valid jpg or png image');
    }else
    if($ext2!='jpg' && $ext2!='jpeg' && $ext2!='png'){
      return redirect('/newproduct')->with('errorLog','Thumbnail 2 must be a valid jpg or png image');
    }else
    if($ext3!='jpg' && $ext3!='jpeg' && $ext3!='png'){
      return redirect('/newproduct')->with('errorLog','Thumbnail 3 must be a valid jpg or png image');
    }else
    if($ext4!='jpg' && $ext4!='jpeg' && $ext4!='png'){
      return redirect('/newproduct')->with('errorLog','Thumbnail 4 must be a valid jpg or png image');
    }else{

      if(product::where('productName','=',$request->input('productName'))->count() > 0){
      //  echo "UserEmail Copied";
        return redirect('/newproduct')->with('errorLog','<b>'.$request->input('productName').'</b> is already in database');
      }else{
        $tempFilePath = 'productImages/';
        $tempFileName1 = str_replace(' ','_',$request->input('productName')).'_1.'.$ext1;
        $tempFileName2 = str_replace(' ','_',$request->input('productName')).'_2.'.$ext2;
        $tempFileName3 = str_replace(' ','_',$request->input('productName')).'_3.'.$ext3;
        $tempFileName4 = str_replace(' ','_',$request->input('productName')).'_4.'.$ext4;

        $path1 = $tempFilePath.$tempFileName1;
        $path2 = $tempFilePath.$tempFileName2;
        $path3 = $tempFilePath.$tempFileName3;
        $path4 = $tempFilePath.$tempFileName4;

        $file1->move(public_path().'\/'.$tempFilePath, $tempFileName1);
        $file2->move(public_path().'\/'.$tempFilePath, $tempFileName2);
        $file3->move(public_path().'\/'.$tempFilePath, $tempFileName3);
        $file4->move(public_path().'\/'.$tempFilePath, $tempFileName4);

        $prod=rand(50,5000)*time();
        $productID="PRN".sprintf("%0.6s",str_shuffle($prod));
        $query = new product;
        $query->productID = $productID;
        $query->categoryID = $request->input('categoryName');
        $query->brandID = $request->input('brandName');
        $query->userID = session()->get('username');
        $query->productName = $request->input('productName');
        $query->productDetails = $request->input('productDescription');
        $query->productInfo = $request->input('ProductadditionalInfo');
        $query->thumb1 = $path1;
        $query->thumb2 = $path2;
        $query->thumb3 = $path3;
        $query->thumb4 = $path4;
        $query->productPrice = $request->input('productPrice');
        $query->oldPrice = "";
        $query->save();


        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Added New Product ".$request->input('productName');
        $query2->date = time();
        $query2->save();

        return redirect('/newproduct')->with('status','New Product <b> '.$request->input('productName').'</b> Added to Database');
      }
    }
  }

  public function deleteproduct(Request $request){
    $productID=$request->id;
    $data=product::where('productID',$productID)->get()->first();

    $thumb1=$data->thumb1;
    $thumb2=$data->thumb2;
    $thumb3=$data->thumb3;
    $thumb4=$data->thumb4;

    unlink($thumb1);
    unlink($thumb2);
    unlink($thumb3);
    unlink($thumb4);

    product::where('productID',$productID)->delete();
    specialoffer::where('productID',$productID)->delete();
    featureproduct::where('productID',$productID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Deleted Product ".$data->productName;
    $query2->date = time();
    $query2->save();

    return redirect('/viewproduct')->with('status', $data->productName.' Removed from Product Database');
  }

  public function updateproduct(Request $request){
    $this->validate($request, [
      'productID' => 'required',
      'productName' => 'required',
      'productDescription' => 'required',
      'ProductadditionalInfo' => 'required',
      'productPrice' => 'required|numeric',
      'oldPrice' => 'required|numeric'
    ]);

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Update Details For Product ".$request->input('productName');
    $query2->date = time();
    $query2->save();

    product::where('productID', $request->input('productID'))
    ->update(['productPrice'=>$request->input('productPrice'),'oldPrice'=>$request->input('oldPrice'),'productDetails'=>$request->input('productDescription'),'productInfo'=>$request->input('ProductadditionalInfo')]);
    return redirect('/viewproduct')->with('status', $request->input('productName'). ' has been updated!');
    //return $request->input('productID');

  }

  public function addspecial (Request $request){
    $productID=$request->id;
    $data=product::where('productID',$productID)->get()->first();
    $categoryID=$data->categoryID;
    $productName=$data->productName;
    if(specialoffer::where('productID','=',$productID)->count() > 0){
      return redirect('/viewproduct')->with('errorLog','<b>'.$productName.'</b> is already in Special Offer Database');
    }else{

      $query = new specialoffer;
      $query->productID = $productID;
      $query->categoryID = $categoryID;
      $query->productName = $productName;
      $query->save();


      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added ".$productName." to special offer database";
      $query2->date = time();
      $query2->save();

      return redirect('/viewproduct')->with('status', $productName.' Added to Special Offer Database');
    }
  }

  public function addfeatured (Request $request){
    $productID=$request->id;
    $data=product::where('productID',$productID)->get()->first();
    $categoryID=$data->categoryID;
    $productName=$data->productName;
    if(featureproduct::where('productID','=',$productID)->count() > 0){
      return redirect('/viewproduct')->with('errorLog','<b>'.$productName.'</b> is already in Featured Product Database');
    }else{

      $query = new featureproduct;
      $query->productID = $productID;
      $query->categoryID = $categoryID;
      $query->productName = $productName;
      $query->save();


      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added ".$productName." to special offer database";
      $query2->date = time();
      $query2->save();

      return redirect('/viewproduct')->with('status', $productName.' Added to Featured Product Database');
    }
  }


  public function removefeatured(Request $request){
    $productID=$request->id;
    $data=featureproduct::where('productID',$productID)->get()->first();

    featureproduct::where('productID',$productID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Removed ".$data->productName." from Featured Product Database";
    $query2->date = time();
    $query2->save();

    return redirect('/viewfeaturedproduct')->with('status', $data->productName.' Removed from Featured Product Database');
  }

  public function removespecial(Request $request){
    $productID=$request->id;
    $data=specialoffer::where('productID',$productID)->get()->first();

    specialoffer::where('productID',$productID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Removed ".$data->productName." from Special Offer Database";
    $query2->date = time();
    $query2->save();

    return redirect('/viewspecialoffer')->with('status', $data->productName.' Removed from Special Offer Database');
  }

  public function removewishlist(Request $request){
    $wID=$request->id;
    $data=wishlist::where('wID',$wID)->get()->first();
    $dat2=product::where('productID',$data->productID)->get()->first();

    wishlist::where('wID',$wID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Removed ".$dat2->productName." from Wishlist";
    $query2->date = time();
    $query2->save();

    return redirect('/wishlist')->with('status', $dat2->productName.' Removed from from Wishlist');
  }


  public function multiplesearch(Request $request){
    $categoryID=$request->input('product_cat');
    $productName=$request->input('s');
    if($categoryID=='all'){
      if(product::where('productName', 'LIKE', '%'.$productName.'%')->count() > 0){
        $dat = product::where('productName', 'LIKE',  '%'.$productName.'%')->get();
        $data[]=$dat;
        $data[]=$productName;
        return view('searchresult')->with('data',$data);
      }else{
        //$dt[];
        $data[]=[];
        $data[]=$productName;
          return view('searchresult')->with('data',$data);
          //return $data;
      }
    }else{
      if(product::where('productName', 'LIKE', '%'.$productName.'%')->where('categoryID', '=', $categoryID)->count() > 0){
        $pro=product::where('productName', 'LIKE', '%'.$productName.'%')->where('categoryID', '=', $categoryID)->get();
        $data[]=$pro;
        $data[]=$productName;
        $data[]=$categoryID;
          return view('searchresult')->with('data',$data);
      }else{
        $data[]=[];
        $data[]=$productName;
        $data[]=$categoryID;
          return view('searchresult')->with('data',$data);
      }
    }
    //return $productName;
}
  public function wishlist(){
    $data=wishlist::where('username',session()->get('username'))->count();
    return $data;
  }



    public function addwishlist(Request $request){
      $productID=$request->product_id;
      $prod = product::where('productID',$productID)->first();
      if(empty(session()->get('username'))){
        $alert="error";
        $msg="<b>Please login to account to add wishlist. </b>";
        $data=array();
        $data[]=$alert;
        $data[]=$msg;
        return json_encode($data);
      }elseif(wishlist::where('username',session()->get('username'))->where('productID',$productID)->count() > 0){
        $alert="warning";
        $msg="<b>".ucwords($prod->productName)." already in wishlist. </b>";
        $data=array();
        $data[]=$alert;
        $data[]=$msg;
        return json_encode($data);
      }else{
        $lh=rand(70,9000) * time();
        $wID="WID".sprintf("%0.7s",str_shuffle($lh));

        $query= new wishlist;
        $query->wID=$wID;
        $query->username=session()->get('username');
        $query->productID=$productID;
        $query->date=time();
        $query->save();


        $alert="success";
        $msg="<b>".ucwords($prod->productName)." added to wishlist. </b>";
        $data=array();
        $data[]=$alert;
        $data[]=$msg;

        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Added ".ucwords($prod->productName)." to Wishlist";
        $query2->date = time();
        $query2->save();

        return json_encode($data);
      }
      //return $productID;

    }

    public function addcart(Request $request){
      $productID=$request->product_id;
      $price=$request->price;
      $qty=$request->qty;
      $totalAmount=$qty*$price;
      $prod = product::where('productID',$productID)->first();
      $cat=array(
        'productID'=>$productID,
        'price'=>$price,
        'qty'=>$qty,
        'amount'=>$totalAmount
      );
      $gt=0;
      //Session::push('mycart',$cat);
      if(!empty(Session::get('mycart'))){
        foreach(Session::get('mycart') as $array){
          if($array['productID'] === $productID){
            $gt+=1;
          }

        }
      }

      if($gt>0){
        $alert="warning";
        $msg="<b>".ucwords($prod->productName)." already in cart </b>";
        $data=array();
        $data[]=$alert;
        $data[]=$msg;
      }else{
        Session::push('mycart',$cat);
        $alert="success";
        $msg="<b>".ucwords($prod->productName)." added to cart </b>";
        $data=array();
        $data[]=$alert;
        $data[]=$msg;
      }
      return json_encode($data);
    }



    public function viewcart(){
      if(!empty(session()->get('mycart'))){
        return sizeof(session()->get('mycart'));
      }else{
        return 0;
      }
    }

    public function viewTotalAmount(){
      $subTotal=0;
      if(!empty(session()->get('mycart'))){
        foreach(session()->get('mycart') as $arg){
            $subTotal+=$arg['amount'];
        }
      }
      return number_format($subTotal);
    }

    public function removecart(Request $request){
      $productID=$request->id;
      $gt=0;
      //Session::push('mycart',$cat);
      if(!empty(Session::get('mycart'))){
        foreach(Session::get('mycart')  as $key =>  $array){
          if($array['productID'] === $productID){
          $gt+=1;
          $ky=$key;
          $arrayg=Session::get('mycart');
          array_splice($arrayg,$key,1);
          Session::forget('mycart');
          Session::put('mycart',$arrayg);
          }
        }
      }
      return redirect('/cart');
      //return print_r(Session::get('mycart'))." Size".sizeof(Session::get('mycart'));

    }

    public function updatecart(Request $request){
      $productID=$request->product_id;
      $price=$request->price;
      $qty=$request->qty;
      $totalAmount=$qty*$price;

      $gt=0;

      $cart=Session::get('mycart');
      if(!empty($cart)){
        foreach($cart  as $key =>  $array){
          if($array['productID'] === $productID){
          $gt+=1;
          $ky=$key;
          $cart[$key]['qty'] = $qty;
          $cart[$key]['amount'] = $totalAmount;
          Session::forget('mycart');
          Session::put('mycart',$cart);
          }
        }
      }

      return $totalAmount;
    }

    public function calcAmount(){
      $subTotal=0;
      if(!empty(session()->get('mycart'))){
        foreach(session()->get('mycart') as $arg){
            $subTotal+=$arg['amount'];
        }
      }
      $ship=Config::get('constant.options.shipping');
      $newTotal = $subTotal+$ship;
      return number_format($newTotal);
    }

      public function saveorder(Request $request){
        $this->validate($request, [
          'billingFirstName' => 'required',
          'billingLastName' => 'required',
          'billingCompany' => 'required',
          'billingCountry' => 'required',
          'billingFirstStreet' => 'required',
          'billingCity' => 'required',
          'billingState' => 'required',
          'billingPhone' => 'required|numeric',
          'billingEmail' => 'required|email'
        ]);
        if($request->shipStat =='on'){ //billing = shipping
          $this->validate($request, [
            'shippingFirstName' => 'required',
            'shippingLastName' => 'required',
            'shippingCompany' => 'required',
            'shippingCountry' => 'required',
            'shippingFirstStreet' => 'required',
            'shippingCity' => 'required',
            'shippingState' => 'required',
            'shippingPhone' => 'required|numeric',
            'shippingEmail' => 'required|email'
          ]);
        }
        if($request->shipStat =='on'){
          $shippingFees=Config::get('constant.options.shipping');
        }else{
          $shipping = '0';
        }
        $subAmount = 0;
        if(!empty(session()->get('mycart'))){
          foreach(session()->get('mycart') as $arg){
              $subAmount+=$arg['amount'];
          }
        }
        $totalAmount=$subAmount+$shipping;

        $g=rand(50,5000)*time();
        $orderID="O-".sprintf("%0.8s",str_shuffle($g));

        if($request->terms !=='on'){
          return redirect('/checkout')->with('errorLog','Please accept our terms and conditions to continue');
        }else{
          $query = new order;
          $query->useremail = $request->input('billingEmail');
          $query->orderID = $orderID;
          $query->phone = $request->input('billingPhone');
          $query->paymentType = "0";
          $query->subAmount = $subAmount;
          $query->shipAmount = $shipping;
          $query->totalAmount = $totalAmount;
          $query->billinglastname = $request->input('billingLastName');
          $query->billingfirstname = $request->input('billingFirstName');
          $query->billingcountry = $request->input('billingCountry');
          $query->billingstate = $request->input('billingState');
          $query->billingstreet = $request->input('billingFirstStreet')."<br/>".$request->input('billingSecondStreet');
          $query->billingcity = $request->input('billingCity');
          $query->billingcompany = $request->input('billingCompany');
          $query->billingpostal = $request->input('billingPostcode');
          if($request->shipStat =='on'){
            $query->shippinglastname = $request->input('shippingLastName');
            $query->shippingfirstname = $request->input('shippingFirstName');
            $query->shippingcountry = $request->input('shippingCountry');
            $query->shippingstate = $request->input('shippingState');
            $query->shippingstreet = $request->input('shippingFirstStreet')."<br/>".$request->input('shippingSecondStreet');
            $query->shippingcity = $request->input('shippingCity');
            $query->shippingcompany = $request->input('shippingCompany');
            $query->shippingpostal = $request->input('shippingPostcode');
        }else{
          $query->shippinglastname = $request->input('billingLastName');
          $query->shippingfirstname = $request->input('billingFirstName');
          $query->shippingcountry = $request->input('billingCountry');
          $query->shippingstate = $request->input('billingState');
          $query->shippingstreet = $request->input('billingFirstStreet')."<br/>".$request->input('billingSecondStreet');
          $query->shippingcity = $request->input('billingCity');
          $query->shippingcompany = $request->input('billingCompany');
          $query->shippingpostal = $request->input('billingPostcode');
        }
          $query->orderDetails = $request->input('orderDetails');
          $query->orderDate= time();
          $query->orderStatus=0;
          $query->save();

            if(!empty(session()->get('mycart'))){
              foreach(session()->get('mycart') as $arg){
                $query3 = new order_log;
                $query3->orderID = $orderID;
                $query3->productID = $arg['productID'];
                $query3->quantity = $arg['qty'];
                $query3->price = $arg['price'];
                $query3->total = $arg['amount'];
                $query3->save();
              }
            }

            $log=rand(50,5000)*time();
            $logID="LID".sprintf("%0.4s",str_shuffle($log));
            $query2 = new history_log;
            $query2->logID = $logID;
            $query2->userid =  $request->input('billingEmail');
            $query2->action = "Added New Order";
            $query2->date = time();
            $query2->save();

        $n=rand(50,5000)*time();
        $negID="N-ID".sprintf("%0.8s",str_shuffle($n));
        $query4 = new negotiation;
        $query4->orderID = $orderID;
        $query4->negID = $negID;
        $query4->useremail = $request->input('billingEmail');
        $query4->message = "Hello! Good day, I would love to start a Negotiation as regarding my order with orderID :".$orderID;
        $query4->date = time();
        $query4->status = 0;
        $query4->save();
        Session::forget('mycart');

        $p=rand(50,5000)*time();
        $paymentID="P-ID".sprintf("%0.8s",str_shuffle($p));

        $query5 = new payment;
        $query5->useremail = $request->input('billingEmail');
        $query5->paymentID = $paymentID;
        $query5->orderID = $orderID;
        $query5->paymentAmount = $totalAmount;
        $query5->paymentShipping = $shipping;
        $query5->paymentType = "";
        $query5->paymentCode = "1";
        $query5->paymentDate = "";
        $query5->paymentDescription = "Payment for Goods Order";
        $query5->paymentStatus = "0";
        $query5->save();
          //billingSecondStreet,billingPostcode
          return redirect('view-negotiation/'.$negID)->with('status','Negotiation opened with NegotiationID: <b>'.$negID.'</b>');
        }
      }

}
