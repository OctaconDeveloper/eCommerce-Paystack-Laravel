@extends('header')
@section('content')
@if(session()->has('username')< 1 )
{{ view('login')}}
@endif

<title>My Addresses</title>

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
          <p>
            The following addresses will be used on the checkout page by default.
          </p>

          @include('alerts')
          <div class="u-columns woocommerce-Addresses col2-set addresses">
            <div class="u-column1 col-1 woocommerce-Address">
              <header class="woocommerce-Address-title title">
                <h3>Billing address</h3>
                <a href="{{Config::get('constant.options.sitelink')}}update-address/billing" class="edit">
                  <i class="icon icon-note"></i> Edit
                </a>
              </header>
              @if(App\billingaddress::where('useremail','=',session()->get('username'))->count()>0)
              {{!$billAddress=App\billingaddress::where('useremail','=',session()->get('username'))->first()}}
              <address>
                {{ucwords($billAddress->firstname)}} {{$billAddress->lastname}}<br>
                {{!$arry=explode('<br/>',$billAddress->street)}}
                {{$arry[0]}}<br>
                {{$arry[1]}}<br>
                {{ucwords($billAddress->city)}}<br>
                {{ucwords($billAddress->state)}}<br>
                {{$billAddress->postal}}<br>
                {{ucwords($billAddress->country)}}
              </address>
              @else
              <address>
                You have not set up this type of address yet.
              </address>
              @endif
            </div>

            <div class="u-column2 col-2 woocommerce-Address">
              <header class="woocommerce-Address-title title">
                <h3>Shipping address</h3>
                <a href="{{Config::get('constant.options.sitelink')}}update-address/shipping" class="edit">
                  <i class="icon icon-note"></i> Edit
                </a>
              </header>
              @if(App\address::where('useremail','=',session()->get('username'))->count()>0)
              {{!$shipAddress=App\address::where('useremail','=',session()->get('username'))->first()}}
              <address>
                  {{ucwords($shipAddress->firstname)}} {{$shipAddress->lastname}}<br>
                  {{!$arry=explode('<br/>',$shipAddress->street)}}
                  {{$arry[0]}}<br>
                  {{$arry[1]}}<br>
                  {{ucwords($shipAddress->city)}}<br>
                  {{ucwords($shipAddress->state)}}<br>
                  {{$shipAddress->postal}}<br>
                  {{ucwords($shipAddress->country)}}
              </address>
              @else
              <address>
                You have not set up this type of address yet.
              </address>
              @endif
            </div>
          </div>
        </div>
        </div>
      </div><!-- .entry-content -->
     </div><!-- #post-7 -->
     </div><!-- #main-content -->



@endsection
