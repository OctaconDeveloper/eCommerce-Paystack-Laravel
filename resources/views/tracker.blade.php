@extends('header')
@section('content')
<title>Track Order</title>

<div id="main-content" class="main-content">
  <div id="post-415" class="post-415 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">Track your Order</h2>
      </div>
    </div>
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <p>@include('alerts')</p>
    @if(!isset($data))
      <div class="woocommerce">
          {!! Form::open(['url' => 'tracker', 'files' => true, 'class' => 'track_order']) !!}
          <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
          <p class="form-row form-row-first">
            <label for="orderid">Order ID</label>
            <input class="input-text" type="text" name="orderId" id="orderid" placeholder="Found in your order confirmation email.">
          </p>
          <p class="form-row form-row-last">
            <label for="order_email">Billing email</label>
            <input class="input-text" type="text" name="orderEmail" id="order_email" placeholder="Email you used during checkout.">
          </p>
          <div class="clear"></div>
          <p class="form-row">
            <button class="button" type="submit" >
              <i class="icon icon-magnifier"></i>
              Track
            </button>
          </p>
          {!! Form::close()!!}
      </div>
      @endif

      @if(isset($data))
      <div class="woocommerce">
        <p class="order-info">Order #
          <mark class="order-number">{{$data->orderID}}</mark>
          was placed on
          @if($data->orderStatus==0)
          {{!$status="On Hold"}}
          @elseif($data->orderStatus==1)
          {{!$status="Approved"}}
          @elseif($data->orderStatus==2)
          {{!$status="Delivered"}}
          @endif
          <mark class="order-date">{{date('jS M Y',$data->orderDate)}}</mark>
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
              <tr>
                {{!$orders=App\order_log::where('orderID',$data->orderID)->get()}}
                @foreach($orders as $order)
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
                    {{number_format($data->subAmount,2)}}
                  </span>
                </td>
              </tr>
              <tr>
                <th scope="row">Shipping:</th>
                <td><span class="woocommerce-Price-amount amount">
                  <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($data->shipAmount,2)}}
                </span>
              </td>
            </tr>
            <tr>
              <th scope="row">Payment method:</th>
              <td>{{ucwords($data->paymentType)}}</td>
            </tr>
            <tr>
              <th scope="row">Total:</th>
              <td>
                <span class="woocommerce-Price-amount amount">
                  <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($data->totalAmount,2)}}
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
                <td>{{$data->useremail}}</td>
              </tr>
              <tr>
                <th>Phone:</th>
                <td>{{$data->phone}}</td>
              </tr>
            </tbody>
          </table>

          <section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
            <div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">
              <h3 class="woocommerce-column__title">Billing address</h3>
              <address>
                {{ucwords($data->billingfirstname)}} {{$data->billinglastname}}<br>
                {{ucwords($data->billingstreet)}}<br>
                {{ucwords($data->billingcity)}}<br>
                {{ucwords($data->billingstate)}}<br>
                {{$data->billingpostal}}<br>
                {{ucwords($data->billingcountry)}}
              </address>
            </div><!-- /.col-1 -->
            <div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
              <h3 class="woocommerce-column__title">Shipping address</h3>
              <address>
                {{ucwords($data->shippingfirstname)}} {{$data->shippinglastname}}<br>
                {{ucwords($data->shippingstreet)}}<br>
                {{ucwords($data->shippingcity)}}<br>
                {{ucwords($data->shippingstate)}}<br>
                {{$data->shippingpostal}}<br>
                {{ucwords($data->shippingcountry)}}
              </address>
            </div><!-- /.col-2 -->
          </section><!-- /.col2-set -->
        </section>
      </section>
    </div>
    @endif
  </div>
</div>
</div>
@endsection
