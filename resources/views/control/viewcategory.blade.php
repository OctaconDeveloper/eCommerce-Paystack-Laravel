@extends('control.header')
@section('content')

<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Category</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>#</th>
                          <th>CategoryID</th>
                          <th>Category Name</th>
                          <th>Category Details</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($category) > 0)
                      {{! $sn=1}}
  										 @foreach($category as $cat)
  											<td>{{$sn++}}</td>
   											<td>{{$cat->categoryID}}</td>
   											<td>{{ucwords($cat->categoryName)}}</td>
   											<td>{{ucwords($cat->categoryDetails)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}editcategory/{{$cat->categoryID}}">
                            <span class="btn btn-outline-info" title="Edit {{ucwords($cat->categoryName)}}">
                              <i class="fa fa-edit"></i>
                            </span>
                          </a>
                          <a href="{{Config::get('constant.options.sitelink')}}deletecategory/{{$cat->categoryID}}">
                            <span class="btn btn-outline-danger" title="Delete {{ucwords($cat->categoryName)}}">
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
