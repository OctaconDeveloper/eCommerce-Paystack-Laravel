{{! $ht=explode('/',Request::getRequestUri())}}
{{!$redirecturl='/'.$ht[3].'/'.$ht[4]}}
@extends('header')
@section('content')
<?php $productName=str_replace('-',' ',urldecode(Request::route('id')));
$prodCount  = App\product::where('productName',$productName)->count();
if($prodCount > 0){
 $product=App\product::where('productName',$productName)->first();
 $brand=App\brand::where('brandID',$product->brandID)->first();
 $cat=App\category::where('categoryID',$product->categoryID)->first();
 $gh=App\product_review::where('productID',$product->productID)->count();
}
?>

<title>{{ucwords($productName)}} </title>

<div id="content" class="container single single-product postid-30 woocommerce  wc-single-product vc_responsive">
  <div class="row">
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
        <div id="product-20" class="post-20 product type-product status-publish has-post-thumbnail product_cat-cameras-photography-de pa_brands-sony last instock sale featured shipping-taxable purchasable product-type-variable has-default-attributes has-children">
          <div class="images-and-summary-wrapper">
            <?php if($prodCount > 0){ ?>

            <div class="images-and-summary">
              <div class="product-images">
                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1; transition: opacity 0.25s ease-in-out 0s;">
                  <div class="flex-viewport" style="overflow: hidden; position: relative; height: 325px;">
                    <figure class="woocommerce-product-gallery__wrapper" style="width: 1000%; transition-duration: 0s; transform: translate3d(-1374px, 0px, 0px);">
                      <div data-thumb="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="woocommerce-product-gallery__image" style="width: 458px; float: left; display: block; position: relative; overflow: hidden;">
                        <a href="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                          <img width="433" height="325"
                          src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                          class="attachment-shop_single size-shop_single wp-post-image" alt="{{$productName}}" title="5" data-caption=""
                          data-src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                          data-large_image="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                          data-large_image_width="830" data-large_image_height="830"
                          srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 433w,
                          {{Config::get('constant.options.sitelink').$product->thumb1}} 246w"
                          sizes="(max-width: 433px) 100vw, 433px" draggable="false">
                        </a>
                        <img src="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="zoomImg"
                        style="position: absolute; top: -316.985px; left: -338.293px; opacity: 0; width: 830px; height: 830px; border: none; max-width: none; max-height: none;">
                      </div>
                      <div data-thumb="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="woocommerce-product-gallery__image" style="width: 458px; float: left; display: block; position: relative; overflow: hidden;">
                        <a href="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                          <img width="433" height="325" src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                          class="attachment-shop_single size-shop_single" alt="" title="6" data-caption=""
                          data-src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                          data-large_image="{{Config::get('constant.options.sitelink').$product->thumb1}}" data-large_image_width="830" data-large_image_height="830"
                          srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 433w,
                          {{Config::get('constant.options.sitelink').$product->thumb1}} 246w"
                          sizes="(max-width: 433px) 100vw, 433px" draggable="false">
                        </a>
                        <img src="{{Config::get('constant.options.sitelink').$product->thumb1}}" alt="" class="zoomImg"
                        style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 830px;
                        height: 830px; border: none; max-width: none; max-height: none;">
                      </div>

                      <div data-thumb="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="woocommerce-product-gallery__image"
                      style="width: 458px; float: left; display: block; position: relative; overflow: hidden;">
                      <a href="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                        <img width="433" height="325" src="{{Config::get('constant.options.sitelink').$product->thumb2}}"
                        class="attachment-shop_single size-shop_single" alt="hello" title="7" data-caption=""
                        data-src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                        data-large_image="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                        data-large_image_width="830" data-large_image_height="830"
                        srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 433w,
                        {{Config::get('constant.options.sitelink').$product->thumb1}} 246w"
                        sizes="(max-width: 433px) 100vw, 433px" draggable="false">
                      </a>
                      <img src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                      class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 830px; height: 830px; border: none; max-width: none; max-height: none;">
                    </div>
                    <div data-thumb="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="woocommerce-product-gallery__image flex-active-slide" style="width: 458px; float: left; display: block; position: relative; overflow: hidden;">
                      <a href="{{Config::get('constant.options.sitelink').$product->thumb1}}">
                        <img width="433" height="325" src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                        class="attachment-shop_single size-shop_single" alt="" title="8" data-caption=""
                         data-src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                         data-large_image="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                         data-large_image_width="830" data-large_image_height="830"
                         srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 433w,
                         {{Config::get('constant.options.sitelink').$product->thumb2}} 246w"
                         sizes="(max-width: 433px) 100vw, 433px" draggable="false">
                       </a>
                       <img src="{{Config::get('constant.options.sitelink').$product->thumb1}}" class="zoomImg" style="position: absolute; top: -467.708px; left: -171.786px; opacity: 0; width: 830px; height: 830px; border: none; max-width: none; max-height: none;">
                     </div>
                     <div data-thumb="" class="woocommerce-product-gallery__image" style="width: 458px; float: left; display: block;">
                       <a href="{{Config::get('constant.options.sitelink').$product->thumb1}}"></a>
                     </div>
                   </figure>
                 </div>
                 <ol class="flex-control-nav flex-control-thumbs">
                   <li>
                     <a href="javascript:popImage('{{Config::get('constant.options.sitelink').$product->thumb1}}','{{$productName}}')" title="header=[{{$productName}}] body=[&nbsp;] fade=[on]">
                       <img src="{{Config::get('constant.options.sitelink').$product->thumb1}}" draggable="false" class="">
                     </a>
                   </li>
                   <li>
                     <a href="javascript:popImage('{{Config::get('constant.options.sitelink').$product->thumb2}}','{{$productName}}')" title="header=[{{$productName}}] body=[&nbsp;] fade=[on]">
                       <img src="{{Config::get('constant.options.sitelink').$product->thumb2}}" draggable="false" class="">
                     </a>
                   </li>
                   <li>
                     <a href="javascript:popImage('{{Config::get('constant.options.sitelink').$product->thumb3}}','{{$productName}}')" title="header=[{{$productName}}] body=[&nbsp;] fade=[on]">
                       <img src="{{Config::get('constant.options.sitelink').$product->thumb3}}" draggable="false" class="">
                     </a>
                   </li>
                   <li>
                     <a href="javascript:popImage('{{Config::get('constant.options.sitelink').$product->thumb4}}','{{$productName}}')" title="header=[{{$productName}}] body=[&nbsp;] fade=[on]">
                       <img src="{{Config::get('constant.options.sitelink').$product->thumb4}}" draggable="false">
                     </a>
                   </li>
                 </ol>
               </div>

             </div>


             <div class="summary entry-summary">
               <div class="woocommerce-product-rating">
                 <div class="single-product-title">
                   <h1 class="product_title entry-title">{{ucwords($productName)}}</h1>
                   @if(!empty($brand->brandName))
                   <div class="product-brand">{{ucwords($brand->brandName)}}</div>
                   @endif
                 </div>
                 <div class="product-action-buttons">
                   <div class="yith-wcwl-add-to-wishlist add-to-wishlist-30">
                     <div class="yith-wcwl-add-button show" style="display:block">
                       <a data-product-id="{{$product->productID}}" class="add_wishlist">
                         <i class="fa fa-heart"></i> Add to Wishlist
                       </a>
                     </div>
                     <div style="clear:both"></div>
                     <div class="yith-wcwl-wishlistaddresponse"></div>
                   </div>
                   <div class="clear"></div>
                 </div>
                 <div class="woocommerce-product-details__short-description">
                   <p>
                     {{str_limit(ucfirst($product->productDetails), $limit="100", $end="")}}
                   </p>
                 </div>
                 <p class="price">
                   <span class="mc-price-wrapper">
                     <span class="woocommerce-Price-amount amount">
                       <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                       {{number_format($product->productPrice,2)}}
                     </span>
                   </span>
                 </p>
                 <div class="quantity">
                   <input type="number" class="input-text qty text number-count" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                 </div>
                 <button name="add-to-cart" data-quantity="1" data-product_id="{{$product->productID}}" data-product_price="{{$product->productPrice}}" class="btk single_add_to_cart_button button alt newcart2">
                   <i class="icon icon-basket"></i> Add to cart
                 </button>
                 <div class="product_meta">
                   <span class="posted_in">Category:
                     {{!$url = str_replace(' ','-',$cat->categoryName)}}
                     <a href="{{Config::get('constant.options.sitelink')}}product-category/{{$url}}" rel="tag">
                       {{ucwords($cat->categoryName)}}
                     </a>
                   </span>
                 </div>
               </div>
             </div>
           </div>
           <div class="woocommerce-tabs wc-tabs-wrapper">
             <ul class="tabs wc-tabs" role="tablist">
               <li class="" onclick="show('tab-description','tab-additional_information','tab-reviews')" id="tabtab-description" role="tab" aria-controls="tab-description">
                 <a href="#tab-description">Description</a>
               </li>
               <li class="" onclick="show('tab-additional_information','tab-description','tab-reviews')"  id="tabtab-additional_information" role="tab" aria-controls="tab-additional_information">
                 <a href="#tab-additional_information">Additional information</a>
               </li>
               <li class="active" onclick="show('tab-reviews','tab-description','tab-additional_information')"  id="tabtab-reviews" role="tab" aria-controls="tab-reviews">
                 <a href="#tab-reviews">Reviews ({{$gh}})</a>
               </li>
             </ul>
             <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" style="display: none;">
               <h2>Description</h2>
               <p align="justify">
                 {{ucfirst($product->productDetails)}}
               </p>
             </div>
             <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information" style="display: none;">
               <h2>Additional information</h2>
               {{!$product->productInfo}}
               <?php $rt=explode(',',$product->productInfo);?>
               <table class="shop_attributes">
                 <tbody>
                   <tr>
                     @if(sizeof($rt) > 0)
                     @foreach($rt as $t)
                     {{!$g=explode('=',$t)}}
                     @if(!empty($g[0]))<th>{{$g[0]}}</th>@endif
                     @if(!empty($g[1]))<td><p>{{$g[1]}}</p></td> @else <td><p>No Available Information</p></td>@endif
                   </tr>
                   @endforeach
                   @else
                   <tr>
                     <td colspan="2">
                       No Available Information
                     </td>
                   </tr>
                   @endif
                 </tbody>
               </table>
             </div>
             <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews" style="display: block;">
               <div id="reviews" class="woocommerce-Reviews">
                 @include('alerts')
                 <div id="comments">
                   <h2 class="woocommerce-Reviews-title">{{$gh}} @if($gh>1) reviews @else review @endif for <span>{{ucwords($productName)}}</span></h2>
                   <ol class="commentlist">
                     {{!$reviews=App\product_review::where('productID',$product->productID)->get()}}
                     @foreach($reviews as $review)
                     <li class="comment even thread-even depth-1" id="li-comment-27">
                       <div id="comment-27" class="comment_container">
                         <img alt="" src="{{asset('user.png')}}" class="avatar avatar-60 photo" height="60" width="60" style="border-radius:30px">
                         <div class="comment-text">
                           <p class="meta">
                             <strong class="woocommerce-review__author" itemprop="author">{{ucwords($review->name)}}</strong>
                             <span class="woocommerce-review__dash">–</span>
                             <time class="woocommerce-review__published-date">
                               {{date('j F, Y', $review->date)}}
                             </time>
                           </p>
                           <div class="description">
                             <p align="justify">
                               {{ucfirst($review->review)}}
                             </p>
                           </div>
                         </div>
                       </div>
                     </li>
                     @endforeach
                   </ol>
                 </div>
                 <div id="review_form_wrapper">
                   <div id="review_form">
                     <div id="respond" class="comment-respond">
                       <span id="reply-title" class="comment-reply-title">Add a review </span>
                     {!! Form::open(['url' => 'addreview', 'files' => true, 'class' => 'comment-form', 'novalidate' => 'novalidate']) !!}
                       <p class="comment-notes">
                         <span id="email-notes">Your email address will not be published.</span>
                         Required fields are marked
                         <span class="required">*</span>
                       </p>
                       <p class="comment-form-comment">
                         <input id="author" name="productID" type="text" value="{{$product->productID}}" size="30" hidden aria-required="true">
                         <input id="author" name="url" type="text" value="{{$redirecturl}}" size="30" hidden aria-required="true">
                         <label for="comment">Your review <span class="required">*</span></label>
                         <textarea id="reviewComment" name="reviewComment" cols="45" rows="8" aria-required="true"></textarea>
                       </p>
                       <p class="comment-form-author">
                         <label for="author">Name <span class="required">*</span></label>
                         <input id="reviewName" name="reviewName" type="text" value="" size="30" aria-required="true">
                       </p>
                       <p class="comment-form-email">
                         <label for="email">Email <span class="required">*</span></label>
                         <input id="reviewEmail" name="reviewEmail" type="email" value="" size="30" aria-required="true" required="">
                       </p>
                       <p class="form-submit">
                         <button type="submit" class="btn btn-success btn-lg" > <i class="icon icon-envelope btn"></i> Submit Review </button>
                       </p>
                       {!! Form::close()!!}
                   </div>
                 </div>
               </div>
               <div class="clear"></div>
             </div>
           </div>

          </div>
        <?php }else{ ?>
            <h2 style="margin-top:40px;" align="center">No Record Found For {{$productName}}
          <?php } ?>
          <?php
          if($prodCount > 0){
            $products=App\product::where('categoryID',$product->categoryID)->take(4)->get();
          }else{
            $products=App\product::take(4)->get();
          }
          ?>
          <section class="related products">
            <h2>Related products</h2>
            <ul class="products columns-4 enable-hover">
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
                  </div><!-- /.product-inner -->
                </li>
                @endforeach
              </ul>
            </section>
          </div>
        </main>
      </div>
    </div>
  </div>
@endsection
