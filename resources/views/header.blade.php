<?php $category=App\category::orderby('categoryName','ASC')->get(); ?>
<!DOCTYPE html>
<html class="no-js yes-js js_active js webkit chrome win js js_active  vc_desktop  vc_transform  vc_transform " lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script type="text/javascript">
  document.documentElement.className = document.documentElement.className + ' yes-js js_active js'
</script>
<script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
  <link rel="shortcut icon" href="{{Config::get('constant.options.icon')}}" />
	<meta name="robots" content="noindex,follow">
	<link rel="dns-prefetch" href="https://fonts.googleapis.com/">
	<link rel="dns-prefetch" href="https://s.w.org/">
  <style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel="stylesheet" id="contact-form-7-css" href="{{asset('assets/styles.css')}}" type="text/css" media="all">

	<link rel="stylesheet" id="rs-plugin-settings-css" href="{{asset('assets/settings.css') }}" type="text/css" media="all">
<style id="rs-plugin-settings-inline-css" type="text/css">
    .tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.largeredbtn{font-family:"Raleway",sans-serif;font-weight:900;font-size:16px;line-height:60px;color:#fff !important;text-decoration:none;padding-left:40px;padding-right:80px;padding-top:22px;padding-bottom:22px;background:rgb(234,91,31); background:-moz-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(234,91,31,1)),color-stop(100%,rgba(227,58,12,1))); background:-webkit-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-o-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-ms-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:linear-gradient(to bottom,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5b1f',endColorstr='#e33a0c',GradientType=0 )}.largeredbtn:hover{background:rgb(227,58,12); background:-moz-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(227,58,12,1)),color-stop(100%,rgba(234,91,31,1))); background:-webkit-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-o-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-ms-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:linear-gradient(to bottom,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#e33a0c',endColorstr='#ea5b1f',GradientType=0 )}.fullrounded img{-webkit-border-radius:400px;-moz-border-radius:400px;border-radius:400px}.revslider-big-text{text-transform:uppercase;font-size:50px;line-height:64px}.revslider-big-text .stronger{font-size:90px;font-weight:900;line-height:70px}.revslider-big-text .stronger .sign{font-size:42px;vertical-align:super}.tp-caption .le-button,.tp-caption .le-button:hover{color:#FFF}
    .tp-caption.revslider-big-text,.revslider-big-text{font-size:50px;line-height:64px;text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(34,34,34);border-style:none;text-transform:uppercase}.tp-caption.revslider-excerpt,.revslider-excerpt{font-size:28px;line-height:28px;background-color:transparent;text-decoration:none;border-width:0px;border-color:rgb(34,34,34);border-style:none;text-transform:uppercase;letter-spacing:-1px}.tp-caption.revslider-excerpt-lower,.revslider-excerpt-lower{font-size:22px;line-height:30px;background-color:transparent;text-decoration:none;border-width:0px;border-color:rgb(34,34,34);border-style:none;letter-spacing:-1px}.tp-caption.revslider-big-text-lower,.revslider-big-text-lower{font-size:40px;line-height:64px;text-decoration:none;background-color:transparent;border-width:0px;border-color:rgb(34,34,34);border-style:none}.tp-caption.revslider-regular,.revslider-regular{text-decoration:none;font-size:16px;line-height:28px;background-color:transparent;border-width:0px;border-color:rgb(34,34,34);border-style:none}.hesperiden.tparrows {
    	cursor:pointer;
    	background:rgba(0,0,0,0.5);
    	width:40px;
    	height:40px;
    	position:absolute;
    	display:block;
    	z-index:100;
        border-radius: 50%;
    }
    .hesperiden.tparrows:hover {
    	background:rgba(0, 0, 0, 1);
    }
    .hesperiden.tparrows:before {
    	font-family: "revicons";
    	font-size:20px;
    	color:rgb(255, 255, 255);
    	display:block;
    	line-height: 40px;
    	text-align: center;
    }
    .hesperiden.tparrows.tp-leftarrow:before {
    	content: "\e82c";
        margin-left:-3px;
    }
    .hesperiden.tparrows.tp-rightarrow:before {
    	content: "\e82d";
        margin-right:-3px;
    }
    .hesperiden.tp-bullets {
    }
    .hesperiden.tp-bullets:before {
    	content:" ";
    	position:absolute;
    	width:100%;
    	height:100%;
    	background:transparent;
    	padding:10px;
    	margin-left:-10px;margin-top:-10px;
    	box-sizing:content-box;
       border-radius:8px;

    }
    .hesperiden .tp-bullet {
    	width:12px;
    	height:12px;
    	position:absolute;
    	background: rgb(153, 153, 153); /* old browsers */
        background: -moz-linear-gradient(top,  rgb(153, 153, 153) 0%, rgb(225, 225, 225) 100%); /* ff3.6+ */
        background: -webkit-linear-gradient(top,  rgb(153, 153, 153) 0%,rgb(225, 225, 225) 100%); /* chrome10+,safari5.1+ */
        background: -o-linear-gradient(top,  rgb(153, 153, 153) 0%,rgb(225, 225, 225) 100%); /* opera 11.10+ */
        background: -ms-linear-gradient(top,  rgb(153, 153, 153) 0%,rgb(225, 225, 225) 100%); /* ie10+ */
        background: linear-gradient(to bottom,  rgb(153, 153, 153) 0%,rgb(225, 225, 225) 100%); /* w3c */
        filter: progid:dximagetransform.microsoft.gradient(
        startcolorstr="rgb(153, 153, 153)", endcolorstr="rgb(225, 225, 225)",gradienttype=0 ); /* ie6-9 */
    	border:3px solid rgb(229, 229, 229);
    	border-radius:50%;
    	cursor: pointer;
    	box-sizing:content-box;
    }
    .hesperiden .tp-bullet:hover,
    .hesperiden .tp-bullet.selected {
    	background:rgb(102, 102, 102);
    }
    .hesperiden .tp-bullet-image {
    }
    .hesperiden .tp-bullet-title {
    }

</style>
<link rel="stylesheet" id="jquery-colorbox-css" href="{{asset('assets/colorbox.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="bootstrap-css" href="{{asset('assets/bootstrap.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-main-style-css" href="{{asset('assets/style.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-preset-color-css" href="{{asset('assets/green.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-owl-carousel-css" href="{{asset('assets/owl.carousel.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-animate-css" href="{{asset('assets/animate.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-open-sans-css" href="{{asset('assets/css') }}" type="text/css" media="all">
<link rel="stylesheet" id="media_center-font-awesome-css" href="{{asset('assets/font-awesome.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" id="js_composer_front-css" href="{{asset('assets/js_composer.min.css') }}" type="text/css" media="all">

<link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')}}">
<link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" />


<script type="text/javascript" src="{{asset('assets/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/jquery.themepunch.revolution.min.js') }}"></script>

<script type="text/javascript" src="{{asset('assets/add-to-cart.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/woocommerce-add-to-cart.js') }}"></script>


<link rel="stylesheet" type="text/css" href="{{asset('noty/animate.css') }}">

<meta name="generator" content="WordPress 4.8.9">
<meta name="generator" content="WooCommerce 3.1.1">
<link rel="canonical" href="{{Config::get('constant.options.sitelink')}}">
<link rel="shortlink" href="{{Config::get('constant.options.sitelink')}}">

	<noscript>
    <style>.woocommerce-product-gallery{ opacity: 1 !important; }</style>
  </noscript>
	<style type="text/css">
    .recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}
  </style>
	<meta name="generator" content="Powered by Visual Composer - drag and drop page builder for WordPress.">
  <meta name="generator" content="Powered by Slider Revolution 5.4.5.1 - responsive, Mobile-Friendly Slider Plugin for WordPress with comfortable drag and drop interface.">
  <link rel="icon" href="{{Config::get('constant.options.icon')}}" sizes="32x32">
  <link rel="icon" href="{{Config::get('constant.options.icon')}}" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="{{Config::get('constant.options.icon')}}">
  <meta name="msapplication-TileImage" content="{{Config::get('constant.options.icon')}}">
<script type="text/javascript">function setREVStartSize(e){
				try{ var i=jQuery(window).width(),t=9999,r=0,n=0,l=0,f=0,s=0,h=0;
					if(e.responsiveLevels&&(jQuery.each(e.responsiveLevels,function(e,f){f>i&&(t=r=f,l=e),i>f&&f>r&&(r=f,n=e)}),t>r&&(l=n)),f=e.gridheight[l]||e.gridheight[0]||e.gridheight,s=e.gridwidth[l]||e.gridwidth[0]||e.gridwidth,h=i/s,h=h>1?1:h,f=Math.round(h*f),"fullscreen"==e.sliderLayout){var u=(e.c.width(),jQuery(window).height());if(void 0!=e.fullScreenOffsetContainer){var c=e.fullScreenOffsetContainer.split(",");if (c) jQuery.each(c,function(e,i){u=jQuery(i).length>0?u-jQuery(i).outerHeight(!0):u}),e.fullScreenOffset.split("%").length>1&&void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0?u-=jQuery(window).height()*parseInt(e.fullScreenOffset,0)/100:void 0!=e.fullScreenOffset&&e.fullScreenOffset.length>0&&(u-=parseInt(e.fullScreenOffset,0))}f=u}else void 0!=e.minHeight&&f<e.minHeight&&(f=e.minHeight);e.c.closest(".rev_slider_wrapper").css({height:f})
				}catch(d){console.log("Failure at Presize of Slider:"+d)}
			};</script>
		<style type="text/css">
  			h1, .h1,
  			h2, .h2,
  			h3, .h3,
  			h4, .h4,
  			h5, .h5,
  			h6, .h6{
  				font-family: 'Open Sans', sans-serif;
  			}

  			body {
  				font-family: 'Open Sans', sans-serif;
  			}
	</style>
	<style type="text/css">
			.top-left .open > .dropdown-menu,
			.top-left .open > .dropdown-menu > .dropdown-submenu > .dropdown-menu {
			  animation-name: fadeInUp;
			}

			.top-right .open > .dropdown-menu,
			.top-right .open > .dropdown-menu > .dropdown-submenu > .dropdown-menu {
			  animation-name: fadeInUp;
			}

			#top-megamenu-nav .open > .dropdown-menu,
			#top-megamenu-nav .open > .dropdown-menu > .dropdown-submenu > .dropdown-menu {
			  animation-name: fadeInUp;
			}

			#top-mega-nav .open > .dropdown-menu,
			#top-mega-nav .open > .dropdown-menu > .dropdown-submenu > .dropdown-menu {
			  animation-name: fadeInUp;
			}
	</style>
	<style type="text/css">
			.label-52 > span {color: #FFFFFF;}
      .label-52.ribbon:after {border-top-color: #59b210;}
      .label-61 > span {color: #FFFFFF;}
      .label-61.ribbon:after {border-top-color: #407ac5;}
  </style>
	<style type="text/css">
		.page-id-302 #breadcrumb-alt {
      display: none;
    }
    .page-id-490 #breadcrumb-alt {
      margin-bottom: 0;
    }
    .page-id-490 #main-content {
      padding-top: 0;
    }
  </style>
	<style type="text/css" data-type="vc_shortcodes-custom-css">
    .vc_custom_1446456645123{margin-top: -40px !important;}
  </style>
  <noscript>
    <style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }
    </style>
  </noscript>
</head>

<body class="page-template page-template-mc-page-header-2-freestyle page-template-mc-page-header-2-freestyle-php page page-id-302 page-child parent-pageid-548 logged-in wpb-js-composer js-comp-ver-5.2 vc_responsive">
	<?php $connected = @fsockopen("www.google.com",80) ?>
  @if($connected)
  <div id="yith-wcwl-popup-message" style="display: none;">
    <div id="yith-wcwl-message"></div>
  </div>
  <div id="page" class="wrapper">
    <nav class="top-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin animate-dropdown">
            <ul id="menu-top-left" class="top-left">
              <li id="menu-item-1989" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-1989 dropdown">
                <a title="{{Config::get('constant.options.sitename')}} Home" href="{{Config::get('constant.options.sitelink')}}">
                  <i class="icon icon-home"></i>Home
                </a>
              </li>
              <li id="menu-item-1991" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1991 dropdown">
                <a title="{{Config::get('constant.options.sitename')}} Contact" href="{{Config::get('constant.options.sitelink')}}contact" >
                  <i class="icon icon-envelope"></i>Contact
                </a>
              </li>
              <li id="menu-item-1990" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1990">
                <a title="{{Config::get('constant.options.sitename')}} Terms" href="{{Config::get('constant.options.sitelink')}}terms-and-conditions">
                  <i class="icon icon-note"></i>Terms
                </a>
              </li>
              <li id="menu-item-1992" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1992">
                <a title="{{Config::get('constant.options.sitename')}} FAQ" href="{{Config::get('constant.options.sitelink')}}frequently-asked-questions">
                  <i class="icon icon-question"></i>FAQ
                </a>
              </li>
            </ul>
          </div><!-- /.col -->

          <div class="col-xs-12 col-sm-6 no-margin animate-dropdown">
            <ul class="right top-right">
              <li id="menu-item-1998" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-1998 dropdown">
                <a title="{{Config::get('constant.options.sitename')}} Shop" href="{{Config::get('constant.options.sitelink')}}shop" >
                  <i class="icon icon-home"></i> Shop
                </a>
              </li>
              <li id="menu-item-2001" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2001">
                <a title="{{Config::get('constant.options.sitename')}} Cart" href="{{Config::get('constant.options.sitelink')}}cart">
                  <i class="icon icon-basket"></i> Cart
                </a>
              </li>
              <li id="menu-item-2000" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2000">
                <a title="{{Config::get('constant.options.sitename')}} Track Order" href="{{Config::get('constant.options.sitelink')}}search-negotiation">
                  <i class="icon icon-handbag"></i> Negotiations
                </a>
              </li>
              <li id="menu-item-2000" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2000">
                <a title="{{Config::get('constant.options.sitename')}} Track Order" href="{{Config::get('constant.options.sitelink')}}track-your-order">
                  <i class="icon icon-graph"></i> Track Order
                </a>
              </li>
              <li id="menu-item-1999" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1999">
                <a title="{{Config::get('constant.options.sitename')}} My Account" href="{{Config::get('constant.options.sitelink')}}my-account">
                  <i class="icon icon-user"></i> My Account
                </a>
              </li>
            </ul>
          </div><!-- /.col -->
        </div><!-- /.container -->
      </nav><!-- /.top-bar -->
      <header class="no-padding-bottom header-alt">
        <div class="container hidden-md hidden-lg">
          <div class="handheld-header">
            <div class="logo">
            	<a href="{{Config::get('constant.options.sitelink')}}" rel="{{Config::get('constant.options.sitename')}} home">
                <img src="{{Config::get('constant.options.icon')}}" style="width:233px;height:54px"/>
              </a>
            </div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->
            <div class="handheld-navigation-wrapper">
        			<div class="handheld-navbar-toggle-buttons clearfix">
        				<button class="navbar-toggler navbar-toggle-hamburger pull-right flip" type="button">
        					<i class="fa fa-bars" aria-hidden="true"></i>
        				</button>
        				<button class="navbar-toggler navbar-toggle-close pull-right flip" type="button">
        					<i class="fa fa-times"></i>
        				</button>
        			</div>
              <div class="handheld-navigation" id="default-hh-header">
				            <span class="mchm-close">Close</span>
            				<ul id="menu-all-departments-menu" class="nav nav-inline yamm">
											@foreach($category as $cat)
											{{!$url = str_replace(' ','-',$cat->categoryName)}}
                      <li id="menu-item-1229" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1229">
                        <a title="{{$cat->categoryName}}" href="{{Config::get('constant.options.sitelink')}}product-category/{{$url}}">
                          {{ucwords($cat->categoryName)}}
                        </a>
                      </li>
											@endforeach

                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="header-content hidden-xs hidden-sm">
              <div class="container no-padding">
                <div class="col-xs-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                  <div class="logo">
                    <a href="{{Config::get('constant.options.sitelink')}}" rel="{{Config::get('constant.options.sitename')}} home">
                      <img src="{{Config::get('constant.options.icon')}}" style="width:233px;height:54px"/>
                    </a>
                  </div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->            </div><!-- /.logo-holder -->
                  <div class="col-xs-12 col-md-6 top-search-holder no-margin">
                    <div class="contact-row">
                      <div class="phone inline">
                        <i class="fa fa-phone"></i> {{Config::get('constant.options.sitephone')}}
                      </div>
                      <div class="contact inline">
                        <i class="fa fa-envelope"></i> {{Config::get('constant.options.siteemail')}}
                      </div>
                    </div><!-- /.contact-row -->
                    <div class="mc-search-bar">
											{!! Form::open(['url' => 'search', 'files' => true, 'class' => 'forms-sample']) !!}
                        <div class="input-group">
                          <label class="sr-only screen-reader-text" for="s">Search for:</label>
                          <span class="twitter-typeahead" style="position: relative; display: inline-block;">
                            <input type="text" class="search-field tt-hint" dir="ltr" value="" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box border-box rgb(255, 255, 255);">
                            <input type="text" class="search-field tt-input" dir="ltr" value="" name="s" placeholder="Search for products" autocomplete="off" spellcheck="false" style="position: relative; vertical-align: top; background-color: transparent;">
                            <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                            <div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;">
                              <div class="tt-dataset tt-dataset-search"></div>
                            </div>
                          </span>
                          <div class="input-group-addon has-categories-dropdown">
                            <select name="product_cat" id="product_cat" class="postform hasCustomSelect" style="-webkit-appearance: menulist-button; position: absolute; opacity: 0; height: 25px; font-size: 14px; width: 160px;">
                            	<option value="all">All Categories</option>
																@foreach($category as $cat)
	                            		<option class="level-0" value="{{$cat->categoryID}}">{{ucwords($cat->categoryName)}}</option>
																@endforeach
                            </select>
                            <span class="mc-search-bar-select postform" style="display: inline-block;">
                              <span class="mc-search-bar-selectInner" style="width: 140px; display: inline-block;">All Categories</span>
                            </span>
                            <button type="submit"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
												{!! Form::close() !!}
                    </div>
                  </div><!-- /.top-search-holder -->
                  <div class="col-xs-12 col-md-3 top-cart-row no-margin">
                    <div class="top-cart-row-container">
                      <div class="wishlist-compare-holder">
                        <div class="wishlist">
                          <a id="yith-wishlist-link" href="{{Config::get('constant.options.sitelink')}}wishlist">
                            <i class="fa fa-heart"></i>
                            Wishlist
													  <span id="top-cart-wishlist-count" class="value">
															(<span class="siteloader"></span>)</span>
                          </a>
													<div ></div>
                        </div><!-- /.wishlist -->
                      </div><!-- /.wishlist-compare-holder -->
                      <div class="top-cart-holder dropdown animate-dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                          <div class="basket-item-count">
                            <span class="cart-items-count count"><p class="siteloader2"></p></span>
                            <img width="51" height="49" alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADMAAAAxCAYAAAB3aZEhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2RpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDozRDYwQTgzNTgxMTZFMzExQjJDMUMzMERFMEQ4QzQyMyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowOUYzNDgwMEU3MDkxMUUzQUQ3QUY0QTNENkEwQjZEQSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowOUYzNDdGRkU3MDkxMUUzQUQ3QUY0QTNENkEwQjZEQSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDpBRTA2MjEyOUZDRTZFMzExOTQ5Njg5ODlEOEFEMEQxOSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozRDYwQTgzNTgxMTZFMzExQjJDMUMzMERFMEQ4QzQyMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pj0Gi6AAAAO0SURBVHja3JpriE1RFMf3jMuMkUcIMxhGniNmxqsUyiSTyJfxmJEIeaTkMd5fRgpFPpBEwgc+iJI8GwzJowg34zEegxCmIRp5jpm5/stdN6fT3veec+492zmz6jen1j533/Ofvfdaa+9zk0KhkGgqFqA/wWAwFZc1YCz7PoEqcB1cBLVeFpGXl/dPDGw7WCy5bzl4AfaAneCXl0Ul87Uoyj29wFZwEnTyg5g6C/eOB0dAK6+L2WXxflpTJZ4OALDN4BWYCNqBTJCt+MxSsB+89erIUHw+DIrBBDAMjAOVks+0B5O9PM3M9gOUg1ngp6Q9309iInYb3JL4B4EUv4kRCjHdQA8/iglKfBSe+/lRzCNFHsr1oxgqZ95L/EP8KOYLeCrx0zRL9ZsY1brJAt3/03NTjdjVqZgKiY9GZYBmEc24WrkP7oEDoK1dMQ9AvQfWzQKwjkemA5gDVtsV81JRiw3WKKQ1WKmo5m2JoSDwWOKnadZSk5iZvLcy23O7YgTPU7P15GrAbWsDVkj8VCAfdCImqAgC2RrEzAO9Jf7L4LwTMRTRGiT+HJeF0EJfpmjbxqNjW8wbRndZs4g3i2a7YBwVu2JqFZXAQBcrgXSwROJvBJv46kiM4ESlczuwFnSW+E+DK04rgIjdlfjSQH8XhORwkjRbHY+KiFdMpWI7MCLBQpL4gWXT95hiw2hbDB3ZvpP4p3KGTpTNFuGTIlny3hhv1Ryxb+CGxN+Hi770BAih9bdF0bZDEYT+WsDBl9GR1AyJfwpPt3M8Hb866DvExWMXSdsTET4TF4kUU8YUSNooHyx0IRiQyBIR421EsoOOGzn2V2usmOkE9UyidppmewYKRfhI122rMO5Z3BAjOBDQyeZRcyZOoFF5T0fGn63cHIjzy+jkZjoYDaaBUbwtSOG+7b5jTOLrd16X6437FbfFROwqE6lyO3JlYHeRh7gyr2FsWSDB04J2nb85jDq1NAcjGveaMVpfTpoPeXt9U4Tfkdrpv4g3W1WcGKlsGa57ZHI5bGaYSndKoEPBfAsBYgMolSThAhZ5VsfINBfhV4gZiva5imrBaGMkQownMrt5Dbouhl7Aj7RwqhLNii3Uavk6xGRa6INGrUWMh41lWTrEfLBwDyW8+ijtHy30UaNDzB0hf4lrtBMxAsBxC/+Mch1iqMxfJdQ/Q7kE9sXo4xQ4FKWdzpZf68ozFJYngWsGUdUc5Qot7GsaOHyXGgrXBj48oeCw13It1JR+opUsmpD9EWAAYa+2sbNYLc8AAAAASUVORK5CYII=">
                          </div>
                          <div class="total-price-basket">
                            <span class="lbl">Your Cart:</span>
                            <span class="total-price ft-22">
                              <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol naira">&#8358;</span>
																<b class="siteloader3"></b></span>
                              </span>
                            </div>
                          </a>
													<ul class="dropdown-menu dropdown-menu-mini-cart">
														<div class="cart_details">
														</div>
													</ul>
                      </div><!-- /.top-cart-holder -->
                    </div><!-- /.top-cart-row-container -->
                  </div><!-- /.top-cart-row -->
                </div><!-- /.container -->

								<script>
								function loadlink(){
									$('.siteloader').load('{{Config::get('constant.options.sitelink')}}viewwishlist');
									$('.siteloader2').load('{{Config::get('constant.options.sitelink')}}viewcart');
									$('.siteloader3').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
									$('.cart_details').load('{{Config::get('constant.options.sitelink')}}cart_details');
								}
								loadlink();
								setInterval(function (){
									loadlink()
								},1000);
							</script>
                <!-- ========================================= NAVIGATION ========================================= -->
                <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
                  <div class="container">
                    <div class="yamm navbar header-1-primary-navbar">
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                      </div><!-- /.navbar-header -->
                      <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                        <ul id="menu-main-menu" class="navbar-nav nav">
													{{! $caty = App\category::inRandomOrder()->orderby('categoryName','ASC')->take(6)->get() }}
													@foreach($caty as $cat)
													{{!$url = str_replace(' ','-',$cat->categoryName)}}
		                      <li id="menu-item-1203" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-1229">
		                        <a title="{{$cat->categoryName}}" href="{{Config::get('constant.options.sitelink')}}product-category/{{$url}}">
		                          {{ucwords($cat->categoryName)}}
		                        </a>
		                      </li>
													@endforeach
                      </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.navbar -->
                </div><!-- /.container -->
              </nav>
              <!-- ========================================= NAVIGATION : END ========================================= -->
            </div>
          </header><!-- /.header-alt -->
					<style>
					.add_wishlist, .newcart{
						cursor: pointer;
					}
					.siteloader3, .naira{
						font-size: 15px;
					}
					</style>

        @yield('content')


<footer class="color-bg" id="footer">
  <div class="container">
    <div class="row widgets-row">
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 columns">
        <aside class="widget clearfix">
          <div class="body">
            <h4 class="widget-title">Featured Products</h4>
            <ul class="product_list_widget">
							{{!$features=App\featureproduct::orderby('id','DESC')->take(3)->get()}}
							@foreach($features as $feature)
							{{!$product=App\product::where('productID',$feature->productID)->first()}}
							{{!$url = str_replace(' ','-',$product->productName)}}
              <li>
								<a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                  <img width="73" height="73"
									 src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
									 class="attachment-shop_thumbnail size-shop_thumbnail echo-lazy-loading wp-post-image"
									  alt="{{ucwords($product->productName)}}"
										srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 73w,
										{{Config::get('constant.options.sitelink').$product->thumb2}} 150w,
										{{Config::get('constant.options.sitelink').$product->thumb3}} 300w,
										{{Config::get('constant.options.sitelink').$product->thumb4}} 325w"
										sizes="(max-width: 73px) 100vw, 73px"
										data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                  <span class="product-title">{{ucwords($product->productName)}}</span>
                </a>
                <span class="mc-price-wrapper">
                  <del>
                    <span class="woocommerce-Price-amount amount">
											  @if(!empty($product->oldPrice))
                      		<span class="woocommerce-Price-currencySymbol">&#8358;</span>
													{{number_format($product->oldPrice,2)}}
										</span>
												@endif
                    </del>
                    <ins>
                      <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
                      </span>
                    </ins>
                  </span>
                </li>
								@endforeach
                </ul>
              </div>
            </aside>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 columns">
            <aside class="widget clearfix">
              <div class="body">
                <h4 class="widget-title">Special Offers</h4>
                <ul class="product_list_widget">
									{{!$features=App\specialoffer::orderby('id','DESC')->take(3)->get()}}
									@foreach($features as $feature)
									{{!$product=App\product::where('productID',$feature->productID)->first()}}
									{{!$url = str_replace(' ','-',$product->productName)}}
		              <li>
										<a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
		                  <img width="73" height="73"
											 src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
											 class="attachment-shop_thumbnail size-shop_thumbnail echo-lazy-loading wp-post-image"
											  alt="{{ucwords($product->productName)}}"
												srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 73w,
												{{Config::get('constant.options.sitelink').$product->thumb2}} 150w,
												{{Config::get('constant.options.sitelink').$product->thumb3}} 300w,
												{{Config::get('constant.options.sitelink').$product->thumb4}} 325w"
												sizes="(max-width: 73px) 100vw, 73px"
												data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
		                  <span class="product-title">{{ucwords($product->productName)}}</span>
		                </a>
		                <span class="mc-price-wrapper">
		                  <del>
		                    <span class="woocommerce-Price-amount amount">
													  @if(!empty($product->oldPrice))
		                      		<span class="woocommerce-Price-currencySymbol">&#8358;</span>
															{{number_format($product->oldPrice,2)}}
												</span>
														@endif
		                    </del>
		                    <ins>
		                      <span class="woocommerce-Price-amount amount">
		                        <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
		                      </span>
		                    </ins>
		                  </span>
		                </li>
										@endforeach
                 </ul>
               </div>
             </aside>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 columns">
             <aside class="widget clearfix">
               <div class="body">
                 <h4 class="widget-title">Brands</h4>
                 <ul class="product_list_widget">
									 {{!$brands=App\brand::orderby('id','DESC')->take(3)->get()}}
									 @foreach($brands as $brand)
                   <li>
                     <a href="{{Config::get('constant.options.sitelink')}}shop?filter={{urlencode($brand->brandName)}}">
                       <img width="73" height="73" src="{{Config::get('constant.options.sitelink').$brand->brandLogo}}"
											 class="attachment-shop_thumbnail size-shop_thumbnail echo-lazy-loading wp-post-image"
											 alt=""
											 srcset="{{Config::get('constant.options.sitelink').$brand->brandLogo}} 73w,
											 {{Config::get('constant.options.sitelink').$brand->brandLogo}} 150w,
											 {{Config::get('constant.options.sitelink').$brand->brandLogo}} 300w"
											 sizes="(max-width: 73px) 100vw, 73px"
											  data-echo="{{Config::get('constant.options.sitelink').$brand->brandLogo}}">
                       <span class="product-title">{{ucwords($brand->brandName)}}</span>
											 <p style="color:black; font-size:12px;">
												 <?php $pCount=App\product::where('brandID','=',$brand->brandID)->count(); ?>
												 {{number_format($pCount)}} Number of Available Product for {{ucwords($brand->brandName)}}
											 </p>
                     </a>
                   </li>
									 @endforeach
                 </ul>
               </div>
             </aside>
           </div>
         </div><!-- /.widgets-row-->
       </div><!-- /.container -->
       <div class="sub-form-row">
	        <div class="container">
	            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
								{!! Form::open(['url' => 'search', 'files' => true, 'class' => 'forms-sample']) !!}
      						<label class="sr-only screen-reader-text" for="s">Search for:</label>
      						<input type="text" value="" name="s" id="s" placeholder="Search for products">
									<input type="text" name="product_cat" value="all" hidden="hidden"/>
      						<button type="submit" class="le-button"> <i class="fa fa-search"></i> Search</button>
      						<input type="hidden" name="post_type" value="product">
      					{!! Form::close()!!}
	            </div>
	        </div><!-- /.container -->
	    </div><!-- /.sub-form-row -->
      <div class="link-list-row">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-md-4 ">
              <!-- ============================================================= CONTACT INFO ============================================================= -->
              <div class="contact-info">
                <div class="footer-logo">
                  <img alt="logo" src="{{Config::get('constant.options.icon')}}" width="233" height="54">
                </div><!-- /.footer-logo -->
                <p>{{Config::get('constant.options.mainaddress')}} ({{Config::get('constant.options.sitephone')}})</p>
                <div class="social-icons">
                  <ul>
                    <li>
                      <a class="fa fa-facebook" href="{{Config::get('constant.options.facebook')}}"></a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.contact-info -->
              <!-- ============================================================= CONTACT INFO : END ============================================================= -->
            </div>
            <div class="col-xs-12 col-md-8">
              <!-- ============================================================= LINKS FOOTER ============================================================= -->
              <div class="footer-bottom-widget-area">
                <div class="columns">
                  <aside class="widget clearfix">
                    <div class="body">
                      <h4 class="widget-title">Categories</h4>
                      <ul class="menu-find-it-fast menu">
												{{!$category=App\category::all()}}
												@foreach($category as $cat)
			                  {{!$url = str_replace(' ','-',$cat->categoryName)}}
                        <li class="cat-item cat-item-110">
													<a href="{{Config::get('constant.options.sitelink')}}product-category/{{$url}}">
														{{ucwords($cat->categoryName)}}
													</a>
												</li>
												@endforeach
                      </ul>
                    </div>
                  </aside>
                </div>
                <div class="columns">
                  <aside class="widget clearfix">
                    <div class="body">
                      <h4 class="widget-title">Pages</h4>
                      <ul>
                  			<li>
													<a href="{{Config::get('constant.options.sitelink')}}account">Login</a>
												</li>
												@if(session()->has('username') > 0)
                        <li>
													<a href="{{Config::get('constant.options.sitelink')}}logout">Log out</a>
												</li>
												@endif
                  			<li>
													<a href="{{Config::get('constant.options.sitelink')}}contact">Contact</a>
												</li>
                  			<li>
													<a href="{{Config::get('constant.options.sitelink')}}faq">FAQ</a>
												</li>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}terms-and-conditions">Terms and Conditions</a>
                        </li>
                      </ul>
                    </div>
                  </aside>
                </div>
                <div class="columns">
                  <aside class="widget clearfix">
                    <div class="body">
                      <h4 class="widget-title">My Account</h4>
                      <ul>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}shop">Shop</a>
                        </li>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}cart">Cart</a>
                        </li>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}checkout">Checkout</a>
                        </li>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}track-your-order">Track Order</a>
                        </li>
                        <li>
                          <a href="{{Config::get('constant.options.sitelink')}}my-account">My Account</a>
                        </li>
                      </ul>
                    </div>
                  </aside>
                </div>
              </div>
              <!-- ============================================================= LINKS FOOTER : END ============================================================= -->
            </div><!-- /.col -->
          </div>
        </div><!-- /.container -->
      </div><!-- /.link-list-row -->
      <div class="copyright-bar">
        <div class="container">
          <div class="col-xs-12 col-sm-6 no-margin">
            <div class="copyright">
              {{date('Y')}} <a href="#">{{ucwords(Config::get('constant.options.sitename'))}}</a>
               - All Rights Reserved
             </div><!-- /.copyright -->
           </div>
           <div class="col-xs-12 col-sm-6 no-margin">
             <div class="payment-methods ">
               <ul>
                 <li><img src="{{ asset('assets/paystack.png') }}" alt="" style="width:150px" height="29"></li>
               </ul>
             </div><!-- /.payment-methods -->
           </div>
         </div><!-- /.container -->
       </div><!-- /.copyright-bar -->
       <div class="mc-handheld-footer-bar hidden-md hidden-lg">
         <ul class="columns-5">
					 <li class="compare">
					 <a href="{{Config::get('constant.options.sitelink')}}" class="has-icon" title="Home">
						 <i class="icon icon-home"></i>
					 </a>
				 </li>
				 <li class="compare">
					 <a href="{{Config::get('constant.options.sitelink')}}shop" class="has-icon" title="Shop">
						 <i class="icon icon-home"></i>
					 </a>
				 </li>
           <li class="my-account">
             <a class="has-icon" href="{{Config::get('constant.options.sitelink')}}my-account" title="My Account">
               <i class="fa fa-user"></i><span class="sr-only">My Account</span>
             </a>
           </li>
           <li class="cart">
             	<a class="footer-cart-contents has-icon" href="{{Config::get('constant.options.sitelink')}}cart" title="View your shopping cart">
                <i class="fa fa-shopping-cart"></i><span class="cart-items-count count"><p class="siteloader2"></p></span>
              </a>
            </li>
            <li class="wishlist">
              <a href="{{Config::get('constant.options.sitelink')}}wishlist" class="has-icon" title="View your wishlist">
                <i class="fa fa-heart"></i><span class="count"><span class="siteloader"></span></span>
              </a>
            </li>
            <li class="compare">
              <a href="{{Config::get('constant.options.sitelink')}}search-negotiation" class="has-icon" title="Search Negotiation">
                <i class="icon icon-handbag"></i>
              </a>
            </li>
            <li class="compare">
              <a href="{{Config::get('constant.options.sitelink')}}track-your-order" class="has-icon" title="Track Order">
                <i class="icon icon-graph"></i>
              </a>
            </li>
            <li class="search">
              <a class="has-icon" href="#">
                <i class="fa fa-search"></i><span class="sr-only">Search</span>
              </a>
              <div class="site-search">
                <div class="widget woocommerce widget_product_search">
                  {!! Form::open(['url' => 'search', 'files' => true, 'class' => 'forms-sample']) !!}
                    <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                    <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="" name="s">
 									 <input type="text" name="product_cat" value="all" hidden="hidden" />
                    <input type="submit" value="Search">
                 {!! Form::close()!!}
                </div>
              </div>
            </li>
						<li class="compare">
              <a href="{{Config::get('constant.options.sitelink')}}contact" class="has-icon" title="Contact">
                <i class="icon icon-envelope"></i>
              </a>
            </li>
						<li class="compare">
              <a href="{{Config::get('constant.options.sitelink')}}frequently-asked-questions" class="has-icon" title="Frequently Asked Questions">
                <i class="icon icon-question"></i>
              </a>
            </li>
          </ul>
        </div>
      </footer>
    </div><!-- /.wrapper -->
		@else
		<?php
		$urL=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? "https":"http")."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		 ?>

<main class="inner" id="page-404" style="margin-top:0px">
	<div class="container">
		<div class="row">
			<div class="col-md-8 center-block">
				<div class="info-404 text-center">
					<h2 class="primary-color inner-bottom-xs">503</h2>
					<p class="lead">Sorry, connection to the required page failed. Try checking your internet connection.</p>
					<div class="text-center">
						<a class="btn-lg" href="{{$urL}}"><i class="fa fa-refresh"></i> Refresh </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


			@endif
      <script type="text/javascript" src="{{ asset('assets/scripts.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.blockUI.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js.cookie.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/woocommerce.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/cart-fragments.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/woocompare.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.colorbox-min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.prettyPhoto.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.selectBox.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.yith-wcwl.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/bootstrap.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/bootstrap-hover-dropdown.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/owl.carousel.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/echo.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/css_browser_selector.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.easing-1.3.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.customSelect.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/typeahead.bundle.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/handlebars.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/wow.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery.jplayer.min.js') }}"></script>

  <script src="{{ asset('js/owl-carousel.js') }}"></script>
      <script type="text/javascript">
        /* <![CDATA[ */
        var mc_options = {};
        /* ]]> */
      </script>
      <script type="text/javascript" src="{{ asset('assets/scripts.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js_composer_front.min.js') }}"></script>
			 <script type="text/javascript" src="{{ asset('assets/windowopen.js') }}"></script>
			 <script type="text/javascript" src="{{ asset('assets/boxOver.js') }}"></script>
			 <script src="{{asset('noty/jquery.noty.packaged.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
			<script>
			$(function (){
			  $(document).on("click", ".number-count", function(){
					var qty=$('.qty').val();
					$(".btk").data('quantity', qty);
					var newCount = $(".btk").data('quantity');
					//alert(newCount);
				});
			});

			$(function (){
			  $(document).on("click", ".newcart2", function(){
			    var qty=$(this).data('quantity');
			    var price = $(this).data('product_price');
			    var product_id = $(this).data('product_id');
			    alert('Quantity=>'+qty+'\n SinglePrice=>'+price+'\n productID=>'+product_id);

			  });
			});


			$(function (){
			  $(document).on("click", ".newcart", function(){
			    var qty=$(this).data('quantity');
			    var price = $(this).data('product_price');
			    var product_id = $(this).data('product_id');
			    //alert(product_id);
					event.preventDefault();
                $.ajax({
                    type:'GET',
                    url:'addcart',
										data: {
														product_id: product_id,
														qty: qty,
														price: price
										},
                    success: function (data){
											var res= JSON.parse(data);
											var ty=res[0];
											var msg=''+res[1]+'';
											//alert(data);
											var n = noty({
													text: msg, type: ty, layout: "topRight", timeout: 4000,
													animation: {
															open: 'animated bounceInRight', // in order to use this you'll need animate.css
															close: 'animated bounceOutRight',
															easing: 'swing',
															speed: 500
													}
											});
											eval(n);
                    }
                });
			  });
			});


			$(function (){
			  $(document).on("click", ".add_wishlist", function(){
					var product_id = $(this).data('product-id');
			    //alert(product_id);
					event.preventDefault();
                $.ajax({
                    type:'GET',
                    url:'addwishlist',
										data: {
														product_id: product_id
										},
                    success: function (data){
											var res= JSON.parse(data);
											var ty=res[0];
											var msg=''+res[1]+'';
											//alert(data);
											var n = noty({
													text: msg, type: ty, layout: "topRight", timeout: 4000,
													animation: {
															open: 'animated bounceInRight', // in order to use this you'll need animate.css
															close: 'animated bounceOutRight',
															easing: 'swing',
															speed: 500
													}
											});
											eval(n);
                    }
                });
			  });
			});

			$(function (){
			  $(document).on("click", ".minus-cart", function(){
					var product_id = $(this).data('product_id');
			    //alert(product_id);

					event.preventDefault();
                $.ajax({
                    type:'GET',
                    url:'removecart',
										data: {
														product_id: product_id
										},
                    success: function (data){
											var res= JSON.parse(data);
											var ty=res[0];
											var msg=''+res[1]+'';
											alert(data);
                    }
                });
			  });
			});

			function show(a,b,c){
		 	 document.getElementById(a).style.display="block";
		 	 document.getElementById(b).style.display="none";
		 	 document.getElementById(c).style.display="none";
			 $("div #tab"+a).addClass('active');
			 $("div #tab"+b).removeClass('active');
			 $("div #tab"+c).removeClass('active');
			 //$(this).addClass('active');
		  }


			</script>
      <div id="cboxOverlay" style="display: none;"></div>
      <div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;">
        <div id="cboxWrapper">
          <div>
            <div id="cboxTopLeft" style="float: left;"></div>
            <div id="cboxTopCenter" style="float: left;"></div>
            <div id="cboxTopRight" style="float: left;"></div>
          </div>
          <div style="clear: left;">
            <div id="cboxMiddleLeft" style="float: left;"></div>
            <div id="cboxContent" style="float: left;">
              <div id="cboxTitle" style="float: left;"></div>
              <div id="cboxCurrent" style="float: left;"></div>
              <button type="button" id="cboxPrevious"></button>
              <button type="button" id="cboxNext"></button>
              <button id="cboxSlideshow"></button>
              <div id="cboxLoadingOverlay" style="float: left;"></div>
              <div id="cboxLoadingGraphic" style="float: left;"></div>
            </div>
            <div id="cboxMiddleRight" style="float: left;"></div>
          </div>
          <div style="clear: left;">
            <div id="cboxBottomLeft" style="float: left;"></div>
            <div id="cboxBottomCenter" style="float: left;"></div>
            <div id="cboxBottomRight" style="float: left;"></div>
          </div>
        </div>
        <div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div>
      </div>
      <a id="scrollUp" href="#top"
      style="position: fixed; z-index: 1001; opacity: 0.00405;">
        <i class="fa fa-angle-up"></i>
      </a>
    </body>
    </html>
