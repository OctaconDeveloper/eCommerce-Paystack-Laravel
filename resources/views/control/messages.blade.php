@extends('control.header')
@section('content')

<style>
ul li {
  list-style: none;
}
a{
  text-decoration: none;
  color: black;
  line-height: 25px;
  font-weight: bolder;
}
a:hover{
  text-decoration: none;
  color:black;
}
</style>
<!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">
           <div class="col-md-12 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Unread Messages</h4>
                 <p>
                   {{App\contact::where('stat',1)->count()}} Message(s)
                 </p>
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{!$msgs=App\contact::where('stat',1)->get()}}
                        @foreach($msgs as $msg)
                        <td>{{ucwords($msg->name)}}</td>
                        <td>{{$msg->email}}</td>
                        <td>{{ucwords($msg->subject)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}readmsg/{{$msg->msgID}}" title="Read {{$msg->subjact}}">
                            <i class="icon icon-envelope-open" style="color:green"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
