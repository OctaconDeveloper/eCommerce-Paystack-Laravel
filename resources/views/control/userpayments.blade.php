@extends('control.header')
@section('content')
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User payments</h4>
                    <p class="card-description">
                    Enter UserEmail to view User Payment Log
                    </p>
                    @include('alerts')
                    {!! Form::open(['url' => 'userpaymenthistory', 'files' => true, 'class' => 'forms-sample']) !!}
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
                                <i class="fa fa-search"></i> Search Payment
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
          <h4 class="card-title">Search Result</h4>
            <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr>
                                <th>#</th>
                                <th>User Email</th>
                                <th>PaymentID</th>
                                <th>OrderID</th>
                                <th>Amount</th>
                                <th>Shipping Fees</th>
                                <th>Payment Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            {{! $sn=1}}
                             @foreach($datat as $cat)
                           <tr>
                              <td>{{$sn++}}</td>
                              <td>{{$cat->useremail}}</td>
                              <td>{{$cat->paymentID}}</td>
                              <td>
                                <a href="{{Config::get('constant.options.sitelink')}}vieworder/{{$cat->orderID}}">
                                  {{strtolower($cat->orderID)}}
                                </a>
                              </td>
                              <td>{{number_format($cat->paymentAmount,2)}}</td>
                              <td>{{number_format($cat->paymentShipping,2)}}</td>
                              <td>{{date('jS F, Y',$cat->paymentDate)}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>#</th>
                              <th>User Email</th>
                              <th>PaymentID</th>
                              <th>OrderID</th>
                              <th>Amount</th>
                              <th>Shipping Fees</th>
                              <th>Payment Date</th>
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
