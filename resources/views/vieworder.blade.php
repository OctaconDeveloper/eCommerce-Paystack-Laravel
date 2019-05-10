@extends('header')
@section('content')
{{!$orderID=urldecode(Request::route('id'))}}
{{!$orders=App\order::where('orderID','=',$orderID)->first()}}

<title>View Order {{$orderID}}</title>
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
        @if(session()->has('username') > 0 )
        <nav class="woocommerce-MyAccount-navigation">
          <ul>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard ">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-account">Dashboard</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders is-active">
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
      <div class="woocommerce col-xs-7"  style="display:inline-block;">
        <div class="woocommerce-MyAccount-content">
          <div class="woocommerce-MyAccount-content-title">
            <h2>Order {{$orderID}}</h2>
          </div>

          <p class="order-info">Order #
            <mark class="order-number">{{$orderID}}</mark>
            was placed on
            @if($orders->orderStatus==0)
            {{!$status="On Hold"}}
            @elseif($orders->orderStatus==1)
            {{!$status="Approved"}}
            @elseif($orders->orderStatus==2)
            {{!$status="Delivered"}}
            @endif
            <mark class="order-date">{{date('jS M Y',$orders->orderDate)}}</mark>
            and is currently
            <mark class="order-status">{{$status}}</mark>.
          </p>
          <section class="woocommerce-order-details">
            <h2 class="woocommerce-order-details__title">Order details</h2>
            <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
              <thead>
                <tr>
                  <th class="woocommerce-table__product-name product-name">Product</th>
                  <th class="woocommerce-table__product-table product-total">Total</th>
                </tr>
              </thead>
              <tbody>
                {{!$ord=App\order_log::where('orderID',$orders->orderID)->get()}}
                @foreach($ord as $order)
                {{!$prod=App\product::where('productID',$order->productID)->first()}}
                <td>{{ucwords($prod->productName)}}</td>
                <td>&#8358; {{number_format($order->total,2)}}</td>
              </tr>
              @endforeach
            </tbody>
              <tfoot>
                <tr>
                  <th scope="row">Subtotal:</th>
                  <td>
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                      {{number_format($orders->subAmount,2)}}
                    </span>
                  </td>
                </tr>
                <tr>
                  <th scope="row">Shipping:</th>
                  <td><span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($orders->shipAmount,2)}}
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">Payment method:</th>
                <td>{{ucwords($orders->paymentType)}}</td>
              </tr>
              <tr>
                <th scope="row">Total:</th>
                <td>
                  <span class="woocommerce-Price-amount amount">
                    <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($orders->totalAmount,2)}}
                  </span>
                </td>
              </tr>
            </tfoot>
          </table>

          <section class="woocommerce-customer-details">
            <h2>Customer details</h2>
            <table class="woocommerce-table woocommerce-table--customer-details shop_table customer_details">
              <tbody>
                <tr>
                  <th>Email:</th>
                  <td>{{$orders->useremail}}</td>
                </tr>
                <tr>
                  <th>Phone:</th>
                  <td>{{$orders->phone}}</td>
                </tr>
              </tbody>
            </table>

            <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
              <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
                <h3 class="woocommerce-column__title">Billing address</h3>
                <address>
                  {{ucwords($orders->billingfirstname)}} {{$orders->billinglastname}}<br>
                  {{ucwords($orders->billingstreet)}}<br>
                  {{ucwords($orders->billingcity)}}<br>
                  {{ucwords($orders->billingstate)}}<br>
                  {{$orders->billingpostal}}<br>
                  {{ucwords($orders->billingcountry)}}
                </address>
              </div><!-- /.col-1 -->
              <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
                <h3 class="woocommerce-column__title">Shipping address</h3>
                <address>
                  {{ucwords($orders->shippingfirstname)}} {{$orders->shippinglastname}}<br>
                  {{ucwords($orders->shippingstreet)}}<br>
                  {{ucwords($orders->shippingcity)}}<br>
                  {{ucwords($orders->shippingstate)}}<br>
                  {{$orders->shippingpostal}}<br>
                  {{ucwords($orders->shippingcountry)}}
                </address>
              </div><!-- /.col-2 -->
            </section><!-- /.col2-set -->
          </section>
        </section>


        </div>
      </div>
    </div>
  </div>
</div>

@endsection
