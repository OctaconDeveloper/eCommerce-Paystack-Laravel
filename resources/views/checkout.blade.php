@extends('header')
@section('content')

{{session()->get('username')}}

@if(session()->has('username') > 0)
{{!$user=App\usertable::where('useremail', session()->get('username'))->first()}}
{{!$bill=App\billingaddress::where('useremail', session()->get('username'))->first()}}
{{!$ship=App\address::where('useremail', session()->get('username'))->first()}}
{{!$street=explode('<br/>',$bill->street)}}
{{!$street2=explode('<br/>',$ship->street)}}
@endif

<title>Checkout</title>
<div id="main-content" class="main-content">
  <div id="post-1242" class="post-1242 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">Checkout</h2>
      </div>
    </div>
      @include('alerts')
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="woocommerce">
      @if(session()->has('username') < 1)
        <div class="woocommerce-info">
          Returning customer?
          <a href="{{Config::get('constant.options.sitelink')}}account" class="showlogin">
            Click here to login
          </a>
        </div>
        @endif
        {!! Form::open(['url' => 'saveorder', 'files' => true, 'class' => 'checkout woocommerce-checkout', 'novalidate' => 'novalidate']) !!}
          <div class="col2-set" id="customer_details">
            <div class="col-1">
              @if(session()->has('username') > 0)
              <div class="woocommerce-billing-fields">
                <h3>Billing details</h3>
                <div class="woocommerce-billing-fields__field-wrapper">
                  <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                    <label for="billing_first_name" class="">First name <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingFirstName" id="billingFirstName" placeholder="" value="{{ucwords($bill->firstname)}}" autocomplete="given-name" autofocus="autofocus">
                  </p>
                  <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                    <label for="billing_last_name" class="">Last name <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingLastName" id="billingLastName" placeholder="" value="{{ucwords($bill->lastname)}}" autocomplete="family-name">
                  </p>
                  <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                    <label for="billing_company" class="">Company name</label>
                    <input type="text" class="input-text " name="billingCompany" id="billingCompany" placeholder="" value="{{ucwords($bill->company)}}" autocomplete="organization">
                  </p>
                  <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40">
                    <label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingCountry" id="billingCountry" placeholder="" value="{{ucwords($bill->country)}}" autocomplete="">
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                    <label for="billing_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingFirstStreet" id="billingFirstStreet" placeholder="House number and street name" value="{{$street[0]}}" autocomplete="address-line1">
                  </p>
                  <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                    <input type="text" class="input-text " name="billingSecondStreet" id="billingSecondStreet" placeholder="Apartment, suite, unit etc. (optional)" value="{{$street[1]}}" autocomplete="address-line2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                    <label for="billing_city" class=""> City <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingCity" id="billingCity" placeholder="" value="{{ucwords($bill->city)}}" autocomplete="2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" id="billing_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                    <label for="billing_state" class="">State <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingState" id="billingState" placeholder="" value="{{ucwords($bill->state)}}" autocomplete="">
                  </p>
                  <p class="form-row form-row-wide address-field validate-postcode validate-required" id="billing_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                    <label for="billing_postcode" class="">Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingPostcode" id="billingPostcode" placeholder="" value="{{ucwords($bill->postal)}}" autocomplete="postal-code">
                  </p>
                  <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                    <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                    <input type="tel" class="input-text " name="billingPhone" id="billingPhone" placeholder="" value="{{ucwords($user->phone)}}" autocomplete="tel">
                  </p>
                  <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                    <label for="billing_email" class="">Email address <abbr class="required" title="required">*</abbr></label>
                    <input type="email" class="input-text " name="billingEmail" id="billingEmail" placeholder="" value="{{ucwords($user->useremail)}}" autocomplete="email username">
                  </p>
                </div>
              </div>
              @else
              <div class="woocommerce-billing-fields">
                <h3>Billing details</h3>
                <div class="woocommerce-billing-fields__field-wrapper">
                  <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="billing_first_name_field" data-priority="10">
                    <label for="billing_first_name" class="">First name <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingFirstName" id="billingFirstName" placeholder="" value="" autocomplete="given-name" autofocus="autofocus">
                  </p>
                  <p class="form-row form-row-last validate-required" id="billing_last_name_field" data-priority="20">
                    <label for="billing_last_name" class="">Last name <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingLastName" id="billingLastName" placeholder="" value="" autocomplete="family-name">
                  </p>
                  <p class="form-row form-row-wide" id="billing_company_field" data-priority="30">
                    <label for="billing_company" class="">Company name</label>
                    <input type="text" class="input-text " name="billingCompany" id="billingCompany" placeholder="" value="" autocomplete="organization">
                  </p>
                  <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="billing_country_field" data-priority="40">
                    <label for="billing_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingCountry" id="billingCountry" placeholder="" value="" autocomplete="">
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_address_1_field" data-priority="50">
                    <label for="billing_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingFirstStreet" id="billingFirstStreet" placeholder="House number and street name" value="" autocomplete="address-line1">
                  </p>
                  <p class="form-row form-row-wide address-field" id="billing_address_2_field" data-priority="60">
                    <input type="text" class="input-text " name="billingSecondStreet" id="billingSecondStreet" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                    <label for="billing_city" class=""> City <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingCity" id="billingCity" placeholder="" value="" autocomplete="2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" id="billing_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                    <label for="billing_state" class="">State <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingState" id="billingState" placeholder="" value="" autocomplete="">
                  </p>
                  <p class="form-row form-row-wide address-field validate-postcode validate-required" id="billing_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                    <label for="billing_postcode" class="">Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text " name="billingPostcode" id="billingPostcode" placeholder="" value="" autocomplete="postal-code">
                  </p>
                  <p class="form-row form-row-first validate-required validate-phone" id="billing_phone_field" data-priority="100">
                    <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                    <input type="tel" class="input-text " name="billingPhone" id="billingPhone" placeholder="" value="" autocomplete="tel">
                  </p>
                  <p class="form-row form-row-last validate-required validate-email" id="billing_email_field" data-priority="110">
                    <label for="billing_email" class="">Email address <abbr class="required" title="required">*</abbr></label>
                    <input type="email" class="input-text " name="billingEmail" id="billingEmail" placeholder="" value="" autocomplete="email username">
                  </p>
                </div>
              </div>

              @endif

            </div>
            <div class="col-2">
              <h3 class="shipping-details-title">Shipping Details</h3>
              <div class="woocommerce-shipping-fields">
                <h3 id="ship-to-different-address">
                  <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input id="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox checkbox" type="checkbox" name="shipStat">
                    <span>Ship to a different address?</span>
                  </label>
                </h3>
              <div class="shipping_address" id="shipping_address" style="display: none;">
                @if(session()->has('username') > 0)
              <div class="woocommerce-shipping-fields__field-wrapper">
                <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="shipping_first_name_field" data-priority="10">
                  <label for="shipping_first_name" class="">First name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingFirstName" id="shippingFirstName" placeholder="" value="{{ucwords($ship->firstname)}}" autocomplete="given-name" autofocus="autofocus">
                </p>
                <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                  <label for="shipping_last_name" class="">Last name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingLastName" id="shippingLastName" placeholder="" value="{{ucwords($ship->lastname)}}" autocomplete="family-name">
                </p>
                <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30">
                  <label for="shipping_company" class="">Company name</label>
                  <input type="text" class="input-text " name="shippingCompany" id="shippingCompany" placeholder="" value="{{ucwords($ship->company)}}" autocomplete="organization">
                </p>
                <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="shipping_country_field" data-priority="40">
                  <label for="shipping_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingCountry" id="shippingCountry" placeholder="" value="{{ucwords($ship->country)}}" autocomplete="">
                </p>
                <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
                  <label for="shipping_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingFirstStreet" id="shippingFirstStreet" placeholder="House number and street name" value="{{ucwords($street2[0])}}" autocomplete="address-line1">
                </p>
                <p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60">
                  <input type="text" class="input-text " name="shippingSecondStreet" id="shippingSecondStreet" placeholder="Apartment, suite, unit etc. (optional)" value="{{ucwords($street2[1])}}" autocomplete="address-line2">
                </p>
                <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                  <label for="shipping_city" class=""> City <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingCity" id="shippingCity" placeholder="" value="{{ucwords($ship->city)}}" autocomplete="2">
                </p>
                <p class="form-row form-row-wide address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" id="shipping_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                  <label for="shipping_state" class="">State <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingState" id="shippingState" placeholder="" value="{{ucwords($ship->state)}}" autocomplete="">
                </p>
                <p class="form-row form-row-wide address-field validate-postcode validate-required" id="shipping_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                  <label for="shipping_postcode" class="">Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingPostcode" id="shippingPostcode" placeholder="" value="{{ucwords($ship->postal)}}" autocomplete="postal-code">
                </p>
                <p class="form-row form-row-first validate-required validate-phone" id="shipping_phone_field" data-priority="100">
                  <label for="shipping_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                  <input type="tel" class="input-text " name="shippingPhone" id="shippingPhone" placeholder="" value="{{ucwords($user->phone)}}" autocomplete="tel">
                </p>
                <p class="form-row form-row-last validate-required validate-email" id="shipping_email_field" data-priority="110">
                  <label for="shipping_email" class="">Email address <abbr class="required" title="required">*</abbr></label>
                  <input type="email" class="input-text " name="shippingEmail" id="shippingEmail" placeholder="" value="{{ucwords($user->useremail)}}" autocomplete="email username">
                </p>
              </div>
                @else
              <div class="woocommerce-shipping-fields__field-wrapper">
                <p class="form-row form-row-first validate-required woocommerce-invalid woocommerce-invalid-required-field" id="shipping_first_name_field" data-priority="10">
                  <label for="shipping_first_name" class="">First name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingFirstName" id="shippingFirstName" placeholder="" value="" autocomplete="given-name" autofocus="autofocus">
                </p>
                <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                  <label for="shipping_last_name" class="">Last name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingLastName" id="shippingLastName" placeholder="" value="" autocomplete="family-name">
                </p>
                <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30">
                  <label for="shipping_company" class="">Company name</label>
                  <input type="text" class="input-text " name="shippingCompany" id="shippingCompany" placeholder="" value="" autocomplete="organization">
                </p>
                <p class="form-row form-row-wide address-field update_totals_on_change validate-required woocommerce-validated" id="shipping_country_field" data-priority="40">
                  <label for="shipping_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingCountry" id="shippingCountry" placeholder="" value="" autocomplete="">
                </p>
                <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
                  <label for="shipping_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingFirstStreet" id="shippingFirstStreet" placeholder="House number and street name" value="" autocomplete="address-line1">
                </p>
                <p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60">
                  <input type="text" class="input-text " name="shippingSecondStreet" id="shippingSecondStreet" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2">
                </p>
                <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                  <label for="shipping_city" class=""> City <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingCity" id="shippingCity" placeholder="" value="" autocomplete="2">
                </p>
                <p class="form-row form-row-wide address-field validate-state woocommerce-invalid woocommerce-invalid-required-field validate-required" id="shipping_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state woocommerce-invalid woocommerce-invalid-required-field">
                  <label for="shipping_state" class="">State <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingState" id="shippingState" placeholder="" value="" autocomplete="">
                </p>
                <p class="form-row form-row-wide address-field validate-postcode validate-required" id="shipping_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                  <label for="shipping_postcode" class="">Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text " name="shippingPostcode" id="shippingPostcode" placeholder="" value="" autocomplete="postal-code">
                </p>
                <p class="form-row form-row-first validate-required validate-phone" id="shipping_phone_field" data-priority="100">
                  <label for="shipping_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                  <input type="tel" class="input-text " name="shippingPhone" id="shippingPhone" placeholder="" value="" autocomplete="tel">
                </p>
                <p class="form-row form-row-last validate-required validate-email" id="shipping_email_field" data-priority="110">
                  <label for="shipping_email" class="">Email address <abbr class="required" title="required">*</abbr></label>
                  <input type="email" class="input-text " name="shippingEmail" id="shippingEmail" placeholder="" value="" autocomplete="email username">
                </p>
              </div>
              @endif
            </div>


              <div class="woocommerce-additional-fields">
                <div class="woocommerce-additional-fields__field-wrapper">
                  <p class="form-row notes" id="order_comments_field" data-priority="">
                    <label for="order_comments" class="">Order Details</label>
                    <textarea name="orderDetails" class="input-text " id="order_comments" style="resize:none;" placeholder="Notes about your order, e.g. special notes for delivery." rows="4" cols="5"></textarea>
                  </p>
                </div>
              </div>
            </div>
          </div>

          <h3 id="order_review_heading">Your order</h3>
          <div id="order_review" class="woocommerce-checkout-review-order">
            <table class="shop_table woocommerce-checkout-review-order-table">
              <thead>
                <tr style="display:block">
                  <th class="product-name">Product</th>
                  <th class="product-total">Total</th>
                </tr>
              </thead>
              <tbody>
                  @foreach(session()->get('mycart') as $cart)
                  {{!$prod=App\product::where('productID',$cart['productID'])->first()}}
                    <tr class="cart_item">
                  <td class="product-name">
                    <span class="product-name-wrap">{{ucwords($prod->productName)}}</span>&nbsp;
                    <strong class="product-quantity">{{$cart['qty']}} ×</strong>
                  </td>
                  <td class="product-total">
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($cart['amount'],2)}}
                    </span>
                  </td>
                  @endforeach
                </tr>
              </tbody>
              <tfoot>
                <tr class="cart-subtotal">
                  <th>Subtotal</th>
                  <td>
                    <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                      <span class="siteloader3"></span>
                    </span>
                  </td>
                </tr>
                <tr class="shipping">
                  <th>Shipping</th>
                  <td data-title="Shipping">
                    <input type="checkbox" class="icheckbox" id="ckh" name="ship" />
                    Flat Rate: <span class="woocommerce-Price-amount amount">
                      <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format(Config::get('constant.options.shipping'))}}
                    </span>
                  </td>
                </tr>
                <tr class="order-total">
                  <th>Total</th>
                  <td>
                    <strong>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                        <span class="siteloader4"></span>
                      </span>
                    </strong>
                  </td>
                </tr>
              </tfoot>
            </table>
            <div id="payment" class="woocommerce-checkout-payment">
              <div class="form-row place-order">
                <p class="form-row terms wc-terms-and-conditions">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                  <input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms" id="terms">
                  <span>I’ve read and accept the
                    <a href="{{Config::get('constant.options.sitelink')}}terms-and-conditions" class="woocommerce-terms-and-conditions-link">
                      terms &amp; conditions
                    </a>
                  </span>
                  <span class="required">*</span>
                  </label>
                  <input type="hidden" name="terms-field" value="1">
                </p>
                <button type="submit" class="button alt">
                  Proceed to Negotiations
                </button>
              </div>
            </div>
          </div>
          {!! Form::close()!!}
      </div>
    </div><!-- .entry-content -->
  </div><!-- #post-1242 -->
</div><!-- #main-content -->



<script>

   $('.siteloader3').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
   $('.siteloader4').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');

$(function (){
  $("#checkbox").on("click", function(){
    if($("input.checkbox").is(':checked')==true){
      document.getElementById('shipping_address').style.display="block";
    }else{
      document.getElementById('shipping_address').style.display="none";
    }
  });
});

$(function (){
  $("#ckh").on("click", function(){
    if($("input.icheckbox").is(':checked')==true){
       $('.siteloader4').load('{{Config::get('constant.options.sitelink')}}calcAmount');
    }else{
      $('.siteloader4').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
    }
  });
});
</script>





@endsection
