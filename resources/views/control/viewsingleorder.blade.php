@extends('control.header')
@section('content')
{{!$orderlists=App\order_log::where('orderID',$data->orderID)->get()}}
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">OrderID {{$data->orderID}}</h4>
                    <p class="card-description">
                      View Order Details
                    </p>
                    @include('alerts')
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="exampleInputName1">UserEmail</label>
                          <input type="text" class="form-control" value="{{$data->useremail}}" readonly  />
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="exampleInputName1">Phone Number</label>
                            <input type="text" class="form-control" value="{{$data->phone}}" readonly  />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Last Name</label>
                            <input type="text" class="form-control" value="{{ucwords($data->billinglastname)}}" readonly />
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">First Name</label>
                              <input type="text" class="form-control" value="{{ucwords($data->billingfirsttname)}}" readonly />
                            </div>
                          </div>
                        </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Payment Type</label>
                            <input type="text" class="form-control" value="{{$data->paymentType}}" readonly />
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">Sub Amount</label>
                              <input type="text" class="form-control" value="{{number_format($data->subAmount,2)}}" readonly  name="productName" placeholder="Product Name" />
                            </div>
                          </div>
                        </div>
                      <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="exampleInputName1">Shipping Fees</label>
                            <input type="text" class="form-control" value="{{number_format($data->shipAmount,2)}}" readonly />
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label for="exampleInputName1">Total Amount</label>
                              <input type="text" class="form-control" value="{{number_format($data->totalAmount,2)}}" readonly  name="productName" placeholder="Product Name" />
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Order Date</label>
                              <input type="text" class="form-control" value="{{date('jS F, Y',$data->orderDate)}}" readonly />
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="exampleInputName1">Order Status</label>
                              @if($data->orderStatus==0)
                              {{!$status="On Hold"}}
                              @elseif($data->orderStatus==1)
                              {{!$status="Approved"}}
                              @elseif($data->orderStatus==2)
                              {{!$status="Delivered"}}
                              @endif
                                <input type="text" class="form-control" value="{{$status}}" readonly />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="exampleInputName1">Order Details</label>
                                <textarea  rows="10" class="form-control" readonly>@foreach($orderlists as $orderlis)
                                  {{!$dt=App\product::where('productID',$orderlis->productID)->first()}}
                                  Product Name => {{ucwords($dt->productName)}}
                                  Product Price => {{number_format($orderlis->price,2)}}
                                  Product Quantity => {{$orderlis->quantity}}
                                  Total Amount => {{number_format($orderlis->total,2)}}
                                  @endforeach
                                </textarea>
                            </div>
                          </div>
                        </div>

                        <h2>Billing Details</h2>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Last Name</label>
                              <input type="text" class="form-control" value="{{ucwords($data->billinglastname)}}" readonly />
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="exampleInputName1">First Name</label>
                                <input type="text" class="form-control" value="{{ucwords($data->billingfirstname)}}" readonly  />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputName1">Street</label>
                                <input type="text" class="form-control" value="{{ucwords($data->billingstreet)}}" readonly />
                            </div>
                          </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="exampleInputName1">City</label>
                                  <input type="text" class="form-control" value="{{ucwords($data->billingcity)}}" readonly  />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputName1">Postal</label>
                                  <input type="text" class="form-control" value="{{ucwords($data->billingpostal)}}" readonly />
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="exampleInputName1">Country</label>
                                    <input type="text" class="form-control" value="{{ucwords($data->billingcountry)}}" readonly  />
                                  </div>
                                </div>
                              </div>

                        <h2>Shipping Details</h2>
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="exampleInputName1">Last Name</label>
                              <input type="text" class="form-control" value="{{ucwords($data->shippinglastname)}}" readonly />
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="exampleInputName1">First Name</label>
                                <input type="text" class="form-control" value="{{ucwords($data->shippingfirstname)}}" readonly  />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputName1">Street</label>
                                <input type="text" class="form-control" value="{{ucwords($data->shippingstreet)}}" readonly />
                            </div>
                          </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label for="exampleInputName1">City</label>
                                  <input type="text" class="form-control" value="{{ucwords($data->shippingcity)}}" readonly  />
                                </div>
                              </div>
                            </div>

                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="exampleInputName1">Postal</label>
                                  <input type="text" class="form-control" value="{{ucwords($data->shippingpostal)}}" readonly />
                              </div>
                            </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label for="exampleInputName1">Country</label>
                                    <input type="text" class="form-control" value="{{ucwords($data->shippingcountry)}}" readonly  />
                                  </div>
                                </div>
                              </div>
                </div>
              </div>
            </div>

      </div>
    </div>
@endsection
