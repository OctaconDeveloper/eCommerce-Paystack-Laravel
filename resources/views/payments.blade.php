@extends('header')
@section('content')
@if(session()->has('username')< 1 )
{{ view('login')}}
@endif
{{!$data=App\history_log::where('userid','=',session()->get('username'))->orderby('id','DESC')->get()}}

<title>My Account</title>
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
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-account">Dashboard</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-orders">Orders</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-negotiation">Negotiations</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}edit-address">Addresses</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}edit-account">Account details</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
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

      <div class="woocommerce col-xs-7"  style="display:inline-flex;">
        <div class="woocommerce-MyAccount-content">
          <div class="woocommerce-MyAccount-content-title">
            <h2><b>My Payment Log</b></h2>
          </div>

          <table class="items woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table" style="width:100%">
            <thead>
              <tr>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                 <span class="nobr">PaymentID</span>
               </th>
                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number">
                  <span class="nobr">OrderID</span>
                </th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date">
                 <span class="nobr">Amount</span>
               </th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status">
                 <span class="nobr">Payment Type</span>
               </th>
               <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total">
                 <span class="nobr">Date</span>
               </th>
           </tr>
         </thead>
         <tbody class="">
           {{!$data = App\payment::where('useremail',session()->get('username'))->where('paymentStatus','1')->get()}}
           @foreach($data as $order)
           <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-on-hold order">
             <td class="" style="width:100px;" >
               <a title="Payment Receipt" href="{{Config::get('constant.options.sitelink')}}payment_receipt/{{$order->paymentID}}">
                 {{$order->paymentID}}
               </a>
             </td>
             <td class="" style="width:100px;" >
               <a title="Order Details" href="{{Config::get('constant.options.sitelink')}}/view-order/{{$order->orderID}}">
                 {{$order->orderID}}
               </a>
             </td>
             <td class="" style="width:100px;">
               &#8358;{{number_format($order->paymentAmount+$order->paymentShipping,2)}}
             </td>
             <td class="" style="width:100px;">
               {{ucwords($order->paymentType)}}
             </td>
             <td class="" style="width:100px;">
                {{date('jS F Y',$order->paymentDate)}}
             </td>
             @endforeach
           </tr>
         </tbody>
         <tfoot>
         </tfoot>

       </table>

        </div>
      </div>


    </div><!-- .entry-content -->
  </div><!-- #post-7 -->
</div><!-- #main-content -->
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



@endsection
