@extends('header')
@section('content')
<title>Account Recovery</title>
@if(session('data'))
{{Session::put('userMail',session('data'))}}
@endif
<div id="main-content" class="main-content">
  <div id="post-7" class="post-7 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">My Account</h2>
      </div>
    </div>
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="woocommerce">
        <div class="wrap-customer-login-form">
          <div class="u-columns col2-set" id="customer_login">
            @include('alerts')
            <div class="u-column1 col-1">
              <h2>Account Recovery</h2>
              {!! Form::open(['url' => 'recovery', 'files' => true, 'class' => 'wpcf7-form', 'novalidate' => 'novalidate']) !!}
                <p>Hello, Welcome to your account</p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="username">Email address <span class="required">*</span></label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="recoverEmail" value="harrysjil@gmail.com">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password">Phone Number <span class="required">*</span></label>
                  <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="recoverPhone" value="08101889830">
                </p>
                <p class="form-row">
                  <button type="submit" class="woocommerce-Button button" >
                    <i class="icon icon-refresh"></i>
                    Recover Password
                  </button>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                  <a href="{{Config::get('constant.options.sitelink')}}account">Login to account?</a>
                </p>
                {!! Form::close()!!}
            </div>


            <div class="u-column2 col-2">
              @if(session()->has('userMail') > 0)
              <h2>Register</h2>
              {!! Form::open(['url' => 'resetpassword', 'files' => true, 'class' => 'wpcf7-form', 'novalidate' => 'novalidate']) !!}
                <p>Reset your password</p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">username<span class="required">*</span></label>
                  <input type="text" name="userEmail" class="woocommerce-Input woocommerce-Input--text input-text" value="{{session()->get('userMail')}}" readonly>
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">New Password <span class="required">*</span></label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="newPassword" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password">Confirm Password <span class="required">*</span></label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="confirmPassword" >
                </p>
                <p class="woocomerce-FormRow form-row">
                  <button type="submit" class="woocommerce-Button button" >
                    <i class="icon icon-lock"></i>
                    Reset Password
                  </button>
                </p><!-- /.why-register -->
                {!! Form::close()!!}
            </div>
            @endif

          </div>
        </div><!-- /.wrap-customer-login-form -->
      </div>
    </div><!-- .entry-content -->
  </div><!-- #post-7 -->
</div><!-- #main-content -->




@endsection
