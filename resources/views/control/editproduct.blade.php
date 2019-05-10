@extends('control.header')
@section('content')
{{! $productID=urldecode(Request::route('id'))}}
{{! $item = App\product::where('productID',$productID)->first() }}
{{! $item2 = App\category::where('categoryID',$item->categoryID)->first() }}
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit {{$item->productName}} Product</h4>
                    <p class="card-description">
                      Add New Product Details
                    </p>
                    @include('alerts')
                    {!! Form::open(['url' => 'updateProduct', 'files' => true, 'class' => 'forms-sample']) !!}
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        <input type="text" class="form-control" value="{{ucwords($item->productID)}}" hidden name="productID" placeholder="Product Name" />
                          <input type="text" class="form-control" value="{{ucwords($item2->categoryName)}}" readonly name="category" placeholder="Product Name" />
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="exampleInputName1">Product Name</label>
                            <input type="text" class="form-control" value="{{ucwords($item->productName)}}" readonly  name="productName" placeholder="Product Name" />
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Product Description</label>
                          <textarea name="productDescription" rows="5" class="form-control" placeholder="Product Description">{{ucwords($item->productDetails)}}</textarea>
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">Product Additional Info</label>
                            <textarea name="ProductadditionalInfo" rows="5" class="form-control" placeholder="Product Additional Info  (e.g., Color = Red, Weigth = 500kg, ...)">{{ucwords($item->productInfo)}}</textarea>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Old Product Price</label>
                            <input type="text" name="oldPrice" value="{{$item->oldPrice}}"  placeholder="Product Price" class="form-control" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">New Product Price</label>
                            <input type="text" name="productPrice" value="{{$item->productPrice}}"  placeholder="Product Price" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <br/>
                            <div class="form-group row">
                              <button type="submit" class="btn btn-success mr-2">
                                <i class="icon icon-refresh"></i> Update {{ucwords($item->productName)}}
                              </button>
                              <button type="reset" class="btn btn-danger mr-2">
                                <i class="icon icon-close"></i> Cancel
                              </button>
                            </div>
                          </div>


                    {!! Form::close()!!}
                </div>
              </div>
            </div>

      </div>
    </div>

@endsection
