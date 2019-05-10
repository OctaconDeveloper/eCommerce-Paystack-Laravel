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
                 <h4 class="card-title">Password</h4>
                 <p class="card-description">
                  Update Password
                 </p>@include('alerts')
                   {!! Form::open(['url' => 'upPassword', 'files' => true, 'class' => 'forms-sample']) !!}
                   <div class="form-group">
                     <label for="exampleInputName1">Current Password</label>
                     <input type="password" name="currentPassword" class="form-control" id="exampleInputName1" placeholder="Current Password">
                   </div>
                   <div class="form-group">
                     <label for="exampleInputName1">New Password</label>
                     <input type="password" name="newPassword" class="form-control" id="exampleInputName1" placeholder="New Password">
                   </div>
                   <div class="form-group">
                     <label for="exampleInputName1">Confirm Password</label>
                     <input type="password" name="confirmPassword" class="form-control" id="exampleInputName1" placeholder="Confirm Password">
                   </div>
                   <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-plus"></i> Add Category</button>
                  {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
