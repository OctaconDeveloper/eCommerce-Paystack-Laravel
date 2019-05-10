@extends('control.header')
@section('content')
{{!$data = App\negotiation::select(['negID'])->distinct()->where('status','0')->get()}}
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Opend Negotiations</h4>
              <div class="row">
                <div class="col-12 table-responsive">
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>NegotiationID</th>
                        <th>OrderID</th>
                        <th>Buyer's Email</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($data) > 0)
                      {{! $sn=1}}
  										 @foreach($data as $cat)
                       {{! $cag=App\negotiation::where('negID','=',$cat->negID)->first()}}
                       {{! $cad=App\order::where('orderID','=',$cag->orderID)->first()}}
  											<td>{{$sn++}}</td>
   											<td>{{$cat->negID}}</td>
   											<td>
                          <a href="{{Config::get('constant.options.sitelink')}}vieworder/{{$cag->orderID}}">
                              {{strtolower($cag->orderID)}}
                            </a>
                        </td>
                        <td>{{$cag->useremail}}</td>
   											<td>{{number_format($cad->totalAmount,2)}}</td>
                          @if($cat->status==1)
                            {{!$stat="<b style='color:red'>Closed</b>"}}
                          @elseif($cat->status==0)
                            {{!$stat="<b style='color:green'>Open</b>"}}
                          @endif
                        <td>{!!$stat!!}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}negotiation/{{$cat->negID}}">
                            <i class="fa fa-search"></i>
                          </a>
                        </td>
  										</tr>
  										@endforeach
  										@endif
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>NegotiationID</th>
                        <th>OrderID</th>
                        <th>Buyer's Email</th>
                        <th>Amount</th>
                        <th>Status</th>
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
