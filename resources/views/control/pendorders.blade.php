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
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count($data) > 0)
                      <?php $sn=1; ?>
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
                            {{!$status="On Hold"}}
                            @elseif($cat->orderStatus==1)
                            {{!$status="Approved"}}
                            @elseif($cat->orderStatus==2)
                            {{!$status="Delivered"}}
                            @endif
                        <td>{{$status}}</td>
                        <td>{{date('j M, Y',$cat->orderDate)}}</td>
                        <td>
                          <i class="icon icon-settings" data-toggle="modal" data-target="#exampleModal-4" data-whatever="{{strtolower($cat->orderID)}}"></i>
                        </td>
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
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>



              <div class="modal fade" id="exampleModal-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-4" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-4">Update Order Status For OrderID: </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">

                             <div class="form-group">
                               <label for="recipient-name" class="col-form-label">OrderID:</label>
                               <input type="text" class="form-control" id="orderid" name="orderid" readonly>
                              </div>
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Status:</label>
                                <select name="status" class="form-control" id="status">
                                  <option value="0"> On Hold </option>
                                  <option value="1"> Approved </option>
                                  <option value="2"> Delivered </option>
                                </select>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" onclick="submit();" class="btn btn-success"><i class="icon icon-refresh"></i>Update Order Status</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

<script>
function submit(){
  var orderid = document.getElementById('orderid').value;
  var status = document.getElementById('status').value;
  window.location="updateorder/"+orderid+"/"+status;

}

</script>

            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

@endsection
