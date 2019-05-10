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
                      <li><a href="{{Config::get('constant.options.sitelink')}}addslider"><i class="icon icon-pencil"></i> New Slider </a></li>
                      <li><a href="{{Config::get('constant.options.sitelink')}}slider"><i class="fa fa-search"></i> View Slider </a></li>
                    </ul>
               </div>
             </div>
           </div>

           <div class="col-md-10 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Home Sliders</h4>
                  @include('alerts')
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>SliderID</th>
                        <th>Slider Title</th>
                        <th> Details </th>
                        <th> Image </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        {{!$sliders=App\slider::orderby('id','DESC')->get()}}
                        {{!$sn=1}}
                        @foreach($sliders as $slider)
                        <td>{{$sn++}}</td>
                        <td>{{$slider->sliderID}}</td>
                        <td>{{ucwords($slider->sliderTitle)}}</td>
                        <td>{{ucfirst($slider->sliderDetail)}}</td>
                        <td>
                          <img src="{{Config::get('constant.options.sitelink').$slider->sliderLocation}}" style="width:100px; height:50px;" />
                        </td>
                        <td>
                          <a href="{{Config::get('constant.options.sitelink')}}deleteslider/{{$slider->sliderID}}" title="Delete {{$slider->sliderTitle}}">
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
