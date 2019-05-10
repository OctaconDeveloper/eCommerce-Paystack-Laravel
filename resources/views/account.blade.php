@extends('header')
@section('content')
@if(session()->has('username') < 1)
{{ view('login')}}
@endif
{{!$data=App\usertable::where('useremail','=',session()->get('username'))->first()}}
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
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--dashboard is-active">
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
            <h2><b>Dashboard</b></h2>
          </div>
          <p>Hello <strong>
            @if(empty($data->lastname))
              {{session()->get('username')}}
            @else
              {{strtolower($data->lastname.$data->firstname)}}
            @endif
            </strong>
            (not <strong>
              @if(empty($data->lastname))
                {{session()->get('username')}}
              @else
                {{strtolower($data->lastname.$data->firstname)}}
              @endif</strong>?
            <a href="{{Config::get('constant.options.sitelink')}}logout">
              Log out
            </a>
            )
          </p>
          <p>From your account dashboard you can view your
            <a href="{{Config::get('constant.options.sitelink')}}orders">recent orders</a>, manage your
            <a href="{{Config::get('constant.options.sitelink')}}edit-address">shipping and billing addresses</a> and
            <a href="{{Config::get('constant.options.sitelink')}}edit-account">edit your password and account details</a>.
          </p>
        </div>
      </div>

    </div><!-- .entry-content -->
  </div><!-- #post-7 -->
</div><!-- #main-content -->



@endsection
