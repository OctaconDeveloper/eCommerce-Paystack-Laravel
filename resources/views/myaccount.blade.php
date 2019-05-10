@extends('header')
@section('content')
@if(session()->has('username') < 1 )
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
            <li class="st woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account is-active">
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
            <h2><b>Account Details</b></h2>
          </div>
          @include('alerts')

          @if(session()->has('username') > 0 )
            {!! Form::open(['url' => 'saveProfile', 'files' => true, 'class' => 'forms-sample']) !!}
            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
              <label for="account_first_name">First name <span class="required">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="firstName" id="account_first_name" value="{{$data->firstname}}">
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--last form-row form-row-last">
              <label for="account_last_name">Last name <span class="required">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="lastName" id="account_last_name" value="{{$data->lastname}}">
            </p>
            <div class="clear"></div>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="account_email">Email address <span class="required">*</span></label>
              <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="emailAddress" id="account_email" value="{{session()->get('username')}}" readonly>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <label for="account_email">Phone Number <span class="required">*</span></label>
              <input type="text" class="woocommerce-Input woocommerce-Input--email input-text" name="phoneNumber" id="account_phone"  value="{{$data->phone}}">
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
              <button type="submit" class="woocommerce-Button button">
                <i class="fa fa-save"></i>
                Save Profile
              </button>
            </p>
            @endif
          {!! Form::close()!!}
            {!! Form::open(['url' => 'savePassword', 'files' => true, 'class' => 'forms-sample']) !!}
            <fieldset>
              <legend>Password change</legend>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_current">Current password</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="currentPassword" id="password_current">
              </p>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_1">New password</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="newPassword" id="password_1">
              </p>
              <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <label for="password_2">Confirm new password</label>
                <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="confirmPassword" id="password_2">
              </p>
            </fieldset>
            <div class="clear"></div>
            <p>
              <button type="submit" class="woocommerce-Button button">
                <i class="fa fa-save"></i>
                Save Password
              </button>
            </p>
            {!! Form::close()!!}
        </div>
      </div>

    </div><!-- .entry-content -->
  </div><!-- #post-7 -->
</div><!-- #main-content -->



@endsection
