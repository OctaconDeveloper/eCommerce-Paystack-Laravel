@extends('control.header')
@section('content')
{{!$negotiationID = urldecode(Request::route('id'))}}
{{!$or = App\negotiation::distinct()->where('negID',$negotiationID)->first()}}
{{!$or2 = App\usertable::where('useremail',$or->useremail)->first()}}
{{!$or3 = App\order::where('orderID',$or->orderID)->first()}}
{{!$logs = App\order_log::where('orderID',$or->orderID)->get()}}


<!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
       <div class="content-wrapper">

         <div class="row">

           <div class="col-md-5 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Buyer Name</h4>
                   <div class="form-group">
                     <input type="text" name="category" class="form-control" value="{{ucwords($or2->lastname.' '.$or2->firstname)}}" readonly>
                   </div>
                 <h4 class="card-title">OrderID</h4>
                   <div class="form-group">
                     <input type="text" name="category" class="form-control" value="{{$or->orderID}}" readonly>
                   </div>

                   <h4 class="card-title">Buyer Email</h4>
                     <div class="form-group">
                       <input type="text" name="category" class="form-control" value="{{$or2->useremail}}" readonly>
                     </div>
                   <h4 class="card-title">Buyer Phone</h4>
                     <div class="form-group">
                       <input type="text" name="category" class="form-control" value="{{$or2->phone}}" readonly>
                     </div>
                     <h4 class="card-title">Order Details </h4>
                   <div class="form-group">
                     <table class="table">
                       <tr>
                         <th>Product Name</th>
                         <th>Unit Price (&#8358;)</th>
                         <th>Quantity</th>
                         <th>Amount (&#8358;)</th>
                       </tr>
                       <tr>
                         @foreach($logs as $log)
                         {{!$prod=App\product::where('productID',$log->productID)->first()}}
                         <td>{{ucwords($prod->productName)}}</td>
                         <td>{{number_format($log->price)}}</td>
                         <td>{{$log->quantity}}</td>
                         <td>{{number_format($log->total)}}</td>
                       </tr>
                       @endforeach
                     </table>
                   </div>
                 </div>
             </div>
           </div>

           <div class="col-md-5 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Negotiations</h4>
                   <div class="form-group">
                     {{!$neg=App\negotiation::where('negID',$negotiationID)->get()}}
                     @foreach($neg as $negg)

                     <div class="card rounded border mb-2">
                          <div class="card-body p-3">
                            <div class="media">
                              <i class="icon icon-user icon-sm align-self-center mr-3"></i>
                              <div class="media-body">
                                <h6 class="mb-1">
                                  @if($negg->useremail == session()->get('username'))
                                    {{'Me'}}
                                  @else
                                    {{ucfirst($negg->useremail)}}
                                  @endif
                                </h6>
                                <p class="mb-0 text-muted">
                                  {{ucfirst($negg->message)}}<br/>
                                  <small style="width:100%" class="alert-warning">{{date('jS F, Y',$negg->date)}}</small>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                     @endforeach

                   </div>

                   {!! Form::open(['url' => 'addNegot', 'files' => true, 'class' => 'forms-sample']) !!}
                   <div class="form-group">
                     @include('alerts')
                     <input value="{{$negotiationID}}" name="negID" hidden />
                     <input value="{{$or->status}}" name="status" hidden />
                     <input value="{{$or->orderID}}" name="orderID" hidden />
                     <input value="negotiation" name="url" hidden />
                     <textarea name="message" class="form-control" rows="7" placeholder="Send Reply" autofocus></textarea>
                     <br/>
                     @if($or->status==1)
                     <button disabled="disabled" class="btn btn-deafult mr-2">
                       <i class="fa fa-times-circle"></i> Closed
                     </button>
                    @else
                      <button type="submit" class="btn btn-primary mr-2">
                        <i class="fa fa-reply"></i> Send Reply
                      </button>
                    @endif
                    </div>
                    {!! Form::close()!!}

                {!! Form::open(['url' => 'closeNegot', 'files' => true, 'class' => 'forms-sample']) !!}
                <input value="{{$negotiationID}}" name="negID" hidden />
                <input value="negotiation" name="url" hidden />
                 @if($or->status!=1)
                    <button type="submit" class="btn btn-danger mr-2">
                      <i class="icon icon-power"></i> Close Negotiations
                    </button>
                    @endif
                    {!! Form::close()!!}

               </div>
             </div>
           </div>

           <div class="col-md-2 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Sub Amount</h4>
                   <div class="form-group">
                     <input type="text" name="category" class="form-control" value="&#8358;{{number_format($or3->subAmount)}}" readonly>
                   </div>
                 <h4 class="card-title">Shipping Amount</h4>
                   <div class="form-group">
                     <input type="text" name="category" class="form-control" value="&#8358;{{number_format($or3->shipAmount)}}" readonly>
                   </div>
                 <h4 class="card-title">Total Amount</h4>
                   <div class="form-group">
                     <input type="text" name="category" class="form-control" value="&#8358;{{number_format($or3->totalAmount)}}" readonly>
                   </div>
                   @if($or->status!=1)
                     {!! Form::open(['url' => 'orderPrice', 'files' => true, 'class' => 'forms-sample']) !!}
                   <h4 class="card-title">Update Amount</h4>
                     <div class="form-group">
                       <input type="text" hidden name="orderID" class="form-control" value="{{$or->orderID}}">
                       <input value="negotiation" name="url2" hidden />
                       <input value="{{$negotiationID}}" name="negID" hidden />
                       <input type="text" name="amount" class="form-control" value="{{$or3->totalAmount}}">
                     </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-success mr-2">
                         <i class="icon icon-refresh"></i> Update
                       </button>
                     </div>
                     {!! Form::close()!!}
                     @endif
               </div>
             </div>
           </div>

         </div>
       </div>


@endsection
