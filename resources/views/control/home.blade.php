@extends('control.header')
@section('content')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card card-statistics">
                <div class="row">
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="mdi mdi-account-multiple-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Users</p>
                            <div class="fluid-container">
                              <h3 class="card-title mb-0">{{number_format(App\usertable::all()->count())}}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="icon icon-bag text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Products</p>
                            <div class="fluid-container">
                              <h3 class="card-title mb-0">{{number_format(App\product::all()->count())}}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="icon icon-layers text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Pending Order(s)</p>
                            <div class="fluid-container">
                              <h3 class="card-title mb-0">{{number_format(App\order::where('orderStatus','<',2)->count())}}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                          <i class="fa fa-money text-primary mr-0 mr-sm-4 icon-lg"></i>
                          <div class="wrapper text-center text-sm-left">
                            <p class="card-text mb-0">Total Sales</p>
                            <div class="fluid-container">
                              {{!$sAmount = App\payment::where('paymentStatus','=','1')->sum('paymentAmount')}}
                              <h3 class="card-title mb-0">{{number_format($sAmount,2)}}</h3>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
<style>
.gh{
  font-weight: bolder;
}
</style>

          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <h3 style="margin:10px"> Last Ten Orders </h3>
                <div class="table-responsive">
                  <table class="table center-aligned-table">
                    <thead>
                      <tr class="bg-light">
                        <th class="border-bottom-0">ID</th>
                        <th class="border-bottom-0">User Email</th>
                        <th class="border-bottom-0">OrderID</th>
                        <th class="border-bottom-0">Total Amount</th>
                        <th class="border-bottom-0">Payment Status</th>
                        <th class="border-bottom-0">Order Status</th>
                        <th class="border-bottom-0">Order Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{!$data=App\order::orderby('id','DESC')->take(10)->get()}}
                      @if(count($data) > 0)
                      {{! $sn=1}}
  										 @foreach($data as $cat)
                       <?php $cag=App\payment::where('orderID','=',$cat->orderID)->get()->first(); ?>
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
                            {{!$status="<b class='gh' style='color:red'><i class='icon icon-info'></i> On Hold</b>"}}
                            @elseif($cat->orderStatus==1)
                            {{!$status="<b class='gh'  style='color:blue'><i class='fa fa-check-circle-o'></i> Approved</b>"}}
                            @elseif($cat->orderStatus==2)
                            {{!$status="<b class='gh' style='color:green'><i class='fa fa-taxi'></i> Delivered</b>"}}
                            @endif
                        <td>{!!$status!!}</td>
                        <td>{{date('j M, Y',$cat->orderDate)}}</td>
  										</tr>
  										@endforeach
  										@endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->



@endsection
