@extends('control.header')
@section('content')
{{! $categoryID=urldecode(Request::route('id'))}}
{{! $item = App\category::where('categoryID',$categoryID)->first() }}
<!-- partial -->
   <div class="container-fluid page-body-wrapper">
     <div class="main-panel">
       <div class="content-wrapper">
         <div class="row">

           <div class="col-md-6 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Edit {{ucwords($item->categoryName)}} Category</h4>
                 <p class="card-description">

                 </p>@include('alerts')
                   {!! Form::open(['url' => 'updateCategory', 'files' => true, 'class' => 'forms-sample']) !!}
                   <div class="form-group">
                     <input type="text" name="categoryID" value="{{ucwords($item->categoryID)}}" hidden class="form-control" id="exampleInputName1" placeholder="Name">
                   </div>
                   <div class="form-group">
                     <label for="exampleInputName1">Category Name</label>
                     <input type="text" name="category" value="{{ucwords($item->categoryName)}}" readonly class="form-control" id="exampleInputName1" placeholder="Name">
                   </div>
                   <div class="form-group">
                     <label for="exampleTextarea1">Category Description</label>
                     <textarea name="description" class="form-control" id="exampleTextarea1" rows="5">{{ucwords($item->categoryDetails)}}</textarea>
                   </div>
                   <button type="submit" class="btn btn-success mr-2"> <i class="icon icon-refresh"></i> Update {{ucwords($item->categoryName)}}</button>
                   <button type="reset" class="btn btn-danger"> <i class="icon icon-close"></i> Reset</button>
                  {!! Form::close()!!}
               </div>
             </div>
           </div>

         </div>
       </div>

@endsection
