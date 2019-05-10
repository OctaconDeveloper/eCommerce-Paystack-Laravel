
<?php
if(empty(session()->get('mycart'))){ ?>
  <li>
    <div class="widget_shopping_cart_content">
      <ul class="woocommerce-mini-cart cart_list product_list_widget ">
        <li class="woocommerce-mini-cart-item mini_cart_item">
          <h6 style="margin:5px;">Cart is empty</h6>
        </li>
      </ul>
    </div>
  </li>
<?php }else{
  ?>
  <li>
    <div class="widget_shopping_cart_content">
      <ul class="woocommerce-mini-cart cart_list product_list_widget ">
        @foreach(session()->get('mycart') as $cart)
          {{!$product=App\product::where('productID',$cart['productID'])->first()}}
          {{!$url = str_replace(' ','-',$product->productName)}}
        <li class="woocommerce-mini-cart-item mini_cart_item">
          <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
            <img width="73" height="73" src="{{$product->thumb1}}"
            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{$product->productName}}"
            srcset="{{$product->thumb1}} 73w,
            {{$product->thumb1}} 150w,
            {{$product->thumb1}} 300w" sizes="(max-width: 73px) 100vw, 73px">
            <span class="product-name-wrap">{{ucwords($product->productName)}}</span>
            &nbsp;
          </a>
          <span class="quantity">{{$cart['qty']}} × <span class="woocommerce-Price-amount amount">
            <span class="woocommerce-Price-currencySymbol">&#8358;</span>{{number_format($cart['price'],2)}}</span>
        </span>
      </li>
      @endforeach
    </ul>
    <p class="woocommerce-mini-cart__buttons buttons">
      <a href="{{Config::get('constant.options.sitelink')}}cart" class="button wc-forward">View cart</a>
      <a href="{{Config::get('constant.options.sitelink')}}checkout" class="button checkout wc-forward">Checkout</a>
    </p>
  </div>
</li>
<?php } ?>
