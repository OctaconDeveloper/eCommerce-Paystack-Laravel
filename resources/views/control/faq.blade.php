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
                      <li><a href="{{Config::get('constant.options.sitelink')}}addfaq"><i class="icon icon-pencil"></i> New FAQ </a></li>
                      <li><a href="{{Config::get('constant.options.sitelink')}}faq"><i class="fa fa-search"></i> View FAQ </a></li>
                    </ul>
               </div>
             </div>
           </div>

           <div class="col-md-10 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Frequently Asked Questions</h4>
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>FAQID</th>
                        <th>Questions</th>
                        <th>Answers</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{!$faqs=App\faq::all()}}
                        {{!$sn=1}}
                        @foreach($faqs as $faq)
                        <td>{{$sn++}}</td>
                        <td>{{$faq->faqID}}</td>
                        <td>{{ucwords($faq->question)}}</td>
                        <td>{{ucfirst($faq->answer)}}</td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}deletefaq/{{$faq->faqID}}" title="Delete {{$faq->question}}">
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
