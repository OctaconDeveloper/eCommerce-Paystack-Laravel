@extends('control.header')
@section('content')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Orders</h4>
                    <p class="card-description">
                    Enter UserEmail to view User Order Logs
                    </p>
                    @include('alerts')
                    {!! Form::open(['url' => 'userorderhistory', 'files' => true, 'class' => 'forms-sample']) !!}
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label for="exampleInputName1">User Email</label>
                            <input type="text" class="form-control" name="useremail" placeholder="User Email " />
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

                      @if(isset($data))
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Search Result</h4>
            <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>User Email</th>
                                <th>OrderID</th>
                                <th>Total Amount</th>
                                <th>Order Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            {{! $sn=1}}
                             @foreach($data as $cat)
                           <tr>
                              <td>{{$sn++}}</td>
                              <td>{{$cat->useremail}}</td>
                              <td>
                                <a href="{{Config::get('constant.options.sitelink')}}vieworder/{{$cat->orderID}}">
                                    {{strtolower($cat->orderID)}}
                                  </a>
                              </td>
                              <td>{{number_format($cat->totalAmount,2)}}</td>
                              @if($cat->orderStatus==0)
                              {{!$status="On Hold"}}
                              @elseif($cat->orderStatus==1)
                              {{!$status="Approved"}}
                              @elseif($cat->orderStatus==2)
                              {{!$status="Delivered"}}
                              @endif
                              <td>{{$status}}</td>
                              <td>{{date('jS F, Y',$cat->orderDate)}}</td>
                              <td>
                                <a href="{{Config::get('constant.options.sitelink')}}vieworder/{{$cat->orderID}}">
                                  <span class="btn btn-outline-info" title="View {{ucwords($cat->orderID)}}">
                                    <i class="fa fa-search"></i>
                                  </span>
                                </a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>#</th>
                              <th>User Email</th>
                              <th>OrderID</th>
                              <th>Total Amount</th>
                              <th>Order Status</th>
                              <th>Order Date</th>
                              <th>Action</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
  @endif
@endsection
