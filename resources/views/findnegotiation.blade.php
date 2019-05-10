@extends('header')
@section('content')
<title>Search Negotiation</title>

<div id="main-content" class="main-content">
  <div id="post-415" class="post-415 page type-page status-publish hentry">
    <div class="section section-page-title inner-xs">
      <div class="page-header">
        <h2 class="page-title" itemprop="name">Track Negotiation</h2>
      </div>
    </div>
    <div class="entry-content inner-bottom-sm" itemprop="mainContentOfPage">
      <p></p>
    @if(!isset($data))
      <div class="woocommerce">
          {!! Form::open(['url' => 'negtracker', 'files' => true, 'class' => 'track_order']) !!}
          <p>To track your order please enter your NegotiationID in the box below.</p>
          @include('alerts')
          <p class="form-row form-row-first">
            <label for="orderid">Negotiation ID</label>
            <input class="input-text" type="text" name="negotiationId" id="orderid" placeholder="Negotiation ID.">
          </p>
          <p class="form-row form-row-last">
            <label for="order_email">Order email</label>
            <input class="input-text" type="text" name="orderEmail" id="order_email" placeholder="Email you used during checkout.">
          </p>
          <div class="clear"></div>
          <p class="form-row">
            <button class="button" type="submit" >
              <i class="icon icon-magnifier"></i>
              Find
            </button>
          </p>
          {!! Form::close()!!}
      </div>
      @endif


  </div>
</div>
</div>
@endsection
