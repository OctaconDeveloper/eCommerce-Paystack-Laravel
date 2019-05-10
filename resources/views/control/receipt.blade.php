<?php $userDetails = App\usertable::where('useremail',$data->useremail)->first();
$billDetails = App\billingaddress::where('useremail',$data->useremail)->first();
$ord = App\order::where('orderID',$data->orderID)->first();
$orders = App\order_log::where('orderID',$data->orderID)->get();
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Receipt: {{$data->paymentID}}</title>

	<link rel='stylesheet' type='text/css' href='{{asset('receipt/css/style.css')}}' />
	<link rel='stylesheet' type='text/css' href='{{asset('receipt/css/print.css') }}' media="print" />
	<script type='text/javascript' src='{{asset('receipt/js/jquery-1.3.2.min.js') }}'></script>
	<script type='text/javascript' src='{{asset('receipt/js/example.js') }}'></script>
  <link href="{{Config::get('constant.options.icon')}}" rel="shortcut icon"/>

</head>

<body>
  <div id="page-wrap">
    <textarea id="header">INVOICE</textarea>
    <div id="identity">
      <textarea id="address" readonly>
        {{Config::get('constant.options.sitename')}}
        Phone: {{Config::get('constant.options.mainaddress')}}
        Phone: {{Config::get('constant.options.siteemail')}}
        Phone: {{Config::get('constant.options.sitephone')}}
      </textarea>
      <div id="logo">
        <img id="" width="100px" height="100px" src="{{Config::get('constant.options.icon')}}" alt="{{Config::get('constant.options.sitename')}}" />
      </div>
    </div>
    <div style="clear:both"></div>
    <div id="customer">
      <textarea id="customer-title" readonly>
        {{ucwords($ord->lastname." ".$ord->firstname)}}.
        {{ucwords($ord->phone)}}
      </textarea>
      <table id="meta">
        <tr>
          <td class="meta-head">Invoice #</td>
          <td>{{$data->paymentID}}</td>
        </tr>
        <tr>
          <td class="meta-head">Date</td>
          <td>{{date('j M, Y',$data->paymentDate)}}</td>
        </tr>
        <tr>
          <td class="meta-head">Amount</td>
          <td><div class="due">&#8358;{{number_format($data->paymentAmount+$data->paymentShipping)}}</div></td>
        </tr>
      </table>
    </div>

		<table id="items">
      <tr>
        <th>#</th>
        <th>Item</th>
        <th>Unit Cost</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
      <tr class="item-row">
        <?php $sn=1; ?>
        @foreach($orders as $order)
        {{!$prod=App\product::where('productID',$order->productID)->first()}}
        <td>
          {{$sn++}}
        </td>
        <td class="item-name">
          {{ucwords($prod->productName)}}
        </td>
		      <td class="cost" align="center">
            &#8358;{{number_format($order->price,2)}}
          </td>
		      <td class="qty" align="center">
            {{$order->quantity}}
          </td>
		      <td class="price" align="center">
            &#8358;{{number_format($order->total,2)}}
          </td>
		  </tr>
      @endforeach
      <tr>
        <td colspan="3" rowspan="3" class="blank">
          <h4>Billing Address</h4>
        {!!ucwords($ord->useremail)!!}<br/>
        {!!ucwords($ord->billingstreet)!!}<br/>
        {!!ucwords($ord->billingcity)!!}<br/>
        {!!ucwords($ord->billingstate)!!}<br/>
        {!!ucwords($ord->billingpostal)!!}<br/>
        {!!ucwords($ord->billingcountry)!!} </td>
        <td colspan="1" class="fg total-line">Subtotal</td>
        <td class="total-value" align="center">
          <div id="subtotal">&#8358;{{number_format($data->paymentAmount,2)}}</div>
        </td>
      </tr>
      <tr>
        <td colspan="1" class="fg total-line">Shipping</td>
        <td class="total-value" align="center">
          <div id="subtotal">&#8358;{{number_format($data->paymentShipping,2)}}</div>
        </td>
      </tr>
		  <tr>
        <td colspan="1" class="fg total-line">Total</td>
        <td class="total-value" align="center">
          <div id="total">&#8358;{{number_format($data->paymentShipping+$data->paymentAmount,2)}}</div>
        </td>
      </tr>
    </table>
<style>
.fg{
  text-align: left;
}
</style>
		<div id="terms">
		  <h5>
        {{ ucwords(Config::get('constant.options.sitename'))}}. All rights reserved.
    </h5>
		</div>

	</div>

</body>

</html>
