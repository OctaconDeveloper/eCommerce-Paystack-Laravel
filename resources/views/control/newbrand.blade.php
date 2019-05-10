@extends('control.header')
@section('content')

<!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">

           <div class="col-md-6 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">New Brand</h4>
                 <p class="card-description">
                   Add New Brand Details Here
                 </p>@include('alerts')
                   {!! Form::open(['url' => 'addBrand', 'files' => true, 'class' => 'forms-sample']) !!}
                   <div class="form-group">
                     <label for="exampleInputName1">Brand Name</label>
                     <input type="text" name="brandName" class="form-control" id="exampleInputName1" placeholder="Name">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea1">Brand Logo</label>
                     <input type="file" name="brandLogo" class="form-control"/>
                   </div>
                   <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-plus"></i> Add Brand</button>
                   <button type="reset" class="btn btn-danger"> <i class="icon icon-close"></i> Reset</button>
                  {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
