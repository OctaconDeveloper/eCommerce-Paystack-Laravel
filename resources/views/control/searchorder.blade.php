@extends('control.header')
@section('content')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Search Orders</h4>
                    <p class="card-description">
                    Enter OrderID to search Order
                    </p>
                    @include('alerts')
                    {!! Form::open(['url' => 'getorderid', 'files' => true, 'class' => 'forms-sample']) !!}
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label for="exampleInputName1">OrderID</label>
                            <input type="text" class="form-control" name="orderid" placeholder="OrderID" />
                          </div>
                        </div>
                      </div>
                        <div class="row">
                          <div class="col-md-12">
                            <br/>
                            <div class="form-group row">
                              <button type="submit" class="btn btn-success mr-2">
                                <i class="fa fa-search"></i> Search Order
                              </button>
                            </div>
                          </div>
                    {!! Form::close()!!}
                  </div>
                  </div>
                  </div>

                  </div>
                  </div>
                  </div>

                      @if(isset($datat))
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">OrderID - {{$datat->orderID}}</h4>
          <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputName1">UserEmail</label>
                <input type="text" class="form-control" value="{{$datat->useremail}}" readonly  />
            </div>
          </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="exampleInputName1">Phone Number</label>
                  <input type="text" class="form-control" value="{{$datat->phone}}" readonly  />
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputName1">Payment Type</label>
                  <input type="text" class="form-control" value="{{$datat->paymentType}}" readonly />
              </div>
            </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label for="exampleInputName1">Total Amount</label>
                    <input type="text" class="form-control" value="{{number_format($datat->totalAmount,2)}}" readonly   />
                  </div>
                </div>
              </div>

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputName1">Order Date</label>
                    <input type="text" class="form-control" value="{{date('jS F, Y',$datat->orderDate)}}" readonly />
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="exampleInputName1">Order Status</label>
                    @if($datat->orderStatus==0)
                    {{!$status="On Hold"}}
                    @elseif($datat->orderStatus==1)
                    {{!$status="Approved"}}
                    @elseif($datat->orderStatus==2)
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
                      <textarea  rows="8" class="form-control" readonly>{{$datat->orderDetails}}</textarea>
                  </div>
                </div>
              </div>
              <h2>Billing Details</h2>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputName1">Last Name</label>
                    <input type="text" class="form-control" value="{{ucwords($datat->billinglastname)}}" readonly />
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" value="{{ucwords($datat->billingfirstname)}}" readonly  />
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Street</label>
                      <input type="text" class="form-control" value="{{ucwords($datat->billingstreet)}}" readonly />
                  </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="exampleInputName1">City</label>
                        <input type="text" class="form-control" value="{{ucwords($datat->billingcity)}}" readonly  />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName1">Postal</label>
                        <input type="text" class="form-control" value="{{ucwords($datat->billingpostal)}}" readonly />
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="exampleInputName1">Country</label>
                          <input type="text" class="form-control" value="{{ucwords($datat->billingcountry)}}" readonly  />
                        </div>
                      </div>
                    </div>

              <h2>Shipping Details</h2>
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputName1">Last Name</label>
                    <input type="text" class="form-control" value="{{ucwords($datat->shippinglastname)}}" readonly />
                </div>
              </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label for="exampleInputName1">First Name</label>
                      <input type="text" class="form-control" value="{{ucwords($datat->shippingfirstname)}}" readonly  />
                    </div>
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputName1">Street</label>
                      <input type="text" class="form-control" value="{{ucwords($datat->shippingstreet)}}" readonly />
                  </div>
                </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label for="exampleInputName1">City</label>
                        <input type="text" class="form-control" value="{{ucwords($datat->shippingcity)}}" readonly  />
                      </div>
                    </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName1">Postal</label>
                        <input type="text" class="form-control" value="{{ucwords($datat->shippingpostal)}}" readonly />
                    </div>
                  </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label for="exampleInputName1">Country</label>
                          <input type="text" class="form-control" value="{{ucwords($datat->shippingcountry)}}" readonly  />
                        </div>
                      </div>
                    </div>
        </div>
      </div>
        @endif

    </div>
  </div>
@endsection
