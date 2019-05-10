<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\category;
use App\history_log;
use App\brand;

class categoryController extends Controller
{
  public function newcategory(Request $request){
    $this->validate($request, [
      'category' => 'required',
      'description' => 'required'
    ]);

      if(category::where('categoryName','=',$request->input('category'))->count() > 0){
      //  echo "UserEmail Copied";
        return redirect('/newcategory')->with('errorLog','Error Encountered <br/> '.$request->input('category').'</b> is already captured');
      }else{
      $cat=rand(50,5000)*time();
      $categoryID="CTV".sprintf("%0.6s",str_shuffle($cat));
      $query = new category;
      $query->categoryID = $categoryID;
      $query->categoryName = $request->input('category');
      $query->categoryDetails = $request->input('description');
      $query->save();

      $log=rand(50,5000)*time();
      $logID="LID".sprintf("%0.4s",str_shuffle($log));
      $query2 = new history_log;
      $query2->logID = $logID;
      $query2->userid = session()->get('username');
      $query2->action = "Added New Category ".$request->input('category');
      $query2->date = time();
      $query2->save();

      return redirect('/newcategory')->with('status','New Category <b> '.$request->input('category').'</b> Added');
    }
  }

  public function viewcategory(Request $request){
    $category = category::select()->get();
    //view is location to go
    return view('control.viewcategory')->with('category',$category);
  }
  public function viewbrand(Request $request){
    $category = brand::select()->get();
    //view is location to go
    return view('control.viewbrand')->with('brand',$category);
  }

  public function deletecategory(Request $request){
    $categoryID=$request->id;
    $data=category::where('categoryID',$categoryID)->get()->first();
    category::where('categoryID',$categoryID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Deleted Category ".$data->categoryName;
    $query2->date = time();
    $query2->save();

    return redirect('/viewcategory')->with('status', $data->categoryName.' Removed from Category Database');
  }

  public function deletebrand(Request $request){
    $brandID=$request->id;
    $data=brand::where('brandID',$brandID)->get()->first();

    $logo=$data->brandLogo;
    unlink($logo);

    brand::where('brandID',$brandID)->delete();

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Deleted Brand ".$data->brandName;
    $query2->date = time();
    $query2->save();

    return redirect('/viewbrand')->with('status', $data->brandName.' Removed from Brand Database');
  }

  public function updatecategory(Request $request){
    $this->validate($request, [
      'categoryID' => 'required',
      'category' => 'required',
      'description' => 'required'
    ]);

    $log=rand(50,5000)*time();
    $logID="LID".sprintf("%0.4s",str_shuffle($log));
    $query2 = new history_log;
    $query2->logID = $logID;
    $query2->userid = session()->get('username');
    $query2->action = "Update Details For Category ".$request->input('category');
    $query2->date = time();
    $query2->save();

    category::where('categoryID', $request->input('categoryID'))
    ->update(['categoryDetails'=>$request->input('description')]);
    return redirect('/viewcategory')->with('status', $request->input('category'). ' has been updated!');

  }

  public function newbrand(Request $request){
    $this->validate($request,[
      'brandName' => 'required',
      'brandLogo' => 'required|file'
    ]);

    $file= Input::file('brandLogo');
    $fileInfo=pathinfo(storage_path().$file->getClientOriginalName());
    $ext=$fileInfo['extension'];



    if($ext!='jpg' && $ext!='jpeg' && $ext!='png'){
      return redirect('/newbrand')->with('errorLog','Brand Logo must be a valid jpg or png image');
    }else{

      if(brand::where('brandName','=',$request->input('brandName'))->count() > 0){
      //  echo "UserEmail Copied";
        return redirect('/newbrand')->with('errorLog','<b>'.$request->input('brandName').'</b> is already in database');
      }else{
        $tempFilePath = 'brandImages/';
        $tempFileName = str_replace(' ','_',$request->input('brandName')).'_1.'.$ext;

        $path = $tempFilePath.$tempFileName;

        $file->move(public_path().'\/'.$tempFilePath, $tempFileName);

        $prod=rand(50,5000)*time();
        $productID="NBN".sprintf("%0.6s",str_shuffle($prod));
        $query = new brand;
        $query->brandID = $productID;
        $query->brandName= $request->input('brandName');
        $query->brandLogo = $path;
        $query->save();


        $log=rand(50,5000)*time();
        $logID="LID".sprintf("%0.4s",str_shuffle($log));
        $query2 = new history_log;
        $query2->logID = $logID;
        $query2->userid = session()->get('username');
        $query2->action = "Added New Brand ".$request->input('brandName');
        $query2->date = time();
        $query2->save();

        return redirect('/newbrand')->with('status','New Brand <b> '.$request->input('brandName').'</b> Added to Database');
      }
    }
  }



}
