@extends('header')
@section('content')
@if(session()->has('username')< 1 )
{{ view('login')}}
@endif
{{!$orders=App\negotiation::select(['negID'])->distinct()->where('useremail',session()->get('username'))->get()}}
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
      <div class="woocommerce col-xs-4" style="display:inline-block;">
        <div class="woocommerce-MyAccount-navigation-title">
          <h4><b>My Account</b></h4>
          <hr/>
        </div>
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
      </div>

      <div class="woocommerce col-xs-7"  style="display:inline-block;">
        <div class="woocommerce-MyAccount-content">
          <div class="woocommerce-MyAccount-content-title">
            <h2><b>Negotiations</b></h2>
          </div>
          <table class="items woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
            <thead>
              <tr>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">NegotiationID</span></th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">OrderID</span></th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">Amount</span></th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">Status</span></th>

           </tr>
         </thead>
         <tbody class="">
           <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
             @foreach($orders as $order)
             <?php
             $tg1=App\negotiation::where('negID',$order->negID)->first();
             $tg=App\order::where('orderID',$tg1->orderID)->first();
             ?>
             <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
               <a href="{{Config::get('constant.options.sitelink')}}view-negotiation/{{$order->negID}}">
                 {{$order->negID}}
               </a>
             </td>
             <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order">
               <a href="{{Config::get('constant.options.sitelink')}}view-order/{{$tg1->orderID}}">
                 {{$tg1->orderID}}
               </a>
             </td>
             <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
               &#8358;{{number_format($tg->totalAmount)}}
             </td>
             @if($order->status==1)
               {{!$stat="<b style='color:red'>Closed</b>"}}
             @elseif($order->status==0)
               {{!$stat="<b style='color:green'>Open</b>"}}
             @endif
             <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
               {!!$stat!!}
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
       <script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
       <script type="text/javascript" src="{{ asset('js/paginathing.js') }}"></script>
       <script type="text/javascript">
         jQuery(document).ready(function($){
           $('.items tbody').paginathing({
                 perPage: 5,
                 containerClass: 'panel-footer',
                 activeClass: 'active',
                 insertAfter: '.items',
                 pageNumbers: true
           })
         });
       </script>
     </div>
   </div>
 </div><!-- .entry-content -->
</div><!-- #post-7 -->
</div><!-- #main-content -->


@endsection
