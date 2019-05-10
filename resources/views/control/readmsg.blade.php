@extends('control.header')
@section('content')
{{! $msgID=urldecode(Request::route('id'))}}
{{!App\contact::where('msgID',$msgID)->update(['stat'=>1])}}
{{! $msg = App\contact::where('msgID',$msgID)->first() }}
<!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">

           <div class="col-md-10 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">{{strtoupper($msg->subject)}}</h4>
                 <p class="card-description">
                    @include('alerts')
                 </p>
                   <div class="form-group">
                     <label for="exampleInputName1">Sender's Name</label>
                     <input type="text" name="categoryID" value="{{ucwords($msg->name)}}" readonly class="form-control" id="exampleInputName1">
                   </div>
                   <div class="form-group">
                     <label for="exampleInputName1">Sender's Email</label>
                     <input type="text" name="category" value="{{ucwords($msg->email)}}" readonly class="form-control" id="exampleInputName1">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea1">Message</label>
                     <textarea name="description" class="form-control" id="exampleTextarea1" rows="10" readonly>{{ucfirst($msg->message)}}</textarea>
                   </div>
                   <button type="submit" class="btn btn-success mr-2"> <i class="fa fa-reply"></i> Reply {{strtolower($msg->email)}}</button>
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
