@extends('control.header')
@section('content')

<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Brands</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>BrandID</th>
                          <th>Brand Name</th>
                          <th>Brand Logo</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($brand) > 0)
                      {{! $sn=1}}
  										 @foreach($brand as $cat)
  											<td>{{$sn++}}</td>
   											<td>{{$cat->brandID}}</td>
   											<td>{{ucwords($cat->brandName)}}</td>
   											<td>
                          <img src="{{Config::get('constant.options.sitelink').ucwords($cat->brandLogo)}}" style="width:100px; height:50px"/> </td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}deletebrand/{{$cat->brandID}}">
                            <span class="btn btn-outline-danger" title="Delete {{ucwords($cat->brandID)}}">
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
                          <th>CategoryID</th>
                          <th>Category Name</th>
                          <th>Category Details</th>
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
