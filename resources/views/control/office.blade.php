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
           <div class="col-md-2 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Links</h4>
                    <ul>
                      <li><a href="{{Config::get('constant.options.sitelink')}}addoffice"><i class="icon icon-pencil"></i> New Offce </a></li>
                      <li><a href="{{Config::get('constant.options.sitelink')}}office_addresses"><i class="fa fa-search"></i> View Office </a></li>
                    </ul>
               </div>
             </div>
           </div>

           <div class="col-md-10 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Available Office Addresses</h4>
                 <p>
                   {{App\shopaddress::all()->count()}} Available Office(s)
                 </p>
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>Street</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{!$shops=App\shopaddress::all()}}
                        {{!$sn=1}}
                        @foreach($shops as $shop)
                        <td>{{ucwords($shop->street1. ' '.$shop->street2)}}</td>
                        <td>{{$shop->phone}}</td>
                        <td>{{$shop->email}}</td>
                        <td>{{ucwords($shop->city)}}</td>
                        <td>{{ucwords($shop->state)}}</td>
                        <td>{{ucfirst($shop->country)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}deleteoffice/{{$shop->id}}" title="Delete {{$shop->street1.' '.$shop->street2}}">
                            <i class="icon icon-trash" style="color:red"></i>
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
