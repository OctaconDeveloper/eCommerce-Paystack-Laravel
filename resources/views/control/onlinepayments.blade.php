@extends('control.header')
@section('content')
{{!$data = App\payment::where('paymentCode','=','1')->where('paymentStatus','=','1')->get()}}
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Online Payments</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>UserEmail</th>
                        <th>PaymentID</th>
                        <th>OrderID</th>
                        <th>Amount</th>
                        <th>Shipping</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($data) > 0)
                      {{! $sn=1}}
  										 @foreach($data as $cat)
                       {{! $cag=App\payment::where('orderID','=',$cat->orderID)->get()->first()}}
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
                        <td>{{date('j M, Y',$cat->paymentDate)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}payment_receipt/{{$cat->paymentID}}">
                            <i class="fa fa-download"></i>
                          </a>
                        </td>
  										</tr>
  										@endforeach
  										@endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>UserEmail</th>
                        <th>PaymentID</th>
                        <th>OrderID</th>
                        <th>Amount</th>
                        <th>Shipping</th>
                        <th>Date</th>
                        <th>Action</th>
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
