@extends('control.header')
@section('content')
{{! $user = App\usertable::all() }}

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">User Accounts</h4>
          <div class="row">
            <div class="col-12 table-responsive">
              @include('alerts')
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>ProfileID</th>
                      <th>Email Address</th>
                      <th>Lastname</th>
                      <th>Firstname</th>
                      <th>Phone</th>
                      <th>Date Registered</th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($user) > 0)
                  {{! $sn=1}}
                   @foreach($user as $cat)
                 <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$cat->profileID}}</td>
                    <td>{{strtolower($cat->useremail)}}</td>
                    <td>{{ucwords($cat->lastname)}}</td>
                    <td>{{ucwords($cat->firstname)}}</td>
                    <td>{{$cat->phone}}</td>
                    <td>{{date('jS F, Y',$cat->date)}}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>ProfileID</th>
                    <th>Email Address</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Phone</th>
                    <th>Date Registered</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
