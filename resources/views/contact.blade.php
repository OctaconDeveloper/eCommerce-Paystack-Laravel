@extends('header')
@section('content')
<title>Contact</title>
{{! $address = App\shopaddress::all() }}

<div id="main-content" class="main-content">
  <div id="post-871" class="post-871 page type-page status-publish hentry">
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-6">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
              <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                  <h2 class="bordered">Leave a Message</h2>
                  <div role="form" class="wpcf7" id="wpcf7-f874-p871-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    @include('alerts')
                      {!! Form::open(['url' => 'submitContact', 'files' => true, 'class' => 'wpcf7-form', 'novalidate' => 'novalidate']) !!}
                      <div class="cf-style-1">
                        <div class="row field-row">
                          <div class="col-xs-12 col-sm-6">
                            <label>Your Name*</label>
                            <span class="wpcf7-form-control-wrap your-name">
                              <input type="text" name="yourName" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required le-input" aria-required="true" aria-invalid="false">
                            </span>
                          </div>
                          <div class="col-xs-12 col-sm-6">
                            <label>Your Email*</label>
                            <span class="wpcf7-form-control-wrap your-email">
                              <input type="email" name="yourEmail" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email le-input" aria-required="true" aria-invalid="false">
                            </span>
                          </div>
                        </div>
                        <p></p>
                        <div class="field-row">
                          <label>Subject</label>
                          <span class="wpcf7-form-control-wrap your-subject">
                            <input type="text" name="yourSubject" value="" size="40" class="wpcf7-form-control wpcf7-text le-input" aria-invalid="false">
                          </span>
                        </div>
                        <p></p>
                        <div class="field-row">
                          <label>Your Message</label>
                          <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="yourMessage" cols="40" rows="8" class="wpcf7-form-control wpcf7-textarea le-input" aria-invalid="false"></textarea>
                          </span>
                        </div>
                        <p></p>
                        <div class="buttons-holder">
                          <button type="submit" class="wpcf7-form-control wpcf7-submit le-button huge">
                            <i class="icon icon-paper-plane"></i>
                            Send Message
                          </button>
                        </div>
                        <p></p>
                      </div>
                      {!! Form::close()!!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-6">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
              <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                  <h2 class="bordered">Head Office</h2>
                </div>
              </div>
              <section class="google-map map-holder">
                google Map
              </section>
              <div class="wpb_text_column wpb_content_element  no-margin-bottom">
                <div class="wpb_wrapper">
                  <h3 class="highlight">Customer Support 24/7</h3>
                </div>
              </div>
              <div class="vc_row wpb_row vc_inner vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-6">
                  <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <p><i class="fa fa-phone"></i> {{Config::get('constant.options.sitephone')}}<br>
                            <i class="fa fa-facebook"></i> {{Config::get('constant.options.facebook')}}
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-6">
                  <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                      <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                          <p>
                            <i class="fa fa-map-marker"></i>{{Config::get('constant.options.mainaddress')}}<br>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{Config::get('constant.options.siteemail')}}">{{Config::get('constant.options.siteemail')}}</a>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_row wpb_row vc_row-fluid inner-top-xs">
      @foreach($address as $add)
        <div class="wpb_column vc_column_container vc_col-sm-4">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
              <div class="wpb_text_column wpb_content_element ">
                <div class="wpb_wrapper">
                  <div class="text-center">
                    <h2 class="bordered">
                      <i class="fa fa-map-marker"></i> {{ucfirst($add->state)}}
                    </h2>
                    <address>
                      {{ucfirst($add->street1)}}
                      <br> {{ucfirst($add->street2)}}
                      <br> {{ucfirst($add->city)}}
                      <br> {{ucfirst($add->state)}}
                      <br> {{ucfirst($add->country)}}
                    </address>
                    <p>
                      <i class="icon icon-phone"></i>
                      {{$add->phone}}<br>
                      <i class="icon icon-envelope"></i>
                      <a href="mailto:{{$add->email}}">{{$add->email}}</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    </div>
  </div>
</div>

@endsection
