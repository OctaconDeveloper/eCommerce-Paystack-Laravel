<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
  public function home(){
      return view('home');
  }
  public function error404(){
      return view('404');
  }
  public function faq(){
      return view('faq');
  }
  public function contact(){
      return view('contact');
  }
  public function terms(){
      return view('terms');
  }
  public function tracker(){
      return view('tracker');
  }
  public function account(){
      return view('account');
  }
  public function orders(){
      return view('orders');
  }
  public function nego(){
      return view('negotiation');
  }
  public function viewnego(){
      return view('viewnegotiation');
  }
  public function vieworder(){
      return view('vieworder');
  }
  public function address(){
      return view('address');
  }
  public function editaddress(){
      return view('editaddress');
  }
  public function myaccount(){
      return view('myaccount');
  }
  public function logs(){
      return view('logs');
  }
  public function shop(){
      return view('store');
  }
  public function category(){
      return view('category');
  }
  public function payments(){
      return view('payments');
  }
  public function product(){
      return view('product');
  }
  public function wishlist(){
      return view('wishlist');
  }
  public function viewcart(){
      return view('viewcart');
  }
  public function cart_details(){
      return view('cart_overview');
  }
  public function recovery(){
      return view('recovery');
  }
  public function checkout(){
      return view('checkout');
  }
  public function findnegotiation(){
      return view('findnegotiation');
  }

  public function login(){
      return view('login');
  }


  public function adminhome(){
      return view('control.home');
  }
  public function newcategory(){
      return view('control.category');
  }
  public function viewcategory(){
      return view('control.viewcategory');
  }
  public function editcategory(){
      return view('control.editcategory');
  }
  public function newproduct(){
      return view('control.product');
  }
  public function viewproduct(){
      return view('control.viewproduct');
  }
  public function editproduct(){
      return view('control.editproduct');
  }
  public function viewfeaturedproduct(){
      return view('control.viewfeaturedproduct');
  }
  public function viewspecialoffer(){
      return view('control.viewspecialoffer');
  }
  public function useraccount(){
      return view('control.users');
  }
  public function userorders(){
      return view('control.userorders');
  }
  public function userpayments(){
      return view('control.userpayments');
  }
  public function userhistory(){
      return view('control.userhistory');
  }
  public function searchorder(){
      return view('control.searchorder');
  }
  public function updateorder(){
      return view('control.updateorder');
  }
  public function newbrand(){
      return view('control.newbrand');
  }
  public function viewbrand(){
      return view('control.viewbrand');
  }
  public function adminfaq(){
      return view('control.faq');
  }
  public function adminaddfaq(){
      return view('control.addfaq');
  }
  public function office(){
      return view('control.office');
  }
  public function addoffice(){
      return view('control.addoffice');
  }
  public function unreadmessage(){
      return view('control.unreadmessage');
  }
  public function messages(){
      return view('control.messages');
  }
  public function readmsg(){
      return view('control.readmsg');
  }
  public function configure(){
      return view('control.configure');
  }
  public function chequepayments(){
      return view('control.chequepayments');
  }
  public function onlinepayments(){
      return view('control.onlinepayments');
  }
  public function pendingnegotiation(){
      return view('control.pendingnegotiation');
  }
  public function negotiationhistory(){
      return view('control.negotiationhistory');
  }
  public function negotiation(){
      return view('control.negotiation');
  }

  public function slider(){
      return view('control.slider');
  }
  public function addslider(){
      return view('control.addslider');
  }


}
