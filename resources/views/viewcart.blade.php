@extends('header')
@section('content')
<title>My Cart</title>
<div id="main-content" class="main-content">
  <div id="post-1241" class="post-1241 page type-page status-publish hentry">
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <div class="woocommerce">
        <div class="section section-page-title inner-xs">
          <div class="page-header">
            <h2 class="page-title">Shopping Cart Summary</h2>
           </div>
         </div>
        @if(!empty(Session::get('mycart')))
           <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
             <thead>
               <tr>
                 <th class="product-name">Product</th>
                 <th class="product-price">Price</th>
                 <th class="product-quantity">Quantity</th>
                 <th class="product-subtotal">Total</th>
                 <th class="product-remove">&nbsp;</th>
                 <th class="product-thumbnail">&nbsp;</th>
               </tr>
             </thead>
             <tbody>
               <tr class="">
                 @foreach(Session::get('mycart') as $cart)
                  <?php $product=App\product::where('productID',$cart['productID'])->first(); ?>
                  @if(!empty($product->productName))
                  <?php $url = str_replace(' ','-',$product->productName); ?>
                  @endif
                 <td class="product-name" data-title="Product">
                   <span class="product-name-wrap">
                     @if(!empty($product->productName))
                     <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                      {{ucwords($product->productName)}}
                     </a>
                     @endif
                   </span>
                 </td>
                 <td class="product-price" data-title="Price">
                   <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                     {{number_format($cart['price'])}}
                   </span>
                 </td>
                 <td class="product-quantity" data-title="Quantity">
                   <div class="quantity">
                     <input type="number"
                     class="input-text qty text" step="1" min="1" max="" id="price{{$cart['productID']}}"
                     value="{{$cart['qty']}}" title="Qty" size="4"
                     data-price="{{$cart['price']}}" data-product_id="{{$cart['productID']}}"
                     pattern="[0-9]*" inputmode="numeric">
                   </div>
                 </td>
                 <td class="product-subtotal" data-title="Total">
                   <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                     <span id="{{$cart['productID']}}">{{number_format($cart['amount'],2)}}</span>
                   </span>
                 </td>
                 <td class="product-thumbnail">
                   @if(!empty($product->productName))
                   <a href="{{Config::get('constant.options.sitelink')}}product/{{$url}}">
                     <img width="73" height="73"
                     src="{{Config::get('constant.options.sitelink').$product->thumb1}}"
                     class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                     alt="{{$product->productName}}"
                     srcset="{{Config::get('constant.options.sitelink').$product->thumb1}} 73w,
                     {{Config::get('constant.options.sitelink').$product->thumb1}},
                     {{Config::get('constant.options.sitelink').$product->thumb3}} 300w,
                     {{Config::get('constant.options.sitelink').$product->thumb2}} 325w,
                     {{Config::get('constant.options.sitelink').$product->thumb2}} 186w,
                     {{Config::get('constant.options.sitelink').$product->thumb3}} 143w,
                     {{Config::get('constant.options.sitelink').$product->thumb4}} 710w"
                     sizes="(max-width: 73px) 100vw, 73px">
                   </a>
                     @endif
                 </td>
                   <td class="product-remove">
                     <a href="{{Config::get('constant.options.sitelink')}}removecart/{{$cart['productID']}}" class="remove" aria-label="Remove this item" title="Remove this item" data-product_id="{{$cart['productID']}}" data-product_sku="">
                       <i class="fa fa-trash"></i></a>
                   </td>
               </tr>
               @endforeach
             </tbody>
           </table>
         <div class="cart-collaterals col-xs-6" style="float:right;">
           <div class="cart_totals ">
             <h2>Cart totals</h2>
             <table cellspacing="0" class="shop_table shop_table_responsive">
               <tbody><tr class="cart-subtotal">
                 <th>Subtotal</th>

                 <td data-title="Subtotal">
                   <span class="woocommerce-Price-amount amount">
                     <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                     <span class="siteloader3"></span>
                   </span>
                 </td>
               </tr>
               <tr class="order-total">
                 <th>Total</th>
                 <td data-title="Total">
                   <strong>
                     <span class="woocommerce-Price-amount amount">
                       <span class="woocommerce-Price-currencySymbol">&#8358;</span>
                       <span class="siteloader4"></span>
                     </span>
                   </strong>
                 </td>
               </tr>

             </tbody>
            <script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
             <script>

             function loadlink(){
                $('.siteloader3').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
              }
              loadlink();
              setInterval(function (){
                loadlink()
              },1000);


             $(function (){
               if($("#ckh").prop('checked')==false){
                 setInterval(function (){
                   //$('.siteloader4').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
                 },1000);
               }

              $(document).on("ready", function(){

                 if($("input.ckeckbox").is(':checked')){
                   $('.siteloader4').load('{{Config::get('constant.options.sitelink')}}calcAmount');
                 }else{
                   setInterval(function (){
                     $('.siteloader4').load('{{Config::get('constant.options.sitelink')}}viewTotalAmount');
                   },1000);
                 }
                 //alert(totalAmount);

                 //document.getElementById("totalAmount").innerHTML = totalAmount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
               });

             });


       			$(function (){
       			  $(document).on("change", ".text", function(){
       			    var qty=$(this).val();
       			    var price = $(this).data('price');
       			    var product_id = $(this).data('product_id');
                var id = "#"+product_id;
                var id2 = "#price"+product_id;
       			    //alert(id);
                //$(id).text("hello");
                event.preventDefault();
                       $.ajax({
                           type:'GET',
                           url:'updatecart',
                          data: {
                                  product_id: product_id,
                                  qty: qty,
                                  price: price
                          },
                           success: function (data){
                            //alert(data);
                            var amt = Number(data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                            $(id).text(amt);
                            $(id2).val(qty);

                           }
                       });

       			  });
       			});

             </script>
           </table>
           <div class="wc-proceed-to-checkout">
             <a href="{{Config::get('constant.options.sitelink')}}checkout">
               <button class="checkout-button button alt wc-forward">
                 Proceed to checkout
               </button>
             </a>
           </div>
           @else

               <h2 class="page-title">Shopping Cart is Empty</h2>
               <a href="{{Config::get('constant.options.sitelink')}}shop">
                 <span class="button wc-proceed-to-checkout"><i class="icon icon-basket"></i> Continue Shopping </span>
               </a>

          @endif
         </div>
       </div>
     </div>
   </div><!-- .entry-content -->
 </div><!-- #post-1241 -->
</div><!-- #main-content -->



@endsection
