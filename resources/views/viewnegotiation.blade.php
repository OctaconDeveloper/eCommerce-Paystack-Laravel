@extends('header')
@section('content')

<?php
$negotiationID = urldecode(Request::route('id'));
$negCount=App\negotiation::where('negID',$negotiationID)->count();
if($negCount > 0){
  $neg=App\negotiation::where('negID',$negotiationID)->get();
  $or = App\negotiation::where('negID',$negotiationID)->first();
  $or2 = App\order::where('orderID',$or->orderID)->first();
}
?>
<title>My Negotiations</title>
<style>
  .st{
    text-decoration: none;
    list-style: none;
    color: black;
  }
  .st:hover{
    text-decoration: none;
    list-style: none;
    color: black;
  }
  .is-active{
  font-weight: bold;
  }
</style>

<div id="main-content" class="main-content">
  <div id="post-7" class="post-7 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">My Account</h2>
      </div>
    </div>

    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="woocommerce col-xs-3" style="display:inline-block;">
        <div class="woocommerce-MyAccount-navigation-title">
          <h4><b>My Account</b></h4>
          <hr/>
        </div>

        @if(session()->has('username') > 0 )
        <nav class="woocommerce-MyAccount-navigation">
          <ul>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard ">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-account">Dashboard</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-orders">Orders</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-negotiation">Negotiations</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}edit-address">Addresses</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}edit-account">Account details</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-payments">Payments Log</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}logs">Activity Log</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
              <a class="st" href="{{Config::get('constant.options.sitelink')}}logout">Logout</a>
            </li>
          </ul>
        </nav>
        @endif
      </div>

      <div class="woocommerce col-xs-6"  style="display:inline-block;">
        <div class="woocommerce-MyAccount-content">
          <div class="woocommerce-MyAccount-content-title">
            <h2><b>Negotiations</b></h2>
            <h2> NegotiationID:: {{$negotiationID}} </h2>
          </div>
          <?php
       if($negCount > 0){
          foreach($neg as $negg){ ?>
          <div class="vc_toggle vc_toggle_color_default vc_toggle_active">
            <div class="vc_toggle_content">
              <h6 style="font-weight:bolder; text-decoration:underline;">
                @if($negg->useremail == session()->get('username'))
                {{'Me'}}
                @else
                {{ucfirst($negg->useremail)}}
                @endif
              </h6>
              <p align="justify">
                {{ucfirst($negg->message)}}<br/>
                <small><i class="icon icon-clock"></i> {{date('jS F, Y',$negg->date)}}</small>
              </p>
            </div>
          </div>
        <?php } ?>
          {!! Form::open(['url' => 'addNegot', 'files' => true, 'class' => 'forms-sample']) !!}
          <div class="form-group">
            @include('alerts')
            <input value="{{$negotiationID}}" name="negID" hidden  />
            <input value="{{$or->status}}" name="status" hidden />
            <input value="{{$or->orderID}}" name="orderID" hidden />
            <input value="view-negotiation" name="url" hidden />
            <textarea name="message" class="form-control" rows="7" style="resize:none" placeholder="Send Reply" autofocus></textarea>
            <br/>
            @if($or->status==1)
            <button disabled="disabled" class="btn btn-deafult mr-2">
              <i class="fa fa-times-circle"></i> Closed
            </button>
           @else
             <button type="submit" class="btn btn-primary mr-2">
               <i class="fa fa-reply"></i> Send Reply
             </button>
           @endif
           </div>
           {!! Form::close()!!}

     </div>
   </div>
   <div class="woocommerce col-xs-2"  style="display:inline-block;">
     <div class="woocommerce-MyAccount-content">
       <div class="woocommerce-MyAccount-content-title">
         <h2><b>Order Details</b></h2>
       </div>
       <h4><b>OrderID</b></h4>
       <span class="form-control">{{$or->orderID}} </span>
       <a href="{{Config::get('constant.options.sitelink')}}view-order/{{$or->orderID}}">
         <i class="fa fa-search"></i>
       </a>
       <h4><b>Negotiation Status</b></h4>
       @if($or->status==1)
         {{!$stat="<b style='color:red'>Closed</b>"}}
       @elseif($or->status==0)
         {{!$stat="<b style='color:green'>Open</b>"}}
       @endif
       <span class="form-control">{!!$stat!!} </span>
       <h4><b>Total Amount </b></h4>
       <span class="form-control">&#8358; {{number_format($or2->totalAmount)}}</span>
<br/>

<br/>
        <form method="post" action="{{route('pay')}}" accept-charset="UTF-8"role="form">
          {{!$pay = App\payment::where('orderID',$or2->orderID)->first()}}
          <input type="text" name="email" value="{{strtolower($or2->useremail)}}"> {{-- required --}}
          <input type="text" name="orderID" value="{{$or2->orderID}}">
          <input type="text" name="amount" value="{{$or2->totalAmount*100}}"> {{-- required in kobo --}}
          <input type="text" name="quantity" value="1">
          <input type="text" name="metadata" value="{{ json_encode($array = ['orderID' => $or2->orderID, 'phone' => $or2->phone, 'ship' =>$or2->shipAmount, 'subtotal' =>$or2->subAmount ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
          <input type="" name="reference" value="{{ $pay->paymentID }}"> {{-- required --}}
          <input type="" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
          {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

           <input type="text" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

          <div class="form-group">
            @if($or->status==1)
            <button class="btn btn-default" disabled>
            <i class="fa fa-money"></i> Pay &#8358; {{number_format($or2->totalAmount)}}
            </button>
            @else
            <button class="btn btn-success">
            <i class="fa fa-money"></i> Pay &#8358; {{number_format($or2->totalAmount)}}
            </button>
            @endif
          </form>

        <?php }else{ ?>
            <h2 style="margin-top:40px;" align="center">No Record Found For {{$negotiationID}}
        <?php } ?>
  </div>
</div>


 </div><!-- .entry-content -->
</div><!-- #post-7 -->
</div><!-- #main-content -->
</div>


@endsection
