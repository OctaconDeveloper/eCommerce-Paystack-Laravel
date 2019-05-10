@extends('header')
@section('content')
<title>Frequently Asked Questions</title>
{{! $faq=App\faq::orderby('id', 'DESC')->get()}}
<?php $sn=0; ?>
<div id="main-content" class="main-content">
  <div id="post-474" class="post-474 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">Frequently Asked Questions</h2>
      </div>
    </div>
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
          <div class="vc_column-inner ">
            <div class="wpb_wrapper">
              @foreach($faq as $faqs)
              <?php $sn++; ?>
              <div class="vc_toggle vc_toggle_default vc_toggle_color_default  vc_toggle_size_md @if($sn==1) {{'vc_toggle_active'}} @endif">
                <div class="vc_toggle_title">
                  <h4>{{ucwords($faqs->question)}}</h4>
                  <i class="vc_toggle_icon"></i>
                </div>
                <div class="vc_toggle_content">
                  <p align="justify">
                    {{ucfirst($faqs->answer)}}
                  </p>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
