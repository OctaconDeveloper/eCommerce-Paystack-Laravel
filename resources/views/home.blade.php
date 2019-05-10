@extends('header')
@section('content')
<title>{{Config::get('constant.options.sitename')}} Home</title>

<style>
.owl-carousel img {
  border-radius: 4px; }

.owl-carousel.full-width .owl-nav {
  position: absolute;
  top: 30%;
  width: 100%;
  margin-top: 0; }
  .owl-carousel.full-width .owl-nav .owl-next,
  .owl-carousel.full-width .owl-nav .owl-prev {
    background: transparent;
    color: #fff; }
    .owl-carousel.full-width .owl-nav .owl-next i:before,
    .owl-carousel.full-width .owl-nav .owl-prev i:before {
      width: 40px;
      height: 40px;
      background: rgba(0, 0, 0, 0.5);
      border-radius: 100%;
      font-size: 1.6rem;
      font-weight: bold;
      line-height: 40px; }
  .owl-carousel.full-width .owl-nav .owl-prev {
    float: left; }
  .owl-carousel.full-width .owl-nav .owl-next {
    float: right; }

.owl-carousel.full-width .owl-dots {
  margin-top: 1rem; }

.owl-carousel .item-video {
  width: 200px;
  height: 200px; }
  .card-img-overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1.25rem; }
      .text-center {
        text-align: center !important;
      margin-top: 150px;}
        .w-100 {
          width: 100% !important; }
          h1{
            font-weight: bolder;
            font-family: Arial Black;
            font-size: 54px;
          }
          .font-weight-normal{
            font-size: 28px;
          }
</style>

<div id="main-content" class="main-content">
  <div id="post-302" class="post-302 page type-page status-publish hentry">
    <div class="vc_row wpb_row vc_row-fluid vc_custom_1446456645123">
      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner ">
          <div class="wpb_wrapper">
            <div class="wpb_revslider_element wpb_content_element">
              <div class="forcefullwidth_wrapper_tp_banner" id="rev_slider_8_1_forcefullwidth" style="position:relative;width:100%;height:auto;margin-top:0px;margin-bottom:0px">

                  <div class="owl-carousel owl-theme full-width" style="margin: 0px auto; background: rgb(246, 246, 246); padding: 0px; height: 400px; overflow: visible; width: 1349px; left: -105px;">
                    {{!$sliders = App\slider::all()}}
                    @foreach($sliders as $slider)
                    <div class="item">
                      <div class="card text-white">
                        <img class="card-img" src="{{Config::get('constant.options.sitelink').$slider->sliderLocation}}" alt="{{$slider->sliderTitle}}" style="width:100%; height:400px;">
                        <div class="card-img-overlay d-flex">
                          <div class="mt-auto text-center w-100">
                            <h1>{{$slider->sliderTitle}}</h1>
                            <h6 class="card-text mb-4 font-weight-normal">{{$slider->sliderDetail}}</h6>
                            <a href="{{Config::get('constant.options.sitelink')}}shop">
                              <button class="button">
                                <i class="icon icon-basket"></i>
                                Shop Now
                              </button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>

                </div>
              </div>
            </div>
          </div>
<div class="vc_row wpb_row vc_row-fluid inner-top-xs">
  <div class="wpb_column vc_column_container vc_col-sm-6">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <div class="mc_banner banner  text-left">
          <a href="#" target="_self">
            <div class="banner-text">
              <h3 class="banner-title">New Life</h3>
              <span class="tagline">Introducing New Category</span>
            </div>
            <img width="570" height="157" src="{{ asset('assets/banner-narrow-01.jpg')}}" class="attachment-full size-full" alt="" data-hover="animate" data-animation="pulse"
             sizes="(max-width: 570px) 100vw, 570px">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="wpb_column vc_column_container vc_col-sm-6">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <div class="mc_banner banner  text-right">
          <a href="#" target="_self">
            <div class="banner-text">
              <h3 class="banner-title">Time &amp; Style</h3>
              <span class="tagline">Checkout New Arrivals</span>
            </div>
            <img width="570" height="157" src="{{ asset('assets/banner-narrow-02.jpg') }}" class="attachment-full size-full" alt="" data-hover="animate" data-animation="pulse" sizes="(max-width: 570px) 100vw, 570px">
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="vc_row wpb_row vc_row-fluid">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <div class="inner-top-xs inner-bottom-sm home-page-tabs">
          <div class="tab-holder">
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home-page-tab-1">Featured</a></li>
            </ul><!-- /.nav-tabs -->
            <div class="tab-content">
              <div id="home-page-tab-1" class="tab-pane active">
                <div class="woocommerce columns-4">
                  <ul class="products columns-4 enable-hover">

                    {{!$special=App\featureproduct::inRandomOrder()->take(8)->get()}}
                    @foreach($special as $caty)
                    <?php $product=App\product::where('productID',$caty->productID)->first();
                      $url = str_replace(' ','-',$product->productName);
                      $brandName=App\brand::where('brandID',$product->brandID)->first(); ?>
                    <li class="post-20 product type-product status-publish has-post-thumbnail product_cat-cameras-photography-de pa_brands-sony last instock sale featured shipping-taxable purchasable product-type-variable has-default-attributes has-children" style="height: 386px;">
                      <div class="product-inner">
                        <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                          @if(App\specialoffer::where('productID','=',$product->productID)->count() > 0 )
                          <div class="ribbon red">
                            <span class="onsale">Special Offer</span>
                          </div>
                          @endif
                          @if(App\featureproduct::where('productID','=',$product->productID)->count() > 0 )
                          <div class="ribbon label-52">
                            <span>Featured Product</span>
                          </div>
                          @endif
                          @if(strtotime('+5 day', strtotime($product->created_at)) > time())
                          <div class="ribbon label-61">
                            <span>New !</span>
                          </div>
                          @endif
                          <div class="product-thumbnail-wrapper" style="height:170px">
                            <img style="width:246px;height:100%"
                            src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                            class="attachment-shop_catalog size-shop_catalog echo-lazy-loading wp-post-image"
                            alt="{{ucwords($product->productName)}}"
                            srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 246w,
                            {{Config::get('constant.options.sitelink').$product->thumb1}} 433w"
                            sizes="(max-width: 246px) 100vw, 246px"
                            data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                          </div>
                          <div class="title-area">
                            <h2 class="woocommerce-loop-product__title">{{ucwords($product->productName)}}</h2>
                            @if(!empty($brandName->brandName))
                            <div class="product-brand">{{ucwords($brandName->brandName)}}</div>
                            @endif
                          </div>
                          <span class="price">
                            <span class="mc-price-wrapper">
                              @if(!empty($product->oldPrice))
                              <del>
                                <span class="woocommerce-Price-amount amount">
                                  <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                                  {{number_format($product->oldPrice,2)}}
                                </span>
                              </del>
                              @endif
                              <span class="woocommerce-Price-amount amount">
                                  <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                                  {{number_format($product->productPrice,2)}}
                                </span>
                              </span>
                            </span>
                          </a>
                          <div class="hover-area">
                            <div class="hover-area-inner">
                              <a rel="nofollow" data-quantity="1" data-product_id="{{$product->productID}}" data-product_price="{{$product->productPrice}}" class="button product_type_variable newcart"><i class="icon icon-basket"></i>Add to Cart</a>
                              <div class="action-buttons">
                                <div class="yith-wcwl-add-to-wishlist add-to-wishlist-20">
                                  <div class="yith-wcwl-add-button show" style="display:block">
                                    <a data-product-id="{{$product->productID}}" class="add_wishlist">
                                      Add to Wishlist
                                    </a>
                                  </div>
                                  <div style="clear:both"></div>
                                  <div class="yith-wcwl-wishlistaddresponse"></div>
                                </div>
                                <div class="clear">
                                </div>
                              </div>
                            </div>
                          </div><!-- /.hover-area -->
                        </div><!-- /.product-inner -->
                      </li>
                      @endforeach
                  </ul>
                </div>
              </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
          </div><!-- /.tab-holder -->
        </div><!-- /.home-page-tabs -->
      </div>
    </div>
  </div>
</div>
<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding" style="position: relative; left: -89.5px; box-sizing: border-box; width: 1349px;">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
        <!-- ========================================= BEST SELLERS ========================================= -->
        <section id="best-sellers-six-one-product-grid" class="six-one-products-grid  color-bg inner-bottom-sm inner-top-xs">
          <div class="container">
            <h2 class="section-title">Special Offers</h2>
            <div class="six-products-grid col-xs-12 col-md-12 no-margin">
              <div class="product-grid-holder row no-margin">
                {{!$special=App\specialoffer::inRandomOrder()->take(12)->get()}}
                @foreach($special as $caty)
                {{!$product=App\product::where('productID',$caty->productID)->first()}}
                  {{!$url = str_replace(' ','-',$product->productName)}}
                <div class="col-xs-12 col-sm-2 no-margin product">
                  <div class="product-item-wrap">
                    <div class="product-item">
                      <div class="product-item-inner">
                        <div class="product-image">
                          @if(App\specialoffer::where('productID','=',$product->productID)->count() > 0 )
                          <div class="ribbon red">
                            <span class="onsale">Special Offer</span>
                          </div>
                          @endif
                          @if(App\featureproduct::where('productID','=',$product->productID)->count() > 0 )
                          <div class="ribbon label-52">
                            <span>Featured Product</span>
                          </div>
                          @endif
                          @if(strtotime('+5 day', strtotime($product->created_at)) > time())
                          <div class="ribbon label-61">
                            <span>New !</span>
                          </div>
                          @endif
                          <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                            <img style="width:246px;height:100%"
                            src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                            class="attachment-shop_catalog size-shop_catalog echo-lazy-loading wp-post-image" alt=""
                            srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 246w,
                            {{Config::get('constant.options.sitelink').$product->thumb1}} 433w"
                            sizes="(max-width: 246px) 100vw, 246px"
                            data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}" />
                          </a>
                        </div>
                        <div class="product-body">
                          <h4 class="product-title">
                            <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                              {{ucwords($product->productName)}}
                            </a>
                          </h4>
                          @if(!empty($brandName->brandName))
                          <div class="product-brand">{{ucwords($brandName->brandName)}}</div>
                          @endif
                        </div>
                        <div class="product-price-container prices clearfix">
                        <span class="price">
                          <span class="mc-price-wrapper">
                            @if(!empty($product->oldPrice))
                            <del>
                              <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->oldPrice,2)}}
                              </span>
                            </del>
                            @endif
                            <span class="woocommerce-Price-amount amount">
                                <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
                              </span>
                            </span>
                          </span>
                        </div>
                        <div class="hover-area">
                          <div class="hover-area-inner">
                            <a rel="nofollow" data-quantity="1"
                            data-product_id="{{$product->productID}}"
                            data-product_price="{{$product->productPrice}}"
                            class="button product_type_variable newcart">
                              <i class="icon icon-basket"></i>Add to Cart</a>
                            <div class="action-buttons">
                              <div class="yith-wcwl-add-to-wishlist add-to-wishlist-20">
                                <div class="yith-wcwl-add-button show" style="display:block">
                                  <a data-product-id="{{$product->productID}}" class="add_wishlist">
                                    Add to Wishlist
                                  </a>
                                </div>
                                <div style="clear:both"></div>
                                <div class="yith-wcwl-wishlistaddresponse"></div>
                              </div>
                              <div class="clear">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div><!-- /.row -->
            </div><!-- /.col -->
          </div><!-- /.container -->
        </section><!-- /.six-one-products-grid -->
        <!-- ========================================= BEST SELLERS : END ========================================= -->
      </div>
    </div>
  </div>
</div>
<div class="vc_row-full-width vc_clearfix"></div>
<div class="vc_row wpb_row vc_row-fluid">
  <div class="wpb_column vc_column_container vc_col-sm-12">
    <div class="vc_column-inner ">
      <div class="wpb_wrapper">
         <div class="mc_products_carousel">
         <section id="section-5cc2a8cd394d2" class="inner-top-xs">
         	<div class="carousel-holder hover">
         		<div class="title-nav">
         			<h2 class="h1">Recent Products</h2>
         		</div>
         		<div class="woocommerce columns-6">
         			<div data-autoplay="no" id="5cc2a8cd394d2" class="products columns-6 products-carousel-6 enable-hover">

                {{!$products=App\product::orderby('id','DESC')->take(6)->get()}}
                @foreach($products as $product)
                  {{!$url = str_replace(' ','-',$product->productName)}}
                <div class="post-11 product type-product status-publish has-post-thumbnail product_cat-laptops-computers-de pa_brands-sony first instock featured shipping-taxable purchasable product-type-variable has-children">
         					<div class="product-inner">
         						<a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                      @if(App\specialoffer::where('productID','=',$product->productID)->count() > 0 )
                      <div class="ribbon red">
                        <span class="onsale">Special Offer</span>
                      </div>
                      @endif
                      @if(App\featureproduct::where('productID','=',$product->productID)->count() > 0 )
                      <div class="ribbon label-52">
                        <span>Featured Product</span>
                      </div>
                      @endif
                      @if(strtotime('+5 day', strtotime($product->created_at)) > time())
                      <div class="ribbon label-61">
                        <span>New !</span>
                      </div>
                      @endif
                      <div class="product-thumbnail-wrapper">
         								<img style="width:246px;height:100%"
                        src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                        class="attachment-shop_catalog size-shop_catalog echo-lazy-loading wp-post-image"
                        alt="{{ucwords($product->productName)}}"
                        srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 246w,
                        {{Config::get('constant.options.sitelink').$product->thumb1}} 433w"
                        sizes="(max-width: 246px) 100vw, 246px"
                        data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
         							</div>
                      <div class="title-area">
                        <h2 class="woocommerce-loop-product__title">{{ucwords($product->productName)}}</h2>
                        @if(!empty($brandName->brandName))
                        <div class="product-brand">{{ucwords($brandName->brandName)}}</div>
                        @endif
                      </div>
                      <span class="price">
                        <span class="mc-price-wrapper">
                          @if(!empty($product->oldPrice))
                          <del>
                            <span class="woocommerce-Price-amount amount">
                              <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->oldPrice,2)}}
                            </span>
                          </del>
                          @endif
                          <span class="woocommerce-Price-amount amount">
                              <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
                            </span>
                          </span>
                        </span>
         						</a>
         						<div class="hover-area">
                      <div class="hover-area-inner">
                        <a rel="nofollow" data-quantity="1" data-product_id="{{$product->productID}}" data-product_price="{{$product->productPrice}}" class="button product_type_variable newcart"><i class="icon icon-basket"></i>Add to Cart</a>
                        <div class="action-buttons">
                          <div class="yith-wcwl-add-to-wishlist add-to-wishlist-20">
                            <div class="yith-wcwl-add-button show" style="display:block">
                              <a data-product-id="{{$product->productID}}" class="add_wishlist">
                                Add to Wishlist
                              </a>
                            </div>
                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                          </div>
                          <div class="clear">
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
         	</section>

         </div>
       </div>
     </div>
   </div>
 </div>
</div><!-- #post-302 -->
</div>
</div><!-- #post-302 -->
</div><!-- #main-content -->

@endsection
