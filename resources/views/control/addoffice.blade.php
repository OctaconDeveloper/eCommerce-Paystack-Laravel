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
                 <h4 class="card-title">New Office Location </h4>
                  @include('alerts')
                  {!! Form::open(['url' => 'newOffice', 'files' => true, 'class' => 'forms-sample']) !!}
                  <div class="form-group">
                    <label for="exampleInputName1">Contact Phone Number</label>
                    <input type="text" name="officePhone" class="form-control" id="exampleInputName1" placeholder="Contact Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Contact Email Address</label>
                    <input type="text" name="officeEmail" class="form-control" id="exampleInputName1" placeholder="Contact Email Address">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Street 1</label>
                    <input type="text" name="officeStreet1" class="form-control" id="exampleInputName1" placeholder="Street 1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Street 2</label>
                    <input type="text" name="officeStreet2" class="form-control" id="exampleInputName1" placeholder="Street 2">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">City</label>
                    <input type="text" name="officeCity" class="form-control" id="exampleInputName1" placeholder="City">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">State</label>
                    <input type="text" name="officeState" class="form-control" id="exampleInputName1" placeholder="State">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Country</label>
                    <input type="text" name="officeCountry" class="form-control" id="exampleInputName1" placeholder="Country">
                  </div>
                  <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-plus"></i> Add Office</button>
                  <button type="reset" class="btn btn-danger"> <i class="icon icon-close"></i> Reset</button>
                 {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
