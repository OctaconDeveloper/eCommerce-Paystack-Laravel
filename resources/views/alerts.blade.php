@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="fa fa-times"></i></span>
      </button>
      {{$error}}
      </div>
    @endforeach
@endif


@if(session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-times"></i></span>
  </button>
  {!! session('status') !!}
  </div>
@endif

@if(session('errorLog'))
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-times"></i></span>
  </button>
  {!! session('errorLog') !!}
  </div>
@endif


@if(session('warningLog'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="fa fa-times"></i></span>
  </button>
  {!! session('warningLog') !!}
  </div>
@endif
