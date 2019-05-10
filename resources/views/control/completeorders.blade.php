@extends('control.header')
@section('content')

<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Order History</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>User Email</th>
                        <th>OrderID</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($data) > 0)
                      {{! $sn=1}}
  										 @foreach($data as $cat)
                       {{! $cag=App\payment::where('orderID','=',$cat->orderID)->get()->first()}}
  											<td>{{$sn++}}</td>
   											<td>{{$cat->useremail}}</td>
   											<td>
                          <a href="{{Config::get('constant.options.sitelink')}}vieworder/{{$cat->orderID}}">
                              {{strtolower($cat->orderID)}}
                            </a>
                        </td>
   											<td>{{number_format($cat->totalAmount,2)}}</td>
                          @if(App\payment::where('orderID','=',$cat->orderID)->count() > 0)
                            @if($cag->paymentStatus==1)
                              {{! $payStat=number_format($cag->paymentAmount,2)}}
                            @else
                              {{! $payStat="No Payment Received"}}
                            @endif
                          @else
                            {{! $payStat="No Record Found"}}
                          @endif
   											<td>{{$payStat}}</td>
                            @if($cat->orderStatus==0)
                            {{!$status="On Hold"}}
                            @elseif($cat->orderStatus==1)
                            {{!$status="Approved"}}
                            @elseif($cat->orderStatus==2)
                            {{!$status="Delivered"}}
                            @endif
                        <td>{{$status}}</td>
                        <td>{{date('jS F, Y',$cat->orderDate)}}</td>
  										</tr>
  										@endforeach
  										@endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>User Email</th>
                        <th>OrderID</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
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
