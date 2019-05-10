@extends('header')
@section('content')
<title>My Account</title>



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
              <h2>Login</h2>
              {!! Form::open(['url' => 'login', 'files' => true, 'class' => 'wpcf7-form', 'novalidate' => 'novalidate']) !!}
                <p>Hello, Welcome to your account</p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="username">Email address <span class="required">*</span></label>
                  <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="loginEmail" id="username" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="password">Password <span class="required">*</span></label>
                  <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="loginPassword" id="password">
                </p>
                <p class="form-row">
                  <button type="submit" class="woocommerce-Button button" >
                    <i class="icon icon-key"></i>
                    Login
                  </button>
                </p>
                <p class="woocommerce-LostPassword lost_password">
                  <a href="{{Config::get('constant.options.sitelink')}}lost-password">Lost your password?</a>
                </p>
                {!! Form::close()!!}
            </div>
            <div class="u-column2 col-2">
              @include('alerts')
              <h2>Register</h2>
              {!! Form::open(['url' => 'newRegister', 'files' => true, 'class' => 'wpcf7-form', 'novalidate' => 'novalidate']) !!}
                <p>Create your own account</p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_email">Email address <span class="required">*</span></label>
                  <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="registerEmail" id="reg_email" value="">
                </p>
                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                  <label for="reg_password">Password <span class="required">*</span></label>
                  <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="registerPassword" id="reg_password">
                </p>
                <p class="woocomerce-FormRow form-row">
                  <button type="submit" class="woocommerce-Button button" >
                    <i class="icon icon-lock"></i>
                    Register
                  </button>
                </p>
                <section class="section why-register inner-top-xs">
                  <h2>Sign up today and you'll be able to :</h2>
                  <ul class="list-unstyled list-benefits">
                    <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                    <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                    <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                  </ul>
                </section><!-- /.why-register -->
                {!! Form::close()!!}
            </div>
          </div>
        </div><!-- /.wrap-customer-login-form -->
      </div>
    </div><!-- .entry-content -->
  </div><!-- #post-7 -->
</div><!-- #main-content -->



@endsection
