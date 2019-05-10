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
                 <h4 class="card-title">New Category</h4>
                 <p class="card-description">
                   Add New Category Details Here
                 </p>@include('alerts')
                   {!! Form::open(['url' => 'addCategory', 'files' => true, 'class' => 'forms-sample']) !!}
                   <div class="form-group">
                     <label for="exampleInputName1">Category Name</label>
                     <input type="text" name="category" class="form-control" id="exampleInputName1" placeholder="Name">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea1">Category Description</label>
                     <textarea name="description" class="form-control" id="exampleTextarea1" rows="5"></textarea>
                   </div>
                   <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-plus"></i> Add Category</button>
                   <button type="reset" class="btn btn-danger"> <i class="icon icon-close"></i> Reset</button>
                  {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
