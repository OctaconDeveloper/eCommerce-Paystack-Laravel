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
                 <h4 class="card-title">New Frequently Asked Questions</h4>
                  @include('alerts')
                  {!! Form::open(['url' => 'newFaq', 'files' => true, 'class' => 'forms-sample']) !!}
                  <div class="form-group">
                    <label for="exampleInputName1">FAQ Question</label>
                    <input type="text" name="faqQuestion" class="form-control" id="exampleInputName1" placeholder="FAQ Question">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">FAQ Answer</label>
                    <textarea name="faqAnswer" class="form-control" id="exampleTextarea1" rows="10" placeholder="FAQ Answer"></textarea>
                  </div>
                  <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-plus"></i> Add FAQ</button>
                  <button type="reset" class="btn btn-danger"> <i class="icon icon-close"></i> Reset</button>
                 {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
