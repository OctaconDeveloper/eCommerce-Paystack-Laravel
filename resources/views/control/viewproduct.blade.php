@extends('control.header')
@section('content')
{{! $product = App\product::all() }}
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Product</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>Product Price</th>
                          <th>Product Details</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($product) > 0)
                      {{! $sn=1}}
  										 @foreach($product as $cat)
                       {{! $cag=App\category::where('categoryID','=',$cat->categoryID)->get()->first()}}
                     <tr>
  											<td>{{$sn++}}</td>
                        <td>{{ucwords($cag->categoryName)}}</td>
   											<td>{{ucwords($cat->productName)}}</td>
   											<td>{{number_format($cat->productPrice,2)}}</td>
   											<td>{{str_limit(ucwords($cat->productDetails), $limit="50", $end="")}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}addspecial/{{$cat->productID}}">
                            <span class="btn btn-outline-warning" title="Add Special Offer {{ucwords($cat->productName)}}">
                              <i class="icon icon-fire"></i>
                            </span>
                          </a>

                          <a href="{{Config::get('constant.options.sitelink')}}addfeatured/{{$cat->productID}}">
                            <span class="btn btn-outline-dark" title="Add Featured Product {{ucwords($cat->productName)}}">
                              <i class="icon-badge"></i>
                            </span>
                          </a>

                            <a href="{{Config::get('constant.options.sitelink')}}editproduct/{{$cat->productID}}">
                              <span class="btn btn-outline-info" title="Edit {{ucwords($cat->productName)}}">
                                <i class="fa fa-edit"></i>
                              </span>
                            </a>

                          <a href="{{Config::get('constant.options.sitelink')}}deleteproduct/{{$cat->productID}}">
                            <span class="btn btn-outline-danger" title="Delete {{ucwords($cat->productName)}}">
                              <i class="fa fa-trash"></i>
                            </span>
                          </a>
                        </td>
  										</tr>
  										@endforeach
  										@endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Details</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

@endsection
