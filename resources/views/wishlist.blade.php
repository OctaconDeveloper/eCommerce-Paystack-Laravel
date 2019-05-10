@extends('header')
@section('content')
{{!$lists = App\wishlist::where('username',session()->get('username'))->get()}}
<title>Wishlist</title>

<div id="main-content" class="main-content">
  <div id="post-415" class="post-415 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">Wishlist</h2>
      </div>
    </div>
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <p>@include('alerts')</p>
      <div class="woocommerce">
        <section class="woocommerce-order-details">
          <table class="items woocommerce-table woocommerce-table--order-details shop_table order_details">
            <thead>
              <tr>
                <th class="woocommerce-table__product-name product-name">Category Name</th>
                <th class="woocommerce-table__product-name product-name">Product Name</th>
                <th class="woocommerce-table__product-table product-total">Unit Price</th>
                <th class="woocommerce-table__product-table product-total">Action</th>
              </tr>
            </thead>
            <tbody>
            <tr>
              @if(!empty($lists))
              @foreach($lists as $list)
              {{!$data=App\product::where('productID',$list->productID)->first()}}
              {{!$dat=App\category::where('categoryID',$data->categoryID)->first()}}
                <td>{{ucwords($dat->categoryName)}}</td>
                <td>{{ucwords($data->productName)}}</td>
                <td>{{number_format($data->productPrice,2)}}</td>
                <td>
                  <a href="{{Config::get('constant.options.sitelink')}}remove_from_wishlist/{{$list->wID}}">
                    <i class="icon icon-trash" style="color:red;"></i>
                  </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="5">
                  No Record
                </td>
              </tr>
              @endif
            </tbody>
        </table>
      </section>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('assets/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/paginathing.js') }}"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    $('.items tbody').paginathing({
          perPage: 5,
          containerClass: 'panel-footer',
          activeClass: 'active',
          insertAfter: '.items',
          pageNumbers: true
    })
  });
</script>


@endsection
