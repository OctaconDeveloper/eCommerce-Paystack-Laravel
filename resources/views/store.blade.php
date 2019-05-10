@extends('header')
@section('content')
<?php
if(isset($_GET['filter'])){
  $bName=urldecode($_GET['filter']);
  $bsTCount=App\brand::where('brandName',$bName)->count();
  if($bsTCount > 0){
    $bsT=App\brand::where('brandName',$bName)->first();
    $bID=$bsT->brandID;
    $products=App\product::where('brandID',$bID)->inRandomOrder()->get();
  }
}else{
  $bsTCount = 1;
  $products=App\product::inRandomOrder()->get();
}
?>
<title>{{Config::get('constant.options.sitename')}} Shop</title>


<div id="main-content" class="main-content">
  <div id="post-523" class="post-523 page type-page status-publish hentry">
    <div id="custom-query-archive-product" class="row left-sidebar">
      <div id="content" class="site-content container">
        <div class="row">
          <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
              <h1 class="page-title">@if(isset($_GET['filter']))
                {{$bName}} @endif Shop</h1>
              <div class="control-bar">
              </div>
              <div id="grid-view" class="woocommerce active">
                <?php
                if($bsTCount > 0 ){
                  if(sizeof($products)<1){ ?>
                <ul class="products columns-3 enable-hover">
                  <p class="woocommerce-info">
                  No products were found matching your selection.</p>
                </ul>
              <?php }else{ ?>
                <ul class="items products columns-4 enable-hover">
                  @foreach($products as $product)
                  <?php $brandName=App\brand::where('brandID',$product->brandID)->first();
                  $url = str_replace(' ','-',$product->productName); ?>
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
                        </div><!-- /.hover-area -->
                      </div><!-- /.product-inner -->
                    </li>
                    @endforeach
                  </ul>
                <?php }
              }else{
                ?>
              <ul class="products columns-3 enable-hover">
                <p class="woocommerce-info">
                No products were found matching your selection.</p>
              </ul>
              <?php } ?>
              </div>
             <script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
             <script type="text/javascript" src="{{ asset('js/paginathing.js') }}"></script>
             <script type="text/javascript">
               jQuery(document).ready(function($){
                 $('.items').paginathing({
                       perPage: 16,
                       containerClass: 'woocommerce-pagination'
                 })
               });
            </script>
          </main>
        </div>
        <div id="sidebar" class="sidebar">
          <div id="secondary" class="secondary">
            <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
              <div class="product-filters">
                <div class="widgets">
                  <aside id="mc_brands_filter-2" class="widget clearfix woocommerce widget_brands_filter">
                    <h4 class="widget-title">Filter by Brands</h4>
                    <ul>
                      {{! $brands=App\brand::orderby('brandName','ASC')->get()}}
                      @foreach($brands as $brand)
                      <li class="wc-layered-nav-term ">
                        <a href="{{Config::get('constant.options.sitelink')}}shop?filter={{urlencode($brand->brandName)}}">
                          {{ucwords($brand->brandName)}}
                        </a>
                        <span class="count">({{App\product::where('brandID',$brand->brandID)->count()}})</span>
                      </li>
                      @endforeach
                    </ul>
                  </aside>
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
              <aside id="woocommerce_product_categories-2" class="widget clearfix woocommerce widget_product_categories">
                <h4 class="widget-title">Categories</h4>
                <ul class="product-categories">
                  {{! $category=App\category::orderby('categoryName','ASC')->get()}}
                  @foreach($category as $cat)
                  {{!$url = str_replace(' ','-',$cat->categoryName)}}
                  <li class="cat-item cat-item-49">
                    <a href="{{Config::get('constant.options.sitelink')}}product-category/{{$url}}">
                      {{ucwords($cat->categoryName)}}
                    </a>
                  </li>
                  @endforeach
                </ul>
              </aside>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
              <aside id="woocommerce_products-2" class="widget clearfix woocommerce widget_products">
                <h4 class="widget-title">Special Offers</h4>
                <ul class="product_list_widget">
                  {{! $special=App\specialoffer::inRandomOrder()->take(5)->get()}}
                  @foreach($special as $caty)
                  {{!$product=App\product::where('productID',$caty->productID)->first()}}
                    {{!$url = str_replace(' ','-',$product->productName)}}
                  <li>
                    <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                      <img width="73" height="73" src="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="attachment-shop_thumbnail size-shop_thumbnail echo-lazy-loading wp-post-image" alt=""
                      srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 73w,
                      {{Config::get('constant.options.sitelink').$product->thumb1}} 150w,
                      {{Config::get('constant.options.sitelink').$product->thumb2}} 300w,
                      {{Config::get('constant.options.sitelink').$product->thumb3}} 1024w,
                      {{Config::get('constant.options.sitelink').$product->thumb4}} 325w,
                      {{Config::get('constant.options.sitelink').$product->thumb2}} 186w,
                      {{Config::get('constant.options.sitelink').$product->thumb3}} 143w,
                      {{Config::get('constant.options.sitelink').$product->thumb4}} 1500w" sizes="(max-width: 73px) 100vw, 73px"
                      data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                      <span class="product-title">{{ucwords($product->productName)}}</span>
                    </a>
                    <span class="mc-price-wrapper">
                      @if(!empty($product->oldPrice))
                      <del>
                        <span class="woocommerce-Price-amount amount">
                          <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->oldPrice,2)}}
                        </span>
                      </del>
                      @endif
                      <ins>
                        <span class="woocommerce-Price-amount amount">
                          <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
                        </span>
                      </ins>
                    </span>
                  </li>
                  @endforeach
                </ul>
              </aside>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-12">
              <aside id="woocommerce_products-3" class="widget clearfix woocommerce widget_products">
                <h4 class="widget-title">Featured Products</h4>
                <ul class="product_list_widget">
                  {{! $special=App\featureproduct::inRandomOrder()->take(5)->get()}}
                  @foreach($special as $caty)
                  {{!$product=App\product::where('productID',$caty->productID)->first()}}
                    {{!$url = str_replace(' ','-',$product->productName)}}
                  <li>
                    <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                      <img width="73" height="73" src="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="attachment-shop_thumbnail size-shop_thumbnail echo-lazy-loading wp-post-image" alt=""
                      srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 73w,
                      {{Config::get('constant.options.sitelink').$product->thumb1}} 150w,
                      {{Config::get('constant.options.sitelink').$product->thumb2}} 300w,
                      {{Config::get('constant.options.sitelink').$product->thumb3}} 1024w,
                      {{Config::get('constant.options.sitelink').$product->thumb4}} 325w,
                      {{Config::get('constant.options.sitelink').$product->thumb2}} 186w,
                      {{Config::get('constant.options.sitelink').$product->thumb3}} 143w,
                      {{Config::get('constant.options.sitelink').$product->thumb4}} 1500w" sizes="(max-width: 73px) 100vw, 73px"
                      data-echo="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                      <span class="product-title">{{ucwords($product->productName)}}</span>
                    </a>
                    <span class="mc-price-wrapper">
                      @if(!empty($product->oldPrice))
                      <del>
                        <span class="woocommerce-Price-amount amount">
                          <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->oldPrice,2)}}
                        </span>
                      </del>
                      @endif
                      <ins>
                        <span class="woocommerce-Price-amount amount">
                          <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($product->productPrice,2)}}
                        </span>
                      </ins>
                    </span>
                  </li>
                  @endforeach
                </ul>
              </aside>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


@endsection
