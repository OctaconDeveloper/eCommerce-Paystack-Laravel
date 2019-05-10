@extends('control.header')
@section('content')
{{! $category = App\category::all() }}
{{! $brand = App\brand::all() }}
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">New Product</h4>
                    <p class="card-description">
                      Add New Product Details
                    </p>
                    @include('alerts')
                    {!! Form::open(['url' => 'addProduct', 'files' => true, 'class' => 'forms-sample']) !!}
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        <select name="categoryName" class="form-control">
                          <option value="" selected >-Select Category-</option>
                          @foreach($category as $cat)
                          <option value="{{$cat->categoryID}}" > {{ucwords($cat->categoryName)}} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">Brand</label>
                        <select name="brandName" class="form-control">
                          <option value="" selected >-Select Brand-</option>
                          @foreach($brand as $bat)
                          <option value="{{$bat->brandID}}" > {{ucwords($bat->brandName)}} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group row">
                    <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" name="productName" placeholder="Product Name" />
                    </div>
                  </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Product Price</label>
                    <input type="text" name="productPrice" placeholder="Product Price" class="form-control" />
                  </div>
                </div>
              </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Product Description</label>
                          <textarea name="productDescription" rows="5" class="form-control" placeholder="Product Description"></textarea>
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">Product Additional Info</label>
                            <textarea name="ProductadditionalInfo" rows="5" class="form-control" placeholder="Product Additional Info  (e.g., Color = Red, Weigth = 500kg, ...)"></textarea>
                            </div>
                          </div>
                        </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Thumbnail 1</label>
                            <input type="file" class="form-control" name="thumbnail1" />
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">Thumbnail 2</label>
                              <input type="file" class="form-control" name="thumbnail2" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Thumbnail 3</label>
                              <input type="file" class="form-control" name="thumbnail3" />
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="exampleInputName1">Thumbnail 4</label>
                                <input type="file" class="form-control" name="thumbnail4" />
                              </div>
                            </div>
                          </div>
                        <div class="row">
                          <div class="col-md-6">
                            <br/>
                            <div class="form-group row">
                              <button type="submit" class="btn btn-success mr-2">
                                <i class="icon icon-plus"></i> New Product
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
