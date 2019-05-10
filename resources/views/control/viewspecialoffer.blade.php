@extends('control.header')
@section('content')
{{! $product = App\specialoffer::all() }}
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Special Offer</h4>
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
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($product) > 0)
                      {{! $sn=1}}
  										 @foreach($product as $cat)
                       {{! $cag=App\category::where('categoryID','=',$cat->categoryID)->get()->first()}}
                       {{! $cab=App\product::where('productID','=',$cat->productID)->get()->first()}}
                     <tr>
  											<td>{{$sn++}}</td>
                        <td>{{ucwords($cag->categoryName)}}</td>
   											<td>{{ucwords($cat->productName)}}</td>
   											<td>{{number_format($cab->productPrice,2)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}removespecial/{{$cat->productID}}">
                            <span class="btn btn-outline-danger" title="Remove {{ucwords($cat->productName)}}">
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
