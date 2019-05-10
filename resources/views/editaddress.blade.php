@extends('header')
@section('content')
@if(session()->has('username')< 1 )
{{ view('login')}}
@endif
{{$addresstype=urldecode(Request::route('id'))}}
@if($addresstype=='billing')
{{!$data=App\billingaddress::where('useremail','=',session()->get('username'))->first()}}
@elseif($addresstype=='shipping')
{{!$data=App\address::where('useremail','=',session()->get('username'))->first()}}
@endif

@if(!empty($data->firstname))
{{!$arry=explode('<br/>',$data->street)}}
@endif
<title>Edit {{ucwords($addresstype)}} Addresses</title>

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
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders ">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-orders">Orders</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
              <a class="st"  href="{{Config::get('constant.options.sitelink')}}my-negotiation">Negotiations</a>
            </li>
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-address is-active">
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
            <h2>Addresses</h2>
          </div>
          @include('alerts')
            {!! Form::open(['url' => 'update'.ucwords($addresstype), 'files' => true, 'class' => 'forms-sample']) !!}
            <h3>{{ucwords($addresstype)}}  address</h3>
            <div class="woocommerce-address-fields">
              <div class="woocommerce-address-fields__field-wrapper">
                <p class="form-row form-row-first validate-required" id="shipping_first_name_field" data-priority="10">
                  <label for="shipping_first_name" class="">First name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text" value="@if(!empty($data->firstname)){{$data->firstname}}@endif" name="firstname" id="shipping_first_name" placeholder="" value="" autocomplete="given-name" autofocus="autofocus">
                </p>
                <p class="form-row form-row-last validate-required" id="shipping_last_name_field" data-priority="20">
                  <label for="shipping_last_name" class="">Last name <abbr class="required" title="required">*</abbr></label>
                  <input type="text" class="input-text" value="@if(!empty($data->firstname)){{$data->lastname}}@endif"  name="lastname" id="shipping_last_name" placeholder="" value="" autocomplete="family-name">
                </p>
                <p class="form-row form-row-wide" id="shipping_company_field" data-priority="30">
                  <label for="shipping_company" class="">Company name</label>
                  <input type="text" class="input-text " value="@if(!empty($data->firstname)){{$data->company}}@endif"  name="company" id="shipping_company" placeholder="" value="" autocomplete="organization">
                </p>
                <p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="shipping_country_field" data-priority="40">
                  <label for="shipping_country" class="">Country <abbr class="required" title="required">*</abbr></label>
                  <select name="country" id="shipping_country" class="input-text country_to_state country_select  select2-hidden-accessible" autocomplete="country" tabindex="-1" aria-hidden="true" style="height:45px;">
                    <option value="NG">Nigeria</option>
                    <option value="N/A">Others</option>
                  </select>
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="shipping_address_1_field" data-priority="50">
                    <label for="shipping_address_1" class="">Street address <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text" value="@if(!empty($data->firstname)){!!$arry[0]!!}@endif"  name="firstAddress" id="shipping_address_1" placeholder="House number and street name" value="" autocomplete="address-line1">
                  </p>
                  <p class="form-row form-row-wide address-field" id="shipping_address_2_field" data-priority="60">
                    <input type="text" class="input-text" value="@if(!empty($data->firstname)){!!$arry[1]!!}@endif" name="secondAddress" id="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)" value="" autocomplete="address-line2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-required" id="shipping_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required">
                    <label for="shipping_city" class="">Town / City <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text" value="@if(!empty($data->firstname)){{$data->city}}@endif"  name="city" id="shipping_city" placeholder="" value="" autocomplete="address-level2">
                  </p>
                  <p class="form-row form-row-wide address-field validate-state" id="shipping_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-state">
                    <label for="shipping_state" class="">State</label>
                    <input type="text" class="input-text" value="@if(!empty($data->firstname)){{$data->state}}@endif"  value="" placeholder="" name="state" id="shipping_state" autocomplete="address-level1">
                  </p>
                  <p class="form-row form-row-wide address-field validate-postcode validate-required" id="shipping_postcode_field" data-priority="90" data-o_class="form-row form-row-wide address-field validate-required validate-postcode">
                    <label for="shipping_postcode" class="">Postcode <abbr class="required" title="required">*</abbr></label>
                    <input type="text" class="input-text" value="@if(!empty($data->firstname)){{$data->postal}}@endif"  name="postalCode" id="shipping_postcode" placeholder="" value="" autocomplete="postal-code">
                  </p>
                </div>
                <p>
                  <button type="submit" class="button">
                    <i class="icon icon-refresh"></i>
                    Save {{ucwords($addresstype)}} Address
                  </button>
                </p>
              </div>
              {!! Form::close()!!}
        </div>
        </div>
      </div><!-- .entry-content -->
     </div><!-- #post-7 -->
     </div><!-- #main-content -->

@endsection
